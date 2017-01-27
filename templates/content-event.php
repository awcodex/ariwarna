<article <?php post_class(); ?>>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php //get_template_part('templates/entry-meta'); ?>
  </header>
  <div class="entry-summary">
	<?php echo get_post_meta($post->ID, 'warna_event_start', true);?>
    <?php the_excerpt(); ?>
  </div>
</article>