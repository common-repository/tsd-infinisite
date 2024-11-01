<?

namespace TSD_Infinisite;

class Footer
{

    public $img;
    public $primary_menu;
    public $secondary_menu;
    public $cta_menu;
    public $primary_content;
    public $secondary_content;
    public $background_options;
    public $social_networks;

    public $inline_styles;
    public $inline_classes;
    public $responsive_template_html;

    private $display_inline;
    private $layout_id;

    private $device_templates;


    public function __construct($atts = [])
    {

        // TODO: can we optimize this into one big call?

        $footer_image = \wp_get_attachment_image_src(get_option("options_footer_background_options_image"), 'full');

        $this->img = get_field("footer_logo", "option");
        $this->primary_menu = get_field("primary_footer_menu", "option");
        $this->secondary_menu = get_field("secondary_footer_menu", "option");
        $this->cta_menu = get_field("cta_footer_menu", "option");
        $this->primary_content = get_field("footer_primary_content_area", "option");
        $this->secondary_content = get_field("footer_secondary_content_area", "option");
        $this->social_networks = Acme::prep_social_media_fields_for_templating(get_field('footer_social_media_links', 'option'));
        $this->background_options = get_field('footer_background_options', 'option');
        $this->device_templates = get_field('footer_device_templates', 'option');

        // todo: custom style support? page / post type / global scss box?
        $this->inline_styles = 'feature coming soon?';

        if (is_array($atts))
            if ($atts['id'])
                $this->id = $atts['id'];

        if (is_numeric($atts)) $this->id = $atts;

        // determine if id uses inline or outside footer
        // set up IS backend row styless
        // render twig templates for social media icons
        // render twig template for

        $this->inline_styles = $this->prep_inline_styles();
        $this->inline_classes = $this->prep_inline_classes();

        $this->display_inline = Acme::check_for_inline_display('footer', $this->id);
        $this->responsive_template_html = $this->build_responsive_template_html();


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

        if(!count($styles)) return $return;

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
                    'primary_menu' => $this->primary_menu,
                    'secondary_menu' => $this->secondary_menu,
                    'img' => $this->img,
                    'primary_content' => $this->primary_content,
                    'background_options' => $this->background_options,
                    'secondary_content' => $this->secondary_content,
                    'social_media' => $this->build_responsive_social_media_html(),
                ]
            ]);

    }

    private function build_responsive_social_media_html()
    {

        // dont' run if we don't have networks
        if(!$this->social_networks) return;

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

    public function get_footer()
    {
        return "
            <div style='margin-top: auto; $this->inline_styles' class='$this->inline_classes'>
                $this->responsive_template_html
            </div>
        ";
    }

    public function hide(){

        /**
         * checking if we should hide the footer on this page
         */

        $hide_globally = false;

        $hide_on_post_type = false;

        $hide_on_taxononomy = false;

        $hide_on_single_post = get_field('hide_footer', $this->id);

        if($hide_globally || $hide_on_post_type || $hide_on_taxononomy || $hide_on_single_post)
            return true;

        return false;


    }

    public function get_inside_footer()
    {
        if ($this->display_inline && !$this->hide())
            return $this->get_footer();
    }

    public function get_outside_footer()
    {
        if (!$this->display_inline && !$this->hide())
            return $this->get_footer();
    }


}