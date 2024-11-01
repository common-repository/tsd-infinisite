<?

namespace TSD_Infinisite;

class Header
{

    public $primary_menu;
    public $secondary_menu;
    public $top_links;
    public $cta_menu;
    public $large_menu;
    public $large_menu_template;
    public $overlay_menu;
    public $overlay_menu_template;
    public $background_options;
    public $img;
    public $device_templates;
    public $social_networks;
    public $max_width;
    public $inline_styles;
    public $inline_classes;
    public $responsive_template_html;


    public function __construct($atts)
    {

        /**
         * Init new header object
         * @param $id       sets the page ID, used to determine placement
         */

        // the header used to just be initalized with an id.
        // TODO: refactor and destroy!
        if (is_numeric($atts))
            $this->id = $atts;

        if (is_array($atts)):
            if ($atts['id']) $this->layout_id = $atts['id'];
        endif;


        $this->primary_menu = get_field("primary_header_menu", "option");
        $this->secondary_menu = get_field("secondary_header_menu", "option");
        $this->top_links = get_field("top_links_header_menu", "option");
        $this->cta_menu = get_field("cta_header_menu", "option");
        $this->large_menu = get_field("large_header_menu", "option");
        $this->large_menu_template = get_field("large_header_menu_template", "option");
        $this->overlay_menu = get_field("overlay_header_menu", "option");
        $this->overlay_menu_template = get_field("overlay_header_menu_template", "option");
        $this->background_options = get_field("header_background_options", "option");
        $this->img = get_field("header_logo", "option");
        $this->device_templates = get_field("header_device_templates", "option");
        $this->social_networks = Acme::prep_social_media_fields_for_templating(get_field('header_social_media_links', 'option'));

        // setting up max-width
        $this->max_width = get_field("header_max_width", "option");


        $this->inline_styles = $this->prep_inline_styles();
        $this->inline_classes = $this->prep_inline_classes();

        $this->display_inline = Acme::check_for_inline_display('header', $this->id);
        $this->responsive_template_html = $this->build_responsive_template_html();

    }

    public function hide()
    {

        /**
         * checking if we should hide the footer on this page
         */

        $hide_globally = false;

        $hide_on_post_type = false;

        $hide_on_taxononomy = false;

        $hide_on_single_post = get_field('hide_header', $this->id);

        if ($hide_globally || $hide_on_post_type || $hide_on_taxononomy || $hide_on_single_post)
            return true;

        return false;


    }


    private function prep_inline_styles()
    {

        $bg = $this->background_options;
        $styles = [];

        if ($bg['image']):
            $styles['background-image'] = "url({$bg['image']['url']})";
            $styles['background-position'] = "center";
            $styles['background-size'] = 'cover';
        endif;

        if ($bg['opacity'] && $bg['color']):
            $hex = Palette::get_hex_color_from_role($bg['color']);
            $rgba = Acme::hex2rgba($hex, $bg['opacity']);

            $styles['background-color'] = $rgba;
            $blend_mode = $bg['blending'] ? $bg['blending'] : "overlay";
            $styles['background-blend-mode'] = $blend_mode;
        endif;


        $return = '';

        if (!count($styles)) return $return;

        foreach ($styles as $property => $value)
            $return .= "$property: $value;";


        return $return;

    }

    private function prep_inline_classes()
    {

        $bg = $this->background_options;

        $classes = [];

        if ($bg['color'] && !$bg['opacity'])
            $classes[] = $bg['color'] . '-background';

        $return = '';

        foreach ($classes as $class)
            $return .= "$class ";

        return $return;


    }


    private function build_responsive_template_html()
    {

        return Acme::display_templates_per_device_size($this->device_templates,
            [
                'vars' => [
                    'img' => $this->img,
                    'primary_menu' => $this->primary_menu,
                    'secondary_menu' => $this->secondary_menu,
                    'cta_menu' => $this->cta_menu,
                    'overlay_menu' => $this->overlay_menu,
//                    'sticky' => Acme::is_header_sticky($this->ID),
                    'social_media' => $this->build_responsive_social_media_html(),
                ]
            ]);

    }


    private function build_responsive_social_media_html()
    {

        // dont' run if we don't have networks
        if (!$this->social_networks) return;

        $loader = new \Twig_Loader_Filesystem('/');
        $twig = new \Twig_Environment($loader, [
            'debug' => true
        ]);
        $twig->addExtension(new \Twig_Extension_Debug());
        try {
            return $twig->render($this->social_networks['template'],
                [
                    'social' => $this->social_networks['select'],
                ]);
        } catch (exception $e) {
            return 'twig error';

        }
    }


    public function get_outside()
    {

        if($this->hide()) return false;
        if ($this->display_inline) return false;
        return $this->get_output_html();
    }

    public function display_outisde()
    {
        print $this->get_outside();
    }

    public function get_inline()
    {


        if($this->hide()) return false;
        if (!$this->display_inline) return false;

        return $this->get_output_html();

    }

    public function display_inline()
    {

        print $this->get_inline();
    }


    public function get_output_html()
    {
        return "
            <div style='$this->inline_styles' class='ispb_header_container cell $this->inline_classes'>
                $this->responsive_template_html
            </div>
        ";
    }

}