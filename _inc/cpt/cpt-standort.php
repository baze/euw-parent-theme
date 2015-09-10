<?php

add_action('init', 'cptui_register_my_cpt_standort');
function cptui_register_my_cpt_standort()
{
    register_post_type('standort', array(
        'label'           => 'Standorte',
        'description'     => '',
        'public'          => true,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'capability_type' => 'post',
        'map_meta_cap'    => true,
        'hierarchical'    => false,
        'rewrite'         => array('slug' => 'standorte', 'with_front' => true),
        'query_var'       => true,
        'supports'        => array('title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author', 'page-attributes', 'post-formats'),
        'labels'          => array(
            'name'               => 'Standorte',
            'singular_name'      => 'Standort',
            'menu_name'          => 'Standorte',
            'add_new'            => 'Neu',
            'add_new_item'       => 'Neuer Standort',
            'edit'               => 'Bearbeiten',
            'edit_item'          => 'Standorte bearbeiten',
            'new_item'           => 'Neuer Standort',
            'view'               => 'Ansehen',
            'view_item'          => 'Standorte ansehen',
            'search_items'       => 'Standorte durchsuchen',
            'not_found'          => 'Keine Standorte gefunden',
            'not_found_in_trash' => 'Keine Standorte im Papierkorb gefunden',
            'parent'             => 'Übergeordnete Standorte',
        )
    ));
}

include( __DIR__ . '/acf-standort.php' );