<?php
function has_submenu( $menu_items ) {

    $current_id = 0;

    foreach( $menu_items as $menu_item ) {

        // Get the id of the current menu item
        if( $menu_item->current ) {
            $current_id = $menu_item->ID;
        }
        // if the current item has a child
        if( $menu_item->menu_item_parent != 0 && $menu_item->menu_item_parent == $current_id ) {
add_filter(
  'body_class',
  function($classes) {
    $classes[] = 'has-submenu'; // or 'is-submenu'
    return $classes;
  }
);            break;
        }
    }
    return $menu_items;
}
add_filter( 'wp_nav_menu_objects', 'has_submenu', 10, 2 );
// Add specific CSS class by filter
	add_filter('body_class','my_class_names');
	function my_class_names($classes) {
	if ( !is_front_page() ) {
		$classes[] = 'not-front';
		}
		return $classes;
	
}
if ( !defined( 'REDUX_OPT_NAME' ) )
	define( 'REDUX_OPT_NAME', 'shoestrap' );

// Prioritize loading of some necessary core modules
if ( file_exists( get_template_directory() . '/lib/modules/redux/module.php' ) ) :
	require_once get_template_directory() . '/lib/modules/redux/module.php';
endif;
if ( file_exists( get_template_directory() . '/lib/modules/core/module.php' ) ) :
	require_once get_template_directory() . '/lib/modules/core/module.php';
endif;
if ( file_exists( get_template_directory() . '/lib/modules/layout/module.php' ) ) :
	require_once get_template_directory() . '/lib/modules/layout/module.php';
endif;
if ( file_exists( get_template_directory() . '/lib/modules/blog/module.php' ) ) :
	require_once get_template_directory() . '/lib/modules/blog/module.php';
endif;

// Include some admin options.
require_once locate_template( 'lib/admin-options.php' );

/*
 * Add a less file from our child theme to the parent theme's compiler.
 * This uses the 'shoestrap_compiler' filter that exists in the shoestrap compiler
 */
add_filter( 'shoestrap_compiler', 'shoestrap_child_styles' );
function shoestrap_child_styles( $bootstrap ) {
	return $bootstrap . '
	@import "' . get_stylesheet_directory() . '/assets/less/child.less";';
}


/*
 * Changes the output of the compiled CSS.
 */
add_filter( 'shoestrap_compiler_output', 'shoestrap_child_hijack_compiler' );
function shoestrap_child_hijack_compiler( $css ) {
	// $css = str_replace( '', '', $css );
	return $css;
}


/*
 * Enqueue the style.css file.
 *
 * It is recommended to use a less file as per the shoestrap_child_styles() function above.
 *
 * To have styles compiled and added in the main stylesheet,
 * try using the shoestrap_child_styles() function instead,
 */
function shoestrap_child_load_stylesheet() {
	wp_enqueue_style( 'shoestrap_child_css', get_stylesheet_uri(), false, null );
}
// Uncomment the line below to enqueue the stylesheet
// add_action('wp_enqueue_scripts', 'shoestrap_child_load_stylesheet', 100);


/*
 * Enqueue the stylesheet created with Grunt
 */
function shoestrap_child_grunt_stylesheet() {
	wp_enqueue_style( 'shoestrap_child_grunt_css', get_stylesheet_directory_uri() . '/assets/css/style.css', false, null );
}
// Uncomment the line below to enqueue the stylesheet
// add_action('wp_enqueue_scripts', 'shoestrap_child_grunt_stylesheet', 100);


/*
 * Remove page titles
 */
function shoestrap_empty_page_title() {}

function shoestrap_remove_page_titles() {
	if ( shoestrap_getvariable( 'remove_page_titles' ) == 1 ) :
		add_action( 'shoestrap_page_header_override', 'shoestrap_empty_page_title' );
	endif;
}
add_action( 'wp', 'shoestrap_remove_page_titles' );

// Shawn's added mods
require_once locate_template('/mods/mods.php');