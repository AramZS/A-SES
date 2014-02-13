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
   