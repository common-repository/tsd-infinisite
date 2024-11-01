<?

namespace TSD_Infinisite;

class Template
{

    public static function create_global_template()
    {

        $fields = self::generate_global_template_field_group();

        register_field_group($fields);
    }

    private static function generate_global_template_field_group()
    {

        $template_title = [
            'key' => 'field_5a29673e16670',
            'name' => 'title',
            'label' => 'Title',
            'required' => 1,
            'type' => 'text',
            'wrapper' => [
                'width' => 50
            ]
        ];

        $template_id = [
            'key' => 'field_5a29673e166a8',
            'name' => 'id',
            'label' => 'ID',
            'required' => 1,
            'type' => 'text',
            'wrapper' => [
                'width' => 50
            ]
        ];

        $twig_code = [
            'key' => 'field_5a29673e1658c',
            'name' => 'twig',
            'type' => 'textarea',
            'wrapper' => [
                'class' => 'is_ace_editor language_twig'
            ]
        ];

        $scss_code = [
            'key' => 'field_5a29673e165c7',
            'name' => 'scss',
            'type' => 'textarea',
            'wrapper' => [
                'class' => 'is_ace_editor language_scss'
            ]
        ];


        $template_editor_fields = [
            $template_title,
            $template_id,
            ACF::get_accordion('field_5a29673e16719', 'TWIG Template'),
            $twig_code,
            ACF::get_accordion('field_5a29673e16757'),
            ACF::get_accordion('field_5a29673e1678f', 'SCSS Code'),
            $scss_code,
            ACF::get_accordion('field_5a29673e167c8'),
        ];


        $template_editor_instances = [
            'key' => 'field_5a29673e16638',
            'name' => 'template_editor_instances',
            'label' => 'Template Editor Instances',
            'type' => 'repeater',
            'instructions' => 'Templates will be available in the Post Type module',
            'layout' => 'block',
            'button_label' => 'Add Template',
            'sub_fields' => $template_editor_fields
        ];


        $template_editor_creator_fields = [
            $template_editor_instances
        ];


        $field_group = [
            'key' => 'field_5a29673e16554',
            'title' => 'Custom Template Creator',
            'location' => [
                [
                    [
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'acf-options-template-editor',
                    ]
                ],
            ],
            'fields' => $template_editor_creator_fields
        ];

        return $field_group;

    }

    public static function update_is_custom_template_styles()
    {

        $all_templates = get_field("template_editor_instances", "options");

        if(!$all_templates) return false;

        $scss_to_compile = '';

        foreach ($all_templates as $template):
            $id = "is_custom_module_{$template['id']}";
            $scss_to_compile .= ".$id { {$template['scss']} }";
        endforeach;

        // we're going to boot up the compiler here
        $scss = new \Leafo\ScssPhp\Compiler();
        // here we build the sass
        $template_styles = $scss->compile($scss_to_compile);

        // and here we update the stylesheet.
        $file = INFINISITE_URI . 'assets/css/is_custom_template_styles.css';
        file_put_contents($file, $template_styles);


    }

    public static function filter_ace_content()
    {
//        print_r($_POST);
    }

}