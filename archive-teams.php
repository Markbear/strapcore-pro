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

	<div class="container-fluid">
		<div class="row">
			<div id="primary" class="full-content-area">
				<main id="main" class="site-main">
					<div class="container">
						<div class="row">
							<?php strapcore_breadcrumbs_pages(); ?>
						</div>
						
					<?php if ( have_posts() ) : ?>
						
						<div class="row">
							<div class="col-md-12 mb-4">
								<header class="page-header">
									<h1 class="my-4">
										<?php if ( get_theme_mod( 'team_heading' ) != '') :
											echo get_theme_mod('team_heading', 'Our Team');
										else : 
											echo 'Our Team';
										endif; ?>
									</h1>
									<p>
										<?php if ( get_theme_mod( 'team_content' ) != '') :
											echo get_theme_mod('team_content', 'Learn more about our fantastic team below.');
										else : 
											echo 'Learn more about our fantastic team below.';
										endif; ?>
									</p>
								</header><!-- .page-header -->
							</div>
						</div>
					
						<div class="row">
							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'teams' );

							endwhile; 
							?>
						</div>
					</div>
					
					<div class="row">
						<?php the_posts_navigation(); ?>
					</div>
					
					<div class="row">
						<?php
						else :
							get_template_part( 'template-parts/content', 'none' );
						endif;
						?>
					</div>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
	</div>

<?php
get_footer();
