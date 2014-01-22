<?php
function socialfont_enqeue()  
{
	wp_enqueue_style('socialfont_style', get_template_directory_uri() . '/mods/fonts/socialfont/ss-social-circle.css', false, null);
	
	wp_register_script('socialfont_script', get_template_directory_uri() . '/mods/fonts/socialfont/ss-social.js', false, null, false);
	wp_enqueue_script('socialfont_script');
}
add_action('wp_enqueue_scripts', 'socialfont_enqeue',101);
?>