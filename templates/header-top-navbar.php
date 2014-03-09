<header class="banner <?php echo shoestrap_navbar_class(); ?>" role="banner">
	<?php /*?><div class="<?php echo shoestrap_navbar_container_class(); ?>"><?php */?>
        <div class="navbar-header">
<?php /*?>      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-main, .nav-extras">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php */?>
<div class="row">
        <div class="col-xs-6 col-sm-2 sidebar-offcanvas">
            <a id="navbar-brand" class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img alt="ses" src="<?php echo get_stylesheet_directory_uri()?>/i/logo.png" id="site-logo">
            </a>
        </div>
        <div class="page-body col-xs-12 col-sm-9 col-md-10  hidden-xs">
        <div class="container">
        
            <div class="tagline">
                <div class="tagline-txt"><?php if (is_front_page()) echo "SES Government Solutions, formerly known as Americom Government Services (AGS)"; ?></div>
            </div>
            <div class="nav-holder">
            <div class="front-bump-shadow"></div>        
                <nav class="nav-main navbar-collapse collapse" role="navigation">
                  <?php
                    do_action( 'shoestrap_inside_nav_begin' );
                    if (has_nav_menu('primary_navigation')) :
                      wp_nav_menu( array( 'theme_location' => 'primary_navigation', 'menu_class' => shoestrap_nav_class_pull() ) );
                    endif;
                    do_action( 'shoestrap_inside_nav_end' );
                  ?>
                </nav>
            </div> 
            </div>   
        <?php do_action( 'shoestrap_post_main_nav' ); ?>
		</div>
    </div>
<?php /*?></div><?php */?>
</header>