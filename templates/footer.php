<footer id="normal-footer" class="hidden-xs clearfix" role="contentinfo">
  <?php if ( shoestrap_getVariable( 'site_style' ) != 'boxed'  ) : ?><div class="<?php echo shoestrap_container_class(); ?>"><?php endif; ?>
    <div class="row">
        <div id="footer-widgets" class=" clearfix">		 
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
        <div class="footer-html">
			<?php //shoestrap_footer_html(); ?>
        </div>
    </div>
  </div>
</footer>
<footer id="mobile-footer" class="mobile-footer visible-xs clearfix" role="contentinfo">
  <?php if ( shoestrap_getVariable( 'site_style' ) != 'boxed'  ) : ?><div class="<?php echo shoestrap_container_class(); ?>"><?php endif; ?>
    <div class="row">
        <aside id="mobile-widgets" class="siderbar">
			<?php if ( is_active_sidebar( 'mobile-footer-widgets' ) ) : ?>
				<?php dynamic_sidebar( 'mobile-footer-widgets' ); ?>
            <?php endif; ?>    
        </aside>
        <div class="footer-html">
			<?php shoestrap_footer_html(); ?>
        </div>
    </div>
  </div>
</footer>