<?php if($error != ""){ echo $error; } ?>
<form action="<?php echo base_url();?>upload/process" method="post" enctype="multipart/form-data">
	Your avata : <input type="file" name="img" size="25"  />
	<input type="submit" name="ok" value="Upload"  />
</form>