<?php
function to_be_displayed_add_custom_metabox(){

		add_meta_box(
				'to_be_displayed',
				'To Be Displayed',
				'to_be_displayed_meta_callback',
				'product',
				'normal',
				'core'
			);

}
	
add_action( 'add_meta_boxes', 'to_be_displayed_add_custom_metabox');

function to_be_displayed_meta_callback($post){

		//wp_nonce_field(basename( __FILE__ ), 'inc_theme_nonce');
		//wp_nonce_field(basename( __FILE__ ), 'package_nonce');

		$rhc_stored_meta = get_post_meta($post->ID); 

?>
		<table class="form-table">		
			
			<tr>
				<th><label for="item_code">Item Code</label></th>
				<td>
					<input type="text" id="item_code" name="item_code" value="<?php if( !empty($rhc_stored_meta['item_code'])) echo esc_attr($rhc_stored_meta['item_code'][0]); ?>"> 					
				</td>
				<th><label for="multi_product">Multi-Product?</label></th>
				<td>
					<?php 

						$answer = "";

						if( !empty($rhc_stored_meta['multi_product']) ){

					 		$answer = esc_attr($rhc_stored_meta['multi_product'][0]); 

					 	}

					 ?>
					<select id="multi_product" name="multi_product">
						<option value="Yes" <? if ($answer == 'Yes'){ echo 'selected'; } ?> >Yes</option>
						<option value="No" <? if ($answer != 'Yes'){ echo 'selected'; } ?>>No</option>
					</select>
					
				</td>
			</tr>	
			<tr>
				<th><label for="multi_product_desc">Multi-Product Description</label></th>
				<td colspan="2">
					<textarea name="multi_product_desc" id="multi_product_desc" rows="5" style="width:100%;"><?php if( !empty($rhc_stored_meta['multi_product_desc'])) echo esc_attr($rhc_stored_meta['multi_product_desc'][0]); ?></textarea>
				</td>
			</tr>
			<tr>
				<?php 

					$answer = "";

					if( !empty($rhc_stored_meta['diy']) ){

				 		$answer = esc_attr($rhc_stored_meta['diy'][0]); 

				 	}

				 ?>
				<th><label for="diy">DIY?</label></th>
				<td>
					<select id="diy" name="diy">
						<option value="Yes" <? if ($answer == 'Yes'){ echo 'selected'; } ?> >Yes</option>
						<option value="No" <? if ($answer != 'Yes'){ echo 'selected'; } ?>>No</option>
					</select>
				</td>
				<th><label for="diy_time">DIY Time</label></th>
				<td>
					<input type="text" id="diy_time" name="diy_time" value="<?php if( !empty($rhc_stored_meta['diy_time'])) echo esc_attr($rhc_stored_meta['diy_time'][0]); ?>">
				</td>				
			</tr>
			<tr>
				<?php 

					$answer = "";

					if( !empty($rhc_stored_meta['inflatable']) ){

				 		$answer = esc_attr($rhc_stored_meta['inflatable'][0]); 

				 	}

				 ?>
				<th><label for="inflatable">Inflatable?</label></th>
				<td>
					<select id="inflatable" name="inflatable">
						<option value="Yes" <? if ($answer == 'Yes'){ echo 'selected'; } ?> >Yes</option>
						<option value="No" <? if ($answer != 'Yes'){ echo 'selected'; } ?>>No</option>
					</select>
				</td>
				<th><label for="hire_price">Hire Price from (ex GST)</label></th>				
				<td>
					<input type="text" id="hire_price" name="hire_price" value="<?php if( !empty($rhc_stored_meta['hire_price'])) echo esc_attr($rhc_stored_meta['hire_price'][0]); ?>">
				</td>
			</tr>
			<tr>
				<th><label for="situ_dims">In Situ Dims - L x W x H</label></th>				
				<td>
					<input type="text" id="situ_dims" name="situ_dims" value="<?php if( !empty($rhc_stored_meta['situ_dims'])) echo esc_attr($rhc_stored_meta['situ_dims'][0]); ?>">
				</td>
				<th><label for="packed_dims">Packed Dims - L x W x H</label></th>				
				<td>
					<input type="text" id="packed_dims" name="packed_dims" value="<?php if( !empty($rhc_stored_meta['packed_dims'])) echo esc_attr($rhc_stored_meta['packed_dims'][0]); ?>">
				</td>
			</tr>
			<tr>
				<th><label for="approx_weight">Approximate Weight(kg)</label></th>				
				<td>
					<input type="text" id="approx_weight" name="approx_weight" value="<?php if( !empty($rhc_stored_meta['approx_weight'])) echo esc_attr($rhc_stored_meta['approx_weight'][0]); ?>">
				</td>
				<th><label for="power_draw">Power Draw(Qty x 1)</label></th>				
				<td>
					<input type="text" id="power_draw" name="power_draw" value="<?php if( !empty($rhc_stored_meta['power_draw'])) echo esc_attr($rhc_stored_meta['power_draw'][0]); ?>">
				</td>
			</tr>			
			<tr>
				<?php 

					$answer = "";

					if( !empty($rhc_stored_meta['air_freight']) ){

				 		$answer = esc_attr($rhc_stored_meta['air_freight'][0]); 

				 	}

				 ?>
				<th><label for="air_freight">Air Freight</label></th>
				<td>
					<select id="air_freight" name="air_freight">
						<option value="Yes" <? if ($answer == 'Yes'){ echo 'selected'; } ?> >Yes</option>
						<option value="No" <? if ($answer != 'Yes'){ echo 'selected'; } ?>>No</option>
					</select>
				</td>
				<th><label for="road_freight">Road Freight Approx. - Return (Ex. GST)</label></th>				
				<td>
					<input type="text" id="road_freight" name="road_freight" value="<?php if( !empty($rhc_stored_meta['road_freight'])) echo esc_attr($rhc_stored_meta['road_freight'][0]); ?>">
				</td>
			</tr>			
		</table>

<?php
	
}

function product_meta_save( $post_id ){

	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision ( $post_id );

	$is_valid_nonce =  ( isset( $_POST[ 'item_code' ]) && wp_verify_nonce( $_POST['item_code'], basename( __FILE__ ))) ? 'true' : 'false';
	$is_valid_nonce1 =  ( isset( $_POST[ 'multi_product' ]) && wp_verify_nonce( $_POST['multi_product'], basename( __FILE__ ))) ? 'true' : 'false';
	$is_valid_nonce2 =  ( isset( $_POST[ 'multi_product_desc' ]) && wp_verify_nonce( $_POST['multi_product_desc'], basename( __FILE__ ))) ? 'true' : 'false';
	$is_valid_nonce3 =  ( isset( $_POST[ 'diy' ]) && wp_verify_nonce( $_POST['diy'], basename( __FILE__ ))) ? 'true' : 'false';
	$is_valid_nonce4 =  ( isset( $_POST[ 'diy_time' ]) && wp_verify_nonce( $_POST['diy_time'], basename( __FILE__ ))) ? 'true' : 'false';
	$is_valid_nonce5 =  ( isset( $_POST[ 'inflatable' ]) && wp_verify_nonce( $_POST['inflatable'], basename( __FILE__ ))) ? 'true' : 'false';
	$is_valid_nonce6 =  ( isset( $_POST[ 'hire_price' ]) && wp_verify_nonce( $_POST['hire_price'], basename( __FILE__ ))) ? 'true' : 'false';
	$is_valid_nonce7 =  ( isset( $_POST[ 'situ_dims' ]) && wp_verify_nonce( $_POST['situ_dims'], basename( __FILE__ ))) ? 'true' : 'false';
	$is_valid_nonce8 =  ( isset( $_POST[ 'packed_dims' ]) && wp_verify_nonce( $_POST['packed_dims'], basename( __FILE__ ))) ? 'true' : 'false';
	$is_valid_nonce9 =  ( isset( $_POST[ 'approx_weight' ]) && wp_verify_nonce( $_POST['approx_weight'], basename( __FILE__ ))) ? 'true' : 'false';
	$is_valid_nonce10 =  ( isset( $_POST[ 'air_freight' ]) && wp_verify_nonce( $_POST['air_freight'], basename( __FILE__ ))) ? 'true' : 'false';
	$is_valid_nonce11 =  ( isset( $_POST[ 'diy' ]) && wp_verify_nonce( $_POST['road_freight'], basename( __FILE__ ))) ? 'true' : 'false';
		

	//Exists script depending  on save status
	if ($is_autosave || $is_revision || !$is_valid_nonce || !$is_valid_nonce1 || !$is_valid_nonce2 || !$is_valid_nonce3 || !$is_valid_nonce4 || !$is_valid_nonce5 || !$is_valid_nonce6 || !$is_valid_nonce7 || !$is_valid_nonce8 || !$is_valid_nonce9 || !$is_valid_nonce10 || !$is_valid_nonce11){

		return;
	}

	if ( isset($_POST['item_code'])){
		update_post_meta($post_id, 'item_code', sanitize_text_field($_POST['item_code']));
	} 
	if ( isset($_POST['multi_product'])){
		update_post_meta($post_id, 'multi_product', sanitize_text_field($_POST['multi_product']));
	} 
	if ( isset($_POST['multi_product_desc'])){
		update_post_meta($post_id, 'multi_product_desc', sanitize_text_field($_POST['multi_product_desc']));
	} 
	if ( isset($_POST['diy'])){
		update_post_meta($post_id, 'diy', sanitize_text_field($_POST['diy']));
	} 
	if ( isset($_POST['diy_time'])){
		update_post_meta($post_id, 'diy_time', sanitize_text_field($_POST['diy_time']));
	} 

	if ( isset($_POST['inflatable'])){
			update_post_meta($post_id, 'inflatable', sanitize_text_field($_POST['inflatable']));
		} 

	if ( isset($_POST['hire_price'])){
			update_post_meta($post_id, 'hire_price', sanitize_text_field($_POST['hire_price']));
		} 

	if ( isset($_POST['situ_dims'])){
			update_post_meta($post_id, 'situ_dims', sanitize_text_field($_POST['situ_dims']));
		} 

	if ( isset($_POST['packed_dims'])){
			update_post_meta($post_id, 'packed_dims', sanitize_text_field($_POST['packed_dims']));
		} 

	if ( isset($_POST['approx_weight'])){
			update_post_meta($post_id, 'approx_weight', sanitize_text_field($_POST['approx_weight']));
		} 

	if ( isset($_POST['power_draw'])){
			update_post_meta($post_id, 'power_draw', sanitize_text_field($_POST['power_draw']));
		} 

	if ( isset($_POST['air_freight'])){
		update_post_meta($post_id, 'air_freight', sanitize_text_field($_POST['air_freight']));
	} 

	if ( isset($_POST['road_freight'])){
		update_post_meta($post_id, 'road_freight', sanitize_text_field($_POST['road_freight']));
	} 

}

add_action('save_post', 'product_meta_save');

function show_products_method($atts, $content = null){

	if (!isset( $atts['category'] )) {   

		$args = array(

			'post_type'			=> 'product',
			'posts_per_page'	=> -1,
			'post_status' 		=> 'publish'

		);


		$query = new WP_Query($args);

		$prod = "<div class='container-fluid' style='background-color:#f4f2f2;'>";
		$prod .= "<div class='row' style='height:100%;padding-top:10px;padding-bottom:30px;'>";		
		

		$ctr = 0;

		while($query->have_posts()){		 

			if ($ctr >= 3) {

				$ctr = 0;

				$prod .= '</div>';
				$prod .= "<div class='row' style='height:100%;padding-top:10px;padding-bottom:30px;'>";		

			}

		 	$query->the_post();

		 	global $post;

		 	$post_id = get_the_id();

		 	$title = get_the_title();

		 	$short_d = $post->post_excerpt;

		 	$link = get_permalink($post_id);

		 	$excerpt = get_excerpt();

		 	$thumbnail = get_the_post_thumbnail_url();

		 	$prod .= "<div class='col-md-4' style='padding:0px 10px 0px 10px;'>";	 	

		 	//$prod .= '<span class="hidden_excerpt" style="font-size:14pt;">' . $excerpt . '</span>';
		 	$prod .= '<div class="image_cover" style="background-image:url(' . $thumbnail . ');background-size:cover;border-width:0px;text-align:left;width:100%;vertical-align:bottom;padding:0px;">';

		 	$prod .= "<div style='background-color:rgb(0, 184, 241, 0.5);color:white;padding:15px 10px 15px 10px;position:absolute;width:96%;bottom:0px;height:90px;vertical-align:bottom;overflow:hidden;margin:0px 10px 0px 0px;' class='home_prods'>";

		 	$prod .= '<span style="font-size:14pt;font-weight:800;" class="prod_title">' . $title . '</span>';

		 	$prod .= '<hr style="border-width:3px;width:40%;margin-left:0px;" class="prod_line"/>';

		 	$prod .= '<span class="prod_excerpt" style="font-size:14pt;">' . $short_d . '</span>';		 

		 	$prod .= "</div>";	 	

		 	$prod .= "<a href='" . $link . "' class='prod_link' style='color:black;'>";		 	

		 	$prod .= "<div class='cover' style='position:absolute;top:0;left:0;height:100%;width:100%;background-color:red;opacity:0;'></div>";

		 	$prod .= "</a>";		 	
		 	$prod .= "</div>";

		 	$prod .= "</div>";

		 	$ctr = $ctr + 1;

		 }
		 
		$prod .= '</div>';
		$prod .= '</div>';
	


	}

	return $prod;

}

add_shortcode ('show_products', 'show_products_method');

function show_categories_method(){

	$args = array(

			'taxonomy' 		=> 'product_cat',
			'hide_empty'	=> false,
			'exclude'		=> array(16)

			);

	$cats = get_terms($args);

		$content .= '<h4 style="font-weight:800;">By Category<i style="color:#00B8F1;float:right;" class="fas fa-caret-down"></i></h4>';

	$content .= '<div class="filter_bkg">';

	$content .= '<table style="width:100%;" id="categories">';

	$ctr = 0;
	foreach ( $cats as $cat ) {
				
		if ($ctr <= 3){
			
			$content .= '<tr>';

		} else {

			$content .= '<tr class="hidden_category">';

		}

		$content .= '<td style="width:100%;padding:1px;">';
		$content .= '<label class="container_label" for="' . $cat->name . '">' . $cat->name . '<input type="checkbox" class="filter_prods filter_categories" id="' . $cat->name . '" value="' . $cat->name . '"><span class="checkmark"></span></label>';
		$content .= '</td>';
		$content .= '</tr>';

		$ctr = $ctr + 1;
	}
	$content .= '</table>';

	$content .= '<span style="font-size:12pt;color:black;cursor:pointer;" id="show_hidden_category">...More Options</span>';

	$content .= '</div>';

	return $content;

}

add_shortcode ('show_categories', 'show_categories_method');

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );



function product_register_theme_taxonomy(){

	$plural = 'Themes';
	$singular = 'Theme';

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
		'show_admin_column'		=> false,
		'update_count_callback'	=> '_update_post_term_count',
		'query_var'				=>	true,
		'rewrite'				=>	array( 'slug' => 'theme'),


		);

	register_taxonomy('theme', 'product', $args);
}

add_action('init', 'product_register_theme_taxonomy');

function product_register_industry_taxonomy(){

	$plural = 'Industries';
	$singular = 'Industry';

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
		'show_admin_column'		=> false,
		'update_count_callback'	=> '_update_post_term_count',
		'query_var'				=>	true,
		'rewrite'				=>	array( 'slug' => 'industry'),


		);

	register_taxonomy('industry', 'product', $args);
	
}

add_action('init', 'product_register_industry_taxonomy');


function show_themes_method(){

	$args = array(

			'taxonomy' 		=> 'theme',
			'hide_empty'	=> false,
			'exclude'		=> array(16)

			);

	$cats = get_terms($args);	

		$content .= '<h4 style="font-weight:800;">By Theme<i style="color:#00B8F1;float:right;" class="fas fa-caret-down"></i></h4>';

	$content .= '<div class="filter_bkg">';

	$content .= '<table style="width:100%;" id="themes">';

	$ctr = 0;
	foreach ( $cats as $cat ) {
		
		if ($ctr <= 3){
			
			$content .= '<tr>';

		} else {

			$content .= '<tr class="hidden_theme">';

		}

		$content .= '<td style="width:100%;padding:1px;">';
		$content .= '<label class="container_label" for="' . $cat->name . '">' . $cat->name . '<input type="checkbox" class="filter_prods filter_themes" id="' . $cat->name . '" value="' . $cat->name . '"><span class="checkmark"></span></label>';
		$content .= '</td>';
		$content .= '</tr>';

		$ctr = $ctr + 1;
	}	
	$content .= '</table>';

	$content .= '<span style="font-size:12pt;color:black;cursor:pointer;" id="show_hidden_theme">...More Options</span>';

	$content .= '</div>';

	return $content;

}

add_shortcode ('show_themes', 'show_themes_method');

function show_industries_method(){

	$args = array(

			'taxonomy' 		=> 'industry',
			'hide_empty'	=> false,
			'exclude'		=> array(16)

			);

	$cats = get_terms($args);	

	$content .= '<h4 style="font-weight:800;">By Industry<i style="color:#00B8F1;float:right;" class="fas fa-caret-down"></i></h4>';

	$content .= '<div class="filter_bkg">';

	$content .= '<table style="width:100%;" id="industries">';

	$ctr = 0;
	foreach ( $cats as $cat ) {
		
		if ($ctr <= 3){
			
			$content .= '<tr>';

		} else {

			$content .= '<tr class="hidden_industry">';

		}

		$content .= '<td style="width:100%;padding:1px;">';
		$content .= '<label class="container_label" for="' . $cat->name . '">' . $cat->name . '<input type="checkbox" class="filter_prods filter_industries" id="' . $cat->name . '" value="' . $cat->name . '"><span class="checkmark"></span></label>';
		$content .= '</td>';
		$content .= '</tr>';

		$ctr = $ctr + 1;
	}	
	$content .= '</table>';

	$content .= '<span style="font-size:12pt;color:black;cursor:pointer;" href="#industries" id="show_hidden_industry">...More Options</span>';

	$content .= '</div>';

	return $content;

}

add_shortcode ('show_industries', 'show_industries_method');



function show_category_slider_method(){	

	$content  = '<div id="myCarousel" class="slider_all carousel slide" data-ride="carousel">';    
    // $content .= '<ol class="carousel-indicators">';
    // $content .= '<li data-target="#myCarousel" data-slide-to="0" class="active"></li>';
    // $content .= '<li data-target="#myCarousel" data-slide-to="1"></li>';
    // $content .= '<li data-target="#myCarousel" data-slide-to="2"></li>';
    // $content .= '</ol>';

    $content .= '<div class="carousel-inner">';
    $content .= '<div class="item active">';
    $content .= '<table style="width:100%;">';
    $content .= '<tr>';

	$args = array(

		'taxonomy' 		=> 'product_cat',
		'hide_empty'	=> false,
		'exclude'		=> array(16)

		);

	$cats = get_terms($args);

    $ctr = 0;

    foreach ( $cats as $cat ) {

    	$image_id = get_term_meta($cat->term_id, 'thumbnail_id', true);

    	$image = wp_get_attachment_url( $image_id );

    	if ($ctr == 3){

    		$content .= '</tr>';
    		$content .= '</table>';
    		$content .= '</div>';

    		$content .= '<div class="item">';
    		$content .= '<table style="width:100%;">';
    		$content .= '<tr>';

    		$ctr = 0;

    	}				

    	$content .= '<td style="background-image:url(' . $image . ');background-size:cover;">';
		$content .=  '<span style="background-color:white;color:black;padding:10px;">' . $cat->name . '</span>';
		$content .= '</td>';
		

		$ctr = $ctr + 1;

	}

	if ($ctr == 1) {

	$content .= '<td>';
		$content .= '</td>';
	$content .= '<td>';
		$content .= '</td>';

	}

	if ($ctr == 2){

		$content .= '<td>';
		$content .= '</td>';

	}
	
	$content .= '</tr>';
	$content .= '</table>';
    $content .= '</div>';      

    $content .= '</div>';

    
    $content .= '<a class="left carousel-control" href="#myCarousel" data-slide="prev">';
    $content .= '<span class="glyphicon glyphicon-chevron-left"></span>';
    $content .= '<span class="sr-only">Previous</span>';
    $content .= '</a>';
    $content .= '<a class="right carousel-control" href="#myCarousel" data-slide="next">';
    $content .= '<span class="glyphicon glyphicon-chevron-right"></span>';
    $content .= '<span class="sr-only">Next</span>';
    $content .= '</a>';
  	$content .= '</div>';
	

	//$content = var_dump($image_id);


	return $content;

}

add_shortcode('show_category_slider', 'show_category_slider_method');

function show_theme_slider_method(){	

	$content  = '<div id="myCarousel1" class="slider_all carousel slide" data-ride="carousel">';    
    // $content .= '<ol class="carousel-indicators">';
    // $content .= '<li data-target="#myCarousel" data-slide-to="0" class="active"></li>';
    // $content .= '<li data-target="#myCarousel" data-slide-to="1"></li>';
    // $content .= '<li data-target="#myCarousel" data-slide-to="2"></li>';
    // $content .= '</ol>';

    $content .= '<div class="carousel-inner">';

    $content .= '<div class="item active">';
    $content .= '<table style="width:100%;">';
    $content .= '<tr>';

	$args = array(

		'taxonomy' 		=> 'theme',
		'hide_empty'	=> false,
		'exclude'		=> array(16)

		);

	$cats = get_terms($args);

    $ctr = 0;

    foreach ( $cats as $cat ) {

    	$image_id = get_term_meta($cat->term_id, 'showcase-taxonomy-image-id', true);

    	$image = wp_get_attachment_url( $image_id );

    	if ($ctr == 3){

    		$content .= '</tr>';
    		$content .= '</table>';
    		$content .= '</div>';

    		$content .= '<div class="item">';
    		$content .= '<table style="width:100%;">';
    		$content .= '<tr>';

    		$ctr = 0;

    	}				

    	$content .= '<td style="background-image:url(' . $image . ');background-size:cover;">';
		$content .=  '<span style="background-color:white;color:black;padding:10px;">' . $cat->name . '</span>';
		$content .= '</td>';
		

		$ctr = $ctr + 1;

	}

	if ($ctr == 1) {
	$content .= '<td>';
		$content .= '</td>';
	$content .= '<td>';
		$content .= '</td>';

	}

	if ($ctr == 2){

		$content .= '<td>';
		$content .= '</td>';

	}
	
	$content .= '</tr>';
	$content .= '</table>';
    $content .= '</div>';      

    $content .= '</div>';
    $content .= '<a class="left carousel-control" href="#myCarousel1" data-slide="prev">';
    $content .= '<span class="glyphicon glyphicon-chevron-left"></span>';
    $content .= '<span class="sr-only">Previous</span>';
    $content .= '</a>';
    $content .= '<a class="right carousel-control" href="#myCarousel1" data-slide="next">';
    $content .= '<span class="glyphicon glyphicon-chevron-right"></span>';
    $content .= '<span class="sr-only">Next</span>';
    $content .= '</a>';
  	$content .= '</div>';
	

	//$content = var_dump($image_id);


	return $content;

}

add_shortcode('show_theme_slider', 'show_theme_slider_method');

function show_all_products_method($atts, $content = null){

	if (!isset( $atts['category'] )) {   

		$args = array(

			'post_type'			=> 'product',
			'posts_per_page'	=> -1,
			'post_status' 		=> 'publish'

		);


		$query = new WP_Query($args);

		$prod = "<div class='container-fluid' style='background-color:white;margin-bottom:20px;'>";
		$prod .= "<div class='row' style='height:100%;padding-top:1px;padding-bottom:30px;'>";		
		

		$ctr = 0;

		while($query->have_posts()){		 

			if ($ctr >= 3) {

				$ctr = 0;

				$prod .= '</div>';
				$prod .= "<div class='row' style='height:100%;padding-top:10px;padding-bottom:30px;'>";		

			}

		 	$query->the_post();

		 	global $post;

		 	$post_id = get_the_id();

		 	$title = get_the_title();

		 	$link = get_permalink($post_id);

		 	// $excerpt = get_the_excerpt();

		 	$excerpt = get_excerpt();

		 	$thumbnail = get_the_post_thumbnail_url();

		 	$prod .= "<div class='col-md-4' style='padding-top:0px;'><br />";	 	

		 	$prod .= "<a href='" . $link . "' class='prod_link' style='color:black;'>";

		 	$prod .= "<div class='cover' style='position:absolute;top:0;left:0;height:100%;width:100%;background-color:red;opacity:0;'></div>";

		 	$prod .= "<table class='home_prods' style='background-image:url(" . $thumbnail . ");background-size:cover;border-width:0px;width:100%;'>";

		 	$prod .= "<tr>";

		 	$prod .= "<td style='padding-top:250px;border-width:0px;' class='td1'>";

		 	$prod .= '<span class="hidden_excerpt" style="font-size:14pt;">' . $excerpt . '</span>';

		 	$prod .= "</td>";

		 	$prod .= "</tr>";

		 	$prod .= "<tr>";

		 	$prod .= "<td style='background-color:rgb(0, 184, 241, 0.5);color:white;padding-bottom:15px;max-height:150px;' class='td2'>";

		 	$prod .= '<span style="font-size:14pt;font-weight:800;" class="prod_title">' . $title . '</span>';

		 	$prod .= '<hr style="border-width:3px;width:40%;margin-left:0px;" class="prod_line"/>';

		 	$prod .= '<span class="prod_excerpt" style="font-size:14pt;">' . $excerpt . '</span>';

		 	$prod .= '';

		 	$prod .= "</td>";

		 	$prod .= "</tr>";

		 	$prod .= "</table>";

		 	$prod .= "</a>";

		 	$prod .= '<div style="height:20px;"></div>';
		 	$prod .= "</div>";

		 	$ctr = $ctr + 1;

		 }
		 
		$prod .= '</div>';
		$prod .= '</div>';
	
	}

	return $prod;

}

add_shortcode ('show_all_products', 'show_all_products_method');


function add_product_to_cart() {
          
// select ID
$product_id = 21874;
          
//check if product already in cart
//if ( WC()->cart->get_cart_contents_count() == 0 ) {
 
// if no products in cart, add it }

WC()->cart->add_to_cart( $product_id );
          
}

require_once ('add_image_tax.php');


?>