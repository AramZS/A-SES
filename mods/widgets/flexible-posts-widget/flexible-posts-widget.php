<?php
/*
Plugin Name: Flexible Posts Widget
Plugin URI: http://wordpress.org/extend/plugins/flexible-posts-widget/
Author: dpe415
Author URI: http://dpedesign.com
Version: 3.1.2
Description: An advanced posts display widget with many options: get posts by post type, taxonomy & term; sorting & ordering; feature images; custom templates and more.
License: GPL2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/*  Copyright 2013  David Paul Ellenwood  (email : david@dpedesign.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/ 
// Block direct requests
if( !defined('ABSPATH') )
	die('-1');

//// Define our version number
//if( !defined('DPE_FP_Version') )
//	define( 'DPE_FP_Version', '3.1.2' );

/**
 * Plugin Initialization
 * Used for internationalization only at this point
 */
//function sc_Flexible_Posts_Widget_init() {
//	load_plugin_textdomain( 'flexible-posts-widget', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
//}
//add_action('plugins_loaded', 'sc_Flexible_Posts_Widget_init'); 


/**
 * Initialize the widget on widgets_init
 */
function sc_load_flexible_posts_widget() {
	register_widget('sc_Flexible_Posts_Widget');
}
add_action('widgets_init', 'sc_load_flexible_posts_widget' );


/**
 * Flexible Posts Widget Class
 */
class sc_Flexible_Posts_Widget extends WP_Widget {
	
	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		
		global $pagenow;
		
		parent::__construct(
	 		'dpe_fp_widget', // Base ID
			'Sidebar Posts Widget', // Name
			array( 'description' => __( 'Display posts as widget items', 'flexible-posts-widget' ) ) // Args
		);
		
		$this->directory	= plugins_url( '/', __FILE__ );
		
		$this->register_hooks();					// Register actions & filters
		$this->register_sns( $this->directory ); 	// Register styles & scripts
		
		// Enqueue admin scripts
		if ( defined("WP_ADMIN") && WP_ADMIN ) {
			if ( 'widgets.php' == $pagenow ) {
				wp_enqueue_script( 'flexible-posts-widget' );
				wp_enqueue_style( 'flexible-posts-widget' );
				wp_localize_script( 'flexible-posts-widget', 'objectL10n', array(
					'gettingTerms' => __( 'Getting terms...', 'flexible-posts-widget' ),
					'selectTerms' => __( 'Select terms:', 'flexible-posts-widget' ),
					'noTermsFound' => __( 'No terms found.', 'flexible-posts-widget' ),
				) );
			}
		}
		
	}
	

   /**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
    function widget($args, $instance) {	
        extract( $args );
		extract( $instance );
				
		$title = apply_filters( 'widget_title', empty( $title ) ? '' : $title );
		
		if ( empty($template) )
			$template = 'widget.php';
		
		// Setup the query
		$args = array(
			'post_type'			=> $posttype,
			'post_status'		=> array('publish', 'inherit'),
			'posts_per_page'	=> $number,
			'offset'			=> $offset,
			'orderby'			=> $orderby,
			'order'				=> $order,
		);
		
		// Setup the tax & term query based on the user's selection
		if ( $taxonomy != 'none' && !empty( $term ) ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => $taxonomy,
					'field' => 'slug',
					'terms' => $term,
				)
			);
		}
		
		// Get the posts for this instance
		$flexible_posts = new WP_Query( $args );
		
		// Get and include the template we're going to use
		include( $this->getTemplateHierarchy( $template ) );
		
		// Be sure to reset any post_data before proceeding
		wp_reset_postdata();
        
    }

    /**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
    function update( $new_instance, $old_instance ) {
		
		// Get our defaults to test against
		$this->posttypes	= get_post_types( array('public' => true ), 'objects' );
		$this->taxonomies	= get_taxonomies( array('public' => true ), 'objects' );
		$this->thumbsizes	= get_intermediate_image_sizes();
		$this->orderbys		= array(
			'date'		 	=> __('Publish Date', 'flexible-posts-widget'),
			'title'			=> __('Title', 'flexible-posts-widget'),
			'menu_order'	=> __('Menu Order', 'flexible-posts-widget'),
			'ID'			=> __('Post ID', 'flexible-posts-widget'),
			'author'		=> __('Author', 'flexible-posts-widget'),
			'name'	 		=> __('Post Slug', 'flexible-posts-widget'),
			'comment_count'	=> __('Comment Count', 'flexible-posts-widget'),
			'rand'			=> __('Random', 'flexible-posts-widget'),
		);
		$this->orders		= array(
			'ASC'	=> __('Ascending', 'flexible-posts-widget'),
			'DESC'	=> __('Descending', 'flexible-posts-widget'),
		);
		
		$pt_names		= get_post_types( array('public' => true ), 'names' );
		$tax_names		= get_taxonomies( array('public' => true ), 'names' );
		$tax_names[]	= 'none';
		
		// Validate posttype submissions
		$posttypes = array();
		foreach( $new_instance['posttype'] as $pt ) {
			if( in_array( $pt, $pt_names ) )
				$posttypes[] = $pt;
		}
		if( empty($posttypes) )
			$posttypes[] = 'post';
		
		// Validate taxonomy & term submissions 
		if( in_array( $new_instance['taxonomy'], $tax_names ) ) {
			$taxonomy	= $new_instance['taxonomy'];
			$terms		= array();
			if( 'none' != $taxonomy ) {
				$term_objects = get_terms( $taxonomy, array( 'hide_empty' => false ) );
				$term_names = array();
				foreach ( $term_objects as $object ) {
					$term_names[] = $object->slug;
				}
				foreach( $new_instance['term'] as $term ) {
					if( in_array( $term, $term_names ) )
						$terms[] = $term;
				}
			}
		} else {
			$taxonomy = 'none';
			$terms = array();
		}
		
		$instance 				= $old_instance;
		$instance['title']		= strip_tags( $new_instance['title'] );
		$instance['posttype']	= $posttypes;
		$instance['taxonomy']	= $taxonomy;
		$instance['term']		= $terms;
		$instance['number']		= (int) $new_instance['number'];
		$instance['offset']		= (int) $new_instance['offset'];
		$instance['orderby']	= ( array_key_exists( $new_instance['orderby'], $this->orderbys ) ? $new_instance['orderby'] : 'date' );
		$instance['order']		= ( array_key_exists( $new_instance['order'], $this->orders ) ? $new_instance['order'] : 'DESC' );
		$instance['thumbnail']	= ( isset(  $new_instance['thumbnail'] ) ? (int) $new_instance['thumbnail'] : '0' );
		$instance['thumbsize']	= ( in_array ( $new_instance['thumbsize'], $this->thumbsizes ) ? $new_instance['thumbsize'] : '' );
		$instance['template']	= strip_tags( $new_instance['template'] );
		$instance['cur_tab']	= (int) $new_instance['cur_tab'];
        
        return $instance;
      
    }

    /**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
    function form( $instance ) {
    	
   		$this->posttypes	= get_post_types( array('public' => true ), 'objects' );
		$this->taxonomies	= get_taxonomies( array('public' => true ), 'objects' );
		$this->thumbsizes	= get_intermediate_image_sizes();
		$this->orderbys		= array(
			'date'		 	=> __('Publish Date', 'flexible-posts-widget'),
			'title'			=> __('Title', 'flexible-posts-widget'),
			'menu_order'	=> __('Menu Order', 'flexible-posts-widget'),
			'ID'			=> __('Post ID', 'flexible-posts-widget'),
			'author'		=> __('Author', 'flexible-posts-widget'),
			'name'	 		=> __('Post Slug', 'flexible-posts-widget'),
			'comment_count'	=> __('Comment Count', 'flexible-posts-widget'),
			'rand'			=> __('Random', 'flexible-posts-widget'),
		);
		$this->orders		= array(
			'ASC'	=> __('Ascending', 'flexible-posts-widget'),
			'DESC'	=> __('Descending', 'flexible-posts-widget'),
		);
		
		$instance = wp_parse_args( (array) $instance, array(
			'title'		=> '',
			'posttype'	=> array('post'),
			'taxonomy'	=> 'none',
			'term'		=> array(),
			'number'	=> '3',
			'offset'	=> '0',
			'orderby'	=> 'date',
			'order'		=> 'DESC',
			'thumbnail' => '0',
			'thumbsize' => '',
			'template'	=> 'widget.php',
			'cur_tab'	=> '0',
		) );
		
		extract( $instance );
		
		include( $this->getTemplateHierarchy( 'admin' ) );
        
    }

	/**
	 * Loads theme files in appropriate hierarchy: 1) child theme,
	 * 2) parent template, 3) plugin resources. will look in the flexible-posts-widget/
	 * directory in a theme and the views/ directory in the plugin
	 *
	 * Based on a function in the amazing image-widget
	 * by Matt Wiebe at Modern Tribe, Inc.
	 * http://wordpress.org/extend/plugins/image-widget/
	 * 
	 * @param string $template template file to search for
	 * @return template path
	 **/
	public function getTemplateHierarchy( $template ) {
		
		// whether or not .php was added
		$template_slug = preg_replace( '/.php$/', '', $template );
		$template = $template_slug . '.php';

		if ( $theme_file = locate_template( array( 'flexible-posts-widget/' . $template ) ) ) {
			$file = $theme_file;
		} else {
			$file = 'views/' . $template;
		}		
		
		//return apply_filters( 'dpe_template_flexible-posts_'.$template, $file); // - Maybe we'll add this in the future
		
		return $file;
		
	}
	
	/**
	 * Register styles & scripts
	 */
	public function register_sns( $dir ) {
		wp_register_script( 'flexible-posts-widget', $dir . 'js/admin.js', array('jquery', 'jquery-ui-tabs' ), DPE_FP_Version, true );
		wp_register_style( 'flexible-posts-widget', $dir . 'css/admin.css', array(), DPE_FP_Version );
	}
	
	/**
	 * Setup our get terms/AJAX callback
	 */
	public function register_hooks() {
		add_action( 'wp_ajax_dpe_fp_get_terms', array( &$this, 'terms_checklist' ) );
	}
	
	/**
	 * return a list of terms for the chosen taxonomy used via AJAX
	 */
	public function terms_checklist( $term ) {

		$taxonomy = esc_attr( $_POST['taxonomy'] );

		if ( !isset( $term ) )
			$term = esc_attr( $_POST['term'] );
		
		if ( empty($taxonomy) || 'none' == $taxonomy ) {
			echo false;
			die();
		}
		
		$args = array (
			'hide_empty' => 0,
		);
		
		$terms = get_terms( $taxonomy, $args );
		
		if( empty($terms) ) { 
			$output = '<p>' . __( 'No terms found.', 'flexible-posts-widget' ) . '</p>';
		} else {
			$output = '<ul class="categorychecklist termschecklist form-no-clear">';
			foreach ( $terms as $option ) {
				$output .= "\n<li>" . '<label class="selectit"><input value="' . esc_attr( $option->slug ) . '" type="checkbox" name="' . $this->get_field_name('term') . '[]"' . checked( in_array( $option->slug, (array)$term ), true, false ) . ' /> ' . esc_html( $option->name ) . "</label></li>\n";
			}
			$output .= "</ul>\n";
		}
		
		echo ( $output );
		
		die();
		
	}
	
	/**
     * 
     */
	public function posttype_checklist( $posttype ) {
		
		//Get pubic post type objects
		$posttypes = get_post_types( array('public' => true ), 'objects' );

		$output = '<ul class="categorychecklist posttypechecklist form-no-clear">';
		foreach ( $posttypes as $type ) {
			$output .= "\n<li>" . '<label class="selectit"><input value="' . esc_attr( $type->name ) . '" type="checkbox" name="' . $this->get_field_name('posttype') . '[]"' . checked( in_array( $type->name, (array)$posttype ), true, false ) . ' /> ' . esc_html( $type->labels->name ) . "</label></li>\n";
		}
		$output .= "</ul>\n";
		
		echo ( $output );
		
	}
	

} // class sc_Flexible_Posts_Widget
