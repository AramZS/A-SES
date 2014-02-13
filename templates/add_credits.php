<div id="fin" class="row hidden-xs hidden-sm">
    <div class="fin-credits col-md-6"><p>Copyright © 2005–2013 SES Government Solutions</p>     
    </div>
    <div class="fin-menu col-md-3">
    <?php
    if ( has_nav_menu( 'credits_menu' ) ) :
      wp_nav_menu( array( 'theme_location' => 'credits_menu', 'menu_class' => 'credits-menu' ) );
    endif;
    ?>
    </div>
    <div class="fin-social col-md-3">
		<?php get_template_part('parts/social'); ?>
    </div>
</div>