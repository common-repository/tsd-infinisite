<?

namespace TSD_Infinisite;

class Taxonomy_Builder
{

    static function register_taxonomy_builder()
    {

        $taxonomy_builder_field_group = self::build_taxonomy_builder_field_group();

        // do the filter thing

        // register fields with acf
        acf_add_local_field_group($taxonomy_builder_field_group);
    }

    private static function build_taxonomy_builder_field_group()
    {

        $taxonomy_repeater_field_name = [
            'key' => 'field_is_taxonomies_repeater_name',
            'label' => 'Name',
            'type' => 'text',
            'name' => 'name',
            'required' => 1,
            'wrapper' => [
                'width' => 33
            ]
        ];
        $taxonomy_repeater_field_term = [
            'key' => 'field_is_taxonomies_repeater_term',
            'label' => 'Term',
            'type' => 'text',
            'name' => 'term',
            'required' => 1,
            'wrapper' => [
                'width' => 33
            ]
        ];
        $taxonomy_repeater_field_post_types = [
            'key' => 'field_is_taxonomies_repeater_post_types',
            'label' => 'Post Types',
            'type' => 'select',
            'ui' => 1,
            'multiple' => 1,
            'name' => 'post_types',
            'choices' => Acme::get_post_types_for_page_builder_field(),
            'required' => 1,
            'wrapper' => [
                'width' => 33
            ]
        ];


        $taxonomy_repeater_fields = [
            $taxonomy_repeater_field_name,
            $taxonomy_repeater_field_term,
            $taxonomy_repeater_field_post_types,
        ];


        $taxonomy_builder_fields = [
            [
                'key' => 'field_is_taxonomies_repeater',
                'label' => 'Custom Taxonomies',
                'name' => 'custom_taxonomies',
                'type' => 'repeater',
                'button_label' => 'Add Taxonomy',
                'layout' => 'block',
                'sub_fields' => $taxonomy_repeater_fields
            ]
        ];

        $field_group = [
            'key' => 'field_is_taxonomy_builder_group',
            'title' => 'Taxonomy Builder',
            'location' => [
                [
                    [
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'is-tax-options',
                    ]
                ],
            ],
            'fields' => $taxonomy_builder_fields
        ];

        return $field_group;

    }

    static function register_built_taxonomies()
    {

        /**
         * This function reads the taxonomy fields we have set in
         * the acf options page and then builds them into the taxonomy
         * terms, as well as calls the function that sets up the
         * acf options page for each given taxonomy
         */

        $tax_fields = [
            'name',
            'term',
            'post_types'
        ];

        $taxonomies = Acme::acf_init_get_options_repeater_hack('options_custom_taxonomies', $tax_fields);


        if (!$taxonomies) return;

        foreach ($taxonomies as $taxonomy):

            $tax_config_field_group_acf = acf_get_fields("is_taxonomy_{$taxonomy['term']}_settings");

            $tax_config = [];



            if (!$tax_config_field_group_acf) error_log("Taxonomy_Builder::register_built_taxonomies() likely failing due to acf_get_fields not working");
            if (!$tax_config_field_group_acf) continue;



            foreach ($tax_config_field_group_acf as $field):
                $acf_field = get_field($field['name'], 'options');
                if (!$acf_field) continue;
                $tax_config[$field['name']] = $acf_field;
            endforeach;

            \register_taxonomy(
                $taxonomy['term'],
                $taxonomy['post_types'],
                [
                    'label' => $taxonomy['name'],
                    'hierarchical' => $tax_config[$taxonomy['term'] . '_hierarchical'],
                    'show_admin_column' => $tax_config[$taxonomy['term'] . '_admin_column'],
                    'show_in_quick_edit' => $tax_config[$taxonomy['term'] . '_quick_edit'],
                ]
            );
        endforeach;

        Taxonomy_Builder::build_taxonomies_acf_options($taxonomies);

    }

    private static function build_taxonomies_acf_options($taxonomies = false)
    {

        /**
         *
         * This function will build out the acf fields that we are going to
         * use as the options panels.
         *
         * @param $taxonomies       list of taxonomy terms from prior function
         *
         */


        foreach ($taxonomies as $tax):

            $tax_options_text = [
                'key' => 'field_293847928374982374',
                'name' => 'test',
                'label' => $tax['name'],
                'type' => 'text',
            ];

            $field_group_fields = [
                $tax_options_text
            ];

            $field_group_arguments = [
                'key' => "field_is_taxonomy_options_{$tax['term']}",
                'title' => 'Term Options',
                'location' => [
                    [
                        [
                            'param' => 'term',
                            'operator' => '==',
                            'value' => $tax['term'],
                        ]
                    ]
                ],
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'active' => 1,
                'description' => 'something here',
                'fields' => $field_group_fields
            ];

            acf_add_local_field_group($field_group_arguments);

        endforeach;


    }

}