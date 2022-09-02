$(document).ready(function($) {
	$('.popup_open').click(function() {
		$('.popup_fade').fadeIn();
		return false;
	});	
	
	$('.popup_close').click(function() {
		$(this).parents('.popup_fade').fadeOut();
		return false;
	});		
 
	$(document).keydown(function(e) {
		if (e.keyCode === 27) {
			e.stopPropagation();
			$('.popup_fade').fadeOut();
		}
	});
	
	$('.popup_fade').click(function(e) {
		if ($(e.target).closest('.popup').length == 0) {
			$(this).fadeOut();					
		}
	});
});