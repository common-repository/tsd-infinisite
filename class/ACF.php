<?

namespace TSD_Infinisite;

class ACF
{

    static function get_background_display_options($key = false, $fields_from_user = false)
    {

        /*
         *
         * this function was originally built to have margin and padding in them -
         * i'm moving away from that, but i dont want to pull the code out until i'm
         * sure we don't need them
         *
         *
         */


        if (!$key) return false;

        $defaults = [];

        $fields = wp_parse_args($defaults, $fields_from_user);

        $color = [
            'key' => "{$key}_color",
            'label' => "Color",
            'name' => 'color',
            'type' => 'select',
            'allow_null' => 1,
            'ui' => 1,
            'choices' => Acme::build_get_colors_into_background_options_select_choices(),
            'wrapper' => [
                'width' => 10
            ]
        ];

        $image = [
            'key' => "{$key}_image",
            'label' => "Image",
            'name' => 'image',
            'type' => 'image',
            'preview_size' => 'medium',
            'wrapper' => [
                'width' => 15
            ]
        ];

        $blending = [
            'key' => "{$key}_blending",
            'label' => "Blending",
            'name' => 'blending',
            'type' => 'select',
            'ui' => 1,
            'allow_null' => 1,
            'choices' => [
                "normal" => "Normal",
                "multiply" => "Multiply",
                "screen" => "Screen",
                "overlay" => "Overlay",
                "darken" => "Darken",
                "lighten" => "Lighten",
                "color_dodge" => "Color_dodge",
                "saturation" => "Saturation",
                "color" => "Color",
                "luminosity" => "Luminosity",
            ],
            'wrapper' => [
                'width' => 25
            ]
        ];

        $opacity = [
            'key' => "{$key}_opacity",
            'label' => "Color Opacity",
            'name' => 'opacity',
            'type' => 'number',
            'min' => 0,
            'max' => 1,
            'step' => .01,
            'suffix' => '%',
            'wrapper' => [
                'width' => 10
            ]
        ];

        $map_image_to_viewport_edges = [
            'key' => "{$key}_map_to_viewport_edges",
            'label' => "Map to Viewport Edges",
            'name' => 'viewport_edge',
            'instructions' => 'Use if you need the background image to extend beyond the horizontal content',
            'type' => 'true_false',
            'ui' => 1,
            'wrapper' => [
                'width' => 10
            ]
        ];

        $background_position = [
            'key' => "{$key}_background_position",
            'label' => "Background Position",
            'name' => 'position',
            'type' => 'text',
            'required' => 1,
            'default_value' => 'center',
            'wrapper' => [
                'width' => 15
            ]
        ];


        $background_size = [
            'key' => "{$key}_background_size",
            'label' => "Background Size",
            'name' => 'size',
            'type' => 'text',
            'default_value' => 'cover',
            'required' => 1,
            'wrapper' => [
                'width' => 15
            ]
        ];

        $background_repeat = [
            'key' => "{$key}_background_repeat",
            'label' => "Image Repeat",
            'name' => 'repeat',
            'type' => 'select',
            'choices' => [
                'no-repeat' => 'None',
                'repeat-x' => 'Repeat X',
                'repeat-y' => 'Repeat Y',
                'repeat' => 'Repeat',
            ],
            'default_value' => 'no-repeat',
            'wrapper' => [
                'width' => 15
            ]
        ];



        $return = [];

        if (in_array('color', $fields)):
            $return[] = $color;
        endif;

        if (in_array('image', $fields)):
            // $return[] = $blending;
            $return[] = $opacity;
            $return[] = $image;
            $return[] = $map_image_to_viewport_edges;
            $return[] = $background_position;
            $return[] = $background_size;
            $return[] = $background_repeat;
        endif;


        return $return;

    }

    static function get_color_field($key = false, $atts = [])
    {

        if (!$key) return false;

        $defaults = [
            'label' => "Color Select",
            'name' => 'color_select',
            'type' => 'select',
            'ui' => 1,
            'key' => $key,
            'default_value' => 'primary',
            'choices' => Acme::build_get_colors_into_background_options_select_choices(),
        ];

        $acf_field = \wp_parse_args($atts, $defaults);

        return $acf_field;

    }

    static function get_accordion($key = false, $title = false, $args = [])
    {

        $defaults = [
            'type' => 'accordion',
            'closed' => 1
        ];

        if ($key) $defaults['key'] = $key;

        $acf_field = \wp_parse_args($args, $defaults);

        $acf_field['label'] = $title ? $title : 'Accordion';
        if (!$title) $acf_field['endpoint'] = 1;

        return $acf_field;

    }

    static function get_tab($key = false, $title = 'Tab Divider', $args = [])
    {

        // this is used in the foundation options - tread lightly!
        if (!$key) return;

        $defaults = [
            'key' => $key,
            'label' => $title,
            'type' => 'tab',
            'placement' => 'left',
        ];

        $acf_field = \wp_parse_args($args, $defaults);

        return $acf_field;

    }

    static function get_horizontal_tab($title, $key = false, $args = [])
    {

        $defaults = [
            'type' => 'tab',
        ];

        if ($title) $defaults['label'] = $title;
        if ($title) $defaults['key'] = $key;

        $acf_field = \wp_parse_args($args, $defaults);

        return $acf_field;

    }

    static function get_flexbox_alignment_classes_group($key = false, $args = [])
    {

        if (!$key) return;

        $flexbox_horizontal_alignment_class = [
            'key' => "{$key}_horizontal",
            'type' => 'select',
            'ui' => 1,
            'name' => 'horizontal_alignment',
            'choices' => [
                'left' => 'Left',
                'center' => 'Center',
                'right' => 'Right',
                'space-around' => 'Space Around',
                'space-between' => 'Space Between',
            ],
            'wrapper' => [
                'width' => 50
            ]
        ];
        $flexbox_vertical_alignment_class = [
            'key' => "{$key}_vertical",
            'type' => 'select',
            'ui' => 1,
            'name' => 'vertical_alignment',
            'choices' => [
                'top' => 'Top',
                'middle' => 'Middle',
                'bottom' => 'Bottom',
            ],
            'wrapper' => [
                'width' => 50
            ]
        ];


        $defaults = [
            'key' => $key,
            'name' => Acme::strip_field_for_name($key),
            'label' => 'Flexbox Alignment Classes',
            'type' => 'group',
            'sub_fields' => [
                $flexbox_horizontal_alignment_class,
                $flexbox_vertical_alignment_class,
            ]
        ];

        $flexbox_classes = \wp_parse_args($args, $defaults);

        return $flexbox_classes;

    }

    static function get_row_width_height($key = false, $args = [])
    {

        if (!$key) return;

        $width = [
            'key' => "{$key}_width",
            'ui' => 1,
            'name' => 'max_width',
            'placeholder' => 'Max Width',
            'type' => 'text',
            'wrapper' => [
                'width' => 50
            ]
        ];

        $height = [
            'key' => "{$key}_height",
            'ui' => 1,
            'name' => 'fixed_height',
            'placeholder' => 'Fixed Height',
            'type' => 'text',
            'wrapper' => [
                'width' => 50
            ]
        ];


        $defaults = [
            'key' => $key,
            'label' => 'Max Width / Fixed Height',
            'name' => Acme::strip_field_for_name($key),
            'type' => 'group',
            'sub_fields' => [
                $width,
                $height,
            ]
        ];

        $dimentions = \wp_parse_args($args, $defaults);

        return $dimentions;

    }

    static function get_row_spacers($key = false, $args = [])
    {

        if (!$key) return;

        $field_key = Acme::strip_field_for_name($key);


        $spacer_choices = [
            'false' => 'None',
            'xsmall' => 'Extra Small',
            'small' => 'Small',
            'medium' => 'Medium',
            'large' => 'Large',
            'xlarge' => 'Extra Large',
        ];


        $top = [
            'key' => "{$key}_top",
            'ui' => 1,
            'name' => 'top',
            'placeholder' => 'Spacer Top',
            'type' => 'select',
            'default_value' => 'medium',
            'choices' => $spacer_choices,
            'wrapper' => [
                'width' => 50
            ]
        ];

        $bottom = [
            'key' => "{$key}_bottom",
            'ui' => 1,
            'name' => 'bottom',
            'placeholder' => 'Spacer Bottom',
            'type' => 'select',
            'default_value' => 'medium',
            'choices' => $spacer_choices,
            'wrapper' => [
                'width' => 50
            ]
        ];


        $defaults = [
            'key' => $key,
            'name' => Acme::strip_field_for_name($key),
            'label' => 'Top / Bottom Spacers',
            'type' => 'group',
            'sub_fields' => [
                $top,
                $bottom,
            ]
        ];

        $top_bottom = \wp_parse_args($args, $defaults);

        return $top_bottom;

    }

    static function get_mce_format_menu_color_options($selector = false, $suffix = ''){

        $return = [];

        if(!$selector) return $return;

        $colors = Acme::get_colors();

        $suffix == '' ? '' : "-$suffix";

        foreach ($colors as $role => $value)
            $return[] = [
                'title' => $role,
                'selector' => $selector,
                'classes' => "{$role}-{$suffix}"
            ];

        return $return;
    }

    static function get_post_excerpt_templates_for_select_menu(){
        return ACF::scan_directories_for_themes_for_select_menu('post_excerpts');
    }

    static function get_archive_template_views_for_select_menu(){
        return ACF::scan_directories_for_themes_for_select_menu('archive_templates');
    }

    static function scan_directories_for_themes_for_select_menu($directory_name = false){

        $return = [];

        if(!$directory_name) return $return;

        $path = INFINISITE_URI . "twig/post_excerpts/*";
        $templates = glob($path);

        $child_theme_path = THEME_URI . "twig/post_excerpts/*";
        $child_theme_templates = glob($child_theme_path);

        foreach ($child_theme_templates as $ctt)
            $templates[] = $ctt;


        // attaching the templates to the archive module selector

        if ($templates)
            foreach ($templates as $template):

                $info = explode("/", $template);
                $filename = array_pop($info);
                $return[$template] = $filename;

            endforeach;


        return $return;
    }

    static function get_device_template_fields($key, $choices){

        $return = [];

        $devices = ['mobile','tablet','desktop','large_desktop'];

        foreach($devices as $device)
            $return[] = [
                'key' => "{$key}_{$device}",
                'name' => "$device",
                'label' => $device,
                'type' => 'select',
                'ui' => 1,
                'choices' => $choices
            ];

        return $return;




    }

    static function is_preset_field_lookup($type)
    {

        $lookup = [
            'name' => 'text',
            'title' => 'text',
            'image' => 'image',
            'embed' => 'embed',
            'file' => 'file',
            'link' => 'link',
            'identification' => 'text',
            'subtitle' => 'text',
            'start_date' => 'date_picker',
            'end_date' => 'date_picker',
            'location' => 'google_map',
            'address_line_1' => 'text',
            'address_line_2' => 'text',
            'author_text' => 'text',
            'author_post' => 'relationship',
            'excerpt' => 'wysiwyg',
            'content' => 'wysiwyg',
            'source' => 'text',
            'hours' => 'text',
            'phone_number' => 'text',
            'email_address' => 'text',
            'fax_number' => 'text',
            'facebook' => 'url',
            'linkedin' => 'url',
            'youtube' => 'url',
            'twitter' => 'url',
            'instagram' => 'url',
        ];

        return $lookup[$type];

    }

    static function get_post_archive_query_template_display_logic() {
        $return = [
            [
                [
                    'field' => 'field_ispb_layout_post_archive_query_template',
                    'operator' => ' == ',
                    'value' => 'none'
                ]
            ]
        ];

        return $return;
    }
}