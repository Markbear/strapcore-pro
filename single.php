<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Strapcore-Pro
 */

get_header('bootstrap');
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		
			<?php strapcore_breadcrumbs(); ?>

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'single' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) : ?>
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<?php comments_template(); ?>
							</div>
						</div>
					</div>
				<?php endif;

			endwhile; // End of the loop.
			?>

			<?php strapcore_post_navigation(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
