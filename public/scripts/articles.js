$(document).ready(function(){
	$('.defull').find('h3 strong').each(function (index, element) {
		var text = $(this).text();
		$('#quick-view ul').append('<li><a href="#tab'+index+'">'+text+'</a></li>')
		$(this).attr('id','tab'+index);
	});
	$("#quick-view ul li a").click(function() {
		var id = $(this).attr('href');
		$('html, body').animate({
			scrollTop: $(id).offset().top
		}, 1000);
		return false;
	});
});
