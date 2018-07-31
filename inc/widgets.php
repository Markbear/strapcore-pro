<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function strapcore_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'strapcore' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'This is the default sidebar for index, archive and search pages.', 'strapcore' ),
		'before_widget' => '<section id="%1$s" class="widget card %2$s"><div class="card-body">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title card-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'strapcore' ),
		'id'            => 'sidebar-left',
		'description'   => esc_html__( 'This is the sidebar for pages with a left hand sidebar.', 'strapcore' ),
		'before_widget' => '<section id="%1$s" class="widget card %2$s"><div class="card-body">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title card-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'strapcore' ),
		'id'            => 'sidebar-right',
		'description'   => esc_html__( 'This is the sidebar for pages with a right hand sidebar.', 'strapcore' ),
		'before_widget' => '<section id="%1$s" class="widget card %2$s"><div class="card-body">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title card-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Left Footer Widget', 'strapcore' ),
		'id'            => 'footer-left',
		'description'   => esc_html__( 'This is the left widget in the footer section for all pages.', 'strapcore' ),
		'before_widget' => '<section id="%1$s" class="widget card %2$s"><div class="card-body">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title card-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Center Footer Widget', 'strapcore' ),
		'id'            => 'footer-center',
		'description'   => esc_html__( 'This is the center widget in the footer section for all pages.', 'strapcore' ),
		'before_widget' => '<section id="%1$s" class="widget card %2$s"><div class="card-body">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title card-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Right Footer Widget', 'strapcore' ),
		'id'            => 'footer-right',
		'description'   => esc_html__( 'This is the right widget in the footer section for all pages.', 'strapcore' ),
		'before_widget' => '<section id="%1$s" class="widget card %2$s"><div class="card-body">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title card-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'strapcore_widgets_init' );