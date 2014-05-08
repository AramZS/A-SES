<?php
function fontawesome()  
{
	wp_enqueue_style('fontawesome_css', get_stylesheet_directory_uri() . '/mods/fonts/fontawesome/font-awesome.min.css', false, null);
}
add_action('wp_enqueue_scripts', 'fontawesome');
?>