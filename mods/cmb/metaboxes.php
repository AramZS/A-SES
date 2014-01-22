<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {
$prefix = '_cmb_';// Start with an underscore to hide fields from custom fields list

//	$meta_boxes[] = array(
//		'id'         => 'test_metabox',
//		'title'      => 'Test Metabox',
//		'pages' => array('page','fp-sections'),
//		'context'    => 'normal',
//		'priority'   => 'high',
//		'show_names' => true, // Show field names on the left
//		'fields'     => array(
//			array(
//				'name' => 'Test Text',
//				'desc' => 'field description (optional)',
//				'id'   => $prefix . 'test_text',
//				'type' => 'text',
//			),
//			array(
//				'name' => 'Test Text Small',
//				'desc' => 'field description (optional)',
//				'id'   => $prefix . 'test_textsmall',
//				'type' => 'text_small',
//			),
//			array(
//				'name' => 'Test Text Medium',
//				'desc' => 'field description (optional)',
//				'id'   => $prefix . 'test_textmedium',
//				'type' => 'text_medium',
//			),
//			array(
//				'name' => 'Test Date Picker',
//				'desc' => 'field description (optional)',
//				'id'   => $prefix . 'test_textdate',
//				'type' => 'text_date',
//			),
//			array(
//				'name' => 'Test Date Picker (UNIX timestamp)',
//				'desc' => 'field description (optional)',
//				'id'   => $prefix . 'test_textdate_timestamp',
//				'type' => 'text_date_timestamp',
//			),
//			array(
//				'name' => 'Test Date/Time Picker Combo (UNIX timestamp)',
//				'desc' => 'field description (optional)',
//				'id'   => $prefix . 'test_datetime_timestamp',
//				'type' => 'text_datetime_timestamp',
//			),
//			array(
//	            'name' => 'Test Time',
//	            'desc' => 'field description (optional)',
//	            'id'   => $prefix . 'test_time',
//	            'type' => 'text_time',
//	        ),
//			array(
//				'name'   => 'Test Money',
//				'desc'   => 'field description (optional)',
//				'id'     => $prefix . 'test_textmoney',
//				'type'   => 'text_money',
//				// 'before' => '£'; // override '$' symbol if needed
//			),
//			array(
//	            'name' => 'Test Color Picker',
//	            'desc' => 'field description (optional)',
//	            'id'   => $prefix . 'test_colorpicker',
//	            'type' => 'colorpicker',
//				'std'  => '#ffffff'
//	        ),
//			array(
//				'name' => 'Test Text Area',
//				'desc' => 'field description (optional)',
//				'id'   => $prefix . 'test_textarea',
//				'type' => 'textarea',
//			),
//			array(
//				'name' => 'Test Text Area Small',
//				'desc' => 'field description (optional)',
//				'id'   => $prefix . 'test_textareasmall',
//				'type' => 'textarea_small',
//			),
//			array(
//				'name' => 'Test Text Area Code',
//				'desc' => 'field description (optional)',
//				'id'   => $prefix . 'test_textarea_code',
//				'type' => 'textarea_code',
//			),
//			array(
//				'name' => 'Test Title Weeeee',
//				'desc' => 'This is a title description',
//				'id'   => $prefix . 'test_title',
//				'type' => 'title',
//			),
//			array(
//				'name'    => 'Test Select',
//				'desc'    => 'field description (optional)',
//				'id'      => $prefix . 'test_select',
//				'type'    => 'select',
//				'options' => array(
//					array( 'name' => 'Option One', 'value' => 'standard', ),
//					array( 'name' => 'Option Two', 'value' => 'custom', ),
//					array( 'name' => 'Option Three', 'value' => 'none', ),
//				),
//			),
//			array(
//				'name'    => 'Test Radio inline',
//				'desc'    => 'field description (optional)',
//				'id'      => $prefix . 'test_radio_inline',
//				'type'    => 'radio_inline',
//				'options' => array(
//					array( 'name' => 'Option One', 'value' => 'standard', ),
//					array( 'name' => 'Option Two', 'value' => 'custom', ),
//					array( 'name' => 'Option Three', 'value' => 'none', ),
//				),
//			),
//			array(
//				'name'    => 'Test Radio',
//				'desc'    => 'field description (optional)',
//				'id'      => $prefix . 'test_radio',
//				'type'    => 'radio',
//				'options' => array(
//					array( 'name' => 'Option One', 'value' => 'standard', ),
//					array( 'name' => 'Option Two', 'value' => 'custom', ),
//					array( 'name' => 'Option Three', 'value' => 'none', ),
//				),
//			),
//			array(
//				'name'     => 'Test Taxonomy Radio',
//				'desc'     => 'Description Goes Here',
//				'id'       => $prefix . 'text_taxonomy_radio',
//				'type'     => 'taxonomy_radio',
//				'taxonomy' => '', // Taxonomy Slug
//			),
//			array(
//				'name'     => 'Test Taxonomy Select',
//				'desc'     => 'Description Goes Here',
//				'id'       => $prefix . 'text_taxonomy_select',
//				'type'     => 'taxonomy_select',
//				'taxonomy' => '', // Taxonomy Slug
//			),
//			array(
//				'name'		=> 'Test Taxonomy Multi Checkbox',
//				'desc'		=> 'field description (optional)',
//				'id'		=> $prefix . 'test_multitaxonomy',
//				'type'		=> 'taxonomy_multicheck',
//				'taxonomy'	=> '', // Taxonomy Slug
//			),
//			array(
//				'name' => 'Test Checkbox',
//				'desc' => 'field description (optional)',
//				'id'   => $prefix . 'test_checkbox',
//				'type' => 'checkbox',
//			),
//			array(
//				'name'    => 'Test Multi Checkbox',
//				'desc'    => 'field description (optional)',
//				'id'      => $prefix . 'test_multicheckbox',
//				'type'    => 'multicheck',
//				'options' => array(
//					'check1' => 'Check One',
//					'check2' => 'Check Two',
//					'check3' => 'Check Three',
//				),
//			),
//			array(
//				'name'    => 'Test wysiwyg',
//				'desc'    => 'field description (optional)',
//				'id'      => $prefix . 'test_wysiwyg',
//				'type'    => 'wysiwyg',
//				'options' => array(	'textarea_rows' => 5, ),
//			),
//			array(
//				'name' => 'Test Image',
//				'desc' => 'Upload an image or enter an URL.',
//				'id'   => $prefix . 'test_image',
//				'type' => 'file',
//			),
//			array(
//				'name' => 'oEmbed',
//				'desc' => 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.',
//				'id'   => $prefix . 'test_embed',
//				'type' => 'oembed',
//			),
//		),
//	);

$meta_boxes[] = array(
    'id' => 'bg-meta-box',
    'title' => 'Background Settings',
	'pages' => array('page','fp-sections'),
    'context' => 'normal',
    'priority' => 'low',
	'show_names' => true,	
    'fields' => array(
//        array(
//            'name' => __('Custom Background Image', 'framework'),
//            'desc' => __('Upload a custom background image for this page. Once uploaded, click "Insert to Post".', 'framework'),
//            'id' => 'coll_background_image',
//            "type" => "text",
//            'std' => ''
//        ),
		array(
			'name' => 'Section Background Image',
			'desc' => 'Upload an image or enter an URL.',
			'id'   => $prefix . 'header_image',
			'type' => 'file',
		),
//        array(
//            'name' => __('Custom Background Repeat', 'framework'),
//            'desc' => __('Select a custom background repeat for the uploaded image.', 'framework'),
//            'id' => 'coll_background_repeat',
//            'type' => 'select',
//            'std' => '',
//            'options' => array(__('No Repeat', 'framework'), __('Repeat', 'framework'), __('Repeat Horizontally', 'framework'), __('Repeat Vertically', 'framework')),
//        ),		
		array(
			'name'    => 'Section Background Repeat',
			'desc'    => 'field description (optional)',
			'id'      => $prefix . 'bg_repeat',
			'type'    => 'select',
			'options' => array(
				array( 'name' => 'No Repeat', 'value' => 'no-repat', ),
				array( 'name' => 'Repeat', 'value' => 'repeat', ),
				array( 'name' => 'Repeat Horizontally', 'repeat-x' => 'none', ),
				array( 'name' => 'Repeat Vertically', 'repeat-y' => 'none', ),
			),
		),
//        array(
//            'name' => __('Custom Background Position', 'framework'),
//            'desc' => __('Select a custom background position for the uploaded image.', 'framework'),
//            'id' => 'coll_background_position',
//            'type' => 'select',
//            'std' => '',
//            'options' => array(__('Left', 'framework'), __('Right', 'framework'), __('Centered', 'framework'), __('Full Screen', 'framework'))
//        ),
		array(
			'name'    => 'Section Background Position',
			'desc'    => 'field description (optional)',
			'id'      => $prefix . 'bg_position',
			'type'    => 'select',
			'options' => array(
				array( 'name' => 'Left', 'value' => 'standard', ),
				array( 'name' => 'Right', 'value' => 'custom', ),
				array( 'name' => 'Centered', 'value' => 'none', ),
				array( 'name' => 'Full Screen', 'value' => 'none', ),
			),
		),		
//		array(
//			'name'    => 'Test Radio inline',
//			'desc'    => 'field description (optional)',
//			'id'      => $prefix . 'test_radio_inline',
//			'type'    => 'radio_inline',
//			'options' => array(
//				array( 'name' => 'Option One', 'value' => 'standard', ),
//				array( 'name' => 'Option Two', 'value' => 'custom', ),
//				array( 'name' => 'Option Three', 'value' => 'none', ),
//			),
//		),
//		array(
//			'name'    => 'Test Radio',
//			'desc'    => 'field description (optional)',
//			'id'      => $prefix . 'test_radio',
//			'type'    => 'radio',
//			'options' => array(
//				array( 'name' => 'Option One', 'value' => 'standard', ),
//				array( 'name' => 'Option Two', 'value' => 'custom', ),
//				array( 'name' => 'Option Three', 'value' => 'none', ),
//			),
//		),
//        array(
//            'name' => __('Custom Background Color', 'framework'),
//            'desc' => __('Select a custom background color for the uploaded image.', 'framework'),
//            'id' => 'coll_background_color',
//            'type' => 'color',
//            'std' => ''
//        )
		array(
			'name' => 'Section Background Color',
			'id'   => $prefix . 'bg_color',
			'type' => 'colorpicker',
			'std'  => '#ffffff'
		),	
    )
);

//$meta_boxes[] = array(
//    'id' => 'section-meta-box',
//    'title' => 'Section Settings',
//	'pages' => array('page','fp-sections'),
//    'context' => 'normal',
//    'priority' => 'high',
//    'fields' => array(
//        array(
//            'name' => __('Section Height', 'framework'),
//            'desc' => __('Check this if you want the section to have the height of its content (may be smaller than the browser window height)', 'framework'),
//            'id' => 'coll_section_height',
//            'type' => 'checkbox',
//            'std' => ''
//        ),
//        array(
//            'name' => __('Show Section Title', 'framework'),
//            'desc' => __('Check this if you want to show the section title. Uncheck if you don\'t want the section title displayed', 'framework'),
//            'id' => 'coll_title_show',
//            'type' => 'checkbox',
//            'std' => ''
//        ),
//        array(
//            'name' => __('Title Font Size', 'framework'),
//            'desc' => __('Insert a custom title font size for this section. Leave <b>blank</b> to use the size set in style.css', 'framework'),
//            'id' => 'coll_title_font_size',
//            'type' => 'text',
//            'std' => ''
//        ),
//        array(
//            'name' => __('Title Font Color', 'framework'),
//            'desc' => __('Select a color for your title. This will also be the color used by your custom <b>text types</b>', 'framework'),
//            'id' => 'coll_title_color',
//            'type' => 'color',
//            'std' => ''
//        )
//    )
//);

//$meta_boxes[] = array(
//	'id' => 'rotator-options',
//	'title' => 'Page Options',
//	'pages' => array('page','fp-sections'),
//	'context' => 'normal',
//	'priority' => 'low',
//	'show_names' => true,
//	'fields' => array(
//		array(
//		'name' => 'Instructions',
//		'desc' => 'This box is where we customize each page and add headers, backgrounds, page color, and text color.',
//		'type' => 'title',
//		),
//		array(
//		'name' => 'Page Background Color',
//		'id'   => $prefix . 'color',
//		'type' => 'colorpicker',
//		'std'  => '#ffffff'
//		),		
//		array(
//		'name' => 'Header Image',
//		'desc' => 'Upload an image or enter an URL.',
//		'id'   => $prefix . 'header_image',
//		'type' => 'file',
//		),
//		array(
//		'name' => 'Header Title',
//		'desc' => 'field description (optional)',
//		'id'   => $prefix . 'header_title',
//		'type' => 'text',
//		),		
//		array(
//		'name' => 'Top Page Background Image',
//		'desc' => 'Upload an image or enter an URL.',
//		'id'   => $prefix . 'bg_img_top',
//		'type' => 'file',
//		),		
//		array(
//		'name' => 'Bottom Page Background Image',
//		'desc' => 'Upload an image or enter an URL.',
//		'id'   => $prefix . 'bg_img_bottom',
//		'type' => 'file',
//		),
//		array(
//		'name' => 'Page Title',
//		'desc' => 'field description (optional)',
//		'id'   => $prefix . 'page_title',
//		'type' => 'text',
//		),		
//		array(
//		'name' => 'Page Text Color',
//		'id'   => $prefix . 'text_color',
//		'type' => 'colorpicker',
//		'std'  => '#000000'
//		),			
//	),
//);

// Add other metaboxes as needed
$meta_boxes[] = array(
	'id' => 'add-content',
	'title' => 'Additional Page Content',
	'pages' => array('page'),
	'context' => 'normal',
	'priority' => 'low',
	'show_names' => true,
	'fields' => array(
//		array(
//		'name' => 'Instructions',
//		'desc' => 'In the right column upload a featured image. Make sure this image is at least 900x360px wide. Then fill out the information below.',
//		'type' => 'title',
//		),
		array(
		'name'    => 'Regular ole wysiwyg',
		'desc'    => 'This content will appear at the bottom of the page.',
		'id'      => $prefix . 'add_content',
		'type'    => 'wysiwyg',
		'options' => array(	'textarea_rows' => 10, ),
		),		
	),
);

add_filter( 'cmb_meta_boxes' , 'be_create_metaboxes' );

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
require_once locate_template('/mods/cmb/init.php');

}