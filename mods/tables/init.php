<?php 
function responsive_tables() {
	wp_enqueue_script('table_js', get_stylesheet_directory_uri() . '/mods/tables/responsive-tables.js', false, null);
	wp_enqueue_style( 'table_css', get_stylesheet_directory_uri() . '/mods/tables/responsive-tables.css' );
}
add_action('wp_enqueue_scripts', 'responsive_tables',999);
?>