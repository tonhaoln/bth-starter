<?php
/**
 * starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bth-starter
 */

 define('TEMPLATE_PATH','template-parts/');

if ( ! function_exists( 'starter_setup' ) ) :
	
	function starter_setup() {

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-menu' => esc_html__( 'Primary', 'bth-starter' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
endif;
add_action( 'after_setup_theme', 'starter_setup' );


/**
 * Enqueue scripts and styles.
 */
function starter_assets() {
	wp_enqueue_style( 'starter-style', get_template_directory_uri() . '/dist/css/bundle.css', array(), _S_VERSION );

	wp_enqueue_script( 'starter-script', get_template_directory_uri() . '/dist/js/bundle.js', array('jquery'), _S_VERSION, true );

	wp_localize_script('starter-script', 'ajax', [
			'nonce' => wp_create_nonce('wp_rest'),
			'url' => admin_url('admin-ajax.php'),
			'post' => get_post_field('post_name', get_post())
	]);	

}
add_action( 'wp_enqueue_scripts', 'starter_assets' );

