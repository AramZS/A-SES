<?php
/*-----------------------------------------------------------------------------------*/
/* create custom post => front page sections
/*-----------------------------------------------------------------------------------*/
if (!function_exists('create_fp_sections')) {
    function create_fp_sections()
    {
        $fps_args = array(
            'label' => __('Home Boxes', 'framework'),
            'singular_label' => __('Home Box', 'framework'),
            'public' => false,
            'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 5,			
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => true,
            'supports' => array('title', 'editor', 'page-attributes'));
        register_post_type('fp-sections', $fps_args);
    }
    add_action('init', 'create_fp_sections');
}
//
//
//	// Add Testimonial CPT
//	function register_cpt_Testimonial() {
//		$labels = array( 
//			'name' => _x( 'Testimonials', 'Testimonial' ),
//			'singular_name' => _x( 'Testimonial', 'Testimonial' ),
//			'add_new' => _x( 'Add New', 'Testimonial' ),
//			'add_new_item' => _x( 'Add New Testimonial', 'Testimonial' ),
//			'edit_item' => _x( 'Edit Testimonial', 'Testimonial' ),
//			'new_item' => _x( 'New Testimonial', 'Testimonial' ),
//			'view_item' => _x( 'View Testimonial', 'Testimonial' ),
//			'search_items' => _x( 'Search Testimonials', 'Testimonial' ),
//			'not_found' => _x( 'No Testimonials found', 'Testimonial' ),
//			'not_found_in_trash' => _x( 'No Testimonials found in Trash', 'Testimonial' ),
//			'parent_item_colon' => _x( 'Parent Testimonial:', 'Testimonial' ),
//			'menu_name' => _x( 'Testimonials', 'Testimonial' ),
//		);
//		$args = array( 
//			'labels' => $labels,
//			'hierarchical' => false,
//			'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
//			'taxonomies' => array( 'category', 'post_tag' ),
//			'public' => true,
//			'show_ui' => true,
//			'show_in_menu' => true,
//			'menu_position' => 5,
//			'show_in_nav_menus' => true,
//			'publicly_queryable' => true,
//			'exclude_from_search' => false,
//			'has_archive' => true,
//			'query_var' => true,
//			'can_export' => true,
//			'rewrite' => true,
//			'capability_type' => 'post'
//		);
//		register_post_type( 'Testimonial', $args );
//	}
//	add_action( 'init', 'register_cpt_Testimonial' );
//	// Add 'Products' CPT
//    function register_cpt_product() {
//    $labels = array(
//		'name' => _x( 'Products', 'product' ),
//		'singular_name' => _x( 'Product', 'product' ),
//		'add_new' => _x( 'Add New', 'product' ),
//		'add_new_item' => _x( 'Add New Product', 'product' ),
//		'edit_item' => _x( 'Edit Product', 'product' ),
//		'new_item' => _x( 'New Product', 'product' ),
//		'view_item' => _x( 'View Product', 'product' ),
//		'search_items' => _x( 'Search Products', 'product' ),
//		'not_found' => _x( 'No products found', 'product' ),
//		'not_found_in_trash' => _x( 'No products found in Trash', 'product' ),
//		'parent_item_colon' => _x( 'Parent Product:', 'product' ),
//		'menu_name' => _x( 'Products', 'product' ),
//    );
//    $args = array(
//		'labels' => $labels,
//		'hierarchical' => false,
//		'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', 'revisions' ),
//		'taxonomies' => array('type' ),
//		'public' => true,
//		'show_ui' => true,
//		'show_in_menu' => true,
//		'menu_position' => 5,
//		'show_in_nav_menus' => true,
//		'publicly_queryable' => true,
//		'exclude_from_search' => false,
//		'has_archive' => true,
//		'query_var' => true,
//		'can_export' => true,
//		'rewrite' => true,
//		'capability_type' => 'post'
////		'yarpp_support' => true
//    );
//    register_post_type( 'product', $args );
//    }
//    add_action( 'init', 'register_cpt_product' );
//
//	/**
//	 * Add custom taxonomies
//	 */
//	function add_custom_taxonomies() {
//		register_taxonomy('type', 'product', array(
//			'hierarchical' => true,
//			'labels' => array(
//				'name' => _x( 'Type', 'type' ),
//				'singular_name' => _x( 'Product Type', 'type' ),
//				'search_items' =>  __( 'Search Type' ),
//				'all_items' => __( 'All Type' ),
//				'parent_item' => __( 'Parent type' ),
//				'parent_item_colon' => __( 'Parent type:' ),
//				'edit_item' => __( 'Edit type' ),
//				'update_item' => __( 'Update type' ),
//				'add_new_item' => __( 'Add New type' ),
//				'new_item_name' => __( 'New type Name' ),
//				'menu_name' => __( 'Type' ),
//			),
//			'rewrite' => array(
//				'slug' => 'Type',
//				'with_front' => false,
//				'hierarchical' => true
//			),
//		));
//	}
//	add_action( 'init', 'add_custom_taxonomies', 0 );
//
//	// Add 'Ideas' CPT
//	function register_cpt_idea() {
//		$labels = array( 
//			'name' => _x( 'Ideas', 'idea' ),
//			'singular_name' => _x( 'Idea', 'idea' ),
//			'add_new' => _x( 'Add New', 'idea' ),
//			'add_new_item' => _x( 'Add New Idea', 'idea' ),
//			'edit_item' => _x( 'Edit Idea', 'idea' ),
//			'new_item' => _x( 'New Idea', 'idea' ),
//			'view_item' => _x( 'View Idea', 'idea' ),
//			'search_items' => _x( 'Search Ideas', 'idea' ),
//			'not_found' => _x( 'No ideas found', 'idea' ),
//			'not_found_in_trash' => _x( 'No ideas found in Trash', 'idea' ),
//			'parent_item_colon' => _x( 'Parent Idea:', 'idea' ),
//			'menu_name' => _x( 'Ideas', 'idea' ),
//		);
//		$args = array( 
//			'labels' => $labels,
//			'hierarchical' => false,
//			'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'comments', 'revisions' ),
//			'public' => true,
//			'show_ui' => true,
//			'show_in_menu' => true,
//			'menu_position' => 5,
//			'show_in_nav_menus' => false,
//			'publicly_queryable' => true,
//			'exclude_from_search' => false,
//			'has_archive' => true,
//			'query_var' => true,
//			'can_export' => true,
//			'rewrite' => true,
//			'capability_type' => 'post'
//		);
//		register_post_type( 'idea', $args );
//	}
//	add_action( 'init', 'register_cpt_idea' );	