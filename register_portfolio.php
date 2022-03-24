<?php

	function portfolio_register_post_type(){
	
	$singular = 'Portfolio';
	$plural = 'Portfolio';
	                           
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
			'slug'			=> 'portfolio',
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
	
	register_post_type('portfolio',$args);
	
	
}

add_action('init', 'portfolio_register_post_type');

function portfolio_register_taxonomy(){

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

	register_taxonomy('category', 'portfolio', $args);
}

add_action('init', 'portfolio_register_taxonomy');


function show_portfolios_method($atts, $content = null){


	if (!isset( $atts['category'] )) {

   

		$args = array(

			'post_type'			=> 'portfolio',
			'posts_per_page'	=> -1,
			'post_status' 		=> 'publish'

		);


		$query = new WP_Query($args);

		$portfolio = "<div class='container-fluid'  id='portfolio_wall'>";
		$portfolio .= "<div class='row' style='background-color:rgb(2,174,214,0.5);height:100%;padding-top:30px;padding-bottom:30px;'>";		
		

		$ctr = 0;

		while($query->have_posts()){		 

			if ($ctr >= 3) {

				$ctr = 0;

				$portfolio .= '</div>';
				$portfolio .= "<div class='row' style='background-color:rgb(2,174,214,0.5);height:100%;padding-top:30px;padding-bottom:30px;'>";		

			}

		 	$query->the_post();

		 	global $post;

		 	$post_id = get_the_id();

		 	$title = get_the_title();

		 	$link = get_permalink($post_id);

		 	$thumbnail = get_the_post_thumbnail_url();

		 	$portfolio .= "<div class='col-md-4' style='text-align:center;padding-top:15px;'><br /><br /><br />";
		 	$portfolio .= "<a href='" . $link . "'>";

		 	$portfolio .= "<img class='port_img' src=" . $thumbnail .  " style='width:300px;height:350px;object-fit:cover;object-position:top;margin-top:20px;'><br /><br />";

		 	$portfolio .= "</a>";


		 	$portfolio .= '<span style="color:white;font-size:20px;padding-bottom:15px;">' . $title .  '</span>';
		 	$portfolio .= '<div style="height:20px;"></div>';
		 	$portfolio .= "</div>";

		 	$ctr = $ctr + 1;

		 }
		 
		$portfolio .= '</div>';
		$portfolio .= '</div>';
	


	}

	return $portfolio;

}



add_shortcode ('show_portfolios', 'show_portfolios_method');

?>