<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Strapcore-Pro
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php if ( true == get_theme_mod( 'fixed_navbar', true ) ) : ?>
		
	<?php endif; ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<?php
	// action hook for any content to be placed before the header
	do_action ( 'st_before_header' );
	?>

	<?php if ( true == get_theme_mod( 'fixed_navbar', true ) ) : ?>
		<header id="masthead" class="site-header fixed-top">
	<?php else : ?>
		<header id="masthead" class="site-header">
	<?php endif; ?>
	
		<?php if ( true == get_theme_mod( 'enable_topbar', true ) ) : ?>
			<div class="topbar">
				<nav class="navbar navbar-expand navbar-dark bg-dark">
					<div class="container">
						<div class="col-md-6 contact-info">
							<?php if ( get_theme_mod( 'topbar_phone' ) != '' ) : ?>
								<i class="fas fa-phone"></i><?php echo get_theme_mod( 'topbar_phone' );?>
							<?php endif; ?>
							<?php if ( get_theme_mod( 'topbar_email' ) != '' ) : ?>
								<i class="fas fa-envelope"></i><?php echo get_theme_mod( 'topbar_email' );?>
							<?php endif; ?>
						</div>
						<div class="col-md-6 social-icons">
							<?php strapcore_social_icons(); ?>
						</div>
					</div>
				</nav><!-- .topbar -->
			</div>
		<?php endif; ?>
			
			<nav class="navbar navbar-expand-xl navbar-light bg-light">
				<div class="container">
					<?php strapcore_theme_logo(); ?>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#strapcore-pro-navbar-collapse" aria-controls="strapcore-pro-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<?php strapcore_main_nav(); ?>
					
				</div><!-- .container -->
			</nav><!-- .navbar -->
	</header><!-- .site-header -->

	<div id="content" class="site-content">
	
	<?php
	// action hook for any content to be placed before the page or post content
	do_action ( 'st_before_content' );
	?>
