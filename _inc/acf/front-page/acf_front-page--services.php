<?php

if ( function_exists( "register_field_group" ) ) {
	register_field_group( array(
		'id'         => 'acf_front-page--services',
		'title'      => 'Front Page: Services',
		'fields'     => array(
			array(
				'key'           => 'field_54b4eb829272c',
				'label'         => 'Title',
				'name'          => 'services-title',
				'type'          => 'text',
				'default_value' => '',
				'placeholder'   => '',
				'prepend'       => '',
				'append'        => '',
				'formatting'    => 'html',
				'maxlength'     => '',
			),
			array(
				'key'           => 'field_54b4ec409272d',
				'label'         => 'Content',
				'name'          => 'services-content',
				'type'          => 'textarea',
				'default_value' => '',
				'placeholder'   => '',
				'maxlength'     => '',
				'rows'          => '',
				'formatting'    => 'br',
			),
			array(
				'key'             => 'field_54b4ec529272e',
				'label'           => 'Services',
				'name'            => 'services-list',
				'type'            => 'relationship',
				'return_format'   => 'object',
				'post_type'       => array(
					0 => 'service',
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
			array(
				'key'          => 'field_54b7e366e45a1',
				'label'        => 'Background Image',
				'name'         => 'services-bg_image',
				'type'         => 'image',
				'save_format'  => 'url',
				'preview_size' => 'thumbnail',
				'library'      => 'all',
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
		'menu_order' => 4,
	) );
}

