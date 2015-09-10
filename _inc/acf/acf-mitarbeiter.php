<?php

if (function_exists("register_field_group")) {
    register_field_group(array(
        'id'         => 'acf_mitarbeiter',
        'title'      => 'Mitarbeiter',
        'fields'     => array(
            array(
                'key'           => 'field_533acd24c0986',
                'label'         => 'Jobtitel',
                'name'          => 'jobtitle',
                'type'          => 'text',
                'required'      => 0,
                'default_value' => '',
                'placeholder'   => '',
                'prepend'       => '',
                'append'        => '',
                'formatting'    => 'html',
                'maxlength'     => '',
            ),
        ),
        'location'   => array(
            array(
                array(
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'mitarbeiter',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options'    => array(
            'position'       => 'acf_after_title',
            'layout'         => 'default',
            'hide_on_screen' => array(
                0 => 'custom_fields',
                1 => 'discussion',
                2 => 'comments',
                3 => 'format',
                4 => 'tags',
                5 => 'send-trackbacks',
                6 => 'author',
            ),
        ),
        'menu_order' => 0,
    ));
}
