<?php while (have_posts()) : the_post(); ?>
<div class="row">
	<div class="col-sm-6">
		<div class="thuber-wrapper">
			<?php if(has_post_thumbnail()){?>
				<?php the_post_thumbnail('def-panjang', array('class' => 'img-responsive img-center imgzoom'));?>
			<?php } else {?>
				<img class="img-responsive img-center imgzoom" alt="<?php the_title();?>" src="<?php bloginfo('template_url');?>/assets/img/def-panjang.jpg">
			<?php }?>
		</div>
	</div>
	<div class="col-sm-6">
		<h1 class="usaha-title"><?php the_title();?></h1>
		<p><span class="glyphicon glyphicon-user"> </span> Owner :<?php echo get_post_meta($post->ID, 'warna_boss', true);?></p>
		<p><span class="glyphicon glyphicon-phone-alt"> </span> Contact :<?php echo get_post_meta($post->ID, 'warna_kontak', true);?></p>
		<hr />
		<p><?php custom_excerpt(70, ' ') ?></p>
		<p><a class="btn btn-success btn-block" href="#"><span class="glyphicon glyphicon-send"></span> Contact <?php echo get_post_meta($post->ID, 'warna_kontak', true);?></a></p>
		<?php if(wp_is_mobile()){?>
		<p>Share : <a href="whatsapp://send?text=<?php bloginfo('url'); the_permalink();?>"> WhatsApp</a></p>
		<?php }?>
	</div> 
</div>
<div class="row">
	<div class="col-sm-12">
	<hr />
		<h4><?php the_title();?> </h4>
		<?php the_content();?>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="aw-share clearfix">
		  <<?php echo 'scr'.'ipt'; ?> type="text/javascript">var addthis_config = addthis_config||{};addthis_config.data_track_addressbar = false;addthis_config.data_track_clickback = false;</<?php echo 'scr'.'ipt'; ?>><<?php echo 'scr'.'ipt'; ?> type="text/java<?php echo 'scr'.'ipt'; ?>" src="//s7.addthis.com/js/300/addthis_widget.j<?php echo 's'; ?>#pubid=ra-4f98ab455ea4fbd4" async="async"></<?php echo 'scr'.'ipt'; ?>><div class="addthis_sharing_toolbox"></div>
		</div>
		<div class="aw-fbcomments">
			<div class="clearfix">
				<div class="fb-comments"></div>
			</div>
		</div>

	</div>
</div>
<?php endwhile ;?>