<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package StrapCore
 */

?>

<div class="strapcore-blog">
	<div class="card">
		<div class="card-body">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

					<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php
						strapcore_posted_on();
						strapcore_posted_by();
						strapcore_posted_in();
						strapcore_posted_comments();
						?>
					</div><!-- .entry-meta -->
					<?php endif; ?>
				</header><!-- .entry-header -->

				<?php strapcore_post_thumbnail(); ?>

				<div class="entry-summary">
					<?php strapcore_search_highlight(); ?>
				</div><!-- .entry-summary -->

				<footer class="entry-footer">
					<p>
					<?php
					strapcore_posted_tags();
					strapcore_posted_edit();
					?>
					</p>
					<p><a class="more-link" href="<?php echo esc_url( get_permalink() ); ?>"><button class="btn btn-light">Read More...</button></a></p>
				</footer><!-- .entry-footer -->
			</article><!-- #post-<?php the_ID(); ?> -->
		</div>
	</div>
</div>