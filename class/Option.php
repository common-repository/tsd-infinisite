<?

namespace TSD_Infinisite;

class Option
{

    public static function create_global_options()
    {

        $color_options = Option::create_global_color_options();
        $typography_options = Option::create_global_typography_options();
        $global_options = Option::create_global_scss_styles();

        acf_add_local_field_group($color_options);
        acf_add_local_field_group($typography_options);
        acf_add_local_field_group($global_options);

        return true;
    }

    static function create_global_color_options()
    {

        $is_global_color_palette_primary = [
            'key' => 'field_is_global_colors_palette_primary',
            'label' => 'Primary',
            'name' => 'primary',
            'type' => 'color_picker',
            'default_value' => '#08E698',
            'wrapper' => [
                'width' => 20
            ]
        ];

        $is_global_color_palette_secondary = [
            'key' => 'field_is_global_colors_palette_secondary',
            'label' => 'Secondary',
            'name' => 'secondary',
            'type' => 'color_picker',
            'default_value' => '#009294',
            'wrapper' => [
                'width' => 20
            ]
        ];

        $is_global_color_palette_tertiary = [
            'key' => 'field_is_global_colors_palette_tertiary',
            'label' => 'Tertiary',
            'name' => 'tertiary',
            'type' => 'color_picker',
            'default_value' => '#eb4f1c',
            'wrapper' => [
                'width' => 20
            ]
        ];

        $is_global_color_palette_accent = [
            'key' => 'field_is_global_colors_palette_accent',
            'label' => 'Accent',
            'name' => 'accent',
            'type' => 'color_picker',
            'default_value' => '#e5001c',
            'wrapper' => [
                'width' => 20
            ]
        ];

        $is_global_color_palette_warning = [
            'key' => 'field_is_global_colors_palette_warning',
            'label' => 'Warning',
            'name' => 'warning',
            'type' => 'color_picker',
            'default_value' => '#ffae00',
            'wrapper' => [
                'width' => 20
            ]
        ];

        $is_global_color_palette_success = [
            'key' => 'field_is_global_colors_palette_success',
            'label' => 'Success',
            'name' => 'success',
            'type' => 'color_picker',
            'default_value' => '#3adb76',
            'wrapper' => [
                'width' => 20
            ]
        ];

        $is_global_color_palette_alert = [
            'key' => 'field_is_global_colors_palette_alert',
            'label' => 'Alert',
            'name' => 'alert',
            'type' => 'color_picker',
            'default_value' => '#cc4b37',
            'wrapper' => [
                'width' => 20
            ]
        ];

        $is_global_color_palette_white = [
            'key' => 'field_is_global_colors_palette_white',
            'label' => 'White',
            'name' => 'white',
            'type' => 'color_picker',
            'default_value' => '#fefefe',
            'wrapper' => [
                'width' => 20
            ]
        ];

        $is_global_color_palette_gray = [
            'key' => 'field_is_global_colors_palette_gray',
            'label' => 'Gray',
            'name' => 'gray',
            'type' => 'color_picker',
            'default_value' => '#cacaca',
            'wrapper' => [
                'width' => 20
            ]
        ];

        $is_global_color_palette_black = [
            'key' => 'field_is_global_colors_palette_black',
            'label' => 'Black',
            'name' => 'black',
            'type' => 'color_picker',
            'default_value' => '#0a0a0a',
            'wrapper' => [
                'width' => 20
            ]
        ];

        $is_global_palette_fields = [
            $is_global_color_palette_primary,
            $is_global_color_palette_secondary,
            $is_global_color_palette_tertiary,
            $is_global_color_palette_accent,
            $is_global_color_palette_warning,
            $is_global_color_palette_success,
            $is_global_color_palette_alert,
            $is_global_color_palette_white,
            $is_global_color_palette_gray,
            $is_global_color_palette_black,
        ];

        $is_global_palette = [
            'key' => 'field_is_global_colors_palette',
            'name' => 'is_pb_global_color_palette',
            'label' => 'Infinisite Global Palette',
            'instructions' => 'It is from here that all colors flow.',
            'type' => 'group',
            'layout' => 'block',
            'sub_fields' => $is_global_palette_fields
        ];

        $global_options_colors_value = [
            'key' => 'field_is_global_colors_color_value',
            'label' => 'Color',
            'name' => 'value',
            'type' => 'color_picker',
            'required' => 1,
            'wrapper' => [
                'width' => '50'
            ]
        ];

        $global_options_colors_role = [
            'key' => 'field_is_global_colors_color_role',
            'label' => 'Role',
            'name' => 'role',
            'type' => 'select',
            'ui' => 1,
            'required' => 1,
            'choices' => Acme::get_is_global_color_roles(),
            'wrapper' => [
                'width' => '50'
            ]
        ];

        $global_color_options = [
            'key' => 'field_is_global_colors_color_repeater',
            'name' => 'is_pb_global_colors',
            'label' => 'Global Color Variables',
            'instructions' => 'Improve upon auto generation.',
            'type' => 'repeater',
            'layout' => 'table',
            'button_label' => 'Add New Color',
            'sub_fields' => [
                $global_options_colors_value,
                $global_options_colors_role,
            ]
        ];

        $global_color_fields = [
            $is_global_palette,
            $global_color_options
        ];

        $is_global_colors_field_group = [
            'key' => 'group_is_global_colors_group',
            'title' => 'Colors for SCSS Variables',
            'style' => 'seamless',
            'location' => [
                [
                    [
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'is-display-settings',
                    ]
                ]
            ],
            'fields' => $global_color_fields
        ];

        return $is_global_colors_field_group;


    }

    static function create_global_typography_options()
    {

        $heading_one_editor = [
            'key' => 'field_is_global_typography_heading_one_scss_editor',
            'instructions' => 'All styles will be wrapped with appropriate wrapper classes',
            'name' => 'is_global_type_heading_one_scss',
            'type' => 'textarea',
            'rows' => 18,
            'show_in_rest' => 1,
            'edit_in_rest' => 1,
            'wrapper' => [
                'class' => 'is_ace_editor theme_scss'
            ]
        ];

        $heading_two_editor = [
            'key' => 'field_is_global_typography_heading_two_scss_editor',
            'label' => 'Heading Two',
            'name' => 'is_global_type_heading_two_scss',
            'type' => 'textarea',
            'rows' => 18,
            'wrapper' => [
                'class' => 'is_ace_editor theme_scss'
            ]
        ];

        $heading_three_editor = [
            'key' => 'field_is_global_typography_heading_three_scss_editor',
            'label' => 'Heading Three',
            'name' => 'is_global_type_heading_three_scss',
            'type' => 'textarea',
            'rows' => 18,
            'wrapper' => [
                'class' => 'is_ace_editor theme_scss'
            ]
        ];

        $heading_four_editor = [
            'key' => 'field_is_global_typography_heading_four_scss_editor',
            'label' => 'Heading Four',
            'name' => 'is_global_type_heading_four_scss',
            'type' => 'textarea',
            'rows' => 18,
            'wrapper' => [
                'class' => 'is_ace_editor theme_scss'
            ]
        ];

        $heading_five_editor = [
            'key' => 'field_is_global_typography_heading_five_scss_editor',
            'label' => 'Heading Five',
            'name' => 'is_global_type_heading_five_scss',
            'type' => 'textarea',
            'rows' => 18,
            'wrapper' => [
                'class' => 'is_ace_editor theme_scss'
            ]
        ];

        $heading_six_editor = [
            'key' => 'field_is_global_typography_heading_six_scss_editor',
            'label' => 'Heading Six',
            'name' => 'is_global_type_heading_six_scss',
            'type' => 'textarea',
            'rows' => 18,
            'wrapper' => [
                'class' => 'is_ace_editor theme_scss'
            ]
        ];

        $unordered_list_editor = [
            'key' => 'field_is_global_typography_unordered_list_scss_editor',
            'label' => 'Unordered List Options',
            'name' => 'is_global_type_unordered_list_scss',
            'type' => 'textarea',
            'rows' => 18,
            'wrapper' => [
                'class' => 'is_ace_editor theme_scss'
            ]
        ];

        $ordered_list_editor = [
            'key' => 'field_is_global_typography_ordered_list_scss_editor',
            'label' => 'Ordered List Options',
            'name' => 'is_global_type_ordered_list_scss',
            'type' => 'textarea',
            'rows' => 18,
            'wrapper' => [
                'class' => 'is_ace_editor theme_scss'
            ]
        ];

        $paragraph_editor = [
            'key' => 'field_is_global_typography_paragraph_scss_editor',
            'label' => 'Paragraph Options',
            'name' => 'is_global_type_paragraph_scss',
            'type' => 'textarea',
            'rows' => 18,
            'wrapper' => [
                'class' => 'is_ace_editor theme_scss'
            ]
        ];

        $link_editor = [
            'key' => 'field_is_global_typography_link_scss_editor',
            'label' => 'Link Options',
            'name' => 'is_global_type_link_scss',
            'type' => 'textarea',
            'rows' => 18,
            'wrapper' => [
                'class' => 'is_ace_editor theme_scss'
            ]
        ];


        $global_typography_field_group_fields = [
            ACF::get_tab('field_5a29673e16874', 'Heading One'),
            $heading_one_editor,
            ACF::get_tab('field_5a29673e16a4e', 'Heading Two'),
            $heading_two_editor,
            ACF::get_tab('field_5a29673e16a9a', 'Heading Three'),
            $heading_three_editor,
            ACF::get_tab('field_5a29673e16ad7', 'Heading Four'),
            $heading_four_editor,
            ACF::get_tab('field_5a29673e16b15', 'Heading Five'),
            $heading_five_editor,
            ACF::get_tab('field_5a29673e16b56', 'Heading Six'),
            $heading_six_editor,
            ACF::get_tab('field_5a29673e16d7d', 'Unordered List'),
            $unordered_list_editor,
            ACF::get_tab('field_5a29673e16dbd', 'Ordered List'),
            $ordered_list_editor,
            ACF::get_tab('field_5a29673e16dfc', 'Paragraph'),
            $paragraph_editor,
            ACF::get_tab('field_5a29673e16e3c', 'Link'),
            $link_editor,
        ];


        $global_typography_field_group = [
            'key' => 'group_5a0dd7b76b9ee',
            'title' => 'Global Typography Options',
            'location' => [
                [
                    [
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'is-display-settings',
                    ]
                ]
            ],
            'menu_order' => 0,
            'fields' => $global_typography_field_group_fields
        ];

        return $global_typography_field_group;


    }

    static function create_global_scss_styles()
    {

        $global_scss_editor = [
            'key' => 'field_is_global_scss',
            'label' => 'Global SCSS Editor',
            'name' => 'is_global_scss',
            'type' => 'textarea',
            'instructions' => 'Veriables, mixins and fonts set here will be avialble to use sitewide. Use sparingly.',
            'rows' => 18,
            'show_in_rest' => 1,
            'edit_in_rest' => 1,
            'wrapper' => [
                'class' => 'is_ace_editor theme_scss'
            ]
        ];

        $global_scss_field_group_fields = [
            $global_scss_editor
        ];


        $global_scss_field_group = [
            'key' => 'group_is_global_scss',
            'title' => 'A Global SCSS Styles',
            'style' => 'seamless',
            'location' => [
                [
                    [
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'is-display-settings',
                    ]
                ]
            ],
            'menu_order' => 0,
            'fields' => $global_scss_field_group_fields
        ];

        return $global_scss_field_group;


    }


    static function register_acf_global_options_pages()
    {

        if (!function_exists('acf_add_options_page')) return;


        acf_add_options_page(array(
            'page_title' => '<i class="fas fa-check"></i> Infinisite Basic Display Settings',
            'menu_title' => 'InfiniSite',
            'menu_slug' => 'is-display-settings',
            'capability' => 'edit_posts',
            'redirect' => false
        ));

        // we refactor this to another function so we can get the data for the wp toolbar links
        $acf_options_pages = Option::get_acf_options_page_data();

        foreach ($acf_options_pages as $acf_options_page)
            acf_add_options_sub_page($acf_options_page);


        $post_types = Acme::get_post_types();

        acf_add_options_page(array(
            'page_title' => 'Builder',
            'menu_title' => 'IS Post Types',
            'menu_slug' => 'is-cpt-options',
            'capability' => 'edit_posts',
            'redirect' => false
        ));

        if ($post_types)
            if (count($post_types) && is_array($post_types))
                foreach ($post_types as $post_type):

                    acf_add_options_sub_page([
                        'page_title' => "{$post_type['name']} Post Type Settings",
                        'menu_title' => "{$post_type['post_type']}",
                        'parent_slug' => 'is-cpt-options',
                        'wp_admin_page_variable' => "{$post_type['post_type']}_settings"
                    ]);


                    $cpt_field_group_is_meta_fields = [
                        'key' => "field_is_cpt_{$post_type['post_type']}_is_meta",
                        'label' => 'Custom Meta Fields',
                        'ui' => 1,
                        'multiple' => 1,
                        'instructions' => 'Do Not Use Me! I\'m slated for depreciation. Please use my friend below.',
                        'name' => "is_cpt_{$post_type['post_type']}_meta_fields",
                        'type' => 'select',
                        'choices' => Acme::get_is_cpt_meta_field_select_options(),
                    ];

                    /**
                     * Logic to control display of custom meta fields
                     */

                    $custom_meta_display = [
                        [
                            [
                                'field' => "field_is_cpt_{$post_type['post_type']}_custom_meta_preset_type",
                                'operator' => '==',
                                'value' => 'custom'
                            ]
                        ]
                    ];

                    $label = [
                        'key' => "field_is_cpt_{$post_type['post_type']}_custom_meta_label",
                        'label' => 'Label',
                        'name' => "label",
                        'type' => 'text',
                        'wrapper' => [
                            'width' => 33
                        ]
                    ];

                    $preset_type_choices = ['custom' => 'Custom'] + Acme::get_is_cpt_meta_field_select_options();


                    $preset_type = [
                        'key' => "field_is_cpt_{$post_type['post_type']}_custom_meta_preset_type",
                        'label' => 'Preset Type',
                        'name' => "preset_type",
                        'type' => 'select',
                        'ui' => 1,
                        'default_value' => 'name',
                        'choices' => $preset_type_choices,
                        'wrapper' => [
                            'width' => 33
                        ],
                    ];

                    $field_width = [
                        'key' => "field_is_cpt_{$post_type['post_type']}_custom_meta_field_width",
                        'label' => 'Field Width',
                        'name' => "field_width",
                        'type' => 'number',
                        'default_value' => 100,
                        'step' => 1,
                        'min' => 0,
                        'max' => 100,
                        'wrapper' => [
                            'width' => 33
                        ]
                    ];

                    $name = [
                        'key' => "field_is_cpt_{$post_type['post_type']}_custom_meta_key",
                        'label' => 'Meta Key',
                        'name' => "meta_key",
                        'type' => 'text',
                        'instructions' => 'Database Name',
                        'conditional_logic' => $custom_meta_display,
                        'wrapper' => [
                            'width' => 50
                        ]
                    ];
                    $type = [
                        'key' => "field_is_cpt_{$post_type['post_type']}_custom_meta_type",
                        'label' => 'Type',
                        'name' => "type",
                        'type' => 'select',
                        'ui' => 1,
                        'conditional_logic' => $custom_meta_display,
                        'choices' => [
                            'text' => 'Text',
                            'textarea' => 'Textarea',
                            'image' => 'Image',
                            'relationship' => 'Relationship',
                            'wysiwyg' => 'WYSIWYG Editor',
                        ],
                        'wrapper' => [
                            'width' => 50
                        ]
                    ];

                    $custom_meta_fields = [
                        $label,
                        $preset_type,
                        $field_width,
                        $name,
                        $type,
                    ];


                    $cpt_field_group_custom_meta_fields = [
                        'key' => "field_is_cpt_{$post_type['post_type']}_custom_meta",
                        'label' => 'Custom Meta Fields',
                        'ui' => 1,
                        'multiple' => 1,
                        'name' => "is_cpt_{$post_type['post_type']}_custom_meta_fields",
                        'type' => 'repeater',
                        'layout' => 'block',
                        'button_label' => 'Add Custom Meta',
                        'sub_fields' => $custom_meta_fields
                    ];

                    $template_choices = Acme::cpt_single_view_templates();


                    $cpt_field_group_template = [
                        'key' => "field_is_cpt_{$post_type['post_type']}_template",
                        'label' => 'Single View Template',
                        'name' => "is_cpt_{$post_type['post_type']}_template",
                        'type' => 'select',
                        'ui' => 1,
                        'choices' => $template_choices,
                        'wrapper' => [
                            'width' => 50
                        ]
                    ];

                    $cpt_sidebar_set_choices = [
                        false => 'None',
                    ];

                    $cpt_field_group_sidebar_set = [
                        'key' => "field_is_cpt_{$post_type['post_type']}_sidebar_set",
                        'label' => 'sidebar_set',
                        'name' => "is_cpt_{$post_type['post_type']}_sidebar_set",
                        'type' => 'select',
                        'ui' => 1,
                        'choices' => $cpt_sidebar_set_choices,
                        'wrapper' => [
                            'width' => 50
                        ]
                    ];

                    $cpt_field_group_hierarchical = [
                        'key' => "field_is_cpt_{$post_type['post_type']}_hierarchical",
                        'label' => 'Hierarchical',
                        'name' => "is_cpt_{$post_type['post_type']}_hierarchical",
                        'type' => 'true_false',
                        'wrapper' => [
                            'width' => 100 / 3
                        ]
                    ];

                    $cpt_field_group_default_image = [
                        'key' => "field_is_cpt_{$post_type['post_type']}_default_image",
                        'label' => 'Default Image',
                        'name' => "is_cpt_{$post_type['post_type']}_default_image",
                        'type' => 'image',
                        'preview_size' => 'medium',
                        'wrapper' => [
                            'width' => 100 / 3
                        ]
                    ];

                    $cpt_field_group_page_builder = [
                        'key' => "field_is_cpt_{$post_type['post_type']}_page_builder",
                        'label' => 'Display Page Builder',
                        'name' => "is_cpt_{$post_type['post_type']}_page_builder",
                        'type' => 'true_false',
                        'wrapper' => [
                            'width' => 100 / 3
                        ]
                    ];

                    $cpt_field_group_hide_header = [
                        'key' => "field_is_cpt_{$post_type['post_type']}_hide_header",
                        'label' => 'Hide Header',
                        'name' => "is_cpt_{$post_type['post_type']}_hide_header",
                        'type' => 'true_false',
                        'wrapper' => [
                            'width' => 100 / 3
                        ]
                    ];

                    $cpt_field_group_hide_footer = [
                        'key' => "field_is_cpt_{$post_type['post_type']}_hide_footer",
                        'label' => 'Hide Footer',
                        'name' => "is_cpt_{$post_type['post_type']}_hide_footer",
                        'type' => 'true_false',
                        'wrapper' => [
                            'width' => 100 / 3
                        ]
                    ];

                    $cpt_field_group_fields = [
                        ACF::get_horizontal_tab('Config', 'field_cpt_config'),
                        $cpt_field_group_hierarchical,
                        $cpt_field_group_default_image,
                        // TODO : Add "searchable"
                        // TODO : Add "home page"
                        ACF::get_horizontal_tab('Meta Fields', 'field_cpt_fields_tab'),
                        $cpt_field_group_is_meta_fields,
                        $cpt_field_group_custom_meta_fields,
                        ACF::get_horizontal_tab('Single View', 'field_cpt_single_view'),
                        $cpt_field_group_template,
                        $cpt_field_group_sidebar_set,
                        $cpt_field_group_hide_header,
                        $cpt_field_group_hide_footer,
                        $cpt_field_group_page_builder,
                        ACF::get_horizontal_tab('SEO', 'field_cpt_seo'),

                    ];

                    $cpt_field_group = [
                        'key' => "is_cpt_{$post_type['post_type']}_settings",
                        'title' => "{$post_type['name']} Options",
                        'fields' => $cpt_field_group_fields,
                        'location' => [
                            [
                                [
                                    'param' => 'options_page',
                                    'operator' => '==',
                                    'value' => "acf-options-{$post_type['post_type']}",
                                ],
                            ],
                        ],
                    ];


                    acf_add_local_field_group($cpt_field_group);


                endforeach;


        $taxonomies = Acme::get_acf_global_option('options_custom_taxonomies');

        acf_add_options_page(array(
            'page_title' => 'Taxonomy Type Options',
            'menu_title' => 'IS Tax Options',
            'menu_slug' => 'is-tax-options',
            'capability' => 'edit_posts',
            'redirect' => false
        ));

        if ($taxonomies)
            foreach ($taxonomies as $taxonomy):

//            Acme::dbg($taxonomy);

                acf_add_options_sub_page([
                    'page_title' => "{$taxonomy['name']} Taxonomy Settings",
                    'menu_title' => "{$taxonomy['term']}",
                    'parent_slug' => 'is-tax-options',
                    'wp_admin_page_variable' => "{$taxonomy['term']}_settings",
                ]);


                $taxonomy_options_field_hierarchical = [
                    'key' => "field_is_taxonomies_{$taxonomy['term']}_hierarchical",
                    'label' => 'Hierarchical',
                    'type' => 'true_false',
                    'ui' => 1,
                    'name' => "{$taxonomy['term']}_hierarchical",
                    'wrapper' => [
                        'width' => 25
                    ]
                ];
                $taxonomy_options_field_admin_column = [
                    'key' => "field_is_taxonomies_{$taxonomy['term']}_admin_column",
                    'label' => 'Admin Column',
                    'type' => 'true_false',
                    'ui' => 1,
                    'name' => "{$taxonomy['term']}_admin_column",
                    'wrapper' => [
                        'width' => 25
                    ]
                ];
                $taxonomy_options_field_quick_edit = [
                    'key' => "field_is_taxonomies_{$taxonomy['term']}_quick_edit",
                    'label' => 'Quick Edit',
                    'type' => 'true_false',
                    'ui' => 1,
                    'name' => "{$taxonomy['term']}_quick_edit",
                    'wrapper' => [
                        'width' => 25
                    ]
                ];

                $taxonomy_options_field_archive_view = [
                    'key' => "field_is_taxonomies_{$taxonomy['term']}_archive_view",
                    'label' => 'Archive View',
                    'type' => 'true_false',
                    'ui' => 1,
                    'name' => "{$taxonomy['term']}_archive_view",
                    'wrapper' => [
                        'width' => 25
                    ]
                ];
                $taxonomy_options_field_archive_template = [
                    'key' => "field_is_taxonomies_{$taxonomy['term']}_archive_template",
                    'label' => 'Archive Template',
                    'type' => 'select',
                    'ui' => 1,
                    'name' => "is_custom_taxonomy_{$taxonomy['term']}_archive_template",
                    'choices' => ACF::get_post_excerpt_templates_for_select_menu(),
                    'conditional_logic' => [
                        [
                            [
                                'field' => 'field_is_taxonomies_repeater_archive_view',
                                'operator' => '==',
                                'value' => 1
                            ]
                        ]
                    ],
                    'wrapper' => [
                        'width' => 50
                    ]
                ];

                $tax_field_group_fields = [
                    $taxonomy_options_field_hierarchical,
                    $taxonomy_options_field_admin_column,
                    $taxonomy_options_field_quick_edit,
                    $taxonomy_options_field_archive_view,
                    $taxonomy_options_field_archive_template,
                ];


                $cpt_field_group = [
                    'key' => "is_taxonomy_{$taxonomy['term']}_settings",
                    'title' => "{$taxonomy['name']} Options",
                    'fields' => $tax_field_group_fields,
                    'location' => [
                        [
                            [
                                'param' => 'options_page',
                                'operator' => '==',
                                'value' => "acf-options-{$taxonomy['term']}",
                            ],
                        ],
                    ],
                ];


                acf_add_local_field_group($cpt_field_group);
            endforeach;

    }

    static function get_acf_options_page_data()
    {

        $theme_header_settings = [
            'page_title' => 'Theme Header Settings',
            'menu_title' => 'Header',
            'parent_slug' => 'is-display-settings',
            'wp_admin_page_variable' => 'header'
        ];

        $theme_footer_settings = [
            'page_title' => 'Theme Footer Settings',
            'menu_title' => 'Footer',
            'parent_slug' => 'is-display-settings',
            'wp_admin_page_variable' => 'footer'
        ];

        $foundation_options = [
            'page_title' => 'Foundation Options',
            'menu_title' => 'Foundation',
            'parent_slug' => 'is-display-settings',
            'wp_admin_page_variable' => 'foundation'
        ];

        $social_media = [
            'page_title' => "<i class='fas fa-share-alt'></i> Social Media",
            'menu_title' => "<i class='fas fa-share-alt'></i> Social Media",
            'parent_slug' => 'is-display-settings',
            'wp_admin_page_variable' => 'social-media'
        ];

        $template_editor = [
            'page_title' => "<i class='fas fa-code'></i> Template Editor",
            'menu_title' => "<i class='fas fa-code'></i> Template Editor",
            'parent_slug' => 'is-display-settings',
            'wp_admin_page_variable' => 'template-editor'
        ];

        $landing_page_editor = [
            'page_title' => "<i class='fas fa-cogs'></i> Site \"Maintenance Mode\" Configuration",
            'menu_title' => "<i class='fas fa-cogs'></i> Maintenance",
            'parent_slug' => 'is-display-settings',
            'wp_admin_page_variable' => 'maintenance'
        ];

        $image_config_settings = [
            'page_title' => "Image Config",
            'menu_title' => "Image Config",
            'parent_slug' => 'is-display-settings',
            'wp_admin_page_variable' => 'image'
        ];

        $acf_options_pages = [
            $theme_header_settings,
            $theme_footer_settings,
            $foundation_options,
            $social_media,
            $template_editor,
            $landing_page_editor,
            $image_config_settings,
        ];

        return $acf_options_pages;
    }

    static function create_header_options()
    {


        $header_logo_field = [
            'key' => 'field_is_header_logo',
            'label' => 'Logo',
            'name' => 'header_logo',
            'type' => 'image',
            'preview_size' => 'medium',
            'instructions' => 'This image will be the logo displayed on the header',
            'wrapper' => [
                'width' => 33
            ]
        ];

        $header_mobile_logo_field = [
            'key' => 'field_is_header_mobile_logo',
            'label' => 'Mobile Logo',
            'name' => 'header_mobile_logo',
            'type' => 'image',
            'preview_size' => 'medium',
            'wrapper' => [
                'width' => 33
            ]
        ];

        $header_max_width = [
            'key' => 'field_is_header_max_width',
            'label' => 'Max Width',
            'name' => 'header_max_width',
            'type' => 'text',
            'instructions' => 'Maximum Width for the Header',
            'placeholder' => 'Default Value: Foundation Global Width',
            'wrapper' => [
                'width' => 33
            ]
        ];

        $header_inside_first_row = [
            'key' => 'field_is_header_inside_first_row',
            'label' => 'Set Header Inside First Row',
            'name' => 'header_inside_first_row',
            'ui' => 1,
            'type' => 'true_false',
            'wrapper' => [
                'width' => 50
            ]
        ];

        $sticky_header = [
            'key' => 'field_is_global_sticky_header',
            'label' => 'Sticky Header Globally',
            'name' => 'header_sticky_global',
            'ui' => 1,
            'type' => 'true_false',
            'wrapper' => [
                'width' => 50
            ]
        ];

        $top_links_menu = [
            'key' => 'field_is_header_top_links_menu',
            'label' => '"Top Links" Menu',
            'instructions' => 'This is an accessory menu that goes on the top',
            'name' => 'top_links_header_menu',
            'type' => 'select',
            'allow_null' => 1,
            'ui' => 1,
            'wrapper' => [
                'width' => 100 / 2
            ],
            'choices' => Acme::get_menus_for_acf_global_header_footer()
        ];

        $top_links_menu_template = [
            'key' => 'field_is_header_top_links_menu_template',
            'label' => '"Top Links" Template',
            'instructions' => 'Choose a template for the Top Links Menu',
            'name' => 'top_links_header_menu_template',
            'type' => 'select',
            'allow_null' => 1,
            'ui' => 1,
            'wrapper' => [
                'width' => 100 / 2
            ],
            'choices' => Acme::get_menu_templates_for_acf_global_options('top_links_menu')
        ];

        $primary_header_menu = [
            'key' => 'field_is_header_primary_menu',
            'label' => 'Primary Menu',
            'name' => 'primary_header_menu',
            'instructions' => 'This is your main menu. The template defines the display of these menus.',
            'type' => 'select',
            'allow_null' => 1,
            'ui' => 1,
            'wrapper' => [
                'width' => 100 / 2
            ],
            'choices' => Acme::get_menus_for_acf_global_header_footer()
        ];

        $secondary_header_menu = [
            'key' => 'field_is_header_secondary_menu',
            'label' => 'Secondary Menu',
            'name' => 'secondary_header_menu',
            'instructions' => 'This is your secondary menu. The template defines the display of these menus.',
            'type' => 'select',
            'allow_null' => 1,
            'ui' => 1,
            'wrapper' => [
                'width' => 100 / 2
            ],
            'choices' => Acme::get_menus_for_acf_global_header_footer()
        ];

        $large_header_menu = [
            'key' => 'field_is_header_large_header_menu',
            'label' => 'Large Menu',
            'name' => 'large_header_menu',
            'instructions' => 'If you have a large menu, put it here.',
            'type' => 'select',
            'allow_null' => 1,
            'ui' => 1,
            'wrapper' => [
                'width' => 100 / 2
            ],
            'choices' => Acme::get_menus_for_acf_global_header_footer()
        ];

        $large_header_menu_template = [
            'key' => 'field_is_header_large_header_menu_template',
            'label' => 'Large Menu Template',
            'name' => 'large_header_menu_template',
            'instructions' => 'Choose a template to display the "Large Menu"',
            'type' => 'select',
            'allow_null' => 1,
            'ui' => 1,
            'wrapper' => [
                'width' => 100 / 2
            ],
            'choices' => Acme::get_menu_templates_for_acf_global_options('large_menu')
        ];


        $overlay_header_menu = [
            'key' => 'field_is_header_overlay_header_menu',
            'label' => 'Overlay Menu',
            'name' => 'overlay_header_menu',
            'instructions' => 'If you have an overlay menu, put it here.',
            'type' => 'select',
            'allow_null' => 1,
            'ui' => 1,
            'wrapper' => [
                'width' => 100 / 2
            ],
            'choices' => Acme::get_menus_for_acf_global_header_footer()
        ];

        $overlay_header_menu_template = [
            'key' => 'field_is_header_overlay_header_menu_template',
            'label' => 'Overlay Menu Template',
            'name' => 'overlay_header_menu_template',
            'instructions' => 'Choose a template to display the "Overlay Menu"',
            'type' => 'select',
            'allow_null' => 1,
            'ui' => 1,
            'wrapper' => [
                'width' => 100 / 2
            ],
            'choices' => Acme::get_menu_templates_for_acf_global_options('overlay_menu')
        ];

        $cta_header_menu = [
            'key' => 'field_is_header_cta_header_menu',
            'label' => 'CTA Menu',
            'name' => 'cta_header_menu',
            'instructions' => 'If you have a CTA menu, put it here.',
            'type' => 'select',
            'allow_null' => 1,
            'ui' => 1,
            'wrapper' => [
                'width' => 100 / 2
            ],
            'choices' => Acme::get_menus_for_acf_global_header_footer()
        ];

        $cta_header_menu_template = [
            'key' => 'field_is_header_cta_header_menu_template',
            'label' => 'CTA Menu Template',
            'name' => 'cta_header_menu_template',
            'instructions' => 'Choose a template to display the "CTA Menu"',
            'type' => 'select',
            'allow_null' => 1,
            'ui' => 1,
            'wrapper' => [
                'width' => 100 / 2
            ],
            'choices' => Acme::get_menu_templates_for_acf_global_options('overlay_menu')
        ];

        $header_background_options_fields = ['color', 'image'];

        $header_background_options = ACF::get_background_display_options('field_is_header_background_display_options_fields', $header_background_options_fields);

        $header_background = [
            'key' => 'field_is_header_background_options',
            'label' => 'Background Options',
            'name' => 'header_background_options',
            'type' => 'group',
            'layout' => 'table',
            'sub_fields' => $header_background_options
        ];

        /**
         * Social Media Network Config
         */

        $social_media_group_select = [
            'key' => 'field_is_header_social_media_networks',
            'label' => 'Networks',
            'instructions' => 'Select your accounts and their order',
            'name' => 'select',
            'type' => 'select',
            'multiple' => 1,
            'choices' => Acme::get_social_media_networks_for_header_and_footer(),
            'ui' => 1,
        ];

        $social_media_group_template = [
            'key' => 'field_is_header_social_media_template',
            'label' => 'Template',
            'name' => 'template',
            'instructions' => 'Select your display template',
            'type' => 'select',
            'ui' => 1,
            'choices' => Acme::get_templates('twig/social_media/'),
        ];


        $social_media_group = [
            $social_media_group_select,
            $social_media_group_template,
        ];

        $social_media = [
            'key' => 'field_is_header_social_media_links',
            'label' => 'Social Media Links',
            'name' => 'header_social_media_links',
            'type' => 'group',
            'instructions' => 'Select your networks, and their template',
            'layout' => 'block',
            'sub_fields' => $social_media_group,
            'wrapper' => [
                'width' => 33
            ]
        ];

        /**
         * Off Canvas Templates
         */

        $offcanvas_template_choices = Acme::get_custom_offcanvas_menu_templates('components/offcanvas_menu_templates/');

        $offcanvas_templates = [
            'key' => 'field_is_offcanvas_template',
            'label' => 'Offcanvas Menu Template',
            'instructions' => 'Change your offcanvas template per device here',
            'name' => 'offcanvas_device_templates',
            'type' => 'group',
            'layout' => 'block',
            'sub_fields' => ACF::get_device_template_fields("field_is_offcanvas_template", $offcanvas_template_choices),
            'wrapper' => [
                'width' => 33
            ]
        ];


        /**
         * Header Device Templates
         */

        $device_template_choices = Acme::get_custom_header_footer_templates('header');

        $device_templates = [
            'key' => 'field_is_header_template',
            'label' => 'Header Template',
            'instructions' => 'On each device type, a different menu template will be loaded',
            'name' => 'header_device_templates',
            'type' => 'group',
            'layout' => 'block',
            'sub_fields' => ACF::get_device_template_fields("field_is_header_template", $device_template_choices),
            'wrapper' => [
                'width' => 33
            ]
        ];

        /**
         * Offcanvas Menu Templates
         */

        $header_options_field_group_fields = [
            $header_logo_field,
            $header_mobile_logo_field,
            $header_max_width,
            $header_inside_first_row,
            $sticky_header,
            $top_links_menu,
            $top_links_menu_template,
            $primary_header_menu,
            $secondary_header_menu,
            $large_header_menu,
            $large_header_menu_template,
            $overlay_header_menu,
            $overlay_header_menu_template,
            $cta_header_menu,
            $cta_header_menu_template,
            $header_background,
            $offcanvas_templates,
            $device_templates,
            $social_media,
        ];

        $header_options_field_group = [
            'key' => 'field_is_header_global_option_field_group',
            'title' => 'Header Options',
            'location' => [
                [
                    [
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'acf-options-header',
                    ]
                ]
            ],
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'active' => 1,
            'description' => 'something here',
            'fields' => $header_options_field_group_fields
        ];

        acf_add_local_field_group($header_options_field_group);

    }

    static function create_footer_options()
    {


        $footer_logo_field = [
            'key' => 'field_is_footer_logo',
            'label' => 'Logo',
            'name' => 'footer_logo',
            'type' => 'image',
            'preview_size' => 'medium',
            'instructions' => 'This image will be the logo displayed on the footer',
            'wrapper' => [
                'width' => 40
            ]
        ];

        $footer_max_width = [
            'key' => 'field_is_footer_max_width',
            'label' => 'Max Width',
            'name' => 'footer_max_width',
            'type' => 'text',
            'placeholder' => 'Default Value: Foundation Global Width',
            'wrapper' => [
                'width' => 40
            ]
        ];

        $footer_inside_last_row = [
            'key' => 'field_is_footer_inside_last_row',
            'label' => 'Inside Last Row',
            'name' => 'footer_inside_last_row',
            'type' => 'true_false',
            'ui' => 1,
            'wrapper' => [
                'width' => 20
            ]
        ];

        $primary_footer_menu = [
            'key' => 'field_is_footer_primary_menu',
            'label' => 'Primary Menu',
            'name' => 'primary_footer_menu',
            'instructions' => 'This is your main menu.',
            'type' => 'select',
            'allow_null' => 1,
            'ui' => 1,
            'wrapper' => [
                'width' => 100 / 2
            ]
        ];

        $secondary_footer_menu = [
            'key' => 'field_is_footer_secondary_menu',
            'label' => 'Secondary Menu',
            'name' => 'secondary_footer_menu',
            'instructions' => 'This is your secondary menu.',
            'type' => 'select',
            'allow_null' => 1,
            'ui' => 1,
            'wrapper' => [
                'width' => 100 / 2
            ]
        ];

        $cta_footer_menu = [
            'key' => 'field_is_footer_cta_header_menu',
            'label' => 'CTA Menu',
            'name' => 'cta_footer_menu',
            'instructions' => 'If you have a CTA menu, put it here.',
            'type' => 'select',
            'allow_null' => 1,
            'ui' => 1,
            'choices' => Acme::get_menus_for_acf_global_header_footer()
        ];

        $primary_content_area = [
            'key' => 'field_is_footer_primary_content_area',
            'label' => 'Primary Content Area',
            'name' => 'footer_primary_content_area',
            'instructions' => 'This is your primary content area.',
            'type' => 'wysiwyg',
            'allow_null' => 1,
            'ui' => 1,
            'wrapper' => [
                'width' => 100 / 2
            ]
        ];

        $secondary_content_area = [
            'key' => 'field_is_footer_secondary_content_area',
            'label' => 'Secondary Content Area',
            'name' => 'footer_secondary_content_area',
            'instructions' => 'This is your secondary content area.',
            'type' => 'wysiwyg',
            'allow_null' => 1,
            'ui' => 1,
            'wrapper' => [
                'width' => 100 / 2
            ]
        ];

        $social_media_group_select = [
            'key' => 'field_is_footer_social_media_networks',
            'label' => 'Networks',
            'instructions' => 'Select your accounts and their order',
            'name' => 'select',
            'type' => 'select',
            'choices' => Acme::get_social_media_networks_for_header_and_footer(),
            'multiple' => 1,
            'ui' => 1,
        ];

        $sm_group_template_mobile = [
            'key' => 'field_is_footer_social_media_template_mobile',
            'label' => 'Mobile',
            'name' => 'mobile',
            'type' => 'select'
        ];

        $sm_group_template_tablet = [
            'key' => 'field_is_footer_social_media_template_tablet',
            'label' => 'Tablet',
            'name' => 'tablet',
            'type' => 'select'
        ];

        $sm_group_template_desktop = [
            'key' => 'field_is_footer_social_media_template_desktop',
            'label' => 'Desktop',
            'name' => 'desktop',
            'type' => 'select'
        ];

        $sm_group_template_large_desktop = [
            'key' => 'field_is_footer_social_media_template_large_desktop',
            'label' => 'Large Desktop',
            'name' => 'large_desktop',
            'type' => 'select'
        ];

        $path = INFINISITE_URI . "twig/social_media/*";
        $templates = glob($path);

        // attaching the templates to the submenu template module selector

        if ($templates)
            foreach ($templates as $template):

                $info = explode("/", $template);
                $filename = array_pop($info);
                $sm_group_template_mobile['choices'][$filename] = $filename;
                $sm_group_template_tablet['choices'][$filename] = $filename;
                $sm_group_template_desktop['choices'][$filename] = $filename;
                $sm_group_template_large_desktop['choices'][$filename] = $filename;

            endforeach;

        $footer_background_options_fields = ['color', 'image'];

        $footer_background_options = ACF::get_background_display_options('field_is_footer_background_display_options_fields', $footer_background_options_fields);

        $footer_background = [
            'key' => 'field_is_footer_background_options',
            'label' => 'Background Options',
            'name' => 'footer_background_options',
            'type' => 'group',
            'sub_fields' => $footer_background_options
        ];

        $sm_group_template_sizes = [
            $sm_group_template_mobile,
            $sm_group_template_tablet,
            $sm_group_template_desktop,
            $sm_group_template_large_desktop,
        ];

        $social_media_group_template = [
            'key' => 'field_is_footer_social_media_group_template',
            'label' => 'Template',
            'name' => 'template',
            'instructions' => 'Select your display template',
            'type' => 'select',
            'ui' => 1,
            'choices' => Acme::get_templates('twig/social_media/'),
        ];

        $social_media_group = [
            $social_media_group_select,
            $social_media_group_template,
        ];

        $social_media = [
            'key' => 'field_is_footer_social_media_account',
            'label' => 'Social Media Account Options',
            'name' => 'footer_social_media_links',
            'type' => 'group',
            'instructions' => 'Select your networks and their template',
            'wrapper' => [
                'width' => 50
            ],
            'sub_fields' => $social_media_group
        ];

        $device_template_choices = Acme::get_custom_header_footer_templates('footer');

        $device_templates = [
            'key' => 'field_is_footer_device_templates',
            'label' => 'Footer Template',
            'instructions' => 'On each device type, a different menu template will be loaded',
            'name' => 'footer_device_templates',
            'type' => 'group',
            'layout' => 'block',
            'wrapper' => [
                'width' => 50
            ],
            'sub_fields' => [
                [
                    'key' => 'field_is_footer_device_templates_mobile',
                    'name' => 'mobile',
                    'label' => 'Mobile',
                    'type' => 'select',
                    'choices' => $device_template_choices,
                ],
                [
                    'key' => 'field_is_footer_device_templates_tablet',
                    'name' => 'tablet',
                    'label' => 'Tablet',
                    'type' => 'select',
                    'choices' => $device_template_choices,
                ],
                [
                    'key' => 'field_is_footer_device_templates_desktop',
                    'name' => 'desktop',
                    'label' => 'Desktop',
                    'type' => 'select',
                    'choices' => $device_template_choices,
                ],
                [
                    'key' => 'field_is_footer_device_templates_large_desktop',
                    'name' => 'large_desktop',
                    'label' => 'Large Desktop',
                    'type' => 'select',
                    'choices' => $device_template_choices,
                ],
            ]
        ];


        $menus = get_terms(array(
            'taxonomy' => 'nav_menu',
        ));

        if ($menus)
            foreach ($menus as $menu):
                $primary_footer_menu['choices'][$menu->slug] = $menu->name;
                $secondary_footer_menu['choices'][$menu->slug] = $menu->name;
            endforeach;


        $footer_options_field_group_fields = [
            $footer_logo_field,
            $footer_max_width,
            $footer_inside_last_row,
            $primary_footer_menu,
            $secondary_footer_menu,
            $cta_footer_menu,
            $footer_background,
            $primary_content_area,
            $secondary_content_area,
            $device_templates,
            $social_media,
        ];

        $footer_options_field_group = [
            'key' => 'field_is_footer_global_option_field_group',
            'title' => 'Footer Options',
            'location' => [
                [
                    [
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'acf-options-footer',
                    ]
                ]
            ],
            'fields' => $footer_options_field_group_fields
        ];

        acf_add_local_field_group($footer_options_field_group);

    }

    static function create_image_options()
    {


        $tn_size_name = [
            'key' => 'field_is_image_thumbnail_size_name',
            'label' => 'Name',
            'name' => 'name',
            'required' => 1,
            'type' => 'text',
            'wrapper' => [
                'width' => 25
            ],
        ];
        $tn_size_width = [
            'key' => 'field_is_image_thumbnail_size_width',
            'label' => 'Width',
            'name' => 'width',
            'required' => 1,
            'type' => 'number',
            'wrapper' => [
                'width' => 25
            ],
        ];
        $tn_size_height = [
            'key' => 'field_is_image_thumbnail_size_height',
            'label' => 'Height',
            'name' => 'height',
            'required' => 1,
            'type' => 'number',
            'wrapper' => [
                'width' => 25
            ],
        ];
        $tn_size_crop = [
            'key' => 'field_is_image_thumbnail_size_crop',
            'label' => 'Crop',
            'name' => 'crop',
            'type' => 'true_false',
            'wrapper' => [
                'width' => 25
            ],
        ];


        $thumbnail_sizes_fields = [
            $tn_size_name,
            $tn_size_width,
            $tn_size_height,
            $tn_size_crop,
        ];


        $thumbnail_sizes = [
            'key' => 'field_is_image_thumbnail_sizes',
            'name' => 'is_thumbnail_sizes',
            'type' => 'repeater',
            'label' => 'Thumbnail Sizes',
            'layout' => 'block',
            'sub_fields' => $thumbnail_sizes_fields
        ];

        $image_options_field_group_fields = [
            $thumbnail_sizes
        ];

        $image_options_field_group = [
            'key' => 'field_is_image_global_option_field_group',
            'title' => 'Image Options',
            'location' => [
                [
                    [
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'acf-options-image-config',
                    ]
                ]
            ],
            'fields' => $image_options_field_group_fields
        ];

        acf_add_local_field_group($image_options_field_group);

    }

    public static function register_image_thumbnail_sizes()
    {

        $thumbnail_sizes = get_field("is_thumbnail_sizes", "options");

        if ($thumbnail_sizes)
            foreach ($thumbnail_sizes as $size)
                \add_image_size($size['name'], $size['width'], $size['height'], $size['crop']);

    }

    public static function update_typography_options_scss($testing = false)
    {

        $text_style_global_fields = [
            ['is_global_type_heading_one_scss', 'h1'],
            ['is_global_type_heading_two_scss', 'h2'],
            ['is_global_type_heading_three_scss', 'h3'],
            ['is_global_type_heading_four_scss', 'h4'],
            ['is_global_type_heading_five_scss', 'h5'],
            ['is_global_type_heading_six_scss', 'h6'],
            ['is_global_type_unordered_list_scss', 'ol'],
            ['is_global_type_ordered_list_scss', 'ul'],
            ['is_global_type_paragraph_scss', 'p'],
            ['is_global_type_link_scss', 'a'],
        ];


        $global_prefix = '';

        $global_wrappers = [
            '.is_page_builder_row',
            '#tinymce',
            '[data-editor-style]'
        ];


        foreach ($global_wrappers as $c => $wrapper):
            $symbol = $c + 1 == count($global_wrappers) ? "{\n" : ',';
            $global_prefix .= "$wrapper $symbol ";
        endforeach;


        // we're going to boot up the compiler here
        $scss = new \Leafo\ScssPhp\Compiler();
        $scss->addImportPath(INFINISITE_URI . '/assets/acme');


        $styles_to_compile = "@import 'is_variables.scss';\n";

        foreach ($text_style_global_fields as $acf_field):
            $style = get_field($acf_field[0], 'option');
            $styles_to_compile .= "$global_prefix {$acf_field[1]}{\n{$style}\n}\n}\n";
        endforeach;


        // here we build the sass


        try {

            $compiled_text_styles = $scss->compile($styles_to_compile);

            // and here we update the stylesheet.
            $file = INFINISITE_URI . 'assets/css/is_text_styles.css';
            $file_update = file_put_contents($file, $compiled_text_styles);

            $notice = AdminNotice::getInstance();
            $notice->displayWarning("Success - refresh your browser to make another change!");

            if (!$file_update) return $file_update;
            return $compiled_text_styles;


        } catch (\Exception $e) {

            error_log($e);

            $notice = AdminNotice::getInstance();
            $notice->displayError("
                <h2>Warning!</h2>
                Your SCSS has an error somewhere.<br />
                Its probably a variable error. Your CSS file was not updated.<br />
                <pre>$e</pre>
                <h3>Your Attempted Styles are below:</h3>
                <pre>$styles_to_compile</pre>
            ");

            return false;

        }


    }


}