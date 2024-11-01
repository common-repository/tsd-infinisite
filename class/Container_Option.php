<?

namespace TSD_Infinisite;

class Container_Option
{

    static function register_container_options()
    {


        $container_options_field_group = self::build_container_options();

        acf_add_local_field_group($container_options_field_group);

    }

    static function build_container_options()
    {

        $dummy = [
            'key' => '',
            'label' => '',
            'name' => '',
            'type' => ''
        ];


        $background_color = [
            'key' => 'field_5a1eb6fca1450',
            'label' => 'Color',
            'name' => 'color',
            'type' => 'color_picker',
            'wrapper' => [
                'width' => 50
            ]
        ];

        $background_image = [
            'key' => 'field_5a1eb6fca14c7',
            'label' => 'Image',
            'name' => 'image',
            'type' => 'image',
            'wrapper' => [
                'width' => 50
            ]
        ];

        $background_options = [
            'key' => 'field_5a1eb6fca1503',
            'label' => 'Background Options',
            'name' => 'background_options',
            'type' => 'group',
            'sub_fields' => [
                $background_color,
                $background_image
            ]
        ];

        $container_header_footer_options = [
            'key' => 'field_5a1eb6fca1bf4',
            'label' => 'Header / Footer Placement',
            'name' => 'header_footer_placement',
            'type' => 'group',
            'sub_fields' => [
                [
                    'key' => 'field_5a1eb6fca1b7d',
                    'name' => 'header',
                    'type' => 'true_false',
                    'message' => 'Display Header in Container',
                    'wrapper' => [
                        'width' => 50
                    ]
                ],
                [
                    'key' => 'field_5a1eb6fca1bb9',
                    'name' => 'footer',
                    'type' => 'true_false',
                    'message' => 'Display Footer in Container',
                    'wrapper' => [
                        'width' => 50
                    ]
                ]
            ]
        ];

        $container_width = [
            'key' => 'field_5a1eb6fca1a9d',
            'label' => 'Width',
            'name' => 'width',
            'type' => 'group',
            'sub_fields' => [
                [
                    'key' => 'field_5a1eb6fca1aca',
                    'label' => 'Large',
                    'name' => 'large',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 33.3
                    ]
                ],
                [
                    'key' => 'field_5a1eb6fca1b06',
                    'label' => 'Extra Large',
                    'name' => 'xlarge',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 33.3
                    ]
                ],
                [
                    'key' => 'field_5a1eb6fca1b42',
                    'label' => 'Double XL',
                    'name' => 'double_xl',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 33.3
                    ]
                ]
            ]
        ];


        $container_padding = [
            'key' => 'field_5a1eb6fca1678',
            'label' => 'Container Padding',
            'name' => 'container_padding',
            'instructions' => 'Padding will include Header and Footer if placed inside',
            'type' => 'group',
            'wrapper' => [
                'width' => 50
            ],
            'sub_fields' => [
                [
                    'key' => 'field_5a1eb6fca153d',
                    'label' => 'Top',
                    'name' => 'top',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 25
                    ]
                ],
                [
                    'key' => 'field_5a1eb6fca1578',
                    'label' => 'Bottom',
                    'name' => 'bottom',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 25
                    ]
                ],
                [
                    'key' => 'field_5a1eb6fca15fe',
                    'label' => 'Left',
                    'name' => 'left',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 25
                    ]
                ],
                [
                    'key' => 'field_5a1eb6fca163c',
                    'label' => 'Right',
                    'name' => 'right',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 25
                    ]
                ],
            ]
        ];

        $wrapper_padding = [
            'key' => 'field_5a1eb6fca179d',
            'label' => 'Wrapper Padding',
            'name' => 'wrapper_padding',
            'instructions' => 'Padding will not include Header and Footer if placed inside',
            'type' => 'group',
            'wrapper' => [
                'width' => 50
            ],
            'sub_fields' => [
                [
                    'key' => 'field_5a1eb6fca16b2',
                    'label' => 'Top',
                    'name' => 'top',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 25
                    ]
                ],
                [
                    'key' => 'field_5a1eb6fca16ed',
                    'label' => 'Bottom',
                    'name' => 'bottom',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 25
                    ]
                ],
                [
                    'key' => 'field_5a1eb6fca1727',
                    'label' => 'Left',
                    'name' => 'left',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 25
                    ]
                ],
                [
                    'key' => 'field_5a1eb6fca1762',
                    'label' => 'Right',
                    'name' => 'right',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 25
                    ]
                ],
            ]
        ];

        $container_background = [
            'key' => 'field_5a1eb6fca17d8',
            'label' => 'Container Background',
            'name' => 'container_background',
            'type' => 'group',
            'sub_fields' => [
                [
                    'key' => 'field_5a1eb6fca1813',
                    'label' => 'Color',
                    'name' => 'color',
                    'type' => 'color_picker',
                    'wrapper' => [
                        'width' => 50
                    ]
                ],
                [
                    'key' => 'field_5a1eb6fca1888',
                    'label' => 'Image',
                    'name' => 'image',
                    'type' => 'image',
                    'wrapper' => [
                        'width' => 50
                    ]
                ]
            ]
        ];

        $container_border = [
            'key' => 'field_5a1eb6fca18c3',
            'label' => 'Container Border',
            'name' => 'container_border',
            'type' => 'group',
            'sub_fields' => [
                [
                    'key' => 'field_5a1eb6fca18fd',
                    'label' => 'Top',
                    'name' => 'top',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 25
                    ]
                ],
                [
                    'key' => 'field_5a1eb6fca19ae',
                    'label' => 'Bottom',
                    'name' => 'bottom',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 25
                    ]
                ],
                [
                    'key' => 'field_5a1eb6fca19e9',
                    'label' => 'Left',
                    'name' => 'left',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 25
                    ]
                ],
                [
                    'key' => 'field_5a1eb6fca1a25',
                    'label' => 'Right',
                    'name' => 'right',
                    'type' => 'text',
                    'wrapper' => [
                        'width' => 25
                    ]
                ],
            ]
        ];


        $container_options = [
            'key' => 'field_5a1eb6fca1a61',
            'label' => 'Container',
            'name' => 'container_options',
            'type' => 'group',
            'sub_fields' => [
                $container_header_footer_options,
                $container_width,
                $container_padding,
                $wrapper_padding,
                $container_background,
                $container_border,
            ]
        ];

        $field_group = [
            'key' => 'field_5a1eb6fca148b',
            'title' => 'Container Options',
            'location' => [
                [
                    [
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'acf-options-container',
                    ]
                ],
            ],
            'fields' => [
                $background_options,
                $container_options
            ]
        ];

        return $field_group;

    }

}