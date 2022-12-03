<?php
/**
 * The header for our theme
 *
 * @subpackage Architecture Building
 * @since 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}
?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'architecture-building' ); ?></a>
	
	<div id="page" class="site">
		<div id="header">
			<?php if( get_theme_mod('architecture_building_top_discount_text') != '' || get_theme_mod('architecture_building_top_phone_number') != '' || get_theme_mod('architecture_building_top_timing') != '' ){ ?>
				<div class="top_bar py-2">
					<div class="container">
						<div class="row">
							<div class="col-lg-5 col-md-3 col-sm-3 align-self-center">
								<div class="linksbox">
									<?php if( get_theme_mod('architecture_building_facebook') != ''){ ?>
										<a href="<?php echo esc_url(get_theme_mod('architecture_building_facebook','')); ?>"><i class="fab fa-facebook-f mr-3"></i></a>
									<?php }?>
									<?php if( get_theme_mod('architecture_building_twitter') != ''){ ?>
										<a href="<?php echo esc_url(get_theme_mod('architecture_building_twitter','')); ?>"><i class="fab fa-twitter mr-3"></i></a>
									<?php }?>
									<?php if( get_theme_mod('architecture_building_linkdin') != ''){ ?>
										<a href="<?php echo esc_url(get_theme_mod('architecture_building_linkdin','')); ?>"><i class="fab fa-linkedin-in mr-3"></i></a>
									<?php }?>
									<?php if( get_theme_mod('architecture_building_youtube') != ''){ ?>
										<a href="<?php echo esc_url(get_theme_mod('architecture_building_youtube','')); ?>"><i class="fab fa-youtube mr-3"></i></a>
									<?php }?>
									<?php if( get_theme_mod('architecture_building_instagram') != ''){ ?>
										<a href="<?php echo esc_url(get_theme_mod('architecture_building_instagram','')); ?>"><i class="fab fa-instagram"></i></a>
									<?php }?>
								</div>
							</div>
							<div class="col-lg-7 col-md-9 col-sm-9 align-self-center text-center text-md-right">
								<?php if( get_theme_mod('architecture_building_top_email_address') != '' ){ ?>
									<span class="mr-3"><i class="fas fa-envelope mr-2"></i><?php echo esc_html(get_theme_mod('architecture_building_top_email_address','')); ?></span>
								<?php }?>
								<?php if( get_theme_mod('architecture_building_top_phone_number') != '' ){ ?>
									<span class="mr-3"><i class="fas fa-phone mr-2"></i><?php echo esc_html(get_theme_mod('architecture_building_top_phone_number','')); ?></span>
								<?php }?>
								<?php if( get_theme_mod('architecture_building_top_location') != '' ){ ?>
									<span><i class="fas fa-map-marker-alt mr-2"></i><?php echo esc_html(get_theme_mod('architecture_building_top_location','')); ?></span>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
			<?php }?>
			<div class="wrap_figure">
				<div class="menu_header py-2">
					<div class="container">
						<div class="row">
							<div class="col-lg-3 col-md-4 col-sm-4 col-9 align-self-center mb-2 mb-md-0">
								<div class="logo py-3 py-lg-0">
							        <?php if ( has_custom_logo() ) : ?>
					            		<?php the_custom_logo(); ?>
						            <?php endif; ?>
					              	<?php $blog_info = get_bloginfo( 'name' ); ?>
						                <?php if ( ! empty( $blog_info ) ) : ?>
						                  	<?php if ( is_front_page() && is_home() ) : ?>
						                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						                  	<?php else : ?>
					                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					                  		<?php endif; ?>
						                <?php endif; ?>
						                <?php
					                  		$description = get_bloginfo( 'description', 'display' );
						                  	if ( $description || is_customize_preview() ) :
						                ?>
					                  	<p class="site-description">
					                    	<?php echo esc_html($description); ?>
					                  	</p>
					              	<?php endif; ?>
							    </div>
							</div>
							<div class="col-lg-9 col-md-8 col-sm-8 col-3 align-self-center">
								<?php if(has_nav_menu('primary')){?>
									<div class="toggle-menu gb_menu text-md-right">
										<button onclick="architecture_building_gb_Menu_open()" class="gb_toggle p-2"><i class="fas fa-ellipsis-h"></i><p class="mb-0"><?php esc_html_e('Menu','architecture-building'); ?></p></button>
									</div>
								<?php }?>
				   				<?php get_template_part('template-parts/navigation/navigation'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>