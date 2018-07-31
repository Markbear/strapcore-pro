<?php
/**
 * Strapcore-Pro Theme Customizer
 *
 * @package Strapcore-Pro
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function strapcore_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'strapcore_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'strapcore_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'strapcore_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function strapcore_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function strapcore_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function strapcore_customize_preview_js() {
	wp_enqueue_script( 'strapcore-pro-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'strapcore_customize_preview_js' );

if ( class_exists('Kirki') ) {
	Kirki::add_config( 'strapcore_theme', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
	) );
	
	/* Genereal Settings */
	Kirki::add_panel( 'general_panel', array(
		'priority'    => 10,
		'title'       => esc_attr__( 'General Settings', 'strapcore-pro' ),
		'description' => esc_attr__( '', 'strapcore-pro' ),
	) );
	
	Kirki::add_section( 'breadcrumbs_section', array(
		'title'          => esc_attr__( 'Breadcrumbs', 'strapcore-pro' ),
		'description'    => esc_attr__( 'Enable breadcrumbs in various locations.', 'strapcore-pro' ),
		'panel'          => 'general_panel',
		'priority'       => 160,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'        => 'switch',
		'settings'    => 'enable_breadcrumbs',
		'label'       => __( 'Enable/Disable Breadcrumbs', 'strapcore-pro' ),
		'section'     => 'breadcrumbs_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => array(
			'on'  => esc_attr__( 'Enable', 'strapcore-pro' ),
			'off' => esc_attr__( 'Disable', 'strapcore-pro' ),
		),
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'        => 'switch',
		'settings'    => 'pages_breadcrumbs',
		'label'       => __( 'Breadcrumbs on Pages?', 'strapcore-pro' ),
		'section'     => 'breadcrumbs_section',
		'default'     => '1',
		'priority'    => 20,
		'choices'     => array(
			'on'  => esc_attr__( 'Yes', 'strapcore-pro' ),
			'off' => esc_attr__( 'No', 'strapcore-pro' ),
		),
	) );
	
	Kirki::add_section( 'social_section', array(
		'title'          => esc_attr__( 'Social Media', 'strapcore-pro' ),
		'description'    => esc_attr__( 'Here you can set your social media profiles to display and other social media related settings.', 'strapcore-pro' ),
		'panel'          => 'general_panel',
		'priority'       => 160,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'     => 'text',
		'settings' => 'facebook_social',
		'label'    => __( 'Facebook', 'strapcore-pro' ),
		'section'  => 'social_section',
		'default'  => esc_attr__( 'Enter the URL to your Facebook profile', 'strapcore-pro' ),
		'priority' => 10,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'     => 'text',
		'settings' => 'twitter_social',
		'label'    => __( 'Twitter', 'strapcore-pro' ),
		'section'  => 'social_section',
		'default'  => esc_attr__( 'Enter the URL to your Twitter profile', 'strapcore-pro' ),
		'priority' => 20,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'     => 'text',
		'settings' => 'instagram_social',
		'label'    => __( 'Instagram', 'strapcore-pro' ),
		'section'  => 'social_section',
		'default'  => esc_attr__( 'Enter the URL to your Instagram profile', 'strapcore-pro' ),
		'priority' => 30,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'     => 'text',
		'settings' => 'google_social',
		'label'    => __( 'Google+', 'strapcore-pro' ),
		'section'  => 'social_section',
		'default'  => esc_attr__( 'Enter the URL to your Google+ profile', 'strapcore-pro' ),
		'priority' => 40,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'     => 'text',
		'settings' => 'linkedin_social',
		'label'    => __( 'LinkedIn', 'strapcore-pro' ),
		'section'  => 'social_section',
		'default'  => esc_attr__( 'Enter the URL to your LinkedIn profile', 'strapcore-pro' ),
		'priority' => 50,
	) );
	
	
	/* Header Settings */
	Kirki::add_panel( 'header_panel', array(
		'priority'    => 10,
		'title'       => esc_attr__( 'Header Settings', 'strapcore-pro' ),
		'description' => esc_attr__( '', 'strapcore-pro' ),
	) );
	
	Kirki::add_section( 'header_section', array(
		'title'          => esc_attr__( 'Navigation Bar Settings', 'strapcore-pro' ),
		'description'    => esc_attr__( 'Control the settings for the nvigation bar.', 'strapcore-pro' ),
		'panel'          => 'header_panel',
		'priority'       => 160,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'        => 'switch',
		'settings'    => 'fixed_navbar',
		'label'       => esc_attr__( 'Enable or disable the Fixed navigation bar setting', 'strapcore-pro' ),
		'section'     => 'header_section',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => array(
			'on'  => esc_attr__( 'Enable', 'strapcore-pro' ),
			'off' => esc_attr__( 'Disable', 'strapcore-pro' ),
		),
	) );
	
	
	/* Footer Settings */
	Kirki::add_panel( 'footer_panel', array(
		'priority'    => 10,
		'title'       => esc_attr__( 'Footer Settings', 'strapcore-pro' ),
		'description' => esc_attr__( '', 'strapcore-pro' ),
	) );
	
	Kirki::add_section( 'footer_widgets_section', array(
		'title'          => esc_attr__( 'Footer Widgets', 'strapcore-pro' ),
		'description'    => esc_attr__( 'Control the settings for the footer widgets.', 'strapcore-pro' ),
		'panel'          => 'footer_panel',
		'priority'       => 160,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'        => 'radio',
		'settings'    => 'display_footer_widgets',
		'label'       => esc_attr__( 'Select number of footer widgets to display', 'strapcore-pro' ),
		'section'     => 'footer_widgets_section',
		'default'     => 0,
		'priority'    => 10,
		'choices'     => array(
			0   => esc_attr__( 'No Widgets', 'strapcore-pro' ),
			1   => esc_attr__( '1 Widget', 'strapcore-pro' ),
			2 => esc_attr__( '2 Widgets', 'strapcore-pro' ),
			3  => esc_attr__( '3 Widgets', 'strapcore-pro' ),
		),
	) );
	
}
