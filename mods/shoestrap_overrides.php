<?php
function tbwa_below_top_navbar() {
if (is_front_page()) {
	get_template_part('parts/hero');
}

get_template_part('parts/mobilenav');

}
add_action( 'shoestrap_below_top_navbar', 'tbwa_below_top_navbar' );



function my_custom_pre_wrap() { ?>

<div class="page-wrap container">
<div class="row row-offcanvas row-offcanvas-left">


<?php get_template_part('parts/sidenav');?>


<div class="page-body col-xs-12 col-sm-9 col-md-9">

<?php
global $post;
if ( !is_front_page() ) {
echo get_template_part('parts/togglenav');
}
?>   
<?php }
add_action( 'shoestrap_pre_wrap', 'my_custom_pre_wrap' );

//*
function my_custom_after_wrap() {
  echo '';
}
add_action( 'shoestrap_after_wrap', 'my_custom_after_wrap' );

//*
function tbwa_after_footer() {
  echo '</div></div></div>';
}
add_action( 'shoestrap_after_footer', 'tbwa_after_footer' );