<div class="hidden-xs hidden-sm clearfix">
    <div class="footer-menu-container">
		<?php
        if ( has_nav_menu( 'footer_menu' ) ) :
          wp_nav_menu( array( 'theme_location' => 'footer_menu', 'menu_class' => 'footer-menu clearfix' ) );
        endif;
        ?>
    </div>
</div>