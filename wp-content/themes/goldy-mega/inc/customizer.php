<?php
/**
 * goldy_mega Theme Customizer
 *
 * @package goldy_mega
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

global $goldy_mega_fonttotal;	
    $goldy_mega_fonttotal = array(
        __( 'Select Font', 'goldy-mega'  ),
        __( 'Abril Fatface', 'goldy-mega'  ),
        __( 'BenchNine', 'goldy-mega' ),
        __( 'Cookie', 'goldy-mega'  ),
        __( 'Economica', 'goldy-mega'  ),
        __( 'Monda' , 'goldy-mega' ),
    );


function goldy_mega_customize_register( $wp_customize ) {

	$font_weight = array('100' => '100',
		            '200' => '200',
		            '300' => '300',
		            '400' => '400',
					'500' => '500',
					'600' => '600',
					'700' => '700',
					'800' => '800',
					'900' => '900',
					'bold' => 'bold',
					'bolder' => 'bolder',
					'inherit' => 'inherit',
					'initial' => 'initial',
					'normal' => 'normal',
					'revert' => 'revert',
					'unset' => 'unset',
				);

	$text_transform = array(
						'capitalize' => 'Capitalize',
						'inherit'	 => 'Inherit',
						'lowercase'  => 'Lowercase',
						'uppercase'  => 'Uppercase',
	);

	$image_position = array(
						'left top' => 'Left Top',
			        	'left center' => 'Left Center',
			        	'left bottom' => 'Left Bottom',
			            'right top' => 'Right Top',
			            'right center' => 'Right Center',
			            'right bottom' => 'Right Bottom',
			            'center top' => 'Center Top',
			            'center center' => 'Center Center',
			            'center bottom' => 'Center Bottom',
	);

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'goldy_mega_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'goldy_mega_customize_partial_blogdescription',
			)
		);
	}

	//Pro Section
		$wp_customize->add_section( 'upgrate_pro_section' , array(
			'title'             => 'Upgrade To Pro',
			'priority' => 0,
		) );
		//
	    $wp_customize->add_setting( 'goldy_mega_upgrate_pro', 
	        array(
	            'type'       => 'theme_mod',
	            'transport'   => 'refresh',
	            'capability' => 'edit_theme_options',
	            'sanitize_callback' => 'sanitize_text_field',
	        ) 
	    ); 
	    $wp_customize->add_control( new pro_section_custom_control( 
	        $wp_customize,'goldy_mega_upgrate_pro', 
	       		array(
						'capability' => 'edit_theme_options',
						'priority' => 0,
						'type' => 'goldy_mega_pro_section',
						'section'    => 'upgrate_pro_section',
					)
	    ) );

	//$wp_customize->remove_control('our_team_text_hover_color','#000000');	
	//$wp_customize->remove_control('alpha_color_setting','rgba(255,255,255,0.3)');	

	//Color Section
		//body link color
			$wp_customize->add_setting( 'goldy_mega_link_color', 
				array(
		            'default'    => '#3c3c3c', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
		        ) 
		    ); 
	        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
		        $wp_customize,'goldy_mega_link_color',array(
		            'label'      => __( 'Link Color', 'goldy-mega' ), 
		            'settings'   => 'goldy_mega_link_color', 
		            'priority'   => 10,
		            'section'    => 'colors',
		        ) 
	        ) ); 
	    //body link hover color
			$wp_customize->add_setting( 'goldy_mega_link_hover_color', 
				array(
		            'default'    => '#015b60', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
		        ) 
		    ); 
	        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
		        $wp_customize,'goldy_mega_link_hover_color',array(
		            'label'      => __( 'Link Hover Color', 'goldy-mega' ), 
		            'settings'   => 'goldy_mega_link_hover_color', 
		            'priority'   => 10,
		            'section'    => 'colors',
		        ) 
	        ) ); 

	//Top Bar Section
		$wp_customize->add_panel( 'topbar_header_section', array(
			'title'       => __('Top Bar', 'goldy-mega'),
			'priority'    => 1,
		) );
		//Create Contact Info Section
		    $wp_customize->add_section( 'goldy_mega_contact_section' , array(
				'title'             => 'Contact Info',
				'panel'             => 'topbar_header_section',
			) );
		    //Contact Info Section in contact number
			    $wp_customize->add_setting( 'goldy_mega_contact_info_number', 
			        array(
			            'default'    => '044632353231111',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'goldy_mega_contact_info_number', 
			        array(
			            'label'      => __( 'Contact No.', 'goldy-mega' ), 
			            'type'       => 'text',
			            'settings'   => 'goldy_mega_contact_info_number',
			            'section'    => 'goldy_mega_contact_section',
			        ) 
		        ) ); 
		    //Contact Info Section in Email Info
			    $wp_customize->add_setting( 'goldy_mega_email_info', 
			        array(
			            'default'    => '35323@gmail.com',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'goldy_mega_email_info', 
			        array(
			            'label'      => __( 'Email Info', 'goldy-mega' ), 
			            'type'       => 'text',
			            'settings'   => 'goldy_mega_email_info',
			            'section'    => 'goldy_mega_contact_section',
			        ) 
		        ) );
		//Top Bar Width
		    $wp_customize->add_section( 'goldy_mega_top_bar_width' , array(
				'title'             => 'Top Bar Width',
				'panel'             => 'topbar_header_section',
			) );
		    //Contact Info Section in contact number
			    $wp_customize->add_setting( 'goldy_mega_top_bar_width_layout', 
			        array(
			            'default'    => 'content_width',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'goldy_mega_top_bar_width_layout',array(
			        	'label'      => __( 'Top Bar Width', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_top_bar_width_layout', 
			            'priority'   => 0,
			            'section'    => 'goldy_mega_top_bar_width',
			            'type'    => 'select',
			            'choices' => array(
			            				'full_width' => 'Full Width',
			            				'content_width' => 'Content Width',
			            			),
			        ) 
		        ) );	   
		    //Contact Info Section in contact width
			    $wp_customize->add_setting( 'goldy_mega_top_bar_contact_width', 
			        array(
			            'default'    => '1100',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'goldy_mega_top_bar_contact_width',array(
			        	'label'      => __( 'Top Bar Contact Width', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_top_bar_contact_width', 
			            'priority'   => 0,
			            'section'    => 'goldy_mega_top_bar_width',
			            'type'    => 'number',
			            'active_callback'  => 'goldy_mega_topbar_content_width_call_back',
			        ) 
		        ) );	   
		//Create Social Info Section
		    $wp_customize->add_section( 'social_icon_section' , array(
				'title'             => 'Social Info',
				'panel'             => 'topbar_header_section',
			) );
			// Social Icon tabing
				$wp_customize->add_setting( 'social_icon_tab', 
			        array(
			            'default'    => 'general', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new Custom_Radio_Control( 
			        $wp_customize,'social_icon_tab',array(
			            'settings'   => 'social_icon_tab', 
			            'priority'   => 10,
			            'section'    => 'social_icon_section',
			            'type'    => 'select',
			            'choices'    => array(
				        	'general' => 'General',
				        	'design' => 'Design',
			        	),
			        ) 
		        ) ); 
		    //Display Social Icon
		        $wp_customize->add_setting( 'display_social_icon', array(		                
	                'default'   => true,
					'priority'  => 10,
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'goldy_mega_sanitize_checkbox',
			    ));
			    $wp_customize->add_control(  new WP_Customize_Control( $wp_customize,'display_social_icon', 
			    	array(
		                'label' => 'Display Social Icon',
		                'type'  => 'checkbox', // this indicates the type of control
		                'section' => 'social_icon_section',
		                'settings' => 'display_social_icon',
		                'active_callback' => 'goldy_mega_social_icon_general_callback',
			        )
			    )); 
			//Create Social Icon in add filed
				$wp_customize->add_setting( 'social_icon_section_content', 
					array(
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'default' => goldy_mega_get_icon_default(),
				            'sanitize_callback' => 'customizer_repeater_sanitize',
				        ) 
				);
				$wp_customize->add_control( new Customizer_Repeater( 
				$wp_customize, 'social_icon_section_content', array(
					'label'                             => esc_html__( 'Icon Items Content', 'goldy-mega' ),
					'section'                           => 'social_icon_section',
					'add_field_label'                   => esc_html__( 'Add new Icon', 'goldy-mega' ),
					'item_name'                         => esc_html__( 'Icon Item', 'goldy-mega' ),
					'customizer_repeater_icon_control'  => true,
					'customizer_repeater_link_control'  => true,
		            'customizer_repeater_checkbox_control' => true,
		            'active_callback' => 'goldy_mega_social_icon_general_callback',
				    ) ) );
			//Social Icon in pro version
				$wp_customize->add_setting('social_icon_pro', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new Customize_Upgrade_Control(
			    	$wp_customize,'social_icon_pro',
			    	array(
				        'settings' => 'social_icon_pro',
				        'section' => 'social_icon_section',
				        'active_callback' => 'goldy_mega_social_icon_general_callback',
			        )
			    ));	
			//Social Icon background Color
				$wp_customize->add_setting( 'social_icon_bg_color', 
			        array(
			        	'default'    => '#015b60',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'social_icon_bg_color', 
			        array(
			            'label'      => __( 'Icon Background Color', 'goldy-mega' ), 
			            'settings'   => 'social_icon_bg_color', 
			            'priority'   => 10,
			            'section'    => 'social_icon_section',
			            'active_callback' => 'goldy_mega_social_icon_design_callback',
			        ) 
		        ) );
		    //Social Icon background Hover Color
				$wp_customize->add_setting( 'social_icon_bg_hover_color', 
			        array(
			        	'default'    => '#015b60',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'social_icon_bg_hover_color', 
			        array(
			            'label'      => __( 'Icon Background Hover Color', 'goldy-mega' ), 
			            'settings'   => 'social_icon_bg_hover_color', 
			            'priority'   => 10,
			            'section'    => 'social_icon_section',
			            'active_callback' => 'goldy_mega_social_icon_design_callback',
			        ) 
		        ) );
		    //Social Icon Text Color
		    	$wp_customize->add_setting( 'social_icon_color', 
			        array(
			        	'default'    => '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'social_icon_color', 
			        array(
			            'label'      => __( 'Icon Color', 'goldy-mega' ), 
			            'settings'   => 'social_icon_color', 
			            'priority'   => 10,
			            'section'    => 'social_icon_section',
			            'active_callback' => 'goldy_mega_social_icon_design_callback',
			        ) 
		        ) );
		    //Social Icon Text Hover Color
		    	$wp_customize->add_setting( 'social_icon_hover_color', 
			        array(
			        	'default'    => '#015b60',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'social_icon_hover_color', 
			        array(
			            'label'      => __( 'Icon Hover Color', 'goldy-mega' ), 
			            'settings'   => 'social_icon_hover_color', 
			            'priority'   => 10,
			            'section'    => 'social_icon_section',
			            'active_callback' => 'goldy_mega_social_icon_design_callback',
			        ) 
		        ) );

	//Header Section
    	$wp_customize->add_panel( 'goldy_mega_header_section', array(
			'title'       => __('Header', 'goldy-mega'),
			'priority'    => 2,
		) );
		// Create Header Layouts
			$wp_customize->add_section( 'goldy_mega_header_layouts' , array(
				'title'             => 'Header Option',
				'panel'             => 'goldy_mega_header_section',
			) );
		    //Contact Info Section in contact number
			    $wp_customize->add_setting( 'goldy_mega_header_layout', 
			        array(
			            'default'    => 'header1',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Custom_Radio_Image_Control( 
			        $wp_customize,'goldy_mega_header_layout',array(
			        	'label'      => __( 'Header Layout & Transparent Layout', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_header_layout', 
			            'priority'   => 0,
			            'section'    => 'goldy_mega_header_layouts',
			            'type'    	 => 'select',
			            'choices'    => goldy_mega_header_site_layout(),
			        ) 
		        ) );
		    //Header 1
		        //Header1 Background color
			        $wp_customize->add_setting( 'goldy_mega_header1_bg_color', 
				        array(
				            'default'    => '#015b60', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
				        $wp_customize, 'goldy_mega_header1_bg_color', 
				        array(
				            'label'      => __( 'Background Color', 'goldy-mega' ), 
				            'settings'   => 'goldy_mega_header1_bg_color', 
				            'priority'   => 10, 
				            'section'    => 'goldy_mega_header_layouts',
				            'active_callback' => 'goldy_mega_header1_call_back',
				        ) 
			        ) );
			    //Header1 Text color
			        $wp_customize->add_setting( 'goldy_mega_header1_text_color', 
				        array(
				            'default'    => '#ffffff', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
				        $wp_customize, 'goldy_mega_header1_text_color', 
				        array(
				            'label'      => __( 'Text Color', 'goldy-mega' ), 
				            'settings'   => 'goldy_mega_header1_text_color', 
				            'priority'   => 10, 
				            'section'    => 'goldy_mega_header_layouts',
				            'active_callback' => 'goldy_mega_header1_call_back',
				        ) 
			        ) );
			    //Header1 Link Color
			        $wp_customize->add_setting( 'goldy_mega_header1_Link_color', 
				        array(
				            'default'    => '#ffffff', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
				        $wp_customize, 'goldy_mega_header1_Link_color', 
				        array(
				            'label'      => __( 'Link Color', 'goldy-mega' ), 
				            'settings'   => 'goldy_mega_header1_Link_color', 
				            'priority'   => 10, 
				            'section'    => 'goldy_mega_header_layouts',
				            'active_callback' => 'goldy_mega_header1_call_back',
				        ) 
			        ) );
			    //Header1 Link Hover Color
			        $wp_customize->add_setting( 'goldy_mega_header1_linkhover_color', 
				        array(
				            'default'    => '#13d9b5', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
				        $wp_customize, 'goldy_mega_header1_linkhover_color', 
				        array(
				            'label'      => __( 'Link hover Color', 'goldy-mega' ), 
				            'settings'   => 'goldy_mega_header1_linkhover_color', 
				            'priority'   => 10, 
				            'section'    => 'goldy_mega_header_layouts',
				            'active_callback' => 'goldy_mega_header1_call_back',
				        ) 
			        ) );
			    //Header1 top bar background color
					$wp_customize->add_setting( 'header1_top_bar_bg_color', 
				        array(
				            'default'    => '#ffffff', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
				        $wp_customize,'header1_top_bar_bg_color', 
				        array(
				            'label'      => __( 'Top Bar Background Color', 'goldy-mega' ), 
				            'settings'   => 'header1_top_bar_bg_color', 
				            'priority'   => 10,
				            'section'    => 'goldy_mega_header_layouts', 
				            'active_callback' => 'goldy_mega_header1_call_back',    
				        ) 
			        ) );
			    //top bar text color
					$wp_customize->add_setting( 'header1_top_bar_text_color', 
				        array(
				            'default'    => '#015b60', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
				        $wp_customize,'header1_top_bar_text_color', 
				        array(
				            'label'      => __( 'Top Bar Text Color', 'goldy-mega' ), 
				            'settings'   => 'header1_top_bar_text_color', 
				            'priority'   => 10,
				            'section'    => 'goldy_mega_header_layouts',   
				            'active_callback' => 'goldy_mega_header1_call_back',  
				        ) 
			        ) );

			//Manu Active color
				$wp_customize->add_setting( 'header_menu_active_color', 
			        array(
			            'default'    => '#13d9b5', 
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( $wp_customize, 'header_menu_active_color',array(
			            'label'      => __( 'Menu Active Color', 'goldy-mega' ), 
			            'settings'   => 'header_menu_active_color', 
			            'priority'   => 10, 
			            'section'    => 'goldy_mega_header_layouts',
			        ) 
		        ) );
		    //Desktop Submenu Background Color
		        $wp_customize->add_setting( 'header_desktop_submenu_bg_color', 
			        array(
			            'default'    => '#ffffff', 
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( $wp_customize, 'header_desktop_submenu_bg_color',array(
			            'label'      => __( 'Desktop Submenu Background Color', 'goldy-mega' ), 
			            'settings'   => 'header_desktop_submenu_bg_color', 
			            'priority'   => 10, 
			            'section'    => 'goldy_mega_header_layouts',
			        ) 
		        ) );
		    //Desktop Submenu text Color
		        $wp_customize->add_setting( 'header_desktop_submenu_text_color', 
			        array(
			            'default'    => '#015b60', 
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( $wp_customize, 'header_desktop_submenu_text_color',array(
			            'label'      => __( 'Desktop Submenu Text Color', 'goldy-mega' ), 
			            'settings'   => 'header_desktop_submenu_text_color', 
			            'priority'   => 10, 
			            'section'    => 'goldy_mega_header_layouts',
			        ) 
		        ) );

		    //Mobile Nav menu Background Color
		        $wp_customize->add_setting( 'header_mobile_navmenu_background_color', 
			        array(
			            'default'    => '#015b60', 
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( $wp_customize, 'header_mobile_navmenu_background_color',array(
			            'label'      => __( 'Mobile NavMenu Background Color', 'goldy-mega' ), 
			            'settings'   => 'header_mobile_navmenu_background_color', 
			            'priority'   => 10, 
			            'section'    => 'goldy_mega_header_layouts',
			        ) 
		        ) );
		    //Mobile Submenu Background Color
		        $wp_customize->add_setting( 'header_mobile_submenu_background_color', 
			        array(
			            'default'    => '#13d9b5', 
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( $wp_customize, 'header_mobile_submenu_background_color',array(
			            'label'      => __( 'Mobile Submenu Background Color', 'goldy-mega' ), 
			            'settings'   => 'header_mobile_submenu_background_color', 
			            'priority'   => 10, 
			            'section'    => 'goldy_mega_header_layouts',
			        ) 
		        ) );
		    //Mobile Nav Menu Color
		        $wp_customize->add_setting( 'header_mobile_navmenu_color', 
			        array(
			            'default'    => '#ffffff', 
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( $wp_customize, 'header_mobile_navmenu_color',array(
			            'label'      => __( 'Mobile Nav Menu Color', 'goldy-mega' ), 
			            'settings'   => 'header_mobile_navmenu_color', 
			            'priority'   => 10, 
			            'section'    => 'goldy_mega_header_layouts',
			        ) 
		        ) );
		    //Mobile Nav Menu Acive Color
		        $wp_customize->add_setting( 'header_mobile_navmenu_active_color', 
			        array(
			            'default'    => '#13d9b5', 
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( $wp_customize, 'header_mobile_navmenu_active_color',array(
			            'label'      => __( 'Mobile Nav Menu Active Color', 'goldy-mega' ), 
			            'settings'   => 'header_mobile_navmenu_active_color', 
			            'priority'   => 10, 
			            'section'    => 'goldy_mega_header_layouts',
			        ) 
		        ) );

		    //Display Search Icon
			    $wp_customize->add_setting( 'display_search_icon', array(		                
	                'default'   => true,
					'priority'  => 10,
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'goldy_mega_sanitize_checkbox',
			    ));
			    $wp_customize->add_control(  new WP_Customize_Control( $wp_customize,'display_search_icon', 
			    	array(
		                'label' => 'Display Search Icon',
		                'type'  => 'checkbox', // this indicates the type of control
		                'section' => 'goldy_mega_header_layouts',
		                'settings' => 'display_search_icon',
			        )
			    )); 
			//Mobile Display Search Icon
			    $wp_customize->add_setting( 'display_mobile_search_icon', array(		                
	                'default'   => true,
					'priority'  => 10,
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'goldy_mega_sanitize_checkbox',
			    ));
			    $wp_customize->add_control(  new WP_Customize_Control( $wp_customize,'display_mobile_search_icon', 
			    	array(
		                'label' => 'Mobile In Display Search Icon',
		                'type'  => 'checkbox', // this indicates the type of control
		                'section' => 'goldy_mega_header_layouts',
		                'settings' => 'display_mobile_search_icon',
			        )
			    )); 
			//Display Cart Icon
			    $wp_customize->add_setting( 'display_cart_icon', array(		                
	                'default'   => true,
					'priority'  => 10,
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'goldy_mega_sanitize_checkbox',
			    ));
			    $wp_customize->add_control(  new WP_Customize_Control( $wp_customize,'display_cart_icon', 
			    	array(
		                'label' => 'Display Cart Icon',
		                'type'  => 'checkbox', // this indicates the type of control
		                'section' => 'goldy_mega_header_layouts',
		                'settings' => 'display_cart_icon',
			        )
			    )); 
			//Mobile Display Search Icon
			    $wp_customize->add_setting( 'display_mobile_cart_icon', array(		                
	                'default'   => true,
					'priority'  => 10,
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'goldy_mega_sanitize_checkbox',
			    ));
			    $wp_customize->add_control(  new WP_Customize_Control( $wp_customize,'display_mobile_cart_icon', 
			    	array(
		                'label' => 'Mobile In Display Cart Icon',
		                'type'  => 'checkbox', // this indicates the type of control
		                'section' => 'goldy_mega_header_layouts',
		                'settings' => 'display_mobile_cart_icon',
			        )
			    )); 
		// Create Call Menu Buttons
			$wp_customize->add_section( 'call_menu_btn_section' , array(
				'title'             => 'Call Menu Button',
				'panel'             => 'goldy_mega_header_section',
			) );        
			//call menu button display in header option
		        $wp_customize->add_setting( 'goldy_mega_call_menu_btn', array(		                
	                'default'   => true,
					'priority'  => 10,
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'goldy_mega_sanitize_checkbox',
			    ));
			    $wp_customize->add_control(  new WP_Customize_Control( $wp_customize,'goldy_mega_call_menu_btn', 
			    	array(
		                'label' => 'Display header Menu Button',
		                'type'  => 'checkbox', // this indicates the type of control
		                'section' => 'call_menu_btn_section',
		                'settings' => 'goldy_mega_call_menu_btn',
			        )
			    )); 
			//call menu button title 
			    $wp_customize->add_setting( 'goldy_mega_call_menu_btn_title', array(		                
			                'default'   => "Get A Quote",
							'priority'  => 10,
							'capability' => 'edit_theme_options',
							'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control(  new WP_Customize_Control(
				    	$wp_customize,'goldy_mega_call_menu_btn_title', 
				    	array(
			                'label' => 'Title',
			                'type'  => 'text', // this indicates the type of control
			                'section' => 'call_menu_btn_section',
			                'settings' => 'goldy_mega_call_menu_btn_title',
			                'active_callback'  => 'goldy_mega_call_menu_btn_callback',
				        )
			    ));
			//call menu button in add link
		        $wp_customize->add_setting( 'goldy_mega_menu_btn_link', array(
		            'default'        => '#',
		            'capability'     => 'edit_theme_options',
		            'type'           => 'theme_mod',
		            'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control( $wp_customize,'goldy_mega_menu_btn_link',
			    	array(
			            'label'      => __('Text Link', 'goldy-mega'),
			            'section'    =>  'call_menu_btn_section',
			            'settings'   => 'goldy_mega_menu_btn_link',
			            'active_callback'  => 'goldy_mega_call_menu_btn_callback',
			        )
		        ));
			//call menu button in add background color
			    $wp_customize->add_setting( 'goldy_mega_callmenu_btn_bg_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control(  $wp_customize, 'goldy_mega_callmenu_btn_bg_color',array(
			            'label'      => __( 'Background Color', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_callmenu_btn_bg_color', 
			            'priority'   => 10, 
			            'section'    => 'call_menu_btn_section',
			            'active_callback'  => 'goldy_mega_call_menu_btn_callback',
			        ) 
		        ) );
	        //call menu button in add backround hovor color
		        $wp_customize->add_setting( 'goldy_mega_callmenu_btn_bghover_color', 
			        array(
			            'default'    => '#015b60', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control($wp_customize,'goldy_mega_callmenu_btn_bghover_color', 
			        array(
			            'label'      => __( 'Background Hover Color', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_callmenu_btn_bghover_color', 
			            'priority'   => 10, 
			            'section'    => 'call_menu_btn_section',
			            'active_callback'  => 'goldy_mega_call_menu_btn_callback', 
			        ) 
		        ) );
	        //call menu button in add text color
		        $wp_customize->add_setting( 'goldy_mega_callmenu_btn_color', 
			        array(
			            'default'    => '#015b60', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control(  $wp_customize, 'goldy_mega_callmenu_btn_color', 
			        array(
			            'label'      => __( 'Text Color', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_callmenu_btn_color', 
			            'priority'   => 10, 
			            'section'    => 'call_menu_btn_section', 
			            'active_callback'  => 'goldy_mega_call_menu_btn_callback',
			        ) 
		        ) );
	        //call menu button in add Text hovor color
		        $wp_customize->add_setting( 'goldy_mega_call_btn_texthover_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control($wp_customize, 'goldy_mega_call_btn_texthover_color', 
			        array(
			            'label'      => __( 'Text Hover Color', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_call_btn_texthover_color', 
			            'priority'   => 10, 
			            'section'    => 'call_menu_btn_section', 
			            'active_callback'  => 'goldy_mega_call_menu_btn_callback',
			        ) 
		        ) );
	        //call menu button in add Border color
		        $wp_customize->add_setting( 'goldy_mega_call_btn_border_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( $wp_customize, 'goldy_mega_call_btn_border_color', 
			        array(
			            'label'      => __( 'Border Color', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_call_btn_border_color', 
			            'priority'   => 10, 
			            'section'    => 'call_menu_btn_section', 
			            'active_callback'  => 'goldy_mega_call_menu_btn_callback',
			        ) 
		        ) );
	    // Create Header Width
			$wp_customize->add_section( 'goldy_mega_header_width' , array(
				'title'             => 'Header Width',
				'panel'             => 'goldy_mega_header_section',
			) );
		    //Contact Info Section in contact number
			    $wp_customize->add_setting( 'goldy_mega_header_width_layout', 
			        array(
			            'default'    => 'content_width',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'goldy_mega_header_width_layout',array(
			        	'label'      => __( 'Header Width', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_header_width_layout', 
			            'priority'   => 0,
			            'section'    => 'goldy_mega_header_width',
			            'type'    => 'select',
			            'choices' => array(
			            				'full_width' => 'Full Width',
			            				'content_width' => 'Content Width',
			            			),
			        ) 
		        ) );	   
		    //Contact Info Section in contact width
			    $wp_customize->add_setting( 'goldy_mega_header_contact_width', 
			        array(
			            'default'    => '1100',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'goldy_mega_header_contact_width',array(
			        	'label'      => __( 'Header Contact Width', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_header_contact_width', 
			            'priority'   => 0,
			            'section'    => 'goldy_mega_header_width',
			            'type'    => 'number',
			            'active_callback'  => 'goldy_mega_header_content_width_call_back',
			        ) 
		        ) );
    
    //Global Section		
    	$wp_customize->add_panel( 'goldy_mega_global_panel', array(
			'title'     => __('Global', 'goldy-mega'),
			'priority'  => 3,
		) );  
		// Create global Fonts & Typography option
			$wp_customize->add_section( 'global_body_section' , array(
				'title'  => 'Body Fonts & Typography',
				'panel'  => 'goldy_mega_global_panel',
			) );			
			//global option in body font family
				global $goldy_mega_fonttotal;
		        $wp_customize->add_setting('goldy_mega_body_fontfamily', array(
			        'default'        => 5,
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'goldy_mega_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'goldy_mega_body_fontfamily',
			    	array(
				        'settings' => 'goldy_mega_body_fontfamily',
				        'label'   => 'Body Font Family',
				        'section' => 'global_body_section',
				        'type'    => 'select',
				        'choices' => $goldy_mega_fonttotal,
				    )
				)); 

			//global otion in body font size 
				$wp_customize->add_setting('goldy_mega_body_font_size', array(
			        'default'        => 15,
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'goldy_mega_body_font_size',
			    	array(
				        'settings' => 'goldy_mega_body_font_size',
				        'label'   => 'Body Font Size',
				        'section' => 'global_body_section',
				        'type'  => "number",
				        'description' => 'in px',
		            	'input_attrs' => array(
									    'min' => 1,
									    'max' => 50,
									),
			        )
			    )); 
			//global option in body font weight
			    $wp_customize->add_setting('goldy_mega_body_font_weight', array(
			        'default'        => 400,
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'goldy_mega_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'goldy_mega_body_font_weight',
			    	array(
				        'settings' => 'goldy_mega_body_font_weight',
				        'label'   => 'Body Font Weight',
				        'section' => 'global_body_section',
				        'type'  => "select",
				        'choices' => $font_weight,
			        )
			    ));
			//global option in body text transform
			    $wp_customize->add_setting('goldy_mega_body_text_transform', array(
			        'default'        => 'inherit',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'goldy_mega_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'goldy_mega_body_text_transform',
			    	array(
				        'settings' => 'goldy_mega_body_text_transform',
				        'label'   => 'Body Text Transform',
				        'section' => 'global_body_section',
				        'type'  => "select",
				        'choices' =>  $text_transform,
			        )
			    ));

				//mobile in font size
				    $wp_customize->add_setting( 'goldy_mega_mobile_font_size', 
				        array(
				            'default'    => '14', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 
			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 'goldy_mega_mobile_font_size', 
				        array(
				            'label'      => __( 'Mobile Font Size', 'goldy-mega' ), 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'goldy_mega_mobile_font_size', 
				            'section'    => 'global_body_section',
				            'description' => 'in px',
				            'input_attrs' => array(
											    'min' => 1,
											    'max' => 100,
											),
				        ) 
			        ) );     
		// Create global Heading Fonts & Typography option
			$wp_customize->add_section( 'global_heading_section' , array(
				'title'             => 'Heading Fonts & Typography',
				'panel'             => 'goldy_mega_global_panel',
			) );
			//global option in body font family add select dropdown
				global $goldy_mega_fonttotal;
		        $wp_customize->add_setting('goldy_mega_Heading_fontfamily', array(
			        'default'        => 5,
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'goldy_mega_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'goldy_mega_Heading_fontfamily',
			    	array(
				        'settings' => 'goldy_mega_Heading_fontfamily',
				        'label'   => 'Heading Font Family',
				        'section' => 'global_heading_section',
				        'type'    => 'select',
				        'choices' => $goldy_mega_fonttotal,
			        )
			    )); 

			//heading1 Title
			    $wp_customize->add_setting('Heading1_section', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new goldy_mega_GeneratePress_Upsell_Section(
			    	$wp_customize,'Heading1_section',
			    	array(
				        'settings' => 'Heading1_section',
				        'label'   => 'Heading 1 (H1)',
				        'section' => 'global_heading_section',
				        'type'     => 'goldy_mega_ast_description',
			        )
			    ));

				//global option in heading1 font family
					global $goldy_mega_fonttotal;
			        $wp_customize->add_setting('goldy_mega_Heading1_fontfamily', array(
				        'default'        => 5,
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'goldy_mega_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'goldy_mega_Heading1_fontfamily',
				    	array(
					        'settings' => 'goldy_mega_Heading1_fontfamily',
					        'label'   => 'Font Family',
					        'section' => 'global_heading_section',
					        'type'    => 'select',
					        'choices' => $goldy_mega_fonttotal,
				        )
				    ));
				//global heading1 font size
				    $wp_customize->add_setting( 'goldy_mega_heading1_font_size', 
				        array(
				            'default'    => '35', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 

			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 
				        'goldy_mega_heading1_font_size', 
				        array(
				            'label'      => __( 'Font Size', 'goldy-mega' ), 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'goldy_mega_heading1_font_size', 
				            'section'    => 'global_heading_section',
				            'description' => 'in px',
				            'input_attrs' => array(
											    'min' => 1,
											    'max' => 100,
											),
				        ) 
			        ) );
			    //global in heading1 font weight
				    $wp_customize->add_setting('goldy_mega_heading1_font_weight', array(
				        'default'        => 'bold',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'goldy_mega_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'goldy_mega_heading1_font_weight',
				    	array(
					        'settings' => 'goldy_mega_heading1_font_weight',
					        'label'   => 'Font Weight',
					        'section' => 'global_heading_section',
					        'type'  => 'select',
					        'choices' => $font_weight,
				        )
				    ));
				//global in heading1 text transform
				    $wp_customize->add_setting('goldy_mega_heading1_text_transform', array(
				        'default'        => 'inherit',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'goldy_mega_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'goldy_mega_heading1_text_transform',
				    	array(
					        'settings' => 'goldy_mega_heading1_text_transform',
					        'label'   => 'Text Transform',
					        'section' => 'global_heading_section',
					        'type'  => 'select',
					        'choices' =>  $text_transform,
				        )
				    ));
				//mobile in heading1 font size
				    $wp_customize->add_setting( 'goldy_mega_mobile_heading1_font_size', 
				        array(
				            'default'    => '20', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 

			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 'goldy_mega_mobile_heading1_font_size', 
				        array(
				            'label'      => __( 'Mobile Font Size', 'goldy-mega' ), 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'goldy_mega_mobile_heading1_font_size', 
				            'section'    => 'global_heading_section',
				            'description' => 'in px',
				            'input_attrs' => array(
											    'min' => 1,
											    'max' => 100,
											),
				        ) 
			        ) );

		    //heading2 Title
			    $wp_customize->add_setting('Heading2_section', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'goldy_mega_sanitize_select',
			    ));
			    $wp_customize->add_control( new goldy_mega_GeneratePress_Upsell_Section(
			    	$wp_customize,'Heading2_section',
			    	array(
				        'settings' => 'Heading2_section',
				        'label'   => 'Heading 2 (H2)',
				        'section' => 'global_heading_section',
				        'type'     => 'goldy_mega_ast_description',
			        )
			    ));
				//global option in heading2 font family
					global $goldy_mega_fonttotal;
			        $wp_customize->add_setting('goldy_mega_Heading2_fontfamily', array(
				        'default'        => 5,
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'goldy_mega_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'goldy_mega_Heading2_fontfamily',
				    	array(
					        'settings' => 'goldy_mega_Heading2_fontfamily',
					        'label'   => 'Font Family',
					        'section' => 'global_heading_section',
					        'type'    => 'select',
					        'choices' => $goldy_mega_fonttotal,
				        )
				    )); 
				//global heading2 font size
				    $wp_customize->add_setting( 'goldy_mega_heading2_font_size', 
				        array(
				            'default'    => '28', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 

			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 'goldy_mega_heading2_font_size', 
				        array(
				            'label'      => __( 'Font Size', 'goldy-mega' ), 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'goldy_mega_heading2_font_size', 
				            'section'    => 'global_heading_section',
				            'description' => 'in px',
				            'input_attrs' => array(
											    'min' => 1,
											    'max' => 100,
											),
				        ) 
			        ) );
			    //global in heading2 font weight
				    $wp_customize->add_setting('goldy_mega_heading2_font_weight', array(
				        'default'        => 'bold',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'goldy_mega_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'goldy_mega_heading2_font_weight',
				    	array(
					        'settings' => 'goldy_mega_heading2_font_weight',
					        'label'   => 'Font Weight',
					        'section' => 'global_heading_section',
					        'type'  => 'select',
					        'choices' => $font_weight,
				        )
				    ));
				//global in heading2 text transform
				    $wp_customize->add_setting('goldy_mega_heading2_text_transform', array(
				        'default'        => 'inherit',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'goldy_mega_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'goldy_mega_heading2_text_transform',
				    	array(
					        'settings' => 'goldy_mega_heading2_text_transform',
					        'label'   => 'Text Transform',
					        'section' => 'global_heading_section',
					        'type'  => 'select',
					        'choices' =>  $text_transform,
				        )
				    ));
				//mobile in heading2 font size
				    $wp_customize->add_setting( 'goldy_mega_mobile_heading2_font_size', 
				        array(
				            'default'    => '18', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 

			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 'goldy_mega_mobile_heading2_font_size', 
				        array(
				            'label'      => __( 'Mobile Font Size', 'goldy-mega' ), 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'goldy_mega_mobile_heading2_font_size', 
				            'section'    => 'global_heading_section',
				            'description' => 'in px',
				            'input_attrs' => array(
											    'min' => 1,
											    'max' => 100,
											),
				        ) 
			        ) );

		    //heading3 Title
			    $wp_customize->add_setting('Heading3_section', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new goldy_mega_GeneratePress_Upsell_Section(
			    	$wp_customize,'Heading3_section',
			    	array(
				        'settings' => 'Heading3_section',
				        'label'   => 'Heading 3 (H3)',
				        'section' => 'global_heading_section',
				        'type'     => 'goldy_mega_ast_description',
			        )
			    ));
				//global option in heading3 font family
					global $goldy_mega_fonttotal;
			        $wp_customize->add_setting('goldy_mega_Heading3_fontfamily', array(
				        'default'        => 5,
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'goldy_mega_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'goldy_mega_Heading3_fontfamily',
				    	array(
					        'settings' => 'goldy_mega_Heading3_fontfamily',
					        'label'   => 'Font Family',
					        'section' => 'global_heading_section',
					        'type'    => 'select',
					        'choices' => $goldy_mega_fonttotal,
				        )
				    ));
			    //global heading3 font size
				    $wp_customize->add_setting( 'goldy_mega_heading3_font_size', 
				        array(
				            'default'    => '25', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 

			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 'goldy_mega_heading3_font_size', 
				        array(
				            'label'      => __( 'Font Size', 'goldy-mega' ), 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'goldy_mega_heading3_font_size', 
				            'section'    => 'global_heading_section',
				            'description' => 'in px',
				            'input_attrs' => array(
											    'min' => 1,
											    'max' => 100,
											),
				        ) 
			        ) );
			    //global in heading3 font weight
				    $wp_customize->add_setting('goldy_mega_heading3_font_weight', array(
				        'default'        => 400,
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'goldy_mega_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'goldy_mega_heading3_font_weight',
				    	array(
					        'settings' => 'goldy_mega_heading3_font_weight',
					        'label'   => 'Font Weight',
					        'section' => 'global_heading_section',
					        'type'  => 'select',
					        'choices' => $font_weight,
				        )
				    ));
				//global in heading2 text transform
				    $wp_customize->add_setting('goldy_mega_heading3_text_transform', array(
				        'default'        => 'inherit',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'goldy_mega_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'goldy_mega_heading3_text_transform',
				    	array(
					        'settings' => 'goldy_mega_heading3_text_transform',
					        'label'   => 'Text Transform',
					        'section' => 'global_heading_section',
					        'type'  => 'select',
					        'choices' =>  $text_transform,
				        )
				    ));
				//mobile in heading2 font size
				    $wp_customize->add_setting( 'goldy_mega_mobile_heading3_font_size', 
				        array(
				            'default'    => '14', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 

			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 'goldy_mega_mobile_heading3_font_size', 
				        array(
				            'label'      => __( 'Mobile Font Size', 'goldy-mega' ), 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'goldy_mega_mobile_heading3_font_size', 
				            'section'    => 'global_heading_section',
				            'description' => 'in px',
				            'input_attrs' => array(
											    'min' => 1,
											    'max' => 100,
											),
				        ) 
			        ) );
	    // Create a Container Option
			$wp_customize->add_section( 'global_container_section' , array(
				'title'             => 'Container',
				'panel'             => 'goldy_mega_global_panel',
			) );	
			//Container Blog Title
				$wp_customize->add_setting( 'goldy_mega_blog_title', 
			        array(
			            'default'    => 'Blogs', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize, 'goldy_mega_blog_title', 
			        array(
			            'label'      => __( 'Blog Title', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_blog_title', 
			            'priority'   => 0, 
			            'type'       => 'text',
			            'section'    => 'global_container_section',
			        ) 
		        ) );
			//Container Section in width layout
			    $wp_customize->add_setting( 'goldy_mega_container_width_layout', 
			        array(
			            'default'    => 'content_width',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'goldy_mega_container_width_layout',array(
			        	'label'      => __( 'Page Layouts', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_container_width_layout', 
			            'priority'   => 0,
			            'section'    => 'global_container_section',
			            'type'    => 'select',
			            'choices' => array(
			            				'full_width' => 'Full Width',
			            				'content_width' => 'Content Boxed',
			            				'boxed_layout' => 'Boxed Layout',
			            			),
			        ) 
		        ) );	   
		    //Contact Info Section in contact width
			    $wp_customize->add_setting( 'goldy_mega_container_contact_width', 
			        array(
			            'default'    => '1100',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'goldy_mega_container_contact_width',array(
			        	'label'      => __( 'Container Contact Width', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_container_contact_width', 
			            'priority'   => 0,
			            'section'    => 'global_container_section',
			            'type'    => 'number',
			            'active_callback'  => 'goldy_mega_container_content_width_call_back',
			        ) 
		        ) );	           
		    //Container Option in Backgound Color
				$wp_customize->add_setting( 'goldy_mega_container_bg_color', 
			        array(
			            'default'    => 'rgb(255,255,255,0.34)', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize, 'goldy_mega_container_bg_color', 
			        array(
			            'label'      => __( 'Container Background Color', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_container_bg_color', 
			            'priority'   => 10, 
			            'section'    => 'global_container_section',
			        ) 
		        ) );
		    //Container Option in Backgound Color
				$wp_customize->add_setting( 'goldy_mega_container_text_color', 
			        array(
			            'default'    => '#3c3c3c', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize, 'goldy_mega_container_text_color', 
			        array(
			            'label'      => __( 'Container Text Color', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_container_text_color', 
			            'priority'   => 10, 
			            'section'    => 'global_container_section',
			        ) 
		        ) );	
		    //Container Option in Boxed Backgound Color
				$wp_customize->add_setting( 'goldy_mega_boxed_container_bg_color', 
			        array(
			            'default'    => '#eeeeee', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize, 'goldy_mega_boxed_container_bg_color', 
			        array(
			            'label'      => __( 'Content Boxed Background Color', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_boxed_container_bg_color', 
			            'priority'   => 10, 
			            'section'    => 'global_container_section',
			            'active_callback'  => 'goldy_mega_content_box_call_back',
			        ) 
		        ) );	
		    //Boxed Layout Option in Backgound Color
				$wp_customize->add_setting( 'goldy_mega_boxed_layout_bg_color', 
			        array(
			            'default'    => '#eeeeee', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize, 'goldy_mega_boxed_layout_bg_color', 
			        array(
			            'label'      => __( 'Boxed Layout Background Color', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_boxed_layout_bg_color', 
			            'priority'   => 10, 
			            'section'    => 'global_container_section',
			            'active_callback'  => 'goldy_mega_box_layout_call_back',
			        ) 
		        ) );	
		    //Container Option in blog layout
		        $wp_customize->add_setting('goldy_mega_container_blog_layout', array(
			        'default'        => 'grid_view',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'goldy_mega_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'goldy_mega_container_blog_layout',
			    	array(
				        'settings' => 'goldy_mega_container_blog_layout',
				        'label'   => 'Blogs Layouts',
				        'section' => 'global_container_section',
				        'type'    => 'select',
				        'choices' => array(
				        			'list_view' => 'List View',
				        			'grid_view' => 'Grid View',
				        ),
			        )
			    ));	
			//Grid View Title
			    $wp_customize->add_setting('grid_view_section', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new goldy_mega_GeneratePress_Upsell_Section(
			    	$wp_customize,'grid_view_section',
			    	array(
				        'settings' => 'grid_view_section',
				        'label'   => 'Grid View',
				        'section' => 'global_container_section',
				        'type'     => 'goldy_mega_ast_description',
				        'active_callback'  => 'goldy_mega_grid_view_callback',
			        )
			    ));
			//Container Option in grid view columns
			        $wp_customize->add_setting('goldy_mega_container_grid_view_col', array(
				        'default'        => '3',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'goldy_mega_container_grid_view_col',
				    	array(
					        'settings' => 'goldy_mega_container_grid_view_col',
					        'label'   => 'Columns',
					        'section' => 'global_container_section',
					        'type'    => 'select',
					        'choices' => array(
					        			'1' => '1',
					        			'2' => '2',
					        			'3' => '3',
					        ),
					        'active_callback'  => 'goldy_mega_grid_view_callback',
				        )
				    ));
				//Container Option in grid view columns gap
			        $wp_customize->add_setting('goldy_mega_container_grid_view_col_gap', array(
				        'default'        => '20',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'goldy_mega_container_grid_view_col_gap',
				    	array(
					        'settings' => 'goldy_mega_container_grid_view_col_gap',
					        'label'   => 'Columns Gap',
					        'section' => 'global_container_section',
					        'type'    => 'number',
					        'description' => 'in px',
					        'active_callback'  => 'goldy_mega_grid_view_callback',
				        )
				    ));	  
		    //Display meta and entry-content title
				$wp_customize->add_setting('display_meta_content_section', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new goldy_mega_GeneratePress_Upsell_Section(
			    	$wp_customize,'display_meta_content_section',
			    	array(
				        'settings' => 'display_meta_content_section',
				        'label'   => 'Display Blog Page Container',
				        'section' => 'global_container_section',
				        'type'     => 'goldy_mega_ast_description',
			        )
			    )); 
			    //display containe
			        $wp_customize->add_setting( 'goldy_mega_container_containe', array(		                
						'default'   => true,
						'priority'  => 10,
						'sanitize_callback' => 'goldy_mega_sanitize_checkbox',
					));							    
					$wp_customize->add_control(  new WP_Customize_Control(
						$wp_customize,'goldy_mega_container_containe', 
						array(
							'label' => 'Display Blog Containe',
							'type'  => 'checkbox', // this indicates the type of control
							'section' => 'global_container_section',
							'settings' => 'goldy_mega_container_containe',
							)
					));
				//display container description
			        $wp_customize->add_setting( 'goldy_mega_container_description', array(		                
						'default'   => false,
						'priority'  => 10,
						'sanitize_callback' => 'goldy_mega_sanitize_checkbox',
					));							    
					$wp_customize->add_control(  new WP_Customize_Control(
						$wp_customize,'goldy_mega_container_description', 
						array(
							'label' => 'Display Container Description',
							'type'  => 'checkbox', // this indicates the type of control
							'section' => 'global_container_section',
							'settings' => 'goldy_mega_container_description',
							)
					));
				//display container Date
			        $wp_customize->add_setting( 'goldy_mega_container_date', array(		                
						'default'   => true,
						'priority'  => 10,
						'sanitize_callback' => 'goldy_mega_sanitize_checkbox',
					));							    
					$wp_customize->add_control(  new WP_Customize_Control(
						$wp_customize,'goldy_mega_container_date', 
						array(
							'label' => 'Display Container Date',
							'type'  => 'checkbox', // this indicates the type of control
							'section' => 'global_container_section',
							'settings' => 'goldy_mega_container_date',
							)
					));
				//display container Authore
			        $wp_customize->add_setting( 'goldy_mega_container_authore', array(		                
						'default'   => false,
						'priority'  => 10,
						'sanitize_callback' => 'goldy_mega_sanitize_checkbox',
					));							    
					$wp_customize->add_control(  new WP_Customize_Control(
						$wp_customize,'goldy_mega_container_authore', 
						array(
							'label' => 'Display Container Authore',
							'type'  => 'checkbox', // this indicates the type of control
							'section' => 'global_container_section',
							'settings' => 'goldy_mega_container_authore',
							)
					));
				//display container Category
			        $wp_customize->add_setting( 'goldy_mega_container_category', array(		                
						'default'   => true,
						'priority'  => 10,
						'sanitize_callback' => 'goldy_mega_sanitize_checkbox',
					));							    
					$wp_customize->add_control(  new WP_Customize_Control(
						$wp_customize,'goldy_mega_container_category', 
						array(
							'label' => 'Display Container Category',
							'type'  => 'checkbox', // this indicates the type of control
							'section' => 'global_container_section',
							'settings' => 'goldy_mega_container_category',
							)
					));
				//display container comments
			        $wp_customize->add_setting( 'goldy_mega_container_comments', array(		                
						'default'   => false,
						'priority'  => 10,
						'sanitize_callback' => 'goldy_mega_sanitize_checkbox',
					));							    
					$wp_customize->add_control(  new WP_Customize_Control(
						$wp_customize,'goldy_mega_container_comments', 
						array(
							'label' => 'Display Container Comments',
							'type'  => 'checkbox', // this indicates the type of control
							'section' => 'global_container_section',
							'settings' => 'goldy_mega_container_comments',
							)
					));	
				//display Read More buttons
					$wp_customize->add_setting( 'goldy_mega_container_readmore_btn', array(		                
						'default'   => true,
						'priority'  => 10,
						'sanitize_callback' => 'goldy_mega_sanitize_checkbox',
					));							    
					$wp_customize->add_control(  new WP_Customize_Control(
						$wp_customize,'goldy_mega_container_readmore_btn', 
						array(
							'label' => 'Display Read More Button',
							'type'  => 'checkbox', // this indicates the type of control
							'section' => 'global_container_section',
							'settings' => 'goldy_mega_container_readmore_btn',
							)
					));	
				//display Read More buttons title
					$wp_customize->add_setting( 'goldy_mega_container_readmore_btn_title', array(		                
						'default'   => 'Read More',
						'priority'  => 10,
						'sanitize_callback' => 'sanitize_text_field',
					));							    
					$wp_customize->add_control(  new WP_Customize_Control(
						$wp_customize,'goldy_mega_container_readmore_btn_title', 
						array(
							'label' => 'Read More Button Title',
							'type'  => 'text', // this indicates the type of control
							'section' => 'global_container_section',
							'settings' => 'goldy_mega_container_readmore_btn_title',
							'active_callback' => 'goldy_mega_read_more_callback',
							)
					));	
        //Create global section in add Buttons
			// Create Button color and Backgound color
				$wp_customize->add_section( 'global_button_option' , array(
					'title'  => 'Buttons',
					'panel'  => 'goldy_mega_global_panel',
				) );
			//Button background color
		        $wp_customize->add_setting( 'goldy_mega_button_bg_color', 
			        array(
			            'default'    => '#015b60', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize, 'goldy_mega_button_bg_color', 
			        array(
			            'label'      => __( 'Button Background Color', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_button_bg_color', 
			            'priority'   => 10, 
			            'section'    => 'global_button_option',
			        ) 
		        ) );
		    //global option in Button Background Hover color
				$wp_customize->add_setting( 'goldy_mega_button_bg_hover_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize, 'goldy_mega_button_bg_hover_color', 
			        array(
			            'label'      => __( 'Background Hover Color', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_button_bg_hover_color', 
			            'section'    => 'global_button_option',
			        ) 
		        ) );
		    //global option in Button Text color
				$wp_customize->add_setting( 'goldy_mega_button_text_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize, 'goldy_mega_button_text_color', 
			        array(
			            'label'      => __( 'Button Text Color', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_button_text_color', 
			            'section'    => 'global_button_option',
			        ) 
		        ) ); 
		    //global option in Button Text hover color
				$wp_customize->add_setting( 'goldy_mega_button_texthover_color', 
			        array(
			            'default'    => '#015b60', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize, 'goldy_mega_button_texthover_color', 
			        array(
			            'label'      => __( 'Button Text Hover Color', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_button_texthover_color', 
			            'section'    => 'global_button_option',
			        ) 
		        ) ); 
		    //global option in Button Border color
				$wp_customize->add_setting( 'goldy_mega_button_border_color', 
			        array(
			            'default'    => '#015b60', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize, 'goldy_mega_button_border_color', 
			        array(
			            'label'      => __( 'Border Color', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_button_border_color', 
			            'section'    => 'global_button_option',
			        ) 
		        ) );
		    //global option in Button Border Hover color
				$wp_customize->add_setting( 'goldy_mega_button_border_hover_color', 
			        array(
			            'default'    => '#3c3c3c', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize, 'goldy_mega_button_border_hover_color', 
			        array(
			            'label'      => __( 'Border Hover Color', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_button_border_hover_color', 
			            'section'    => 'global_button_option',
			        ) 
		        ) );
		    //global option in button border width
		        $wp_customize->add_setting( 'goldy_mega_borderwidth', 
			        array(
			            'default'    => '2', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize, 'goldy_mega_borderwidth', 
			        array(
			            'label'      => __( 'Border Width', 'goldy-mega' ), 
			            'type'  => "number",
			            'settings'   => 'goldy_mega_borderwidth', 
			            'section'    => 'global_button_option',
			            'description' => 'in px',
			        ) 
		        ) ); 
		    //global option in button border radius
		        $wp_customize->add_setting( 'goldy_mega_button_border_radius', 
			        array(
			            'default'    => '2', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize, 'goldy_mega_button_border_radius', 
			        array(
			            'label'      => __( 'Border Radius', 'goldy-mega' ), 
			            'type'  	 => "number",
			            'settings'   => 'goldy_mega_button_border_radius', 
			            'section'    => 'global_button_option',
			            'description'=> 'in px',
			        ) 
		        ) );
		    //global option in button padding
		        $wp_customize->add_setting( 'goldy_mega_button_padding', 
			        array(
			            'default'    => '10px 15px', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 

		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize, 'goldy_mega_button_padding', 
			        array(
			            'label'      => __( 'Button Padding', 'goldy-mega' ), 
			            'type'  	 => "text",
			            'settings'   => 'goldy_mega_button_padding', 
			            'section'    => 'global_button_option',
			            'description'=> '15px 25px',
			        ) 
		        ) );  
		//Create a Scroll Button
			$wp_customize->add_section( 'scroll_button_section' , array(
				'title'             => 'Scroll Button',
				'panel'             => 'goldy_mega_global_panel',
			) ); 
			//Scroll Button display
				$wp_customize->add_setting( 'display_scroll_button', array(		                
					'default'   => true,
					'priority'  => 10,
					'sanitize_callback' => 'goldy_mega_sanitize_checkbox',
				));							    
				$wp_customize->add_control(  new WP_Customize_Control(
					$wp_customize,'display_scroll_button', 
					array(
						'label' => 'Display Scroll Button',
						'type'  => 'checkbox', // this indicates the type of control
						'section' => 'scroll_button_section',
						'settings' => 'display_scroll_button',
						)
				));
			//Scroll Button in add Background color
			    $wp_customize->add_setting( 'goldy_mega_scroll_button_bg_color', 
			        array(
			            'default'    => '#13d9b5', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'goldy_mega_scroll_button_bg_color', 
			        array(
			            'label'      => __( 'Background Color', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_scroll_button_bg_color', 
			            'priority'   => 10,
			            'section'    => 'scroll_button_section',
			            'active_callback' => 'goldy_mega_scroll_callback',
			        ) 
		        ) );  
		    //Scroll Button in add color
			    $wp_customize->add_setting( 'goldy_mega_scroll_button_color', 
			        array(
			            'default'    => '#015b60', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'goldy_mega_scroll_button_color', 
			        array(
			            'label'      => __( 'Scroll Icon Color', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_scroll_button_color', 
			            'priority'   => 10,
			            'section'    => 'scroll_button_section',
			            'active_callback' => 'goldy_mega_scroll_callback',
			        ) 
		        ) );

	//Sidebar Section
		$wp_customize->add_panel( 'goldy_mega_sidebar_panel', array(
			'title'     => __('Sidebar', 'goldy-mega'),
			'priority'  => 4,
		) ); 
		$post_types = get_post_types(array('public' => true), 'names', 'and');
		foreach ($post_types  as $post_type) {
				$wp_customize->add_section( 'sidebar_section_' .$post_type, array(
					'title'             => $post_type .' Sidebar',
					'panel'             => 'goldy_mega_sidebar_panel',
				) );
				//sidebar in add layout select dropdown
			        $wp_customize->add_setting('goldy_mega_post_sidebar_select_'.$post_type , array(
						'default'   => 'right_sidebar',
				        'type'       => 'theme_mod',
				        'capability'     => 'edit_theme_options',
				        'transport'   => 'refresh',
				        'sanitize_callback' => 'goldy_mega_sanitize_select',		  
				    ));
				    $layout_label= $post_type . ' Layout:';
				    $wp_customize->add_control( new goldy_mega_Custom_Radio_Image_Control(
				    	$wp_customize,'goldy_mega_post_sidebar_select_'.$post_type,
				    	array(
					        'settings' => 'goldy_mega_post_sidebar_select_'.$post_type,
					        'label'   => $layout_label,
					        'section' => 'sidebar_section_'.$post_type,
					        'type'    => 'select',
					        'choices' => goldy_mega_site_layout(),
				        )
				    ));

			    //sidebar in width text filed
					$wp_customize->add_setting( 'goldy_mega_post_sidebar_width_' . $post_type, 
				        array(
				            'default'    => '30', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'capability'     => 'edit_theme_options',
				            'transport'   => 'refresh',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    );
			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 
				        'goldy_mega_post_sidebar_width_' . $post_type, 
				        array(
				            'label'      =>$post_type . ' Sidebar Width:', 
				            'type'  => "number",
				            'settings'   => 'goldy_mega_post_sidebar_width_' . $post_type, 
				            'section'    => 'sidebar_section_'.$post_type,
				            'description' => 'in %',
				        ) 
			        ) );
		} 
		$wp_customize->add_section( 'goldy_mega_sidebar_design', array(
			'title'             => 'Design',
			'panel'             => 'goldy_mega_sidebar_panel',
		) );
		//Sidebar design Heading background Text color
			$wp_customize->add_setting( 'goldy_mega_sidebar_heading_background_color', 
		        array(
		            'default'    => '#015b60', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability' => 'edit_theme_options',
		            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
		        ) 
		    ); 
	        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
		        $wp_customize,'goldy_mega_sidebar_heading_background_color', 
		        array(
		            'label'      => __( 'Heading Background Color', 'goldy-mega' ), 
		            'settings'   => 'goldy_mega_sidebar_heading_background_color', 
		            'priority'   => 10,
		            'section'    => 'goldy_mega_sidebar_design',
		        ) 
	        ) );
	    //Sidebar design Heading Text color
			$wp_customize->add_setting( 'goldy_mega_sidebar_heading_text_color', 
		        array(
		            'default'    => '#ffffff', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability' => 'edit_theme_options',
		            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
		        ) 
		    ); 
	        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
		        $wp_customize,'goldy_mega_sidebar_heading_text_color', 
		        array(
		            'label'      => __( 'Heading Text Color', 'goldy-mega' ), 
		            'settings'   => 'goldy_mega_sidebar_heading_text_color', 
		            'priority'   => 10,
		            'section'    => 'goldy_mega_sidebar_design',
		        ) 
	        ) );  

	//Theme Option in globly
		$wp_customize->add_panel( 'theme_option_panel', array(
			'title'     => __('Theme Option', 'goldy-mega'),
			'priority'  => 5,
		) );
		//Breadcrumb Section			
			$wp_customize->add_section( 'global_breadcrumb_section' , array(
				'title'  => 'Breadcrumb Section',
				'panel'  => 'theme_option_panel',				

			) );
			//Breadcrumb Section in entire site select 
				$wp_customize->add_setting( 'goldy_mega_display_breadcrumb_section', array(		                
					'default'   => true,
					'priority'  => 10,
					'sanitize_callback' => 'goldy_mega_sanitize_checkbox',
				));							    
				$wp_customize->add_control(  new WP_Customize_Control(
					$wp_customize,'goldy_mega_display_breadcrumb_section', 
					array(
						'label' => 'Disable On Breadcrumb Entire Site',
						'type'  => 'checkbox',
						'section' => 'global_breadcrumb_section',
						'settings' => 'goldy_mega_display_breadcrumb_section',
						)
				));	
				if ( isset( $wp_customize->selective_refresh ) ) {
					$wp_customize->selective_refresh->add_partial(
						'goldy_mega_display_breadcrumb_section',
						array(
							'selector'        => '.breadcrumb_info',
							'render_callback' => 'goldy_mega_customize_partial_breadcrumb',
						)
					);
				}
			//Breadcrumb Section in Background color
				$wp_customize->add_setting( 'goldy_mega_breadcrumb_bg_color', 
			        array(
			            'default'    => '#c8c9cb', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'goldy_mega_breadcrumb_bg_color', 
			        array(
			            'label'      => __( 'Background Color', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_breadcrumb_bg_color', 
			            'priority'   => 10,
			            'section'    => 'global_breadcrumb_section',
			            'active_callback' => 'goldy_mega_breadcrumb_call_back',
			        ) 
		        ) ); 
		    //Breadcrumb Section in Text color
				$wp_customize->add_setting( 'goldy_mega_breadcrumb_text_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'goldy_mega_breadcrumb_text_color', 
			        array(
			            'label'      => __( 'Text Color', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_breadcrumb_text_color', 
			            'priority'   => 10,
			            'section'    => 'global_breadcrumb_section',
			            'active_callback' => 'goldy_mega_breadcrumb_call_back',
			        ) 
		        ) ); 
		    //Breadcrumb Section in Icon color
				$wp_customize->add_setting( 'goldy_mega_breadcrumb_link_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'goldy_mega_breadcrumb_link_color', 
			        array(
			            'label'      => __( 'Icon Color', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_breadcrumb_link_color', 
			            'priority'   => 10,
			            'section'    => 'global_breadcrumb_section',
			            'active_callback' => 'goldy_mega_breadcrumb_call_back',
			        ) 
		        ) ); 
		    //Breadcrumb Section in Icon Background color
		        $wp_customize->add_setting( 'goldy_mega_breadcrumb_icon_background_color', 
			        array(
			            'default'    => '#015b60', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'goldy_mega_breadcrumb_icon_background_color', 
			        array(
			            'label'      => __( 'Icon Button Background Color', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_breadcrumb_icon_background_color', 
			            'priority'   => 10,
			            'section'    => 'global_breadcrumb_section',
			            'active_callback' => 'goldy_mega_breadcrumb_call_back',
			        ) 
		        ) ); 
		    //Breadcrumb Section background image option
		        $wp_customize->add_setting('goldy_mega_breadcrumb_bg_image', array(
		        	'type'       => 'theme_mod',
			        'transport'     => 'refresh',
			        'height'        => 180,
			        'width'        => 160,
			        'capability' => 'edit_theme_options',
			        'sanitize_callback' => 'esc_url_raw'
			    ));
			    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'goldy_mega_breadcrumb_bg_image', array(
			        'label' => __('Backgroung Image', 'goldy-mega'),
			        'section' => 'global_breadcrumb_section',
			        'settings' => 'goldy_mega_breadcrumb_bg_image',
			        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
			        'active_callback' => 'goldy_mega_breadcrumb_call_back',
			    ))); 
			//Breadcrumb Section in image background position
			    $wp_customize->add_setting('goldy_mega_img_bg_position', array(
			        'default'        => 'center center',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'goldy_mega_img_bg_position',
			    	array(
				        'settings' => 'goldy_mega_img_bg_position',
				        'label'   => 'Background Position',
				        'section' => 'global_breadcrumb_section',
				        'type'  => 'select',
				        'choices'    => $image_position,
			        	'active_callback' => 'goldy_mega_breadcrumb_call_back',
			        )
			    )); 
			//Breadcrumb Section in image background attachment
			    $wp_customize->add_setting('goldy_mega_breadcrumb_bg_attachment', array(
			        'default'        => 'scroll',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'goldy_mega_breadcrumb_bg_attachment',
			    	array(
				        'settings' => 'goldy_mega_breadcrumb_bg_attachment',
				        'label'   => 'Background Attachment',
				        'section' => 'global_breadcrumb_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'scroll' => 'Scroll',
				        	'fixed' => 'Fixed',
			        	),
			        	'active_callback' => 'goldy_mega_breadcrumb_call_back',
			        )
			    ));
			//Breadcrumb Section in image background Size
			    $wp_customize->add_setting('goldy_mega_breadcrumb_bg_size', array(
			        'default'        => 'cover',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'goldy_mega_breadcrumb_bg_size',
			    	array(
				        'settings' => 'goldy_mega_breadcrumb_bg_size',
				        'label'   => 'Background Size',
				        'section' => 'global_breadcrumb_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'auto' => 'Auto',
				        	'cover' => 'Cover',
				            'contain' => 'Contain'
			        	),
			        	'active_callback' => 'goldy_mega_breadcrumb_call_back',
			        )
			    )); 

	    //Featured Slider
		    $wp_customize->add_section( 'inpersttion_slider_section' , array(
				'title'  => 'Featured Slider',
				'panel'  => 'theme_option_panel',
			) );
			//Featured Slider in tabing
				$wp_customize->add_setting( 'featuredimage_slider_tab', 
			        array(
			            'default'    => 'general', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new Custom_Radio_Control( 
			        $wp_customize,'featuredimage_slider_tab',array(
			            'settings'   => 'featuredimage_slider_tab', 
			            'priority'   => 10,
			            'section'    => 'inpersttion_slider_section',
			            'type'    => 'select',
			            'choices'    => array(
				        	'general' => 'General',
				        	'design' => 'Design',
			        	),
			        ) 
		        ) );
		    //Create slider in add filed
			    $wp_customize->add_setting( 'featuredimage_slider', 
				        array(
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'default' => goldy_mega_get_slider_default(),
				            'sanitize_callback' => 'customizer_repeater_sanitize',
				        ) 
				    ); 
				$wp_customize->add_control( new Customizer_Repeater( 
			        $wp_customize,'featuredimage_slider',array(
			            'label'                             => esc_html__( 'Slider Items Content', 'goldy-mega' ),
						'section'                           => 'inpersttion_slider_section',
						'add_field_label'                   => esc_html__( 'Add new slide item', 'goldy-mega' ),
						'item_name'                         => esc_html__( 'Slide Item', 'goldy-mega' ),
						'customizer_repeater_image_control' => true,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_text_control'  => true,
						'customizer_repeater_text2_control'=> true,
						'customizer_repeater_button_text_control' => true,
						'customizer_repeater_link_control'  => true,
						'customizer_repeater_checkbox_control' => true,
						'active_callback' => 'goldy_mega_slider_general_call_back',
			        ) 
		        ) );
		    //Features slider in pro version
				$wp_customize->add_setting('featuredimage_slider_pro', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new Customize_Upgrade_Control(
			    	$wp_customize,'featuredimage_slider_pro',
			    	array(
				        'settings' => 'featuredimage_slider_pro',
				        'section' => 'inpersttion_slider_section',
				        'active_callback' => 'goldy_mega_slider_general_call_back',
			        )
			    ));	
		    if ( isset( $wp_customize->selective_refresh ) ) {
				$wp_customize->selective_refresh->add_partial(
					'featuredimage_slider_tab',
					array(
						'selector'        => '.featured_slider_image',
						'render_callback' => 'custom_customize_featuredimage_slider',
					)
				);
			}
			//Featured Slider in add text color
			    $wp_customize->add_setting( 'featured_slider_text_color', 
			        array(
			        	'default'    => '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'featured_slider_text_color', 
			        array(
			            'label'      => 'Text Color' ,
			            'settings'   => 'featured_slider_text_color', 
			            'priority'   => 10,
			            'section'    => 'inpersttion_slider_section',
			            'active_callback' => 'goldy_mega_slider_design_call_back',
			        ) 
		        ) );
		   	//Featured Slider arrow in add Text color
			    $wp_customize->add_setting( 'featured_slider_arrow_text_color', 
			        array(
			        	'default'    => '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'featured_slider_arrow_text_color', 
			        array(
			            'label'      => 'Arrow Text Color', 
			            'settings'   => 'featured_slider_arrow_text_color', 
			            'priority'   => 10,
			            'section'    => 'inpersttion_slider_section',
			            'active_callback' => 'goldy_mega_slider_design_call_back',
			        ) 
		        ) );  	
		    //Featured Slider arrow in add background color
			    $wp_customize->add_setting( 'featured_slider_arrow_bg_color', 
			        array(
			        	'default'    => '#015b60',
			            'type'       => 'theme_mod',
			            'transport'  => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'featured_slider_arrow_bg_color', 
			        array(
			            'label'      => 'Arrow Background Color', 
			            'settings'   => 'featured_slider_arrow_bg_color', 
			            'priority'   => 10,
			            'section'    => 'inpersttion_slider_section',
			            'active_callback' => 'goldy_mega_slider_design_call_back',
			        ) 
		        ) );
		    //Featured Slider in arrow Text hover color
			    $wp_customize->add_setting( 'featured_slider_arrow_texthover_color', 
			        array(
			        	'default'    => '#015b60',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'featured_slider_arrow_texthover_color', 
			        array(
			            'label'      => 'Arrow Text Hover Color', 
			            'settings'   => 'featured_slider_arrow_texthover_color', 
			            'priority'   => 10,
			            'section'    => 'inpersttion_slider_section',
			            'active_callback' => 'goldy_mega_slider_design_call_back',
			        ) 
		        ) );
		    //Featured Slider in add background hover color
			    $wp_customize->add_setting( 'featured_slider_arrow_bghover_color', 
			        array(
			        	'default'    => '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'featured_slider_arrow_bghover_color', 
			        array(
			            'label'      => 'Arrow Background Hover Color', 
			            'settings'   => 'featured_slider_arrow_bghover_color', 
			            'priority'   => 10,
			            'section'    => 'inpersttion_slider_section',
			            'active_callback' => 'goldy_mega_slider_design_call_back',
			        ) 
		        ) );
		    //Featured Slider in Autoplay True
			    $wp_customize->add_setting('featured_slider_autoplay', array(
			        'default'        => 'true',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'goldy_mega_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'featured_slider_autoplay',
			    	array(
				        'settings' => 'featured_slider_autoplay',
				        'label'   => 'Autoplay',
				        'section' => 'inpersttion_slider_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'true' => 'True',
				        	'false' => 'False',
			        	),
			        	'active_callback' => 'goldy_mega_slider_design_call_back',
			        )
			    )); 
			//Featured Slider in autoplay speed
			    $wp_customize->add_setting('featured_slider_autoplay_speed', array(
			    	'default'        => '1000',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'featured_slider_autoplay_speed',
			    	array(
				        'settings' => 'featured_slider_autoplay_speed',
				        'label'   => 'AutoplaySpeed',
				        'section' => 'inpersttion_slider_section',
				        'type'  => 'text',
				        'active_callback' => 'goldy_mega_slider_design_call_back',
			        )
			    ));  
			//Featured Slider in autoplay TimeOut
			    $wp_customize->add_setting('featured_slider_autoplay_timeout', array(
			    	'default'        => '5000',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'featured_slider_autoplay_timeout',
			    	array(
				        'settings' => 'featured_slider_autoplay_timeout',
				        'label'   => 'AutoplayTimeout',
				        'section' => 'inpersttion_slider_section',
				        'type'  => 'text',
				        'active_callback' => 'goldy_mega_slider_design_call_back',
			        )
			    ));  


			    //ordering section    
				$wp_customize->add_setting('globalddd_ordering', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'globalddd_ordering',
			    	array(
				        'settings' => 'globalddd_ordering',
				        'section' => 'inpersttion_slider_section',
				        'type'    => 'hidden',
				    )
				));	
			//diseble section    
				$wp_customize->add_setting('custom_ordering_diseble', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'custom_ordering_diseble',
			    	array(
				        'settings' => 'custom_ordering_diseble',
				        'section' => 'inpersttion_slider_section',
				        'type'    => 'hidden',
				    )
				));	
		//Featured Section
			$wp_customize->add_section( 'featured_sections' , array(
				'title'  => 'Featured Section',
				'panel'  => 'theme_option_panel',
			) ); 
			// Featured Section tabing
				$wp_customize->add_setting( 'featured_section_tab', 
			        array(
			            'default'    => 'general', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new Custom_Radio_Control( 
			        $wp_customize,'featured_section_tab',array(
			            'settings'   => 'featured_section_tab', 
			            'priority'   => 10,
			            'section'    => 'featured_sections',
			            'type'    => 'select',
			            'choices'    => array(
				        	'general' => 'General',
				        	'design' => 'Design',
			        	),
			        ) 
		        ) );
		    if ( isset( $wp_customize->selective_refresh ) ) {
				$wp_customize->selective_refresh->add_partial(
					'featured_section_tab',
					array(
						'selector'        => '.featured-section_data',
						'render_callback' => 'custom_customize_featured_section',
					)
				);
			}
			//Featured Section title
			    $wp_customize->add_setting('featured_section_main_title', array(
			        'default'        => 'Featured Section',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'featured_section_main_title',
			    	array(
				        'settings' => 'featured_section_main_title',
				        'label'   => 'Featured Section Title',
				        'section' => 'featured_sections',
				        'type'  => 'text',
				        'active_callback' => 'goldy_mega_featured_section_general_call_back',
			        )
			    ));
			//Featured Section Description
			    $wp_customize->add_setting('featured_section_description', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'featured_section_description',
			    	array(
				        'settings' => 'featured_section_description',
				        'label'   => 'Featured Section Description',
				        'section' => 'featured_sections',
				        'type'  => 'text',
				        'active_callback' => 'goldy_mega_featured_section_general_call_back',
			        )
			    ));
			//Create Featured Section in add filed
				$wp_customize->add_setting( 'featured_section_content', 
					array(
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'default' => goldy_mega_get_info_section_default(),
				            'sanitize_callback' => 'customizer_repeater_sanitize',
				        ) 
				);
				$wp_customize->add_control( new Customizer_Repeater( 
				$wp_customize, 'featured_section_content', array(
					'label'                             => esc_html__( 'Info Items Content', 'goldy-mega' ),
					'section'                           => 'featured_sections',
					'add_field_label'                   => esc_html__( 'Add new info', 'goldy-mega' ),
					'item_name'                         => esc_html__( 'Info Item', 'goldy-mega' ),
					'customizer_repeater_title_control' => true,
					'customizer_repeater_text_control'  => true,
					'customizer_repeater_icon_control'  => true,
		            'customizer_repeater_checkbox_control' => true,
		            'active_callback' => 'goldy_mega_featured_section_general_call_back',
				    ) ) );
			//Features Section in pro version
				$wp_customize->add_setting('featuredimage_info_pro', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new Customize_Upgrade_Control(
			    	$wp_customize,'featuredimage_info_pro',
			    	array(
				        'settings' => 'featuredimage_info_pro',
				        'section' => 'featured_sections',
				        'active_callback' => 'goldy_mega_featured_section_general_call_back',
			        )
			    ));			   
			//Featured Section icon size 
				$wp_customize->add_setting( 'featured_section_icon_size', array(
					'default'    => '55',
				    'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'featured_section_icon_size',
			    	array(
						'type' => 'number',
						'settings'   => 'featured_section_icon_size',
						'section' => 'featured_sections', // // Add a default or your own section
						'label' => 'Icon Size',
						'description' =>'in px',
						'active_callback' => 'goldy_mega_featured_section_design_call_back',
					)
				) );
			// //Featured Section background color
				$wp_customize->add_setting('featured_section_background_section', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new Custom_GeneratePress_Upsell_Section(
			    	$wp_customize,'featured_section_background_section',
			    	array(
				        'settings' => 'featured_section_background_section',
				        'label'   => 'Background Color Or Image',
				        'section' => 'featured_sections',
				        'type'     => 'ast-description',
				        'active_callback' => 'goldy_mega_featured_section_design_call_back',
			        )
			    ));
		    //Featured Section backgroung Image
		    	$wp_customize->add_setting('featured_section_bg_image', array(
		    		'default'  => '',
		        	'type'       => 'theme_mod',
			        'transport'     => 'refresh',
			        'height'        => 180,
			        'width'        => 160,
			        'capability' => 'edit_theme_options',
			        'sanitize_callback' => 'esc_url_raw'
			    ));
			    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'featured_section_bg_image', array(
			        'label' => 'Backgroung Image',
			        'section' => 'featured_sections',
			        'settings' => 'featured_section_bg_image',
			        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
			        'active_callback' => 'goldy_mega_featured_section_design_call_back',
			    )));
			//Featured Section in Background Position
			    $wp_customize->add_setting('featured_section_bg_position', array(
			        'default'        => 'center center',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'featured_section_bg_position',
			    	array(
				        'settings' => 'featured_section_bg_position',
				        'label'   => 'Background Position',
				        'section' => 'featured_sections',
				        'type'  => 'select',
				        'active_callback' => 'goldy_mega_featured_section_design_call_back',
				        'choices'    => $image_position,
			        )
			    ));
			//Featured Section Section in Background Attachment
				$wp_customize->add_setting('featured_section_bg_attachment', array(
			        'default'        => 'scroll',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'featured_section_bg_attachment',
			    	array(
				        'settings' => 'featured_section_bg_attachment',
				        'label'   => 'Background Attachment',
				        'section' => 'featured_sections',
				        'type'  => 'select',
				        'choices'    => array(
				        	'scroll' => 'Scroll',
				        	'fixed' => 'Fixed',
			        	),
			        	'active_callback' => 'goldy_mega_featured_section_design_call_back',
			        )
			    ));
			//Featured Section Section in image background Size
			    $wp_customize->add_setting('featured_section_bg_size', array(
			        'default'        => 'cover',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'featured_section_bg_size',
			    	array(
				        'settings' => 'featured_section_bg_size',
				        'label'   => 'Background Size',
				        'section' => 'featured_sections',
				        'type'  => 'select',
				        'active_callback' => 'goldy_mega_featured_section_design_call_back',
				        'choices'    => array(
				        	'auto' => 'Auto',
				        	'cover' => 'Cover',
				            'contain' => 'Contain'
			        	),
			        )
			    ));   
			//Featured Section Background color
			    $wp_customize->add_setting( 'featured_section_main_bg_color', 
			        array(
			        	'default'    => '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'featured_section_main_bg_color', 
			        array(
			            'label'      => 'Background Color', 
			            'settings'   => 'featured_section_main_bg_color', 
			            'priority'   => 10,
			            'section'    => 'featured_sections',
			            'active_callback' => 'goldy_mega_featured_section_design_call_back',
			        ) 
		        ) );
		    //Featured Section text color
			    $wp_customize->add_setting( 'featured_section_main_text_color', 
			        array( 
			        	'default'    => '#333333',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'featured_section_main_text_color', 
			        array(
			            'label'      => 'Text Color', 
			            'settings'   => 'featured_section_main_text_color', 
			            'priority'   => 10,
			            'section'    => 'featured_sections',
			            'active_callback' => 'goldy_mega_featured_section_design_call_back',
			        ) 
		        ) );
			//Featured Section Background color
			    $wp_customize->add_setting( 'featured_section_bg_color', 
			        array(
			        	'default'    => '#eeeeee',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'featured_section_bg_color', 
			        array(
			            'label'      => 'Contain Background Color', 
			            'settings'   => 'featured_section_bg_color', 
			            'priority'   => 10,
			            'section'    => 'featured_sections',
			            'active_callback' => 'goldy_mega_featured_section_design_call_back',
			        ) 
		        ) );
		    //Featured Section Text color
			    $wp_customize->add_setting( 'featured_section_color', 
			        array(
			        	'default'    => '#333333',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'featured_section_color', 
			        array(
			            'label'      => 'Contain Text Color', 
			            'settings'   => 'featured_section_color', 
			            'priority'   => 10,
			            'section'    => 'featured_sections',
			            'active_callback' => 'goldy_mega_featured_section_design_call_back',
			        ) 
		        ) ); 
		    //Featured Section Background hover color
			    $wp_customize->add_setting( 'featured_section_bg_hover_color', 
			        array(
			        	'default'    => '#015b60',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'featured_section_bg_hover_color', 
			        array(
			            'label'      => 'Contain Background Hover Color', 
			            'settings'   => 'featured_section_bg_hover_color', 
			            'priority'   => 10,
			            'section'    => 'featured_sections',
			            'active_callback' => 'goldy_mega_featured_section_design_call_back',
			        ) 
		        ) ); 
		    //Featured Section Text hover color
			    $wp_customize->add_setting( 'featured_section_text_hover_color', 
			        array(
			        	'default'    => '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'featured_section_text_hover_color', 
			        array(
			            'label'      => 'Contain Text Hover Color', 
			            'settings'   => 'featured_section_text_hover_color', 
			            'priority'   => 10,
			            'section'    => 'featured_sections',
			            'active_callback' => 'goldy_mega_featured_section_design_call_back',
			        ) 
		        ) ); 
		    //Featured Section Icon color
			    $wp_customize->add_setting( 'featured_section_icon_color', 
			        array(
			        	'default'    => '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'featured_section_icon_color', 
			        array(
			            'label'      => 'Icon Color', 
			            'settings'   => 'featured_section_icon_color', 
			            'priority'   => 10,
			            'section'    => 'featured_sections',
			            'active_callback' => 'goldy_mega_featured_section_design_call_back',
			        ) 
		        ) ); 
		    //Featured Section Icon Hover color
			    $wp_customize->add_setting( 'featured_section_icon_hover_color', 
			        array( 
			        	'default'    => '#015b60',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'featured_section_icon_hover_color', 
			        array(
			            'label'      => 'Icon Hover Color', 
			            'settings'   => 'featured_section_icon_hover_color', 
			            'priority'   => 10,
			            'section'    => 'featured_sections',
			            'active_callback' => 'goldy_mega_featured_section_design_call_back',
			        ) 
		        ) ); 
		    //Featured Section Icon Backgroundcolor
			    $wp_customize->add_setting( 'featured_section_icon_bg_color', 
			        array(
			        	'default'    => '#015b60',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'featured_section_icon_bg_color', 
			        array(
			            'label'      => 'Icon Background Color', 
			            'settings'   => 'featured_section_icon_bg_color', 
			            'priority'   => 10,
			            'section'    => 'featured_sections',
			            'active_callback' => 'goldy_mega_featured_section_design_call_back',
			        ) 
		        ) ); 
		    //Featured Section Icon Background Hover color
			    $wp_customize->add_setting( 'featured_section_icon_bg_hover_color', 
			        array(
			        	'default'    => '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'featured_section_icon_bg_hover_color', 
			        array(
			            'label'      => 'Icon Background Hover Color', 
			            'settings'   => 'featured_section_icon_bg_hover_color', 
			            'priority'   => 10,
			            'section'    => 'featured_sections',
			            'active_callback' => 'goldy_mega_featured_section_design_call_back',
			        ) 
		        ) ); 
		    //featured section in icon border color
				$wp_customize->add_setting( 'featured_section_border_color', 
			        array(
			            'default'    => '#015b60', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'priority'   => 9,
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'featured_section_border_color', 
			        array(
			            'label'      => 'Border Color', 
			            'settings'   => 'featured_section_border_color',
			            'section'    => 'featured_sections',
			            'active_callback' => 'goldy_mega_featured_section_design_call_back',
			        ) 
		        ) );	    
		//About Section
			$wp_customize->add_section( 'about_section' , array(
				'title'  => 'About Section',
				'panel'  => 'theme_option_panel',
			) );
			//About Section title
			    $wp_customize->add_setting('about_main_title', array(
			        'default'        => 'About',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'about_main_title',
			    	array(
				        'settings' => 'about_main_title',
				        'label'   => 'About Title',
				        'section' => 'about_section',
				        'type'  => 'text',
			        )
			    ));
			 	if ( isset( $wp_customize->selective_refresh ) ) {
					$wp_customize->selective_refresh->add_partial(
						'about_main_title',
						array(
							'selector'        => '.about_section_info',
							'render_callback' => 'custom_customize_about_name',
						)
					);
				}
			//About Section Description
			    $wp_customize->add_setting('about_description', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'about_description',
			    	array(
				        'settings' => 'about_description',
				        'label'   => 'About Description',
				        'section' => 'about_section',
				        'type'  => 'text',
			        )
			    ));
			//About Section image 
				$wp_customize->add_setting('about_section_image', array(
		        	'type'       => 'theme_mod',
			        'transport'     => 'refresh',
			        'height'        => 180,
			        'width'        => 160,
			        'capability' => 'edit_theme_options',
			        'sanitize_callback' => 'esc_url_raw'
			    ));
			    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'about_section_image' , array(
			        'label' =>  'Image',
			        'section' => 'about_section',
			        'settings' => 'about_section_image',
			        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
			    )));
			//About Section layouts
				$wp_customize->add_setting('about_section_layouts', array(
			        'default'        => 'layout1',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'goldy_mega_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'about_section_layouts',
			    	array(
				        'settings' => 'about_section_layouts',
				        'label'   => 'About Layouts',
				        'section' => 'about_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'layout1' => 'Layout 1',
				        	'layout2' => 'Layout 2',
			        	),
			        )
			    ));
			//Layout1
			    //Layout1 title
				    $wp_customize->add_setting('about_layout1_title', array(
				        'default'        => 'Hi, I Am Samantha!',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'about_layout1_title',
				    	array(
					        'settings' => 'about_layout1_title',
					        'label'   => 'About Title',
					        'section' => 'about_section',
					        'type'  => 'text',
					        'active_callback' => 'goldy_mega_about_layout1_call_back',
				        )
				    ));
				//Layout1 subheading
				    $wp_customize->add_setting('about_layout1_subheading', array(
				        'default'        => 'Owner/Founder, Executive Coach',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'about_layout1_subheading',
				    	array(
					        'settings' => 'about_layout1_subheading',
					        'label'   => 'Sub Heading',
					        'section' => 'about_section',
					        'type'  => 'text',
					        'active_callback' => 'goldy_mega_about_layout1_call_back',
				        )
				    ));
				//Layout1 description
				    $wp_customize->add_setting('about_layout1_description', array(
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'about_layout1_description',
				    	array(
					        'settings' => 'about_layout1_description',
					        'label'   => 'About Description',
					        'section' => 'about_section',
					        'type'  => 'text',
					        'active_callback' => 'goldy_mega_about_layout1_call_back',
				        )
				    ));
				//Layout1 button
				    $wp_customize->add_setting('about_layout1_button', array(
				        'default'        => 'Read More',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'about_layout1_button',
				    	array(
					        'settings' => 'about_layout1_button',
					        'label'   => 'Button',
					        'section' => 'about_section',
					        'type'  => 'text',
					        'active_callback' => 'goldy_mega_about_layout1_call_back',
				        )
				    ));
				//Layout1 button Link
				    $wp_customize->add_setting('about_layout1_button_link', array(
				        'default'        => '#',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'about_layout1_button_link',
				    	array(
					        'settings' => 'about_layout1_button_link',
					        'label'   => 'Button Link',
					        'section' => 'about_section',
					        'type'  => 'text',
					        'active_callback' => 'goldy_mega_about_layout1_call_back',
				        )
				    ));
			//Layout2
				//Create Featured Section in add filed
				$wp_customize->add_setting( 'about_section_content', 
					array(
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'default' => goldy_mega_get_about_default(),
				            'sanitize_callback' => 'customizer_repeater_sanitize',
				        ) 
				);
				$wp_customize->add_control( new Customizer_Repeater( 
				$wp_customize, 'about_section_content', array(
					'label'                             => esc_html__( 'About Items Content', 'goldy-mega' ),
					'section'                           => 'about_section',
					'add_field_label'                   => esc_html__( 'Add new About', 'goldy-mega' ),
					'item_name'                         => esc_html__( 'About Item', 'goldy-mega' ),
					'customizer_repeater_title_control' => true,
					'customizer_repeater_link_control' => true,
					'customizer_repeater_text_control'  => true,
					'customizer_repeater_icon_control'  => true,
		            'customizer_repeater_checkbox_control' => true,
		            'active_callback' => 'goldy_mega_about_layout2_call_back',
				    ) ) );
				//Features slider in pro version
					$wp_customize->add_setting('about_info_pro', array(
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new Customize_Upgrade_Control(
				    	$wp_customize,'about_info_pro',
				    	array(
					        'settings' => 'about_info_pro',
					        'section' => 'about_section',
					        'active_callback' => 'goldy_mega_about_layout2_call_back',
				        )
				    ));
			//About Background Color
			    $wp_customize->add_setting( 'about_bg_color', 
			        array(
			        	'default'    => '#eee',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'about_bg_color', 
			        array(
			            'label'      => 'Background Color', 
			            'settings'   => 'about_bg_color', 
			            'priority'   => 10,
			            'section'    => 'about_section',
			        ) 
		        ) ); 
		    //About title text color
		        $wp_customize->add_setting( 'about_title_text_color', 
			        array(
			        	'default'    => '#333',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'about_title_text_color', 
			        array(
			            'label'      => 'Title Text Color', 
			            'settings'   => 'about_title_text_color', 
			            'priority'   => 10,
			            'section'    => 'about_section',
			        ) 
		        ) ); 
		    //About text color
		        $wp_customize->add_setting( 'about_text_color', 
			        array(
			        	'default'    => '#333',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'about_text_color', 
			        array(
			            'label'      => 'Text Color', 
			            'settings'   => 'about_text_color', 
			            'priority'   => 10,
			            'section'    => 'about_section',
			        ) 
		        ) ); 
		    //About Link color
		        $wp_customize->add_setting( 'about_link_color', 
			        array(
			        	'default'    => '#015b60',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'about_link_color', 
			        array(			        	
			            'label'      => 'Link Color', 
			            'settings'   => 'about_link_color', 
			            'priority'   => 10,
			            'section'    => 'about_section',
			        ) 
		        ) ); 
		    //About Link Hover color
		        $wp_customize->add_setting( 'about_link_hover_color', 
			        array(
			        	'default'    => '#333',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'about_link_hover_color', 
			        array(			        	
			            'label'      => 'Link Hover Color', 
			            'settings'   => 'about_link_hover_color', 
			            'priority'   => 10,
			            'section'    => 'about_section',
			        ) 
		        ) ); 
		//Our Portfolio
		    $wp_customize->add_section( 'our_portfolio_section' , array(
				'title'  => 'Our Portfolio',
				'panel'  => 'theme_option_panel',
			) ); 
			//Our Portfolio tabing
				$wp_customize->add_setting( 'our_portfolio_section_tab', 
			        array(
			            'default'    => 'general', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new Custom_Radio_Control( 
			        $wp_customize,'our_portfolio_section_tab',array(
			            'settings'   => 'our_portfolio_section_tab', 
			            'priority'   => 10,
			            'section'    => 'our_portfolio_section',
			            'type'    => 'select',
			            'choices'    => array(
				        	'general' => 'General',
				        	'design' => 'Design',
			        	),
			        ) 
		        ) );
		    //Our Portfolio in Title
				$wp_customize->add_setting( 'our_portfolio_main_title', array(
					'default'    => 'Our Portfolio',
				    'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_portfolio_main_title',
			    	array(
						'type' => 'text',
						'settings' => 'our_portfolio_main_title',
						'section' => 'our_portfolio_section', // // Add a default or your own section
						'label' => 'Our Portfolio Title',
						'active_callback' => 'goldy_mega_portfolio_general_callback',
					)
				) );
				if ( isset( $wp_customize->selective_refresh ) ) {
					$wp_customize->selective_refresh->add_partial(
						'our_portfolio_main_title',
						array(
							'selector'        => '.our_portfolio_info',
							'render_callback' => 'custom_customize_partial_name',
						)
					);
				}
			//Our Portfolio in Discription
				$wp_customize->add_setting( 'our_portfolio_main_discription', array(
				    'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_portfolio_main_discription',
			    	array(
						'type' => 'text',
						'settings' => 'our_portfolio_main_discription',
						'section' => 'our_portfolio_section', // // Add a default or your own section
						'label' => 'Our Portfolio Discription',
						'active_callback' => 'goldy_mega_portfolio_general_callback',
					)
				) );
			//Create Our Portfolio add new filed			
				$wp_customize->add_setting( 'our_portfolio_section_content', 
					array( 
						'default'        => goldy_mega_get_portfolio_default(),
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',
				        'sanitize_callback' => 'customizer_repeater_sanitize',
						
				) );
				$wp_customize->add_control( new Customizer_Repeater( 
				$wp_customize, 'our_portfolio_section_content', array(
					'label'                             => esc_html__( 'Portfolio Items Content', 'goldy-mega' ),
					'section'                           => 'our_portfolio_section',
					'add_field_label'                   => esc_html__( 'Add new Portfolio Items', 'goldy-mega' ),
					'item_name'                         => esc_html__( 'Portfolio Item', 'goldy-mega' ),
					'customizer_repeater_image_control' => true,
					'customizer_repeater_title_control' => true,
					'customizer_repeater_subtitle_control' => true,
					//'customizer_repeater_icon_control'  => true,
					'customizer_repeater_link_control'  => true,
		            'customizer_repeater_checkbox_control' => true,
		            'active_callback' => 'goldy_mega_portfolio_general_callback',
				    ) ) );
				//Our Portfolio in pro version
					$wp_customize->add_setting('our_portfolio__pro', array(
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new Customize_Upgrade_Control(
				    	$wp_customize,'our_portfolio__pro',
				    	array(
					        'settings' => 'our_portfolio__pro',
					        'section' => 'our_portfolio_section',
					        'active_callback' => 'goldy_mega_portfolio_general_callback',
				        )
				    ));
			//Our Portfolio in Background Title
				$wp_customize->add_setting('our_portfolio_bg_heading', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new Custom_GeneratePress_Upsell_Section(
			    	$wp_customize,'our_portfolio_bg_heading',
			    	array(
				        'settings' => 'our_portfolio_bg_heading',
				        'label'   => 'Background Color',
				        'section' => 'our_portfolio_section',
				        'type'     => 'ast-description',
				        'active_callback' => 'goldy_mega_portfolio_design_callback',
			        )
			    )); 
		    //Our Portfolio Section in Background Image
		    	$wp_customize->add_setting('our_portfolio_bg_image', array(
		    		'default'  => '',
		        	'type'       => 'theme_mod',
			        'transport'     => 'refresh',
			        'height'        => 180,
			        'width'        => 160,
			        'capability' => 'edit_theme_options',
			        'sanitize_callback' => 'esc_url_raw'
			    ));
			    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'our_portfolio_bg_image', array(
			        'label'  =>  'Background Image',
			        'section' => 'our_portfolio_section',
			        'settings' => 'our_portfolio_bg_image',
			        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
			        'active_callback' => 'goldy_mega_portfolio_design_callback',
			    )));
			//Our Portfolio  in image background position
			    $wp_customize->add_setting('our_portfolio_bg_position', array(
			        'default'        => 'center center',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'goldy_mega_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_portfolio_bg_position',
			    	array(
				        'settings' => 'our_portfolio_bg_position',
				        'label'   => 'Background Position',
				        'section' => 'our_portfolio_section',
				        'type'  => 'select',
				        'choices'    => $image_position,
			        	'active_callback' => 'goldy_mega_portfolio_design_callback',
			        )
			    )); 
			//Our Portfolio in image background attachment
			    $wp_customize->add_setting('our_portfolio_design_callback', array(
			        'default'        => 'scroll',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'goldy_mega_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_portfolio_design_callback',
			    	array(
				        'settings' => 'our_portfolio_design_callback',
				        'label'   => 'Background Attachment',
				        'section' => 'our_portfolio_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'scroll' => 'Scroll',
				        	'fixed' => 'Fixed',
			        	),
			        	'active_callback' => 'goldy_mega_portfolio_design_callback',
			        )
			    ));
			//Our Portfolio  in image background Size
			    $wp_customize->add_setting('our_portfolio_bg_size', array(
			        'default'        => 'cover',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'goldy_mega_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_portfolio_bg_size',
			    	array(
				        'settings' => 'our_portfolio_bg_size',
				        'label'   => 'Background Size',
				        'section' => 'our_portfolio_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'auto' => 'Auto',
				        	'cover' => 'Cover',
				            'contain' => 'Contain'
			        	),
			        	'active_callback' => 'goldy_mega_portfolio_design_callback',
			        )
			    ));  
			//Our Portfolio in background color
			   	$wp_customize->add_setting( 'our_portfolio_bg_color', 
			        array(
			        	'default'    => '#eeeeee',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_portfolio_bg_color', 
			        array(
			            'label'      => 'Background Color', 
			            'settings'   => 'our_portfolio_bg_color', 
			            'priority'   => 10,
			            'section'    => 'our_portfolio_section',
			            'active_callback' => 'goldy_mega_portfolio_design_callback',
			        ) 
		        ) ); 
		    //Our Portfolio in title color
			   	$wp_customize->add_setting( 'our_portfolio_title_color', 
			        array(
			        	'default'    => '#333333', 
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_portfolio_title_color', 
			        array(
			            'label'      => 'Title Color', 
			            'settings'   => 'our_portfolio_title_color', 
			            'priority'   => 10,
			            'section'    => 'our_portfolio_section',
			            'active_callback' => 'goldy_mega_portfolio_design_callback',
			        ) 
		        ) ); 
		    //Our Portfolio in text color
			   	$wp_customize->add_setting( 'our_portfolio_text_color', 
			        array(
			        	'default'    => '#333333',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_portfolio_text_color', 
			        array(
			            'label'      => 'Text Color', 
			            'settings'   => 'our_portfolio_text_color', 
			            'priority'   => 10,
			            'section'    => 'our_portfolio_section',
			            'active_callback' => 'goldy_mega_portfolio_design_callback',
			        ) 
		        ) );    
		    //Our Portfolio in Container text color
			   	$wp_customize->add_setting( 'our_portfolio_container_text_color', 
			        array(
			        	'default'    => '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_portfolio_container_text_color', 
			        array(
			            'label'      => 'Container Text Color', 
			            'settings'   => 'our_portfolio_container_text_color', 
			            'priority'   => 10,
			            'section'    => 'our_portfolio_section',
			            'active_callback' => 'goldy_mega_portfolio_design_callback',
			        ) 
		        ) );  
		    //Our Portfolio in Container background color
			   	$wp_customize->add_setting( 'our_portfolio_container_bg_color', 
			        array(
			        	'default'    => '#015b60',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_portfolio_container_bg_color', 
			        array(
			            'label'      => 'Container Background Color', 
			            'settings'   => 'our_portfolio_container_bg_color', 
			            'priority'   => 10,
			            'section'    => 'our_portfolio_section',
			            'active_callback' => 'goldy_mega_portfolio_design_callback',
			        ) 
		        ) );   
		    //Our Portfolio in icon background color
			   	$wp_customize->add_setting( 'our_portfolio_icon_bg_color', 
			        array(
			        	'default'    => '#015b60',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_portfolio_icon_bg_color', 
			        array(
			            'label'      => 'Icon Background Color', 
			            'settings'   => 'our_portfolio_icon_bg_color', 
			            'priority'   => 10,
			            'section'    => 'our_portfolio_section',
			            'active_callback' => 'goldy_mega_portfolio_design_callback',
			        ) 
		        ) );   
		    //Our Portfolio in icon color
			   	$wp_customize->add_setting( 'our_portfolio_icon_color', 
			        array(
			        	'default'    => '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_portfolio_icon_color', 
			        array(
			            'label'      => 'Icon Color', 
			            'settings'   => 'our_portfolio_icon_color', 
			            'priority'   => 10,
			            'section'    => 'our_portfolio_section',
			            'active_callback' => 'goldy_mega_portfolio_design_callback',
			        ) 
		        ) );   
		//OUR SERVICES
			$wp_customize->add_section( 'our_services_section' , array(
				'title'  => 'Our Services',
				'panel'  => 'theme_option_panel',
			) );
			//OUR SERVICES Tabing
				$wp_customize->add_setting( 'our_services_tab', 
			        array(
			            'default'    => 'general', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new Custom_Radio_Control( 
			        $wp_customize,'our_services_tab',array(
			            'settings'   => 'our_services_tab', 
			            'priority'   => 10,
			            'section'    => 'our_services_section',
			            'type'    => 'select',
			            'choices'    => array(
				        	'general' => 'General',
				        	'design' => 'Design',
			        	),
			        ) 
		        ) );
			//Our services in Title
				$wp_customize->add_setting( 'our_services_main_title', array(
					'default'    => 'Our Services',
				    'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_services_main_title',
			    	array(
						'type' => 'text',
						'settings' => 'our_services_main_title',
						'section' => 'our_services_section', // // Add a default or your own section
						'label' => 'Our Services Title',
						'active_callback' => 'goldy_mega_services_general_callback',  
					)
				) );
				if ( isset( $wp_customize->selective_refresh ) ) {
					$wp_customize->selective_refresh->add_partial(
						'our_services_main_title',
						array(
							'selector'        => '.our_services_section',
							'render_callback' => 'custom_customize_partial_services',
						)
					);
				}
			//Our services in Discription
				$wp_customize->add_setting( 'our_services_main_discription', array(
				    'type'      => 'theme_mod',
			        'transport' => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_services_main_discription',
			    	array(
						'type' => 'text',
						'settings' => 'our_services_main_discription',
						'section' => 'our_services_section', // // Add a default or your own section
						'label' => 'Our Services Discription',   
						'active_callback' => 'goldy_mega_services_general_callback',  
					)
				) );
			//Create Our Services in add filed 			
				$wp_customize->add_setting( 'our_services_section_content', array( 
					'default' => goldy_mega_get_services_default(),
					'sanitize_callback' => 'customizer_repeater_sanitize',
				) );
				$wp_customize->add_control( new Customizer_Repeater( 
				$wp_customize, 'our_services_section_content', array(
					'label'                             => esc_html__( 'Info Items Content', 'goldy-mega' ),
					'section'                           => 'our_services_section',
					'add_field_label'                   => esc_html__( 'Add new info', 'goldy-mega' ),
					'item_name'                         => esc_html__( 'Info Item', 'goldy-mega' ),
					'customizer_repeater_title_control' => true,
					'customizer_repeater_text_control'  => true,
					'customizer_repeater_icon_control'  => true,
					'customizer_repeater_link_control'  => true,
		            'customizer_repeater_checkbox_control' => true,
		            'active_callback' => 'goldy_mega_services_general_callback',
				    ) ) );
				//Features slider in pro version
					$wp_customize->add_setting('our_services_pro', array(
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new Customize_Upgrade_Control(
				    	$wp_customize,'our_services_pro',
				    	array(
					        'settings' => 'our_services_pro',
					        'section' => 'our_services_section',
					        'active_callback' => 'goldy_mega_services_general_callback',
				        )
				    ));
			//Our services Section in Background Title
		    	$wp_customize->add_setting('our_services_background_section', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new Custom_GeneratePress_Upsell_Section(
			    	$wp_customize,'our_services_background_section',
			    	array(
				        'settings' => 'our_services_background_section',
				        'label'   => 'Background Color Or Image',
				        'section' => 'our_services_section',
				        'type'     => 'ast-description',
				        'active_callback' => 'goldy_mega_services_design_callback',
			        )
			    ));
			//Our services Section in Background Image
			    	$wp_customize->add_setting('our_services_bg_image', array(
			    		'default'  => '',
			        	'type'       => 'theme_mod',
				        'transport'  => 'refresh',
				        'height'     => 180,
				        'width'      => 160,
				        'capability' => 'edit_theme_options',
				        'sanitize_callback' => 'esc_url_raw'
				    ));
				    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'our_services_bg_image', array(
				        'label' => 'Backgroung Image',
				        'section' => 'our_services_section',
				        'settings' => 'our_services_bg_image',
				        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
				        'active_callback' => 'goldy_mega_services_design_callback',
				    )));
			//Our services Section in Background Position
			    $wp_customize->add_setting('our_services_bg_position', array(
			        'default'        => 'center center',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_services_bg_position',
			    	array(
				        'settings' => 'our_services_bg_position',
				        'label'   => 'Background Position',
				        'section' => 'our_services_section',
				        'type'  => 'select',
				        'active_callback' => 'goldy_mega_services_design_callback',
				        'choices'    => array(
				        	'left top' => 'Left Top',
				        	'left center' => 'Left Center',
				        	'left bottom' => 'Left Bottom',
				            'right top' => 'Right Top',
				            'right center' => 'Right Center',
				            'right bottom' => 'Right Bottom',
				            'center top' => 'Center Top',
				            'center center' => 'Center Center',
				            'center bottom' => 'Center Bottom',
			        	),
			        )
			    ));
			//Our services Section in Background Attachment
				$wp_customize->add_setting('our_services_bg_attachment', array(
			        'default'        => 'scroll',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_services_bg_attachment',
			    	array(
				        'settings' => 'our_services_bg_attachment',
				        'label'   => 'Background Attachment',
				        'section' => 'our_services_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'scroll' => 'Scroll',
				        	'fixed' => 'Fixed',
			        	),
			        	'active_callback' => 'goldy_mega_services_design_callback',
			        )
			    ));
			//Our services Section in image background Size
			    $wp_customize->add_setting('our_services_bg_size', array(
			        'default'        => 'cover',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_services_bg_size',
			    	array(
				        'settings' => 'our_services_bg_size',
				        'label'   => 'Background Size',
				        'section' => 'our_services_section',
				        'type'  => 'select',
				        'active_callback' => 'goldy_mega_services_design_callback',
				        'choices'    => array(
				        	'auto' => 'Auto',
				        	'cover' => 'Cover',
				            'contain' => 'Contain'
			        	),
			        )
			    ));   
			//Our services in Background color
				$wp_customize->add_setting( 'our_services_bg_color', 
			        array(
			        	'default'    => '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_services_bg_color', 
			        array(
			            'label'      => 'Background Color', 
			            'settings'   => 'our_services_bg_color', 
			            'priority'   => 10,
			            'section'    => 'our_services_section',
			            'active_callback' => 'goldy_mega_services_design_callback',       
			        ) 
		        ) ); 
		    //Our services in Text color
				$wp_customize->add_setting( 'our_services_text_color', 
			        array(
			        	'default'    => '#333333',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_services_text_color', 
			        array(
			            'label'      => 'Text Color', 
			            'settings'   => 'our_services_text_color', 
			            'priority'   => 10,
			            'section'    => 'our_services_section', 
			            'active_callback' => 'goldy_mega_services_design_callback',   
			        ) 
		        ) ); 
		    //Our services in Contain Link color
				$wp_customize->add_setting( 'our_services_link_color', 
			        array(
			        	'default'    => '#015b60',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_services_link_color', 
			        array(
			            'label'      => 'Link Color', 
			            'settings'   => 'our_services_link_color', 
			            'priority'   => 10,
			            'section'    => 'our_services_section',  
			            'active_callback' => 'goldy_mega_services_design_callback', 
			        ) 
		        ) ); 
		    //Our services in Contain Link Hover color
				$wp_customize->add_setting( 'our_services_link_hover_color', 
			        array(
			        	'default'    => '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_services_link_hover_color', 
			        array(
			            'label'      => 'Link Hover Color', 
			            'settings'   => 'our_services_link_hover_color', 
			            'priority'   => 10,
			            'section'    => 'our_services_section',  
			            'active_callback' => 'goldy_mega_services_design_callback', 
			        ) 
		        ) ); 
		    //Our services in Contain Background color
				$wp_customize->add_setting( 'our_services_contain_bg_color', 
			        array(
			        	'default'    => '#dbe9eb',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_services_contain_bg_color', 
			        array(
			            'label'      => 'Contain Background Color', 
			            'settings'   => 'our_services_contain_bg_color', 
			            'priority'   => 10,
			            'section'    => 'our_services_section', 
			            'active_callback' => 'goldy_mega_services_design_callback',   
			        ) 
		        ) );  
		    //Our services in Contain text color
				$wp_customize->add_setting( 'our_services_contain_text_color', 
			        array(
			        	'default'    => '#333333',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_services_contain_text_color', 
			        array(
			            'label'      => 'Contain Text Color', 
			            'settings'   => 'our_services_contain_text_color', 
			            'priority'   => 10,
			            'section'    => 'our_services_section',   
			            'active_callback' => 'goldy_mega_services_design_callback', 
			        ) 
		        ) ); 
		    //Our services section in Contain text Hover Color
				$wp_customize->add_setting( 'our_services_contain_text_hover_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'priority'   => 9,
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_services_contain_text_hover_color', 
			        array(
			            'label'      => 'Contain Text Hover Color', 
			            'settings'   => 'our_services_contain_text_hover_color',
			            'section'    => 'our_services_section',
			            'active_callback' => 'goldy_mega_services_design_callback',
			        ) 
		        ) );
		    //Our services in Contain Background hover color
				$wp_customize->add_setting( 'our_services_contain_bg_hover_color', 
			        array(
			        	'default'    => '#015b60',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_services_contain_bg_hover_color', 
			        array(
			            'label'      => 'Contain Background Hover Color', 
			            'settings'   => 'our_services_contain_bg_hover_color', 
			            'priority'   => 10,
			            'section'    => 'our_services_section',  
			            'active_callback' => 'goldy_mega_services_design_callback', 
			        ) 
		        ) ); 	    
		    //Our services in icon color
				$wp_customize->add_setting( 'our_services_icon_color', 
			        array(
			        	'default'    => '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_services_icon_color', 
			        array(
			            'label'      => 'Icon Color', 
			            'settings'   => 'our_services_icon_color', 
			            'priority'   => 10,
			            'section'    => 'our_services_section', 
			            'active_callback' => 'goldy_mega_services_design_callback',   
			        ) 
		        ) );
		    //Our services in icon hover color
				$wp_customize->add_setting( 'our_services_icon_hover_color', 
			        array(
			        	'default'    => '#015b60',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_services_icon_hover_color', 
			        array(
			            'label'      => 'Hover Icon Color', 
			            'settings'   => 'our_services_icon_hover_color', 
			            'priority'   => 10,
			            'section'    => 'our_services_section', 
			            'active_callback' => 'goldy_mega_services_design_callback',   
			        ) 
		        ) );
		    //Our services in icon background color
				$wp_customize->add_setting( 'our_services_icon_bg_color', 
			        array(
			        	'default'    => '#015b60',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_services_icon_bg_color', 
			        array(
			            'label'      => 'Icon Background Color', 
			            'settings'   => 'our_services_icon_bg_color', 
			            'priority'   => 10,
			            'section'    => 'our_services_section', 
			            'active_callback' => 'goldy_mega_services_design_callback',   
			        ) 
		        ) );
		    //Our services in icon background hover color
				$wp_customize->add_setting( 'our_services_icon_bg_hover_color', 
			        array(
			        	'default'    => '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_services_icon_bg_hover_color', 
			        array(
			            'label'      => 'Hover Icon BAckground Color', 
			            'settings'   => 'our_services_icon_bg_hover_color', 
			            'priority'   => 10,
			            'section'    => 'our_services_section', 
			            'active_callback' => 'goldy_mega_services_design_callback',   
			        ) 
		        ) );			
		//Our Team
			$wp_customize->add_section( 'our_team_section' , array(
				'title'  => 'Our Team',
				'panel'  => 'theme_option_panel',
			) );
			//Our Team tabing 
				$wp_customize->add_setting( 'our_team_section_tab', 
			        array(
			            'default'    => 'general', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new Custom_Radio_Control( 
			        $wp_customize,'our_team_section_tab',array(
			            'settings'   => 'our_team_section_tab', 
			            'priority'   => 10,
			            'section'    => 'our_team_section',
			            'type'    => 'select',
			            'choices'    => array(
				        	'general' => 'General',
				        	'design' => 'Design',
			        	),
			        ) 
		        ) );
			//Our Team in Title
				$wp_customize->add_setting( 'our_team_main_title', array(
					'default'    => 'Our Team',
				    'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_team_main_title',
			    	array(
						'type' => 'text',
						'settings' => 'our_team_main_title',
						'section' => 'our_team_section', // // Add a default or your own section
						'label' => 'Our Team Title',
						'active_callback' => 'goldy_mega_team_general_callback',
					)
				) );
				if ( isset( $wp_customize->selective_refresh ) ) {
					$wp_customize->selective_refresh->add_partial(
						'our_team_main_title',
						array(
							'selector'        => '.our_team_section',
							'render_callback' => 'custom_customize_partial_our_team',
						)
					);
				}
			//Our Team in Discription
				$wp_customize->add_setting( 'our_team_main_discription', array(
				    'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_team_main_discription',
			    	array(
						'type' => 'text',
						'settings' => 'our_team_main_discription',
						'section' => 'our_team_section', // // Add a default or your own section
						'label' => 'Our Team Discription',  
						'active_callback' => 'goldy_mega_team_general_callback',
					)
				) );
			//Create Our Team Section in add filed
				$wp_customize->add_setting( 'our_team_section_content', 
					array(
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'default' => goldy_mega_get_team_default(),
				            'sanitize_callback' => 'customizer_repeater_sanitize',
				        ) 
				);
				$wp_customize->add_control( new Customizer_Repeater( 
				$wp_customize, 'our_team_section_content', array(
					'label'                             => esc_html__( 'Team Items Content', 'goldy-mega' ),
					'section'                           => 'our_team_section',
					'add_field_label'                   => esc_html__( 'Add new Team', 'goldy-mega' ),
					'item_name'                         => esc_html__( 'Team Item', 'goldy-mega' ),
					'customizer_repeater_image_control' => true,
					'customizer_repeater_title_control' => true,
					'customizer_repeater_subtitle_control' => true,
					'customizer_repeater_link_control'  => true,
					'customizer_repeater_twitter_control'  => true,
					'customizer_repeater_facebook_control'  => true,
					'customizer_repeater_linkedin_control'  => true,
					'customizer_repeater_instagram_control'  => true,
		            'customizer_repeater_checkbox_control' => true,
		            'active_callback' => 'goldy_mega_team_general_callback',
				    ) ) );
			//Our Team Section in pro version
				$wp_customize->add_setting('our_team_section_pro', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new Customize_Upgrade_Control(
			    	$wp_customize,'our_team_section_pro',
			    	array(
				        'settings' => 'our_team_section_pro',
				        'section' => 'our_team_section',
				        'active_callback' => 'goldy_mega_team_general_callback',
			        )
			    ));
			//Our Team Section in Background Title
		    	$wp_customize->add_setting('our_team_background_section', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new Custom_GeneratePress_Upsell_Section(
			    	$wp_customize,'our_team_background_section',
			    	array(
				        'settings' => 'our_team_background_section',
				        'label'   => 'Background Color Or Image',
				        'section' => 'our_team_section',
				        'type'     => 'ast-description',
				        'active_callback' => 'goldy_mega_team_design_callback',
			        )
			    ));

			    //Our Team backgroung Image
			    	$wp_customize->add_setting('our_team_bg_image', array(
			    		'default'  => '',
			        	'type'       => 'theme_mod',
				        'transport'     => 'refresh',
				        'height'        => 180,
				        'width'        => 160,
				        'capability' => 'edit_theme_options',
				        'sanitize_callback' => 'esc_url_raw'
				    ));
				    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'our_team_bg_image', array(
				        'label' => 'Backgroung Image',
				        'section' => 'our_team_section',
				        'settings' => 'our_team_bg_image',
				        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
				        'active_callback' => 'goldy_mega_team_design_callback',
				    )));
				//Our Team in Background Position
				    $wp_customize->add_setting('our_team_bg_position', array(
				        'default'        => 'center center',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'our_team_bg_position',
				    	array(
					        'settings' => 'our_team_bg_position',
					        'label'   => 'Background Position',
					        'section' => 'our_team_section',
					        'type'  => 'select',
					        'active_callback' => 'goldy_mega_team_design_callback',
					        'choices'    => $image_position,
				        )
				    ));
				//Our Team Section in Background Attachment
					$wp_customize->add_setting('our_team_bg_attachment', array(
				        'default'        => 'scroll',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'our_team_bg_attachment',
				    	array(
					        'settings' => 'our_team_bg_attachment',
					        'label'   => 'Background Attachment',
					        'section' => 'our_team_section',
					        'type'  => 'select',
					        'choices'    => array(
					        	'scroll' => 'Scroll',
					        	'fixed' => 'Fixed',
				        	),
				        	'active_callback' => 'goldy_mega_team_design_callback',
				        )
				    ));
				//Our Team Section in image background Size
				    $wp_customize->add_setting('our_team_bg_size', array(
				        'default'        => 'cover',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'our_team_bg_size',
				    	array(
					        'settings' => 'our_team_bg_size',
					        'label'   => 'Background Size',
					        'section' => 'our_team_section',
					        'type'  => 'select',
					        'active_callback' => 'goldy_mega_team_design_callback',
					        'choices'    => array(
					        	'auto' => 'Auto',
					        	'cover' => 'Cover',
					            'contain' => 'Contain'
				        	),
				        )
				    ));   
				//Our team background color
					$wp_customize->add_setting( 'our_team_bg_color', 
				        array(
				        	'default'    => '#eeeeee',
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
				        $wp_customize,'our_team_bg_color', 
				        array(
				            'label'      => 'Background Color', 
				            'settings'   => 'our_team_bg_color', 
				            'priority'   => 10,
				            'section'    => 'our_team_section',
				            'active_callback' => 'goldy_mega_team_design_callback',
				        ) 
			        ) ); 
		    //Our team text color
				$wp_customize->add_setting( 'our_team_text_color', 
			        array(
			        	'default'    => '#333333',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_team_text_color', 
			        array(
			            'label'      => 'Text Color', 
			            'settings'   => 'our_team_text_color', 
			            'priority'   => 10,
			            'section'    => 'our_team_section',
			            'active_callback' => 'goldy_mega_team_design_callback',
			        ) 
		        ) ); 		     
		    //Our Team section in contain background color
		     	$wp_customize->add_setting( 'our_team_contain_bg_color', 
			        array(
			            'default'    => '#015b60', //Default setting/value to save
			            'type'       => 'theme_mod',
			           // 'priority'   => 9,
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_team_contain_bg_color', 
			        array(
			            'label'      => 'Contain Background Color', 
			            'settings'   => 'our_team_contain_bg_color',
			            'section'    => 'our_team_section',
			            'active_callback' => 'goldy_mega_team_design_callback',
			        ) 
		        ) );
	    	//Our Team section in contain text color
		     	$wp_customize->add_setting( 'our_team_contain_text_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            //'priority'   => 9,
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_team_contain_text_color', 
			        array(
			            'label'      => 'Contain Text Color', 
			            'settings'   => 'our_team_contain_text_color',
			            'section'    => 'our_team_section',
			            'active_callback' => 'goldy_mega_team_design_callback',
			        ) 
		        ) );
		    //Our team icon color
				$wp_customize->add_setting( 'our_team_icon_color', 
			        array(
			        	'default'    => '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_team_icon_color', 
			        array(
			            'label'      => 'Icon Color', 
			            'settings'   => 'our_team_icon_color', 
			            'priority'   => 10,
			            'section'    => 'our_team_section',
			            'active_callback' => 'goldy_mega_team_design_callback',
			        ) 
		        ) );  
		    //Our team icon hover color
				$wp_customize->add_setting( 'our_team_icon_hover_color', 
			        array(
			        	'default'    => '#015b60', 
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_team_icon_hover_color', 
			        array(
			            'label'      => 'Icon Hover Color', 
			            'settings'   => 'our_team_icon_hover_color', 
			            'priority'   => 10,
			            'section'    => 'our_team_section',
			            'active_callback' => 'goldy_mega_team_design_callback',
			        ) 
		        ) );  
		    //Our team icon background color
				$wp_customize->add_setting( 'our_team_icon_background_color', 
			        array(
			        	'default'    => '#015b60', 
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_team_icon_background_color', 
			        array(
			            'label'      => 'Icon Background Color', 
			            'settings'   => 'our_team_icon_background_color', 
			            'priority'   => 10,
			            'section'    => 'our_team_section',
			            'active_callback' => 'goldy_mega_team_design_callback',
			        ) 
		        ) );  
		    //Our team icon background hover color
				$wp_customize->add_setting( 'our_team_icon_bg_hover_color', 
			        array(
			        	'default'    => '#ffffff', 
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_team_icon_bg_hover_color', 
			        array(
			            'label'      => 'Icon Background Hover Color', 
			            'settings'   => 'our_team_icon_bg_hover_color', 
			            'priority'   => 10,
			            'section'    => 'our_team_section',
			            'active_callback' => 'goldy_mega_team_design_callback',
			        ) 
		        ) );  
		    //Our team Link color
				$wp_customize->add_setting( 'our_team_link_color', 
			        array(
			        	'default'    => '#015b60',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_team_link_color', 
			        array(
			            'label'      => 'Link Color', 
			            'settings'   => 'our_team_link_color', 
			            'priority'   => 10,
			            'section'    => 'our_team_section',
			            'active_callback' => 'goldy_mega_team_design_callback',
			        ) 
		        ) );  
		    //Our team Link Hover color
				$wp_customize->add_setting( 'our_team_link_hover_color', 
			        array(
			        	'default'    => '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_team_link_hover_color', 
			        array(
			            'label'      => 'Link Hover Color', 
			            'settings'   => 'our_team_link_hover_color', 
			            'priority'   => 10,
			            'section'    => 'our_team_section',
			            'active_callback' => 'goldy_mega_team_design_callback',
			        ) 
		        ) );  
	    //Our Testimonial
			$wp_customize->add_section( 'our_testimonial_section' , array(
				'title'  => 'Our Testimonial',
				'panel'  => 'theme_option_panel',
			) );
			//Our Testimonial Tabing
			 	$wp_customize->add_setting( 'our_testimonial_section_tab', 
			        array(
			            'default'    => 'general', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new Custom_Radio_Control( 
			        $wp_customize,'our_testimonial_section_tab',array(
			            'settings'   => 'our_testimonial_section_tab', 
			            'priority'   => 0,
			            'section'    => 'our_testimonial_section',
			            'type'    => 'select',
			            'choices'    => array(
				        	'general' => 'General',
				        	'design' => 'Design',
			        	),
			        ) 
		        ) );
			//Our Testimonial in Title
				$wp_customize->add_setting( 'our_testimonial_main_title', array(
					'default'    => 'Our Testimonial',
				    'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_testimonial_main_title',
			    	array(
						'type' => 'text',
						'settings' => 'our_testimonial_main_title',
						'section' => 'our_testimonial_section', // // Add a default or your own section
						'label' => 'Our Testimonial Title',
						'active_callback' => 'goldy_mega_testimonial_general_callback',
					)
				) );
				if ( isset( $wp_customize->selective_refresh ) ) {
					$wp_customize->selective_refresh->add_partial(
						'our_testimonial_main_title',
						array(
							'selector'        => '.our_testimonial_section',
							'render_callback' => 'custom_customize_partial_testimonial',
						)
					);
				}
			//Our Testimonial in Discription
				$wp_customize->add_setting( 'our_testimonial_main_discription', array(
				    'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_testimonial_main_discription',
			    	array(
						'type' => 'text',
						'settings' => 'our_testimonial_main_discription',
						'section' => 'our_testimonial_section', // // Add a default or your own section
						'label' => 'Our Testimonial Discription',  
						'active_callback' => 'goldy_mega_testimonial_general_callback',
					)
				) );
			//Create Our Portfolio add new filed			
				$wp_customize->add_setting( 'our_testimonial_section_content', array( 
					'default' => goldy_mega_get_testimonial_default(),
					'sanitize_callback' => 'customizer_repeater_sanitize',
				) );
				$wp_customize->add_control( new Customizer_Repeater( 
				$wp_customize, 'our_testimonial_section_content', array(
					'label'                             => esc_html__( 'Testimonial Items Content', 'goldy-mega' ),
					'section'                           => 'our_testimonial_section',
					'add_field_label'                   => esc_html__( 'Add new Testimonial Items', 'goldy-mega' ),
					'item_name'                         => esc_html__( 'Testimonial Item', 'goldy-mega' ),
					'customizer_repeater_image_control' => true,
					'customizer_repeater_title_control' => true,
					'customizer_repeater_subtitle_control' => true,
					'customizer_repeater_text_control' => true,
					//'customizer_repeater_icon_control'  => true,
					'customizer_repeater_link_control'  => true,
		            'active_callback' => 'goldy_mega_testimonial_general_callback',
				    ) ) );	
		    //Our Testimonial Section in pro version
				$wp_customize->add_setting('our_testimonial_section_pro', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new Customize_Upgrade_Control(
			    	$wp_customize,'our_testimonial_section_pro',
			    	array(
				        'settings' => 'our_testimonial_section_pro',
				        'section' => 'our_testimonial_section',
				        'active_callback' => 'goldy_mega_testimonial_general_callback',
			        )
			    ));	
			//Our Testimonial in background color
				$wp_customize->add_setting( 'our_team_testimonial_bg_color', 
			        array(
			        	'default'    => '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_team_testimonial_bg_color', 
			        array(
			            'label'      => 'Background Color', 
			            'settings'   => 'our_team_testimonial_bg_color', 
			            'priority'   => 1,
			            'section'    => 'our_testimonial_section',
			            'active_callback' => 'goldy_mega_testimonial_design_callback',
			        ) 
		        ) ); 
		    //Our Testimonial background image option
		        $wp_customize->add_setting('our_testimonial_background_image', array(
		        	'type'       => 'theme_mod',
			        'transport'     => 'refresh',
			        'height'        => 180,
			        'width'        => 160,
			        'capability' => 'edit_theme_options',
			        'sanitize_callback' => 'esc_url_raw'
			    ));
			    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'our_testimonial_background_image', array(
			        'label' => 'Backgroung Image',
			        'section' => 'our_testimonial_section',
			        'priority'   => 2,
			        'settings' => 'our_testimonial_background_image',
			        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
			        'active_callback' => 'goldy_mega_testimonial_design_callback',
			    )));
			//Our Testimonial in image background position
			    $wp_customize->add_setting('our_testimonial_bg_position', array(
			        'default'        => 'center center',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_testimonial_bg_position',
			    	array(
				        'settings' => 'our_testimonial_bg_position',
				        'label'   => 'Background Position',
				        'priority'   => 3,
				        'section' => 'our_testimonial_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'left top' => 'Left Top',
				        	'left center' => 'Left Center',
				        	'left bottom' => 'Left Bottom',
				            'right top' => 'Right Top',
				            'right center' => 'Right Center',
				            'right bottom' => 'Right Bottom',
				            'center top' => 'Center Top',
				            'center center' => 'Center Center',
				            'center bottom' => 'Center Bottom',
			        	),
			        	'active_callback' => 'goldy_mega_testimonial_design_callback',
			        )
			    )); 
			//Our Testimonial in image background attachment
			    $wp_customize->add_setting('our_testimonial_bg_attachment', array(
			        'default'        => 'fixed',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_testimonial_bg_attachment',
			    	array(
				        'settings' => 'our_testimonial_bg_attachment',
				        'label'   => 'Background Attachment',
				        'section' => 'our_testimonial_section',
				        'priority'   => 4,
				        'type'  => 'select',
				        'choices'    => array(
				        	'scroll' => 'Scroll',
				        	'fixed' => 'Fixed',
			        	),
			        	'active_callback' => 'goldy_mega_testimonial_design_callback',
			        )
			    ));
			//Our Testimonial in image background Size
			    $wp_customize->add_setting('our_testimonial_bg_size', array(
			        'default'        => 'cover',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_testimonial_bg_size',
			    	array(
				        'settings' => 'our_testimonial_bg_size',
				        'label'   => 'Background Size',
				        'section' => 'our_testimonial_section',
				        'priority'   => 5,
				        'type'  => 'select',
				        'choices'    => array(
				        	'auto' => 'Auto',
				        	'cover' => 'Cover',
				            'contain' => 'Contain'
			        	),
			        	'active_callback' => 'goldy_mega_testimonial_design_callback',
			        )
			    ));  		   
		    //Our Testimonial in Text color
				$wp_customize->add_setting( 'our_testimonial_text_color', 
			        array(
			        	'default'    => '#333333',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_testimonial_text_color', 
			        array(
			            'label'      => 'Text Color', 
			            'settings'   => 'our_testimonial_text_color', 
			            'priority'   => 6,
			            'section'    => 'our_testimonial_section',
			            'active_callback' => 'goldy_mega_testimonial_design_callback',
			        ) 
		        ) );
		    //Our Testimonial in Contain background color
		        $wp_customize->add_setting(
			        'our_testimonial_alpha_color_setting',
			        array(
			        	'default'    => '#eeeeee',
			            'type'       => 'theme_mod',
			            'capability' => 'edit_theme_options',
			            'transport'  => 'refresh',
						'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        )
			    );	
			    $wp_customize->add_control(new goldy_mega_Customize_Transparent_Color_Control(
			            $wp_customize,'our_testimonial_alpha_color_setting',
			            array(
			                'label'        => 'Contain Background Color',
			                'priority'   => 7,
			                'section'      => 'our_testimonial_section',
			                'settings'     => 'our_testimonial_alpha_color_setting',
			                'active_callback'  => 'goldy_mega_testimonial_design_callback',
			            )
			        )
			    ); 
		    //Our Testimonial in Description Text color
				$wp_customize->add_setting( 'our_team_testimonial_text_color', 
			        array(
			        	'default'    => '#333333',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_team_testimonial_text_color', 
			        array(
			            'label'      => 'Description Text Color', 
			            'settings'   => 'our_team_testimonial_text_color', 
			            'priority'   => 8,
			            'section'    => 'our_testimonial_section',
			            'active_callback' => 'goldy_mega_testimonial_design_callback',
			        ) 
		        ) );
		    //Our Testimonial in title text color
				$wp_customize->add_setting( 'our_team_testimonial_title_text_color', 
			        array(
			            'default'    => '#015b60', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'priority'   => 9,
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_team_testimonial_title_text_color', 
			        array(
			            'label'      => 'Client Title Color', 
			            'settings'   => 'our_team_testimonial_title_text_color',
			            'section'    => 'our_testimonial_section',
			            'active_callback' => 'goldy_mega_testimonial_design_callback',
			        ) 
		        ) ); 
		    //Our Testimonial in subtitle text color
				$wp_customize->add_setting( 'our_testimonial_subheadline_text_color', 
			        array(
			            'default'    => '#333333', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'priority'   => 9,
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_testimonial_subheadline_text_color', 
			        array(
			            'label'      => 'SubHeadline Text Color', 
			            'settings'   => 'our_testimonial_subheadline_text_color',
			            'section'    => 'our_testimonial_section',
			            'active_callback' => 'goldy_mega_testimonial_design_callback',
			        ) 
		        ) );  
		    //Our Testimonial in Quote color
				$wp_customize->add_setting( 'our_testimonial_quote_color', 
			        array(
			            'default'    => '#015b60', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'priority'   => 9,
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_testimonial_quote_color', 
			        array(
			            'label'      => 'Quote Color', 
			            'settings'   => 'our_testimonial_quote_color',
			            'section'    => 'our_testimonial_section',
			            'active_callback' => 'goldy_mega_testimonial_design_callback',
			        ) 
		        ) );  
		    //Our Testimonial in arrow background color
				$wp_customize->add_setting( 'our_team_testimonial_arrow_bg_color', 
			        array(
			        	'default'    => '#015b60',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_team_testimonial_arrow_bg_color', 
			        array(
			            'label'      => 'Arrow Background Color', 
			            'settings'   => 'our_team_testimonial_arrow_bg_color', 
			            'priority'   => 10,
			            'section'    => 'our_testimonial_section',
			            'active_callback' => 'goldy_mega_testimonial_design_callback',
			        ) 
		        ) );  
		    //Our Testimonial in arroe text color
				$wp_customize->add_setting( 'our_team_testimonial_arrow_text_color', 
			        array(
			        	'default'    => '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_team_testimonial_arrow_text_color', 
			        array(
			            'label'      => 'Arrow Text Color', 
			            'settings'   => 'our_team_testimonial_arrow_text_color', 
			            'priority'   => 10,
			            'section'    => 'our_testimonial_section',
			            'active_callback' => 'goldy_mega_testimonial_design_callback',
			        ) 
		        ) );  
		    //Our Testimonial in Autoplay True
			    $wp_customize->add_setting('our_testimonial_slider_autoplay', array(
			        'default'        => 'true',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'goldy_mega_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_testimonial_slider_autoplay',
			    	array(
				        'settings' => 'our_testimonial_slider_autoplay',
				        'label'   => 'Autoplay',
				        'section' => 'our_testimonial_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'true' => 'True',
				        	'false' => 'False',
			        	),
			        	'active_callback' => 'goldy_mega_testimonial_design_callback',
			        )
			    )); 
			//Our Testimonial Slider in autoplay speed
			    $wp_customize->add_setting('our_testimonial_slider_autoplay_speed', array(
			    	'default'        => '1000',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_testimonial_slider_autoplay_speed',
			    	array(
				        'settings' => 'our_testimonial_slider_autoplay_speed',
				        'label'   => 'AutoplaySpeed',
				        'section' => 'our_testimonial_section',
				        'type'  => 'text', 
				        'active_callback' => 'goldy_mega_testimonial_design_callback',  
			        )
			    ));    
			//Our Testimonial in autoplay TimeOut
			    $wp_customize->add_setting('our_testimonial_autoplay_timeout', array(
			    	'default'        => '5000',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_testimonial_autoplay_timeout',
			    	array(
				        'settings' => 'our_testimonial_autoplay_timeout',
				        'label'   => 'AutoplayTimeout',
				        'section' => 'our_testimonial_section',
				        'type'  => 'text',
				        'active_callback' => 'goldy_mega_testimonial_design_callback',
			        )
			    ));		    
		//Our Sponsors
			$wp_customize->add_section( 'our_sponsors_section' , array(
				'title'  => 'Our Sponsors',
				'panel'  => 'theme_option_panel',
			) );
			//Our Sponsors in Tabing
				$wp_customize->add_setting( 'our_sponsors_tab', 
			        array(
			            'default'    => 'general', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new Custom_Radio_Control( 
			        $wp_customize,'our_sponsors_tab',array(
			            'settings'   => 'our_sponsors_tab', 
			            'priority'   => 10,
			            'section'    => 'our_sponsors_section',
			            'type'    => 'select',
			            'choices'    => array(
				        	'general' => 'General',
				        	'design' => 'Design',
			        	),
			        ) 
		        ) );
			//Our Sponsors in Title
				$wp_customize->add_setting( 'our_sponsors_main_title', array(
					'default'    => 'Our Sponsors',
				    'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_sponsors_main_title',
			    	array(
						'type' => 'text',
						'settings' => 'our_sponsors_main_title',
						'section' => 'our_sponsors_section', // // Add a default or your own section
						'label' => 'Our Sponsors Title', 
						'active_callback' => 'goldy_mega_sponsors_general_callback',     
					)
				) );
				if ( isset( $wp_customize->selective_refresh ) ) {
					$wp_customize->selective_refresh->add_partial(
						'our_sponsors_main_title',
						array(
							'selector'        => '.our_sponsors_section',
							'render_callback' => 'custom_customize_partial_sponsors',
						)
					);
				}
			//Our Sponsors in Discription
				$wp_customize->add_setting( 'our_sponsors_main_discription', array(
				    'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_sponsors_main_discription',
			    	array(
						'type' => 'text',
						'settings' => 'our_sponsors_main_discription',
						'section' => 'our_sponsors_section', // // Add a default or your own section
						'label' => 'Our Sponsors Discription', 
						'active_callback' => 'goldy_mega_sponsors_general_callback',  
					)
				) );	
			//Create Sponsors add new filed			
				$wp_customize->add_setting( 'our_sponsors_section_content', array( 
					'default' =>goldy_mega_get_sponsors_default(),
					'sanitize_callback' => 'customizer_repeater_sanitize',
				) );
				$wp_customize->add_control( new Customizer_Repeater( 
				$wp_customize, 'our_sponsors_section_content', array(
					'label'                             => esc_html__( 'Sponsors Items Content', 'goldy-mega' ),
					'section'                           => 'our_sponsors_section',
					'add_field_label'                   => esc_html__( 'Add new Sponsors Items', 'goldy-mega' ),
					'item_name'                         => esc_html__( 'Sponsors Item', 'goldy-mega' ),
					'customizer_repeater_image_control' => true,
					'customizer_repeater_link_control'  => true,
		            'active_callback' => 'goldy_mega_sponsors_general_callback',
				    ) ) );
			//Our sponsors Section in pro version
				$wp_customize->add_setting('our_sponsors_section_pro', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new Customize_Upgrade_Control(
			    	$wp_customize,'our_sponsors_section_pro',
			    	array(
				        'settings' => 'our_sponsors_section_pro',
				        'section' => 'our_sponsors_section',
				        'active_callback' => 'goldy_mega_sponsors_general_callback',
			        )
			    ));
			//Our sponsors in Text color
				$wp_customize->add_setting( 'our_sponsors_text_color', 
			        array(
			        	'default'	=> '#333333',
			            'type'      => 'theme_mod',
			            'transport' => 'refresh',
			            'capability'=> 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_sponsors_text_color', 
			        array(
			            'label'      => 'Text Color', 
			            'settings'   => 'our_sponsors_text_color', 
			            'priority'   => 10,
			            'section'    => 'our_sponsors_section',   
			            'active_callback' => 'goldy_mega_sponsors_design_callback',
			        ) 
		        ) ); 
		    //Our sponsors in background color
				$wp_customize->add_setting( 'our_sponsors_bg_color', 
			        array(
			        	'default'	=> '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_sponsors_bg_color', 
			        array(
			            'label'      => 'Background Color', 
			            'settings'   => 'our_sponsors_bg_color', 
			            'priority'   => 10,
			            'section'    => 'our_sponsors_section', 
			            'active_callback' => 'goldy_mega_sponsors_design_callback',  
			        ) 
		        ) );  	
		    //Our sponsors in image hover background color
				$wp_customize->add_setting( 'our_sponsors_img_hover_bg_color', 
			        array(
			        	'default'	=> '#eeeeee',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_sponsors_img_hover_bg_color', 
			        array(
			            'label'      => 'Image Hover Background Color', 
			            'settings'   => 'our_sponsors_img_hover_bg_color', 
			            'priority'   => 10,
			            'section'    => 'our_sponsors_section',
			            'active_callback' => 'goldy_mega_sponsors_design_callback',   
			        ) 
		        ) );  	 	
		    //Our sponsors in arrow color
				$wp_customize->add_setting( 'our_sponsors_arrow_color', 
			        array(
			        	'default'    => '#ffffff',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_sponsors_arrow_color', 
			        array(
			            'label'      => 'Arrow Color', 
			            'settings'   => 'our_sponsors_arrow_color', 
			            'priority'   => 10,
			            'section'    => 'our_sponsors_section',
			            'active_callback' => 'goldy_mega_sponsors_design_callback',   
			        ) 
		        ) ); 
		    //Our sponsors in arrow Background color
				$wp_customize->add_setting( 'our_sponsors_arrow_bg_color', 
			        array(
			        	'default'    => '#015b60',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control( 
			        $wp_customize,'our_sponsors_arrow_bg_color', 
			        array(
			            'label'      => 'Arrow Background Color', 
			            'settings'   => 'our_sponsors_arrow_bg_color', 
			            'priority'   => 10,
			            'section'    => 'our_sponsors_section',
			            'active_callback' => 'goldy_mega_sponsors_design_callback',   
			        ) 
		        ) );  	 	
		    //Our sponsors in Autoplay True
			    $wp_customize->add_setting('our_sponsors_slider_autoplay', array(
			        'default'        => 'true',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'goldy_mega_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_sponsors_slider_autoplay',
			    	array(
				        'settings' => 'our_sponsors_slider_autoplay',
				        'label'   => 'Autoplay',
				        'section' => 'our_sponsors_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'true' => 'True',
				        	'false' => 'False',
			        	),
			        	'active_callback' => 'goldy_mega_sponsors_design_callback',
			        )
			    )); 
			//Our sponsors Slider in autoplay speed
			    $wp_customize->add_setting('our_sponsors_slider_autoplay_speed', array(
			    	'default'        => '1000',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_sponsors_slider_autoplay_speed',
			    	array(
				        'settings' => 'our_sponsors_slider_autoplay_speed',
				        'label'   => 'AutoplaySpeed',
				        'section' => 'our_sponsors_section',
				        'type'  => 'text', 
				        'active_callback' => 'goldy_mega_sponsors_design_callback',  
			        )
			    ));  
			//Our sponsors in autoplay TimeOut
			    $wp_customize->add_setting('our_sponsors_autoplay_timeout', array(
			    	'default'        => '5000',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'our_sponsors_autoplay_timeout',
			    	array(
				        'settings' => 'our_sponsors_autoplay_timeout',
				        'label'   => 'AutoplayTimeout',
				        'section' => 'our_sponsors_section',
				        'type'  => 'text',
				        'active_callback' => 'goldy_mega_sponsors_design_callback',
			        )
			    ));  

	    //Ordering Section
			$wp_customize->add_section( 'global_ordering_section' , array(
				'title'  => 'Home Page Ordering Section',
				'panel'  => 'theme_option_panel',	
			) );
			//add Control
				$wp_customize->add_setting('global_ordering', array(
					'default'  => array( 
							'goldy_mega_featuredimage_slider',
							'goldy_mega_services_section',
							'goldy_mega_widget_section',
							'goldy_mega_about_section',			
							'goldy_mega_featured_info',	
							'goldy_mega_portfolio_section',
							'goldy_mega_testimonial_section',
							'goldy_mega_team_section',													
							'goldy_mega_sponsors_section',						
						),
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'goldy_mega_sanitize_select',
			    ));
			    $wp_customize->add_control( new hide_show_custom_ordering(
			    	$wp_customize,'global_ordering',
			    	array(
				        'settings' => 'global_ordering',
				        'label'   => 'Select Section',
				        'description' => 'Drag & Drop Sections to re-arrange the order',
				        'section' => 'global_ordering_section',
				        'type'    => 'sortable_repeater',
				        'choices'     => array(
							'goldy_mega_featuredimage_slider' => 'Featured Slider',
							'goldy_mega_services_section'	=> 'Our Services',	
							'goldy_mega_widget_section' => 'Woocommerce Product',
							'goldy_mega_about_section'	=> 'About Section',
							'goldy_mega_featured_info' => 'Featured Section',
							'goldy_mega_portfolio_section'	=> 'Our Portfolio',
							'goldy_mega_testimonial_section'	=> 'Our Testimonial',						
							'goldy_mega_team_section'	=> 'Our Team',						
							'goldy_mega_sponsors_section'	=> 'Our Sponsors',
						),
				    )
				));	
			//diseble section    
				$wp_customize->add_setting('custom_ordering_diseble', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'custom_ordering_diseble',
			    	array(
				        'settings' => 'custom_ordering_diseble',
				        'section' => 'global_ordering_section',
				        'type'    => 'hidden',
				    )
				));	
			//Drag and Drop in pro option
				$wp_customize->add_setting('drag_drop_section_pro', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new drag_drop_option_Control(
			    	$wp_customize,'drag_drop_section_pro',
			    	array(
				        'settings' => 'drag_drop_section_pro',
				        'section' => 'global_ordering_section',
			        )
			    ));

	    //Theme option in design option
			$wp_customize->add_section( 'goldy_mega_theme_option_design_section' , array(
				'title'  => 'Design',
				'panel'  => 'theme_option_panel',
			) );
			//Heading Under Line Color 
				$wp_customize->add_setting( 'goldy_mega_heading_underline_color', 
			        array(
			            'default'    => '#015b60', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_hex_color',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'goldy_mega_heading_underline_color', 
			        array(
			            'label'      => __( 'Heading Underline Color', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_heading_underline_color', 
			            'priority'   => 10, 
			            'section'    => 'goldy_mega_theme_option_design_section',
			        ) 
		        ) );	   


    //Footer Section
		$wp_customize->add_panel( 'goldy_mega_footer_panel', array(
			'title'     => __('Footer', 'goldy-mega'),
			'priority'  => 6,
		) ); 
		//Footer Section 
			$wp_customize->add_section( 'goldy_mega_footer_section' , array(
				'title'       => __('Footer Option', 'goldy-mega'),
				'panel'  => 'goldy_mega_footer_panel',
			) );
			//Footer Background Color
				$wp_customize->add_setting( 'goldy_mega_footer_bg_color', 
			        array(
			            'default'    => '#015b60', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control($wp_customize, 'goldy_mega_footer_bg_color', 
			        array(
			            'label'      => __( 'Footer Background Color', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_footer_bg_color', 
			            'priority'   => 10, 
			            'section'    => 'goldy_mega_footer_section',
			        ) 
		        ) );	
		    //Footer Text Color
				$wp_customize->add_setting( 'goldy_mega_footer_text_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control($wp_customize, 'goldy_mega_footer_text_color', 
			        array(
			            'label'      => __( 'Footer Text Color', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_footer_text_color', 
			            'priority'   => 10, 
			            'section'    => 'goldy_mega_footer_section',
			        ) 
		        ) );	
		    //Footer Link Color
				$wp_customize->add_setting( 'goldy_mega_footer_link_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control($wp_customize, 'goldy_mega_footer_link_color', 
			        array(
			            'label'      => __( 'Link Color', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_footer_link_color', 
			            'priority'   => 10, 
			            'section'    => 'goldy_mega_footer_section',
			        ) 
		        ) );	
		    //Footer Link Hover Color
				$wp_customize->add_setting( 'goldy_mega_footer_link_hover_color', 
			        array(
			            'default'    => '#000000', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new goldy_mega_Customize_Transparent_Color_Control($wp_customize, 'goldy_mega_footer_link_hover_color', 
			        array(
			            'label'      => __( 'Link Hover Color', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_footer_link_hover_color', 
			            'priority'   => 10, 
			            'section'    => 'goldy_mega_footer_section',
			        ) 
		        ) );	
		    //Footer Background Image
		        $wp_customize->add_setting('footer_bg_image', array(
		        	'type'       => 'theme_mod',
			        'transport'     => 'refresh',
			        'height'        => 180,
			        'width'        => 160,
			        'capability' => 'edit_theme_options',
			        'sanitize_callback' => 'esc_url_raw'
			    ));
			    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_bg_image', array(
			        'label' => __('Backgroung Image', 'goldy-mega'),
			        'section' => 'goldy_mega_footer_section',
			        'settings' => 'footer_bg_image',
			        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
			    )));
			//footer in image background position
			    $wp_customize->add_setting('footer_bg_position', array(
			        'default'        => 'center center',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'footer_bg_position',
			    	array(
				        'settings' => 'footer_bg_position',
				        'label'   => 'Background Position',
				        'section' => 'goldy_mega_footer_section',
				        'type'  => 'select',
				        'choices'    => $image_position,
			        )
			    )); 
			//footer in image background attachment
				    $wp_customize->add_setting('footer_bg_attachment', array(
				        'default'        => 'scroll',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'footer_bg_attachment',
				    	array(
					        'settings' => 'footer_bg_attachment',
					        'label'   => 'Background Attachment',
					        'section' => 'goldy_mega_footer_section',
					        'type'  => 'select',
					        'choices'    => array(
					        	'scroll' => 'Scroll',
					        	'fixed' => 'Fixed',
				        	),
				        )
				    ));
			//footer in image background Size
			    $wp_customize->add_setting('footer_bg_size', array(
			        'default'        => 'cover',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'footer_bg_size',
			    	array(
				        'settings' => 'footer_bg_size',
				        'label'   => 'Background Size',
				        'section' => 'goldy_mega_footer_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'auto' => 'Auto',
				        	'cover' => 'Cover',
				            'contain' => 'Contain'
			        	),
			        )
			    ));  

		//Footer Width
			$wp_customize->add_section( 'goldy_mega_footer_width_section' , array(
				'title'       => __('Footer Width', 'goldy-mega'),
				'panel'  => 'goldy_mega_footer_panel',
			) );
			//footer width layout
			    $wp_customize->add_setting( 'goldy_mega_footer_width_layout', 
			        array(
			            'default'    => 'content_width',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'goldy_mega_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'goldy_mega_footer_width_layout',array(
			        	'label'      => __( 'Footer Width', 'goldy-mega' ), 
			            'settings'   => 'goldy_mega_footer_width_layout', 
			            'priority'   => 0,
			            'section'    => 'goldy_mega_footer_width_section',
			            'type'    => 'select',
			            'choices' => array(
			            				'full_width' => 'Full Width',
			            				'content_width' => 'Content Width',
			            			),
			        ) 
		        ) );	   
		    //Footer Section in contact width
			    $wp_customize->add_setting( 'goldy_mega_footer_contact_width', 
			        array(
			            'default'    => '1100',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'goldy_mega_footer_contact_width',array(
			        	'label'      => __( 'Footer Contact Width', 'goldy-mega' ), 
			        	'description' => 'in px',
			            'settings'   => 'goldy_mega_footer_contact_width', 
			            'priority'   => 0,
			            'section'    => 'goldy_mega_footer_width_section',
			            'type'    => 'number',
			            'active_callback'  => 'goldy_mega_footer_content_width_call_back',
			        ) 
		        ) );	   

    //logo option in image width title_tagline
	    $wp_customize->add_setting('goldy_mega_logo_width', array(
	    	'default'    => '150',
	        'type'       => 'theme_mod',
	        'capability' => 'edit_theme_options',
	        'transport'  => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',		  
	    ));
	    $wp_customize->add_control( new WP_Customize_Control(
	    	$wp_customize,'goldy_mega_logo_width',
	    	array(
		        'settings' => 'goldy_mega_logo_width',
		        'label'    => 'Logo Image Width',
		        'section'  => 'title_tagline',
		        'type'  => "number",
		        'description' => 'in px',
	        )
	    ));

	$wp_customize->remove_control('background_color');
	$wp_customize->remove_section('header_image');
	$wp_customize->remove_section('background_image');
	//$wp_customize->remove_control('our_team_testimonial_image_bg_color');	  
}
add_action( 'customize_register', 'goldy_mega_customize_register', 20 );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function goldy_mega_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function goldy_mega_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function goldy_mega_customize_preview_js() {
	wp_enqueue_script( 'goldy_mega-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), goldy_mega_S_VERSION, true );
}
add_action( 'customize_preview_init', 'goldy_mega_customize_preview_js' );

//sanitize select
	if ( ! function_exists( 'goldy_mega_sanitize_select' ) ) :
	    function goldy_mega_sanitize_select( $input, $setting ) {

	        $input = sanitize_text_field( $input );

	        $choices = $setting->manager->get_control( $setting->id )->choices;

	        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	    }
	endif;
//sanitize checkbox
	if ( ! function_exists( 'goldy_mega_sanitize_checkbox' ) ) :
	    function goldy_mega_sanitize_checkbox( $checked ) {
	        return ( ( isset( $checked ) && true === $checked ) ? true : false );
	    }
	endif;

if ( ! function_exists( 'goldy_mega_header_site_layout' ) ) :
    function goldy_mega_header_site_layout() {
        $goldy_mega_header_site_layout = array(
            'header1'  => get_template_directory_uri() . '/assets/images/header1.png',
        );
        $output = apply_filters( 'goldy_mega_header_site_layout', $goldy_mega_header_site_layout );
        return $output;
    }
endif;

function goldy_mega_customizer_css() {
    wp_enqueue_style('goldy_mega-customize-controls-style', get_template_directory_uri().'/assets/css/customizer_admin.css');
}
add_action( 'customize_controls_enqueue_scripts', 'goldy_mega_customizer_css',0 );

function goldy_mega_theme_scripts() {	
    $goldy_mega_body_fontfamily = get_theme_mod("goldy_mega_body_fontfamily",5);    
    if($goldy_mega_body_fontfamily!=''){
        global $goldy_mega_fonttotal;
        $font_args = array(
            'family'    => rawurlencode($goldy_mega_fonttotal[$goldy_mega_body_fontfamily]),
        );
        $font_url = add_query_arg($font_args,'https://fonts.googleapis.com/css');
        wp_enqueue_style( 'factory-lite-font', wptt_get_webfont_url($font_url), array() );
    }
    $goldy_mega_Heading_fontfamily = get_theme_mod("goldy_mega_Heading_fontfamily",5);    
    if($goldy_mega_Heading_fontfamily!=''){
        global $goldy_mega_fonttotal;
        $font_args = array(
            'family'    => rawurlencode($goldy_mega_fonttotal[$goldy_mega_Heading_fontfamily]),
        );
        $font_url = add_query_arg($font_args,'https://fonts.googleapis.com/css');
        wp_enqueue_style( 'factory-lite-font-a', wptt_get_webfont_url($font_url), array() );
    }
    $goldy_mega_Heading1_fontfamily = get_theme_mod("goldy_mega_Heading1_fontfamily",5);    
    if($goldy_mega_Heading1_fontfamily!=''){
        global $goldy_mega_fonttotal;
        $font_args = array(
            'family'    => rawurlencode($goldy_mega_fonttotal[$goldy_mega_Heading1_fontfamily]),
        );
        $font_url = add_query_arg($font_args,'https://fonts.googleapis.com/css');
        wp_enqueue_style( 'factory-lite-font-b', wptt_get_webfont_url($font_url), array() );
    }
    $goldy_mega_Heading2_fontfamily = get_theme_mod("goldy_mega_Heading2_fontfamily",5);    
    if($goldy_mega_Heading2_fontfamily!=''){
        global $goldy_mega_fonttotal;
        $font_args = array(
            'family'    => rawurlencode($goldy_mega_fonttotal[$goldy_mega_Heading2_fontfamily]),
        );
        $font_url = add_query_arg($font_args,'https://fonts.googleapis.com/css');
        wp_enqueue_style( 'factory-lite-font-c', wptt_get_webfont_url($font_url), array() );
    }
    $goldy_mega_Heading3_fontfamily = get_theme_mod("goldy_mega_Heading3_fontfamily",5);    
    if($goldy_mega_Heading3_fontfamily!=''){
        global $goldy_mega_fonttotal;
        $font_args = array(
            'family'    => rawurlencode($goldy_mega_fonttotal[$goldy_mega_Heading3_fontfamily]),
        );
        $font_url = add_query_arg($font_args,'https://fonts.googleapis.com/css');
        wp_enqueue_style( 'factory-lite-font-d', wptt_get_webfont_url($font_url), array() );
    }
}  
add_action( 'wp_enqueue_scripts', 'goldy_mega_theme_scripts' );

function goldy_mega_footer_content_width_call_back(){
	$goldy_mega_footer_width_layout = get_theme_mod( 'goldy_mega_footer_width_layout','content_width');
	if ( 'content_width' === $goldy_mega_footer_width_layout ) {
		return true;
	}
	return false;
}
function goldy_mega_header_content_width_call_back(){
	$goldy_mega_header_width_layout = get_theme_mod( 'goldy_mega_header_width_layout','content_width');
	if ( 'content_width' === $goldy_mega_header_width_layout ) {
		return true;
	}
	return false;
}
function goldy_mega_grid_view_callback(){
	$goldy_mega_container_blog_layout = get_theme_mod( 'goldy_mega_container_blog_layout','grid_view');
	if ( 'grid_view' === $goldy_mega_container_blog_layout ) {
		return true;
	}
	return false;
}
function goldy_mega_read_more_callback(){
	$goldy_mega_container_readmore_btn = get_theme_mod( 'goldy_mega_container_readmore_btn',true);
	if ( true === $goldy_mega_container_readmore_btn ) {
		return true;
	}
	return false;
}
function goldy_mega_content_box_call_back(){
	$goldy_mega_container_width_layout = get_theme_mod( 'goldy_mega_container_width_layout','content_width');
	if ( 'content_width' === $goldy_mega_container_width_layout ) {
		return true;
	}
	return false;
}
function goldy_mega_box_layout_call_back(){
	$goldy_mega_container_width_layout = get_theme_mod( 'goldy_mega_container_width_layout','content_width');
	if ( 'boxed_layout' === $goldy_mega_container_width_layout ) {
		return true;
	}
	return false;
}
function goldy_mega_container_content_width_call_back(){
	$goldy_mega_container_width_layout = get_theme_mod( 'goldy_mega_container_width_layout','content_width');
	if ( 'content_width' === $goldy_mega_container_width_layout ) {
		return true;
	}
	if ( 'boxed_layout' === $goldy_mega_container_width_layout ) {
		return true;
	}
	return false;
}
function goldy_mega_header1_call_back(){
	$goldy_mega_header_layout = get_theme_mod( 'goldy_mega_header_layout','header1');
	if ( 'header1' === $goldy_mega_header_layout ) {
		return true;
	}
	return false;
}
function goldy_mega_transparent_call_menu_btn_callback(){
	$goldy_mega_header_layout = get_theme_mod( 'goldy_mega_header_layout','header1');
	if ( 'header2' === $goldy_mega_header_layout ) {
		return true;
	}
	return false;
}
function goldy_mega_header3_call_back(){
	$goldy_mega_header_layout = get_theme_mod( 'goldy_mega_header_layout','header1');
	if ( 'header3' === $goldy_mega_header_layout ) {
		return true;
	}
	return false;
}
/*function goldy_mega_social_icon_general_callback(){
	$social_icon_tab = get_theme_mod( 'social_icon_tab','general');
	if ( 'general' === $social_icon_tab ) {
		return true;
	}
	return false;
}
function goldy_mega_social_icon_design_callback(){
	$social_icon_tab = get_theme_mod( 'social_icon_tab','general');
	if ( 'design' === $social_icon_tab ) {
		return true;
	}
	return false;
}*/
function goldy_mega_sanitize_number_range( $number, $setting ) {

    $number = absint( $number );
    $atts = $setting->manager->get_control( $setting->id )->input_attrs;
    $min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
    $max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
    $step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

    // If the number is within the valid range, return it; otherwise, return the default
    return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}
function goldy_mega_topbar_content_width_call_back(){
	$goldy_mega_top_bar_width_layout = get_theme_mod( 'goldy_mega_top_bar_width_layout','content_width');
	if ( 'content_width' === $goldy_mega_top_bar_width_layout ) {
		return true;
	}
	return false;
}
function goldy_mega_scroll_callback(){
	$display_scroll_button = get_theme_mod( 'display_scroll_button',true);
	if ( true === $display_scroll_button ) {
		return true;
	}
	return false;
}
function goldy_mega_breadcrumb_call_back(){
	$goldy_mega_display_breadcrumb_section = get_theme_mod( 'goldy_mega_display_breadcrumb_section',true);
	if ( true === $goldy_mega_display_breadcrumb_section ) {
		return true;
	}
	return false;
}

function goldy_mega_custom_sanitization_callback( $value ) {
	// This pattern will check and match 3/6/8-character hex, rgb, rgba, hsl, & hsla colors.
	$pattern = '/^(\#[\da-f]{3}|\#[\da-f]{6}|\#[\da-f]{8}|rgba\(((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*,\s*){2}((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*)(,\s*(0\.\d+|1))\)|hsla\(\s*((\d{1,2}|[1-2]\d{2}|3([0-5]\d|60)))\s*,\s*((\d{1,2}|100)\s*%)\s*,\s*((\d{1,2}|100)\s*%)(,\s*(0\.\d+|1))\)|rgb\(((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*,\s*){2}((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*)|hsl\(\s*((\d{1,2}|[1-2]\d{2}|3([0-5]\d|60)))\s*,\s*((\d{1,2}|100)\s*%)\s*,\s*((\d{1,2}|100)\s*%)\))$/';
	\preg_match( $pattern, $value, $matches );
	// Return the 1st match found.
	if ( isset( $matches[0] ) ) {
		if ( is_string( $matches[0] ) ) {
			return $matches[0];
		}
		if ( is_array( $matches[0] ) && isset( $matches[0][0] ) ) {
			return $matches[0][0];
		}
	}
	// If no match was found, return an empty string.
	return '';
}

if ( ! function_exists( 'goldy_mega_site_layout' ) ) :
    function goldy_mega_site_layout() {
        $goldy_mega_site_layout = array(
            'no_sidebar'  => get_template_directory_uri() . '/assets/images/full.png',
            'left_sidebar'  => get_template_directory_uri() . '/assets/images/left.png',
            'right_sidebar'  => get_template_directory_uri() . '/assets/images/right.png',
        );

        $output = apply_filters( 'goldy_mega_site_layout', $goldy_mega_site_layout );
        return $output;
    }
endif;

function goldy_mega_call_menu_btn_callback(){
	$goldy_mega_call_menu_btn = get_theme_mod( 'goldy_mega_call_menu_btn',true);
	if ( true === $goldy_mega_call_menu_btn ) {
		return true;
	}
	return false;
}

function goldy_mega_sanitize_text( $string ) {
	$allowedtags = array(
		'a' => array(
			'href' => array (),
			'target' => array(),
			'title' => array (),
			'class' => array(),
		),
		'div' => array(
			'class' => array (),
		),
		'em' => array(),
		'i' => array(),
		'b' => array(),
		'strong' => array(),
		'p' => array(),
		'br' => array(),
		'hr' => array(),
	);

	return wp_kses( $string , $allowedtags );
}
function goldy_mega_slider_general_call_back(){
	$featuredimage_slider_tab = get_theme_mod( 'featuredimage_slider_tab','general');
	if ( 'general' === $featuredimage_slider_tab ) {
		return true;
	}
	return false;
}
function goldy_mega_slider_design_call_back(){
	$featuredimage_slider_tab = get_theme_mod( 'featuredimage_slider_tab','general');
	if ( 'design' === $featuredimage_slider_tab ) {
		return true;
	}
	return false;
}
function goldy_mega_featured_section_general_call_back(){
	$featured_section_tab = get_theme_mod( 'featured_section_tab','general');
	if ( 'general' === $featured_section_tab ) {
		return true;
	}
	return false;
}
function goldy_mega_featured_section_design_call_back(){
	$featured_section_tab = get_theme_mod( 'featured_section_tab','design');
	if ( 'design' === $featured_section_tab ) {
		return true;
	}
	return false;
}
function goldy_mega_about_layout1_call_back(){
	$about_section_layouts = get_theme_mod( 'about_section_layouts','layout2');
	if ( 'layout1' === $about_section_layouts ) {
		return true;
	}
	return false;
}
function goldy_mega_about_layout2_call_back(){
	$about_section_layouts = get_theme_mod( 'about_section_layouts','layout2');
	if ( 'layout2' === $about_section_layouts ) {
		return true;
	}
	return false;
}
function goldy_mega_portfolio_general_callback(){
	$our_portfolio_section_tab = get_theme_mod( 'our_portfolio_section_tab','general');
	if ( 'general' === $our_portfolio_section_tab ) {
		return true;
	}
	return false;
}
function goldy_mega_portfolio_design_callback(){
	$our_portfolio_section_tab = get_theme_mod( 'our_portfolio_section_tab','design');
	if ( 'design' === $our_portfolio_section_tab ) {
		return true;
	}
	return false;
}
function goldy_mega_services_general_callback(){
	$our_services_tab = get_theme_mod( 'our_services_tab','general');
	if ( 'general' === $our_services_tab ) {
		return true;
	}
	return false;
}
function goldy_mega_services_design_callback(){
	$our_services_tab = get_theme_mod( 'our_services_tab','design');
	if ( 'design' === $our_services_tab ) {
		return true;
	}
	return false;
}
function goldy_mega_team_general_callback(){
	$our_team_section_tab = get_theme_mod( 'our_team_section_tab','general');
	if ( 'general' === $our_team_section_tab ) {
		return true;
	}
	return false;
}
function goldy_mega_team_design_callback(){
	$our_team_section_tab = get_theme_mod( 'our_team_section_tab','design');
	if ( 'design' === $our_team_section_tab ) {
		return true;
	}
	return false;
}
function goldy_mega_testimonial_general_callback(){
	$our_testimonial_section_tab = get_theme_mod( 'our_testimonial_section_tab','general');
	if ( 'general' === $our_testimonial_section_tab ) {
		return true;
	}
	return false;
}
function goldy_mega_testimonial_design_callback(){
	$our_testimonial_section_tab = get_theme_mod( 'our_testimonial_section_tab','design');
	if ( 'design' === $our_testimonial_section_tab ) {
		return true;
	}
	return false;
}
function goldy_mega_sponsors_general_callback(){
	$our_sponsors_tab = get_theme_mod( 'our_sponsors_tab','general');
	if ( 'general' === $our_sponsors_tab ) {
		return true;
	}
	return false;
}
function goldy_mega_sponsors_design_callback(){
	$our_sponsors_tab = get_theme_mod( 'our_sponsors_tab','design');
	if ( 'design' === $our_sponsors_tab ) {
		return true;
	}
	return false;
}
function goldy_mega_social_icon_general_callback(){
	$social_icon_tab = get_theme_mod( 'social_icon_tab','general');
	if ( 'general' === $social_icon_tab ) {
		return true;
	}
	return false;
}
function goldy_mega_social_icon_design_callback(){
	$social_icon_tab = get_theme_mod( 'social_icon_tab','general');
	if ( 'design' === $social_icon_tab ) {
		return true;
	}
	return false;
}