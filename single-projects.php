<?php
/**
 * The template for displaying all single project items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Strapcore-Pro
 */

get_header('bootstrap');
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		
			<?php strapcore_breadcrumbs_pages(); ?>

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'project' );
			endwhile; // End of the loop.
			?>
			
			<?php strapcore_post_navigation(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
