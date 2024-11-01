<?

namespace TSD_Infinisite;

class Menu
{

    static function register_menus()
    {

        register_nav_menu('header', __('Header Menu', 'theme-slug'));
    }

}