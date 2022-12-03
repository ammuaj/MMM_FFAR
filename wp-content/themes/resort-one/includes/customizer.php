<?php
/**
 * Theme Customizer
 *
 * @package Resort_One
 */

/**
 * Information links.
*/
function hotell_customizer_theme_info( $wp_customize ) {

	$wp_customize->add_section(
		'theme_info',
		array(
			'title'    => __( 'Information Links', 'resort-one' ),
			'priority' => 6,
		)
	);

	/** Important Links */
	$wp_customize->add_setting(
		'theme_info_theme',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	$theme_info  = '<ul>';
	$theme_info .= sprintf( __( '<li>View demo: %1$sClick here.%2$s</li>', 'resort-one' ), '<a href="' . esc_url( 'https://glthemes.com/live-demo/?theme=resort-one' ) . '" target="_blank">', '</a>' );
	$theme_info .= sprintf( __( '<li>View documentation: %1$sClick here.%2$s</li>', 'resort-one' ), '<a href="' . esc_url( 'https://glthemes.com/documentation/resort-one/' ) . '" target="_blank">', '</a>' );
	$theme_info .= sprintf( __( '<li>Theme info: %1$sClick here.%2$s</li>', 'resort-one' ), '<a href="' . esc_url( 'https://glthemes.com/wordpress-themes/resort-one/' ) . '" target="_blank">', '</a>' );
	$theme_info .= sprintf( __( '<li>Support ticket: %1$sClick here.%2$s</li>', 'resort-one' ), '<a href="' . esc_url( 'https://glthemes.com/support/' ) . '" target="_blank">', '</a>' );
	$theme_info .= sprintf( __( '<li>More WordPress Themes: %1$sClick here.%2$s</li>', 'resort-one' ), '<a href="' . esc_url( 'https://glthemes.com/wordpress-theme/' ) . '" target="_blank">', '</a>' );
	$theme_info .= sprintf( __( '<li>Go Premium: %1$sClick here.%2$s</li>', 'resort-one' ), '<a href="' . esc_url( 'https://glthemes.com/wordpress-theme/hotell-pro/' ) . '" target="_blank">', '</a>' );
	$theme_info .= '</ul>';

	$wp_customize->add_control(
		new Hotell_Note_Control(
			$wp_customize,
			'theme_info_theme',
			array(
				'label'       => __( 'Important Links', 'resort-one' ),
				'section'     => 'theme_info',
				'description' => $theme_info,
			)
		)
	);

}
