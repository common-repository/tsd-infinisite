<?

namespace TSD_Infinisite;

class Acme
{

    static function is_admin()
    {

        return is_user_logged_in();

    }

    static function update_is_stylesheets()
    {

        // we don't use this yet - this going to be for the template builder
        // Template::update_is_custom_template_styles();

        // foundation pulls its colors from our palette - so we need to set
        // the values for our palette

        // this builds the default foundation cfg and saves it to the db
        Foundation::init_foundation_config();

        // this builds the foundation stylesheet
        // Foundation::update_scss();

        // this breaks because we don't have the foundation vars
        // Acme::update_IS_utility_classes();
    }

    static function stylesheet_update_check()
    {

        $update = false;

        if ($_GET['update_foundation_stylesheets'])
            $update = true;


        if ($update)
            Acme::update_is_stylesheets();

    }

    static function standard_page()
    {
        if (\is_search()) return false;
        return true;
    }

    static function dbg($content = false, $var_dump = false)
    {

        if (!$content) return false;

        if ($var_dump == 2):
            print "<pre>";
            var_export($content);
            print "</pre>";
            return;
        endif;


        if ($var_dump):
            print "<pre>";
            var_dump($content);
            print "</pre>";
            return;
        endif;


        print "<pre>";
        print_r($content);
        print "</pre>";


    }

    static function dd($content = false)
    {

        if (!$content) return false;
        Acme::dbg($content);
        die();
    }

    static function header($template = 'default')
    {
        include INFINISITE_URI . 'components/layout/header/default.php';
    }

    static function footer($template = 'default')
    {
        include INFINISITE_URI . 'components/layout/footer/default.php';
    }

    static function browser_title()
    {

        if (\is_front_page())
            return \get_bloginfo('name');

        return \wp_title('');

    }

    static function get_colors()
    {


        $primary = get_option("options_is_pb_global_color_palette_primary");

        // if we don't have the first color defined, we don't have any of them,
        // so we need to build the palette

        // this should only take place on plugin init

        if (!$primary):
            $color = new Palette();
            $color->build_shades(1);
        endif;


        /*
         * right now, this really is just an alias to the get_is_palette
         * which is a legacy of the is palette not coming in until the end
         * and being shoehorned in and now a core part of the whole thing
         *
         */

        Acme::insert_IS_palette_overrides();


        // if we don't have primary, we're initing i think

        if ($primary)
            return Acme::get_is_palette();


        return [];

    }

    static function get_is_palette()
    {

        $return = [];

        $palette_roles = [
            "primary",
            "secondary",
            "tertiary",
            "accent",
            "warning",
            "success",
            "alert",
            "white",
            "gray",
            "black",
        ];

        $color_mods = [
            'xxdark',
            'xdark',
            'dark',
            'light',
            'xlight',
            'xxlight'
        ];

        $base = 'options_is_pb_global_color_palette_';

        foreach ($palette_roles as $role):
            $name = $base . $role;
            $value = get_option($name);
            $return[$role] = $value;
            if ($role == 'white' || $role == 'black')
                continue;
            foreach ($color_mods as $mod):
                $name = $base . $role . "_" . $mod;
                $value = get_option($name);
                $return["{$role}_$mod"] = $value;
            endforeach;
        endforeach;

        return $return;

    }

    static function set_IS_color_palette()
    {

        /*
         * this function is going to become a wrapper for
         * the object function, and then we're going to refactor
         */

        $color = new Palette();
        $color->build_shades();

        return;

        // TODO: delete me


        $return = [];

        $palette_roles = [
            "primary",
            "secondary",
            "tertiary",
            "accent",
            "warning",
            "success",
            "error",
            "white",
            "gray",
            "black",
        ];

        $color_mods = [
            'xxdark',
            'xdark',
            'dark',
            'light',
            'xlight',
            'xxlight'
        ];


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

        foreach ($palette_roles as $c => $role):

            $color_value = get_option("options_is_pb_global_color_palette_$role");

            if (!$color_value) continue;

            $return[] = [
                'role' => $role,
                'value' => $color_value
            ];

            // we don't generate shades of white or black.
            if ($role == 'white' || $role == 'black')
                continue;


            foreach ($color_mods as $mod):


                $dark_mod = strpos($mod, 'dark');
                $light_mod = strpos($mod, 'light');

                $color_mod = $dark_mod === false ? 'lighten' : 'darken';

                $color_mod_strength = 0;

                if ($dark_mod === false) $color_mod_strength = $light_mod;
                if ($light_mod === false) $color_mod_strength = $dark_mod;

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

                if (!$light_mod)
                    $color_mod_value = $color_mod_value * -1;

                $scss_code_to_compile = ".style {color: scale_color($color_value, $color_mod_value%);}";
                $compiled_style_to_adjust = $scss->compile($scss_code_to_compile);
                // $debug .= $compiled_style_to_adjust;

                $updated_color_value = substr($compiled_style_to_adjust, 16, 7);

                if (strpos($updated_color_value, ';'))
                    $updated_color_value = substr($updated_color_value, 0, 4);

                $return[] = [
                    'role' => "{$role}_{$mod}",
                    'value' => $updated_color_value
                ];

            endforeach;

        endforeach;

    }

    static function insert_IS_palette_overrides()
    {

        /*
         * we're going to check for the primary color first. if that value isn't
         * set, we're initalizing the plugin and we need to slip in our bootstrapped
         * values into the database
         */

        $override_color_count = get_option("options_is_pb_global_colors");

        $color_option_name_base = "options_is_pb_global_color_palette_";

        $custom_role_colors = [];

        for ($i = 0; $i < $override_color_count; $i++):

            $role = get_option("options_is_pb_global_colors_{$i}_role");
            $value = get_option("options_is_pb_global_colors_{$i}_value");

            $custom_role_colors[] = $role;

            \update_option($color_option_name_base . $role, $value);

        endfor;

        \update_option("ispb_global_color_pallete_role_overrides", serialize($custom_role_colors));

    }

    static function check_IS_palette_for_blanks_and_rebuild()
    {

        $roles_as_of_last_build = unserialize(get_option("ispb_global_color_pallete_role_overrides"));

        $current_role_overrides = get_field("is_pb_global_colors", 'options');
        if (!$current_role_overrides) return;

        $overrides = [];

        foreach ($current_role_overrides as $override)
            $overrides[] = $override['role'];

        /*
         * we check for diffs, which tells us which fields are in the old values
         * that aren't in the new
         * TODO: make sure this is true
         *
         * we then set the these diff values to be red
         */
        $diff = array_diff($overrides, $roles_as_of_last_build);
        if (!$diff) return;

        foreach ($diff as $modded_role)
            \update_option("options_is_pb_global_color_palette_$modded_role", '#F00');


    }

    static function spacer($spacer = false)
    {

        if (!$spacer):
            print "
                <div class='grid-x'>
                    <div class='spacer medium'></div>
                </div>
            ";
            return;
        endif;


        if (gettype($spacer == 'string')):
            print "
                <div class='grid-x'>            
                    <div class='spacer $spacer'></div>
                </div>
            ";
            return;
        endif;

    }


    static function get_pb_fields()
    {

        $fields = acf_get_fields('tsd_infinisite');

        $layouts = $fields[0]['sub_fields'][1]['layouts'];

        foreach ($layouts as $layout):

            print "<h2>{$layout['label']}</h2>";

            $sub_field_container = $layout['sub_fields'];


            foreach ($sub_field_container as $sub_field):
                print "<p>{$sub_field['type']}</p>";

            endforeach;

        endforeach;

//        print "<pre>";
//        print_r($layouts);
//        print "</pre>";


    }

    static function get_archetype_by_post_type($post_type = false)
    {

        if (!$post_type) return;

        $custom_post_types = Acme::get_post_types();;
        if (!$custom_post_types) return false;

        foreach ($custom_post_types as $pt)
            if ($pt['slug'] == $post_type)
                return $pt['acf_fc_layout'];


    }

    static function get_post_by_archetype($archetype = false, $user_query = false)
    {

        // we're killing the archetype - this shouldn't ever call

        return;

        if (!$archetype || $user_query) return false;

        // cycle through user set post types to build wp query post type array
        $custom_post_types = Acme::get_post_types();

        if (!$custom_post_types) return false;
        $post_types = [];

        // filter out the user selected post type
        foreach ($custom_post_types as $post_archetype):
            if ($post_archetype['acf_fc_layout'] != $archetype) continue;
            $post_types[] = $post_archetype['post_type'];
        endforeach;

        $defaults = [
            'posts_per_page' => -1,
            'post_type' => $post_types
        ];

        $query = wp_parse_args($user_query, $defaults);

        // execute said query
        $post_query = new \WP_Query($query);

        if (!$post_query->found_posts) return false;

        return $post_query->posts;

    }


    static function generate_columns($array = false, $block_grid = false)
    {

        if (!$array) return false;

        $op = '';

        $block_grid_notation = $block_grid ? 'up-' : '';

        foreach ($array as $size => $count)
            $op .= "$size-{$block_grid_notation}$count ";

        return $op;

    }

    static function generate_social_media_template_html($n)
    {

    }

    static function device_size_to_visibility_class($size = false)
    {

        if (!$size) return false;

        switch ($size):
            case 'mobile':
                $visibility = 'hide-for-medium';
                break;

            case 'tablet':
                $visibility = 'show-for-medium hide-for-xlarge';
                break;

            case 'desktop':
                $visibility = 'show-for-xlarge hide-for-xxlarge';
                break;

            case 'large_desktop':
                $visibility = 'show-for-xxlarge';
                break;

        endswitch;

        return $visibility;


    }

    static function device_size_to_breakpoint_class($size = false)
    {

        if (!$size) return false;

        $lookup = [
            'mobile' => 'small',
            'tablet' => 'medium',
            'desktop' => 'large',
            'large_desktop' => 'xlarge',
        ];

        return $lookup[$size];


    }

    static function get_post_types($supress_defaults = true)
    {

        $post_types = \get_field("is_global_post_types", "options");

        if (!is_array($post_types)) return false;

        $defaults = [
            [
                'name' => 'Page',
                'post_type' => 'page',
                'config' => [
                    'single_view' => 1,
                    'heirarchical' => 1,
                    'page_builder' => 1,
                ]
            ],
            [
                'name' => 'Post',
                'post_type' => 'post',
                'config' => [
                    'single_view' => 1,
                    'heirarchical' => 1,
                    'page_builder' => 1,
                ]
            ],
        ];

        if (!$post_types) return $defaults;

        if (!$supress_defaults)
            foreach ($defaults as $default)
                $post_types[] = $default;


        return $post_types;
    }

    static function get_color_value($acf_field = false)
    {

        if (!$acf_field || !isset($acf_field['site_colors'])) return;

        if ($acf_field['site_colors'] == 'transparent') return;

        if ($acf_field['site_colors'] && $acf_field['site_colors'] != 'custom')
            return $acf_field['site_colors'];

        return $acf_field['custom_color'];

    }

    static function hex2rgba($color, $opacity = false)
    {

        $default = 'rgb(0,0,0,0)';

        //Return default if no color provided - transparent background
        if (empty($color))
            return $default;


        if (!$color) return $default;


        if (substr($color, 0, 1) != '#'):

            $color = Acme::get_palette_color_by_role_name($color);
            $color = $color['value'];

        endif;

        //Sanitize $color if "#" is provided
        if ($color[0] == '#') {
            $color = substr($color, 1);
        }

        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
            $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
        } elseif (strlen($color) == 3) {
            $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
        } else {
            return $default;
        }

        //Convert hexadec to rgb
        $rgb = array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
        if ($opacity) {
            if (abs($opacity) > 1)
                $opacity = 1.0;
            $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
        } else {
            $output = 'rgb(' . implode(",", $rgb) . ')';
        }

        //Return rgb(a) color string
        return $output;
    }

    public static function underscore($str, array $noStrip = [])
    {
        // non-alpha and non-numeric characters become spaces
        $str = preg_replace('/[^a-z0-9' . implode("", $noStrip) . ']+/i', ' ', $str);
        $str = trim($str);
        $str = str_replace(" ", "_", $str);
        $str = strtolower($str);

        return $str;
    }

    public static function slugify($string)
    {
        return str_replace(' ', '-', strtolower($string));
    }

    static function get_sidebar_sets()
    {
        // return get_field('is_global_sidebar_sets', 'options');
        return [];
    }

    static function get_post_type_options($user_post_type = false)
    {
        if (!$user_post_type) return false;

        $post_types = self::get_post_types();

        if (!is_array($post_types)) return;

        $post_type = false;

        foreach ($post_types as $pt):
            if ($pt['post_type'] != $user_post_type)
                continue;
            $post_type = $pt;
        endforeach;

        $post_type = Acme::get_is_post_type_config_options($post_type['post_type']);

        return $post_type;

    }

    static function get_is_post_type_config_options($post_type)
    {

        $return = [];

        /**
         *
         * POST TYPE CONFIG OPTIONS
         *
         *   single_view_template
         *   single_view
         *   sidebar_set
         *   page_builder
         *   hierarchical
         *   custom_meta_fields
         *   meta_fields
         *   default_image
         *
         */

        $return['single_view_template'] = get_field("is_cpt_{$post_type}_template", 'options');
        $return['single_view'] = get_field("is_cpt_{$post_type}_single_view", 'options');
        $return['sidebar_set'] = get_field("is_cpt_{$post_type}_sidebar_set", 'options');
        $return['page_builder'] = get_field("is_cpt_{$post_type}_page_builder", 'options');
        $return['hierarchical'] = get_field("is_cpt_{$post_type}_hierarchical", 'options');
        $return['custom_meta_fields'] = get_field("is_cpt_{$post_type}_custom_meta_fields", 'options');
        $return['meta_fields'] = get_field("is_cpt_{$post_type}_meta_fields", 'options');
        $return['default_image'] = get_field("is_cpt_{$post_type}_default_image", 'options');

        return $return;
    }

    static function strip_field_for_name($key)
    {
        return substr($key, 6);
    }

    /**
     * Get size information for all currently-registered image sizes.
     *
     * @global $_wp_additional_image_sizes
     * @uses   get_intermediate_image_sizes()
     * @return array $sizes Data for all currently-registered image sizes.
     */
    static function get_image_sizes()
    {
        global $_wp_additional_image_sizes;

        $sizes = array();

        foreach (\get_intermediate_image_sizes() as $_size) {
            if (in_array($_size, array('thumbnail', 'medium', 'medium_large', 'large'))) {
                $sizes[$_size]['width'] = get_option("{$_size}_size_w");
                $sizes[$_size]['height'] = get_option("{$_size}_size_h");
                $sizes[$_size]['crop'] = (bool)get_option("{$_size}_crop");
            } elseif (isset($_wp_additional_image_sizes[$_size])) {
                $sizes[$_size] = array(
                    'width' => $_wp_additional_image_sizes[$_size]['width'],
                    'height' => $_wp_additional_image_sizes[$_size]['height'],
                    'crop' => $_wp_additional_image_sizes[$_size]['crop'],
                );
            }
        }

        return $sizes;
    }

    /**
     * Get size information for a specific image size.
     *
     * @uses   get_image_sizes()
     * @param  string $size The image size for which to retrieve data.
     * @return bool|array $size Size data about an image size or false if the size doesn't exist.
     */
    static function get_image_size($size)
    {
        $sizes = self::get_image_sizes();

        if (isset($sizes[$size])) {
            return $sizes[$size];
        }

        return false;
    }

    /**
     * Get the width of a specific image size.
     *
     * @uses   get_image_size()
     * @param  string $size The image size for which to retrieve data.
     * @return bool|string $size Width of an image size or false if the size doesn't exist.
     */
    static function get_image_width($size)
    {
        if (!$size = self::get_image_size($size)) {
            return false;
        }

        if (isset($size['width'])) {
            return $size['width'];
        }

        return false;
    }

    /**
     * Get the height of a specific image size.
     *
     * @uses   get_image_size()
     * @param  string $size The image size for which to retrieve data.
     * @return bool|string $size Height of an image size or false if the size doesn't exist.
     */
    static function get_image_height($size)
    {
        if (!$size = self::get_image_size($size)) {
            return false;
        }

        if (isset($size['height'])) {
            return $size['height'];
        }

        return false;
    }

    static function fudge_image_sizes_for_testing()
    {
        $image_sizes = self::get_image_sizes();

        $return = [];

        foreach ($image_sizes as $label => $size):

            $w = $size['width'];
            $h = $size['height'];
            $img_url = "http://placehold.it/{$w}x{$h}";

            $return["{$label}"] = $img_url;
            $return["{$label}-width"] = $w;
            $return["{$label}-height"] = $h;
        endforeach;

        return $return;

    }

    static function get_custom_header_footer_templates($header_footer = false)
    {

        if (!$header_footer) return [
            'error' => 'Specify Header or Footer'
        ];

        // TODO: I need a test written!


        $paths = [
            INFINISITE_URI . "components/header-footer/$header_footer/*",
            THEME_URI . "components/header-footer/$header_footer/*",
        ];

        $templates = [];

        foreach ($paths as $path)
            foreach (glob($path) as $filename)
                $templates[] = $filename;


        $return = [];

        $template_names = self::process_template_names_for_acf_select_fields($templates);

        foreach ($template_names as $filename => $label)
            $return[$filename] = $label;

        return $return;

    }

    static function process_template_names_for_acf_select_fields($templates = false)
    {

        /*
         * returns filepath => select label
         */

        $return = [];

        if (!$templates) return $return;

        foreach ($templates as $choice):
            $info = explode("/", $choice);
            $filename_unformatted = array_pop($info);
            $filename_with_spaces = str_replace('_', ' ', $filename_unformatted);

            $tmp_array_var = explode('.', $filename_with_spaces);
            $filename_without_filetype = array_shift($tmp_array_var);
            $return[$choice] = ucwords($filename_without_filetype);
        endforeach;

        return $return;

    }


    static function get_menus_for_acf_global_header_footer()
    {


        $menus = get_terms([
            'taxonomy' => 'nav_menu',
        ]);

        $return = [];

        if (!$menus) return $return;

        foreach ($menus as $menu)
            $return[$menu->slug] = $menu->name;

        return $return;

    }

    static function get_menu_templates_for_acf_global_options($menu = false)
    {

        $return = [];

        if (!$menu) return $return;

        $template_filepath = INFINISITE_URI . "components/header-footer/$menu/*";
        $templates = glob($template_filepath);

        if (!$templates) return $return;

        $template_names = self::process_template_names_for_acf_select_fields($templates);

        foreach ($template_names as $filename => $label)
            $return[$filename] = $label;

        return $return;
    }

    static function process_ispb_layout_markup($content, $classes = false)
    {

        $op = '';

        if (!$content) return $op;
        if (!count($content)) return $op;

        foreach ($content as $key => $class):

            if ($classes):
                $op .= "$class ";
                continue;
            endif;

            $op .= "$key: $class; ";

        endforeach;

        return $op;


    }

    static function display_templates_per_device_size($device_templates, $user_config)
    {

        /**
         * takes array of key / value pairs
         * key = device size
         * value = template filepath
         *
         * returns html with show/hide classes
         */

        $return = '';


        $defaults = [];

        $config = wp_parse_args($user_config, $defaults);


        $is_size_breakpoint_conversion_lookup = [
            'mobile' => ['xsmall', 'small'],
            'tablet' => ['medium'],
            'desktop' => ['large'],
            'large_desktop' => ['xlarge', 'xxlarge']
        ];

        $breakpoints = ['xsmall', 'small', 'medium', 'large', 'xlarge', 'xxlarge'];

        $processed_templates = [];

        if ($device_templates)
            foreach ($device_templates as $device => $template)
                $processed_templates[$template][] = $device;


        if ($processed_templates):

            $return = '';
            foreach ($processed_templates as $template => $sizes):

                $hide_class = '';
                $show_for_size = [];

                foreach ($sizes as $size):
                    $show_sizes = $is_size_breakpoint_conversion_lookup[$size];

                    foreach ($show_sizes as $show_size)
                        $show_for_size[] = $show_size;

                endforeach;

                foreach ($breakpoints as $breakpoint):

                    if (in_array($breakpoint, $show_for_size))
                        continue;

                    $hide_class .= "hide-for-{$breakpoint}-only ";

                endforeach;

                $return .= "<div class='$hide_class {$config['container_class']}' style='position: relative;'>";
                ob_start();

                if ($config['vars'])
                    foreach ($config['vars'] as $name => $value)
                        $$name = $value;

                include($template);

                $return .= ob_get_clean();
                $return .= "</div>";

            endforeach;

        endif;


        return $return;

    }

    static function create_classes_for_ispb_row($row = false)
    {
        if (!$row) return '';

        $flex_align = $row['ispb_row_flex_align'];

        if ($flex_align['horizontal_alignment'])
            $classes[] = "align-{$flex_align['horizontal_alignment']}";

        if ($flex_align['vertical_alignment'])
            $classes[] = "align-{$flex_align['vertical_alignment']}";


        return self::process_ispb_layout_markup($classes, 1);
    }

    static function generate_background_styles_from_acf_background_options_group($group = false)
    {

        if (!$group) return '';

        $styles = [];

        if ($group['image']):
            $styles['background-image'] = "url({$group['image']['url']})";

            if($group['position'])
                $styles['background-position'] = $group['position'];

            if($group['size'])
                $styles['background-size'] = $group['size'];

            if($group['repeat'])
                $styles['background-repeat'] = $group['repeat'];
        endif;

        $opacity = isset($group['opacity']) ? $group['opacity'] : 1;

        // TODO: delete me
        // if ($group['custom_color'])
        //   $styles['background-color'] = Acme::hex2rgba($group['custom_color'], $opacity);

        $hex_color = Palette::get_hex_color_from_role($group['color']);

        if ($group['color'])
            $styles['background-color'] = Acme::hex2rgba($hex_color, $opacity);

        if ($group['blending'])
            $styles['background-blend-mode'] = $group['blending'];

        return $styles;

    }

    static function create_inline_styles_for_ispb_row($row = false)
    {
        if (!$row) return '';

        $bg = $row['ispb_row_background_options'];

        $styles = Acme::generate_background_styles_from_acf_background_options_group($bg);

        return self::process_ispb_layout_markup($styles);
    }

    static function header_footer_styles($styles)
    {

        $style_array = Acme::generate_background_styles_from_acf_background_options_group($styles);

        return self::process_ispb_layout_markup($style_array);
    }

    static function create_classes_for_ispb_cell($cell = false)
    {
        if (!$cell) return '';

        if ($cell['cell_vertical_self_alignment'])
            $classes[] = "align-self-{$cell['cell_vertical_self_alignment']}";

        return self::process_ispb_layout_markup($classes, 1);
    }

    static function create_inline_styles_for_ispb_cell($cell = false)
    {
        if (!$cell) return '';

        $styles = Acme::generate_background_styles_from_acf_background_options_group($cell['cell_background_options']);

        return self::process_ispb_layout_markup($styles);
    }

    static function generate_ispb_cell_width_classes($cell = false)
    {
        if (!$cell) return '';

        $device_widths = $cell['cell_column_width'];

        $width = '';

        foreach ($device_widths as $device => $col_width)
            if ($col_width):
                $breakpoint = Acme::device_size_to_breakpoint_class($device);
                $width .= "$breakpoint-$col_width ";
            endif;


        return $width;

    }


    static function get_ispb_row_spacer($row = false, $bottom = false)
    {

        if (!$row) return '';

        $location = $bottom ? 'bottom' : 'top';

        $spacer = $row['ispb_row_spacers'][$location];

        if (!$spacer) return '';
        if ($spacer == 'false') return '';

        return "
            <div class='grid-x'>
                <div class='spacer $spacer'></div>
            </div>
        ";

    }

    static function get_ispb_cell_html_output($row = false)
    {

        $cells = $row['cells'];

        $content_html = '';
        if (!$cells) return;

        foreach ($cells as $cell_index => $cell):


            $col_notice = $cell_index + 1;
            $cell_admin_notice = Acme::is_admin() ? "<span class='is_admin_page_builder_label'>Cell $col_notice</span>" : "";

            $cell_classes = Acme::create_classes_for_ispb_cell($cell);
            $cell_styles = Acme::create_inline_styles_for_ispb_cell($cell);
            $cell_width = Acme::generate_ispb_cell_width_classes($cell);


            $full_width_class = '';

            if ($row['ispb_row_dimensions']['max_width'] == 'none')
                $full_width_class = 'fluid no-padding';

            $content_html .= "<div 
                            id='{$cell['cell_id']}'
                            class='ispb_cell cell $cell_classes $cell_width $full_width_class' 
                            style='$cell_styles'>
                        $cell_admin_notice";

            if ($cell['is_acf_fc_container'])
                foreach ($cell['is_acf_fc_container'] as $c => $layout):
                    $content_html .= Layout::acf_flex_to_html($layout, $c);
                endforeach;

            $content_html .= "</div>";
        endforeach;

        return $content_html;

    }

    static function get_ispb_grid_dimension_styles($row = false)
    {


        if (!$row) return '';
        $dims = $row['ispb_row_dimensions'];

        if ($dims['max_width']):
            $styles['max-width'] = $dims['max_width'];
            $styles['margin'] = 'auto';
        endif;

        // TODO: how to integrate with responsive?
        if ($dims['fixed_height'])
            $styles['min-height'] = $dims['fixed_height'];

        return self::process_ispb_layout_markup($styles);


    }

    static function ispb_module_templates($template = false)
    {


        $return = [
            'default' => 'Default'
        ];

        if (!$template) return $return;

        $plugin_php_templates_filepath = INFINISITE_URI . "module_templates/$template/*";
        $plugin_php_templates = glob($plugin_php_templates_filepath);

        $theme_php_templates_filepath = THEME_URI . "module_templates/$template/*";
        $theme_php_templates = glob($theme_php_templates_filepath);

        $plugin_templates_filepath = INFINISITE_URI . "twig/layouts/$template/*";
        $plugin_templates = glob($plugin_templates_filepath);

        $child_theme_templates_filepath = THEME_URI . "twig/layouts/$template/*";
        $child_theme_templates = glob($child_theme_templates_filepath);

        $templates = array_merge($plugin_php_templates, $theme_php_templates, $plugin_templates, $child_theme_templates);

        // attaching the templates to the submenu template module selector

        if (!$templates)
            return $return;

        foreach ($templates as $template):

            $info = explode("/", $template);
            $filename = array_pop($info);
            $return[$template] = Acme::underscore($filename);

        endforeach;

        return $return;

    }

    static function get_templates($directory, $user_config = [])
    {

        /**
         * GET TEMPLATES
         *
         * This is the new centralized location for all template loading.
         *
         * $directory: string / array - directory to load templates from.
         *
         * This function will look in the directory of both the plugin and
         * the theme. If files are found, they will be returned in a key/value
         * format.
         *
         * [ theme path => filename ]
         *
         *
         * TODO: update the filename to something more human friendly.
         *
         * TODO: refactor module templates to load from here
         * TODO: refactor header / footer device templates to load from here
         * TODO: refactor social media templates to load from here
         * TODO: ID other loading places to refactor from here
         *
         */

        $return = [];

        if (is_string($directory)) $directory = [$directory, $directory];

        $defaults = [
            'twig' => true,
            'load_from_user_theme' => true,
            'load_from_plugin' => true,
        ];

        $config = wp_parse_args($user_config, $defaults);

        $plugin_dir_has_slash = substr($directory[0], -1, 1) == '/';
        $plugin_slash = $plugin_dir_has_slash ? '' : '/';

        $theme_dir_has_slash = substr($directory[0], -1, 1) == '/';
        $theme_slash = $theme_dir_has_slash ? '' : '/';

        $plugin_php_templates_filepath = INFINISITE_URI . $directory[0] . $plugin_slash . "*";
        $plugin_php_templates = glob($plugin_php_templates_filepath);

        $theme_php_templates_filepath = THEME_URI . $directory[1] . $theme_slash . "*";
        $theme_php_templates = glob($theme_php_templates_filepath);

        $templates = array_merge($plugin_php_templates, $theme_php_templates);

        // attaching the templates to the submenu template module selector

        if (!$templates)
            return $return;

        foreach ($templates as $template):

            $info = explode("/", $template);
            $filename = array_pop($info);
            $return[$template] = Acme::underscore($filename);

        endforeach;

        return $return;


    }

    static function get_custom_offcanvas_menu_templates($directory, $config = [])
    {

        // This is a wrapper function for the ACF header offcanvas template option

        return Acme::get_templates($directory, $config);

    }

    static function acf_init_get_options_repeater_hack($name = false, $fields = false)
    {

        $return = [];
        if (!$name || !$fields) return $return;

        $repeater_count = get_option($name);

        for ($i = 0; $i < $repeater_count; $i++):

            foreach ($fields as $field)
                $return[$i][$field] = get_option("{$name}_{$i}_{$field}");

        endfor;

        return $return;

    }

    static function cpt_single_view_templates()
    {

        $return = [];

        $return[false] = "No Single View";

        $plugin_single_view_templates = INFINISITE_URI . "single_view_templates/*";
        $template_locations[] = glob($plugin_single_view_templates);

        $child_theme_single_view_templates = THEME_URI . "single_view_templates/*";
        $template_locations[] = glob($child_theme_single_view_templates);

        foreach ($template_locations as $templates)
            foreach ($templates as $template):

                $info = explode("/", $template);
                $dir_chop = 0;

                foreach ($info as $c => $directory)
                    if ($directory == 'wp-content')
                        $dir_chop = $c;

                $directory_path = '';

                for ($i = $dir_chop; $i < count($info); $i++)
                    $directory_path .= "/{$info[$i]}";

                $filename = array_pop($info);
                $return[$directory_path] = $filename;

            endforeach;


        return $return;

    }

    static function posts_to_archive($posts = false, $filepath = false)
    {

        if (!$posts || !$filepath) return false;

        $return = '';

        $twig = substr($filepath, -4, 4) == 'twig';

        if (is_a($posts, 'WP_Post'))
            $posts = [$posts];

        if (!$twig) return false;

        $loader = new \Twig_Loader_Array([
            'template' => file_get_contents($filepath)
        ]);

        $twig = new \Twig_Environment($loader, [
            'debug' => true
        ]);
        $twig->addExtension(new \Twig_Extension_Debug());

        foreach ($posts as $post)
            $return .= $twig->render('template',
                [
                    'post' => $post,
                    'fields' => get_fields($post->ID),
                    'permalink' => get_permalink($post->ID)
                ]);

        return $return;

    }

    static function get_is_global_color_roles()
    {

        // TODO: rewrite me using the global get_colors() function

        $return = [];

        $global_color_roles = [
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

        $mods = ['light', 'dark', 'xlight', 'xdark', 'xxlight', 'xxdark'];
        $exclude = ['white', 'black'];

        foreach ($global_color_roles as $color):
            if (in_array($color, $exclude))
                continue;
            foreach ($mods as $mod)
                $return["{$color}_{$mod}"] = "$color - $mod";
        endforeach;

        return $return;

    }

    static function update_IS_utility_classes()
    {

        return;

        $palette = new Palette();

        $palette->update_utility_classes();

    }


    static function build_get_colors_into_background_options_select_choices()
    {

        $return = [];

        foreach (Acme::get_colors() as $role => $value):

            $original_role = $role;

            if (isset($color['choices'][$value])):
                $current_label = $color['choices'][$value];
                $new_label = $role;
                $return[$original_role] = "$current_label / $new_label ";
                continue;
            endif;
            $return[$original_role] = $role;
        endforeach;

        return $return;
    }

    static function get_palette_color_by_role_name($role_name = false)
    {

        $return = false;

        if (!$role_name) return $return;

        $color_lookup = Acme::get_colors();

        $chosen_color = '#ffffff';

        foreach ($color_lookup as $role => $value):
            if ($role != $role_name) continue;

            $chosen_color = $global_color;

        endforeach;

        return $chosen_color;

    }

    static function get_fontawesome_icons_for_acf_select()
    {

        $fonts = [];
        // this string is set in the included file. we should do this better.
        $font_awesome = '';
        include(INFINISITE_URI . 'assets/font-awesome-5/fa-5-free-lookup.php');

        foreach ($font_awesome as $key => $value)
            $fonts[$key] = $value;


        return $fonts;

    }

    static function get_fontawesome_sizes_for_acf_select()
    {

        $sizes = [
            'fa-xs' => '.75',
            'fa-sm' => '.875',
            '' => '1',
            'fa-lg' => '1.33',
        ];

        for ($i = 2; $i <= 20; $i++)
            $sizes["fa-{$i}x"] = "{$i}x";

        return $sizes;
    }


    static function paginate($query = false)
    {


        if (!function_exists('wp_pagenavi')) return 'install pagenavi plugin';

        // TODO: change detection - check if query object is of type SWP
//        if (isset($_GET['keyword'])):
//            return Acme::get_swp_pagination($query);
//        endif;


        if (!$query):
            wp_pagenavi();
            return;
        endif;

        wp_pagenavi(['query' => $query]);

    }

    static function get_pagination($query = false, $archive_object = false)
    {

        $wp_query = NULL;
        $wp_query = $query;

        $id = $archive_object ? $archive_object->id_tag : "archive_1";

        $vars_for_query_string = $_GET;

        unset($vars_for_query_string[$id]['paged']);

        $query_string = http_build_query($vars_for_query_string);


        $pagination_html = paginate_links(array(
            'base' => "?{$id}[paged]=%_%&{$query_string}",
            'format' => "%#%",
            'type' => 'list',
            'current' => max(1, $archive_object->query_args['page']),
            'total' => $query->max_num_pages
        ));

        return $pagination_html;
    }

    static function get_swp_pagination($query = false)
    {


        $pagination = paginate_links([
            'format' => '?page=%#%',
            'base' => '%_test_%',
            'current' => get_query_var("page"),
            'total' => $query->max_num_pages,
        ]);

        print wp_kses_post($pagination);
        return;


    }

    // set for deprecaition
    static function x_set_is_color_palette()
    {

        /*
         * this function should only run if get_colors fails
         * and we need to send back some colors
         */

        $roles = [
            ['primary', '#00a2a4'],
            ['secondary', '#f24900'],
            ['tertiary', '#666666'],
            ['accent', '#e5001c'],
            ['warning', '#ffae00'],
            ['success', '#3adb76'],
            ['alert', '#dd3333'],
            ['white', '#fefefe'],
            ['gray', '#cacaca'],
            ['black', '#0a0a0a'],
        ];

        $color_mods = [
            'xxdark',
            'xdark',
            'dark',
            'light',
            'xlight',
            'xxlight'
        ];


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


        foreach ($roles as $c => $role):

            $color = $role[1];
            $role = $role[0];

            $colors_for_database[] = [
                'role' => $role,
                'value' => $color
            ];

            // we don't generate shades of white or black.
            if ($role == 'white' || $role == 'black')
                continue;


            foreach ($color_mods as $mod):


                $dark_mod = strpos($mod, 'dark');
                $light_mod = strpos($mod, 'light');

                $color_mod = $dark_mod === false ? 'lighten' : 'darken';

                $color_mod_strength = 0;

                if ($dark_mod === false) $color_mod_strength = $light_mod;
                if ($light_mod === false) $color_mod_strength = $dark_mod;

                $color_mod_value = 0;

                switch ($color_mod_strength):
                    case 0:
                        $color_mod_value = 10;
                        break;
                    case 1:
                        $color_mod_value = 20;
                        break;
                    case 2:
                        $color_mod_value = 35;
                        break;

                endswitch;

                $scss_code_to_compile = ".style {color: $color_mod($color, $color_mod_value);}";
                $compiled_style_to_adjust = $scss->compile($scss_code_to_compile);
                // $debug .= $compiled_style_to_adjust;

                $updated_color_value = substr($compiled_style_to_adjust, 16, 7);

                if (strpos($updated_color_value, ';'))
                    $updated_color_value = substr($updated_color_value, 0, 4);

                $colors_for_database[] = [
                    'role' => "{$role}_{$mod}",
                    'value' => $updated_color_value
                ];

            endforeach;

        endforeach;

        foreach ($colors_for_database as $field)
            \update_option("options_is_pb_global_color_palette_{$field['role']}", $field['value']);

        return true;


    }

    static function get_all_posts_by_type($post_type = false)
    {
        if (!$post_type) return false;

        $query = new \WP_Query([
            'post_type' => $post_type,
            'posts_per_page' => -1
        ]);

        return $query->posts;

    }

    static function get_all_searchable_post_types_excluding($post_types_to_exclude = false)
    {

        if (!$post_types_to_exclude) return false;

        if (!is_array($post_types_to_exclude)) $post_types_to_exclude = [$post_types_to_exclude];

        $post_types = \get_post_types([
            'exclude_from_search' => 0
        ]);

        foreach ($post_types_to_exclude as $type)
            unset($post_types[$type]);

        return $post_types;

    }

    static function get_is_post_types()
    {

        /*
         * outputs an array of the post types defined in the is post type builer
         */

        $return = ['post', 'page'];

        $count = get_option('options_is_global_post_types');

        for ($i = 0; $i < $count; $i++)
            $return[] = get_option("options_is_global_post_types_{$i}_post_type");

        return $return;

    }

    static function get_post_types_for_page_builder_field()
    {

        $post_types = Acme::get_is_post_types();

        $return = [];

        foreach ($post_types as $post_type)
            $return[$post_type] = $post_type;

        return $return;


    }

    static function get_categories_for_page_builder_filter_object()
    {

        $return = [];

        $post_types = Acme::get_is_post_types();


        $taxonomies = Acme::get_acf_global_option('options_custom_taxonomies');


        foreach ($post_types as $post_type):

            $this_term_applies_to_this_post_type = false;
            $taxonomy_for_filter = false;

            if ($taxonomies)
                foreach ($taxonomies as $taxonomy)
                    if (in_array($post_type, $taxonomy['post_types'])):
                        $this_term_applies_to_this_post_type = true;
                        $taxonomy_for_filter[] = $taxonomy;
                    endif;

            if (!$this_term_applies_to_this_post_type) continue;

            $return_taxonomies = $taxonomy_for_filter;

            foreach ($return_taxonomies as $taxonomy)
                $return[$post_type][$taxonomy['term']] = $taxonomy['name'];


        endforeach;


        return $return;

    }

    static function get_acf_global_option($name)
    {

        global $wpdb;
        $rows = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}options WHERE option_name = '$name'", OBJECT);

        if (!isset($rows[0])) return false;

        $field_count = $rows[0]->option_value;

        $return = [];

        for ($i = 0; $i < $field_count; $i++):
            $prefix = "{$name}_{$i}_";


            $fields = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}options WHERE option_name LIKE '{$prefix}%'", OBJECT);

            foreach ($fields as $field):
                $field_name = substr($field->option_name, strlen($prefix));

                if (Acme::is_serialized($field->option_value)):
                    $return[$i][$field_name] = unserialize($field->option_value);
                    continue;
                endif;

                $return[$i][$field_name] = $field->option_value;

            endforeach;


        endfor;

        return $return;


    }

    static function fix_up_repeater_fields($repeater = [], $title = '')
    {

        /**
         * this function is to build out repeater fields that have
         * been loaded before acf init. one day i'll just rip that
         * code myself.
         *
         * TODO: work in refactoring in case element is a repeater
         */

        $return = [];

        if (!count($repeater)) return $return;
        if ($title == '') return $return;


        for ($i = 0; $i < $repeater[$title]; $i++):


            foreach ($repeater as $key => $value):

                if ($title == $key) continue;

                if (strpos($key, $title) === false):
                    $return[$key] = $value;
                    continue;
                endif;


                $field_title = substr($key, strlen($title));

                $double_digit_field_check = is_numeric(substr($field_title, 2, 1));
                $num_count = $double_digit_field_check ? 2 : 1;

                $field_index = substr($field_title, 1, $num_count);
                $field_value = substr($field_title, $num_count + 2);

                $return[$title][$field_index][$field_value] = $value;


            endforeach;
        endfor;

        return $return;


    }

    static function is_serialized($value, &$result = null)
    {
        // Bit of a give away this one
        if (!is_string($value)) {
            return false;
        }
        // Serialized false, return true. unserialize() returns false on an
        // invalid string or it could return false if the string is serialized
        // false, eliminate that possibility.
        if ($value === 'b:0;') {
            $result = false;
            return true;
        }
        $length = strlen($value);
        $end = '';
        switch ($value[0]) {
            case 's':
                if ($value[$length - 2] !== '"') {
                    return false;
                }
            case 'b':
            case 'i':
            case 'd':
                // This looks odd but it is quicker than isset()ing
                $end .= ';';
            case 'a':
            case 'O':
                $end .= '}';
                if ($value[1] !== ':') {
                    return false;
                }
                switch ($value[2]) {
                    case 0:
                    case 1:
                    case 2:
                    case 3:
                    case 4:
                    case 5:
                    case 6:
                    case 7:
                    case 8:
                    case 9:
                        break;
                    default:
                        return false;
                }
            case 'N':
                $end .= ';';
                if ($value[$length - 1] !== $end[0]) {
                    return false;
                }
                break;
            default:
                return false;
        }
        if (($result = @unserialize($value)) === false) {
            $result = null;
            return false;
        }
        return true;
    }

    static function get_searchwp_engines_for_page_builder_filter_object()
    {

        $swp_options = get_option("searchwp_settings");

        $return = [];

        if (!$swp_options) return;
        foreach ($swp_options['engines'] as $name => $option)
            $return[$name] = $name;

        return $return;

    }

    /**
     * Shortcut to simplify a standard loop. You simply provide a template part path and the loop is handled for you.
     *
     * @param string $part The template part to load
     * @param string $no_part The template part to load if there are no results
     */
    public static function loop($part, $no_part = '')
    {
        // START the loop
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                get_template_part($part, get_post_format());
            }
        } else if (!empty($no_part)) {
            get_template_part($no_part);
        }
        // END the loop
    }


    /**
     * Shortcut to simplify a loop that uses a custom query. You can provide either a WP_Query object or an array of
     * query arguments if you want the object created for you. The loop will then be performed and the appropriate
     * specified template part will be loaded. You can also specify a custom name for the query object variable to
     * prevent collisions.
     *
     * Note that template parts are loaded by include, NOT by get_template_part(). This is because get_template_part()
     * blocks access to the custom query variable unless a global statement pulls it into the template.
     *
     * @todo Ensure there's a way to use pagination inside the custom loop
     *
     * @param mixed $custom_query Required. Either a WP_Query object or an array of arguments to perform a new query.
     * @param string $part Required. The theme-relative template part to load.
     * @param string $no_part Optional. The theme-relative template part to load if there are no results.
     * @param string $var_name Optional. The variable name (without $) you want to use for accessing the query within template parts. Default: 'query'.
     *
     * @return bool Returns false if nothing to show.
     */
    public static function custom_loop($custom_query, $part, $no_part = '', $var_name = 'query')
    {

        // Set up the custom named query variable
        if (is_array($custom_query) || is_string($custom_query)) {
            $$var_name = new \WP_Query($custom_query);
        } else if (is_a($custom_query, '\WP_Query')) {
            $$var_name = &$custom_query;
        } else {
            return false;
        }

        // START the loop
        if ($$var_name->have_posts()) {
            while ($$var_name->have_posts()) {
                $$var_name->the_post();
                do_action("get_template_part_{$part}", $part, null);
                $file = Core::i()->paths->theme . $part . '.php';
                include $file;
            }
        } else if (!empty($no_part)) {
            do_action("get_template_part_{$part}", $part, null);
            $file = Core::i()->paths->theme . $no_part . '.php';
            include $file;
        }

        wp_reset_query();
    }

    static function get_taxonomy_info($post = false)
    {

        if (!$post) return false;

        // this function builds out all the taxonomy info for a post

        $taxonomies = get_object_taxonomies($post->post_type, 'objects');


        $return = [];

        foreach ($taxonomies as $taxonomy):

            $terms = \wp_get_post_terms($post->ID, $taxonomy->name);

            $return[] = [
                'taxonomy' => $taxonomy,
                'terms' => $terms
            ];

        endforeach;

        return $return;

    }

    static function get_is_cpt_meta_field_select_options()
    {
        return [
            'name' => 'Name',
            'title' => 'Title',
            'image' => 'Image',
            'embed' => 'Embed',
            'file' => 'File',
            'link' => 'Link',
            'identification' => 'Identification',
            'subtitle' => 'Subtitle',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'location' => 'Location',
            'address_line_1' => 'Address Line 1',
            'address_line_2' => 'Address Line 2',
            'author_text' => 'Author (Text)',
            'author_post' => 'Author (Post)',
            'excerpt' => 'Excerpt',
            'content' => 'Content',
            'source' => 'Source',
            'hours' => 'Hours',
            'phone_number' => 'Phone Number',
            'email_address' => 'Email Address',
            'fax_number' => 'Fax Number',
            'facebook' => 'Facebook',
            'linkedin' => 'Linkedin',
            'youtube' => 'Youtube',
            'twitter' => 'Twitter',
            'instagram' => 'Instagram',
        ];
    }

    static function is_header_sticky($id = false)
    {


        $global_sticky = get_field("header_sticky_global", "options");

        return $global_sticky;

    }

    static function build_http_query_from_array($array)
    {

        $output = [];

        $walk = function ($item, $key, $parent_key = '') use (&$output, &$walk) {

            is_array($item)
                ? array_walk($item, $walk, $key)
                : $output[] = http_build_query(array($parent_key ?: $key => $item));

        };

        array_walk($array, $walk);

        return $output;
    }

    static function get_social_media_networks_for_header_and_footer()
    {

        $return = [];

        $sm_networks = Social::get_global_accounts();

        if ($sm_networks)
            foreach ($sm_networks as $network)
                $return[$network['username']] = "{$network['username']} ({$network['network']})";

        return $return;


    }

    static function prep_social_media_fields_for_templating($networks)
    {

        /**
         * this function bridges the gap between the acf select menu on the header
         * and footer options page with the social media definitions on the social
         * media account setup page. the issue is that while the field in the header
         * footer select menu is populated based on the information entered in the
         * social media accounts - but once it is set, it's not tied to it. so, if
         * a value on the social media page were to be updated or deleted, the
         * value stored in the header and footer won't update. so, we make the index
         * record the username - which is of course not a perfect solution.
         *
         * TODO: if there is more than one username, check the network as a backup
         *
         * so anyways - we use this function to grab the information from the database
         * and attach it to the information that we pass to the header and footer social
         * media template rendering functions
         */

        $updated_networks['template'] = $networks['template'];


        if (!$networks['select'])
            return $networks;

        foreach ($networks['select'] as $username)
            $updated_networks['select'][$username] = Social::get_account_info_by_username($username);

        return $updated_networks;

    }

    static function check_for_inline_display($element = false, $post_id = false)
    {

        if (!$element || !$post_id) return false;


        // TODO: do i need a way to be turned off based on taxonomy?

        $global_inline = get_field("{$element}_inside_first_row", "option");

        // TODO: i need a way to be turned off via post types
        $post_type_inline = false;

        $single_post_inline = get_field("inline_{$element}", $post_id);

        if ($global_inline || $post_type_inline || $single_post_inline)
            return true;

        return false;


    }

    static function get_gravity_forms()
    {

        $return = [];

        if (!class_exists('GFAPI')) return $return;

        $all_forms = \GFAPI::get_forms();

        foreach ($all_forms as $form)
            $return[$form['id']] = $form['title'];

        return $return;

    }

    static function get_menus_for_acf_module()
    {

        $return = [];
        $menus = get_terms(array(
            'taxonomy' => 'nav_menu',
        ));

        if ($menus)
            foreach ($menus as $menu)
                $return[$menu->slug] = $menu->name;

        return $return;

    }

    static function update_IS_app_scss()
    {

        /**
         * we're updating the site's app.css file here - we
         * need to do this when we update the plugin's color settings
         */

        try {
            $scss = new \Leafo\ScssPhp\Compiler();
            $scss->addImportPath(INFINISITE_URI . 'assets/scss/');
            $scss->addImportPath(INFINISITE_URI . 'bower_components/foundation-sites/scss/foundation/');

            $app_scss = file_get_contents(INFINISITE_URI . 'assets/scss/app.scss');

            $compiled_app_scss = $scss->compile($app_scss);

            // and here we update the stylesheet.
            $file = INFINISITE_URI . 'assets/css/app.css';
            return file_put_contents($file, $compiled_app_scss);
        } catch (exception $e) {
            print "Failed: $e";
        }



    }

}