
<div class="our_services_section">
	<div class="our_services_info scroll-element js-scroll fade-in-bottom">
		<div class="our_services_main_info">
			<div class="our_services_main_title heading_main_title">
				<h2><?php echo esc_html(get_theme_mod( 'our_services_main_title', 'Our Services' )); ?></h2>
				<span class="separator"></span>
			</div>
			<div class="our_services_main_disc">
				<p><?php echo  esc_html(get_theme_mod( 'our_services_main_discription'));?></p>
			</div>
		</div>
		<div class="our_services_section_data">
			<?php 
				$our_services_section_content  = get_theme_mod( 'our_services_section_content',goldy_mega_get_services_default());
				if ( ! empty( $our_services_section_content ) ) {
					$our_services_section_content = json_decode( $our_services_section_content );
					foreach ( $our_services_section_content as $info_item ) {
						?>
						<div class="section-services-wrep">
							<div class="our_services_icon">
								<i class="fa <?php echo esc_attr($info_item->icon_value)?>"></i>
							</div>
							<div class="our_services_container">
								<div class="our_services_title">
									<h3><a href="<?php echo esc_attr($info_item->link); ?>"><?php echo esc_html($info_item->title); ?></a></h3>
								</div>
								<div class="our_services_discription">
									<p><?php echo esc_html($info_item->text); ?></p>
								</div>
							</div>
						</div>	
						<?php
					}
				}	
			?>					
		</div>
	</div>
</div>