<?php if (!is_front_page()){?>
    <nav id="myNavmenu" class="navmenu navmenu-default navmenu-fixed-left offcanvas" role="navigation">
        <a id="nav-close" data-canvas=".canvas" data-target=".navmenu" data-recalc="false" data-toggle="offcanvas" class="navbar-toggle el-icon-remove-sign"></a>
        <?php /*?>
        <button id="nav-close" data-canvas=".canvas" data-target=".navmenu" data-recalc="false" data-toggle="offcanvas" class="navbar-toggle" type="button">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
        </button>
        <?php */?>
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

        <?php if ( is_page() ) { ?>
        <?php
        if($post->post_parent)
        $children = wp_list_pages('title_li=&child_of='.$post->post_parent.'&echo=0'); else
        $children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0');
        if ($children) { ?>
        
        <div class="title"><?php $parent_title = get_the_title($post->post_parent); echo $parent_title; ?><span></span></div>
        <ul class="nav navmenu-nav">
            <?php echo $children; ?>
        </ul>
        <?php } } ?>    
    </nav>

    
    <div id="side-nav-holder" class="clearfix hidden-xs">
    
        <!--this is a menu -->
        <nav id="side-nav" class="side-nav  hidden-xs" role="navigation">
          <?php if (has_nav_menu('sidenav')) :
              wp_nav_menu( array( 'theme_location' => 'sidenav', 'menu_class' => 'list-group' ) );
            endif;?>
        </nav>
        
        <!--this is a sidebar   --> 
        <div class="sidebar hidden-xs">
            <?php if ( is_active_sidebar( 'left-sidebar' )) : ?>
                <?php dynamic_sidebar('left-sidebar'); ?>
            <?php endif; ?>
        </div>

        <!--just in case we end up needing to use a custom nav walker-->
        <nav id="myNavmenu" class="navmenu navmenu-default navmenu-fixed-left offcanvas" role="navigation">
            <?php if ( is_page() ) { ?>
            <?php
            if($post->post_parent)
            $children = wp_list_pages('title_li=&child_of='.$post->post_parent.'&echo=0'); else
            $children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0');
            if ($children) { ?>
            
            <div class="title"><?php $parent_title = get_the_title($post->post_parent); echo $parent_title; ?><span></span></div>
            <ul class="nav navmenu-nav">
                <?php echo $children; ?>
            </ul>
            <?php } } ?>    
        </nav>


    </div> 
<?php } ?>
