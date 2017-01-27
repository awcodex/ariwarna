<div class="foo-arti">
	  <span class="jempol">
		<div data-share="false" data-show-faces="false" data-action="like" data-layout="button_count" data-href="<php the_permalink();?>" class="fb-like"></div>
	  </span>
	  <div class="w-coment"> 
		<img alt="Comments" src="<?php bloginfo(template_url);?>/assets/img/icon/share/comments.png"> <?php comments_popup_link(' 0', ' 1', ' %'); ?> 
	  </div>
		<div class="dropdown to-sharehg">
		  <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			 <img alt="Comments" src="<?php bloginfo(template_url);?>/assets/img/icon/share/to-share.png">
			<!--<span class="caret"></span>-->
		  </button>
		  <ul class="dropdown-menu" aria-labelledby="dLabel">
		  <span class="rotop"></span>
			<li>
				<a href="http://www.facebook.com/sharer.php?u=<?php bloginfo('url');?><?php the_permalink();?>">
					 <img alt="Share Facebook" src="<?php bloginfo(template_url);?>/assets/img/icon/share/facebook.png"> Facebook
				</a>
			</li>
			<li>
				<a href="http://twitter.com/share?text=An%20Awesome%20Link&url=<?php bloginfo('url');?><?php the_permalink();?>">
					<img alt="Share Facebook" src="<?php bloginfo(template_url);?>/assets/img/icon/share/twitter.png"> Twitter
				</a>
			</li>
		  </ul>
		</div>
	 
	</div>