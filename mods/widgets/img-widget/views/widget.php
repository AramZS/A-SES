<?php
/**
 * Widget template. This template can be overriden using the "sp_template_image-widget_widget.php" filter.
 * See the readme.txt file for more info.
 */

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

echo $before_widget;

if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }
if ( !empty( $description ) ) {
	echo '<div class="'.$this->widget_options['classname'].'-description" >';
	echo wpautop( $description );
	echo "</div>";
}

if ( !empty( $description2 ) ) {
	echo '<div class="'.$this->widget_options['classname'].'-description" >';
	echo wpautop( $description2 );
	echo "</div>";
}

echo '<div class="ses-img-wrap">';
echo $this->get_image_html( $instance, true );
echo '</div>';
echo '<div class="clearfix"></div>';
echo $after_widget;
?>