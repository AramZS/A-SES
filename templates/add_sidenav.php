<div role="navigation" id="sidebar" class="col-xs-6 col-sm-2 sidebar-offcanvas">
<?php
global $post;
if ( !is_front_page() ) {
?>
<div id="mobile-nav" class="hidden-md hidden-lg clearfix">
    <nav id="sidenav" class="mobile-main" role="navigation">
      <?php
        if (has_nav_menu('side_menu')) :
          wp_nav_menu( array( 'theme_location' => 'side_menu', 'menu_class' => shoestrap_nav_class_pull() ) );
        endif;
      ?>
    </nav>
</div> 
  <div class="list-group">
    <a class="list-group-item active" href="#">Link</a>
    <a class="list-group-item" href="#">Link</a>
    <a class="list-group-item" href="#">Link</a>
    <a class="list-group-item" href="#">Link</a>
    <a class="list-group-item" href="#">Link</a>
    <a class="list-group-item" href="#">Link</a>
    <a class="list-group-item" href="#">Link</a>
    <a class="list-group-item" href="#">Link</a>
    <a class="list-group-item" href="#">Link</a>
    <a class="list-group-item" href="#">Link</a>
  </div>
<?php } ?>
</div><!--/span-->
