<footer class="content-info clearfix" role="contentinfo">
  <?php if ( shoestrap_getVariable( 'site_style' ) != 'boxed'  ) : ?><div class="<?php echo shoestrap_container_class(); ?>"><?php endif; ?>
    <div class="row">
      <?php shoestrap_footer_content(); ?>
  		<?php get_template_part('parts/footer-menu');?>
		<?php get_template_part('parts/credits');?>
        <div class="hidden-md hidden-lg"><?php shoestrap_footer_html(); ?></div>
    </div>
  </div>
</footer>
