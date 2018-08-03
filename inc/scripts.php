<?php
/**
 * Enqueue scripts and styles.
 */
function strapcore_scripts() {
	
	wp_enqueue_style( 'strapcore-pro-style', get_stylesheet_uri() );
	
	//wp_enqueue_script( 'strapcore-pro-navigation', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', array(), '20151215', true );

	//wp_enqueue_script( 'strapcore-pro-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	
	//wp_enqueue_script( 'popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array(), '5.2.0' );
	
	//wp_enqueue_script( 'bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array(), '5.2.0' );
	
	wp_enqueue_script( 'strapcore-pro-js', get_template_directory_uri() . '/js/dist/scripts.min.js', array('jquery'), '1.0.0', true );
	
	wp_enqueue_script( 'strappress-fa', '//use.fontawesome.com/releases/v5.2.0/js/all.js', array(), '5.2.0' );
	
	if ( true == get_theme_mod( 'fixed_navbar', true ) ) :
		wp_enqueue_script( 'strapcore-pro-fixed-nav', get_template_directory_uri() . '/js/fixed-nav.js', array(), '20151215', true );
	endif;

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'strapcore_scripts' );