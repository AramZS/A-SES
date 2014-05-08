<?php

/*
 * Child Theme Options
 *
 * Uncomment the line below (the one with the add_filter function)
 * to add the new section to the theme options panel.
 * You can learn more about fields here: https://github.com/ReduxFramework/ReduxFramework/wiki/Fields
 */

add_filter( 'redux/options/' . SHOESTRAP_OPT_NAME . '/sections', 'shoestrap_child_options', 16 );

if ( !function_exists( 'shoestrap_child_options' ) ) :
function shoestrap_child_options( $sections ) {

	$section = array(
		'title' => __( 'Child theme', 'shoestrap_child' ),
		'icon'  => 'el-icon-th'
	);

	$fields[] = array( 
	  'title'     => __( 'Pjax', 'shoestrap_child' ),
	  'desc'      => 'Use <a href="https://github.com/defunkt/jquery-pjax" target="_blank">PJAX</a> in link tags inside NavBars, Sibebars & Breadcrumbs. This cause a fast linear fadeToggle effect in main content. Default: OFF',
	  'id'        => 'pjax',
	  'default'   => 0,
	  'type'      => 'switch'
	);

	$section['fields'] = $fields;

	$section = apply_filters( 'shoestrap_child_options_modifier', $section );
	
	$sections[] = $section;
	return $sections;
}
endif;
