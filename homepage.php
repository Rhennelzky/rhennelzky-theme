<?php /* Template Name: Home */ ?>

<!DOCTYPE html>
<html lang="en">

<?php get_header(); ?>

<body>
<?php create_sticky_menu( 'primary-menu' ); ?>


<div class="container-fluid non_sticky">

	<div class="row non_sticky" id="homepage_banner">

		<div class="col-md-4 non_sticky" style="text-align:center;">
		<img src="/wp-content/uploads/2017/12/home_banner_logo.png" style="width:250px;height:100px;" class="non_sticky">
		</div>
		<div class="col-md-4 non_sticky" style="font-size:18px;text-align:center;">
		<br /><br /><br /><br />
		We take care of your online presence, <br />
		while you concentrate on your business.
		
		</div>
		<div class="col-md-4 non_sticky" style="padding-top:800px;">
		
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