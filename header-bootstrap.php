<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package StrapCore
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

    <header id="masthead" class="site-header">
			<nav class="navbar navbar-expand-xl navbar-light bg-light">
				<div class="container">
					<?php strapcore_theme_logo(); ?>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#strapcore-navbar-collapse" aria-controls="strapcore-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<?php strapcore_main_nav(); ?>
					
				</div><!-- .container -->
			</nav><!-- .navbar -->
	</header><!-- .site-header -->

	<div class="container">
	<div id="content" class="site-content">
		<?php strapcore_breadcrumbs(); ?>