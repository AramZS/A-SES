<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php wp_title(''); ?></title>
<link rel="shortcut icon" href="/favicon.gif" />
<link rel="ico" type="image/ico" href="/favicon.gif" />
<!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="/ie.css" />
<![endif]-->
<!--[if IE 8]>
        <link rel="stylesheet" type="text/css" href="/ie8.css" />
<![endif]-->
<!--[if IE 6]>
        <link rel="stylesheet" type="text/css" href="/ie6.css" />
<![endif]-->
<?php wp_head(); ?>
<meta name="google-site-verification" content="8aovqRt8iau3ij0u-_uha0um_lKM-39FPFhJTKmgX-8" />
<script type="text/javascript">
var fb_param = {};
fb_param.pixel_id = '6008475335185';
fb_param.value = '0.00';
fb_param.currency = 'USD';
(function(){
  var fpw = document.createElement('script');
  fpw.async = true;
  fpw.src = '//connect.facebook.net/en_US/fp.js';
  var ref = document.getElementsByTagName('script')[0];
  ref.parentNode.insertBefore(fpw, ref);
})();
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/offsite_event.php?id=6008475335185&amp;value=0&amp;currency=USD" /></noscript>
</head>

<body id="<?php if (is_front_page()) echo 'home'; else echo 'inner'; ?>">
<a href="/"><img src="<?php echo get_template_directory_uri(); ?>/i/logo.png" width="125" height="76" id="logo" alt="SES U.S. Government Solutions" /></a>

<?php if (is_front_page()) { ?>

	<div id="feature">
	 <?php
			$the_query = new WP_Query( 'cat=3' );
			
			while ( $the_query->have_posts() ) : $the_query->the_post();
				$link = get_post_meta($post->ID,'link',true);
				if ($link != null ) {
					echo'<a href="' . $link . '">'; }
				if ( has_post_thumbnail() ) { the_post_thumbnail('inner-thumbnail'); }
				if ($link != null ) {
					echo '</a>'; }
			endwhile;
			
			wp_reset_postdata();
			?>
</div>
<div id="feature-wrapper">
</div>
<?php } ?>


<div id="shell">
	<?php if (is_tree('14')) { wp_nav_menu(  array( 'theme_location' => 'about-nav', 'container_class' => '', 'container_id' => '', 'before' => '', 'after' => '', 'menu_class' =>'', 'menu_id' => 'side-nav' )); } else if (is_tree('3')) { wp_nav_menu(  array( 'theme_location' => 'bandwidth-nav', 'container_class' => '', 'container_id' => '', 'before' => '', 'after' => '', 'menu_class' =>'', 'menu_id' => 'side-nav' )); } else if (is_tree('6') || is_tree('1962')) { wp_nav_menu(  array( 'theme_location' => 'press-nav', 'container_class' => '', 'container_id' => '', 'before' => '', 'after' => '', 'menu_class' =>'', 'menu_id' => 'side-nav' )); } else if (is_tree('1395')) { wp_nav_menu(  array( 'theme_location' => 'fcsa-nav', 'container_class' => '', 'container_id' => '', 'before' => '', 'after' => '', 'menu_class' =>'', 'menu_id' => 'side-nav' )); }?>
    <div id="wrapper">
	<?php if (is_front_page()) echo "<div id='header-tagline'>SES Government Solutions formerly known as Americom Government Services (AGS)</div>"; ?>
        <div id="content">
            <?php wp_nav_menu(  array( 'theme_location' => 'main-nav', 'container_class' => '', 'container_id' => 'nav', 'before' => '', 'after' => '', 'menu_class' =>'', 'menu_id' => '' ));  ?>