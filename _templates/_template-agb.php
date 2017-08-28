<?php
/**
 * Template Name: AGB
 */

$context         = Timber::get_context();
$post            = new TimberPost();
$context['post'] = $post;

Timber::render( array( 'page-agb.twig', 'page.twig' ), $context );