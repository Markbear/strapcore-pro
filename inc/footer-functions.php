<?php 
//Footer Menu
function strapcore_footer_menu() {
	
	if (has_nav_menu('footer-menu', 'strapcore')) { ?>
		<div class="strapcore-footer-menu">
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