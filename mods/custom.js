(function( $ ){
})( jQuery );

jQuery(document).ready(function($) {

$('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(200);
});  

$(".main").fitVids();
$( "table" ).last().addClass( "responsive" );

});

