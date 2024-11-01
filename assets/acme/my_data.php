@import 'foundation.scss';

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

@import '../util/util';

// 1. Global
// ---------
$global-font-size: 150%;
$global-width: rem-calc(1500);
$global-lineheight: 1.5;
$foundation-palette: (
primary: #eab61c,
secondary: #03454c,
success: #3adb76,
warning: #ffae00,
alert: #cc4b37,
);
$light-gray: #e6e6e6;
$medium-gray: #cacaca;
$dark-gray: #8a8a8a;
$black: #0a0a0a;
$white: #fefefe;

$body-background: #fefefe;
$body-font-color: #0a0a0a;

$body-font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;
$body-antialiased: 1;
$global-margin: 1rem;
$global-padding: 1rem;
$global-position: 1rem;
$global-weight-normal: normal;
$global-weight-bold: bold;
$global-radius: 0;
$global-menu-padding: 1.7rem 1rem;
$global-menu-nested-margin: 1rem;
$global-text-direction: ltr;
$global-flexbox: 1;

// we aren't supporting this right now
$global-prototype-breakpoints: false;

$global-button-cursor: auto;
$global-color-pick-contrast-tolerance: 0;
$print-transparent-backgrounds: 1;


@include add-foundation-colors;

// 2. Breakpoints
// --------------

$breakpoints: (
small: 0,
medium: 640px,
large: 1024px,
xlarge: 1200px,
xxlarge: 1440px,
);
$print-breakpoint: large;
$breakpoint-classes: (small medium large xlarge xxlarge);


// 3. The Grid
// Sadly, we're not compiling this yet - just getting these vars in place for fun
// the only thing we really want is the grid row width
// -----------

$grid-row-width: $global_width;

$grid-column-count: 12;
$grid-column-gutter: (
small: 15px,
medium: 30px,
);
$grid-column-align-edge: 1;
$grid-column-alias: 'columns';
$block-grid-max: 8';

// 4. Base Typography test
// ------------------

$header-font-family: 'Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;
$header-font-weight: normal;

$header-font-style: normal;
$font-family-monospace: Consolas, 'Liberation Mono', Courier, monospace;
$header-color: inherit;
$header-lineheight: 1.4;
$header-margin-bottom: 0.5rem;
$header-styles: (small: (
'h1': ('font_size' : 24),
'h2': ('font_size' : 20),
'h3': ('font_size' : 19),
'h4': ('font_size' : 18),
'h5': ('font_size' : 17),
'h6': ('font_size' : 16),
),
medium: (
'h1': ('font_size' : 48),
'h2': ('font_size' : 40),
'h3': ('font_size' : 31),
'h4': ('font_size' : 25),
'h5': ('font_size' : 20),
'h6': ('font_size' : 16),
),
);
$header-text-rendering: optimizeLegibility;
$small-font-size: 80%;
$header-small-font-color: $medium_gray;
$paragraph-lineheight: 1.6;
$paragraph-margin-bottom: 1rem;
$paragraph-text-rendering: optimizeLegibility;
$code-color: #0a0a0a;
$code-font-family: Consolas, 'Liberation Mono', Courier, monospace;
$code-font-weight: normal;
$code-background: #e6e6e6;
$code-border: 1px solid $medium-gray;
$code-padding: rem_calc(2 5 1);
$anchor-color: #eab61c;
$anchor-color-hover: scale_color($anchor-color, $lightness = -14%);
$anchor-text-decoration: none;
$anchor-text-decoration-hover: none;
$hr-width: rem-calc(1500);
$hr-border: 1px solid $medium-gray;
$hr-margin: rem_calc(20) auto;
$list-lineheight: 1.6;
$list-margin-bottom: 1rem;
$list-style-type: disc;
$list-style-position: outside;
$list-side-margin: 1.25rem;
$list-nested-side-margin: 1.25rem;
$defnlist-margin-bottom: 1rem;
$defnlist-term-weight: bold;
$defnlist-term-margin-bottom: 0.3rem;
$blockquote-color: #8a8a8a;
$blockquote-padding: rem_calc(9 20 0 19);
$blockquote-border: 1px solid $medium-gray;
$cite-font-size: rem_calc(13);
$cite-color: #8a8a8a;
$cite-pseudo-content: \2014 \0020;
$keystroke-font: Consolas, 'Liberation Mono', Courier, monospace;
$keystroke-color: #0a0a0a;
$keystroke-background: #e6e6e6;
$keystroke-padding: rem_calc(2 4 0);
$keystroke-radius: 0;
$abbr-underline: 1px dotted $medium-gray;

// 5. Typography Helpers
// ---------------------

$lead-font-size: $global_font_size * 1.25;
$lead-lineheight: 1.6;
$subheader-lineheight: 1.4;
$subheader-color: #8a8a8a;
$subheader-font-weight: normal;
$subheader-margin-top: 0.2rem;
$subheader-margin-bottom: 0.5rem;
$stat-font-size: 2.5rem;

// 6. Abide
// --------


$abide-inputs: 1;
$abide-labels: 1;
$input-background-invalid: #cc4b37;
$form-label-color-invalid: #cc4b37;
$input-error-color: #cc4b37;
$input-error-font-size: rem-calc(12);
$input-error-font-weight: bold;

// 7. Accordion
// ------------


$accordion-background: #fefefe;
$accordion-plusminus: true;
$accordion-title-font-size: rem_calc(12);
$accordion-item-color: #eab61c;
$accordion-item-background-hover: #e6e6e6;
$accordion-item-padding: 1.25rem 1rem;
$accordion-content-background: #fefefe;
$accordion-content-border: 1px solid $medium-gray;
$accordion-content-color: #0a0a0a;
$accordion-content-padding: 1rem;

// 8. Accordion Menu
// -----------------


$accordionmenu-padding: 1.7rem 1rem;
$accordionmenu-nested-margin: 1rem;
$accordionmenu-submenu-padding: 1.7rem 1rem;
$accordionmenu-arrows: 1;
$accordionmenu-arrow-color: #eab61c;
$accordionmenu-item-background: null;
$accordionmenu-border: null;
$accordionmenu-submenu-toggle-background: null;
$accordion-submenu-toggle-border: null;
$accordionmenu-submenu-toggle-width: 40px;
$accordionmenu-submenu-toggle-height: 40px;
$accordionmenu-arrow-size: 6px;

// 9. Badge
// --------


$badge-background: #eab61c;
$badge-color: #fefefe;
$badge-color-alt: #0a0a0a;
$badge-palette: (
primary: #eab61c,
secondary: #03454c,
success: #3adb76,
warning: #ffae00,
alert: #cc4b37,
);
$badge-padding: 0.3em;
$badge-minwidth: 2.1em;
$badge-font-size: 0.6rem;

// 10. Breadcrumbs
// ---------------


$breadcrumbs-margin: 0 0 $global_margin 0;
$breadcrumbs-item-font-size: rem_calc(11);
$breadcrumbs-item-color: #eab61c;
$breadcrumbs-item-color-current: #0a0a0a;
$breadcrumbs-item-color-disabled: #cacaca;
$breadcrumbs-item-margin: 0.75rem;
$breadcrumbs-item-uppercase: true;
$breadcrumbs-item-separator: true;
$breadcrumbs-item-separator-item: sep item;
$breadcrumbs-item-separator-item-rtl: sep item rtl;
$breadcrumbs-item-separator-color: #cacaca;

// 11. Button
// ----------


$button-font-family: inherit;
$button-padding: 0.85em 1em;
$button-margin: 0 0 $global_margin 0;
$button-fill: solid;
$button-background: #eab61c;
$button-background-hover: scale_color($button_background, $lightness = -15%);
$button-color: #fefefe;
$button-color-alt: #0a0a0a;
$button-radius: 0;
$button-hollow-border-width: 1px;
$button-sizes: (
tiny: 0.6rem,
small: 0.75rem,
default: 0.9rem,
large: 1.25rem,
);
$button-palette: (
primary: #eab61c,
secondary: #03454c,
success: #3adb76,
warning: #ffae00,
alert: #cc4b37,
);
$button-opacity-disabled: 0.25;
$button-background-hover-lightness: -20%;
$button-hollow-hover-lightness: -50%;
$button-transition: background_color 0.25s ease_out, color 0.25s ease_out;

// 12. Button Group
// ----------------


$buttongroup-margin: 1rem;
$buttongroup-spacing: 1px;
$buttongroup-child-selector: '.button';
$buttongroup-expand-max: 6;
$buttongroup-radius-on-each: true;

// 13. Callout
// -----------


$callout-background: #fefefe;
$callout-background-fade: 85%;
$callout-border: 1px solid rgba($medium-gray, 0.25);
$callout-margin: 0 0 1rem 0;
$callout-padding: 1rem;
$callout-font-color: #0a0a0a;
$callout-font-color-alt: #fefefe;
$callout-radius: 0;
$callout-link-tint: 30%;

// 14. Card
// --------


$card-background: #fefefe;
$card-font-color: #0a0a0a;
$card-divider-background: #e6e6e6;
$card-border: 1px solid $medium-gray;
$card-shadow: none;
$card-border-radius: 0;
$card-padding: 1rem;
$card-margin-bottom: 1rem;

// 15. Close Button
// ----------------

$closebutton-position: right top;
$closebutton-offset-horizontal: (
small: 0.66rem,
medium: 1rem,
);
$closebutton-offset-vertical: (
small: 0.33em,
medium: 0.5rem,
);
$closebutton-size: (
small: 1.5em,
medium: 2em,
);
$closebutton-lineheight: 1;

$closebutton-color: #8a8a8a;
$closebutton-color-hover: #0a0a0a;

// 16. Drilldown
// -------------



$drilldown-transition: transform 0.15s linear;
$drilldown-arrows: true;
$drilldown-padding: 1.7rem 1rem;
$drilldown-nested-margin: 0;
$drilldown-background: #fefefe;
$drilldown-submenu-padding: 1.7rem 1rem;
$drilldown-submenu-background: #fefefe;
$drilldown-arrow-color: #eab61c;
$drilldown-arrow-size: 6px;

// 17. Dropdown
// ------------


$dropdown-padding: 1rem;
$dropdown-background: #fefefe;
$dropdown-border: 1px solid $medium-gray;
$dropdown-font-size: 1rem;
$dropdown-width: 300px;
$dropdown-radius: 0;
$dropdown-sizes: (
tiny: 100px,
small: 200px,
large: 400px,
);

// 18. Dropdown Menu
// -----------------


$dropdownmenu-arrows: true;
$dropdownmenu-arrow-color: #eab61c;
$dropdownmenu-arrow-size: 6px;
$dropdownmenu-arrow-padding: 1.5rem;
$dropdownmenu-min-width: 200px;
$dropdownmenu-background: #fefefe;
$dropdownmenu-submenu-background: #fefefe;
$dropdownmenu-padding: 1.7rem 1rem;
$dropdownmenu-nested-margin: 0;
$dropdownmenu-submenu-padding: 1.7rem 1rem;
$dropdownmenu-border: 1px solid $medium-gray;
$dropdown-menu-item-color-active: #eab61c;
$dropdown-menu-item-background-active: transparent;

// 19. Flexbox Utilities
// ---------------------


$flex-source-ordering-count: 6;
$flexbox-responsive-breakpoints: true;

// 20. Forms
// ---------


$fieldset-border: 1px solid $medium-gray;
$fieldset-padding: rem_calc(20);
$fieldset-margin: rem_calc(18 0);
$legend-padding: rem_calc(0 3);
$form-spacing: rem_calc(16);
$helptext-color: #0a0a0a;
$helptext-font-size: rem_calc(13);
$helptext-font-style: italic;
$input-prefix-color: #0a0a0a;
$input-prefix-background: #e6e6e6;
$input-prefix-border: 1px solid $medium-gray;
$input-prefix-padding: 1rem;
$form-label-color: #0a0a0a;
$form-label-font-size: rem_calc(14);
$form-label-font-weight: normal;
$form-label-line-height: 1.8;
$select-background: #fefefe;
$select-triangle-color: #8a8a8a;
$select-radius: 0;
$input-color: #0a0a0a;
$input-placeholder-color: #cacaca;
$input-font-family: inherit;
$input-font-size: rem_calc(16);
$input-font-weight: normal;
$input-line-height: 1.5;
$input-background: #fefefe;
$input-background-focus: #fefefe;
$input-background-disabled: #e6e6e6;
$input-border: 1px solid $medium-gray;
$input-border-focus: 1px solid $medium-gray;
$input-padding: $form_spacing / 2;
$input-shadow: inset 0 1px 2px rgba($black, 0.1);
$input-shadow-focus: 0 0 5px $medium-gray;
$input-cursor-disabled: not_allowed;
$input-transition: box_shadow 0.5s, border_color 0.25s ease_in_out;
$input-number-spinners: true;
$input-radius: 0;
$form-button-radius: 0;

// 21. Label
// ---------


$label-background: #eab61c;
$label-color: #fefefe;
$label-color-alt: #0a0a0a;
$label-palette: (
primary: #eab61c,
secondary: #03454c,
success: #3adb76,
warning: #ffae00,
alert: #cc4b37,
);
$label-font-size: 0.8rem;
$label-padding: 0.33333rem 0.5rem;
$label-radius: 0;

// 22. Media Object
// ----------------


$mediaobject-margin-bottom: 1rem;
$mediaobject-section-padding: 1rem;
$mediaobject-image-width-stacked: 100%;

// 23. Menu
// --------


$menu-margin: 0;
$menu-nested-margin: 1rem;
$menu-items-padding: 1.7rem 1rem;
$menu-simple-margin: 1rem;
$menu-item-color-active: #fefefe;
$menu-item-background-active: #eab61c;
$menu-icon-spacing: 0.25rem;
$menu-item-background-hover: #e6e6e6;
$menu-state-back-compat: true;
$menu-centered-back-compat: true;
$menu-icons-back-compat: true;

// 24. Meter
// ---------


$meter-height: 1rem;
$meter-radius: $global-radius;
$meter-background: $medium-gray;
$meter-fill-good: $success-color;
$meter-fill-medium: $warning-color;
$meter-fill-bad: $alert-color;

// 25. Off-canvas
// --------------


$offcanvas-sizes: (
small: 250px,
);
$offcanvas-vertical-sizes: (
small: 250px,
);
$offcanvas-background: $light-gray;
$offcanvas-shadow: 0 0 10px rgba($black, 0.7);
$offcanvas-inner-shadow-size: 20px;
$offcanvas-inner-shadow-color: rgba($black, 0.25);
$offcanvas-overlay-zindex: 11;
$offcanvas-push-zindex: 12;
$offcanvas-overlap-zindex: 13;
$offcanvas-reveal-zindex: 12;
$offcanvas-transition-length: 0.5s;
$offcanvas-transition-timing: ease;
$offcanvas-fixed-reveal: true;
$offcanvas-exit-background: rgba($white, 0.25);
$maincontent-class: off-canvas-content;

// 26. Orbit
// ---------


$orbit-bullet-background: $medium-gray;
$orbit-bullet-background-active: $dark-gray;
$orbit-bullet-diameter: 1.2rem;
$orbit-bullet-margin: 0.1rem;
$orbit-bullet-margin-top: 0.8rem;
$orbit-bullet-margin-bottom: 0.8rem;
$orbit-caption-background: rgba($black, 0.5);
$orbit-caption-padding: 1rem;
$orbit-control-background-hover: rgba($black, 0.5);
$orbit-control-padding: 1rem;
$orbit-control-zindex: 10;

// 27. Pagination
// --------------


$pagination-font-size: rem-calc(14);
$pagination-margin-bottom: $global-margin;
$pagination-item-color: $black;
$pagination-item-padding: rem-calc(3 10);
$pagination-item-spacing: rem-calc(1);
$pagination-radius: $global-radius;
$pagination-item-background-hover: $light-gray;
$pagination-item-background-current: $primary-color;
$pagination-item-color-current: $white;
$pagination-item-color-disabled: $medium-gray;
$pagination-ellipsis-color: $black;
$pagination-mobile-items: false;
$pagination-mobile-current-item: false;
$pagination-arrows: true;

// 28. Progress Bar
// ----------------


$progress-height: 1rem;
$progress-background: $medium-gray;
$progress-margin-bottom: $global-margin;
$progress-meter-background: $primary-color;
$progress-radius: $global-radius;

// 46. Responsive Embed
// --------------------

$responsive-embed-margin-bottom: rem_calc(16);
$responsive-embed-ratios: (
default: 4 by 3,
widescreen: 16 by 9,
);

// 47. Reveal
// ----------


$reveal-background: $white;
$reveal-width: 600px;
$reveal-max-width: $global-width;
$reveal-padding: $global-padding;
$reveal-border: 1px solid $medium-gray;
$reveal-radius: $global-radius;
$reveal-zindex: 1005;
$reveal-overlay-background: rgba($black, 0.45);

// 48. Slider
// ----------

$slider-width-vertical: 0.5rem;
$slider-transition: all 0.2s ease-in-out;
$slider-height: 0.5rem;
$slider-background: $light-gray;
$slider-fill-background: $medium-gray;
$slider-handle-height: 1.4rem;
$slider-handle-width: 1.4rem;
$slider-handle-background: $primary-color;
$slider-opacity-disabled: 0.25;
$slider-radius: $global-radius;

// 49. Switch
// ----------

$switch-background: $medium-gray;
$switch-background-active: $primary-color;
$switch-height: 2rem;
$switch-height-tiny: 1.5rem;
$switch-height-small: 1.75rem;
$switch-height-large: 2.5rem;
$switch-radius: $global-radius;
$switch-margin: $global-margin;
$switch-paddle-background: $white;
$switch-paddle-offset: 0.25rem;
$switch-paddle-radius: $global-radius;
$switch-paddle-transition: all 0.25s ease-out;

// 50. Table
// ---------

$table-background: $white;
$table-color-scale: 5%;
$table-border: 1px solid smart-scale($table-background, $table-color-scale);
$table-padding: rem-calc(8 10 10);
$table-hover-scale: 2%;
$table-row-hover: darken($table-background, $table-hover-scale);
$table-row-stripe-hover: darken($table-background, $table-color-scale + $table-hover-scale);
$table-is-striped: true;
$table-striped-background: smart-scale($table-background, $table-color-scale);
$table-stripe: even;
$table-head-background: smart-scale($table-background, $table-color-scale / 2);
$table-head-row-hover: darken($table-head-background, $table-hover-scale);
$table-foot-background: smart-scale($table-background, $table-color-scale);
$table-foot-row-hover: darken($table-foot-background, $table-hover-scale);
$table-head-font-color: $body-font-color;
$table-foot-font-color: $body-font-color;
$show-header-for-stacked: false;
$table-stack-breakpoint: medium;

// 51. Tabs
// --------

$tab-margin: 0;
$tab-background: $white;
$tab-color: $primary-color;
$tab-background-active: $light-gray;
$tab-active-color: $primary-color;
$tab-item-font-size: rem-calc(12);
$tab-item-background-hover: $white;
$tab-item-padding: 1.25rem 1.5rem;
$tab-expand-max: 6;
$tab-content-background: $white;
$tab-content-border: $light-gray;
$tab-content-color: $body-font-color;
$tab-content-padding: 1rem;

// 52. Thumbnail
// -------------

$thumbnail-border: solid 4px $white;
$thumbnail-margin-bottom: $global-margin;
$thumbnail-shadow: 0 0 0 1px rgba($black, 0.2);
$thumbnail-shadow-hover: 0 0 6px 1px rgba($primary, 0.5);
$thumbnail-transition: box-shadow 200ms ease-out;
$thumbnail-radius: $global-radius;

// 53. Title Bar
// -------------

$titlebar-background: $black;
$titlebar-color: $white;
$titlebar-padding: 0.5rem;
$titlebar-text-font-weight: bold;
$titlebar-icon-color: $white;
$titlebar-icon-color-hover: $medium-gray;
$titlebar-icon-spacing: 0.25rem;

// 54. Tooltip
// -----------

$has-tip-cursor: help;
$has-tip-font-weight: $global-weight-bold;
$has-tip-border-bottom: dotted 1px $dark-gray;
$tooltip-background-color: $black;
$tooltip-color: $white;
$tooltip-padding: 0.75rem;
$tooltip-max-width: 10rem;
$tooltip-font-size: $small-font-size;
$tooltip-pip-width: 0.75rem;
$tooltip-pip-height: $tooltip-pip-width * 0.866;
$tooltip-radius: $global-radius;

// 55. Top Bar
// -----------

$topbar-padding: 0.5rem;
$topbar-background: $light-gray;
$topbar-submenu-background: $topbar-background;
$topbar-title-spacing: 0.5rem 1rem 0.5rem 0;
$topbar-input-width: 200px;
$topbar-unstack-breakpoint: medium;

// 56. Xy Grid
// -----------

$xy-grid: true;
$grid-container: $global-width;
$grid-columns: 12;
$grid-margin-gutters: (
small: 20px,
medium: 30px
);
$grid-padding-gutters: $grid-margin-gutters;
$grid-container-padding: $grid-padding-gutters;
$grid-container-max: $global-width;
$xy-block-grid-max: 8;







//  @include foundation-grid;  -- breaks
//  @include foundation-off-canvas;  -- breaks


@include foundation-global-styles;

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
