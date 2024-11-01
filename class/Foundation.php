<?

namespace TSD_Infinisite;

class Foundation
{

    public function __construct($fields)
    {

        $this->fields = $fields;

    }

    static function create_foundation_configuration()
    {

        $foundation_field_group = self::build_foundation_field_group();

        // $foundation_field_group = apply_filters('update_foundation_field_group', $foundation_field_group);

        acf_add_local_field_group($foundation_field_group);

        // this is for testing - if we get an error, we don't return this true statement.
        return true;
    }


    public static function init_foundation_config()
    {

        /**
         * Creates the initial foundation configuration
         *
         * This function runs when the plugin is turned on.
         *
         * We cycle through the foundation options - if we don't have a value
         * (ie: the plugin is running the first time), we update the value of the
         * database field with the 'default_value' of the acf field definition
         *
         * Why do we need to update the fields you ask? Because we are compiling
         * a stylesheet for foundation on plugin init - so that users can drop
         * the plugin in and start building without needing to go to the IS Foundation
         * options page.
         *
         * If there is already a field value, that means the plugin has run on this
         * build already, and we shouldn't update said value because it would be
         * wiping out customer data. We try to avoid this.
         *
         */


        Foundation::create_foundation_configuration();

        $init_array = Foundation::build_foundation_inital_array();

        foreach ($init_array as $acf_field)
            if (!get_option("options_{$acf_field['key']}"))
                update_field($acf_field['key'], $acf_field['default_value'], 'option');

        Foundation::update_scss();
    }


    function my_error_notice()
    {
        ?>
        <div class="updated is-dismissible notice">
            <h2>Content Here</h2>
        </div>
        <?php
    }


    static function build_foundation_field_group()
    {


        $foundation_global_options_fields = '';
        include(INFINISITE_URI . 'assets/acme/foundation6-4-3_global_options_fields.php');


        $foundation_field_group = [
            'key' => 'field_is_foundation_settings',
            'title' => 'Foundation Options',
            'location' => [
                [
                    [
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'acf-options-foundation',
                    ],
                ],
            ],
            'fields' => $foundation_global_options_fields
        ];

        return $foundation_field_group;
    }

    static function get_acf_fields($default_value = false)
    {

        $options = acf_get_fields('field_is_foundation_settings');

        $fields = [];

        if (!$options) return $fields;

        foreach ($options as $item)
            $fields[$item['name']] = get_field($item['name'], 'option');

        return $fields;
    }

    static function update_scss($testing = false)
    {

        /*
         * this function calls the foundation settings from the database, builds out
         * the foundation settings scss stylesheet using said vars, then compiles
         * the foundation install in the bower_compoennts directory
         */

        // we're going to boot up the compiler here
        $scss = new \Leafo\ScssPhp\Compiler();
        $scss->addImportPath(INFINISITE_URI . '/assets/acme/');
        $scss->addImportPath(INFINISITE_URI . '/bower_components/foundation-sites/scss/');

        $foundation_for_compilation = self::generate_updated_scss($testing);

        // error_log($foundation_for_compilation);

        // here we build the sass
        $foundation_styles = $scss->compile($foundation_for_compilation);


        // update the utility classes using our new info
        Option::update_typography_options_scss();


        // and here we update the stylesheet.
        $file = INFINISITE_URI . 'assets/css/is_foundation_styles.css';
        return file_put_contents($file, $foundation_styles);


    }


    static function generate_updated_scss($testing = false)
    {

        // this function doesn't require the foundation options to be in place

        // this is where the settings file is put together
        $foundation_for_compilation = '';
        $fields = self::get_acf_fields();
        // this gets used in the included file
        $helper = new Foundation($fields);
        $global_scss_header = get_field("is_global_scss", "options");
        //error_log('checking fields: ' . print_r($fields,1));
        include(INFINISITE_URI . 'assets/acme/foundation6-4-3_settings.php');
        return $global_scss_header . $foundation_for_compilation;

    }

    static function get_generated_css()
    {
        $styles = file_get_contents(INFINISITE_URI . 'assets/css/is_foundation_styles.css');
        return $styles;

    }

    static function foundation_backup($name, $default)
    {

        $field = get_field($name, "options");


        return $field ? $field : $default;

    }


    public function foundation_default($option, $fallback)
    {

        $default_option = get_field($option, "options");

        if (substr($default_option, 0, 11) == 'scale_color') return '#123456';

        $fallback_acf = get_field($fallback, "option");

//        if($default_option == $fallback_acf)


        /*
         * primary = blue
         * fallback = blue
         *
         * output anchor = blue
         *
         * primary = red
         * anchor = (undefined)
         *
         *
         */

        if ($default_option)
            return $default_option . ' /* default */';


        if ($fallback_acf)
            return $fallback_acf . ' /* fallback */ ';

        return $fallback;


        $acf_option = get_field($option, 'options');

        // no color scaling!
        if (substr($acf_option, 0, 11) == 'scale_color') return '#f00';

        if (!is_null($acf_option) && $acf_option != '') return $acf_option;


        $acf_fallback = get_field($fallback, 'options');

        if (!is_null($acf_fallback) && $acf_fallback != '')
            return $acf_fallback;


        // there are double backups in foundation - items
        // that will default to something that defaults to
        // something else. it's always something.


        switch ($fallback):
            case 'body_font_color':
                $fallback = 'black';
                break;

            case 'body_background':
                $fallback = 'white';
                break;

            case 'anchor_color':
                $fallback = 'is_foundation_color_palette_primary';
                break;


        endswitch;


        if ($fallback === 'NULL')
            return '*** UPDATE NEEDED ***';

//        if (preg_match('/\s/', $fallback))
//            return "*** MORE THAN VARIALBE ***";

        $fallback_acf = get_field($fallback, 'options');

        if (!is_null($fallback_acf) && $fallback_acf == '')
            return "$fallback";

        return $fallback_acf;

    }

    public static function get_default_palette()
    {

        /*
         * this is for creating fallback values for builds that don't
         * have default values set up
         */
        return "
            \$primary-color: #1779ba;
            \$secondary-color: #767676;
            \$success-color: #3adb76;
            \$warning-color: #ffae00;
            \$alert-color: #cc4b37;
            \$light_gray: #e6e6e6;
            \$medium_gray: #cacaca;
            \$dark_gray: #8a8a8a;
            \$black: #0a0a0a;
            \$white: #fefefe;
        ";


    }

    public function foundation_palette()
    {


        $acme_colors = Acme::get_colors();


        $return = "(";

        foreach ($acme_colors as $role => $color)
            $return .= "{$role} : {$color}, ";

        $return .= ")";


        return $return;
    }

    private static function process_field($field, $parent_field = false)
    {
        // we're having a problem with fields set as the int 0
        // TODO: all foundation fields required?
        // if (!$field['default_value']) return false;
        return [
            'key' => $field['name'],
            'default_value' => $field['default_value']
        ];
    }

    public static function build_foundation_inital_array($dbg = false)
    {

        $foundation_global_options_fields = '';
        include(INFINISITE_URI . 'assets/acme/foundation6-4-3_global_options_fields.php');


        $leftovers = [];
        $primary_init_array = [];


        foreach ($foundation_global_options_fields as $acf_field):

            $field_types_to_ignore = [
                'tab', 'message'
            ];

            if (in_array($acf_field['type'], $field_types_to_ignore)):
                $leftovers[] = $acf_field;
                continue;
            endif;


            if ($acf_field['type'] == 'group'):
                foreach ($acf_field['sub_fields'] as $sub_field):
                    $primary_init_array[] = self::process_field($sub_field, $acf_field);
                endforeach;
                continue;
            endif;


            if (is_null($acf_field['default_value'])):
                $leftovers[] = $acf_field;
                continue;
            endif;

            $primary_init_array[] = self::process_field($acf_field);


        endforeach;

        return $dbg ? [$primary_init_array, $leftovers] : $primary_init_array;

    }

    public static function get_options()
    {
        $field_group = acf_get_fields("field_is_foundation_settings");
        $return = [];
        foreach ($field_group as $field):
            if (!isset($field['name'])) continue;
            if ($field['name'] == '') continue;

            $return[$field['name']] = get_field($field['name'], 'options');
        endforeach;

        return $return;

    }
}