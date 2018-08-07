<?php
/**
 * Displays the page or post title
 */
function strapcore_page_header() { ?>
	<header class="entry-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12 mt-4">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</div>
			</div>
		</div>
	</header><!-- .entry-header -->
<?php
}
add_action('st_before_content', 'strapcore_page_header');

/**
 * Custom function to highlight search terms
 */
function strapcore_search_highlight() {
    $excerpt = get_the_excerpt();
    $keys = implode('|', explode(' ', get_search_query()));
    $excerpt = preg_replace('/(' . $keys .')/iu', '<strong class="search-highlight">\0</strong>', $excerpt);

    echo '<p>' . $excerpt . '</p>';
}