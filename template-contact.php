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

	<div class="container">
		<div class="row">
 
		<?php strapcore_breadcrumbs_pages(); ?>

			<div id="primary" class="full-content-area">
				<main id="main" class="site-main">
		 
					<?php while ( have_posts() ) : the_post(); ?>
		 
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<header class="entry-header">
								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							</header><!-- .entry-header -->
							
							
				 
							<div class="entry-content">
								<?php the_content(); ?>
							</div><!-- .entry-content -->
		 
							<div class="row contact-form justify-content-center">
								<div class="col-md-8">
		 
									<?php strapcore_contact_form(); ?>
									
								</div><!--  .col-md-8 -->          
							</div><!--  .contact-form -->
						</article><!-- #post-## -->
						
					<?php endwhile; // end of the loop. ?>
					
				</main><!-- #main -->
			</div><!-- .container -->
 
<?php get_footer(); ?>