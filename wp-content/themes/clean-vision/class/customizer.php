<?php 
/**
 * Adding new options to existing section
 * @since 1.0.0
 * @package Clean Vision WordPress Theme
 */ 
class CleanVision_Customizer {
    public function __construct() {
        add_filter( 'visionwp_customizer_header_panel',  array( $this, 'header_social_options' ) , 99 );
    }

    public function header_social_options( $sections ) {
        foreach ( $sections as $key => &$section ) {
            if( 'header_top_bar_options' == $key ) {         
                $section[ 'fields' ][ 'header_social_menu' ] = array(
                    'label' => esc_html__( 'Social Link', 'clean-vision' ),
                    'priority'  => 40,
                    'type'  => 'repeater',
                    'row_label' => array(
                        'type'  => 'text',
                        'value' => esc_html__( 'Social Link', 'clean-vision' ),
                    ),
                    'fields' => array(
                        'label' =>  array(
                            'type'  => 'text',
                            'label' => esc_html__( 'Label', 'clean-vision' ),
                        ),
                        'url' =>  array(
                            'type'  => 'text',
                            'label' => esc_html__( 'URL', 'clean-vision' ),
                        ),
                    ),
                    'active_callback'   => array(
                        array(
                            'setting'   => 'top_header_enable',
                            'operator'  => '==',
                            'value' => true, 
                        ),
                    )
                );
                $section['fields']['header_topbar_sortable'] = array(
                    'label' => esc_html__( 'Topbar Layout' , 'clean-vision' ),
                    'priority'  => 50,
                    'type'  => 'sortable',
                    'default'   => array( 'social-menu', 'meta-info' ),
                    'choices'   => array(
                        'social-menu'  => esc_html__( 'Social Menu', 'clean-vision' ),
                        'meta-info'  => esc_html__( 'Meta Information', 'clean-vision' ),
                    ),
                    'active_callback' => array(
                        array(
                            'setting'   => 'top_header_enable',
                            'operator'  => '==',
                            'value' => true, 
                        ),
                    )
                );
            }
        }
        return $sections;
    }
}
    
new CleanVision_Customizer();