jQuery(document).ready(function($) {

	
	$('.readmore').readmore({
  			
  			speed: 75,
  			moreLink: '<a href="#">Read more</a>',
			lessLink: '<a href="#">Close</a>',
  			collapsedHeight: 90

	});

	var non_sticky = $(".non_sticky");	
	var sticky = $("#sticky");	
	var bevisible = true;			


	$(window).on('scroll', function() { 		

		bevisible = true;		

		non_sticky.each(function(){


			if ($(this).visible(true)) {

				bevisible = false;

			}
		

		});

		if (bevisible == false){

			sticky.css('display', 'none');



		} else {

	
			sticky.css('display', 'block');

		}



	});


});