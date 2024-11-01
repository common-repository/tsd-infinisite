<?

namespace TSD_Infinisite;

class Row
{

    public $cells = [];
    public $config = [];

    private $current_row;
    private $current_row_acf;

    private $layout;

    private $cell_html;
    private $row_html;

    private $output_attr;

    private $styles;
    private $classes = [];

    private $top_spacer;
    private $bottom_spacer;

    private $scss;

    function __construct($layout, $row_index)
    {


        $this->build_config($layout, $row_index);

        /**
         * output attributes - these are attached to the cell div
         * as id, class, and inline styles.
         */
        $this->create_background_styles();
        $this->create_inline_classes();

        $this->build_classes();
        $this->build_styles();

        $this->build_cells();
        $this->build_cell_html();

        $this->build_row_html();
    }

    private function build_config($layout, $row_index)
    {

        // a little shorthand to make the function more readable
        $this->current_row = $row_index;
//        $this->current_row_acf = $layout->config['acf_rows'][$row_index];

        // strip out the cells from the acf row and we're left with the config options
        $acf_row_config = $layout->config['acf_rows'][$row_index];
        unset($acf_row_config['cells']);

        $this->layout = $layout;
        $this->config = [
            'row_index' => $row_index,
            'acf' => $acf_row_config,
            'acf_cells' => $layout->config['acf_rows'][$row_index]['cells'],
            'layout_row_count' => count($this->layout->config['acf_rows']),
            'is_first_row' => $row_index == 0,
            'is_last_row' => $row_index + 1 == count($this->layout->config['acf_rows']),
        ];

        $this->current_row = $row_index;


    }

    private function build_cells()
    {
        for ($i = 0; $i < count($this->config['acf_cells']); $i++)
            $this->cells[] = new Cell($this->layout, $this->current_row, $i);
    }


    private function build_cell_html()
    {
        foreach ($this->cells as $cell)
            $this->cell_html .= $cell->get_html();
    }


    private function create_background_styles()
    {
        $style_array = Acme::generate_background_styles_from_acf_background_options_group($this->config['acf']['ispb_row_background_options']);
        $this->output_attr['styles'] = Acme::process_ispb_layout_markup($style_array);
    }

    private function create_inline_classes()
    {

        
        $cfg = $this->config['acf'];

        if ($cfg['ispb_row_flex_align']['horizontal_alignment'])
            $this->classes[] = $cfg['ispb_row_flex_align']['horizontal_alignment'];

        if ($cfg['ispb_row_flex_align']['vertical_alignment'])
            $this->classes[] = $cfg['ispb_row_flex_align']['vertical_alignment'];

        if ($cfg['ispb_row_dimensions']['max_width'] == 'none')
            $this->classes[] = 'full';

        if ($cfg['ispb_row_dimensions']['max_width'] == 'fluid')
            $this->classes[] = 'fluid';

        if ($cfg['ispb_row_dimensions']['max_width'] == 'full')
            $this->classes[] = 'full';

    }


    private function build_classes()
    {


        $classes = [];

        $flex_align = $this->config['acf']['ispb_row_flex_align'];

        if ($flex_align['horizontal_alignment'])
            $classes[] = "align-{$flex_align['horizontal_alignment']}";

        if ($flex_align['vertical_alignment'])
            $classes[] = "align-{$flex_align['vertical_alignment']}";

        $spacers = $this->config['acf']['ispb_row_spacers'];

        if ($spacers['top'])
            $classes[] = "ispb_row_spacing_top_{$spacers['top']}";

        if ($spacers['bottom'])
            $classes[] = "ispb_row_spacing_bottom_{$spacers['bottom']}";


        $this->classes[] = Acme::process_ispb_layout_markup($classes, 1);
    }


    private function build_styles()
    {

        $bg = $this->config['acf']['ispb_row_background_options'];

        $styles = Acme::generate_background_styles_from_acf_background_options_group($bg);


        if ($this->config['acf']['ispb_row_dimensions']['fixed_height'])
            $styles['min-height'] = $this->config['acf']['ispb_row_dimensions']['fixed_height'];

        $this->styles = Acme::process_ispb_layout_markup($styles);
    }


    private function build_row_html()
    {


        $header = $this->config['is_first_row'] ? $this->layout->header->get_inline() : '';
        $footer = $this->config['is_last_row'] ? $this->layout->footer->get_inside_footer() : '';

        $display_classes = '';

        foreach($this->classes as $class)
            $display_classes .= "$class ";


        $ispb_row_content = apply_filters("is_page_content", $this->cell_html);

        $viewport = $this->config['acf']['ispb_row_background_options']['viewport_edge'];

        $wraper_style = $viewport ? $this->styles : '';
        $row_style = $viewport ? '' : $this->styles;
        $row_label = $this->current_row + 1;

        $this->row_html = "
            <div class='row-wrapper' style='$wraper_style'>
                <div 
                id='{$this->config['acf']['row_id']}'
                class='grid-x grid-container is_page_builder_row $display_classes'
                data-ispb-row='$row_label'
                style='$row_style'
                >
                    $header
                        $ispb_row_content
                    $footer
                    <div class='background-image-map' style='$this->styles'></div>
                </div>
            </div>
        
        ";

    }

    public function get_html()
    {
        return $this->row_html;
    }

    private function build_scss()
    {

        /**
         * we're putting the scss together into an array for the
         * layout object to compile into an inline stylessheet
         */

        $this->scss['row'] = $this->config['acf']['scss_code'];

        foreach ($this->cells as $cell)
            $this->scss['cells'][] = $cell->get_scss();

    }


    public function get_scss()
    {
        $this->build_scss();
        return $this->scss;
    }
}