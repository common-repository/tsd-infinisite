<? namespace TSD_Infinisite;

class Data_Moves {


    static function cpt_from_repeater_to_option_sub_page(){

//        error_log("IS: Found old cpt structure - updating in Data_Moves class");

        $is_post_types = Acme::get_acf_global_option("options_is_global_post_types");
        $site_has_old_post_types = count($is_post_types);

        if ($site_has_old_post_types):
            /**
             * Our first crack at moving client data around between updates
             */

            $custom_meta_field_types = ['label', 'name', 'type'];

            $configs = ['hierarchical', 'page_builder', 'sidebar_set', 'single_view', 'single_view_template', 'header_footer_hide'];

//    print_r($is_post_types);

            foreach ($is_post_types as $c => $post_type):

                $option_field_base = "options_is_cpt_{$post_type['post_type']}_";

                $is_meta_fields = serialize($post_type['fields']);
                \update_option($option_field_base . "meta_fields", $is_meta_fields);


                $custom_meta_field_count = $post_type['post_type_custom_meta_fields'];
                \update_option($option_field_base . "custom_meta_fields", $custom_meta_field_count);


                // first, we cycle through all the repeater instances
                for ($i = 0; $i < $custom_meta_field_count; $i++):
                    // then, we cycle through all the subfields of each instance
                    foreach ($custom_meta_field_types as $type):
                        $value = $post_type["post_type_custom_meta_fields_{$i}_{$type}"];
                        \update_option($option_field_base . "custom_meta_fields_{$i}_{$type}", $value);
                    endforeach;
                endfor;

                // next, we loop through the config settings to bring them over

                foreach ($configs as $config):

                    // not bringing this over. not worth the time.
                    if ($config == 'header_footer_hide')
                        continue;

                    $value = $post_type["config_$config"];

                    \update_option($option_field_base . $config, $value);

                endforeach;


            endforeach;

        endif;
    }

}