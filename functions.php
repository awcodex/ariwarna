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
flush_rewrite_rules( false );
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

function custom_excerpt($new_length = 8, $new_more = '...') {
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
add_image_size( 'gallery-size', 355, 216, array( 'center', 'top' ) ); 
add_image_size( 'gallery-kotak', 355, 355, array( 'center', 'center' ) ); 
add_image_size( 'def-panjang', 355, 466, array( 'center', 'top' ) ); 
add_image_size( 'gal-archive', 300); 
 
function myajax_submit() {
// get the submitted parameters
   $postID = $_POST['postID'];

   $response = get_thumbnail_images(); 
   $response = json_encode($response);

// response output
   header( "Content-Type: application/json" );
   echo $response;

// IMPORTANT: don't forget to "exit"
exit; 
}
function roots_cpt_active_menu($menu) {
  $post_type = get_post_type();

  switch($post_type) {
    case 'gallery':
      $menu = str_replace('active', '', $menu);
      break;
    case 'event':
      $menu = str_replace('active', '', $menu);
      $menu = str_replace('menu-event', 'menu-event active', $menu);
      break;
    case 'usaha':
      $menu = str_replace('active', '', $menu);
      $menu = str_replace('menu-bisnis', 'menu-bisnis active', $menu);
      break;
    case 'gallery':
      $menu = str_replace('active', '', $menu);
      $menu = str_replace('menu-gallery', 'menu-gallery active', $menu);
      break;
    case 'anggota':
      $menu = str_replace('active', '', $menu);
      $menu = str_replace('menu-anggota', 'menu-anggota active', $menu);
      break;
  } 

  if (is_author()) {
    $menu = str_replace('active', '', $menu);
  }

  return $menu;
}
add_filter('nav_menu_css_class', 'roots_cpt_active_menu', 400);

/*Load more Content*/
function more_post_ajax(){
    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 3;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;

    header("Content-Type: text/html"); 
    $args = array(
       'suppress_filters' => true,
        'post_type' => 'gallery',
        'posts_per_page' => $ppp, 
        'paged'    => $page,
    ); 
    $aw_gallerys = new WP_Query($args);

    $out = '';

    if ($aw_gallerys -> have_posts()) :  while ($aw_gallerys -> have_posts()) : $aw_gallerys -> the_post();
        $out .= get_template_part('templates/ajax', 'gallery');

    endwhile;
    endif;
    wp_reset_postdata();
    die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');

/*ajaxpost*/
function starter_scripts() {

    wp_enqueue_script( 'includes', get_template_directory_uri() . '/assets/js/include.js', array('jquery'), '', true );
    wp_localize_script( 'includes', 'site', array(
                'theme_path' => get_template_directory_uri(),
                'ajaxurl'    => admin_url('admin-ajax.php')
            )
    );
}
add_action( 'wp_enqueue_scripts', 'starter_scripts' );

function my_load_ajax_content () {
    $args = array( 'p' => $_POST['post_id'], 'post_type' => 'gallery' );
    $post_query = new WP_Query( $args );
    while( $post_query->have_posts() ) : $post_query->the_post(); ?>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div <?php post_class(); ?>>
                <h2><span class="glyphicon glyphicon-picture"></span> <?php the_title(); ?></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body entry-content">
                <div class="row">      
                  <div class="col-sm-12 modal-image-wrp">
                    <?php
                      if ( has_post_thumbnail() ) {
                        the_post_thumbnail('full', array('class' => 'img-responsive img-center'));
                      }
                      else {
                        echo '<img class="thumbdef img-responsive img-center" src="' . get_bloginfo( 'stylesheet_directory' ) . '/assets/img/def-kotak.jpg" />';
                      }
                    ?>  
					<div class="clearfix">
						<?php// the_content();?>
					</div>
                  </div>
                  <div class="col-sm-12 goto-download">
                    <?php  
                      if ( has_post_thumbnail() ) {
                      $feat_image_url = wp_get_attachment_url( get_post_thumbnail_id() );
                      echo '<a class="btn btn-danger btn-block downimage" href="'.$feat_image_url.'" download><span class="glyphicon glyphicon-cloud-download"></span> Download</a>';
					  
						 if(wp_is_mobile()){ 
							echo '<p>Share : <a href="whatsapp://send?text='.$feat_image_url.'"> WhatsApp</a></p>';
						 } 
                      } else {
                        echo '<a class="btn btn-warning btn-block downimage" href="" download><span class="glyphicon glyphicon-remove-circle"></span>No File To Download</a>';
                      }
                    ?>
                  </div>
                </div>
                <?php the_content(); ?>
            </div> <!-- end .entry-content -->
            <div class="modal-footer">
              
            </div>
          </div>
        </div>
    </div>

    <?php       
    endwhile;           
    exit;
}
add_action ( 'wp_ajax_nopriv_load-content', 'my_load_ajax_content' );
add_action ( 'wp_ajax_load-content', 'my_load_ajax_content' ); 
/*anggota */
 
 function awcodex_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}


function grab($url){ 
     $data = curl_init(); 
     curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($data, CURLOPT_URL, $url); 
     $hasil = curl_exec($data);
     curl_close($data);
     return $hasil;
} 
function searchfilter($query) {
    if ($query->is_search && !is_admin() ) {
        if(isset($_GET['post_type'])) {
            $type = $_GET['post_type'];
                if($type == 'anggota') {
                    $query->set('post_type',array('anggota'));
                }
        }       
    }
return $query; 
}
add_filter('pre_get_posts','searchfilter');