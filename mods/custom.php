<?php 
/**
 * Custom functions
**/
 
// Add extra menus
register_nav_menus( array(
	'side_menu' => 'Side Menu',
	'mobile_menu' => 'Side Menu',
	'footer_menu' => 'Footer Menu',
	'credits_menu' => 'Credits Menu'	
) );


add_action( 'widgets_init', 'wp_tuts_parent_unregister_sidebars', 1 );
 
function wp_tuts_parent_unregister_sidebars() {
	unregister_sidebar( 'sidebar-primary' );
    unregister_sidebar( 'first-footer-widget-area' );
}

//
//function shawn_unreg_sidebars() {
//
//// unregister sidebars 
//	unregister_sidebar( 'sidebar-primary' );
//	unregister_sidebar( 'sidebar-secondary' );
//	unregister_sidebar( 'jumbotron' );
//	unregister_sidebar( 'header-area' );
//	unregister_sidebar( 'navbar-slide-down-top' );
//	unregister_sidebar( 'navbar-slide-down-1' );
//	unregister_sidebar( 'navbar-slide-down-2' );
//	unregister_sidebar( 'navbar-slide-down-3' );
//	unregister_sidebar( 'navbar-slide-down-4' );
//	unregister_sidebar( 'sidebar-footer-1' );	
//	unregister_sidebar( 'sidebar-footer-2' );	
//	unregister_sidebar( 'sidebar-footer-3' );	
//	unregister_sidebar( 'sidebar-footer-4' );	
//}
//add_action( 'widgets_init', 'shawn_unreg_sidebars', 20 );
///**
// * Register sidebars and widgets
// */
function add_sidebars_init() {	
//  register_sidebar(array(
//    'name'          => __('Header Widget', 'roots'),
//    'id'            => 'header-widget',
//    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
//    'after_widget'  => '</div></section>',
//    'before_title'  => '<h3 class="widget-title">',
//    'after_title'   => '</h3>',
//  ));
//  register_sidebar(array(
//    'name'          => __('Social', 'roots'),
//    'id'            => 'sidebar-social',
//    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
//    'after_widget'  => '</div></section>',
//    'before_title'  => '<h3 class="widget-title">',
//    'after_title'   => '</h3>',
//  ));
//  register_sidebar(array(
//    'name'          => __('Left Sidebar', 'roots'),
//    'id'            => 'sidebar-left',
//    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
//    'after_widget'  => '</div></section>',
//    'before_title'  => '<h3 class="widget-title">',
//    'after_title'   => '</h3>',
//  ));  
//  register_sidebar(array(
//    'name'          => __('Right Sidebar', 'roots'),
//    'id'            => 'sidebar-right',
//    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
//    'after_widget'  => '</div></section>',
//    'before_title'  => '<h3 class="widget-title">',
//    'after_title'   => '</h3>',
//  )); 
//  register_sidebar(array(
//    'name'          => __('Utility Sidebar left', 'roots'),
//    'id'            => 'utility-sidebar-left',
//    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
//    'after_widget'  => '</div></section>',
//    'before_title'  => '<h3 class="widget-title">',
//    'after_title'   => '</h3>',
//  ));
//  register_sidebar(array(
//    'name'          => __('Utility Sidebar Right', 'roots'),
//    'id'            => 'utility-sidebar-right',
//    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
//    'after_widget'  => '</div></section>',
//    'before_title'  => '<h3 class="widget-title">',
//    'after_title'   => '</h3>',
//  ));        
//  register_sidebar(array(
//    'name'          => __('Footer Widget Area 1', 'roots'),
//    'id'            => 'sidebar-footer-1',
//    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
//    'after_widget'  => '</div></section>',
//    'before_title'  => '<h3 class="widget-title">',
//    'after_title'   => '</h3>',
//  ));
//   register_sidebar(array(
//    'name'          => __('Footer Widget Area 2', 'roots'),
//    'id'            => 'sidebar-footer-2',
//    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
//    'after_widget'  => '</div></section>',
//    'before_title'  => '<h3 class="widget-title">',
//    'after_title'   => '</h3>',
//  )); 
//  register_sidebar(array(
//    'name'          => __('Footer Widget Area 3', 'roots'),
//    'id'            => 'sidebar-footer-3',
//    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
//    'after_widget'  => '</div></section>',
//    'before_title'  => '<h3 class="widget-title">',
//    'after_title'   => '</h3>',
//  ));
//   register_sidebar(array(
//    'name'          => __('Footer Widget Area 4', 'roots'),
//    'id'            => 'sidebar-footer-4',
//    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
//    'after_widget'  => '</div></section>',
//    'before_title'  => '<h3 class="widget-title">',
//    'after_title'   => '</h3>',
//  ));   
  register_sidebar(array(
    'name'          => __('Footer Menu', 'roots'),
    'id'            => 'footer-menu',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));  
}
add_action('widgets_init', 'add_sidebars_init', 21);


