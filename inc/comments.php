<?php
/**
 * Comment Callback
 */
function strapcore_comment( $comment, $args, $depth ) {

	$GLOBALS['comment'] = $comment; 
	?>

	<?php if ( $comment->comment_approved == '1' ): ?>
	<li>
		<div class="card">
			<div class="card-body">
				<div class="media">
					<div class="align-self-start mr-3">
						<?php echo get_avatar( $comment ); ?>
					</div>

					<div class="media-body">
						<h4 class="mt-0"><?php comment_author_link() ?></h4>
						<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
						<?php comment_text() ?>
					</div>
				</div>
			</div>
		</div>
	
	<?php endif;
}