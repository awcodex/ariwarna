<?php
class Popular_By_Warna extends WP_Widget {
  private $fields = array(
    'show'          => 'Show'
  );

  function __construct() {
    $widget_ops = array('classname' => 'widget_hg_popular', 'description' => __('Use this widget to Popular Post With Blog View Style', 'roots'));

    $this->WP_Widget('widget_hg_popular', __('AW Popular Post', 'roots'), $widget_ops);
    $this->alt_option_name = 'widget_hg_popular';

    add_action('save_post', array(&$this, 'flush_widget_cache'));
    add_action('deleted_post', array(&$this, 'flush_widget_cache'));
    add_action('switch_theme', array(&$this, 'flush_widget_cache'));
  }

  function widget($args, $instance) {
    $cache = wp_cache_get('widget_hg_popular', 'widget');

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

    // $title = apply_filters('widget_title', empty($instance['title']) ? __('vCard', 'roots') : $instance['title'], $instance, $this->id_base);

    foreach($this->fields as $name => $label) {
      if (!isset($instance[$name])) { $instance[$name] = ''; }
    }

    echo $before_widget;

    if ($title) {
      echo $before_title, $title, $after_title;
    }
  ?>
  <div class="inerwgt">
	<div class="popular-by-warna clearfix">
	<?php 
		$numpos =  $instance['show'];
		$popularpost = new WP_Query( array( 'posts_per_page' => $numpos, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
		while ( $popularpost->have_posts() ) : $popularpost->the_post();?>

		
		
      <div class="popular-postwarna" style="display:block;">
        <div class="thumbnail-wrp">
          <?php
          // Must be inside a loop.

          if ( has_post_thumbnail() ) {
            the_post_thumbnail('mediumthumb');
          }
          else {
            echo '<img class="thumbdef attachment-mediumthumb img-responsive" src="' . get_bloginfo( 'stylesheet_directory' ) . '/assets/img/default-medium.jpg" />';
          }
          ?>   
        </div>
        <div class="post-text col-sm-12">
          <div class="header-post">
            <h3><a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title();?>"><?php the_title();?></a></h3>
            <p>
              <?php
              the_category( ', ' );
              echo " / ";
              echo date("m.j.Y");
              ?>
            </p>
          </div>
          <div class="widget-post-text">
            <?php the_excerpt();?>
          </div>
			<div class="foo-homepost clearfix">
			  <div class="pull-left btnmore">
				<a href="<?php the_permalink();?>" title="<?php the_title();?>" rel="bookmark">Read More</a>
			  </div>
			  <div class="pull-right shared-inwgt">
				<a href="http://www.facebook.com/sharer.php?u=<?php bloginfo('url');?><?php the_permalink();?>">
					 <img alt="Share Facebook" src="<?php bloginfo(template_url);?>/assets/img/icon/share/fb-widget.png">
				</a>
				<a href="http://twitter.com/share?text=An%20Awesome%20Link&url=<?php bloginfo('url');?><?php the_permalink();?>">
					<img alt="Share Facebook" src="<?php bloginfo(template_url);?>/assets/img/icon/share/tw-widget.png">
				</a>
				<a href="#">
					<img alt="Share Facebook" src="<?php bloginfo(template_url);?>/assets/img/icon/share/in-widget.png">
				</a>
			  </div>
			</div>
        </div>
      </div> 
	  
		<?php endwhile; wp_reset_query();?>
	</div> 
  <?php
    echo $after_widget;

    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('widget_hg_popular', $cache, 'widget');
  }

  function update($new_instance, $old_instance) {
    $instance = array_map('strip_tags', $new_instance);

    $this->flush_widget_cache();

    $alloptions = wp_cache_get('alloptions', 'options');

    if (isset($alloptions['widget_hg_popular'])) {
      delete_option('widget_hg_popular');
    }

    return $instance;
  }

  function flush_widget_cache() {
    wp_cache_delete('widget_hg_popular', 'widget');
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
