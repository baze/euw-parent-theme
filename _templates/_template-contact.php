<?php
/**
 * Template Name: Kontakt
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
	wpcf7_enqueue_scripts();
}

if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
	wpcf7_enqueue_styles();
}

Timber::render(array('page-contact.twig', 'page.twig'), $context);