<?php /*?><div class="tabber">
    <ul class="nav nav-tabs" id="myTab">
      <li><a href="#home" data-toggle="tab">Home</a></li>
      <li><a href="#profile" data-toggle="tab">Profile</a></li>
      <li><a href="#messages" data-toggle="tab">Messages</a></li>
      <li><a href="#settings" data-toggle="tab">Settings</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane fade in active" id="home">...</div>
      <div class="tab-pane fade" id="profile">...</div>
      <div class="tab-pane fade" id="messages">...</div>
      <div class="tab-pane fade" id="settings">the last shall be first </div>
    </div>
</div><?php */?>
<style>
.nav-tabs > li {
    width: 25%;
}
.nav-tabs > li > a {
    padding: 0.5em;
}
</style>
<div class="tabber">

<ul class="nav nav-tabs" id="myTab">
<?php
$the_query = new WP_Query( 'post_type=home-tab&posts_per_page=4&order=asc' );
while ( $the_query->have_posts() ) : $the_query->the_post();
?>    
    
<li><a href="#<?php global $post; echo $post->post_name; ?>" data-toggle="tab"><?php the_title(); ?></a></li>

<?php endwhile; wp_reset_postdata(); ?>
</ul>
    
    
    
<div class="tab-content">
<?php
$the_query = new WP_Query( 'post_type=home-tab&posts_per_page=4&order=asc' );
while ( $the_query->have_posts() ) : $the_query->the_post();
?>    

<div class="tab-pane fade clearfix" id="<?php global $post; echo $post->post_name; ?>">

<div class="row">
  <div class="col-md-7">

<h3><?php more_fields('left-title'); ?></h3>
<img src="<?php more_fields('left-image-url'); ?>" width="428" height="144" />
<?php more_fields('left-content'); ?>  

  
  </div>
  <div class="col-md-5">

<h3><?php more_fields('right-title'); ?></h3>
<img src="<?php more_fields('right-image-url'); ?>" width="280" height="144" />
<?php more_fields('right-content'); ?>  
  
  </div>
</div>

      
</div><!--tab pane-->
<?php endwhile; wp_reset_postdata(); ?>
</div><!--tab content-->

</div>

<script>
$('.nav-tabs > li').first().addClass('active');
$('.tab-pane').first().addClass('in active');
$('.nav-tabs > li > a').hover( function(){
      $(this).tab('show');
});
</script>
<?php /*?>  
    <div class="tabber">

            	<?php

				$the_query = new WP_Query( 'post_type=home-tab&posts_per_page=4&order=asc' );

				while ( $the_query->have_posts() ) : $the_query->the_post();

				?>

            	<div class="tabbertab">

                 	<h2><?php the_title(); ?></h2>

                    <div class="tab-wide">

                        <h3><?php more_fields('left-title'); ?></h3>

                        <img src="<?php more_fields('left-image-url'); ?>" width="428" height="144" />

                        <?php more_fields('left-content'); ?>

                    </div>

                    <div class="tab-narrow">

                        <h3><?php more_fields('right-title'); ?></h3>

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

        	<h3>Top News</h3>

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
        
      
 <div id="skrollr-body">
<?php
$i = 1;
$all_pages = new WP_Query(array('post_type' => 'fp-sections', 'order' => 'ASC', 'orderby' => 'menu_order', 'posts_per_page' => -1));
while ($all_pages->have_posts()) : $all_pages->the_post(); 
?>
<section id="<?php echo $post->post_name; ?>" class="section-wrap-<?php echo $i;?> clearfix">
    <div class="section-body"
    style=" <?php section_bg_img();?> 
            background-repeat:no-repeat;
            background-size:cover;
            <?php section_bg_color();?>
            <?php //section_bg_color();?>
            <?php //section_bg_repeat();?>">
        <div class="section-main
        <?php if (!get_post_meta($post->ID, '_cmb_section_width', true)) {
            echo 'box-width '; 
        } else {
            echo 'full-width '; }?>">

            <div class="section-title"><?php the_title();?></div>
            <div class="section-content"><?php the_content(); ?></div>         
        </div> 
    </div> 
</section>
<?php $i++;?>
<?php endwhile; wp_reset_postdata(); ?>
</div>
<?php get_template_part('parts/vid4');?><?php */?>       