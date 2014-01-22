<?php
/**
 * Plugin Name: Custom Social Sidebar
 * Description: A widget that displays social links
 * Version: 0.1
 * Author: The Boy Wonder
 * Author URI: http://theboywonderagency.com
 */
add_action('widgets_init', 'sociallinks_widgets_init');

function sociallinks_widgets_init() {
	register_widget('socialsidebar_widget');
}
// Example vCard widget
class socialsidebar_widget extends WP_Widget {
  private $fields = array(
    'facebook'		=> 'facebook URL',
    'flickr'		=> 'flickr URL',
	'instagram'		=> 'instagram URL',
	'linkedin'		=> 'linkedin URL',	
	'pintrest'		=> 'pintrest URL',	
	'rss'			=> 'RSS Feed URL',
    'twitter'		=> 'Twiiter URL',
    'email'			=> 'Email'		 
  );

  function __construct() {
    $widget_ops = array('classname' => 'widget_roots_vcard', 'description' => __('Use this widget to add links to social networks', 'roots'));

    $this->WP_Widget('widget_roots_vcard', __('Social Links', 'roots'), $widget_ops);
    $this->alt_option_name = 'widget_roots_vcard';

    add_action('save_post', array(&$this, 'flush_widget_cache'));
    add_action('deleted_post', array(&$this, 'flush_widget_cache'));
    add_action('switch_theme', array(&$this, 'flush_widget_cache'));
  }

  function widget($args, $instance) {
    $cache = wp_cache_get('widget_roots_vcard', 'widget');

    if (!is_array($cache)) {
      $cache = array();
    }

    if (!isset($args['widget_id'])) {
      $args['widget_id'] = null;
    }

    if (isset($cache[$args['widget_id']])) {
      echo $cache[$args['widget_id']];
      return;
    }

    ob_start();
    extract($args, EXTR_SKIP);

	$title = apply_filters('widget_title', $instance['title']);
	$facebook = $instance['facebook']; 
	$flickr = $instance['flickr']; 
	$instagram = $instance['instagram']; 
	$linkedin = $instance['linkedin']; 	
	$pintrest = $instance['pintrest']; 
	$rss = $instance['rss']; 
	$twitter = $instance['twitter']; 
	$email = $instance['email'];

    foreach($this->fields as $name => $label) {
      if (!isset($instance[$name])) { $instance[$name] = ''; }
    }

    echo $before_widget;

    if ($title) {
      echo $before_title, $title, $after_title;
    }
  ?>
    <ul id="sidebar-social">
        <?php if ($facebook) { ?>    
            <li><a href="<?php echo $instance['facebook']; ?>" class="ss-icon">&#xF610;</a></li>
        <?php } ?>	
        <?php if ($flickr) { ?>    
            <li><a href="<?php echo $instance['flickr']; ?>" class="ss-icon">&#xF640;</a></li>
        <?php } ?>
        <?php if ($instagram) { ?>    
            <li><a href="<?php echo $instance['instagram']; ?>" class="ss-icon">&#xF641;</a></li>
        <?php } ?>	        	        
        <?php if ($linkedin) { ?>
            <li><a href="<?php echo $instance['linkedin']; ?>" class="ss-icon">.ss-linkedin</a></li>
        <?php } ?>	
        <?php if ($pintrest) { ?>
            <li><a href="<?php echo $instance['pintrest']; ?>" class="ss-icon">.ss-linkedin</a></li>
        <?php } ?>	        
		<?php if ($twitter) { ?>
            <li><a href="<?php echo $instance['twitter']; ?>" class="ss-icon">&#xF611;</a></li>
        <?php } ?>	
        <?php if ($rss) { ?>
            <li><a href="<?php echo $instance['rss']; ?>" class="ss-icon">&#xE310;</a></li>
        <?php } ?>        
        <?php if ($email) { ?>    
            <li> <a href="<?php echo $instance['email']; ?>" class="ss-icon">&#x2709;</a></li>
        <?php } ?>	    
    </ul> 
  <?php
    echo $after_widget;

    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('widget_roots_vcard', $cache, 'widget');
  }

  function update($new_instance, $old_instance) {
    $instance = array_map('strip_tags', $new_instance);

    $this->flush_widget_cache();

    $alloptions = wp_cache_get('alloptions', 'options');

    if (isset($alloptions['widget_roots_vcard'])) {
      delete_option('widget_roots_vcard');
    }

    return $instance;
  }

  function flush_widget_cache() {
    wp_cache_delete('widget_roots_vcard', 'widget');
  }

  function form($instance) {
    foreach($this->fields as $name => $label) {
      ${$name} = isset($instance[$name]) ? esc_attr($instance[$name]) : '';
    ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id($name)); ?>"><?php _e("{$label}:", 'roots'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id($name)); ?>" name="<?php echo esc_attr($this->get_field_name($name)); ?>" type="text" value="<?php echo ${$name}; ?>">
    </p>
    <?php
    }
  }
}
/***************************************
 * Add CSS file 
***************************************/
function sidebarsocialcss_enqeue()  
{
	wp_enqueue_style('sidebarsocial_style', get_stylesheet_directory_uri() . '/mods/customwidgets/sidebarsocial/sidebarsocial.css', false, null);
}
add_action('wp_enqueue_scripts', 'sidebarsocialcss_enqeue',20);
?>