<h3>Nội dung đơn đặt hàng</h3>
<div class="detail">
	<?php
		if($all == FALSE){
			echo "<h3>Không có dữ liệu</h3>";
		}else{
			echo "<table class='none'>";
			echo "<tr>";
			echo "<td width='150'><h4>Tên người mua hàng </h4></td><td width='250'>".$all['don_name']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><h4>Email</h4></td><td>".$all['don_email']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><h4>Điạ chỉ</h4></td><td>".$all['don_adress']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<tr>";
			echo "<td><h4>Điện thoại</h4></td><td>".$all['don_phone']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><h4>Ngày gửi</h4></td><td>".$all['don_date']."</td>";
			echo "</tr>";			
			echo "</table>";
			echo "<h6 class='ok'>Chi tiết đơn hàng</h6>";
			echo "<table class='none'>";
			echo "<tr>";
			echo "<td width='150'><h4>Mã hóa đơn</h4></td><td width='250'>".$all['order_code']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td width='150'><h4>Tên sản phẩm</h4></td><td>".$all['order_name']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td width='150'><h4>Tổng số sản phẩm</h4></td><td width='250'>".$all['order_num']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td width='150'><h4>Tổng số tiền</h4></td><td width='250'>".number_format($all['order_price'])."</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td width='150'><h4>Trạng thái</h4></td><td width='250'>";
			if($all['don_status'] == 1){
				echo "<span style='color:red'>Đã thanh toán</span>";
			}else{
				echo "<span style='color:red'>Chưa thanh toán</span>";				
			}
			echo "</td>";
			echo "</tr>";
			echo "</table>";
		}
	?>
</div>