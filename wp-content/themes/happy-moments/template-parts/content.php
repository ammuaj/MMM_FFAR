<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Happy Moments
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('posts-entry fbox blogposts-list'); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="featured-img-box">
			<a href="<?php the_permalink() ?>" class="featured-thumbnail" rel="bookmark">
				<?php esc_html(the_post_thumbnail('medium_large')); ?> 
			</a>
		<?php else : ?>
			<div class="no-featured-img-box">
			<?php endif; ?>
			<div class="content-wrapper">
				<header class="entry-header">
					<?php
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;

					if ( 'post' === get_post_type() ) : ?>
						<div class="entry-meta">
							<div class="blog-data-wrapper">
								<div class="post-data-divider"></div>
								<div class="post-data-positioning">
									<div class="post-data-text">
										<?php blogrid_posted_on(); ?>
									</div>
								</div>
							</div>
						</div><!-- .entry-meta -->
						<?php
					endif; ?>
				</header><!-- .entry-header -->

				<div class="entry-content readmore-btn-p">
					<?php
					the_excerpt( sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'happy-moments' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					) );


					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'happy-moments' ),
						'after'  => '</div>',
					) );
					?>
						<a href="<?php the_permalink() ?>" class="readmore-btn">
							Read more
						</a>

				</div><!-- .entry-content -->

			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
