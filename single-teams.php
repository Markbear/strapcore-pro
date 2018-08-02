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
<div class="container-fluid">
	<div class="row">
		<div id="primary" class="full-content-area">
			<main id="main" class="site-main">
				<div class="container">
					<div class="row">
						
						<?php strapcore_breadcrumbs_pages(); ?>

						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'team' );

							//the_post_navigation();
							strapcore_post_navigation();			
							
							//strapcore_post_navigation();

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>

					</div>
				</div>
			</main><!-- #main -->
		</div>
	</div>
</div><!-- #primary -->
<?php
get_footer();
