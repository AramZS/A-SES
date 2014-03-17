<?php 
// Remove extra nav menus
function remove_default_menu(){
	unregister_nav_menu('secondary_navigation');
}
add_action( 'after_setup_theme', 'remove_default_menu', 11 );
// Add extra menus
register_nav_menus( array(
	'mobile_menu1' => 'Mobile Menu 1',
	'mobile_menu2' => 'Mobile Menu 2',
//	'sidenav'	=> 'Side Menu',
//	'footer_menu' => 'Footer Menu',
//	'credits_menu' => 'Credits Menu'	
));
//function shawn_unreg_sidebars() {
function remove_some_widgets(){
//	unregister_sidebar( 'sidebar-primary' );
	unregister_sidebar( 'sidebar-secondary' );
	unregister_sidebar( 'jumbotron' );
	unregister_sidebar( 'header-area' );
	unregister_sidebar( 'navbar-slide-down-top' );
	unregister_sidebar( 'navbar-slide-down-1' );
	unregister_sidebar( 'navbar-slide-down-2' );
	unregister_sidebar( 'navbar-slide-down-3' );
	unregister_sidebar( 'navbar-slide-down-4' );
	unregister_sidebar( 'sidebar-footer-1' );	
	unregister_sidebar( 'sidebar-footer-2' );	
	unregister_sidebar( 'sidebar-footer-3' );	
	unregister_sidebar( 'sidebar-footer-4' );
	}
add_action( 'init', 'remove_some_widgets', 11 );
// Register sidebars and widgets
function add_sidebars_init() {	
	register_sidebar(array(
		'name'          => __('Left Sidebar', 'roots'),
		'id'            => 'left-sidebar',
		'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));  
	register_sidebar(array(
		'name'          => __('Footer Widgets 1', 'roots'),
		'id'            => 'footer-widgets-1',
		'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));     
	register_sidebar(array(
		'name'          => __('Footer Widgets 2', 'roots'),
		'id'            => 'footer-widgets-2',
		'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title" style="display:none;">',
		'after_title'   => '</h3>',
	));     
	register_sidebar(array(
		'name'          => __('Footer Widgets 3', 'roots'),
		'id'            => 'footer-widgets-3',
		'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title" style="display:none;">',
		'after_title'   => '</h3>',
	));     	
	register_sidebar(array(
		'name'          => __('Mobile Footer Widgets', 'roots'),
		'id'            => 'mobile-footer-widgets',
		'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));   
  register_sidebar(array(
		'name'          => __('Footer Menu', 'roots'),
		'id'            => 'footer-menu',
		'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
  ));  
  register_sidebar(array(
		'name'          => __('Home Page Hero', 'roots'),
		'id'            => 'jumbo',
		'before_widget' => '<section class="jumbotron"><div class="container"><div class="feature-bg container"></div> ',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h1 style="display:none;" class="widget-title">',
		'after_title'   => '</h1>',
  ));    
}
add_action('widgets_init', 'add_sidebars_init', 21);