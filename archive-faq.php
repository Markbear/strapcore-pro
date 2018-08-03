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
if (get_theme_mod('faq_header_image') != ''):
	$img_url = get_theme_mod('faq_header_image'); ?>
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
					<?php if ( get_theme_mod( 'faq_heading' ) != '') :
						echo get_theme_mod('faq_heading', 'Our Services');
					endif; ?>
				</h1>
				<p class="lead text-muted">
					<?php if ( get_theme_mod( 'faq_content' ) != '') :
						echo get_theme_mod('faq_content', 'We have a range of services. Learn  more below or get in touch today.');
					endif; ?>
				</p>
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

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();