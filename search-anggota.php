<?php
/*
*Template Name : Search Anggota
*/
?>
<div class="wrapper-photo">
	<div id="ajax-posts" class="clearfix aw-mans">  
		  <?php while (have_posts()) :the_post(); ?>
		  <?php $terms = get_the_terms( $post->ID, 'gender' ); ?>
			<div id="box-<?php the_ID();?>" class="item photobox<?php foreach( $terms as $term ) echo ' ' . $term->slug; ?>">
				<div class="well aw-background">
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
		  <?php endwhile ; ?> 
		  <?php  wp_reset_query() ?>
	</div>
</div>  