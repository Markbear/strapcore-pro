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

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			
			<?php
			// action hook for any content to be placed before the archive.php content
			do_action ( 'st_before_archive_content' );
			?>
		
			<?php strapcore_breadcrumbs(); ?>

			<?php if ( have_posts() ) : ?>
			
				<header class="page-header mb-4">
					<div class="container">
						<div class="row">
							<div class="col-md-12">				
								<?php
								the_archive_title( '<h1 class="page-title">', '</h1>' );
								the_archive_description( '<div class="archive-description">', '</div>' );
								?>
							</div>
						</div>
					</div>
				</header><!-- .page-header -->

				<section class="page-content">
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
					?>
				</section>

			<?php strapcore_posts_navigation(); ?>
					
			<?php else : ?>
					
				<div class="container">	
					<div class="row">
						<?php get_template_part( 'template-parts/content', 'none' ); ?>
					</div>
				</div>
			
			<?php endif; ?>
			
			<?php
			// action hook for any content to be placed before the archive.php content
			do_action ( 'st_after_archive_content' );
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
