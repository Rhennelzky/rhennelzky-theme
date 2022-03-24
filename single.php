<?php
/**
 * The template for displaying all single posts and attachments
 *
 *
 * Template Post Type: post
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

      $post_date = get_the_date('F j, Y', $post_id);      

      $post_author = get_the_author();
  ?>

  	<div class='container-fluid' >
  	<div class='row row-flex'>
  	<div class='col-md-8' style='padding-top:100px;padding-bottom:100px;line-height:25pt;'>
    <h2 style="font-size:40px;"><?php echo $title; ?></h2>
    <h3 style="font-size:20px;"><?php echo $post_author . ' / ' . $post_date;?><br /><br />
  	<img  src='<?php echo $thumbnail; ?>' style='width:90%;object-fit:contain;object-position:top;'/>
    <div style="line-height:24pt;">
    <?php 

    echo $desc;

    ?>
  </div>
  
  	</div>

    <div class='col-md-4' style='background-color:black;padding-top:100px;padding-bottom:100px;'>

      <?php

      if ( function_exists('dynamic_sidebar') ){

      dynamic_sidebar("sidebar");

      }

      ?>
    
    
    </div>
  	
  	
  	
	 </div>
	</div>
	

   ?>



	

<?php 

get_footer(); 
 
?>