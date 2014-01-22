<?php 
function navonhover_js() {
	wp_register_script('offcanvas_js', get_template_directory_uri() . '/mods/js/navonhover/navonhover.js', false, null, true);
	wp_enqueue_script('offcanvas_js');  	 
}
add_action('wp_enqueue_scripts', 'navonhover_js',9);
?>