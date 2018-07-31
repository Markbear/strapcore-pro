<?php
/**
 * StrapCore Theme Customizer
 *
 * @package StrapCore
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
	wp_enqueue_script( 'strapcore-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
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
		'title'       => esc_attr__( 'General Settings', 'strapcore' ),
		'description' => esc_attr__( '', 'strapcore' ),
	) );
	
	Kirki::add_section( 'breadcrumbs_section', array(
		'title'          => esc_attr__( 'Breadcrumbs', 'strapcore' ),
		'description'    => esc_attr__( 'Enable breadcrumbs in various locations.', 'strapcore' ),
		'panel'          => 'general_panel',
		'priority'       => 160,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'        => 'switch',
		'settings'    => 'enable_breadcrumbs',
		'label'       => __( 'Enable/Disable Breadcrumbs', 'strapcore' ),
		'section'     => 'breadcrumbs_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => array(
			'on'  => esc_attr__( 'Enable', 'strapcore' ),
			'off' => esc_attr__( 'Disable', 'strapcore' ),
		),
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'        => 'switch',
		'settings'    => 'pages_breadcrumbs',
		'label'       => __( 'Breadcrumbs on Pages?', 'strapcore' ),
		'section'     => 'breadcrumbs_section',
		'default'     => '1',
		'priority'    => 20,
		'choices'     => array(
			'on'  => esc_attr__( 'Yes', 'strapcore' ),
			'off' => esc_attr__( 'No', 'strapcore' ),
		),
	) );
	
	Kirki::add_section( 'social_section', array(
		'title'          => esc_attr__( 'Social Media', 'strapcore' ),
		'description'    => esc_attr__( 'Here you can set your social media profiles to display and other social media related settings.', 'strapcore' ),
		'panel'          => 'general_panel',
		'priority'       => 160,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'     => 'text',
		'settings' => 'facebook_social',
		'label'    => __( 'Facebook', 'strapcore' ),
		'section'  => 'social_section',
		'default'  => esc_attr__( 'Enter the URL to your Facebook profile', 'strapcore' ),
		'priority' => 10,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'     => 'text',
		'settings' => 'twitter_social',
		'label'    => __( 'Twitter', 'strapcore' ),
		'section'  => 'social_section',
		'default'  => esc_attr__( 'Enter the URL to your Twitter profile', 'strapcore' ),
		'priority' => 20,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'     => 'text',
		'settings' => 'instagram_social',
		'label'    => __( 'Instagram', 'strapcore' ),
		'section'  => 'social_section',
		'default'  => esc_attr__( 'Enter the URL to your Instagram profile', 'strapcore' ),
		'priority' => 30,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'     => 'text',
		'settings' => 'google_social',
		'label'    => __( 'Google+', 'strapcore' ),
		'section'  => 'social_section',
		'default'  => esc_attr__( 'Enter the URL to your Google+ profile', 'strapcore' ),
		'priority' => 40,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'     => 'text',
		'settings' => 'linkedin_social',
		'label'    => __( 'LinkedIn', 'strapcore' ),
		'section'  => 'social_section',
		'default'  => esc_attr__( 'Enter the URL to your LinkedIn profile', 'strapcore' ),
		'priority' => 50,
	) );
	
	
	/* Header Settings */
	Kirki::add_panel( 'header_panel', array(
		'priority'    => 10,
		'title'       => esc_attr__( 'Header Settings', 'strapcore' ),
		'description' => esc_attr__( '', 'strapcore' ),
	) );
	
	Kirki::add_section( 'header_section', array(
		'title'          => esc_attr__( 'Navigation Bar Settings', 'strapcore' ),
		'description'    => esc_attr__( 'Control the settings for the nvigation bar.', 'strapcore' ),
		'panel'          => 'header_panel',
		'priority'       => 160,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'        => 'switch',
		'settings'    => 'fixed_navbar',
		'label'       => esc_attr__( 'Enable or disable the Fixed navigation bar setting', 'strapcore' ),
		'section'     => 'header_section',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => array(
			'on'  => esc_attr__( 'Enable', 'strapcore' ),
			'off' => esc_attr__( 'Disable', 'strapcore' ),
		),
	) );
	
	
	/* Footer Settings */
	Kirki::add_panel( 'footer_panel', array(
		'priority'    => 10,
		'title'       => esc_attr__( 'Footer Settings', 'strapcore' ),
		'description' => esc_attr__( '', 'strapcore' ),
	) );
	
	Kirki::add_section( 'footer_widgets_section', array(
		'title'          => esc_attr__( 'Footer Widgets', 'strapcore' ),
		'description'    => esc_attr__( 'Control the settings for the footer widgets.', 'strapcore' ),
		'panel'          => 'footer_panel',
		'priority'       => 160,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'        => 'radio',
		'settings'    => 'display_footer_widgets',
		'label'       => esc_attr__( 'Select number of footer widgets to display', 'strapcore' ),
		'section'     => 'footer_widgets_section',
		'default'     => 0,
		'priority'    => 10,
		'choices'     => array(
			0   => esc_attr__( 'No Widgets', 'strapcore' ),
			1   => esc_attr__( '1 Widget', 'strapcore' ),
			2 => esc_attr__( '2 Widgets', 'strapcore' ),
			3  => esc_attr__( '3 Widgets', 'strapcore' ),
		),
	) );
	
	
	/* Colors */	
	Kirki::add_field( 'strapcore_theme', array(
		'type'        => 'radio',
		'settings'    => 'bootswatch',
		'label'       => esc_attr__( 'Select your color scheme', 'strapcore' ),
		'section'     => 'colors',
		'default'     => 'default',
		'priority'    => 10,
		'choices'     => array(
			'default' 	=> esc_attr__( 'Default', 'strapcore' ),
			'cerulean.min.css'  => esc_attr__( 'Cerulean', 'strapcore' ),
			'cosmo.min.css'     => esc_attr__( 'Cosmo', 'strapcore' ),
			'cyborg.min.css'    => esc_attr__( 'Cyborg', 'strapcore' ),
			'darkly.min.css'    => esc_attr__( 'Darkly', 'strapcore' ),
			'flatly.min.css'    => esc_attr__( 'Flatly', 'strapcore' ),
			'journal.min.css'   => esc_attr__( 'Journal', 'strapcore' ), 
			'litera.min.css'    => esc_attr__( 'Litera', 'strapcore' ),
			'lumen.min.css'     => esc_attr__( 'Lumen', 'strapcore' ),
			'lux.min.css'     	=> esc_attr__( 'Lux', 'strapcore' ),
			'materia.min.css'   => esc_attr__( 'Materia', 'strapcore' ),
			'minty.min.css'     => esc_attr__( 'Minty', 'strapcore' ),
			'pulse.min.css'     => esc_attr__( 'Pulse', 'strapcore' ),
			'sandstone.min.css' => esc_attr__( 'Sandstone', 'strapcore' ),
			'simplex.min.css'   => esc_attr__( 'Simplex', 'strapcore' ),
			'sketchy.min.css'   => esc_attr__( 'sketchy', 'strapcore' ),
			'slate.min.css'     => esc_attr__( 'Slate', 'strapcore' ),
			'solar.min.css'   	=> esc_attr__( 'solar', 'strapcore' ),
			'spacelab.min.css'  => esc_attr__( 'Spacelab', 'strapcore' ),
			'superhero.min.css' => esc_attr__( 'Superhero', 'strapcore' ),
			'united.min.css'    => esc_attr__( 'United', 'strapcore' ),
			'yeti.min.css'      => esc_attr__( 'Yeti', 'strapcore' ),
		),
	) );
	
}
