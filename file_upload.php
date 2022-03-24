<?php

function conv_create_custom_field() {
 $args = array(
 'id' => 'file_upload',
 'label' => __( 'Uploaded File', 'cfwc' ),
 'class' => 'conv-custom-field',
 'desc_tip' => true,
 'description' => __( 'Name of the file uploaded', 'conv' ),
 );
 woocommerce_wp_text_input( $args );
}
add_action( 'woocommerce_product_options_general_product_data', 'conv_create_custom_field' );

function conv_save_custom_field( $post_id ) {
 $product = wc_get_product( $post_id );
 $title = isset( $_POST['file_upload'] ) ? $_POST['file_upload'] : '';
 $product->update_meta_data( 'file_upload', sanitize_text_field( $title ) );
 $product->save();
}
add_action( 'woocommerce_process_product_meta', 'conv_save_custom_field' );

function conv_display_custom_field() {
 global $post;
 // Check for the custom field value
 $product = wc_get_product( $post->ID );
 $title = $product->get_meta( 'file_upload' );

if ($post->ID == 1446){
 // Only display our field if we've got a value for the field title

	echo '<label>Upload Photo</label><br /><input type="file" id="conv-title-field" name="file_upload"><br />';

}

}
add_action( 'woocommerce_before_add_to_cart_button', 'conv_display_custom_field' );


function conv_validate_custom_field( $passed, $product_id, $quantity ) {
 if( empty( $_FILES['file_upload']['name'] ) ) {
 // Fails validation

	 if ($post->ID == 1446){
	 
	 		$passed = false;
	 		wc_add_notice( __( 'Please attached a photo', 'conv' ), 'error' );

	 }
 
 }
 return $passed;
}
add_filter( 'woocommerce_add_to_cart_validation', 'conv_validate_custom_field', 10, 3 );


function conv_add_custom_field_item_data( $cart_item_data, $product_id, $variation_id, $quantity ) {
 
 if (isset($_FILES['file_upload']) && (!empty($_FILES['file_upload']['name']))) {
			
		$upload = wp_upload_bits($_FILES["file_upload"]["name"], null, file_get_contents($_FILES["file_upload"]["tmp_name"]));

		$upload_url = $upload['url'];	

		
 		// Add the item data
 		$cart_item_data['file_upload'] = $upload_url;

 }

 return $cart_item_data;
}
add_filter( 'woocommerce_add_cart_item_data', 'conv_add_custom_field_item_data', 10, 4 );


function conv_cart_item_name( $name, $cart_item, $cart_item_key ) {
if( isset( $cart_item['file_upload'] ) ) {
 $name .= sprintf(
 '<p>%s</p>',
 esc_html( $cart_item['file_upload'] )
 );
 }
 return $name;
}
add_filter( 'woocommerce_cart_item_name', 'conv_cart_item_name', 10, 3 );


function conv_add_custom_data_to_order( $item, $cart_item_key, $values, $order ) {

 foreach( $item as $cart_item_key=>$values ) {

	 if( isset( $values['file_upload'] ) ) {
 
 		$item->add_meta_data( __( 'Uploaded File', 'conv' ), $values['file_upload'], true );
 
 		}

 }

}
add_action( 'woocommerce_checkout_create_order_line_item', 'conv_add_custom_data_to_order', 10, 4 );


?>