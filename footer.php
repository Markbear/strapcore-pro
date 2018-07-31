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

	</div><!-- #row -->
	</div><!-- #container -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		
		<?php strapcore_display_footer_widgets(); ?>
		
		<?php strapcore_footer_menu(); ?>
		
		<div class="container">
			<div class="row">
				<div class="col-lg-6 site-info">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'strapcore-pro' ) ); ?>">
						<?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf( esc_html__( 'Proudly powered by %s', 'strapcore-pro' ), 'WordPress' );
						?>
					</a>
					<span class="sep"> | </span>
						<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( esc_html__( 'Theme: %1$s by %2$s.', 'strapcore-pro' ), 'strapcore-pro', '<a href="https://strapthemes.com">Strap Themes</a>' );
						?>
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
