<?php

if ( function_exists( "register_field_group" ) ) {
	register_field_group( array(
		'id'         => 'acf_front-page-related-pages',
		'title'      => 'Front Page: Related Pages',
		'fields'     => array(
			array(
				'key'          => 'field_54c7aa890b47d',
				'label'        => 'Related Pages',
				'name'         => 'related_pages',
				'type'         => 'repeater',
				'sub_fields'   => array(
					array(
						'key'           => 'field_54c7aad20b47e',
						'label'         => 'Title',
						'name'          => 'related_page-title',
						'type'          => 'text',
						'column_width'  => '',
						'default_value' => '',
						'placeholder'   => '',
						'prepend'       => '',
						'append'        => '',
						'formatting'    => 'html',
						'maxlength'     => '',
					),
					array(
						'key'           => 'field_54c7ab170b47f',
						'label'         => 'Subtitle',
						'name'          => 'related_page-subtitle',
						'type'          => 'text',
						'column_width'  => '',
						'default_value' => '',
						'placeholder'   => '',
						'prepend'       => '',
						'append'        => '',
						'formatting'    => 'html',
						'maxlength'     => '',
					),
					array(
						'key'          => 'field_54c7ab380b480',
						'label'        => 'Image',
						'name'         => 'related_page-image',
						'type'         => 'image',
						'column_width' => '',
						'save_format'  => 'id',
						'preview_size' => 'thumbnail',
						'library'      => 'all',
					),
					array(
						'key'          => 'field_54c7ab5e0b481',
						'label'        => 'Link',
						'name'         => 'related_page-link',
						'type'         => 'page_link',
						'column_width' => '',
						'post_type'    => array(
							0 => 'page',
						),
						'allow_null'   => 1,
						'multiple'     => 0,
					),
				),
				'row_min'      => '',
				'row_limit'    => '',
				'layout'       => 'table',
				'button_label' => 'Add Related Page',
			),
			array(
				'key'          => 'field_54b7e21061ccd',
				'label'        => 'Background Image',
				'name'         => 'related_pages-bg_image',
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
		'menu_order' => 3,
	) );
}

