<?php
/**
 * Enqueue scripts and styles.
 */
function strapcore_scripts() {
	
	wp_enqueue_style( 'strapcore-style', get_stylesheet_uri() );
	
	if ( 'default' == get_theme_mod( 'bootswatch', 'style.min.css') ) : 
		wp_enqueue_style( 'strapcore-bootswatch', get_template_directory_uri() . '/css/bootstrap.css');
	else:
		$color_scheme = get_theme_mod( 'bootswatch', 'style.min.css');
		wp_enqueue_style( 'strapcore-bootswatch', get_template_directory_uri() . '/css/' . $color_scheme);
	endif;
	
	

	wp_enqueue_script( 'strapcore-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	
	wp_enqueue_script( 'strapcore-js', get_template_directory_uri() . '/js/dist/scripts.min.js', array('jquery'), '1.0.0', true );
	
	wp_enqueue_script( 'strappress-fa', '//use.fontawesome.com/releases/v5.2.0/js/all.js', array(), '5.2.0' );
	
	if ( true == get_theme_mod( 'fixed_navbar', true ) ) :
		wp_enqueue_script( 'strapcore-fixed-nav', get_template_directory_uri() . '/js/fixed-nav.js', array(), '20151215', true );
	endif;

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'strapcore_scripts' );