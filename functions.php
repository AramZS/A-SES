<?php

// Prioritize loading of some necessary core modules
if ( file_exists( get_template_directory() . '/lib/modules/core.redux/module.php' ) ) :
	require_once get_template_directory() . '/lib/modules/core.redux/module.php';
endif;
if ( file_exists( get_template_directory() . '/lib/modules/core/module.php' ) ) :
	require_once get_template_directory() . '/lib/modules/core/module.php';
endif;
if ( file_exists( get_template_directory() . '/lib/modules/core.layout/module.php' ) ) :
	require_once get_template_directory() . '/lib/modules/core.layout/module.php';
endif;
if ( file_exists( get_template_directory() . '/lib/modules/core.images/module.php' ) ) :
	require_once get_template_directory() . '/lib/modules/core.images/module.php';
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

function my_shoestrap_content_override() {
  echo 'This is my custom content';
}
add_action( 'shoestrap_content_override', 'my_shoestrap_content_override' );

function my_custom_before_the_content() {
  echo 'This content will appear in the beginning of the loop';
}
add_action( 'shoestrap_before_the_content', 'my_custom_before_the_content' );		  

function my_custom_bottom_content() {
  echo 'This content will appear at the very bottom of all posts';
}
add_action( 'shoestrap_in_article_bottom', 'my_custom_bottom_content' );

function tbwa_before_main() {
  echo 'This content will appear at the very bottom of all posts';
}
add_action( 'shoestrap_before_main', 'tbwa_before_main' );

function my_custom_below_top_navbar() {

get_template_part('parts/hero');


}
add_action( 'shoestrap_below_top_navbar', 'my_custom_below_top_navbar' );


function my_custom_page_content() {
  while (have_posts()) : the_post();
    the_content(); ?>
    <div class="clearfix">yolo</div>
      <?php endwhile;?>
    <div>
  </div>
  <?php
}
add_action( 'shoestrap_content_page_override', 'my_custom_page_content' );




function my_custom_pre_wrap() { ?>
<div class="page-wrap container">
<div class="row row-offcanvas row-offcanvas-left">
  

<?php get_template_part('parts/sidenav');?>


<div class="page-body col-xs-12 col-sm-8">
          <p class="pull-left visible-xs">
            <button data-toggle="offcanvas" class="btn btn-primary btn-xs" type="button">Toggle nav</button>
          </p>  
<?php
}
add_action( 'shoestrap_pre_wrap', 'my_custom_pre_wrap' );

function my_custom_after_wrap() {
  echo '';
}
add_action( 'shoestrap_after_wrap', 'my_custom_after_wrap' );


function tbwa_after_footer() {
  echo '</div></div></div>';
}
add_action( 'shoestrap_after_footer', 'tbwa_after_footer' );

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'THEMENAME' ),
) );
