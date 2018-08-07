<?php
/**
 * Prints HTML with meta information for the current post-date/time.
 */
if ( ! function_exists( 'strapcore_posted_on' ) ) :
	
	function strapcore_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'strapcore-pro' ),
			'<i class="far fa-calendar-alt"></i><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

/**
 * Prints HTML with meta information for the current author.
 */
if ( ! function_exists( 'strapcore_posted_by' ) ) :
	
	function strapcore_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'strapcore-pro' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<i class="fas fa-user-circle"></i><span class="byline">' . $byline . '</span> '; // WPCS: XSS OK.

	}
endif;

/**
 * Displays the categories posted in
 */
if ( ! function_exists( 'strapcore_posted_in' ) ) :

	function strapcore_posted_in() {
		
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'strapcore-pro' ) );
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			printf( '<i class="fas fa-folder-open"></i><span class="cat-links">' . esc_html__( ' %1$s', 'strapcore-pro' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

	}
endif;

/**
 * Displays the tags list
 */
if ( ! function_exists( 'strapcore_posted_tags' ) ) :

	function strapcore_posted_tags() {
		
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'strapcore-pro' ) );
		if ( $tags_list ) {
			/* translators: 1: list of tags. */
			printf( '<i class="fas fa-tags"></i><span class="tags-links">' . esc_html__( 'Tagged %1$s', 'strapcore-pro' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}

	}
endif;

/**
 * Displays the edit post link
 */
if ( ! function_exists( 'strapcore_posted_edit' ) ) :

	function strapcore_posted_edit() {
		
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="sr-only">%s</span>', 'strapcore-pro' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<i class="fas fa-edit"></i><span class="edit-link">',
			'</span>'
		);

	}
endif;

/**
 * Displays comment count 
 */
if ( ! function_exists( 'strapcore_posted_comments' ) ) :

	function strapcore_posted_comments() {

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<i class="fas fa-comments"></i><span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="sr-only"> on %s</span>', 'strapcore-pro' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}
	}
endif;

/**
 * Function displaying the date, author, category and comments meta data on odex pages
 */
function strapcore_blog_meta() {
	if ( true == get_theme_mod( 'blog_entry_meta', true ) ) : ?>
		<div class="card-header">
				<div class ="entry-meta">
					<?php
					strapcore_posted_on();
					strapcore_posted_by();
					strapcore_posted_in();
					strapcore_posted_comments();
					?>
				</div>
		</div>
	<?php endif; 
}

/**
 * Function displaying the tags and edit post link at the footer on index pages
 */
function strapcore_blog_footer() {
	if ( true == get_theme_mod( 'blog_footer', true ) ) : ?>
		<div class="card-footer text-muted">
			<div class ="entry-meta">
				<?php
				strapcore_posted_tags();
				strapcore_posted_edit();
				?>
			</div>
		</div>
	<?php endif; 
}

/**
 * Function displaying the date, author, category and comments meta data on single posts
 */
function strapcore_single_meta() {
	if ( true == get_theme_mod( 'single_entry_meta', true ) ) : ?>
		<div class="entry-meta">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php
						strapcore_posted_on();
						strapcore_posted_by();
						strapcore_posted_in();
						strapcore_posted_comments();
						?>
					</div>
				</div>
			</div>
		</div><!-- .entry-meta -->
	<?php endif; 
}
add_action('st_before_single_content', 'strapcore_single_meta', 20);

/**
 * Function displaying the tags and edit post link at the footer on single posts
 */
function strapcore_single_footer() {
	if ( true == get_theme_mod( 'single_entry_footer', true ) ) : ?>
		<footer class="entry-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php
						strapcore_posted_tags();
						strapcore_posted_edit();
						?>
					</div>
				</div>
			</div>
		</footer><!-- .entry-footer -->
	<?php endif; 
}
add_action('st_after_single_content', 'strapcore_single_footer');