<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Strapcore-Pro
 */

?>

<section class="strapcore-pro-faq">
	<div class="card">
		<div class="card-header" id="heading<?php the_ID(); ?>">
			<h3 class="mb-0">
				<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#post-<?php the_ID(); ?>" aria-expanded="true" aria-controls="post-<?php the_ID(); ?>">
					<header class="card-title entry-header">
						<?php the_title(); ?>
					</header><!-- .entry-header -->
				</button>
			</h3>
		</div>
					
		<div class="entry-content">
			<div id="post-<?php the_ID(); ?>" class="collapse" aria-labelledby="heading<?php the_ID(); ?>" data-parent="#accordionFAQ">
				<div class="card-body">
					<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'strapcore-pro' ),
						'after'  => '</div>',
					) );
					?>
				</div>
			</div>
		</div><!-- .entry-content -->
	</div>			
</section>
