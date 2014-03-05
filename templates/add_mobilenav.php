<div id="mobile-nav" class="visible-xs clearfix">
    <div class="m-nav-container">
        <nav id="mobile-nav-1" class="mobile-nav" role="navigation">
          <?php
            if (has_nav_menu('mobile_menu1')) :
              wp_nav_menu( array( 'theme_location' => 'mobile_menu1', 'menu_class' => 'horizontal-nav' ) );
            endif;
          ?>
        </nav>
    </div>
   <div class="m-nav-container">
       <nav id="mobile-nav-2" class="mobile-nav" role="navigation">
          <?php
            if (has_nav_menu('mobile_menu2')) :
              wp_nav_menu( array( 'theme_location' => 'mobile_menu2', 'menu_class' => 'horizontal-nav' ) );
            endif;
          ?>
        </nav>
    </div>        
</div> 