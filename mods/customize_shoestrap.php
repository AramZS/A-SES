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
	unregister_sidebar( 'navbar' );
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
		'name'          => __('Home Page Hero', 'roots'),
		'id'            => 'jumbo',
		'description' => __( 'Used to place slider on the home page', 'roots' ),
		'before_widget' => '<section id="hero" class="custom-jumbotron jumbotron"><div class="container"><div class="feature-bg container"></div> ',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h1 style="display:none;" class="widget-title">',
		'after_title'   => '</h1>',
	));    
  	register_sidebar(array(
		'name'          => __('Left Sidebar', 'roots'),
		'id'            => 'left-sidebar',
		'description' => __( 'Creates widgetized area underneath sidenav', 'roots' ),
		'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));  
	register_sidebar(array(
		'name'          => __('Footer Widgets 1', 'roots'),
		'id'            => 'footer-widgets-1',
		'description' => __( 'Creates widgetized area on home page', 'roots' ),
		'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));     
	register_sidebar(array(
		'name'          => __('Footer Menu', 'roots'),
		'id'            => 'footer-widgets-2',
		'description' => __( 'Used to display menu in footer', 'roots' ),
		'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title" style="display:none;">',
		'after_title'   => '</h3>',
	));     
	register_sidebar(array(
		'name'          => __('Footer Widgets 3', 'roots'),
		'id'            => 'footer-widgets-3',
		'description' => __( 'Used to place copyright, site map & privacy policy, and social media links in footer', 'roots' ),
		'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title" style="display:none;">',
		'after_title'   => '</h3>',
	));     	
	register_sidebar(array(
		'name'          => __('Mobile Footer Widgets', 'roots'),
		'id'            => 'mobile-footer-widgets',
		'description' => __( 'Used to provide mobile only widgets which display Quick Links, Press, and Social Media icons', 'roots' ),
		'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));   
  register_sidebar(array(
		'name'          => __('Utility Sidebar', 'roots'),
		'id'            => 'utility-sidebar',
		'description' => __( 'An extra sidebar to allow us to place content on pages (an example are the posts appearing on Press page)', 'roots' ),
		'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
  ));  
}
add_action('widgets_init', 'add_sidebars_init', 21);
/**
 * Cleaner walker for wp_nav_menu()
 *
 * Walker_Nav_Menu (WordPress default) example output:
 *   <li id="menu-item-8" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8"><a href="/">Home</a></li>
 *   <li id="menu-item-9" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9"><a href="/sample-page/">Sample Page</a></l
 *
 * Roots_Nav_Walker example output:
 *   ><li class="menu-home"><a href="/">Home</a></li>
 *   <li class="menu-sample-page"><a href="/sample-page/">Sample Page</a></li>
 */
class dropdown_on_hover_Nav_Walker extends Walker_Nav_Menu {
  function check_current($classes) {
    return preg_match('/(current[-_])|active|dropdown/', $classes);
  }

  function start_lvl(&$output, $depth = 0, $args = array()) {
    $output .= "\n<ul class=\"dropdown-menu\">\n";
  }

  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    $item_html = '';
    parent::start_el($item_html, $item, $depth, $args);

    if ($item->is_dropdown && ($depth === 0)) {
	//$item_html = str_replace('<a', '<a class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" data-target="#"', $item_html);
	// mo more js to handle this behavior ... http://www.barrykooij.com/bootstrap-submenu-open-on-mouse-over/
		$item_html = str_replace('<a', '<a class="dropdown-toggle"', $item_html);
		$item_html = str_replace('</a>', ' <b class="caret"></b></a>', $item_html);
    }
    elseif (stristr($item_html, 'li class="divider')) {
      $item_html = preg_replace('/<a[^>]*>.*?<\/a>/iU', '', $item_html);
    }
    elseif (stristr($item_html, 'li class="dropdown-header')) {
      $item_html = preg_replace('/<a[^>]*>(.*)<\/a>/iU', '$1', $item_html);
    }

    $item_html = apply_filters('roots_wp_nav_menu_item', $item_html);
    $output .= $item_html;
  }

//  function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
//    $element->is_dropdown = ((!empty($children_elements[$element->ID]) && (($depth + 1) < $max_depth || ($max_depth === 0))));
//
//    if ($element->is_dropdown) {
//      $element->classes[] = 'dropdown';
//    }
//
//    parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
//  }
//}
// bring back the dropdown-submenu class that was deprecated with BS 3.0
  function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
    $element->is_dropdown = !empty($children_elements[$element->ID]);

    if ($element->is_dropdown) {
      if ($depth === 0) {
        $element->classes[] = 'dropdown';
      } elseif ($depth === 1) {
        $element->classes[] = 'dropdown-submenu';
      }
    }

    parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
  }
}

/**
 * Remove the id="" on nav menu items
 * Return 'menu-slug' for nav menu classes
 */
function roots_nav_menu_css_class($classes, $item) {
  $slug = sanitize_title($item->title);
  $classes = preg_replace('/(current(-menu-|[-_]page[-_])(item|parent|ancestor))/', 'active', $classes);
  $classes = preg_replace('/^((menu|page)[-_\w+]+)+/', '', $classes);

  $classes[] = 'menu-' . $slug;

  $classes = array_unique($classes);

  return array_filter($classes, 'is_element_empty');
}
add_filter('nav_menu_css_class', 'roots_nav_menu_css_class', 10, 2);
add_filter('nav_menu_item_id', '__return_null');

/**
 * Clean up wp_nav_menu_args
 *
 * Remove the container
 * Use Roots_Nav_Walker() by default
 */
function roots_nav_menu_args($args = '') {
  $roots_nav_menu_args['container'] = false;

  if (!$args['items_wrap']) {
    $roots_nav_menu_args['items_wrap'] = '<ul class="%2$s">%3$s</ul>';
  }

  if (current_theme_supports('bootstrap-top-navbar') && !$args['depth']) {
    $roots_nav_menu_args['depth'] = 3;
  }

  if (!$args['walker']) {
    $roots_nav_menu_args['walker'] = new dropdown_on_hover_Nav_Walker();
  }

  return array_merge($args, $roots_nav_menu_args);
}
add_filter('wp_nav_menu_args', 'roots_nav_menu_args');