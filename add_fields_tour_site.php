<?php

function tour_site_add_custom_metabox(){

		add_meta_box(
				'tour_site_meta',
				'Inclusions',
				'tour_site_meta_callback',
				'tour_site',
				'normal',
				'core'
			);

}
	
add_action( 'add_meta_boxes', 'tour_site_add_custom_metabox');

function tour_site_meta_callback($post){

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

		'post_type' 	=> 'inclusion',	
		'post_parent'	=> $post_id

	);

	$query = new WP_Query($args);			

	$ctr = 1;

	echo '<div id="incs">';	

	while($query->have_posts()){		

		$query->the_post();						 	

		global $post;
						 	
	 	$inc_title = get_the_title();
	 	$inc_id = get_the_id();

		echo $ctr . '.' . $inc_title . ' <span id="' . $inc_id . '" class="dashicons dashicons-trash"></span></li>';

		$ctr = $ctr + 1;

	}

	echo '</div>'
	


 ?>

<input type="hidden" id="to_be_del" name="to_be_del" value="0">
<input type="text" style="width:50%;" name="inc_name" placeholder="Inclusion Name">  <input name="save" type="submit" class="button button-primary button-large" id="publish" value="Add New Inclusion">

<?php
}

function tour_site_meta_save( $post_id ){

	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision ( $post_id );
	$is_valid_nonce =  ( isset( $_POST[ 'tour_site_jobs_nonce' ]) && wp_verify_nonce( $_POST['tour_site_nonce'], basename( __FILE__ ))) ? 'true' : 'false';

		

	//Exists script depending  on save status
	if ($is_autosave || $is_revision || !$is_valid_nonce){

		return;
	}

}

add_action('save_post', 'tour_site_meta_save');

function check_values($post_id, $post_after, $post_before){

if ( isset($_POST['inc_name'])){

		$ptitle = $_POST['inc_name'];
		$to_be_del = $_POST['to_be_del'];

		if (trim($ptitle) != ''){

			$inc_id = wp_insert_post( array(

							    'post_title'    => $ptitle,
							    'post_content'  => $ptitle,
							    'post_parent'	=> $post_id,
							    'post_status'   => 'publish',
							    'post_type'     => 'inclusion'

							) );	
		}

		if (trim($to_be_del) != '0'){
			
			wp_delete_post($to_be_del);

		}

	} 

}

add_action( 'post_updated', 'check_values', 10, 3 );

?>