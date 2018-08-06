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

			<?php
			while ( have_posts() ) :
				the_post();
				
				// action hook for any content to be placed before the single post content
				do_action ( 'st_before_single_content' );

				get_template_part( 'template-parts/content', 'single' );
								
				// action hook for any content to be placed after the single post content
				do_action ( 'st_after_single_content' );

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


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
