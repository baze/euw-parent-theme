<?php

add_action('init', 'cptui_register_my_cpt_mitarbeiter');
function cptui_register_my_cpt_mitarbeiter()
{
    register_post_type('mitarbeiter', array(
        'label'               => 'Mitarbeiter',
        'description'         => '',
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'capability_type'     => 'post',
        'map_meta_cap'        => true,
        'hierarchical'        => false,
        'rewrite'             => array('slug' => 'mitarbeiter', 'with_front' => true),
        'query_var'           => true,
        'exclude_from_search' => true,
        'supports'            => array('title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'thumbnail', 'author', 'page-attributes', 'post-formats'),
        'labels'              => array(
            'name'               => 'Mitarbeiter',
            'singular_name'      => 'Mitarbeiter',
            'menu_name'          => 'Mitarbeiter',
            'add_new'            => 'Neuer Mitarbeiter',
            'add_new_item'       => 'Mitarbeiter hinzufügen',
            'edit'               => 'Bearbeiten',
            'edit_item'          => 'Mitarbeiter bearbeiten',
            'new_item'           => 'Neuer Mitarbeiter',
            'view'               => 'Ansehen',
            'view_item'          => 'Mitarbeiter ansehen',
            'search_items'       => 'Mitarbeiter durchsuchen',
            'not_found'          => 'Keine Mitarbeiter gefunden',
            'not_found_in_trash' => 'Keine Mitarbeiter im Papierkorb gefunden',
            'parent'             => 'Übergeordneter Mitarbeiter',
        )
    ));
}