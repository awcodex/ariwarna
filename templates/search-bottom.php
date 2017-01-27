<div class="item-search">
	<a href="https://www.google.com/search?q=<?php the_title();?>+AriWarna&ie=utf-8&oe=utf-8">Mencari <?php the_title();?></a>
	<a href="https://www.google.com/search?q=<?php echo get_post_meta($post->ID, 'mtb_related_search1', true);?>+AriWarna&ie=utf-8&oe=utf-8">
		<?php if(get_post_meta($post->ID, 'mtb_related_search1')):echo get_post_meta($post->ID, 'mtb_related_search1', true);else : 'cara mudah'; echo get_the_title(); endif;?>
	</a>
	<a href="https://www.google.com/search?q=<?php echo get_post_meta($post->ID, 'mtb_related_search2', true);?>+AwCodex&ie=utf-8&oe=utf-8">
		<?php echo get_post_meta($post->ID, 'mtb_related_search2', true);?>
	</a>
	<a href="https://www.google.com/search?q=<?php echo get_post_meta($post->ID, 'mtb_related_search3', true);?>+Ari+Warna&ie=utf-8&oe=utf-8">
		<?php echo get_post_meta($post->ID, 'mtb_related_search3', true);?>
	</a>
	<a href="https://www.google.com/search?q=<?php echo get_post_meta($post->ID, 'mtb_related_search4', true);?>+Aw+Codex&ie=utf-8&oe=utf-8">
		<?php echo get_post_meta($post->ID, 'mtb_related_search4', true);?>
	</a>
	<a href="https://www.google.com/search?q=<?php echo get_post_meta($post->ID, 'mtb_related_search5', true);?>+Aw+Codex+tutorial&ie=utf-8&oe=utf-8">
		<?php echo get_post_meta($post->ID, 'mtb_related_search5', true);?>
	</a>
	<a href="https://www.google.com/search?q=<?php echo get_post_meta($post->ID, 'mtb_related_search6', true);?>+Ari+Warna+tutorial&ie=utf-8&oe=utf-8">
		<?php echo get_post_meta($post->ID, 'mtb_related_search6', true);?>
	</a>
	<a href="https://www.google.com/search?q=<?php echo get_post_meta($post->ID, 'mtb_related_search7', true);?>+AriWarna+tutorial&ie=utf-8&oe=utf-8">
		<?php echo get_post_meta($post->ID, 'mtb_related_search7', true);?>
	</a>
	<a href="https://www.google.com/search?q=<?php the_permalink();?>&ie=utf-8&oe=utf-8">
		<?php echo get_post_meta($post->ID, 'mtb_related_search8', true);?>
	</a>
</div>