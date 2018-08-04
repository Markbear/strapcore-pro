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



if ( class_exists('Kirki') ) {
	/*Kirki::add_config( 'strapcore_theme', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
	) );*/
	

	
	/* Genereal Settings */
	Kirki::add_panel( 'general_panel', array(
		'priority'    => 25,
		'title'       => esc_attr__( 'General', 'strapcore-pro' ),
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
		'priority'    => 25,
		'title'       => esc_attr__( 'Header', 'strapcore-pro' ),
		'description' => esc_attr__( '', 'strapcore-pro' ),
	) );
	
	Kirki::add_section( 'header_section', array(
		'title'          => esc_attr__( 'Navigation Bar Settings', 'strapcore-pro' ),
		'description'    => esc_attr__( 'Control the settings for the navigation bar.', 'strapcore-pro' ),
		'panel'          => 'header_panel',
		'priority'       => 160,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'        => 'switch',
		'settings'    => 'fixed_navbar',
		'label'       => esc_attr__( 'Enable or disable the Fixed navigation bar setting', 'strapcore-pro' ),
		'section'     => 'header_section',
		'default'     => '0',
		'priority'    => 26,
		'choices'     => array(
			'on'  => esc_attr__( 'Enable', 'strapcore-pro' ),
			'off' => esc_attr__( 'Disable', 'strapcore-pro' ),
		),
	) );
	
	Kirki::add_section( 'topbar_section', array(
		'title'          => esc_attr__( 'Top Bar Settings', 'strapcore-pro' ),
		'description'    => esc_attr__( 'Control the settings for the top bar above the navigation.', 'strapcore-pro' ),
		'panel'          => 'header_panel',
		'priority'       => 160,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'        => 'switch',
		'settings'    => 'enable_topbar',
		'label'       => esc_attr__( 'Enable or disable the top bar above the main navigation', 'strapcore-pro' ),
		'section'     => 'topbar_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => array(
			'on'  => esc_attr__( 'Enable', 'strapcore-pro' ),
			'off' => esc_attr__( 'Disable', 'strapcore-pro' ),
		),
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'     => 'text',
		'settings' => 'topbar_phone',
		'label'    => __( 'Phone Number', 'strapcore-pro' ),
		'section'  => 'topbar_section',
		'default'  => esc_attr__( '0123456789', 'strapcore-pro' ),
		'priority' => 10,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'     => 'text',
		'settings' => 'topbar_email',
		'label'    => __( 'Email Address', 'strapcore-pro' ),
		'section'  => 'topbar_section',
		'default'  => esc_attr__( 'example@example.com', 'strapcore-pro' ),
		'priority' => 10,
	) );
	

	
	
	/* Blog Settings */
	Kirki::add_panel( 'blog_panel', array(
		'priority'    => 27,
		'title'       => esc_attr__( 'Blog', 'strapcore-pro' ),
		'description' => esc_attr__( 'Control all settings for the blog posts.', 'strapcore-pro' ),
	) );
	
	Kirki::add_section( 'blog_section', array(
		'title'          => esc_attr__( 'Post Display Settings', 'strapcore-pro' ),
		'description'    => esc_attr__( 'Control the settings for the content displayed in index, archive search pages as well as single posts.', 'strapcore-pro' ),
		'panel'          => 'blog_panel',
		'priority'       => 160,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'        => 'switch',
		'settings'    => 'blog_entry_meta',
		'label'       => esc_attr__( 'Enable or disable the post meta for blog posts on the index, archive and search pages', 'strapcore-pro' ),
		'section'     => 'blog_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => array(
			'on'  => esc_attr__( 'Enable', 'strapcore-pro' ),
			'off' => esc_attr__( 'Disable', 'strapcore-pro' ),
		),
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'        => 'switch',
		'settings'    => 'blog_footer',
		'label'       => esc_attr__( 'Enable or disable the post footer for blog posts on the index, archive and search pages', 'strapcore-pro' ),
		'section'     => 'blog_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => array(
			'on'  => esc_attr__( 'Enable', 'strapcore-pro' ),
			'off' => esc_attr__( 'Disable', 'strapcore-pro' ),
		),
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'        => 'switch',
		'settings'    => 'single_entry_meta',
		'label'       => esc_attr__( 'Enable or disable the post meta for the single posts', 'strapcore-pro' ),
		'section'     => 'blog_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => array(
			'on'  => esc_attr__( 'Enable', 'strapcore-pro' ),
			'off' => esc_attr__( 'Disable', 'strapcore-pro' ),
		),
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'        => 'switch',
		'settings'    => 'single_entry_footer',
		'label'       => esc_attr__( 'Enable or disable the post footer for the single posts', 'strapcore-pro' ),
		'section'     => 'blog_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => array(
			'on'  => esc_attr__( 'Enable', 'strapcore-pro' ),
			'off' => esc_attr__( 'Disable', 'strapcore-pro' ),
		),
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'        => 'switch',
		'settings'    => 'author_meta_box',
		'label'       => esc_attr__( 'Enable or disable the Author info box on single posts', 'strapcore-pro' ),
		'section'     => 'blog_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => array(
			'on'  => esc_attr__( 'Enable', 'strapcore-pro' ),
			'off' => esc_attr__( 'Disable', 'strapcore-pro' ),
		),
	) );
	
	Kirki::add_section( 'blog_header_section', array(
		'title'          => esc_attr__( 'Header Images', 'strapcore-pro' ),
		'description'    => esc_attr__( 'Control the settings for displaying featured images on the index, archive, search and 404 pages.', 'strapcore-pro' ),
		'panel'          => 'blog_panel',
		'priority'       => 160,
	) );
	
	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'image',
		'settings'    => 'blog_header_image',
		'label'       => esc_attr__( 'Blog Header Image', 'strapcore-pro' ),
		'description' => esc_attr__( 'Set an image as a featured image on the blog page.', 'strapcore-pro' ),
		'section'     => 'blog_header_section',
		'default'     => '',
	) );
	
	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'image',
		'settings'    => 'archive_header_image',
		'label'       => esc_attr__( 'Archive Header Image', 'strapcore-pro' ),
		'description' => esc_attr__( 'Set an image as a featured image on the archives page.', 'strapcore-pro' ),
		'section'     => 'blog_header_section',
		'default'     => '',
	) );
	
	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'image',
		'settings'    => 'search_header_image',
		'label'       => esc_attr__( 'Search Header Image', 'strapcore-pro' ),
		'description' => esc_attr__( 'Set an image as a featured image on the search page.', 'strapcore-pro' ),
		'section'     => 'blog_header_section',
		'default'     => '',
	) );
	
	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'image',
		'settings'    => '404_header_image',
		'label'       => esc_attr__( '404 Header Image', 'strapcore-pro' ),
		'description' => esc_attr__( 'Set an image as a featured image on the 404 error page.', 'strapcore-pro' ),
		'section'     => 'blog_header_section',
		'default'     => '',
	) );
	
	
	
	
	/* Projects Settings */
/*	Kirki::add_panel( 'projects_panel', array(
		'priority'    => 28,
		'title'       => esc_attr__( 'Projects Settings', 'strapcore-pro' ),
		'description' => esc_attr__( '', 'strapcore-pro' ),
	) );*/
/*	
	Kirki::add_section( 'projects_section', array(
		'title'          => esc_attr__( 'Projects', 'strapcore-pro' ),
		'description'    => esc_attr__( 'Control the settings for the projects section.', 'strapcore-pro' ),
//		'panel'          => 'projects_panel',
		'priority'       => 28,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'     => 'text',
		'settings' => 'projects_heading',
		'label'    => __( 'Projects Page Heading', 'strapcore-pro' ),
		'section'  => 'projects_section',
		'default'  => esc_attr__( 'Our Projects', 'strapcore-pro' ),
		'priority' => 10,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'     => 'textarea',
		'settings' => 'projects_content',
		'label'    => __( 'Projects Page Content', 'strapcore-pro' ),
		'section'  => 'projects_section',
		'default'  => esc_attr__( 'Looking for inspiration? Take a look at some of our latest projects.', 'strapcore-pro' ),
		'priority' => 20,
	) );
	
	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'image',
		'settings'    => 'projects_header_image',
		'label'       => esc_attr__( 'Projects Header Image', 'strapcore-pro' ),
		'description' => esc_attr__( 'Set an image as a featured image on the projects page.', 'strapcore-pro' ),
		'section'     => 'projects_section',
		'default'     => '',
	) );
*/
	
	/* Services Settings */
/*	Kirki::add_panel( 'services_panel', array(
		'priority'    => 10,
		'title'       => esc_attr__( 'Services Settings', 'strapcore-pro' ),
		'description' => esc_attr__( '', 'strapcore-pro' ),
	) );*/
/*	
	Kirki::add_section( 'services_section', array(
		'title'          => esc_attr__( 'Services', 'strapcore-pro' ),
		'description'    => esc_attr__( 'Control the settings for the services section.', 'strapcore-pro' ),
		//'panel'          => 'projects_panel',
		'priority'       => 29,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'     => 'text',
		'settings' => 'services_heading',
		'label'    => __( 'Services Page Heading', 'strapcore-pro' ),
		'section'  => 'services_section',
		'default'  => esc_attr__( 'Our Services', 'strapcore-pro' ),
		'priority' => 10,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'     => 'textarea',
		'settings' => 'services_content',
		'label'    => __( 'Projects Page Content', 'strapcore-pro' ),
		'section'  => 'services_section',
		'default'  => esc_attr__( 'We have a range of services. Learn  more below or get in touch today.', 'strapcore-pro' ),
		'priority' => 20,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'     => 'text',
		'settings' => 'services_button_link',
		'label'    => __( 'Contact Page Link', 'strapcore-pro' ),
		'section'  => 'services_section',
		'default'  => esc_attr__( '#', 'strapcore-pro' ),
		'priority' => 30,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'     => 'text',
		'settings' => 'services_button',
		'label'    => __( 'Button Text', 'strapcore-pro' ),
		'section'  => 'services_section',
		'default'  => esc_attr__( 'Contact Us', 'strapcore-pro' ),
		'priority' => 40,
	) );
	
	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'image',
		'settings'    => 'services_header_image',
		'label'       => esc_attr__( 'Services Header Image', 'strapcore-pro' ),
		'description' => esc_attr__( 'Set an image as a featured image on the services page.', 'strapcore-pro' ),
		'section'     => 'services_section',
		'default'     => '',
	) );
*/
	
		/* Team Settings */
/*	Kirki::add_panel( 'services_panel', array(
		'priority'    => 10,
		'title'       => esc_attr__( 'Services Settings', 'strapcore-pro' ),
		'description' => esc_attr__( '', 'strapcore-pro' ),
	) );*/
/*	
	Kirki::add_section( 'teams_section', array(
		'title'          => esc_attr__( 'Teams', 'strapcore-pro' ),
		'description'    => esc_attr__( 'Control the settings for the teams section.', 'strapcore-pro' ),
		//'panel'          => 'projects_panel',
		'priority'       => 30,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'     => 'text',
		'settings' => 'team_heading',
		'label'    => __( 'Team Page Heading', 'strapcore-pro' ),
		'section'  => 'teams_section',
		'default'  => esc_attr__( 'Our Team', 'strapcore-pro' ),
		'priority' => 10,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'     => 'textarea',
		'settings' => 'team_content',
		'label'    => __( 'Team Page Content', 'strapcore-pro' ),
		'section'  => 'teams_section',
		'default'  => esc_attr__( 'Learn more about our fantastic team below.', 'strapcore-pro' ),
		'priority' => 20,
	) );
	
	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'image',
		'settings'    => 'team_header_image',
		'label'       => esc_attr__( 'Team Header Image', 'strapcore-pro' ),
		'description' => esc_attr__( 'Set an image as a featured image on the team page.', 'strapcore-pro' ),
		'section'     => 'teams_section',
		'default'     => '',
	) );
*/	

		/* FAQ Settings */
/*	Kirki::add_panel( 'services_panel', array(
		'priority'    => 10,
		'title'       => esc_attr__( 'Services Settings', 'strapcore-pro' ),
		'description' => esc_attr__( '', 'strapcore-pro' ),
	) );*/
/*	
	Kirki::add_section( 'faq_section', array(
		'title'          => esc_attr__( 'FAQs', 'strapcore-pro' ),
		'description'    => esc_attr__( 'Control the settings for the FAQ section.', 'strapcore-pro' ),
		//'panel'          => 'projects_panel',
		'priority'       => 30,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'     => 'text',
		'settings' => 'faq_heading',
		'label'    => __( 'FAQ Page Heading', 'strapcore-pro' ),
		'section'  => 'FAQ_section',
		'default'  => esc_attr__( 'Frequently Asked Questions', 'strapcore-pro' ),
		'priority' => 10,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'     => 'textarea',
		'settings' => 'faq_content',
		'label'    => __( 'FAQ Page Content', 'strapcore-pro' ),
		'section'  => 'faq_section',
		'default'  => esc_attr__( 'Learn more about us and what we offer with some of our frequently asked questions below.', 'strapcore-pro' ),
		'priority' => 20,
	) );
	
	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'image',
		'settings'    => 'faq_header_image',
		'label'       => esc_attr__( 'FAQ Header Image', 'strapcore-pro' ),
		'description' => esc_attr__( 'Set an image as a featured image on the FAQ page.', 'strapcore-pro' ),
		'section'     => 'faq_section',
		'default'     => '',
	) );	
*/

	
	/* Footer Settings */
	Kirki::add_panel( 'footer_panel', array(
		'priority'    => 31,
		'title'       => esc_attr__( 'Footer', 'strapcore-pro' ),
		'description' => esc_attr__( '', 'strapcore-pro' ),
	) );
	
	Kirki::add_section( 'footer_content_section', array(
		'title'          => esc_attr__( 'Footer Content', 'strapcore-pro' ),
		'description'    => esc_attr__( 'Control the settings for the footer widgets.', 'strapcore-pro' ),
		'panel'          => 'footer_panel',
		'priority'       => 160,
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'        => 'radio',
		'settings'    => 'display_footer_widgets',
		'label'       => esc_attr__( 'Select number of footer widgets to display', 'strapcore-pro' ),
		'section'     => 'footer_content_section',
		'default'     => 0,
		'priority'    => 10,
		'choices'     => array(
			0   => esc_attr__( 'No Widgets', 'strapcore-pro' ),
			1   => esc_attr__( '1 Widget', 'strapcore-pro' ),
			2 => esc_attr__( '2 Widgets', 'strapcore-pro' ),
			3  => esc_attr__( '3 Widgets', 'strapcore-pro' ),
		),
	) );
	
	Kirki::add_field( 'strapcore_theme', array(
		'type'     => 'textarea',
		'settings' => 'footer_colophon',
		'label'    => __( 'Copyright Content', 'strapcore-pro' ),
		'section'  => 'footer_content_section',
		'default'  => esc_attr__( 'COPYRIGHT &copy; 2018 Strap Theme', 'strapcore-pro' ),
		'priority' => 20,
	) );
	


	
		Kirki::remove_section( 'colors' );
		
		Kirki::remove_section( 'background_image' );
}
