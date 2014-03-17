<?php if (!is_front_page()){
//
	if ( is_page() ) {
		if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary_navigation' ) ) { ?>
            <div class="side-nav-wrap clearfix hidden-xs">
                <nav class="side-nav-lg">
                    <?php wp_nav_menu( array(
                        'theme_location'  => 'primary_navigation',
//                        'menu'            => '',
//                        'container'       => '',
//                        'container_class' => '',
//                        'container_id'    => '',
                        'menu_class'      => 'list-group',
//                        'menu_id'         => '',
//                        'echo'            => true,
//                        'fallback_cb'     => 'wp_page_menu',
//                        'before'          => '',
//                        'after'           => '',
//                        'link_before'     => '',
//                        'link_after'      => '',
//                        'items_wrap'      => '',
                        'depth'           => 2,
                        'sub_menu'		  => true,
                        'walker'          => new clean_walker()
                    ));?>
                </nav>
            </div>            
		<?php } ?>
        <!-- add a left sidebar/widget area --> 
		<?php if ( is_active_sidebar( 'left-sidebar' )) : ?>
            <div class="clearfix hidden-xs">
                <aside class="sidebar left-widgets">
                    <?php dynamic_sidebar('left-sidebar'); ?>
                </aside>
            </div> 
         <?php endif; ?>
         
<div class="clearfix visible-xs">
    <nav class=" side-nav-sm navmenu navmenu-default navmenu-fixed-left offcanvas" role="navigation">
<a id="nav-close" data-canvas=".canvas" data-target=".navmenu" data-recalc="false" data-toggle="offcanvas" class="navbar-toggle el-icon-remove-sign"></a>

        <?php wp_nav_menu( array(
            'theme_location'  => 'primary_navigation',
            'menu'            => '',
            'container'       => '',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => 'nav navmenu-nav',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '',
            'depth'           => 2,
            'sub_menu'		  => true
//			'walker'          => new clean_walker()
        ));?>
    </nav>
</div>    
<?php } } ?>