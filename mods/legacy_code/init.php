<?php 
function legacy_init() {
	wp_register_script('skrollr_min', get_stylesheet_directory_uri() . '/mods/legacy/skrollr.min.js', false, null, true);
	wp_enqueue_script('skrollr_min');  
	
	wp_register_script('skrollr_menu', get_stylesheet_directory_uri() . '/mods/legacy/skrollr.menu.min.js', false, null, true);
	wp_enqueue_script('skrollr_menu');  
	
}
add_action('wp_enqueue_scripts', 'legacy_init',99);