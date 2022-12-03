<?php
/**
 * SKT Resort Theme Customizer
 *
 * @package SKT Resort
 */
 
function skt_resort_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'skt_resort_custom_header_args', array(
		'default-text-color'     => '949494',
		'width'                  => 1600,
		'height'                 => 230,
		'wp-head-callback'       => 'skt_resort_header_style',
 		'default-text-color' => false,
 		'header-text' => false,
	) ) );
}
add_action( 'after_setup_theme', 'skt_resort_custom_header_setup' );
if ( ! function_exists( 'skt_resort_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see skt_resort_custom_header_setup().
 */
function skt_resort_header_style() {
	?>    
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() ) :
	?>
		.header {
			background: url(<?php echo esc_url(get_header_image()); ?>) no-repeat;
			background-position: center top;
			background-size:cover;
		}
	<?php endif; ?>	
	</style>
	<?php
}
endif; // skt_resort_header_style 

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */ 
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
function skt_resort_customize_register( $wp_customize ) {
	//Add a class for titles
    class skt_resort_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#25bdc1',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => esc_html__('Color Scheme','skt-resort'),			
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	$wp_customize->add_setting('header_bg_color',array(
			'default'	=> '#000000',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'header_bg_color',array(
			'label' => esc_html__('Header Background Color','skt-resort'),				
			'section' => 'colors',
			'settings' => 'header_bg_color'
	))
	);
	
	$wp_customize->add_setting('header_bg_color_opacity',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('header_bg_color_opacity',array(
			'label' => esc_html__('[This Option Work When Header Transparent Option On]Heder Background Color Opacity Add Value In Format : 0.1 to 1','skt-resort'),				
			'section' => 'colors',
			'settings' => 'header_bg_color_opacity'
	));
	
	$wp_customize->add_setting('footer_bg_color',array(
			'default'	=> '#181818',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'footer_bg_color',array(
			'label' => esc_html__('Footer Background Color','skt-resort'),				
			'section' => 'colors',
			'settings' => 'footer_bg_color'
		))
	);	

		$wp_customize->add_setting('footer_text_color',array(
			'default'	=> '#ffffff',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'footer_text_color',array(
			'label' => esc_html__('Footer Text Color','skt-resort'),				
			'section' => 'colors',
			'settings' => 'footer_text_color'
		))
	);	
	
	$wp_customize->add_section('header_phone_number',array(
			'title'	=> esc_html__('Header Phone Number','skt-resort'),					
			'priority'		=> null
	));
	
	$wp_customize->add_setting('header_phonenumbertext',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('header_phonenumbertext',array(
			'label'	=> esc_html__('Add Phone Number','skt-resort'),
			'section'	=> 'header_phone_number',
			'setting'	=> 'header_phonenumbertext'
	));	
	
	// Hide Header Phone Number
	$wp_customize->add_setting('hide_header_phonenumber',array(
			'sanitize_callback' => 'skt_resort_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'hide_header_phonenumber', array(
    	   'section'   => 'header_phone_number',    	 
		   'label'	=> esc_html__('Uncheck To Show Phone Number In Header','skt-resort'),
    	   'type'      => 'checkbox'
     )); 	
	 // Hide Header Phone Number
	 
	// Transparent Header
	$wp_customize->add_section('header_transparent',array(
			'title'	=> esc_html__('Homepage Header Transparent','skt-resort'),					
			'priority'		=> null
	));	
	
	$wp_customize->add_setting('option_header_transparent',array(
			'sanitize_callback' => 'skt_resort_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'option_header_transparent', array(
		   'section'   => 'header_transparent',    	 
		   'label'	=> esc_html__('Uncheck To Enable Transparent Header [ Kindly Set Heder Background Color Opacity Value In "Colors" Option.]','skt-resort'),
		   'type'      => 'checkbox'
	 ));	
	 // Transparent Header	
	
	// Transparent Header Inner Page Post
	$wp_customize->add_section('header_transparent_inner',array(
			'title'	=> esc_html__('Category / Archive, Inner Page & Single Post Header Transparent','skt-resort'),					
			'priority'		=> null
	));	
	
	$wp_customize->add_setting('option_inner_header_transparent',array(
			'sanitize_callback' => 'skt_resort_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'option_inner_header_transparent', array(
		   'section'   => 'header_transparent_inner',    	 
		   'label'	=> esc_html__('Uncheck To Enable Transparent Header [ Kindly Set Heder Background Color Opacity Value In "Colors" Option.]','skt-resort'),
		   'type'      => 'checkbox'
	 ));	
 	// Transparent Header Inner Page Post		 
	 
	// Inner Page Banner Settings
	$wp_customize->add_section('inner_page_banner',array(
			'title'	=> esc_html__('Inner Page Banner Settings','skt-resort'),					
			'priority'		=> null
	));	
	
	$wp_customize->add_setting('inner_page_banner_thumb',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'inner_page_banner_thumb', array(
        'section' => 'inner_page_banner',
		'label'	=> esc_html__('Upload Default Banner Image','skt-resort'),
        'settings' => 'inner_page_banner_thumb',
        'button_labels' => array(// All These labels are optional
                    'select' => 'Select Image',
                    'remove' => 'Remove Image',
                    'change' => 'Change Image',
                    )
    )));

	$wp_customize->add_setting('inner_page_banner_option',array(
			'sanitize_callback' => 'skt_resort_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'inner_page_banner_option', array(
    	   'section'   => 'inner_page_banner',    	 
		   'label'	=> esc_html__('Uncheck To Show Inner Page Banner On All Inner Pages. For Display Different Banner Image On Each Page Set Page Featured Image. Set Image Size (1400 X 450) For Better Resolution.','skt-resort'),
    	   'type'      => 'checkbox'
     ));	
	 // Inner Page Banner Settings
	 
	 
	// Inner Post Banner Settings
	$wp_customize->add_section('inner_post_banner',array(
			'title'	=> esc_html__('Category / Archive And Single Post Banner Settings','skt-resort'),					
			'priority'		=> null
	));	
	
	$wp_customize->add_setting('inner_post_banner_thumb',array(
			'default'	=> null,

			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'inner_post_banner_thumb', array(
        'section' => 'inner_post_banner',
		'label'	=> esc_html__('Upload Default Banner Image','skt-resort'),
        'settings' => 'inner_post_banner_thumb',
        'button_labels' => array(// All These labels are optional
                    'select' => 'Select Image',
                    'remove' => 'Remove Image',
                    'change' => 'Change Image',
                    )
    )));

	$wp_customize->add_setting('inner_post_banner_option',array(
			'sanitize_callback' => 'skt_resort_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'inner_post_banner_option', array(
    	   'section'   => 'inner_post_banner',    	 
		   'label'	=> esc_html__('Uncheck To Show Inner Post Banner On Category / Archive And Single Post. For Display Different Banner Image On Each Post Set Post Featured Image. Set Image Size (1400 X 450) For Better Resolution.','skt-resort'),
    	   'type'      => 'checkbox'
     ));	
	 // Inner Page Banner Settings	

	$wp_customize->add_section('footer_text_copyright',array(
			'title'	=> esc_html__('Footer','skt-resort'),				
			'priority'		=> null
	));
	
	$wp_customize->add_setting('footer_bg_image',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_bg_image', array(
        'section' => 'footer_text_copyright',
		'label'	=> esc_html__('Footer Background Image','skt-resort'),
        'settings' => 'footer_bg_image',
        'button_labels' => array(// All These labels are optional
                    'select' => 'Select Image',
                    'remove' => 'Remove Image',
                    'change' => 'Change Image',
                    )
    ))); 
	
	$wp_customize->add_setting('footer_text',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'	
	));
	$wp_customize->add_control('footer_text',array(
			'label'	=> esc_html__('Add Copyright Text Here','skt-resort'),
			'section'	=> 'footer_text_copyright',
			'setting'	=> 'footer_text'
	));		 
}
add_action( 'customize_register', 'skt_resort_customize_register' );
//Integer
function skt_resort_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}
function skt_resort_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

//setting inline css.
function skt_resort_custom_css() {
    wp_enqueue_style(
        'skt-resort-custom-style',
        get_template_directory_uri() . '/css/skt-resort-custom-style.css' 
    );
        $color = esc_html(get_theme_mod( 'color_scheme' ));
		$headerbgcolor = esc_html(get_theme_mod( 'header_bg_color' )); 
		$footerbgcolor = esc_html(get_theme_mod( 'footer_bg_color' ));
		$footertextcolor = esc_html(get_theme_mod( 'footer_text_color' )); 
		$headerbgconvert = esc_html(skt_resort_hex2rgb($headerbgcolor));
		$headerbgcoloropacity = esc_html(get_theme_mod( 'header_bg_color_opacity' ));
		
		$footerbg = esc_html(get_theme_mod('footer_bg_image'));
		
		$header_trans = esc_html(get_theme_mod('option_header_transparent', 1));
		$header_trans_inner = esc_html(get_theme_mod('option_inner_header_transparent', 1));
		$opacitytext = $headerbgcoloropacity; 
		if($headerbgcoloropacity ==''){$opacitytext=esc_html('0.3');}

		if(!is_home() && is_front_page() && $header_trans == ''|| (!is_home() && $header_trans_inner ==''))
			{
				if(is_search()){
					$transbg = $headerbgcolor;
				}
				else{
					$transbg = "rgba(".$headerbgconvert.",".$opacitytext.")";
				}
			}
			else
			{
				$transbg = $headerbgcolor;
			}

		
		
        $custom_css = "
					#sidebar ul li a:hover,
					.blog_lists h4 a:hover,
					.recent-post h6 a:hover,
					.recent-post a:hover,
					.design-by a,
					.postmeta a:hover,
					.tagcloud a,
					.blocksbox:hover h3,
					.rdmore a,
					.main-navigation ul li:hover a, .main-navigation ul li a:focus, .main-navigation ul li a:hover, .main-navigation ul li.current-menu-item a, .main-navigation ul li.current_page_item a,
					.copyright-txt a:hover, #footermenu li.current-menu-item a, #footermenu li.current_page_item a
					{ 
						 color: {$color} !important;
					}

					.pagination .nav-links span.current, .pagination .nav-links a:hover,
					#commentform input#submit:hover,
					.wpcf7 input[type='submit'],
					input.search-submit,
					.recent-post .morebtn:hover, 
					.read-more-btn,
					.woocommerce-product-search button[type='submit'],
					.head-info-area,
					.designs-thumb,
					.hometwo-block-button,
					.aboutmore,
					.service-thumb-box,
					.view-all-btn a:hover,
					.social-icons a:hover
					{ 
					   background-color: {$color} !important;
					}

					.titleborder span:after{border-bottom-color: {$color} !important;}
					.header{background-color:{$transbg};}
					#footer{background-color: {$footerbgcolor};}
					.copyright-txt{color: {$footertextcolor} !important;}	
					.main-navigation ul ul li a:hover, .main-navigation ul ul li a:focus {background-color: {$color} !important;}
					.footerbg{background-image: url('$footerbg');}				
				";
        wp_add_inline_style( 'skt-resort-custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'skt_resort_custom_css' );          
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function skt_resort_customize_preview_js() {
	wp_enqueue_script( 'skt_resort_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'skt_resort_customize_preview_js' );