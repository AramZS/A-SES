<?php global $ss_framework; ?>
<footer id="normal-footer" class="normal-footer" role="contentinfo">
	<?php echo $ss_framework->open_container( 'div' ); ?>
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
	<?php echo $ss_framework->close_container( 'div' ); ?>
</footer>
<footer id="mobile-footer" class="mobile-footer visible-xs clearfix" role="contentinfo">
	<?php echo $ss_framework->open_container( 'div' ); ?>
		<aside id="mobile-widgets" class="sidebar">
        	<?php if ( is_active_sidebar( 'mobile-footer-widgets' ) ) : ?>
				<?php dynamic_sidebar( 'mobile-footer-widgets' ); ?>
            <?php endif; ?>    
        </aside>
        <div class="footer-html">
			<?php shoestrap_footer_content(); ?>
        </div>
	<?php echo $ss_framework->close_container( 'div' ); ?>        
</footer>
<a href="#" class="scroll-up"><span><i class="fa fa-caret-up"></i></span></a>