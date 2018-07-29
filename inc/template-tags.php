<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package StrapCore
 */

if ( ! function_exists( 'strapcore_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
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
			esc_html_x( '%s', 'post date', 'strapcore' ),
			'<i class="far fa-calendar-alt"></i><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'strapcore_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function strapcore_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'strapcore' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<i class="fas fa-user-circle"></i><span class="byline">' . $byline . '</span> '; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'strapcore_posted_in' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function strapcore_posted_in() {
		
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'strapcore' ) );
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			printf( '<i class="fas fa-folder-open"></i><span class="cat-links">' . esc_html__( ' %1$s', 'strapcore' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

	}
endif;

if ( ! function_exists( 'strapcore_posted_tags' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function strapcore_posted_tags() {
		
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'strapcore' ) );
		if ( $tags_list ) {
			/* translators: 1: list of tags. */
			printf( '<i class="fas fa-tags"></i><span class="tags-links">' . esc_html__( 'Tagged %1$s', 'strapcore' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}

	}
endif;

if ( ! function_exists( 'strapcore_posted_edit' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function strapcore_posted_edit() {
		
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="sr-only">%s</span>', 'strapcore' ),
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

if ( ! function_exists( 'strapcore_posted_comments' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function strapcore_posted_comments() {

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<i class="fas fa-comments"></i><span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="sr-only"> on %s</span>', 'strapcore' ),
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

if ( ! function_exists( 'strapcore_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function strapcore_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

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
		endif; // End is_singular().
	}
endif;

function strapcore_posts_navigation(){
	?>
	<div class="strapcore-post-nav">
		<?php previous_posts_link('<button id="previous-post" class="btn btn-light"><i class="fas fa-arrow-circle-left"></i> Newer</button>'); ?>
		<?php next_posts_link('<button id="next-post" class="btn btn-light">Older <i class="fas fa-arrow-circle-right"></i></button>'); ?>
	</div>
	<?php
}

function strapcore_post_navigation(){
	?>
	<div class="strapcore-post-nav">
		<?php previous_post_link('<button id="previous-post" class="btn btn-light">%link</button>', _x( '<i class="fas fa-arrow-circle-left"></i> %title', 'Previous post link', 'strapcore' ) ); ?>
		<?php next_post_link('<button id="next-post" class="btn btn-light">%link</button>',     _x( '%title <i class="fas fa-arrow-circle-right"></i>', 'Next post link', 'strapcore' ) ); ?>
	</div>
	<?php
}

function strapcore_comments_navigation(){
	?>
		<?php previous_comments_link('<button id="previous-comment" class="btn btn-light"><i class="fas fa-arrow-circle-left"></i> Newer</button>'); ?>
		<?php next_comments_link('<button id="next-comment" class="btn btn-light">Older <i class="fas fa-arrow-circle-right"></i></button>'); ?>
	<?php
}

function strapcore_author(){
	// Display author bio if post isn't password protected
	if ( ! post_password_required() ) : ?>
	
	<?php if ( get_the_author_meta('description') != '' ) : ?>       
		<div class="author-meta card">
			<div class="card-body">
				<div class="media">
					<div class="align-self-center">
						<?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta( 'ID' ), 80 ); }?>
					</div>
					<div class="media-body">
						<h5 class=""><?php the_author_posts_link(); ?></h5>
						<p><?php the_author_meta('description') ?></p>
						
						<?php
						// Retrieve a custom field value
						$twitterHandle = get_the_author_meta('twitter'); 
						$fbHandle = get_the_author_meta('facebook');
						$gHandle = get_the_author_meta('gplus');
						$instHandle = get_the_author_meta('instagram');
						$linkHandle = get_the_author_meta('linkedin');
						?>
						<p> 
							<?php if ( get_the_author_meta('twitter') != '' ) : ?>
							<a href="http://twitter.com/<?php echo esc_html($twitterHandle); ?>" target="_blank"><i class="fab fa-twitter-square"></i></a>
							<?php endif; // no twitter handle ?>
 
							<?php if ( get_the_author_meta('facebook') != '' ) : ?>
							<a href="<?php echo esc_url($fbHandle); ?>" target="_blank"><i class="fab fa-facebook"></i></a>
							<?php endif; // no facebook url ?>
 
							<?php if ( get_the_author_meta('gplus') != '' ) : ?>
							<a href="<?php echo esc_url($gHandle); ?>" target="_blank"><i class="fab fa-google-plus-square"></i></a>
							<?php endif; // no google+ url ?>
							
							<?php if ( get_the_author_meta('instagram') != '' ) : ?>
							<a href="<?php echo esc_url($instHandle); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
							<?php endif; // no google+ url ?>
							
							<?php if ( get_the_author_meta('linkedin') != '' ) : ?>
							<a href="<?php echo esc_url($linkHandle); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
							<?php endif; // no google+ url ?>
						</p>
					</div>
				</div>
			</div>
		</div><!-- end of #author-meta -->
	<?php endif; // no description, no author's meta ?>
		
	<?php
	//end password protection check 
	endif;
}

function strapcore_author_contact($profile_fields) {

	// Add new fields
	$profile_fields['twitter'] = 'Twitter Username';
	$profile_fields['facebook'] = 'Facebook URL';
	$profile_fields['gplus'] = 'Google+ URL';
	$profile_fields['instagram'] = 'Instagram URL';
	$profile_fields['linkedin'] = 'Linkedin URL';

	return $profile_fields;
}
add_filter('user_contactmethods', 'strapcore_author_contact');


/**
 * Custom function to highlight search terms
 */
function strapcore_search_highlight() {
    $excerpt = get_the_excerpt();
    $keys = implode('|', explode(' ', get_search_query()));
    $excerpt = preg_replace('/(' . $keys .')/iu', '<strong class="search-highlight">\0</strong>', $excerpt);

    echo '<p>' . $excerpt . '</p>';
}
