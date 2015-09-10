<?php
/**
 * Template Name: News
 */

global $paged;
if ( ! isset( $paged ) || ! $paged ) {
	$paged = 1;
}

$context         = Timber::get_context();
$post            = new TimberPost();
$context['post'] = $post;

$args = [
	'post_type'      => 'post',
	'order_by'       => 'date',
	'order'          => 'DESC',
//	'posts_per_page' => 1,
	'paged'          => $paged
];

$categories = $post->get_field( 'categories' );

if ( $categories ) {
	$args['cat'] = implode( ',', $categories );
}

/* THIS LINE IS CRUCIAL */
/* in order for WordPress to know what to paginate */
/* your args have to be the defualt query */
query_posts( $args );
/* make sure you've got query_posts in your .php file */
$context['posts'] = Timber::get_posts();
$context['pagination'] = Timber::get_pagination();



Timber::render( array( 'page-news.twig', 'page.twig' ), $context );