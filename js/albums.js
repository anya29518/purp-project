$(document).ready(function($) {
	$('.apopup_open').click(function() {
		$('.apopup_fade').fadeIn();
		return false;
	});	
	
	$('.apopup_close').click(function() {
		$(this).parents('.apopup_fade').fadeOut();
		return false;
	});		
 
	$(document).keydown(function(e) {
		if (e.keyCode === 27) {
			e.stopPropagation();
			$('.apopup_fade').fadeOut();
		}
	});
	
	$('.apopup_fade').click(function(e) {
		if ($(e.target).closest('.apopup').length == 0) {
			$(this).fadeOut();					
		}
	});
});