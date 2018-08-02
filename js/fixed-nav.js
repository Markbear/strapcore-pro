jQuery(document).ready(function($){
	jQuery("body.admin-bar .site-header").css("margin-top", "32px");
	var result = jQuery("#masthead").outerHeight();
	jQuery("body").css("padding-top", result);
});