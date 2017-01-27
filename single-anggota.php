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
		<div class="table-responsive">
		  <?php $terms = get_the_terms( $post->ID, 'gender' ); ?>
			<table class="table table-resposnive table-striped">
			<tr>
				<td><span class="glyphicon glyphicon-heart-empty"> </span> Gender </td><td><?php foreach( $terms as $term ) echo ' ' . $term->name; ?></td></tr> 
			<tr>
				<td><span class="glyphicon glyphicon-briefcase"> </span> Pekerjaan </td><td><?php echo get_post_meta($post->ID, 'warna_kerjo', true);?></td></tr>
			<tr>
				<td><span class="glyphicon glyphicon-flag"> </span>  Jabatan </td><td><?php echo get_post_meta($post->ID, 'warna_menjabat', true);?></td></tr>
			<tr>
				<td><span class="glyphicon glyphicon-bullhorn"> </span> Alias</td><td><?php echo get_post_meta($post->ID, 'warna_julukan', true);?></td></tr>
			<tr>
				<td><span class="glyphicon glyphicon-calendar"> </span> Bergabung </td><td><?php echo get_post_meta($post->ID, 'warna_gabung', true);?></td></tr>
			<tr>
				<td><span class="glyphicon glyphicon-certificate"> </span> Status Anggota </td><td><?php echo get_post_meta($post->ID, 'warna_status_ang', true);?></td></tr>
			<tr>
				<td><span class="glyphicon glyphicon-map-marker"> </span> Alamat </td><td><?php echo get_post_meta($post->ID, 'warna_ngalamat', true);?></td></tr>
			<tr>
				<td><span class="glyphicon glyphicon-credit-card"> </span> No ID Anggota </td><td>TKH00<?php the_ID();?></td></tr>
			</table>
		</div> 
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
<div class="kiprah-takeshi text-center clearfix">
	<div class="title-athome">
		<h3>
			Anggota Yang Lain
		</h3>
	</div>
	<div class="clearfix">
	<?php $loop = new WP_Query( array( 'post_type' => 'anggota', 'posts_per_page' => 24, 'orderby' => 'rand') ); ?>
	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<div class="col-xs-6 col-sm-1">
			<div class="boxed-anggota"> 
				<div class="thuber-wrapper row angg-pic">
				<?php if(has_post_thumbnail()){?>
					<?php the_post_thumbnail('thumbnail', array('class' => 'img-responsive img-center imgzoom'));?>
				<?php } else {?>
					<img class="img-responsive img-center imgzoom" alt="<?php the_title();?>" src="<?php bloginfo('template_url');?>/assets/img/def-user.png"> 
					
				<?php }?>
				<small class="nama-ang text-center"><a href="<?php the_permalink();?>"><?php echo get_post_meta($post->ID, 'warna_julukan', true);?></a></small>
				</div> 
			</div>
		</div>
	<?php endwhile; wp_reset_query(); ?>
	</div> 
</div>
<?php endwhile ;?>