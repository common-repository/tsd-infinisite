<?

namespace TSD_Infinisite;

class Palette
{

    public $roles = [
        'primary',
        'secondary',
        'tertiary',
        'accent',
        'warning',
        'success',
        'alert',
        'white',
        'gray',
        'black',
    ];

    public $mods = [
        'xxdark',
        'xdark',
        'dark',
        'light',
        'xlight',
        'xxlight'
    ];

    public $is_defaults = [
        'primary' => '#00a2a4',
        'secondary' => '#f24900',
        'tertiary' => '#666666',
        'accent' => '#e5001c',
        'warning' => '#ffae00',
        'success' => '#3adb76',
        'alert' => '#dd3333',
        'white' => '#fefefe',
        'gray' => '#cacaca',
        'black' => '#0a0a0a',
    ];

    public $shades = [];

    public function __construct()
    {

        $this->get_palette();

    }

    public static function update_from_acf_save()
    {

        // bail early if no ACF data
        if (empty($_POST['acf']))
            return;

        $global_colors = $_POST['acf']['field_is_global_colors_palette'];

        if (!$global_colors) return;

        $strip_out_field_name_from_acf_field = [];

        foreach ($global_colors as $role => $value)
            $strip_out_field_name_from_acf_field[substr($role, 31)] = $value;

        $palette = new Palette();

        foreach ($global_colors as $db_name => $value):
            $role = substr($db_name, 31);
            $palette->generate_new_shades_for_role($role, $value);
        endforeach;

    }

    public function get($role)
    {
        /*
         * returns role color value
         */

        foreach ($this->shades as $potential => $color)
            if ($role == $potential)
                return $color;

    }

    public function set($role)
    {
        /*
         * sets role color value
         */
    }

    public function generate($role)
    {
        /*
         * uses base role color to generate
         * and save single color role
         */
    }

    public function generate_new_shades_for_role($role, $color)
    {

        $shades_for_database = [];

        // error_log("generating new shades for $role");


        $shades_for_database[] = [
            'role' => $role,
            'value' => $color
        ];

        foreach ($this->mods as $mod):


            $dark_mod = strpos($mod, 'dark');
            $light_mod = strpos($mod, 'light');

            $lighten_color = $dark_mod === false ? true : false;


            $color_mod_strength = 0;

            if ($lighten_color) $color_mod_strength = $light_mod;
            if (!$lighten_color) $color_mod_strength = $dark_mod;

            $color_mod_value = 0;

            switch ($color_mod_strength):
                case 0:
                    $color_mod_value = 25;
                    break;
                case 1:
                    $color_mod_value = 50;
                    break;
                case 2:
                    $color_mod_value = 75;
                    break;

            endswitch;


            if (!$lighten_color)
                $color_mod_value = 0 - $color_mod_value;

            $scss_code_to_compile = ".style { color: scale-color($color, \$lightness: $color_mod_value%);}";

            // error_log($color);
            // error_log($scss_code_to_compile);
            $scss = new \Leafo\ScssPhp\Compiler();
            $scss->addImportPath(INFINISITE_URI . '/assets/acme/');

            $compiled_style_to_adjust = $scss->compile($scss_code_to_compile);
            // $debug .= $compiled_style_to_adjust;

            $updated_color_value = substr($compiled_style_to_adjust, 18, 7);

            if (strpos($updated_color_value, ';'))
                $updated_color_value = substr($updated_color_value, 0, 4);

            // error_log("updated: " . $updated_color_value);

            $shades_for_database[] = [
                'role' => "{$role}_{$mod}",
                'value' => $updated_color_value
            ];

            $this->shades["{$role}_$mod"] = $updated_color_value;


            // error_log('base color in place: ' . $role . ' ' . $mod);


        endforeach;

        foreach ($shades_for_database as $shade)
            \update_option('options_is_pb_global_color_palette_' . $shade['role'], $shade['value']);

    }

    public function get_palette()
    {

        /*
         * check if the palette exists.
         * if so, get & set
         * if not, create
         */


        $default_values = !$this::has_palette_been_set() ? true : false;

        // build the shades
        $this->build_shades($default_values);

        // retreive the shade values from the database
        $this->get_shades();

        $this->update_utility_classes();


    }


    public function get_shades()
    {

        /*
         * this function assumes that the shades are in the database
         * but the function in question is being called too early
         * for typical acf to work? idk.
         */


        // not sure why we need to do this
        if (!$this->roles) return;

        foreach ($this->roles as $role):
            $value = get_option("options_is_pb_global_color_palette_$role");
            $this->shades[$role] = $value;

            // we don't generate shades of white or black.
            if ($role == 'white' || $role == 'black')
                continue;

            foreach ($this->mods as $mod):
                $value = get_option("options_is_pb_global_color_palette_{$role}_$mod");
                $this->shades["{$role}_$mod"] = $value;
            endforeach;
        endforeach;

        $this->insert_overrides_into_shades();

    }

    public static function has_palette_been_set()
    {

        /*
         * right now, i'm going to be proving this by
         * checking against the primary color
         */

        $primary = 'options_is_pb_global_color_palette_primary_light';

        return get_option($primary) ? true : false;

    }


    public function build_shades($use_is_default_values = false)
    {


        /*
         * automatic shading!! we are going to begin by starting our compiler
         * then, inside the color mod loop, we are going to do some text wrangling
         * to determine weather to darken or lighten, and by how much. we then
         * apply those values in a string, and pass it to the compiler. lastly,
         * we put those in the
         */

        $scss = new \Leafo\ScssPhp\Compiler();
        $scss->setFormatter('Leafo\ScssPhp\Formatter\Compact');
        $scss_code_to_compile = "";

        $colors_for_database = [];
        $this->get_shades();
        $colors = $this->shades;

        if ($use_is_default_values):
            // error_log('IS Color Palette not found, creating default set');
            $this->build_default_shades();
            return true;
        endif;


        return true;


    }

    private function build_default_shades()
    {

        // error_log('building default shades');

        foreach ($this->is_defaults as $role => $color):

            $palette_colors_for_database[] = [
                'role' => $role,
                'value' => $color
            ];

            $this->shades[$role] = $color;

            // we don't generate shades of white or black.
            if ($role == 'white' || $role == 'black')
                continue;

            $this->generate_new_shades_for_role($role, $color);

        endforeach;


        foreach ($palette_colors_for_database as $shade)
            \update_option('options_is_pb_global_color_palette_' . $shade['role'], $shade['value']);

        $this->insert_overrides_into_shades();

        // error_log('added default base palette to database');
    }

    public function insert_overrides_into_shades()
    {

        $acf_user_color_role_overrides = get_field("is_pb_global_colors", "options");

        if (!$acf_user_color_role_overrides) return;

        foreach ($acf_user_color_role_overrides as $override)
            $this->shades[$override['role']] = $override['value'];

    }


    private function x_add_role_overrides()
    {

        // TODO: delete me, we're doing the overrides in the shade builder - and we are NOT putting them in the db

        return;

        $acf_user_color_role_overrides = get_field("is_pb_global_colors", "options");

        if (!$acf_user_color_role_overrides) return false;

        foreach ($acf_user_color_role_overrides as $override)
            \update_option('options_is_pb_global_color_palette_' . $override['role'], $override['value']);


        // removing function call to not confuse phpstorm
        // $this->update_utility_classes();

    }


    public function update_utility_classes()
    {


        $is_global_foundation_colors = '';


        foreach ($this->shades as $role => $value)
            $is_global_foundation_colors .= "\${$role}: {$value};\n";

        $is_global_foundation_color_map = "\n\n\$is_global_palette : (\n";


        foreach ($this->shades as $role => $value)
            $is_global_foundation_color_map .= "\t{$role}: {$value},\n";

        $is_global_foundation_color_map .= ");";

        $is_global_foundation_file_content = "$is_global_foundation_colors $is_global_foundation_color_map";

        // and here we update the stylesheet.
        $file = INFINISITE_URI . 'assets/acme/is_variables.scss';
        if (file_exists($file))
            file_put_contents($file, $is_global_foundation_file_content);

        // and here we dump it in the child theme so their app.scss can access it
        $file = THEME_URI . 'assets/scss/_is_variables.scss';
        if (file_exists($file))
            file_put_contents($file, $is_global_foundation_file_content);

        // error_log('is class update');

        // we're going to boot up the compiler here
        $scss = new \Leafo\ScssPhp\Compiler();
        $scss->addImportPath(INFINISITE_URI . '/assets/acme/');

        $utility_scss_filepath = INFINISITE_URI . '/assets/acme/is_utility_classes.scss';
        $utility_styles = file_get_contents($utility_scss_filepath);

        // error_log('updating utility styles');
        // error_log($is_global_foundation_file_content);

        $compiled_utility_styles = $scss->compile($utility_styles);

        $is_utility_stylesheet_filepath = INFINISITE_URI . '/assets/css/is_utility_classes.css';

        file_put_contents($is_utility_stylesheet_filepath, $compiled_utility_styles);


    }

    public static function get_hex_color_from_role($role)
    {

        $value = get_option("options_is_pb_global_color_palette_$role");

        return $value;

    }

}