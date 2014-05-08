<?php
function overrides(){
	wp_enqueue_style('override_style', get_stylesheet_directory_uri() . '/override.css', false, null);
	wp_enqueue_script('selectivizr_js', get_stylesheet_directory_uri() . '/mods/selectivizr-min.js', false, null);
	wp_enqueue_script('custom_js', get_stylesheet_directory_uri() . '/mods/custom.js', false, null);
}
add_action('wp_enqueue_scripts', 'overrides',9999);