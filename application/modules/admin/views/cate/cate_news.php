<div id="cate_news">
    <table width="387" align="center">
	  <tr>
	    <td width="63" class="title">Stt</td>
	    <td width="249" class="title">Tên chuyên mục</td>
	    <td width="33" class="title">Sửa</td>
	    <td width="22" class="title">Xóa</td>
	  </tr>
    <?php
	$stt=0;
	foreach($cate as $item){
		$stt++;
		echo "<tr>";
		echo "<td>$stt</td>";
		echo "<td>".$item['cate_name']."</td>";
		echo "<td><a href='".base_url()."admin/cate/update/$item[cate_id]'>Sửa</a></td>";
		echo "<td><a href='".base_url()."admin/cate/del/$item[cate_id]'>Xóa</a></td>";		
		echo "</tr>";
	}
	?>
	</table>
    <div id="phantrang">
	<?php echo $this->pagination->create_links();?>
	</div>
</div>