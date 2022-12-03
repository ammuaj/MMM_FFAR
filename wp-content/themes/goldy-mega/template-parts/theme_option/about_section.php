
<div class="about_section_info">
	<div class="about_data">
		<?php
		if(!empty(get_theme_mod( 'about_main_title', 'About Us' ))){
			?>
			<div class="about_main_title heading_main_title">
				<h2><?php echo esc_html(get_theme_mod( 'about_main_title', 'About Us' )); ?></h2>
				<span class="separator"></span>
			</div>
			<?php
		} 
		?>	
		<div class="about_main_discription">
			<p><?php echo esc_html(get_theme_mod('about_description')); ?></p>
		</div>
		<div class="about_section_container">
			<div class="about_featured_image scroll-element js-scroll slide-left">
				<?php if(get_theme_mod( 'about_section_image')){ ?>
					<img src="<?php echo esc_attr(get_theme_mod( 'about_section_image')); ?>" alt="The Last of us">

				<?php }else{
					?>
					<img src="<?php echo esc_attr(get_template_directory_uri()); ?>/assets/images/no-thumb.jpg" alt="The Last of us">
					<?php
				} ?> 
			</div>
			<!-- Layout1 -->
			<?php
			if(get_theme_mod( 'about_section_layouts', 'layout1')=='layout1'){
				?>
				<div class="about_container_data scroll-element js-scroll slide-right">
					<div class="entry-header">
						<div class="about_title">
							<h2><?php echo esc_html(get_theme_mod( 'about_layout1_title','Hi, I Am Samantha!')); ?></h2>
						</div>
						<div class="about_sub_heading">
							<p><?php echo esc_html(get_theme_mod( 'about_layout1_subheading','Owner/Founder, Executive Coach')); ?></p>
						</div>
						<div class="about_description">
							<p><?php echo esc_html(get_theme_mod( 'about_layout1_description')); ?></p>
						</div>
						<div class="about_btn">
							<a class="buttons" href="<?php echo esc_attr(get_theme_mod( 'about_layout1_button_link','#')); ?>"><?php echo esc_html(get_theme_mod( 'about_layout1_button','Read More')); ?></a>
						</div>
					</div>
				</div>
				<?php
			}
			?>
			<!-- Layout1 -->
			<!-- Layout2 -->
			<?php 
			if(get_theme_mod( 'about_section_layouts', 'layout1')=='layout2'){
			$about_section_content  = get_theme_mod( 'about_section_content',goldy_mega_get_about_default());
			if ( ! empty( $about_section_content ) ) {
			$about_section_content = json_decode( $about_section_content );

			?>
				<div class="about_container_data scroll-element js-scroll slide-right">
					<?php foreach ( $about_section_content as $info_item ) { ?>
							<div class="about_container">
								<?php if(!empty($info_item->icon_value)){
									?>
									<div class="about_icon buttons"> 
										<i class="fa <?php echo esc_attr($info_item->icon_value);?>"></i>
									</div>	
									<?php
								} ?>											
								<div class="entry-header">
									<?php
									if(!empty($info_item->title)){
										?>
										<div class="about_title">
											<a href="<?php echo esc_attr($info_item->link); ?>"><h3><?php echo esc_html($info_item->title); ?></h3></a>
										</div>
										<?php
									}
									if(!empty($info_item->text)){
										?>
										<div class="about_sub_heading">
											<p><?php echo esc_html($info_item->text); ?></p>
										</div>
										<?php
									}
									?>
								</div>				
							</div>
					<?php } ?>
				</div>
			<?php  }} ?>
			<!-- Layout2 -->
		</div>
	</div>
</div>
		