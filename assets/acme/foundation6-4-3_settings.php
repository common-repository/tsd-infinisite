<?php $foundation_settings = "@import 'foundation.scss';
@import 'is_variables.scss';
    
//  Foundation for Sites Settings
//  -----------------------------
//
//  Table of Contents:
//
//   1. Global
//   2. Breakpoints
//   3. The Grid
//   4. Base Typography
//   5. Typography Helpers
//   6. Abide
//   7. Accordion
//   8. Accordion Menu
//   9. Badge
//  10. Breadcrumbs
//  11. Button
//  12. Button Group
//  13. Callout
//  14. Card
//  15. Close Button
//  16. Drilldown
//  17. Dropdown
//  18. Dropdown Menu
//  19. Flexbox Utilities
//  20. Forms
//  21. Label
//  22. Media Object
//  23. Menu
//  24. Meter
//  25. Off-canvas
//  26. Orbit
//  27. Pagination
//  28. Progress Bar
//  29. Prototype Arrow
//  30. Prototype Border-Box
//  31. Prototype Border-None
//  32. Prototype Bordered
//  33. Prototype Display
//  34. Prototype Font-Styling
//  35. Prototype List-Style-Type
//  36. Prototype Overflow
//  37. Prototype Position
//  38. Prototype Rounded
//  39. Prototype Separator
//  40. Prototype Shadow
//  41. Prototype Sizing
//  42. Prototype Spacing
//  43. Prototype Text-Decoration
//  44. Prototype Text-Transformation
//  45. Prototype Text-Utilities
//  46. Responsive Embed
//  47. Reveal
//  48. Slider
//  49. Switch
//  50. Table
//  51. Tabs
//  52. Thumbnail
//  53. Title Bar
//  54. Tooltip
//  55. Top Bar
//  56. Xy Grid


// 1. Global
// ---------

\$global-font-size: {$fields['global_font_size']};
\$global-width: {$fields['global_width']};
\$global-lineheight: {$fields['global_lineheight']};
\$foundation-palette: {$helper->foundation_palette()};
\$light-gray: #e6e6e6;
\$medium-gray: #cacaca;
\$dark-gray: #8a8a8a;
\$black: #0a0a0a;
\$white: #fefefe;

\$body-background: {$fields['body_background']};
\$body-font-color: {$fields['body_font_color']};

\$body-font-family: {$fields['body_font_family']};
\$body-antialiased: {$fields['body_antialiased']};
\$global-margin: {$fields['global_margin']};
\$global-padding: {$fields['global_padding']};
\$global-position: {$fields['global_position']};
\$global-weight-normal: {$fields['global_weight_normal']};
\$global-weight-bold: {$fields['global_weight_bold']};
\$global-radius: {$fields['global_radius']};
\$global-menu-padding: {$fields['global_menu_padding']};
\$global-menu-nested-margin: {$fields['global_menu_nested_margin']};
\$global-text-direction: {$fields['global_text_direction']};
\$global-flexbox: {$fields['global_flexbox']};

// we aren't supporting this right now
\$global-prototype-breakpoints: false;

\$global-button-cursor: {$fields['global_button_cursor']};
\$global-color-pick-contrast-tolerance: {$fields['global_color_pick_contrast_tolerance']};
\$print-transparent-backgrounds: {$fields['print_transparent_backgrounds']};


@include add-foundation-colors;

// 2. Breakpoints
// --------------

\$breakpoints: (
  small: 0,
  medium: {$fields['breakpoints_medium']},
  large: {$fields['breakpoints_large']},
  xlarge: {$fields['breakpoints_xlarge']},
  xxlarge: {$fields['breakpoints_xxlarge']},
);
\$print-breakpoint: {$fields['print_breakpoint']};

// we're going to lock these classes for now
\$breakpoint-classes: (small medium large xlarge xxlarge);


// 3. The Grid
// not sure we're using this at all anymore
// -----------

\$grid-row-width: {$fields['grid_row_width']};

\$grid-column-count: {$fields['grid_column_count']};
\$grid-column-gutter: (
  small: {$fields['grid_column_gutter_small']},
  medium: {$fields['grid_column_gutter_medium']},
);
\$grid-column-align-edge: {$fields['grid_column_align_edge']};
\$grid-column-alias: '{$fields['grid_column_alias']}';
\$block-grid-max: {$fields['xy_block_grid_max']};

// 4. Base Typography
// ------------------

\$header-font-family: {$fields['header_font_family']};
\$header-font-weight: {$fields['header_font_weight']};

\$header-font-style: {$fields['header_font_style']};
\$font-family-monospace: {$fields['font_family_monospace']};
\$header-color: {$fields['header_color']};
\$header-lineheight: {$fields['header_lineheight']};
\$header-margin-bottom: {$fields['header_margin_bottom']};
\$header-styles: (
    small: (
    'h1': ({$fields['header_styles_small_h1']}),
    'h2': ({$fields['header_styles_small_h2']}),
    'h3': ({$fields['header_styles_small_h3']}),
    'h4': ({$fields['header_styles_small_h4']}),
    'h5': ({$fields['header_styles_small_h5']}),
    'h6': ({$fields['header_styles_small_h6']}),
  ),
  medium: (
    'h1': ({$fields['header_styles_medium_h1']}),
    'h2': ({$fields['header_styles_medium_h2']}),
    'h3': ({$fields['header_styles_medium_h3']}),
    'h4': ({$fields['header_styles_medium_h4']}),
    'h5': ({$fields['header_styles_medium_h5']}),
    'h6': ({$fields['header_styles_medium_h6']}),
  ),
);
\$header-text-rendering: {$fields['header_text_rendering']};
\$small-font-size: {$fields['small_font_size']};
\$header-small-font-color: {$fields['header_small_font_color']};
\$paragraph-lineheight: {$fields['paragraph_lineheight']};
\$paragraph-margin-bottom: {$fields['paragraph_margin_bottom']};
\$paragraph-text-rendering: {$fields['paragraph_text_rendering']};
\$code-color: {$fields['code_color']};
\$code-font-family: {$fields['code_font_family']};
\$code-font-weight: {$fields['code_font_weight']};
\$code-background: {$fields['code_background']};
\$code-border: {$fields['code_border']};
\$code-padding: {$fields['code_padding']};
\$anchor-color: {$fields['anchor_color']};

// causing an issue
\$anchor-color-hover: {$fields['anchor_color_hover']};

\$anchor-text-decoration: {$fields['anchor_text_decoration']};
\$anchor-text-decoration-hover: {$fields['anchor_text_decoration_hover']};
\$hr-width: {$fields['hr_width']};
\$hr-border: {$fields['hr_border']};
\$hr-margin: {$fields['hr_margin']};
\$list-lineheight: {$fields['list_lineheight']};
\$list-margin-bottom: {$fields['list_margin_bottom']};
\$list-style-type: {$fields['list_style_type']};
\$list-style-position: {$fields['list_style_position']};
\$list-side-margin: {$fields['list_side_margin']};
\$list-nested-side-margin: {$fields['list_nested_side_margin']};
\$defnlist-margin-bottom: {$fields['defnlist_margin_bottom']};
\$defnlist-term-weight: {$fields['defnlist_term_weight']};
\$defnlist-term-margin-bottom: {$fields['defnlist_term_margin_bottom']};
\$blockquote-color: {$fields['blockquote_color']};
\$blockquote-padding: {$fields['blockquote_padding']};
\$blockquote-border: {$fields['blockquote_border']};
\$cite-font-size: {$fields['cite_font_size']};
\$cite-color: {$fields['cite_color']};
\$cite-pseudo-content: {$fields['cite_pseudo_content']};
\$keystroke-font: {$fields['keystroke_font']};
\$keystroke-color: {$fields['keystroke_color']};
\$keystroke-background: {$fields['keystroke_background']};
\$keystroke-padding: {$fields['keystroke_padding']};
\$keystroke-radius: {$fields['keystroke_radius']};
\$abbr-underline: {$fields['abbr_underline']};


// 5. Typography Helpers
// ---------------------

\$lead-font-size: {$fields['lead_font_size']};
\$lead-lineheight: {$fields['lead_lineheight']};
\$subheader-lineheight: {$fields['subheader_lineheight']};
\$subheader-color: {$helper->foundation_default('subheader_color',  'dark_gray')};
\$subheader-font-weight: {$helper->foundation_default('subheader_font_weight',   'global_weight_normal')};
\$subheader-margin-top: {$fields['subheader_margin_top']};
\$subheader-margin-bottom: {$fields['subheader_margin_bottom']};
\$stat-font-size: {$fields['stat_font_size']};

// 6. Abide
// --------


\$abide-inputs: {$fields['abide_inputs']};
\$abide-labels: {$fields['abide_labels']};
\$input-background-invalid: {$fields['input_background_invalid']};
\$form-label-color-invalid: {$fields['form_label_color_invalid']};
\$input-error-color: {$fields['input_error_color']};
\$input-error-font-size: {$fields['input_error_font_size']};
\$input-error-font-weight: {$helper->foundation_default('input_error_font_weight',  'global_weight_bold')};

   
// 7. Accordion
// ------------


\$accordion-background: {$fields['accordion_background']};
\$accordion-plusminus: {$fields['accordion_plusminus']};
\$accordion-title-font-size: {$fields['accordion_title_font_size']};
\$accordion-item-color: {$helper->foundation_default('accordion_item_color',  'primary')};
\$accordion-item-background-hover: {$fields['accordion_item_background_hover']};
\$accordion-item-padding: {$fields['accordion_item_padding']};
\$accordion-content-background: {$fields['accordion_content_background']};
\$accordion-content-border: {$fields['accordion_content_border']};
\$accordion-content-color: {$fields['accordion_content_color']};
\$accordion-content-padding: {$fields['accordion_content_padding']};

// 8. Accordion Menu
// -----------------


\$accordionmenu-padding: {$fields['accordionmenu_padding']};
\$accordionmenu-nested-margin: {$fields['accordionmenu_nested_margin']};
\$accordionmenu-submenu-padding: {$fields['accordionmenu_submenu_padding']};
\$accordionmenu-arrows: {$fields['accordionmenu_arrows']};
\$accordionmenu-arrow-color: {$fields['accordionmenu_arrow_color']};
\$accordionmenu-item-background: {$fields['accordionmenu_item_background']};
\$accordionmenu-border: {$fields['accordionmenu_border']};
\$accordionmenu-submenu-toggle-background: {$fields['accordionmenu_submenu_toggle_background']};
\$accordion-submenu-toggle-border: {$fields['accordion_submenu_toggle_border']};
\$accordionmenu-submenu-toggle-width: {$fields['accordionmenu_submenu_toggle_width']};
\$accordionmenu-submenu-toggle-height: {$fields['accordionmenu_submenu_toggle_height']};
\$accordionmenu-arrow-size: {$fields['accordionmenu_arrow_size']};

// 9. Badge
// --------


\$badge-background: {$fields['badge_background']};
\$badge-color: {$fields['badge_color']};
\$badge-color-alt: {$fields['badge_color_alt']};
\$badge-palette: {$helper->foundation_palette()};
\$badge-padding: {$fields['badge_padding']};
\$badge-minwidth: {$fields['badge_minwidth']};
\$badge-font-size: {$fields['badge_font_size']};

// 10. Breadcrumbs
// ---------------


\$breadcrumbs-margin: {$fields['breadcrumbs_margin']};
\$breadcrumbs-item-font-size: {$fields['breadcrumbs_item_font_size']};
\$breadcrumbs-item-color: {$fields['breadcrumbs_item_color']};
\$breadcrumbs-item-color-current: {$fields['breadcrumbs_item_color_current']};
\$breadcrumbs-item-color-disabled: {$fields['breadcrumbs_item_color_disabled']};
\$breadcrumbs-item-margin: {$fields['breadcrumbs_item_margin']};
\$breadcrumbs-item-uppercase: {$fields['breadcrumbs_item_uppercase']};
\$breadcrumbs-item-separator: {$fields['breadcrumbs_item_separator']};
\$breadcrumbs-item-separator-item: {$fields['breadcrumbs_item_separator_item']};
\$breadcrumbs-item-separator-item-rtl: {$fields['breadcrumbs_item_separator_item_rtl']};
\$breadcrumbs-item-separator-color: {$fields['breadcrumbs_item_separator_color']};


// 11. Button
// ----------


\$button-font-family: {$fields['button_font_family']};
\$button-padding: {$fields['button_padding']};
\$button-margin: {$fields['button_margin']};
\$button-fill: {$fields['button_fill']};
\$button-background: {$fields['button_background']};
\$button-background-hover: {$fields['button_background_hover']};
\$button-color: {$fields['button_color']};
\$button-color-alt: {$fields['button_color_alt']};
\$button-radius: {$fields['button_radius']};
\$button-hollow-border-width: {$fields['button_hollow_border_width']};
\$button-sizes: (
    tiny: {$fields['button_sizes_tiny']},
    small: {$fields['button_sizes_small']},
    default: {$fields['button_sizes_default']},
    large: {$fields['button_sizes_large']},
);
\$button-palette: {$helper->foundation_palette()};
\$button-opacity-disabled: {$fields['button_opacity_disabled']};
\$button-background-hover-lightness: {$fields['button_background_hover_lightness']};
\$button-hollow-hover-lightness: {$fields['button_hollow_hover_lightness']};
\$button-transition: {$fields['button_transition']};


// 12. Button Group
// ----------------


\$buttongroup-margin: {$fields['buttongroup_margin']};
\$buttongroup-spacing: {$fields['buttongroup_spacing']};
\$buttongroup-child-selector: {$fields['buttongroup_child_selector']};
\$buttongroup-expand-max: {$fields['buttongroup_expand_max']};
\$buttongroup-radius-on-each: {$fields['buttongroup_radius_on_each']};

// 13. Callout
// -----------


\$callout-background: {$fields['callout_background']};
\$callout-background-fade: {$fields['callout_background_fade']};
\$callout-border: {$fields['callout_border']};
\$callout-margin: {$fields['callout_margin']};
\$callout-padding: {$fields['callout_padding']};
\$callout-font-color: {$fields['callout_font_color']};
\$callout-font-color-alt: {$fields['callout_font_color_alt']};
\$callout-radius: {$fields['callout_radius']};
\$callout-link-tint: {$fields['callout_link_tint']};

// 14. Card
// --------


\$card-background: {$fields['card_background']};
\$card-font-color: {$fields['card_font_color']};
\$card-divider-background: {$fields['card_divider_background']};
\$card-border: {$fields['card_border']};
\$card-shadow: {$fields['card_shadow']};
\$card-border-radius: {$fields['card_border_radius']};
\$card-padding: {$fields['card_padding']};
\$card-margin-bottom: {$fields['card_margin_bottom']};

// 15. Close Button
// ----------------

\$closebutton-position: {$fields['closebutton_position']};
\$closebutton-offset-horizontal: (
small: 0.66rem,
  medium: 1rem,
);
\$closebutton-offset-vertical: (
small: 0.33em,
  medium: 0.5rem,
);
\$closebutton-size: (
small: 1.5em,
  medium: 2em,
);
\$closebutton-lineheight: {$fields['closebutton_lineheight']};

\$closebutton-color: {$fields['closebutton_color']};
\$closebutton-color-hover: {$fields['closebutton_color_hover']};

// 16. Drilldown
// -------------



\$drilldown-transition: {$fields['drilldown_transition']};
\$drilldown-arrows: {$fields['drilldown_arrows']};
\$drilldown-padding: {$fields['drilldown_padding']};
\$drilldown-nested-margin: {$fields['drilldown_nested_margin']};
\$drilldown-background: {$fields['drilldown_background']};
\$drilldown-submenu-padding: {$fields['drilldown_submenu_padding']};
\$drilldown-submenu-background: {$fields['drilldown_submenu_background']};
\$drilldown-arrow-color: {$fields['drilldown_arrow_color']};
\$drilldown-arrow-size: {$fields['drilldown_arrow_size']};

// 17. Dropdown
// ------------


\$dropdown-padding: {$fields['dropdown_padding']};
\$dropdown-background: {$fields['dropdown_background']};
\$dropdown-border: {$fields['dropdown_border']};
\$dropdown-font-size: {$fields['dropdown_font_size']};
\$dropdown-width: {$fields['dropdown_width']};
\$dropdown-radius: {$fields['dropdown_radius']};
\$dropdown-sizes: (
    tiny: 100px,
    small: 200px,
    large: 400px,
);

// 18. Dropdown Menu
// -----------------


\$dropdownmenu-arrows: {$fields['dropdownmenu_arrows']};
\$dropdownmenu-arrow-color: {$fields['dropdownmenu_arrow_color']};
\$dropdownmenu-arrow-size: {$fields['dropdownmenu_arrow_size']};
\$dropdownmenu-arrow-padding: {$fields['dropdownmenu_arrow_padding']};
\$dropdownmenu-min-width: {$fields['dropdownmenu_min_width']};
\$dropdownmenu-background: {$fields['dropdownmenu_background']};
\$dropdownmenu-submenu-background: {$fields['dropdownmenu_submenu_background']};
\$dropdownmenu-padding: {$fields['dropdownmenu_padding']};
\$dropdownmenu-nested-margin: {$fields['dropdownmenu_nested_margin']};
\$dropdownmenu-submenu-padding: {$fields['dropdownmenu_submenu_padding']};
\$dropdownmenu-border: {$fields['dropdownmenu_border']};
\$dropdown-menu-item-color-active: {$fields['dropdown_menu_item_color_active']};
\$dropdown-menu-item-background-active: {$fields['dropdown_menu_item_background_active']};

// 19. Flexbox Utilities
// ---------------------


\$flex-source-ordering-count: {$fields['flex_source_ordering_count']};
\$flexbox-responsive-breakpoints: {$fields['flexbox_responsive_breakpoints']};

// 20. Forms
// ---------


\$fieldset-border: {$fields['fieldset_border']};
\$fieldset-padding: {$fields['fieldset_padding']};
\$fieldset-margin: {$fields['fieldset_margin']};
\$legend-padding: {$fields['legend_padding']};
\$form-spacing: {$fields['form_spacing']};
\$helptext-color: {$fields['helptext_color']};
\$helptext-font-size: {$fields['helptext_font_size']};
\$helptext-font-style: {$fields['helptext_font_style']};
\$input-prefix-color: {$fields['input_prefix_color']};
\$input-prefix-background: {$fields['input_prefix_background']};
\$input-prefix-border: {$fields['input_prefix_border']};
\$input-prefix-padding: {$fields['input_prefix_padding']};
\$form-label-color: {$fields['form_label_color']};
\$form-label-font-size: {$fields['form_label_font_size']};
\$form-label-font-weight: {$fields['form_label_font_weight']};
\$form-label-line-height: {$fields['form_label_lineheight']};
\$select-background: {$fields['select_background']};
\$select-triangle-color: {$fields['select_triangle_color']};
\$select-radius: {$fields['select_radius']};
\$input-color: {$fields['input_color']};
\$input-placeholder-color: {$fields['input_placeholder_color']};
\$input-font-family: {$fields['input_font_family']};
\$input-font-size: {$fields['input_font_size']};
\$input-font-weight: {$fields['input_font_weight']};
\$input-line-height: {$fields['input_lineheight']};
\$input-background: {$fields['input_background']};
\$input-background-focus: {$fields['input_background_focus']};
\$input-background-disabled: {$fields['input_background_disabled']};
\$input-border: {$fields['input_border']};
\$input-border-focus: {$fields['input_border_focus']};
\$input-padding: {$fields['input_padding']};
\$input-shadow: {$fields['input_shadow']};
\$input-shadow-focus: {$fields['input_shadow_focus']};
\$input-cursor-disabled: {$fields['input_cursor_disabled']};
\$input-transition: {$fields['input_transition']};
\$input-number-spinners: {$fields['input_number_spinners']};
\$input-radius: {$fields['input_radius']};
\$form-button-radius: {$fields['form_button_radius']};



// 21. Label
// ---------


\$label-background: {$fields['label_background']};
\$label-color: {$fields['label_color']};
\$label-color-alt: {$fields['label_color_alt']};
\$label-palette: {$helper->foundation_palette()};
\$label-font-size: {$fields['label_font_size']};
\$label-padding: {$fields['label_padding']};
\$label-radius: {$fields['label_radius']};

// 22. Media Object
// ----------------


\$mediaobject-margin-bottom: {$fields['mediaobject_margin_bottom']};
\$mediaobject-section-padding: {$fields['mediaobject_section_padding']};
\$mediaobject-image-width-stacked: {$fields['mediaobject_image_width_stacked']};

// 23. Menu
// --------


\$menu-margin: {$fields['menu_margin']};
\$menu-nested-margin: {$fields['menu_nested_margin']};
\$menu-items-padding: {$fields['menu_items_padding']};
\$menu-simple-margin: {$fields['menu_simple_margin']};
\$menu-item-color-active: {$fields['menu_item_color_active']};
\$menu-item-background-active: {$fields['menu_item_background_active']};
\$menu-icon-spacing: {$fields['menu_icon_spacing']};
\$menu-item-background-hover: {$fields['menu_item_background_hover']};
\$menu-state-back-compat: {$fields['menu_state_back_compat']};
\$menu-centered-back-compat: {$fields['menu_centered_back_compat']};
\$menu-icons-back-compat: {$fields['menu_icons_back_compat']};

// 24. Meter
// ---------


\$meter-height: {$fields['meter_height']};
\$meter-radius: {$fields['meter_radius']};
\$meter-background: {$fields['meter_background']};
\$meter-fill-good: {$fields['meter_fill_good']};
\$meter-fill-medium: {$fields['meter_fill_medium']};
\$meter-fill-bad: {$fields['meter_fill_bad']};

// 25. Off-canvas
// --------------


\$offcanvas-sizes: (
small: 250px,
);
\$offcanvas-vertical-sizes: (
small: 250px,
);
\$offcanvas-background: {$fields['offcanvas_background']};
\$offcanvas-shadow: {$fields['offcanvas_shadow']};
\$offcanvas-inner-shadow-size: {$fields['offcanvas_inner_shadow_size']};
\$offcanvas-inner-shadow-color: {$fields['offcanvas_inner_shadow_color']};
\$offcanvas-overlay-zindex: {$fields['offcanvas_overlay_zindex']};
\$offcanvas-push-zindex: {$fields['offcanvas_push_zindex']};
\$offcanvas-overlap-zindex: {$fields['offcanvas_overlap_zindex']};
\$offcanvas-reveal-zindex: {$fields['offcanvas_reveal_zindex']};
\$offcanvas-transition-length: {$fields['offcanvas_transition_length']};
\$offcanvas-transition-timing: {$fields['offcanvas_transition_timing']};
\$offcanvas-fixed-reveal: {$fields['offcanvas_fixed_reveal']};
\$offcanvas-exit-background: {$fields['offcanvas_exit_background']};
\$maincontent-class: {$fields['maincontent_class']};

// 26. Orbit
// ---------


\$orbit-bullet-background: {$fields['orbit_bullet_background']};
\$orbit-bullet-background-active: {$fields['orbit_bullet_background_active']};
\$orbit-bullet-diameter: {$fields['orbit_bullet_diameter']};
\$orbit-bullet-margin: {$fields['orbit_bullet_margin']};
\$orbit-bullet-margin-top: {$fields['orbit_bullet_margin_top']};
\$orbit-bullet-margin-bottom: {$fields['orbit_bullet_margin_bottom']};
\$orbit-caption-background: {$fields['orbit_caption_background']};
\$orbit-caption-padding: {$fields['orbit_caption_padding']};
\$orbit-control-background-hover: {$fields['orbit_control_background_hover']};
\$orbit-control-padding: {$fields['orbit_control_padding']};
\$orbit-control-zindex: {$fields['orbit_control_zindex']};

// 27. Pagination
// --------------


\$pagination-font-size: {$fields['pagination_font_size']};
\$pagination-margin-bottom: {$fields['pagination_margin_bottom']};
\$pagination-item-color: {$fields['pagination_item_color']};
\$pagination-item-padding: {$fields['pagination_item_padding']};
\$pagination-item-spacing: {$fields['pagination_item_spacing']};
\$pagination-radius: {$fields['pagination_radius']};
\$pagination-item-background-hover: {$fields['pagination_item_background_hover']};
\$pagination-item-background-current: {$fields['pagination_item_background_current']};
\$pagination-item-color-current: {$fields['pagination_item_color_current']};
\$pagination-item-color-disabled: {$fields['pagination_item_color_disabled']};
\$pagination-ellipsis-color: {$fields['pagination_ellipsis_color']};
\$pagination-mobile-items: {$fields['pagination_mobile_items']};
\$pagination-mobile-current-item: {$fields['pagination_mobile_current_item']};
\$pagination-arrows: {$fields['pagination_arrows']};

// 28. Progress Bar
// ----------------


\$progress-height: {$fields['progress_height']};
\$progress-background: {$fields['progress_background']};
\$progress-margin-bottom: {$fields['progress_margin_bottom']};
\$progress-meter-background: {$fields['progress_meter_background']};
\$progress-radius: {$fields['progress_radius']};

// 46. Responsive Embed
// --------------------

\$responsive-embed-margin-bottom: {$fields['responsive_embed_margin_bottom']};
\$responsive-embed-ratios: (
  default: {$fields['responsive_embed_ratios_default']},
  widescreen: {$fields['responsive_embed_ratios_widescreen']},
);

// 47. Reveal
// ----------


\$reveal-background: {$fields['reveal_background']};
\$reveal-width: {$fields['reveal_width']};
\$reveal-max-width: {$fields['reveal_max_width']};
\$reveal-padding: {$fields['reveal_padding']};
\$reveal-border: {$fields['reveal_border']};
\$reveal-radius: {$fields['reveal_radius']};
\$reveal-zindex: {$fields['reveal_zindex']};
\$reveal-overlay-background: {$fields['reveal_overlay_background']};

// 48. Slider
// ----------

\$slider-width-vertical: {$fields['slider_width_vertical']};
\$slider-transition: {$fields['slider_transition']};
\$slider-height: {$fields['slider_height']};
\$slider-background: {$fields['slider_background']};
\$slider-fill-background: {$fields['slider_fill_background']};
\$slider-handle-height: {$fields['slider_handle_height']};
\$slider-handle-width: {$fields['slider_handle_width']};
\$slider-handle-background: {$fields['slider_handle_background']};
\$slider-opacity-disabled: {$fields['slider_opacity_disabled']};
\$slider-radius: {$fields['slider_radius']};

// 49. Switch
// ----------

\$switch-background: {$fields['switch_background']};
\$switch-background-active: {$fields['switch_background_active']};
\$switch-height: {$fields['switch_height']};
\$switch-height-tiny: {$fields['switch_height_tiny']};
\$switch-height-small: {$fields['switch_height_small']};
\$switch-height-large: {$fields['switch_height_large']};
\$switch-radius: {$fields['switch_radius']};
\$switch-margin: {$fields['switch_margin']};
\$switch-paddle-background: {$fields['switch_paddle_background']};
\$switch-paddle-offset: {$fields['switch_paddle_offset']};
\$switch-paddle-radius: {$fields['switch_paddle_radius']};
\$switch-paddle-transition: {$fields['switch_paddle_transition']};



// 51. Tabs
// --------

\$tab-margin: {$fields['tab_margin']};
\$tab-background: {$fields['tab_background']};
\$tab-color: {$fields['tab_color']};
\$tab-background-active: {$fields['tab_background_active']};
\$tab-active-color: {$fields['tab_active_color']};
\$tab-item-font-size: {$fields['tab_item_font_size']};
\$tab-item-background-hover: {$fields['tab_item_background_hover']};
\$tab-item-padding: {$fields['tab_item_padding']};
\$tab-expand-max: {$fields['tab_expand_max']};
\$tab-content-background: {$fields['tab_content_background']};
\$tab-content-border: {$fields['tab_content_border']};
\$tab-content-color: {$fields['tab_content_color']};
\$tab-content-padding: {$fields['tab_content_padding']};


// 52. Thumbnail
// -------------

\$thumbnail-border: {$fields['thumbnail_border']};
\$thumbnail-margin-bottom: {$fields['thumbnail_margin_bottom']};
\$thumbnail-shadow: {$fields['thumbnail_shadow']};
\$thumbnail-shadow-hover: {$fields['thumbnail_shadow_hover']};
\$thumbnail-transition: {$fields['thumbnail_transition']};
\$thumbnail-radius: {$fields['thumbnail_radius']};


// 53. Title Bar
// -------------

\$titlebar-background: {$fields['titlebar_background']};
\$titlebar-color: {$fields['titlebar_color']};
\$titlebar-padding: {$fields['titlebar_padding']};
\$titlebar-text-font-weight: {$fields['titlebar_text_font_weight']};
\$titlebar-icon-color: {$fields['titlebar_icon_color']};
\$titlebar-icon-color-hover: {$fields['titlebar_icon_color_hover']};
\$titlebar-icon-spacing: {$fields['titlebar_icon_spacing']};


// 54. Tooltip
// -----------

\$has-tip-cursor: {$fields['has_tip_cursor']};
\$has-tip-font-weight: {$fields['has_tip_font_weight']};
\$has-tip-border-bottom: {$fields['has_tip_border_bottom']};
\$tooltip-background-color: {$fields['tooltip_background_color']};
\$tooltip-color: {$fields['tooltip_color']};
\$tooltip-padding: {$fields['tooltip_padding']};
\$tooltip-max-width: {$fields['tooltip_max_width']};
\$tooltip-font-size: {$fields['tooltip_font_size']};
\$tooltip-pip-width: {$fields['tooltip_pip_width']};
\$tooltip-pip-height: {$fields['tooltip_pip_height']};
\$tooltip-radius: {$fields['tooltip_radius']};

// 55. Top Bar
// -----------

\$topbar-padding: {$fields['topbar_padding']};
\$topbar-background: {$fields['topbar_background']};
\$topbar-submenu-background: {$fields['topbar_submenu_background']};
\$topbar-title-spacing: {$fields['topbar_title_spacing']};
\$topbar-input-width: {$fields['topbar_input_width']};
\$topbar-unstack-breakpoint: {$fields['topbar_unstack_breakpoint']};

// 56. Xy Grid
// -----------

\$xy-grid: {$fields['xy_grid']};
\$grid-container: {$fields['grid_container']};
\$grid-columns: {$fields['grid_columns']};
\$grid-margin-gutters: (
    small: 20px,
    medium: 30px
);
\$grid-padding-gutters: {$fields['grid_padding_gutters']};
\$grid-container-padding: {$fields['grid_container_padding']};
\$grid-container-max: {$fields['grid_container_max']};
\$xy-block-grid-max: {$fields['xy_block_grid_max']};

";



$foundation_includes = '

@include foundation-global-styles;
@include foundation-grid;
@include foundation-xy-grid-classes(
  $base-grid: true,
  $margin-grid: true,
  $padding-grid: true,
  $block-grid: true,  // - causes line 78 warning : empty value (?) sent to rem-calc()
  $collapse: true,
  $offset: true,
  $vertical-grid: true,
  );

// @include foundation-off-canvas;  // -- breaks

@include foundation-typography;
@include foundation-forms;
@include foundation-button;
@include foundation-accordion;
@include foundation-accordion-menu;
@include foundation-badge;
@include foundation-breadcrumbs;
@include foundation-button-group;
@include foundation-callout;
@include foundation-card;
@include foundation-close-button;


@include foundation-menu;
@include foundation-menu-icon;
@include foundation-drilldown-menu;
@include foundation-dropdown;
@include foundation-dropdown-menu;
@include foundation-responsive-embed;
@include foundation-label;
@include foundation-media-object;
@include foundation-orbit;
@include foundation-pagination;
@include foundation-progress-bar;
@include foundation-slider;
@include foundation-sticky;
@include foundation-reveal;
@include foundation-switch;
@include foundation-table;
@include foundation-tabs;
@include foundation-thumbnail;
@include foundation-title-bar;
@include foundation-tooltip;
@include foundation-top-bar;
@include foundation-visibility-classes;
    

';


$foundation_for_compilation = "$foundation_settings $foundation_includes";
//$foundation_for_compilation = "$working_settings $foundation_includes";
//$foundation_for_compilation = "$foundation_settings";