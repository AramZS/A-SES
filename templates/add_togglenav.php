<?php 
$children = get_pages('child_of='.$post->ID);
if( count( $children ) != 0 ) {  
if (is_page()) { ?> 
    <div class="main-wrap clearfix">
        <div id="slide-nav" class="navbar navbar-default visible-xs">
            <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-recalc="false" data-target=".navmenu" data-canvas=".canvas">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
        </div>
    </div>
<?php }} ?>