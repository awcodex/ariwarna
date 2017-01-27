<?php


require_once locate_template('/inc/post-meta-box/post-meta-box.php'); 
require_once locate_template('/inc/post-meta.php');
add_post_meta_box( 'related_search', array(
    'title' => _x( 'related Search', 'meta box', 'wa' ),
    'pages' => array( 'post' ),
    'context' => 'normal', // 'normal', 'advanced', or 'side'
    'priority' => 'default', // 'default', 'high', 'core', 'default' or 'low'
    'fields' => array( 
		array(
            'name' => _x( 'Slider Description', 'meta box', 'wa' ),
            'id' => 'related_search1', 
            'type' => 'text'
        ),
		array(
            'name' => _x( 'Slider Description', 'meta box', 'wa' ),
            'id' => 'related_search2', 
            'type' => 'text'
        ),
		array(
            'name' => _x( 'Slider Description', 'meta box', 'wa' ),
            'id' => 'related_search3', 
            'type' => 'text'
        ),
		array(
            'name' => _x( 'Slider Description', 'meta box', 'wa' ),
            'id' => 'related_search4', 
            'type' => 'text'
        ),
		array(
            'name' => _x( 'Slider Description', 'meta box', 'wa' ),
            'id' => 'related_search5', 
            'type' => 'text'
        ),
		array(
            'name' => _x( 'Slider Description', 'meta box', 'wa' ),
            'id' => 'related_search6', 
            'type' => 'text'
        ),
		array(
            'name' => _x( 'Slider Description', 'meta box', 'wa' ),
            'id' => 'related_search7', 
            'type' => 'text'
        ),
		array(
            'name' => _x( 'Slider Description', 'meta box', 'wa' ),
            'id' => 'related_search8', 
            'type' => 'text'
        ),
    )
	
	
));
$slider = new JW_Post_Type('Clients', array('supports' => array('title', 'thumbnail')));
$slider = new JW_Post_Type('Partnership', array('supports' => array('title', 'thumbnail')));
$slider = new JW_Post_Type('Slider', array('supports' => array('title', 'thumbnail')));
add_post_meta_box( 'image_slider_show', array(
    'title' => _x( 'Slider', 'meta box', 'wa' ),
    'pages' => array( 'slider' ),
    'context' => 'normal', // 'normal', 'advanced', or 'side'
    'priority' => 'default', // 'default', 'high', 'core', 'default' or 'low'
    'fields' => array( 
		array(
            'name' => _x( 'Slider Description', 'meta box', 'wa' ),
            'id' => 'slider-image-desc',
            'place-holder' => '',
            'type' => 'textarea'
        ) 
    )
	
	
));

$hg_photo = new JW_Post_Type('Testimony', array('supports' => array('title', 'editor' , 'thumbnail' ))); 
add_post_meta_box( 'Company', array(
    'title' => _x( 'Company', 'meta box', 'wa' ),
    'pages' => array( 'testimony'),
    'context' => 'normal', // 'normal', 'advanced', or 'side'
    'priority' => 'default', // 'default', 'high', 'core', 'default' or 'low'
    'fields' => array( 
		array(
            'name' => _x( 'Clients Company', 'meta box', 'wa' ),
            'id' => 'client_com',
            'place-holder' => '',
            'type' => 'text'
        ) 
    )
	
	
));
$aw_portfolio = new JW_Post_Type('Portfolio',
	array(
	'labels' => array(
		'name' => __( 'Portfolio' ),
		'singular_name' => __( 'Portfolio' )
	),
	'public' => true,
	'has_archive' => true,
	'rewrite' => array('slug' => 'portfolio'),
	'supports' => array(
		'title', 'editor' , 'thumbnail'
		)
	)
); 
add_post_meta_box( 'Company', array(
    'title' => _x( 'Company', 'meta box', 'wa' ),
    'pages' => array('portfolio' ),
    'context' => 'normal', // 'normal', 'advanced', or 'side'
    'priority' => 'default', // 'default', 'high', 'core', 'default' or 'low'
    'fields' => array( 
		array(
            'name' => _x( 'Clients Url', 'meta box', 'wa' ),
            'id' => 'client_link',
            'place-holder' => '',
			'default' => 'http://',
            'type' => 'text'
        ),
		array(
            'name' => _x( 'Clients Name', 'meta box', 'wa' ),
            'id' => 'client_names',
            'place-holder' => '',
			'default' => '#',
            'type' => 'text'
        ) 
    )
	
	
));
//hook into the init action and call create_game_taxonomies when it fires
add_action( 'init', 'create_game_taxonomies', 0 );

// // create two taxonomies, Jeniss and writers for the post type "game"
function create_game_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Jenis', 'taxonomy general name' ),
		'singular_name'     => _x( 'Jenis', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Jeniss' ),
		'all_items'         => __( 'All Jeniss' ),
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

	register_taxonomy( 'jenis', array( 'portfolio' ), $args );

// 	// Add new taxonomy, NOT hierarchical (like tags)
// 	$labels = array(
// 		'name'                       => _x( 'Writers', 'taxonomy general name' ),
// 		'singular_name'              => _x( 'Writer', 'taxonomy singular name' ),
// 		'search_items'               => __( 'Search Writers' ),
// 		'popular_items'              => __( 'Popular Writers' ),
// 		'all_items'                  => __( 'All Writers' ),
// 		'parent_item'                => null,
// 		'parent_item_colon'          => null,
// 		'edit_item'                  => __( 'Edit Writer' ),
// 		'update_item'                => __( 'Update Writer' ),
// 		'add_new_item'               => __( 'Add New Writer' ),
// 		'new_item_name'              => __( 'New Writer Name' ),
// 		'separate_items_with_commas' => __( 'Separate writers with commas' ),
// 		'add_or_remove_items'        => __( 'Add or remove writers' ),
// 		'choose_from_most_used'      => __( 'Choose from the most used writers' ),
// 		'not_found'                  => __( 'No writers found.' ),
// 		'menu_name'                  => __( 'Writers' ),
// 	);

// 	$args = array(
// 		'hierarchical'          => false,
// 		'labels'                => $labels,
// 		'show_ui'               => true,
// 		'show_admin_column'     => true,
// 		'update_count_callback' => '_update_post_term_count',
// 		'query_var'             => true,
// 		'rewrite'               => array( 'slug' => 'writer' ),
// 	);

// 	register_taxonomy( 'writer', 'game', $args );
}