<?php 
//Footer Menu
function strapcore_footer_menu() {
	
	if (has_nav_menu('footer-menu', 'strapcore-pro')) { ?>
		<div class="strapcore-pro-footer-menu">
			<div class="container">
				<nav role="navigation">
					<?php 
					wp_nav_menu( array( 'theme_location' => 'footer-menu' ) );
					/*wp_nav_menu( array(
						'theme_location'  => 'footer-menu',
					) );*/
					
					?>
				</nav>
			</div>
		</div>
	<?php }
	
}

function strapcore_colphon() {
	$colophon_content = get_theme_mod('footer_colophon');
	if ($colophon_content != ''):
		echo $colophon_content;
	else : ?>
		COPYRIGHT &copy; <?php echo date("Y"); ?> <a href="">Strap Themes</a>
	<?php endif; 
}