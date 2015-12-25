<script type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
<?php echo '<script src="'.base_url().'public/scripts/jquery-1.4.3.min.js" type="text/javascript"></script>'; ?>
<?php echo '<script src="'.base_url().'public/scripts/jquery.min.js" type="text/javascript"></script>'; ?>
<?php echo '<script src="'.base_url().'public/scripts/jquery.nivo.slider.js" type="text/javascript"></script>'; ?>
<?php echo '<script src="'.base_url().'public/scripts/jquery.imgr.js" type="text/javascript"></script>'; ?>
<?php echo '<script src="'.base_url().'public/scripts/jcarousellite_1.0.1.pack.js" type="text/javascript"></script>'; ?>
<?php echo '<script src="'.base_url().'public/scripts/captify.tiny.js" type="text/javascript"></script>'; ?>
<?php echo '<script src="'.base_url().'public/scripts/custom.js" type="text/javascript"></script>'; ?>
<script type="text/javascript">
    $(window).load(function() {
    $('#slider').nivoSlider();
    });
</script>