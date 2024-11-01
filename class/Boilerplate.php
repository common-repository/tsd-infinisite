<?

namespace TSD_Infinisite;

class Boilerplate
{

    public static function define_constants()
    {


        define('INFINISITE_ASSETS', INFINISITE_DIR . 'assets');
        define('INFINISITE_JS', INFINISITE_ASSETS . '/js');
        define('INFINISITE_CSS', INFINISITE_ASSETS . '/css');
        define('INFINISITE_FONT', INFINISITE_ASSETS . '/font-awesome-5');

    }

    public static function enqueue_assets()
    {

        /******************
         * STYLES / CSS
         ******************/

        // fontello set
//        wp_enqueue_style('fontello', TSD_ASSETS . '/icon/css/fontello.css');

//        wp_enqueue_style('datepicker', 'https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.3/datepicker.min.css');

        if (file_exists(INFINISITE_URI . 'assets/css/is_foundation.css'))
            wp_enqueue_style('app_foundation', INFINISITE_CSS . '/is_foundation.css');

        if (file_exists(INFINISITE_URI . 'assets/css/app.css'))
            wp_enqueue_style('app', INFINISITE_CSS . '/app.css');

        if (file_exists(THEME_URI . 'assets/css/app.css'))
            wp_enqueue_style('child_theme_app', THEME_DIR . 'assets/css/app.css');

        if (file_exists(THEME_URI . 'assets/css/ie_fix.css'))
            wp_enqueue_style('child_theme_ie_fix', THEME_DIR . 'assets/css/ie_fix.css');

        // TODO: eliminate me
//        wp_enqueue_style('custom-text-styles-old', INFINISITE_CSS . '/editor.php');

        // commented out for debugging foundation cascade
        wp_enqueue_style('is-utility-classes', INFINISITE_CSS . '/is_utility_classes.css');
        wp_enqueue_style('is-text-styles', INFINISITE_CSS . '/is_text_styles.css');
        wp_enqueue_style('foundation-motion', 'https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.2.3/motion-ui.min.css');

        wp_enqueue_style('custom-foundation-styles', INFINISITE_CSS . '/is_foundation_styles.css');
        // TODO: what the heck is this? is this for the container?
        wp_enqueue_style('custom-template-styles', INFINISITE_CSS . '/is_custom_template_styles.css');
        wp_enqueue_style('font-awesome', INFINISITE_FONT . '/web-fonts-with-css/css/fontawesome-all.min.css');


        /******************
         * SCRIPTS / JS
         ******************/


        // Load Modernizr in the head...
        wp_enqueue_script('modernizr', INFINISITE_JS . '/modernizr.min.js', array(), '2.8.2');


//         Remove WordPress's jQuery and use our own...
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js', array(), '2.2.4');
//        wp_enqueue_script("jquery");

        // Load the complete version of Foundation (with all plugins)...
        wp_enqueue_script('foundation', INFINISITE_JS . '/foundation.min.js', array('jquery'), '6.2.4', true);
        wp_enqueue_script('foundation_motion', 'https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.2.3/motion-ui.min.js', array('foundation'), '1.2.3', true);

        // owl carousel
        wp_enqueue_style('owlcarousel', INFINISITE_CSS . '/owl.carousel.min.css', array('app'));
        wp_enqueue_style('owlcarousel-theme', INFINISITE_CSS . '/owl.theme.default.min.css', array('app'));
        wp_enqueue_script('owlcarousel', INFINISITE_JS . '/owl.carousel.min.js', array(), '2.2.1', true);

        // fancybox
        wp_enqueue_style('fancybox', INFINISITE_CSS . '/jquery.fancybox.min.css', array('app'));
        wp_enqueue_script('fancybox', INFINISITE_JS . '/jquery.fancybox.min.js', array('jquery'), '2.2.1');

        // parallax.js
        wp_enqueue_script('parallax', INFINISITE_JS . '/parallax.min.js', array('jquery'), '1.4.2');

        // Google Maps API
//        wp_enqueue_script('google-map-api', INFINISITE_JS . '/google-maps-api.js', array('jquery'), '3.0');
        // Maps InfoBox
//        wp_enqueue_script('google-infobox', INFINISITE_JS . '/infobox.js', array('jquery'), '3.0');

        wp_enqueue_script('scrollto', INFINISITE_JS . '/jquery.scrollTo.min.js', array(), '1.0.2');

        wp_enqueue_script("datepicker", INFINISITE_JS . '/datepicker.min.js', array('jquery'), false, true);

        wp_enqueue_script("smoothscroll-polyfill", 'https://cdnjs.cloudflare.com/ajax/libs/iamdustan-smoothscroll/0.4.0/smoothscroll.min.js', array('jquery'), false, true);


        // Theme JS
        wp_enqueue_script('is_js', INFINISITE_JS . '/app.js', array(), false, 1);

        if (file_exists(THEME_URI . 'assets/js/app.js'))
            wp_enqueue_script('is_child_js', THEME_DIR . 'assets/js/app.js', array(), false, 1);

//        wp_enqueue_script('page_builder', TSD_JS . '/page_builder_frontend.js', array(), false, true);


    }

    public static function admin_assets()
    {

        wp_enqueue_style('backend-scss', INFINISITE_CSS . '/backend.css');
        wp_enqueue_style('font-awesome', INFINISITE_FONT . '/web-fonts-with-css/css/fontawesome-all.min.css');
        // TODO:: get rid of me
//        wp_enqueue_style('custom-text-styles-old', INFINISITE_CSS . '/editor.php');
        add_editor_style(INFINISITE_CSS . '/is_utility_classes.css');
        add_editor_style(INFINISITE_CSS . '/is_text_styles.css');
        add_editor_style(INFINISITE_CSS . '/is_foundation_styles.css');
//        wp_enqueue_style('admin', TSD_CSS . '/admin.css');
//        wp_enqueue_script('page_builder', TSD_JS . '/page_builder_backend.js', array(), false, true);
        wp_enqueue_script("jquery");
        wp_enqueue_script('ace_min', INFINISITE_ASSETS . '/ace-builds/src-min/ace.js', array(), false, true);
        wp_enqueue_script('ace_min_emmet_snippets', INFINISITE_ASSETS . '/ace-builds/emmet-snippets.js', array(), false, true);
        wp_enqueue_script('ace_min_emmet', INFINISITE_ASSETS . '/ace-builds/src-min/ext-emmet.js', array(), false, true);

        wp_register_script('is_js', INFINISITE_JS . '/backend.app.js', array(), false, true);
        wp_localize_script('is_js', 'wpApiSettings', array(
            'root' => esc_url_raw(rest_url()),
            'nonce' => wp_create_nonce('wp_rest')
        ));
        wp_enqueue_script('is_js');
    }

}