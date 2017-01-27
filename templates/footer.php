<footer class="content-info" role="contentinfo"> 
	<div class="container">
		<div class="clearfix">
			<section class="the-part slider row-partnership">
				<?php
					$counter = 0;
					$loop = new WP_Query( array( 'post_type' => 'partnership','posts_per_page' => -1 , 'order' => 'ASC', 'orderby' => 'rand') );
					if ( $loop->have_posts() ) :
					while ( $loop->have_posts() ) : $loop->the_post();
				?>
				<div class="col-xs-6 col-sm-2"> 
					 <?php if ( has_post_thumbnail() ) { ?>
						<div class="client-image">
							<?php the_post_thumbnail('size-full', array('class' => 'img-responsive grayscale')); ?>
						</div>  
					<?php } ?>
				</div>
				<?php endwhile; wp_reset_postdata(); endif ;?>
			</section>
		</div> 
		<div class="clearfix foo-top">
			<?php dynamic_sidebar('sidebar-footer'); ?>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<?php dynamic_sidebar('sidebar-footerb1'); ?>
			</div>
			<div class="col-sm-3">
				<?php dynamic_sidebar('sidebar-footerb2'); ?>
			</div>
			<div class="col-sm-3">
				<?php dynamic_sidebar('sidebar-footerb3'); ?>
			</div>
			<div class="col-sm-3">
				<?php dynamic_sidebar('sidebar-footerb4'); ?>
			</div>
		</div>
		<div class="row footer-credit">
			<div class="col-sm-4">
				<p>&copy; <?php echo date('Y');?> <a href="<?php bloginfo('url');?>" title="<?php bloginfo('name');?>" rel="bookmark"><?php bloginfo('name');?></a> Allright reserved</p>
			</div>
			<div class="col-sm-8">
				<div class="pull-right menu-bottom">
					 <?php
						if (has_nav_menu('foo_navigation')) :
						  wp_nav_menu(array('theme_location' => 'foo_navigation', 'menu_class' => 'footer-menus'));
						endif;
					  ?>
				</div>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
