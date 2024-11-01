<?

class IS_Test extends WP_UnitTestCase
{


    public function __construct()
    {


        $this->post = $this->factory->post->create_and_get();
        $this->svg = $this->factory->attachment->create_and_get();
        $this->image = $this->factory->attachment->create_and_get();
        $this->page_builder_content = $this->get_standard_page_builer_test_with_all_layouts();
        $this->cpt_fields = $this->get_cpt_meta_fields();
    }

    function get_standard_page_builer_test_with_all_layouts()
    {
        return [
            [
                'field_ispb_cell_repeater' => [
                    [
                        'field_ispb_cell_acf_fc_container' => [


                            [
                                'acf_fc_layout' => 'simple_content',
                                'field_ispb_layout_simple_content_wysiwyg' => 'Content Here',
                            ],

                            // TODO: get this working - need to make test data menu
                            // [
                            //     'acf_fc_layout' => 'submenu',
                            //     'menu' => '',
                            //     'template' => '',
                            // ],

                            [
                                'acf_fc_layout' => 'post_archive',
                                'custom_posts' => [
                                    // TODO: get these guys back!
                                    // $this->cpt_post->ID,
                                    // $this->cpt_post->ID,
                                    // $this->cpt_post->ID,
                                ],
                                'post_type' => 'page',
                                'template' => 'blog_excerpt.twig',
                                'posts_per_page' => '3',
                                'pagination' => '1',
                                'posts_per_row' => [
                                    'small' => '1',
                                    'medium' => '2',
                                    'large' => '3',
                                ],

                                'custom_query' => '',
                            ],

                            // two icons - this one with an svg
                            [
                                'acf_fc_layout' => 'icon',
                                'icon' => false,
                                'svg' => $this->svg,
                                'size' => 'fa-8x',
                                'animation_effects' => 'fa-pulse',
                                'rotate_flip' => 'fa-flip-horizontal',
                                'link' => [
                                    'title' => 'Title Text Here',
                                    'url' => 'http://google.com',
                                    'target' => '_blank',
                                ],

                                'color_select' => [
                                    'site_colors' => 'custom',
                                    'custom_color' => '#81d742',
                                ],

                                'caption' => 'Caption Here',
                            ],
                            // and this one with an icon
                            [
                                'acf_fc_layout' => 'icon',
                                'icon' => 'fs-bomb',
                                'svg' => false,
                                'size' => 'fa-8x',
                                'animation_effects' => 'fa-pulse',
                                'rotate_flip' => 'fa-flip-horizontal',
                                'link' => [
                                    'title' => 'Title Text Here',
                                    'url' => 'http://google.com',
                                    'target' => '_blank',
                                ],

                                'color_select' => [
                                    'site_colors' => 'custom',
                                    'custom_color' => '#81d742',
                                ],

                                'caption' => 'Caption Here',
                            ],

                            // default tempalte
                            [
                                'acf_fc_layout' => 'single_image',
                                'image' => $this->image->ID,
                                'full_width' => '1',
                            ],

                            // custom tempalte
                            [
                                'acf_fc_layout' => 'single_image',
                                'image' => $this->image->ID,
                                'full_width' => '1',
                                'template' => INFINISITE_URI . 'twig/layouts/single_image/gallery.twig'
                            ],

                            [
                                'acf_fc_layout' => 'multiple_images',
                                'images' => [
                                    '0' => $this->image->ID,
                                    '1' => $this->image->ID,
                                ],

                            ],

                            [
                                'acf_fc_layout' => 'accordion',
                                'blade' => [
                                    '0' => [
                                        'title' => 'Accordion Blade',
                                        'content' => '<p>Accordion Content</p>',

                                    ],

                                ],

                            ],

                            [
                                'acf_fc_layout' => 'post_archive',
                                'custom_posts' => [],
                                'post_type' => 'is_custom_posts',
                                'template' => 'blog_excerpt.twig',
                                'posts_per_page' => '3',
                                'pagination' => '1',
                                'posts_per_row' => [
                                    'small' => '1',
                                    'medium' => '2',
                                    'large' => '3',
                                ],

                                'custom_query' => '',
                            ],

                            [
                                'acf_fc_layout' => 'spacer',
                                'size' => 'medium',
                                'show_divider' => '1',
                            ],

                            [
                                'acf_fc_layout' => 'header',
                                'text' => 'Header Here',
                                'element' => 'h1',
                                'color_select' => [
                                    'site_colors' => 'custom',
                                    'custom_color' => '#1e73be',
                                ],

                                'alignment' => 'right',
                                'link' => [
                                    'title' => '',
                                    'url' => 'http://localhost:8888/sample-page/',
                                    'target' => '',
                                ],

                            ],

                            [
                                'acf_fc_layout' => 'embed',
                                'aspect_ratio' => 'widescreen',
                                'embed' => '<iframe width="520" height="390" src="https://www.youtube.com/embed/4BXpi7056RM?feature=oembed" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>',
                            ]


                        ],

                        'field_ispb_cell_config_background_options' => [
                            'field_ispb_cell_config_background_options_custom_color' => '#00ff00',
                            'field_ispb_cell_config_background_options_color' => '#0000ff',
                            'field_ispb_cell_config_background_options_image' => $this->image->ID,
                            'field_ispb_cell_config_background_options_blending' => 'multiply',
                            'field_ispb_cell_config_background_options_opacity' => '.5',
                        ],

                        'field_ispb_cell_config_col_width' => [
                            'field_ispb_cell_config_col_width_mobile' => 12,
                            'field_ispb_cell_config_col_width_tablet' => 4,
                            'field_ispb_cell_config_col_width_desktop' => 4,
                            'field_ispb_cell_config_col_width_large_desktop' => '',
                        ],

                        'field_ispb_cell_config_vertical_self_alignment' => 'middle',
                    ],

                ],

                'field_ispb_row_config_background_options' => [
                    'field_ispb_row_config_background_options_custom_color' => '#003300',
                    'field_ispb_row_config_background_options_color' => '#0000cc',
                    'field_ispb_row_config_background_options_image' => $this->image->ID,
                    'field_ispb_row_config_background_options_blending' => 'overlay',
                    'field_ispb_row_config_background_options_opacity' => '.25',
                ],

                'field_ispb_row_dimensions' => [
                    'field_ispb_row_config_max_width_width' => '1200px',
                    'field_ispb_row_config_max_width_height' => '80%',
                ],

                'field_ispb_row_flex_align' => [
                    'field_ispb_row_flex_align_horizontal' => 'left',
                    'field_ispb_row_flex_align_vertical' => 'top',
                ],

                'field_ispb_row_spacers' => [
                    'field_ispb_row_spacers_top' => 'medium',
                    'field_ispb_row_spacers_bottom' => 'medium',
                ]

            ]


        ];
    }


    function get_cpt_meta_fields()
    {

        return [
            'name' => 'Name',
            'title' => 'Title',
            'image' => $this->image->ID,
            'embed' => "<iframe width='640' height='360' src='https://www.youtube.com/embed/bKLDOyYTXMo?feature=oembed' frameborder='0' gesture='media' allow='encrypted-media' allowfullscreen></iframe>",
            'file' => [
                'ID' => '8',
                'id' => '8',
                'title' => 'Jesper Reeh - CV',
                'filename' => 'Jesper-Reeh-CV.pdf',
                'url' => 'http://localhost:8888/wp-content/uploads/2017/12/Jesper-Reeh-CV.pdf',
                'alt' => '',
                'author' => '1',
                'description' => '',
                'caption' => '',
                'name' => 'jesper-reeh-cv',
                'date' => '2017-12-26 12:43:14',
                'modified' => '2017-12-26 12:43:14',
                'mime_type' => 'application/pdf',
                'type' => 'application',
                'icon' => 'http://localhost:8888/wp-includes/images/media/document.png',
            ],

            'identification' => 'Identification',
            'link' => [
                'title' => 'Link Text Here',
                'url' => 'http://google.com',
                'target' => '_blank',
            ],

            'subtitle' => 'Subtitle',
            'start_date' => '20/12/2017',
            'end_date' => '22/12/2017',
            'location' => [
                'address' => '485 Lonsdale St, Melbourne VIC 3000, Australia',
                'lat' => '-37.81388214027176',
                'lng' => '144.95824813842773',
            ],

            'address_line_1' => 'Address Line 1',
            'address_line_2' => 'Address Line 2',
            'author' => 'Author',
            'excerpt' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at condimentum tellus, bibendum condimentum leo. Aliquam fringilla tortor ex, ac blandit ex suscipit in. Sed lacinia libero eget nulla vestibulum ornare. Interdum et malesuada fames ac ante ipsum primis in faucibus. </p>',
            'source' => 'Source',
            'hours' => 'Hours',
            'phone_number' => '1231231231',
            'email_address' => 'email@address.com',
            'fax_number' => '1231231232',
            'facebook' => 'http://facebook.com',
            'linkedin' => 'http://linkedin.com',
            'twitter' => 'http://twitter.com',
            'youtube' => 'http://youtube.com',
            'instagram' => 'http://instagram.com',
        ];


    }


}