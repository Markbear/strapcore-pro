<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package StrapCore
 */

?>

<div class="strapcore-blog">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="card">
			<div class="card-img-top">
				<?php strapcore_post_thumbnail(); ?>
			</div>
			<div class="card-header">
				<div class ="entry-meta">
					<?php
					strapcore_posted_on();
					strapcore_posted_by();
					strapcore_posted_in();
					strapcore_posted_comments();
					?>
				</div>
			</div>
			<div class="card-body">
				<header class="card-title entry-header">
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				</header><!-- .entry-header -->
				<div class="entry-content">
					<?php
					the_excerpt( sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="sr-only"> "%s"</span>', 'strapcore' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'strapcore' ),
						'after'  => '</div>',
					) );
					?>
				</div><!-- .entry-content -->
				<footer class="entry-footer">
					<p><a class="more-link" href="<?php echo esc_url( get_permalink() ); ?>"><button class="btn btn-light">Read More...</button></a></p>
				</footer><!-- .entry-footer -->
			</div>
			<div class="card-footer text-muted">
				<div class ="entry-meta">
					<?php
					strapcore_posted_tags();
					strapcore_posted_edit();
					?>
				</div>
			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
</div>
