<div id="box-<?php the_ID();?>" class="item photobox">
	<div class="well aw-background<?php echo ($xyz++%5); ?>">
		<div class="item-gallery">
			<a class="sgal-link" href="<?php the_permalink();?>" data-postid="<?php the_ID();?>" title="<?php the_title();?>" rel="bookmark">
				<?php
				if ( has_post_thumbnail() ) {
				  the_post_thumbnail('gal-archive', array('class' => 'img-responsive img-center imgzoom'));
				}
				else {
				  echo '<img class="thumbdef img-responsive" src="' . get_bloginfo( 'stylesheet_directory' ) . '/assets/img/def-panjang.jpg" />';
				}
				?>   
			</a>
		  <h3><?php the_title();?></h3>
		</div>
	</div>
</div>