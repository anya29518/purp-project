$(document).ready(function($) {
	$('.phpopup_open').click(function() {
		$('.phpopup_fade').fadeIn();
		return false;
	});	
	
	$('.phpopup_close').click(function() {
		$(this).parents('.phpopup_fade').fadeOut();
		return false;
	});		
 
	$(document).keydown(function(e) {
		if (e.keyCode === 27) {
			e.stopPropagation();
			$('.phpopup_fade').fadeOut();
		}
	});
	
	$('.phpopup_fade').click(function(e) {
		if ($(e.target).closest('.phpopup').length == 0) {
			$(this).fadeOut();					
		}
	});
});