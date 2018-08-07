<?php
/**
 * Displays an optional post thumbnail without an anchor element.
 *
 */
function strapcore_page_thumbnail() { ?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->
			
<?php 
}
add_action('st_before_content', 'strapcore_page_thumbnail');

/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function strapcore_post_thumbnail() { ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
		<?php
		the_post_thumbnail( 'post-thumbnail', array(
			'alt' => the_title_attribute( array(
				'echo' => false,
			) ),
		) );
		?>
	</a>
			
<?php 
}

/**
 * Display the header image for the index. archive, search and 404 pages
 */
function strapcore_header_image(){
	if ( is_archive() ) :
		if (get_theme_mod('archive_header_image') != ''):
			$img_url = get_theme_mod('archive_header_image');
		endif;
	elseif ( is_search() ) :
		if (get_theme_mod('search_header_image') != ''):
			$img_url = get_theme_mod('search_header_image');
		endif;
	elseif ( is_404() ) :
		if (get_theme_mod('404_header_image') != ''):
			$img_url = get_theme_mod('404_header_image');
		endif;
	elseif ( is_home() ) :
		if (get_theme_mod('blog_header_image') != ''):
			$img_url = get_theme_mod('blog_header_image');	
		endif;
	endif;
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="header-img mx-auto">
				<img src="<?php echo $img_url; ?>">
			</div>	
		</div>
	</div>
	<?php	
}
add_action('st_before_content', 'strapcore_header_image');

/**
 * Index page posts navigation
 */
function strapcore_posts_navigation(){
	?>
	<div class="strapcore-pro-posts-nav">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php previous_posts_link('<button id="previous-post" class="btn btn-light"><i class="fas fa-arrow-circle-left"></i> Newer</button>'); ?>
					<?php next_posts_link('<button id="next-post" class="btn btn-light">Older <i class="fas fa-arrow-circle-right"></i></button>'); ?>
				</div>
			</div>
		</div>
	</div>
	<?php
}