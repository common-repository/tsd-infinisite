<?

namespace TSD_Infinisite;

class Editor
{


    public static function tinymce_cache_buster($mce_init)
    {
        $rand = rand(0, 9999);
        $mce_init['cache_suffix'] = "v=$rand";

        return $mce_init;
    }


    public static function update_formats_and_colors($init_array)
    {

        // Define the style_formats array

        $formats = 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img, span, strong, em';
        $colors = Acme::get_colors();

        $style_formats = [];

        $color_format_menu = [
            'title' => 'Text Colors',
            'items' => ACF::get_mce_format_menu_color_options($formats, 'text')
        ];

        $link_color_format_menu = [
            'title' => 'Link Colors',
            'items' => ACF::get_mce_format_menu_color_options('a', 'link')
        ];


        $background_color_format_menu = [
            'title' => 'Background Colors',
            'items' => ACF::get_mce_format_menu_color_options($formats, 'background')
        ];

        $style_formats[] = $color_format_menu;
        $style_formats[] = $link_color_format_menu;
        $style_formats[] = $background_color_format_menu;

        $link_format_menu = [
            'title' => 'Link Formats',
            'items' => [
                [
                    'title' => 'Button',
                    'selector' => 'a',
                    'classes' => 'button',
                ],
                [
                    'title' => 'Colors',
                    'items' => ACF::get_mce_format_menu_color_options('a')
                ],
                [
                    'title' => 'Button Sizes',
                    'items' => [
                        [
                            'title' => 'Small',
                            'selector' => '.button',
                            'classes' => 'small',
                        ],
                        [
                            'title' => 'Medium',
                            'selector' => '.button',
                            'classes' => 'medium',
                        ],
                        [
                            'title' => 'Large',
                            'selector' => '.button',
                            'classes' => 'large',
                        ],
                    ]
                ],
                [
                    'title' => 'Hollow Button',
                    'selector' => 'a.button',
                    'classes' => 'hollow',
                ],
                [
                    'title' => 'Arrow Link',
                    'selector' => 'a',
                    'classes' => 'arrow_link',
                ],
            ],
        ];

        $remove_padding_format_options = [
            [
                'title' => 'Top',
                'selector' => $formats,
                'classes' => 'no-top-padding'
            ],
            [
                'title' => 'Bottom',
                'selector' => $formats,
                'classes' => 'no-bottom-padding'
            ],
            [
                'title' => 'Left',
                'selector' => $formats,
                'classes' => 'no-left-padding'
            ],
            [
                'title' => 'Right',
                'selector' => $formats,
                'classes' => 'no-right-padding'
            ],
        ];

        $remove_margin_format_options = [
            [
                'title' => 'Top',
                'selector' => $formats,
                'classes' => 'no-top-margin'
            ],
            [
                'title' => 'Bottom',
                'selector' => $formats,
                'classes' => 'no-bottom-margin'
            ],
            [
                'title' => 'Left',
                'selector' => $formats,
                'classes' => 'no-left-margin'
            ],
            [
                'title' => 'Right',
                'selector' => $formats,
                'classes' => 'no-right-margin'
            ],
        ];

        $spacing_options_menu = [
            'title' => 'Spacing',
            'items' => [
                [
                    'title' => 'Remove Padding',
                    'items' => $remove_padding_format_options
                ],
                [
                    'title' => 'Remove Margin',
                    'items' => $remove_margin_format_options
                ]
            ]
        ];

        $style_formats[] = $link_format_menu;
        $style_formats[] = $spacing_options_menu;


        // Insert the array, JSON ENCODED, into 'style_formats'
        $init_array['style_formats'] = json_encode($style_formats);


//        $font_options = Module::get_elements();

        $fonts_for_checking = [];

        // TODO: not updating fonts in editor

        $global_type_options = [
            get_field("heading_one", "options"),
            get_field("heading_two", "options"),
            get_field("heading_three", "options"),
            get_field("heading_four", "options"),
            get_field("heading_five", "options"),
            get_field("heading_six", "options"),
            get_field("list_item", "options"),
            get_field("link", "options"),
            get_field("paragraph", "options"),
        ];

        foreach ($global_type_options as $type_option)
            $fonts_for_checking[] = $type_option['font_family'];

        $fonts_for_editor = array_unique($fonts_for_checking);


        $mce_fonts = '';

        foreach ($fonts_for_editor as $option):
            $font = explode("||", $option);
            $mce_fonts .= "{$font[0]}={$font[0]};";
        endforeach;

        $init_array['font_formats'] = $mce_fonts;


        $init_array['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 18px 21px 24px 28px 32px 36px";


        return $init_array;


    }

    public static function toolbar_row_3($buttons)
    {

        array_unshift($buttons, 'styleselect');
        array_unshift($buttons, 'fontselect');
        array_unshift($buttons, 'fontsizeselect');
        return $buttons;

    }

    public static function admin_init_fn()
    {
        self::enqueue_editor_styles();
        add_editor_style(INFINISITE_CSS . "/editor.php", 1);
    }

    public static function test()
    {

    }

    public static function remove_editor_from_page_and_post_type()
    {

        remove_post_type_support('page', 'editor');
        remove_post_type_support('post', 'editor');

//        remove_post_type_support('post_type_b', 'editor');

//        $post_types = Acme::get_post_types();;
//
//        print_r($post_types);
//        foreach($post_types as $post_type)
//            remove_post_type_support($post_type['slug'], 'editor');
    }

    public static function enqueue_editor_styles()
    {
        // todo:: this is firing in non-admin
//        wp_enqueue_style('custom_editor_style_admin', INFINISITE_CSS . "/editor.php");
//        wp_enqueue_style('custom-foundation-styles', INFINISITE_CSS . '/is_foundation_styles.css');

//        wp_enqueue_style('custom-text-styles', INFINISITE_CSS . '/is_text_styles.css');
    }


}


class Filter
{


    public static function add_specific_menu_location_atts($atts, $item, $args)
    {
        // check if the item is in the primary menu

        $menus = [
            'patient_quick_links_menu',
            'caregiver_quick_links_menu',
            'medical_professionals_quick_links_menu'
        ];

        if (in_array($args->theme_location, $menus)) {
            // add the desired attributes:
            $atts['class'] = 'button';
        }
        return $atts;
    }

}