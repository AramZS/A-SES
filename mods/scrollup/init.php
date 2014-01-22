<?php 
function skrollr_init() {
	wp_register_script('skrollr_min', get_stylesheet_directory_uri() . '/mods/skrollr/skrollr.min.js', false, null, true);
	wp_enqueue_script('skrollr_min');  
	
	wp_register_script('skrollr_menu', get_stylesheet_directory_uri() . '/mods/skrollr/skrollr.menu.min.js', false, null, true);
	wp_enqueue_script('skrollr_menu');  

	wp_register_script('skrollr_script', get_stylesheet_directory_uri() . '/mods/skrollr/skrollr.js', false, null, true);
	wp_enqueue_script('skrollr_script');  	
}
add_action('wp_enqueue_scripts', 'skrollr_init',9999);