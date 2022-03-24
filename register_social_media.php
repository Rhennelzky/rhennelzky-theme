<?php

function social_media_register_post_type(){
	
	$singular = 'Social Medium';
	$plural = 'Social Media';
	                           
	$labels = array(
		'name' 					=> $plural,
		'singular_name' 		=> $singular,
		'add_name'				=> 'Add New',
		'add_new_item'  		=> 'Add New ' . $singular,
		'edit'					=> 'Edit',
		'edit_item'				=> 'Edit ' . $singular,
		'new_item'				=> 'New ' . $singular,
		'view'					=> 'View ' . $singular,
		'view_item'				=> 'View ' . $singular,
		'search_term'   		=> 'Search ' . $plural,
		'parent'				=> 'Parent ' . $singular,
		'not_found'				=> 'No ' . $plural . ' found',
		'not_found_in_trash'	=> 'No ' . $plural . ' in Trash'
	);
	
	$args = array(
		'labels' 				=> $labels,
		'public' 				=> true,
		'publicly_queryable' 	=> true,
		'exclude_from_search'	=> true,
		'show_in_nav_menus'		=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'show_in_admin_bar'		=> true,
		'menu_position'			=> 6,
		'menu_icon'				=> 'dashicons-images-alt2',
		'can_export'			=> true,
		'delete_with_user'		=> false,
		'hierarchical'			=> false,
		'has_archive'			=> true,
		'query_var'				=> true,
		'capability_type'		=> 'post',
		'map_meta_cap'			=> true,
		// 'capabilities'		=> array(),
		'rewrite'				=> array(
			'slug'			=> 'social_media',
			'with_front' 	=> true,
			'pages' 		=> false,
			'feeds'			=> true,
		),
		'supports'				=> array(
			'title',
			'thumbnail',
			'editor'
			//'editor',
			//'author',
			//'custom-fields',
			//'thumbnail'
		)
	);	
	
	register_post_type('social_media',$args);
	
	
}

add_action('init', 'social_media_register_post_type');



?>