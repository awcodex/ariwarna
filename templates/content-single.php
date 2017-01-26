<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
	
	<div class="social_share clearfix">
		<div id="share-buttons">
			
			<!-- Buffer -->
			<a href="https://bufferapp.com/add?url=<?php bloginfo('url');?><?php the_permalink();?>&amp;text=<?php the_title();?>" target="_blank">
				<img class="grayscale" src="<?php bloginfo('template_url');?>/assets/img/icon/buffer.png" alt="Buffer" />
			</a>
			
			<!-- Digg -->
			<a href="http://www.digg.com/submit?url=<?php bloginfo('url');?><?php the_permalink();?>" target="_blank">
				<img class="grayscale" src="<?php bloginfo('template_url');?>/assets/img/icon/diggit.png" alt="Digg" />
			</a>
			
			<!-- Email -->
			<a href="mailto:?Subject=Simple Share Buttons&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 <?php bloginfo('url');?><?php the_permalink();?>">
				<img class="grayscale" src="<?php bloginfo('template_url');?>/assets/img/icon/email.png" alt="Email" />
			</a>
		 
			<!-- Facebook -->
			<a href="http://www.facebook.com/sharer.php?u=<?php bloginfo('url');?><?php the_permalink();?>" target="_blank">
				<img class="grayscale" src="<?php bloginfo('template_url');?>/assets/img/icon/facebook.png" alt="Facebook" />
			</a>
			
			<!-- Google+ -->
			<a href="https://plus.google.com/share?url=<?php bloginfo('url');?><?php the_permalink();?>" target="_blank">
				<img class="grayscale" src="<?php bloginfo('template_url');?>/assets/img/icon/google.png" alt="Google" />
			</a>
			
			<!-- LinkedIn -->
			<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php bloginfo('url');?><?php the_permalink();?>" target="_blank">
				<img class="grayscale" src="<?php bloginfo('template_url');?>/assets/img/icon/linkedin.png" alt="LinkedIn" />
			</a>
			
			<!-- Pinterest -->
			<a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">
			   <img class="grayscale" src="<?php bloginfo('template_url');?>/assets/img/icon/pinterest.png" alt="Pinterest" />
			</a>
			
			<!-- Print -->
			<a href="javascript:;" onclick="window.print()">
				<img class="grayscale" src="<?php bloginfo('template_url');?>/assets/img/icon/print.png" alt="Print" />
			</a>
			
			<!-- Reddit -->
			<a href="http://reddit.com/submit?url=<?php bloginfo('url');?><?php the_permalink();?>&amp;title=Simple Share Buttons" target="_blank">
				<img class="grayscale" src="<?php bloginfo('template_url');?>/assets/img/icon/reddit.png" alt="Reddit" />
			</a>
			
			<!-- StumbleUpon-->
			<a href="http://www.stumbleupon.com/submit?url=<?php bloginfo('url');?><?php the_permalink();?>&amp;title=Simple Share Buttons" target="_blank">
				<img class="grayscale" src="<?php bloginfo('template_url');?>/assets/img/icon/stumbleupon.png" alt="StumbleUpon" />
			</a>
			
			<!-- Tumblr-->
			<a href="http://www.tumblr.com/share/link?url=<?php bloginfo('url');?><?php the_permalink();?>&amp;title=Simple Share Buttons" target="_blank">
				<img class="grayscale" src="<?php bloginfo('template_url');?>/assets/img/icon/tumblr.png" alt="Tumblr" />
			</a>
			 
			<!-- Twitter -->
			<a href="https://twitter.com/share?url=<?php bloginfo('url');?><?php the_permalink();?>&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank">
			   <img class="grayscale" src="<?php bloginfo('template_url');?>/assets/img/icon/twitter.png" alt="Twitter" />
			</a>
			
			<!-- VK -->
			<a href="http://vkontakte.ru/share.php?url=<?php bloginfo('url');?><?php the_permalink();?>" target="_blank">
				<img class="grayscale" src="<?php bloginfo('template_url');?>/assets/img/icon/vk.png" alt="VK" />
			</a>
			
			<!-- Yummly -->
			<a href="http://www.yummly.com/urb/verify?url=<?php bloginfo('url');?><?php the_permalink();?>&amp;title=Simple Share Buttons" target="_blank">
				<img class="grayscale" src="<?php bloginfo('template_url');?>/assets/img/icon/yummly.png" alt="Yummly" />
			</a>
			<div class="liked">
				<div class="ss_butt">
				  <iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;layout=button_count&amp;show_faces=false&amp;
				   width=90&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:90px; height:25px;">
				  </iframe>
				</div> 
			 </div>
		</div>
	</div><!--social share ends-->
    <footer class="clearfix"> 
		<div class="col-sm-6 kotlink"> 
			<?php previous_post_link(); ?> 
		</div>
		<div class="col-sm-6 text-right kotlink"> 
			<?php next_post_link(); ?> 
		</div> 
    </footer>
	<div class="custom">
	<?php echo thesis_author_box();?>
	</div>
	<div class="related row">
	    <?php $orig_post = $post;
			global $post;
			$categories = get_the_category($post->ID);
			if ($categories) {
				$category_ids = array();
				foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

				$args=array(
				'category__in' => $category_ids,
				'post__not_in' => array($post->ID),
				'posts_per_page'=> 6, // Number of related posts that will be shown.
				'caller_get_posts'=>1
				);

				$my_query = new wp_query( $args );
				if( $my_query->have_posts() ) {
					echo '<div id="related_posts"><h3>Related Posts</h3><ul>';
					while( $my_query->have_posts() ) {
					$my_query->the_post();?>
						<li>
							<div class="relatedcontent">
								<h5><a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
								<?php the_time('M j, Y') ?>
							</div>
						</li>
						<?php
					}
					echo '</ul></div>';
				}
			}
			$post = $orig_post;
			wp_reset_query(); ?>
	</div>
	<div class="clearfix comments-area">
		<ul class="nav nav-tabs" role="tablist">
			<li role="comments"><a href="#facebookC" aria-controls="facebookC" role="tab" data-toggle="tab">Facebook</a></li>  
			<li role="comments" class="active"><a href="#websiteC" aria-controls="websiteC" role="tab" data-toggle="tab">Disqus</a></li>
		</ul>
		<div class="tab-content" style="min-height:215px;">
			<div role="tabpanel" class="tab-pane" id="facebookC">
				<div class="fb-comments" data-href="" data-width="100%" data-numposts="10"></div>
			</div>
			<div role="tabpanel" class="tab-pane active" id="websiteC">
				<?php //comments_template('/templates/comments.php'); ?>
				<div id="disqus_thread"></div>
					<script>

					/**
					*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
					*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
					/* 
					var disqus_config = function () {
					this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
					this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
					};
					*/
					(function() { // DON'T EDIT BELOW THIS LINE
					var d = document, s = d.createElement('script');
					s.src = '//ariwarna.disqus.com/embed.js';
					s.setAttribute('data-timestamp', +new Date());
					(d.head || d.body).appendChild(s);
					})();
					</script>
					<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
			</div>
		</div>
	</div>
  </article>
<?php endwhile; ?>
