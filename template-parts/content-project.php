<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Strapcore-Pro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header my-4">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="row">
		<div class="col-md-8">
			<?php strapcore_post_thumbnail(); ?>
		</div>

		<div class="col-md-4">
			<div class="entry-content">
				<?php
				the_content( sprintf(
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
		</div>
		
		<div class="col-md-12">
			<h3 class="my-4">Related Projects</h3>
			<div class="row">
				<?php strapcore_latest_projects(); ?>
			</div>
		</div>
		
	</div>
	
</article><!-- #post-<?php the_ID(); ?> -->
