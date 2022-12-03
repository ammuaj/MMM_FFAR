<?php
//about theme info
add_action( 'admin_menu', 'skt_resort_abouttheme' );
function skt_resort_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'skt-resort'), esc_html__('About Theme', 'skt-resort'), 'edit_theme_options', 'skt_resort_guide', 'skt_resort_mostrar_guide');   
} 
//guidline for about theme
function skt_resort_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<div class="wrapper-info">
	<div class="col-left">
   		   <div class="col-left-area">
			  <?php esc_html_e('Theme Information', 'skt-resort'); ?>
		   </div>
          <p><?php esc_html_e('SKT Resort is lightweight flexible and extendable with easy to use Elementor based homepage sections. Can be used for hotel, lodge, home stay, motel, guest house, holiday home, inn, dormitory, bed and breakfast, villa, cottage, accommodation, farmhouse, service apartment, rooms, reservation, booking, cuisine, restaurants, eateries, street food bloggers, travel adventures diary, coffee tea shops, cafe and hospitality business like oyo, airbnb.','skt-resort'); ?></p>
          <a href="<?php echo esc_url(SKT_RESORT_SKTTHEMES_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	<div class="col-right">			
			<div class="centerbold">
				<hr />
				<a href="<?php echo esc_url(SKT_RESORT_SKTTHEMES_LIVE_DEMO); ?>" target="_blank"><?php esc_html_e('Live Demo', 'skt-resort'); ?></a> | 
				<a href="<?php echo esc_url(SKT_RESORT_SKTTHEMES_PRO_THEME_URL); ?>"><?php esc_html_e('Buy Pro', 'skt-resort'); ?></a> | 
				<a href="<?php echo esc_url(SKT_RESORT_SKTTHEMES_THEME_DOC); ?>" target="_blank"><?php esc_html_e('Documentation', 'skt-resort'); ?></a>
                <div class="space5"></div>
				<hr />                
                <a href="<?php echo esc_url(SKT_RESORT_SKTTHEMES_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>