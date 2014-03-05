<?php 
function jasny_bs() {
	wp_enqueue_style('j_css', get_stylesheet_directory_uri() . '/mods/j/j.css', false, null);

	wp_register_script('j_js', get_stylesheet_directory_uri() . '/mods/j/j.js', false, null, true);
	wp_enqueue_script('j_js');  	 
}
add_action('wp_enqueue_scripts', 'jasny_bs', 999);