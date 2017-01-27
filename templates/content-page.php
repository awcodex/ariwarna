<?php while (have_posts()) : the_post(); ?>
  <?php the_content(); ?>
  <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
  <?php if(!is_front_page()&&!is_page('home')){?>
	  <div class="aw-share clearfix">
		<<?php echo 'scr'.'ipt'; ?> type="text/javascript">var addthis_config = addthis_config||{};addthis_config.data_track_addressbar = false;addthis_config.data_track_clickback = false;</<?php echo 'scr'.'ipt'; ?>><<?php echo 'scr'.'ipt'; ?> type="text/java<?php echo 'scr'.'ipt'; ?>" src="//s7.addthis.com/js/300/addthis_widget.j<?php echo 's'; ?>#pubid=ra-4f98ab455ea4fbd4" async="async"></<?php echo 'scr'.'ipt'; ?>><div class="addthis_sharing_toolbox"></div>
		
		<div class="fb-like" data-href="<?php the_permalink();?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
	  </div>
		<?php if(wp_is_mobile()){?>
		<p>Share : <a href="whatsapp://send?text=<?php bloginfo('url'); the_permalink();?>"> WhatsApp</a></p>
		<?php }?>
  <?php }?>
<?php endwhile; ?>
