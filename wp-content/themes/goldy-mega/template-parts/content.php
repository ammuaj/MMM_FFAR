<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package goldy_mega
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<figure class="post-thumbnail">
		<?php goldy_mega_post_thumbnail(); ?>
	</figure>
	<div class="main_container">
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					goldy_mega_posted_on();
					goldy_mega_posted_by();
					goldy_mega_entry_footer();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'goldy-mega' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'goldy-mega' ),
						'after'  => '</div>',
					)
				);
			?>
		</div><!-- .entry-content -->
		<?php
			if(get_theme_mod( 'goldy_mega_container_readmore_btn',true) != ''){
			?>
				<div class="read_btn">	
					<a class='read_more buttons btn btn-primary btn-like-icon' href="<?php echo esc_url( get_permalink() ); ?>">
						<?php echo esc_html(get_theme_mod( 'goldy_mega_container_readmore_btn_title','Read More') );?>
					</a>
				</div>
			<?php
			}		
		?>
	</div>

	<!-- <footer class="entry-footer">
		<?php goldy_mega_entry_footer(); ?>
	</footer> --><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
