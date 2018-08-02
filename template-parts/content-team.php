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
	
	<div class="row">
		<div class="col-md-12">
			<?php strapcore_post_thumbnail(); ?>
		</div>
	</div>
	
	<div class="row">
		<header class="entry-header col-md-12">
			<?php the_title( '<h1 class="entry-title mb-4">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	</div>
	
	<div class="row">
		<div class="col-md-8">
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
		
		<div class="col-md-4">
			Team Member meta boxes
		</div>
	</div>
	
</article><!-- #post-<?php the_ID(); ?> -->
