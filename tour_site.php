<?php /* Template Name: Portfolio */ ?>

<!DOCTYPE html>
<html lang="en">

<?php get_header(); ?>

<body>
<?php create_sticky_menu( 'primary-menu' ); ?>

<div class="container-fluid non_sticky" id="portfolio_banner">

	<div class="row non_sticky">

		
		<div class="col-md-12 non_sticky" style="font-size:18px;text-align:center;">
		<br /><br /><br /><br /><br /><br /><br />
		<h2 id="our_port" style="font-size:50pt;color:white;">OUR PORTFOLIO</h2>
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



	

<?php get_footer(); ?>