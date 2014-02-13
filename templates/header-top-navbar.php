<header class="banner <?php echo shoestrap_navbar_class(); ?>" role="banner">
  <div class="<?php echo shoestrap_navbar_container_class(); ?>">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-main, .nav-extras">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
<div class="row">     

    <div class="logo-offset col-md-2">
        <a class="navbar-brand" href="<?php home_url()?>">
            <img alt="ses" src="<?php echo get_stylesheet_directory_uri()?>/i/logo.png" id="site-logo">
        </a>
    </div>

    <div class="nav-offset col-md-9">
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
    <?php do_action( 'shoestrap_post_main_nav' ); ?>
  </div>
  </div>
</div>
</header>

<?php /*?>
<header class="banner <?php echo shoestrap_navbar_class(); ?>" role="banner">
  <div class="<?php echo shoestrap_navbar_container_class(); ?>">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-main, .nav-extras">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php
      if ( shoestrap_getVariable( 'navbar_brand' ) != 0 ) :
        echo '<a class="navbar-brand ' . shoestrap_branding_class( false ) . '" href="' . home_url() . '/">';

        if ( shoestrap_getVariable( 'navbar_logo' ) == 1 )
          shoestrap_logo();
        else
          bloginfo( 'name' );
        echo '</a>';
      endif;
      ?>
    </div>
    <div class="nav-extras">
      <?php do_action( 'shoestrap_pre_main_nav' ); ?>
    </div>
    <nav class="nav-main navbar-collapse collapse" role="navigation">
      <?php
        do_action( 'shoestrap_inside_nav_begin' );
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu( array( 'theme_location' => 'primary_navigation', 'menu_class' => shoestrap_nav_class_pull() ) );
        endif;
        do_action( 'shoestrap_inside_nav_end' );
      ?>
    </nav>
    <?php do_action( 'shoestrap_post_main_nav' ); ?>
  </div>
</header>
<?php */?>