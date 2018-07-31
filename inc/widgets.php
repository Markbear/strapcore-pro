<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function strapcore_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'strapcore-pro' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'This is the default sidebar for index, archive and search pages.', 'strapcore-pro' ),
		'before_widget' => '<section id="%1$s" class="widget card %2$s"><div class="card-body">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title card-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'strapcore-pro' ),
		'id'            => 'sidebar-left',
		'description'   => esc_html__( 'This is the sidebar for pages with a left hand sidebar.', 'strapcore-pro' ),
		'before_widget' => '<section id="%1$s" class="widget card %2$s"><div class="card-body">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title card-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'strapcore-pro' ),
		'id'            => 'sidebar-right',
		'description'   => esc_html__( 'This is the sidebar for pages with a right hand sidebar.', 'strapcore-pro' ),
		'before_widget' => '<section id="%1$s" class="widget card %2$s"><div class="card-body">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title card-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Left Footer Widget', 'strapcore-pro' ),
		'id'            => 'footer-left',
		'description'   => esc_html__( 'This is the left widget in the footer section for all pages.', 'strapcore-pro' ),
		'before_widget' => '<section id="%1$s" class="widget card %2$s"><div class="card-body">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title card-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Center Footer Widget', 'strapcore-pro' ),
		'id'            => 'footer-center',
		'description'   => esc_html__( 'This is the center widget in the footer section for all pages.', 'strapcore-pro' ),
		'before_widget' => '<section id="%1$s" class="widget card %2$s"><div class="card-body">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title card-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Right Footer Widget', 'strapcore-pro' ),
		'id'            => 'footer-right',
		'description'   => esc_html__( 'This is the right widget in the footer section for all pages.', 'strapcore-pro' ),
		'before_widget' => '<section id="%1$s" class="widget card %2$s"><div class="card-body">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title card-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'strapcore_widgets_init' );

/**
 * Display Footer Widgets
 */
function strapcore_display_footer_widgets(){
	if ( 0 == get_theme_mod( 'display_footer_widgets' ) ) : 
		return;
	elseif ( 1 == get_theme_mod( 'display_footer_widgets' ) ) : ?>
		<div class="container footer-widgets">
			<div class="row">	
				<?php
				if ( is_active_sidebar( 'footer-left' ) ) { ?>
					<aside id="secondary" class="col-lg-12 widget-area">
						<?php dynamic_sidebar( 'footer-left' ); ?>
					</aside><!-- #secondary -->
				<?php } ?>
			</div>
		</div>
	<?php elseif ( 2 == get_theme_mod( 'display_footer_widgets' ) ) : ?>
		<div class="container footer-widgets">
			<div class="row">	
				<?php
				if ( is_active_sidebar( 'footer-left' ) ) { ?>
					<aside id="secondary" class="col-lg-6 widget-area">
						<?php dynamic_sidebar( 'footer-left' ); ?>
					</aside><!-- #secondary -->
				<?php }
				if ( is_active_sidebar( 'footer-center' ) ) { ?>
					<aside id="secondary" class="col-lg-6 widget-area">
						<?php dynamic_sidebar( 'footer-center' ); ?>
					</aside><!-- #secondary -->
				<?php } ?>
			</div>
		</div>
	<?php elseif ( 3 == get_theme_mod( 'display_footer_widgets' ) ) : ?>
		<div class="container footer-widgets">
			<div class="row">	
				<?php
				if ( is_active_sidebar( 'footer-left' ) ) { ?>
					<aside id="secondary" class="col-lg-4 widget-area">
						<?php dynamic_sidebar( 'footer-left' ); ?>
					</aside><!-- #secondary -->
				<?php }
				if ( is_active_sidebar( 'footer-center' ) ) { ?>
					<aside id="secondary" class="col-lg-4 widget-area">
						<?php dynamic_sidebar( 'footer-center' ); ?>
					</aside><!-- #secondary -->
				<?php } 
				if ( is_active_sidebar( 'footer-right' ) ) { ?>
					<aside id="secondary" class="col-lg-4 widget-area">
						<?php dynamic_sidebar( 'footer-right' ); ?>
					</aside><!-- #secondary -->
				<?php } ?>
			</div>
		</div>
	<?php endif;	
}