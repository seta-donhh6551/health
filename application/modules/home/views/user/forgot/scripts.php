<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
<?php echo '<script src="'.base_url().'public/scripts/jquery-1.7.1.js" type="text/javascript"></script>'; ?>
<?php echo '<script src="'.base_url().'public/scripts/jquery.min.js" type="text/javascript"></script>'; ?>
<?php echo '<script src="'.base_url().'public/scripts/jquery.nivo.slider.js" type="text/javascript"></script>'; ?>
<?php echo '<script src="'.base_url().'public/scripts/dongho.js" type="text/javascript"></script>'; ?>
<?php echo '<script src="'.base_url().'public/scripts/tooltip.js" type="text/javascript"></script>'; ?>
<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:15,
		animSpeed:500,
		pauseTime:4000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false, 
		directionNavHide:false, //Only show on hover
		controlNav:true, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>