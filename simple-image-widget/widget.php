<?php
/**
 * Default widget template.
 *
 * Copy this template to /simple-image-widget/widget.php in your theme or
 * child theme to make edits.
 *
 * @package   SimpleImageWidget
 * @copyright Copyright (c) 2014, Blazer Six, Inc.
 * @license   GPL-2.0+
 * @since     4.0.0
 */
?>
<style>
.img-widget-name,
.img-widget-position,
.img-widget-phone,
.img-widget-email,
.img-widget-caption-top,
.img-widget-caption-bottom{
    clear: both;
    display: block;
    margin: 10px 0;
}
.img-widget-name{}
.img-widget-phone{}
.img-widget-phone i{margin-right: 5px;}
.img-widget-email{}

</style>
<?php
if ( ! empty( $title ) ) :
	echo $before_title . $title . $after_title;
endif;
?>
<?php
if ( ! empty( $name ) ) :
//	echo $name;
	echo '<div class="img-widget-name"><span>'. $name .'</span></div>';
endif;
?>
<?php
if ( ! empty( $position ) ) :
//	echo $position;
	echo '<div class="img-widget-position"><span>'. $position .'</span></div>';
endif;
?>
<?php
if ( ! empty( $phone ) ) :
//	echo $phone;
	echo '<div class="img-widget-phone"><a href="tel:+1'. $phone .'"><i class="fa fa-phone"></i>'. $phone .'</a></div>';
endif;
?>
<?php
if ( ! empty( $email ) ) :
//	echo $email;
	echo '<div class="img-widget-email"><a href="mailto:'. $email .'">'. $email .'</a></div>';
endif;
?>
<?php
if ( ! empty( $top_caption ) ) :
//	echo apply_filters( 'the_content', $top_caption );
	echo '<div class="img-widget-caption img-widget-caption-top">';
//	echo apply_filters( 'the_content', $top_caption );
	echo wpautop( $top_caption );
	echo '</div>';

endif;
?>
<?php if ( ! empty( $image_id ) ) : ?>
	<p class="simple-image">
		<?php
		echo $link_open;
		echo wp_get_attachment_image( $image_id, $image_size );
		echo $link_close;
		?>
	</p>
<?php endif; ?>
<?php
if ( ! empty( $text ) ) :
//	echo apply_filters( 'the_content', $top_caption );
	echo '<div class="img-widget-caption img-widget-caption-bottom">';
	echo apply_filters( 'the_content', $text );
	echo '</div>';

endif;
?>
<?php if ( ! empty( $link_text ) ) : ?>
	<p class="more">
		<?php
		echo $link_open;
		echo $link_text;
		echo $link_close;
		?>
	</p>
<?php endif; ?>
