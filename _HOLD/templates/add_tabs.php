<div class="tabber">
    <ul class="nav nav-tabs" id="myTab">
        <?php
		$firstMarked = false;
        $the_query = new WP_Query( 'post_type=home-tab&posts_per_page=4&order=asc' );
        while ( $the_query->have_posts() ) : $the_query->the_post();
        ?>    
        <li class="<?php echo !$firstMarked ? "active":"";?>">
            <a href="#<?php global $post; echo $post->post_name; ?>" data-toggle="tab"><?php the_title(); ?></a>
        </li>
        <?php $firstMarked = true;
        endwhile; wp_reset_postdata(); ?>
    </ul>
    <div class="tab-content">
		<?php
        $firstMarked = false;
        $the_query = new WP_Query( 'post_type=home-tab&posts_per_page=4&order=asc' );
        while ( $the_query->have_posts() ) : $the_query->the_post();
        ?>    
            <div class="tab-pane fade clearfix <?php echo !$firstMarked ? "in active":"";?>" id="<?php global $post; echo $post->post_name; ?>">
                    <div class="tab-wide">
                        <h3 class="tab-header"><?php more_fields('left-title'); ?></h3>
                        <img src="<?php more_fields('left-image-url'); ?>" width="428" height="144" />
                        <?php more_fields('left-content'); ?>
                        <?php /*?><p class="arrow"><a href=""><span class="el-icon-chevron-right"></span>More information</a></p><?php */?>
                    </div>
                    <div class="tab-narrow">
                        <h3 class="tab-header"><?php more_fields('right-title'); ?></h3>
                        <img src="<?php more_fields('right-image-url'); ?>" width="280" height="144" />
                        <?php more_fields('right-content'); ?>
                        <?php /*?><p class="arrow"><a href=""><span class="el-icon-chevron-right"></span>More information</a></p><?php */?>
                    </div>
            </div><!--tab pane-->
            <?php $firstMarked = true;
            endwhile; wp_reset_postdata(); ?>
    </div><!--tab content-->
</div>

<script>
//$('.nav-tabs > li').first().addClass('active');
//$('.tab-pane').first().addClass('in active');
$('.nav-tabs > li > a').hover( function(){
      $(this).tab('show');
});

</script>