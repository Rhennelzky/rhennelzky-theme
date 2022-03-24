jQuery(document).ready(function($) {

	setInterval(function(){ 

	    $('#loader_icon').css('display', 'none');

	}, 3000);

	clearInterval();

	var header_tbl = $("#header_tbl");
	var main_menu = $("#main_menu");
	var wdth_main_menu = main_menu.width();
	var logo_header = $("#logo_header");
	var logo_header_img = $("#logo_header img");
	var sticky = $("#the_sticky");
	var sticky_width = sticky.width();
	var sticky_height = sticky.height();	
	var tbl_srch1 = $("#tbl_srch1");
	var srch1 = $("#srch1");
	var navbar_toggle = $("#tbl_srch1 .navbar-toggle");
	var logo_header_margin = 0;
	logo_header_margin = ((sticky_width / 2) - (wdth_main_menu / 2)) - logo_header.width();

	var non_sticky = $("#non_stick");	

	var the_header_tbl = $("#the_header_tbl");
	var the_main_menu = $("#the_main_menu");
	var the_wdth_main_menu = the_main_menu.width();
	var the_logo_header = $("#the_logo_header");
	var the_logo_header_img = $("#the_logo_header img");
	//var non_sticky = $("#the_non_sticky");
	var non_sticky_width = non_sticky.width();
	var non_sticky_height = non_sticky.height();	
	var the_tbl_srch1 = $("#the_tbl_srch1");
	var the_srch1 = $("#the_srch1");
	var the_navbar_toggle = $("#the_tbl_srch1 .navbar-toggle");
	var the_logo_header_margin = 0;
	the_logo_header_margin = ((non_sticky_width / 2) - (the_wdth_main_menu / 2)) - the_logo_header.width();

	var breadcrumb = $("#breadcrumb");	
	
	var home_prods = $(".home_prods");
	var image_cover =$(".image_cover");
	var bevisible = true;	
	//var logo_header_margin = sticky_width * .1;
	
	//var mrgn_lft_main_menu = main_menu.css('margin-left');
	//mrgn_lft_main_menu = parseInt(mrgn_lft_main_menu);
	

	
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

	function the_logo_width(){

		non_sticky_width = non_sticky.width();

		the_header_tbl.width(the_main_menu.width());

		header_tbl.width(the_main_menu.width());

		the_wdth_main_menu = the_header_tbl.width() + 300;			

		the_logo_width_size = non_sticky_width - the_wdth_main_menu;				

		the_tobeadd = the_main_menu.width() + the_logo_width_size + 40;

		the_logo_header_margin = (non_sticky_width / 2 - the_tobeadd / 2);

		the_logo_header.css('margin-left', the_logo_header_margin + 'px');		
		logo_header.css('margin-left', the_logo_header_margin + 'px');	

		 if (non_sticky.width() <= 1181){

		 	the_logo_header.css('margin-left', 5 + 'px');
		 	logo_header.css('margin-left', 5 + 'px');

		 	$("#the_logo_header img").attr("src","/wp-content/uploads/2019/04/stretch_logo.png");
		 	$("#logo_header img").attr("src","/wp-content/uploads/2019/04/stretch_logo.png");		 	


		 } else {

		 	$("#the_logo_header img").attr("src","/wp-content/uploads/2019/04/cropped-logo_04032019-1-1.png");
		 	$("#logo_header img").attr("src","/wp-content/uploads/2019/04/cropped-logo_04032019-1-1.png");		 	
		 	
		 }

		 //console.clear();

		//console.log('non_sticky_width = ' + non_sticky_width + ' the_wdth_main_menu = ' + the_wdth_main_menu + ' the_logo_width_size = ' + the_logo_width_size);

		if (the_logo_width_size >= 250){			

			if (the_logo_width_size > 300) {

				the_logo_width_size = 300;

			} else {

				the_logo_width_size = 250;			
			}


		} else {					

			the_logo_width_size = 249;	

		}
		
		console.log(' new logo_width_size = ' + the_logo_width_size);		

		$("#the_logo_header img").css('width', the_logo_width_size + 'px');
		$("#logo_header img").css('width', the_logo_width_size + 'px');     	



 	    the_srch1.width(the_tbl_srch1.width() - (the_navbar_toggle.width() + 50));
 	    srch1.width(the_tbl_srch1.width() - (the_navbar_toggle.width() + 50));

 	    if (non_sticky.width() <= 600){

 	    	the_srch1.width(the_tbl_srch1.width() - (the_navbar_toggle.width() + 50));
 	    	the_srch1.css('margin-top', '15px');

 	    	srch1.width(the_tbl_srch1.width() - (the_navbar_toggle.width() + 50));
 	    	srch1.css('margin-top', '15px');

 	    }		

		image_cover_home_prods();
		image_covering();

	}	

	function image_covering(){

		var img_cover = $('.image_cover');

		img_cover.height(img_cover.width());

	}

	function logo_width(){

		sticky_width = sticky.width();

		header_tbl.width(main_menu.width());

		wdth_main_menu = header_tbl.width() + 300;			

		logo_width_size = sticky_width - wdth_main_menu;

		if (logo_width_size >= 230){

			if (logo_width_size > 300) {

				logo_width_size = 300;

			}

			logo_header_img.width(logo_width_size);


		} else {

			logo_width_size = 230;

		}

		tobeadd = main_menu.width() + logo_width_size + 40;

		logo_header_margin = (sticky_width / 2 - tobeadd / 2);

		//if (sticky.width() > 1200){

		logo_header.css('margin-left', logo_header_margin + 'px');		

		//} 

		if (sticky.width() <= 950){

		 	logo_header.css('margin-left', 5 + 'px');

		 } 


		 if (sticky.width() <= 950){

		 	$("#logo_header img").attr("src","/wp-content/uploads/2019/04/stretch_logo.png");

		 } else {

		 	$("#logo_header img").attr("src","/wp-content/uploads/2019/04/cropped-logo_04032019-1-1.png");
		 	
		 }

 	    srch1.width(tbl_srch1.width() - (navbar_toggle.width() + 50));

 	    if (sticky.width() <= 600){

 	    	srch1.width(tbl_srch1.width() - (navbar_toggle.width() + 100));
 	    	srch1.css('margin-top', '15px');

 	    }

		//breadcrumb.css('padding-top', sticky_height);

		image_cover_home_prods();

		 //main_menu.css('margin-left', logo_header.offset().left + logo_header_img.width() + 20 + 'px');

		 console.log('sticky_height:' + sticky_height);

	}	

	//logo_width();	
	the_logo_width();
	//header_dv.css({'margin-left': '50px', 'width': width_main_menu + 'px'});
	//main_menu.css('left', header_dv.('left'));


	//srch.css('margin-left', (wdth_main_menu + mrgn_lft_main_menu) - srch.width());	



	$( window ).resize(function() {		

			//console.clear();

			//console.log('sticky_width=' + sticky.width());

			// sticky_width = sticky.width();

			// wdth_main_menu = main_menu.width() + 200;		

			// logo_header_margin = ((sticky_width / 2) - (wdth_main_menu / 2)) - logo_header.width();

			//header_tbl.width(wdth_main_menu);

			//logo_width();
			the_logo_width();

	});

	function image_cover_home_prods(){

		home_prods.each(function(){	 	

			$(this).width(image_cover.width() - 20);

		});

	}

	$('#show_hidden_category').on("click", function(){

		var button_text = $(this).html();		

		//console.clear();
		console.log(button_text);

		if (button_text == '...More Options'){

	 		$('.hidden_category').css('display', 'block');
	 		$(this).html('Show less...');

	 	} else {	 	

	 		$('.hidden_category').css('display', 'none');
	 		$(this).html('...More Options');

	 	}	 	

	 });

	$('#show_hidden_theme').on("click", function(){

		var button_text = $(this).html();		

		//console.clear();
		console.log(button_text);

		if (button_text == '...More Options'){

	 		$('.hidden_theme').css('display', 'block');
	 		$(this).html('Show Less...');

	 	} else {	 	

	 		$('.hidden_theme').css('display', 'none');
	 		$(this).html('...More Options');

	 	}	 	

	 });

	$('#show_hidden_industry').on("click", function(){

		var button_text = $(this).html();		

		//console.clear();
		console.log(button_text);

		if (button_text == '...More Options'){

	 		$('.hidden_industry').css('display', 'block');
	 		$(this).html('Show less...');

	 	} else {	 	

	 		$('.hidden_industry').css('display', 'none');
	 		$(this).html('...More Options');

	 	}	 	

	 });
	
	$('#prods_body').on("hover", '.cover', function(){

		//normal_excerpt();

		var curr_index = $('.cover').index(this);
		//console.log($('.home_prods > .prod_excerpt').css('display'));

		//$(this).find('.prod_excerpt').css('display', 'block');

		//if ($('.prod_excerpt:eq(' + curr_index + ')').css('display') == 'none'){

	    //$('.prod_excerpt:eq(' + curr_index + ')').show("slow");

	    $('.home_prods:eq(' + curr_index + ')').css('height', '150px'); 		
	    

	});

	
	 $('#prods_body').on("hover", function(){

	 	normal_excerpt();

	 });


	 $('#prods_body').on("mouseout", '.cover', function(){

		normal_excerpt();

	});

	 function normal_excerpt(){

	 	var home_prods = $('.home_prods');
	 	
		home_prods.each(function(){	 	

			$(this).css('height', '90px');

		});

		

	 }

	$('#readmore').readmore({
  			
  			speed: 75,
  			moreLink: '<a href="#">Show more &nbsp;&nbsp;&nbsp;  <span class="dashicons dashicons-arrow-down" style="font-size:20pt;"></span></a>',
			lessLink: '<a href="#">Show less...</a>',
  			collapsedHeight: 110,
  			heightMargin: 16,
  			startOpen: false

	});

	$('#readmore1').readmore({
  			
  			speed: 75,
  			moreLink: '<a href="#">Show more</a>',
			lessLink: '<a href="#">Close</a>',
  			collapsedHeight: 200,
  			heightMargin: 16,
  			startOpen: false

	});
	

	 $( "#accordion_categ" ).accordion({

	 	collapsible: true,
	 	heightStyle: 'content'

	 });

	 $( "#accordion_theme" ).accordion({

	 	collapsible: true,
	 	heightStyle: 'content'

	 });

	 $( "#accordion_industry" ).accordion({

	 	collapsible: true,
	 	heightStyle: 'content'

	 });

	 

	 function filter_prods(){

	 	var inside_html;
	 	var filter_categories = $(".filter_categories");
	 	var filter_theme = $(".filter_themes");
	 	var filter_industries = $(".filter_industries");

	 	var categories = [];
	 	var themes = [];
	 	var industries = [];	 

	 	filter_categories.each(function(index, listItem){

	 		 //console.log( index + ": " + $( this ).val() );

	 		 if($(this).prop("checked") == true){

	 		 	categories.push($(this).val());

	 		 	console.log($(this).val());

	 		 }

	 	});

	 	filter_theme.each(function(index, listItem){

	 		 //console.log( index + ": " + $( this ).val() );

	 		 if($(this).prop("checked") == true){

	 		 	themes.push($(this).val());

	 		 }

	 	});

	 	filter_industries.each(function(index, listItem){

	 		 //console.log( index + ": " + $( this ).val() );

	 		 if($(this).prop("checked") == true){

	 		 	industries.push($(this).val());

	 		 }

	 	});

	 	//console.log();

	 	$.ajax({         
         url: '/products-ajax',
         method: 'post',         
         data: {
                post_categories:categories,                
                post_themes:themes,                
                post_industries:industries                
                },         
         success: function(result) {          

        	inside_html = result;          

           	$("#prods_body").empty().html(inside_html);       

         },
         error: function(request, status, error){
         	alert(error);
         }
         });

	 }

	
	 $(".filter_prods").change(function() {  

	 	filter_prods();
        
     });

     function filter_packages(){

     	var inside_html;
	 	var filter_categories = $(".filter_categories");
	 	var filter_theme = $(".filter_themes");
	 	var filter_industries = $(".filter_industries");

	 	var categories = [];
	 	var themes = [];
	 	var industries = [];	 

	 	filter_categories.each(function(index, listItem){

	 		 //console.log( index + ": " + $( this ).val() );

	 		 if($(this).prop("checked") == true){

	 		 	categories.push($(this).val());

	 		 }

	 	});

	 	filter_theme.each(function(index, listItem){

	 		 //console.log( index + ": " + $( this ).val() );

	 		 if($(this).prop("checked") == true){

	 		 	themes.push($(this).val());

	 		 }

	 	});

	 	filter_industries.each(function(index, listItem){

	 		 //console.log( index + ": " + $( this ).val() );

	 		 if($(this).prop("checked") == true){

	 		 	industries.push($(this).val());

	 		 }

	 	});	 

	 	console.log(categories + ' ' + themes + ' ' + industries);

	 	$.ajax({         
         url: '/packages-ajax',
         method: 'post',         
         data: {
                post_categories:categories,                
                post_themes:themes,                
                post_industries:industries                
                },         
         success: function(result) {          

        	inside_html = result;          

           	$("#prods_body").empty().html(inside_html);       

         },
         error: function(request, status, error){
         	alert(error);         }         
        });

     }

     $(".filter_packages").change(function() {  

	 	filter_packages();

        
     }); 

     $('#reset').on("click", function(){     	

     	$('.filter_packages').each(function(index, listItem){

     		$(this).prop('checked', false);

     	});

     	filter_packages();

     });


     $('#reset_prod').on("click", function(){     	

     	$('.filter_prods').each(function(index, listItem){

     		$(this).prop('checked', false);

     	});

     	filter_prods();

     });

    var prevScrollpos = window.pageYOffset;
	window.onscroll = function() {
	var currentScrollPos = window.pageYOffset;
	 if (prevScrollpos > currentScrollPos) {
	    //document.getElementById("sticky").style.top = "0";
	    

	    if ($("#non_sticky").visible()){    	

	    
	    	$("#sticky").css('display', 'none');

	    } else{

	    
	    	$("#sticky").css('display', 'block');
	    		
	    }
	   //   $( "#sticky" ).animate({		    
		  //   top:"0px"
		  // }, 3000, function() {
		  //   //$("#sticky").css("top","0px");
		  // });
	  } else {
	    //document.getElementById("sticky").style.top = "-1400px";
	    
	    $("#sticky").css('display', 'none');
	   //  $( "#sticky" ).animate({		    
		  //   top:"-1400px"
		  // }, 3000, function() {
		  //   //$("#sticky").css("top","-1400px");
		  // });
	  }
	  prevScrollpos = currentScrollPos;  	  

	}

	$(".gall").on("click", function(){

		$("#main_img").attr("src", $(this).attr('src'));

	});

});