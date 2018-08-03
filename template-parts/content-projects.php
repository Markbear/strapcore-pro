<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Strapcore-Pro
 */

?>

<section class="strapcore-pro-projects">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<?php strapcore_post_thumbnail(); ?>
				</div>
				
				<div class="col-md-6">
					<header class="card-title entry-header">
						<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
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
						<p><a class="more-link" href="<?php echo esc_url( get_permalink() ); ?>"><button class="btn btn-light">Read More...</button></a></p>
					</footer><!-- .entry-footer -->
						
				</div>
			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->

</section>
