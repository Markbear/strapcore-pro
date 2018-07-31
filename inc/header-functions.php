<?php
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
if ( !function_exists( 'strapcore_theme_logo' ) ) :
	function strapcore_theme_logo() {
		// Try to retrieve the Custom Logo
		$output = '';
		if (function_exists('get_custom_logo'))
			$output = get_custom_logo();
	 
		// Nothing in the output: Custom Logo is not supported, or there is no selected logo
		// In both cases we display the site's name
		if (empty($output))
			$output = '<a class="navbar-brand" href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a>';
		
		echo $output;
	}
endif;

/**
 * Bootstrap Walker Menu
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

if ( !function_exists( 'strapcore_main_nav' ) ) :
	function strapcore_main_nav() {
		
		wp_nav_menu( array(
			'theme_location'  => 'primary',
			'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
			'container'       => 'div',
			'container_class' => 'collapse navbar-collapse',
			'container_id'    => 'strapcore-pro-navbar-collapse',
			'menu_class'      => 'navbar-nav mr-auto',
			'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
			'walker'          => new WP_Bootstrap_Navwalker(),
		) );
		
	}
endif;