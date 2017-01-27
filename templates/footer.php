<footer class="content-info" role="contentinfo">
  <div class="container">
	<div class="row">
		<div class="col-sm-5 widget-foo">
		<?php dynamic_sidebar('sidebar-footer1'); ?>
		<?php
 
function marty_get_images($post_id) {
	global $post;
 
	$thumbnail_ID = get_post_thumbnail_id();
 
	$images = get_children( array('post_parent' => $post_id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
 
	if ($images) :
		echo '<div class="gallery">';
 
		foreach ($images as $attachment_id => $image) :
 
		if ( $image->ID != $thumbnail_ID ) :
 
			$img_title = $image->post_title;   // title.
			$img_caption = $image->post_excerpt; // caption.
			$img_description = $image->post_content; // description.
 
			$img_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true); //alt
			if ($img_alt == '') : $img_alt = $img_title; endif;
 
			$big_array = image_downsize( $image->ID, 'large' );
	 		$img_url = $big_array[0];
 
			?>
 
			<div class="slide">
				<div  class="description">
					<p class="title"><strong><?php echo $img_title; ?></strong></p>
					<?php if ($img_caption) : echo wpautop($img_caption, 'caption'); endif; ?>
					<?php if ($img_description) : echo wpautop($img_description); endif; ?>
				</div>
				<div class="image">
					<p><img src="<?php echo $img_url; ?>" alt="<?php echo $img_alt; ?>" title="<?php echo $img_title; ?>" /></p>
				</div>
			</div>
 
		<?php endif; ?>
		<?php endforeach; ?>
		</div><!-- End gallery -->
	<?php endif;
 
}
 
?>
		</div>
		<div class="col-sm-6 widget-foo">
		<?php dynamic_sidebar('sidebar-footer2'); ?>
		
		<section class="widget widget_text"><h3>Powered By</h3>
				<p><small>Website Ini merupakan official website dari karang taruna TAKESHI dan sepenuhnya di dukung oleh :</small></p>
			<div class="row"> 
				<div class="col-xs-6 col-md-4 logo-bisnis">
					<img class="img-responsive" src="<?php bloginfo('template_url');?>/assets/img/logo/ceko-logo.png" alt="Takeshi Bisnis">
				</div>
				<div class="col-xs-6 col-md-4 logo-bisnis">
					<img class="img-responsive" src="<?php bloginfo('template_url');?>/assets/img/logo/nanang-logo.png" alt="Takeshi Bisnis">
				</div>
				<div class="col-xs-6 col-md-4 logo-bisnis">
					<img class="img-responsive" src="<?php bloginfo('template_url');?>/assets/img/logo/sarni-logo.png" alt="Takeshi Bisnis">
				</div>
				<div class="col-xs-6 col-md-4 logo-bisnis">
					<img class="img-responsive" src="<?php bloginfo('template_url');?>/assets/img/logo/edi-logo.png" alt="Takeshi Bisnis">
				</div>
				<div class="col-xs-6 col-md-4 logo-bisnis">
					<img class="img-responsive" src="<?php bloginfo('template_url');?>/assets/img/logo/warna-logo.png" alt="Takeshi Bisnis">
				</div>
				<div class="col-xs-6 col-md-4 logo-bisnis">
					<img class="img-responsive" src="<?php bloginfo('template_url');?>/assets/img/logo/molog-logo.png" alt="Takeshi Bisnis">
				</div>
				<div class="col-xs-6 col-md-4 logo-bisnis">
					<img class="img-responsive" src="<?php bloginfo('template_url');?>/assets/img/logo/zainal-logo.png" alt="Takeshi Bisnis">
				</div>
			</div>
		</section>
		
		</div>
	</div>
  </div>
</footer>
<div class="footer-logo">
	<div class="clearfix text-center">
		<div class="container">
			<div class="col-sm-3">
				<img class="img-responsive" alt="karang-taruna" src="<?php bloginfo('template_url');?>/assets/img/logo-karangtaruna.png">
			</div>
			<div class="col-sm-6 text-logo">
				<p><strong>TAKESHI</strong></p>
				<p>Dari Desa menyapa dunia</p>
			</div>
			<div class="col-sm-3">
				<img class="img-responsive" alt="karang-taruna" src="<?php bloginfo('template_url');?>/assets/img/logo-takeshibulat.png">
			</div>
		</div>
	</div>
</div>
<div class="foo-copyright">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<div class="fb-like" data-href="http://www.takeshislote.com" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
				<p>FInd Us : <a href="https://www.facebook.com/takeshislote" target="_blank">Facebook</a> | 
				<a href="https://twitter.com/takeshislote" target="_blank">Twitter</a> |
				<a href="https://www.instagram.com/takeshislote/" target="_blank">Instagram</a>  </p>
			</div>
			<div class="col-sm-4 text-right">
				&copy; <?php echo date('Y');?> <?php bloginfo('name');?> All Rightreserved
			</div>
		</div>
	</div>
</div>

<?php wp_footer(); ?>
