<?php
/**
 * Custom header
 */

function architecture_building_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'architecture_building_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 100,
		'wp-head-callback'       => 'architecture_building_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'architecture_building_custom_header_setup' );

if ( ! function_exists( 'architecture_building_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see architecture_building_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'architecture_building_header_style' );
function architecture_building_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
        .wrap_figure,.page-template-custom-home-page .wrap_figure{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'architecture-building-style', $custom_css );
	endif;
}
endif;