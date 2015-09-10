<?php

add_action('init', 'cptui_register_my_cpt_service');
function cptui_register_my_cpt_service()
{
    register_post_type('service', array(
        'label'           => 'Services',
        'description'     => '',
        'public'          => true,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'capability_type' => 'post',
        'map_meta_cap'    => true,
        'hierarchical'    => false,
        'rewrite'         => array('slug' => 'services', 'with_front' => true),
        'query_var'       => true,
        'supports'        => array('title', 'editor', 'excerpt', 'custom-fields', 'revisions', 'thumbnail', 'author', 'page-attributes'),
        'labels'          => array(
            'name'               => 'Services',
            'singular_name'      => 'Service',
            'menu_name'          => 'Services',
            'add_new'            => 'Hinzufügen',
            'add_new_item'       => 'Neuer Service',
            'edit'               => 'Bearbeiten',
            'edit_item'          => 'Service bearbeiten',
            'new_item'           => 'Neuer Service',
            'view'               => 'Ansehen',
            'view_item'          => 'Service ansehen',
            'search_items'       => 'Services suchen',
            'not_found'          => 'Keine Services gefunden',
            'not_found_in_trash' => 'Keine Services im Papierkorb gefunden',
            'parent'             => 'Übergeordneter Service',
        )
    ));
}