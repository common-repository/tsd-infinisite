<?

namespace TSD_Infinisite;

class WP_Backend_Modification
{

    static function add_IS_admin_toolbars($admin_bar)
    {


        $options_pages = Option::get_acf_options_page_data();

        $url_base = "/wp-admin/admin.php?page";

        $url = \site_url($url_base);

        $admin_bar->add_node([
            'id' => "is_options",
            'title' => 'InfiniSite Options',
            'href' => "$url=is-display-settings",
            'parent' => 'site-name'
        ]);

        $admin_bar->add_node([
            'id' => "is_options_child_link",
            'title' => 'Global IS Options',
            'href' => "$url=is-display-settings",
            'parent' => 'is_options'
        ]);

        foreach ($options_pages as $c => $page)
            $admin_bar->add_node([
                'id' => "is_options_page_{$c}",
                'title' => $page['menu_title'],
                'href' => "$url=acf-options-{$page['wp_admin_page_variable']}",
                'parent' => 'is_options'
            ]);

    }

}