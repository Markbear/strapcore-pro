<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Strapcore-Pro
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$strapcore_comment_count = get_comments_number();
			if ( '1' === $strapcore_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'strapcore-pro' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $strapcore_comment_count, 'comments title', 'strapcore-pro' ) ),
					number_format_i18n( $strapcore_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<div class="comment-navigation">
			<?php strapcore_comments_navigation(); ?>
		</div>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
				'callback'    => 'strapcore_comment',
			) );
			?>
		</ol><!-- .comment-list -->

		<?php
		//the_comments_navigation();
		strapcore_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'strapcore-pro' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().
	
	    $req = get_option( 'require_name_email' );
	    $aria_req = ( $req ? " aria-required='true'" : '' );

		$comments_args = array(
			// change the title of send button 
			'label_submit'=>'Submit Comment',
			// change the title of the reply section
			'title_reply'=>'Leave a Comment',
			// remove "Text or HTML to be displayed after the set of comment fields"
			'comment_notes_after' => '',
			// redefine your own textarea (the comment body)
			'comment_field' => ' <div class="form-group"><label for="comment">' . _x( 'Comment', 'strapcore-pro' ) . '</label><textarea class="form-control" rows="10" id="comment" name="comment" aria-required="true"></textarea></div>',

			'fields' => apply_filters( 'comment_form_default_fields', array(

			'author' =>
			  '<div class="form-group">' .
			  '<label for="author">' . __( 'Name', 'strapcore-pro' ) . '</label> ' .
			  ( $req ? '<span class="required">*</span>' : '' ) .
			  '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
			  '" size="30"' . $aria_req . ' /></div>',

			'email' =>
			  '<div class="form-group"><label for="email">' . __( 'Email', 'strapcore-pro' ) . '</label> ' .
			  ( $req ? '<span class="required">*</span>' : '' ) .
			  '<input class="form-control" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			  '" size="30"' . $aria_req . ' /></div>',

			'url' =>
			  '<div class="form-group"><label for="url">' .
			  __( 'Website', 'strapcore-pro' ) . '</label>' .
			  '<input class="form-control" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
			  '" size="30" /></div>'
			  
			)
		  ),
		);

	comment_form($comments_args); 	?>


</div><!-- #comments -->
