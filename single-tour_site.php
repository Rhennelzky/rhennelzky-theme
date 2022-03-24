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
  	
  
$post_id = get_the_id();

$title = get_the_title();
	$link = get_permalink($post_id);
	$thumbnail = get_the_post_thumbnail_url();
	$desc = apply_filters('the_content', $post->post_content); 

$content = "<div class='container-fluid' >";
$content .= "<div class='row' style='background-image:url(" . $thumbnail ."); background-size:cover;text-align:center;padding-top:500px;padding-bottom:0px;padding-left:0px;padding-right:0px;'>";
$content .= "<div class='col-md-12' style='padding:0px 0px 0px 0px;'>";
$content .= "<div style='padding:30px 0px 30px 0px; width:100%;margin-right:0px; margin-left:0px; background-color:rgb(0,0,0,0.5);'>";
$content .= "<h1 style='color:white;'>" . $title . "</h1>";
$content .= "<br /><br /><br />";
$content .= "<a href='#' style='color:white;padding:20px 30px 20px 30px;background-color:#11A1AF;'>BOOK NOW</a>";
$content .= "</div>";

$content .= '</div>';
	
	
$content .= '</div>';	
$content .= '</div>';	

$content .= $desc;

$content .= "<div class='container-fluid'>";
$content .= "<div class='row'>";
$content .= "<div class='col-md-12' style='background-color:grey;padding-top:60px; padding-bottom:60px;text-align:center;'>";
$content .= "<h2 style='color:white;font-size:25pt;'>INCLUSIONS</h2>";
$content .= "</div>";
$content .= "</div>";
$content .= "</div>"; 

$content .= "<div class='container'>";

$args = array(

  'post_type'   => 'inclusion', 
  'post_parent' => $post_id

);

$ctr = 0;

$query = new WP_Query($args); 

while($query->have_posts()){    

  $query->the_post();             

  global $post;
            
  $inc_title = get_the_title();

  if ($ctr == 0){

  $content .= "<div class='row'>";

  }

  $content .= "<div class='col-md-6' style='background-color:white;padding-top:60px; padding-bottom:60px;text-align:center;'>";

  $content .= '<p style="font-size:20pt;"><span class="dashicons dashicons-yes incl_icon"></span> ' . $inc_title . '</p>';



  $content .= "</div>";
  
  if ($ctr > 0){

      $content .= "</div>";

  }

  $ctr = $ctr + 1;

  if ($ctr > 1){ 

      $ctr = 0;

  }  

}

if ($ctr > 0){

    $content .= "</div>";

}

$content .= "</div>";  

echo $content;

get_footer(); 
 
?>