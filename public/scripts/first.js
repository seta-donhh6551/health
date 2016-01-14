//right scroll
$(window).scroll(function () {
	scrollWindows('#adsone', '#adstwo');
});

//in this article
$(window).scroll(function () {
	scrollWindows('#quick-view', '.newslf');
});

function scrollWindows(Object, elementTo){
	var window_top = $(window).scrollTop();
	var adsHeight = $(elementTo).offset().top + $(elementTo).height();
	if (window_top >= adsHeight/2) {
		$(Object).removeClass("fixed_bottom");
		$(Object).addClass("fixed_top");
	} else {
		$(Object).removeClass("fixed_top");
	}
	if (window_top + $(Object).height() > $("#footer").offset().top) {
		$(Object).removeClass("fixed_top");
		$(Object).addClass("fixed_bottom");
	}
}