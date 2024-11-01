<?

// The Hack class is Acme's sibling. Where Acme fixes internal problems
// Hack fixes external ones. We use it to fix plugin conflicts.

// Next stop, Yoast.

namespace TSD_Infinisite;

class Hack
{

    static function get_all_post_object_content($post)
    {

        /*
         * this function is because sometimes people code their
         * plugins to check the $post->post_content to see if
         * something is in the post object's "content" - which of
         * course is a more complex question in our environment.
         *
         * so - our solution is to make a function that grabs all the
         * acf data associated with the "content" of the post as one long
         * string
         *
         * oh, and we don't want it evaluating shortcodes - so we need
         * to get the info directly from the database and can't use
         * acf functions to pull the info. huzzah.
         */

        $return_string = '';

        $layout = new Layout([
            'post_id' => $post->ID
        ]);

        if (!count($layout->pb_rows))
            return $post->post_content;

        foreach ($layout->pb_rows as $r => $row)
            foreach ($row['cells'] as $c => $cell)
                foreach ($cell['is_acf_fc_container'] as $m => $module):

                    $meta_key_prefix = "rows_{$r}_cells_{$c}_is_acf_fc_container_{$m}_";


                    switch ($module['acf_fc_layout']):

                        case 'simple_content':
                            $return_string .= get_post_meta($post->ID, $meta_key_prefix . 'simple_content', 1);
                            break;

                    endswitch;
                endforeach;

        return $post->post_content . $return_string;


    }



}