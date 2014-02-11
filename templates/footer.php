<footer class="content-info clearfix" role="contentinfo">
  <?php if ( shoestrap_getVariable( 'site_style' ) != 'boxed'  ) : ?><div class="<?php echo shoestrap_container_class(); ?>"><?php endif; ?>
    <div class="row">
        <div class="hidden-xs hidden-sm">		 
		<?php if (is_front_page()) { shoestrap_footer_content(); }?>
  		<?php get_template_part('parts/footer-menu');?>
		<?php get_template_part('parts/credits');?>
        </div>
       
        <div class="hidden-md hidden-lg">
		<?php get_template_part('parts/mobilefooterwidgets');?>
        </div>
        
		


<?php /*?>		
		<?php shoestrap_footer_content(); ?>
  		<?php get_template_part('parts/footer-menu');?>
		<?php get_template_part('parts/credits');?>
<?php */?>
        <div class="hidden-md hidden-lg"><?php shoestrap_footer_html(); ?></div>
    </div>
  </div>
</footer>
