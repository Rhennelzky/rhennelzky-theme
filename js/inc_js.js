jQuery(document).ready(function($) {

	var incs = $("#incs span");
	var id = incs.attr('id');
	var to_be_del = $("#to_be_del");
	var publish = $("#publish");

	incs.on('click', function() { 	

		id = $(this).attr('id');	
		to_be_del.val(id);

		publish.click();
		

	});

});