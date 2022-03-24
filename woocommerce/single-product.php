<?php
/**
 * The template for displaying all single product
 *
 * Template Post Type: portfolio
 * Template Name: Portfolio Item
 */
?>

<!DOCTYPE html>
<html lang="en">

<?php get_header(); ?>

<body>
<?php 

create_sticky_menu( 'primary-menu' ); 
create_bootstrap_menu( 'primary-menu' );
breadcrumb();

?>


  <?php

  	
  	$post_id = get_the_id();

	  $title = get_the_title();
 	  $link = get_permalink($post_id);
 	  $thumbnail = get_the_post_thumbnail_url();
 	  $desc = apply_filters('the_content', $post->post_content); 

    $item_code = get_post_meta($post_id, 'item_code', true);
    $multi_produt = get_post_meta($post_id, 'multi_product', true);
    $multi_product_desc = get_post_meta($post_id, 'multi_product_desc', true);
    $diy = get_post_meta($post_id, 'diy', true);
    $diy_time = get_post_meta($post_id, 'diy_time', true);
    $inflatable = get_post_meta($post_id, 'inflatable', true);
    $hire_price = get_post_meta($post_id, 'hire_price', true);
    $situ_dims = get_post_meta($post_id, 'situ_dims', true);
    $packed_dims = get_post_meta($post_id, 'packed_dims', true);
    $approx_weight = get_post_meta($post_id, 'approx_weight', true);
    $power_draw = get_post_meta($post_id, 'power_draw', true);
    $air_freight = get_post_meta($post_id, 'air_freight', true);
    $road_freight = get_post_meta($post_id, 'road_freight', true);  

    if ($air_freight == 'Yes'){

      $air_freight = '<i class="fas fa-check"></i>';

    } else {


      $air_freight = '<i class="fas fa-times"></i>';
    }

    if ($diy == 'Yes'){

      $diy = '<i class="fas fa-check"></i>';

    } else {

      $diy = '<i class="fas fa-times"></i>';

    }

    if ($inflatable == 'Yes'){

      $inflatable = '<i class="fas fa-check"></i>';

    } else {


      $inflatable = '<i class="fas fa-times"></i>';
    }




  	$content = "<div class='container-fluid' id='prods_body' style='padding-top:5px;'>";
  	$content .= "<div class='row row-flex'>";
  	$content .= "<div class='col-md-6' style='padding-top:20px;padding-bottom:100px;'>";    
    $content .= $desc . '<br />';
    $content .= '<b>1 day hire : </b>' . $hire_price;
    $content .= '<br /><br />';
    $content .= '<a href="/contact-about-us/" style="font-size:14pt;font-weight:700;float:right;color:white !important;background-color:#00B8F1;padding:5px 10px 5px 10px;">GET A QUOTE NOW</a><br /><br />';
    $content .= '<div>';
    $content .= '<strong style="font-weight:900;">Specifications</strong>';
    $content .= '<br /><br />';
    $content .= '<table id="tbl_header">';
    $content .= '<tr>';
    $content .= '<td style="background-color:#05aa12;"><i class="fab fa-telegram-plane"></i> Air Freight : ' . $air_freight . '</td>';
    $content .= '<td style="background-color:#f2ff07;"><i class="fas fa-basketball-ball"></i>
 DIY : ' . $air_freight . '</td>';
    $content .= '<td style="background-color:#00abdb;"><i class="fas fa-bath"></i>  Inflatable : ' . $inflatable . '</td>';
    $content .= '</tr>';
    $content .= '</table>';    
    $content .= '<table id="prod_tbl"><tr><td class="label_td">DIY Install Time</td><td> : ' . $diy_time . '</td></tr>';
    $content .= '';
    $content .= '<tr><td class="label_td">In Situ Dims. </td><td> : ' . $situ_dims . '</td></tr>';
    $content .= '<tr><td class="label_td">Packed Dims.</td><td> : ' . $packed_dims . '</td></tr>';
    $content .= '<tr><td class="label_td">Approx. Weight </td><td> : ' . $approx_weight . '</td></tr>';
    $content .= '<tr><td class="label_td">Power Draw </td><td> : ' . $power_draw . '</td></tr>';  	
    $content .= '<tr><td class="label_td">Road Freight Approx. </td><td> : '  . $road_freight . '</td></tr>';   
    $content .= '</table>';
    $content .= '</div>';
  	$content .= '</div>';

    $content .= "<div class='col-md-6 port_button' style='text-align:center;background-color:white;padding-top:20px;padding-bottom:100px;'>";
    
    $content .= "<img  id='main_img' src='" . $thumbnail. "' style='width:500px;height:500px;object-fit:cover;object-position:top;'/>"; 

    $content .= "<br /><br />";


    $product = new WC_product($post_id);

    $attachment_ids = $product->get_gallery_attachment_ids();
    

    $no_img = count($attachment_ids);

    if ($no_img <= 4){

        $pages = 1;

        $rem = 4 - $no_img;

    } else {

        $pages = $no_img / 4;

        $pages = floor($pages);

        $rem = $no_img % 4;

        if ($rem > 0 ){

          $pages = $pages + 1;

        }

    }    

    $content .= '<div id="myCarousel" class="carousel slide" data-ride="carousel">';  
    $content .= '<ol class="carousel-indicators">';

    

    $content .= '</ol>';
  
    $content .= '<div class="carousel-inner">';    

    $content .= '<div class="item active">';

    $content .= '<table style="width:100%;"><tr>';

    $content .= '<td style="width:25%;">';        
    $content .= "<img class='gall' style='cursor:pointer;width:100%;object-fit:cover;height:100px;' src=" . $thumbnail . " />";
    $content .= "</td>";

    $ctr = 1;
    foreach( $attachment_ids as $attachment_id ) {        

        if ($ctr == 4){

          $ctr = 0;

          $content .= '</tr></table>';
          $content .= '</div>';    

          $content .= '<div class="item">';
          $content .= '<table style="width:100%;"><tr>';

        }

        $content .= '<td style="width:25%;">';        
        $content .= "<img class='gall' style='cursor:pointer;width:100%;object-fit:cover;height:100px;' src=" . wp_get_attachment_url( $attachment_id ) . " />";
        $content .= "</td>";

        $ctr = $ctr + 1;

    }

    $ctr = 0;

    do{

      $content .= '<td style="width:25%;"></td>';

      $ctr = $ctr + 1;

    } while($ctr < 4);

    $content .= '</tr></table>';
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



  
    //$content1 = do_shortcode('[add_to_cart_url id="58"]');

    //$content = $content1;
    
    $content .= "</div>"; 	
    $content .= "</div>";   
  	
  	
	$content .= '</div>';



  $content .= '<div class="row">';

  $content .= '<div class="col-md-12">';

  $content .= '<strong style="font-weight:900;">INCLUDED IN PACKAGE</strong> <br /><br />';

  $content .= '</div>';

  $content .= '</div>';

  $content .= '<div class="row">';

  $current_prod = $post_id;

  $args = array(

      'post_type'       => 'package_for_product',      
      'post_parent'     => $post_id,
      'posts_per_page'  => 4,      
      'post_status'     => 'publish'

    );


  $query = new WP_Query($args);


  while($query->have_posts()){     
    

      $ctr = 0;

      $query->the_post();

      global $post;

      $pp_id = get_the_id();

      $title = get_the_title();

      $package_id = $wpdb->get_var( "SELECT * FROM $wpdb->posts WHERE post_title = '" . $title . "' AND post_type = 'package'"  );

      $link = get_permalink($package_id);

      $packaging = $wpdb->get_row( "SELECT * FROM $wpdb->posts WHERE ID = " . $package_id );

      //$excerpt = get_the_content($package_id);

      $excerpt = substr($packaging->post_content, 0, 45) . '...';

      $thumbnail = get_the_post_thumbnail_url($package_id);

      $content .= '<div class="col-md-3" style="text-align:center;">';

     $content .= '<div class="image_cover" style="background-image:url(' . $thumbnail . ');background-size:cover;border-width:0px;text-align:left;height:350px;width:100%;vertical-align:bottom;padding:0px;">';

    $content .= "<div style='background-color:rgb(0, 184, 241, 0.5);color:white;padding:15px 10px 15px 10px;position:absolute;width:96%;bottom:0px;height:90px;vertical-align:bottom;overflow:hidden;margin:0px 10px 0px 0px;' class='home_prods'>";

    $content .= '<span style="font-size:14pt;font-weight:800;" class="prod_title">' . $title . '</span>';

    $content .= '<hr style="border-width:3px;width:40%;margin-left:0px;" class="prod_line"/>';

    $content .= '<span class="prod_excerpt" style="font-size:14pt;">' . $excerpt . '</span>';      

    $content .= "</div>";    

    $content .= "<a href='" . $link . "' class='prod_link' style='color:black;'>";     

    $content .= "<div class='cover' style='position:absolute;top:0;left:0;height:100%;width:100%;background-color:red;opacity:0;'></div>";

    $content .= "</a>";      
    $content .= "</div>";

      $content .= '</div>';  

  }

  $content .= '</div> <br /><br />';  





  $content .= '<div class="row">';

  $content .= '<div class="col-md-12">';

  $content .= '<strong style="font-weight:900;">BROWSE SIMILAR PRODUCTS</strong> <br /><br />';

  $content .= '</div>';

  $content .= '</div>';

  $content .= '<div class="row">';

  $current_prod = $post_id;

  $product_cat = wp_get_post_terms($post_id, 'product_cat', array("fields" => "slugs")); 
  $theme = wp_get_post_terms($post_id, 'theme', array("fields" => "slugs"));
  $industry = wp_get_post_terms($post_id, 'industry', array("fields" => "slugs"));


  $args = array(

      'post_type'       => 'product',
      'post__not_in'    => array(
                                  $current_prod
                            ),
      'tax_query'       => array(
                            'relation' => 'OR',
                            array(
                              'taxonomy' => 'product_cat',
                              'field'    => 'slug',
                              'terms'    => $product_cat
                            ),
                            array(
                              'taxonomy' => 'theme',
                              'field'    => 'slug',
                              'theme'    => $theme
                            ),
                            array(
                              'taxonomy' => 'industry',
                              'field'    => 'slug',
                              'industry' => $industry
                            )
                          ),
      'posts_per_page'  => 4,      
      'post_status'     => 'publish'

    );


  $query1 = new WP_Query($args);


  while($query1->have_posts()){     
    

      $ctr = 0;

      $query1->the_post();

      global $post;

      $post_id1 = get_the_id();

      $title = get_the_title();

      $link = get_permalink($post_id1);

      $short_d = $post->post_excerpt;

      $excerpt = get_the_excerpt();

      $thumbnail = get_the_post_thumbnail_url();
      

      $content .= '<div class="col-md-3" style="text-align:center;">';

     $content .= '<div class="image_cover" style="background-image:url(' . $thumbnail . ');background-size:cover;border-width:0px;text-align:left;height:350px;width:100%;vertical-align:bottom;padding:0px;">';

    $content .= "<div style='background-color:rgb(0, 184, 241, 0.5);color:white;padding:15px 10px 15px 10px;position:absolute;width:96%;bottom:0px;height:90px;vertical-align:bottom;overflow:hidden;margin:0px 10px 0px 0px;' class='home_prods'>";

    $content .= '<span style="font-size:14pt;font-weight:800;" class="prod_title">' . $title . '</span>';

    $content .= '<hr style="border-width:3px;width:40%;margin-left:0px;" class="prod_line"/>';

    $content .= '<span class="prod_excerpt" style="font-size:14pt;">' . $short_d . '</span>';      


    $content .= "</div>";    

    $content .= "<a href='" . $link . "' class='prod_link' style='color:black;'>";     

    $content .= "<div class='cover' style='position:absolute;top:0;left:0;height:100%;width:100%;background-color:red;opacity:0;'></div>";

    $content .= "</a>";      
    $content .= "</div>";

      $content .= '</div>';  

  }

  $content .= '</div>'; 

	$content .= '</div> <br /><br />';	  

	echo $content;

   ?>	

<?php 

get_footer(); 
 
?>