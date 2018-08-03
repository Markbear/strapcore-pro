<?php
/**
 * Template Name: Sidebar Right
 *
 * The template for displaying the right sidebar page.
 *
 * @package Strapcore-Pro
 */

get_header('bootstrap');
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		
			<?php strapcore_breadcrumbs_pages(); ?>

			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'page' );

						endwhile; // End of the loop.
						?>
					</div>
					<?php get_sidebar('right'); ?>
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
