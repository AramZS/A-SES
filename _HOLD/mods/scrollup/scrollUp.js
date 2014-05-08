jQuery(document).ready(function() {
	var offset = 220;
	var duration = 500;
	$(window).scroll(function() {
		if ($(this).scrollTop() > offset) {
			$('.scrollup').fadeIn(duration);
		} else {
			$('.scrollup').fadeOut(duration);
		}
	});

	$('.scrollup').click(function(event) {
		event.preventDefault();
		$('html, body').animate({scrollTop: 0}, duration);
		return false;
	})
});