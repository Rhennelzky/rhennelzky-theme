<?php
/**
 * The template for displaying all single portfolio
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

?>


  <?php

  	
  	$post_id = get_the_id();

	$title = get_the_title();
 	$link = get_permalink($post_id);
 	$thumbnail = get_the_post_thumbnail_url();
 	$desc = apply_filters('the_content', $post->post_content); 

  	$content = "<div class='container-fluid' >";
  	$content .= "<div class='row row-flex'>";
  	$content .= "<div class='col-md-6' style='text-align:center;padding-top:100px;padding-bottom:100px;'>";
    $content .= '<h2 style="font-size:40px;">' . $title . '</h2><br /><br />';
  	$content .= "<img  src='" . $thumbnail. "' style='width:90%;object-fit:contain;object-position:top;'/>";
  
  	$content .= '</span></div>';

    $content .= "<div class='col-md-6 port_button' style='background-color:#E7E1E1;padding-top:100px;padding-bottom:100px;'>";
    
    $content .= $desc;
    $content .= "</div>";
  	
  	
  	
	$content .= '</div>';	
	$content .= '</div>';	


	echo $content;

   ?>



	

<?php 

get_footer(); 
 
?>