<?php

function conv_create_custom_field1() {
 $args = array(
 'id' => 'custom_text',
 'label' => __( 'Custom Text', 'cfwc' ),
 'class' => 'conv-custom-field',
 'desc_tip' => true,
 'description' => __( 'Custom Text', 'conv' ),
 );
 woocommerce_wp_text_input( $args );
}
add_action( 'woocommerce_product_options_general_product_data', 'conv_create_custom_field1' );

function conv_save_custom_field1( $post_id ) {
 $product = wc_get_product( $post_id );
 $title = isset( $_POST['custom_text'] ) ? $_POST['custom_text'] : '';
 $product->update_meta_data( 'custom_text', sanitize_text_field( $title ) );
 $product->save();
}
add_action( 'woocommerce_process_product_meta', 'conv_save_custom_field1' );

function conv_display_custom_field1() {
 global $post;
 // Check for the custom field value
 $product = wc_get_product( $post->ID );
 $title = $product->get_meta( 'custom_text' );

if ($post->ID == 1446){
 // Only display our field if we've got a value for the field title

	echo '<label>Custom Text</label><br /><input type="text" id="custom-text" name="custom_text"><br /><br />';

}

}
add_action( 'woocommerce_before_add_to_cart_button', 'conv_display_custom_field1' );


function conv_validate_custom_field1( $passed, $product_id, $quantity ) {
 if( empty( $_POST['custom_text'] ) ) {
 // Fails validation
 //$passed = true;
 //wc_add_notice( __( 'Please attached a photo', 'conv' ), 'error' );
 }
 return $passed;
}
add_filter( 'woocommerce_add_to_cart_validation', 'conv_validate_custom_field1', 10, 3 );


function conv_add_custom_field_item_data1( $cart_item_data, $product_id, $variation_id, $quantity ) {
 
if (isset($_POST['custom_text']) && (!empty($_POST['custom_text']))) {
			
		//$upload = wp_upload_bits($_FILES["file_upload"]["name"], null, file_get_contents($_FILES["file_upload"]["tmp_name"]));

		//$upload_url = $upload['url'];	

		
 		// Add the item data;
 		$cart_item_data['custom_text'] = $_POST['custom_text'];

 }

 return $cart_item_data;
}

add_filter( 'woocommerce_add_cart_item_data', 'conv_add_custom_field_item_data1', 10, 4 );


function conv_cart_item_name1( $name, $cart_item, $cart_item_key ) {
if( isset( $cart_item['custom_text'] ) ) {
 $name .= sprintf(
 '<p>%s</p>',
 esc_html( $cart_item['custom_text'] )
 );
 }
 return $name;
}
add_filter( 'woocommerce_cart_item_name', 'conv_cart_item_name1', 10, 3 );


function conv_add_custom_data_to_order1( $item, $cart_item_key, $values, $order ) {

 foreach( $item as $cart_item_key=>$values ) {

	 if( isset( $values['custom_text'] ) ) {
 
 		$item->add_meta_data( __( 'Custom Text', 'conv' ), $values['custom_text'], true );
 
 		}

 }

}
add_action( 'woocommerce_checkout_create_order_line_item', 'conv_add_custom_data_to_order1', 10, 4 );


?>