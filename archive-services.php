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

					<?php the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

				</main><!-- #main -->
			</div><!-- #primary -->

<?php
get_footer();
