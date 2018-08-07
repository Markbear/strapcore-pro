<?php
/**
 * Displays the floating back to top link
 */
function strapcore_back_to_top() {
	echo '<a href="#" class="back-to-top"><i class="fas fa-angle-double-up"></i></a>';
}
add_action('st_before_header', 'strapcore_back_to_top');

/**
 * Displays the on-page back to top link
 */
function strapcore_simple_back_to_top() { ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h4 class="mb-4 mt-4"><a href="#" class="simple-back-to-top"><i class="fas fa-angle-double-up"></i> Back to Top</a></h4>
			</div>
		</div>
	</div>
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