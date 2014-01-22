<?php 
//include_once( dirname( __FILE__ ) . '/custom-cpt-post-widget.php' );
//include_once( dirname( __FILE__ ) . '/custom-post-widget.php' );
?>
<?php
// Run this code on 'after_theme_setup', when plugins have already been loaded.
add_action('after_setup_theme', 'my_load_plugin');
 
// This function loads the plugin.
function my_load_plugin() {
 
// Check to see if your plugin has already been loaded. This can be done in several
// ways - here are a few examples:
//
// Check for a class:
// if (!class_exists('MyPluginClass')) {
//
// Check for a function:
// if (!function_exists('my_plugin_function_name')) {
//
// Check for a constant:
// if (!defined('MY_PLUGIN_CONSTANT')) {
 
	if (!class_exists('custom_CPT_Post_widget')) {
	 
	// load Social if not already loaded
	//include_once(TEMPLATEPATH.'/mods/widgets/custom-cpt-post-widget.php');
	 
	}
	
	if (!class_exists('Genesis_Special_Post')) {
	//include_once(TEMPLATEPATH.'/mods/widgets/custom-post-widget.php');
	}	
	

	if (!class_exists('sc_Flexible_Posts_Widget')) {
	include_once(TEMPLATEPATH.'/mods/widgets/flexible-posts-widget/flexible-posts-widget.php');
	}			
}