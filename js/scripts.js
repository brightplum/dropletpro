var hoverOutTimer = null;
 
jQuery(document).ready(function($) { 
	'use strict';
	$(".menulink a").click(function() { 
	  	jQuery("#menu").stop(true, true).slideToggle('fast');
	});
	jQuery(".hero").stop(true, true).fadeIn('fast');
	jQuery(".form-box").stop(true, true).fadeIn('fast');
	jQuery(".shadow").stop(true, true).fadeIn('fast');
});

jQuery(window).resize(function () { 
	'use strict';
});