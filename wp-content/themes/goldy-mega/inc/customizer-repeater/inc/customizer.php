<?php
function goldy_mega_customizer_repeater_register( $wp_customize ) {
	//require_once IFT_PLUGIN_DIR_PATH .'/includes/pro/customizer-repeater/class/customizer-repeater-control.php';
	require get_template_directory() . '/inc/customizer-repeater/class/customizer-repeater-control.php';
}
add_action( 'customize_register', 'goldy_mega_customizer_repeater_register' );

function customizer_repeater_sanitize($input){
	$input_decoded = json_decode($input,true);

	if(!empty($input_decoded)) {
		foreach ($input_decoded as $boxk => $box ){
			foreach ($box as $key => $value){

					$input_decoded[$boxk][$key] = wp_kses_post( force_balance_tags( $value ) );

			}
		}
		return json_encode($input_decoded);
	}
	return $input;
}