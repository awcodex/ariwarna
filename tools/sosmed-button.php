<?php
class Sosmed_By_Warna extends WP_Widget {
  private $fields = array(
    'facebook_url'           => 'Facebook URL',
    'twitter_url'            => 'Twitter URL',
    'pinterest_url'          => 'Pinterest URL',
    'instagram_url'          => 'Instagram URL',
  );

  function __construct() {
    $widget_ops = array('classname' => 'follow-sosmed', 'description' => __('Follow sosial media akun By AwCodex', 'roots'));

    $this->WP_Widget('follow-sosmed', __('AW Follow Button', 'roots'), $widget_ops);
    $this->alt_option_name = 'follow-sosmed';

    add_action('save_post', array(&$this, 'flush_widget_cache'));
    add_action('deleted_post', array(&$this, 'flush_widget_cache'));
    add_action('switch_theme', array(&$this, 'flush_widget_cache'));
  }

  function widget($args, $instance) {
    $cache = wp_cache_get('follow-sosmed', 'widget');

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

    $title = apply_filters('widget_title', empty($instance['title']) ? __('Follow Me', 'roots') : $instance['title'], $instance, $this->id_base);

    foreach($this->fields as $name => $label) {
      if (!isset($instance[$name])) { $instance[$name] = ''; }
    }

    echo $before_widget;

    if ($title) {
      echo $before_title, $title, $after_title;
    }
  ?>
  <ul class="sosmed-follow">
	<li class="folfb"><a href="<?php echo $instance['facebook_url']; ?>" title="Facebook"></a></li>
	<li class="foltw"><a href="<?php echo $instance['twitter_url']; ?>" title="Twitter"></a></li>
	<li class="folpi"><a href="<?php echo $instance['pinterest_url']; ?>" title="Pinterest"></a></li>
	<li class="folin"><a href="<?php echo $instance['instagram_url']; ?>" title="Instagram"></a></li>
  </ul>
  <?php
    echo $after_widget;

    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('follow-sosmed', $cache, 'widget');
  }

  function update($new_instance, $old_instance) {
    $instance = array_map('strip_tags', $new_instance);

    $this->flush_widget_cache();

    $alloptions = wp_cache_get('alloptions', 'options');

    if (isset($alloptions['follow-sosmed'])) {
      delete_option('follow-sosmed');
    }

    return $instance;
  }

  function flush_widget_cache() {
    wp_cache_delete('follow-sosmed', 'widget');
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
