jQuery(document).ready(function(){
	// create the back to top button
//	jQuery('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');

	var amountScrolled = 300;

	jQuery(window).scroll(function() {
		if ( jQuery(window).scrollTop() > amountScrolled ) {
			jQuery('a.back-to-top').fadeIn('slow');
		} else {
			jQuery('a.back-to-top').fadeOut('slow');
		}
	});

	jQuery('a.back-to-top, a.simple-back-to-top').click(function() {
		jQuery('html, body').animate({
			scrollTop: 0
		}, 700);
		return false;
	});
});