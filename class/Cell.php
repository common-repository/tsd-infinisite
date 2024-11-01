<?

namespace TSD_Infinisite;

class Cell
{

    public $cells = [];
    public $config = [];

    private $layout;
    private $current_row;
    private $current_cell;

    private $cell_html;
    private $module_html;

    private $styles;
    private $classes;
    private $width;

    private $acf_modules;
    private $modules;
    private $output_attr = [
        'width' => ''
    ];

    private $scss;

    function __construct($layout, $row_index, $cell_index)
    {

        $this->build_config($layout, $row_index, $cell_index);

        /**
         * output attributes - these are attached to the cell div
         * as id, class, and inline styles.
         */
        $this->create_background_styles();
        $this->create_column_width_classes();

        if (array_key_exists('id', $this->config))
            $this->output_attr['id'] = $this->config['id'];

        if (array_key_exists('classes', $this->config))
            $this->output_attr['classes'] = $this->config['classes'];


        $this->build_module_html();
        $this->build_cell_html();

    }


    private function build_config($layout, $row_index, $cell_index)
    {

        $this->layout = $layout;

        $cell_acf_field = $this->layout->config['acf_rows'][$row_index]['cells'][$cell_index];

        $this->config = [
            'row_index' => $row_index,
            'cell_index' => $cell_index,
            'background' => $cell_acf_field['cell_background_options'],
            'width_array' => $cell_acf_field['cell_column_width'],
            'vertical_self_alignment' => $cell_acf_field['cell_vertical_self_alignment'],
            'id' => $cell_acf_field['cell_id'],
            'scss' => $cell_acf_field['scss_code'],
        ];

        $this->acf_modules = $cell_acf_field['is_acf_fc_container'];


        // a little shorthand to make the function more readable
        $this->current_row = $row_index;
        $this->current_cell = $cell_index;

    }

    private function build_module_html()
    {

        // foreach modules as module, create new module with layout, row index, cell index and module

        $cr = $this->current_row;
        $cc = $this->current_cell;

        foreach ($this->acf_modules as $c => $module):
            $module = new Module($this->layout, $cr, $cc, $c);
            $module->build_html();
            $this->modules[] = $module;
            $this->module_html .= $module->get_html();
        endforeach;


    }

    private function build_cell_html()
    {

        $cell_label = $this->current_cell + 1;

        $this->cell_html .= "
            <div class='cell {$this->output_attr['classes']} {$this->output_attr['width']}'
            data-ispb-cell = '$cell_label'
            id='{$this->output_attr['id']}'
            style='{$this->output_attr['styles']}'
            >
                {$this->module_html}
            </div>
        ";
    }


    public function get_html()
    {

        /**
         * this is the public function that gets the html for the created cell
         * typically, it's used in the row object to create the html for the layout
         */
        return $this->cell_html;

    }

    private function create_background_styles()
    {
        $style_array = Acme::generate_background_styles_from_acf_background_options_group($this->config['background']);
        $this->output_attr['styles'] = Acme::process_ispb_layout_markup($style_array);
    }

    private function create_column_width_classes()
    {

        foreach ($this->config['width_array'] as $device => $col_width)
            if ($col_width):
                $breakpoint = Acme::device_size_to_breakpoint_class($device);
                $this->output_attr['width'] .= "$breakpoint-$col_width ";
            endif;

    }

    public function get_scss()
    {
        return $this->config['scss'];
    }

}