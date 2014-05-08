<?php 
function navonhover_js() {
	wp_enqueue_script('offcanvas_js', get_stylesheet_directory_uri() . '/mods/navonhover/navonhover.js', false, null, true);
}
add_action('wp_enqueue_scripts', 'navonhover_js',9);
?>