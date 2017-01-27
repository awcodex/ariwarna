<?php //get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php if(is_post_type_archive('usaha')) {?>
<div class="text-center">
	<h3>Karena kami Bukan pemalas</h3>
	<p>Dukuh Slote & Karang malang berada disebelah utara pusat kota Ponorogo, daerah yang sudah bisa di bilang daerah pedesaan, dimana mayoritas penduduknya berprofesi sebagai petani, walaupun ada juga yang bekerja sebagai pegawai baik swasta maupun pegawai negri(PNS).</p>
	<p>Selain bercocok tanam berkembang juga usaha-usaha lain yang di kelola oleh sebagian penduduk Slote dan Karangmalang sesuai dengan bidang keahlian yang mereka punya.<br /> Dibawah ini adalah usaha-usaha yang berkembang di dukuh Slote & karang malang selain pekerjaan pokok masyarakatnya sebagai Petani.</p>
	<p></p>
	<hr />
	<p></p>
</div>
	<?php get_template_part('templates/content', 'usaha'); ?>
<?php } elseif(is_post_type_archive('gallery')) {?>
<div class="text-center">
	<h3>Ketika Takeshi Menjadi Allay</h3>
	<p>Disini adalah laman tentang moment-moment yang berhasil di abadikan dalam jepretan para fothografer amatiran dan propesional dari para anggota Takeshi.</p>
	<p>Gambar di ambil dari berbagai tempat dan acara dengan type kamera yang beragam. <br />selamat menikmati :D</p>
	<p></p>
	<hr />
	<p></p>
</div>
	<?php get_template_part('templates/content', 'gallery'); ?>
<?php } elseif(is_post_type_archive('anggota') ) {?>
<div class="text-center">
	<h3>Keanggotaan Karang Taruna Takeshi</h3>
	<p>Karang taruna takeshi merupakan wadah pemuda dan pemudi wilayah Slote & karangmalang</p>
	<p>Takeshi berangotakan masyarakat dari berbagai element pendidikan, golongan dan pekerjaan yang berbeda-beda.</p>
	<p></p>
	
	<div class="clearfix">
		<?php dynamic_sidebar('cari-anggota'); ?>
	</div>
	<hr />
	<p></p>
</div>
	<?php get_template_part('templates/content', 'anggota'); ?>
<?php } else {?>
	<?php if(is_tax('gender')){?>
	<div class="wrapper-photo"> 
	<div id="ajax-posts" class="clearfix aw-mans"> 
	<?php }?>
	<?php $i=0; ?>
<?php while (have_posts()) : the_post(); ?>
	<?php if(is_post_type_archive('event')){?>
		<?php get_template_part('templates/content', 'event'); ?>
	<?php } else {?>
		<?php get_template_part('templates/content', get_post_format()); ?>
	<?php }?>
<?php endwhile; wp_reset_query(); ?>

	<?php if(is_tax('gender')){?>
	</div>
	</div>
	<?php }?> 
<?php }?>
<?php if (!is_post_type_archive('usaha')&&!is_post_type_archive('gallery')&&!is_post_type_archive('anggota')){ ?>
<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <?php awcodex_numeric_posts_nav(); ?>
  </nav>
<?php endif; ?> 
<?php }?> 
