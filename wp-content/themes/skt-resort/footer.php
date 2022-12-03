<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SKT Resort
 */
$footer_text = get_theme_mod('footer_text');
$footerbg = esc_html(get_theme_mod('footer_bg_image'));
?>
<div id="footer" <?php if(!empty($footerbg)){?>class="footerbg"<?php } ?>>
<?php if ( is_active_sidebar( 'fc-1' ) || is_active_sidebar( 'fc-2' ) || is_active_sidebar( 'fc-3' ) || is_active_sidebar( 'fc-4' ) ) : ?>
<div class="footerarea">
    	<div class="container footer ftr-widg">
        	<div class="footer-row">
            <?php if ( is_active_sidebar( 'fc-1' ) ) : ?>
            <div class="cols-3 widget-column-1">  
              <?php dynamic_sidebar( 'fc-1' ); ?>
            </div><!--end .widget-column-1-->                  
    		<?php endif; ?> 
			<?php if ( is_active_sidebar( 'fc-2' ) ) : ?>
            <div class="cols-3 widget-column-2">  
            <?php dynamic_sidebar( 'fc-2' ); ?>
            </div><!--end .widget-column-2-->
            <?php endif; ?> 
			<?php if ( is_active_sidebar( 'fc-3' ) ) : ?>    
            <div class="cols-3 widget-column-3">  
            <?php dynamic_sidebar( 'fc-3' ); ?>
            </div><!--end .widget-column-3-->
			<?php endif; ?> 	
			<?php if ( is_active_sidebar( 'fc-4' ) ) : ?>    
            <div class="cols-3 widget-column-4">  
            <?php dynamic_sidebar( 'fc-4' ); ?>
            </div><!--end .widget-column-3-->
			<?php endif; ?>             	         
            <div class="clear"></div>
            </div>
        </div><!--end .container--> 
</div>
<?php endif; ?> 
<div class="copyright-area">
<div class="copyright-wrapper">
<div class="container">
     <div class="copyright-txt">
     	<?php wp_nav_menu( array('theme_location' => 'footer', 'container' => 'ul', 'menu_id' => 'footermenu', 'fallback_cb' => false) ); ?>
     	<?php if (!empty($footer_text)) { ?>
	 		<?php echo esc_html($footer_text); ?>
		<?php } else { ?>
			<?php esc_html_e('© Copyright 2022 SKT Resort. All Rights Reserved','skt-resort'); ?>
        <?php } ?>
        </div>
     <div class="clear"></div>
</div>           
</div>
</div><!--end #copyright-area-->
</div>
<?php wp_footer(); ?>
</body>
</html>