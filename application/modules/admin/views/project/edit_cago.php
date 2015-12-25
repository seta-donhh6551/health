<h3>Sửa submenu</h3>
<div class="add_user">
<?php

?>
<?php
	if(isset($error)){
		echo "<p style='color:red'>$error</p>";
	}
?>
<form action="<?php echo base_url()?>admin/cate/editsub/<?php echo $list['type_id']?>" method="post">
<table width="402" border="0" align="center">
  <tr>
    <td width="150" height="46">Tên chuyên mục</td>
    <td width="242" align="left">
      <input name="cate_name" type="text" id="cate_name" value="<?php echo $list['type_name']; ?>" size="30"></td>
  </tr>
  <tr>
    <td width="150" height="33">&nbsp;</td>
    <td align="left"><input type="submit" name="ok" id="ok" value="Sửa Cate" class="magin"></td>
  </tr>
  </table>
</form>
</div>