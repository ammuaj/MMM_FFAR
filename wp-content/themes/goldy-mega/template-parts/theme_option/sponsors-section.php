
<div class="our_sponsors_section">
	<div class="our_sponsors_info scroll-element js-scroll fade-in-bottom">
		<div class="our_sponsors_data">
			<div class="our_sponsors_title heading_main_title">
				<h2><?php echo esc_html(get_theme_mod( 'our_sponsors_main_title', 'Our Sponsors' )); ?></h2>
				<span class="separator"></span>
			</div>
			<div class="our_sponsors_disc">
				<p><?php echo esc_html(get_theme_mod( 'our_sponsors_main_discription')); ?></p>
			</div>
		</div>
		<div class="our_sponsors_contain">
			<div id="our_sponsors_demo" class="owl-carousel owl-theme our_sponsors_demo">
				<?php
				$our_sponsors_section_content  = get_theme_mod( 'our_sponsors_section_content',goldy_mega_get_sponsors_default());
				if ( ! empty( $our_sponsors_section_content ) ) {
					$our_sponsors_section_content = json_decode( $our_sponsors_section_content );
					foreach ( $our_sponsors_section_content as $info_item ) {
						?>
						<div class="our_sponsors_img">
							<?php if(!empty( $info_item->image_url)){
								?>
								<a href='<?php echo esc_attr($info_item->link)?>'><img src="<?php echo esc_attr($info_item->image_url)?>"></a>
								<?php
							}else{
								?>
								<a href='<?php echo esc_attr($info_item->link)?>'><img src="<?php echo esc_attr(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="The Last of us"></a>
								<?php
							} ?>
						</div>
				<?php } 
				} ?>
			</div>
		</div>
	</div>
</div>	