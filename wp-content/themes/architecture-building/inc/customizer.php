<?php
/**
 * Architecture Building: Customizer
 *
 * @subpackage Architecture Building
 * @since 1.0
 */

function architecture_building_customize_register( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_template_directory_uri() ). '/assets/css/customizer.css');

	// Add custom control.
  	require get_parent_theme_file_path( 'inc/customize/customize_toggle.php' );

	// Register the custom control type.
	$wp_customize->register_control_type( 'Architecture_Building_Toggle_Control' );

	$wp_customize->add_section( 'architecture_building_typography_settings', array(
		'title'       => __( 'Typography', 'architecture-building' ),
		'priority'       => 24,
	) );

	$font_choices = array(
		'' => 'Select',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);

	$wp_customize->add_setting( 'architecture_building_headings_text', array(
		'sanitize_callback' => 'architecture_building_sanitize_fonts',
	));
	$wp_customize->add_control( 'architecture_building_headings_text', array(
		'type' => 'select',
		'description' => __('Select your suitable font for the headings.', 'architecture-building'),
		'section' => 'architecture_building_typography_settings',
		'choices' => $font_choices
	));

	$wp_customize->add_setting( 'architecture_building_body_text', array(
		'sanitize_callback' => 'architecture_building_sanitize_fonts'
	));
	$wp_customize->add_control( 'architecture_building_body_text', array(
		'type' => 'select',
		'description' => __( 'Select your suitable font for the body.', 'architecture-building' ),
		'section' => 'architecture_building_typography_settings',
		'choices' => $font_choices
	) );

 	$wp_customize->add_section('architecture_building_pro', array(
        'title'    => __('UPGRADE ARCHITECTURE PREMIUM', 'architecture-building'),
        'priority' => 1,
    ));
    $wp_customize->add_setting('architecture_building_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new Architecture_Building_Pro_Control($wp_customize, 'architecture_building_pro', array(
        'label'    => __('Architecture Building PREMIUM', 'architecture-building'),
        'section'  => 'architecture_building_pro',
        'settings' => 'architecture_building_pro',
        'priority' => 1,
    )));

    //theme width
	$wp_customize->add_section('architecture_building_theme_width_settings',array(
        'title' => __('Theme Width Option', 'architecture-building'),
    ) );

	$wp_customize->add_setting('architecture_building_width_options',array(
        'default' => 'full_width',
        'sanitize_callback' => 'architecture_building_sanitize_choices'
	));
	$wp_customize->add_control('architecture_building_width_options',array(
        'type' => 'select',
        'label' => __('Theme Width Option','architecture-building'),
        'section' => 'architecture_building_theme_width_settings',
        'choices' => array(
            'full_width' => __('Fullwidth','architecture-building'),
            'Container' => __('Container','architecture-building'),
            'container_fluid' => __('Container Fluid','architecture-building'),
        ),
	) );

	// Post Layouts
    $wp_customize->add_section('architecture_building_layout',array(
        'title' => __('Post Layout', 'architecture-building'),
        'description' => __( 'Change the post layout from below options', 'architecture-building' ),
        'priority' => 1
    ) );

	$wp_customize->add_setting( 'architecture_building_post_sidebar', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'architecture_building_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Architecture_Building_Toggle_Control( $wp_customize, 'architecture_building_post_sidebar', array(
		'label'       => esc_html__( 'Show Fullwidth', 'architecture-building' ),
		'section'     => 'architecture_building_layout',
		'type'        => 'toggle',
		'settings'    => 'architecture_building_post_sidebar',
	) ) );

	$wp_customize->add_setting( 'architecture_building_single_post_sidebar', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'architecture_building_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Architecture_Building_Toggle_Control( $wp_customize, 'architecture_building_single_post_sidebar', array(
		'label'       => esc_html__( 'Show Single Post Fullwidth', 'architecture-building' ),
		'section'     => 'architecture_building_layout',
		'type'        => 'toggle',
		'settings'    => 'architecture_building_single_post_sidebar',
	) ) );

    $wp_customize->add_setting('architecture_building_post_option',array(
		'default' => 'simple_post',
		'sanitize_callback' => 'architecture_building_sanitize_select'
	));
	$wp_customize->add_control('architecture_building_post_option',array(
		'label' => esc_html__('Select Layout','architecture-building'),
		'section' => 'architecture_building_layout',
		'setting' => 'architecture_building_post_option',
		'type' => 'radio',
        'choices' => array(
            'simple_post' => __('Simple Post','architecture-building'),
            'grid_post' => __('Grid Post','architecture-building'),
        ),
	));

    $wp_customize->add_setting('architecture_building_grid_column',array(
		'default' => '3_column',
		'sanitize_callback' => 'architecture_building_sanitize_select'
	));
	$wp_customize->add_control('architecture_building_grid_column',array(
		'label' => esc_html__('Grid Post Per Row','architecture-building'),
		'section' => 'architecture_building_layout',
		'setting' => 'architecture_building_grid_column',
		'type' => 'radio',
        'choices' => array(
            '1_column' => __('1','architecture-building'),
            '2_column' => __('2','architecture-building'),
            '3_column' => __('3','architecture-building'),
            '4_column' => __('4','architecture-building'),
            '5_column' => __('6','architecture-building'),
        ),
	));

	$wp_customize->add_setting( 'architecture_building_date', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'architecture_building_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Architecture_Building_Toggle_Control( $wp_customize, 'architecture_building_date', array(
		'label'       => esc_html__( 'Hide Date', 'architecture-building' ),
		'section'     => 'architecture_building_layout',
		'type'        => 'toggle',
		'settings'    => 'architecture_building_date',
	) ) );

	$wp_customize->add_setting( 'architecture_building_admin', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'architecture_building_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Architecture_Building_Toggle_Control( $wp_customize, 'architecture_building_admin', array(
		'label'       => esc_html__( 'Hide Author/Admin', 'architecture-building' ),
		'section'     => 'architecture_building_layout',
		'type'        => 'toggle',
		'settings'    => 'architecture_building_admin',
	) ) );

	$wp_customize->add_setting( 'architecture_building_comment', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'architecture_building_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Architecture_Building_Toggle_Control( $wp_customize, 'architecture_building_comment', array(
		'label'       => esc_html__( 'Hide Comment', 'architecture-building' ),
		'section'     => 'architecture_building_layout',
		'type'        => 'toggle',
		'settings'    => 'architecture_building_comment',
	) ) );

	// Top Header
    $wp_customize->add_section('architecture_building_top',array(
        'title' => __('Top Header', 'architecture-building'),
        'priority' => 1
    ) );

    $wp_customize->add_setting('architecture_building_top_email_address',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_email'
	));
	$wp_customize->add_control('architecture_building_top_email_address',array(
		'label' => esc_html__('Add Email Address','architecture-building'),
		'section' => 'architecture_building_top',
		'setting' => 'architecture_building_top_email_address',
		'type'    => 'text'
	));

	$wp_customize->add_setting('architecture_building_top_phone_number',array(
		'default' => '',
		'sanitize_callback' => 'architecture_building_sanitize_phone_number'
	)); 
	$wp_customize->add_control('architecture_building_top_phone_number',array(
		'label' => esc_html__('Add Phone Number','architecture-building'),
		'section' => 'architecture_building_top',
		'setting' => 'architecture_building_top_phone_number',
		'type'    => 'text'
	));

    $wp_customize->add_setting('architecture_building_top_location',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('architecture_building_top_location',array(
		'label' => esc_html__('Add Location','architecture-building'),
		'section' => 'architecture_building_top',
		'setting' => 'architecture_building_top_location',
		'type'    => 'text'
	));

	// Social Media
    $wp_customize->add_section('architecture_building_urls',array(
        'title' => __('Social Media', 'architecture-building'),
        'description' => __( 'Add social media links in the below feilds', 'architecture-building' ),
        'priority' => 3
    ) );
    
	$wp_customize->add_setting('architecture_building_facebook',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	)); 
	$wp_customize->add_control('architecture_building_facebook',array(
		'label' => esc_html__('Facebook URL','architecture-building'),
		'section' => 'architecture_building_urls',
		'setting' => 'architecture_building_facebook',
		'type'    => 'url'
	));

	$wp_customize->add_setting('architecture_building_twitter',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	)); 
	$wp_customize->add_control('architecture_building_twitter',array(
		'label' => esc_html__('Twitter URL','architecture-building'),
		'section' => 'architecture_building_urls',
		'setting' => 'architecture_building_twitter',
		'type'    => 'url'
	));

	$wp_customize->add_setting('architecture_building_linkdin',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	)); 
	$wp_customize->add_control('architecture_building_linkdin',array(
		'label' => esc_html__('Linkedin URL','architecture-building'),
		'section' => 'architecture_building_urls',
		'setting' => 'architecture_building_linkdin',
		'type'    => 'url'
	));

	$wp_customize->add_setting('architecture_building_youtube',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	)); 
	$wp_customize->add_control('architecture_building_youtube',array(
		'label' => esc_html__('Youtube URL','architecture-building'),
		'section' => 'architecture_building_urls',
		'setting' => 'architecture_building_youtube',
		'type'    => 'url'
	));

	$wp_customize->add_setting('architecture_building_instagram',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	)); 
	$wp_customize->add_control('architecture_building_instagram',array(
		'label' => esc_html__('Instagram URL','architecture-building'),
		'section' => 'architecture_building_urls',
		'setting' => 'architecture_building_instagram',
		'type'    => 'url'
	));

    //Slider
	$wp_customize->add_section( 'architecture_building_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'architecture-building' ),
    	'description' => __('Slider Image Dimension ( 1600px x 650px )','architecture-building'),
		'priority'   => 3,
	) );

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
	if($i==0){
	  $default = $category->slug;
	  $i++;
	}
	$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('architecture_building_post_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'architecture_building_sanitize_select',
	));
	$wp_customize->add_control('architecture_building_post_setting',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => esc_html__('Select Category to display slider images','architecture-building'),
		'section' => 'architecture_building_slider_section',
	));

	// Category Section
	$wp_customize->add_section( 'architecture_building_services_section' , array(
    	'title'      => __( 'Services Section Settings', 'architecture-building' ),
		'priority'   => 4,
	) );	

    $wp_customize->add_setting('architecture_building_services_heading',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('architecture_building_services_heading',array(
		'label'	=> esc_html__('Add Heading','architecture-building'),
		'section'	=> 'architecture_building_services_section',
		'type'		=> 'text'
	));

    $wp_customize->add_setting('architecture_building_services_heading_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('architecture_building_services_heading_text',array(
		'label'	=> esc_html__('Add Heading Text','architecture-building'),
		'section'	=> 'architecture_building_services_section',
		'type'		=> 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
	if($i==0){
	  $default = $category->slug;
	  $i++;
	}
	$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('architecture_building_services_category_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'architecture_building_sanitize_select',
	));
	$wp_customize->add_control('architecture_building_services_category_setting',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => esc_html__('Select Category to display category','architecture-building'),
		'section' => 'architecture_building_services_section',
	));

	//Footer
    $wp_customize->add_section( 'architecture_building_footer_copyright', array(
    	'title' => esc_html__( 'Footer Text', 'architecture-building' ),
    	'priority' => 6
	) );

    $wp_customize->add_setting('architecture_building_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('architecture_building_footer_text',array(
		'label'	=> esc_html__('Copyright Text','architecture-building'),
		'section'	=> 'architecture_building_footer_copyright',
		'type'		=> 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'architecture_building_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'architecture_building_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'architecture_building_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'architecture_building_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'architecture-building' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'architecture-building' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'architecture_building_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'architecture_building_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'architecture_building_customize_register' );

function architecture_building_customize_partial_blogname() {
	bloginfo( 'name' );
}
function architecture_building_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function architecture_building_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}
function architecture_building_is_view_with_layout_option() {
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

define('ARCHITECTURE_BUILDING_PRO_LINK',__('https://www.ovationthemes.com/wordpress/architecture-building-wordpress-theme/','architecture-building'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('Architecture_Building_Pro_Control')):
    class Architecture_Building_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( ARCHITECTURE_BUILDING_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE ARCHITECTURE PREMIUM','architecture-building');?> </a>
	        </div>
            <div class="col-md">
                <img class="architecture_building_img_responsive " src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png">
            </div>
	        <div class="col-md">
	            <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('ARCHITECTURE BUILDING PREMIUM - Features', 'architecture-building'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-architecture_building"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'architecture-building');?> </li>
                    <li class="upsell-architecture_building"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'architecture-building');?> </li>
                    <li class="upsell-architecture_building"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'architecture-building');?> </li>
                    <li class="upsell-architecture_building"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'architecture-building');?> </li>
                    <li class="upsell-architecture_building"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'architecture-building');?> </li>
                    <li class="upsell-architecture_building"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'architecture-building');?> </li>
                    <li class="upsell-architecture_building"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'architecture-building');?> </li>
                    <li class="upsell-architecture_building"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'architecture-building');?> </li>
                    <li class="upsell-architecture_building"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'architecture-building');?> </li>
                    <li class="upsell-architecture_building"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'architecture-building');?> </li>
                    <li class="upsell-architecture_building"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'architecture-building');?> </li>
                    <li class="upsell-architecture_building"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'architecture-building');?> </li>
                    <li class="upsell-architecture_building"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'architecture-building');?> </li>
                    <li class="upsell-architecture_building"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'architecture-building');?> </li>
                    <li class="upsell-architecture_building"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'architecture-building');?> </li>
                    <li class="upsell-architecture_building"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'architecture-building');?> </li>
                    <li class="upsell-architecture_building"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'architecture-building');?> </li>
                    <li class="upsell-architecture_building"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'architecture-building');?> </li>
                    <li class="upsell-architecture_building"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'architecture-building');?> </li>
                   	<li class="upsell-architecture_building"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'architecture-building');?> </li>
                   	<li class="upsell-architecture_building"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'architecture-building');?> </li>
                   	<li class="upsell-architecture_building"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'architecture-building');?> </li>
                   	<li class="upsell-architecture_building"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'architecture-building');?> </li>
                </ul>
        	</div>
		    <div class="col-md upsell-btn upsell-btn-bottom">
	            <a href="<?php echo esc_url( ARCHITECTURE_BUILDING_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE ARCHITECTURE PREMIUM','architecture-building');?> </a>
		    </div>
        </label>
    <?php } }
endif;