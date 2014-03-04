<?php
function tbwa_below_top_navbar() {
	if (is_front_page()) {
		get_template_part('templates/add_hero');
	}
	get_template_part('templates/add_mobilenav');
}
add_action( 'shoestrap_below_top_navbar', 'tbwa_below_top_navbar' );



function my_custom_pre_wrap() {
	echo '<div class="page-wrap container boxed-container">';
	echo '<div class="row row-offcanvas row-offcanvas-left">';
	
	get_template_part('templates/add_sidenav');
	
	echo '<div class="page-body col-xs-12 col-sm-9 col-md-10">';

	if ( !is_front_page() ) {
	 get_template_part('templates/add_togglenav');
	}
}
add_action( 'shoestrap_pre_wrap', 'my_custom_pre_wrap' );


//function my_custom_after_wrap() {
//}
//add_action( 'shoestrap_after_wrap', 'my_custom_after_wrap' );


function tbwa_after_footer() {
  echo '</div></div></div>';
}
add_action( 'shoestrap_after_footer', 'tbwa_after_footer' );