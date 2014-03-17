<?php 
if (is_page()) { 
if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary_navigation' ) ) { 
?> 
    <div class="slide-nav-wrap clearfix">
        <div id="slide-nav" class="navbar navbar-default visible-xs">
            <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-recalc="false" data-target=".navmenu" data-canvas=".canvas">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
        </div>
    </div>
<?php } } ?>