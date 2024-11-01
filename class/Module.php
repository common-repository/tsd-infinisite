<?

namespace TSD_Infinisite;

class Module
{

    public $cells = [];
    public $config = [];

    public $acf_modules = [];

    private $layout;
    private $html;
    private $acf_module;


    function __construct($layout = false, $row_index = 0, $cell_index = 0, $module_index = 0)
    {

        /**
         * module constructor :
         *
         * when a module is constructred, we are assuming it is going to
         * be used to print out content to a template. typically, this
         * is going to be coming from a cell object, but if it isn't its fine.
         */

        $this->build_config($layout, $row_index, $cell_index, $module_index);

    }


    private function build_config($layout, $row_index, $cell_index, $module_index)
    {
        $this->layout = $layout;
        $this->config = [
            'row_index' => $row_index,
            'cell_index' => $cell_index,
            'module_index' => $module_index,
        ];

        $this->acf_module = $this->layout->config['acf_rows'][$row_index]['cells'][$cell_index]['is_acf_fc_container'][$module_index];


    }

    public function build_html()
    {


        /**
         * this is going to be the primary function of this module, to take the given acf field
         * and return some html.
         */

        // foreach modules as module, create new module with layout, row index, cell index and module


        $inline_template = Module::display_inline_template($this->acf_module);

        if ($inline_template):
            $this->html = $inline_template;
            return true;
        endif;

        $custom_template = Module::display_custom_template($this->acf_module);

        if ($custom_template):
            $this->html = $custom_template;
            return true;
        endif;

        $module = $this->acf_module;


        $filename = INFINISITE_URI . "module_templates/{$this->acf_module['acf_fc_layout']}.php";

        if (file_exists($filename)) {
            ob_start();
            include($filename);
            $this->html = ob_get_clean();
        } else {
            if (is_user_logged_in())
                return "<div class='callout alert'><p class='no-padding'>File \"$filename\" not found, please contact the website admin.</p></div>";
        }


    }

    public function get_html()
    {

        /**
         * this is the public function that retrieves the output from the module object
         */

        return $this->html;
    }

    public static function get_acf_module_information_for_registration()
    {

        // TODO: this function goes in tsd_infinisite.php, replacing whatever called the modules to register

        /**
         * we don't register the modules every time we new up a module
         */

        $return = [];

        $return = array_merge($return, Module::build_simple_acf_modules());
        $return = array_merge($return, Module::build_gravity_form_module());
        $return = array_merge($return, Module::build_post_archive_module());

        return $return;

    }

    static function build_simple_acf_modules()
    {

        $acf_modules['simple_content'] = [
            'label' => 'Simple Content',
            'name' => 'simple_content',
            'key' => 'field_ispb_layout_simple_content',
            'sub_fields' => [
                ACF::get_horizontal_tab('Content', 'field_ispb_layout_content_wysiwyg_tab'),
                'content' => [
                    'key' => 'field_ispb_layout_simple_content_wysiwyg',
                    'label' => 'Simple Content',
                    'name' => 'simple_content',
                    'type' => 'wysiwyg',
                ],
                ACF::get_horizontal_tab('Config', 'field_ispb_layout_content_config_tab'),
                'config' => [
                    'key' => 'field_isbp_layout_simple_content_template',
                    'label' => 'Template',
                    'name' => 'template',
                    'type' => 'select',
                    'ui' => 1,
                    'choices' => Acme::ispb_module_templates('multiple_images'),
                ]
            ]
        ];

        $acf_modules['submenu'] = [
            'label' => 'Submenu',
            'name' => 'submenu',
            'key' => 'field_ispb_layout_submenu',
            'sub_fields' => [
                'menu' => [
                    'key' => 'field_ispb_layout_submenu_menu',
                    'name' => 'menu',
                    'type' => 'select',
                    'choices' => Acme::get_menus_for_acf_module(),
                    'value' => 'medium',
                    'ui' => 1,
                    'wrapper' => [
                        'width' => 50
                    ]
                ],
                'template' => [
                    'key' => 'field_ispb_layout_submenu_template',
                    'label' => 'Template',
                    'name' => 'template',
                    'type' => 'select',
                    'choices' => Acme::get_templates('components/submenu_templates/'),
                    'wrapper' => [
                        'width' => 50
                    ]
                ]
            ]
        ];

        $acf_modules['icon'] = [
            'label' => 'Icon',
            'name' => 'icon',
            'key' => 'field_ispb_layout_icon',
            'sub_fields' => [
                ACF::get_horizontal_tab('Icon Selection', 'field_5a29673e16383'),
                'icon' => [
                    'key' => 'field_ispb_layout_icon_selector',
                    'label' => 'Font Awesome Icon',
                    'name' => 'icon',
                    'type' => 'select',
                    'ui' => 1,
                    'default_value' => 0,
                    'class' => 'font-awesome',
                    'choices' => Acme::get_fontawesome_icons_for_acf_select(),
                    'wrapper' => [
                        'width' => 50
                    ]
                ],
                'svg' => [
                    'key' => 'field_ispb_layout_icon_svg',
                    'label' => 'SVG',
                    'name' => 'svg',
                    'type' => 'file',
                    'wrapper' => [
                        'width' => 50
                    ]
                ],
                ACF::get_horizontal_tab('Icon Module Config', 'field_5a29673e16382'),
                'size' => [
                    'key' => 'field_ispb_layout_icon_size',
                    'label' => 'Size',
                    'name' => 'size',
                    'type' => 'select',
                    'default_value' => '',
                    'choices' => Acme::get_fontawesome_sizes_for_acf_select(),
                    'wrapper' => [
                        'width' => 100 / 4
                    ]
                ],
                'animation' => [
                    'key' => 'field_ispb_layout_icon_animation',
                    'label' => 'Animation Effects',
                    'name' => 'animation_effects',
                    'type' => 'select',
                    'ui' => 1,
                    'allow_null' => 1,
                    'choices' => [
                        'fa-spin' => 'Spin',
                        'fa-pulse' => 'Pulse'
                    ],
                    'wrapper' => [
                        'width' => 100 / 4
                    ]
                ],
                'rotation' => [
                    'key' => 'field_ispb_layout_icon_rotation',
                    'label' => 'Rotation / Flip',
                    'name' => 'rotate_flip',
                    'type' => 'select',
                    'ui' => 1,
                    'allow_null' => 1,
                    'choices' => [
                        'fa-rotate-90' => '90 Clockwise',
                        'fa-rotate-180' => 'Rotate Upside Down',
                        'fa-rotate-270' => '90 Counterclockwise',
                        'fa-flip-horizontal' => 'Flip Horizontal',
                        'fa-flip-vertical' => 'Flip Vertical',
                    ],
                    'wrapper' => [
                        'width' => 100 / 4
                    ]
                ],
                'link' => [
                    'key' => 'field_ispb_layout_icon_link',
                    'label' => 'Link',
                    'name' => 'link',
                    'type' => 'link',
                    'wrapper' => [
                        'width' => 100 / 4
                    ]
                ],
                ACF::get_color_field('field_ispb_layout_icon_color_field', [
                    'wrapper' => [
                        'width' => 100 / 2,
                    ]
                ]),
                'caption' => [
                    'key' => 'field_ispb_layout_icon_caption',
                    'label' => 'Caption',
                    'name' => 'caption',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 100 / 2,
                    ]
                ],
            ]
        ];

        $acf_modules['image'] = [
            'label' => 'Single Image',
            'name' => 'single_image',
            'key' => 'field_ispb_layout_single_image',
            'sub_fields' => [
                ACF::get_horizontal_tab('Image', 'field_ispb_layout_image_file_tab'),
                'image' => [
                    'key' => 'field_ispb_layout_single_image_file',
                    'label' => 'Image',
                    'name' => 'image',
                    'type' => 'image',
                    'preview_size' => 'medium'
                ],
                ACF::get_horizontal_tab('Config', 'field_ispb_layout_image_config_tab'),
                'full_width_toggle' => [
                    'key' => 'field_ispb_layout_single_image_full_width',
                    'name' => 'full_width',
                    'type' => 'true_false',
                    'instructions' => 'Stretch Image to Cell Width?',
                    'message' => 'Full Width',
                    'wrapper' => [
                        'width' => 50
                    ]
                ],
                'link' => [
                    'key' => 'field_ispb_layout_single_image_link',
                    'name' => 'link',
                    'type' => 'link',
                    'instructions' => 'Link (Optional)',
                    'wrapper' => [
                        'width' => 50
                    ]
                ],
                'template' => [
                    'key' => 'field_ispb_layout_single_image_template',
                    'name' => 'template',
                    'type' => 'select',
                    'ui' => 1,
                    'default_value' => 'default',
                    'instructions' => 'Select a Template',
                    'choices' => Acme::ispb_module_templates('single_image')
                ],
            ]
        ];

        $acf_modules['multiple_images'] = [
            'label' => 'Multiple Images',
            'name' => 'multiple_images',
            'key' => 'field_ispb_layout_multiple_image',
            'sub_fields' => [
                ACF::get_horizontal_tab('Content', 'field_5a0dd7b76102'),
                'images' => [
                    'key' => 'field_ispb_layout_multiple_image_files',
                    'label' => 'Images',
                    'name' => 'images',
                    'type' => 'gallery',
                    'min' => 1
                ],
                ACF::get_horizontal_tab('Config', 'field_5a0dd7b765103'),
                'template' => [
                    'key' => 'field_ispb_layout_multiple_image_template',
                    'label' => 'Template',
                    'name' => 'template',
                    'type' => "select",
                    'ui' => 1,
                    'choices' => Acme::ispb_module_templates('multiple_images'),
                ],
            ]
        ];

        $acf_modules['accordion'] = [
            'label' => 'Accordion',
            'name' => 'accordion',
            'key' => 'field_ispb_layout_accordion',
            'sub_fields' => [
                [
                    'key' => 'field_ispb_layout_accordion_blade',
                    'label' => 'Blade',
                    'name' => 'blade',
                    'type' => 'repeater',
                    'button_label' => 'Add Blade',
                    'min' => 1,
                    'layout' => 'block',
                    'sub_fields' => [
                        [
                            'key' => 'field_ispb_layout_accordion_title',
                            'label' => 'Title',
                            'name' => 'title',
                            'type' => 'text'
                        ],
                        [
                            'key' => 'field_ispb_layout_accordion_content',
                            'label' => 'Content',
                            'name' => 'content',
                            'type' => 'wysiwyg'
                        ]
                    ]
                ]
            ]
        ];

        $acf_modules['document_viewer'] = [
            'label' => 'Document Viewer',
            'name' => 'document_viewer',
            'key' => 'field_ispb_layout_document',
            'sub_fields' => [
                ACF::get_horizontal_tab('Document', 'field_ispb_layout_document_file_tab'),
                [
                    'key' => 'field_ispb_layout_document_file',
                    'label' => 'Document',
                    'name' => 'document',
                    'type' => 'file',
                ],
                ACF::get_horizontal_tab('Config', 'field_ispb_layout_document_config_tab'),
                [
                    'key' => 'field_ispb_layout_document_template',
                    'label' => 'Template',
                    'type' => 'select',
                    'choices' => Acme::ispb_module_templates('document_viewer'),
                ]
            ]
        ];

        $acf_modules['multi_document_viewer'] = [
            'label' => 'Multiple File Container',
            'name' => 'multiple_file_container',
            'key' => 'field_ispb_layout_multiple_file',
            'sub_fields' => [
                ACF::get_horizontal_tab('Documents', 'field_ispb_layout_multiple_document_files_tab'),
                [
                    'key' => 'field_ispb_layout_multiple_file_container',
                    'label' => 'File Container',
                    'name' => 'file_container',
                    'type' => 'repeater',
                    'button_label' => 'Add File',
                    'min' => 1,
                    'sub_fields' => [
                        [
                            'key' => 'field_ispb_layout_multiple_file_file',
                            'label' => 'File',
                            'name' => 'file',
                            'type' => 'file'
                        ]
                    ]
                ],
                ACF::get_horizontal_tab('Config', 'field_ispb_layout_multiple_document_query_tab'),
                [
                    'key' => 'field_ispb_layout_multiple_file_container_template',
                    'name' => 'template',
                    'label' => 'Template',
                    'type' => 'select',
                    'ui' => 1,
                    'choices' => Acme::ispb_module_templates('multiple_file_container'),
                ]
            ]
        ];

        $acf_modules['button'] = [
            'label' => 'Button',
            'name' => 'button',
            'key' => 'field_ispb_layout_button',
            'sub_fields' => [
                ACF::get_horizontal_tab('Button Options', 'field_ispb_layout_button_links_tab'),
                [
                    'key' => 'field_ispb_layout_button_group',
                    'label' => 'Links',
                    'name' => 'buttons',
                    'type' => 'repeater',
                    'button_label' => 'Add Link',
                    'layout' => 'block',
                    'min' => 1,
                    'sub_fields' => [
                        [
                            'key' => 'field_ispb_layout_button_link',
                            'label' => 'Link',
                            'name' => 'link',
                            'type' => 'link'
                        ]
                    ]
                ],
                ACF::get_horizontal_tab('Config', 'field_ispb_layout_button_config_tab'),
                [
                    'key' => 'field_ispb_layout_button',
                    'name' => 'config',
                    'type' => 'group',
                    'layout' => 'block',
                    'sub_fields' => [
                        [
                            'key' => 'field_ispb_layout_button_group_alignment',
                            'label' => 'Alignment',
                            'name' => 'alignment',
                            'type' => 'button_group',
                            'choices' => [
                                'left' => 'Left',
                                'center' => 'Center',
                                'right' => 'Right'
                            ],
                            'wrapper' => [
                                'width' => 50
                            ]
                        ],
                        [
                            'key' => 'field_ispb_layout_button_group_size',
                            'label' => 'Size',
                            'name' => 'size',
                            'type' => 'button_group',
                            'choices' => [
                                'small' => 'Small',
                                'medium' => 'Medium',
                                'large' => 'Large',
                            ],
                            'wrapper' => [
                                'width' => 50
                            ]
                        ],
                        [
                            'key' => 'field_ispb_layout_button_group_orientation',
                            'label' => 'Orientation',
                            'name' => 'orientation',
                            'type' => 'button_group',
                            'choices' => [
                                'horizontal' => 'Horizontal',
                                'vertical' => 'Vertical',
                            ],
                            'wrapper' => [
                                'width' => 50
                            ]
                        ],
                        ACF::get_color_field('field_ispb_layout_button_group_color_options',
                            [
                                'wrapper' => [
                                    'width' => 50
                                ]
                            ]
                        ),
                        [
                            'key' => 'field_ispb_layout_button_group_hollow',
                            'label' => 'Hollow',
                            'message' => 'Apply Hollow Button Styling',
                            'name' => 'hollow',
                            'type' => 'true_false',
                            'wrapper' => [
                            ]
                        ],
                        // [
                        //     'key' => 'field_ispb_layout_button_template',
                        //     'name' => 'inline_template',
                        //     'type' => 'textarea',
                        //     'label' => 'Inline Twig Template'
                        // ],
                    ]
                ],
            ]
        ];

        $acf_modules['spacer'] = [
            'key' => 'field_ispb_layout_spacer',
            'name' => 'spacer',
            'label' => 'Spacer',
            'display' => 'block',
            'sub_fields' => [
                ACF::get_horizontal_tab('Spacer Size', 'field_ispb_layout_spacer_size_tab'),
                [
                    'key' => 'field_ispb_layout_spacer_size',
                    'label' => 'Size',
                    'name' => 'size',
                    'type' => 'button_group',
                    'default_value' => 'medium',
                    'choices' => [
                        'xsmall' => 'X-Small',
                        'small' => 'Small',
                        'medium' => 'Medium',
                        'large' => 'Large',
                        'xlarge' => 'X-Large',
                    ]
                ],
                ACF::get_horizontal_tab('Divider Options', 'field_ispb_layout_divider_options_tab'),
                [
                    'key' => 'field_ispb_layout_spacer_divider_color',
                    'label' => 'Divider Color',
                    'name' => 'divider_color',
                    'instructions' => 'Leave blank for no divider, choose colors as needed for theme',
                    'type' => 'select',
                    'multiple' => 1,
                    'ui' => 1,
                    'choices' => Acme::build_get_colors_into_background_options_select_choices(),
                ],
                [
                    'key' => 'field_ispb_layout_spacer_divider_position',
                    'label' => 'Divider Position',
                    'name' => 'divider_position',
                    'type' => 'button_group',
                    'default_value' => 'middle',
                    'choices' => [
                        'top' => 'Top',
                        'middle' => 'Middle',
                        'bottom' => 'Bottom',
                    ],
                    'conditional_logic' => [
                        [
                            [
                                'field' => 'field_ispb_layout_spacer_divider_color',
                                'operator' => '!=',
                                'value' => ''
                            ]
                        ]
                    ]
                ],
            ]
        ];

        $acf_modules['header'] = [
            'label' => 'Header',
            'name' => 'header',
            'key' => 'field_ispb_layout_header',
            'sub_fields' => [
                ACF::get_horizontal_tab('Header Text', 'field_ispb_layout_header_text_tab'),
                [
                    'key' => 'field_ispb_layout_header_text',
                    'label' => 'Text',
                    'name' => 'text',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 50
                    ]
                ],
                [
                    'key' => 'field_ispb_layout_header_element',
                    'label' => 'Element',
                    'name' => 'element',
                    'type' => 'select',
                    'choices' => [
                        'h1' => 'H1',
                        'h2' => 'H2',
                        'h3' => 'H3',
                        'h4' => 'H4',
                        'h5' => 'H5',
                        'h6' => 'H6'
                    ],
                    'wrapper' => [
                        'width' => 20
                    ]
                ],
                [
                    'key' => 'field_ispb_layout_header_class',
                    'label' => 'Class',
                    'name' => 'class',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 30
                    ]
                ],
                ACF::get_horizontal_tab('Header Config', 'field_ispb_layout_header_config_tab'),
                ACF::get_color_field('field_ispb_layout_header_color', [
                    'wrapper' => [
                        'width' => 100 / 3
                    ]
                ]),
                [
                    'key' => 'field_ispb_layout_header_alignment',
                    'label' => 'Alignment',
                    'name' => 'alignment',
                    'type' => 'select',
                    'ui' => 1,
                    'allow_null' => 1,
                    'choices' => [
                        'center' => 'Center',
                        'right' => 'Right'
                    ],
                    'wrapper' => [
                        'width' => 100 / 3
                    ]
                ],
                [
                    'key' => 'field_ispb_layout_header_link',
                    'label' => 'Link',
                    'name' => 'link',
                    'type' => 'link',
                    'wrapper' => [
                        'width' => 100 / 3
                    ]
                ],
            ]
        ];

        $acf_modules['oEmbed'] = [
            'key' => 'field_ispb_layout_embed',
            'name' => 'embed',
            'label' => 'Embed',
            'sub_fields' => [
                [
                    'key' => 'field_ispb_layout_embed_aspect_ratio',
                    'name' => 'aspect_ratio',
                    'type' => 'button_group',
                    'default_value' => 'widescreen',
                    'choices' => [
                        '' => 'Letterbox',
                        'widescreen' => 'Widescreen'
                    ]
                ],
                [
                    'key' => 'field_ispb_layout_embed_src',
                    'name' => 'embed',
                    'type' => 'oembed',
                ],
            ]
        ];

        $acf_modules['query'] = [
            'key' => 'field_ispb_layout_query',
            'name' => 'query',
            'label' => 'Query',
            'sub_fields' => [
                ACF::get_horizontal_tab('Query', 'field_ispb_layout_query_Query_tab'),
                [
                    'key' => 'field_ispb_layout_query_args',
                    'label' => 'Query Arguments',
                    'name' => 'arguments',
                    'type' => 'textarea',
                ],
                ACF::get_horizontal_tab('Config', 'field_ispb_layout_query_Config_tab'),
                [
                    'key' => 'field_ispb_layout_query_template',
                    'name' => 'template',
                    'type' => 'select',
                    'label' => 'Template',
                    'choices' => Acme::ispb_module_templates('query'),
                ],
            ]
        ];

        $acf_modules['hero'] = [
            'key' => 'field_ispb_layout_hero',
            'name' => 'hero',
            'label' => 'Hero',
            'sub_fields' => [
                ACF::get_horizontal_tab('Hero', 'field_ispb_layout_hero_Hero_tab'),
                [
                    'key' => 'field_ispb_layout_hero_primary_text',
                    'label' => 'Title',
                    'name' => 'title',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 50,
                    ]
                ],
                // [
                //     'key' => 'field_ispb_layout_hero_secondary_text',
                //     'label' => 'Secondary',
                //     'name' => 'secondary_text',
                //     'type' => 'text',
                //     'wrapper' => [
                //         'width' => 33,
                //     ]
                // ],
                // [
                //     'key' => 'field_ispb_layout_hero_link',
                //     'label' => 'Link',
                //     'name' => 'link',
                //     'type' => 'link',
                //     'wrapper' => [
                //         'width' => 33,
                //     ]
                // ],
                [
                    'key' => 'field_ispb_layout_hero_primary_image',
                    'label' => 'Image',
                    'name' => 'image',
                    'type' => 'image',
                    'preview_size' => 'medium',
                    'wrapper' => [
                        'width' => 50,
                    ]
                ],
                ACF::get_horizontal_tab('WYSIWYG Content', 'field_ispb_layout_hero_wysiwyg_tab'),
                [
                    'key' => 'field_ispb_layout_hero_wysiwyg',
                    'label' => '',
                    'name' => 'wysiwyg',
                    'type' => 'wysiwyg',
                ],
                ACF::get_horizontal_tab('Config', 'field_ispb_layout_hero_Config_tab'),
                [
                    'key' => 'field_ispb_layout_hero_template',
                    'name' => 'template',
                    'type' => 'select',
                    'label' => 'Template',
                    'choices' => Acme::ispb_module_templates('hero'),
                ],
            ]
        ];

        $acf_modules['text_row'] = [
            'key' => 'field_ispb_layout_text_row',
            'label' => 'Text Row',
            'name' => 'text_row',
            'sub_fields' => [
                [
                    'key' => 'field_ispb_layout_text_row_blocks_per_row_count',
                    'label' => 'Cells per row',
                    'name' => 'cells_per_row',
                    'type' => 'number',
                    'min' => 0,
                    'step' => 1,
                ],
                $text_row_cells_repeater = [
                    'key' => 'field_ispb_layout_text_row_columns',
                    'label' => 'Columns',
                    'name' => 'columns',
                    'type' => 'repeater',
                    'button_label' => 'Add Text Row Cell',
                    'sub_fields' => [
                        [
                            'key' => 'field_ispb_layout_text_row_column_content',
                            'label' => 'Content',
                            'name' => 'content',
                            'type' => 'wysiwyg'
                        ]
                    ],
                ],
            ]
        ];

        $acf_modules['cta'] = [
            'key' => 'field_ispb_layout_cta',
            'label' => 'CTA',
            'name' => 'cta',
            'sub_fields' => [
                [
                    'key' => 'field_ispb_layout_cta_template',
                    'name' => 'template',
                    'type' => 'select',
                    'label' => 'Template',
                    'ui' => 1,
                    'choices' => Acme::ispb_module_templates('cta'),
                ],
            ]
        ];

        $acf_modules['wireframe'] = [
            'key' => 'field_ispb_layout_wireframe',
            'label' => 'Wireframe',
            'name' => 'wireframe',
            'sub_fields' => [
                [
                    'key' => 'field_ispb_layout_wireframe_title',
                    'name' => 'title',
                    'type' => 'text',
                    'label' => 'Title',
                    'wrapper' => [
                        'width' => '20'
                    ],
                ],
                [
                    'key' => 'field_ispb_layout_wireframe_height',
                    'name' => 'height',
                    'type' => 'text',
                    'label' => 'Height',
                    'default_value' => '150px',
                    'required' => 1,
                    'wrapper' => [
                        'width' => '20'
                    ],
                ],
                [
                    'key' => 'field_ispb_layout_wireframe_form',
                    'name' => 'form',
                    'type' => 'select',
                    'ui' => 1,
                    'allow_null' => 1,
                    'label' => 'Form',
                    'choices' => Acme::get_gravity_forms(),
                    'wrapper' => [
                        'width' => '20'
                    ],
                ],
                [
                    'key' => 'field_ispb_layout_wireframe_popup_note',
                    'name' => 'note_in_modal',
                    'type' => 'true_false',
                    'label' => 'Note In Modal',
                    'ui' => 1,
                    'wrapper' => [
                        'width' => '15'
                    ],
                ],
                [
                    'key' => 'field_ispb_layout_wireframe_template',
                    'name' => 'template',
                    'type' => 'select',
                    'label' => 'Template',
                    'ui' => 1,
                    'choices' => Acme::ispb_module_templates('wireframe'),
                    'wrapper' => [
                        'width' => '25'
                    ],
                ],
                [
                    'key' => 'field_ispb_layout_wireframe_note',
                    'name' => 'note',
                    'type' => 'wysiwyg',
                    'label' => 'Note',
                    'wrapper' => [
                        'width' => '70'
                    ],
                ],
                [
                    'key' => 'field_ispb_layout_wireframe_links',
                    'name' => 'links',
                    'type' => 'repeater',
                    'button_label' => 'Add Link',
                    'wrapper' => [
                        'width' => '30'
                    ],
                    'sub_fields' => [
                        [
                            'key' => 'field_ispb_layout_wireframe_links_link',
                            'name' => 'link',
                            'type' => 'link',
                            'label' => 'Links',
                            'required' => 1,
                        ],
                    ]
                ],

            ]
        ];

        return $acf_modules;

    }

    static function build_gravity_form_module()
    {

        if (!class_exists('GFAPI')) return [];

        $acf_modules['gravity_form'] = [
            'label' => 'Gravity Form',
            'name' => 'gravity_form',
            'key' => 'field_5a29673e15e9f',
            'sub_fields' => [
                [
                    'key' => 'field_5a29673e15ed7',
                    'label' => 'Form',
                    'name' => 'form',
                    'type' => 'select',
                    'ui' => 1,
                    'choices' => Acme::get_gravity_forms(),
                ]
            ]
        ];

        return $acf_modules;

    }

    static function build_post_archive_module()
    {

        $custom_post_types = Acme::get_post_types();

        $post_archive_custom_post_options = [
            'key' => 'field_ispb_layout_post_archive_manual_selector_repeater',
            'label' => 'Custom Posts',
            'name' => 'custom_posts',
            'type' => 'relationship',
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_ispb_layout_post_archive_cpt_selector',
                        'operator' => '==',
                        'value' => 'is_custom_posts'
                    ]
                ]
            ]
        ];

        $post_archive_post_type = [
            'key' => 'field_ispb_layout_post_archive_cpt_selector',
            'label' => 'Post Type',
            'name' => 'post_type',
            'type' => 'select',
            'wrapper' => [
                'width' => 50
            ],
            'required' => 0,
        ];


        // attaching the post types to the archive module selector


        // TODO: is this being called in acf/init? the cpt var is wrong sometimes


        if (is_array($custom_post_types))
            foreach ($custom_post_types as $post_archetype)
                $post_archive_post_type['choices'][$post_archetype['post_type']] = $post_archetype['name'];

        $post_archive_post_type['choices']['is_custom_posts'] = "Manual Post Selection";


        $post_archive_display_toggle = [
            'key' => 'field_ispb_layout_post_archive_display_type_radio',
            'label' => 'Template Type',
            'name' => 'template_type',
            'type' => 'radio',
            'ui' => 1,
            'instructions' => 'Query templates control the entire cell, excerpt templates will display a standard archive type',
            'default_value' => 'excerpt',
            'choices' => [
                'excerpt' => 'Excerpt',
                'query' => 'Query',
            ],
            'wrapper' => [
                'width' => 50
            ],
        ];

        $post_archive_template = [
            'key' => 'field_ispb_layout_post_archive_template_selector',
            'label' => 'Post Archive Excerpt Template',
            'name' => 'post_archive_excerpt_template',
            'type' => 'select',
            'ui' => 1,
            'choices' => Acme::get_templates('twig/post_excerpts/'),
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_ispb_layout_post_archive_display_type_radio',
                        'operator' => '==',
                        'value' => 'excerpt'
                    ]
                ]
            ]
        ];


        $query_template = [
            'key' => 'field_ispb_layout_post_archive_query_template',
            'label' => 'Post Archive Query Template',
            'name' => 'post_archive_query_template',
            'type' => 'select',
            'ui' => 1,
            'choices' => Acme::get_templates('twig/query_excerpts/'),
            'conditional_logic' => [
                [
                    [
                        'field' => 'field_ispb_layout_post_archive_display_type_radio',
                        'operator' => '==',
                        'value' => 'query'
                    ]
                ]
            ]
        ];

        $post_archive_posts_per_page = [
            'key' => 'field_ispb_layout_post_archive_posts_per_page',
            'label' => 'Posts Per Page',
            'name' => 'posts_per_page',
            'type' => 'text',
            'default_value' => 3,
            'instructions' => '-1 to display all posts',
            'wrapper' => [
                'width' => 33
            ],
        ];

        $post_archive_pagination = [
            'key' => 'field_ispb_layout_post_archive_pagination_boolean',
            'label' => 'Pagination',
            'name' => 'pagination',
            'type' => 'true_false',
            'default_value' => 1,
            'message' => 'Display Pagination',
            'wrapper' => [
                'width' => 33
            ],
        ];

        $post_archive_posts_per_row = [
            'key' => 'field_ispb_layout_post_archive_responsive_row_count',
            'label' => 'Posts Per Row',
            'name' => 'posts_per_row',
            'instructions' => '-1 for all posts in one row',
            'type' => 'group',
            'wrapper' => [
                'width' => 33
            ],
            'sub_fields' => [
                [
                    'key' => 'field_ispb_layout_post_archive_responsive_row_count_small',
                    'label' => 'Small',
                    'name' => 'small',
                    'type' => 'number',
                    'default_value' => 1,
                    'wrapper' => [
                        'width' => 33
                    ],
                ],
                [
                    'key' => 'field_ispb_layout_post_archive_responsive_row_count_medium',
                    'label' => 'Medium',
                    'name' => 'medium',
                    'type' => 'number',
                    'default_value' => 2,
                    'wrapper' => [
                        'width' => 33
                    ],
                ],
                [
                    'key' => 'field_ispb_layout_post_archive_responsive_row_count_large',
                    'label' => 'Large',
                    'name' => 'large',
                    'type' => 'number',
                    'default_value' => 3,
                    'wrapper' => [
                        'width' => 33
                    ],
                ],
            ]
        ];

        $post_archive_custom_query = [
            'key' => 'field_ispb_layout_post_archive_custom_query',
            'name' => 'custom_query',
            'type' => 'textarea',
            'label' => 'Custom Query Args',
            'instructions' => 'Type in your WP Query Object Arguments in JSON notation.',
        ];

        $post_archive_filter_repeater_taxonomy = [
            'key' => 'field_ispb_layout_post_archive_repeater_taxonomy',
            'name' => 'post_archive_filter_repeater_taxonomy',
            'label' => 'Taxonomy',
            'type' => 'select',
            'choices' => Acme::get_categories_for_page_builder_filter_object(),
            'wrapper' => [
                'width' => 60
            ]
        ];
        $post_archive_filter_repeater_display_type = [
            'key' => 'field_ispb_layout_post_archive_repeater_display_type',
            'name' => 'post_archive_filter_repeater_display_type',
            'label' => 'Display Type',
            'type' => 'button_group',
            'ui' => 1,
            'choices' => [
                'select' => 'Dropdown',
                'list' => 'List',
            ],
            'wrapper' => [
                'width' => 25
            ]
        ];

        $post_archive_filter_repeater_allow_multiple = [
            'key' => 'field_ispb_layout_post_archive_repeater_allow_multiple',
            'name' => 'post_archive_filter_repeater_allow_multiple',
            'label' => 'Multi - Select Inputs',
            'type' => 'true_false',
            'ui' => 1,
            'wrapper' => [
                'width' => 15
            ]
        ];

        $post_archive_filter_repeater_fields = [
            $post_archive_filter_repeater_taxonomy,
            $post_archive_filter_repeater_display_type,
            $post_archive_filter_repeater_allow_multiple,
        ];

        $post_archive_filter_repeater = [
            'key' => 'field_ispb_layout_post_archive_filter_repeater',
            'name' => 'filter_repeater',
            'type' => 'repeater',
            'label' => 'Filters',
            'instructions' => 'Add and configure your filters, post types are shown in gray',
            'layout' => 'block',
            'button_label' => 'Add Filter Category',
            'sub_fields' => $post_archive_filter_repeater_fields
        ];


        $conditional_logic_display_filter_templates = [
            [
                [
                    'field' => 'field_ispb_layout_post_archive_display_config_filter_placement',
                    'operator' => '!=',
                    'value' => 'none'
                ]
            ]
        ];

        $post_archive_filter_display_config_filter_placement = [
            'key' => 'field_ispb_layout_post_archive_display_config_filter_placement',
            'name' => 'post_archive_filter_display_config_filter_placement',
            'label' => 'Filter Placement',
            'type' => 'button_group',
            'default_value' => 'none',
            'choices' => [
                'none' => 'None',
                'top' => 'Top',
                'left' => 'Left'
            ],
            'wrapper' => [
                'width' => 25
            ]
        ];

        $post_archive_filter_display_config_filter_title = [
            'key' => 'field_ispb_layout_post_archive_display_config_filter_title',
            'name' => 'post_archive_filter_display_config_filter_title',
            'label' => 'Filter Title',
            'placeholder' => 'Filter & Search',
            'type' => 'text',
            'ui' => 1,
            'wrapper' => [
                'width' => 25
            ],
            'conditional_logic' => $conditional_logic_display_filter_templates
        ];

        $post_archive_filter_display_config_keyword_search = [
            'key' => 'field_ispb_layout_post_archive_display_config_keyword_search',
            'name' => 'post_archive_filter_display_config_keyword_search',
            'label' => 'Keyword Search',
            'type' => 'true_false',
            'ui' => 1,
            'wrapper' => [
                'width' => 25
            ],
            'conditional_logic' => $conditional_logic_display_filter_templates
        ];


        $post_archive_filter_display_config_filter_searchwp_engine = [
            'key' => 'field_ispb_layout_post_archive_display_config_searchwp_engine',
            'name' => 'post_archive_filter_display_config_searchwp_engine',
            'label' => 'SearchWP Engine',
            'type' => 'select',
            'choices' => Acme::get_searchwp_engines_for_page_builder_filter_object(),
            'wrapper' => [
                'width' => 25
            ],
            'conditional_logic' => $conditional_logic_display_filter_templates,
        ];

        $post_archive_filter_display_config_filter_template = [
            'key' => 'field_ispb_layout_post_archive_display_config_filter_template',
            'name' => 'filter_template',
            'label' => 'Filter Template',
            'type' => 'select',
            'ui' => 1,
            'choices' => Acme::get_templates('components/post_archive_filter_templates'),
            'wrapper' => [
                'width' => 30
            ],
            'conditional_logic' => $conditional_logic_display_filter_templates
        ];


        $post_archive_filter_display_config_fields = [
            $post_archive_filter_display_config_filter_placement,
            $post_archive_filter_display_config_filter_title,
            $post_archive_filter_display_config_keyword_search,
            $post_archive_filter_display_config_filter_searchwp_engine,
            $post_archive_filter_display_config_filter_template,
        ];

        $post_archive_filter_display_config = [
            'key' => 'field_ispb_layout_post_archive_filter_display_config',
            'name' => 'filter_display_config',
            'type' => 'group',
            'layout' => 'block',
            'sub_fields' => $post_archive_filter_display_config_fields
        ];


        $post_archive_fields = [
            ACF::get_horizontal_tab('Quick Options', 'field_ispb_layout_post_archive_query'),
            $post_archive_post_type,
            $post_archive_display_toggle,
            $post_archive_custom_post_options,
            $post_archive_template,
            $query_template,
            ACF::get_horizontal_tab('Advanced Config', 'field_ispb_layout_post_archive_manual_config'),
            $post_archive_posts_per_page,
            $post_archive_pagination,
            $post_archive_posts_per_row,
            ACF::get_horizontal_tab('Filtering Options', 'field_ispb_layout_post_archive_filter_options'),
            $post_archive_filter_display_config,
            $post_archive_filter_repeater,
            ACF::get_horizontal_tab('Manual Arguments', 'field_ispb_layout_post_archive_config'),
            $post_archive_custom_query,
        ];

        $acf_modules['post_archive'] = [
            'label' => 'Post Archive',
            'name' => 'post_archive',
            'key' => 'field_5a1c4fd6b8756',
            'sub_fields' => $post_archive_fields
        ];

        return $acf_modules;


    }

    public static function display_inline_template($module)
    {

        if (!isset($module['config']['inline_template'])) return false;

        $acf_inline_template = $module['config']['inline_template'];

        $loader = new \Twig_Loader_Array([
            'inline_template' => $acf_inline_template
        ]);
        $twig = new \Twig_Environment($loader);
        $twig->addExtension(new \Twig_Extension_Debug());

        try {
            return $twig->render('inline_template', ['module' => $module]);
        } catch (exception $e) {
            return "Error at display_inline_template $e";
        }


    }

    public static function display_custom_template($module)
    {

        if (!isset($module['template'])) return false;

        if (!file_exists($module['template'])) return false;

        $post_type_uses_php_template = substr($module['template'], -3, 3) == 'php';

        if ($post_type_uses_php_template):
            ob_start();
            include($module['template']);
            return ob_get_clean();
        endif;

        $template = file_get_contents($module['template']);

        $loader = new \Twig_Loader_Array([
            'custom_template' => $template
        ]);
        $twig = new \Twig_Environment($loader);
        $twig->addExtension(new \Twig_Extension_Debug());


        try {
            return $twig->render('custom_template', ['module' => $module]);
        } catch (exception $e) {
            return "Error at display_custom_template $e";
        }


    }

    public static function acf_flex_to_html($module, $count = false)
    {

        $inline_template = Module::display_inline_template($module);

        if ($inline_template) return $inline_template;

        $custom_template = Module::display_custom_template($module);

        if ($custom_template) return $custom_template;


        $filename = INFINISITE_URI . "module_templates/{$module['acf_fc_layout']}.php";

        if (!file_exists($filename)) {
            if (is_user_logged_in())
                return "<div class='callout alert'><p class='no-padding'>File \"$filename\" not found, please contact the website admin.</p></div>";
        } else {
            ob_start();
            include($filename);
            return ob_get_clean();
        }

    }


}