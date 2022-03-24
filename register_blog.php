<?php

function show_blogs_method($atts, $content = null){


	if (!isset( $atts['category'] )) {

   

		$args = array(

			'post_type'			=> 'post',
			'posts_per_page'	=> -1,
			'post_status' 		=> 'publish'

		);


		$query = new WP_Query($args);

		$blog = "<ul style='list-style:none;padding-left:0px;'>";
		

		while($query->have_posts()){		 
		

		 	$query->the_post();

		 	global $post;

		 	$post_id = get_the_id();

		 	$title = get_the_title();

		 	$link = get_permalink($post_id);

		 	$thumbnail = get_the_post_thumbnail_url();

		 	$post_date = get_the_date('F j, Y', $post_id);

		 	$post_excerpt = get_the_excerpt($post_id);

		 	$post_author = get_the_author();

		 	$blog .= "<li style='padding-top:30px;padding-bottom:30px;'><table><tr><td class='blog_img' style='width:200px;height:200px;'>";
		 	

		 	if ($thumbnail != ''){

		 	$blog .= "<img class='blog_img' src=" . $thumbnail .  " style='width:200px;height:200px;object-fit:cover;object-position:top;margin-top:20px;'><br /><br />";

		 	}

		 	$blog .= '</td><td class="blog_c" style="padding-left:20px;vertical-align:top;">';

		 	$blog .= "<a href='" . $link . "' style='color:white;font-size:20px;padding-bottom:15px;'>";

		 	$blog .= $title;

		 	$blog .= "</a><br />";		 	

		 	$blog .= '<i>' . $post_author . ' / ' . $post_date . '<br />';

		 	$blog .= '<span style="color:white;">' . $post_excerpt . '</span>';
	
		 	$blog .= "</td></table></li>";

		
		 }
		 
		
	


	}

	return $blog;

}



add_shortcode ('show_blogs', 'show_blogs_method');


?>