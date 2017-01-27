<section class="awtabs-tabs">
	<?php $job_jeniss = get_terms('jenis'); // get all the jenis ?>
	<!-- Nav tabs -->
	<ul class="nav nav-tabs nav-justified">
		<li class="active">
			<a data-toggle="tab" href="#all">All</a>
		</li>
		<?php foreach($job_jeniss as $job_jenis) { ?>
			<li>
				<a href="#<?php echo $job_jenis->slug ?>" data-toggle="tab"><?php echo $job_jenis->name ?></a>
			</li>
		<?php } ?>
	</ul>
	<!-- Tab panes -->
	<div class="tab-content">
		<div class="tab-pane active" id="all">
			<?php 	
			$args = array(
				'post_type' => 'usaha',
				'posts_per_page' => 20,
					'paged' => $paged,
				'orderby' => 'RAND',
				'order' => 'DESC'
			);
			$all_awtabs = new WP_Query( $args );		
			?>
			<?php if ( $all_awtabs->have_posts() ) : // make sure we have awtabs to show before doing anything?>
			<div class="row">
					<?php $count = 0; while ( $all_awtabs->have_posts() ) : $all_awtabs->the_post(); ?>	
					<div class="clearfix listing-bisnis <?php echo (++$j % 2 == 0) ? 'evenpost' : 'oddpost'; ?>">
						<div class="col-sm-4">
							<div class="thuber-wrapper">
								<?php if(has_post_thumbnail()){?>
									<?php the_post_thumbnail('gallery-size', array('class' => 'img-responsive img-center imgzoom'));?>
								<?php } else {?>
								<img class="img-center img-responsive img-zoom" alt="<?php the_title();?>" src="<?php bloginfo('template_url');?>/assets/img/def-post.png">
								<?php }?>
							</div>
						</div>
						<div class="col-sm-3">
							<h3><small><?php //echo $job_jenis->name ?></small><?php the_title() ?></h3>
							<p>Owner :<?php echo get_post_meta($post->ID, 'warna_boss', true);?></p>
							<p>Contact :<?php echo get_post_meta($post->ID, 'warna_kontak', true);?></p>
						</div>
						<div class="col-sm-5">
							<p>
							<?php
								$content = get_the_content();
								echo wp_trim_words( $content, 50, '');
							?> 
							<br />
							<a href="<?php the_permalink();?>" title="<?php the_title();?>" rel="bookmark">Moco Maneh</a>
							</p> 
						</div>
					</div>
					<?php endwhile; ?>
					<?php wp_reset_query() ?>
					
					<?php if ($all_awtabs->max_num_pages > 1) : ?>
					  <nav class="post-nav">
						<ul class="pager">
						  <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
						  <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
						</ul>
					  </nav>
					<?php endif; ?>
			</div>
			<?php endif; ?>
		</div><!-- all awtabs tab pane -->
		<?php foreach($job_jeniss as $job_jenis) { ?>
			<div class="tab-pane" id="<?php echo $job_jenis->slug ?>">
				<?php 	
				$args = array(
					'post_type' => 'usaha',
					'posts_per_page' => -1,
					'orderby' => 'title',
					'order' => 'ASC', 
					'tax_query' => array(
						array(
							'taxonomy' => 'jenis',
							'field' => 'slug',
							'terms' => $job_jenis->slug
						)
					)
				);
				$awtabs = new WP_Query( $args );		
				?>
				<?php if ( $awtabs->have_posts() ) : // make sure we have awtabs to show before doing anything?> 
				<div class="row">
					<?php while ( $awtabs->have_posts() ) : $awtabs->the_post(); ?>	
					<div class="clearfix listing-bisnis <?php echo (++$j % 2 == 0) ? 'evenpost' : 'oddpost'; ?>">
						<div class="col-sm-4">
							<div class="thuber-wrapper">
								<?php if(has_post_thumbnail()){?>
									<?php the_post_thumbnail('gallery-size', array('class' => 'img-responsive img-center imgzoom'));?>
								<?php } else {?>
								<img class="img-center img-responsive img-zoom" alt="<?php the_title();?>" src="<?php bloginfo('template_url');?>/assets/img/def-post.png">
								<?php }?>
							</div>
						</div>
						<div class="col-sm-3">
							<h3><small><?php echo $job_jenis->name ?></small><?php the_title() ?></h3>
							<p>Owner :<?php echo get_post_meta($post->ID, 'warna_boss', true);?></p>
							<p>Contact :<?php echo get_post_meta($post->ID, 'warna_kontak', true);?></p>
						</div>
						<div class="col-sm-5">
							<p>
							<?php
								$content = get_the_content();
								echo wp_trim_words( $content, 50, '');
							?>
							<br />
							<a href="<?php the_permalink();?>" title="<?php the_title();?>" rel="bookmark">Moco Maneh</a>
							</p> 
						</div>
					</div>
					<?php endwhile; ?>
					<?php wp_reset_query() ?> 
				</div>
			
				<?php endif; ?>
			</div>
		<?php }  ?>
	</div><!-- tab-content -->
</section><!-- awtab-tabs -->