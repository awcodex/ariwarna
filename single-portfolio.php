<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>> 
    <div class="top-content">
		<div class="row">
			<div class="col-sm-6 text-center">
			<?php if ( has_post_thumbnail() ) { ?> 
				<div class="pimager img-thumbnail">
						<?php the_post_thumbnail('medium', array('class' => 'img-responsive')); ?>
				</div>
				<?php } else {?> 
				<div class="pimager">
					<a href="<?php the_permalink(); ?>"><img class="img-responsive" alt="<?php the_title();?>" src="<?php bloginfo('template_url');?>/assets/img/default.jpg"></a>  
				</div>
				<?php } ?>	
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
			</div>
			<div class="col-sm-6">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<p><?php 
					$content = get_the_content();
					echo wp_trim_words($content, 40, '');
				?></p>
				<hr />
				<p>
					Category :
					<?php   // Get terms for post
						$terms = get_the_terms( $post->ID , 'jenis' );
						// Loop over each item since it's an array
						if ( $terms != null ){
						foreach( $terms as $term ) {
						$term_link = get_term_link( $term, 'jenis' );
						 // Print the name and URL
						echo '<a href="' . $term_link . '">' . $term->name . '</a>';
						// Get rid of the other data stored in the object, since it's not needed
						unset($term); } }
					?>
				</p>
				<p>
					Created By : <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a>
				</p>
				<p>
					Link : <a href="<?php echo get_post_meta($post->ID, 'mtb_client_link', true);?>" target="_blank" rel="dofollow" title="<?php echo get_post_meta($post->ID, 'mtb_client_names', true);?>"><?php echo get_post_meta($post->ID, 'mtb_client_names', true);?></a>
				</p>
			</div>
		</div>
	</div>
    <div class="entry-content">
	<h4 class="entry-title text-center"><span class="glyphicon glyphicon-bookmark"> </span> Note About <span class="text-red"><?php the_title();?></span></h4>
	<hr />
      <?php the_content(); ?> 
    </div>
	
    <footer class="clearfix"> 
		<div class="col-sm-6 kotlink"> 
			<?php previous_post_link(); ?> 
		</div>
		<div class="col-sm-6 text-right kotlink"> 
			<?php next_post_link(); ?> 
		</div> 
    </footer> 
	<div class="clearfix comments-area"  style="min-height:150px;">
	<h3 class="text-center">Respond to This Item</h3>
	<hr />
		<ul class="nav nav-tabs" role="tablist">
			<li role="comments" class="active"><a href="#facebookC" aria-controls="facebookC" role="tab" data-toggle="tab">Facebook</a></li> 
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="facebookC">
				<div class="fb-comments" data-href="" data-width="100%" data-numposts="10"></div>
			</div> 
		</div>
	</div>
  </article>
<?php endwhile; ?>
