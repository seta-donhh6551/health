<h3>Nội dung người liên hệ</h3>
<div class="detail">
	<?php
		if($all == FALSE){
			echo "<h3>Không có dữ liệu</h3>";
		}else{
			echo "<table class='none'>";
			echo "<tr>";
			echo "<td width='150'><h4>Tên người liên hệ </h4></td><td width='250'>".$all['con_name']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><h4>Email </h4></td><td>".$all['con_email']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><h4>Điện thoại </h4></td><td>".$all['con_phone']."</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<td><h4>Ngày gửi </h4></td><td>".$all['con_date']."</td>";
			echo "</tr>";			
			echo "</table>";
			echo "<h6 class='ok'>Nội dung liên hệ</h6>";
			echo "<p class='p'>".$all['con_full']."</p>";
		}
	?>
</div>