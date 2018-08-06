<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Strapcore-Pro
 */

 
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

/*
if ( ! function_exists( 'strapcore_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
/*	function strapcore_post_thumbnail() {
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
endif;*/

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

/**
 * Single posts navigation
 */
function strapcore_post_navigation(){
	?>
	<div class="strapcore-pro-post-nav">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php previous_post_link('<button id="previous-post" class="btn btn-light">%link</button>', _x( '<i class="fas fa-arrow-circle-left"></i> %title', 'Previous post link', 'strapcore-pro' ) ); ?>
					<?php next_post_link('<button id="next-post" class="btn btn-light">%link</button>',     _x( '%title <i class="fas fa-arrow-circle-right"></i>', 'Next post link', 'strapcore-pro' ) ); ?>
				</div>
			</div>
		</div>
	</div>
	<?php
}
add_action('st_after_single_content', 'strapcore_post_navigation');

/**
 * Comments navigation
 */
function strapcore_comments_navigation(){
	?>
		<?php previous_comments_link('<button id="previous-comment" class="btn btn-light"><i class="fas fa-arrow-circle-left"></i> Newer</button>'); ?>
		<?php next_comments_link('<button id="next-comment" class="btn btn-light">Older <i class="fas fa-arrow-circle-right"></i></button>'); ?>
	<?php
}

/**
 * Author info box
 */
function strapcore_author(){
	if ( true == get_theme_mod( 'author_meta_box', true ) ) :
		// Display author bio if post isn't password protected
		if ( ! post_password_required() ) : ?>
		
		<?php if ( get_the_author_meta('description') != '' ) : ?>
				<div class="container">
					<div class="row">
						<div class="col-md-12">	
							<div class="author-meta card">
								<div class="card-body">
									<div class="media">
										<div class="">
											<?php if (function_exists('get_avatar')) { echo get_avatar( get_the_author_meta( 'ID' ), 80 ); }?>
										</div>
										<div class="media-body">
											<h5 class="card-title"><?php the_author_posts_link(); ?></h5>
											<p><?php the_author_meta('description') ?></p>
										</div>
										
									</div>
								</div>
								<div class="card-footer">
									<?php
									// Retrieve a custom field value
									$twitterHandle = get_the_author_meta('twitter'); 
									$fbHandle = get_the_author_meta('facebook');
									$gHandle = get_the_author_meta('gplus');
									$instHandle = get_the_author_meta('instagram');
									$linkHandle = get_the_author_meta('linkedin');
									?>
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
								</div>
							</div><!-- end of #author-meta -->
						</div>
					</div>
				</div>
			</div>
		<?php endif; // no description, no author's meta ?>
			
		<?php
		//end password protection check 
		endif;
	endif;
}
add_action('st_after_single_content', 'strapcore_author', 20);

/**
 * Additionlal ields added to user profile pages in the WP admin
 */
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

/**
 * Social Icons
 */
function strapcore_social_icons(){
	$facebook = get_theme_mod('facebook_social'); 
	$twitter = get_theme_mod('twitter_social'); 
	$instagram = get_theme_mod('instagram_social'); 
	$google = get_theme_mod('google_social'); 
	$linkedin = get_theme_mod('linkedin_social'); 
	?>
	<div class="social-links">
	<?php
	if( $facebook != '') : ?>
		<a href="<?php echo $facebook; ?>"><i class="fab fa-facebook-square"></i></a>
	<?php endif;
	if( $twitter != '') : ?>
		<a href="<?php echo $twitter; ?>"><i class="fab fa-twitter-square"></i></a>
	<?php endif;
	if( $instagram != '') : ?>
		<a href="<?php echo $instagram; ?>"><i class="fab fa-instagram"></i></a>
	<?php endif;
	if( $google != '') : ?>
		<a href="<?php echo $google; ?>"><i class="fab fa-google-plus-square"></i></a>
	<?php endif; 
	if( $linkedin != '') : ?>
		<a href="<?php echo $linkedin; ?>"><i class="fab fa-linkedin"></i></a>
	<?php endif; ?>
	</div>
<?php 
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

/**
 * Built in contact form to be displayed on the contact page template
 */
function strapcore_contact_form() {
	if(isset($_POST['submitted'])) {
		if(trim($_POST['contactName']) === '') {
			$nameError = true;
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}
	 
		if(trim($_POST['email']) === '')  {
			$emailError = true;
			$hasError = true;
		} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
			$emailError = true;
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
	 
		if(trim($_POST['comments']) === '') {
			$commentError = true;
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}
	 
	 
		if(!isset($hasError)) {
			$emailTo = get_option('admin_email');
			if (!isset($emailTo) || ($emailTo == '') ){
				$emailTo = get_option('admin_email');
			}
			$subject = __('From ','strapcore-pro').$name;
			$body = __('Name: ','strapcore-pro').$name."\n".__('Email: ','strapcore-pro').$email."\n".__('Comments: ','strapcore-pro').$comments;
			$headers = __('From: ','strapcore-pro') .$name. ' <'.$emailTo.'>' . "\r\n" . __('Reply-To:','strapcore-pro') .$name. '<'.$email.'>';
	 
			wp_mail($emailTo, $subject, $body, $headers);
			$emailSent = true;
		}
	 
	}
	
	if(isset($emailSent) && $emailSent == true) { ?>
		<div class="alert alert-success" role="alert">
			<?php _e('Thanks, your email was sent successfully.', 'strapcore-pro'); ?>
		</div>
	<?php } else { ?>

		<?php if(isset($hasError) || isset($captchaError)) { ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong><?php _e('Error!', 'strapcore-pro'); ?></strong> <?php _e('Please try again.', 'strapcore-pro'); ?>
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
		<?php } ?>

		<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
			<div class="form-group">
				<label class="control-label" for="contactName"><?php _e('Name', 'strapcore-pro'); ?></label>
				<input class="form-control <?php if(isset($nameError)) { echo "is-invalid"; }?>" type="text" name="contactName" id="contactName" value="<?php echo isset($_POST["contactName"]) ? $_POST["contactName"] : ''; ?>" />
				<?php if(isset($nameError)) { ?>
					<div class="invalid-feedback">
						<?php _e('Please provide a valid name.', 'strapcore-pro'); ?>
					  </div>
				<?php } ?>
		  
		   </div>
		   <div class="form-group">
				<label class="control-label" for="email"><?php _e('Email', 'strapcore-pro'); ?></label>
				<input class="form-control <?php if(isset($emailError)) { echo "is-invalid"; }?>" type="text" name="email" id="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" />
				<?php if(isset($emailError)) { ?>
					<div class="invalid-feedback">
						<?php _e('Please provide a valid email.', 'strapcore-pro'); ?>
					  </div>
				<?php } ?>
		   
		   </div>
			<div class="form-group">
				<label class="control-label" for="commentsText"><?php _e('Message', 'strapcore-pro'); ?></label>
		   
				<textarea class="form-control <?php if(isset($commentError)) { echo "is-invalid"; }?>" name="comments" id="commentsText" rows="10" cols="20"><?php echo isset($_POST["comments"]) ? $_POST["comments"] : ''; ?></textarea>
				 <?php if(isset($commentError)) { ?>
					<div class="invalid-feedback">
						<?php _e('Please provide comments.', 'strapcore-pro'); ?>
					  </div>
				<?php } ?>
			
		   </div>
		   <div class="form-actions">
				<button type="submit" class="btn btn-primary"><?php _e('Send Email', 'strapcore-pro'); ?></button>
				<input type="hidden" name="submitted" id="submitted" value="true" />
		   </div>
		</form>
	<?php }
} 