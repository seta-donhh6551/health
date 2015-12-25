<script type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
<?php echo '<script src="'.base_url().'public/scripts/jquery-1.7.1.min.js" type="text/javascript"></script>'; ?>
<?php echo '<script src="'.base_url().'public/scripts/jquery.nivo.slider.js" type="text/javascript"></script>'; ?>
<?php echo '<script src="'.base_url().'public/scripts/jcarousellite_1.0.1.pack.js" type="text/javascript"></script>'; ?>
<?php echo '<script src="'.base_url().'public/scripts/ddsmoothmenu.js" type="text/javascript"></script>'; ?>
<?php echo '<script src="'.base_url().'public/scripts/custom.js" type="text/javascript"></script>'; ?>
<script type="text/javascript">
    $(window).load(function() {
    $('#slider').nivoSlider();
    });
</script>
<script type="text/javascript">
	window.onload = function(){
		
		
		g_globalObject = new JsDatePick({
			useMode:1,
			isStripped:true,
			target:"calan"
			/*selectedDate:{				This is an example of what the full configuration offers.
				day:5,						For full documentation about these settings please see the full version of the code.
				month:9,
				year:2006
			},
			yearsRange:[1978,2020],
			limitToToday:false,
			cellColorScheme:"beige",
			dateFormat:"%m-%d-%Y",
			imgPath:"img/",
			weekStartDay:1*/
		});		
		
		g_globalObject.setOnSelectedDelegate(function(){
			var obj = g_globalObject.getSelectedDay();
			alert("a date was just selected and the date is : " + obj.day + "/" + obj.month + "/" + obj.year);
			document.getElementById("div3_example_result").innerHTML = obj.day + "/" + obj.month + "/" + obj.year;
		});
		
		
		
		g_globalObject2 = new JsDatePick({
			useMode:1,
			isStripped:false,
			target:"div4_example",
			cellColorScheme:"beige"
			/*selectedDate:{				This is an example of what the full configuration offers.
				day:5,						For full documentation about these settings please see the full version of the code.
				month:9,
				year:2006
			},
			yearsRange:[1978,2020],
			limitToToday:false,
			dateFormat:"%m-%d-%Y",
			imgPath:"img/",
			weekStartDay:1*/
		});
		
		g_globalObject2.setOnSelectedDelegate(function(){
			var obj = g_globalObject2.getSelectedDay();
			alert("a date was just selected and the date is : " + obj.day + "/" + obj.month + "/" + obj.year);
			document.getElementById("div3_example_result").innerHTML = obj.day + "/" + obj.month + "/" + obj.year;
		});		
		
	};
</script>
