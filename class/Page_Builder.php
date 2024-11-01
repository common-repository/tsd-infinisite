<?


namespace TSD_Infinisite;

class Page_Builder
{

    public function __construct()
    {


    }


    public static function create_pagebuilder_layout()
    {

        $page_builder_field_group = self::build_page_builder_field_group();

        $page_builder_field_group = apply_filters('update_is_pagebuilder_fields', $page_builder_field_group);

        acf_add_local_field_group($page_builder_field_group);

    }

    public static function get_pagebuilder_layouts($config = false)
    {

        if (!$config) return false;

        $field_group = self::build_page_builder_field_group($config);

        $updated_field_group = apply_filters("update_is_pagebuilder_fields", $field_group);

        $layouts = $updated_field_group['fields'][1];

        if ($config['label'])
            $layouts['label'] = $config['label'];

        return $layouts;

    }

    private static function build_page_builder_field_group($config = false)
    {

        $ispb_row_config_background_options = [
            'key' => 'field_ispb_row_config_background_options',
            'label' => 'Background Options',
            'name' => 'ispb_row_background_options',
            'type' => 'group',
            'sub_fields' => ACF::get_background_display_options('field_ispb_row_config_background_options', [
                'color', 'image'
            ])
        ];

        $ispb_row_config_max_width_group = ACF::get_row_width_height(
            'field_ispb_row_dimensions', [
                'wrapper' => [
                    'width' => 33
                ]
            ]
        );

        $ispb_row_config_flex_align_classes = ACF::get_flexbox_alignment_classes_group(
            'field_ispb_row_flex_align', [
                'wrapper' => [
                    'width' => 33
                ]
            ]
        );

        $ispb_row_config_top_bottom_spacing = ACF::get_row_spacers(
            'field_ispb_row_spacers', [
                'wrapper' => [
                    'width' => 33
                ]
            ]
        );


        $ispb_row_config_row_id = [
            'key' => 'field_ispb_row_config_row_id_tag',
            'label' => 'Row ID Tag',
            'name' => 'row_id',
            'type' => 'text',
            'wrapper' => [
                'width' => 25
            ],
        ];

        $ispb_cell_config_background_options = [
            'key' => 'field_ispb_cell_config_background_options',
            'label' => 'Background Options',
            'name' => 'cell_background_options',
            'type' => 'group',
            'sub_fields' => ACF::get_background_display_options('field_ispb_cell_config_background_options', [
                'color', 'image'
            ])
        ];


        // this is the primary content container.
        // the $layouts var has all the page builder layouts

        $ispb_cell_config_col_width = [
            'key' => 'field_ispb_cell_config_col_width',
            'label' => 'Cell Width',
            'name' => 'cell_column_width',
            'type' => 'group',
            'wrapper' => [
                'width' => 50
            ],
            'sub_fields' => [
                [
                    'key' => 'field_ispb_cell_config_col_width_mobile',
                    'label' => 'Mobile',
                    'name' => 'mobile',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 25
                    ],
                    'default_value' => 12
                ],
                [
                    'key' => 'field_ispb_cell_config_col_width_tablet',
                    'label' => 'Tablet',
                    'name' => 'tablet',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 25
                    ],
                ],
                [
                    'key' => 'field_ispb_cell_config_col_width_desktop',
                    'label' => 'Desktop',
                    'name' => 'desktop',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 25
                    ],
                ],
                [
                    'key' => 'field_ispb_cell_config_col_width_large_desktop',
                    'label' => 'Large Desktop',
                    'name' => 'large_desktop',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 25
                    ],
                ],
            ]
        ];

        $ispb_cell_config_vertical_self_alignment = [
            'key' => 'field_ispb_cell_config_vertical_self_alignment',
            'label' => 'Vertical Self Alignment',
            'name' => 'cell_vertical_self_alignment',
            'type' => 'select',
            'ui' => '1',
            'allow_null' => 1,
            'wrapper' => [
                'width' => 25
            ],
            'choices' => [
                'top' => 'Top',
                'middle' => 'Middle',
                'bottom' => 'Bottom'
            ]
        ];

        $ispb_cell_config_cell_id = [
            'key' => 'field_ispb_cell_config_cell_id_tag',
            'label' => 'Cell ID Tag',
            'name' => 'cell_id',
            'type' => 'text',
            'wrapper' => [
                'width' => 25
            ],
        ];


        /*
         *
         * here be the page builder creation
         *
         *
         */


        $infinisite_page_builder_layouts = self::get_page_builder_layouts();

        if (class_exists('GFAPI') && isset($gravity_form))
            $infinisite_page_builder_layouts[] = $gravity_form;

        $ispb_cell_layout_container = [
            'key' => 'field_ispb_cell_acf_fc_container',
            'name' => 'is_acf_fc_container',
            'type' => 'flexible_content',
            'button_label' => 'Add Module',
            'layouts' => $infinisite_page_builder_layouts
        ];

        $ispb_cell_scss_code = [
            'key' => 'field_ispb_cell_scss_code',
            'label' => 'SCSS Code',
            'name' => 'scss_code',
            'type' => 'textarea',
        ];

        $ispb_cell_repeater_fields = [
            ACF::get_horizontal_tab('Cell Layout Fields', 'field_ispb_cell_layout_fields'),
            $ispb_cell_layout_container,
            ACF::get_horizontal_tab('Cell Configuration', 'field_ispb_cell_configuration'),
            $ispb_cell_config_background_options,
            $ispb_cell_config_col_width,
            $ispb_cell_config_vertical_self_alignment,
            $ispb_cell_config_cell_id,
            ACF::get_horizontal_tab('Cell SCSS', 'field_ispb_cell_scss_tab'),
            $ispb_cell_scss_code,
        ];


        $ispb_cell_repeater = [
            'key' => 'field_ispb_cell_repeater',
            'name' => 'cells',
            'type' => 'repeater',
            'min' => 1,
            'button_label' => 'Add Cell',
            'layout' => 'block',
            'sub_fields' => $ispb_cell_repeater_fields
        ];

        $infinisite_row_config_options = [];

        $ispb_row_scss_code = [
            'key' => 'field_ispb_row_scss_code',
            'name' => 'scss_code',
            'type' => 'textarea',
        ];


        // this is the actual field group - we attach the builder
        // repeater to this

        $ispb_row_fields = [
            ACF::get_horizontal_tab('Row Cells', 'field_ispb_row_cells_tab'),
            $ispb_cell_repeater,
            ACF::get_horizontal_tab('Row Configuration', 'field_ispb_row_configuration_tab'),
            $ispb_row_config_background_options,
            $ispb_row_config_max_width_group,
            $ispb_row_config_flex_align_classes,
            $ispb_row_config_top_bottom_spacing,
            $ispb_row_config_row_id,
            ACF::get_horizontal_tab('Row SCSS', 'field_ispb_row_scss_tab'),
            $ispb_row_scss_code,
        ];

        $pb_repeater_key = $config['key'] ? $config['key'] : 'field_ispb_row_repeater';
        $pb_repeater_name = $config['name'] ? $config['name'] : 'rows';

        $layout_key = 'group_5a0f028698500';


        $is_page_builder_repeater = [
            'name' => $pb_repeater_name,
            'type' => 'repeater',
            'layout' => 'block',
            'button_label' => 'Add Row',
            'key' => $pb_repeater_key,
            'min' => 1,
            'sub_fields' => $ispb_row_fields
        ];


        $ispb_page_config_inline_header = [
            'key' => 'field_ispb_page_config_inline_header',
            'name' => 'inline_header',
            'label' => 'Inline Header',
            'type' => 'true_false',
            'message' => 'Header in First Row',
            'wrapper' => [
                'width' => 25
            ]
        ];

        $ispb_page_config_inline_footer = [
            'key' => 'field_ispb_page_config_inline_footer',
            'name' => 'inline_footer',
            'label' => 'Inline Footer',
            'type' => 'true_false',
            'message' => 'Footer in Last Row',
            'wrapper' => [
                'width' => 25
            ]
        ];

        $ispb_page_config_hide_header = [
            'key' => 'field_ispb_page_config_hide_header',
            'name' => 'hide_header',
            'label' => 'Hide Header',
            'type' => 'true_false',
            'wrapper' => [
                'width' => 25
            ]
        ];

        $ispb_page_config_hide_footer = [
            'key' => 'field_ispb_page_config_hide_footer',
            'name' => 'hide_footer',
            'label' => 'Hide Footer',
            'type' => 'true_false',
            'wrapper' => [
                'width' => 25
            ]
        ];

        $ispb_page_config_sidebar_set = [
            'key' => 'field_ispb_page_sidebar_set',
            'name' => 'sidebar_set',
            'label' => 'Sidebar Set',
            'type' => 'select',
            'ui' => 1,
            'choices' => Sidebar::get_sets_for_ispb_select_menu(),
            'wrapper' => [
                'width' => 50
            ]
        ];

        $ispb_page_scss_code = [
            'key' => 'field_ispb_page_scss_code',
            'name' => 'scss_code',
            'label' => 'SCSS',
            'type' => 'textarea',
        ];

        $page_builder_field_group = [
            'key' => $layout_key,
            'title' => 'Infinisite Page Builder',
            'location' => [
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'post',
                    ],
                ],
                [
                    [
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'page',
                    ],
                ],
            ],
            'fields' => [
                ACF::get_horizontal_tab('Layout', 'field_ispb_content_editor'),
                $is_page_builder_repeater,
                ACF::get_horizontal_tab('Page Config', 'field_ispb_page_config'),
                $ispb_page_config_inline_header,
                $ispb_page_config_inline_footer,
                $ispb_page_config_hide_header,
                $ispb_page_config_hide_footer,
                $ispb_page_config_sidebar_set,
                ACF::get_horizontal_tab('Page SCSS', 'field_ispb_page_scss'),
                $ispb_page_scss_code,
            ]
        ];

        // we are attaching the page builder to all the post types
        // that ask for it

        // TODO: is this being called in init? we have to check for the post type array

        $custom_post_types = Acme::get_post_types();
        if (is_array($custom_post_types))
            if ($custom_post_types)
                foreach ($custom_post_types as $post_type)
                    if (isset($post_type['config']['page_builder']))
                        $page_builder_field_group['location'][][] = [
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => $post_type['post_type']
                        ];

        return $page_builder_field_group;
    }

    public static function get_page_builder_layouts($prefix = false)
    {

        // Given that we're building page builder Modules here, we have moved
        // this information into the module file.

        return Module::get_acf_module_information_for_registration();

    }

}