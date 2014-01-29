<?php
/*-----------------------------------------------------------------------------------*/
/* TITLES
/*-----------------------------------------------------------------------------------*/

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




function tbwa_below_top_navbar() {
if (is_front_page()) {
	get_template_part('parts/hero');
}}

add_action( 'shoestrap_below_top_navbar', 'tbwa_below_top_navbar' );







function my_custom_pre_wrap() { ?>
<div class="page-wrap container">
<div class="row row-offcanvas row-offcanvas-left">
  

<?php get_template_part('parts/sidenav');?>


<div class="page-body col-xs-12 col-sm-9 col-md-9">
    <p class="pull-left visible-xs">
    <button data-toggle="offcanvas" class="btn btn-primary btn-xs" type="button">Toggle nav</button>
    </p>  
<?php
}
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

