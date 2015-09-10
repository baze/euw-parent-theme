<?php

add_action('init', 'cptui_register_my_cpt_produkt');
function cptui_register_my_cpt_produkt()
{
    register_post_type('product', array(
        'label'           => 'Produkte',
        'description'     => '',
        'public'          => true,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'capability_type' => 'post',
        'map_meta_cap'    => true,
        'hierarchical'    => true,
        'rewrite'         => array('slug' => 'produkt', 'with_front' => true),
        'query_var'       => true,
        'has_archive'     => true,
        'supports'        => array('title', 'editor', 'excerpt', 'thumbnail', 'author'),
        'labels'          => array(
            'name'               => 'Produkte',
            'singular_name'      => 'Produkt',
            'menu_name'          => 'Produkte',
            'add_new'            => 'Hinzufügen',
            'add_new_item'       => 'Neues Produkt',
            'edit'               => 'Bearbeiten',
            'edit_item'          => 'Produkt bearbeiten',
            'new_item'           => 'Neues Produkt',
            'view'               => 'Ansehen',
            'view_item'          => 'Produkt ansehen',
            'search_items'       => 'Produkte durchsuchen',
            'not_found'          => 'Keine Produkte gefunden',
            'not_found_in_trash' => 'Keine Produkte im Papierkorb gefunden',
            'parent'             => 'Übergeordnetes Produkt',
        )
    ));
}

include( __DIR__ . '/acf-product.php' );
include( __DIR__ . '/tax-product-categories.php' );