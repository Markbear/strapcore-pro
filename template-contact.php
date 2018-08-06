<?php
/**
 * Template Name: Contact Page
 *
 * This is the template that displays a contact form.
 *
 * @package stanleywp
 */
 
get_header('bootstrap'); 
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		
			<?php
			// action hook for any content to be placed before the contact page content
			do_action ( 'st_before_contact_content' );
			?>
		 
			<?php while ( have_posts() ) : the_post(); ?>
 
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
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
			
			<?php
			// action hook for any content to be placed after the contact page content
			do_action ( 'st_after_contact_content' );
			?>
					
		</main><!-- #main -->
	</div><!-- .container -->

<?php get_footer(); ?>