<?php ss_get_template_part( 'templates/head' ); ?>
<body <?php body_class(); ?>>
<?php global $ss_framework; ?>

	<!--[if lt IE 8]>
		<?php echo $ss_framework->alert( 'warning', __(' You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'shoestrap' ) ); ?>
	<![endif]-->

	<?php do_action( 'get_header' ); ?>

	<?php do_action( 'shoestrap_pre_top_bar' ); ?>

	<?php //ss_get_template_part( apply_filters( 'shoestrap_top_bar_template', 'templates/top-bar' ) ); ?>
     <!-- let's add our own header -->
    <?php get_template_part( 'parts/custom-header' ); ?>
    <!-- and our mobile menus -->
    <?php get_template_part( 'parts/add_mobilenav' ); ?>
    <!-- and our hero/jumbotron unit -->
    <?php get_template_part( 'parts/add_hero' ); ?>

    <div class="page-wrap container boxed-container"><!-- this is a custom wrap class -->

        <div id="left" class="left-sidebar sm-offset">
            <?php get_template_part( 'parts/add_sidenav' ); ?>
        </div>

        <div class="page-body lg-offset">
		<!-- let's add our nav toggle here above the page header -->
		<?php if ( !is_front_page()) { get_template_part('parts/add_nav_toggle'); }?>
    
			<?php /*?><?php echo $ss_framework->open_container( 'div', 'wrap-main-section', 'wrap main-section' ); ?><?php */?>
            <div id="wrap-main-section" class="clearfix wrap main-section"><!-- just in case there's a class change/deprecation in the future -->
            <?php //do_action( 'shoestrap_pre_wrap' ); ?>
            <?php breadcrumb_switch(); ?><!-- because we wrote a switch involving custom & native breadcrumbs -->


		<?php do_action( 'shoestrap_pre_content' ); ?>

		<div id="content" class="content">
			<?php //echo $ss_framework->open_row( 'div', null, 'bg' ); ?><!-- row bg unecessary element -->

				<?php do_action( 'shoestrap_pre_main' ); ?>

				<main class="main <?php shoestrap_section_class( 'main', true ); ?>" <?php if ( is_home() ) { echo 'id="home-blog"'; } ?> role="main">
					<?php include shoestrap_template_path(); ?>
				</main><!-- /.main -->

				<?php do_action( 'shoestrap_after_main' ); ?>

				<?php if ( shoestrap_display_primary_sidebar() ) : ?>
					<aside id="sidebar-primary" class="sidebar <?php shoestrap_section_class( 'primary', true ); ?>" role="complementary">
						<?php if ( ! has_action( 'shoestrap_sidebar_override' ) ) {
							include shoestrap_sidebar_path();
						} else {
							do_action( 'shoestrap_sidebar_override' );
						} ?>
					</aside><!-- /.sidebar -->
				<?php endif; ?>

				<?php do_action( 'shoestrap_post_main' ); ?>

				<?php if ( shoestrap_display_secondary_sidebar() ) : ?>
					<aside id="sidebar-secondary" class="sidebar secondary <?php shoestrap_section_class( 'secondary', true ); ?>" role="complementary">
						<?php dynamic_sidebar( 'sidebar-secondary' ); ?>
					</aside><!-- /.sidebar -->
				<?php endif; ?>
				<?php echo $ss_framework->clearfix(); ?>
			<?php //echo $ss_framework->close_row( 'div' ); ?><!-- row bg unecessary element -->
		</div><!-- /.content -->
		<?php do_action( 'shoestrap_after_content' ); ?>
	<?php echo $ss_framework->close_container( 'div' ); ?><!-- /.wrap -->

	<?php if ( !is_front_page()) { get_template_part('parts/add_slidenav'); }?><!--finally we add our mmenu here so it doesn't show during load-->

	<?php

	do_action( 'shoestrap_pre_footer' );

	if ( ! has_action( 'shoestrap_footer_override' ) ) {
		ss_get_template_part( 'templates/footer' );
	} else {
		do_action( 'shoestrap_footer_override' );
	}

	do_action( 'shoestrap_after_footer' );

	wp_footer();

	?>
</div><!-- page wrap -->
</div><!-- page body -->
</body>
</html>
