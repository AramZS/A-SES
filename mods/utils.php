<?php
// Add specific CSS class by filter
add_filter('body_class','my_class_names');
function my_class_names($classes) {
	if ( !is_front_page() ) {
			$classes[] = 'not-front';
		}
	return $classes;
}
// Add specific CSS class by filter
function organizedthemes_browser_body_class($classes) {
    global $is_gecko, $is_IE, $is_opera, $is_safari, $is_chrome;
    if($is_gecko)      $classes[] = 'gecko';
    elseif($is_opera)  $classes[] = 'opera';
    elseif($is_safari) $classes[] = 'safari';
    elseif($is_chrome) $classes[] = 'chrome';
    elseif($is_IE)     $classes[] = 'ie';
    else               $classes[] = 'unknown';
 
    return $classes;
}
add_filter('body_class','organizedthemes_browser_body_class');
// Add new image sizes
add_image_size( 'thumbnail', 9999, 9999, false );
add_image_size( 'home', 600, 9999, false );
add_image_size( 'full', 9999, 9999, false );
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 9999, 9999 );
}
// get submenu items from wp_nav_menu
// http://christianvarga.com/how-to-get-submenu-items-from-a-wordpress-menu-based-on-parent-or-sibling/
// add hook
add_filter( 'wp_nav_menu_objects', 'my_wp_nav_menu_objects_sub_menu', 10, 2 );
// filter_hook function to react on sub_menu flag
function my_wp_nav_menu_objects_sub_menu( $sorted_menu_items, $args ) {
  if ( isset( $args->sub_menu ) ) {
    $root_id = 0;
    // find the current menu item
    foreach ( $sorted_menu_items as $menu_item ) {
      if ( $menu_item->current ) {
        // set the root id based on whether the current menu item has a parent or not
        $root_id = ( $menu_item->menu_item_parent ) ? $menu_item->menu_item_parent : $menu_item->ID;
        break;
      }
    }
    // find the top level parent
    if ( ! isset( $args->direct_parent ) ) {
      $prev_root_id = $root_id;
      while ( $prev_root_id != 0 ) {
        foreach ( $sorted_menu_items as $menu_item ) {
          if ( $menu_item->ID == $prev_root_id ) {
            $prev_root_id = $menu_item->menu_item_parent;
            // don't set the root_id to 0 if we've reached the top of the menu
            if ( $prev_root_id != 0 ) $root_id = $menu_item->menu_item_parent;
            break;
          } 
        }
      }
    }
    $menu_item_parents = array();
    foreach ( $sorted_menu_items as $key => $item ) {
      // init menu_item_parents
      if ( $item->ID == $root_id ) $menu_item_parents[] = $item->ID;

      if ( in_array( $item->menu_item_parent, $menu_item_parents ) ) {
        // part of sub-tree: keep!
        $menu_item_parents[] = $item->ID;
      } else if ( ! ( isset( $args->show_parent ) && in_array( $item->ID, $menu_item_parents ) ) ) {
        // not part of sub-tree: away with it!
        unset( $sorted_menu_items[$key] );
      }
    }
    return $sorted_menu_items;
  } else {
    return $sorted_menu_items;
  }
}

    /* Custom Walker to remove all the wp_nav_menu junk
    http://pastebin.com/kz9iSc5y*/
    class clean_walker extends Walker_Nav_Menu
    {
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
    global $wp_query;
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
     
    $class_names = $value = '';
     
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $current_indicators = array('current-menu-parent', 'current_page_item', 'current_page_parent');
    $newClasses = array();
    foreach($classes as $el){
    //check if it's indicating the current page, otherwise we don't need the class
    if (in_array($el, $current_indicators)){
    array_push($newClasses, $el);
    }
    }
     
    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $newClasses), $item ) );
    if($class_names!='') $class_names = ' class="'. esc_attr( $class_names ) . '"';
     
    $output .= $indent . '<li' . $value . $class_names .'>';
     
    $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
    $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
    $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
     
    if($depth != 0)
    {
    //children stuff
    }
     
    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
    $item_output .= '</a>';
    $item_output .= $args->after;
     
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id );
    }
    }

/*
--- new walker class to create breadcrumb from nav menu structure using wp_nav_menu -------
http://snipplr.com/view/71920/
http://wordpress.stackexchange.com/questions/50425/show-current-navigation-path-from-menu

	use like:
	wp_nav_menu( array( 
		'container' => 'none', 
		'theme_location' => 'primary',
		'walker'=> new bi_BreadCrumbWalker, 
		'items_wrap' => '<div id="breadcrumb-%1$s" class="%2$s">%3$s</div>'
	) );
	  
*/
class bi_BreadCrumbWalker extends Walker{

    var $tree_type = array( 'post_type', 'taxonomy', 'custom' );

    /**
     * @see Walker::$db_fields
     * @var array
     */
    var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

    /**
     * delimiter for crumbs
     * @var string
     */
    var $delimiter = '';

    /**
     * @see Walker::start_el()
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item.
     * @param int $current_page Menu item ID.
     * @param object $args
     */
    function start_el(&$output, $item, $depth = 2, $args = array(), $id = 0) {

        //Check if menu item is an ancestor of the current page
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $current_identifiers = array( 'current-menu-item', 'current-menu-parent', 'current-menu-ancestor' ); 
        $ancestor_of_current = array_intersect( $current_identifiers, $classes );     


        if( $ancestor_of_current ){
            $title = apply_filters( 'the_title', $item->title, $item->ID );

            //Preceed with delimter for all but the first item.
            if( 0 != $depth )
                $output .= $this->delimiter;

            //Link tag attributes
            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

            //Add to the HTML output
            //$output .= '<a'. $attributes .'>'.$title.'</a>';

			// added by me to remove the link on the current page item
			if ( in_array("current-menu-item", $classes) ) {
				$output .= '<li><span class="current-page">'.$title.'</span></li>';
			} else {
				$output .= '<li><a'. $attributes .'>'.$title.'</a></li>';
			}
        }
    }
}
// add function for custom bookmarks based on wp_nav_menu
function custom_breadcrumbs() {
global $post;
	wp_nav_menu( array(
	'container' => 'none',
	'theme_location' => 'primary_navigation',
	'walker'=> new bi_BreadCrumbWalker,
	'items_wrap' => '<div id="custom-breadcrumbs" class="breadTrail container"><ul class="breadcrumb"><li><a href="'. esc_url( home_url( '/' )) .'" class="home"><i class="el-icon-home"></i></a></li>%3$s</div>'
	));
}
//add breadcrumb switch
function breadcrumb_switch() {
global $post;
if (!is_front_page()){
	if ( is_page() ) {
			custom_breadcrumbs();
		} else {
			do_action('shoestrap_pre_wrap');
		}
	}
}
//Our custom sitemap which reads the menu order using extended menu walker class
//Shortcode
// http://snipplr.com/view/54404/wordpress-custom-sitemap-shortcode-following-custom-menu-order/
function wdp_shortcode_sitemap($atts){ //[sitemap]
extract(shortcode_atts(array(	
), $atts));
//call the function
$shortcodecontent = wdp_sitemap();
 
return $shortcodecontent;
}
add_shortcode('sitemap', 'wdp_shortcode_sitemap');
 
//call the menu and use our custom walker
function wdp_sitemap(){
return wp_nav_menu(array('theme_location' => 'primary_navigation', 'walker' => new wdp_sitemap_walker(), 'fallback_cb' => '', 'echo'=>false));
}
 
//extended navigation class for sitemap rendering
class wdp_sitemap_walker extends Walker_Nav_Menu
{
function start_el(&$output, $item, $depth, $args)
{
global $wp_query;
$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
$id=strtolower(str_replace(" ","-",$item->title));
$id=str_replace(array('&','&amp;'),"",$id);
$id=str_replace('--',"-",$id);
$output .= $indent . '<li id="sitemap-'. $id . '"' . $value .'>';
$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
 
//$item_output .= $args->before;
$item_output .= '<a'. $attributes .'>';
$item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
// $item_output .= $args->link_after;
$item_output .= '</a>';
//$item_output .= $args->after;
$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
}
}
