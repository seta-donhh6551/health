<script type="text/javascript">
function clearText(field){
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
<script type="text/javascript" src="<?php echo base_url();?>public/scripts/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/scripts/cufon-yui.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/scripts/UTM_Facebook_KT_400.font.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/scripts/custom.js"></script>
<!--[if IE]>
<script type="text/javascript">
    Cufon.replace('#menu_top_right_mid ul a'); 
    Cufon.replace('#menu ul a');
    Cufon.replace('#category_left ul a');	 	
	Cufon.replace('.post_title h4');	
	Cufon.replace('#footer_right_top ul a');	
	Cufon.replace('#footer_right_bottom h4');			 	
</script>
<![endif]-->