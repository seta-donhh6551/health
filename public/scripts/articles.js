$(document).ready(function(){
	$('.defull').find('h3 strong').each(function (index, element) {
		var text = $(this).text();
		$('#quick-view ul').append('<li><a href="#tab'+index+'">'+text+'</a></li>')
		$(this).attr('id','tab'+index);
	});
});


