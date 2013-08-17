<?php get_header(); ?>
<?php if ( function_exists('yoast_breadcrumb') ) {
	yoast_breadcrumb('<div id="breadcrumbs">','</div>');
} ?>
            <div id="text">
            	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                <?php endwhile; else: ?>
                    <h1>Not Found</h1>
                    <p>
                        <?php _e('Sorry, you\'re looking for something that is not at this URL.  Please try again using the navigation above.'); ?>
                    </p>
      			<?php endif; ?>
                
                <?php if (is_page(6)) { ?>
                	<ul class="plain">
						<?php query_posts("showposts=100&cat=4"); if (have_posts()) : while (have_posts()) : the_post(); ?>

            	<li><strong><?php the_date(); ?><br /><a href="<?php the_permalink(); ?>"><em><?php the_title(); ?></em></a></strong></li>
			<?php endwhile; endif; ?>
            <?php wp_reset_query(); ?>
            </ul>
                <?php } ?>
            </div> <!-- END #text -->
            
            
            <div id="sidebar">
            	<?php if (is_tree('14')) { if ( ! dynamic_sidebar( 'about-sidebar' ) ) :  endif; }
					elseif (is_page('3') || is_page(91)) { if ( ! dynamic_sidebar( 'bandwidth-sidebar' ) ) :  endif; }
					elseif (is_page('95')) { if ( ! dynamic_sidebar( 'launches-sidebar' ) ) :  endif; }
					elseif (is_page('97')) { if ( ! dynamic_sidebar( 'teleports-sidebar' ) ) :  endif; }
					elseif (is_page('5')) { if ( ! dynamic_sidebar( 'hosted-payloads-sidebar' ) ) :  endif; }
					elseif (is_page('1690')) { if ( ! dynamic_sidebar( 'uav-sidebar' ) ) :  endif; }
					elseif (is_page('6') || in_category('4')) { if ( ! dynamic_sidebar( 'press-sidebar' ) ) :  endif; }
                    elseif (is_page('2155')) { if ( ! dynamic_sidebar( 'press-sidebar' ) ) :  endif; }
                    elseif (is_page('1962')) { if ( ! dynamic_sidebar( 'press-sidebar' ) ) :  endif; }
                    elseif (is_page('2408')) { if ( ! dynamic_sidebar( 'press-sidebar' ) ) :  endif; }
					elseif (is_page('7')) { if ( ! dynamic_sidebar( 'contact-sidebar' ) ) :  endif; }
					elseif (is_page('1395')) { if ( ! dynamic_sidebar( 'fcsa-sidebar' ) ) :  endif; }
					elseif (is_page('110')) { if ( ! dynamic_sidebar( 'contract-vehicles-sidebar' ) ) :  endif; }
                    elseif (is_page('2274')) { if ( ! dynamic_sidebar( 'cs2-sidebar' ) ) :  endif; }
					 ?>
            </div> <!-- END SIDEBAR -->
                
            <div class="clearfix"></div>
        </div> <!-- END #content -->
<?php get_footer(); ?>