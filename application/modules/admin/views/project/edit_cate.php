<h3>Sửa dự án</h3>
<script type="text/javascript">
  	function check(){
		if(document.sac.cate_name.value == ""){
			alert("Vui lòng nhập tên dự án!");
			document.sac.cate_name.focus();
			return false;
		}
	}
</script>
<div class="add_user">
<div style="color:#F00">
<?php if(isset($error)){echo "<p style='color:red'>$error</p>";}?>
<?php echo validation_errors(); ?>
</div>
<form action="<?php echo base_url()."admin/project/updatemn/".$info['pro_id'];?>" method="post" name="sac" onsubmit="return check()" enctype="multipart/form-data">
	<table width="591" align="center">
  <tr>
    <td width="167" height="29">Tên dự án</td>
    <td colspan="3" align="left"><p>
      <input type="text" name="pro_title" value="<?php echo $info['pro_title']; ?>" size="30" />
    </p></td>
  </tr>
  <tr>
    <td width="167" height="29">Tên dự án - tiếng anh</td>
    <td colspan="3" align="left"><p>
      <input type="text" name="pro_title_en" value="<?php echo $info['pro_title_en']; ?>" size="30" />
    </p></td>
  </tr>
  <tr>
    <td width="167" height="29">Thuộc</td>
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
    <td width="167" height="29">Chủ đầu tư</td>
    <td colspan="3" align="left">
		<input type="text" name="pro_user" size="30" value="<?php echo $info['pro_user']; ?>" /> 
    </td>
  </tr>
  <tr>
    <td width="167" height="29">Chủ đầu tư - tiếng anh</td>
    <td colspan="3" align="left">
		<input type="text" name="pro_user_en" size="30" value="<?php echo $info['pro_user_en']; ?>" /> 
    </td>
  </tr>
  <tr>
    <td width="167" height="29">Địa điểm</td>
    <td colspan="3" align="left">
		<input type="text" name="pro_location" size="30" value="<?php echo $info['pro_location']; ?>" /> 
    </td>
  </tr>
  <tr>
    <td width="167" height="29">Địa điểm - tiếng anh</td>
    <td colspan="3" align="left">
		<input type="text" name="pro_location_en" size="30" value="<?php echo $info['pro_location_en']; ?>" /> 
    </td>
  </tr>
  <tr>
    <td width="167" height="29">Quy mô</td>
    <td colspan="3" align="left">
		<input type="text" name="pro_scale" size="30" value="<?php echo $info['pro_scale']; ?>" /> 
    </td>
  </tr>
  <tr>
    <td width="167" height="29">Quy mô - tiếng anh</td>
    <td colspan="3" align="left">
		<input type="text" name="pro_scale_en" size="30" value="<?php echo $info['pro_scale_en']; ?>" /> 
    </td>
  </tr>
  <tr>
    <td width="167" height="29">Nội dung</td>
    <td colspan="3" align="left"><p>
     <?php 
    $fck = new FCKeditor('pro_value');
    $fck->BasePath = sBASEPATH;
    $fck->Value  = $info['pro_value'];
    $fck->Width  = '100%';
    $fck->Height = 400;
    $fck->Create();
    ?>
    </p></td>
  </tr>
  <tr>
    <td width="167" height="29">Nội dung - tiếng anh</td>
    <td colspan="3" align="left"><p>
     <?php 
    $fck = new FCKeditor('pro_value_en');
    $fck->BasePath = sBASEPATH;
    $fck->Value  = $info['pro_value_en'];
    $fck->Width  = '100%';
    $fck->Height = 400;
    $fck->Create();
    ?>
    </p></td>
  </tr>
  <tr>
    <td width="167" height="33">Hình ảnh</td>
    <td colspan="3" align="left">
      <input name="img" type="file" size="30" />
    </td>
  </tr>
  <tr>
    <td height="26" align="right">&nbsp;</td>
    <td width="211" align="center"><input type="submit" name="ok" value="Edit Cate" class="magin"/></td>
    <td width="197" colspan="2" align="left">&nbsp;</td>
  </tr>
    </table>
</form>
</div>
