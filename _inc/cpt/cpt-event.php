<?php

add_action( 'init', 'cptui_register_my_cpt_event' );
function cptui_register_my_cpt_event() {
	register_post_type( 'event', array(
		'label'           => 'Kurse',
		'description'     => '',
		'public'          => true,
		'show_ui'         => true,
		'show_in_menu'    => true,
		'capability_type' => 'post',
		'map_meta_cap'    => true,
		'hierarchical'    => false,
		'rewrite'         => array( 'slug' => 'events', 'with_front' => true ),
		'query_var'       => true,
		'supports'        => array(
			'title',
			'editor',
			'excerpt',
			'revisions',
			'thumbnail',
			'author',
			'page-attributes'
		),
		'taxonomies'      => array( 'themen' ),
		'labels'          => array(
			'name'               => 'Kurse',
			'singular_name'      => 'Kurs',
			'menu_name'          => 'Kurse',
			'add_new'            => 'Hinzufügen',
			'add_new_item'       => 'Neuer Kurs',
			'edit'               => 'Bearbeiten',
			'edit_item'          => 'Kurs bearbeiten',
			'new_item'           => 'Neuer Kurs',
			'view'               => 'Ansehen',
			'view_item'          => 'Kurs ansehen',
			'search_items'       => 'Kurse suchen',
			'not_found'          => 'Keine Kurse gefunden',
			'not_found_in_trash' => 'Keine Kurse im Papierkorb gefunden',
			'parent'             => 'Übergeordneter Kurs',
		)
	) );
}

include( __DIR__ . '/../acf/acf-event.php' );