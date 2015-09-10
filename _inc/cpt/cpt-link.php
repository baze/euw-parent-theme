<?php

add_action('init', 'cptui_register_my_cpt_link');
function cptui_register_my_cpt_link()
{
    register_post_type('link', array(
        'label'           => 'Links',
        'description'     => '',
        'public'          => true,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'capability_type' => 'post',
        'map_meta_cap'    => true,
        'hierarchical'    => false,
        'rewrite'         => array('slug' => 'links', 'with_front' => true),
        'query_var'       => true,
        'supports'        => array('title', 'editor', 'excerpt', 'custom-fields', 'revisions', 'thumbnail', 'author', 'page-attributes'),
        'labels'          => array(
            'name'               => 'Links',
            'singular_name'      => 'Link',
            'menu_name'          => 'Links',
            'add_new'            => 'Hinzufügen',
            'add_new_item'       => 'Neuer Link',
            'edit'               => 'Bearbeiten',
            'edit_item'          => 'Link bearbeiten',
            'new_item'           => 'Neuer Link',
            'view'               => 'Ansehen',
            'view_item'          => 'Link ansehen',
            'search_items'       => 'Links suchen',
            'not_found'          => 'Keine Links gefunden',
            'not_found_in_trash' => 'Keine Links im Papierkorb gefunden',
            'parent'             => 'Übergeordneter Link',
        )
    ));
}