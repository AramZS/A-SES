<?php

if ( !defined( 'SHOESTRAP_OPT_NAME' ) )
	define( 'SHOESTRAP_OPT_NAME', 'shoestrap' );

// Include some admin options.
require_once locate_template( 'lib/admin-options.php' );

/*
 * Add a less file from our child theme to the parent theme's compiler.
 * This uses the 'shoestrap_compiler' filter that exists in the shoestrap compiler
 */
add_filter( 'shoestrap_compiler', 'shoestrap_child_styles' );
function shoestrap_child_styles( $bootstrap ) {
	return $bootstrap . '
	@import "' . get_stylesheet_directory() . '/assets/less/child.less";';
}

/*
 * Changes the output of the compiled CSS.
 */
add_filter( 'shoestrap_compiler_output', 'shoestrap_child_hijack_compiler' );
function shoestrap_child_hijack_compiler( $css ) {
	// $css = str_replace( '', '', $css );
	return $css;
}

/*
 * Enqueue the style.css file.
 *
 * It is recommended to use a less file as per the shoestrap_child_styles() function above.
 *
 * To have styles compiled and added in the main stylesheet,
 * try using the shoestrap_child_styles() function instead,
 */
// Uncomment the line below to enqueue the stylesheet
// add_action('wp_enqueue_scripts', 'shoestrap_child_load_stylesheet', 100);
function shoestrap_child_load_stylesheet() {
	wp_enqueue_style( 'shoestrap_child_css', get_stylesheet_uri(), false, null );
}


function shoestrap_pjax() {
	global $ss_settings;
	if ( $ss_settings['pjax'] == 1 ) {
		/**
		 * Enqueue pjax.js
		 */
		function shoestrap_pjax_script() {
			wp_register_script( 'shoestrap_pjax_js', get_stylesheet_directory_uri() . '/assets/js/jquery.pjax.js', false, null, true );
			wp_enqueue_script( 'shoestrap_pjax_js' );	
		}
		add_action( 'wp_enqueue_scripts', 'shoestrap_pjax_script', 101 );

		/**
		 * Open a container as a content area for PJAX
		 */
		function shoestrap_pjax_open_container() { ?>
			<div id="pjax-container">
			<?php
		}
		add_action( 'shoestrap_pre_wrap', 'shoestrap_pjax_open_container' );

		/**
		 * Close previous container
		 */
		function shoestrap_pjax_close_container() { ?>
			</div>
			<?php
		}
		add_action( 'shoestrap_pre_footer', 'shoestrap_pjax_close_container' );

		/**
		 * Our PJAX script
		 */
		function shoestrap_pjax_trigger_script() { ?>
			<script>
			var $j = jQuery.noConflict();

			$j(document).on('pjax:send', function() {
				$j('.main').fadeToggle("fast", "linear")
			})
			$j(document).pjax('nav a, aside a, .breadcrumb a', '#pjax-container')
			</script>
			<?php
		}
		add_action( 'wp_footer', 'shoestrap_pjax_trigger_script', 200 );

	}
}
add_action( 'init', 'shoestrap_pjax' );

/*
 * Remove page titles
 */
function shoestrap_empty_page_title() {}
function shoestrap_remove_page_titles() {
	if ( shoestrap_getvariable( 'remove_page_titles' ) == 1 ) :
		add_action( 'shoestrap_page_header_override', 'shoestrap_empty_page_title' );
	endif;
}
add_action( 'init', 'shoestrap_remove_page_titles' );

// Shawn's added mods
require_once locate_template('/mods/mods.php');