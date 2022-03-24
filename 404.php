<!DOCTYPE html>
<html lang="en">

<?php get_header(); ?>

	
<body>

<?php 

create_sticky_menu( 'primary-menu' ); 
create_bootstrap_menu( 'primary-menu' );

?>



<div class="container">
	<div class="row">
		<div class="col-md-12" style="padding-top:30px;">
			<h1>Page not found.</h1>
			<p>Sorry the page you're looking for is not found.<p>
			<p>Try roaming around using the menu</p>
		</div>
	</div>
</div>	

<?php get_footer(); ?>

</body>
</html>