<?php

if ( function_exists( "register_field_group" ) ) {
	register_field_group( array(
		'id'         => 'acf_front-page--contact',
		'title'      => 'Front Page: Contact',
		'fields'     => array(
			array(
				'key'           => 'field_54b4f6460ab0a',
				'label'         => 'Title',
				'name'          => 'contact-title',
				'type'          => 'text',
				'default_value' => '',
				'placeholder'   => '',
				'prepend'       => '',
				'append'        => '',
				'formatting'    => 'html',
				'maxlength'     => '',
			),
			array(
				'key'           => 'field_54b4f6520ab0b',
				'label'         => 'Content',
				'name'          => 'contact-content',
				'type'          => 'textarea',
				'default_value' => '',
				'placeholder'   => '',
				'maxlength'     => '',
				'rows'          => '',
				'formatting'    => 'br',
			),
			array(
				'key'           => 'field_54b4f65f0ab0c',
				'label'         => 'Form',
				'name'          => 'contact-form',
				'type'          => 'acf_cf7',
				'disable'       => array(
					0 => 2,
				),
				'allow_null'    => 1,
				'multiple'      => 0,
				'hide_disabled' => 0,
			),
		),
		'location'   => array(
			array(
				array(
					'param'    => 'page_template',
					'operator' => '==',
					'value'    => '_templates/_template-front-page.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array(
				array(
					'param'    => 'page_template',
					'operator' => '==',
					'value'    => '_templates/_template-contact.php',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options'    => array(
			'position'       => 'normal',
			'layout'         => 'default',
			'hide_on_screen' => array(),
		),
		'menu_order' => 5,
	) );
}

