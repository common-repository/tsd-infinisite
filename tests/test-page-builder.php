<?php
/**
 * Class PageBuilderTest
 *
 * @package Tsd_Infinisite
 */

/**Å
 * Sample test case.
 */
class PageBuilderTest extends WP_UnitTestCase
{

    public function setUp()
    {
//        $this->markTestSkipped('skipped all page builder tests for loading time.');

        parent::setUp();


        $this->post = $this->factory->post->create_and_get();
        $this->cpt_post = $this->factory->post->create_and_get();

        $this->image = $this->factory->attachment->create_and_get();
        $this->svg = $this->factory->attachment->create_and_get();

        $this->image->sizes = TSD_Infinisite\Acme::fudge_image_sizes_for_testing();


        $test_data_acf_page_builder = $this->get_standard_page_builer_test_with_all_layouts();
        $test_data_cpt = $this->get_cpt_meta_fields();

        // build out the page builder data for the primary test post
        update_field('field_ispb_row_repeater', $test_data_acf_page_builder, $this->post->ID);

        // attach each of the test cpt data to our cpt post
        foreach ($test_data_cpt as $key => $value)
            update_field($key, $value, $this->cpt_post->ID);

        $this->assertTrue(true);
    }

    function msg($msg)
    {
        fwrite(STDERR, print_r($msg, TRUE));
    }

    function test_module_to_acf()
    {

        $acf = self::get_sample_module_acf();

        foreach($acf as $type => $module)
            TSD_Infinisite\Module::acf_flex_to_html($module);

        $this->assertTrue(true);
    }

    function test_create_page_builder_layouts()
    {


        $layouts = TSD_Infinisite\Page_Builder::get_page_builder_layouts();

        // TODO: write about all the awful ways this could go wrong


        $is_valid = true;


        $this->assertTrue($is_valid);

    }

    function get_sample_module_acf()
    {
        return array(
            'simple_content' =>
                array(
                    'acf_fc_layout' => 'simple_content',
                    'simple_content' => '
Simple content text here.


',
                    'template' => 'default',
                ),
            'submenu' =>
                array(
                    'acf_fc_layout' => 'submenu',
                    'menu' => 'sitemap-menu',
                    'template' => '/Users/topshelfdesign/Desktop/projects/is-arm/wp-content/plugins/tsd-infinisite/components/submenu_templates/accordion.php',
                ),
            'icon' =>
                array(
                    'acf_fc_layout' => 'icon',
                    'icon' => 'bomb',
                    'svg' => false,
                    'size' => 'fa-4x',
                    'animation_effects' => '',
                    'rotate_flip' => 'fa-rotate-180',
                    'link' =>
                        array(
                            'title' => 'link text here',
                            'url' => 'http://arm:8888/contact/',
                            'target' => '_blank',
                        ),
                    'color_select' => 'primary',
                    'caption' => 'test caption',
                ),
            'single_image' =>
                array(
                    'acf_fc_layout' => 'single_image',
                    'image' =>
                        array(
                            'ID' => 92,
                            'id' => 92,
                            'title' => 'ARM-logo-sm',
                            'filename' => 'ARM-logo-sm.jpg',
                            'url' => 'http://arm:8888/wp-content/uploads/2018/03/ARM-logo-sm.jpg',
                            'alt' => '',
                            'author' => '1',
                            'description' => '',
                            'caption' => '',
                            'name' => 'arm-logo-sm',
                            'date' => '2018-03-19 13:05:47',
                            'modified' => '2018-03-26 15:14:10',
                            'mime_type' => 'image/jpeg',
                            'type' => 'image',
                            'icon' => 'http://arm:8888/wp-includes/images/media/default.png',
                            'width' => 210,
                            'height' => 45,
                            'sizes' =>
                                array(
                                    'thumbnail' => 'http://arm:8888/wp-content/uploads/2018/03/ARM-logo-sm-150x45.jpg',
                                    'thumbnail-width' => 150,
                                    'thumbnail-height' => 45,
                                    'medium' => 'http://arm:8888/wp-content/uploads/2018/03/ARM-logo-sm.jpg',
                                    'medium-width' => 210,
                                    'medium-height' => 45,
                                    'medium_large' => 'http://arm:8888/wp-content/uploads/2018/03/ARM-logo-sm.jpg',
                                    'medium_large-width' => 210,
                                    'medium_large-height' => 45,
                                    'large' => 'http://arm:8888/wp-content/uploads/2018/03/ARM-logo-sm.jpg',
                                    'large-width' => 210,
                                    'large-height' => 45,
                                ),
                        ),
                    'full_width' => false,
                    'link' => '',
                    'template' => 'default',
                ),
            'multiple_images' =>
                array(
                    'acf_fc_layout' => 'multiple_images',
                    'images' =>
                        array(
                            0 =>
                                array(
                                    'ID' => 92,
                                    'id' => 92,
                                    'title' => 'ARM-logo-sm',
                                    'filename' => 'ARM-logo-sm.jpg',
                                    'url' => 'http://arm:8888/wp-content/uploads/2018/03/ARM-logo-sm.jpg',
                                    'alt' => '',
                                    'author' => '1',
                                    'description' => '',
                                    'caption' => '',
                                    'name' => 'arm-logo-sm',
                                    'date' => '2018-03-19 13:05:47',
                                    'modified' => '2018-03-26 15:14:10',
                                    'mime_type' => 'image/jpeg',
                                    'type' => 'image',
                                    'icon' => 'http://arm:8888/wp-includes/images/media/default.png',
                                    'width' => 210,
                                    'height' => 45,
                                    'sizes' =>
                                        array(
                                            'thumbnail' => 'http://arm:8888/wp-content/uploads/2018/03/ARM-logo-sm-150x45.jpg',
                                            'thumbnail-width' => 150,
                                            'thumbnail-height' => 45,
                                            'medium' => 'http://arm:8888/wp-content/uploads/2018/03/ARM-logo-sm.jpg',
                                            'medium-width' => 210,
                                            'medium-height' => 45,
                                            'medium_large' => 'http://arm:8888/wp-content/uploads/2018/03/ARM-logo-sm.jpg',
                                            'medium_large-width' => 210,
                                            'medium_large-height' => 45,
                                            'large' => 'http://arm:8888/wp-content/uploads/2018/03/ARM-logo-sm.jpg',
                                            'large-width' => 210,
                                            'large-height' => 45,
                                        ),
                                ),
                        ),
                    'template' => 'default',
                ),
            'accordion' =>
                array(
                    'acf_fc_layout' => 'accordion',
                    'blade' =>
                        array(
                            0 =>
                                array(
                                    'title' => 'Blade Title',
                                    'content' => '
Content here


',
                                ),
                        ),
                ),
            'document_viewer' =>
                array(
                    'acf_fc_layout' => 'document_viewer',
                    'document' =>
                        array(
                            'ID' => 92,
                            'id' => 92,
                            'title' => 'ARM-logo-sm',
                            'filename' => 'ARM-logo-sm.jpg',
                            'url' => 'http://arm:8888/wp-content/uploads/2018/03/ARM-logo-sm.jpg',
                            'alt' => '',
                            'author' => '1',
                            'description' => '',
                            'caption' => '',
                            'name' => 'arm-logo-sm',
                            'date' => '2018-03-19 13:05:47',
                            'modified' => '2018-03-26 15:14:10',
                            'mime_type' => 'image/jpeg',
                            'type' => 'image',
                            'icon' => 'http://arm:8888/wp-includes/images/media/default.png',
                            'width' => 210,
                            'height' => 45,
                            'sizes' =>
                                array(
                                    'thumbnail' => 'http://arm:8888/wp-content/uploads/2018/03/ARM-logo-sm-150x45.jpg',
                                    'thumbnail-width' => 150,
                                    'thumbnail-height' => 45,
                                    'medium' => 'http://arm:8888/wp-content/uploads/2018/03/ARM-logo-sm.jpg',
                                    'medium-width' => 210,
                                    'medium-height' => 45,
                                    'medium_large' => 'http://arm:8888/wp-content/uploads/2018/03/ARM-logo-sm.jpg',
                                    'medium_large-width' => 210,
                                    'medium_large-height' => 45,
                                    'large' => 'http://arm:8888/wp-content/uploads/2018/03/ARM-logo-sm.jpg',
                                    'large-width' => 210,
                                    'large-height' => 45,
                                ),
                        ),
                ),
            'multiple_file_container' =>
                array(
                    'acf_fc_layout' => 'multiple_file_container',
                    'file_container' =>
                        array(
                            0 =>
                                array(
                                    'file' =>
                                        array(
                                            'ID' => 92,
                                            'id' => 92,
                                            'title' => 'ARM-logo-sm',
                                            'filename' => 'ARM-logo-sm.jpg',
                                            'url' => 'http://arm:8888/wp-content/uploads/2018/03/ARM-logo-sm.jpg',
                                            'alt' => '',
                                            'author' => '1',
                                            'description' => '',
                                            'caption' => '',
                                            'name' => 'arm-logo-sm',
                                            'date' => '2018-03-19 13:05:47',
                                            'modified' => '2018-03-26 15:14:10',
                                            'mime_type' => 'image/jpeg',
                                            'type' => 'image',
                                            'icon' => 'http://arm:8888/wp-includes/images/media/default.png',
                                            'width' => 210,
                                            'height' => 45,
                                            'sizes' =>
                                                array(
                                                    'thumbnail' => 'http://arm:8888/wp-content/uploads/2018/03/ARM-logo-sm-150x45.jpg',
                                                    'thumbnail-width' => 150,
                                                    'thumbnail-height' => 45,
                                                    'medium' => 'http://arm:8888/wp-content/uploads/2018/03/ARM-logo-sm.jpg',
                                                    'medium-width' => 210,
                                                    'medium-height' => 45,
                                                    'medium_large' => 'http://arm:8888/wp-content/uploads/2018/03/ARM-logo-sm.jpg',
                                                    'medium_large-width' => 210,
                                                    'medium_large-height' => 45,
                                                    'large' => 'http://arm:8888/wp-content/uploads/2018/03/ARM-logo-sm.jpg',
                                                    'large-width' => 210,
                                                    'large-height' => 45,
                                                ),
                                        ),
                                ),
                        ),
                    'template' => 'default',
                ),
            'button' =>
                array(
                    'acf_fc_layout' => 'button',
                    'buttons' =>
                        array(
                            0 =>
                                array(
                                    'link' =>
                                        array(
                                            'title' => 'Link',
                                            'url' => 'http://google.com',
                                            'target' => '_blank',
                                        ),
                                ),
                            1 =>
                                array(
                                    'link' =>
                                        array(
                                            'title' => 'Link 2',
                                            'url' => 'http://yahoo.com',
                                            'target' => '_blank',
                                        ),
                                ),
                        ),
                    'config' =>
                        array(
                            'alignment' => 'left',
                            'size' => 'small',
                            'orientation' => 'horizontal',
                            'color_select' => 'primary',
                            'hollow' => false,
                        ),
                ),
            'spacer' =>
                array(
                    'acf_fc_layout' => 'spacer',
                    'size' => 'medium',
                    'divider_color' =>
                        array(
                            0 => 'primary_xxdark',
                            1 => 'gray_xxlight',
                        ),
                    'divider_position' => 'middle',
                ),
            'header' =>
                array(
                    'acf_fc_layout' => 'header',
                    'text' => 'Header Text Here',
                    'element' => 'h3',
                    'class' => 'class-here class-2-here',
                    'color_select' => 'primary',
                    'alignment' => 'center',
                    'link' =>
                        array(
                            'title' => 'Link Text',
                            'url' => 'http://google.com',
                            'target' => '_blank',
                        ),
                ),
            'embed' =>
                array(
                    'acf_fc_layout' => 'embed',
                    'aspect_ratio' => 'widescreen',
                    'embed' => '',
                ),
            'query' =>
                array(
                    'acf_fc_layout' => 'query',
                    'arguments' => '{
  "post_type": "any",
  "posts_per_page": "5"
}',
                    'template' => 'default',
                ),
            'hero' =>
                array(
                    'acf_fc_layout' => 'hero',
                    'title' => 'Title',
                    'image' =>
                        array(
                            'ID' => 92,
                            'id' => 92,
                            'title' => 'ARM-logo-sm',
                            'filename' => 'ARM-logo-sm.jpg',
                            'url' => 'http://arm:8888/wp-content/uploads/2018/03/ARM-logo-sm.jpg',
                            'alt' => '',
                            'author' => '1',
                            'description' => '',
                            'caption' => '',
                            'name' => 'arm-logo-sm',
                            'date' => '2018-03-19 13:05:47',
                            'modified' => '2018-03-26 15:14:10',
                            'mime_type' => 'image/jpeg',
                            'type' => 'image',
                            'icon' => 'http://arm:8888/wp-includes/images/media/default.png',
                            'width' => 210,
                            'height' => 45,
                            'sizes' =>
                                array(
                                    'thumbnail' => 'http://arm:8888/wp-content/uploads/2018/03/ARM-logo-sm-150x45.jpg',
                                    'thumbnail-width' => 150,
                                    'thumbnail-height' => 45,
                                    'medium' => 'http://arm:8888/wp-content/uploads/2018/03/ARM-logo-sm.jpg',
                                    'medium-width' => 210,
                                    'medium-height' => 45,
                                    'medium_large' => 'http://arm:8888/wp-content/uploads/2018/03/ARM-logo-sm.jpg',
                                    'medium_large-width' => 210,
                                    'medium_large-height' => 45,
                                    'large' => 'http://arm:8888/wp-content/uploads/2018/03/ARM-logo-sm.jpg',
                                    'large-width' => 210,
                                    'large-height' => 45,
                                ),
                        ),
                    'wysiwyg' => '
WYSIWYG content


',
                    'template' => 'default',
                ),
            'text_row' =>
                array(
                    'acf_fc_layout' => 'text_row',
                    'cells_per_row' => '2',
                    'columns' =>
                        array(
                            0 =>
                                array(
                                    'content' => '
Text Row A


',
                                ),
                            1 =>
                                array(
                                    'content' => '
Text Row B


',
                                ),
                        ),
                ),
            'cta' =>
                array(
                    'acf_fc_layout' => 'cta',
                    'template' => 'default',
                ),
            'wireframe' =>
                array(
                    'acf_fc_layout' => 'wireframe',
                    'title' => 'Wireframe Title',
                    'height' => '150px',
                    'form' => '1',
                    'note_in_modal' => true,
                    'template' => 'default',
                    'note' => '
Wireframe contetn here.


',
                    'links' =>
                        array(
                            0 =>
                                array(
                                    'link' =>
                                        array(
                                            'title' => 'Link A',
                                            'url' => 'http://google.com',
                                            'target' => '_blank',
                                        ),
                                ),
                            1 =>
                                array(
                                    'link' =>
                                        array(
                                            'title' => 'Link B',
                                            'url' => 'http://google.com',
                                            'target' => '_blank',
                                        ),
                                ),
                        ),
                ),
            'gravity_form' =>
                array(
                    'acf_fc_layout' => 'gravity_form',
                    'form' => '1',
                ),
        );
    }

    function get_standard_page_builer_test_with_all_layouts()
    {

        $acf = self::get_sample_module_acf();
        return [
            [
                'field_ispb_cell_repeater' => [
                    [
                        'field_ispb_cell_acf_fc_container' => $acf,
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
            'excerpt' => '<p>Post Excerpt</p>',

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
