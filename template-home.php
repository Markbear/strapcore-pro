<?php
/**
 * Template Name: Home
 *
 * The template for displaying the about page.
 *
 * @package Strapcore-Pro
 */

get_header('bootstrap');
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		
			<?php
			// action hook for any content to be placed before the about page content
			do_action ( 'st_before_home_content' );
			?>
			
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'home' );

			endwhile; // End of the loop.
			?>
			
			<?php
			// action hook for any content to be placed after the about page content
			do_action ( 'st_after_home_content' );
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
