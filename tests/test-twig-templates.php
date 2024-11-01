<?php

/**
 * Class TwigTest
 *
 * @package Tsd_Infinisite
 */
class TwigTest extends WP_UnitTestCase
{

    public function setUp()
    {
        $this->markTestSkipped('skipped all twig tests for loading time.');

        parent::setUp();
        include_once('IS_Test.php');
    }

    public function test_post_templates()
    {

        // get
        $post_excerpts_path = INFINISITE_URI . "twig/post_excerpts/*.twig";
        $post_excerpts = glob($post_excerpts_path);

        $module_templates_filepath = INFINISITE_URI . "twig/layouts/*/*.twig";
        $module_templates = glob($module_templates_filepath);

        $templates = array_merge($post_excerpts, $module_templates);


        foreach ($templates as $template)
            $loader_lookup[$template] = file_get_contents($template);

        $loader = new Twig_Loader_Array($loader_lookup);

        $twig = new Twig_Environment($loader, [
            'debug' => true
        ]);
        $twig->addExtension(new Twig_Extension_Debug());

        $test_data = new IS_Test();

        // print_r($test_data->post);
        // print_r($test_data->cpt_fields);
        // print_r($templates);

        foreach ($templates as $template)
            $twig->render($template,
                [
                    'post' => $test_data->post,
                    'fields' => $test_data->cpt_fields,
                    'permalink' => get_permalink($test_data->post->ID)
                ]);


        $this->assertTrue(true);


    }

}