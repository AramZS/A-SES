<?php

function register_my_menus() {
register_nav_menus(
array(
'main-nav' => __( 'Main Menu' ),
'footer-nav' => __( 'Footer Menu' ),
'about-nav' => __( 'About Menu' ),
'bandwidth-nav' => __( 'Bandwidth Menu' ),
'press-nav' => __( 'Press Menu' ),
'fcsa-nav' => __( 'FCSA Menu' )
));
}

add_action( 'init', 'register_my_menus' );

register_sidebar(array(
	'name'		=> 'Home Bottom Left Box',
	'id'            => 'home-bottom-left-box',
	'description'   => '',
	'before_widget' => '',
	'after_widget'  => '',
	'before_title'  => '<h1>',
	'after_title'   => '</h1>'));

register_sidebar(array(
	'name'		=> 'About Us Sidebar',
	'id'            => 'about-sidebar',
	'description'   => 'Sidebar area for all About Us pages',
	'before_widget' => '<div class="sidebar-shadow"></div><div class="sidebar-box">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>'));
	
register_sidebar(array(
	'name'		=> 'Bandwidth Sidebar',
	'id'            => 'bandwidth-sidebar',
	'description'   => 'Sidebar area for Bandwidth and Satellites pages',
	'before_widget' => '<div class="sidebar-shadow"></div><div class="sidebar-box">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>'));
	
register_sidebar(array(
	'name'		=> 'Launches Sidebar',
	'id'            => 'launches-sidebar',
	'description'   => 'Sidebar area for Launches page',
	'before_widget' => '<div class="sidebar-shadow"></div><div class="sidebar-box">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>'));
	
register_sidebar(array(
	'name'		=> 'Teleports Sidebar',
	'id'            => 'teleports-sidebar',
	'description'   => 'Sidebar area for Teleports page',
	'before_widget' => '<div class="sidebar-shadow"></div><div class="sidebar-box">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>'));
	
register_sidebar(array(
	'name'		=> 'Hosted Payloads Sidebar',
	'id'            => 'hosted-payloads-sidebar',
	'description'   => 'Sidebar area for Hosted Payloads page',
	'before_widget' => '<div class="sidebar-shadow"></div><div class="sidebar-box">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>'));
	
register_sidebar(array(
	'name'		=> 'UAV Sidebar',
	'id'            => 'uav-sidebar',
	'description'   => 'Sidebar area for UAV page',
	'before_widget' => '<div class="sidebar-shadow"></div><div class="sidebar-box">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>'));
	
register_sidebar(array(
	'name'		=> 'Press Sidebar',
	'id'            => 'press-sidebar',
	'description'   => 'Sidebar area for Press page',
	'before_widget' => '<div class="sidebar-shadow"></div><div class="sidebar-box">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>'));
	
register_sidebar(array(
	'name'		=> 'Contact Sidebar',
	'id'            => 'contact-sidebar',
	'description'   => 'Sidebar area for Contact page',
	'before_widget' => '<div class="sidebar-shadow"></div><div class="sidebar-box">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>'));
	
register_sidebar(array(
	'name'		=> 'Contract Vehicles Sidebar',
	'id'            => 'contract-vehicles-sidebar',
	'description'   => 'Sidebar area for Contract Vehicles page',
	'before_widget' => '<div class="sidebar-shadow"></div><div class="sidebar-box">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>'));
	
register_sidebar(array(
	'name'		=> 'FCSA Sidebar',
	'id'            => 'fcsa-sidebar',
	'description'   => 'Sidebar area for FCSA page',
	'before_widget' => '<div class="sidebar-shadow"></div><div class="sidebar-box">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>'));

register_sidebar(array(
	'name'		=> 'CS2 Sidebar',
	'id'            => 'cs2-sidebar',
	'description'   => 'Sidebar area for CS2 page',
	'before_widget' => '<div class="sidebar-shadow"></div><div class="sidebar-box">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>'));
	
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 120, 120, true ); //generic thumbnail image size

if ( is_admin() ) :

function remove_menus () {
global $menu;
	$restricted = array(__('Links'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}

add_action('admin_menu', 'remove_menus');
endif; //wrapper for admin functions

function is_tree($pid)
{
	global $post;

	$ancestors = get_post_ancestors($post->$pid);
	$root = count($ancestors) - 1;
	$parent = $ancestors[$root];

	if(is_page() && (is_page($pid) || $post->post_parent == $pid || in_array($pid, $ancestors)))
	{
		return true;
	}
	else
	{
		return false;
	}
};
?>