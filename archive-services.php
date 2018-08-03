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
if (get_theme_mod('services_header_image') != ''):
	$img_url = get_theme_mod('services_header_image'); ?>
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

			<header class="page-header jumbotron text-center">
				<h1 class="page-title jumbotron-heading">
					<?php if ( get_theme_mod( 'services_heading' ) != '') :
						echo get_theme_mod('services_heading', 'Our Services');
					endif; ?>
				</h1>
				<p class="lead text-muted">
					<?php if ( get_theme_mod( 'services_content' ) != '') :
						echo get_theme_mod('services_content', 'We have a range of services. Learn  more below or get in touch today.');
					endif; ?>
				</p>
				<p>
					<?php if ( get_theme_mod( 'services_button_link' ) != '' && get_theme_mod( 'services_button' ) != '' ) :
						$link = get_theme_mod( 'services_button_link', '#' );
						$button = get_theme_mod( 'services_button', 'Contact Us' ); ?>
						<a href="<?php echo $link; ?>" class="btn btn-light my-2"><?php echo $button; ?></a>
					<?php endif; ?>
					
				</p>
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
							get_template_part( 'template-parts/content', 'services' );

						endwhile; ?>
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
