<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Strapcore-Pro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php the_title( '<h1 class="entry-title mt-4 mb-3">', '</h1>' ); ?>
				<div>
			</div>
		</div>
	</header><!-- .entry-header -->
	
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<?php strapcore_post_thumbnail(); ?>
			</div>
			<div class="col-md-6">
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
