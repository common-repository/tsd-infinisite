<?

namespace TSD_Infinisite;

class CPT
{

    static function register_post_type_builder()
    {

        $post_type_builder_field_group = self::build_post_type_builder_field_group();

        // do the filter thing

        // register fields with acf
        acf_add_local_field_group($post_type_builder_field_group);

    }

    private static function build_post_type_builder_field_group()
    {


        $cpt_meta_title = [
            'key' => 'field_is_global_cpt_meta_title',
            'label' => 'Name',
            'name' => 'name',
            'type' => 'text',
            'required' => 1,
            'instructions' => 'The name displayed in the menu',
            'wrapper' => [
                'width' => 100 / 2
            ]
        ];

        $cpt_meta_title_plural = [
            'key' => 'field_is_global_cpt_meta_title_plural',
            'label' => 'Name (Plural)',
            'name' => 'name_plural',
            'instructions' => 'TODO: hook this up',
            'type' => 'text',
            'wrapper' => [
                'width' => 100 / 3
            ]
        ];

        $cpt_meta_post_type = [
            'key' => 'field_is_global_cpt_meta_post_type',
            'label' => 'Post Type',
            'name' => 'post_type',
            'instructions' => 'A.K.A. the "Slug" - this is the database name for your post type',
            'type' => 'text',
            'required' => 1,
            'wrapper' => [
                'width' => 100 / 2
            ]
        ];

        $cpt_meta_fields = [
            'key' => 'field_is_global_cpt_meta_fields',
            'label' => 'Fields',
            'name' => 'fields',
            'type' => 'select',
            'ui' => 1,
            'multiple' => 1
        ];


        $fields = [
            [
                'key' => 'field_is_global_cpt_repeater',
                'label' => 'Post Types',
                'name' => 'is_global_post_types',
                'type' => 'repeater',
                'layout' => 'block',
                'instructions' => "Build Your Post Types Here",
                'button_label' => 'Add Custom Post Type',
                'sub_fields' => [
                    $cpt_meta_title,
                    $cpt_meta_post_type,
                ]
            ]
        ];


        $field_group = [
            'key' => 'field_is_global_cpt_field_group',
            'title' => 'Post Type Builder',
            'location' => [
                [
                    [
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'is-cpt-options',
                    ]
                ],
            ],
            'fields' => $fields
        ];

        return $field_group;

    }

    static function register_built_post_types()
    {

        // we store our cpt prefs in the db through acf - so we need
        // to start out with grabbing that information
        $post_types = Acme::get_post_types();

        if (!$post_types) return;

        // TODO: this get post types function returns a non-array sometimes.

        if (!is_array($post_types)) return;

        foreach ($post_types as $post_type):

            $pt = $post_type['post_type'];


            // we count post and page as post types with the platform,
            // but we don't need to register them again
            if ($pt == 'post' || $pt == 'page') continue;


            $config = array(
                'public' => true,
                'capability_type' => 'page',
                'label' => $post_type['name'],
                'supports' => [
                    'title',
                    'revisions'
                ]
            );

            // TODO: all post types have single views as defined! create post type visibility options!!!
            $config['publicly_queryable'] = 1;

            register_post_type($pt, $config);

            $fields = [];

            $pt_config_field_group_acf = acf_get_fields("is_cpt_{$pt}_settings");
            $pt_config = [];
            if ($pt_config_field_group_acf)
                foreach ($pt_config_field_group_acf as $field):
                    $acf_field = get_field($field['name'], 'options');
                    if (!$acf_field) continue;
                    $pt_config[$field['name']] = $acf_field;
                endforeach;


            /**
             * Starting the loop to cycle through the IS Meta fields and putting
             * the $fields array together
             */

            if (isset($pt_config["is_cpt_{$pt}_meta_fields"]))
                $is_cpt_meta_fields = $pt_config["is_cpt_{$pt}_meta_fields"];


            if (isset($is_cpt_meta_fields) && count($is_cpt_meta_fields)):

                if (in_array('name', $is_cpt_meta_fields))
                    $fields[] = [
                        "key" => "field_{$post_type['post_type']}_name",
                        "label" => "Name",
                        "name" => "name",
                        "type" => "text"
                    ];

                if (in_array('title', $is_cpt_meta_fields))
                    $fields[] = [
                        "key" => "field_{$post_type['post_type']}_title",
                        "label" => "Title",
                        "name" => "title",
                        "type" => "text"
                    ];

                if (in_array('image', $is_cpt_meta_fields))
                    $fields[] = [
                        "key" => "field_{$post_type['post_type']}_image",
                        "label" => "Image",
                        "name" => "image",
                        "type" => "image",
                        "preview_size" => "medium",
                    ];

                if (in_array('embed', $is_cpt_meta_fields))
                    $fields[] = [
                        "key" => "field_{$post_type['post_type']}_embed",
                        "label" => "Embed",
                        "name" => "embed",
                        "type" => "oembed"
                    ];

                if (in_array('file', $is_cpt_meta_fields))
                    $fields[] = [
                        "key" => "field_{$post_type['post_type']}_file",
                        "label" => "File",
                        "name" => "file",
                        "type" => "file"
                    ];

                if (in_array('identification', $is_cpt_meta_fields))
                    $fields[] = [
                        "key" => "field_{$post_type['post_type']}_identification",
                        "label" => "Identification",
                        "name" => "identification",
                        "type" => "text"
                    ];

                if (in_array('link', $is_cpt_meta_fields))
                    $fields[] = [
                        "key" => "field_{$post_type['post_type']}_link",
                        "label" => "Link",
                        "name" => "link",
                        "type" => "link"
                    ];

                if (in_array('subtitle', $is_cpt_meta_fields))
                    $fields[] = [
                        "key" => "field_{$post_type['post_type']}_subtitle",
                        "label" => "Subtitle",
                        "name" => "subtitle",
                        "type" => "text"
                    ];

                if (in_array('start_date', $is_cpt_meta_fields))
                    $fields[] = [
                        "key" => "field_{$post_type['post_type']}_start_date",
                        "label" => "Date",
                        "name" => "start_date",
                        "type" => "date_picker",
                        'display_format' => 'F j, Y',
                        'return_format' => 'c',
                    ];

                if (in_array('end_date', $is_cpt_meta_fields))
                    $fields[] = [
                        "key" => "field_{$post_type['post_type']}_end_date",
                        "label" => "End Date",
                        "name" => "end_date",
                        "type" => "date_picker",
                        'display_format' => 'F j, Y',
                        'return_format' => 'c',
                    ];

                if (in_array('location', $is_cpt_meta_fields))
                    $fields[] = [
                        "key" => "field_{$post_type['post_type']}_location",
                        "label" => "Location",
                        "name" => "location",
                        "type" => "google_map"
                    ];

                if (in_array('address_line_1', $is_cpt_meta_fields))
                    $fields[] = [
                        "key" => "field_{$post_type['post_type']}_address_line_1",
                        "label" => "Address (Line 1)",
                        "name" => "address_line_1",
                        "type" => "text"
                    ];

                if (in_array('address_line_2', $is_cpt_meta_fields))
                    $fields[] = [
                        "key" => "field_{$post_type['post_type']}_address_line_2",
                        "label" => "Address (Line 2)",
                        "name" => "address_line_2",
                        "type" => "text"
                    ];

                if (in_array('author_text', $is_cpt_meta_fields))
                    $fields[] = [
                        "key" => "field_{$post_type['post_type']}_author_text",
                        "label" => "Author (Text)",
                        "name" => "author_text",
                        "type" => "text"
                    ];

                if (in_array('author_post', $is_cpt_meta_fields))
                    $fields[] = [
                        "key" => "field_{$post_type['post_type']}_author_post",
                        "label" => "Author (Post)",
                        "name" => "author_post",
                        "type" => "relationship",
                    ];

                if (in_array('excerpt', $is_cpt_meta_fields))
                    $fields[] = [
                        "key" => "field_{$post_type['post_type']}_excerpt",
                        "label" => "Excerpt",
                        "name" => "excerpt",
                        "type" => "wysiwyg"
                    ];

                if (in_array('content', $is_cpt_meta_fields))
                    $fields[] = [
                        "key" => "field_{$post_type['post_type']}_content",
                        "label" => "Content",
                        "name" => "content",
                        "type" => "wysiwyg"
                    ];

                if (in_array('source', $is_cpt_meta_fields))
                    $fields[] = [
                        "key" => "field_{$post_type['post_type']}_source",
                        "label" => "Source",
                        "name" => "source",
                        "type" => "text"
                    ];

                if (in_array('hours', $is_cpt_meta_fields))
                    $fields[] = [
                        "key" => "field_{$post_type['post_type']}_hours",
                        "label" => "Hours",
                        "name" => "hours",
                        "type" => "text"
                    ];

                if (in_array('phone_number', $is_cpt_meta_fields))
                    $fields[] = [
                        "key" => "field_{$post_type['post_type']}_phone_number",
                        "label" => "Phone Number",
                        "name" => "phone_number",
                        "type" => "text"
                    ];

                if (in_array('email_address', $is_cpt_meta_fields))
                    $fields[] = [
                        "key" => "field_{$post_type['post_type']}_email_address",
                        "label" => "Email Address",
                        "name" => "email_address",
                        "type" => "email"
                    ];

                if (in_array('fax_number', $is_cpt_meta_fields))
                    $fields[] = [
                        "key" => "field_{$post_type['post_type']}_fax_number",
                        "label" => "Fax Number",
                        "name" => "fax_number",
                        "type" => "text"
                    ];

                if (in_array('facebook', $is_cpt_meta_fields))
                    $fields[] = [
                        "key" => "field_{$post_type['post_type']}_facebook",
                        "label" => "Facebook",
                        "name" => "facebook",
                        "type" => "url"
                    ];

                if (in_array('linkedin', $is_cpt_meta_fields))
                    $fields[] = [
                        "key" => "field_{$post_type['post_type']}_linkedin",
                        "label" => "LinkedIn",
                        "name" => "linkedin",
                        "type" => "url"
                    ];

                if (in_array('twitter', $is_cpt_meta_fields))
                    $fields[] = [
                        "key" => "field_{$post_type['post_type']}_twitter",
                        "label" => "Twitter",
                        "name" => "twitter",
                        "type" => "url"
                    ];

                if (in_array('youtube', $is_cpt_meta_fields))
                    $fields[] = [
                        "key" => "field_{$post_type['post_type']}_youtube",
                        "label" => "Youtube",
                        "name" => "youtube",
                        "type" => "url"
                    ];

                if (in_array('instagram', $is_cpt_meta_fields))
                    $fields[] = [
                        "key" => "field_{$post_type['post_type']}_instagram",
                        "label" => "Instagram",
                        "name" => "instagram",
                        "type" => "url"
                    ];

            endif;


            $custom_fields = $pt_config["is_cpt_{$pt}_custom_meta_fields"];

            if ($custom_fields):
                // This is returning a number - we should probably fire it later
                if (count($custom_fields) && is_array($custom_fields)):
                    foreach ($custom_fields as $field):

                        $is_preset = $field['preset_type'] != 'custom';

                        $field_name = $is_preset ? $field['preset_type'] : $field['meta_key'];
                        $field_type = $is_preset ? ACF::is_preset_field_lookup($field['preset_type']) : $field['type'];

                        $args = [
                            "key" => "field_{$post_type['post_type']}_{$field_name}",
                            "label" => $field['label'],
                            "name" => $field_name,
                            "type" => $field_type,
                            'wrapper' => [
                                'width' => $field['field_width']
                            ]
                        ];

                        if ($field_type == 'image') $args['preview_size'] = 'medium';
                        if ($field_type == 'date_picker') $args['display_format'] = 'F j, Y';
                        if ($field_type == 'date_picker') $args['return_format'] = 'c';

                        $fields[] = $args;


                    endforeach;
                endif;
            endif;

            $post_type_field_group = [
                'key' => "field_{$post_type['post_type']}_fields",
                'title' => "{$post_type['name']} Custom Meta Fields",
                'position' => "acf_after_title",
                // 'style' => 'seamless',
                'location' => [
                    [
                        [
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => $post_type['post_type'],
                        ]
                    ],
                ],
                'fields' => $fields
            ];

            $post_type_field_group = apply_filters("update_custom_post_type_meta", $post_type_field_group);


            acf_add_local_field_group($post_type_field_group);


        endforeach;


    }

}