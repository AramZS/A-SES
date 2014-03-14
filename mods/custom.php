<?php 
// * Custom functions
// Remove extra nav menus
function remove_default_menu(){
	unregister_nav_menu('secondary_navigation');
}
add_action( 'after_setup_theme', 'remove_default_menu', 11 );
// Add extra menus
register_nav_menus( array(
	'mobile_menu1' => 'Mobile Menu 1',
	'mobile_menu2' => 'Mobile Menu 2',
	'sidenav'	=> 'Side Menu',
//	'footer_menu' => 'Footer Menu',
//	'credits_menu' => 'Credits Menu'	
));
//function shawn_unreg_sidebars() {
function remove_some_widgets(){
//	unregister_sidebar( 'sidebar-primary' );
//	unregister_sidebar( 'sidebar-secondary' );
//	unregister_sidebar( 'jumbotron' );
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
}
add_action('widgets_init', 'add_sidebars_init', 21);
// Add new image sizes
add_image_size( 'thumbnail', 9999, 9999, false );
add_image_size( 'home', 600, 9999, false );
add_image_size( 'full', 9999, 9999, false );
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 9999, 9999 );
}
// add copyright
//http://www.wpbeginner.com/wp-tutorials/how-to-add-a-dynamic-copyright-date-in-wordpress-footer/
function comicpress_copyright() {
global $wpdb;
$copyright_dates = $wpdb->get_results("
SELECT
YEAR(min(post_date_gmt)) AS firstdate,
YEAR(max(post_date_gmt)) AS lastdate
FROM
$wpdb->posts
WHERE
post_status = 'publish'
");
$output = '';
if($copyright_dates) {
$copyright = "&copy; " . $copyright_dates[0]->firstdate;
if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
$copyright .= '-' . $copyright_dates[0]->lastdate;
}
$output = $copyright;
}
return $output;
}
function wap8_has_children( $id ) {

     $children = get_pages( 'child_of=' . $id );

     if ( count( $children ) > 0 ) {
          return '1';
     }

}
function wap8_has_siblings() {

     if ( is_page() ) {

          global $post;

          if ( $post->post_parent ) {

               $siblings = get_pages( 'child_of=' . $post->post_parent );

               if ( count( $siblings ) > 0 ) {
                    return '1';
               }

          }

     }

}
// Add specific CSS class by filter
	add_filter('body_class','my_class_names');
	function my_class_names($classes) {
	if ( !is_front_page() ) {
		// add 'class-name' to the $classes array
		$classes[] = 'not-front';
		}
		// return the $classes array
		return $classes;
	
}

//	// Add specific CSS class by filter
//	function my_class_names($classes) {
//		if ( is_page_template('template-ppc.php') ) {
//			$classes[] = 'ppc';
//		}
//	return $classes;
//	}
//	add_filter('body_class','my_class_names');