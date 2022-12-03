<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package goldy_mega
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'goldy-mega' ); ?></a>	
	
	<header id="masthead" class="site-header">
		<div class="top_header">
			<?php
				goldy_mega_social_section();
			?>
		</div>
		<div class="main_site_header">
			<div class="header_info">
				<div class="site-branding">
					<?php
					the_custom_logo();
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					else :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
					endif;
					$goldy_mega_description = get_bloginfo( 'description', 'display' );
					if ( $goldy_mega_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $goldy_mega_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->
				<div class="menu_call_button">
					<div class="call_button_info">
						<nav id="site-navigation" class="main-navigation">
							<button class="menu-toggle" id="navbar-toggle" aria-controls="primary-menu" aria-expanded="false">
								<i class="fa fa-bars"></i>
							</button>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
								)
							);
							?>
						</nav><!-- #site-navigation -->
						<div class="mobile_menu main-navigation" id="mobile_primary">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
								)
							);
							?>
							<div class="search_call_btn_info">
								<?php  if(!empty(get_theme_mod( 'goldy_mega_call_menu_btn',true))){ ?>
									<div class="header_call_btn header_nav_info">
										<a class="call_menu_btn" href="<?php echo esc_attr(get_theme_mod( 'goldy_mega_menu_btn_link','#')); ?>"><?php echo esc_html(get_theme_mod( 'goldy_mega_call_menu_btn_title','Get A Quote')); ?></a>
									</div> 	
								<?php } ?>
							</div>
							<button class="menu-toggle" id="mobilepop"  aria-expanded="false">
								<i class="fa fa-close"></i>
							</button>													
						</div>
						<div class="search_call_btn_info">
							<?php
							$is_admin = current_user_can('manage_options');  
							if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
								if(get_theme_mod( 'display_cart_icon') != '' || ( get_theme_mod( 'display_cart_icon',true)!='' && $is_admin == true)){					
									?>
									<div class="add_cart_icon header_nav_info">							
										<a href="<?php echo esc_url(wc_get_cart_url()); ?>">
											<i class="fa fa-shopping-cart" aria-hidden="true"></i>
										</a>
									</div>
								<?php 
								}
							}?>
							<?php $is_admin = current_user_can('manage_options');  
							if(get_theme_mod( 'display_search_icon') != '' || ( get_theme_mod( 'display_search_icon',true)!='' && $is_admin == true)){	
							?>
							<div id="cl_serch" class="cl_serch">
								<a href="#" id="searchlink" class="cl_res_serch_icon searchlink">	
									<i id="serche" class="fa fa-search fa-lg serche" aria-hidden="true"></i>
								</a>								
								<div class="searchform">
							        <form id="search" class="serching" action="">
								        <input type="text" class="s" id="s" name="s" placeholder="<?php echo esc_attr__('keywords...','goldy-mega'); ?>">
								        <button type="submit" class="sbtn"><i class="fa fa-search"></i></button>
							        </form>										    
						    	</div>
						    </div>
						    <?php
							}
						    $is_admin = current_user_can('manage_options');
						    if(get_theme_mod( 'goldy_mega_call_menu_btn') != '' || ( get_theme_mod( 'goldy_mega_call_menu_btn',true)!='' && $is_admin == true)){
						    	?>
								<div class="header_call_btn header_nav_info">
									<a class="call_menu_btn" href="<?php echo esc_attr(get_theme_mod( 'goldy_mega_menu_btn_link','#')); ?>"><?php echo esc_html(get_theme_mod( 'goldy_mega_call_menu_btn_title','Get A Quote')); ?></a>
								</div> 	
							<?php } ?>				
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div class="theme_section_info">
		<?php  echo esc_attr(goldy_mega_breadcrumb_sections()); ?>
		<?php
			$custom_ordering_diseble = get_theme_mod( 'custom_ordering_diseble' );
			$custom_ordering_diseble_array =  explode(",",$custom_ordering_diseble);

			$glodly_ordring = get_theme_mod( 'globalddd_ordering' );
			$glodly_sortable =  explode(",",$glodly_ordring);

			$orderarr = array('goldy_mega_featuredimage_slider','goldy_mega_services_section','goldy_mega_widget_section','goldy_mega_about_section','goldy_mega_featured_info','goldy_mega_portfolio_section','goldy_mega_testimonial_section','goldy_mega_team_section','goldy_mega_sponsors_section');
			
			$orderarr = apply_filters('goldy_mega_order_settings', $orderarr);
			$global_ordering_array = get_theme_mod( 'global_ordering',$orderarr );
			?>
			<?php
			if(is_front_page()){
				if(!empty($glodly_ordring)){
					foreach ($glodly_sortable as $glodly_sortables => $glodly_sortable_value) { 
						if(!in_array( $glodly_sortable_value, $custom_ordering_diseble_array)){
							call_user_func($glodly_sortable_value);
						}		
					}
				}elseif(!empty($global_ordering_array)){
					foreach ($global_ordering_array as $global_ordering_arraydd) { 
						if(!in_array( $global_ordering_arraydd, $custom_ordering_diseble_array)){
							call_user_func($global_ordering_arraydd);
						}		
					}
				}						
			}
		?>
	</div>
	<div class="goldy_mega_container_data">
		<?php
		if(get_post_meta(get_the_ID(),'sidebar_select',true)){
			?>
			<div class="goldy_mega_container_info <?php echo esc_attr(get_post_meta(get_the_ID(),'sidebar_select',true));?>  <?php echo esc_attr(get_theme_mod( 'goldy_mega_container_width_layout','content_width'));?> <?php echo esc_attr(get_theme_mod( 'goldy_mega_container_blog_layout','grid_view'));?>">
				<?php
		}else{
			?>
			<div class="goldy_mega_container_info <?php echo esc_attr(get_theme_mod( 'goldy_mega_post_sidebar_select_'.get_post_type(),'right_sidebar'));?> <?php echo esc_attr(get_theme_mod( 'goldy_mega_container_width_layout','content_width'));?> <?php echo esc_attr(get_theme_mod( 'goldy_mega_container_blog_layout','grid_view')); ?>">
	    <?php } 