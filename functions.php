<?php
/**
 * Custom Starter Theme functions and definitions
 *
 * @package CustomStarterTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
/**
 * Theme Setup
 */
function custom_starter_theme_setup() {
	// Let WordPress manage the document title tag
	add_theme_support( 'title-tag' ); 
	// Enable support for Post Thumbnails / Featured Images
	add_theme_support( 'post-thumbnails' );

	// Register Navigation Menus
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'custom-starter-theme' ),
		'footer'  => __( 'Footer Menu', 'custom-starter-theme' ),
	) );

	// Switch default core markup to output valid HTML5
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );
}
add_action( 'after_setup_theme', 'custom_starter_theme_setup' );

/**
 * Keep the primary navigation label consistent with the homepage.
 */
function custom_starter_theme_primary_menu_labels( $items, $args ) {
	if ( 'primary' === $args->theme_location ) {
		foreach ( $items as $item ) {
			if ( 0 === strcasecmp( 'Looks', trim( $item->title ) ) ) {
				$item->title = 'Aliados';
			}
		}
	}

	return $items;
}
add_filter( 'wp_nav_menu_objects', 'custom_starter_theme_primary_menu_labels', 10, 2 );

/**
 * Enqueue Styles and Scripts
 */
function custom_starter_theme_scripts() {
	wp_enqueue_style( 'custom-starter-theme-style', get_stylesheet_uri(), array(), '1.0.0' );
	wp_enqueue_script(
		'custom-starter-theme-script',
		get_template_directory_uri() . '/script.js',
		array(),
		'1.0.0',
		true
	);
}
add_action( 'wp_enqueue_scripts', 'custom_starter_theme_scripts' );