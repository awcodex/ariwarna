<header class="banner navbar navbar-takeshi navbar-static-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo home_url(); ?>/"><img class="img-responsive" alt="<?php bloginfo('name'); ?>" src="<?php bloginfo('template_url'); ?>/assets/img/logo-takeshi.png"></a>
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav pull-right aw-menus'));
        endif;
      ?>
    </nav>
  </div>
</header>
<div class="aware-line">
	<div class="clearfix">
		<div class="container">
			<?php if(is_front_page()){?>
				<?php get_template_part('templates/content', 'slider');?>
			<?php }?>
		</div>
	</div>
</div>
