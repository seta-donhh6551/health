$(window).scroll(function() {
    var window_top = $(window).scrollTop();
    console.log("window_top:" +window_top);
    console.log("dfjkldfj:" + $("#adsone").offset().top);
    if(window_top >= $("#adstwo").offset().top + $("#adstwo").height()) {
  		$("#adsone").removeClass("fixed_bottom");
  		$("#adsone").addClass("fixed_top");
  	} else {$("#adsone").removeClass("fixed_top");}
  if(window_top + $("#adsone").height()>   $("#footer").offset().top){
  $("#adsone").removeClass("fixed_top");
  $("#adsone").addClass("fixed_bottom");
  }	
});