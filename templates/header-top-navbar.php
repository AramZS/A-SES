<header class="banner <?php echo shoestrap_navbar_class(); ?>" role="banner">
	<div class="navbar-header">
        <div class="sm-offset">
            <a id="navbar-brand" class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img alt="ses" src="<?php echo get_stylesheet_directory_uri()?>/i/logo.png" id="site-logo">
            </a>
        </div>
        <div class="lg-offset hidden-xs">        
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
                <div class="clearfix"></div>
            </div>
		</div> 
    </div>
</header>