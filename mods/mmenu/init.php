<?php 
function mmenu_init() {
	wp_enqueue_style('mmenu_css', get_stylesheet_directory_uri() . '/mods/mmenu/css/jquery.mmenu.all.css', false, '4.2.5', false);
	wp_enqueue_script('mmenu_js', get_stylesheet_directory_uri() . '/mods/mmenu/js/jquery.mmenu.min.all.js', false, '4.2.5', true);
	wp_enqueue_script('mmenu_custom', get_stylesheet_directory_uri() . '/mods/mmenu/mmenu.js', false, null, true);
}
add_action('wp_enqueue_scripts', 'mmenu_init',20);