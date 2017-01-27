<?php if(is_tax('jenis')){?>
<article <?php post_class(array('class' => 'col-sm-6')); ?>>
  <div class="<?php echo (++$j % 2 == 0) ? 'bgputih' : 'bgabub'; ?>"> 
	  <div class="entry-summary">
			<div class="clearfix">
				<div class="col-xs-12"> 
					<a href="<?php the_permalink();?>" title="<?php the_title();?>" rel="bookmark">
<?php if ( has_post_thumbnail() ) {?>
   <?php the_post_thumbnail('medium', array('class' => 'img-responsive img-center'));?>
<?php } else { ?>
						<?php set_first();?> 
<?php }?>
					</a>
				</div> 
				</div>
			</div> 
	</div> 
</article>
<?php } else {?>
<article <?php post_class(); ?>>
  <div class="row <?php echo (++$j % 2 == 0) ? 'bgputih' : 'bgabub'; ?>">
	  <header class="row">
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php get_template_part('templates/entry-meta'); ?>
	  </header>
	  <div class="entry-summary">
			<div class="row">
				<div class="col-xs-12"> 
					<a href="<?php the_permalink();?>" title="<?php the_title();?>" rel="bookmark">
						<?php set_first();?> 
					</a>
				</div>
				<div class="col-xs-12">
					<?php
					$content = get_the_content();
					echo wp_trim_words($content, 30);
					?>
					<div class="button-wrapper"> 
						<a href="<?php the_permalink();?>" class="artikel-more" title="<?php the_title();?>" rel="bookmark">Read More</a>
					</div>
				</div>
			</div>
		</div>
	</div> 
</article>
<?php }?>