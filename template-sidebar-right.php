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
		
			<?php
			// action hook for any content to be placed before the page content
			do_action ( 'st_before_page_content' );
			?>

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
			
			<?php
			// action hook for any content to be placed after the page content
			do_action ( 'st_after_page_content' );
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
