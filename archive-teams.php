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

<?php 
if (get_theme_mod('team_header_image') != ''):
	$img_url = get_theme_mod('team_header_image'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="header-img mx-auto">
				<img src="<?php echo $img_url; ?>">
			</div>
		</div>
	</div>	
<?php endif;
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		
			<?php strapcore_breadcrumbs_pages(); ?>
						
			<?php if ( have_posts() ) : ?>
			
				<header class="page-header">
					<div class="container">	
						<div class="row">
							<div class="col-md-12 mb-4">
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
							</div>
						</div>
					</div>
				</header><!-- .page-header -->
				
				<section class="page-content">
					<div class="container">	
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
				</section>
					
			<?php strapcore_posts_navigation(); ?>
					
			<?php else : ?>
					
				<div class="container">	
					<div class="row">
						<?php get_template_part( 'template-parts/content', 'none' ); ?>
					</div>
				</div>
			
			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
