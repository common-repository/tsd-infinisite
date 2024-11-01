<?

namespace TSD_Infinisite;

class IS_Post_Archive
{

    /**
     * IS_Post_Archive constructor.
     *
     * Post Archive update project
     *
     * Make archives independently searchable / filterable
     *
     * Make archives independently paginatable
     *
     * Allow for multiple post types
     *
     */

    public static $counter = 0;

    private $output_html;
    private $template_html;
    private $filter_html;
    private $filter_placement;
    private $pagination_html;
    public $id_tag;
    private $module;
    private $post_types;
    private $current_page;
    public $query_args;
    private $config;
    private $filter_template;
    private $row_padding;

    public $query;

    public function __construct($module)
    {

        self::$counter++;

        $this->id_tag = "archive_" . self::$counter;

        // if the user has submitted pagination or filter requests, we pass the args
        // of the archive to the url as an array with the key equal to the id of the
        // post archive module

        if (isset($_GET[$this->id_tag]))
            $this->config = $_GET[$this->id_tag];

//        if (is_user_logged_in())
//            Acme::dbg($this->config);


        $this->module = $module;
        $this->post_types[] = $this->module['post_type'] == 'is_custom_posts' ? 'any' : $module['post_type'];

        // TODO: update
        $this->current_page = 1;

        $this->row_padding = false;

        $this->get_user_options();
        $this->check_for_manual_pages();
        $this->set_query();
        $this->add_filters();
        $this->set_up_search();

        $this->execute_query();

        $this->build_twig_query_template();
        $this->build_twig_excerpt_templates();
        $this->build_no_results();
        $this->build_filter();

        $this->build_pagination();

        $this->columns = Acme::generate_columns($module['posts_per_row'], 1);


        if ($this->filter_placement == 'none')
            $this->load_no_filter_layout();

        if ($this->filter_placement == 'left')
            $this->load_left_filter_layout();

        if ($this->filter_placement == 'top')
            $this->load_top_filter_layout();

        // this is a default - in case no filter placement is set
        if (!$this->filter_placement || $this->filter_placement == '')
            $this->load_no_filter_layout();
    }

    private function execute_query()
    {


        /**
         * with all that done, it's time to set what page we're on
         * and do our query!
         */

//        if (is_user_logged_in())
//            Acme::dbg($this->query_args);

        if (array_key_exists('s',$this->query_args)):
            $this->query = new \SWP_Query($this->query_args);
        else:
            $this->query = new \WP_Query($this->query_args);
        endif;

    }


    private function build_pagination()
    {

        /**
         * pagination section
         */

        // setting our variable
        $pagination_html = '';

        // our default state is to turn it off
        $show_pagination = false;

        // if the user has requested pagination, we will display it
        if ($this->module['pagination'])
            $show_pagination = true;

        // in this case, the module has found all the posts that it's looking
        // for and no pagination will ever be needed, even if the toggle is on
        if ($this->query->found_posts = $this->module['posts_per_page'])
            $show_pagination = false;

        if ($this->query->max_num_pages > 1 && $this->module['pagination'])
            $show_pagination = true;

        if (!$show_pagination) return;


        $pagination = Acme::get_pagination($this->query, $this);

        $this->pagination_html = "
            <div class='cell archive-pagination'>
               $pagination
            </div>
        ";


    }

    private function build_filter()
    {

        /*
        * this is the filter system, we boot up a new twig for it,
        * get the vars from the db and go for it
        */

        $filter_repeater = $this->module['filter_repeater'];


        if (!$filter_repeater) return;

        $filter_display_config = $this->module['filter_display_config'];
        $this->filter_placement = $filter_display_config['post_archive_filter_display_config_filter_placement'];

        $taxonomy_info_for_twig = [];
        foreach ($filter_repeater as $c => $taxonomy):

            $taxonomy_info_for_twig[$c]['taxonomy'] = get_taxonomy($taxonomy['post_archive_filter_repeater_taxonomy']);
            $taxonomy_info_for_twig[$c]['terms'] = get_terms($taxonomy['post_archive_filter_repeater_taxonomy'], [
                'hide_empty' => 1
            ]);
            $taxonomy_info_for_twig[$c]['config'] = $taxonomy;
        endforeach;

        $loader = new \Twig_Loader_Filesystem('/');

        $twig = new \Twig_Environment($loader, [
            'debug' => true
        ]);

        $twig->addExtension(new \Twig_Extension_Debug());

        $this->filter_template = $filter_display_config['filter_template'];

        try {

            $this->filter_html = $twig->render(
                $this->filter_template,
                [
                    'filter_info' => $taxonomy_info_for_twig,
                    'display' => $filter_display_config,
                    'current_keyword' => $this->config['keyword'],
                    'post' => $_POST,
                    'get' => $_GET,
                    'id' => $this->id_tag,
                    // TODO: get this running
                    // 'query_string_form_fields' => $query_string_form_fields,
                    'query_string' => http_build_query($_GET)
                ]
            );
        } catch (\Exception $e) {
            if (is_user_logged_in())
                $this->filter_html = '<p>Error getting filter template</p>';
        }

    }

    private function build_twig_query_template()
    {

        if ($this->module['template_type'] != 'query') return;

        $loader = new \Twig_Loader_Filesystem('/');

        $twig = new \Twig_Environment($loader, [
            'debug' => true
        ]);
        $twig->addExtension(new \Twig_Extension_Debug());


        foreach ($this->query->posts as $post):
            $post->post_type_config = Acme::get_is_post_type_config_options($post->post_type);
            $post->fields = get_fields($post->ID);
        endforeach;

        try {
            $this->template_html .= $twig->render(
                $this->module['post_archive_query_template'],
                [
                    'query' => $this->query->query_vars,
                    'posts' => $this->query->posts,
                    'found_posts' => $this->query->found_posts,
                ]
            );
        } catch (\Exception $e) {
            $this->template_html = "
                <div class='cell'>
                    <h2>Twig Error - post archive - query style</h2>
                    <p>Seeking {$this->module['post_archive_query_template']}</p>
                    <p>error: $e</p>
                </div>
                ";
        }

    }

    private function build_twig_excerpt_templates()
    {

        if ($this->module['template_type'] != 'excerpt') return;
        if (!$this->query->posts) return;

        /*
        *
        * TODO: refactor to ... new class? template class?
        *
        * there are three places we need to check for templates -
        * IS twig/post/excerpts
        * Child theme twig/post/excerpts
        * Global User Template Area
        *
        * i don't think we have the user templates hooked up yet -
        * so, we're loading twig files from two places
        *
        *
        */

        $loader = new \Twig_Loader_Filesystem('/');

        $twig = new \Twig_Environment($loader, [
            'debug' => true
        ]);
        $twig->addExtension(new \Twig_Extension_Debug());


        // we only want to have the row gutters in place if the
        // query is displaying multiple excerpts
        if($this->module['posts_per_row']['medium'] < 1 || $this->module['post_per_row']['large'] < 1)
            $this->row_padding = 'grid-padding-x';


        foreach ($this->query->posts as $post):


            $fields = get_fields($post->ID);
            $post->permalink = get_permalink($post->ID);

            // TODO: this has been refactored to an acme function - update this!

            $template_to_render = $this->module['template'];

            if (!$template_to_render)
                $template_to_render = $this->module['post_archive_excerpt_template'];

            $taxonomies = get_object_taxonomies($post->post_type, 'objects');


            $taxonomy_info = [];

            foreach ($taxonomies as $taxonomy):

                $terms = \wp_get_post_terms($post->ID, $taxonomy->name);

                $taxonomy_info[] = [
                    'terms' => $terms,
                    'taxonomy' => $taxonomy,
                ];

            endforeach;


            // TODO: execute this earlier in the function
            if (substr($template_to_render, -3, 3) == 'php')
                continue;

            $default_image = get_field("is_cpt_{$post->post_type}_default_image", 'options');

            try {
                $this->template_html .= $twig->render(
                    $template_to_render,
                    [
                        'post' => $post,
                        'fields' => $fields,
                        'default_image' => $default_image,
                        'permalink' => get_permalink($post->ID),
                        'categories' => $taxonomy_info,
                        'post_type_config' => Acme::get_is_post_type_config_options($post->post_type)
                    ]
                );
            } catch (\Exception $e) {
                $this->template_html = "
                <div class='cell'>
                    <h2>Twig Error - post archive - excerpt style</h2>
                    <p>Seeking $template_to_render</p>
                    <p>error: $e</p>
                </div>
                ";
            }

        endforeach;


    }

    private function build_no_results()
    {

        if ($this->query->found_posts) return;


        $this->template_html .= "<h2>No Posts Found</h2>";

        if(!is_user_logged_in()) return;

        $dbg = print_r($this->query, 1);
        $this->template_html .= "<pre>$dbg</pre>";
    }

    private function set_up_search()
    {


        if (!$this->config['keyword'] || $this->config['keyword'] == '') return;

        /*
        * Search WP Query
        *
        * If we're running a keyword search, we need to declare a
        * separate object for the query to use Search WP.
        *
        * We also use this time to add our search query and filter vars.
        *
        */

        $this->query_args['s'] = sanitize_text_field($this->config['keyword']);
        $this->query_args['engine'] = sanitize_text_field($this->config['engine']);

        // swp needs to be able to search the attachment type in order to search pdfs
        $this->query_args['post_type'][] = 'attachment';


    }

    private function add_filters()
    {

        if (!isset($this->config['filters'])) return;
        $this->filters = $this->config['filters'];

        foreach ($this->filters as $terms):
            $tax_query = [
                'field' => 'slug',
            ];
            foreach ($terms as $label => $types):
                $tax_query['taxonomy'] = $label;
                if (is_array($types)):
                    foreach ($types as $type):
                        if ($type != '')
                            $tax_query['terms'][] = $type;
                    endforeach;
                    continue;
                endif;
                if ($types != '')
                    $tax_query['terms'] = $types;
            endforeach;

            $this->query_args['tax_query'][] = $tax_query;

        endforeach;


    }

    private function check_for_manual_pages()
    {

        // if you haven't set the post type to custom, then we don't
        // need to do anything in this function


        if ($this->module['post_type'] != 'is_custom_posts')
            return;


        // if you have - we just need to get the posts that you specified.
        foreach ($this->module['custom_posts'] as $custom_post)
            $this->query_args['post__in'][] = $custom_post->ID;

        $this->query_args['orderby'] = 'post__in';

    }

    private function get_user_options()
    {
        // TODO: parse JSON from the module and set as options
        $this->user_options = [];
    }

    private function set_query()
    {

        $defaults = [
            'posts_per_page' => $this->module['posts_per_page'],
            'post_type' => $this->post_types,
            'page' => $this->current_page
        ];


        $config = wp_parse_args($this->user_options, $defaults);

        foreach ($config as $key => $value)
            $this->query_args[$key] = $value;


        $this->query_args['page'] = $this->config['paged'] ? $this->config['paged'] : 1;
        $this->query_args['paged'] = $this->config['paged'] ? $this->config['paged'] : 1;

        if ($this->module['post_type'] == 'is_custom_posts')
            $this->query_args['post_type'] = 'any';

    }

    public function get_content()
    {
        return $this->output_html;
    }

    private function load_no_filter_layout()
    {
        $this->output_html = "
            <div class='is-post-excerpt'>
                <div class='grid-x'>
                    <div class='cell'>
                        <div class='grid-x $this->columns $this->row_padding'>
                            $this->template_html
                        </div>
                        <div class='grid-x'>
                            $this->pagination_html
                        </div>
                    </div>
                </div>
            </div>
        ";

    }

    private function load_left_filter_layout()
    {
        $this->output_html = "<div class='is-post-excerpt'>
                <div class='grid-x'>
                    <div class='cell small-12 medium-3 large-2'>
                        $this->filter_html
                    </div>
                    <div class='cell small-12 medium-9 large-10'>

                        <div class='grid-x $this->columns grid-padding-x grid-padding-y $this->row_padding'>
                            $this->template_html
                        </div>
                        <div class='grid-x grid-margin-x grid-padding-y center-text'>
                            $this->pagination_html
                        </div>
                    </div>
                </div>
            </div>";
    }

    private function load_top_filter_layout()
    {
        $this->output_html = "
        <div class='is-post-excerpt grid-container full'>
                $this->filter_html
                <div class='grid-x $this->columns grid-padding-x grid-padding-y $this->row_padding'>
                    $this->template_html
                </div>
                <div class='grid-x grid-margin-x grid-padding-y center-text'>
                    $this->pagination_html
                </div>
            </div>
            ";
    }

}