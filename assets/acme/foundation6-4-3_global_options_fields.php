<?

$fields = TSD_Infinisite\Foundation::get_acf_fields(1);
$helper = new TSD_Infinisite\Foundation($fields);


$foundation_color_option_primary = [
    'key' => 'field_is_foundation_color_palette_primary',
    'label' => 'Primary',
    'name' => 'is_foundation_color_palette_primary',
    'type' => 'color_picker',
    'default_value' => get_option('options_is_pb_global_color_palette_primary'),
    'required' => 1,
    'wrapper' => [
        'width' => 20
    ]
];
$foundation_color_option_secondary = [
    'key' => 'field_is_foundation_color_palette_secondary',
    'label' => 'Secondary',
    'name' => 'is_foundation_color_palette_secondary',
    'type' => 'color_picker',
    'required' => 1,
    'default_value' => get_option('options_is_pb_global_color_palette_secondary'),
    'wrapper' => [
        'width' => 20
    ]
];
$foundation_color_option_success = [
    'key' => 'field_is_foundation_color_palette_success',
    'label' => 'Success',
    'name' => 'is_foundation_color_palette_success',
    'type' => 'color_picker',
    'default_value' => get_option('options_is_pb_global_color_palette_success'),
    'required' => 1,
    'wrapper' => [
        'width' => 20
    ]
];
$foundation_color_option_warning = [
    'key' => 'field_is_foundation_color_palette_warning',
    'label' => 'Warning',
    'name' => 'is_foundation_color_palette_warning',
    'type' => 'color_picker',
    'default_value' => get_option('options_is_pb_global_color_palette_warning'),
    'required' => 1,
    'wrapper' => [
        'width' => 20
    ]
];
$foundation_color_option_alert = [
    'key' => 'field_is_foundation_color_palette_alert',
    'label' => 'Alert',
    'name' => 'is_foundation_color_palette_alert',
    'type' => 'color_picker',
    'default_value' => get_option('options_is_pb_global_color_palette_alert'),
    'required' => 1,
    'wrapper' => [
        'width' => 20
    ]
];
$foundation_color_option_white = [
    'key' => 'field_is_foundation_color_palette_white',
    'label' => 'White',
    'name' => 'is_foundation_color_palette_white',
    'type' => 'color_picker',
    'default_value' => get_option('options_is_pb_global_color_palette_white'),
    'required' => 1,
    'wrapper' => [
        'width' => 20
    ]
];
$foundation_color_option_light_gray = [
    'key' => 'field_is_foundation_color_palette_light_gray',
    'label' => 'Light Gray',
    'name' => 'is_foundation_color_palette_light_gray',
    'type' => 'color_picker',
    'default_value' => get_option('options_is_pb_global_color_palette_gray_xlight'),
    'required' => 1,
    'wrapper' => [
        'width' => 20
    ]
];
$foundation_color_option_medium_gray = [
    'key' => 'field_is_foundation_color_palette_medium_gray',
    'label' => 'Medium Gray',
    'name' => 'is_foundation_color_palette_medium_gray',
    'type' => 'color_picker',
    'default_value' => get_option('options_is_pb_global_color_palette_gray'),
    'required' => 1,
    'wrapper' => [
        'width' => 20
    ]
];
$foundation_color_option_dark_gray = [
    'key' => 'field_is_foundation_color_palette_dark_gray',
    'label' => 'Dark Gray',
    'name' => 'is_foundation_color_palette_dark_gray',
    'type' => 'color_picker',
    'default_value' => get_option('options_is_pb_global_color_palette_gray_xdark'),
    'required' => 1,
    'wrapper' => [
        'width' => 20
    ]
];
$foundation_color_option_black = [
    'key' => 'field_is_foundation_color_palette_black',
    'label' => 'Black',
    'name' => 'is_foundation_color_palette_black',
    'type' => 'color_picker',
    'default_value' => get_option('options_is_pb_global_color_palette_black'),
    'required' => 1,
    'wrapper' => [
        'width' => 20
    ]
];

$global_font_size = [
    'key' => 'field_is_foundation_global_font_size',
    'label' => 'Global Font Size',
    'name' => 'global_font_size',
    'default_value' => '100%',
    'instructions' => 'Global Font Size - will scale on responsive',
    'required' => 1,
    'type' => 'text',
    'wrapper' => [
        'width' => 33
    ]
];
$global_width = [
    'key' => 'field_is_foundation_global_width',
    'label' => 'Width',
    'name' => 'global_width',
    'default_value' => 'rem-calc(1600)',
    'instructions' => 'Global Row Width - Used for Container Width',
    'required' => 1,
    'type' => 'text',
];
$global_lineheight = [
    'key' => 'field_is_foundation_global_lineheight',
    'label' => 'Line Height',
    'name' => 'global_lineheight',
    'default_value' => '1.5',
    'instructions' => 'Global Line Height',
    'required' => 1,
    'type' => 'text',
    'wrapper' => [
        'width' => 33
    ]
];


$body_background = [
    'key' => 'field_is_foundation_global_body_background',
    'label' => 'Body Background',
    'name' => 'body_background',
    'default_value' => '$white',
    'instructions' => 'Foundation Default : $white',
    'type' => 'text',
    'wrapper' => [
        'width' => 33
    ]
];
$body_font_color = [
    'key' => 'field_is_foundation_global_body_font_color',
    'label' => 'Body Font Color',
    'name' => 'body_font_color',
    'instructions' => 'The Base Font Color of the site - null value : foundation white',
    'default_value' => '$black',
    'required' => 1,
    'type' => 'text',
    'wrapper' => [
        'width' => 33
    ]
];
$body_font_family = [
    'key' => 'field_is_foundation_global_body_font_family',
    'label' => 'Font Family',
    'name' => 'body_font_family',
    'required' => 1,
    'instructions' => 'The Base Font Site of the site',
    'type' => 'text',
    'default_value' => '\'Helvetica Neue\', Helvetica, Roboto, Arial, sans-serif',
];
$body_antialiased = [
    'key' => 'field_is_foundation_global_body_antialiased',
    'label' => 'Antialising',
    'name' => 'body_antialiased',
    'default_value' => 1,
    'instructions' => 'Set to true to enable antialiased type, using the -webkit-font-smoothing and -moz-osx-font-smoothing CSS properties.',
    'type' => 'true_false',
    'ui' => 1
];
$global_margin = [
    'key' => 'field_is_foundation_global_margin',
    'label' => 'Margin',
    'name' => 'global_margin',
    'default_value' => '1rem',
    'instructions' => 'Global value used for margin on components.',
    'type' => 'text',
    'required' => 1,
    'wrapper' => [
        'width' => 33
    ]
];
$global_padding = [
    'key' => 'field_is_foundation_global_padding',
    'label' => 'Padding',
    'name' => 'global_padding',
    'default_value' => '1rem',
    'instructions' => 'Global value used for padding on components.',
    'type' => 'text',
    'required' => 1,
    'wrapper' => [
        'width' => 33
    ]
];
$global_position = [
    'key' => 'field_is_foundation_global_position',
    'label' => 'Position',
    'name' => 'global_position',
    'default_value' => '1rem',
    'instructions' => 'Global value used for positioning on components.',
    'type' => 'text',
    'required' => 1,
    'wrapper' => [
        'width' => 33
    ]
];
$global_weight_normal = [
    'key' => 'field_is_foundation_global_font_weight_normal',
    'label' => 'Normal Body Weight',
    'name' => 'global_weight_normal',
    'default_value' => 'normal',
    'instructions' => 'Global font weight used for normal type.',
    'required' => 1,
    'type' => 'text',
    'wrapper' => [
        'width' => 50
    ]
];
$global_weight_bold = [
    'key' => 'field_is_foundation_global_font_weight_bold',
    'label' => 'Bold Body Weight',
    'name' => 'global_weight_bold',
    'default_value' => 'bold',
    'required' => 1,
    'instructions' => 'Global font weight used for bold type.',
    'type' => 'text',
    'wrapper' => [
        'width' => 50
    ]
];
$global_radius = [
    'key' => 'field_is_foundation_global_radius',
    'label' => 'Radius',
    'name' => 'global_radius',
    'default_value' => '0',
    'required' => 1,
    'instructions' => 'Global value used for all elements that have a border radius.',
    'type' => 'text',
    'wrapper' => [
        'width' => 25
    ]
];
$global_menu_padding = [
    'key' => 'field_is_foundation_global_menu_padding',
    'label' => 'Global Menu Padding',
    'name' => 'global_menu_padding',
    'default_value' => '.45rem 1rem',
    'required' => 1,
    'instructions' => 'Global value used for all menu styles. Can be overwritten at individual menu component level.',
    'type' => 'text',
    'wrapper' => [
        'width' => 25
    ]
];
$global_menu_nested_margin = [
    'key' => 'field_is_foundation_global_menu_nested_margin',
    'label' => 'Menu Nested Margin',
    'name' => 'global_menu_nested_margin',
    'default_value' => '1rem',
    'required' => 1,
    'instructions' => 'Global value used for all menu styles. Nested margin for submenu.',
    'type' => 'text',
    'wrapper' => [
        'width' => 25
    ]
];
$global_text_direction = [
    'key' => 'field_is_foundation_global_text_direction',
    'label' => 'Text Direction',
    'name' => 'global_text_direction',
    'default_value' => 'ltr',
    'required' => 1,
    'instructions' => 'Sets the text direction of the CSS. Can be either ltr or rtl.',
    'type' => 'text',
    'wrapper' => [
        'width' => 25
    ]
];
$global_flexbox = [
    'key' => 'field_is_foundation_global_flexbox',
    'label' => 'Flexbox',
    'name' => 'global_flexbox',
    'default_value' => 1,
    'ui' => 1,
    'instructions' => 'Enables flexbox for components that support it. Don\'t disable.',
    'type' => 'true_false',
    'wrapper' => [
        'width' => 25
    ]
];
$global_prototype_breakpoints = [
    'key' => 'field_is_foundation_global_prototype_beakpoints',
    'label' => 'Prototype Breakpoints',
    'name' => 'global_prototype_breakpoints',
    'default_value' => 0,
    'ui' => 1,
    'instructions' => 'Enabled responsive breakpoints for prototypes if applicable. Don\'t endable.',
    'type' => 'true_false',
    'wrapper' => [
        'width' => 25
    ]
];
$global_button_cursor = [
    'key' => 'field_is_foundation_global_button_cursor',
    'label' => 'Button Cursor',
    'name' => 'global_button_cursor',
    'default_value' => 'auto',
    'required' => 1,
    'instructions' => 'Button cursor\'s value, auto by default',
    'type' => 'text',
    'wrapper' => [
        'width' => 25
    ]
];


$global_color_pick_contrast_tolerance = [
    'key' => 'field_is_foundation_global_contrast_tolerance',
    'label' => 'Color Pick Contrast Tolerance',
    'name' => 'global_color_pick_contrast_tolerance',
    'default_value' => '0',
    'instructions' => 'Global tolerance for color pick contrast.',
    'type' => 'number',
    'wrapper' => [
        'width' => 25
    ]
];
$print_transparent_backgrounds = [
    'key' => 'field_is_foundation_global_print_transparent_backgrounds',
    'label' => 'Print Transparent Backgrounds',
    'name' => 'print_transparent_backgrounds',
    'type' => 'true_false',
    'ui' => 1,
    'default_value' => 1
];
$small_breakpoint_message = [
    'name' => 'breakpoints_small_message',
    'key' => 'field_is_foundation_breakpoints_small_message',
    'type' => 'message',
    'label' => 'Breakpoint Values',
    'message' => 'The small breakpoint value is always 0, required by foundation',
];

// removing due to foundation compiling error if this value is anything but 0
// $small_breakpoint = [
//     'name' => 'breakpoints_small',
//     'label' => 'Small Breakpoint',
//     'key' => 'field_is_foundation_breakpoints_small',
//     'type' => 'text',
//     'default_value' => '0',
//     'required' => 1,
//     'wrapper' => [
//         'width' => 100 / 5
//     ]
// ];
$medium_breakpoint = [
    'name' => 'breakpoints_medium',
    'label' => 'Medium',
    'key' => 'field_is_foundation_breakpoints_medium',
    'type' => 'text',
    'default_value' => '640px',
    'required' => 1,
    'wrapper' => [
        'width' => 100 / 4
    ]
];
$large_breakpoint = [
    'name' => 'breakpoints_large',
    'label' => 'Large',
    'key' => 'field_is_foundation_breakpoints_large',
    'type' => 'text',
    'default_value' => '1024px',
    'required' => 1,
    'wrapper' => [
        'width' => 100 / 4
    ]
];
$xlarge_breakpoint = [
    'name' => 'breakpoints_xlarge',
    'label' => 'X Large',
    'key' => 'field_is_foundation_breakpoints_xlarge',
    'type' => 'text',
    'default_value' => '1200px',
    'required' => 1,
    'wrapper' => [
        'width' => 100 / 4
    ]
];
$xxlarge_breakpoint = [
    'name' => 'breakpoints_xxlarge',
    'label' => 'XX Large',
    'key' => 'field_is_foundation_breakpoints_xxlarge',
    'type' => 'text',
    'default_value' => '1440px',
    'required' => 1,
    'wrapper' => [
        'width' => 100 / 4
    ]
];
$print_breakpoint = [
    'name' => 'print_breakpoint',
    'label' => 'Print Breakpoint',
    'key' => 'field_is_foundation_breakpoints_print_breakpoint',
    'type' => 'select',
    'default_value' => 'large',
    'instructions' => 'Which breakpoint size should the site print',
    'ui' => 1,
    'choices' => [
        'medium' => 'Medium',
        'large' => 'Large',
        'xlarge' => 'X Large',
        'XX Large' => 'XX Large',
    ]
];
// we're going to make these locked for now
// $breakpoint_classes = [
//     'name' => 'breakpoint_classes',
//     'label' => 'Breakpoint Classes',
//     'key' => 'field_is_foundation_breakpoints_classes',
//     'type' => 'text',
//     'default_value' => '(small medium large xlarge xxlarge)',
//     'required' => 1,
//     'wrapper' => [
//         'width' => 100 / 2
//     ]
// ];

$grid_section_message = [
    'name' => 'grid_section_message',
    'key' => 'field_is_foundation_config_grid_section_message',
    'type' => 'message',
    'label' => 'Grid Values',
    'message' => 'Set your grid options here',
];
$grid_row_width = [
    'name' => 'grid_row_width',
    'label' => 'Grid Row Width',
    'key' => 'field_is_foundation_breakpoints_grid_row_width',
    'instructions' => 'Default value $global-width',
    'required' => 1,
    'type' => 'text',
    'default_value' => '$global-width',
    'wrapper' => [
        'width' => 80
    ]
];
$grid_column_count = [
    'name' => 'grid_column_count',
    'label' => 'Columns',
    'instructions' => 'Make it 12',
    'key' => 'field_is_foundation_breakpoints_column_count',
    'type' => 'text',
    'default_value' => '12',
    'required' => 1,
    'wrapper' => [
        'width' => 20
    ]
];

$grid_column_gutter_size_message = [
    'name' => 'grid_section_column_padding_message',
    'key' => 'field_is_foundation_config_grid_column_gutter_message',
    'type' => 'message',
    'label' => 'Column Padding (Breakpoints)',
    'message' => 'How wide should your column gutters be?',
];
$grid_column_gutter_small = [
    'name' => 'grid_column_gutter_small',
    'label' => 'Small',
    'key' => 'field_is_foundation_breakpoints_gutter_small',
    'type' => 'text',
    'default_value' => '15px',
    'required' => 1,
    'wrapper' => [
        'width' => 100 / 2
    ]
];
$grid_column_gutter_medium = [
    'name' => 'grid_column_gutter_medium',
    'label' => 'Medium',
    'key' => 'field_is_foundation_breakpoints_gutter_medium',
    'type' => 'text',
    'default_value' => '30px',
    'required' => 1,
    'wrapper' => [
        'width' => 100 / 2
    ]
];
$grid_column_align_edge = [
    'name' => 'grid_column_align_edge',
    'label' => 'Grid Column Align Edge',
    'key' => 'field_is_foundation_breakpoints_align_edge',
    'type' => 'text',
    'default_value' => true,
    'required' => 1,
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$grid_column_alias = [
    'name' => 'grid_column_alias',
    'label' => 'Grid Column Alias',
    'key' => 'field_is_foundation_breakpoints_column_alias',
    'type' => 'text',
    'default_value' => 'columns',
    'required' => 1,
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$block_grid_max = [
    'name' => 'block_grid_max',
    'label' => 'Block Grid Max',
    'key' => 'field_is_foundation_breakpoints_block_grid',
    'type' => 'text',
    'default_value' => 8,
    'required' => 1,
    'wrapper' => [
        'width' => 100 / 3
    ]
];

$header_section_message = [
    'name' => 'grid_section_header_section_message',
    'key' => 'field_is_foundation_config_header_section_message',
    'type' => 'message',
    'label' => 'Header Options',
    'message' => 'Set your header options here.',
];

$header_font_family = [
    'name' => 'header_font_family',
    'label' => 'Header Font Family',
    'key' => 'field_is_foundation_header_font_family',
    'type' => 'text',
    'default_value' => '$body-font-family',
    'wrapper' => [
        'width' => 100 / 2
    ]
];
$header_font_weight = [
    'name' => 'header_font_weight',
    'label' => 'Header Font Weight',
    'key' => 'field_is_foundation_header_font_weight',
    'type' => 'text',
    'default_value' => '$global-weight-normal',
    'wrapper' => [
        'width' => 100 / 2
    ]
];
$header_font_style = [
    'name' => 'header_font_style',
    'label' => 'Header Font Style',
    'key' => 'field_is_foundation_header_font_style',
    'type' => 'text',
    'default_value' => 'normal',
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$font_family_monospace = [
    'name' => 'font_family_monospace',
    'label' => 'Font Family Monospace',
    'key' => 'field_is_foundation_font_family_monospace',
    'type' => 'text',
    'default_value' => "Consolas, 'Liberation Mono', Courier, monospace"
];
$header_color = [
    'name' => 'header_color',
    'label' => 'Header Color',
    'key' => 'field_is_foundation_header_color',
    'type' => 'text',
    'default_value' => 'inherit',
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$header_lineheight = [
    'name' => 'header_lineheight',
    'label' => 'Header Lineheight',
    'key' => 'field_is_foundation_header_lineheight',
    'type' => 'text',
    'default_value' => 1.4,
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$header_margin_bottom = [
    'name' => 'header_margin_bottom',
    'label' => 'Header Margin Bottom',
    'key' => 'field_is_foundation_header_margin_bottom',
    'type' => 'text',
    'default_value' => '0.5rem',
    'wrapper' => [
        'width' => 100 / 2
    ]
];

$small_font_size = [
    'name' => 'small_font_size',
    'label' => 'Small Font Size',
    'key' => 'field_is_foundation_small_font_size',
    'type' => 'text',
    'default_value' => '80%',
    'wrapper' => [
        'width' => 100 / 2
    ]
];

$header_section_sizes_message = [
    'name' => 'grid_section_header_section_sizes_message',
    'key' => 'field_is_foundation_config_header_section_sizes_message',
    'type' => 'message',
    'label' => 'Header Sizing Options',
    'message' => 'Header sizes, by breakpoints.',
];

$header_styles_small_h1 = [
    'name' => 'header_styles_small_h1',
    'label' => 'Small h1',
    'key' => 'field_is_foundation_header_styles_small_h1',
    'type' => 'text',
    'default_value' => "'font-size' : 24",
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$header_styles_small_h2 = [
    'name' => 'header_styles_small_h2',
    'label' => 'Small h2',
    'key' => 'field_is_foundation_header_styles_small_h2',
    'type' => 'text',
    'default_value' => "'font-size' : 20",
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$header_styles_small_h3 = [
    'name' => 'header_styles_small_h3',
    'label' => 'Small H3',
    'key' => 'field_is_foundation_header_styles_small_h3',
    'type' => 'text',
    'default_value' => "'font-size' : 19",
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$header_styles_small_h4 = [
    'name' => 'header_styles_small_h4',
    'label' => 'Small H4',
    'key' => 'field_is_foundation_header_styles_small_h4',
    'type' => 'text',
    'default_value' => "'font-size' : 18",
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$header_styles_small_h5 = [
    'name' => 'header_styles_small_h5',
    'label' => 'Small H5',
    'key' => 'field_is_foundation_header_styles_small_h5',
    'type' => 'text',
    'default_value' => "'font-size' : 17",
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$header_styles_small_h6 = [
    'name' => 'header_styles_small_h6',
    'label' => 'Small H6',
    'key' => 'field_is_foundation_header_styles_small_h6',
    'type' => 'text',
    'default_value' => "'font-size' : 16",
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$header_styles_medium_h1 = [
    'name' => 'header_styles_medium_h1',
    'label' => 'Medium H1',
    'key' => 'field_is_foundation_header_styles_medium_h1',
    'type' => 'text',
    'default_value' => "'font-size' : 48",
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$header_styles_medium_h2 = [
    'name' => 'header_styles_medium_h2',
    'label' => 'Medium H2',
    'key' => 'field_is_foundation_header_styles_medium_h2',
    'type' => 'text',
    'default_value' => "'font-size' : 40",
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$header_styles_medium_h3 = [
    'name' => 'header_styles_medium_h3',
    'label' => 'Medium H3',
    'key' => 'field_is_foundation_header_styles_medium_h3',
    'type' => 'text',
    'default_value' => "'font-size' : 31",
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$header_styles_medium_h4 = [
    'name' => 'header_styles_medium_h4',
    'label' => 'Medium H4',
    'key' => 'field_is_foundation_header_styles_medium_h4',
    'type' => 'text',
    'default_value' => "'font-size' : 25",
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$header_styles_medium_h5 = [
    'name' => 'header_styles_medium_h5',
    'label' => 'Medium H5',
    'key' => 'field_is_foundation_header_styles_medium_h5',
    'type' => 'text',
    'default_value' => "'font-size' : 20",
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$header_styles_medium_h6 = [
    'name' => 'header_styles_medium_h6',
    'label' => 'Medium H6',
    'key' => 'field_is_foundation_header_styles_medium_h6',
    'type' => 'text',
    'default_value' => "'font-size' : 16",
    'wrapper' => [
        'width' => 100 / 3
    ]
];

$header_section_other_stuff_message = [
    'name' => 'grid_section_header_section_other_stuff_message',
    'key' => 'field_is_foundation_config_header_section_other_stuff_message',
    'type' => 'message',
    'label' => 'Other Stuff',
    'message' => 'Odds-n-ends.',
];
$header_text_rendering = [
    'name' => 'header_text_rendering',
    'label' => 'Header Text Rendering',
    'key' => 'field_is_foundation_header_text_rendering',
    'type' => 'text',
    'default_value' => 'optimizeLegibility',
    'wrapper' => [
        'width' => 100 / 2
    ]
];
$header_small_font_color = [
    'name' => 'header_small_font_color',
    'label' => 'Header Small Font Color',
    'key' => 'field_is_foundation_header_small_font_color',
    'type' => 'text',
    'default_value' => '$medium-gray',
    'wrapper' => [
        'width' => 100 / 2
    ]
];
$paragraph_lineheight = [
    'name' => 'paragraph_lineheight',
    'label' => 'Paragraph Lineheight',
    'key' => 'field_is_foundation_paragraph_lineheight',
    'type' => 'text',
    'required' => 1,
    'default_value' => 1.6,
    'wrapper' => [
        'width' => 100 / 2
    ]
];
$paragraph_margin_bottom = [
    'name' => 'paragraph_margin_bottom',
    'label' => 'Paragraph Margin Bottom',
    'key' => 'field_is_foundation_paragraph_margin_bottom',
    'type' => 'text',
    'required' => 1,
    'default_value' => '1rem',
    'wrapper' => [
        'width' => 100 / 2
    ]
];
$paragraph_text_rendering = [
    'name' => 'paragraph_text_rendering',
    'label' => 'Paragraph Text Rendering',
    'key' => 'field_is_foundation_paragraph_text_rendering',
    'type' => 'text',
    'default_value' => "optimizeLegibility",
    'wrapper' => [
        'width' => 100 / 2
    ]
];
$code_color = [
    'name' => 'code_color',
    'label' => 'Code Color',
    'key' => 'field_is_foundation_code_color',
    'type' => 'text',
    'default_value' => '$black',
    'placeholder' => 'Foundation Black Color',
    'required' => 1
];

$code_font_family = [
    'name' => 'code_font_family',
    'label' => 'Code Font Family',
    'key' => 'field_is_foundation_code_font_family',
    'type' => 'text',
    'default_value' => "Consolas, 'Liberation Mono', Courier, monospace",
    'required' => 1
];
$code_font_weight = [
    'name' => 'code_font_weight',
    'label' => 'Code Font Weight',
    'key' => 'field_is_foundation_code_font_weight',
    'type' => 'text',
    'default_value' => 'normal',
    'required' => 1
];
$code_background = [
    'name' => 'code_background',
    'label' => 'Code Background',
    'key' => 'field_is_foundation_code_background',
    'type' => 'text',
    'default_value' => '$light-gray',
    'required' => 1
];
$code_border = [
    'name' => 'code_border',
    'label' => 'Code Border',
    'key' => 'field_is_foundation_code_border',
    'type' => 'text',
    'default_value' => "1px solid \$medium-gray",
    'required' => 1,
];
$code_padding = [
    'name' => 'code_padding',
    'label' => 'Code Padding',
    'key' => 'field_is_foundation_code_padding',
    'type' => 'text',
    'default_value' => "rem_calc(2 5 1)",
];
$anchor_color = [
    'name' => 'anchor_color',
    'label' => 'Anchor Color',
    'key' => 'field_is_foundation_anchor_color',
    'default_value' => '$primary-color',
    'type' => 'text',
    'wrapper' => [
        'width' => 100 / 4
    ]
];
$anchor_color_hover = [
    'name' => 'anchor_color_hover',
    'label' => 'Anchor Color Hover',
    'key' => 'field_is_foundation_anchor_color_hover',
    'type' => 'text',
    'default_value' => 'darken($anchor-color, 15)',
    'required' => 1,
    'wrapper' => [
        'width' => 100 / 4
    ]
];
$anchor_text_decoration = [
    'name' => 'anchor_text_decoration',
    'label' => 'Anchor Text Decoration',
    'key' => 'field_is_foundation_anchor_text_decoration',
    'type' => 'text',
    'required' => 1,
    'default_value' => "none",
    'wrapper' => [
        'width' => 100 / 4
    ]
];
$anchor_text_decoration_hover = [
    'name' => 'anchor_text_decoration_hover',
    'label' => 'Anchor Text Decoration Hover',
    'key' => 'field_is_foundation_anchor_text_decoration_hover',
    'required' => 1,
    'type' => 'text',
    'default_value' => "none",
    'wrapper' => [
        'width' => 100 / 4
    ]
];
$hr_width = [
    'name' => 'hr_width',
    'label' => 'Hr Width',
    'key' => 'field_is_foundation_hr_width',
    'type' => 'text',
    'default_value' => '$global-width',
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$hr_border = [
    'name' => 'hr_border',
    'label' => 'Hr Border',
    'key' => 'field_is_foundation_hr_border',
    'type' => 'text',
    'required' => 1,
    'default_value' => "1px solid \$medium-gray",
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$hr_margin = [
    'name' => 'hr_margin',
    'label' => 'Hr Margin',
    'key' => 'field_is_foundation_hr_margin',
    'type' => 'text',
    'required' => 1,
    'default_value' => "rem_calc(20) auto",
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$list_lineheight = [
    'name' => 'list_lineheight',
    'label' => 'List Lineheight',
    'key' => 'field_is_foundation_list_lineheight',
    'type' => 'text',
    'default_value' => '$paragraph-lineheight',
    'wrapper' => [
        'width' => 100 / 6
    ]
];
$list_margin_bottom = [
    'name' => 'list_margin_bottom',
    'label' => 'List Margin Bottom',
    'key' => 'field_is_foundation_list_margin_bottom',
    'type' => 'text',
    'default_value' => '$paragraph-margin-bottom',
    'wrapper' => [
        'width' => 100 / 6
    ]
];
$list_style_type = [
    'name' => 'list_style_type',
    'label' => 'List Style Type',
    'key' => 'field_is_foundation_list_style_type',
    'type' => 'text',
    'required' => 1,
    'default_value' => "disc",
    'wrapper' => [
        'width' => 100 / 6
    ]
];
$list_style_position = [
    'name' => 'list_style_position',
    'label' => 'List Style Position',
    'key' => 'field_is_foundation_list_style_position',
    'required' => 1,
    'type' => 'text',
    'default_value' => "outside",
    'wrapper' => [
        'width' => 100 / 6
    ]
];
$list_side_margin = [
    'name' => 'list_side_margin',
    'label' => 'List Side Margin',
    'key' => 'field_is_foundation_list_side_margin',
    'required' => 1,
    'type' => 'text',
    'default_value' => "1.25rem",
    'wrapper' => [
        'width' => 100 / 6
    ]
];
$list_nested_side_margin = [
    'name' => 'list_nested_side_margin',
    'label' => 'List Nested Side Margin',
    'key' => 'field_is_foundation_list_nested_side_margin',
    'required' => 1,
    'type' => 'text',
    'default_value' => "1.25rem",
    'wrapper' => [
        'width' => 100 / 6
    ]
];
$defnlist_margin_bottom = [
    'name' => 'defnlist_margin_bottom',
    'label' => 'Defnlist Margin Bottom',
    'key' => 'field_is_foundation_defnlist_margin_bottom',
    'required' => 1,
    'type' => 'text',
    'default_value' => "1rem",
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$defnlist_term_weight = [
    'name' => 'defnlist_term_weight',
    'label' => 'Defnlist Term Weight',
    'key' => 'field_is_foundation_defnlist_term_weight',
    'type' => 'text',
    'default_value' => '$global-weight-bold',
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$defnlist_term_margin_bottom = [
    'name' => 'defnlist_term_margin_bottom',
    'label' => 'Defnlist Term Margin Bottom',
    'key' => 'field_is_foundation_defnlist_term_margin_bottom',
    'type' => 'text',
    'default_value' => "0.3rem",
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$blockquote_color = [
    'name' => 'blockquote_color',
    'label' => 'Blockquote Color',
    'key' => 'field_is_foundation_blockquote_color',
    'type' => 'text',
    'default_value' => '$dark-gray',
    'required' => 1,
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$blockquote_padding = [
    'name' => 'blockquote_padding',
    'label' => 'Blockquote Padding',
    'key' => 'field_is_foundation_blockquote_padding',
    'type' => 'text',
    'default_value' => "rem_calc(9 20 0 19)",
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$blockquote_border = [
    'name' => 'blockquote_border',
    'label' => 'Blockquote Border',
    'key' => 'field_is_foundation_blockquote_border',
    'type' => 'text',
    'default_value' => "1px solid \$medium-gray",
    'required' => 1,
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$cite_font_size = [
    'name' => 'cite_font_size',
    'label' => 'Cite Font Size',
    'key' => 'field_is_foundation_cite_font_size',
    'type' => 'text',
    'default_value' => "rem_calc(13)",
    'required' => 1,
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$cite_color = [
    'name' => 'cite_color',
    'label' => 'Cite Color',
    'key' => 'field_is_foundation_cite_color',
    'type' => 'text',
    'default_value' => '$black',
    'required' => 1,
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$cite_pseudo_content = [
    'name' => 'cite_pseudo_content',
    'label' => 'Cite Pseudo Content',
    'key' => 'field_is_foundation_cite_pseudo_content',
    'type' => 'text',
    'required' => 1,
    'default_value' => "cite pseudo content here",
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$keystroke_font = [
    'name' => 'keystroke_font',
    'label' => 'Keystroke Font',
    'key' => 'field_is_foundation_keystroke_font',
    'type' => 'text',
    'default_value' => '$font-family-monospace',
    'wrapper' => [
        'width' => 100 / 5
    ]
];
$keystroke_color = [
    'name' => 'keystroke_color',
    'label' => 'Keystroke Color',
    'key' => 'field_is_foundation_keystroke_color',
    'type' => 'text',
    'default_value' => '$black',
    'wrapper' => [
        'width' => 100 / 5
    ]
];
$keystroke_background = [
    'name' => 'keystroke_background',
    'label' => 'Keystroke Background',
    'key' => 'field_is_foundation_keystroke_background',
    'type' => 'text',
    'default_value' => '$light-gray',
    'wrapper' => [
        'width' => 100 / 5
    ]
];
$keystroke_padding = [
    'name' => 'keystroke_padding',
    'label' => 'Keystroke Padding',
    'key' => 'field_is_foundation_keystroke_padding',
    'type' => 'text',
    'default_value' => "rem_calc(2 4 0)",
    'wrapper' => [
        'width' => 100 / 5
    ]
];
$keystroke_radius = [
    'name' => 'keystroke_radius',
    'label' => 'Keystroke Radius',
    'key' => 'field_is_foundation_keystroke_radius',
    'type' => 'text',
    'default_value' => '$global-radius',
    'wrapper' => [
        'width' => 100 / 5
    ]
];
$abbr_underline = [
    'name' => 'abbr_underline',
    'label' => 'Abbr Underline',
    'key' => 'field_is_foundation_abbr_underline',
    'type' => 'text',
    'default_value' => "1px dotted \$black"
];
$lead_font_size = [
    'name' => 'lead_font_size',
    'label' => 'Lead Font Size',
    'key' => 'field_is_foundation_lead_font_size',
    'type' => 'text',
    'default_value' => '$global-font-size * 1.25',
    'required' => 1
];
$lead_lineheight = [
    'name' => 'lead_lineheight',
    'label' => 'Lead Lineheight',
    'key' => 'field_is_foundation_lead_lineheight',
    'type' => 'text',
    'default_value' => "1.6"
];
$subheader_lineheight = [
    'name' => 'subheader_lineheight',
    'label' => 'Subheader Lineheight',
    'key' => 'field_is_foundation_subheader_lineheight',
    'type' => 'text',
    'default_value' => "1.4"
];
$subheader_color = [
    'name' => 'subheader_color',
    'label' => 'Subheader Color',
    'key' => 'field_is_foundation_subheader_color',
    'type' => 'text',
    'required' => 1,
    'default_value' => '$dark-gray'
];
$subheader_font_weight = [
    'name' => 'subheader_font_weight',
    'label' => 'Subheader Font Weight',
    'key' => 'field_is_foundation_subheader_font_weight',
    'type' => 'text',
    'default_value' => "normal"
];
$subheader_margin_top = [
    'name' => 'subheader_margin_top',
    'label' => 'Subheader Margin Top',
    'key' => 'field_is_foundation_subheader_margin_top',
    'type' => 'text',
    'default_value' => "0.2rem"
];
$subheader_margin_bottom = [
    'name' => 'subheader_margin_bottom',
    'label' => 'Subheader Margin Bottom',
    'key' => 'field_is_foundation_subheader_margin_bottom',
    'type' => 'text',
    'default_value' => "0.5rem"
];
$stat_font_size = [
    'name' => 'stat_font_size',
    'label' => 'Stat Font Size',
    'key' => 'field_is_foundation_stat_font_size',
    'type' => 'text',
    'default_value' => "2.5rem"
];


$abide_inputs = [
    'name' => 'abide_inputs',
    'label' => 'Abide Inputs',
    'key' => 'field_is_foundation_abide_inputs',
    'default_value' => 1,
    'type' => 'true_false',
    'ui' => 1
];
$abide_labels = [
    'name' => 'abide_labels',
    'label' => 'Abide Labels',
    'key' => 'field_is_foundation_abide_labels',
    'default_value' => 1,
    'type' => 'true_false',
    'ui' => 1
];
$input_background_invalid = [
    'name' => 'input_background_invalid',
    'label' => 'Input Background Invalid',
    'key' => 'field_is_foundation_input_background_invalid',
    'type' => 'text',
    'default_value' => '$alert-color',
    'required' => 1,
];
$form_label_color_invalid = [
    'name' => 'form_label_color_invalid',
    'label' => 'Form Label Color Invalid',
    'key' => 'field_is_foundation_form_label_color_invalid',
    'type' => 'text',
    'default_value' => '$alert-color',
    'required' => 1,
];
$input_error_color = [
    'name' => 'input_error_color',
    'label' => 'Input Error Color',
    'key' => 'field_is_foundation_input_error_color',
    'type' => 'text',
    'default_value' => '$alert-color',
    'required' => 1,
];
$input_error_font_size = [
    'name' => 'input_error_font_size',
    'label' => 'Input Error Font Size',
    'key' => 'field_is_foundation_input_error_font_size',
    'type' => 'text',
    'required' => 1,
    'default_value' => 'rem-calc(12)'
];
$input_error_font_weight = [
    'name' => 'input_error_font_weight',
    'label' => 'Input Error Font Weight',
    'key' => 'field_is_foundation_input_error_font_weight',
    'default_value' => '\$global-weight-bold',
    'type' => 'text',
];


$accordion_background = [
    'name' => 'accordion_background',
    'label' => 'Accordion Background',
    'key' => 'field_is_foundation_accordion_background',
    'type' => 'text',
    'default_value' => '$white',
    'required' => 1

];
$accordion_plusminus = [
    'name' => 'accordion_plusminus',
    'label' => 'Accordion Plusminus',
    'key' => 'field_is_foundation_accordion_plusminus',
    'type' => 'text',
    'default_value' => "true"
];
$accordion_title_font_size = [
    'name' => 'accordion_title_font_size',
    'label' => 'Accordion Title Font Size',
    'key' => 'field_is_foundation_accordion_title_font_size',
    'type' => 'text',
    'default_value' => "rem_calc(12)"
];
$accordion_item_color = [
    'name' => 'accordion_item_color',
    'label' => 'Accordion Item Color',
    'key' => 'field_is_foundation_accordion_item_color',
    'type' => 'text',
    'required' => 1,
    'default_value' => '$primary-color'
];
$accordion_item_background_hover = [
    'name' => 'accordion_item_background_hover',
    'label' => 'Accordion Item Background Hover',
    'key' => 'field_is_foundation_accordion_item_background_hover',
    'type' => 'text',
    'default_value' => '$light-gray',
    'required' => 1
];
$accordion_item_padding = [
    'name' => 'accordion_item_padding',
    'label' => 'Accordion Item Padding',
    'key' => 'field_is_foundation_accordion_item_padding',
    'type' => 'text',
    'default_value' => "1.25rem 1rem"
];
$accordion_content_background = [
    'name' => 'accordion_content_background',
    'label' => 'Accordion Content Background',
    'key' => 'field_is_foundation_accordion_content_background',
    'type' => 'text',
    'default_value' => '$white',
    'required' => 1
];
$accordion_content_border = [
    'name' => 'accordion_content_border',
    'label' => 'Accordion Content Border',
    'key' => 'field_is_foundation_accordion_content_border',
    'type' => 'text',
    'default_value' => '1px solid $light-gray',
    'required' => 1
];
$accordion_content_color = [
    'name' => 'accordion_content_color',
    'label' => 'Accordion Content Color',
    'key' => 'field_is_foundation_accordion_content_color',
    'type' => 'text',
    'default_value' => '$black',
    'required' => 1
];
$accordion_content_padding = [
    'name' => 'accordion_content_padding',
    'label' => 'Accordion Content Padding',
    'key' => 'field_is_foundation_accordion_content_padding',
    'type' => 'text',
    'default_value' => "1rem"
];
$accordionmenu_padding = [
    'name' => 'accordionmenu_padding',
    'label' => 'Accordionmenu Padding',
    'key' => 'field_is_foundation_accordionmenu_padding',
    'type' => 'text',
    'default_value' => '$global-menu-padding'
];
$accordionmenu_nested_margin = [
    'name' => 'accordionmenu_nested_margin',
    'label' => 'Accordionmenu Nested Margin',
    'key' => 'field_is_foundation_accordionmenu_nested_margin',
    'default_value' => '\$global-menu-nested-margin',
    'type' => 'text',
];
$accordionmenu_submenu_padding = [
    'name' => 'accordionmenu_submenu_padding',
    'label' => 'Accordionmenu Submenu Padding',
    'key' => 'field_is_foundation_accordionmenu_submenu_padding',
    'type' => 'text',
    'default_value' => '$accordionmenu-padding'
];
$accordionmenu_arrows = [
    'name' => 'accordionmenu_arrows',
    'label' => 'Accordionmenu Arrows',
    'key' => 'field_is_foundation_accordionmenu_arrows',
    'type' => 'true_false',
    'ui' => 1,
    'default_value' => 1
];
$accordionmenu_arrow_color = [
    'name' => 'accordionmenu_arrow_color',
    'label' => 'Accordionmenu Arrow Color',
    'key' => 'field_is_foundation_accordionmenu_arrow_color',
    'type' => 'text',
    'default_value' => '$primary-color',
    'required' => 1
];
$accordionmenu_item_background = [
    'name' => 'accordionmenu_item_background',
    'label' => 'Accordionmenu Item Background',
    'key' => 'field_is_foundation_accordionmenu_item_background',
    'type' => 'text',
    'default_value' => "null",
    'required' => 1
];
$accordionmenu_border = [
    'name' => 'accordionmenu_border',
    'label' => 'Accordionmenu Border',
    'key' => 'field_is_foundation_accordionmenu_border',
    'type' => 'text',
    'default_value' => "null",
    'required' => 1
];
$accordionmenu_submenu_toggle_background = [
    'name' => 'accordionmenu_submenu_toggle_background',
    'label' => 'Accordionmenu Submenu Toggle Background',
    'key' => 'field_is_foundation_accordionmenu_submenu_toggle_background',
    'type' => 'text',
    'default_value' => "null",
    'required' => 1
];
$accordion_submenu_toggle_border = [
    'name' => 'accordion_submenu_toggle_border',
    'label' => 'Accordion Submenu Toggle Border',
    'key' => 'field_is_foundation_accordion_submenu_toggle_border',
    'type' => 'text',
    'default_value' => '$accordionmenu-border',
];
$accordionmenu_submenu_toggle_width = [
    'name' => 'accordionmenu_submenu_toggle_width',
    'label' => 'Accordionmenu Submenu Toggle Width',
    'key' => 'field_is_foundation_accordionmenu_submenu_toggle_width',
    'type' => 'text',
    'default_value' => "40px",
    'required' => 1
];
$accordionmenu_submenu_toggle_height = [
    'name' => 'accordionmenu_submenu_toggle_height',
    'label' => 'Accordionmenu Submenu Toggle Height',
    'key' => 'field_is_foundation_accordionmenu_submenu_toggle_height',
    'type' => 'text',
    'default_value' => '$accordionmenu-submenu-toggle-width'
];
$accordionmenu_arrow_size = [
    'name' => 'accordionmenu_arrow_size',
    'label' => 'Accordionmenu Arrow Size',
    'key' => 'field_is_foundation_accordionmenu_arrow_size',
    'type' => 'text',
    'default_value' => "6px",
    'required' => 1
];
$badge_background = [
    'name' => 'badge_background',
    'label' => 'Badge Background',
    'key' => 'field_is_foundation_badge_background',
    'type' => 'text',
    'required' => 1,
    'default_value' => '$primary-color'
];
$badge_color = [
    'name' => 'badge_color',
    'label' => 'Badge Color',
    'key' => 'field_is_foundation_badge_color',
    'type' => 'text',
    'required' => 1,
    'default_value' => '$white'
];
$badge_color_alt = [
    'name' => 'badge_color_alt',
    'label' => 'Badge Color Alt',
    'key' => 'field_is_foundation_badge_color_alt',
    'type' => 'text',
    'required' => 1,
    'default_value' => '$black'
];
// we are locking this to use the global palette
// $badge_palette = [
//     'name' => 'badge_palette',
//     'label' => 'Badge Palette',
//     'key' => 'field_is_foundation_badge_palette',
//     'type' => 'text',
//     'required' => 1,
//     'default_value' => $helper->foundation_palette()
// ];
$badge_padding = [
    'name' => 'badge_padding',
    'label' => 'Badge Padding',
    'key' => 'field_is_foundation_badge_padding',
    'type' => 'text',
    'default_value' => "0.3em"
];
$badge_minwidth = [
    'name' => 'badge_minwidth',
    'label' => 'Badge Minwidth',
    'key' => 'field_is_foundation_badge_minwidth',
    'type' => 'text',
    'default_value' => "2.1em"
];
$badge_font_size = [
    'name' => 'badge_font_size',
    'label' => 'Badge Font Size',
    'key' => 'field_is_foundation_badge_font_size',
    'type' => 'text',
    'default_value' => "0.6rem"
];
$breadcrumbs_margin = [
    'name' => 'breadcrumbs_margin',
    'label' => 'Breadcrumbs Margin',
    'key' => 'field_is_foundation_breadcrumbs_margin',
    'type' => 'text',
    'default_value' => "0 0 \$global-margin 0",
    'required' => 1
];
$breadcrumbs_item_font_size = [
    'name' => 'breadcrumbs_item_font_size',
    'label' => 'Breadcrumbs Item Font Size',
    'key' => 'field_is_foundation_breadcrumbs_item_font_size',
    'type' => 'text',
    'default_value' => "rem_calc(11)"
];
$breadcrumbs_item_color = [
    'name' => 'breadcrumbs_item_color',
    'label' => 'Breadcrumbs Item Color',
    'key' => 'field_is_foundation_breadcrumbs_item_color',
    'type' => 'text',
    'required' => 1,
    'default_value' => '$primary-color'
];
$breadcrumbs_item_color_current = [
    'name' => 'breadcrumbs_item_color_current',
    'label' => 'Breadcrumbs Item Color Current',
    'key' => 'field_is_foundation_breadcrumbs_item_color_current',
    'type' => 'text',
    'required' => 1,
    'default_value' => '$black'
];
$breadcrumbs_item_color_disabled = [
    'name' => 'breadcrumbs_item_color_disabled',
    'label' => 'Breadcrumbs Item Color Disabled',
    'key' => 'field_is_foundation_breadcrumbs_item_color_disabled',
    'type' => 'text',
    'required' => 1,
    'default_value' => '$medium-gray'
];
$breadcrumbs_item_margin = [
    'name' => 'breadcrumbs_item_margin',
    'label' => 'Breadcrumbs Item Margin',
    'key' => 'field_is_foundation_breadcrumbs_item_margin',
    'type' => 'text',
    'default_value' => "0.75rem"
];
$breadcrumbs_item_uppercase = [
    'name' => 'breadcrumbs_item_uppercase',
    'label' => 'Breadcrumbs Item Uppercase',
    'key' => 'field_is_foundation_breadcrumbs_item_uppercase',
    'type' => 'text',
    'default_value' => "true"
];
$breadcrumbs_item_separator = [
    'name' => 'breadcrumbs_item_separator',
    'label' => 'Breadcrumbs Item Separator',
    'key' => 'field_is_foundation_breadcrumbs_item_separator',
    'type' => 'text',
    'default_value' => "true"
];
$breadcrumbs_item_separator_item = [
    'name' => 'breadcrumbs_item_separator_item',
    'label' => 'Breadcrumbs Item Separator Item',
    'key' => 'field_is_foundation_breadcrumbs_item_separator_item',
    'type' => 'text',
    'default_value' => "bc item sep"
];
$breadcrumbs_item_separator_item_rtl = [
    'name' => 'breadcrumbs_item_separator_item_rtl',
    'label' => 'Breadcrumbs Item Separator Item Rtl',
    'key' => 'field_is_foundation_breadcrumbs_item_separator_item_rtl',
    'type' => 'text',
    'default_value' => "bc item sep rtl"
];
$breadcrumbs_item_separator_color = [
    'name' => 'breadcrumbs_item_separator_color',
    'label' => 'Breadcrumbs Item Separator Color',
    'key' => 'field_is_foundation_breadcrumbs_item_separator_color',
    'type' => 'text',
    'required' => 1,
    'default_value' => '$medium-gray'
];
$button_font_family = [
    'name' => 'button_font_family',
    'label' => 'Button Font Family',
    'key' => 'field_is_foundation_button_font_family',
    'type' => 'text',
    'default_value' => "inherit"
];
$button_padding = [
    'name' => 'button_padding',
    'label' => 'Button Padding',
    'key' => 'field_is_foundation_button_padding',
    'type' => 'text',
    'default_value' => "0.75em 1.35em"
];
$button_margin = [
    'name' => 'button_margin',
    'label' => 'Button Margin',
    'key' => 'field_is_foundation_button_margin',
    'type' => 'text',
    'default_value' => "0 0 15px 0",
    'required' => 1
];
$button_fill = [
    'name' => 'button_fill',
    'label' => 'Button Fill',
    'key' => 'field_is_foundation_button_fill',
    'type' => 'text',
    'default_value' => "solid"
];
$button_background = [
    'name' => 'button_background',
    'label' => 'Button Background',
    'key' => 'field_is_foundation_button_background',
    'type' => 'text',
    'required' => 1,
    'default_value' => '$primary-color'
];
$button_background_hover = [
    'name' => 'button_background_hover',
    'label' => 'Button Background Hover',
    'key' => 'field_is_foundation_button_background_hover',
    'type' => 'text',
    'default_value' => "scale-color(\$button-background, \$lightness: -15%);",
    'required' => 1
];
$button_color = [
    'name' => 'button_color',
    'label' => 'Button Color',
    'key' => 'field_is_foundation_button_color',
    'type' => 'text',
    'default_value' => '$white',
    'required' => 1
];
$button_color_alt = [
    'name' => 'button_color_alt',
    'label' => 'Button Color Alt',
    'key' => 'field_is_foundation_button_color_alt',
    'type' => 'text',
    'default_value' => '$black',
    'required' => 1
];
$button_radius = [
    'name' => 'button_radius',
    'label' => 'Button Radius',
    'key' => 'field_is_foundation_button_radius',
    'type' => 'text',
    'default_value' => "15px",
    'required' => 1
];
$button_hollow_border_width = [
    'name' => 'button_hollow_border_width',
    'label' => 'Button Hollow Border Width',
    'key' => 'field_is_foundation_button_hollow_border_width',
    'type' => 'text',
    'default_value' => "1px",
    'required' => 1
];
$button_sizes_tiny = [
    'name' => 'button_sizes_tiny',
    'label' => 'Button Sizes Tiny',
    'key' => 'field_is_foundation_button_sizes_tiny',
    'type' => 'text',
    'required' => 1,
    'default_value' => "0.6rem"
];
$button_sizes_small = [
    'name' => 'button_sizes_small',
    'label' => 'Button Sizes Small',
    'key' => 'field_is_foundation_button_sizes_small',
    'type' => 'text',
    'required' => 1,
    'default_value' => "0.75rem"
];
$button_sizes_default = [
    'name' => 'button_sizes_default',
    'label' => 'Button Sizes Default',
    'key' => 'field_is_foundation_button_sizes_default',
    'type' => 'text',
    'required' => 1,
    'default_value' => "0.9rem"
];
$button_sizes_large = [
    'name' => 'button_sizes_large',
    'label' => 'Button Sizes Large',
    'key' => 'field_is_foundation_button_sizes_large',
    'type' => 'text',
    'required' => 1,
    'default_value' => "1.25rem"
];
$button_opacity_disabled = [
    'name' => 'button_opacity_disabled',
    'label' => 'Button Opacity Disabled',
    'key' => 'field_is_foundation_button_opacity_disabled',
    'type' => 'text',
    'required' => 1,
    'default_value' => "0.25"
];
$button_background_hover_lightness = [
    'name' => 'button_background_hover_lightness',
    'label' => 'Button Background Hover Lightness',
    'key' => 'field_is_foundation_button_background_hover_lightness',
    'type' => 'text',
    'required' => 1,
    'default_value' => "-20%"
];
$button_hollow_hover_lightness = [
    'name' => 'button_hollow_hover_lightness',
    'label' => 'Button Hollow Hover Lightness',
    'key' => 'field_is_foundation_button_hollow_hover_lightness',
    'type' => 'text',
    'required' => 1,
    'default_value' => "-50%"
];
$button_transition = [
    'name' => 'button_transition',
    'label' => 'Button Transition',
    'key' => 'field_is_foundation_button_transition',
    'type' => 'text',
    'required' => 1,
    'default_value' => "background_color 0.25s ease_out, color 0.25s ease_out"
];
$buttongroup_margin = [
    'name' => 'buttongroup_margin',
    'label' => 'Buttongroup Margin',
    'key' => 'field_is_foundation_buttongroup_margin',
    'type' => 'text',
    'required' => 1,
    'default_value' => "1rem"
];
$buttongroup_spacing = [
    'name' => 'buttongroup_spacing',
    'label' => 'Buttongroup Spacing',
    'key' => 'field_is_foundation_buttongroup_spacing',
    'type' => 'text',
    'required' => 1,
    'default_value' => "1px"
];
$buttongroup_child_selector = [
    'name' => 'buttongroup_child_selector',
    'label' => 'Buttongroup Child Selector',
    'key' => 'field_is_foundation_buttongroup_child_selector',
    'type' => 'text',
    'required' => 1,
    'default_value' => "'.button'"
];
$buttongroup_expand_max = [
    'name' => 'buttongroup_expand_max',
    'label' => 'Buttongroup Expand Max',
    'key' => 'field_is_foundation_buttongroup_expand_max',
    'type' => 'text',
    'required' => 1,
    'default_value' => "6"
];
$buttongroup_radius_on_each = [
    'name' => 'buttongroup_radius_on_each',
    'label' => 'Buttongroup Radius On Each',
    'key' => 'field_is_foundation_buttongroup_radius_on_each',
    'type' => 'text',
    'required' => 1,
    'default_value' => "true"
];
$callout_background = [
    'name' => 'callout_background',
    'label' => 'Callout Background',
    'key' => 'field_is_foundation_callout_background',
    'type' => 'text',
    'required' => 1,
    'instructions' => 'Default value: $white',
    'default_value' => '$white'
];
$callout_background_fade = [
    'name' => 'callout_background_fade',
    'label' => 'Callout Background Fade',
    'key' => 'field_is_foundation_callout_background_fade',
    'type' => 'text',
    'required' => 1,
    'default_value' => "85%"
];
$callout_border = [
    'name' => 'callout_border',
    'label' => 'Callout Border',
    'key' => 'field_is_foundation_callout_border',
    'type' => 'text',
    'required' => 1,
    'default_value' => "1px solid rgba(0,0,0 , 0.25)"
];
$callout_margin = [
    'name' => 'callout_margin',
    'label' => 'Callout Margin',
    'key' => 'field_is_foundation_callout_margin',
    'type' => 'text',
    'required' => 1,
    'default_value' => "0 0 1rem 0"
];
$callout_padding = [
    'name' => 'callout_padding',
    'label' => 'Callout Padding',
    'key' => 'field_is_foundation_callout_padding',
    'type' => 'text',
    'default_value' => "1rem"
];
$callout_font_color = [
    'name' => 'callout_font_color',
    'label' => 'Callout Font Color',
    'key' => 'field_is_foundation_callout_font_color',
    'type' => 'text',
    'default_value' => '$body-font-color'
];
$callout_font_color_alt = [
    'name' => 'callout_font_color_alt',
    'label' => 'Callout Font Color Alt',
    'key' => 'field_is_foundation_callout_font_color_alt',
    'type' => 'text',
    'default_value' => '$body-background'
];
$callout_radius = [
    'name' => 'callout_radius',
    'label' => 'Callout Radius',
    'key' => 'field_is_foundation_callout_radius',
    'type' => 'text',
    'default_value' => '$global-radius'
];
$callout_link_tint = [
    'name' => 'callout_link_tint',
    'label' => 'Callout Link Tint',
    'key' => 'field_is_foundation_callout_link_tint',
    'type' => 'text',
    'default_value' => "30%"
];


$card_section_message = [
    'key' => 'field_is_foundation_card_section_message',
    'label' => 'Card Section',
    'type' => 'message',
    'message' => 'Options for card block here',
];

$card_background = [
    'name' => 'card_background',
    'label' => 'Card Background',
    'key' => 'field_is_foundation_card_background',
    'type' => 'text',
    'default_value' => '$white',
    'required' => 1,
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$card_font_color = [
    'name' => 'card_font_color',
    'label' => 'Card Font Color',
    'key' => 'field_is_foundation_card_font_color',
    'type' => 'text',
    'default_value' => '$black',
    'required' => 1,
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$card_divider_background = [
    'name' => 'card_divider_background',
    'label' => 'Card Divider Background',
    'key' => 'field_is_foundation_card_divider_background',
    'type' => 'text',
    'default_value' => '$light-gray',
    'required' => 1,
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$card_border = [
    'name' => 'card_border',
    'label' => 'Card Border',
    'key' => 'field_is_foundation_card_border',
    'type' => 'text',
    'default_value' => "1px solid \$light-gray",
    'required' => 1,
    'wrapper' => [
        'width' => 100 / 2
    ]
];
$card_shadow = [
    'name' => 'card_shadow',
    'label' => 'Card Shadow',
    'key' => 'field_is_foundation_card_shadow',
    'type' => 'text',
    'required' => 1,
    'default_value' => "none",
    'wrapper' => [
        'width' => 100 / 2
    ]
];
$card_border_radius = [
    'name' => 'card_border_radius',
    'label' => 'Card Border Radius',
    'key' => 'field_is_foundation_card_border_radius',
    'type' => 'text',
    'default_value' => '$global-radius',
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$card_padding = [
    'name' => 'card_padding',
    'label' => 'Card Padding',
    'key' => 'field_is_foundation_card_padding',
    'type' => 'text',
    'default_value' => '$global-padding',
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$card_margin_bottom = [
    'name' => 'card_margin_bottom',
    'label' => 'Card Margin Bottom',
    'key' => 'field_is_foundation_card_margin_bottom',
    'type' => 'text',
    'default_value' => '$global-margin',
    'wrapper' => [
        'width' => 100 / 3
    ]
];
$closebutton_position = [
    'name' => 'closebutton_position',
    'label' => 'Closebutton Position',
    'key' => 'field_is_foundation_closebutton_position',
    'type' => 'text',
    'default_value' => "right top"
];
$closebutton_offset_horizontal_small = [
    'name' => 'closebutton_offset_horizontal_small',
    'label' => 'Closebutton Offset Horizontal Small',
    'key' => 'field_is_foundation_closebutton_offset_horizontal_small',
    'type' => 'text',
    'default_value' => "0.66rem"
];
$closebutton_offset_horizontal_medium = [
    'name' => 'closebutton_offset_horizontal_medium',
    'label' => 'Closebutton Offset Horizontal Medium',
    'key' => 'field_is_foundation_closebutton_offset_horizontal_medium',
    'type' => 'text',
    'default_value' => "1rem"
];
$closebutton_offset_vertical_small = [
    'name' => 'closebutton_offset_vertical_small',
    'label' => 'Closebutton Offset Vertical Small',
    'key' => 'field_is_foundation_closebutton_offset_vertical_small',
    'type' => 'text',
    'default_value' => "0.33em"
];
$closebutton_offset_vertical_medium = [
    'name' => 'closebutton_offset_vertical_medium',
    'label' => 'Closebutton Offset Vertical Medium',
    'key' => 'field_is_foundation_closebutton_offset_vertical_medium',
    'type' => 'text',
    'default_value' => "0.5rem"
];
$closebutton_size_small = [
    'name' => 'closebutton_size_small',
    'label' => 'Closebutton Size Small',
    'key' => 'field_is_foundation_closebutton_size_small',
    'type' => 'text',
    'default_value' => "1.5em"
];
$closebutton_size_medium = [
    'name' => 'closebutton_size_medium',
    'label' => 'Closebutton Size Medium',
    'key' => 'field_is_foundation_closebutton_size_medium',
    'type' => 'text',
    'default_value' => "2em"
];
$closebutton_lineheight = [
    'name' => 'closebutton_lineheight',
    'label' => 'Closebutton Lineheight',
    'key' => 'field_is_foundation_closebutton_lineheight',
    'type' => 'text',
    'default_value' => "1"
];
$closebutton_color = [
    'name' => 'closebutton_color',
    'label' => 'Closebutton Color',
    'key' => 'field_is_foundation_closebutton_color',
    'type' => 'text',
    'default_value' => '$dark-gray',
    'required' => 1
];
$closebutton_color_hover = [
    'name' => 'closebutton_color_hover',
    'label' => 'Closebutton Color Hover',
    'key' => 'field_is_foundation_closebutton_color_hover',
    'type' => 'text',
    'default_value' => '$black',
    'required' => 1
];
$drilldown_transition = [
    'name' => 'drilldown_transition',
    'label' => 'Drilldown Transition',
    'key' => 'field_is_foundation_drilldown_transition',
    'type' => 'text',
    'default_value' => "transform 0.15s linear"
];
$drilldown_arrows = [
    'name' => 'drilldown_arrows',
    'label' => 'Drilldown Arrows',
    'key' => 'field_is_foundation_drilldown_arrows',
    'type' => 'text',
    'default_value' => "true"
];
$drilldown_padding = [
    'name' => 'drilldown_padding',
    'label' => 'Drilldown Padding',
    'key' => 'field_is_foundation_drilldown_padding',
    'type' => 'text',
    'default_value' => "15px"
];
$drilldown_nested_margin = [
    'name' => 'drilldown_nested_margin',
    'label' => 'Drilldown Nested Margin',
    'key' => 'field_is_foundation_drilldown_nested_margin',
    'type' => 'text',
    'default_value' => "0"
];
$drilldown_background = [
    'name' => 'drilldown_background',
    'label' => 'Drilldown Background',
    'key' => 'field_is_foundation_drilldown_background',
    'type' => 'text',
    'default_value' => '$white',
    'required' => 1
];
$drilldown_submenu_padding = [
    'name' => 'drilldown_submenu_padding',
    'label' => 'Drilldown Submenu Padding',
    'key' => 'field_is_foundation_drilldown_submenu_padding',
    'type' => 'text',
    'default_value' => "15px"
];
$drilldown_submenu_background = [
    'name' => 'drilldown_submenu_background',
    'label' => 'Drilldown Submenu Background',
    'key' => 'field_is_foundation_drilldown_submenu_background',
    'type' => 'text',
    'default_value' => '$white',
    'required' => 1
];
$drilldown_arrow_color = [
    'name' => 'drilldown_arrow_color',
    'label' => 'Drilldown Arrow Color',
    'key' => 'field_is_foundation_drilldown_arrow_color',
    'type' => 'text',
    'required' => '1',
    'default_value' => '$primary-color'
];
$drilldown_arrow_size = [
    'name' => 'drilldown_arrow_size',
    'label' => 'Drilldown Arrow Size',
    'key' => 'field_is_foundation_drilldown_arrow_size',
    'type' => 'text',
    'default_value' => "6px"
];
$dropdown_padding = [
    'name' => 'dropdown_padding',
    'label' => 'Dropdown Padding',
    'key' => 'field_is_foundation_dropdown_padding',
    'type' => 'text',
    'default_value' => "1rem"
];
$dropdown_background = [
    'name' => 'dropdown_background',
    'label' => 'Dropdown Background',
    'key' => 'field_is_foundation_dropdown_background',
    'type' => 'text',
    'default_value' => '$white',
    'required' => 1
];
$dropdown_border = [
    'name' => 'dropdown_border',
    'label' => 'Dropdown Border',
    'key' => 'field_is_foundation_dropdown_border',
    'type' => 'text',
    'default_value' => '1px solid $medium-gray',
    'required' => 1
];
$dropdown_font_size = [
    'name' => 'dropdown_font_size',
    'label' => 'Dropdown Font Size',
    'key' => 'field_is_foundation_dropdown_font_size',
    'type' => 'text',
    'default_value' => "1rem",
    'required' => 1
];
$dropdown_width = [
    'name' => 'dropdown_width',
    'label' => 'Dropdown Width',
    'key' => 'field_is_foundation_dropdown_width',
    'type' => 'text',
    'default_value' => "300px",
    'required' => 1
];
$dropdown_radius = [
    'name' => 'dropdown_radius',
    'label' => 'Dropdown Radius',
    'key' => 'field_is_foundation_dropdown_radius',
    'type' => 'text',
    'default_value' => "15px",
    'required' => 1
];
$dropdown_sizes_tiny = [
    'name' => 'dropdown_sizes_tiny',
    'label' => 'Dropdown Sizes Tiny',
    'key' => 'field_is_foundation_dropdown_sizes_tiny',
    'type' => 'text',
    'default_value' => "100px"
];
$dropdown_sizes_small = [
    'name' => 'dropdown_sizes_small',
    'label' => 'Dropdown Sizes Small',
    'key' => 'field_is_foundation_dropdown_sizes_small',
    'type' => 'text',
    'default_value' => "200px"
];
$dropdown_sizes_large = [
    'name' => 'dropdown_sizes_large',
    'label' => 'Dropdown Sizes Large',
    'key' => 'field_is_foundation_dropdown_sizes_large',
    'type' => 'text',
    'default_value' => "400px"
];
$dropdownmenu_arrows = [
    'name' => 'dropdownmenu_arrows',
    'label' => 'Dropdownmenu Arrows',
    'key' => 'field_is_foundation_dropdownmenu_arrows',
    'type' => 'text',
    'default_value' => "true"
];
$dropdownmenu_arrow_color = [
    'name' => 'dropdownmenu_arrow_color',
    'label' => 'Dropdownmenu Arrow Color',
    'key' => 'field_is_foundation_dropdownmenu_arrow_color',
    'type' => 'text',
    'required' => 1,
    'default_value' => '$primary-color'
];
$dropdownmenu_arrow_size = [
    'name' => 'dropdownmenu_arrow_size',
    'label' => 'Dropdownmenu Arrow Size',
    'key' => 'field_is_foundation_dropdownmenu_arrow_size',
    'type' => 'text',
    'default_value' => "6px"
];
$dropdownmenu_arrow_padding = [
    'name' => 'dropdownmenu_arrow_padding',
    'label' => 'Dropdownmenu Arrow Padding',
    'key' => 'field_is_foundation_dropdownmenu_arrow_padding',
    'type' => 'text',
    'default_value' => "1.5rem"
];
$dropdownmenu_min_width = [
    'name' => 'dropdownmenu_min_width',
    'label' => 'Dropdownmenu Min Width',
    'key' => 'field_is_foundation_dropdownmenu_min_width',
    'type' => 'text',
    'default_value' => "200px"
];
$dropdownmenu_background = [
    'name' => 'dropdownmenu_background',
    'label' => 'Dropdownmenu Background',
    'key' => 'field_is_foundation_dropdownmenu_background',
    'type' => 'text',
    'default_value' => '$white',
    'required' => 1
];
$dropdownmenu_submenu_background = [
    'name' => 'dropdownmenu_submenu_background',
    'label' => 'Dropdownmenu Submenu Background',
    'key' => 'field_is_foundation_dropdownmenu_submenu_background',
    'type' => 'text',
    'default_value' => '$white',
    'required' => 1
];
$dropdownmenu_padding = [
    'name' => 'dropdownmenu_padding',
    'label' => 'Dropdownmenu Padding',
    'key' => 'field_is_foundation_dropdownmenu_padding',
    'type' => 'text',
    'default_value' => '$global-menu-padding'
];
$dropdownmenu_nested_margin = [
    'name' => 'dropdownmenu_nested_margin',
    'label' => 'Dropdownmenu Nested Margin',
    'key' => 'field_is_foundation_dropdownmenu_nested_margin',
    'type' => 'text',
    'default_value' => "0"
];
$dropdownmenu_submenu_padding = [
    'name' => 'dropdownmenu_submenu_padding',
    'label' => 'Dropdownmenu Submenu Padding',
    'key' => 'field_is_foundation_dropdownmenu_submenu_padding',
    'type' => 'text',
    'default_value' => '$dropdownmenu-padding'
];
$dropdownmenu_border = [
    'name' => 'dropdownmenu_border',
    'label' => 'Dropdownmenu Border',
    'key' => 'field_is_foundation_dropdownmenu_border',
    'type' => 'text',
    'default_value' => "1px solid \$medium-gray"
];
$dropdown_menu_item_color_active = [
    'name' => 'dropdown_menu_item_color_active',
    'label' => 'Dropdown Menu Item Color Active',
    'key' => 'field_is_foundation_dropdown_menu_item_color_active',
    'type' => 'text',
    'default_value' => '$primary-color',
    'required' => 1
];
$dropdown_menu_item_background_active = [
    'name' => 'dropdown_menu_item_background_active',
    'label' => 'Dropdown Menu Item Background Active',
    'key' => 'field_is_foundation_dropdown_menu_item_background_active',
    'type' => 'text',
    'default_value' => "transparent",
    'required' => 1
];
$flex_source_ordering_count = [
    'name' => 'flex_source_ordering_count',
    'label' => 'Flex Source Ordering Count',
    'key' => 'field_is_foundation_flex_source_ordering_count',
    'type' => 'text',
    'default_value' => "6",
    'required' => 1
];
$flexbox_responsive_breakpoints = [
    'name' => 'flexbox_responsive_breakpoints',
    'label' => 'Flexbox Responsive Breakpoints',
    'key' => 'field_is_foundation_flexbox_responsive_breakpoints',
    'type' => 'text',
    'default_value' => "true",
    'required' => 1
];
$fieldset_border = [
    'name' => 'fieldset_border',
    'label' => 'Fieldset Border',
    'key' => 'field_is_foundation_fieldset_border',
    'type' => 'text',
    'default_value' => '1px solid $medium-gray',
    'required' => 1
];
$fieldset_padding = [
    'name' => 'fieldset_padding',
    'label' => 'Fieldset Padding',
    'key' => 'field_is_foundation_fieldset_padding',
    'type' => 'text',
    'default_value' => "rem_calc(20)",
    'required' => 1
];
$fieldset_margin = [
    'name' => 'fieldset_margin',
    'label' => 'Fieldset Margin',
    'key' => 'field_is_foundation_fieldset_margin',
    'type' => 'text',
    'default_value' => "rem_calc(18 0)"
];
$legend_padding = [
    'name' => 'legend_padding',
    'label' => 'Legend Padding',
    'key' => 'field_is_foundation_legend_padding',
    'type' => 'text',
    'default_value' => "rem_calc(0 3)"
];
$form_spacing = [
    'name' => 'form_spacing',
    'label' => 'Form Spacing',
    'key' => 'field_is_foundation_form_spacing',
    'type' => 'text',
    'default_value' => "rem_calc(16)"
];
$helptext_color = [
    'name' => 'helptext_color',
    'label' => 'Helptext Color',
    'key' => 'field_is_foundation_helptext_color',
    'type' => 'text',
    'default_value' => '$black',
    'required' => 1
];
$helptext_font_size = [
    'name' => 'helptext_font_size',
    'label' => 'Helptext Font Size',
    'key' => 'field_is_foundation_helptext_font_size',
    'type' => 'text',
    'default_value' => "rem_calc(13)"
];
$helptext_font_style = [
    'name' => 'helptext_font_style',
    'label' => 'Helptext Font Style',
    'key' => 'field_is_foundation_helptext_font_style',
    'type' => 'text',
    'default_value' => "italic"
];
$input_prefix_color = [
    'name' => 'input_prefix_color',
    'label' => 'Input Prefix Color',
    'key' => 'field_is_foundation_input_prefix_color',
    'type' => 'text',
    'default_value' => '$black',
    'required' => 1
];
$input_prefix_background = [
    'name' => 'input_prefix_background',
    'label' => 'Input Prefix Background',
    'key' => 'field_is_foundation_input_prefix_background',
    'type' => 'text',
    'default_value' => '$medium-gray',
    'required' => 1
];
$input_prefix_border = [
    'name' => 'input_prefix_border',
    'label' => 'Input Prefix Border',
    'key' => 'field_is_foundation_input_prefix_border',
    'type' => 'text',
    'default_value' => '1px solid $medium-gray'
];
$input_prefix_padding = [
    'name' => 'input_prefix_padding',
    'label' => 'Input Prefix Padding',
    'key' => 'field_is_foundation_input_prefix_padding',
    'type' => 'text',
    'default_value' => "1rem"
];
$form_label_color = [
    'name' => 'form_label_color',
    'label' => 'Form Label Color',
    'key' => 'field_is_foundation_form_label_color',
    'type' => 'text',
    'default_value' => '$black',
    'required' => 1
];
$form_label_font_size = [
    'name' => 'form_label_font_size',
    'label' => 'Form Label Font Size',
    'key' => 'field_is_foundation_form_label_font_size',
    'type' => 'text',
    'default_value' => "rem_calc(14)"
];
$form_label_font_weight = [
    'name' => 'form_label_font_weight',
    'label' => 'Form Label Font Weight',
    'key' => 'field_is_foundation_form_label_font_weight',
    'type' => 'text',
    'default_value' => "normal"
];
$form_label_line_height = [
    'name' => 'form_label_lineheight',
    'label' => 'Form Label Line Height',
    'key' => 'field_is_foundation_form_label_lineheight',
    'type' => 'text',
    'default_value' => "1.8"
];
$select_background = [
    'name' => 'select_background',
    'label' => 'Select Background',
    'key' => 'field_is_foundation_select_background',
    'type' => 'text',
    'default_value' => '$white',
    'required' => 1
];
$select_triangle_color = [
    'name' => 'select_triangle_color',
    'label' => 'Select Triangle Color',
    'key' => 'field_is_foundation_select_triangle_color',
    'type' => 'text',
    'default_value' => '$dark-gray',
    'required' => 1
];
$select_radius = [
    'name' => 'select_radius',
    'label' => 'Select Radius',
    'key' => 'field_is_foundation_select_radius',
    'type' => 'text',
    'default_value' => "15px"
];
$input_color = [
    'name' => 'input_color',
    'label' => 'Input Color',
    'key' => 'field_is_foundation_input_color',
    'type' => 'text',
    'default_value' => '$black',
    'required' => 1
];
$input_placeholder_color = [
    'name' => 'input_placeholder_color',
    'label' => 'Input Placeholder Color',
    'key' => 'field_is_foundation_input_placeholder_color',
    'type' => 'text',
    'default_value' => '$medium-gray',
    'required' => 1
];
$input_font_family = [
    'name' => 'input_font_family',
    'label' => 'Input Font Family',
    'key' => 'field_is_foundation_input_font_family',
    'type' => 'text',
    'default_value' => "inherit"
];
$input_font_size = [
    'name' => 'input_font_size',
    'label' => 'Input Font Size',
    'key' => 'field_is_foundation_input_font_size',
    'type' => 'text',
    'default_value' => "rem_calc(16)"
];
$input_font_weight = [
    'name' => 'input_font_weight',
    'label' => 'Input Font Weight',
    'key' => 'field_is_foundation_input_font_weight',
    'type' => 'text',
    'default_value' => "normal"
];
$input_line_height = [
    'name' => 'input_lineheight',
    'label' => 'Input Line Height',
    'key' => 'field_is_foundation_input_lineheight',
    'type' => 'text',
    'default_value' => "1.5"
];
$input_background = [
    'name' => 'input_background',
    'label' => 'Input Background',
    'key' => 'field_is_foundation_input_background',
    'type' => 'text',
    'default_value' => '$white',
    'required' => 1
];
$input_background_focus = [
    'name' => 'input_background_focus',
    'label' => 'Input Background Focus',
    'key' => 'field_is_foundation_input_background_focus',
    'type' => 'text',
    'default_value' => '$white',
    'required' => 1
];
$input_background_disabled = [
    'name' => 'input_background_disabled',
    'label' => 'Input Background Disabled',
    'key' => 'field_is_foundation_input_background_disabled',
    'type' => 'text',
    'default_value' => '$medium-gray',
    'required' => 1
];
$input_border = [
    'name' => 'input_border',
    'label' => 'Input Border',
    'key' => 'field_is_foundation_input_border',
    'type' => 'text',
    'default_value' => '1px solid $medium-gray'
];
$input_border_focus = [
    'name' => 'input_border_focus',
    'label' => 'Input Border Focus',
    'key' => 'field_is_foundation_input_border_focus',
    'type' => 'text',
    'default_value' => '1px solid $medium-gray'
];
$input_padding = [
    'name' => 'input_padding',
    'label' => 'Input Padding',
    'key' => 'field_is_foundation_input_padding',
    'type' => 'text',
    'default_value' => '$form-spacing / 2',
    'required' => 1
];
$input_shadow = [
    'name' => 'input_shadow',
    'label' => 'Input Shadow',
    'key' => 'field_is_foundation_input_shadow',
    'type' => 'text',
    'default_value' => 'inset 0 1px 2px rgba($black, 0.1)',
    'required' => 1
];
$input_shadow_focus = [
    'name' => 'input_shadow_focus',
    'label' => 'Input Shadow Focus',
    'key' => 'field_is_foundation_input_shadow_focus',
    'type' => 'text',
    'default_value' => '0 0 5px $medium-gray',
    'required' => 1
];
$input_cursor_disabled = [
    'name' => 'input_cursor_disabled',
    'label' => 'Input Cursor Disabled',
    'key' => 'field_is_foundation_input_cursor_disabled',
    'type' => 'text',
    'default_value' => "not_allowed",
    'required' => 1
];
$input_transition = [
    'name' => 'input_transition',
    'label' => 'Input Transition',
    'key' => 'field_is_foundation_input_transition',
    'type' => 'text',
    'default_value' => "box_shadow 0.5s, border_color 0.25s ease_in_out",
    'required' => 1
];
$input_number_spinners = [
    'name' => 'input_number_spinners',
    'label' => 'Input Number Spinners',
    'key' => 'field_is_foundation_input_number_spinners',
    'type' => 'text',
    'default_value' => "true"
];
$input_radius = [
    'name' => 'input_radius',
    'label' => 'Input Radius',
    'key' => 'field_is_foundation_input_radius',
    'type' => 'text',
    'default_value' => '$global-radius'
];
$form_button_radius = [
    'name' => 'form_button_radius',
    'label' => 'Form Button Radius',
    'key' => 'field_is_foundation_form_button_radius',
    'type' => 'text',
    'default_value' => '$global-radius'
];
$label_background = [
    'name' => 'label_background',
    'label' => 'Label Background',
    'key' => 'field_is_foundation_label_background',
    'type' => 'text',
    'default_value' => '$primary-color',
    'required' => 1
];
$label_color = [
    'name' => 'label_color',
    'label' => 'Label Color',
    'key' => 'field_is_foundation_label_color',
    'type' => 'text',
    'default_value' => '$white',
    'required' => 1
];
$label_color_alt = [
    'name' => 'label_color_alt',
    'label' => 'Label Color Alt',
    'key' => 'field_is_foundation_label_color_alt',
    'type' => 'text',
    'default_value' => '$black',
    'required' => 1
];
$label_font_size = [
    'name' => 'label_font_size',
    'label' => 'Label Font Size',
    'key' => 'field_is_foundation_label_font_size',
    'type' => 'text',
    'default_value' => "0.8rem"
];
$label_padding = [
    'name' => 'label_padding',
    'label' => 'Label Padding',
    'key' => 'field_is_foundation_label_padding',
    'type' => 'text',
    'default_value' => "0.33333rem 0.5rem"
];
$label_radius = [
    'name' => 'label_radius',
    'label' => 'Label Radius',
    'key' => 'field_is_foundation_label_radius',
    'type' => 'text',
    'default_value' => "15px"
];
$mediaobject_margin_bottom = [
    'name' => 'mediaobject_margin_bottom',
    'label' => 'Mediaobject Margin Bottom',
    'key' => 'field_is_foundation_mediaobject_margin_bottom',
    'type' => 'text',
    'default_value' => '$global-margin'
];
$mediaobject_section_padding = [
    'name' => 'mediaobject_section_padding',
    'label' => 'Mediaobject Section Padding',
    'key' => 'field_is_foundation_mediaobject_section_padding',
    'type' => 'text',
    'default_value' => '$global-padding'
];
$mediaobject_image_width_stacked = [
    'name' => 'mediaobject_image_width_stacked',
    'label' => 'Mediaobject Image Width Stacked',
    'key' => 'field_is_foundation_mediaobject_image_width_stacked',
    'type' => 'text',
    'default_value' => "100%"
];

// 23. Menu
// --------

$menu_margin = [
    'name' => 'menu_margin',
    'label' => 'Menu Margin',
    'key' => 'field_is_foundation_menu_margin',
    'type' => 'text',
    'required' => 1,
    'default_value' => "0"
];
$menu_nested_margin = [
    'name' => 'menu_nested_margin',
    'label' => 'Menu Nested Margin',
    'key' => 'field_is_foundation_menu_nested_margin',
    'type' => 'text',
    'default_value' => '$global-menu-nested-margin'
];
$menu_items_padding = [
    'name' => 'menu_items_padding',
    'label' => 'Menu Items Padding',
    'key' => 'field_is_foundation_menu_items_padding',
    'type' => 'text',
    'default_value' => '$global-menu-padding'
];
$menu_simple_margin = [
    'name' => 'menu_simple_margin',
    'label' => 'Menu Simple Margin',
    'key' => 'field_is_foundation_menu_simple_margin',
    'type' => 'text',
    'default_value' => "1rem"
];
$menu_item_color_active = [
    'name' => 'menu_item_color_active',
    'label' => 'Menu Item Color Active',
    'key' => 'field_is_foundation_menu_item_color_active',
    'type' => 'text',
    'default_value' => '$white',
    'required' => 1
];
$menu_item_background_active = [
    'name' => 'menu_item_background_active',
    'label' => 'Menu Item Background Active',
    'key' => 'field_is_foundation_menu_item_background_active',
    'type' => 'text',
    'default_value' => "transparent",
    'required' => 1
];
$menu_icon_spacing = [
    'name' => 'menu_icon_spacing',
    'label' => 'Menu Icon Spacing',
    'key' => 'field_is_foundation_menu_icon_spacing',
    'type' => 'text',
    'default_value' => "0.25rem"
];
$menu_item_background_hover = [
    'name' => 'menu_item_background_hover',
    'label' => 'Menu Item Background Hover',
    'key' => 'field_is_foundation_menu_item_background_hover',
    'type' => 'text',
    'default_value' => '$light-gray',
    'required' => 1
];
$menu_state_back_compat = [
    'name' => 'menu_state_back_compat',
    'label' => 'Menu State Back Compat',
    'key' => 'field_is_foundation_menu_state_back_compat',
    'type' => 'text',
    'default_value' => "true"
];
$menu_centered_back_compat = [
    'name' => 'menu_centered_back_compat',
    'label' => 'Menu Centered Back Compat',
    'key' => 'field_is_foundation_menu_centered_back_compat',
    'type' => 'text',
    'default_value' => "true"
];
$menu_icons_back_compat = [
    'name' => 'menu_icons_back_compat',
    'label' => 'Menu Icons Back Compat',
    'key' => 'field_is_foundation_menu_icons_back_compat',
    'type' => 'text',
    'default_value' => "true"
];

$global_options_message = [
    'key' => 'field_5a254e8c4b813',
    'label' => 'Global Options',
    'type' => 'message',
    'message' => 'Options affecting the global display and grid',
];


// 24. Meter
// ---------

$meter_height = [
    'name' => 'meter_height',
    'label' => 'meter-height',
    'key' => 'field_is_foundation_meter_height',
    'type' => 'text',
    'default_value' => '1rem',
    'required' => 1,
];

$meter_radius = [
    'name' => 'meter_radius',
    'label' => 'meter-radius',
    'key' => 'field_is_foundation_meter_radius',
    'type' => 'text',
    'default_value' => '$global-radius',
];

$meter_background = [
    'key' => 'field_is_foundation_meter_background',
    'label' => 'meter-background',
    'name' => 'meter_background',
    'type' => 'text',
    'default_value' => '$medium-gray',
];

$meter_fill_good = [
    'key' => 'field_is_foundation_meter_fill_good',
    'label' => 'meter-fill-good',
    'name' => 'meter_fill_good',
    'type' => 'text',
    'default_value' => '$success-color',
];

$meter_fill_medium = [
    'key' => 'field_is_foundation_meter_fill_medium',
    'label' => 'meter-fill-medium',
    'name' => 'meter_fill_medium',
    'type' => 'text',
    'default_value' => '$warning-color',
];

$meter_fill_bad = [
    'key' => 'field_is_foundation_meter_fill_bad',
    'label' => 'meter-fill-bad',
    'name' => 'meter_fill_bad',
    'type' => 'text',
    'default_value' => '$alert-color',
];


// 25. Off-canvas
// --------------

$offcanvas_sizes_small = [
    'key' => 'field_is_foundation_offcanvas_sizes_small',
    'label' => 'offcanvas-sizes-small',
    'name' => 'offcanvas_sizes_small',
    'type' => 'text',
    'default_value' => '250px',
    'required' => 1,
];

$offcanvas_vertical_sizes_small = [
    'key' => 'field_is_foundation_offcanvas_vertical_sizes_small',
    'label' => 'offcanvas-vertical-sizes-small',
    'name' => 'offcanvas_vertical_sizes_small',
    'type' => 'text',
    'default_value' => '250px',
    'required' => 1,
];

$offcanvas_background = [
    'key' => 'field_is_foundation_offcanvas_background',
    'label' => 'offcanvas-background',
    'name' => 'offcanvas_background',
    'type' => 'text',
    'default_value' => '$light-gray',
    'required' => 1
];

$offcanvas_shadow = [
    'key' => 'field_is_foundation_offcanvas_shadow',
    'label' => 'offcanvas-shadow',
    'name' => 'offcanvas_shadow',
    'type' => 'text',
    'default_value' => '0 0 10px rgba($black, 0.7)',
    'required' => 1,
];

$offcanvas_inner_shadow_size = [
    'key' => 'field_is_foundation_offcanvas_inner_shadow_size',
    'label' => 'offcanvas-inner-shadow-size',
    'name' => 'offcanvas_inner_shadow_size',
    'type' => 'text',
    'default_value' => '20px',
    'required' => 1,
];

$offcanvas_inner_shadow_color = [
    'key' => 'field_is_foundation_offcanvas_inner_shadow_color',
    'label' => 'offcanvas-inner-shadow-color',
    'name' => 'offcanvas_inner_shadow_color',
    'type' => 'text',
    'default_value' => 'rgba($black, 0.25)',
    'required' => 1,
];

$offcanvas_overlay_zindex = [
    'key' => 'field_is_foundation_offcanvas_overlay_zindex',
    'label' => 'offcanvas-overlay-zindex',
    'name' => 'offcanvas_overlay_zindex',
    'type' => 'text',
    'default_value' => '11',
    'required' => 1,
];

$offcanvas_push_zindex = [
    'key' => 'field_is_foundation_offcanvas_push_zindex',
    'label' => 'offcanvas-push-zindex',
    'name' => 'offcanvas_push_zindex',
    'type' => 'text',
    'default_value' => '12',
    'required' => 1,
];

$offcanvas_overlap_zindex = [
    'key' => 'field_is_foundation_offcanvas_overlap_zindex',
    'label' => 'offcanvas-overlap-zindex',
    'name' => 'offcanvas_overlap_zindex',
    'type' => 'text',
    'default_value' => '13',
    'required' => 1,
];

$offcanvas_reveal_zindex = [
    'key' => 'field_is_foundation_offcanvas_reveal_zindex',
    'label' => 'offcanvas-reveal-zindex',
    'name' => 'offcanvas_reveal_zindex',
    'type' => 'text',
    'default_value' => '12',
    'required' => 1,
];

$offcanvas_transition_length = [
    'key' => 'field_is_foundation_offcanvas_transition_length',
    'label' => 'offcanvas-transition-length',
    'name' => 'offcanvas_transition_length',
    'type' => 'text',
    'default_value' => '0.5s',
    'required' => 1,
];

$offcanvas_transition_timing = [
    'key' => 'field_is_foundation_offcanvas_transition_timing',
    'label' => 'offcanvas-transition-timing',
    'name' => 'offcanvas_transition_timing',
    'type' => 'text',
    'default_value' => 'ease',
    'required' => 1,
];

$offcanvas_fixed_reveal = [
    'key' => 'field_is_foundation_offcanvas_fixed_reveal',
    'label' => 'offcanvas-fixed-reveal',
    'name' => 'offcanvas_fixed_reveal',
    'type' => 'text',
    'default_value' => 'true',
    'required' => 1,
];

$offcanvas_exit_background = [
    'key' => 'field_is_foundation_offcanvas_exit_background',
    'label' => 'offcanvas-exit-background',
    'name' => 'offcanvas_exit_background',
    'type' => 'text',
    'default_value' => 'rgba($white, 0.25)',
    'required' => 1,
];

$maincontent_class = [
    'key' => 'field_is_foundation_maincontent_class',
    'label' => 'maincontent-class',
    'name' => 'maincontent_class',
    'type' => 'text',
    'default_value' => 'off-canvas-content',
    'required' => 1,
];


// 26. Orbit
// ---------

$orbit_bullet_background = [
    'key' => 'field_is_foundation_orbit_bullet_background',
    'label' => 'orbit-bullet-background',
    'name' => 'orbit_bullet_background',
    'type' => 'text',
    'default_value' => '$medium-gray',
];

$orbit_bullet_background_active = [
    'key' => 'field_is_foundation_orbit_bullet_background_active',
    'label' => 'orbit-bullet-background-active',
    'name' => 'orbit_bullet_background_active',
    'type' => 'text',
    'default_value' => '$dark-gray',
];

$orbit_bullet_diameter = [
    'key' => 'field_is_foundation_orbit_bullet_diameter',
    'label' => 'orbit-bullet-diameter',
    'name' => 'orbit_bullet_diameter',
    'type' => 'text',
    'default_value' => '1.2rem',
    'required' => 1,
];

$orbit_bullet_margin = [
    'key' => 'field_is_foundation_orbit_bullet_margin',
    'label' => 'orbit-bullet-margin',
    'name' => 'orbit_bullet_margin',
    'type' => 'text',
    'default_value' => '0.1rem',
    'required' => 1,
];

$orbit_bullet_margin_top = [
    'key' => 'field_is_foundation_orbit_bullet_margin_top',
    'label' => 'orbit-bullet-margin-top',
    'name' => 'orbit_bullet_margin_top',
    'type' => 'text',
    'default_value' => '0.8rem',
    'required' => 1,
];

$orbit_bullet_margin_bottom = [
    'key' => 'field_is_foundation_orbit_bullet_margin_bottom',
    'label' => 'orbit-bullet-margin-bottom',
    'name' => 'orbit_bullet_margin_bottom',
    'type' => 'text',
    'default_value' => '0.8rem',
    'required' => 1,
];

$orbit_caption_background = [
    'key' => 'field_is_foundation_orbit_caption_background',
    'label' => 'orbit-caption-background',
    'name' => 'orbit_caption_background',
    'type' => 'text',
    'default_value' => 'rgba($black, 0.5)',
    'required' => 1,
];

$orbit_caption_padding = [
    'key' => 'field_is_foundation_orbit_caption_padding',
    'label' => 'orbit-caption-padding',
    'name' => 'orbit_caption_padding',
    'type' => 'text',
    'default_value' => '1rem',
    'required' => 1,
];

$orbit_control_background_hover = [
    'key' => 'field_is_foundation_orbit_control_background_hover',
    'label' => 'orbit-control-background-hover',
    'name' => 'orbit_control_background_hover',
    'type' => 'text',
    'default_value' => 'rgba($black, 0.5)',
    'required' => 1,
];

$orbit_control_padding = [
    'key' => 'field_is_foundation_orbit_control_padding',
    'label' => 'orbit-control-padding',
    'name' => 'orbit_control_padding',
    'type' => 'text',
    'default_value' => '1rem',
    'required' => 1,
];

$orbit_control_zindex = [
    'key' => 'field_is_foundation_orbit_control_zindex',
    'label' => 'orbit-control-zindex',
    'name' => 'orbit_control_zindex',
    'type' => 'text',
    'default_value' => '10',
    'required' => 1,
];


// 27. Pagination
// --------------

$pagination_font_size = [
    'key' => 'field_is_foundation_pagination_font_size',
    'label' => 'pagination-font-size',
    'name' => 'pagination_font_size',
    'type' => 'text',
    'default_value' => 'rem-calc(14)',
    'required' => 1,
];

$pagination_margin_bottom = [
    'key' => 'field_is_foundation_pagination_margin_bottom',
    'label' => 'pagination-margin-bottom',
    'name' => 'pagination_margin_bottom',
    'type' => 'text',
    'default_value' => '$global-margin',
];

$pagination_item_color = [
    'key' => 'field_is_foundation_pagination_item_color',
    'label' => 'pagination-item-color',
    'name' => 'pagination_item_color',
    'type' => 'text',
    'default_value' => '$black',
];

$pagination_item_padding = [
    'key' => 'field_is_foundation_pagination_item_padding',
    'label' => 'pagination-item-padding',
    'name' => 'pagination_item_padding',
    'type' => 'text',
    'default_value' => 'rem-calc(3 10)',
    'required' => 1,
];

$pagination_item_spacing = [
    'key' => 'field_is_foundation_pagination_item_spacing',
    'label' => 'pagination-item-spacing',
    'name' => 'pagination_item_spacing',
    'type' => 'text',
    'default_value' => 'rem-calc(1)',
    'required' => 1,
];

$pagination_radius = [
    'key' => 'field_is_foundation_pagination_radius',
    'label' => 'pagination-radius',
    'name' => 'pagination_radius',
    'type' => 'text',
    'default_value' => '$global-radius',
];

$pagination_item_background_hover = [
    'key' => 'field_is_foundation_pagination_item_background_hover',
    'label' => 'pagination-item-background-hover',
    'name' => 'pagination_item_background_hover',
    'type' => 'text',
    'default_value' => '$light-gray',
];

$pagination_item_background_current = [
    'key' => 'field_is_foundation_pagination_item_background_current',
    'label' => 'pagination-item-background-current',
    'name' => 'pagination_item_background_current',
    'type' => 'text',
    'default_value' => '$primary-color',
];

$pagination_item_color_current = [
    'key' => 'field_is_foundation_pagination_item_color_current',
    'label' => 'pagination-item-color-current',
    'name' => 'pagination_item_color_current',
    'type' => 'text',
    'default_value' => '$white',
];

$pagination_item_color_disabled = [
    'key' => 'field_is_foundation_pagination_item_color_disabled',
    'label' => 'pagination-item-color-disabled',
    'name' => 'pagination_item_color_disabled',
    'type' => 'text',
    'default_value' => '$medium-gray',
];

$pagination_ellipsis_color = [
    'key' => 'field_is_foundation_pagination_ellipsis_color',
    'label' => 'pagination-ellipsis-color',
    'name' => 'pagination_ellipsis_color',
    'type' => 'text',
    'default_value' => '$black',
];

$pagination_mobile_items = [
    'key' => 'field_is_foundation_pagination_mobile_items',
    'label' => 'pagination-mobile-items',
    'name' => 'pagination_mobile_items',
    'type' => 'text',
    'default_value' => 'false',
    'required' => 1,
];

$pagination_mobile_current_item = [
    'key' => 'field_is_foundation_pagination_mobile_current_item',
    'label' => 'pagination-mobile-current-item',
    'name' => 'pagination_mobile_current_item',
    'type' => 'text',
    'default_value' => 'false',
    'required' => 1,
];

$pagination_arrows = [
    'key' => 'field_is_foundation_pagination_arrows',
    'label' => 'pagination-arrows',
    'name' => 'pagination_arrows',
    'type' => 'text',
    'default_value' => 'true',
    'required' => 1,
];


// 28. Progress Bar
// ----------------

$progress_height = [
    'key' => 'field_is_foundation_progress_height',
    'label' => 'progress-height',
    'name' => 'progress_height',
    'type' => 'text',
    'default_value' => '1rem',
    'required' => 1,
];

$progress_background = [
    'key' => 'field_is_foundation_progress_background',
    'label' => 'progress-background',
    'name' => 'progress_background',
    'type' => 'text',
    'default_value' => '$medium-gray',
];

$progress_margin_bottom = [
    'key' => 'field_is_foundation_progress_margin_bottom',
    'label' => 'progress-margin-bottom',
    'name' => 'progress_margin_bottom',
    'type' => 'text',
    'default_value' => '$global-margin',
];

$progress_meter_background = [
    'key' => 'field_is_foundation_progress_meter_background',
    'label' => 'progress-meter-background',
    'name' => 'progress_meter_background',
    'type' => 'text',
    'default_value' => '$primary-color',
];

$progress_radius = [
    'key' => 'field_is_foundation_progress_radius',
    'label' => 'progress-radius',
    'name' => 'progress_radius',
    'type' => 'text',
    'default_value' => '$global-radius',
];


// 46. Responsive Embed
// --------------------

$responsive_embed_margin_bottom = [
    'key' => 'field_is_foundation_responsive_embed_margin_bottom',
    'label' => 'responsive Embed Margin Bottom',
    'name' => 'responsive_embed_margin_bottom',
    'type' => 'text',
    'default_value' => 'rem_calc(16)',
    'required' => 1
];
$responsive_embed_ratios_default = [
    'key' => 'field_is_foundation_responsive_embed_ratios_default',
    'label' => 'responsive Embed Ratios Default',
    'name' => 'responsive_embed_ratios_default',
    'type' => 'text',
    'default_value' => '4 by 3',
    'required' => 1
];
$responsive_embed_ratios_widescreen = [
    'key' => 'field_is_foundation_responsive_embed_ratios_widescreen',
    'label' => 'responsive Embed Ratios Widescreen',
    'name' => 'responsive_embed_ratios_widescreen',
    'type' => 'text',
    'default_value' => '16 by 9',
    'required' => 1
];


// 47. Reveal
// ----------

$reveal_background = [
    'key' => 'field_is_foundation_reveal_background',
    'label' => 'reveal-background',
    'name' => 'reveal_background',
    'type' => 'text',
    'default_value' => '$white',
];

$reveal_width = [
    'key' => 'field_is_foundation_reveal_width',
    'label' => 'reveal-width',
    'name' => 'reveal_width',
    'type' => 'text',
    'default_value' => '600px',
    'required' => 1,
];

$reveal_max_width = [
    'key' => 'field_is_foundation_reveal_max_width',
    'label' => 'reveal-max-width',
    'name' => 'reveal_max_width',
    'type' => 'text',
    'default_value' => '$global-width',
];

$reveal_padding = [
    'key' => 'field_is_foundation_reveal_padding',
    'label' => 'reveal-padding',
    'name' => 'reveal_padding',
    'type' => 'text',
    'default_value' => '$global-padding',
];

$reveal_border = [
    'key' => 'field_is_foundation_reveal_border',
    'label' => 'reveal-border',
    'name' => 'reveal_border',
    'type' => 'text',
    'default_value' => '1px solid $medium-gray',
    'required' => 1,
];

$reveal_radius = [
    'key' => 'field_is_foundation_reveal_radius',
    'label' => 'reveal-radius',
    'name' => 'reveal_radius',
    'type' => 'text',
    'default_value' => '$global-radius',
];

$reveal_zindex = [
    'key' => 'field_is_foundation_reveal_zindex',
    'label' => 'reveal-zindex',
    'name' => 'reveal_zindex',
    'type' => 'text',
    'default_value' => '1005',
    'required' => 1,
];

$reveal_overlay_background = [
    'key' => 'field_is_foundation_reveal_overlay_background',
    'label' => 'reveal-overlay-background',
    'name' => 'reveal_overlay_background',
    'type' => 'text',
    'default_value' => 'rgba($black, 0.45)',
    'required' => 1,
];


// 48. Slider
// ----------

$slider_width_vertical = [
    'key' => 'field_is_foundation_slider_width_vertical',
    'label' => 'slider-width-vertical',
    'name' => 'slider_width_vertical',
    'type' => 'text',
    'default_value' => '0.5rem',
    'required' => 1,
];

$slider_transition = [
    'key' => 'field_is_foundation_slider_transition',
    'label' => 'slider-transition',
    'name' => 'slider_transition',
    'type' => 'text',
    'default_value' => 'all 0.2s ease-in-out',
    'required' => 1,
];

$slider_height = [
    'key' => 'field_is_foundation_slider_height',
    'label' => 'slider-height',
    'name' => 'slider_height',
    'type' => 'text',
    'default_value' => '0.5rem',
    'required' => 1,
];

$slider_background = [
    'key' => 'field_is_foundation_slider_background',
    'label' => 'slider-background',
    'name' => 'slider_background',
    'type' => 'text',
    'default_value' => '$light-gray',
];

$slider_fill_background = [
    'key' => 'field_is_foundation_slider_fill_background',
    'label' => 'slider-fill-background',
    'name' => 'slider_fill_background',
    'type' => 'text',
    'default_value' => '$medium-gray',
];

$slider_handle_height = [
    'key' => 'field_is_foundation_slider_handle_height',
    'label' => 'slider-handle-height',
    'name' => 'slider_handle_height',
    'type' => 'text',
    'default_value' => '1.4rem',
    'required' => 1,
];

$slider_handle_width = [
    'key' => 'field_is_foundation_slider_handle_width',
    'label' => 'slider-handle-width',
    'name' => 'slider_handle_width',
    'type' => 'text',
    'default_value' => '1.4rem',
    'required' => 1,
];

$slider_handle_background = [
    'key' => 'field_is_foundation_slider_handle_background',
    'label' => 'slider-handle-background',
    'name' => 'slider_handle_background',
    'type' => 'text',
    'default_value' => '$primary-color',
];

$slider_opacity_disabled = [
    'key' => 'field_is_foundation_slider_opacity_disabled',
    'label' => 'slider-opacity-disabled',
    'name' => 'slider_opacity_disabled',
    'type' => 'text',
    'default_value' => '0.25',
    'required' => 1,
];

$slider_radius = [
    'key' => 'field_is_foundation_slider_radius',
    'label' => 'slider-radius',
    'name' => 'slider_radius',
    'type' => 'text',
    'default_value' => '$global-radius',
];


// 49. Switch
// ----------

$switch_background = [
    'key' => 'field_is_foundation_switch_background',
    'label' => 'switch-background',
    'name' => 'switch_background',
    'type' => 'text',
    'default_value' => '$medium-gray',
];

$switch_background_active = [
    'key' => 'field_is_foundation_switch_background_active',
    'label' => 'switch-background-active',
    'name' => 'switch_background_active',
    'type' => 'text',
    'default_value' => '$primary-color',
];

$switch_height = [
    'key' => 'field_is_foundation_switch_height',
    'label' => 'switch-height',
    'name' => 'switch_height',
    'type' => 'text',
    'default_value' => '2rem',
    'required' => 1,
];

$switch_height_tiny = [
    'key' => 'field_is_foundation_switch_height_tiny',
    'label' => 'switch-height-tiny',
    'name' => 'switch_height_tiny',
    'type' => 'text',
    'default_value' => '1.5rem',
    'required' => 1,
];

$switch_height_small = [
    'key' => 'field_is_foundation_switch_height_small',
    'label' => 'switch-height-small',
    'name' => 'switch_height_small',
    'type' => 'text',
    'default_value' => '1.75rem',
    'required' => 1,
];

$switch_height_large = [
    'key' => 'field_is_foundation_switch_height_large',
    'label' => 'switch-height-large',
    'name' => 'switch_height_large',
    'type' => 'text',
    'default_value' => '2.5rem',
    'required' => 1,
];

$switch_radius = [
    'key' => 'field_is_foundation_switch_radius',
    'label' => 'switch-radius',
    'name' => 'switch_radius',
    'type' => 'text',
    'default_value' => '$global-radius',
];

$switch_margin = [
    'key' => 'field_is_foundation_switch_margin',
    'label' => 'switch-margin',
    'name' => 'switch_margin',
    'type' => 'text',
    'default_value' => '$global-margin',
];

$switch_paddle_background = [
    'key' => 'field_is_foundation_switch_paddle_background',
    'label' => 'switch-paddle-background',
    'name' => 'switch_paddle_background',
    'type' => 'text',
    'default_value' => '$white',
];

$switch_paddle_offset = [
    'key' => 'field_is_foundation_switch_paddle_offset',
    'label' => 'switch-paddle-offset',
    'name' => 'switch_paddle_offset',
    'type' => 'text',
    'default_value' => '0.25rem',
    'required' => 1,
];

$switch_paddle_radius = [
    'key' => 'field_is_foundation_switch_paddle_radius',
    'label' => 'switch-paddle-radius',
    'name' => 'switch_paddle_radius',
    'type' => 'text',
    'default_value' => '$global-radius',
];

$switch_paddle_transition = [
    'key' => 'field_is_foundation_switch_paddle_transition',
    'label' => 'switch-paddle-transition',
    'name' => 'switch_paddle_transition',
    'type' => 'text',
    'default_value' => 'all 0.25s ease-out',
    'required' => 1,
];


// 50. Table
// ---------

$table_background = [
    'key' => 'field_is_foundation_table_background',
    'label' => 'table-background',
    'name' => 'table_background',
    'type' => 'text',
    'default_value' => '$white',
];

$table_color_scale = [
    'key' => 'field_is_foundation_table_color_scale',
    'label' => 'table-color-scale',
    'name' => 'table_color_scale',
    'type' => 'text',
    'default_value' => '5%',
    'required' => 1,
];

$table_border = [
    'key' => 'field_is_foundation_table_border',
    'label' => 'table-border',
    'name' => 'table_border',
    'type' => 'text',
    'default_value' => '1px solid smart-scale(0,0,0, $table-color-scale)',
    'required' => 1,
];

$table_padding = [
    'key' => 'field_is_foundation_table_padding',
    'label' => 'table-padding',
    'name' => 'table_padding',
    'type' => 'text',
    'default_value' => 'rem-calc(8 10 10)',
    'required' => 1,
];

$table_hover_scale = [
    'key' => 'field_is_foundation_table_hover_scale',
    'label' => 'table-hover-scale',
    'name' => 'table_hover_scale',
    'type' => 'text',
    'default_value' => '2%',
    'required' => 1,
];

$table_row_hover = [
    'key' => 'field_is_foundation_table_row_hover',
    'label' => 'table-row-hover',
    'name' => 'table_row_hover',
    'type' => 'text',
    'default_value' => 'darken($black, $table-hover-scale)',
    'required' => 1,
];

$table_row_stripe_hover = [
    'key' => 'field_is_foundation_table_row_stripe_hover',
    'label' => 'table-row-stripe-hover',
    'name' => 'table_row_stripe_hover',
    'type' => 'text',
    'default_value' => 'darken($black, $table-color-scale + $table-hover-scale)',
    'required' => 1,
];

$table_is_striped = [
    'key' => 'field_is_foundation_table_is_striped',
    'label' => 'table-is-striped',
    'name' => 'table_is_striped',
    'type' => 'text',
    'default_value' => 'true',
    'required' => 1,
];

$table_striped_background = [
    'key' => 'field_is_foundation_table_striped_background',
    'label' => 'table-striped-background',
    'name' => 'table_striped_background',
    'type' => 'text',
    'default_value' => 'smart-scale(0,0,0, $table-color-scale)',
    'required' => 1,
];

$table_stripe = [
    'key' => 'field_is_foundation_table_stripe',
    'label' => 'table-stripe',
    'name' => 'table_stripe',
    'type' => 'text',
    'default_value' => 'even',
    'required' => 1,
];

$table_head_background = [
    'key' => 'field_is_foundation_table_head_background',
    'label' => 'table-head-background',
    'name' => 'table_head_background',
    'type' => 'text',
    'default_value' => 'smart-scale(0,0,0, $table-color-scale / 2)',
    'required' => 1,
];

$table_head_row_hover = [
    'key' => 'field_is_foundation_table_head_row_hover',
    'label' => 'table-head-row-hover',
    'name' => 'table_head_row_hover',
    'type' => 'text',
    'default_value' => 'darken($table-head-background, $table-hover-scale)',
    'required' => 1,
];

$table_foot_background = [
    'key' => 'field_is_foundation_table_foot_background',
    'label' => 'table-foot-background',
    'name' => 'table_foot_background',
    'type' => 'text',
    'default_value' => 'smart-scale(0,0,0, $table-color-scale)',
    'required' => 1,
];

$table_foot_row_hover = [
    'key' => 'field_is_foundation_table_foot_row_hover',
    'label' => 'table-foot-row-hover',
    'name' => 'table_foot_row_hover',
    'type' => 'text',
    'default_value' => 'darken($table-foot-background, $table-hover-scale)',
    'required' => 1,
];

$table_head_font_color = [
    'key' => 'field_is_foundation_table_head_font_color',
    'label' => 'table-head-font-color',
    'name' => 'table_head_font_color',
    'type' => 'text',
    'default_value' => '$body-font-color',
];

$table_foot_font_color = [
    'key' => 'field_is_foundation_table_foot_font_color',
    'label' => 'table-foot-font-color',
    'name' => 'table_foot_font_color',
    'type' => 'text',
    'default_value' => '$body-font-color',
];

$show_header_for_stacked = [
    'key' => 'field_is_foundation_show_header_for_stacked',
    'label' => 'show-header-for-stacked',
    'name' => 'show_header_for_stacked',
    'type' => 'text',
    'default_value' => 'false',
    'required' => 1,
];

$table_stack_breakpoint = [
    'key' => 'field_is_foundation_table_stack_breakpoint',
    'label' => 'table-stack-breakpoint',
    'name' => 'table_stack_breakpoint',
    'type' => 'text',
    'default_value' => 'medium',
    'required' => 1,
];


// 51. Tabs
// --------

$tab_margin = [
    'key' => 'field_is_foundation_tab_margin',
    'label' => 'tab-margin',
    'name' => 'tab_margin',
    'type' => 'text',
    'default_value' => '0',
    'required' => 1,
];

$tab_background = [
    'key' => 'field_is_foundation_tab_background',
    'label' => 'tab-background',
    'name' => 'tab_background',
    'type' => 'text',
    'default_value' => '$white',
];

$tab_color = [
    'key' => 'field_is_foundation_tab_color',
    'label' => 'tab-color',
    'name' => 'tab_color',
    'type' => 'text',
    'default_value' => '$primary-color',
];

$tab_background_active = [
    'key' => 'field_is_foundation_tab_background_active',
    'label' => 'tab-background-active',
    'name' => 'tab_background_active',
    'type' => 'text',
    'default_value' => '$light-gray',
];

$tab_active_color = [
    'key' => 'field_is_foundation_tab_active_color',
    'label' => 'tab-active-color',
    'name' => 'tab_active_color',
    'type' => 'text',
    'default_value' => '$primary-color',
];

$tab_item_font_size = [
    'key' => 'field_is_foundation_tab_item_font_size',
    'label' => 'tab-item-font-size',
    'name' => 'tab_item_font_size',
    'type' => 'text',
    'default_value' => 'rem-calc(12)',
    'required' => 1,
];

$tab_item_background_hover = [
    'key' => 'field_is_foundation_tab_item_background_hover',
    'label' => 'tab-item-background-hover',
    'name' => 'tab_item_background_hover',
    'type' => 'text',
    'default_value' => '$white',
];

$tab_item_padding = [
    'key' => 'field_is_foundation_tab_item_padding',
    'label' => 'tab-item-padding',
    'name' => 'tab_item_padding',
    'type' => 'text',
    'default_value' => '1.25rem 1.5rem',
    'required' => 1,
];

$tab_expand_max = [
    'key' => 'field_is_foundation_tab_expand_max',
    'label' => 'tab-expand-max',
    'name' => 'tab_expand_max',
    'type' => 'text',
    'default_value' => '6',
    'required' => 1,
];

$tab_content_background = [
    'key' => 'field_is_foundation_tab_content_background',
    'label' => 'tab-content-background',
    'name' => 'tab_content_background',
    'type' => 'text',
    'default_value' => '$white',
];

$tab_content_border = [
    'key' => 'field_is_foundation_tab_content_border',
    'label' => 'tab-content-border',
    'name' => 'tab_content_border',
    'type' => 'text',
    'default_value' => '$light-gray',
];

$tab_content_color = [
    'key' => 'field_is_foundation_tab_content_color',
    'label' => 'tab-content-color',
    'name' => 'tab_content_color',
    'type' => 'text',
    'default_value' => '$body-font-color',
];

$tab_content_padding = [
    'key' => 'field_is_foundation_tab_content_padding',
    'label' => 'tab-content-padding',
    'name' => 'tab_content_padding',
    'type' => 'text',
    'default_value' => '1rem',
    'required' => 1,
];


// 52. Thumbnail
// -------------

$thumbnail_border = [
    'key' => 'field_is_foundation_thumbnail_border',
    'label' => 'thumbnail-border',
    'name' => 'thumbnail_border',
    'type' => 'text',
    'default_value' => 'solid 4px $white',
    'required' => 1,
];

$thumbnail_margin_bottom = [
    'key' => 'field_is_foundation_thumbnail_margin_bottom',
    'label' => 'thumbnail-margin-bottom',
    'name' => 'thumbnail_margin_bottom',
    'type' => 'text',
    'default_value' => '$global-margin',
];

$thumbnail_shadow = [
    'key' => 'field_is_foundation_thumbnail_shadow',
    'label' => 'thumbnail-shadow',
    'name' => 'thumbnail_shadow',
    'type' => 'text',
    'default_value' => '0 0 0 1px rgba($black, 0.2)',
    'required' => 1,
];

$thumbnail_shadow_hover = [
    'key' => 'field_is_foundation_thumbnail_shadow_hover',
    'label' => 'thumbnail-shadow-hover',
    'name' => 'thumbnail_shadow_hover',
    'type' => 'text',
    'default_value' => '0 0 6px 1px rgba($primary-color, 0.5)',
    'required' => 1,
];

$thumbnail_transition = [
    'key' => 'field_is_foundation_thumbnail_transition',
    'label' => 'thumbnail-transition',
    'name' => 'thumbnail_transition',
    'type' => 'text',
    'default_value' => 'box-shadow 200ms ease-out',
    'required' => 1,
];

$thumbnail_radius = [
    'key' => 'field_is_foundation_thumbnail_radius',
    'label' => 'thumbnail-radius',
    'name' => 'thumbnail_radius',
    'type' => 'text',
    'default_value' => '$global-radius',
];


// 53. Title Bar
// -------------

$titlebar_background = [
    'key' => 'field_is_foundation_titlebar_background',
    'label' => 'titlebar-background',
    'name' => 'titlebar_background',
    'type' => 'text',
    'default_value' => '$black',
];

$titlebar_color = [
    'key' => 'field_is_foundation_titlebar_color',
    'label' => 'titlebar-color',
    'name' => 'titlebar_color',
    'type' => 'text',
    'default_value' => '$white',
];

$titlebar_padding = [
    'key' => 'field_is_foundation_titlebar_padding',
    'label' => 'titlebar-padding',
    'name' => 'titlebar_padding',
    'type' => 'text',
    'default_value' => '0.5rem',
    'required' => 1,
];

$titlebar_text_font_weight = [
    'key' => 'field_is_foundation_titlebar_text_font_weight',
    'label' => 'titlebar-text-font-weight',
    'name' => 'titlebar_text_font_weight',
    'type' => 'text',
    'default_value' => 'bold',
    'required' => 1,
];

$titlebar_icon_color = [
    'key' => 'field_is_foundation_titlebar_icon_color',
    'label' => 'titlebar-icon-color',
    'name' => 'titlebar_icon_color',
    'type' => 'text',
    'default_value' => '$white',
];

$titlebar_icon_color_hover = [
    'key' => 'field_is_foundation_titlebar_icon_color_hover',
    'label' => 'titlebar-icon-color-hover',
    'name' => 'titlebar_icon_color_hover',
    'type' => 'text',
    'default_value' => '$medium-gray',
];

$titlebar_icon_spacing = [
    'key' => 'field_is_foundation_titlebar_icon_spacing',
    'label' => 'titlebar-icon-spacing',
    'name' => 'titlebar_icon_spacing',
    'type' => 'text',
    'default_value' => '0.25rem',
    'required' => 1,
];


// 54. Tooltip
// -----------

$has_tip_cursor = [
    'key' => 'field_is_foundation_has_tip_cursor',
    'label' => 'has-tip-cursor',
    'name' => 'has_tip_cursor',
    'type' => 'text',
    'default_value' => 'help',
    'required' => 1,
];

$has_tip_font_weight = [
    'key' => 'field_is_foundation_has_tip_font_weight',
    'label' => 'has-tip-font-weight',
    'name' => 'has_tip_font_weight',
    'type' => 'text',
    'default_value' => '$global-weight-bold',
];

$has_tip_border_bottom = [
    'key' => 'field_is_foundation_has_tip_border_bottom',
    'label' => 'has-tip-border-bottom',
    'name' => 'has_tip_border_bottom',
    'type' => 'text',
    'default_value' => 'dotted 1px $dark-gray',
    'required' => 1,
];

$tooltip_background_color = [
    'key' => 'field_is_foundation_tooltip_background_color',
    'label' => 'tooltip-background-color',
    'name' => 'tooltip_background_color',
    'type' => 'text',
    'default_value' => '$black',
];

$tooltip_color = [
    'key' => 'field_is_foundation_tooltip_color',
    'label' => 'tooltip-color',
    'name' => 'tooltip_color',
    'type' => 'text',
    'default_value' => '$white',
];

$tooltip_padding = [
    'key' => 'field_is_foundation_tooltip_padding',
    'label' => 'tooltip-padding',
    'name' => 'tooltip_padding',
    'type' => 'text',
    'default_value' => '0.75rem',
    'required' => 1,
];

$tooltip_max_width = [
    'key' => 'field_is_foundation_tooltip_max_width',
    'label' => 'tooltip-max-width',
    'name' => 'tooltip_max_width',
    'type' => 'text',
    'default_value' => '10rem',
    'required' => 1,
];

$tooltip_font_size = [
    'key' => 'field_is_foundation_tooltip_font_size',
    'label' => 'tooltip-font-size',
    'name' => 'tooltip_font_size',
    'type' => 'text',
    'default_value' => '$small-font-size',
];

$tooltip_pip_width = [
    'key' => 'field_is_foundation_tooltip_pip_width',
    'label' => 'tooltip-pip-width',
    'name' => 'tooltip_pip_width',
    'type' => 'text',
    'default_value' => '0.75rem',
    'required' => 1,
];

$tooltip_pip_height = [
    'key' => 'field_is_foundation_tooltip_pip_height',
    'label' => 'tooltip-pip-height',
    'name' => 'tooltip_pip_height',
    'type' => 'text',
    'default_value' => '$tooltip-pip-width * 0.866',
    'required' => 1,
];

$tooltip_radius = [
    'key' => 'field_is_foundation_tooltip_radius',
    'label' => 'tooltip-radius',
    'name' => 'tooltip_radius',
    'type' => 'text',
    'default_value' => '$global-radius',
];


// 55. Top Bar
// -----------

$topbar_padding = [
    'key' => 'field_is_foundation_topbar_padding',
    'label' => 'topbar-padding',
    'name' => 'topbar_padding',
    'type' => 'text',
    'default_value' => '0.5rem',
    'required' => 1,
];

$topbar_background = [
    'key' => 'field_is_foundation_topbar_background',
    'label' => 'topbar-background',
    'name' => 'topbar_background',
    'type' => 'text',
    'default_value' => '$light-gray',
];

$topbar_submenu_background = [
    'key' => 'field_is_foundation_topbar_submenu_background',
    'label' => 'topbar-submenu-background',
    'name' => 'topbar_submenu_background',
    'type' => 'text',
    'default_value' => '$topbar-background',
];

$topbar_title_spacing = [
    'key' => 'field_is_foundation_topbar_title_spacing',
    'label' => 'topbar-title-spacing',
    'name' => 'topbar_title_spacing',
    'type' => 'text',
    'default_value' => '0.5rem 1rem 0.5rem 0',
    'required' => 1,
];

$topbar_input_width = [
    'key' => 'field_is_foundation_topbar_input_width',
    'label' => 'topbar-input-width',
    'name' => 'topbar_input_width',
    'type' => 'text',
    'default_value' => '200px',
    'required' => 1,
];

$topbar_unstack_breakpoint = [
    'key' => 'field_is_foundation_topbar_unstack_breakpoint',
    'label' => 'topbar-unstack-breakpoint',
    'name' => 'topbar_unstack_breakpoint',
    'type' => 'text',
    'default_value' => 'medium',
    'required' => 1,
];


// 56. Xy Grid
// -----------

$xy_grid = [
    'key' => 'field_is_foundation_xy_grid',
    'label' => 'xy-grid',
    'name' => 'xy_grid',
    'type' => 'text',
    'default_value' => 'true',
    'required' => 1,
];

$grid_container = [
    'key' => 'field_is_foundation_grid_container',
    'label' => 'grid-container',
    'name' => 'grid_container',
    'type' => 'text',
    'default_value' => '$global-width',
];

$grid_columns = [
    'key' => 'field_is_foundation_grid_columns',
    'label' => 'grid-columns',
    'name' => 'grid_columns',
    'type' => 'text',
    'default_value' => '12',
    'required' => 1,
];

$grid_margin_gutters_small = [
    'key' => 'field_is_foundation_grid_margin_gutters_small',
    'label' => 'grid-margin-gutters-small',
    'name' => 'grid_margin_gutters_small',
    'type' => 'text',
    'default_value' => '20px',
    'required' => 1,
];

$grid_margin_gutters_medium = [
    'key' => 'field_is_foundation_grid_margin_gutters_medium',
    'label' => 'grid-margin-gutters-medium',
    'name' => 'grid_margin_gutters_medium',
    'type' => 'text',
    'default_value' => '30px',
    'required' => 1,
];


$grid_padding_gutters = [
    'key' => 'field_is_foundation_grid_padding_gutters',
    'label' => 'grid-padding-gutters',
    'name' => 'grid_padding_gutters',
    'type' => 'text',
    'default_value' => '$grid-margin-gutters',
];

$grid_container_padding = [
    'key' => 'field_is_foundation_grid_container_padding',
    'label' => 'grid-container-padding',
    'name' => 'grid_container_padding',
    'type' => 'text',
    'default_value' => '$grid-padding-gutters',
];

$grid_container_max = [
    'key' => 'field_is_foundation_grid_container_max',
    'label' => 'grid-container-max',
    'name' => 'grid_container_max',
    'type' => 'text',
    'default_value' => '$global-width',
];

$xy_block_grid_max = [
    'key' => 'field_is_foundation_xy_block_grid_max',
    'label' => 'xy-block-grid-max',
    'name' => 'xy_block_grid_max',
    'type' => 'text',
    'default_value' => '8',
    'required' => 1,
];

$foundation_global_options_fields = [
    TSD_Infinisite\ACF::get_tab('field_5a32a729b5ec0', 'Global Options'),
    // $foundation_color_option_primary,
    // $foundation_color_option_secondary,
    // $foundation_color_option_success,
    // $foundation_color_option_warning,
    // $foundation_color_option_alert,
    // $foundation_color_option_white,
    // $foundation_color_option_light_gray,
    // $foundation_color_option_medium_gray,
    // $foundation_color_option_dark_gray,
    // $foundation_color_option_black,
    $global_options_message,
    $body_font_family,
    $global_width,
    $global_lineheight,
    $global_margin,
    $global_padding,
    $global_position,
    $global_weight_normal,
    $global_weight_bold,
    $global_radius,
    $global_menu_padding,
    $global_menu_nested_margin,
    $global_text_direction,
    $global_flexbox,
    $global_prototype_breakpoints,
    $global_button_cursor,
    $global_color_pick_contrast_tolerance,
    $print_transparent_backgrounds,
    $body_background,
    $global_font_size,
    $body_font_color,
    $body_antialiased,
    TSD_Infinisite\ACF::get_tab('field_5a32a729b5efb', 'Breakpoints'),
    $small_breakpoint_message,
    $medium_breakpoint,
    $large_breakpoint,
    $xlarge_breakpoint,
    $xxlarge_breakpoint,
    $print_breakpoint,
//    $breakpoint_classes,
    TSD_Infinisite\ACF::get_tab('field_5a32a729b5f34', 'Row Width'),
    $grid_section_message,
    $grid_row_width,
    $grid_column_count,
    $grid_column_gutter_size_message,
    $grid_column_gutter_small,
    $grid_column_gutter_medium,
    $grid_column_align_edge,
    $grid_column_alias,
    $block_grid_max,
    TSD_Infinisite\ACF::get_tab('field_5a32a729b5f71', 'Header Styling'),
    $header_section_message,
    $header_font_family,
    $header_font_weight,
    $font_family_monospace,
    $header_font_style,
    $header_color,
    $header_lineheight,
    $header_margin_bottom,
    $small_font_size,
    $header_section_sizes_message,
    $header_styles_small_h1,
    $header_styles_small_h2,
    $header_styles_small_h3,
    $header_styles_small_h4,
    $header_styles_small_h5,
    $header_styles_small_h6,
    $header_styles_medium_h1,
    $header_styles_medium_h2,
    $header_styles_medium_h3,
    $header_styles_medium_h4,
    $header_styles_medium_h5,
    $header_styles_medium_h6,
    $header_section_other_stuff_message,
    $paragraph_text_rendering,
    $header_text_rendering,
    $header_small_font_color,
    $paragraph_lineheight,
    $paragraph_margin_bottom,
    TSD_Infinisite\ACF::get_tab('field_5a32a729b5fb1', 'Code Block'),
    $code_color,
    $code_font_family,
    $code_font_weight,
    $code_background,
    $code_border,
    $code_padding,
    TSD_Infinisite\ACF::get_tab('field_5a32a729b5fef', 'Misc Font Settings'),
    $anchor_color,
    $anchor_color_hover,
    $anchor_text_decoration,
    $anchor_text_decoration_hover,
    $hr_width,
    $hr_border,
    $hr_margin,
    $list_lineheight,
    $list_margin_bottom,
    $list_style_type,
    $list_style_position,
    $list_side_margin,
    $list_nested_side_margin,
    $defnlist_margin_bottom,
    $defnlist_term_weight,
    $defnlist_term_margin_bottom,
    $blockquote_color,
    $blockquote_padding,
    $blockquote_border,
    $cite_font_size,
    $cite_color,
    $cite_pseudo_content,
    $keystroke_font,
    $keystroke_color,
    $keystroke_background,
    $keystroke_padding,
    $keystroke_radius,
    $abbr_underline,
    $lead_font_size,
    $lead_lineheight,
    TSD_Infinisite\ACF::get_tab('field_5a32a729b602a', 'Subheader'),
    $subheader_lineheight,
    $subheader_color,
    $subheader_font_weight,
    $subheader_margin_top,
    $subheader_margin_bottom,
    $stat_font_size,
    TSD_Infinisite\ACF::get_tab('field_5a32a729b6064', 'Abide (Validation)'),
    $abide_inputs,
    $abide_labels,
    $input_background_invalid,
    $form_label_color_invalid,
    $input_error_color,
    $input_error_font_size,
    $input_error_font_weight,
    TSD_Infinisite\ACF::get_tab('field_5a32a729b609d', 'Accordion'),
    $accordion_background,
    $accordion_plusminus,
    $accordion_title_font_size,
    $accordion_item_color,
    $accordion_item_background_hover,
    $accordion_item_padding,
    $accordion_content_background,
    $accordion_content_border,
    $accordion_content_color,
    $accordion_content_padding,
    $accordionmenu_padding,
    $accordionmenu_nested_margin,
    $accordionmenu_submenu_padding,
    $accordionmenu_arrows,
    $accordionmenu_arrow_color,
    $accordionmenu_item_background,
    $accordionmenu_border,
    $accordionmenu_submenu_toggle_background,
    $accordion_submenu_toggle_border,
    $accordionmenu_submenu_toggle_width,
    $accordionmenu_submenu_toggle_height,
    $accordionmenu_arrow_size,
    TSD_Infinisite\ACF::get_tab('field_5a32a729b60d7', 'Badges'),
    $badge_background,
    $badge_color,
    $badge_color_alt,
    // $badge_palette,
    $badge_padding,
    $badge_minwidth,
    $badge_font_size,
    TSD_Infinisite\ACF::get_tab('field_5a32a729b6111', 'Breadcrumbs'),
    $breadcrumbs_margin,
    $breadcrumbs_item_font_size,
    $breadcrumbs_item_color,
    $breadcrumbs_item_color_current,
    $breadcrumbs_item_color_disabled,
    $breadcrumbs_item_margin,
    $breadcrumbs_item_uppercase,
    $breadcrumbs_item_separator,
    $breadcrumbs_item_separator_item,
    $breadcrumbs_item_separator_item_rtl,
    $breadcrumbs_item_separator_color,
    TSD_Infinisite\ACF::get_tab('field_5a32a729b614d', 'Buttons'),
    $button_font_family,
    $button_padding,
    $button_margin,
    $button_fill,
    $button_background,
    $button_background_hover,
    $button_color,
    $button_color_alt,
    $button_radius,
    $button_hollow_border_width,
    $button_sizes_tiny,
    $button_sizes_small,
    $button_sizes_default,
    $button_sizes_large,
    $button_opacity_disabled,
    $button_background_hover_lightness,
    $button_hollow_hover_lightness,
    $button_transition,
    $buttongroup_margin,
    $buttongroup_spacing,
    $buttongroup_child_selector,
    $buttongroup_expand_max,
    $buttongroup_radius_on_each,
    TSD_Infinisite\ACF::get_tab('field_5a32a729b6188', 'Callouts'),
    $callout_background,
    $callout_background_fade,
    $callout_border,
    $callout_margin,
    $callout_padding,
    $callout_font_color,
    $callout_font_color_alt,
    $callout_radius,
    $callout_link_tint,
    TSD_Infinisite\ACF::get_tab('field_5a32a729b61f6', 'Cards'),
    $card_section_message,
    $card_background,
    $card_font_color,
    $card_divider_background,
    $card_border,
    $card_shadow,
    $card_border_radius,
    $card_padding,
    $card_margin_bottom,
    TSD_Infinisite\ACF::get_tab('field_5a32a729b6232', 'Close Button'),
    $closebutton_position,
    $closebutton_offset_horizontal_small,
    $closebutton_offset_horizontal_medium,
    $closebutton_offset_vertical_small,
    $closebutton_offset_vertical_medium,
    $closebutton_size_small,
    $closebutton_size_medium,
    $closebutton_lineheight,
    $closebutton_color,
    $closebutton_color_hover,
    TSD_Infinisite\ACF::get_tab('field_5a32a729b6270', 'Drilldown Menu'),
    $drilldown_transition,
    $drilldown_arrows,
    $drilldown_padding,
    $drilldown_nested_margin,
    $drilldown_background,
    $drilldown_submenu_padding,
    $drilldown_submenu_background,
    $drilldown_arrow_color,
    $drilldown_arrow_size,
    TSD_Infinisite\ACF::get_tab('field_5a32a729b62ac', 'Dropdown Menu'),
    $dropdown_padding,
    $dropdown_background,
    $dropdown_border,
    $dropdown_font_size,
    $dropdown_width,
    $dropdown_radius,
    $dropdown_sizes_tiny,
    $dropdown_sizes_small,
    $dropdown_sizes_large,
    $dropdownmenu_arrows,
    $dropdownmenu_arrow_color,
    $dropdownmenu_arrow_size,
    $dropdownmenu_arrow_padding,
    $dropdownmenu_min_width,
    $dropdownmenu_background,
    $dropdownmenu_submenu_background,
    $dropdownmenu_padding,
    $dropdownmenu_nested_margin,
    $dropdownmenu_submenu_padding,
    $dropdownmenu_border,
    $dropdown_menu_item_color_active,
    $dropdown_menu_item_background_active,
    TSD_Infinisite\ACF::get_tab('field_5a32a729b62ec', 'Flex'),
    $flex_source_ordering_count,
    $flexbox_responsive_breakpoints,
    TSD_Infinisite\ACF::get_tab('field_5a32a729b6324', 'Fieldset'),
    $fieldset_border,
    $fieldset_padding,
    $fieldset_margin,
    $legend_padding,
    TSD_Infinisite\ACF::get_tab('field_5a32a729b635c', 'Form'),
    $form_spacing,
    $helptext_color,
    $helptext_font_size,
    $helptext_font_style,
    $input_prefix_color,
    $input_prefix_background,
    $input_prefix_border,
    $input_prefix_padding,
    $form_label_color,
    $form_label_font_size,
    $form_label_font_weight,
    $form_label_line_height,
    $select_background,
    $select_triangle_color,
    $select_radius,
    $input_color,
    $input_placeholder_color,
    $input_font_family,
    $input_font_size,
    $input_font_weight,
    $input_line_height,
    $input_background,
    $input_background_focus,
    $input_background_disabled,
    $input_border,
    $input_border_focus,
    $input_padding,
    $input_shadow,
    $input_shadow_focus,
    $input_cursor_disabled,
    $input_transition,
    $input_number_spinners,
    $input_radius,
    $form_button_radius,
    $label_background,
    $label_color,
    $label_color_alt,
    $label_font_size,
    $label_padding,
    $label_radius,
    TSD_Infinisite\ACF::get_tab('field_5a32a729b639a', 'Media Object'),
    $mediaobject_margin_bottom,
    $mediaobject_section_padding,
    $mediaobject_image_width_stacked,
    TSD_Infinisite\ACF::get_tab('field_5a32a729b63d5', 'Menu'),
    $menu_margin,
    $menu_nested_margin,
    $menu_items_padding,
    $menu_simple_margin,
    $menu_item_color_active,
    $menu_item_background_active,
    $menu_icon_spacing,
    $menu_item_background_hover,
    $menu_state_back_compat,
    $menu_centered_back_compat,
    $menu_icons_back_compat,

// 24. Meter
// _________

    TSD_Infinisite\ACF::get_tab('field_5a32a729b640e', 'Meter'),
    $meter_height,
    $meter_radius,
    $meter_background,
    $meter_fill_good,
    $meter_fill_medium,
    $meter_fill_bad,

    // 25. Off_canvas
    // ______________
    TSD_Infinisite\ACF::get_tab('field_5a32a729b6445', 'Off Canvas'),
    $offcanvas_sizes_small,
    $offcanvas_vertical_sizes_small,
    $offcanvas_background,
    $offcanvas_shadow,
    $offcanvas_inner_shadow_size,
    $offcanvas_inner_shadow_color,
    $offcanvas_overlay_zindex,
    $offcanvas_push_zindex,
    $offcanvas_overlap_zindex,
    $offcanvas_reveal_zindex,
    $offcanvas_transition_length,
    $offcanvas_transition_timing,
    $offcanvas_fixed_reveal,
    $offcanvas_exit_background,
    $maincontent_class,

// 26. Orbit
// _________

    TSD_Infinisite\ACF::get_tab('field_5a32a729b647d', 'Orbit'),
    $orbit_bullet_background,
    $orbit_bullet_background_active,
    $orbit_bullet_diameter,
    $orbit_bullet_margin,
    $orbit_bullet_margin_top,
    $orbit_bullet_margin_bottom,
    $orbit_caption_background,
    $orbit_caption_padding,
    $orbit_control_background_hover,
    $orbit_control_padding,
    $orbit_control_zindex,

// 27. Pagination
// ______________

    TSD_Infinisite\ACF::get_tab('field_5a32a729b64b5', 'Pagination'),
    $pagination_font_size,
    $pagination_margin_bottom,
    $pagination_item_color,
    $pagination_item_padding,
    $pagination_item_spacing,
    $pagination_radius,
    $pagination_item_background_hover,
    $pagination_item_background_current,
    $pagination_item_color_current,
    $pagination_item_color_disabled,
    $pagination_ellipsis_color,
    $pagination_mobile_items,
    $pagination_mobile_current_item,
    $pagination_arrows,

    // 28. Progress Bar
    // ________________

    TSD_Infinisite\ACF::get_tab('field_5a32a729b64ed', 'Progress Bar'),
    $progress_height,
    $progress_background,
    $progress_margin_bottom,
    $progress_meter_background,
    $progress_radius,

    // 46. Responsive Embed
    // --------------------

    TSD_Infinisite\ACF::get_tab('field_5a32a729b6528', 'Responsive Embed'),
    $responsive_embed_margin_bottom,
    $responsive_embed_ratios_default,
    $responsive_embed_ratios_widescreen,


// 47. Reveal
// __________

    TSD_Infinisite\ACF::get_tab('field_5a32a729b6561', 'Reveal'),
    $reveal_background,
    $reveal_width,
    $reveal_max_width,
    $reveal_padding,
    $reveal_border,
    $reveal_radius,
    $reveal_zindex,
    $reveal_overlay_background,

// 48. Slider
// __________

    TSD_Infinisite\ACF::get_tab('field_5a32a729b659b', 'Slider'),
    $slider_width_vertical,
    $slider_transition,
    $slider_height,
    $slider_background,
    $slider_fill_background,
    $slider_handle_height,
    $slider_handle_width,
    $slider_handle_background,
    $slider_opacity_disabled,
    $slider_radius,

// 49. Switch
// __________

    TSD_Infinisite\ACF::get_tab('field_5a32a729b65d3', 'Switch'),
    $switch_background,
    $switch_background_active,
    $switch_height,
    $switch_height_tiny,
    $switch_height_small,
    $switch_height_large,
    $switch_radius,
    $switch_margin,
    $switch_paddle_background,
    $switch_paddle_offset,
    $switch_paddle_radius,
    $switch_paddle_transition,

// 50. Table
// _________

    TSD_Infinisite\ACF::get_tab('field_5a32a729b660b', 'Table'),
    $table_background,
    $table_color_scale,
    $table_border,
    $table_padding,
    $table_hover_scale,
    $table_row_hover,
    $table_row_stripe_hover,
    $table_is_striped,
    $table_striped_background,
    $table_stripe,
    $table_head_background,
    $table_head_row_hover,
    $table_foot_background,
    $table_foot_row_hover,
    $table_head_font_color,
    $table_foot_font_color,
    $show_header_for_stacked,
    $table_stack_breakpoint,

// 51. Tabs
// ________

    TSD_Infinisite\ACF::get_tab('field_5a32a729b6645', 'Tabs'),
    $tab_margin,
    $tab_background,
    $tab_color,
    $tab_background_active,
    $tab_active_color,
    $tab_item_font_size,
    $tab_item_background_hover,
    $tab_item_padding,
    $tab_expand_max,
    $tab_content_background,
    $tab_content_border,
    $tab_content_color,
    $tab_content_padding,

// 52. Thumbnail
// _____________

    TSD_Infinisite\ACF::get_tab('field_5a32a729b667f', 'Row Width'),
    $thumbnail_border,
    $thumbnail_margin_bottom,
    $thumbnail_shadow,
    $thumbnail_shadow_hover,
    $thumbnail_transition,
    $thumbnail_radius,

// 53. Title Bar
// _____________

    TSD_Infinisite\ACF::get_tab('field_5a32a729b66b7', 'Title Bar'),
    $titlebar_background,
    $titlebar_color,
    $titlebar_padding,
    $titlebar_text_font_weight,
    $titlebar_icon_color,
    $titlebar_icon_color_hover,
    $titlebar_icon_spacing,

// 54. Tooltip
// ___________

    TSD_Infinisite\ACF::get_tab('field_5a32a729b66f2', 'Tooltip'),
    $has_tip_cursor,
    $has_tip_font_weight,
    $has_tip_border_bottom,
    $tooltip_background_color,
    $tooltip_color,
    $tooltip_padding,
    $tooltip_max_width,
    $tooltip_font_size,
    $tooltip_pip_width,
    $tooltip_pip_height,
    $tooltip_radius,

// 55. Top Bar
// ___________

    TSD_Infinisite\ACF::get_tab('field_5a32a729b672b', 'Top Bar'),
    $topbar_padding,
    $topbar_background,
    $topbar_submenu_background,
    $topbar_title_spacing,
    $topbar_input_width,
    $topbar_unstack_breakpoint,

// 56. Xy Grid
// ___________

    TSD_Infinisite\ACF::get_tab('field_5a32a729b6765', 'Xy Grid'),
    $xy_grid,
    $grid_container,
    $grid_columns,
    $grid_margin_gutters_small,
    $grid_margin_gutters_medium,
    $grid_padding_gutters,
    $grid_container_padding,
    $grid_container_max,
    $xy_block_grid_max,

];

