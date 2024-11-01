<?

namespace TSD_Infinisite;

class Layout
{

    public $header;
    public $footer;
    public $sidebar;
    private $rows = [];
    private $css;
    private $scss;
    private $html;
    private $page_content;

    public $config = [
        [
            'post_options' => [
                'inline_footer' => false,
                'inline_header' => false,
                'hide_footer' => false,
                'hide_header' => false
            ]
        ]
    ];

    public function __construct($id = false)
    {

        $this->build_config($id);
        $this->header = new Header($id);
        $this->footer = new Footer($id);
        $this->sidebar = new Sidebar($id);

        $this->build_rows();
        $this->build_inline_css();
        $this->build_html();

        return;

    }

    private function build_config($id)
    {

        $this->config['id'] = $id;
        $post_fields = get_fields($id);


        $config_defaults_to_check = ['inline_haeder', 'inline_footer', 'hide_header', 'hide_footer'];

        foreach ($config_defaults_to_check as $check)
            if ($post_fields)
                if (array_key_exists($check, $post_fields))
                    $this->config['post_options'][$check] = $post_fields[$check];


        $this->config['post_type'] = get_post_type($id);

        $this->config['post_type_options'] = [
            'template' => get_field("field_is_cpt_{$this->config['post_type']}_template", "options")
        ];

        $this->config['acf_rows'] = $post_fields['rows'];

    }

    private function build_rows()
    {

        for ($i = 0; $i < count($this->config['acf_rows']); $i++)
            $this->rows[] = new Row($this, $i);

    }


    public function get_row_acf()
    {
        return $this->config['acf_rows'];
    }

    public function get_all_module_acf()
    {

        $rows = $this->config['acf_rows'];

        $return = [];

        foreach ($rows as $row)
            foreach ($row['cells'] as $cell):
                foreach ($cell['is_acf_fc_container'] as $module)
                    $return[] = $module;
            endforeach;


        return $return;


    }

    public function build_html()
    {

        $this->html .= $this->header->get_outside();

        $this->html .= "<div class='is-content-wrapper'>";
        $this->html .= "<div class='grid-container full'>";
        $this->html .= "<div class='grid-x'>";
        $this->html .= $this->sidebar->top_html;
        $this->html .= $this->sidebar->left_html;
        $this->html .= "<div class='is-page-builder-wrapper cell auto'>";

        /**
         *
         * This is where all the html in the builder is created.
         *
         * There are 4 levels to this page builder.
         *
         * The Layout
         *
         * The Row
         *
         * The Cell
         *
         * The Module
         *
         * Each of those is a php object. Each has a get_html() method.
         *
         * So, running the get_html on the row creates rows, and calls
         * get_html() on them, which causes the row to cycle through
         * its cells, which then causes the cell to call cycle through
         * its modules. The module builds out its html according to
         * its given template and returns that value to the cell, which
         * wraps up the output in the right cell, and returns it to the
         * row, which wraps it in the neccessary row classes and is then
         * added to the output of the page.
         *
         */


        $this->page_content = $this->get_single_view_content();

        foreach ($this->rows as $row):
            $this->page_content .= $row->get_html();
        endforeach;

        $this->html .= \apply_filters("is_page_content_filter", $this->page_content);

        $this->html .= "</div>";
        $this->html .= $this->sidebar->right_html;
        $this->html .= $this->sidebar->bottom_html;
        $this->html .= "</div>";
        $this->html .= "</div>";
        $this->html .= "</div>";
        $this->html .= $this->footer->get_outside_footer();

        $this->html .= $this->css;

    }

    private function get_single_view_content()
    {

        if (is_404()):

            ob_start();
            include(INFINISITE_URI . 'components/404.php');
            $this->html .= ob_get_clean();
            return true;

        endif;


        $custom_template = $this->get_custom_template_for_post();

        if(!$custom_template) return false;

        if (!file_exists($custom_template)) {
            if (is_user_logged_in())
                $this->html .= "<div class='callout alert'><p class='no-padding'>File \"$custom_template\" not found, please contact the website admin.</p></div>";
            return;
        }


        $temp = explode('.', $custom_template);
        $filetype = array_pop($temp);

        switch ($filetype):

            case 'php':
                ob_start();
                include($custom_template);
                $this->html .= ob_get_clean();
                break;

            case 'twig':



                $loader = new \Twig_Loader_Filesystem('/');
                $twig = new \Twig_Environment($loader);
                $twig->addExtension(new \Twig_Extension_Debug());
                $template_atts = [
                    'top_sidebar_html' => $this->sidebar->top_html,
                    'bottom_sidebar_html' => $this->sidebar->bottom_html,
                    'left_sidebar_html' => $this->sidebar->left_html,
                    'right_sidebar_html' => $this->sidebar->right_html,
                    'fields' => get_fields($this->config['id']),
                    'post' => get_post($this->config['id']),
                    'page_builder_html_output' => "<h1>Coming Soon!</h1>",
                ];


                try {
                    $this->html .= $twig->render($custom_template, $template_atts);
                } catch (Exception $e) {
                    if (!is_user_logged_in()):
                        // silenty fail for the front end users
                        $this->html .= '';
                        return false;
                    endif;
                    $this->html .= "Error at display_custom_template $e";
                }

                break;

            default:
                $this->html .= "No Template Type Found";
                break;

        endswitch;

        return '';
    }

    public function get_html()
    {

        return $this->html;

    }

    private function build_inline_css()
    {


        $breakpoints_small = 0;
        $breakpoints_medium = get_option("options_breakpoints_medium");
        $breakpoints_large = get_option("options_breakpoints_large");
        $breakpoints_xlarge = get_option("options_breakpoints_xlarge");
        $breakpoints_xxlarge = get_option("options_breakpoints_xxlarge");

        $this->scss .= "\$breakpoints: (";
        $this->scss .= "small: $breakpoints_small,";
        $this->scss .= "medium: $breakpoints_medium,";
        $this->scss .= "large: $breakpoints_large,";
        $this->scss .= "xlarge: $breakpoints_xlarge,";
        $this->scss .= "xxlarge: $breakpoints_xxlarge,";
        $this->scss .= ");";

        // including two libraries - breakpoints and colors.
        // more can be added
        $this->scss .= "@import 'util/util';\n";
        $this->scss .= "@import 'is_variables';\n";


        // part two

        $this->scss .= ".is-page-builder-wrapper {\n";

        // TODO: get global css code;


        $page_scss = get_field('scss_code', 2);

        if ($page_scss)
            $this->scss .= "\n\n" . $page_scss . "\n\n";


        if (count($this->rows)):

            foreach ($this->rows as $c => $row):

                $scss = $row->get_scss();

                // nth-of-type is on a 1 array
                $c = $c + 1;


                $this->scss .= "\t.row-wrapper:nth-of-type($c) .is_page_builder_row {\n";
                if ($scss['row'])
                    $this->scss .= "\n\n" . $scss['row'] . "\n\n";

                foreach ($scss['cells'] as $d => $cell):

                    // again, we're on nth-of-type notation so we increment the index value
                    $d = $d + 1;


                    // if we have an inline header, we have an extra element in our row
                    // so we need to incriment the counter by an extra integer
                    if ($d == 1 && $this->header->display_inline)
                        $d++;


                    $this->scss .= "\t\t & > [data-ispb-cell]:nth-of-type($d) {\n";
                    if ($cell)
                        $this->scss .= "\n\n" . $cell . "\n\n";
                    $this->scss .= "\t\t" . "}\n";

                endforeach;
                // closing the row
                $this->scss .= "\t}\n";

            endforeach;
        endif;

        // closing the wrapper
        $this->scss .= "}";


        // part three
        // create our compiler, set the "import paths" and feed it in

        try {
            $scss_compiler = new \Leafo\ScssPhp\Compiler();
            $scss_compiler->addImportPath(INFINISITE_URI . '/bower_components/foundation-sites/scss/');
            $scss_compiler->addImportPath(INFINISITE_URI . '/assets/acme/');
            $compiled_css = $scss_compiler->compile($this->scss);

            $this->css = "<style type='text/css'>
                $compiled_css
            </style>";

        } catch (exception $e) {
            $this->css = $e;
            return;

        }

    }

    private function get_custom_template_for_post() {

        // TODO: write in global, post type, taxononmy, single post checks

        $post_type_template = $this->config['post_type_options']['template'];

        if(!$post_type_template) return false;

        return $_SERVER['DOCUMENT_ROOT'] . $post_type_template;

    }


}