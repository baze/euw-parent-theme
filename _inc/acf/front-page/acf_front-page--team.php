<?php

if ( function_exists( "register_field_group" ) ) {
	register_field_group( array(
		'id'         => 'acf_front-page--team',
		'title'      => 'Front Page: Team',
		'fields'     => array(
			array(
				'key'           => 'field_54b4ed8785bbe',
				'label'         => 'Title',
				'name'          => 'team-title',
				'type'          => 'text',
				'default_value' => '',
				'placeholder'   => '',
				'prepend'       => '',
				'append'        => '',
				'formatting'    => 'html',
				'maxlength'     => '',
			),
			array(
				'key'           => 'field_54b4eda985bbf',
				'label'         => 'Content',
				'name'          => 'team-content',
				'type'          => 'textarea',
				'default_value' => '',
				'placeholder'   => '',
				'maxlength'     => '',
				'rows'          => '',
				'formatting'    => 'br',
			),
			array(
				'key'             => 'field_54b4f14fe300c',
				'label'           => 'Boss',
				'name'            => 'team-boss',
				'type'            => 'relationship',
				'return_format'   => 'id',
				'post_type'       => array(
					0 => 'mitarbeiter',
				),
				'taxonomy'        => array(
					0 => 'all',
				),
				'filters'         => array(
					0 => 'search',
				),
				'result_elements' => array(
					0 => 'post_type',
					1 => 'post_title',
				),
				'max'             => 1,
			),
			array(
				'key'             => 'field_54b4edb885bc0',
				'label'           => 'Members',
				'name'            => 'team-members',
				'type'            => 'relationship',
				'return_format'   => 'id',
				'post_type'       => array(
					0 => 'mitarbeiter',
				),
				'taxonomy'        => array(
					0 => 'all',
				),
				'filters'         => array(
					0 => 'search',
				),
				'result_elements' => array(
					0 => 'post_type',
					1 => 'post_title',
				),
				'max'             => '',
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
		),
		'options'    => array(
			'position'       => 'normal',
			'layout'         => 'default',
			'hide_on_screen' => array(),
		),
		'menu_order' => 3,
	) );
}

