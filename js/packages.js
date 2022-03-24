jQuery(document).ready(function($) {

	var packs = $("#packages span");
	var id = packs.attr('id');
	var to_be_del = $("#to_be_del");
	var publish = $("#publish");

	packs.on('click', function() { 	

		id = $(this).attr('id');	
		to_be_del.val(id);

		console.clear();
		console.log(id);

		publish.click();
		

	});

});