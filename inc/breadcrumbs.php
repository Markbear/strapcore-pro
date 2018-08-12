<?php
/**
 * Enable Breadcrumbs site wide
 */
function strapcore_breadcrumbs() {
	if ( true == get_theme_mod( 'enable_breadcrumbs', true ) ) :
			echo '<div class="container">';
			echo '<div class="row">';
			echo '<div class="col-md-12">';
			echo '<div class="breadcrumbs">';
			echo '<ol class="breadcrumb">';
			echo '<li class="breadcrumb-item"><a href="';
			echo get_option('home');
			echo '"><i class="fas fa-home"></i>';
			//bloginfo('name');
			echo "</a></li>";
				if (is_category() || is_single()) {
					echo '<li class="breadcrumb-item">';
					the_category(' &bull; ');
					echo '</li>';
						if (is_single()) {
							echo '<li class="breadcrumb-item">';
							the_title();
							echo '</li>';
						}
				} elseif (is_page()) {
					echo '<li class="breadcrumb-item">';
					echo the_title();
					echo '</li>';
				} elseif (is_search()) {
					echo '<li class="breadcrumb-item">Search Results for... ';
					echo '"<em>';
					echo the_search_query();
					echo '</em>"';
					echo '</li>';
				}
			echo '</ol>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
	endif;
}
add_action('st_before_content', 'strapcore_breadcrumbs', 30);

/**
 * Disable Breadcrumbs on pages
 */
function strapcore_breadcrumbs_pages(){
	if ( true == get_theme_mod( 'pages_breadcrumbs', true ) ) :
		strapcore_breadcrumbs();
	endif;
}
 