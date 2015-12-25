<h3>Sửa chuyên mục</h3>
<div class="add_user">
<div style="color:#F00">
<?php if(isset($error)){echo "<p style='color:red'>$error</p>";}?>
<?php echo validation_errors(); ?>
</div>
<form action="<?php echo base_url()?>admin/gt/update/<?php echo $list['in_id']?>" method="post" enctype="multipart/form-data">
<table width="587" border="0" align="center">
  <tr>
    <td width="138" height="12">Tên bài viết</td>
    <td width="439">
      <input name="in_name" type="text" id="in_name" value="<?php echo $list['in_name']; ?>" size="35"></td>
  </tr>
  <tr>
    <td width="138" height="23">Hình ảnh</td>
    <td><input type="file" name="images" size="30" /></td>
  </tr>
 <tr>
    <td width="138" height="27">Nội dung</td>
    <td colspan="3" align="left">
	<?php 
    $fck = new FCKeditor('in_value');
    $fck->BasePath = sBASEPATH;
    $fck->Value  = $list['in_value'];
    $fck->Width  = '100%';
    $fck->Height = 400;
    $fck->Create();
    ?>	</td>
  </tr>
  <tr>
    <td width="138" height="29">Thứ tự</td>
    <td><input name="in_order" type="text" id="in_order" value="<?php echo $list['in_order']; ?>" size="35" /></td>
  </tr>
  <tr>
    <td width="138" height="33">&nbsp;</td>
    <td align="left"><input type="submit" name="ok" id="ok" value="Edit post" class="magin"></td>
  </tr>
  </table>
</form>
</div>