<?

namespace TSD_Infinisite;

class Maintenance
{

    public function __construct()
    {

        $this->active = $this->is_active();


    }

    public function is_active()
    {

        $active = false;

        if (get_option('options_is_maintenance_mode_display')) $active = true;

        return $active;

    }

    static function create_config_page()
    {

        $maintenance_config_field_group = self::create_config_page_field_group();

        acf_add_local_field_group($maintenance_config_field_group);

    }

    static function create_config_page_field_group()
    {

        $display_config_page = [
            'key' => 'field_is_maintenance_toggle',
            'name' => 'is_maintenance_mode_display',
            'label' => 'Display Maintenance Mode',
            'type' => 'true_false'
        ];

        $maintenance_page_builder = Page_Builder::get_pagebuilder_layouts([
            'key' => 'field_is_maintenance_builder_page_builder',
            'name' => 'is_maintenance_page_builder'
        ]);


        $config_page_field_group_fields = [
            $display_config_page,
            $maintenance_page_builder
        ];

        $config_page_field_group = [
            'key' => 'group_5a29673e16f61',
            'title' => 'Maintenance Mode Config',
            'location' => [
                [
                    [
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'acf-options-maintenance',
                    ]
                ]
            ],
            'menu_order' => 0,
            'fields' => $config_page_field_group_fields
        ];


        return $config_page_field_group;

    }

    static function is_site_under_maintenance()
    {

        return get_field("is_maintenance_mode_display", "options");

    }

    static function display_maintenance_page()
    {

        // boot up our twig engine
        $loader = new \Twig_Loader_Filesystem(INFINISITE_URI . '/twig/maintenance');
        $twig = new \Twig_Environment($loader, [
            'debug' => true
        ]);
        $twig->addExtension(new \Twig_Extension_Debug());


        // get the content for the page
        $maintenance_content = get_field('is_maintenance_page_builder', "options");


        /**
         *
         * MAINTENANCE MODE IS BROKEN!!!
         *
         * THE PAGE BUILDER FUNCTION WAS REFACTORED
         *
         * TODO: FIND IT AND FIX IT!!
         *
         */

        $page_builder_html_output = $maintenance_content ?
//            Layout::build_page_builder_html_output($maintenance_content) :
            '<p>Maintenance mode broken! Maintenance::display_maintenance_page()</p>' :
            '<p>No Fields Found</p>';


        // and here we give up on our broken function
        return;


        $vars_for_twig_template = [
            'page_builder_content' => $page_builder_html_output
        ];

        try {
            $maintenance_html_output = $twig->render('coming_soon.twig', $vars_for_twig_template);
        } catch (exception $e) {
            $maintenance_html_output = "<h2>twig error in maintenance mode</h2>";
        }


        print $maintenance_html_output;


        $inline_stylesheet = Layout::generate_inline_styles_from_page_builer_object([
            'rows' => $maintenance_content
        ]);

        print $inline_stylesheet;

    }


}