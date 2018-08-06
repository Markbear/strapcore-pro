<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Strapcore-Pro
 */

get_header('bootstrap');
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		
			<?php
			// action hook for any content to be placed before the 404 page content
			do_action ( 'st_before_404_content' );
			?>

			<section class="error-404 not-found">
			
				<header class="page-header">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h1 class="page-title"><?php esc_html_e( '404. Sorry! The page you requested cannot be found.', 'strapcore-pro' ); ?></h1>							
							</div>
						</div>
					</div>
				</header><!-- .page-header -->
				
				

				<div class="page-content">
					
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search, one of the links below, or simply return to the Home page.', 'strapcore-pro' ); ?></p>
							</div>
						</div>
					</div>
					
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<p><a href="<?php echo get_home_url(); ?>"><button class="btn btn-light">Return to Home Page</button></a></p>
							</div>
						</div>
					</div>
					
					
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h2>Search Here</h2>
								<p><?php get_search_form(); ?></p>
							</div>
						</div>
					</div>
					
					<div class="container">
						<div class="row">
						
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="strapcore-pro-recent-posts">
											<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<div class="widget widget_categories">
											<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'strapcore-pro' ); ?></h2>
											<ul>
												<?php
												wp_list_categories( array(
													'orderby'    => 'count',
													'order'      => 'DESC',
													'show_count' => 1,
													'title_li'   => '',
													'number'     => 10,
												) );
												?>
											</ul>
										</div><!-- .widget -->
									</div>
								</div>
							</div>
							
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<?php
										/* translators: %1$s: smiley */
										$strapcore_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'strapcore-pro' ), convert_smilies( ':)' ) ) . '</p>';
										the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$strapcore_archive_content" );

										the_widget( 'WP_Widget_Tag_Cloud' );
										?>
									</div>
								</div>
							</div>
							
						</div>
					</div>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
			
			<?php
			// action hook for any content to be placed after the 404 page content
			do_action ( 'st_after_404_content' );
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
