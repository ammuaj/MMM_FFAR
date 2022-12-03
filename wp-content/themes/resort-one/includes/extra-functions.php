<?php

/**
 * Extra functions to enhance the theme functionality
 *
 * @package Resort_One
 */

/**
 * Prints Banner Section
 *
*/
function hotell_get_banner() {
	$ed_banner       = get_theme_mod( 'ed_banner_section', 'static_banner' );
	$read_more       = get_theme_mod( 'slider_readmore' );
	$read_more_link  = get_theme_mod( 'banner_readmore_link' );
	$btn_lbl         = get_theme_mod( 'slider_btn_lbl' );
	$btn_link        = get_theme_mod( 'slider_btn_link' );
	$slider_target   = get_theme_mod( 'slider_btn_new_tab', false ) ? 'target=_blank' : '';
	$banner_title    = get_theme_mod( 'banner_title' );
	$banner_subtitle = get_theme_mod( 'banner_subtitle' );
	$caption_overlay = get_theme_mod( 'banner_caption_overlay', false );

	( $caption_overlay ) ? $overlay = ' caption-overlay' : $overlay = '';

	if ( ( $ed_banner == 'static_banner' ) && has_custom_header() ) { ?>
		<div id="banner_section" class="banner center
		<?php
		if ( has_header_video() ) {
			echo esc_attr( ' banner-video ' );}
		?>
		">
			<?php
			the_custom_header_markup();
			if ( $ed_banner == 'static_banner' && ( $banner_title || $banner_subtitle || ( $btn_lbl && $btn_link ) ) ) {
				?>
				<div class="banner__wrap">
					<div class="container">
						<div class="banner__text<?php echo esc_attr( $overlay ); ?>">
							<?php
							if ( $banner_subtitle ) {
								echo '<span class="banner__stitle">' . esc_html( $banner_subtitle ) . '</span>';
							}
							if ( $banner_title ) {
								echo '<h2 class="banner__title">' . esc_html( $banner_title ) . '</h2>';
							}
							if ( ( $btn_lbl && $btn_link ) || ( $read_more && $read_more_link ) ) {
								?>
									<div class="btn-wrap">
										<?php
										if ( $btn_lbl && $btn_link ) {
											echo '<a href="' . esc_url( $btn_link ) . '" class="btn btn-lg btn-primary"' . esc_attr( $slider_target ) . '>' . esc_html( $btn_lbl ) . '</a>';
										}
										if ( $read_more && $read_more_link ) {
											echo '<a href="' . esc_url( $read_more_link ) . '" class="btn btn-lg btn-outline btn-white"' . esc_attr( $slider_target ) . '>' . esc_html( $read_more ) . '</a>';
										}
										?>
									</div>
								<?php
							}
							?>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
		<?php
	}
}

function hotell_header() {
	$btn_lbl      = get_theme_mod( 'header_btn_lbl' );
	$btn_link     = get_theme_mod( 'header_btn_link' );
	$open_new_tab = get_theme_mod( 'header_new_tab', false );
	$new_tab      = ( $open_new_tab ) ? 'target=_blank' : '';
	$social_links = get_theme_mod( 'social_links' );
	$ed_social    = get_theme_mod( 'ed_social_links', false );
	$location     = get_theme_mod( 'header_location' );
	$email        = get_theme_mod( 'email' );
	?>

	<header id="masthead" class="site-header header-two <?php echo has_custom_header() || has_header_video() ? '' : 'no-header'; ?>" itemscope itemtype="http://schema.org/WPHeader">
		<?php if ( $location || $email || ( $ed_social && $social_links ) ) { ?>
			<div class="header-top clearfix">
				<div class="container">
					<div class="header-top-left">
						<?php hotell_header_info(); ?>
					</div>
					<div class="header-top-right">
						<?php hotell_social_links( true ); ?>
					</div>
				</div>
			</div>
		<?php } ?>
			<div class="desktop-header">
				<div class="header-bottom">
					<div class="container">
						<div class="header-wrapper">
								<?php hotell_site_branding(); ?>
							<div class="nav-wrap">
								<div class="header-left">
								<?php hotell_primary_nagivation(); ?>
								</div>
								<div class="header-right">
									<?php
									if ( $btn_lbl && $btn_link ) {
										echo '<div class="book-btn"><a href="' . esc_url( $btn_link ) . '" class="btn btn-sm btn-primary"' . esc_attr( $new_tab ) . '>' . esc_html( $btn_lbl ) . '</a></div>';}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			/**
			 * Mobile Navigation
			*/
			hotell_mobile_navigation();
			?>
	</header>
	<?php
}

/**
 * Get font face styles.
 *
 * @since 1.0.2
 *
 * @return string
 */
function hotell_get_font_face_styles() {

	return "
		@font-face{
			font-family: 'Waterfall';
			font-weight: 400;
			font-style: normal;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/Waterfall-Regular.ttf' ) . "');
		}
		";

}
