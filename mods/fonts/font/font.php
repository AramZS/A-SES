<?php
function ses_font()  
{
	wp_enqueue_style('ses_font_style', get_stylesheet_directory_uri() . '/mods/fonts/font/stylesheet.css', false, null);
}
add_action('wp_enqueue_scripts', 'ses_font',101);
?>