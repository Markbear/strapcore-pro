<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function strapcore_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'strapcore' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'strapcore' ),
		'before_widget' => '<section id="%1$s" class="widget card %2$s"><div class="card-body">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title card-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'strapcore_widgets_init' );