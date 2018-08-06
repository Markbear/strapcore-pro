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
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="entry-content">
					<?php
					the_content();
					
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'strapcore-pro' ),
						'after'  => '</div>',
					) );
					?>
				</div><!-- .entry-content -->
			</div>
		</div>
	</div>
	
</article><!-- #post-<?php the_ID(); ?> -->
