<?php
/**
 * Template Name: Sidebar Left
 *
 * The template for displaying the left sidebar page.
 *
 * @package StrapCore
 */

get_header('bootstrap');
get_sidebar('left');

?>

<?php strapcore_breadcrumbs_pages(); ?>

	<div id="primary" class="content-area col-lg-9">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
