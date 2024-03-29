<div class="our_portfolio_info" id="our_portfolio_info">
	<div class="our_portfolio_data scroll-element js-scroll fade-in-bottom">
		<?php if(get_theme_mod('our_portfolio_main_title','Our Portfolio')){
			?>
			<div class="our_portfolio_main_title heading_main_title">
				<h2><?php echo esc_html(get_theme_mod('our_portfolio_main_title','Our Portfolio'));?></h2>
				<span class="separator"></span>
			</div>
			<?php
		} ?>
		<div class="our_portfolio_main_disc">
			<p><?php echo esc_html(get_theme_mod( 'our_portfolio_main_discription'));?></p>
		</div>		
		<div class="wrappers our_portfolio_section">
			<?php 
			$our_portfolio_section_content  = get_theme_mod( 'our_portfolio_section_content',goldy_mega_get_portfolio_default());
			if ( ! empty( $our_portfolio_section_content ) ) {
				$our_portfolio_section_content = json_decode( $our_portfolio_section_content );
				foreach ( $our_portfolio_section_content as $info_item ) {
				//print_r($info_item);		
					?>
					<div class="parent our_portfolio_caption">
						<div class="child our_portfolio_image">
							<div class="our_portfolio_container">
								<div class="protfolio_images">
									<?php if(!empty( $info_item->image_url)){ ?>
										<img src="<?php echo esc_attr($info_item->image_url); ?>" alt="The Last of us">
									<?php }else{
										?>
										<img src="<?php echo esc_attr(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="The Last of us"> 
										<?php
									} 
									?>
								</div>
								<div class="our_port_containe">
									<div class="our_portfolio_title" >
										<h3><?php echo esc_html($info_item->title);?></h3>
										<p><?php echo esc_html($info_item->subtitle); ?></p>
									</div>											
									<div class="our_portfolio_btn">
										<a href="<?php echo esc_attr($info_item->link); ?>">
											<i class="fa fa-arrow-right"></i> 
										</a>
									</div>
								</div>
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