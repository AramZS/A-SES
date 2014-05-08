(function( $ ){
})( jQuery );

jQuery(document).ready(function($) {
	// make sure fitvid fires
	$(".main").fitVids();
	// add the 'responsive' class to all tables so we don't have to do it manually
	$( "table" ).addClass( "responsive" );	
	// only display the toggle nav if the page parent has sub-items
	if($('.has-side-nav').length){ 
	  $('.nav-toggle-wrap').show();
	}
});