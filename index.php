<?php //get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>
<?php if(is_post_type_archive('portfolio')){?> 
  <?php get_template_part('templates/content', 'portfolio'); ?>
<?php } else {?>
<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>
<?php }?>
<?php if (function_exists("pagination")) {
	echo '<nav class="post-nav">';
		pagination($additional_loop->max_num_pages);
	echo '</nav>';
} ?>