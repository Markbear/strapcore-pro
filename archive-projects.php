<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Strapcore-Pro
 */

get_header('bootstrap');
?>

	<div class="container">
		<div class="row">
		
			<?php strapcore_breadcrumbs_pages(); ?>

			<div id="primary" class="full-content-area">
				<main id="main" class="site-main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<h1 class="page-title mb-4">
							<?php if ( get_theme_mod( 'projects_heading' ) != '') :
								echo get_theme_mod('projects_heading', 'Our Projects');
							endif; ?>
						</h1>
						<p>
							<?php if ( get_theme_mod( 'projects_content' ) != '') :
								echo get_theme_mod('projects_content', 'Looking for inspiration? Take a look at some of our latest projects.');
							endif; ?>
						</p>
					</header><!-- .page-header -->

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_type() );
	
					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

				</main><!-- #main -->
			</div><!-- #primary -->

<?php
get_footer();
