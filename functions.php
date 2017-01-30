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
         echo "<div class=\"pagination\"><span class='numofpage'>Page ".$paged." of ".$pages."</span><div class='clearfix'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a class='fblink' href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a class='arrowlink' href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a class='arrowlink' href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a class='lblink' href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
		 echo '</div>';
     }
}
//3mail 
//Function mailing
function ajax_form() {
	if(!empty($_POST)) {
		if ( !isset($_POST['verify']) && !wp_verify_nonce( $_POST['verify'], 'contact' ) ){
			echo 'Sorry, your nonce did not verify.';
			die();
		} else {
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$msg = $_POST['message'];
			//$admin_mail = (get_option('pradesga_themes_options_alamat_email') == '') ? 'warnacodex@gmail.com' : get_option('pradesga_themes_options_alamat_email'); 
			$admin_mail = 'warnacodex@gmail.com';
			$the_web = get_bloginfo('url');
			
			if($_POST['status'] == 'contact') {
				//message to pengirim
				$subject = 'Admin Respond';
				
				$message = '<html><body>';
				$message .= '<p>Hi..'.$first_name.' Your message was successfully sent , and this is your messages.</p><br />';
				$message .= '<h1>Your message</h1>';
				$message .= '<table>';
				$message .= '<tr><td width="100px">First Name</td><td>'.$first_name.'</td></tr>';
				$message .= '<tr><td width="100px">Last Name</td><td>'.$last_name.'</td></tr>';
				$message .= '<tr><td>Email</td><td>'.$email.'</td></tr>';
				$message .= '<tr><td>Phone</td><td>'.$phone.'</td></tr>';
				$message .= '<tr><td>Message</td><td>'.$msg.'</td></tr>';
				$message .= '</table>';
				$message .= '<br />';
				$message .= '<p>Thanks you for your message, and then please wait for replay message from admin '.$the_web.'</p>';
				$message .= '<p>AwCodex Administrator</p>';
				$message .='</body></html>';

				$headers = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'To:' . $first_name . ' <' . $email . '>' . "\r\n";
				$headers .= 'From: AwCodex Administrator <' .$admin_mail. '>' . "\r\n";        
						
				
				//message to admin
				$a_subject = 'Message information';

				$a_message = '<html><body>';
				$a_message .= '<p>You have a message from '.$first_name.' and this is data send to you</p> <br />';
				$a_message .= '<table>';
				$a_message .= '<tr><td width="100px">First Name</td><td>'.$first_name.'</td></tr>';
				$a_message .= '<tr><td width="100px">Last Name</td><td>'.$last_name.'</td></tr>';
				$a_message .= '<tr><td>Email</td><td>'.$email.'</td></tr>';
				$a_message .= '<tr><td>Phone</td><td>'.$phone.'</td></tr>';
				$a_message .= '<tr><td>Message</td><td>'.$msg.'</td></tr>';
				$a_message .= '<tr><td><p>this message send from contact in '.$the_web.'</p></td></tr>';
				$a_message .= '</table>';
				$a_message .='</body></html>';

				$a_headers = 'MIME-Version: 1.0' . "\r\n";
				$a_headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$a_headers .= 'To: IllNois Management <' . $admin_mail . '>' . "\r\n";
				$a_headers .= 'From: ' . $first_name . ' <' . $email . '>' . "\r\n";
				
				
				
				if( wp_mail($email, $subject, $message, $headers) ){
					wp_mail( $admin_mail, $a_subject, $a_message, $a_headers );
					echo '<span class="success">Thank you for leaving a message.</span>';
					die();
				} else {
					echo '<span class="error">' . $error . '</span>';
					die();
				}
			}
		} 
//enroll
		if ( !isset($_POST['verify']) && wp_verify_nonce( $_POST['verify'], 'enroll' ) ){
			echo 'Sorry, your nonce did not verify.';
			die();
		} else { 
			$name = $_POST['name'];
			$datepicker = $_POST['datepicker'];
			$artist_band_name = $_POST['artist_band_name'];
			$genre = $_POST['genre'];
			$category = $_POST['category'];
			$your_email = $_POST['your_email'];
			$referral = $_POST['referral'];
			$your_phone = $_POST['your_phone'];
			$ur_address = $_POST['ur_address'];
			$ur_city = $_POST['ur_city'];
			$zip_code = $_POST['zip_code'];
			$ur_country = $_POST['ur_country']; 
			$howdid = $_POST['howdid'];
			$admin_mail =  'warnacodex@gmail.com';//(get_option('pradesga_themes_options_alamat_email') == '') ? 'warna1212@gmail.com' : get_option('pradesga_themes_options_alamat_email'); 

			if($_POST['status'] == 'enroll') {
				$subject = 'Enroll Submit Confirmation';
				$message = '<html><body>';
				$message .= '<p>Your Enroll Submission was successfully sent, and this is your submitted information.</p><br />';
				$message .= '<h1>Your Enroll Information</h1>';
				$message .= '<table>';
				$message .= '<tr><td width="100px">Name</td><td>: <b>'.$name.'</b></td><td> birth </td><td>'.$datepicker.'</td></tr>';
				$message .= '<tr><td>Artis or Band Name</td><td>: <b>'.$artist_band_name.'</b></td></tr>';
				$message .= '<tr><td>Genre</td><td>: <b>'.$genre.'</b></td></tr>';
				$message .= '<tr><td>Category</td><td>: <b>'.$category.'</b></td></tr>'; 
				$message .= '<tr><td>Hear About Illnoiz From</td><td>: <b>'.$howdid.'</b></td></tr>';
				$message .= '<tr><td>Email</td><td>: <b>'.$your_email.'</b></td></tr>';
				$message .= '<tr><td>Referral</td><td>: <b>'.$referral.'</b></td></tr>';
				$message .= '<tr><td>Phone</td><td>: <b>'.$your_phone.'</b></td></tr>';
				$message .= '<tr><td>Address</td><td>: <b>'.$ur_address.'</b></td></tr>';
				$message .= '<tr><td>City</td><td>: <b>'.$ur_city.'</b></td></tr>';
				$message .= '<tr><td>Zip Postal Code</td><td>: <b>'.$zip_code.'</b></td></tr>';
				$message .= '<tr><td>Country</td><td>: <b>'.$ur_country.'</b></td></tr>';
				$message .= '</table>';
				$message .= '<br />';
				$message .= '<p>Thank you for your message. Illnoiz managements will reply as soon as possible.</p>';
				$message .='</body></html>';

				$headers = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'To:' . $name . ' <' . $your_email . '>' . "\r\n";
				$headers .= 'From: Illnoiz Enroll <' .$admin_mail. '>' . "\r\n";	

				$a_subject = 'Enroll Form Submission';
				$a_message = '<html><body>';
				$a_message .= '<p>Someone who submit Enroll Forms in illnoiz.com, please check their personal data and immediately send the message confirmation.</p> <br />';
				$a_message .= '<h1>Enroll Information</h1>';
				$a_message .= '<table>';
				$a_message .= '<tr><td width="100px">Name</td><td>: <b>'.$name.'</b></td><td> birth </td><td>'.$datepicker.'</td></tr>';
				$a_message .= '<tr><td>Artis or Band Name</td><td>: <b>'.$artist_band_name.'</b></td></tr>';
				$a_message .= '<tr><td>Genre</td><td>: <b>'.$genre.'</b></td></tr>';
				$a_message .= '<tr><td>Category</td><td>: <b>'.$category.'</b></td></tr>'; 
				$a_message .= '<tr><td>Email</td><td>: <b>'.$your_email.'</b></td></tr>';
				$a_message .= '<tr><td>Referral</td><td>: <b>'.$referral.'</b></td></tr>';
				$a_message .= '<tr><td>Phone</td><td>: <b>'.$your_phone.'</b></td></tr>';
				$a_message .= '<tr><td>Address</td><td>: <b>'.$ur_address.'</b></td></tr>';
				$a_message .= '<tr><td>City</td><td>: <b>'.$ur_city.'</b></td></tr>';
				$a_message .= '<tr><td>Zip Postal Code</td><td>: <b>'.$zip_code.'</b></td></tr>';
				$a_message .= '<tr><td>Country</td><td>: <b>'.$ur_country.'</b></td></tr>';
				$a_message .= '</table>';
				$a_message .='</body></html>';

				$a_headers = 'MIME-Version: 1.0' . "\r\n";
				$a_headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$a_headers .= 'To: Illnoiz Enroll <' . $admin_mail . '>' . "\r\n";
				$a_headers .= 'From: ' . $name . ' <' . $your_email . '>' . "\r\n";
				// echo json_encode($_POST);
				if( wp_mail($your_email, $subject, $message, $headers) ) {
					wp_mail( $admin_mail, $a_subject, $a_message, $a_headers );
					echo '<span class="success">Thank you for leaving a message.</span>';
					die();
				} else {
					echo '<span class="error">' . $error . '</span>';
					die();
				}
			}
		}
	 
	}
}
add_action('wp_ajax_form', 'ajax_form');
add_action('wp_ajax_nopriv_form', 'ajax_form');
