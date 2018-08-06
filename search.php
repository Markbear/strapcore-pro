<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Strapcore-Pro
 */

get_header('bootstrap');
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		
			<?php
			// action hook for any content to be placed before the search page content
			do_action ( 'st_before_search_content' );
			?>

			<?php if ( have_posts() ) : ?>

				<header class="page-header mb-4">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h1 class="page-title">
									<?php
									/* translators: %s: search query. */
									printf( esc_html__( 'Search Results for: %s', 'strapcore-pro' ), '<span>' . get_search_query() . '</span>' );
									?>
								</h1>
							</div>
						</div>
					</div>
				</header><!-- .page-header -->

				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );
				endwhile;
				?>
				
			<?php strapcore_posts_navigation(); ?>

			<?php else : ?>
					
				<div class="container">	
					<div class="row">
						<?php get_template_part( 'template-parts/content', 'none' ); ?>
					</div>
				</div>
			
			<?php endif; ?>
			
			<?php
			// action hook for any content to be placed after the search page content
			do_action ( 'st_after_search_content' );
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
