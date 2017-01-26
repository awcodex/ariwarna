<?php
/**
 * Roots includes
 */
$roots_includes = array(
  '/lib/utils.php',           // Utility functions
  '/lib/init.php',            // Initial theme setup and constants
  '/lib/wrapper.php',         // Theme wrapper class
  '/lib/sidebar.php',         // Sidebar class
  '/lib/config.php',          // Configuration
  '/lib/activation.php',      // Theme activation
  '/lib/titles.php',          // Page titles
  '/lib/cleanup.php',         // Cleanup
  '/lib/nav.php',             // Custom nav modifications
  '/lib/gallery.php',         // Custom [gallery] modifications
  '/lib/comments.php',        // Custom comments modifications
  '/lib/relative-urls.php',   // Root relative URLs
  '/lib/widgets.php',         // Sidebars and widgets
  '/lib/scripts.php',         // Scripts and stylesheets
  '/lib/custom.php',          // Custom functions
  '/inc/custom-post.php',
);

foreach($roots_includes as $file){
  if(!$filepath = locate_template($file)) {
    trigger_error("Error locating `$file` for inclusion!", E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php'; 
add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );
function optionsframework_custom_scripts() { ?>

<script type="text/javascript"> 
jQuery(document).ready(function() {

	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});

	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}

});
</script>

<?php
} 
 show_admin_bar(false);
function custom_excerpt($new_length = 20, $new_more = '...') {
  add_filter('excerpt_length', function () use ($new_length) {
    return $new_length;
  }, 999);
  add_filter('excerpt_more', function () use ($new_more) {
    return $new_more;
  });
  $output = get_the_excerpt();
  $output = apply_filters('wptexturize', $output);
  $output = apply_filters('convert_chars', $output);
  $output = '<p>' . $output . '</p>';
  echo $output;
}
function thesis_author_box() {
	if (is_single()) {
		?>
		<div class="author_info clearfix">
		<span class="author_photo col-sm-3"><?php echo get_avatar( get_the_author_id() , 96 ); ?></span>
		<div class="col-sm-9">
		<div class="row">
		<h4>This post was written by...</h4>
		<p><?php the_author_posts_link(); ?> &ndash; who has written <?php the_author_posts(); ?> posts on <a href="<?php bloginfo('home'); ?>"><?php bloginfo('name'); ?></a>.</p>
		<p><?php the_author_description(); ?></p>
		<p class="author_email"><a href="mailto:<?php the_author_email(); ?>" title="Send an Email to the Author of this Post">Contact the author</a></p>
		</div>
		</div>
		</div>
	<?php }
}
if(is_admin()){

  add_filter('image_send_to_editor', 'wrap_my_div', 10, 8);

  function wrap_my_div($html, $id, $caption, $title, $align, $url, $size, $alt){
    return '<div class="image-content" id="mydiv-'.$id.'">'.$html.'</div>';
  }
}
add_image_size( 'medium-size', 420, 250, array( 'center', 'center' ) ); // Hard crop left top
add_image_size( 'blog-size', 420, 420, array( 'center', 'center' ) ); // Hard crop left top
add_image_size( 'blog-biger', 626, 257, array( 'center', 'center' ) ); // Hard crop left top
add_image_size( 'clients-size', 184, 69); // Hard crop left top
add_filter( 'image_size_names_choose', 'my_custom_sizes' );
 
function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'medium-size' => __( 'Awmedium size' ),
    ) );
}
function set_first(){
	$size = 'blog-biger'; // whatever size you want
	if ( has_post_thumbnail() ) {
		the_post_thumbnail( $size, array('class' => 'img-responsive') );
	} else {
		$attachments = get_children( array(
			'post_parent' => get_the_ID(),
			'post_status' => 'inherit',
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'order' => 'ASC',
			'orderby' => 'menu_order ID',
			'numberposts' => 1)
		);
		foreach ( $attachments as $thumb_id => $attachment ) {
			 $url = wp_get_attachment_image_url($thumb_id, $size);
			
		echo '<img class="img-responsive" src="' . $url . '" />';
		}
		 if(empty($attachments)){
			 echo '<img class="img-responsive img-center" src="'.get_template_directory_uri().'/assets/img/default.svg">';
		 }
	} 
}  

function pagination($pages = '', $range = 4)
{  
     $showitems = ($range * 2)+1;  
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
     }
}