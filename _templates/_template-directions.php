<?php
/**
 * Template Name: Anfahrt
 */

$context = Timber::get_context();
$post = new LocationPost();
$context['post'] = $post;

$context['map'] = $post->map( get_field( 'firmenbezeichnung', 'option' ), [
	get_field( 'strasse_hausnummer', 'option' ),
	get_field( 'postleitzahl', 'option' ),
	get_field( 'ort', 'option' ),
	get_field( 'bundesland', 'option' ),
	get_field( 'land', 'option' )
]);

Timber::render(array('page-directions.twig', 'page.twig'), $context);