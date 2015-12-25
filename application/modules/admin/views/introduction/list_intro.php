<h3>Quản lý giới thiệu</h3>
<script type="text/javascript">
	function check(){
		if(confirm('Bạn có chắc muốn xóa không ?')){
			return true;
		}else{
			return false;
		}
	}
</script>

<div class="detail">
    <div id="cate_news">
	    <table align="center">
		  <tr>
		    <td width="35" class="title">Stt</td>
		    <td width="262" class="title">Tên</td>			
		    <td width="61" class="title">Thứ tự</td>
		    <td width="28" class="title">Sửa</td>
		    <td width="29" class="title">Xóa</td>
		  </tr>
          <?php
		  	if($intro != NULL){
				$stt=0;
			  	foreach($intro as $item){
					$stt++;
					echo "<tr>";
					echo "<td>$stt</td>";
					echo "<td>".$item['in_name']."</td>";
					echo "<td>".$item['in_order']."</td>";
					echo "<td><a href='".base_url()."admin/gt/update/$item[in_id]'>Sửa</a></td>";
					echo "<td><a href='".base_url()."admin/gt/del/$item[in_id]' onClick='return check()'>Xóa</a></td>";
					echo "</tr>";
				}
			}else{
					echo "<tr>";
					echo "<td colspan='5'>No data</td>";
					echo "</tr>";
			}
		  ?>
		</table>
    <div class="phantrang"><?php echo $this->pagination->create_links();?></div>
	</div>
</div>