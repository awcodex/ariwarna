<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {
	// theme style 
	$css_array = array(
		'/assets/css/default.css' => __('Default', 'options_framework_theme'),
		'/assets/css/dark.css' => __('Dark', 'options_framework_theme'),
		'/assets/css/light.css' => __('Light', 'options_framework_theme')
	);
	
	// Test data
	$test_array = array(
		'one' => __('One', 'options_framework_theme'),
		'two' => __('Two', 'options_framework_theme'),
		'three' => __('Three', 'options_framework_theme'),
		'four' => __('Four', 'options_framework_theme'),
		'five' => __('Five', 'options_framework_theme')
	);
  
	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );
 

	$options = array();

	$options[] = array(
		'name' => __('Basic Settings', 'options_framework_theme'),
		'type' => 'heading'); 
	
	$options[] = array(
		'name' => __('Contact', 'options_framework_theme'), 
		'type' => 'info');

		$options[] = array(
			'name' => __('Phone Number', 'options_framework_theme'),
			'desc' => __('Nomor untuk operator telfon ', 'options_framework_theme'),
			'id' => 'tel_num', 
			'type' => 'text');
		$options[] = array(
			'name' => __('SMS Number', 'options_framework_theme'),
			'desc' => __('Number To Sms ', 'options_framework_theme'),
			'id' => 'sms_num', 
			'type' => 'text');

		$options[] = array(
			'name' => __('BB', 'options_framework_theme'),
			'desc' => __('BB pin', 'options_framework_theme'),
			'id' => 'pin_bb', 
			'type' => 'text'); 
			
		$options[] = array(
			'name' => __('whatsapp', 'options_framework_theme'),
			'desc' => __('whatsapp', 'options_framework_theme'),
			'id' => 'no_whatsapp', 
			'type' => 'text'); 
			
		$options[] = array(
			'name' => __('wechat', 'options_framework_theme'),
			'desc' => __('wechat', 'options_framework_theme'),
			'id' => 'no_wechat', 
			'type' => 'text'); 
		
		$options[] = array(
			'name' => __('Yahoo 1', 'options_framework_theme'),
			'desc' => __('Yahoo ID ', 'options_framework_theme'),
			'id' => 'ym_satu', 
			'type' => 'text'); 
		
		$options[] = array(
			'name' => __('Twitter Profil', 'options_framework_theme'),
			'desc' => __('Twitter Profil ex= http://twtter.com/username ', 'options_framework_theme'),
			'id' => 'twitter_url', 
			'type' => 'text');
		
		$options[] = array(
			'name' => __('Facebook', 'options_framework_theme'),
			'desc' => __('Facebook/fans page Url ', 'options_framework_theme'),
			'id' => 'fb_url', 
			'type' => 'text');
		
		$options[] = array(
			'name' => __('YouTube Profile', 'options_framework_theme'),
			'desc' => __('Youtube Url/profil ', 'options_framework_theme'),
			'id' => 'youtube_url', 
			'type' => 'text');
	
	$options[] = array(
		'name' => __('Text Berjalan', 'options_framework_theme'), 
		'type' => 'info');

		$options[] = array(
			'name' => __('Text berjalan', 'options_framework_theme'),
			'desc' => __(' Input Text Berjalan ', 'options_framework_theme'),
			'id' => 'run_text', 
			'type' => 'textarea');

	// $options[] = array(
		// 'name' => __('Bank Ofline', 'options_framework_theme'), 
		// 'type' => 'info');

		// $options[] = array( 
			// 'name' => __('BCA Offline', 'options_framework_theme'),
			// 'desc' => __('Write &lt;br /&gt; for New Line.', 'options_framework_theme'),
			// 'id' => 'bank_bca', 
			// 'type' => 'textarea');

		// $options[] = array( 
			// 'name' => __('BNI Offline', 'options_framework_theme'),
			// 'desc' => __('Write &lt;br /&gt; for New Line.', 'options_framework_theme'),
			// 'id' => 'bank_bni', 
			// 'type' => 'textarea');

		// $options[] = array( 
			// 'name' => __('BRI Offline', 'options_framework_theme'),
			// 'desc' => __('Write &lt;br /&gt; for New Line.', 'options_framework_theme'),
			// 'id' => 'bank_bri', 
			// 'type' => 'textarea');

		// $options[] = array( 
			// 'name' => __('MANDIRI Offline', 'options_framework_theme'),
			// 'desc' => __('Write &lt;br /&gt; for New Line.', 'options_framework_theme'),
			// 'id' => 'bank_mandiri', 
			// 'type' => 'textarea');
	$options[] = array(
		'name' => __('Banner In Home Page', 'options_framework_theme'), 
		'type' => 'info');
		
		$options[] = array(
			'name' => __('Unggah Banner', 'options_framework_theme'),
			'desc' => __('Ganti Banner di Sidebar HomePage Boss', 'options_framework_theme'),
			'id' => 'banner_homepage', 
			'type' => 'upload');
		$options[] = array(
			'name' => __('Unggah Banner', 'options_framework_theme'),
			'desc' => __('Ganti Banner di Sidebar footer Boss', 'options_framework_theme'),
			'id' => 'banner_foot', 
			'type' => 'upload');

	$options[] = array(
		'name' => __('Text In Home Page', 'options_framework_theme'), 
		'type' => 'info');
		
		$options[] = array(
			'name' => __('Title', 'options_framework_theme'),
			'desc' => __('Ex: About Us', 'options_framework_theme'),
			'id' => 'text_title', 
			'type' => 'text');

		$options[] = array( 
			'name' => __('Some Text', 'options_framework_theme'),
			'desc' => __('Write &lt;br /&gt; for New Line.', 'options_framework_theme'),
			'id' => 'text_home', 
			'type' => 'textarea');
 
	$options[] = array(
		'name' => __('Display Settings', 'options_framework_theme'),
		'type' => 'heading'); 
	$options[] = array(
		'name' => __('Logo Image', 'options_framework_theme'), 
		'type' => 'info');
			
		$options[] = array(
			'name' => __('Upload Your Logo Image', 'options_framework_theme'),
			'desc' => __('This creates a full size uploader that previews the image.', 'options_framework_theme'),
			'id' => 'example_uploader',
			'type' => 'upload'); 
	$options[] = array(
		'name' => __('Background Setting', 'options_framework_theme'), 
		'type' => 'info');
			
		$options[] = array(
			'name' =>  __('Background Color/Image', 'options_framework_theme'),
			'desc' => __('Change the background CSS.', 'options_framework_theme'),
			'id' => 'example_background',
			'std' => $background_defaults,
			'type' => 'background' ); 

	$options[] = array(
		'name' => __('Footer Text', 'options_framework_theme'),
		'type' => 'heading' );
		
		$options[] = array(
			'name' => __('Text Footer 1', 'options_framework_theme'),
			'desc' => __('Ex: Copyright , etc', 'options_framework_theme'),
			'id' => 'footer_text1', 
			'type' => 'text');
		
		$options[] = array(
			'name' => __('Text Footer 2', 'options_framework_theme'),
			'desc' => __('Ex: Your Website Description , etc', 'options_framework_theme'),
			'id' => 'footer_text2', 
			'type' => 'text');
			
	// $options[] = array(
		// 'name' => __('Flying Image', 'options_framework_theme'), 
		// 'type' => 'info');
			
		// $options[] = array(
			// 'name' => __('Upload Image For Banner Flying', 'options_framework_theme'),
			// 'desc' => __('This creates a full size uploader that previews the image.', 'options_framework_theme'),
			// 'id' => 'flying_image',
			// 'type' => 'upload'); 

	return $options;
}