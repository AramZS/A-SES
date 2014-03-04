<?php 
function jasny_bs() {
	wp_enqueue_style('jasny_css', get_stylesheet_directory_uri() . '/mods/jasny/jansy.css', false, null);

	wp_register_script('jasny_js', get_stylesheet_directory_uri() . '/mods/jasny/jansy.js', false, null, true);
	wp_enqueue_script('jasny_js');  	 
}
add_action('wp_enqueue_scripts', 'jasny_bs', 999);