<?php

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id'         => 'acf_leistungen',
        'title'      => 'Leistungen',
        'fields'     => array(
            array(
                'key'             => 'field_53565d996f354',
                'label'           => 'Case-Study-Liste',
                'name'            => 'case-study-liste',
                'type'            => 'relationship',
                'return_format'   => 'object',
                'post_type'       => array(
                    0 => 'post',
                    1 => 'case-studies',
                ),
                'taxonomy'        => array(
                    0 => 'all',
                ),
                'filters'         => array(
                    0 => 'search',
                ),
                'result_elements' => array(
                    0 => 'featured_image',
                    1 => 'post_type',
                    2 => 'post_title',
                ),
                'max'             => 10,
            ),
        ),
        'location'   => array(
            array(
                array(
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'leistung',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options'    => array(
            'position'       => 'normal',
            'layout'         => 'default',
            'hide_on_screen' => array(),
        ),
        'menu_order' => 0,
    ));
}

