<?php

function image_gallery_meta_box(){

		add_meta_box(
				'image_gallery',
				'Image Gallery',
				'image_gallery_meta_callback',
				'package',
				'side',
				'core'
			);

}
	
add_action( 'add_meta_boxes', 'image_gallery_meta_box');

function image_gallery_meta_callback($post){
	
	$rhc_stored_meta = get_post_meta($post->ID); 

?>

<input type="hidden" name="images_of_gallery" id="images_of_gallery" value="<?php if( !empty($rhc_stored_meta['images_of_gallery'])) echo esc_attr($rhc_stored_meta['images_of_gallery'][0]) ?>" /><br />

<input type="hidden" name="image_to_del" id="image_to_del">

<?php

if( !empty($rhc_stored_meta['images_of_gallery'])){

	$csv_string = $rhc_stored_meta['images_of_gallery'][0];

	$data = str_getcsv($csv_string); 
	
	foreach($data as $row) {

		echo '<img class="package_gallery" src="' . wp_get_attachment_url( $row ) . '" style="width:30%;"/>';

	}

}

?>			
	<br />	
	<a href="#" id="add_image">Add Image</a>	



<?php
	
}

function to_be_displayed_add_custom_metabox_package(){

		add_meta_box(
				'to_be_displayed',
				'To Be Displayed',
				'to_be_displayed_meta_callback_package',
				'package',
				'normal',
				'core'
			);

}
	
add_action( 'add_meta_boxes', 'to_be_displayed_add_custom_metabox_package');

function to_be_displayed_meta_callback_package($post){

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

function package_meta_save( $post_id ){

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
	$is_valid_nonce12 =  ( isset( $_POST[ 'images_of_gallery' ]) && wp_verify_nonce( $_POST['images_of_gallery'], basename( __FILE__ ))) ? 'true' : 'false';
	$is_valid_nonce13 =  ( isset( $_POST[ 'image_to_del' ]) && wp_verify_nonce( $_POST['image_to_del'], basename( __FILE__ ))) ? 'true' : 'false';
		

	//Exists script depending  on save status
	if ($is_autosave || $is_revision || !$is_valid_nonce || !$is_valid_nonce1 || !$is_valid_nonce2 || !$is_valid_nonce3 || !$is_valid_nonce4 || !$is_valid_nonce5 || !$is_valid_nonce6 || !$is_valid_nonce7 || !$is_valid_nonce8 || !$is_valid_nonce9 || !$is_valid_nonce10 || !$is_valid_nonce11 || !$is_valid_nonce12){

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

	if ( isset($_POST['images_of_gallery'])){
 
		$images_of_gallery = $_POST['images_of_gallery'];

		if (isset($_POST['image_to_del'])){

			$image_to_del = $_POST['image_to_del'];

			if ($image_to_del != ''){

				$csv_string = $images_of_gallery;

				$data = str_getcsv($csv_string); 
				
				$ctr = 0;

				$images_of_gallery = '';

				foreach($data as $row) {

					if ($ctr != $images_to_del){

						if ($images_of_gallery != ''){

							$images_of_gallery .= ',';

						}

						$images_of_gallery .= $row;

					}

					$ctr = $ctr + 1;

				}

			}

		}

		update_post_meta($post_id, 'images_of_gallery', sanitize_text_field($images_of_gallery));		

	}	
	
}

add_action('save_post', 'package_meta_save');


?>