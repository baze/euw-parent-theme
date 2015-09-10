<?php

if ( function_exists( "register_field_group" ) ) {
	register_field_group( array(
		'id'         => 'acf_front-page--intro',
		'title'      => 'Front Page: Intro',
		'fields'     => array(
			array(
				'key'           => 'field_549152e890a1f',
				'label'         => 'Title',
				'name'          => 'intro-title',
				'type'          => 'text',
				'default_value' => '',
				'placeholder'   => '',
				'prepend'       => '',
				'append'        => '',
				'formatting'    => 'html',
				'maxlength'     => 100,
			),
			array(
				'key'           => 'field_549152f890a20',
				'label'         => 'Content',
				'name'          => 'intro-content',
				'type'          => 'wysiwyg',
				'default_value' => '',
				'toolbar'       => 'full',
				'media_upload'  => 'yes',
			),
			array(
				'key'          => 'field_54b7e21061ccb',
				'label'        => 'Background Image',
				'name'         => 'intro-bg_image',
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
			'hide_on_screen' => array(
				0  => 'permalink',
				1  => 'the_content',
				2  => 'excerpt',
				3  => 'custom_fields',
				4  => 'discussion',
				5  => 'comments',
				6  => 'revisions',
				7  => 'slug',
				8  => 'author',
				9  => 'format',
				10 => 'featured_image',
				11 => 'categories',
				12 => 'tags',
				13 => 'send-trackbacks',
			),
		),
		'menu_order' => 2,
	) );
}

