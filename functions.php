<?php
/**
 * Strapcore-Pro functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Strapcore-Pro
 */

/**
 * Theme Set-up.
 */
require get_template_directory() . '/inc/strapcore-setup.php';

/**
 * Widgets.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Scripts.
 */
require get_template_directory() . '/inc/scripts.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Site Header Functions
 */
require get_template_directory() . '/inc/header-functions.php';

/**
 * Site Footer Functions
 */
require get_template_directory() . '/inc/footer-functions.php';


/**
 * Breadcrumbs.
 */
require get_template_directory() . '/inc/breadcrumbs.php';

/**
 * Plugin Activation
 */
require get_template_directory() . '/inc/plugins/install-plugins.php';

/**
 * Comments
 */
require get_template_directory() . '/inc/comments.php';

/**
 * Content Functions
 */
require get_template_directory() . '/inc/content.php';

/**
 * Site Features giving additional functionality
 */
require get_template_directory() . '/inc/features.php';

/**
 * Post Meta
 */
require get_template_directory() . '/inc/post-meta.php';

/**
 * Post Meta
 */
require get_template_directory() . '/inc/featured-images.php';

/**
 * Post Meta
 */
require get_template_directory() . '/inc/post-navigation.php';

/**
 * Post Meta
 */
require get_template_directory() . '/inc/contact-form.php';