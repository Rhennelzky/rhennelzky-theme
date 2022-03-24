jQuery(document).ready(function($) {          
      
	var jump = $(".jump");
	var bounce = true;
	var mother_jump = $(".mother_jump");

	var mj_width = mother_jump.width();
	var jump_width = jump.width();
	var jump_left = (mj_width / 2) - (jump_width / 2)




	jump.mouseenter(function() {

		mj_width = mother_jump.width();
		jump_width = jump.width();
		jump_left = (mj_width / 2) - (jump_width / 2)

		jump.css("left", jump_left);

		if (bounce == true){

		
 

			$(this).effect( "bounce", { times: 2, distance: 100 }, 1500, callback);
		
			bounce = false;

		}
 
  	});

  	jump.mouseleave(function() {
  		
  		bounce = true;

  	});


  	function callback(){

		bounce = false;

						

	}

});


