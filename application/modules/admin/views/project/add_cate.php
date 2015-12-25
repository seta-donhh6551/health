<h3>Thêm mới dự án</h3>
<script type="text/javascript">
  	function check(){
		if(document.sac.cate_name.value == ""){
			alert("Vui lòng nhập tên dự án!");
			document.sac.cate_name.focus();
			return false;
		}
		if(isNaN(document.sac.cate_order.value)){
			alert("Thứ tự bao chỉ bao gồm chữ số!");
			document.sac.cate_order.focus();
			return false;
		}
	}
</script>
<div class="add_user">
<div style="color:#F00">
<?php if(isset($error)){echo "<p style='color:red'>$error</p>";}?>
<?php echo validation_errors(); ?>
</div>
<form action="<?php echo base_url()?>admin/project/add" method="post" name="sac" onsubmit="return check()" enctype="multipart/form-data">
	<table width="534" align="center">
  <tr>
    <td width="134" height="29">Tên dự án</td>
    <td colspan="3" align="left"><p>
      <input type="text" name="pro_title" size="30" />
    </p></td>
  </tr>
  <tr>
    <td width="134" height="29">Thuộc</td>
    <td colspan="3" align="left">
    <select name="cate_id">
    <?php
     foreach($listcate as $cate){
     	echo "<option value='$cate[cate_id]'>".$cate['cate_name']."</option>";
     }
    ?>
    </select>
    </td>
  </tr>
  <tr>
    <td width="134" height="29">Chủ đầu tư</td>
    <td colspan="3" align="left">
		<input type="text" name="pro_user" size="30" /> 
    </td>
  </tr>
  <tr>
    <td width="134" height="29">Địa điểm</td>
    <td colspan="3" align="left">
		<input type="text" name="pro_location" size="30" /> 
    </td>
  </tr>
  <tr>
    <td width="134" height="29">Quy mô</td>
    <td colspan="3" align="left">
		<input type="text" name="pro_scale" size="30" /> 
    </td>
  </tr>
  <tr>
    <td width="134" height="29">Nội dung</td>
    <td colspan="3" align="left"><p>
     <?php 
    $fck = new FCKeditor('pro_value');
    $fck->BasePath = sBASEPATH;
    //$fck->Value  = $this->config->item('config_contact');
    $fck->Width  = '100%';
    $fck->Height = 400;
    $fck->Create();
    ?>
    </p></td>
  </tr>
  <tr>
    <td width="134" height="33">Hình ảnh</td>
    <td colspan="3" align="left">
      <input name="img" type="file" size="30" />
    </td>
  </tr>
  <tr>
    <td height="26" align="right">&nbsp;</td>
    <td width="121" align="center"><input type="submit" name="ok" value="Add Cate" class="magin"/></td>
    <td colspan="2" align="left">&nbsp;</td>
  </tr>
    </table>
</form>
</div>
