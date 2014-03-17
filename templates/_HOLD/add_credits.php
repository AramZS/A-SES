<div id="fin" class="row hidden-xs hidden-sm clearfix">
    <div class="fin-credits col-md-5">
        <p class="copyright">
        <?php //echo comicpress_copyright(); ?>
        Copyright &copy; 2005 &ndash; <?php echo date('Y'); ?> SES Government Solutions
        </p>
    </div>
    <div class="fin-menu col-md-3">
    <?php
    if ( has_nav_menu( 'credits_menu' ) ) :
      wp_nav_menu( array( 'theme_location' => 'credits_menu', 'menu_class' => 'credits-menu' ) );
    endif;
    ?>
    </div>
    <div class="fin-social col-md-4">
		<?php get_template_part('templates/add_social'); ?>
    </div>
</div>