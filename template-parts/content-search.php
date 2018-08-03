<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Strapcore-Pro
 */

?>

<div class="strapcore-pro-blog">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="card">
						<div class="card-img-top">
							<?php strapcore_post_thumbnail(); ?>
						</div>
						
						<?php strapcore_blog_meta(); ?>
						
						<div class="card-body">
							<header class="card-title entry-header">
								<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
							</header><!-- .entry-header -->
							<div class="entry-content">
								<?php
								strapcore_search_highlight();

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
						
						<?php strapcore_blog_footer(); ?>
						
					</div>
				</article><!-- #post-<?php the_ID(); ?> -->
			</div>
		</div>
	</div>
</div>