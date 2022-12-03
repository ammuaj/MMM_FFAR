<?php
if ( ! function_exists( 'goldy_mega_breadcrumb_title' ) ) {
	function goldy_mega_breadcrumb_title() {
		
		if ( is_home() || is_front_page()):
			
			single_post_title();
			
		elseif ( is_day() ) : 
										
			printf( esc_html( 'Daily Archives: %s', 'goldy-mega' ), get_the_date() );
		
		elseif ( is_month() ) :
		
			printf( esc_html( 'Monthly Archives: %s', 'goldy-mega' ), (get_the_date( 'F Y' ) ));
			
		elseif ( is_year() ) :
		
			printf( esc_html( 'Yearly Archives: %s', 'goldy-mega' ), (get_the_date( 'Y' ) ) );
			
		elseif ( is_category() ) :
		
			printf( esc_html( 'Category Archives: %s', 'goldy-mega' ), (single_cat_title( '', false ) ));

		elseif ( is_tag() ) :
		
			printf( esc_html( 'Tag Archives: %s', 'goldy-mega' ), (single_tag_title( '', false ) ));
			
		elseif ( is_404() ) :

			printf( esc_html( 'Error 404', 'goldy-mega' ));
			
		elseif ( is_author() ) :
		
			printf( esc_html( 'Author: %s', 'goldy-mega' ), (get_the_author( '', false ) ));			
			
		elseif ( class_exists( 'woocommerce' ) ) : 
			
			if ( is_shop() ) {
				woocommerce_page_title();
			}
			
			elseif ( is_cart() ) {
				the_title();
			}
			
			elseif ( is_checkout() ) {
				the_title();
			}
			
			else {
				the_title();
			}
		else :
				the_title();
				
		endif;
	}
}

if ( ! function_exists( 'goldy_mega_breadcrumb_sections' ) ) :
	function goldy_mega_breadcrumb_sections( $selector = 'header' ) {
		get_template_part( 'template-parts/theme_option/breadcrumb_section' );
	}
endif;
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'goldy_mega_GeneratePress_Upsell_Section' ) ) {

	class goldy_mega_GeneratePress_Upsell_Section extends WP_Customize_Control {

		public $type = 'goldy_mega_ast_description';		
	    public $id = '';
		public function to_json() {
			parent::to_json();		
			$this->json['label'] = esc_html( $this->label );
			$json['id'] = $this->id;
	            return $json;
		}

		protected function render_content() {
			?>
			<h3 class="section-heading">
	            <?php echo esc_html( $this->label ); ?>      
	        </h3>
			<?php
		}
	}

}
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'goldy_mega_Customize_Transparent_Color_Control' ) ) {

	class goldy_mega_Customize_Transparent_Color_Control extends WP_Customize_Control {
	
		public $type = 'goldy_mega_alpha_color';		
		public function render_content() {
			?>
			<span class='customize-control-title'><?php echo esc_html($this->label); ?></span>
			<label>
				<input type="text" class="color-picker" data-alpha="true" data-default-color="<?php echo esc_attr( $this->settings['default']->default ); ?>" value="<?php echo esc_attr( $this->settings['default']->default ); ?>" <?php $this->link(); ?> /> 
			</label>
			<?php
		}
	}
}
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'goldy_mega_Custom_Radio_Image_Control' ) ) {
	class goldy_mega_Custom_Radio_Image_Control extends WP_Customize_Control {

		public $type = 'goldy_mega_radio_image';
		
		public function render_content() {
			if ( empty( $this->choices ) ) {
				return;
			}			
			
			$name = '_customize-radio-' . $this->id;
			?>
			<span class="customize-control-title">
				<?php echo esc_html( $this->label ); ?>
				<?php if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php endif; ?>
			</span>
			<div id="input_<?php echo esc_attr( $this->id ); ?>" class="customizer_images">
				<?php foreach ( $this->choices as $value => $label ) : ?>
						<label for="<?php echo esc_attr( $this->id ) . esc_attr( $value ); ?>">
							<input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo esc_attr( $this->id ) . esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
							<img src="<?php echo esc_html( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>" title="<?php echo esc_attr( $value ); ?>">
							</input>
						</label>
				<?php endforeach; ?>
			</div>
			<?php
		}
	}
}
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'goldy_mega_Custom_Radio_Control' ) ) {
	class goldy_mega_Custom_Radio_Control extends WP_Customize_Control {
	
		public $type = 'goldy_mega_radio_select';
		
		public function render_content() {
			if ( empty( $this->choices ) ) {
				return;
			}			
			
			$name = '_customize-radio-' . $this->id;

			?>
			<span class="customize-control-title">
				<?php echo esc_html( $this->label ); ?>
				<?php if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php endif; ?>
			</span>
			<div id="input_<?php echo esc_attr( $this->id ); ?>" class="general_design_tab">
				<?php foreach ( $this->choices as $value => $label ) : 
					?>
						<label for="<?php echo esc_attr( $this->id ) . esc_attr( $value ); ?>">
							<input class="general-design-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo esc_attr( $this->id ) . esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
							<h2><?php echo esc_html( $label ); ?></h2>
						</label>
				<?php endforeach; ?>
			</div>
			<?php
		}
	}
}
if ( ! function_exists( 'goldy_mega_breadcrumb_sections' ) ) :
	function goldy_mega_breadcrumb_sections( $selector = 'header' ) {
		get_template_part( 'template-parts/theme_option/breadcrumb_section' );
	}
endif;
if ( ! function_exists( 'goldy_mega_social_section' ) ) :
	function goldy_mega_social_section( $selector = 'header' ) {
		get_template_part( 'template-parts/top_bar/social_info' );
	}
endif;
if ( ! function_exists( 'goldy_mega_featuredimage_slider' ) ) :
	function goldy_mega_featuredimage_slider( $selector = 'header' ) {
		get_template_part( 'template-parts/theme_option/sliders_section' );
	}
endif;
if ( ! function_exists( 'goldy_mega_featured_info' ) ) :
	function goldy_mega_featured_info( $selector = 'header' ) {
		get_template_part( 'template-parts/theme_option/featured_section_info' );
	}
endif;
if ( ! function_exists( 'goldy_mega_about_section' ) ) :
	function goldy_mega_about_section( $selector = 'header' ) {
		get_template_part( 'template-parts/theme_option/about_section' );
	}
endif;
if ( ! function_exists( 'goldy_mega_portfolio_section' ) ) :
	function goldy_mega_portfolio_section( $selector = 'header' ) {
		get_template_part( 'template-parts/theme_option/portfolio_section' );
	}
endif;
if ( ! function_exists( 'goldy_mega_services_section' ) ) :
	function goldy_mega_services_section( $selector = 'header' ) {
		get_template_part( 'template-parts/theme_option/services_section' );
	}
endif;
if ( ! function_exists( 'goldy_mega_team_section' ) ) :
	function goldy_mega_team_section( $selector = 'header' ) {
		get_template_part( 'template-parts/theme_option/team_section' );
	}
endif;
if ( ! function_exists( 'goldy_mega_testimonial_section' ) ) :
	function goldy_mega_testimonial_section( $selector = 'header' ) {
		get_template_part( 'template-parts/theme_option/testimonial_section' );
	}
endif;
if ( ! function_exists( 'goldy_mega_sponsors_section' ) ) :
	function goldy_mega_sponsors_section( $selector = 'header' ) {
		get_template_part( 'template-parts/theme_option/sponsors-section' );
	}
endif;
if ( ! function_exists( 'goldy_mega_widget_section' ) ) :
	function goldy_mega_widget_section( $selector = 'header' ) {
		get_template_part( 'template-parts/theme_option/widget_section' );
	}
endif;

if ( class_exists( 'WP_Customize_Section' ) && ! class_exists( 'goldy_mega_documentation_Upsell_Section' ) ) {
   
    class goldy_mega_documentation_Upsell_Section extends WP_Customize_Section {
        
        public $type = 'goldy_mega_documentation_section';

        public $pro_url = '';

        public $pro_text = '';

        public $id = '';

        public function json() {
            $json = parent::json();
            $json['pro_text'] = $this->pro_text;
            $json['pro_url']  = esc_url( $this->pro_url );
            $json['id'] = $this->id;
            return $json;
        }
        protected function render_template() {
        	$document_link = apply_filters('goldy_mega_document_link', 'https://www.inverstheme.com/goldy-mega-documentation/');
            ?>
            <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
                <div class="titled_pro_heading">
					<label class='customize-control-title'><?php echo esc_html($this->pro_text); ?></label>
					<a href="<?php echo esc_attr($document_link);?>" class="button button-secondary alignright button_pro" target="_blank">Documentation</a>
				</div> 
            </li>   
            <?php
        }
    }
}

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Custom_Radio_Control' ) ) {
	class Custom_Radio_Control extends WP_Customize_Control {
	
		public $type = 'radio-select';
		
		public function render_content() {
			if ( empty( $this->choices ) ) {
				return;
			}			
			
			$name = '_customize-radio-' . $this->id;

			?>
			<span class="customize-control-title">
				<?php echo esc_html( $this->label ); ?>
				<?php if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php endif; ?>
			</span>
			<div id="input_<?php echo esc_attr( $this->id ); ?>" class="general_design_tab">
				<?php foreach ( $this->choices as $value => $label ) : 
					?>
						<label for="<?php echo esc_attr( $this->id ) . esc_attr( $value ); ?>">
							<input class="general-design-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo esc_attr( $this->id ) . esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
							<h2><?php echo esc_html( $label ); ?></h2>
						</label>
				<?php endforeach; ?>
			</div>
			<?php
		}
	}
}
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Custom_GeneratePress_Upsell_Section' ) ) {

	class Custom_GeneratePress_Upsell_Section extends WP_Customize_Control {

		public $type = 'ast-description';		
	    public $id = '';
		public function to_json() {
			parent::to_json();		
			$this->json['label'] = esc_html( $this->label );
			$json['id'] = $this->id;
	            return $json;
		}

		protected function render_content() {
			?>
			<h3 class="section-heading">
	            <?php echo esc_html( $this->label ); ?>      
	        </h3>
			<?php
		}
	}
}
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'hide_show_custom_ordering' ) ) {

	class hide_show_custom_ordering extends WP_Customize_Control {
	/**
	* The type of control being rendered
	*/
	public $type = 'sortable_repeater';
	/**
	* Enqueue our scripts and styles
	*/
	public function enqueue() {
		wp_enqueue_script( 'customizer_orderin_js', get_template_directory_uri() . '/assets/js/customizer_ordering.js', array(), goldy_mega_S_VERSION, true );
	}
	/**
	* Render the control in the customizer
	*/
	public function render_content() {
        ?>
         <div class="drag_and_drop_control">
                <?php if( !empty( $this->label ) ) { ?>
                	<h3 class="section-heading">
	                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	                </h3>
                <?php } ?>
                <?php if( !empty( $this->description ) ) { ?>
                    <span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                <?php } ?>
                <?php
                $custom_ordering_diseble = get_theme_mod( 'custom_ordering_diseble' );
				$custom_diseble_arr =  explode(",",$custom_ordering_diseble);
                ?>
                <ul class="sortable">
                	<?php
                	
						$valuechoices = $this->choices;
						foreach ($valuechoices as $key => $value) {
							?>
							<li class="repeater <?php echo (in_array($key, $custom_diseble_arr)?'invisibility':'');?>" value="<?php echo esc_attr($key)?>" id='<?php echo esc_attr($key)?>'>
		                        <div class="repeater-input">
		                        	<i class='dashicons dashicons-visibility visibility'></i>
		                        	<?php echo esc_attr($value); ?>
		                        </div>
		                    </li>
							<?php
					}								
					?>	
                </ul> 
            </div>
        <?php
    }
	}
}

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Customize_Upgrade_Control' ) ) {
	class Customize_Upgrade_Control extends WP_Customize_Control {
	
		public $type = 'customize-upgrade';
		
	    public $id = '';

		public function json() {
	            $json = parent::json();
	            $this->json['label']       = esc_html( $this->label );
	            $json['id'] = $this->id;
	            return $json;
	        }
		protected function render_content() {
			$theme_name = wp_get_theme();
			$upgrade_to_pro_link =  apply_filters('goldy_mega_prosectionlinks', 'https://www.inverstheme.com/theme/goldy-mega-pro/');
			?>
			<div class="customize-upgrade-pro-message" style="display:none;">
				<h4 class="customize-control-title"><?php echo wp_kses_post( 'Upgrade to <a href="'.$upgrade_to_pro_link.'" target="_blank" > '.$theme_name.' Pro </a> to be add more option ', 'goldy-mega');  esc_html_e( 'and get the other pro features.', 'goldy-mega') ?></h4>
			</div>
			<?php
		}
	}
}

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'pro_section_custom_control' ) ) {
	class pro_section_custom_control extends WP_Customize_Control {
		public $type = 'goldy_mega_pro_section';

        public $pro_url = '';
        
        public $pro_text = '';

        public $id = '';

        public function json() {
            $json = parent::json();
            $json['pro_text'] = $this->pro_text;
            $json['pro_url']  = esc_url( $this->pro_url );
            $json['id'] = $this->id;
            return $json;
        }

        protected function render_content() {
        	$upgrade_prolinks = apply_filters('goldy_mega_prosectionlinks', 'https://www.inverstheme.com/theme/goldy-mega-pro/');
        	$document_link = apply_filters('goldy_mega_document_link', 'https://www.inverstheme.com/goldy-mega-documentation/');
            ?>
            <div class="theme_info_section">
                <div class="titled_pro_heading theme_button">
					<a href="<?php echo esc_attr($upgrade_prolinks);?>" class="button button-secondary  button_pro" target="_blank">Upgrade To PRO</a>
				</div> 
				<div class="theme_documention theme_button">
					<a class="button button-secondary  button_document" href="<?php echo esc_attr($document_link);?>" target="_blank">Documentation</a>
				</div>
			</div>
            <?php
        }
	}
}

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'drag_drop_option_Control' ) ) {
	class drag_drop_option_Control extends WP_Customize_Control {
	
		public $type = 'mitco_tech_more_option';
		
	    public $id = '';
		
		public function json() {
            $json = parent::json();
            $this->json['label'] = esc_html( $this->label );
            $json['id'] = $this->id;
            return $json;
        }
		
		protected function render_content() {
			$theme_name = wp_get_theme();
			$proverslink = apply_filters('goldy_mega_prosectionlinks', 'https://www.inverstheme.com/theme/goldy-mega-pro/');
			?>
			<div class="customize-upgrade-pro-message">
				<h4 class="customize-control-title"><?php echo wp_kses_post( 'Drag & Drop Section in <a href="'.$proverslink.'" target="_blank" > '.$theme_name.' Pro </a> to be add more option ', 'goldy-mega');  esc_html_e( 'and get the other pro features.', 'goldy-mega') ?></h4>
			</div>
			<?php
		}
	}
}