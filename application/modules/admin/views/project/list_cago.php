<h3>Quản lý sub menu</h3>
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
		    <td width="200" class="title">Tên chuyên mục</td>
		    <td width="34" class="title">Sửa</td>
		    <td width="30" class="title">Xóa</td>
		  </tr>
          <?php
		  	$stt=0;
		  	foreach($cago as $item){
				$stt++;
				echo "<tr>";
				echo "<td>$stt</td>";
				echo "<td>".$item['type_name']."</td>";
				echo "<td><a href='".base_url()."admin/cate/editsub/$item[type_id]'>Sửa</a></td>";
				echo "<td><a href='".base_url()."admin/cate/delsub/$item[type_id]' onClick='return check()'>Xóa</a></td>";
				echo "</tr>";
			}
		  ?>
		</table>
    <div class="phantrang"><?php echo $this->pagination->create_links();?></div>
	</div>
</div>