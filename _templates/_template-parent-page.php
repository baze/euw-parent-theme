<?php
/**
 * Template Name: Eltern-Seite
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

Timber::render(array('page-parent-' . $post->post_name . '.twig', 'page-parent.twig', 'page-' . $post->post_name . '.twig', 'page.twig'), $context);