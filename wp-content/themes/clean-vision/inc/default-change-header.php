<?php 
/**
 * Change default colors from header options in customizer 
 * @since 1.0.0
 * @package Clean Vision 
 */ 
add_filter( 'visionwp_customizer_header_panel', 'cleanvision_header_styles', 99 );
function cleanvision_header_styles( $sections ) {
    foreach( $sections as $key => &$section ) {
        if( 'header_top_bar_options' == $key ) {
            foreach( $section[ 'fields' ] as $k => &$topbar ) {
                if( 'top_header_bg_color' == $k ) {
                    $topbar[ 'default' ] = '#323232';
                }
                elseif( 'top_header_text_color' == $k ) {
                    $topbar['default'] = '#fff';
                }
            }
        }
        if( 'header_font_options' == $key ) {
            foreach( $section['fields'] as $k => &$font ) {
                if( 'header_submenu_bg_color' == $k ) {
                    $font['default'] = '#fff';
                }
                if( 'header_menu_text_color' == $k ) {
                    $font['default']['normal'] = '#000';
                    $font['default']['hover'] = '#2ecf79';
                    $font['output'][0]['element'] = '.visionwp-header-wrapper nav > ul > li a, .visionwp-header-wrapper .navigation > ul > li a, .sub-menu li a'; 
                    $font['output'][1]['element'] = '.visionwp-header-wrapper nav > ul > li a:hover, .visionwp-header-wrapper .navigation > ul > li a:hover, nav > ul > li .sub-menu li a:hover';
                }
                elseif( 'header_submenu_text_color' == $k ) {
                    $font['default']['normal'] = '#000';
                    $font['default']['hover'] = '#2ecf79';
                }
                elseif( 'header_fonts_options' == $k ) {
                    $font['default']['font-family'] = 'Roboto';
                    $font['default']['font-size'] = '16px';
                    $font['output']['0']['element'] = '.visionwp-header-wrapper nav > ul > li a, .visionwp-header-wrapper .navigation > ul > li a, .sub-menu li a';
                }
            }
        }
        if( 'header_general_options' == $key ) {
            foreach( $section['fields'] as $k => &$general ) {
                if( 'header_bg_color' == $k ) {
                    $general['default'] = '#fff';
                }
                if( 'header_order' == $k ) {
                    $general['default'] =  array( 'title', 'menu' );
                }
            }
        }
        if( 'header_button_options' == $key ) {
            foreach( $section['fields'] as $k => &$button ) {
                if( 'header_btn_bg_color' == $k ) {
                    $button['default']['normal'] = '#2ecf79';
                    $button['default']['hover'] = '#323232';
                }
                elseif( 'header_btn_text_color' == $k ) {
                    $button['default']['normal'] = '#fff';
                    $button['default']['hover'] = '#fff';
                }
                elseif( 'header_btn_border_color' == $k ) {
                    $button['default']['hover'] = '#323232';                
                }
                elseif( 'button_font_options' == $k ) {
                    $button['default']['font-family'] = 'Roboto';
                }
            }
        }
        if( 'title_tagline' == $key ) {
            foreach( $section['fields'] as $k => &$site_identity ) {
                if( 'site_identity_typography' == $k ) {
                    $site_identity['default']['font-family'] = 'Roboto';
                    $site_identity['default']['font-size'] = '32px';
                }
            }
        }
    }
    return $sections;
}