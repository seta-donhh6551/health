<h3>Sửa tài liệu</h3>
<div class="add_user">
<?php echo validation_errors();?>
<form action="<?php echo base_url()."admin/document/update/$info[doc_id]";?>" method="post">
<table width="644" align="center">
  <tr>
    <td height="28">Tên tài liệu</td>
    <td colspan="2" align="left"><label for="doc_title"></label>
      <input name="doc_title" type="text" id="doc_title" value="<?php echo $info['doc_title'];?>" size="30" /></td>
  </tr>
  <tr>
    <td height="28">Tên tiếng anh</td>
    <td colspan="2" align="left"><label for="doc_title"></label>
      <input name="doc_title_en" type="text" id="doc_title" value="<?php echo $info['doc_title_en'];?>" size="30" /></td>
  </tr>
  <tr>
    <td height="30">Thuộc mục</td>
    <td colspan="2" align="left">
    	<select name="doc_type">
        	<option value="1">Tài liệu kỹ thuật</option>
            <option value="2">Tài liệu hành chính</option>
            <option value="3">Tài liệu tham khảo</option>
        </select>
    </td>
  </tr>
  <tr>
    <td height="61">Nội dung</td>
    <td colspan="2" align="left">
    <?php 
    $fck = new FCKeditor('doc_value');
    $fck->BasePath = sBASEPATH;
    $fck->Value  = $info['doc_value'];
    $fck->Width  = '100%';
    $fck->Height = 400;
    $fck->Create();
    ?>
    </td>
  </tr>  
  <tr>
    <td height="61">Nội dung tiếng anh</td>
    <td colspan="2" align="left">
    <?php 
    $fck = new FCKeditor('doc_value_en');
    $fck->BasePath = sBASEPATH;
    $fck->Value  = $info['doc_value_en'];
    $fck->Width  = '100%';
    $fck->Height = 400;
    $fck->Create();
    ?>
    </td>
  </tr>  
  <tr>
    <td height="40" align="right">&nbsp;</td>
    <td width="73" align="left"><input type="submit" name="ok" value="Edit doc" class="magin"/></td>
    <td width="398" align="left"><input type="reset" name="Reset" id="button" value="Nhập Lại" class="magin"/></td>
  </tr>
    </table>
</form>
</div>