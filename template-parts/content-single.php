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
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	
	<?php strapcore_single_meta(); ?>

	<?php strapcore_post_thumbnail(); ?>

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

	<?php strapcore_single_footer(); ?>
	
	<?php strapcore_author(); ?>
	
</article><!-- #post-<?php the_ID(); ?> -->
