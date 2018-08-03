<?php
/**
 * Template Name: Contact Page
 *
 * This is the template that displays a contact form.
 *
 * @package stanleywp
 */
 
get_header('bootstrap'); ?>
 
<?php
 ?>
 
<?php strapcore_post_thumbnail(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		
			<?php strapcore_breadcrumbs_pages(); ?>
		 
			<?php while ( have_posts() ) : the_post(); ?>
 
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<header class="entry-header">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
								</div>
							</div>
						</div>
					</header><!-- .entry-header -->
					
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="entry-content">
									<?php the_content(); ?>
								</div><!-- .entry-content -->
							</div>
						</div>
					</div>

					<div class="container">
						<div class="row contact-form">
							<div class="col-md-8 mx-auto">
								<?php strapcore_contact_form(); ?>
							</div><!--  .col-md-8 -->          
						</div><!--  .contact-form -->
					</div>
					
				</article><!-- #post-## -->
				
			<?php endwhile; // end of the loop. ?>
					
		</main><!-- #main -->
	</div><!-- .container -->

<?php get_footer(); ?>