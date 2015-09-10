<?php

add_action('init', 'cptui_register_my_cpt_job');
function cptui_register_my_cpt_job()
{
    register_post_type('job-offer', array(
        'label'           => 'Jobs',
        'description'     => '',
        'public'          => true,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'capability_type' => 'post',
        'map_meta_cap'    => true,
        'hierarchical'    => false,
        'rewrite'         => array('slug' => 'jobs', 'with_front' => true),
        'query_var'       => true,
        'supports'        => array('title', 'editor', 'excerpt', 'trackbacks', 'custom-fields', 'revisions', 'thumbnail', 'author'),
        'taxonomies'      => array('post_tag'),
        'labels'          => array(
            'name'               => 'Jobs',
            'singular_name'      => 'Job',
            'menu_name'          => 'Jobs',
            'add_new'            => 'Hinzufügen',
            'add_new_item'       => 'Neuer Job',
            'edit'               => 'Bearbeiten',
            'edit_item'          => 'Job bearbeiten',
            'new_item'           => 'Neuer Job',
            'view'               => 'Ansehen',
            'view_item'          => 'Job ansehen',
            'search_items'       => 'Jobs durchsuchen',
            'not_found'          => 'Keine Jobs gefunden',
            'not_found_in_trash' => 'Keine Jobs im Papierkorb gefunden',
            'parent'             => 'Übergeordneter Job',
        )
    ));
}