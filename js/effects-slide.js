jQuery(document).ready(function($) {          
      
	var left_right = $(".left_right");
	var right_left = $(".right_left");				

	$(window).on('scroll', function() { 

		left_right.each(function(){

			if ($(this).visible(true)){

				$(this).addClass("tobe_anim");	

			} else {

				$(this).removeClass("tobe_anim");

			}

		});
			
		right_left.each(function(){

			if ($(this).visible(true)){

				$(this).addClass("tobe_anim");
				
				

			} else {

				$(this).removeClass("tobe_anim");

			}

		});

		scrolled = true;

		$(".right_left.tobe_anim").each(function(){

			scrolled = false;

		});

		$(".left_right.tobe_anim").each(function(){

			scrolled = false;

		});
			
						
	
		if (scrolled == false){

			$( ".tobe_anim.left_right" ).effect( "slide", {"direction":"right"}, 1000, callback);		        						
		
			$( ".tobe_anim.right_left" ).effect( "slide", {"direction":"left"}, 1000, callback);		        					        			

		}		
		

	});	

	function callback(){

		$( this ).removeClass( "left_right right_left" ).finish();	

						

	}


});


