<?php
// Custom Admin Style
function plugin_helper_admin() {
//	wp_enqueue_style( 'admin_style', get_stylesheet_directory_uri() . '/admin.css' );
	wp_enqueue_style( 'plugin_helper_css', get_stylesheet_directory_uri() . '/mods/plugin_helpers/plugin_helper_admin.css' );
}
add_action( 'admin_enqueue_scripts', 'plugin_helper_admin' );

function plugin_helper_frontend(){
	wp_enqueue_style( 'plugin_helper_frontend', get_stylesheet_directory_uri() . '/mods/plugin_helpers/plugin_helper_frontend.css' );
}
add_action('wp_enqueue_scripts', 'plugin_helper_frontend',9999);
// adds CSS/JS for Simple image Widget to admin page view
// http://wordpress.org/support/topic/use-with-wp-page-widget
add_action( 'admin_enqueue_scripts', array( $GLOBALS['simple_image_widget'], 'enqueue_admin_assets' ));