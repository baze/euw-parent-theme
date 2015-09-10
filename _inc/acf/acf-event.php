<?php

if ( function_exists( "register_field_group" ) ) {
	register_field_group( array(
		'id'         => 'acf_event',
		'title'      => 'Events',
		'fields'     => array(
			array(
				'key'           => 'field_542bfda1287a5',
				'label'         => 'Ort',
				'name'          => 'event-location',
				'type'          => 'text',
				'default_value' => '',
				'placeholder'   => '',
				'prepend'       => '',
				'append'        => '',
				'formatting'    => 'html',
				'maxlength'     => '',
			),
			array(
				'key'            => 'field_542bf27921b9a',
				'label'          => 'Start-Datum',
				'name'           => 'event-start',
				'type'           => 'date_picker',
				'date_format'    => 'yymmdd',
				'display_format' => 'dd.mm.yy',
				'first_day'      => 1,
			),
			array(
				'key'           => 'field_542bfd77287a3',
				'label'         => 'Start-Zeit',
				'name'          => 'event-time',
				'type'          => 'text',
				'default_value' => '',
				'placeholder'   => '',
				'prepend'       => '',
				'append'        => '',
				'formatting'    => 'html',
				'maxlength'     => '',
			),
			array(
				'key'           => 'field_54623c5e0170f',
				'label'         => 'Dauer',
				'name'          => 'event-duration',
				'type'          => 'text',
				'default_value' => '',
				'placeholder'   => 'z.B. 0,5 Días',
				'prepend'       => '',
				'append'        => '',
				'formatting'    => 'html',
				'maxlength'     => '',
			),
			array(
				'key'            => 'field_542bf80c21b9b',
				'label'          => 'End-Datum',
				'name'           => 'event-end',
				'type'           => 'date_picker',
				'date_format'    => 'yymmdd',
				'display_format' => 'dd.mm.yy',
				'first_day'      => 1,
			),
		),
		'location'   => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'event',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options'    => array(
			'position'       => 'acf_after_title',
			'layout'         => 'default',
			'hide_on_screen' => array(),
		),
		'menu_order' => 0,
	) );
}

