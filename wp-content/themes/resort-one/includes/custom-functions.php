<?php
/**
 * Resort functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Resort_One
 */
/**
 * Assets file.
 *
 * @since 1.0.0
 *
 * @return void
 */
function resort_one_assets() {
	$my_theme = wp_get_theme();
	$version  = $my_theme['Version'];

	wp_enqueue_style( 'hotell', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'resort-one', get_stylesheet_directory_uri() . '/style.css', array( 'hotell' ), $version );

	// Add styles inline.
	wp_add_inline_style( 'resort-one', hotell_get_font_face_styles() );

}
add_action( 'wp_enqueue_scripts', 'resort_one_assets', 10 );
