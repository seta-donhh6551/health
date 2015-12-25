<h3>Quản lý đơn đặt hàng</h3>
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
<table  width="770" align="center">
  <tr>
    <td width="26" class="title"><input type="checkbox" name="checkall" onclick="chkallClick(this)"/></td>
    <td width="160" class="title">Tên tài khách hàng</td>
    <td width="174" class="title">Mã hóa đơn</td>
    <td width="113" class="title">Trạng thái</td>
    <td width="185" class="title">Số tiền</td>
    <td width="45" class="title">Chi tiết</td>
    <td width="35" class="title ">Xóa</td>
  </tr>
  <?php
  	if($info != NULL){
		foreach($info as $item){
			echo "<tr>";
			echo "<td><input type='checkbox' name='check[]' value='".$item['don_id']."'/></td>";
			echo "<td>".$item['don_name']."</td>";
			echo "<td>".$item['order_code']."</td>";
			if($item['don_status'] == 1){
				echo "<td>Yes</td>";
			}else{
				echo "<td>No</td>";
			}
			echo "<td>".number_format($item['order_price'])."</td>";	
			echo "<td><a href='".base_url()."admin/order/order_view/".$item['don_id']."'>Xem </a></td>";
			echo "<td><a href='".base_url()."admin/order/del/".$item['don_id']."' onClick='return check()'>Xóa</a></td>";
			echo "</tr>";
		}
	}else{
		echo "<tr>";
		echo "<td colspan='8'>Không có đơn đặt hàng</td>";
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