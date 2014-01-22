<?php 
function offcanvas() {
	wp_enqueue_style('offcanvas_css', get_stylesheet_directory_uri() . '/mods/offcanvas/offcanvas.css', false, null);

	wp_register_script('offcanvas_js', get_stylesheet_directory_uri() . '/mods/offcanvas/offcanvas.js', false, null, true);
	wp_enqueue_script('offcanvas_js');  	 
}
add_action('wp_enqueue_scripts', 'offcanvas', 999);