<?php

function package_for_products_add_custom_metabox(){

		add_meta_box(
				'package_for_products_meta',
				'Include Packages',
				'package_for_products_meta_callback',
				'product',
				'normal',
				'core'
			);

}
	
add_action( 'add_meta_boxes', 'package_for_products_add_custom_metabox');

function package_for_products_meta_callback($post){

/*	wp_nonce_field(basename( __FILE__ ), 'tour_site_jobs_nonce');
	$tour_site_stored_meta = get_post_meta($post->ID); */


	/*$content = get_post_meta($post->ID, 'inclusions', true);
	$editor = 'inclusions';
	$settings = array( 

		'textarea_rows' => 8,
		'media_buttons' => true,
	);

	wp_editor( $content, $editor, $settings);*/

	$post_id = $post->ID;


	$args = array(

		'post_type' 	=> 'package_for_product',	
		'post_parent'	=> $post_id

	);

	$query = new WP_Query($args);			

	$ctr = 1;

	echo '<div id="packages">';	

	while($query->have_posts()){		

		$query->the_post();						 	

		global $post;
						 	
	 	$package_title = get_the_title();
	 	$package_id = get_the_id();

		echo '<li>' . $ctr . '.' . $package_title . ' <span id="' . $package_id . '" class="dashicons dashicons-trash"></span></li>';

		$ctr = $ctr + 1;

	}

	echo '</div>';
	
?>

 
<input type="hidden" id="to_be_del" name="to_be_del" value="0">
<select name="package_name">
	<option value="">Select one...</option>

	<?php

	$args = array(

		'post_type' 	=> 'package',
		'posts_per_page'	=> -1,
		'post_status' 		=> 'publish'

	);

	$query1 = new WP_Query($args);			

	while($query1->have_posts()){		

		$query1->the_post();						 	

		global $post;
						 	
	 	$package_title = get_the_title();
	 	$package_id = get_the_id();
	 	echo '<option value="' . $package_title . '">' . $package_title . '</option>'; 	

	}

	?>
</select>
<input name="save" type="submit" class="button button-primary button-large" id="publish" value="Add Package">

<?php

}

function package_meta_box_save( $post_id ){

	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision ( $post_id );
	//$is_valid_nonce =  ( isset( $_POST[ 'tour_site_jobs_nonce' ]) && wp_verify_nonce( $_POST['tour_site_nonce'], basename( __FILE__ ))) ? 'true' : 'false';

		

	//Exists script depending  on save status
	if ($is_autosave || $is_revision){

		return;

	}

}

add_action('save_post', 'package_meta_box_save');

function check_values($post_id, $post_after, $post_before){

if (isset($_POST['package_name'])){

		$ptitle = $_POST['package_name'];
		$to_be_del = $_POST['to_be_del'];

		if (trim($ptitle) != ''){

			$inc_id = wp_insert_post( array(

							    'post_title'    => $ptitle,
							    'post_content'  => $ptitle,
							    'post_parent'	=> $post_id,
							    'post_status'   => 'publish',
							    'post_type'     => 'package_for_product'

							) );	
		}

		if (trim($to_be_del) != '0'){
			
			wp_delete_post($to_be_del);

		}

	} 

}

add_action( 'post_updated', 'check_values', 10, 3 );

?>