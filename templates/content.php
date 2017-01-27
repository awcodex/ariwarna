<article <?php post_class(); ?>> 
	<?php if(is_tax('gender')||is_post_type_archive('anggota')){?>
		  <?php $terms = get_the_terms( $post->ID, 'gender' ); ?>
			<div id="box-<?php the_ID();?>" class="item photobox<?php foreach( $terms as $term ) echo ' ' . $term->slug; ?>">
				<div class="well aw-background<?php echo ($xyz++%5); ?>">
					<div class="item-gallery">
					  <a class="sgal-link" href="<?php the_permalink();?>" data-postid="<?php the_ID();?>" title="<?php the_title();?>" rel="bookmark">
						<?php
						if ( has_post_thumbnail() ) {
						  the_post_thumbnail('gal-archive', array('class' => 'img-responsive img-center imgzoom'));
						}
						else {
						  echo '<img class="thumbdef img-responsive" src="' . get_bloginfo( 'stylesheet_directory' ) . '/assets/img/def-kotak.jpg" />';
						}
						?>   
					  </a>
					  <h3><?php the_title();?></h3>
					  <div class="the-gen"><span>gender</span><?php foreach( $terms as $term ) echo ' ' . $term->name; ?></div>
					</div>
				</div>
			</div>
	<?php } else { ?>
  <header>
  <?php $i++; ?>
  <?php echo $i;?>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php get_template_part('templates/entry-meta'); ?>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
	<?php }?>
</article>
