<?php get_header(); ?>
            <div class="tabber">
            	<?php
				$the_query = new WP_Query( 'post_type=home-tab&posts_per_page=4&order=asc' );
				while ( $the_query->have_posts() ) : $the_query->the_post();
				?>
            	<div class="tabbertab">
                 	<h2><?php the_title(); ?></h2>
                    <div class="tab-wide">
                        <h1><?php more_fields('left-title'); ?></h1>
                        <img src="<?php more_fields('left-image-url'); ?>" width="428" height="144" />
                        <?php more_fields('left-content'); ?>
                    </div>
                    <div class="tab-narrow">
                        <h1><?php more_fields('right-title'); ?></h1>
                        <img src="<?php more_fields('right-image-url'); ?>" width="280" height="144" />
                        <?php more_fields('right-content'); ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <div class="clearfix"></div>
        </div>
        
        <div class="box width-200 left">
        	<?php if ( ! dynamic_sidebar( 'home-bottom-left-box' ) ) :  endif; ?>
        </div>
        <div class="box width-525">
        	<h1>Top News</h1>
            <?php
			$the_query = new WP_Query( 'cat=4&posts_per_page=3' );
			
			while ( $the_query->have_posts() ) : $the_query->the_post();
				echo '<p><a href="';
				the_permalink();
				echo '">';
				the_title();
				echo '</a></p>';
			endwhile;
			
			wp_reset_postdata();
			?>
            <p class="arrow"><a href="/press/">Related News</a></p>
        </div>
<?php get_footer(); ?>
