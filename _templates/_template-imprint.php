<?php
/**
 * Template Name: Impressum
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

// disclaimer
$context['show_disclaimer'] = get_translation(get_field('disclaimer_anzeigen', 'options'), 'options');
$context['haftung_fuer_inhalte'] = get_translation(get_field('haftung-fuer-inhalte', 'options'), 'options');
$context['haftung_fuer_links'] = get_translation(get_field('haftung-fuer-links', 'options'), 'options');
$context['urheberrecht'] = get_translation(get_field('urheberrecht', 'options'), 'options');

// tmg
//$context['title_tmg'] = get_translation('Angaben gemäß § 5 TMG:', 'options);

$context['firmenbezeichnung'] = get_field('firmenbezeichnung', 'options');
$context['strasse_hausnummer'] = get_field('strasse_hausnummer', 'options');
$context['postleitzahl'] = get_field('postleitzahl', 'options');
$context['ort'] = get_field('ort', 'options');

$context['vertretungsberechtigt_title'] = get_translation('Vertreten durch:', 'options');
$context['vertretungsberechtigt'] = get_translation(get_field('vertretungsberechtigt', 'options'), 'options');

$context['kontakt_title'] = get_translation('Kontakt', 'options');
$context['telefon_label'] = get_translation('Telefon:', 'options');
$context['telefon'] = get_translation(get_field('telefon', 'options'), 'options');
$context['telefax_label'] = get_translation('Telefax:', 'options');
$context['telefax'] = get_translation(get_field('telefax', 'options'), 'options');
$context['email_label'] = get_translation('E-Mail:', 'options');
$context['email'] = get_translation(get_field('e-mail', 'options'), 'options');

$context['registereintrag_title'] = get_translation('Registereintrag', 'options');
$context['registereintrag_art'] = get_translation(get_field('registereintrag-art', 'options'), 'options');
$context['registergericht'] = get_translation(get_field('registergericht', 'options'), 'options');
$context['registernummer'] = get_translation(get_field('registernummer', 'options'), 'options');

$context['ust_id_title'] = get_translation('Umsatzsteuer-ID:', 'options');
$context['ust_id_label'] = get_translation('Umsatzsteuer-Identifikationsnummer gemäß §27 a Umsatzsteuergesetz:',
	'options');
$context['ust_id'] = get_translation(get_field('ust-id', 'options'), 'options');

Timber::render(array('page-imprint.twig', 'page.twig'), $context);