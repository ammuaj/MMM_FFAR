
<div class="our_testimonial_section">
	<div class="our_testimonial_info scroll-element js-scroll fade-in-bottom">
		<div class="our_testimonial_main_title">
			<div class="testimonial_title heading_main_title">
				<h2><?php echo esc_html(get_theme_mod( 'our_testimonial_main_title', 'Our Testimonial' )); ?></h2>
				<span class="separator"></span>
			</div>
			<div class="our_testimonial_main_disc">
				<p><?php echo esc_html(get_theme_mod( 'our_testimonial_main_discription'));?></p>
			</div>
		</div>
		<div class="owl-carousel owl-theme testinomial_owl_slider" id="testinomial_owl_slider">
			<?php
			$our_testimonial_section_content  = get_theme_mod( 'our_testimonial_section_content',goldy_mega_get_testimonial_default());
			if ( ! empty( $our_testimonial_section_content ) ) {
				$our_testimonial_section_content = json_decode( $our_testimonial_section_content );
				foreach ( $our_testimonial_section_content as $info_item ) {
					?>	
					<div class="our_testimonial_data" >
						<div class="our_testimonial_data_info">
							<div class="testimonials_disc">
								<p><?php echo $info_item->text ?></p>
							</div>
							<div class="testimonials_image">
								<?php
								if(!empty($info_item->image_url)){
									?>
									<img src="<?php echo $info_item->image_url ?>" alt="">
									<?php
								}else{
									?>
									<img src="<?php echo esc_attr(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="">								
									<?php
								}
								?>
							</div>	
							<div class="our_testimonials_container">
								<h3><?php echo $info_item->title ?></h3>
								<h4><?php echo $info_item->subtitle ?></h4>
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