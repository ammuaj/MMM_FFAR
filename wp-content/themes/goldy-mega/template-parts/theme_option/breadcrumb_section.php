<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package goldy_mega
 */

if(get_theme_mod('goldy_mega_display_breadcrumb_section',true) != ''){
	goldy_mega_breadcrumb_slider();
}
elseif(get_post_type()){	
	if(get_post_meta(get_the_ID(),'breadcrumb_select',true) == 'yes'){
		goldy_mega_breadcrumb_slider();
	}
}