<div class="row step-one">
	<div class="wrapper-box clearfix top-ic">
		<div class="col-sm-4 text-center">
			<div class="box-icon">
				<i class="fa fa-object-group fa-3x" aria-hidden="true"></i>
				<h4>Creative Design</h4>
				<p>modern, unique, and nice views</p>
			</div>
		</div>
		<div class="col-sm-4 text-center">
			<div class="box-icon">
				<i class="fa fa-code fa-3x" aria-hidden="true"></i>
				<h4>Convert Object</h4>
				<p>made website templates are ready to use</p>
			</div>
		</div>
		<div class="col-sm-4 text-center">
			<div class="box-icon">
				<i class="fa fa-gears fa-3x" aria-hidden="true"></i>
				<h4>Website maintenance</h4>
				<p>writing articles data updates etc.</p>
			</div>
		</div>
	</div>
</div>
<div class="pool-header col-sm-12">
	<h1 class="text-center">About Us</h1>
</div>
<div class="row">
	<div class="col-sm-12 text-center">
		<p>not the greatest but it is always willing to give the best for those who use the services of awcodex.</p>
		<p>serve the creation of websites such as company profile, online stores, personal blogs, and other websites. awcodex also provide site maintenance services such as data updates, or redesign.</p>
		<p>awcodex provide an affordable price without compromising the quality of results provided to you</p>
		<p>awcodex is the right person to realize your site</p>
	</div>
</div>


<div class="pool-header col-sm-12">
	<h1 class="text-center">Our Work</h1>
</div>
<div class="row">
	<div class="col-sm-6 pull-right">
		<img class="img-responsive img-center" alt="design ariwarna" src="<?php bloginfo('template_url');?>/assets/img/home/design.jpg">
	</div>
	<div class="col-sm-6">
		<div class="clearfix">
			<h4 class="box-title">Creative Design</h4>
			<p>Ariwarna design. manufacture design for all kinds of purposes, banner design, business cards, logo design, website design template, etc.
			<p>
			with Height quality nice views, and keep up to date. in addition design of ariwarna always give a fresh new look that will be seen different from the others.</p>
			<a title="About AriWarna" class="btn-green" href="/about-us">Readmore</a>
		</div>
	</div>
	<div class="col-sm-12">
		<div class="line-shadow"></div>
	</div>
</div> 
<div class="row">
	<div class="col-sm-6">
		<img class="img-responsive img-center" alt="design ariwarna" src="<?php bloginfo('template_url');?>/assets/img/home/coding.jpg">
	</div>
	<div class="col-sm-6">
		<div class="clearfix">
			<h4 class="box-title">Convert Object</h4>
			<p>convert all sorts of design format PSD, AI, PDF or JPG format into static HTML, or into a template so that can be used on multiple CMS platforms such as Wordpress, jomla, blogger.
			</p>
			<p>
			ariwarna serve manufacture various platforms template with elegant standard, proffesional, modern, clean and responsive, with relatively low prices without compromising the quality of the work produced.</p>
			<a title="About AriWarna" class="btn-green" href="/about-us">Readmore</a>
		</div>
	</div>
	<div class="col-sm-12">
		<div class="line-shadow"></div>
	</div>
</div>
<div class="row">
	<div class="col-sm-6 pull-right">
		<img class="img-responsive img-center" alt="design ariwarna" src="<?php bloginfo('template_url');?>/assets/img/home/maintenance.jpg">
	</div>
	<div class="col-sm-6">
		<div class="clearfix">
			<h4 class="box-title">Website Maintenace</h4>
			<p>helps you to keep the website you have to keep it functioning properly.
			</p>
			<p>
			contains updates, update data, keeping the backend system, cPanel, VPS, checking trouble on the admin system and fix it until all the work normally.</p>
			<a title="About AriWarna" class="btn-green" href="/about-us">Readmore</a>
		</div> 
	</div> 
</div>

<div class="pool-header col-sm-12">
	<h1 class="text-center">Portfolio</h1>
</div>
<div class="col-sm-8 col-sm-offset-2">
	<p class="text-center">here are some projects that have been completed by aw codex <br /></p>
</div>
	<div class="clearfix"></div>
<div class="clearfix">
<?php
    $loop = new WP_Query(
		array(
			'post_type' => 'portfolio',
			'posts_per_page' => 4 ,
			'order' => 'DESC',
			'orderby' => 'rand'
			)
		);
    if ( $loop->have_posts() ) :
        while ( $loop->have_posts() ) : $loop->the_post(); ?>
		<div class="tooltipo" data-toggle="tooltip" data-placement="top">
			<div class="col-sm-3 portfolio-box no-padding"> 
				<?php if ( has_post_thumbnail() ) { ?>
				<div class="zwing" style="display:none;">  
				  <div class="row innerpop">
					<?php the_post_thumbnail('medium', array('class' => 'img-responsive img-center')); ?>
					<h3 class="text-center"><a class="btn-block" href="<?php the_title();?>"><?php the_title();?></a></h3>
				  </div> 
				</div>
				<div class="pimager">
						<?php the_post_thumbnail('medium-size', array('class' => 'img-responsive')); ?>
				</div>
				<?php } else {?>
				<div class="zwing" style="display:none;">  
				  <div class="row innerpop">
					<img class="img-responsive" alt="<?php the_title();?>" src="<?php bloginfo('template_url');?>/assets/img/default.jpg">
				  </div> 
				</div>
				<div class="pimager">
					<a href="<?php the_permalink(); ?>"><img class="img-responsive" alt="<?php the_title();?>" src="<?php bloginfo('template_url');?>/assets/img/default.jpg"></a> 
				</div>
				<?php } ?>
			</div>
		</div> 
	<?php endwhile; wp_reset_postdata(); endif;?>
	<div class="clearfix"></div>
	<p class="text-center"><a title="portfolio" class="uptolink" href="/portfolio">See All <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></p>
</div>

<div class="pool-header col-sm-12">
	<h1 class="text-center">Clients Say</h1>
</div>
<div class="col-sm-8 col-sm-offset-2">
	<p class="text-center">They are who have cooperated with awcodex says<br /></p>
</div>
	<div class="clearfix"></div>
<div class="clearfix">
    <section class="regular slider">
		<?php
			$counter = 0;
			$loop = new WP_Query( array( 'post_type' => 'testimony','posts_per_page' => -1 , 'order' => 'ASC', 'orderby' => 'rand') );
			if ( $loop->have_posts() ) :
			while ( $loop->have_posts() ) : $loop->the_post();
		?>
		<div>
			<?php if ($loop->current_post % 2 == 0){?>
			<div class="col-sm-3">
			<?php } else {?>
			<div class="col-sm-3 pull-right">
			<?php }?>
				 <?php if ( has_post_thumbnail() ) { ?>
					<div class="tes-image">
						<?php the_post_thumbnail('thumbnail', array('class' => 'img-responsive img-circle')); ?>
					</div>
				 <?php } else {?>
					<div class="tes-image">
						<img class="img-responsive img-circle" alt="<?php the_title();?>" src="<?php bloginfo('template_url');?>/assets/img/user-def.jpg">
					</div>
				<?php } ?>
			</div>
			<?php if ($loop->current_post % 2 == 0){?>
			<div class="col-sm-9">
			<?php } else {?>
			<div class="col-sm-9 text-right">
			<?php }?>
				<h4><?php the_title();?></h4>
				<?php the_content();?>
				<p><i class="fa fa-commenting-o" aria-hidden="true"></i> <?php echo get_post_meta($post->ID, 'mtb_client_com', true);?></p>
			</div>
		</div>
		<?php endwhile; wp_reset_postdata(); endif;?>
	</section>
	<div class="clearfix"></div> 
</div>

<div class="pool-header col-sm-12">
	<h1 class="text-center">From The Blog</h1>
</div>
<div class="col-sm-8 col-sm-offset-2">
	<p class="text-center">You can riding our artikel in this website, <br />
	<i>
	<?php
		$count_posts = wp_count_posts();
		echo $count_posts->publish;
	?> Articles you can riding for free.</i>
	</p>
</div>
	<div class="clearfix"></div>
<div class="clearfix">
    <section class="post-inhome">
		<?php
			$counter = 0;
			$loop = new WP_Query( array( 'post_type' => 'post','posts_per_page' => 4 ) );
			if ( $loop->have_posts() ) :
			while ( $loop->have_posts() ) : $loop->the_post();
		?> 
		<div class="col-sm-6 no-padding">
			<?php if ($loop->current_post % 2 == 0){?>
			<div class="col-sm-5 pull-right">
			<?php } else {?>
			<div class="col-sm-5">
			<?php }?>
				 <?php if ( has_post_thumbnail() ) { ?>
					<div class="tes-image">
						<?php the_post_thumbnail('blog-size', array('class' => 'img-responsive')); ?>
						<small><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_the_date(); ?> | <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"> <i class="fa fa-user" aria-hidden="true"></i> <?php echo get_the_author(); ?></a></small>
					</div>
				 <?php } else {?>
					<div class="tes-image">
						<img class="img-responsive" alt="<?php the_title();?>" src="<?php bloginfo('template_url');?>/assets/img/kotak-def.jpg">
						<small><?php echo get_the_date(); ?> | <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></small>
					</div>
				<?php } ?>
			</div> 
			<div class="col-sm-7 text-justify box-post"> 
				<h4><a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title();?>"><?php the_title();?></a></h4>
				<?php custom_excerpt(14, ' ') ?>
				<p class="text-right">
					<a href="<?php the_permalink();?>" rel="bookmark" title="<?php the_title();?>">Readmore</a>
				</p>
			</div>
		</div>
                <?php $counter++;
                  if ($counter % 2 == 0) {
                  echo '<div class="clearfix"></div>';
                }
				?>
		<?php endwhile; wp_reset_postdata(); endif;?>
	</section> 
	<p class="text-center"><a href="/blog" class="uptolink" title="blog">See All <i aria-hidden="true" class="fa fa-angle-double-right"></i></a></p>
</div>


<div class="pool-header col-sm-12">
	<h1 class="text-center">They Are Brothers</h1>
</div>
<div class="col-sm-8 col-sm-offset-2">
	<p class="text-center">and they are satisfied with the results.<br /></p>
</div>
	<div class="clearfix"></div>
<div class="clearfix">
    <section class="the-clients slider"> 
		<?php
			$counter = 0;
			$loop = new WP_Query( array( 'post_type' => 'clients','posts_per_page' => -1 , 'order' => 'DESC', 'orderby' => 'rand') );
			if ( $loop->have_posts() ) :
			while ( $loop->have_posts() ) : $loop->the_post();
		?>
		<div class="col-sm-2"> 
			 <?php if ( has_post_thumbnail() ) { ?>
				<div class="client-image">
					<?php the_post_thumbnail('clients-size', array('class' => 'img-responsive grayscale')); ?>
				</div> 
				<p class="text-center client-name small-name"><?php the_title();?></p>
			<?php } ?>
		</div>
		<?php endwhile; wp_reset_postdata(); endif ;?>
	</section>
</div>