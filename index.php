<!DOCTYPE html>
<html lang="en">

<?php get_header(); ?>

	
<body>

<?php 

create_sticky_menu( 'primary-menu' ); 
create_bootstrap_menu( 'primary-menu' );

?>



  <?php

  	$id = get_the_id();
  	$post = get_post($id); 
	$content = apply_filters('the_content', $post->post_content); 
	echo $content;

   ?>

	

	

<?php get_footer(); ?>

</body>
</html>