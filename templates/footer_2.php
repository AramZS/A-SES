<footer class="content-info clearfix" role="contentinfo">
  <?php if ( shoestrap_getVariable( 'site_style' ) != 'boxed'  ) : ?><div class="<?php echo shoestrap_container_class(); ?>"><?php endif; ?>
    <div class="row">
        <div class="hidden-xs hidden-sm clearfix">		 
			<?php if (is_front_page()) { ?>
            <div class="footer-widgets">
            <?php shoestrap_footer_content(); ?>
			</div>
			<?php }?>
            <?php get_template_part('templates/add_footer-menu');?>
            <?php get_template_part('templates/add_credits');?>
        </div>
        <div class="hidden-md hidden-lg">
			<?php get_template_part('templates/add_mobilefooterwidgets');?>
        </div>
        <div class="hidden-md hidden-lg">
			<?php shoestrap_footer_html(); ?>
        </div>
    </div>
  </div>
</footer>