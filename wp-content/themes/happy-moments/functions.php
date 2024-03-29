<?php 
add_action( 'wp_enqueue_scripts', 'happy_moments_enqueue_styles' );
function happy_moments_enqueue_styles() {
	wp_enqueue_style( 'happy-moments-parent-style', get_template_directory_uri() . '/style.css' ); 
} 

function happy_moments_customize_preview_js() {
	wp_enqueue_script( 'happy-moments-customizer', get_stylesheet_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '1', true );
}
add_action( 'customize_preview_init', 'happy_moments_customize_preview_js' );

function happy_moments_google_fonts() {
	wp_enqueue_style( 'happy-moments-google-fonts', '//fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap', false ); 
}
add_action( 'wp_enqueue_scripts', 'happy_moments_google_fonts' );


require_once( get_stylesheet_directory() . '/inc/custom-header.php' );


function happy_moments_customize_register( $wp_customize ) {	
		$wp_customize->add_setting( 'upperwidgets_title_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'upperwidgets_title_color', array(
		'label'       => __( 'Title Colors', 'happy-moments' ),
		'section'     => 'upper_widgets',
		'priority'   => 1,
		'settings'    => 'upperwidgets_title_color',
	) ) );
	$wp_customize->add_setting( 'upperwidgets_text_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'refresh',
	) );
		$wp_customize->add_setting( 'only_show_header_frontpage', array(
		'default' => 0,
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'only_show_header_frontpage', array(
		'label'    => __( 'Only show header image on front page', 'happy-moments' ),
		'section'  => 'header_image',
		'priority' => 1,
		'settings' => 'only_show_header_frontpage',
		'type'     => 'checkbox',
	) );
	$wp_customize->add_setting( 'header_img_text', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field',
		'capability'        => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'header_img_text', array(
		'label'    => __( "Title", 'happy-moments' ),
		'section'  => 'header_image',
		'type'     => 'text',
		'priority' => 1,
	) );
	$wp_customize->add_setting( 'header_img_text_tagline', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field',
		'capability'        => 'edit_theme_options',
	) );

	$wp_customize->add_control( 'header_img_text_tagline', array(
		'label'    => __( "Tagline", 'happy-moments' ),
		'section'  => 'header_image',
		'type'     => 'text',
		'priority' => 1,
	) );

	$wp_customize->add_setting( 'header_img_textcolor', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_img_textcolor', array(
		'label'       => __( 'Text Color', 'happy-moments' ),
		'section'     => 'header_image',
		'priority'   => 1,
		'settings'    => 'header_img_textcolor',
	) ) );
	$wp_customize->add_section( 'upper_widgets', array(
		'title'      => __('Upper Widgets','happy-moments'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
	) );
	$wp_customize->add_setting( 'upperwidgets_bg_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'upperwidgets_bg_color', array(
		'label'       => __( 'Background Colors', 'happy-moments' ),
		'section'     => 'upper_widgets',
		'priority'   => 1,
		'settings'    => 'upperwidgets_bg_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'upperwidgets_text_color', array(
		'label'       => __( 'Text Colors', 'happy-moments' ),
		'section'     => 'upper_widgets',
		'priority'   => 1,
		'settings'    => 'upperwidgets_text_color',
	) ) );
	$wp_customize->add_setting( 'upperwidgets_link_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'upperwidgets_link_color', array(
		'label'       => __( 'Link Colors', 'happy-moments' ),
		'section'     => 'upper_widgets',
		'priority'   => 1,
		'settings'    => 'upperwidgets_link_color',
	) ) );
	$wp_customize->add_setting( 'upperwidgets_border_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'upperwidgets_border_color', array(
		'label'       => __( 'Border Colors', 'happy-moments' ),
		'section'     => 'upper_widgets',
		'priority'   => 1,
		'settings'    => 'upperwidgets_border_color',
	) ) );




}
add_action( 'customize_register', 'happy_moments_customize_register', 999 );




if(! function_exists('happy_moments_customize_register_output' ) ):
	function happy_moments_customize_register_output(){
		?>

		<style type="text/css">

		.content-wrapper .post-data-text .about-the-author-byline, .single .post-data-text .about-the-author-byline{ color: <?php echo esc_attr(get_theme_mod( 'happy_moments_abouttheauthor_color')); ?>; }
		a.read-more-btn{ background: <?php echo esc_attr(get_theme_mod( 'happy_moments_readmore_bg')); ?>; }
		a.read-more-btn{ color: <?php echo esc_attr(get_theme_mod( 'happy_moments_readmore_text')); ?>; }
		body, .site, .swidgets-wrap h3, .post-data-text { background: <?php echo esc_attr(get_theme_mod( 'website_background_color')); ?>; }
		.site-title a, .site-description { color: <?php echo esc_attr(get_theme_mod( 'header_logo_color')); ?>; }
		.sheader { background-color: <?php echo esc_attr(get_theme_mod( 'header_background_color')); ?> !important; }
		.main-navigation ul li a, .main-navigation ul li .sub-arrow, .super-menu .toggle-mobile-menu,.toggle-mobile-menu:before, .mobile-menu-active .smenu-hide { color: <?php echo esc_attr(get_theme_mod( 'navigation_text_color')); ?>; }
		#smobile-menu.show .main-navigation ul ul.children.active, #smobile-menu.show .main-navigation ul ul.sub-menu.active, #smobile-menu.show .main-navigation ul li, .smenu-hide.toggle-mobile-menu.menu-toggle, #smobile-menu.show .main-navigation ul li, .primary-menu ul li ul.children li, .primary-menu ul li ul.sub-menu li, .primary-menu .pmenu, .super-menu { border-color: <?php echo esc_attr(get_theme_mod( 'navigation_border_color')); ?>; border-bottom-color: <?php echo esc_attr(get_theme_mod( 'navigation_border_color')); ?>; }
		#secondary .widget h3, #secondary .widget h3 a, #secondary .widget h4, #secondary .widget h1, #secondary .widget h2, #secondary .widget h5, #secondary .widget h6, #secondary .widget h4 a { color: <?php echo esc_attr(get_theme_mod( 'sidebar_headline_color')); ?>; }
		#secondary .widget a, #secondary a, #secondary .widget li a , #secondary span.sub-arrow{ color: <?php echo esc_attr(get_theme_mod( 'sidebar_link_color')); ?>; }
		#secondary, #secondary .widget, #secondary .widget p, #secondary .widget li, .widget time.rpwe-time.published { color: <?php echo esc_attr(get_theme_mod( 'sidebar_text_color')); ?>; }
		#secondary .swidgets-wrap, #secondary .widget ul li, .featured-sidebar .search-field { border-color: <?php echo esc_attr(get_theme_mod( 'sidebar_border_color')); ?>; }
		.site-info, .footer-column-three input.search-submit, .footer-column-three p, .footer-column-three li, .footer-column-three td, .footer-column-three th, .footer-column-three caption { color: <?php echo esc_attr(get_theme_mod( 'footer_text_color')); ?>; }
		.footer-column-three h3, .footer-column-three h4, .footer-column-three h5, .footer-column-three h6, .footer-column-three h1, .footer-column-three h2, .footer-column-three h4, .footer-column-three h3 a { color: <?php echo esc_attr(get_theme_mod( 'footer_headline_color')); ?>; }
		.footer-column-three a, .footer-column-three li a, .footer-column-three .widget a, .footer-column-three .sub-arrow { color: <?php echo esc_attr(get_theme_mod( 'footer_link_color')); ?>; }
		.footer-column-three h3:after { background: <?php echo esc_attr(get_theme_mod( 'footer_border_color')); ?>; }
		.site-info, .widget ul li, .footer-column-three input.search-field, .footer-column-three input.search-submit { border-color: <?php echo esc_attr(get_theme_mod( 'footer_border_color')); ?>; }
		.site-footer { background-color: <?php echo esc_attr(get_theme_mod( 'footer_background_color')); ?>; }
		.content-wrapper h2.entry-title a, .content-wrapper h2.entry-title a:hover, .content-wrapper h2.entry-title a:active, .content-wrapper h2.entry-title a:focus, .archive .page-header h1, .blogposts-list h2 a, .blogposts-list h2 a:hover, .blogposts-list h2 a:active, .search-results h1.page-title { color: <?php echo esc_attr(get_theme_mod( 'blogfeed_headline_color')); ?>; }
		.blogposts-list .post-data-text, .blogposts-list .post-data-text a, .content-wrapper .post-data-text *{ color: <?php echo esc_attr(get_theme_mod( 'blogfeed_byline_color')); ?>; }
		.blogposts-list p { color: <?php echo esc_attr(get_theme_mod( 'blogfeed_text_color')); ?>; }
		.page-numbers li a, .blogposts-list .blogpost-button { background: <?php echo esc_attr(get_theme_mod( 'blogfeed_buttonbg_color')); ?>; }
		.page-numbers li a, .blogposts-list .blogpost-button, span.page-numbers.dots, .page-numbers.current, .page-numbers li a:hover { color: <?php echo esc_attr(get_theme_mod( 'blogfeed_buttontext_color')); ?>; }
		.archive .page-header h1, .search-results h1.page-title, .blogposts-list.fbox, span.page-numbers.dots, .page-numbers li a, .page-numbers.current { border-color: <?php echo esc_attr(get_theme_mod( 'blogfeed_border_color')); ?>; }
		.blogposts-list .post-data-divider { background: <?php echo esc_attr(get_theme_mod( 'blogfeed_border_color')); ?>; }
		.page .comments-area .comment-author, .page .comments-area .comment-author a, .page .comments-area .comments-title, .page .content-area h1, .page .content-area h2, .page .content-area h3, .page .content-area h4, .page .content-area h5, .page .content-area h6, .page .content-area th, .single  .comments-area .comment-author, .single .comments-area .comment-author a, .single .comments-area .comments-title, .single .content-area h1, .single .content-area h2, .single .content-area h3, .single .content-area h4, .single .content-area h5, .single .content-area h6, .single .content-area th, .search-no-results h1, .error404 h1 { color: <?php echo esc_attr(get_theme_mod( 'postpage_headline_color')); ?>; }
		.single .post-data-text, .page .post-data-text, .page .post-data-text a, .single .post-data-text a, .comments-area .comment-meta .comment-metadata a, .single .post-data-text * { color: <?php echo esc_attr(get_theme_mod( 'postpage_byline_color')); ?>; }
		.page .content-area p, .page article, .page .content-area table, .page .content-area dd, .page .content-area dt, .page .content-area address, .page .content-area .entry-content, .page .content-area li, .page .content-area ol, .single .content-area p, .single article, .single .content-area table, .single .content-area dd, .single .content-area dt, .single .content-area address, .single .entry-content, .single .content-area li, .single .content-area ol, .search-no-results .page-content p { color: <?php echo esc_attr(get_theme_mod( 'postpage_text_color')); ?>; }
		.single .entry-content a, .page .entry-content a, .comment-content a, .comments-area .reply a, .logged-in-as a, .comments-area .comment-respond a { color: <?php echo esc_attr(get_theme_mod( 'postpage_link_color')); ?>; }
		.comments-area p.form-submit input { background: <?php echo esc_attr(get_theme_mod( 'postpage_buttonbg_color')); ?>; }
		.error404 .page-content p, .error404 input.search-submit, .search-no-results input.search-submit { color: <?php echo esc_attr(get_theme_mod( 'postpage_text_color')); ?>; }
		.page .comments-area, .page article.fbox, .page article tr, .page .comments-area ol.comment-list ol.children li, .page .comments-area ol.comment-list .comment, .single .comments-area, .single article.fbox, .single article tr, .comments-area ol.comment-list ol.children li, .comments-area ol.comment-list .comment, .error404 main#main, .error404 .search-form label, .search-no-results .search-form label, .error404 input.search-submit, .search-no-results input.search-submit, .error404 main#main, .search-no-results section.fbox.no-results.not-found{ border-color: <?php echo esc_attr(get_theme_mod( 'postpage_border_color')); ?>; }
		.single .post-data-divider, .page .post-data-divider { background: <?php echo esc_attr(get_theme_mod( 'postpage_border_color')); ?>; }
		.single .comments-area p.form-submit input, .page .comments-area p.form-submit input { color: <?php echo esc_attr(get_theme_mod( 'postpage_buttontext_color')); ?>; }
		.bottom-header-wrapper { padding-top: <?php echo esc_attr(get_theme_mod( 'banner_img_top_padding')); ?>px; }
		.bottom-header-wrapper { padding-bottom: <?php echo esc_attr(get_theme_mod( 'banner_img_padding_bottom')); ?>px; }
		.bottom-header-wrapper { background: <?php echo esc_attr(get_theme_mod( 'imagebanner_background_color')); ?>; }
		.bottom-header-wrapper *{ color: <?php echo esc_attr(get_theme_mod( 'imagebanner_text_color')); ?>; }
		.header-widget a, .header-widget li a, .header-widget i.fa { color: <?php echo esc_attr(get_theme_mod( 'upperwidgets_link_color')); ?>; }
		.header-widget, .header-widget p, .header-widget li, .header-widget .textwidget { color: <?php echo esc_attr(get_theme_mod( 'upperwidgets_text_color')); ?>; }
		.header-widget .widget-title, .header-widget h1, .header-widget h3, .header-widget h2, .header-widget h4, .header-widget h5, .header-widget h6{ color: <?php echo esc_attr(get_theme_mod( 'upperwidgets_title_color')); ?>; }
		.header-widget.swidgets-wrap, .header-widget ul li, .header-widget .search-field { border-color: <?php echo esc_attr(get_theme_mod( 'upperwidgets_border_color')); ?>; }
		.bottom-header-title, .bottom-header-paragraph{ color: <?php echo esc_attr(get_theme_mod( 'header_img_textcolor')); ?>; }
		#secondary .widget-title-lines:after, #secondary .widget-title-lines:before { background: <?php echo esc_attr(get_theme_mod( 'sidebar_headline_color')); ?>; }
		.header-widgets-wrapper .swidgets-wrap{ background: <?php echo esc_attr(get_theme_mod( 'upperwidgets_bg_color')); ?>; }
		.top-nav-wrapper, .primary-menu .pmenu, .super-menu, #smobile-menu, .primary-menu ul li ul.children, .primary-menu ul li ul.sub-menu { background-color: <?php echo esc_attr(get_theme_mod( 'navigation_background_color')); ?>; }
		#secondary .widget li, #secondary input.search-field, #secondary div#calendar_wrap, #secondary .tagcloud, #secondary .textwidget{ background: <?php echo esc_attr(get_theme_mod( 'sidebar_bg_color')); ?>; }
		#secondary .swidget { border-color: <?php echo esc_attr(get_theme_mod( 'sidebar_border_color')); ?>; }
		.archive article.fbox, .search-results article.fbox, .blog article.fbox { background: <?php echo esc_attr(get_theme_mod( 'blogfeed_bg_color')); ?>; }
		.comments-area, .single article.fbox, .page article.fbox { background: <?php echo esc_attr(get_theme_mod( 'postpage_bg_color')); ?>; }
	</style>
<?php }
add_action( 'wp_head', 'happy_moments_customize_register_output' );
endif;
