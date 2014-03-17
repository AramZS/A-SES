<?php
//
function tbwa_below_top_navbar() {
	if (is_front_page()) {
		get_template_part('templates/add_hero');
	}
	get_template_part('templates/add_mobilenav');
}
add_action( 'shoestrap_below_top_navbar', 'tbwa_below_top_navbar' );
//
function my_custom_pre_wrap() {
	echo '<div class="page-wrap container boxed-container">';
	echo '<div class="row-offcanvas-left">';
	echo '<div id="left" class="left-sidebar sm-offset">';
		get_template_part('templates/add_sidenav');
	echo '</div>';
	echo '<div class="page-body lg-offset">';

	if ( !is_front_page() ) {
	 get_template_part('templates/add_togglenav');
	}
}
add_action( 'shoestrap_pre_wrap', 'my_custom_pre_wrap' );
//
function tbwa_after_footer() {
  echo '</div></div></div>';
}
add_action( 'shoestrap_after_footer', 'tbwa_after_footer' );