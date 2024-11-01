<?php

/**
 * Class TypographyTest
 *
 * @package Tsd_Infinisite
 */
class TypographyTest extends WP_UnitTestCase
{

    public function setUp()
    {
        $this->markTestSkipped('skipped all global type tests for loading time.');

        parent::setUp();


        $this->test_values = self::get_global_typography_test_values();

        foreach ($this->test_values as $key => $value)
            \update_field($key, $value, 'options');


    }

    public function test_update_typography_options_scss()
    {

        $styles = TSD_Infinisite\Option::update_typography_options_scss(1);

        if($styles === false)
            $this->assertTrue(false);

        $assert = $styles === false ? false : true;

        $this->assertTrue($assert);
    }

    public function get_global_typography_test_values(){
        return [
            'field_is_global_typography_custom_colors' => [
                [
                    'field_is_global_typography_custom_colors_name' => 'IS Blue',
                    'field_is_global_typography_custom_colors_value' => '#21c7d3',
                    'field_is_global_typography_custom_colors_role' => '',
                ],
                [
                    'field_is_global_typography_custom_colors_name' => 'IS Red',
                    'field_is_global_typography_custom_colors_value' => '#ff0000',
                    'field_is_global_typography_custom_colors_role' => '',
                ]
            ],
            'field_is_global_typography_heading_one_scss_editor' => 'color: red; &.test{background: blue}',
            'field_is_global_typography_heading_two_scss_editor' => 'color: blue;',
            'field_is_global_typography_heading_three_scss_editor' => 'color: orange;',
            'field_is_global_typography_heading_four_scss_editor' => 'color: green;',
            'field_is_global_typography_heading_five_scss_editor' => 'color: purple;',
            'field_is_global_typography_heading_six_scss_editor' => 'color: white;',
            'field_is_global_typography_unordered_list_scss_editor' => 'color: black;',
            'field_is_global_typography_ordered_list_scss_editor' => 'color: gray;',
            'field_is_global_typography_paragraph_scss_editor' => 'color: yellow;',
            'field_is_global_typography_link_scss_editor' => 'color: #ff0000;',
        ];
    }

}

