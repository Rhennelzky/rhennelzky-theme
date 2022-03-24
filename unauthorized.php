<?php

/* Template Name: Unauthorized */ 

?>

<!DOCTYPE html>
<html lang="en">

<?php get_header(); ?>

<?php 

create_top_menu('top-menu');

$id = get_the_id();
$post = get_post($id); 

?>



  <?php

  
	$content = apply_filters('the_content', $post->post_content); 


	echo $content;

   ?>

	

	

<?php get_footer(); ?>

</body>
</html>