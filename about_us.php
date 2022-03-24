<?php /* Template Name: About Us */ ?>

<!DOCTYPE html>
<html lang="en">

<?php get_header(); ?>

<body>
<?php create_sticky_menu( 'primary-menu' ); ?>


		
			<div class="homepage-hero-module non_sticky">
			    <div class="video-container" style="background-image:url('/wp-content/uploads/2018/01/Ground-Zero.jpg');">
			        <div class="filter"></div>

			         <video autoplay loop class="fillWidth" id="the_video" >
			         
			            <source src="/wp-content/uploads/2018/01/Ground-Zero.webm" type="video/webm" />Your browser does not support the video tag. I suggest you upgrade your browser.
			              <source src="/wp-content/uploads/2018/01/Ground-Zero.mp4" type="video/mp4" />Your browser does not support the video tag. I suggest you upgrade your browser.
			          
			        </video>
			     

		           <div id="the_content" style=" position: absolute; right: 0; background: rgba(0, 0, 0, 0.5); color: #f1f1f1;width: 50%; height:100%;padding: 20px;">

				        <h2 style="font-size:65pt;margin-top:80px;">ABOUT</h2><br />
				        <h2 style="font-size:65pt;">US</h2><br />
				        <hr style="float:left;color:white;width:30%;border-width:10px;">

				    </div>

			        <div class="poster hidden">
			            <img src="/wp-content/uploads/2018/01/Ground-Zero.jpg" alt="">
			        </div>
			    </div>

			 

			</div>




<div class="container-fluid" style="padding:0px;">

<?php create_bootstrap_menu( 'primary-menu' ); ?>

</div>


  <?php

  	$id = get_the_id();
  	$post = get_post($id); 
	$content = apply_filters('the_content', $post->post_content); 
	echo $content;

   ?>



	

<?php 
wp_enqueue_script('svgDraw', get_template_directory_uri() . '/js/svgDraw.js', array('jquery'), false, true);
get_footer(); 
 
?>