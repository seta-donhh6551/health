<h3>Chuyên mục bài viết</h3>
<script type="text/javascript">
  	function check(){
		if(document.sac.in_name.value == ""){
			alert("Vui lòng nhập tên bài viết!");
			document.sac.in_name.focus();
			return false;
		}
		if(isNaN(document.sac.in_order.value)){
			alert("Thứ tự bao chỉ bao gồm chữ số!");
			document.sac.in_order.focus();
			return false;
		}
	}
</script>
<div class="add_user">
<div style="color:#F00; text-align:center;">
<?php if(isset($error)){echo "<p style='color:red'>$error</p>";}?>
<?php echo validation_errors(); ?>
</div>
<form action="<?php echo base_url()?>admin/gt/add" method="post" name="sac" onsubmit="return check()" enctype="multipart/form-data">
	<table width="688" align="center">
  <tr>
    <td width="163" height="29">Tên bài viết</td>
    <td colspan="3" align="left"><p>
      <input name="in_name" type="text" id="in_name" size="30" />
    </p></td>
    </tr>
  <tr>
  <tr>
    <td width="163" height="13">Thứ tự</td>
    <td colspan="3" align="left"><input name="in_order" type="text" id="in_order" size="30" /></td>
    </tr>
  <tr>
    <td width="163" height="14">Hình ảnh</td>
    <td colspan="3" align="left"><input type="file" name="images" size="30" /> </td>
  </tr>
  <tr>
    <td width="163" height="33">Nội dung</td>
    <td colspan="3" align="left">
	<?php 
    $fck = new FCKeditor('in_value');
    $fck->BasePath = sBASEPATH;
    //$fck->Value  = $this->config->item('config_contact');
    $fck->Width  = '100%';
    $fck->Height = 400;
    $fck->Create();
    ?>	</td>
  </tr>
  <tr>
    <td height="26" align="right">&nbsp;</td>
    <td width="244" align="center"><input type="submit" name="ok" value="Add intro" class="magin"/></td>
    <td width="265" colspan="2" align="left">&nbsp;</td>
  </tr>
    </table>
</form>
</div>
