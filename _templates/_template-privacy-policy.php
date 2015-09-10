<?php
/**
 * Template Name: Datenschutz
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$context['datenschutz_preambel_title'] = get_translation('Datenschutz', 'options');
$context['datenschutz_preambel'] = get_translation(get_field('datenschutz-preambel', 'options'), 'options');

$context['datenschutz_like_title'] = get_translation('Datenschutzerklärung für die Nutzung von Facebook-Plugins (Like-Button)', 'options');
$context['datenschutz_like'] = get_translation(get_field('datenschutz-like', 'options'), 'options');

$context['datenschutz_analytics_title'] = get_translation('Datenschutzerklärung für die Nutzung von Google
Analytics', 'options');
$context['datenschutz_analytics'] = get_translation(get_field('datenschutz-analytics', 'options'), 'options');

$context['datenschutz_adsense_title'] = get_translation('Datenschutzerklärung für die Nutzung von Google Adsense',
	'options');
$context['datenschutz_adsense'] = get_translation(get_field('datenschutz-adsense', 'options'), 'options');

$context['datenschutz_plus_title'] = get_translation('Datenschutzerklärung für die Nutzung von Google +1', 'options');
$context['datenschutz_plus'] = get_translation(get_field('datenschutz-plus', 'options'), 'options');

$context['datenschutz_twitter_title'] = get_translation('Datenschutzerklärung für die Nutzung von Twitter', 'options');
$context['datenschutz_twitter'] = get_translation(get_field('datenschutz-twitter', 'options'), 'options');

Timber::render(array('page-privacy-policy.twig', 'page.twig'), $context);