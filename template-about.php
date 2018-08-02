<?php
/**
 * Template Name: About
 *
 * The template for displaying the about page.
 *
 * @package Strapcore-Pro
 */

get_header('bootstrap');
?>

<div class="container-fluid">
	<div class="row">
		<div id="primary" class="full-content-area">
			<main id="main" class="site-main">
				<div class="container">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'about' );

					endwhile; // End of the loop.
					?>
					</div>
				</div>
			</main><!-- #main -->
		</div><!-- #primary -->

<?php
get_footer();
