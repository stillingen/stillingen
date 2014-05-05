jQuery(document).ready(function($){

	// Show/hide the main navigation
	$('.menu-toggle').click(function() {
		var target = $(this).parent().children('.nav-primary');
		$(target).slideToggle('fast', function() {
			return false;
			// Animation complete.
		});
	});

	// Stop the navigation link moving to the anchor (Still need the anchor for semantic markup)
	$('.menu-toggle a').click(function(e) {
		e.preventDefault();
	});

});