<script type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
<?php echo '<script src="'.base_url().'public/scripts/jquery-1.4.2.min.js" type="text/javascript"></script>'; ?>
<?php echo '<script src="'.base_url().'public/scripts/coin-slider.min.js" type="text/javascript"></script>'; ?>
<script>
$(document).ready(function() {
	$('#slideshow').coinslider({ hoverPause: false });
});
</script>