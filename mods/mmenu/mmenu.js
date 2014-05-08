jQuery(document).ready(function() {
	var $menu = $('nav#menu');
	$menu.mmenu({
		header: true,					
//		slidingSubmenus: false,
		position	: 'left',
		classes		: 'mm-light',
		onClick: {
			close: true
		}	
	});
});