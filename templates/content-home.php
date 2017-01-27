<div class="kiprah-takeshi text-center clearfix">
	<div class="title-athome">
		<h3>
			Kiprah
		</h3>
	</div>
	<p>
	Taruna takeshi senantiasa aktif dan ikut berperan serta dalam kegiatan-kegiatan kemasyarakatan<br />
	dengan sepenuh hati dan di dasari itikad baik<br />
	untuk memajukan daerah slote pada khususnya dan desa Serangan pada umumnya 
	</p>
	<div class="kiprah-box">
		<div class="col-xs-6 col-sm-4 col-lg-2 serv1 services-kotak">
			<img alt="takeshi" src="<?php bloginfo('template_url');?>/assets/img/icon/serv1.png">
			Humas
		</div>
		<div class="col-xs-6 col-sm-4 col-lg-2 serv2 services-kotak">
			<img alt="takeshi" src="<?php bloginfo('template_url');?>/assets/img/icon/serv3.png">
			Pendidikan
		</div>
		<div class="col-xs-6 col-sm-4 col-lg-2 serv3 services-kotak">
			<img alt="takeshi" src="<?php bloginfo('template_url');?>/assets/img/icon/serv6.png">
			Sosial
		</div>
		<div class="col-xs-6 col-sm-4 col-lg-2 serv6 services-kotak">
			<img alt="takeshi" src="<?php bloginfo('template_url');?>/assets/img/icon/serv2.png">
			Kerohanian
		</div>
		<div class="col-xs-6 col-sm-4 col-lg-2 serv4 services-kotak">
			<img alt="takeshi" src="<?php bloginfo('template_url');?>/assets/img/icon/serv4.png">
			Olahraga
		</div>
		<div class="col-xs-6 col-sm-4 col-lg-2 serv5 services-kotak">
			<img alt="takeshi" src="<?php bloginfo('template_url');?>/assets/img/icon/serv5.png">
			Stabilitas
		</div>
	</div>
</div>
<div class="theblog-takeshi text-left clearfix"> 
	<div class="row">
		<div class="col-sm-6 box-berita">
			<div class="title-athome">
				<h3 class="float-left">
					<i class="fa fa-bullhorn" aria-hidden="true"></i> Siaran Pedesaan
				</h3>
			</div>
			<div class="listing-inhome">
				<?php $the_query ; $lami = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 4 ) ); ?> 
				<?php if( $lami->have_posts() ): ?>
				<?php $postCount = 0;?>				
				<?php while ( $lami->have_posts() ) : $lami->the_post(); $postCount++;  ?>  
				<?php if($postCount == 1) { ?>
					<div class="first-postlayout">
						<h4 class="post-title"><a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title();?>"><?php the_title();?></a></h4>
						<?php custom_excerpt(28, ' ') ?>
						<?php //the_excerpt();?>
						<!--<a href="<?php// the_permalink();?>" rel="bookmark" title="<?php// the_title();?>" class="about-link about-link-2">Read More <i class="fa fa-angle-right"></i></a>-->
					</div>
				<?php } else { ?>
					<?php if( $postCount % 2 == 0 ) :?>
					<div class="wrapper-text srtipe clearfix">
						<h5 class="post-title"><a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title();?>"><?php the_title();?></a></h5> 
					</div> 
					<?php else :?>
					<div class="wrapper-text clearfix">
						<h5 class="post-title"><a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title();?>"><?php the_title();?></a></h5> 
					</div> 
					<?php endif ;?>
				<?php }?>
				<?php endwhile ; wp_reset_postdata(); else :?> 
					<h2 class="text-center">No Post To display</h2>
				<?php endif;?>
			</div>
		</div>	
		<div class="col-sm-6 box-berita">
			<div class="title-athome">
				<h3 class="float-left">
					<i class="fa fa-coffee" aria-hidden="true"></i> Agenda Kegiatan
				</h3>
			</div>
			<div class="listing-inhome">
				<?php $the_query ; $lami = new WP_Query( array('post_type' => 'event', 'posts_per_page' => 4 ) ); ?> 
				<?php if( $lami->have_posts() ): ?>
				<?php $postCount = 0;?>				
				<?php while ( $lami->have_posts() ) : $lami->the_post(); $postCount++;  ?> 
				<?php if( $postCount % 2 == 0 ) :?>
					<div class="wrapper-text srtipe clearfix">
						<h5 class="post-title"><a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title();?>"><?php the_title();?></a></h5>
						<p><small><?php if(get_post_meta($post->ID, 'warna_event_start', true)): echo 'di mulai pada :'; echo get_post_meta($post->ID, 'warna_event_start', true); endif ;?> <?php if(get_post_meta($post->ID, 'warna_event_end', true)): echo 'di berakhir pada :'; echo get_post_meta($post->ID, 'warna_event_end', true); endif ;?></small></p>
					</div> 
					<?php else :?>
					<div class="wrapper-text clearfix">
						<h5 class="post-title"><a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title();?>"><?php the_title();?></a></h5> 
						<p><small><?php if(get_post_meta($post->ID, 'warna_event_start', true)): echo 'di mulai pada :'; echo get_post_meta($post->ID, 'warna_event_start', true); endif ;?> <?php if(get_post_meta($post->ID, 'warna_event_end', true)): echo 'di berakhir pada :'; echo get_post_meta($post->ID, 'warna_event_end', true); endif ;?></small></p>
					</div> 
				<?php endif ;?> 
				<?php endwhile ; wp_reset_postdata(); else :?> 
					<h2 class="text-center">Belum Ada Agenda Untuk Bulan Ini</h2>
				<?php endif;?>
			</div>
		</div>	
	</div>	
</div>
<div class="kiprah-takeshi text-center clearfix">
	<div class="title-athome">
		<h3>
			Bisnis Masyarakat
		</h3>
	</div>
	<div class="row">
	<?php $loop = new WP_Query( array( 'post_type' => 'usaha', 'posts_per_page' => 6, 'orderby' => 'rand') ); ?>
	<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<div class="col-sm-4">
			<div class="boxed-bisnis">
				<div class="thuber-wrapper"> 
				<?php if(has_post_thumbnail()){?>
					<?php the_post_thumbnail('gallery-size', array('class' => 'img-responsive img-center imgzoom'));?>
				<?php } else {?>
					<img class="img-responsive img-center imgzoom" alt="<?php the_title();?>" src="<?php bloginfo('template_url');?>/assets/img/def-post.png">
				<?php }?>
				</div>
				<div class="boxe-text clearfix">
					<h3 class="boxe-title"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
					<p><span class="glyphicon glyphicon-user"> </span> <?php echo get_post_meta($post->ID, 'warna_boss', true);?> | <span class="glyphicon glyphicon-phone-alt"> </span> <?php echo get_post_meta($post->ID, 'warna_kontak', true);?></p>
				</div>
			</div>
		</div>
	<?php endwhile; wp_reset_query(); ?>
	</div>
</div>
<div class="kiprah-takeshi text-center clearfix">
	<div class="title-athome">
		<h3>
			Gallery
		</h3>
	</div>
	<div class="row">
		<div class="container wrapper-photo"> 
			  <?php 
				query_posts(array( 
					'post_type' => 'gallery',
					'showposts' => 8 
				) );  
			  ?>
			  <?php if (have_posts()) : ?>
			  <?php while (have_posts()) : the_post(); ?>
				<div class="col-xs-6 col-md-3 col-sm-3 photobox">
					<div class="row">
					  <a class="post-link" href="#" data-postid="<?php the_ID();?>" title="<?php the_title();?>" rel="<?php the_ID(); ?>" data-toggle="modal" data-target="#project-container">
						<?php
						if ( has_post_thumbnail() ) {
						  the_post_thumbnail('gallery-kotak', array('class' => 'img-responsive img-center imgzoom'));
						}
						else {
						  echo '<img class="thumbdef img-responsive" src="' . get_bloginfo( 'stylesheet_directory' ) . '/assets/img/def-kotak.jpg" />';
						}
						?>   
					  </a>
					  <h3><?php the_title();?></h3>
					</div>
				</div>
			  <?php endwhile ; else :?>
				<?php get_template_part('templates/dummy', 'photo');?>
			  <?php endif ; wp_reset_query();?> 
		  </div>
		<div class="modal fade" id="project-container" tabindex="-1" role="dialog" aria-labelledby="project-containerLabel">
		  
		</div>	
	</div>
</div>
<div class="banner-bottom-takeshi text-left clearfix"> 
	<a href="#" title="Donasi">
		<img class="img-responsive" alt="donasi" src="<?php bloginfo('template_url');?>/assets/img/banner-bottom.jpg">
	</a>
</div>
<div class="kiprah-takeshi text-center clearfix">
	<div class="title-athome">
		<h3>
			Member
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
	<div class="row" style="margin-top: 20px;margin-bottom:20px;">
		<div class="col-sm-6">
			<a class="btn btn-block btn-info" href="/gender/pria/" title="anngota cowok"> Lihat Semua Anggota pria</a>
		</div>
		<div class="col-sm-6">
			<a class="btn btn-block btn-danger" href="/gender/wanita/" title="anngota cewek"> Lihat Semua Anggota Wanita</a>
		</div>
	</div>
</div>