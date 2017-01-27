<?php
class Popular_list_By_Warna extends WP_Widget {
  private $fields = array(
    'show'          => 'Show Post'
  );

  function __construct() {
    $widget_ops = array('classname' => 'hgp_list_By_Warna', 'description' => __('Use this widget to Popular Post With Blog View Style', 'roots'));

    $this->WP_Widget('hgp_list_By_Warna', __('AW List Popular Post', 'roots'), $widget_ops);
    $this->alt_option_name = 'hgp_list_By_Warna';

    add_action('save_post', array(&$this, 'flush_widget_cache'));
    add_action('deleted_post', array(&$this, 'flush_widget_cache'));
    add_action('switch_theme', array(&$this, 'flush_widget_cache'));
  }

  function widget($args, $instance) {
    $cache = wp_cache_get('hgp_list_By_Warna', 'widget');

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

    $title = apply_filters('widget_title', empty($instance['title']) ? __('Popular Post', 'roots') : $instance['title'], $instance, $this->id_base);

    foreach($this->fields as $name => $label) {
      if (!isset($instance[$name])) { $instance[$name] = ''; }
    }

    echo $before_widget;

    if ($title) {
      echo $before_title, $title, $after_title;
    }
  ?>
  <div class="margin-minus">
	<div class="popular-by-warna clearfix">
	<?php 
		$numpos =  $instance['show_list'];
		$popularpost = new WP_Query( array( 'posts_per_page' => $numpos, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
		while ( $popularpost->have_posts() ) : $popularpost->the_post();?>

		
		
      <div class="popular-listwarna">
        <div class="thumbnailwgt-wrp col-xs-3">
			<div class="row">
			  <?php
			  // Must be inside a loop.

			  if ( has_post_thumbnail() ) {
				the_post_thumbnail('wgtthumb');
			  }
			  else {
				echo '<img class="thumbdef attachment-wgtthumb img-responsive" src="' . get_bloginfo( 'stylesheet_directory' ) . '/assets/img/small-default.png" />';
			  }
			  ?>   
			</div>
        </div>
        <div class="post-text col-xs-9">
          <div class="header-post">
            <h3><a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title();?>"><?php the_title();?></a></h3>
            <p>
              <?php 
              echo date("M - j.Y");
              ?>
            </p>
          </div>  
        </div>
      </div> 
	  
		<?php endwhile; wp_reset_query();?>
	</div> 
  </div> 
  <?php
    echo $after_widget;

    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('hgp_list_By_Warna', $cache, 'widget');
  }

  function update($new_instance, $old_instance) {
    $instance = array_map('strip_tags', $new_instance);

    $this->flush_widget_cache();

    $alloptions = wp_cache_get('alloptions', 'options');

    if (isset($alloptions['hgp_list_By_Warna'])) {
      delete_option('hgp_list_By_Warna');
    }

    return $instance;
  }

  function flush_widget_cache() {
    wp_cache_delete('hgp_list_By_Warna', 'widget');
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
