<?php


require_once locate_template('/inc/post-meta-box/post-meta-box.php'); 
require_once locate_template('/inc/post-meta.php');
//$laminating = new JW_Post_Type('Type Laminating', array('supports' => array('title', 'thumbnail', 'editor')));
$slider = new JW_Post_Type('Slider', array('supports' => array('title', 'thumbnail')));
add_post_meta_box( 'image_slider_show', array(
    'title' => _x( 'Slider', 'meta box', 'wa' ),
    'pages' => array( 'slider' ),
    'context' => 'normal', // 'normal', 'advanced', or 'side'
    'priority' => 'default', // 'default', 'high', 'core', 'default' or 'low'
    'fields' => array(
		array(
            'name' => _x( 'Slider Title', 'meta box', 'wa' ),
            'id' => 'slider_title',
            'default' => '',
            'type' => 'text'
        ),
		array(
            'name' => _x( 'Slider Description', 'meta box', 'wa' ),
            'id' => 'slider_desc',
            'place-holder' => '',
            'type' => 'textarea'
        ) 
    )
	
	
)); 
$anggota = new JW_Post_Type('Anggota', array('supports' => array('title', 'thumbnail', 'editor')));

add_post_meta_box( 'Anggota', array(
    'title' => _x( 'Data Anggota Takeshi', 'meta box', 'wa' ),
    'pages' => array( 'Anggota' ),
    'context' => 'normal', // 'normal', 'advanced', or 'side'
    'priority' => 'high', // 'default', 'high', 'core', 'default' or 'low'
    'fields' => array(
		array(
            'name' => _x( 'Pekerjaan', 'meta box', 'wa' ),
            'id' => 'kerjo',
            'default' => 'Wiraswasta', 
            'type' => 'text'
        ),
		array(
            'name' => _x( 'Jabatan di Takeshi', 'meta box', 'wa' ),
            'id' => 'menjabat', 
			'default' => 'Anggota',
            'type' => 'text'
        ),
		array(
            'name' => _x( 'Nama Panggilan', 'meta box', 'wa' ),
            'id' => 'julukan', 
			'default' => '-',
            'type' => 'text'
        ),
		array(
            'name' => _x( 'Bergabung sejak', 'meta box', 'wa' ),
            'id' => 'gabung', 
			'default' => '01-08-2016',
            'type' => 'date'
        ),
		array(
            'name' => _x( 'Alamat', 'meta box', 'wa' ),
            'id' => 'ngalamat', 
			'default' => 'Slote',
            'type' => 'text'
        ),
		array(
            'name' => _x( 'Status Keanggotaan', 'meta box', 'wa' ),
            'id' => 'status_ang', 
			'default' => 'Verified',
            'type' => 'text'
        )
    )
));
add_action( 'init', 'created_anggota_taxonomies', 0 );
function created_anggota_taxonomies() {
	$labels = array(
		'name'              => _x( 'Gender', 'taxonomy general name' ),
		'singular_name'     => _x( 'Gender', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Gender' ),
		'all_items'         => __( 'All Gender' ),
		'parent_item'       => __( 'Parent Gender' ),
		'parent_item_colon' => __( 'Parent Gender:' ),
		'edit_item'         => __( 'Edit Gender' ),
		'update_item'       => __( 'Update Gender' ),
		'add_new_item'      => __('Gender'),
		'new_item_name'     => __( 'New Gender Name' ),
		'menu_name'         => __( 'Gender' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'gender' ),
	);

	register_taxonomy( 'gender', array( 'anggota' ), $args );

}

$events = new JW_Post_Type('Event', array('supports' => array('title', 'thumbnail', 'editor')));
add_post_meta_box( 'event', array(
    'title' => _x( 'Event Takeshi', 'meta box', 'wa' ),
    'pages' => array( 'Event' ),
    'context' => 'normal', // 'normal', 'advanced', or 'side'
    'priority' => 'default', // 'default', 'high', 'core', 'default' or 'low'
    'fields' => array(
		array(
            'name' => _x( 'Tempat/Lokasi', 'meta box', 'wa' ),
            'id' => 'lokasi_event',
            'default' => '',
			'default' => '-',
            'type' => 'text'
        ),
		array(
            'name' => _x( 'Waktu Mulai', 'meta box', 'wa' ),
            'id' => 'event_start',
            'place-holder' => '',
			'default' => '',
            'type' => 'date'
        ),
		array(
            'name' => _x( 'Event Ditutup', 'meta box', 'wa' ),
            'id' => 'event_end',
            'place-holder' => '',
			'default' => '',
            'type' => 'date'
        )
    )
	
	
));

$gallery = new JW_Post_Type('Gallery', array('supports' => array('title', 'thumbnail', 'editor')));
add_action( 'init', 'codex_book_init' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_book_init() {
	$labels = array(
		'name'               => _x( 'Usaha', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Usaha', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Bisnis', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Usaha', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Usaha', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Usaha', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Usaha', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Usaha', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Usaha', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Usaha', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Usaha', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Usaha:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Usaha found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Usaha found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'usaha' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'usaha', $args );
}
add_post_meta_box( 'bisnis_data', array(
    'title' => _x( 'Data Bisnis', 'meta box', 'wa' ),
    'pages' => array( 'usaha' ),
    'context' => 'normal', // 'normal', 'advanced', or 'side'
    'priority' => 'default', // 'default', 'high', 'core', 'default' or 'low'
    'fields' => array(
		array(
            'name' => _x( 'Owner', 'meta box', 'wa' ),
            'id' => 'boss',
            'default' => '',
            'type' => 'text'
        ),
		array(
            'name' => _x( 'No Hp/Phone', 'meta box', 'wa' ),
            'id' => 'kontak',
            'place-holder' => '',
            'type' => 'text'
        ) 
    )
	
	
)); 
add_action( 'init', 'created_gallery_taxonomies', 0 );
function created_gallery_taxonomies() {
	$labels = array(
		'name'              => _x( 'Type', 'taxonomy general name' ),
		'singular_name'     => _x( 'Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Types' ),
		'all_items'         => __( 'All Types' ),
		'parent_item'       => __( 'Parent Types' ),
		'parent_item_colon' => __( 'Parent Types:' ),
		'edit_item'         => __( 'Edit Type' ),
		'update_item'       => __( 'Update Type' ),
		'add_new_item'      => __(Type),
		'new_item_name'     => __( 'New Type Name' ),
		'menu_name'         => __( 'Type' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'type' ),
	);

	register_taxonomy( 'type', array( 'gallery' ), $args );

}

add_action( 'init', 'created_jenis_taxonomies', 0 );
function created_jenis_taxonomies() {
	$labels = array(
		'name'              => _x( 'Jenis', 'taxonomy general name' ),
		'singular_name'     => _x( 'Jenis', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Jenis' ),
		'all_items'         => __( 'All Jenis' ),
		'parent_item'       => __( 'Parent Jenis' ),
		'parent_item_colon' => __( 'Parent Jenis:' ),
		'edit_item'         => __( 'Edit Jenis' ),
		'update_item'       => __( 'Update Jenis' ),
		'add_new_item'      => __( 'Add New Jenis' ),
		'new_item_name'     => __( 'New Jenis Name' ),
		'menu_name'         => __( 'Jenis' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'jenis' ),
	);

	register_taxonomy( 'jenis', array( 'usaha' ), $args );

}