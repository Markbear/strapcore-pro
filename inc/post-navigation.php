<?php
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