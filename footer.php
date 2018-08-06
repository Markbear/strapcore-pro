<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Strapcore-Pro
 */

?>

	<?php
	// action hook for any content to be placed after the page or post content
	do_action ( 'st_after_content' );
	?>
	
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
	
		<?php strapcore_simple_back_to_top(); ?>
		
		<?php strapcore_display_footer_widgets(); ?>
		
		<?php strapcore_footer_menu(); ?>
		
		<div class="container">
			<div class="row">
				<div class="col-lg-6 site-info">
					<?php strapcore_colphon(); ?>
				</div><!-- .site-info -->
				<div class="col-lg-6 footer-social">
					<?php strapcore_social_icons(); ?>
				</div>
			</div><!-- .row -->
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
