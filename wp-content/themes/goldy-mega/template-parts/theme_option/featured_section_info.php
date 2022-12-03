<?php
$featured_section_content  = get_theme_mod( 'featured_section_content',goldy_mega_get_info_section_default());
if ( ! empty( $featured_section_content ) ) {
$featured_section_content = json_decode( $featured_section_content );
?>
	<div class="featured-section_data">
		<?php
		if(!empty(get_theme_mod( 'featured_section_main_title', 'Featured Section' ))){
			?>
			<div class="featured-section_title heading_main_title">
				<h2><?php echo esc_html(get_theme_mod( 'featured_section_main_title', 'Featured Section' )); ?></h2>
				<span class="separator"></span>
			</div>
			<?php
		} 
		?>	
		<div class="featured_section_discription">
			<p><?php echo esc_html(get_theme_mod('featured_section_description')); ?></p>
		</div>
	    <div id="featured-section" class="featured-section section scroll-element js-scroll fade-in-bottom">
			<div class="card-container featured_content">
			<?php 
				foreach ( $featured_section_content as $info_item ) {
					?>
					<div class="section-featured-wrep">
						<div class="featured-thumbnail"> 
							<div class="featured-icon">
								<i class="fa <?php echo esc_attr($info_item->icon_value)?>"></i>
							</div>
							<div class="featured-title"> 
								<h4>
									<?php echo esc_html($info_item->title); ?>
								</h4>
							</div>
							<div class="featured-description">
								<p><?php echo esc_html($info_item->text); ?></p>
							</div>
						</div>
					</div>
					<?php
				} ?>
			</div>
		</div>
	</div>
<?php
}