<?php
function gnuolane()  
{
	wp_enqueue_style('gnuolane', get_template_directory_uri() . '/mods/fonts/gnuolane/stylesheet.css', false, null);
}
add_action('wp_enqueue_scripts', 'gnuolane',101);
?>