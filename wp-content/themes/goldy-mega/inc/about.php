<?php

function goldy_mega_about_menu() {
	add_theme_page( esc_html__( 'About Theme', 'goldy-mega' ), esc_html__( 'About Theme', 'goldy-mega' ), 'edit_theme_options', 'goldy_mega-about', 'goldy_mega_about_display' );
}
add_action( 'admin_menu', 'goldy_mega_about_menu' );

function goldy_mega_about_display(){
	?>
	<div class="goldy_mega_about_data">
		<div class="goldy_mega_about_title">
			<h1><?php echo esc_html( 'Welcome to Goldy Mega Pro!', 'goldy-mega' ); ?></h1>
			<div class="goldy_mega_about_theme">
				<div class="goldy_mega_about_description">
					<p>
						<?php echo esc_html( 'Goldy Mega theme is a clean, professional and modern multipurpose business WordPress theme with a high-quality look that helps to make a beautiful website for each firm, company, and industry. Easy and powerful customization is one of the best features of Goldy Mega. Goldy Mega in awesome features like Social Icon, Featured Slider, Our Services, About Section, Our Team,Featured Section, Testimonial Slider, Our Sponsors, Sticky Header and any eCommerce business need. All of these highly-customizable features and sections are completely responsive and absolutely easy to customize. It supports high-resolution photography and renders the image beautifully on the screen.', 'goldy-mega'); 
						?>							
					</p>				
				</div>
				<div class="goldy_mega_about_image">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png">
				</div> 
			</div>
			<div class="goldy_mega_about_demo">
				<div class="feature-section">
					<div class="about_data_goldy_mega">
						<h3><?php echo esc_html( 'Documentation', 'goldy-mega' ); ?></h3>
						<p><?php echo esc_html( 'Getting started with a new theme can be difficult, But its installation and customization is so easy', 'goldy-mega' ); ?></p>
						<a href="https://www.inverstheme.com/goldy-mega-documentation/"><?php echo esc_html( 'Read Documentation', 'goldy-mega' ); ?></a>
					</div>
				</div>
				<div class="feature-section">
					<div class="about_data_goldy_mega">
						<h3><?php echo esc_html( 'Free Theme Demo', 'goldy-mega' ); ?></h3>
						<p><?php echo esc_html( 'You can check free theme demo before setup your website if you like demo then install theme', 'goldy-mega' ); ?></p>
						<a href="https://inverstheme.com/themedemo/goldy-mega/"><?php echo esc_html( 'Free Theme Demo ', 'goldy-mega' ); ?></a>
					</div>
				</div>
				<div class="feature-section">
					<div class="about_data_goldy_mega">
						<h3><?php echo esc_html( 'Free VS Pro', 'goldy-mega' ); ?></h3>
						<p><?php echo esc_html( 'You can check compare free version and pro version.', 'goldy-mega' ); ?></p>
						<a href="https://www.inverstheme.com/theme/goldy-mega-pro/"><?php echo esc_html( 'Compare free Vs Pro ', 'goldy-mega' ); ?></a>
					</div>
				</div>
			</div>
		</div>
		<ul class="tabs">
			<li class="tab-link current" data-tab="about"><?php echo esc_html( 'About', 'goldy-mega' ); ?></li>
		</ul> 
		<div id="about" class="tab-content current">
			<div class="about_section">
				<div class="about_info_data theme_info">
					<div class="about_theme_title">
						<h2><?php echo esc_html( 'Theme Customizer', 'goldy-mega' ); ?></h2>
					</div>
					<div class="about_theme_data">
						<p><?php echo esc_html( 'All Theme Options are available via Customize screen.', 'goldy-mega' ); ?></p>
					</div>
					<div class="about_theme_btn">
						<a class="customize_btn button button-primary" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"><?php echo esc_html( 'Customize', 'goldy-mega' ); ?></a>
					</div>
				</div>
				<div class="theme_que theme_info">
					<div class="about_theme_que">
						<h2><?php echo esc_html( 'Got theme support question?', 'goldy-mega' ); ?></h2>
					</div>
					<div class="about_que_data">
						<p><?php echo esc_html( 'Get genuine support from genuine people. Whether it is customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'goldy-mega' ); ?></p>
					</div>
					<div class="about_que_btn">
						<a class="support_forum button button-primary" href="https://inverstheme.com/contact-us/"><?php echo esc_html( 'Support Forum', 'goldy-mega' ); ?></a>
					</div>
				</div>
			</div>			
		</div>
	</div>
	<?php
}