<?

/*
Plugin Name:  TSD InfiniSite
Plugin URI:   http://infinisite.wpengine.com/
Description:  TSD Page Builder Plugin
Version:      0.9985
Author:       Top Shelf Digital
Author URI:   https://topshelfdesign.net/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
*/

defined('ABSPATH') or die('No script kiddies please!');


define('INFINISITE_DIR', plugins_url('/', __FILE__));
define("INFINISITE_URI", plugin_dir_path(__FILE__));
define("THEME_URI", get_theme_file_path() . '/');
define("THEME_DIR", get_stylesheet_directory_uri() . '/');

// for dirty ugly hack

define('WP_FORM_PLUGIN_DIR', '/wp-content/plugins/WP_Estimation_Form');


// 1. customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');

function my_acf_settings_path($path)
{
    // update path
    return INFINISITE_DIR . '/assets/acf/';
}

// Enable the option show in rest
add_filter('acf/rest_api/field_settings/show_in_rest', '__return_true');

// Enable the option edit in rest
add_filter('acf/rest_api/field_settings/edit_in_rest', '__return_true');

// 2. customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');

function my_acf_settings_dir($dir)
{
    // update path
    return INFINISITE_DIR . '/assets/acf/';
}


// 3. Hide ACF field group menu item
add_filter('acf/settings/show_admin', '__return_false');


// 4. Include ACF
include_once('assets/acf/acf.php');

// 5. Include Composer and our Classess
include_once('vendor/autoload.php');
include_once('class/_loader.php');

use TSD_Infinisite\Boilerplate;
use TSD_Infinisite\AdminNotice;
use TSD_Infinisite\Acme;
use TSD_Infinisite\Data_Moves;

// 6. Define our Constants
Boilerplate::define_constants();


// This is an old debug function that lets us manually update the stylesheet
// Acme::stylesheet_update_check();

function IS_Activation()
{

    /**
     * PLUGIN ACTIVATION
     *
     * In this function, we create defaults for the IS Foundation and
     * color palette.
     */

    // we need to get the palette and update the stylesheet
    Acme::set_is_color_palette();
    $palette = new \TSD_Infinisite\Palette();
    Data_Moves::cpt_from_repeater_to_option_sub_page();
    Acme::update_is_stylesheets();
}


register_activation_hook(__FILE__, 'IS_Activation');


add_action("acf/init", function () {
    // register_built_post_types needs to go at the end of the init stuff!!!!
    TSD_Infinisite\CPT::register_built_post_types();
}, 99);

add_action("acf/init", function () {


    TSD_Infinisite\CPT::register_post_type_builder();
    TSD_Infinisite\Sidebar::register_global_sidebar_options();


    TSD_Infinisite\Option::create_global_options();
    TSD_Infinisite\Social::register_global_options();

    TSD_Infinisite\Option::register_acf_global_options_pages();

    TSD_Infinisite\Taxonomy_Builder::register_taxonomy_builder();
    TSD_Infinisite\Foundation::create_foundation_configuration();
    TSD_Infinisite\Page_Builder::create_pagebuilder_layout();

    TSD_Infinisite\Taxonomy_Builder::register_built_taxonomies();


    TSD_Infinisite\Option::create_image_options();
    TSD_Infinisite\Option::register_image_thumbnail_sizes();


    TSD_Infinisite\Option::create_header_options();
    TSD_Infinisite\Option::create_footer_options();


    TSD_Infinisite\Editor::remove_editor_from_page_and_post_type();


}, 20);


/**
 *
 * actions and filters - most of the plugin work is done by hooking
 * into the WP actions to create our customized functions
 *
 */

add_action('wp_enqueue_scripts', 'TSD_Infinisite\Boilerplate::enqueue_assets');
add_action('wp_enqueue_scripts', 'TSD_Infinisite\Editor::enqueue_editor_styles');
add_action('admin_enqueue_scripts', 'TSD_Infinisite\Boilerplate::admin_assets');

add_action('after_setup_theme', 'TSD_Infinisite\Menu::register_menus');


// this is all for the wysiwyg editor, so we don't need to register it on the backend
if (is_admin()):
    add_filter('tiny_mce_before_init', 'TSD_Infinisite\Editor::tinymce_cache_buster');
    add_action('tiny_mce_before_init', 'TSD_Infinisite\Editor::update_formats_and_colors');
    add_action('mce_buttons_3', 'TSD_Infinisite\Editor::toolbar_row_3');
endif;

// Add the IS links to the top admin bar
add_action('admin_bar_menu', 'TSD_Infinisite\WP_Backend_Modification::add_IS_admin_toolbars', 100);

// Add the IS stylesheets to the WYSIWYG editor
add_action('admin_init', 'TSD_Infinisite\Editor::admin_init_fn');


add_action('admin_notices', [AdminNotice::getInstance(), 'displayAdminNotice']);


/**
 * Page specific hooks
 *
 * This is how we set certain hooks to fire only on certain pages, like upgrading
 * foundation and the other IS styles
 */

if (isset($_GET['page'])):
    if ($_GET['page'] == 'acf-options-template-editor')
        add_action('acf/save_post', 'TSD_Infinisite\Template::update_is_custom_template_styles');


    if ($_GET['page'] == 'is-display-settings'):
        add_action('acf/save_post', 'TSD_Infinisite\Palette::update_from_acf_save', 20);
        add_action('acf/save_post', 'TSD_Infinisite\Acme::check_IS_palette_for_blanks_and_rebuild', 20);
        add_action('acf/save_post', 'TSD_Infinisite\Acme::update_IS_app_scss', 20);
        add_action('acf/save_post', 'TSD_Infinisite\Foundation::update_scss', 20);
        add_action('acf/save_post', 'TSD_Infinisite\Option::update_typography_options_scss', 20);
        add_action('acf/save_post', 'Acme::update_IS_utility_classes', 20);
    endif;


    if ($_GET['page'] == 'acf-options-foundation'):
        add_action('acf/save_post', 'TSD_Infinisite\Foundation::update_scss', 20);
        add_action('acf/save_post', 'Acme::check_IS_palette_for_blanks_and_rebuild', 20);
        add_action('acf/save_post', 'Acme::update_IS_utility_classes', 20);
    endif;
endif;


/**
 * PLUGIN DEBUG PAGE AREA
 *
 * TODO: clean this up a bit.
 */

add_action('wp_loaded', function () {

    if (isset($_GET['init_test'])):

        include INFINISITE_URI . 'assets/acme/foundation_inital_setup.php';

        die();

    endif;

    if (isset($_GET['gf_test'])):

        $all_forms = GFAPI::get_forms();

        foreach ($all_forms as $form):
            print $form['id'];
            print $form['title'];
            \Acme::dbg($form);
        endforeach;

        die();

    endif;

    if (isset($_GET['foundation_debug'])):

        Acme::header();
        include INFINISITE_URI . 'components/header-footer/header.php';
        include(INFINISITE_URI . 'assets/acme/foundation_debug.php');
        include INFINISITE_URI . 'components/header-footer/footer.php';
        Acme::footer();

        die();

    endif;

    if (isset($_GET['php_test'])):

        Acme::header();
        include INFINISITE_URI . 'components/header-footer/header.php';
        include(INFINISITE_URI . 'assets/acme/php_test.php');
        include INFINISITE_URI . 'components/header-footer/footer.php';
        Acme::footer();

        die();

    endif;

    if (isset($_GET['foundation_settings'])):

        Acme::header();
        include INFINISITE_URI . 'components/header-footer/header.php';
        include(INFINISITE_URI . '/assets/acme/foundation_settings.php');
        include INFINISITE_URI . 'components/header-footer/footer.php';
        Acme::footer();

        die();

    endif;

    if (isset($_GET['twig_debug'])):

        Acme::header();
        include INFINISITE_URI . 'components/header-footer/header/default.php';
        include(INFINISITE_URI . '/assets/acme/twig_debug.php');
        include INFINISITE_URI . 'components/header-footer/footer/default.php';
        Acme::footer();

        die();

    endif;


    if (isset($_GET['color_test'])):

        Acme::header();


//        include INFINISITE_URI . 'components/header-footer/header.php';
        include(INFINISITE_URI . '/assets/acme/color_test.php');
        include INFINISITE_URI . 'components/header-footer/footer.php';
        Acme::footer();

        die();

    endif;


    if (isset($_GET['module_test'])):

        Acme::header();
//        include INFINISITE_URI . 'components/header-footer/header.php';
        include(INFINISITE_URI . '/assets/acme/module_test.php');
        include INFINISITE_URI . 'components/header-footer/footer.php';
        Acme::footer();

        die();

    endif;


    if (isset($_GET['search_test'])):

        Acme::header();
//        include INFINISITE_URI . 'components/header-footer/header.php';
        include(INFINISITE_URI . '/assets/acme/search_test.php');
        include INFINISITE_URI . 'components/header-footer/footer.php';
        Acme::footer();

        die();

    endif;


    if (isset($_GET['update_posts'])):

        Acme::header();
//        $header = new \TSD_Infinisite\Header(false);
//        $header->display_outside();
        include INFINISITE_URI . 'components/header-footer/header.php';
        include(INFINISITE_URI . '/assets/acme/update_posts.php');
        include INFINISITE_URI . 'components/header-footer/footer.php';
        Acme::footer();

        die();

    endif;

});