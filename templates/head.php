<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php wp_title('|', true, 'right'); ?></title>
<?php if ( shoestrap_getVariable( 'site_style' ) != 'static' ): ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
<?php endif; ?>
	<?php
    // we need to fire the nav menu before the body tag so we can assign has-sub-menu class in order show/hid toggle side nav
    // props to s_ha_dum
    // http://wordpress.stackexchange.com/questions/114102/update-body-class-based-on-menu?rq=1
        ob_start();
        wp_nav_menu();
        $my_captured_menu = ob_get_contents();
        ob_end_clean();
    ?>
  <?php wp_head(); ?>
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
  	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/html5shiv.js"></script>
  	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/respond.min.js"></script>
	<![endif]-->

  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
</head>
