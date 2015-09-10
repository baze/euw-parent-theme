<?php

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_global-fallback-header-image',
		'title' => 'Global: Fallback Header Image',
		'fields' => array (
			array (
				'key' => 'field_54d0eafce2105',
				'label' => 'Fallback Header Image',
				'name' => 'fallback_header_image',
				'type' => 'image',
				'save_format' => 'id',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

