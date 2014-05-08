<?php 
function scrollup_js() {
	wp_enqueue_script('skrollr_min', get_stylesheet_directory_uri() . '/mods/scrollup/scrollup.js', false, null, true);
}
add_action('wp_enqueue_scripts', 'scrollup_js',9999);