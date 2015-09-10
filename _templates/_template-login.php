<?php
/**
 * Template Name: Login
 */

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$context['user'] = new TimberUser();
$context['logout_url'] = wp_logout_url( home_url() );

$args = array(
	'echo'           => false,
	'redirect'       => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
	'form_id'        => 'loginform',
	'label_username' => __( 'Username' ),
	'label_password' => __( 'Password' ),
	'label_remember' => __( 'Remember Me' ),
	'label_log_in'   => __( 'Log In' ),
	'id_username'    => 'user_login',
	'id_password'    => 'user_pass',
	'id_remember'    => 'rememberme',
	'id_submit'      => 'wp-submit',
	'remember'       => true,
	'value_username' => '',
	'value_remember' => false
);

$context['login_form'] = wp_login_form( $args );

Timber::render( array( 'page-login.twig', 'page.twig' ), $context );