<?

namespace TSD_Infinisite;

class top_menu_bar_walker extends \Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"vertical menu\" data-submenu>\n";
    }
}

class drilldown_menu_walker extends \Walker_Nav_Menu
{

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"vertical menu nested\">\n";
    }
}

class accordion_menu_walker extends \Walker_Nav_Menu
{

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"vertical menu nested\">\n";
    }
}

class nested_menu_walker extends \Walker_Nav_Menu
{

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $class = 'vertical menu nested';

        $output .= "\n$indent<ul class=\"$class\">\n";
    }
}

class dropdown_menu_walker extends \Walker_Nav_Menu
{

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $class = 'vertical menu nested';

        $output .= "\n$indent<ul class=\"$class\">\n";
    }
}


//class add_xfn_as_link_class extends \Walker_Nav_Menu
//{
//    function start_el(&$output, $item, $depth, $args)
//    {
//        global $wp_query;
//        $indent = ($depth) ? str_repeat("\t", $depth) : '';
//        $class_names = $value = '';
//        $classes = empty($item->classes) ? array() : (array)$item->classes;
//        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
//        $class_names = ' class="' . esc_attr($class_names) . '"';
//
//        $output .= $indent . '<li id="menu-item-' . $item->ID . '"' . $value . $class_names . '>';
//
//        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
//        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
//        $attributes .= !empty($item->xfn) ? ' class="' . esc_attr($item->xfn) . '"' : '';
//        $attributes .= !empty($item->url) ? 'href="' . esc_attr($item->url) . '"' : '';
//
//
//        $description = !empty($item->description) ? '<span>' . esc_attr($item->description) . '</span>' : '';
//
//
//        $item_output = $args->before;
//        $item_output .= '<a' . $attributes . '><span data-hover="' . $item->title . '">';
//        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID);
//        $item_output .= $description . $args->link_after;
//        $item_output .= '</a>';
//        $item_output .= $args->after;
//
//        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
//    }
//}