jQuery(document).ready(function($){
	jQuery("body.admin-bar .navbar").css("margin-top", "32px");
	var result = jQuery("#fixed-nav").outerHeight();
	jQuery("body").css("padding-top", result);
});