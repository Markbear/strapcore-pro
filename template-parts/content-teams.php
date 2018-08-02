<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Strapcore-Pro
 */

?>

<div class="col-md-4 text-center mb-4">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<div class="card">
		
			<?php strapcore_post_thumbnail(); ?>
		
			<header class="card-title entry-header">
				<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
			</header><!-- .entry-header -->
			
			<div class="entry-content">
				<?php
				the_excerpt( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="sr-only"> "%s"</span>', 'strapcore-pro' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'strapcore-pro' ),
					'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->
			
			<footer class="entry-footer">
				<p><a class="more-link" href="<?php echo esc_url( get_permalink() ); ?>"><button class="btn btn-light">Learn More</button></a></p>
			</footer><!-- .entry-footer -->
			
		</div>
		
	</article><!-- #post-<?php the_ID(); ?> -->
</div>
