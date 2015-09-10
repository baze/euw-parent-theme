<?php

use Carbon\Carbon;
use Theme\Contracts\EventContract;
use Theme\Contracts\LocationContract;
use Theme\Traits\EventTrait;
use Theme\Traits\LocationTrait;

require 'vendor/autoload.php';

if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function () {
		echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . admin_url( 'plugins.php#timber' ) . '">' . admin_url( 'plugins.php' ) . '</a></p></div>';
	} );

	return;
}

if ( ! defined( 'THEME_URL' ) ) {
	define( 'THEME_URL', get_template_directory_uri() );
}

include( __DIR__ . '/_inc/acf/acf-company-info.php' );
include( __DIR__ . '/_inc/acf/acf-legal.php' );
include( __DIR__ . '/_inc/acf/acf-privacy-policy.php' );

if ( ! class_exists( 'ParentSite' ) ) {
	class ParentSite extends TimberSite {

		public $creationDate;
		public $analyticsProfile;

		function __construct( $options = array() ) {
			parent::__construct( $options );

			add_theme_support( 'post-formats' );
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'menus' );
			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
			) );
			add_filter( 'timber_context', array( $this, 'add_to_context' ) );
			add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
			add_action( 'init', array( $this, 'register_post_types' ) );
			add_action( 'init', array( $this, 'register_taxonomies' ) );
			add_action( 'init', array( $this, 'register_menus' ) );
			add_action( 'init', array( $this, 'register_strings' ) );
			add_action( 'init', array( $this, 'really_block_users' ) );
			add_action( 'init', array( $this, 'add_options_page' ) );
			add_action( 'widgets_init', array( $this, 'register_sidebars' ) );
			add_filter( 'wp_default_scripts', array( $this, 'dequeue_jquery_migrate' ) );
			add_filter( 'acf/save_post', array( $this, 'my_save_post' ) );
//			add_filter( 'acf/update_value', 'wp_kses_post', 10, 1 );
			remove_action( 'wp_head', 'wp_generator' );

			add_filter( 'wpcf7_load_js', '__return_false' );
			add_filter( 'wpcf7_load_css', '__return_false' );

			$this->creationDate     = Carbon::now();
			$this->analyticsProfile = null;
		}

		function register_sidebars() {
			register_sidebar( array(
				'name'          => __( 'Widget Area', 'twentyfifteen' ),
				'id'            => 'dynamic_sidebar',
				'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			) );
		}

		function add_options_page() {
			if ( function_exists( 'acf_add_options_page' ) ) {

				acf_add_options_page( array(
					'page_title' => 'Theme General Settings',
					'menu_title' => 'Theme Settings',
					'menu_slug'  => 'theme-general-settings',
					'capability' => 'edit_posts',
					'redirect'   => false
				) );

				acf_add_options_sub_page( array(
					'page_title'  => 'Theme Header Settings',
					'menu_title'  => 'Header',
					'parent_slug' => 'theme-general-settings',
				) );

				acf_add_options_sub_page( array(
					'page_title'  => 'Theme Footer Settings',
					'menu_title'  => 'Footer',
					'parent_slug' => 'theme-general-settings',
				) );

			}
		}

		function really_block_users() {
			$isAjax = ( defined( 'DOING_AJAX' ) && true === DOING_AJAX ) ? true : false;

			if ( ! $isAjax ) {
				if ( is_admin() && ! current_user_can( 'administrator' ) ) {
					wp_redirect( home_url() );
					exit;
				}
			}
		}

		function dequeue_jquery_migrate( &$scripts ) {
			if ( ! is_admin() ) {
				$scripts->remove( 'jquery' );
//				$scripts->remove( 'jquery-ui-core' );
				$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.11.3' );
			}
		}

		function register_post_types() {
			//this is where you can register custom post types
		}

		function register_taxonomies() {
			//this is where you can register custom taxonomies
		}

		function register_strings() {
			if ( function_exists( 'pll_register_string' ) ) {
				// Datenschutz
				$this->register_string( 'Datenschutz' );
				$this->register_string( get_field( 'datenschutz-preambel', 'options' ), 'euw', true );
				$this->register_string( 'Datenschutzerklärung für die Nutzung von Facebook-Plugins (Like-Button)' );
				$this->register_string( get_field( 'datenschutz-like', 'options' ), 'euw', true );
				$this->register_string( 'Datenschutzerklärung für die Nutzung von Google Analytics' );
				$this->register_string( get_field( 'datenschutz-analytics', 'options' ), 'euw', true );
				$this->register_string( 'Datenschutzerklärung für die Nutzung von Google Adsense' );
				$this->register_string( get_field( 'datenschutz-adsense', 'options' ), 'euw', true );
				$this->register_string( 'Datenschutzerklärung für die Nutzung von Google +1' );
				$this->register_string( get_field( 'datenschutz-plus', 'options' ), 'euw', true );
				$this->register_string( 'Datenschutzerklärung für die Nutzung von Twitter' );
				$this->register_string( get_field( 'datenschutz-twitter', 'options' ), 'euw', true );

				// Impressum
				$this->register_string( 'Disclaimer' );
				$this->register_string( get_field( 'disclaimer_anzeigen', 'options' ), 'euw', false );
				$this->register_string( 'Haftung für Inhalte' );
				$this->register_string( get_field( 'haftung-fuer-inhalte', 'options' ), 'euw', true );
				$this->register_string( 'Haftung für Links' );
				$this->register_string( get_field( 'haftung-fuer-links', 'options' ), 'euw', true );
				$this->register_string( 'Urheberrecht' );
				$this->register_string( get_field( 'urheberrecht', 'options' ), 'euw', true );

				// tmg
				$this->register_string( 'Angaben gemäß § 5 TMG:' );
				$this->register_string( get_field( 'firmenbezeichnung', 'options' ), 'euw', false );
				$this->register_string( get_field( 'strasse_hausnummer', 'options' ), 'euw', false );
				$this->register_string( get_field( 'postleitzahl', 'options' ), 'euw', false );
				$this->register_string( get_field( 'ort', 'options' ), 'euw', false );
				$this->register_string( 'Vertreten durch:' );
				$this->register_string( get_field( 'vertretungsberechtigt', 'options' ), 'euw', true );
				$this->register_string( 'Kontakt' );
				$this->register_string( 'Telefon:' );
				$this->register_string( get_field( 'telefon', 'options' ), 'euw', false );
				$this->register_string( 'Telefax:' );
				$this->register_string( get_field( 'telefax', 'options' ), 'euw', false );
				$this->register_string( 'E-Mail:' );
				$this->register_string( get_field( 'e-mail', 'options' ), 'euw', false );
				$this->register_string( 'Registereintrag' );
				$this->register_string( get_field( 'registereintrag-art', 'options' ), 'euw', true );
				$this->register_string( get_field( 'registergericht', 'options' ), 'euw', true );
				$this->register_string( get_field( 'registernummer', 'options' ), 'euw', true );
				$this->register_string( 'Umsatzsteuer-ID:' );
				$this->register_string( 'Umsatzsteuer-Identifikationsnummer gemäß §27 a Umsatzsteuergesetz:' );
				$this->register_string( get_field( 'ust-id', 'options' ), 'euw', false );

				// Custom
				$this->register_string( 'Telefon' );
				$this->register_string( 'E-Mail' );
				$this->register_string( 'Alle Rechte vorbehalten.' );
				$this->register_string( 'Mehr erfahren' );

				$this->register_string( 'Sorry' );
				$this->register_string( "we couldn't find what you're looking for" );
			}
		}

		function register_menus() {
			register_nav_menus( array(
				'menu_primary'   => 'Hauptmenü',
				'menu_secondary' => 'Footermenü',
				'menu_custom'    => 'Benutzerdefiniertes Menü'
			) );
		}

		public function add_to_context( $context ) {
			$context['site'] = $this;

			$context['now']          = Carbon::now();
			$context['creationDate'] = $this->creationDate->format( 'Y' );

			$context['analyticsProfile'] = $this->analyticsProfile;

			$context['menu_primary']   = new TimberMenu( "menu_primary" );
			$context['menu_secondary'] = new TimberMenu( "menu_secondary" );
			$context['menu_custom']    = new TimberMenu( "menu_custom" );

			$context['dynamic_sidebar'] = Timber::get_widgets( 'dynamic_sidebar' );
			$context['search_form']     = get_search_form( $echo = false );

			if ( function_exists( 'yoast_breadcrumb' ) ) {
				$context['breadcrumbs'] = yoast_breadcrumb( '<div id="breadcrumbs" class="_snippet-breadcrumbs" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">', '</div>', false );
			}

			if ( function_exists( 'get_fields' ) ) {
				$context['options'] = get_fields( 'option' );

//				dd($context['options']['global-openinghours-list'][0]['range'][0]);
			}

			if ( function_exists( 'pll_the_languages' ) ) {
				$context['language_switcher'] = pll_the_languages( $args = [
					'show_names'             => 0,
					'show_flags'             => 1,
					'hide_if_empty'          => 0,
					'hide_if_no_translation' => 0,
					'hide_current'           => 0,
					'echo'                   => 0
				] );
			}

			if ( function_exists( 'get_field' ) ) {
				$context['global_businessinfo_firmenbezeichnung']  = get_field( 'firmenbezeichnung', 'options' );
				$context['global_businessinfo_strasse_hausnummer'] = get_field( 'strasse_hausnummer', 'options' );
				$context['global_businessinfo_postleitzahl']       = get_field( 'postleitzahl', 'options' );
				$context['global_businessinfo_ort']                = get_field( 'ort', 'options' );
				$context['global_businessinfo_bundesland']         = get_field( 'bundesland', 'options' );
				$context['global_businessinfo_telefon']            = get_field( 'telefon', 'options' );
				$context['global_businessinfo_telefon_link']       = get_field( 'telefon-link', 'options' );
				$context['global_businessinfo_telefax']            = get_field( 'telefax', 'options' );
				$context['global_businessinfo_telefax_link']       = get_field( 'telefax-link', 'options' );
				$context['global_businessinfo_email']              = get_field( 'e-mail', 'options' );

				$context['fallback_header_image'] = get_field( 'fallback_header_image', 'options' );
			}

			if ( function_exists( 'acf_form_head' ) ) {
				ob_start();

//				acf_form_head();

				$context['acf_form_head'] = ob_get_contents();

				ob_clean();
			}

			$detect                 = new Mobile_Detect;
			$context['isMobile']    = $detect->isMobile();
			$context['isTablet']    = $detect->isTablet();
			$context['isPhone']     = $detect->isMobile() && ! $detect->isTablet();
			$context['deviceClass'] = $detect->isMobile() ? $detect->isTablet() ? 'tablet' : 'phone' : 'desktop';

			return $context;
		}

		function register_string( $string, $domain = 'polylang', $multiline = false ) {
			$slug = sanitize_title( $string );
			pll_register_string( $slug, $string, $domain, $multiline );
		}

		function add_to_twig( $twig ) {
			/* this is where you can add your own fuctions to twig */
			$twig->addExtension( new Twig_Extension_StringLoader() );
//			$twig->addFilter( 'myfoo', new Twig_Filter_Function( 'myfoo' ) );
			$twig->addFunction( new Twig_SimpleFunction( 'placeholder', function ( $width = 48, $height = 48 ) {
				return "http://placehold.it/{$width}x{$height}";
			} ) );
			$twig->addFunction( new Twig_SimpleFunction( '_e', 'get_translation' ) );
			$twig->addFunction( new Twig_SimpleFunction( 'acf_form', function ( $post_type = 'post', $post_status = 'draft', $submit_value = 'Update', $updated_message = 'Post updated' ) {
				if ( function_exists( 'acf_form' ) ) {

					ob_start();

					acf_form( array(
						'post_id'         => 'new_post',
						'post_title'      => true,
						'new_post'        => array(
							'post_type'   => $post_type,
							'post_status' => $post_status
						),
						'submit_value'    => __( $submit_value, 'acf' ),
						'updated_message' => __( $updated_message, 'acf' ),
					) );

					$form = ob_get_contents();

					ob_clean();

					return $form;
				}
			} ) );
			$twig->addFunction( new Twig_SimpleFunction( 'convertTo', function ( $pid, $PostClass = 'TimberPost' ) {
				if ( is_array( $pid ) && ! TimberHelper::is_array_assoc( $pid ) ) {
					foreach ( $pid as &$p ) {
						$p = new $PostClass( $p );
					}

					return $pid;
				}

				return new $PostClass( $pid );
			} ) );
			$twig->addFunction( new Twig_SimpleFunction( 'get_posts', function ( $post_type = 'post', $limit = - 1 ) {

				$posts = Timber::get_posts( [
					'post_type'   => $post_type,
					'order_by'    => 'date',
					'order'       => 'DESC',
					'numberposts' => $limit
				] );

				if ( $post_type == 'event' ) {
					usort( $posts, function ( $ev_a, $ev_b ) {
						$a = $ev_a->get_field( 'dates' )[0]['start'];
						$b = $ev_b->get_field( 'dates' )[0]['start'];

						if ( $a == $b ) {
							return 0;
						}

						return ( $a < $b ) ? - 1 : 1;
					} );
				}

				return $posts;
			} ) );

			return $twig;
		}

	}
}

if ( ! function_exists( 'get_translation' ) ) {
	function get_translation( $translated_text, $domain = 'polylang' ) {

		if ( function_exists( 'pll__' ) ) {
			$translated_text = pll__( $translated_text, $domain );
		}

		return $translated_text;
	}
}

if ( ! function_exists( 'dd' ) ) {
	function dd( $value ) {
		die( var_dump( $value ) );
	}
};

if ( ! class_exists( 'LocationPost' ) ) {
	class LocationPost extends TimberPost implements LocationContract {

		use LocationTrait;

		public function __construct( $pid = null ) {
			$pid = $this->determine_id( $pid );
			parent::__construct( $pid );
		}
	}
}

if ( ! class_exists( 'EventPost' ) ) {
	class EventPost extends TimberPost implements LocationContract, EventContract {

		use LocationTrait;
		use EventTrait;

	}
}

if ( ! class_exists( 'EventTerm' ) ) {
	class EventTerm extends TimberTerm {

		public function get_posts_with_filters( $filters = [ ] ) {

			$args = [
				'post_type' => 'event'
			];

			if ( ! empty( $filters ) ) {
				$args['meta_query'] = [
					'relation' => 'O'
				];

				foreach ( $filters as $filter ) {
					$array['key']   = $filter['key'];
					$array['value'] = $filter['value'];

					if ( is_array( $filter['value'] ) ) {
						$array['compare'] = $filter['IN'];
					} else {
						$array['compare'] = 'LIKE';
					}

					$args['meta_query'][] = $array;
				}

			}

			$events = $this->get_posts( $args );

			return $events;

		}

		public function upcoming_events_for_month( $now, $filters = [ ] ) {

			$events = $this->get_posts_with_filters( $filters );

			$upcomingEventsThisMonth = [ ];

			foreach ( $events as $event ) {
				$event = new EventPost( $event );

				if ( $event->start->year == $now->year
				     && $event->start->month == $now->month
				     && $event->start->day >= $now->day
				) {
					$upcomingEventsThisMonth[] = $event;
				}
			}

			usort( $upcomingEventsThisMonth, function ( $ev_a, $ev_b ) {
				$a = $ev_a->get_field( 'dates' )[0]['start'];
				$b = $ev_b->get_field( 'dates' )[0]['start'];

				if ( $a == $b ) {
					return 0;
				}

				return ( $a < $b ) ? - 1 : 1;
			} );

			return $upcomingEventsThisMonth;

		}

	}
}

if ( ! function_exists( 'my_save_post' ) ) {
	function my_save_post( $post_id ) {

		// bail early if not a contact_form post
		if ( get_post_type( $post_id ) !== 'contact_form' ) {

			return;

		}


		// bail early if editing in admin
		if ( is_admin() ) {

			return;

		}


		// vars
		$post = get_post( $post_id );


		// get custom fields (field group exists for content_form)
		$name  = get_field( 'name', $post_id );
		$email = get_field( 'email', $post_id );


		// email data
		$to      = 'martensen@euw.de';
		$headers = 'From: ' . $name . ' <' . $email . '>' . "\r\n";
		$subject = $post->post_title;
		$body    = $post->post_content;


		// send email
		wp_mail( $to, $subject, $body, $headers );

	}
};