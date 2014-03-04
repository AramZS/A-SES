<footer class="content-info clearfix" role="contentinfo">
  <?php if ( shoestrap_getVariable( 'site_style' ) != 'boxed'  ) : ?><div class="<?php echo shoestrap_container_class(); ?>"><?php endif; ?>
    <div class="row">
        <div class="hidden-xs hidden-sm clearfix">		 
			<?php if (is_front_page()) { ?>
				<?php if ( is_active_sidebar( 'footer-widgets-1' ) ) : ?>
                <div id="footer-widgets-1" class="footer-widgets clearfix">
                    <?php dynamic_sidebar( 'footer-widgets-1' ); ?>
                </div>
                <?php endif; ?>
			<?php }?>

			<?php if ( is_active_sidebar( 'footer-widgets-2' ) ) : ?>
                <div id="footer-widgets-2" class="footer-widgets clearfix">
                    <?php dynamic_sidebar( 'footer-widgets-2' ); ?>
                </div>
            <?php endif; ?>

			<?php if ( is_active_sidebar( 'footer-widgets-3' ) ) : ?>
                <div id="footer-widgets-3" class="footer-widgets clearfix">
                    <?php dynamic_sidebar( 'footer-widgets-3' ); ?>
                </div>
            <?php endif; ?>            
        </div>
        <div class="hidden-md hidden-lg clearfix">
			<?php if ( is_active_sidebar( 'mobile-footer-widgets' ) ) : ?>
                <div class="footer-widgets">
                    <?php dynamic_sidebar( 'mobile-footer-widgets' ); ?>
                </div>
            <?php endif; ?>    
        </div>
        <div class="hidden-md hidden-lg">
			<?php shoestrap_footer_html(); ?>
        </div>
    </div>
  </div>
</footer>