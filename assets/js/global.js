$('.get-action').click(function(){
	var command = $(this).attr('data-cmd');
	var method	= $(this).attr('data-method'); 
	
	switch (command) {
		case 'href':
			window.location.href = method;
			break;
	
		default:
			break;
	}
})
