<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.8&appId=188779841457020";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> 
  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    // Use Bootstrap's navbar if enabled in config.php
    if (current_theme_supports('bootstrap-top-navbar')) {
      get_template_part('templates/header-top-navbar');
    } else {
      get_template_part('templates/header');
    }
  ?> 
	<?php if(is_front_page()){?>
		<div class="slider-main">
		<?php get_template_part('templates/slider');?>
		</div>
		<div class="forheight">
		<?php if(wp_is_mobile()){?>
		<?php get_template_part('templates/bg', 'slider');?>
		<?php } else {?>  
					<video autoplay loop class="aw-vibanner">
						<source src="<?php bloginfo('template_url');?>/assets/img/vid/run.mp4" type="video/mp4" />  
					</video>  
		<?php }?>
		</div>
	<?php } else{?>
		<div id="Bcontent" class="wrapper-banner">
		</div>
		<div class="container">
			<h1 class="title-off">
				<?php if(is_singular('post')&&!is_page()){
					echo 'AwCodex Blog';
				} elseif(is_post_type_archive()){
					echo post_type_archive_title();
				} elseif(is_singular()&&!is_singular('post')&&!is_page()){
					$post = get_queried_object();
					$postType = get_post_type_object(get_post_type($post));
					if ($postType) {
						echo esc_html($postType->labels->singular_name);
					}
				} else{
					echo roots_title();
				}?>
			</h1>
		</div> 
	<?php }?> 
  <div class="wrap container" role="document">
    <div class="content row"> 
	<?php if(!is_singular()&&!is_page()){?>
      <main class="main <?php echo roots_main_class(); ?> the-equal" role="main">
	<?php } else {?> 
      <main class="main <?php echo roots_main_class(); ?> the-singwrap" role="main">
	<?php }?>
	<!--<div class="text-center"> 
	  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	  ariwarna.net  
		<ins class="adsbygoogle"
			 style="display:block"
			 data-ad-client="ca-pub-3050802018930479"
			 data-ad-slot="1729351945"
			 data-ad-format="auto"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	  </div>--> 
		<?php
			if ( function_exists('yoast_breadcrumb')&&!is_front_page() ) {
			yoast_breadcrumb('
			<p id="breadcrumbs">','</p> 
			');
			}
		?>
		<?php if(!is_post_type_archive()&&is_home()){?>
			<div class="alert alert-success alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				<p class="text-center">Laman ini tidak hanya mengulas informasi atau artikel tentang seluk beluk coding, website atau IT. di sini pembaca akan di suguhi tentang sisi lain dari seorang programer yang kesan nya selalu kalem, unyu, cool dan strong.<br />dalam laman ini admin akan menuangkan segala kegalauan, suka duka, dan sedikit <del>curhat <i>mungkin</i></del> dari kejadian-kejadian yang admin lihat, admin dengar, admin alami, dalam hidup keseharian ketika berada di sebuah lingkungan yang begitu heterogen<br /> so selamat menikmati :D</p>
			</div>
		<?php }?>
		<?php if(is_front_page()){?>
		<?php get_template_part('templates/content', 'home');?>
		<?php } else {?>
        <?php include roots_template_path(); ?>
		<?php }?>
      </main><!-- /.main -->
      <?php if (roots_display_sidebar()) : ?>
	<?php if(!is_singular()&&!is_page()){?>
        <aside class="sidebar <?php echo roots_sidebar_class(); ?> the-equal" role="complementary">
	<?php } else {?> 
        <aside class="sidebar <?php echo roots_sidebar_class(); ?> the-sider" role="complementary">
	<?php }?>
          <?php include roots_sidebar_path(); ?>
        </aside><!-- /.sidebar -->
      <?php endif; ?>
    </div><!-- /.content -->
  </div><!-- /.wrap -->

  <?php get_template_part('templates/footer'); ?>
	<?php if(is_singular()){?>
	<script id="dsq-count-scr" src="//ariwarna.disqus.com/count.js" async></script>
	<?php }?>
</body>
</html>
