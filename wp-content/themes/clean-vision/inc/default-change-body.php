<?php 
/**
 * Change default colors from theme options in customizer 
 * @since 1.0.0
 * @package Clean Vision 
 */ 
add_filter( 'visionwp_customizer_theme_panel', 'cleanvision_theme_styles', 99 );
function cleanvision_theme_styles( $sections ) {
    foreach( $sections as $key => &$section ) {
        if( 'colors' == $key ) {
            foreach( $section['fields'] as $k => &$color ) {
                if( 'primary_color' == $k ) {
                    $color[ 'default' ] = '#2ecf79';
                } 
                elseif( 'enable_sidebar' == $k ) {
                    $color['default'] = 'right';
                }
            }
        }
        if( 'theme_options' == $key ) {
            foreach( $section['fields'] as $k =>&$general_typo ) {
                if( 'general_typography_options' == $k ) {
                    $general_typo['default']['font-family'] = 'Roboto';
                }
                elseif( 'heading_typography_options' == $k ) {
                    $general_typo['default']['font-family'] = 'Roboto';
                }
            }
        }
        if( 'theme_post_options' == $key ) {
            foreach( $section['fields'] as $k => &$theme_post ) {
                if( 'post_per_row' == $k ) {
                    $theme_post['default'] = 'two';
                }
            }
        }
        if( 'breadcrumb_options' == $key ) {
            foreach( $section['fields'] as $k => &$breadcrumb ) {
                if( 'breadcrumb_typography_options' == $k ) {
                    $breadcrumb['default']['font-family'] = 'Roboto';
                }
            }
        }
        if( 'footer_options' == $key ) {
            foreach( $section['fields'] as $k => &$footer ) {
                if( 'footer_bg_color' == $k ) {
                    $footer['default'] = '#323232';
                }
                elseif( 'footer_color' == $k ) {
                    $footer['default'] = '#fff';
                }
            }
        }
    }
    return $sections;
}