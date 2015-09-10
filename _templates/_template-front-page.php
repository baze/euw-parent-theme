<?php
/**
 * Template Name: Startseite
 */

$context         = Timber::get_context();
$post            = new TimberPost();
$context['post'] = $post;

$posts = Timber::get_posts( [
	'post_type' => 'post',
	'order_by'  => 'date',
	'order'     => 'DESC'
] );
$context['posts'] = $posts;

Timber::render( array( 'front-page.twig', 'home.twig', 'page.twig' ), $context );