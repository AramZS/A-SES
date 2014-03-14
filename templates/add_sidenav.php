<div role="navigation" id="left-sidebar" class="col-xs-6 col-sm-2 sidebar-offcanvas">
<?php
if ( !is_front_page() ) {
?>
<div id="side-nav-holder" class="clearfix">


<nav id="myNavmenu" class="navmenu navmenu-default navmenu-fixed-left offcanvas" role="navigation">
<button id="nav-close" data-canvas=".canvas" data-target=".navmenu" data-recalc="false" data-toggle="offcanvas" class="navbar-toggle" type="button">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
</button>
  <a class="navmenu-brand" href="#">Brand</a>
  <ul class="nav navmenu-nav">
    <li class="active"><a href="#">Home</a></li>
    <li><a href="#">Link</a></li>
    <li><a href="#">Link</a></li>
    <li class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="http://jasny.github.io/bootstrap/examples/navmenu-reveal/#">Dropdown <b class="caret"></b></a>
          <ul class="dropdown-menu navmenu-nav">
            <li><a href="http://jasny.github.io/bootstrap/examples/navmenu-reveal/#">Action</a></li>
            <li><a href="http://jasny.github.io/bootstrap/examples/navmenu-reveal/#">Another action</a></li>
            <li><a href="http://jasny.github.io/bootstrap/examples/navmenu-reveal/#">Something else here</a></li>
            <li class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="http://jasny.github.io/bootstrap/examples/navmenu-reveal/#">Separated link</a></li>
            <li><a href="http://jasny.github.io/bootstrap/examples/navmenu-reveal/#">One more separated link</a></li>
          </ul>
        </li>
  </ul>
</nav>
<?php /*?><div class="navbar navbar-default navbar-fixed-top">
  <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target="#myNavmenu" data-canvas="body">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
</div><?php */?>



<?php /*?>    <nav id="side-nav" class="side-nav" role="navigation">
      <?php
        if (has_nav_menu('sidenav')) :
          wp_nav_menu( array( 'theme_location' => 'sidenav', 'menu_class' => 'list-group' ) );
        endif;
      ?>
    </nav><?php */?>
</div> 
<div class="slide navmenu-fixed-left offcanvas-sm">
      <?php
//	                      if (has_nav_menu('primary_navigation')) :
//                      wp_nav_menu( array( 'theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav' ));
//                    endif;
					
//        if (has_nav_menu('sidenav')) :
//          wp_nav_menu( array( 'theme_location' => 'sidenav', 'menu_class' => 'nav navmenu-nav', 'depth'	=> 2 ) );
//        endif;
     

//	global $post;
//	
//	if ( is_page() && wap8_has_children( $post->ID ) == '1' || wap8_has_siblings() == '1' ) {
//	
//		 if ( $post->post_parent ) {
//	
//			  $args = array(
//				   'sort_column' => 'menu_order',
//				   'title_li'    => '',
//				   'child_of'    => $post->post_parent,
//				   'echo'        => 1
//			  );
//	
//		 } else {
//	
//			  $args = array(
//				   'sort_column' => 'menu_order',
//				   'title_li'    => '',
//				   'child_of'    => $post->ID,
//				   'echo'        => 1
//			  );
//	
//		 }
//	
//		 echo "<ul>\n";
//		 wp_list_pages( $args );
//		 echo "</ul>\n";
//	
//	}	 
//		 
	 
	  ?>

</div>
<?php /*?>
<div class="navbar navbar-default navbar-fixed-top hidden-md hidden-lg">
  <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".slide">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="#">Project name</a>
</div>

  <div class="side-nav list-group">
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
  </div><?php */?>
  


 
<?php /*?><div class="slide navmenu-fixed-left offcanvas-sm">
  <a class="navmenu-brand visible-md visible-lg" href="#">Project name</a>
  <ul class="nav navmenu-nav">
    <li class="active"><a href="http://jasny.github.io/bootstrap/examples/navmenu/">Slide in</a></li>
    <li><a href="http://jasny.github.io/bootstrap/examples/navmenu-push/">Push</a></li>
    <li><a href="http://jasny.github.io/bootstrap/examples/navmenu-reveal/">Reveal</a></li>
  </ul>
  <ul class="nav navmenu-nav">
    <li><a href="#">Link</a></li>
    <li><a href="#">Link</a></li>
    <li><a href="#">Link</a></li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
      <ul class="dropdown-menu navmenu-nav">
        <li><a href="#">Action</a></li>
        <li><a href="#">Another action</a></li>
        <li><a href="#">Something else here</a></li>
        <li class="divider"></li>
        <li class="dropdown-header">Nav header</li>
        <li><a href="#">Separated link</a></li>
        <li><a href="#">One more separated link</a></li>
      </ul>
    </li>
  </ul>
</div>

<div class="navbar navbar-default navbar-fixed-top hidden-md hidden-lg">
  <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".slide">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="#">Project name</a>
</div>
<?php */?>
  
<?php } ?>
</div><!--/span-->
