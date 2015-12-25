<h3>Quản lý dự án</h3>
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
		    <td width="265" class="title">Tên dự án</td>
		    <td width="201" class="title">Thuộc</td>
		    <td width="28" class="title">Sửa</td>
		    <td width="29" class="title">Xóa</td>
		  </tr>
          <?php
		  	if(isset($cate) && $cate != NULL){
				$stt=0;
			  	foreach($cate as $item){
					$stt++;
					echo "<tr>";
					echo "<td>$stt</td>";
					echo "<td>".$item['pro_title']."</td>";
					echo "<td>".$item['cate_name']."</td>";
					echo "<td><a href='".base_url()."admin/project/updatemn/$item[pro_id]'>Sửa</a></td>";
					echo "<td><a href='".base_url()."admin/project/delmn/$item[pro_id]' onClick='return check()'>Xóa</a></td>";
					echo "</tr>";
				}
			}else{
					echo "<tr>";
					echo "<td colspan='5'>Không có chuyên mục</td>";
					echo "</tr>";
			}
		  ?>
		</table>
    <div class="phantrang"><?php echo $this->pagination->create_links();?></div>
	</div>
</div>