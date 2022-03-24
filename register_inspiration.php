<?php

	function inspiration_register_post_type(){
	
	$singular = 'Inspiration';
	$plural = 'Inspirations';
	                           
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
			'slug'			=> 'inspiration',
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
	
	register_post_type('inspiration',$args);
	
}

add_action('init', 'inspiration_register_post_type');

function inspiration_register_taxonomy(){

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

	register_taxonomy('category', 'inspiration', $args);
}

add_action('init', 'inspiration_register_taxonomy');


function show_inspirations_method($atts, $content = null){


	if (!isset( $atts['category'] )) {

   

		$args = array(

			'post_type'			=> 'inspiration',
			'posts_per_page'	=> -1,
			'post_status' 		=> 'publish'

		);


		$query = new WP_Query($args);

		$inspiration = "<div class='container-fluid'  id='inspiration_site_wall'>";
		$inspiration .= "<div class='row' style='background-color:rgb(2,174,214,0.5);height:100%;padding-top:0px;padding-bottom:0px;'>";		
		

		$ctr = 1;
		$grp = 1;

		while($query->have_posts()){			

		 	$query->the_post();

		 	global $post;

		 	$post_id = get_the_id();

		 	$title = get_the_title();

		 	$link = get_permalink($post_id);

		 	$thumbnail = get_the_post_thumbnail_url();

		 	if ($grp >= 3) {												

				$inspiration .= "<div class='col-md-4 insp' style='background-image:url(" . $thumbnail . ");background-size:cover;text-align:center;padding:0px 0px 0px 0px !important;'>";

		 		$inspiration .= "<table class='port_img insp'  style='-moz-transition: background-color 2s;-webkit-transition: background-color 2s; transition: background-color 2s;width:100%;height:100%;background-color:rgb(0,0,0,0.5);margin-bottom:0px !important;vertical-position:bottom;height:4000px !important;'><tr><td style='vertical-align:top;padding-top:80px;height:50%;'>";

			 	$inspiration .= '<span style="color:white;font-size:20px;padding-bottom:15px;">' . $title .  '</span><br /><br />';

			 	$inspiration .= "</tr></td><tr><td style='vertical-align:center;height:50%;'>";

			 	$inspiration .= "<a class='insp_link' href='" . $link ."' style='padding:10px 25px 10px 25px;background-color:#11A1AF;color:white;margin-bottom:50px !important;bottom:0px;'>VIEW INSPIRATION</a>";

			 	$inspiration .= '</tr></td></table>';		 	
			 	
			 	$inspiration .= "</div>";			
			 	
			}

		 	if ($grp == 1){

		 		if ($ctr >= 4) {

					$grp = $grp + 1;										
					$inspiration .= '</div>';
					$inspiration .= "<div class='row' style='background-color:rgb(2,174,214,0.5);height:100%;padding-top:0px;padding-bottom:0px;'>";

				}

			 	if ($ctr == 1) {

			 		$inspiration .= "<div class='col-md-6' style='background-image:url(" . $thumbnail . ");background-size:cover;text-align:center;padding:0px 0px 0px 0px !important;''>";

			 		$inspiration .= "<table class='port_img'  style='-moz-transition: background-color 2s;-webkit-transition: background-color 2s; transition: background-color 2s;width:100%;height:100%;background-color:rgb(0,0,0,0.5);margin-bottom:0px !important;vertical-position:bottom;height:700px !important;'><tr><td style='vertical-align:top;padding-top:80px;height:50%;'>";

				 	$inspiration .= "</tr></td><tr><td style='vertical-align:center;height:50%;'>";

				 	$inspiration .= '<span style="color:white;font-size:20px;padding-bottom:15px;">' . $title .  '</span><br /><br />';

				 	$inspiration .= "<a class='insp_link' href='" . $link ."' style='padding:10px 25px 10px 25px;background-color:#11A1AF;color:white;margin-bottom:50px !important;bottom:0px;'>VIEW INSPIRATION</a>";

				 	$inspiration.= '</tr></td></table>';		 	
				 	
				 	$inspiration .= "</div>";

			 	}	 

			 	if ($ctr == 2){

			 		$inspiration .= "<div class='col-md-6 insp' style='text-align:center;padding:0px 0px 0px 0px !important;'>";

			 		$inspiration .= "<table style='width:100%;height:100%;'><tr><td style='width:100%;height:100%;background-image:url(" . $thumbnail . ");background-size:cover;'>";

			 		$inspiration .= "<table class='port_img insp'  style='-moz-transition: background-color 2s;-webkit-transition: background-color 2s; transition: background-color 2s;width:100%;height:100%;background-color:rgb(0,0,0,0.5);margin-bottom:0px !important;vertical-position:bottom;height:350px !important;'><tr><td style='vertical-align:top;padding-top:80px;'>";

				 	$inspiration .= '<span style="color:white;font-size:20px;padding-bottom:15px;">' . $title .  '</span><br /><br />';

				 	$inspiration .= "</tr></td><tr><td style='vertical-align:center;height:50%;'>";

				 	$inspiration .= "<a class='insp_link' href='" . $link ."' style='padding:10px 25px 10px 25px;background-color:#11A1AF;color:white;margin-bottom:50px !important;bottom:0px;'>VIEW INSPIRATION</a>";

				 	$inspiration .= '</td></tr></table>';		 	

				 	$inspiration .= '</td></tr>';	 	
				 	
			 	}

			 	if ($ctr == 3){			 		

			 		$inspiration .= "<tr><td style='width:100%;height:50%;background-image:url(" . $thumbnail . ");background-size:cover;'>";

			 		$inspiration .= "<table class='port_img insp'  style='-moz-transition: background-color 2s;-webkit-transition: background-color 2s; transition: background-color 2s;width:100%;height:100%;background-color:rgb(0,0,0,0.5);margin-bottom:0px !important;vertical-position:bottom;height:350px !important;'><tr><td style='vertical-align:top;padding-top:80px;'>";

				 	$inspiration .= '<span style="color:white;font-size:20px;padding-bottom:15px;">' . $title .  '</span><br /><br />';

				 	$inspiration .= "</tr></td><tr><td style='vertical-align:center;height:50%;'>";

				 	$inspiration .= "<a class='insp_link' href='" . $link ."' style='padding:10px 25px 10px 25px;background-color:#11A1AF;color:white;margin-bottom:50px !important;bottom:0px;'>VIEW INSPIRATION</a>";

				 	$inspiration .= '</td></tr></table>';		 	

				 	$inspiration .= '</td></tr></table></div>';	 	
				 	
			 	}

			 	if ($ctr >= 4) {

			 		$ctr = 1;

			 	}

			}

			if ($grp == 2){			
				

				$inspiration .= "<div class='col-md-6' style='background-image:url(" . $thumbnail . ");background-size:cover;text-align:center;padding:0px 0px 0px 0px !important;''>";

		 		$inspiration .= "<table class='port_img'  style='-moz-transition: background-color 2s;-webkit-transition: background-color 2s; transition: background-color 2s;width:100%;height:100%;background-color:rgb(0,0,0,0.5);margin-bottom:0px !important;vertical-position:bottom;height:400px !important;'><tr><td style='vertical-align:top;padding-top:80px;height:50%;'>";

			 	$inspiration .= "</tr></td><tr><td style='vertical-align:center;height:50%;'>";

			 	$inspiration .= '<span style="color:white;font-size:20px;padding-bottom:15px;">' . $title .  '</span><br /><br />';

			 	$inspiration .= "<a class='insp_link' href='" . $link ."' style='padding:10px 25px 10px 25px;background-color:#11A1AF;color:white;margin-bottom:50px !important;bottom:0px;'>VIEW INSPIRATION</a>";

			 	$inspiration.= '</tr></td></table>';		 	
			 	
			 	$inspiration .= "</div>";		 	


				if ($ctr >= 2) {

					$grp = $grp + 1;
					$ctr = 1;				

					$inspiration .= '</div>';
					$inspiration .= "<div class='row' style='background-color:rgb(2,174,214,0.5);height:100%;padding-top:0px;padding-bottom:0px;'>";

				}

			}

			if (($ctr >= 4) && ($grp == 3)) {

				$grp = 1;
				$ctr = 0;

				$inspiration .= '</div>';
				$inspiration .= "<div class='row' style='background-color:rgb(2,174,214,0.5);height:100%;padding-top:0px;padding-bottom:0px;'>";

			}

			
		
			$ctr = $ctr + 1;			

		} 
		 
		$inspiration .= '</div>';
		$inspiration .= '</div>';


	}

	return $inspiration;

}



add_shortcode ('show_inspirations', 'show_inspirations_method');

?>