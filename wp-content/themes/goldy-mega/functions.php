<?php
/**
 * goldy_mega functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package goldy_mega
 */

if ( ! defined( 'goldy_mega_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'goldy_mega_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'goldy_mega_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function goldy_mega_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on goldy_mega, use a find and replace
		 * to change 'goldy-mega' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'goldy-mega', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'goldy-mega' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'goldy_mega_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'goldy_mega_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $goldy_mega_content_width
 */
function goldy_mega_content_width() {
	$GLOBALS['goldy_mega_content_width'] = apply_filters( 'goldy_mega_content_width', 640 );
}
add_action( 'after_setup_theme', 'goldy_mega_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function goldy_mega_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'goldy-mega' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'goldy-mega' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'goldy-mega' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'goldy-mega' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'goldy-mega' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'goldy-mega' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'goldy-mega' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'goldy-mega' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 4', 'goldy-mega' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'goldy-mega' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if (is_plugin_active( 'woocommerce/woocommerce.php')) {
	//if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		register_sidebar(
			array(
				'name'          => esc_html__( 'WooCommerce Product Section', 'goldy-mega' ),
				'id'            => 'woocommerce_product',
				'description'   => esc_html__( 'Add widgets here.', 'goldy-mega' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
}
add_action( 'widgets_init', 'goldy_mega_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function goldy_mega_scripts() {
	wp_enqueue_script('jquery', false, array(), false, false);
	wp_enqueue_style( 'goldy-mega-style', get_stylesheet_uri(), array(), goldy_mega_S_VERSION );
	wp_style_add_data( 'goldy-mega-style', 'rtl', 'replace' );
	wp_enqueue_style( 'goldy-mega-fontawesome-css', esc_url(get_template_directory_uri()).'/assets/fontawesome/css/font-awesome.css' , array(), goldy_mega_S_VERSION );
	wp_enqueue_style( 'goldy-mega-theme-css', esc_url(get_template_directory_uri()).'/assets/css/theme.css' , array(), goldy_mega_S_VERSION );
	wp_enqueue_script( 'goldy-mega-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), goldy_mega_S_VERSION, true );

	wp_enqueue_style( 'goldy-mega-owl-carousel-css', esc_url(get_template_directory_uri()).'/assets/css/owl.carousel.css' , array(), goldy_mega_S_VERSION );
	wp_enqueue_style( 'goldy-mega-owl-carousel_theme-css', esc_url(get_template_directory_uri()).'/assets/css/owl.theme.css' , array(), goldy_mega_S_VERSION );	
	wp_enqueue_script( 'goldy-mega-owl-carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.js', array(), goldy_mega_S_VERSION, true );
	
	wp_enqueue_script( 'goldy-mega-custom-js', get_template_directory_uri() . '/assets/js/custom.js', array(), goldy_mega_S_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'goldy_mega_scripts' );

function goldy_mega_admin_script_style(){
	wp_enqueue_style( 'goldy-mega-admin-site-css', esc_url(get_template_directory_uri()).'/assets/css/admin_site.css' , array(), goldy_mega_S_VERSION );
	wp_enqueue_style('wp-color-picker' );
    wp_enqueue_script('wp-color-picker-alpha',  get_template_directory_uri() . '/assets/js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), '1.0.0', true );
   
    $color_picker_strings = array(
        'clear'            => __( 'Clear', 'goldy-mega' ),
        'clearAriaLabel'   => __( 'Clear color', 'goldy-mega' ),
        'defaultString'    => __( 'Default', 'goldy-mega' ),
        'defaultAriaLabel' => __( 'Select default color', 'goldy-mega' ),
        'pick'             => __( 'Select Color', 'goldy-mega' ),
        'defaultLabel'     => __( 'Color value', 'goldy-mega' ),
    );
    wp_localize_script( 'wp-color-picker-alpha', 'wpColorPickerL10n', $color_picker_strings );
    wp_enqueue_script( 'wp-color-picker-alpha' );    
}
add_action('admin_enqueue_scripts', 'goldy_mega_admin_script_style');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/customizer-css.php';

require get_template_directory() . '/inc/customizer_control.php';

require get_template_directory() . '/inc/about.php';

//require get_template_directory() . '/inc/default_setting.php';

require get_template_directory() . '/inc/customizer-repeater/inc/customizer.php';

require get_template_directory() . '/inc/extras.php';

require get_template_directory() . '/inc/wptt-webfont-loader.php';
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

function goldy_mega_breadcrumb_slider(){
	?>
	<div class="breadcrumb_info">
		<div class="breadcrumb_data">
			<section id="breadcrumb-section" class="breadcrumb-area breadcrumb-centerc">
				<div class="breadcrumb-content">
					<div class="breadcrumb-heading">
						<h1><?php  goldy_mega_breadcrumb_title();	?></h1>
					</div>
					<ol class="breadcrumb-list">
						<li>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa fa-home"></i></a>
							<?php echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;"; ?>
						</li>
						<li>
							<?php goldy_mega_breadcrumb_title();?>
						</li>
					</ol>
				</div> 
			</section>
		</div>		
	</div>
	<?php
}

// Add custom meta box
add_action("add_meta_boxes", "goldy_mega_add_sidebar_meta_box");
function goldy_mega_add_sidebar_meta_box()
{
	$post_types = get_post_type();
    add_meta_box("goldy_mega-meta-box", "Custom Meta Box","goldy_mega_sidebar_meta_box_markup", $post_types, "normal", "high", null);
}
function goldy_mega_sidebar_meta_box_markup($object){
	?>
	<table class="admin_sidebar_select">
		<tr><td><label><h2 class="custom_meta"><?php echo __( 'Breadcrumb', 'goldy-mega' ); ?></h2></label></td></tr>
	   	<tr>
	   		<td>
	   			<label for="breadcrumb_select">
	   				<input type="radio" name="breadcrumb_select" id="breadcrumb_select" value="yes" <?php if(get_post_meta($object->ID,'breadcrumb_select',true)=='yes'){echo "checked";}?>><?php echo __( 'Yes', 'goldy-mega' );?> 
	   				<input type="radio" name="breadcrumb_select" id="breadcrumb_select" value="no" <?php if(get_post_meta($object->ID,'breadcrumb_select',true)=='no'){echo "checked";}?>><?php echo __( 'No', 'goldy-mega' );?>
	   			</label>
	   		</td>
	   	</tr>
	   	<tr><td><label><h2 class="custom_meta"><?php echo __( 'Sidebar', 'goldy-mega' );?></h2></label></td></tr>
   		<tr>
	   		<td>
	   			<label for="no_sidebar">		   				
	   				<input type="radio" name="sidebar_select" id="no_sidebar" class="no_sidebar" value="no_sidebar" <?php if(get_post_meta($object->ID,'sidebar_select',true)=='no_sidebar'){echo "checked";}?>>
		   				<img src="<?php echo esc_url(get_template_directory_uri()) . '/assets/images/full.png' ?>">
		   			</input>
	   			</label>
	   			<label for="left_sidebar">
	   				<input type="radio" name="sidebar_select" id="left_sidebar" class="left_sidebar" value="left_sidebar" <?php if(get_post_meta($object->ID,'sidebar_select',true)=='left_sidebar'){echo "checked";}?>>
	   					<img src="<?php echo esc_url(get_template_directory_uri()) . '/assets/images/left.png' ?>">
	   				</input>
	   			</label>
	   			<label for="right_sidebar">			   				
	   				<input type="radio" name="sidebar_select" id="right_sidebar" class="right_sidebar" value="right_sidebar" <?php if(get_post_meta($object->ID,'sidebar_select',true)=='right_sidebar'){echo "checked";}?>>
	   					<img src="<?php echo esc_url(get_template_directory_uri()) . '/assets/images/right.png' ?>">
	   				</input>
	   			</label>			
	   		</td>
	   	</tr>
	</table>
	<?php
}
add_action( 'save_post','goldy_mega_save_sidebar_meta_box_data');
function goldy_mega_save_sidebar_meta_box_data( $post_id ) {
	
	if(isset($_REQUEST['breadcrumb_select'])){
		$breadcrumb_select = sanitize_text_field( wp_unslash($_REQUEST['breadcrumb_select'] ));
		update_post_meta($post_id,'breadcrumb_select',$breadcrumb_select);
	}
	if(isset($_REQUEST['sidebar_select'])){
		$sidebar_select = sanitize_text_field( wp_unslash($_REQUEST['sidebar_select'] ));
		update_post_meta($post_id,'sidebar_select',$sidebar_select);
	}
}

function goldy_mega_main_js() {
    wp_enqueue_script( 'goldy-mega-main-js', get_theme_file_uri( '/assets/js/custom.js' ), array(), '1.0', true );
    // Localize the script with new data and pass php variables to JS.
    $main_js_data = array(
        'img_autoplay' => esc_attr(get_theme_mod('featured_slider_autoplay', 'true')),
        'img_autoplayspped' => esc_attr(get_theme_mod('featured_slider_autoplay_speed','1000')),
        'img_autoplaytimeout' => esc_attr(get_theme_mod('featured_slider_autoplay_timeout','5000')),

        'autoplay' => esc_attr(get_theme_mod('our_testimonial_slider_autoplay', 'true')),
        'autoplayspped' => esc_attr(get_theme_mod('our_testimonial_slider_autoplay_speed','1000')),
        'autoplaytimeout' => esc_attr(get_theme_mod('our_testimonial_autoplay_timeout','5000')),

        'sponsor_autoplay' => esc_attr(get_theme_mod('our_sponsors_slider_autoplay', 'true')),
        'sponsor_autoplayspped' => esc_attr(get_theme_mod('our_sponsors_slider_autoplay_speed','1000')),
        'sponsor_autoplaytimeout' => esc_attr(get_theme_mod('our_sponsors_autoplay_timeout','5000')),
    );
    wp_localize_script( 'goldy-mega-main-js', 'goldy_mega_main_vars', $main_js_data );
}
add_action( 'wp_enqueue_scripts', 'goldy_mega_main_js' );
