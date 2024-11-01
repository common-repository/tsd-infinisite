<?

namespace TSD_Infinisite;

class Sidebar
{

    public $top_html = '';
    public $bottom_html = '';
    public $left_html = '';
    public $right_html = '';

    private $config = [];
    private $set_acf = [];


    public function __construct($id = false)
    {

        $this->build_config($id);
        $this->get_sidebar_set();
        $this->build_html();


    }


    private function build_config($id)
    {
        $this->config['id'] = $id;

        $this->config['set_name'] = get_post_meta($this->config['id'], 'sidebar_set', 1);
        $this->get_sidebar_acf();

    }

    private function get_sidebar_set()
    {


        // TODO: write code for global set

        // TODO: write code for post type set

        // TODO: write code for taxonomy set


        if (!array_key_exists('acf', $this->config)) return false;


        $title = Acme::slugify($this->config['acf']['title']);

        foreach ($this->config['acf']['is_global_sidebar_sets_sidebar_information'] as $c => $set):

            $position = $set['position'];
            $key = "global_sidebar_set_{$title}_{$position}_ispb";

            $heres_your_sidebar_acf_fields = get_field($key, "options");

            $this->set_acf[$c]['position'] = $position;
            $this->set_acf[$c]['content'] = 'rows here?';

        endforeach;


    }

    private function get_sidebar_acf()
    {
        $sidebar_sets = get_field("is_global_sidebar_sets", "options");

        if(!$sidebar_sets) return;


        $temp_acf_set = false;

        foreach ($sidebar_sets as $c => $set):
            $test_slug = Acme::slugify($set['title']);
            if ($this->config['set_name'] != $test_slug) continue;
            $temp_acf_set = $set;
        endforeach;

        $this->config['acf'] = $temp_acf_set;

    }

    private function build_html()
    {

        foreach ($this->set_acf as $sidebar_acf):

//            Acme::dbg($sidebar_acf);


            $obj_html_output = $sidebar_acf['position'] . "_html";

            $width = in_array($sidebar_acf['position'], ['left', 'right']) ? 'shrink' : '';


            $this->$obj_html_output = "
        
                <div class='cell $width'>
                    <p>{$sidebar_acf['position']}</p>
                    {$sidebar_acf['content']}
                </div>
        
        ";

        endforeach;


    }


    static function register_global_sidebar_options()
    {

        if (!function_exists('acf_add_options_page')) return;


        // creates the top level options page
        Sidebar::register_layout_builder_page();
        $iss_field_group_fn = Sidebar::build_global_sidebar_option_field_group();
        $iss_field_group = apply_filters("is_update_iss_field_group", $iss_field_group_fn);
        acf_add_local_field_group($iss_field_group);


        // creates the submenu pages
        Sidebar::register_layout_pages_and_fields();

        // creates the page builders for use in the submenus
        $iss_layout_builders_fn = Sidebar::get_sidebar_layout_builder();
        $iss_layout_builders = apply_filters("iss_update_layout_builder", $iss_layout_builders_fn);

        if ($iss_layout_builders)
            foreach ($iss_layout_builders as $iss_layout_builder)
                acf_add_local_field_group($iss_layout_builder);


    }

    static function register_layout_builder_page()
    {

        acf_add_options_page(array(
            'page_title' => 'IS Sidebar Sets',
            'menu_title' => 'IS Sidebar Sets',
            'menu_slug' => 'is-sidebar-sets',
            'capability' => 'edit_posts',
            'redirect' => false
        ));

    }

    static function register_layout_pages_and_fields()
    {

        $sidebar_sets = Acme::get_acf_global_option('options_is_global_sidebar_sets');

        if (!$sidebar_sets) return;

        foreach ($sidebar_sets as $c => $sidebar_set_config):

            $slug = Acme::slugify($sidebar_set_config['title']);

            acf_add_options_sub_page([
                'page_title' => "{$sidebar_set_config['title']} Settings",
                'menu_title' => "{$sidebar_set_config['title']}",
                'parent_slug' => 'is-sidebar-sets',
                'wp_admin_page_variable' => "{$slug}_settings",
            ]);

        endforeach;

    }

    static function build_global_sidebar_option_field_group()
    {


        $gso_field_set_name = [
            'key' => 'field_global_sidebar_sets_title',
            'label' => 'Title',
            'name' => 'title',
            'type' => 'text'
        ];


        $gso_sidebar_set_position = [
            'key' => 'field_gso_sidebar_set_position',
            'label' => 'Position',
            'name' => 'position',
            'type' => 'button_group',
            'ui' => 1,
            'required' => 1,
            'choices' => [
                'left' => 'Left',
                'right' => 'Right',
                'top' => 'Top',
                'bottom' => 'Bottom'
            ]
        ];

        $sizes = [
            'mobile' => 'Mobile',
            'tablet' => 'Tablet',
            'desktop' => 'Desktop',
            'large_desktop' => 'Large Desktop'
        ];

        $gso_sidebar_width_measurements = [];

        foreach ($sizes as $key => $value)
            $gso_sidebar_width_measurements[$key] = [
                'key' => "field_gso_sidebar_set_measurement_$key",
                'name' => $key,
                'label' => $value,
                'type' => 'text'
            ];

        // at the very least, we need to have a mobile value
        $gso_sidebar_width_measurements['mobile']['required'] = 1;
        // and typically, the mobile sidebar is going to go full width
        $gso_sidebar_width_measurements['mobile']['default_value'] = '100%';

        // TODO: a left sidebar is going to show at the top, we're going to need a fix for that.


        $gso_sidebar_set_measurement = [
            'key' => 'field_gso_sidebar_set_measurement',
            'label' => 'Measurement',
            'name' => 'measurement',
            'type' => 'group',
            'layout' => 'table',
            'sub_fields' => $gso_sidebar_width_measurements
        ];


        $gso_sidebar_set_fields = [
            $gso_sidebar_set_position,
            $gso_sidebar_set_measurement,
        ];

        $gso_field_sidebars = [
            'key' => 'field_global_sidebar_sets_sidebar_group_repeater_sidebars',
            'label' => 'Sidebars',
            'name' => 'is_global_sidebar_sets_sidebar_information',
            'type' => 'repeater',
            'layout' => 'table',
            'button_label' => 'Add Sidebar to Set',
            'min' => 1,
            'max' => 4,
            'sub_fields' => $gso_sidebar_set_fields
        ];

        $gso_field_set_fields = [
            $gso_field_set_name,
            $gso_field_sidebars
        ];

        $gso_field_set = [
            'key' => 'field_global_sidebar_sets_sidebar_group_repeater',
            'label' => 'Sets',
            'name' => 'is_global_sidebar_sets',
            'type' => 'repeater',
            'layout' => 'block',
            'button_label' => 'Add Sidebar Set',
            'instructions' => 'Sidebar sets are selectable on all posts',
            'sub_fields' => $gso_field_set_fields
        ];

        // our builder here is a repeater with one "set"
        $gso_fields = [
            $gso_field_set
        ];

        $gso_field_group = [
            'key' => 'field_global_sidebar_sets_field_group',
            'type' => 'flexible_content',
            'title' => 'Global Sidebar Options',
            'fields' => $gso_fields,
            'location' => [
                [
                    [
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'is-sidebar-sets',
                    ]
                ],
            ],
        ];

        return $gso_field_group;


    }

    static function get_sidebar_layout_builder()
    {


        $sidebar_sets = get_field("is_global_sidebar_sets", "options");
        $return = [];

        $lookup = ['left', 'right', 'top', 'bottom'];

        if (!$sidebar_sets) return;

        foreach ($sidebar_sets as $c => $sidebar_config):

            $slug = Acme::slugify($sidebar_config['title']);
            $sidebars = $sidebar_config['is_global_sidebar_sets_sidebar_information'];

            if (!count($sidebars)) continue;

            $sidebar_config_field_group = [];

            foreach ($sidebars as $d => $sidebar):


                $gso_pb_repeater = Page_Builder::get_pagebuilder_layouts([
                    'key' => "field_global_sidebar_set_{$slug}_{$d}_ispb_layouts",
                    'name' => 'is_sidebar_set_builder_layouts'
                ]);

                $field_group_label = ucwords($sidebar['position']) . " Sidebar";
                $position = $lookup[$d];

                $sidebar_config_field_group[] = [
                    'key' => "field_global_sidebar_set_{$slug}_{$position}_ispb",
                    'label' => $field_group_label,
                    'name' => "global_sidebar_set_{$slug}_{$position}_ispb",
                    'type' => 'group',
                    'sub_fields' => [$gso_pb_repeater],
                ];


            endforeach;

            $return[] = [
                'key' => "is_sidebar_set_{$sidebar_config['title']}_settings",
                'title' => "Sidebar Layouts",
                'fields' => $sidebar_config_field_group,
                'location' => [
                    [
                        [
                            'param' => 'options_page',
                            'operator' => '==',
                            'value' => "acf-options-{$slug}",
                        ],
                    ],
                ],
            ];

        endforeach;


        return $return;

    }

    static function get_sets_for_ispb_select_menu()
    {

        $return = [
            false => 'None'
        ];
        $sidebar_sets = get_field("is_global_sidebar_sets", "options");

        if (!$sidebar_sets) return $return;

        foreach ($sidebar_sets as $sidebar_set):
            $slug = str_replace(' ', '-', strtolower($sidebar_set['title']));
            $return[$slug] = $sidebar_set['title'];
        endforeach;

        return $return;


    }


}