<?php

/**
 * Class TypographyTest
 *
 * @package Tsd_Infinisite
 */
class FoundationTest extends WP_UnitTestCase
{

    public function setUp()
    {
        $this->markTestSkipped('skipped all foundation tests for loading time.');
        parent::setUp();

        $this->acf_fields = TSD_Infinisite\Foundation::get_acf_fields(1);
        // we have to set the acf default values manually for some reason :/
        foreach ($this->acf_fields as $key => $value)
            \update_field($key, $value, 'options');

        $this->helper = new TSD_Infinisite\Foundation($this->acf_fields);


        update_field("field_is_foundation_color_palette_primary","#1f6889","options");
        update_field("field_is_foundation_color_palette_secondary","#4f6ea3","options");
        update_field("field_is_foundation_color_palette_success","#2daf5d","options");
        update_field("field_is_foundation_color_palette_warning","#ddb500","options");
        update_field("field_is_foundation_color_palette_alert","#ff4444","options");
        update_field("field_is_foundation_color_palette_white","#bfe9ff","options");
        update_field("field_is_foundation_color_palette_light_gray","#9ab9ce","options");
        update_field("field_is_foundation_color_palette_medium_gray","#768e9e","options");
        update_field("field_is_foundation_color_palette_dark_gray","#546272","options");
        update_field("field_is_foundation_color_palette_black","#232833","options");

        try {
            $this->scss = TSD_Infinisite\Foundation::update_scss(1);
        } catch (Exception $e) {
            $this->fail($e->getMessage());
        }

    }


    public function test_cascading_styles()
    {

    }


    public function get_test_data()
    {
        $test_data = [
            'field_is_foundation_color_palette_primary' => '#1779ba',
            'field_is_foundation_color_palette_secondary' => '#767676',
            'field_is_foundation_color_palette_success' => '#3adb76',
            'field_is_foundation_color_palette_warning' => '#ffae00',
            'field_is_foundation_color_palette_alert' => '#cc4b37',
            'field_is_foundation_color_palette_white' => '#fefefe',
            'field_is_foundation_color_palette_light_gray' => '#e6e6e6',
            'field_is_foundation_color_palette_medium_gray' => '#cacaca',
            'field_is_foundation_color_palette_dark_gray' => '#8a8a8a',
            'field_is_foundation_color_palette_black' => '#0a0a0a',
            'field_is_foundation_global_width' => 'rem-calc(1200)',
            'field_is_foundation_global_lineheight' => '1.5',
            'field_is_foundation_global_margin' => '1rem',
            'field_is_foundation_global_padding' => '1rem',
            'field_is_foundation_global_position' => '1rem',
            'field_is_foundation_global_font_weight_normal' => 'normal',
            'field_is_foundation_global_font_weight_bold' => 'bold',
            'field_is_foundation_global_radius' => '0',
            'field_is_foundation_global_menu_padding' => '1.7rem 1rem',
            'field_is_foundation_global_menu_nested_margin' => '1rem',
            'field_is_foundation_global_text_direction' => 'ltr',
            'field_is_foundation_global_flexbox' => '1',
            'field_is_foundation_global_prototype_beakpoints' => '0',
            'field_is_foundation_global_button_cursor' => 'auto',
            'field_is_foundation_global_contrast_tolerance' => '0',
            'field_is_foundation_global_print_transparent_backgrounds' => '1',
            'field_is_foundation_global_font_size' => '100%',
            'field_is_foundation_global_body_background' => '#fefefe',
            'field_is_foundation_global_body_font_color' => '#0a0a0a',
            'field_is_foundation_global_body_font_family' => '\'Helvetica Neue\', Helvetica, Roboto, Arial, sans-serif',
            'field_is_foundation_global_body_antialiased' => '1',
            'field_is_foundation_breakpoints_small' => '0',
            'field_is_foundation_breakpoints_medium' => '640px',
            'field_is_foundation_breakpoints_large' => '1024px',
            'field_is_foundation_breakpoints_xlarge' => '1200px',
            'field_is_foundation_breakpoints_xxlarge' => '1440px',
            'field_is_foundation_breakpoints_print_breakpoint' => 'large',
            'field_is_foundation_breakpoints_classes' => '(small medium large xlarge xxlarge)',
            'field_is_foundation_breakpoints_grid_row_width' => '$global_width',
            'field_is_foundation_breakpoints_column_count' => '12',
            'field_is_foundation_breakpoints_gutter_small' => '15px',
            'field_is_foundation_breakpoints_gutter_medium' => '30px',
            'field_is_foundation_breakpoints_align_edge' => '1',
            'field_is_foundation_breakpoints_column_alias' => 'columns',
            'field_is_foundation_breakpoints_block_grid' => '8',
            'field_is_foundation_font_family_monospace' => 'Consolas, \'Liberation Mono\', Courier, monospace',
            'field_is_foundation_header_font_family' => '$body_font_family',
            'field_is_foundation_header_font_weight' => '$global_weight_normal',
            'field_is_foundation_header_font_style' => 'normal',
            'field_is_foundation_header_color' => 'inherit',
            'field_is_foundation_header_lineheight' => '1.4',
            'field_is_foundation_header_margin_bottom' => '0.5rem',
            'field_is_foundation_header_styles_small_h1' => '\'font-size\' : 24',
            'field_is_foundation_header_styles_small_h2' => '\'font-size\' : 20',
            'field_is_foundation_header_styles_small_h3' => '\'font-size\' : 19',
            'field_is_foundation_header_styles_small_h4' => '\'font-size\' : 18',
            'field_is_foundation_header_styles_small_h5' => '\'font-size\' : 17',
            'field_is_foundation_header_styles_small_h6' => '\'font-size\' : 16',
            'field_is_foundation_header_styles_medium_h1' => '\'font-size\' : 48',
            'field_is_foundation_header_styles_medium_h2' => '\'font-size\' : 40',
            'field_is_foundation_header_styles_medium_h3' => '\'font-size\' : 31',
            'field_is_foundation_header_styles_medium_h4' => '\'font-size\' : 25',
            'field_is_foundation_header_styles_medium_h5' => '\'font-size\' : 20',
            'field_is_foundation_header_styles_medium_h6' => '\'font-size\' : 16',
            'field_is_foundation_paragraph_text_rendering' => 'optimizeLegibility',
            'field_is_foundation_header_text_rendering' => 'optimizeLegibility',
            'field_is_foundation_small_font_size' => '80%',
            'field_is_foundation_header_small_font_color' => '$medium_gray',
            'field_is_foundation_paragraph_lineheight' => '1.6',
            'field_is_foundation_paragraph_margin_bottom' => '1rem',
            'field_is_foundation_code_color' => '#0a0a0a',
            'field_is_foundation_code_font_family' => 'Consolas, \'Liberation Mono\', Courier, monospace',
            'field_is_foundation_code_font_weight' => 'normal',
            'field_is_foundation_code_background' => '#e6e6e6',
            'field_is_foundation_code_border' => '1px solid $medium_gray',
            'field_is_foundation_code_padding' => 'rem_calc(2 5 1)',
            'field_is_foundation_anchor_color' => '#1779ba',
            'field_is_foundation_anchor_color_hover' => 'scale_color(0, 0, 0, $lightness = -14%)',
            'field_is_foundation_anchor_text_decoration' => 'none',
            'field_is_foundation_anchor_text_decoration_hover' => 'none',
            'field_is_foundation_hr_width' => '$global_width',
            'field_is_foundation_hr_border' => '1px solid $medium_gray',
            'field_is_foundation_hr_margin' => 'rem_calc(20) auto',
            'field_is_foundation_list_lineheight' => '$paragraph_lineheight',
            'field_is_foundation_list_margin_bottom' => '$paragraph_margin_bottom',
            'field_is_foundation_list_style_type' => 'disc',
            'field_is_foundation_list_style_position' => 'outside',
            'field_is_foundation_list_side_margin' => '1.25rem',
            'field_is_foundation_list_nested_side_margin' => '1.25rem',
            'field_is_foundation_defnlist_margin_bottom' => '1rem',
            'field_is_foundation_defnlist_term_weight' => '$global_weight_bold',
            'field_is_foundation_defnlist_term_margin_bottom' => '0.3rem',
            'field_is_foundation_blockquote_color' => '#8a8a8a',
            'field_is_foundation_blockquote_padding' => 'rem_calc(9 20 0 19)',
            'field_is_foundation_blockquote_border' => '1px solid $medium_gray',
            'field_is_foundation_cite_font_size' => 'rem_calc(13)',
            'field_is_foundation_cite_color' => '#0a0a0a',
            'field_is_foundation_cite_pseudo_content' => 'cite pseudo content here',
            'field_is_foundation_keystroke_font' => '$font_family_monospace',
            'field_is_foundation_keystroke_color' => '#0a0a0a',
            'field_is_foundation_keystroke_background' => '#e6e6e6',
            'field_is_foundation_keystroke_padding' => 'rem_calc(2 4 0)',
            'field_is_foundation_keystroke_radius' => '$global_radius',
            'field_is_foundation_abbr_underline' => '1px dotted $black',
            'field_is_foundation_lead_font_size' => '$global_font_size * 1.25',
            'field_is_foundation_lead_lineheight' => '1.6',
            'field_is_foundation_subheader_lineheight' => '1.4',
            'field_is_foundation_subheader_color' => '#8a8a8a',
            'field_is_foundation_subheader_font_weight' => 'normal',
            'field_is_foundation_subheader_margin_top' => '0.2rem',
            'field_is_foundation_subheader_margin_bottom' => '0.5rem',
            'field_is_foundation_stat_font_size' => '2.5rem',
            'field_is_foundation_abide_inputs' => '1',
            'field_is_foundation_abide_labels' => '1',
            'field_is_foundation_input_background_invalid' => '#cc4b37',
            'field_is_foundation_form_label_color_invalid' => '#cc4b37',
            'field_is_foundation_input_error_color' => '#cc4b37',
            'field_is_foundation_input_error_font_size' => 'rem-calc(12)',
            'field_is_foundation_input_error_font_weight' => '\$global-weight-bold',
            'field_is_foundation_accordion_background' => '#fefefe',
            'field_is_foundation_accordion_plusminus' => 'true',
            'field_is_foundation_accordion_title_font_size' => 'rem_calc(12)',
            'field_is_foundation_accordion_item_color' => '#1779ba',
            'field_is_foundation_accordion_item_background_hover' => '#e6e6e6',
            'field_is_foundation_accordion_item_padding' => '1.25rem 1rem',
            'field_is_foundation_accordion_content_background' => '#fefefe',
            'field_is_foundation_accordion_content_border' => '1px solid #e6e6e6',
            'field_is_foundation_accordion_content_color' => '#0a0a0a',
            'field_is_foundation_accordion_content_padding' => '1rem',
            'field_is_foundation_accordionmenu_padding' => '$global_menu_padding',
            'field_is_foundation_accordionmenu_nested_margin' => '\$global-menu-nested-margin',
            'field_is_foundation_accordionmenu_submenu_padding' => '$accordionmenu_padding',
            'field_is_foundation_accordionmenu_arrows' => '1',
            'field_is_foundation_accordionmenu_arrow_color' => '#1779ba',
            'field_is_foundation_accordionmenu_item_background' => 'null',
            'field_is_foundation_accordionmenu_border' => 'null',
            'field_is_foundation_accordionmenu_submenu_toggle_background' => 'null',
            'field_is_foundation_accordion_submenu_toggle_border' => '$accordionmenu_border',
            'field_is_foundation_accordionmenu_submenu_toggle_width' => '40px',
            'field_is_foundation_accordionmenu_submenu_toggle_height' => '$accordionmenu_submenu_toggle_width',
            'field_is_foundation_accordionmenu_arrow_size' => '6px',
            'field_is_foundation_badge_background' => '#1779ba',
            'field_is_foundation_badge_color' => '#fefefe',
            'field_is_foundation_badge_color_alt' => '#0a0a0a',
            'field_is_foundation_badge_palette' => '(  primary: #1779ba,  secondary: #767676,  success: #3adb76,  warning: #ffae00,  alert: #cc4b37,)',
            'field_is_foundation_badge_padding' => '0.3em',
            'field_is_foundation_badge_minwidth' => '2.1em',
            'field_is_foundation_badge_font_size' => '0.6rem',
            'field_is_foundation_breadcrumbs_margin' => '0 0 $global_margin 0',
            'field_is_foundation_breadcrumbs_item_font_size' => 'rem_calc(11)',
            'field_is_foundation_breadcrumbs_item_color' => '#1779ba',
            'field_is_foundation_breadcrumbs_item_color_current' => '#0a0a0a',
            'field_is_foundation_breadcrumbs_item_color_disabled' => '#cacaca',
            'field_is_foundation_breadcrumbs_item_margin' => '0.75rem',
            'field_is_foundation_breadcrumbs_item_uppercase' => 'true',
            'field_is_foundation_breadcrumbs_item_separator' => 'true',
            'field_is_foundation_breadcrumbs_item_separator_item' => 'bc item sep',
            'field_is_foundation_breadcrumbs_item_separator_item_rtl' => 'bc item sep rtl',
            'field_is_foundation_breadcrumbs_item_separator_color' => '#cacaca',
            'field_is_foundation_button_font_family' => 'inherit',
            'field_is_foundation_button_padding' => '0.85em 1em',
            'field_is_foundation_button_margin' => '0 0 15px 0',
            'field_is_foundation_button_fill' => 'solid',
            'field_is_foundation_button_background' => '#1779ba',
            'field_is_foundation_button_background_hover' => 'scale-color(#1779ba, $lightness: -15%);',
            'field_is_foundation_button_color' => '#fefefe',
            'field_is_foundation_button_color_alt' => '#0a0a0a',
            'field_is_foundation_button_radius' => '15px',
            'field_is_foundation_button_hollow_border_width' => '1px',
            'field_is_foundation_button_sizes_tiny' => '0.6rem',
            'field_is_foundation_button_sizes_small' => '0.75rem',
            'field_is_foundation_button_sizes_default' => '0.9rem',
            'field_is_foundation_button_sizes_large' => '1.25rem',
            'field_is_foundation_button_palette' => '(  primary: #1779ba,  secondary: #767676,  success: #3adb76,  warning: #ffae00,  alert: #cc4b37,);',
            'field_is_foundation_button_opacity_disabled' => '0.25',
            'field_is_foundation_button_background_hover_lightness' => '-20%',
            'field_is_foundation_button_hollow_hover_lightness' => '-50%',
            'field_is_foundation_button_transition' => 'background_color 0.25s ease_out, color 0.25s ease_out',
            'field_is_foundation_buttongroup_margin' => '1rem',
            'field_is_foundation_buttongroup_spacing' => '1px',
            'field_is_foundation_buttongroup_child_selector' => '\'.button\'',
            'field_is_foundation_buttongroup_expand_max' => '6',
            'field_is_foundation_buttongroup_radius_on_each' => 'true',
            'field_is_foundation_callout_background' => '#fefefe',
            'field_is_foundation_callout_background_fade' => '85%',
            'field_is_foundation_callout_border' => '1px solid rgba(0,0,0, 0.25)',
            'field_is_foundation_callout_margin' => '0 0 1rem 0',
            'field_is_foundation_callout_padding' => '1rem',
            'field_is_foundation_callout_font_color' => '$body_font_color',
            'field_is_foundation_callout_font_color_alt' => '$body_background',
            'field_is_foundation_callout_radius' => '$global_radius',
            'field_is_foundation_callout_link_tint' => '30%',
            'field_is_foundation_card_background' => '#fefefe',
            'field_is_foundation_card_font_color' => '#0a0a0a',
            'field_is_foundation_card_divider_background' => '#e6e6e6',
            'field_is_foundation_card_border' => '1px solid $light_gray',
            'field_is_foundation_card_shadow' => 'none',
            'field_is_foundation_card_border_radius' => '$global_radius',
            'field_is_foundation_card_padding' => '$global_padding',
            'field_is_foundation_card_margin_bottom' => '$global_margin',
            'field_is_foundation_closebutton_position' => 'right top',
            'field_is_foundation_closebutton_offset_horizontal_small' => '0.66rem',
            'field_is_foundation_closebutton_offset_horizontal_medium' => '1rem',
            'field_is_foundation_closebutton_offset_vertical_small' => '0.33em',
            'field_is_foundation_closebutton_offset_vertical_medium' => '0.5rem',
            'field_is_foundation_closebutton_size_small' => '1.5em',
            'field_is_foundation_closebutton_size_medium' => '2em',
            'field_is_foundation_closebutton_lineheight' => '1',
            'field_is_foundation_closebutton_color' => '#8a8a8a',
            'field_is_foundation_closebutton_color_hover' => '#0a0a0a',
            'field_is_foundation_drilldown_transition' => 'transform 0.15s linear',
            'field_is_foundation_drilldown_arrows' => 'true',
            'field_is_foundation_drilldown_padding' => '15px',
            'field_is_foundation_drilldown_nested_margin' => '0',
            'field_is_foundation_drilldown_background' => '#fefefe',
            'field_is_foundation_drilldown_submenu_padding' => '15px',
            'field_is_foundation_drilldown_submenu_background' => '#fefefe',
            'field_is_foundation_drilldown_arrow_color' => '#1779ba',
            'field_is_foundation_drilldown_arrow_size' => '6px',
            'field_is_foundation_dropdown_padding' => '1rem',
            'field_is_foundation_dropdown_background' => '#fefefe',
            'field_is_foundation_dropdown_border' => '1px solid #cacaca',
            'field_is_foundation_dropdown_font_size' => '1rem',
            'field_is_foundation_dropdown_width' => '300px',
            'field_is_foundation_dropdown_radius' => '15px',
            'field_is_foundation_dropdown_sizes_tiny' => '100px',
            'field_is_foundation_dropdown_sizes_small' => '200px',
            'field_is_foundation_dropdown_sizes_large' => '400px',
            'field_is_foundation_dropdownmenu_arrows' => 'true',
            'field_is_foundation_dropdownmenu_arrow_color' => '#1779ba',
            'field_is_foundation_dropdownmenu_arrow_size' => '6px',
            'field_is_foundation_dropdownmenu_arrow_padding' => '1.5rem',
            'field_is_foundation_dropdownmenu_min_width' => '200px',
            'field_is_foundation_dropdownmenu_background' => '#fefefe',
            'field_is_foundation_dropdownmenu_submenu_background' => '#fefefe',
            'field_is_foundation_dropdownmenu_padding' => '$global_menu_padding',
            'field_is_foundation_dropdownmenu_nested_margin' => '0',
            'field_is_foundation_dropdownmenu_submenu_padding' => '$dropdownmenu_padding',
            'field_is_foundation_dropdownmenu_border' => '1px solid $medium_gray',
            'field_is_foundation_dropdown_menu_item_color_active' => '#1779ba',
            'field_is_foundation_dropdown_menu_item_background_active' => 'transparent',
            'field_is_foundation_flex_source_ordering_count' => '6',
            'field_is_foundation_flexbox_responsive_breakpoints' => 'true',
            'field_is_foundation_fieldset_border' => '1px solid #cacaca',
            'field_is_foundation_fieldset_padding' => 'rem_calc(20)',
            'field_is_foundation_fieldset_margin' => 'rem_calc(18 0)',
            'field_is_foundation_legend_padding' => 'rem_calc(0 3)',
            'field_is_foundation_form_spacing' => 'rem_calc(16)',
            'field_is_foundation_helptext_color' => '#0a0a0a',
            'field_is_foundation_helptext_font_size' => 'rem_calc(13)',
            'field_is_foundation_helptext_font_style' => 'italic',
            'field_is_foundation_input_prefix_color' => '#0a0a0a',
            'field_is_foundation_input_prefix_background' => '#cacaca',
            'field_is_foundation_input_prefix_border' => '1px solid #cacaca',
            'field_is_foundation_input_prefix_padding' => '1rem',
            'field_is_foundation_form_label_color' => '#0a0a0a',
            'field_is_foundation_form_label_font_size' => 'rem_calc(14)',
            'field_is_foundation_form_label_font_weight' => 'normal',
            'field_is_foundation_form_label_lineheight' => '1.8',
            'field_is_foundation_select_background' => '#fefefe',
            'field_is_foundation_select_triangle_color' => '#8a8a8a',
            'field_is_foundation_select_radius' => '15px',
            'field_is_foundation_input_color' => '#0a0a0a',
            'field_is_foundation_input_placeholder_color' => '#cacaca',
            'field_is_foundation_input_font_family' => 'inherit',
            'field_is_foundation_input_font_size' => 'rem_calc(16)',
            'field_is_foundation_input_font_weight' => 'normal',
            'field_is_foundation_input_lineheight' => '1.5',
            'field_is_foundation_input_background' => '#fefefe',
            'field_is_foundation_input_background_focus' => '#fefefe',
            'field_is_foundation_input_background_disabled' => '#cacaca',
            'field_is_foundation_input_border' => '1px solid #cacaca',
            'field_is_foundation_input_border_focus' => '1px solid #8a8a8a',
            'field_is_foundation_input_padding' => '$form_spacing / 2',
            'field_is_foundation_input_shadow' => 'inset 0 1px 2px rgba(0,0,0, 0.1)',
            'field_is_foundation_input_shadow_focus' => '0 0 5px $medium_gray',
            'field_is_foundation_input_cursor_disabled' => 'not_allowed',
            'field_is_foundation_input_transition' => 'box_shadow 0.5s, border_color 0.25s ease_in_out',
            'field_is_foundation_input_number_spinners' => 'true',
            'field_is_foundation_input_radius' => '$global_radius',
            'field_is_foundation_form_button_radius' => '$global_radius',
            'field_is_foundation_label_background' => '#fefefe',
            'field_is_foundation_label_color' => '#fefefe',
            'field_is_foundation_label_color_alt' => '#fefefe',
            'field_is_foundation_label_palette' => '(  primary: #1779ba,  secondary: #767676,  success: #3adb76,  warning: #ffae00,  alert: #cc4b37,)',
            'field_is_foundation_label_font_size' => '0.8rem',
            'field_is_foundation_label_padding' => '0.33333rem 0.5rem',
            'field_is_foundation_label_radius' => '15px',
            'field_is_foundation_mediaobject_margin_bottom' => '$global_margin',
            'field_is_foundation_mediaobject_section_padding' => '$global_padding',
            'field_is_foundation_mediaobject_image_width_stacked' => '100%',
            'field_is_foundation_menu_margin' => '0',
            'field_is_foundation_menu_nested_margin' => '$global_menu_nested_margin',
            'field_is_foundation_menu_items_padding' => '$global_menu_padding',
            'field_is_foundation_menu_simple_margin' => '1rem',
            'field_is_foundation_menu_item_color_active' => '#fefefe',
            'field_is_foundation_menu_item_background_active' => 'transparent',
            'field_is_foundation_menu_icon_spacing' => '0.25rem',
            'field_is_foundation_menu_item_background_hover' => '#e6e6e6',
            'field_is_foundation_menu_state_back_compat' => 'true',
            'field_is_foundation_menu_centered_back_compat' => 'true',
            'field_is_foundation_menu_icons_back_compat' => 'true',
            'field_is_foundation_meter_height' => '1rem',
            'field_is_foundation_meter_radius' => '$global-radius',
            'field_is_foundation_meter_background' => '$medium-gray',
            'field_is_foundation_meter_fill_good' => '$success-color',
            'field_is_foundation_meter_fill_medium' => '$warning-color',
            'field_is_foundation_meter_fill_bad' => '$alert-color',
            'field_is_foundation_offcanvas_sizes_small' => '250px',
            'field_is_foundation_offcanvas_vertical_sizes_small' => '250px',
            'field_is_foundation_offcanvas_background' => '#e6e6e6',
            'field_is_foundation_offcanvas_shadow' => '0 0 10px rgba(0,0,0, 0.7)',
            'field_is_foundation_offcanvas_inner_shadow_size' => '20px',
            'field_is_foundation_offcanvas_inner_shadow_color' => 'rgba(0,0,0, 0.25)',
            'field_is_foundation_offcanvas_overlay_zindex' => '11',
            'field_is_foundation_offcanvas_push_zindex' => '12',
            'field_is_foundation_offcanvas_overlap_zindex' => '13',
            'field_is_foundation_offcanvas_reveal_zindex' => '12',
            'field_is_foundation_offcanvas_transition_length' => '0.5s',
            'field_is_foundation_offcanvas_transition_timing' => 'ease',
            'field_is_foundation_offcanvas_fixed_reveal' => 'true',
            'field_is_foundation_offcanvas_exit_background' => 'rgba(0,0,0, 0.25)',
            'field_is_foundation_maincontent_class' => 'off-canvas-content',
            'field_is_foundation_orbit_bullet_background' => '$medium-gray',
            'field_is_foundation_orbit_bullet_background_active' => '$dark-gray',
            'field_is_foundation_orbit_bullet_diameter' => '1.2rem',
            'field_is_foundation_orbit_bullet_margin' => '0.1rem',
            'field_is_foundation_orbit_bullet_margin_top' => '0.8rem',
            'field_is_foundation_orbit_bullet_margin_bottom' => '0.8rem',
            'field_is_foundation_orbit_caption_background' => 'rgba(255,255,255, 0.5)',
            'field_is_foundation_orbit_caption_padding' => '1rem',
            'field_is_foundation_orbit_control_background_hover' => 'rgba(0,0,0, 0.5)',
            'field_is_foundation_orbit_control_padding' => '1rem',
            'field_is_foundation_orbit_control_zindex' => '10',
            'field_is_foundation_pagination_font_size' => 'rem-calc(14)',
            'field_is_foundation_pagination_margin_bottom' => '$global-margin',
            'field_is_foundation_pagination_item_color' => '$black',
            'field_is_foundation_pagination_item_padding' => 'rem-calc(3 10)',
            'field_is_foundation_pagination_item_spacing' => 'rem-calc(1)',
            'field_is_foundation_pagination_radius' => '$global-radius',
            'field_is_foundation_pagination_item_background_hover' => '$light-gray',
            'field_is_foundation_pagination_item_background_current' => '$primary-color',
            'field_is_foundation_pagination_item_color_current' => '$white',
            'field_is_foundation_pagination_item_color_disabled' => '$medium-gray',
            'field_is_foundation_pagination_ellipsis_color' => '$black',
            'field_is_foundation_pagination_mobile_items' => 'false',
            'field_is_foundation_pagination_mobile_current_item' => 'false',
            'field_is_foundation_pagination_arrows' => 'true',
            'field_is_foundation_progress_height' => '1rem',
            'field_is_foundation_progress_background' => '$medium-gray',
            'field_is_foundation_progress_margin_bottom' => '$global-margin',
            'field_is_foundation_progress_meter_background' => '$primary-color',
            'field_is_foundation_progress_radius' => '$global-radius',
            'field_is_foundation_responsive_embed_margin_bottom' => 'rem_calc(16)',
            'field_is_foundation_responsive_embed_ratios_default' => '4 by 3',
            'field_is_foundation_responsive_embed_ratios_widescreen' => '16 by 9',
            'field_is_foundation_reveal_background' => '$white',
            'field_is_foundation_reveal_width' => '600px',
            'field_is_foundation_reveal_max_width' => '$global-width',
            'field_is_foundation_reveal_padding' => '$global-padding',
            'field_is_foundation_reveal_border' => '1px solid $medium-gray',
            'field_is_foundation_reveal_radius' => '$global-radius',
            'field_is_foundation_reveal_zindex' => '1005',
            'field_is_foundation_reveal_overlay_background' => 'rgba(0,0,0, 0.45)',
            'field_is_foundation_slider_width_vertical' => '0.5rem',
            'field_is_foundation_slider_transition' => 'all 0.2s ease-in-out',
            'field_is_foundation_slider_height' => '0.5rem',
            'field_is_foundation_slider_background' => '$light-gray',
            'field_is_foundation_slider_fill_background' => '$medium-gray',
            'field_is_foundation_slider_handle_height' => '1.4rem',
            'field_is_foundation_slider_handle_width' => '1.4rem',
            'field_is_foundation_slider_handle_background' => '$primary-color',
            'field_is_foundation_slider_opacity_disabled' => '0.25',
            'field_is_foundation_slider_radius' => '$global-radius',
            'field_is_foundation_switch_background' => '$medium-gray',
            'field_is_foundation_switch_background_active' => '$primary-color',
            'field_is_foundation_switch_height' => '2rem',
            'field_is_foundation_switch_height_tiny' => '1.5rem',
            'field_is_foundation_switch_height_small' => '1.75rem',
            'field_is_foundation_switch_height_large' => '2.5rem',
            'field_is_foundation_switch_radius' => '$global-radius',
            'field_is_foundation_switch_margin' => '$global-margin',
            'field_is_foundation_switch_paddle_background' => '$white',
            'field_is_foundation_switch_paddle_offset' => '0.25rem',
            'field_is_foundation_switch_paddle_radius' => '$global-radius',
            'field_is_foundation_switch_paddle_transition' => 'all 0.25s ease-out',
            'field_is_foundation_table_background' => '$white',
            'field_is_foundation_table_color_scale' => '5%',
            'field_is_foundation_table_border' => '1px solid smart-scale(0,0,0, $table-color-scale)',
            'field_is_foundation_table_padding' => 'rem-calc(8 10 10)',
            'field_is_foundation_table_hover_scale' => '2%',
            'field_is_foundation_table_row_hover' => 'darken($black, $table-hover-scale)',
            'field_is_foundation_table_row_stripe_hover' => 'darken($black, $table-color-scale + $table-hover-scale)',
            'field_is_foundation_table_is_striped' => 'true',
            'field_is_foundation_table_striped_background' => 'smart-scale(0,0,0, $table-color-scale)',
            'field_is_foundation_table_stripe' => 'even',
            'field_is_foundation_table_head_background' => 'smart-scale(0,0,0, $table-color-scale / 2)',
            'field_is_foundation_table_head_row_hover' => 'darken($black, $table-hover-scale)',
            'field_is_foundation_table_foot_background' => 'smart-scale(0,0,0, $table-color-scale)',
            'field_is_foundation_table_foot_row_hover' => 'darken($black, $table-hover-scale)',
            'field_is_foundation_table_head_font_color' => '$body-font-color',
            'field_is_foundation_table_foot_font_color' => '$body-font-color',
            'field_is_foundation_show_header_for_stacked' => 'false',
            'field_is_foundation_table_stack_breakpoint' => 'medium',
            'field_is_foundation_tab_margin' => '0',
            'field_is_foundation_tab_background' => '$white',
            'field_is_foundation_tab_color' => '$primary-color',
            'field_is_foundation_tab_background_active' => '$light-gray',
            'field_is_foundation_tab_active_color' => '$primary-color',
            'field_is_foundation_tab_item_font_size' => 'rem-calc(12)',
            'field_is_foundation_tab_item_background_hover' => '$white',
            'field_is_foundation_tab_item_padding' => '1.25rem 1.5rem',
            'field_is_foundation_tab_expand_max' => '6',
            'field_is_foundation_tab_content_background' => '$white',
            'field_is_foundation_tab_content_border' => '$light-gray',
            'field_is_foundation_tab_content_color' => '$body-font-color',
            'field_is_foundation_tab_content_padding' => '1rem',
            'field_is_foundation_thumbnail_border' => 'solid 4px $white',
            'field_is_foundation_thumbnail_margin_bottom' => '$global-margin',
            'field_is_foundation_thumbnail_shadow' => '0 0 0 1px rgba(0,0,0, 0.2)',
            'field_is_foundation_thumbnail_shadow_hover' => '0 0 6px 1px rgba(0,255,0, 0.5)',
            'field_is_foundation_thumbnail_transition' => 'box-shadow 200ms ease-out',
            'field_is_foundation_thumbnail_radius' => '$global-radius',
            'field_is_foundation_titlebar_background' => '$black',
            'field_is_foundation_titlebar_color' => '$white',
            'field_is_foundation_titlebar_padding' => '0.5rem',
            'field_is_foundation_titlebar_text_font_weight' => 'bold',
            'field_is_foundation_titlebar_icon_color' => '$white',
            'field_is_foundation_titlebar_icon_color_hover' => '$medium-gray',
            'field_is_foundation_titlebar_icon_spacing' => '0.25rem',
            'field_is_foundation_has_tip_cursor' => 'help',
            'field_is_foundation_has_tip_font_weight' => '$global-weight-bold',
            'field_is_foundation_has_tip_border_bottom' => 'dotted 1px $dark-gray',
            'field_is_foundation_tooltip_background_color' => '$black',
            'field_is_foundation_tooltip_color' => '$white',
            'field_is_foundation_tooltip_padding' => '0.75rem',
            'field_is_foundation_tooltip_max_width' => '10rem',
            'field_is_foundation_tooltip_font_size' => '$small-font-size',
            'field_is_foundation_tooltip_pip_width' => '0.75rem',
            'field_is_foundation_tooltip_pip_height' => '$tooltip-pip-width * 0.866',
            'field_is_foundation_tooltip_radius' => '$global-radius',
            'field_is_foundation_topbar_padding' => '0.5rem',
            'field_is_foundation_topbar_background' => '$light-gray',
            'field_is_foundation_topbar_submenu_background' => '$topbar-background',
            'field_is_foundation_topbar_title_spacing' => '0.5rem 1rem 0.5rem 0',
            'field_is_foundation_topbar_input_width' => '200px',
            'field_is_foundation_topbar_unstack_breakpoint' => 'medium',
            'field_is_foundation_xy_grid' => 'true',
            'field_is_foundation_grid_container' => '$global-width',
            'field_is_foundation_grid_columns' => '12',
            'field_is_foundation_grid_margin_gutters_small' => '20px',
            'field_is_foundation_grid_margin_gutters_medium' => '30px',
            'field_is_foundation_grid_padding_gutters' => '$grid-margin-gutters',
            'field_is_foundation_grid_container_padding' => '$grid-padding-gutters',
            'field_is_foundation_grid_container_max' => '$global-width',
            'field_is_foundation_xy_block_grid_max' => '8'
        ];

        return $test_data;
    }

}