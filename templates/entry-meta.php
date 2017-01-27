<div class="clearfix">
<div class="pull-left"><i class="fa fa-calendar"></i> <time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?> </time></div>
<div class="pull-left"><p class="byline author vcard">|  <i class="fa fa-user"></i>  <?php echo __('By', 'roots'); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></p></div>
</div>
