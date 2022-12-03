<?php 
/**
 * Clean Vision functions and definitions
 *
 * Clean Vision only works in WordPress 4.7 or later.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Clean Vision 
 */
class Clean_Vision {
    public function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );      
        add_action( 'customize_register', array( $this, 'site_identity_color' ), 99 );
        add_action( 'wp_head', array( $this, 'header_textcolor' ), 99 );

        require_once get_theme_file_path( 'class/customizer.php' );
        require_once get_theme_file_path( 'inc/default-change-header.php' );
        require_once get_theme_file_path( 'inc/default-change-body.php' );
    }

    /**
     * Enqueue scripts
     *
     * @static
     * @access public
     * @since  1.0.0
     * @package Clean Vision
    */
    public static function scripts() {
        wp_enqueue_style( 'clean-vision-parent-styles', get_template_directory_uri() . '/style.css' );
    } 

    /**
     * Change default site identity color
     *
     * @static
     * @access public
     * @since  1.0.0
     * @package Clean Vision
    */
    public function site_identity_color( $wp_customize ) {
        $wp_customize -> get_setting( 'header_textcolor' ) -> default = '#000';
    }

    /**
     * Get css class of site identity 
     *
     * @static
     * @access public
     * @since  1.0.0
     * @package Clean Vision
    */
    public function header_textcolor() { ?>
        <style type="text/css">
            .site-title, .site-title a, .site-description {
                color: #<?php echo esc_html( get_theme_mod( 'header_textcolor', '000' ) ); ?> !important }
        </style>
    <?php }
    }
new Clean_Vision();