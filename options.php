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

function optionsframework_options() { 
	$tahun = date('Y');
	$footext =  get_bloginfo('name');
	$vidsatu_array = 'https://www.youtube.com/embed/zpHSTOQzx_s'; 
	$viddua_array = 'https://www.youtube.com/embed/sy1JdxxLjTE'; 
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
	$imagepath =  get_template_directory_uri() . '/assets/img/';

	$options = array();

	$options[] = array(
		'name' => __('Basic Settings', 'options_framework_theme'),
		'type' => 'heading'); 
	$options[] = array(
		'name' => __('Logo Image', 'options_framework_theme'), 
		'type' => 'info');
			
		$options[] = array(
			'name' => __('Upload Gambar logo', 'options_framework_theme'),
			'desc' => __('untuk ganti gambar logo.', 'options_framework_theme'),
			'id' => 'logo_uploader',
			'std' => $imagepath . 'logo.png',
			'type' => 'upload');
	
	$options[] = array(
		'name' => __('Text In Home Page', 'options_framework_theme'), 
		'type' => 'info');

		$wp_editor_settings = array(
			'wpautop' => true, // Default
			'textarea_rows' => 5,
			'tinymce' => array( 'plugins' => 'wordpress,wplink' )
		);

		$options[] = array(
			'name' => __( 'Text di home page', 'theme-textdomain' ),
			'desc' => sprintf( __( 'Text di bawah slider' )),
			'id' => 'text_home',
			'type' => 'editor',
			'settings' => $wp_editor_settings
		);
		$options[] = array(
			'name' => __('Banner In Home Page', 'options_framework_theme'), 
			'type' => 'info');
			
			$options[] = array(
				'name' => __('Unggah Banner', 'options_framework_theme'),
				'desc' => __('Ganti Banner di Sidebar HomePage Boss', 'options_framework_theme'),
				'id' => 'banner_homepage', 
				'std' => $imagepath . 'def-ban.jpg',
				'type' => 'upload'); 
	 
		$options[] = array(
			'name' => __('Video Embed', 'options_framework_theme'), 
			'type' => 'info');
			$options[] = array(
				'name' => __('Video Title', 'options_framework_theme'),
				'desc' => __(' Video title box 1 ', 'options_framework_theme'),
				'id' => 'vid_text1',
				'std' => 'WHAT OTHERS ARE SAYING',			
				'type' => 'text');

			$options[] = array(
				'name' => __('Vedio Box 1', 'options_framework_theme'),
				'desc' => __(' embed video code dari youtube, vimeo etc ', 'options_framework_theme'),
				'id' => 'vid_satu', 
				'std' => $vidsatu_array, 
				'type' => 'textarea');
			$options[] = array(
				'name' => __('Video Title', 'options_framework_theme'),
				'desc' => __(' Video title box 2 ', 'options_framework_theme'),
				'id' => 'vid_text2', 
				'std' => 'CERAMIC PRO LIFESTYLE', 
				'type' => 'text');
			$options[] = array(
				'name' => __('Vedio Box 2', 'options_framework_theme'),
				'desc' => __(' embed video code dari youtube, vimeo etc ', 'options_framework_theme'),
				'id' => 'vid_dua', 
				'std' => $viddua_array, 
				'type' => 'textarea');
		$options[] = array(
			'name' => __('Text Banner', 'options_framework_theme'), 
			'type' => 'info');

			$options[] = array(
				'name' => __('Text Di banner Contact', 'options_framework_theme'),
				'desc' => __(' Masukkan text untuk banner ', 'options_framework_theme'),
				'id' => 'mail_text',
				'std' => 'Jangan ragu untuk bertanya kepada kami, dengan senang hati team SCUTO akan menjawab segala pertanyaan anda tentang coating mobil.',
				'type' => 'textarea');

	$options[] = array(
		'name' => __('Contact Settings', 'options_framework_theme'),
		'type' => 'heading'); 
	
		$options[] = array(
			'name' => __('Contact', 'options_framework_theme'), 
			'type' => 'info');

			$options[] = array(
				'name' => __('Phone Number', 'options_framework_theme'),
				'desc' => __('Nomor untuk operator telfon ', 'options_framework_theme'),
				'id' => 'tel_num', 
				'std' => '+62812 1987 3989',
				'type' => 'text');
				
			$options[] = array(
				'name' => __('BB', 'options_framework_theme'),
				'desc' => __('BB pin', 'options_framework_theme'),
				'id' => 'pin_bb',  
				'std' => ' 2baad0e0',
				'type' => 'text'); 
				
			$options[] = array(
				'name' => __('whatsapp', 'options_framework_theme'),
				'desc' => __('whatsapp', 'options_framework_theme'),
				'id' => 'no_whatsapp',
				'std' => '+62812 1987 3989',
				'type' => 'text'); 
				
			$options[] = array(
				'name' => __('wechat', 'options_framework_theme'),
				'desc' => __('wechat', 'options_framework_theme'),
				'id' => 'no_wechat', 
				'type' => 'text'); 
				
			$options[] = array(
				'name' => __('Line', 'options_framework_theme'),
				'desc' => __('Line ID', 'options_framework_theme'),
				'id' => 'no_line', 
				'std' => 'scutoid',
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
				'std' => 'https://www.facebook.com/SCUTO-Indonesia-1553009248355314/',
				'type' => 'text');
			
			$options[] = array(
				'name' => __('YouTube Profile', 'options_framework_theme'),
				'desc' => __('Youtube Url/profil ', 'options_framework_theme'),
				'id' => 'youtube_url',
				'std' => 'https://www.youtube.com/channel/UCQPIKNqZtghAmNqWn3ynANA',
				'type' => 'text');
				
			$options[] = array(
				'name' => __('Instagram Username', 'options_framework_theme'),
				'desc' => __('Instagram Username -Tanpa @', 'options_framework_theme'),
				'id' => 'instagram_url',
				'std' => 'scutoindonesia',
				'type' => 'text');
	$options[] = array(
		'name' => __('Footer Text', 'options_framework_theme'),
		'type' => 'heading' );
		
		$options[] = array(
			'name' => __('Text Footer ', 'options_framework_theme'),
			'desc' => __('Ex: Copyright , etc', 'options_framework_theme'),
			'id' => 'footer_text1', 
			'std' => 'Copyright &copy; '.$tahun.' '.$footext.'',
			'type' => 'text');

	return $options;
}