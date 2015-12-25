<h3>Quản lý tài liệu</h3>
<script type="text/javascript">
	function chkallClick(o) {
  	var form = document.sac;
	for (var i = 0; i < form.elements.length; i++) {
		if (form.elements[i].type == "checkbox" && form.elements[i].name!="checkall") {
			form.elements[i].checked = document.sac.checkall.checked;
		}
	}
}
</script>
<script type="text/javascript">
	function check(){
		if(confirm('Bạn có chắc chắn muốn xóa ?')){
			return true;
		}else{
			return false;
		}
	}
</script>
<div class="detail">
<form action="" method="post" name="sac">
<table  width="724" align="center">
  <tr>
    <td width="26" class="title"><input type="checkbox" name="checkall" onclick="chkallClick(this)"/></td>
    <td width="408" class="title">Tên tài liệu</td>
    <td width="186" class="title">Thuộc mục</td>
    <td width="48" class="title">Chi tiết</td>
    <td width="32" class="title ">Xóa</td>
  </tr>
  <?php
  	if($info != NULL){
		foreach($info as $item){
			echo "<tr>";
			echo "<td><input type='checkbox' name='check[]' value='".$item['doc_id']."'/></td>";
			echo "<td>".$item['doc_title']."</td>";
			echo "<td>".$item['type_value']."</td>";
			echo "<td><a href='".base_url()."admin/document/update/".$item['doc_id']."'>Sửa </a></td>";
			echo "<td><a href='".base_url()."admin/document/del/".$item['doc_id']."' onClick='return check()'>Xóa</a></td>";
			echo "</tr>";
		}
	}else{
		echo "<tr>";
		echo "<td colspan='5'>Không có tài liệu</td>";
		echo "</tr>";
	}
  ?>
</table>
<div class="phantrang">
<?php echo $this->pagination->create_links();?>
</div>
<input type="submit" name="ok" value="Xóa chọn" class="magin" onClick="return confirm('Bạn có chắc chắn muốn xóa ?');"/>
</form>
</div>