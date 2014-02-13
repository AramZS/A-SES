<div class="footer-menu-container clearfix hidden-xs hidden-sm">
<?php
if ( has_nav_menu( 'footer_menu' ) ) :
  wp_nav_menu( array( 'theme_location' => 'footer_menu', 'menu_class' => 'footer-menu' ) );
endif;
?>
</div>