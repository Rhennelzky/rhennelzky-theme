<?php

function tour_site_register_post_type(){

	$singular = 'Inclusion';
	$plural = 'Inclusions';
	                           
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
		'show_in_nav_menus'		=> false,
		'show_ui'				=> true,
		'show_in_menu'			=> false,
		'show_in_admin_bar'		=> false,
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
			'slug'			=> 'inclusion',
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

	register_post_type('inclusion',$args);	

	$singular = 'Tour Site';
	$plural = 'Tour Sites';
	                           
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
			'slug'			=> 'tour_site',
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

	register_post_type('tour_site',$args);	
	
}

add_action('init', 'tour_site_register_post_type');

function tour_site_register_taxonomy(){

	$plural = 'Categories';
	$singular = 'Category';

	$labels = array(

		'name' 							=> $plural,
		'singular_name'					=> $singular,
		'search_items'					=> 'Search ' . $plural,
		'popular_items'					=> 'Popular ' . $plural,
		'all_items'						=> 'All ' . $plural,
		'parent-item' 					=> null,
		'parent-item_colon'				=> null,
		'edit_item'						=> 'Edit ' . $singular,
		'update_item'					=> 'Update ' . $singular,
		'add_new_item'					=> 'Add New ' . $singular,
		'new_item_name'					=> 'New ' . $singular . ' Name',
		'separate_items_with_commas'	=> 'Separate ' . $plural . ' with commas',
		'add_or_remove_items'			=> 'Add or remove ' . $plural,
		'choose_from_most_used'			=> 'Choose from the most used ' . $plural,
		'not_found'						=> 'No ' . $plural . ' found.',
		'menu_name'						=> $plural,

		);

	$args = array(

		'hierarchical' 			=> true,
		'labels'				=> $labels,
		'show_ui' 				=> true,
		'show_admin_column'		=> true,
		'update_count_callback'	=> '_update_post_term_count',
		'query_var'				=>	true,
		'rewrite'				=>	array( 'slug' => 'category'),


		);

	register_taxonomy('category_tour', 'tour_site', $args);
}

add_action('init', 'tour_site_register_taxonomy');


function show_tour_sites_method($atts, $content = null){


	if (!isset( $atts['category'] )) {   

		$args = array(

			'post_type'			=> 'tour_site',
			'posts_per_page'	=> -1,
			'post_status' 		=> 'publish'

		);


		$query = new WP_Query($args);

		$tour_site = "<div class='container-fluid'  id='tour_site_wall' style='padding-left:0px;padding-right:0px;'>";
		$tour_site .= "<div class='row' style='background-color:rgb(2,174,214,0.5);height:100%;padding-top:0px;padding-bottom:0px;'>";		
		

		$ctr = 1;

		while($query->have_posts()){		 

			if ($ctr >= 4) {

				$ctr = 1;

				$tour_site .= '</div>';
				$tour_site .= "<div class='row' style='background-color:rgb(2,174,214,0.5);height:100%;padding-top:0px;padding-bottom:0px;'>";		

			}

		 	$query->the_post();

		 	global $post;

		 	$post_id = get_the_id();

		 	$title = get_the_title();

		 	$link = get_permalink($post_id);

		 	$thumbnail = get_the_post_thumbnail_url();

		 	$tour_site .= "<div class='col-md-4 touring' style='background-image:url(" . $thumbnail . ");background-size:cover;text-align:center;padding:0px 0px 0px 0px !important;''>";
		 	

		 	$tour_site .= "<table class='port_img touring'  style='-moz-transition: background-color 2s;-webkit-transition: background-color 2s; transition: background-color 2s;width:100%;height:100%;background-color:rgb(0,0,0,0.5);margin-bottom:0px !important;vertical-position:bottom;height:300px !important;'><tr><td style='vertical-align:top;padding-top:80px;height:50%;'>";

		 	$tour_site .= '<span style="color:white;font-size:20px;padding-bottom:15px;">' . $title .  '</span><br /><br />';

		 	$tour_site .= "</tr></td><tr><td style='vertical-align:center;height:50%;'>";

		 	$tour_site .= "<a class='touring_link' href='" . $link ."' style='padding:10px 25px 10px 25px;background-color:#11A1AF;color:white;margin-bottom:50px !important;bottom:0px;'>VIEW TOUR</a>";

		 	$tour_site .= '</tr></td></table>';		 	

		 	

		 	
		 	
		 	$tour_site .= "</div>";

		 	$ctr = $ctr + 1;

		 }
		 
		$tour_site .= '</div>';
		$tour_site .= '</div>';
	


	}

	return $tour_site;

}

add_shortcode ('show_tour_sites', 'show_tour_sites_method');





?>