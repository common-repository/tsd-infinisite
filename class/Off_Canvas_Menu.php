<?php

namespace TSD_Infinisite;

class Off_Canvas_Menu
{

    public function __construct()
    {

        $this->init_menus();
        $this->init_social_media();

        $this->filepath = INFINISITE_URI . 'components/mobile-menu/';


        // use our acf header social media select field as a lookup to grab
        // the records from the acf social media global options page

        if ($this->header_social_networks['select'])
            foreach ($this->header_social_networks['select'] as $header_network)
                foreach ($this->network_lookup as $network_info)
                    if ($header_network == $network_info['network'])
                        $this->social_networks_for_template[] = $network_info;


        // booting the twig environment, and building out the html templates

        $loader = new \Twig_Loader_Filesystem(INFINISITE_URI . 'twig/social_media');
        $twig = new \Twig_Environment($loader, [
            'debug' => true
        ]);
        $twig->addExtension(new \Twig_Extension_Debug());

        // someday we will print social media
//        $this->menu_html = $twig->render(
//            $this->header_social_networks['template'][$device_size],
//            ['social' => $this->ocial_networks_for_template]
//        );



        // $this->social_media_html = false;


    }

    private function init_menus()
    {
        $this->primary_menu = get_field("primary_header_menu", "option");
        $this->top_links = get_field("top_links_header_menu", "option");
        $this->large_menu = get_field("large_header_menu", "option");
        $this->large_menu_template = get_field("large_header_menu_template", "option");
        $this->img = get_field("header_logo", "option");
    }

    private function init_social_media()
    {
        $this->header_social_networks = get_field("header_social_media_links", "option");
        $this->network_lookup = Social::get_global_accounts();
        $this->social_networks_for_template = [];
    }

    public function print_menu($menu_name){

        $atts = 'data-accordion-menu data-submenu-toggle="true"';

        wp_nav_menu([
            'menu' => $menu_name,
            'menu_class' => 'vertical menu accordion-menu',
            'items_wrap' => '<ul id="%1$s" class="%2$s" ' . $atts . '>%3$s</ul>',
            'walker' => new drilldown_menu_walker()
        ]);

    }

}