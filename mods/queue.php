<?php

//// DEREGISTER template FOR VISUAL FORM
//function my_deregister_styles() {
//	wp_deregister_style( 'visual-form-builder-css' );
//	wp_deregister_style( 'gsc_style' );
//	wp_deregister_script( 'gsc_dialog' );
//}
//add_action( 'wp_print_styles', 'my_deregister_styles', 100 );

//function custom_stuff() {
////	wp_enqueue_style('form_style', get_template_directory_uri() . '/form.css', false, null); 
////	wp_enqueue_style('mod_gsc_style', get_template_directory_uri() . '/mods/gcse/css/smoothness/jquery-ui-1.7.3.custom.css', false, null); 
////	wp_enqueue_script('mod_gsc_js', get_template_directory_uri() . '/mods/gcse/js/gsc.js', false, null);
//	
//	// include the override last so it's actually an override 
//	wp_enqueue_style('override_style', get_template_directory_uri() . '/override.css', false, null);
//}
//add_action('wp_enqueue_scripts', 'custom_stuff',999);

// OVERRIDEs
function overrides()
{
	wp_enqueue_style('override_style', get_stylesheet_directory_uri() . '/override.css', false, null);
	//	wp_enqueue_style('override_style', get_stylesheet_directory_uri() . '/mods/social-buttons-3.css', false, null);	
}
add_action('wp_enqueue_scripts', 'overrides',9999);

