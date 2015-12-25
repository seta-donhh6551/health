<div id="wapper">
  		<div id="slider">
	          <a href="#"><img src="<?php echo base_url();?>public/images/slider/01.png" /></a>
	          <a href="#"><img src="<?php echo base_url();?>public/images/slider/01.png" /></a>
              <a href="#"><img src="<?php echo base_url();?>public/images/slider/01.png" /></a>
              <a href="#"><img src="<?php echo base_url();?>public/images/slider/01.png" /></a>
        </div>
  		<div id="content">
        	<div class="title">
            	♠ <a href="<?php echo base_url();?>">Trang chủ</a> » <a href="<?php echo base_url()."home/cart/view";?>">Giỏ hàng</a>
            </div>
            <script>
			$(document).ready(function(){
				$("#send").click(function(){
					location.href='<?php echo base_url();?>home/payment/index';
				})
			});
			</script>
            <div class="produc">
            	<?php
				echo"<table width='960'>";
				echo"<tr>";
				echo"<td class='tit'>Tên sản phẩm</td>";
				echo"<td class='tit'>Giá</td>";
				echo"<td class='tit'>Số lượng</td>";
				echo"<td class='tit'>Thành tiền</td>";
				echo"<td class='tit'>Xóa</td>";
				echo"</tr>";
				if($this->cart->total_items()){
	  				echo form_open(base_url().'home/cart/updatecart/'); 
	  				$i=1;
	  				foreach($cart as $item){
	  					echo form_hidden($i.'[rowid]', $item['rowid']);
	  					echo "<tr class='whrite'>";
	  					echo "<td><span class='bold'>".$item['name']."</span><br /><img src='".base_url()."uploads/".$item['options']['images']."' class='img_cart'/>";
	  					echo "<td><span class='red'>".number_format($item['price'])." VND</span></td>";	
	  					echo "<td>".form_input(array('name' => $i.'[qty]', 'value' => $item['qty'], 'maxlength' => '3', 'size' => '5'))."</td>";	
	  					echo "<td><span class='red'>". $this->cart->format_number($item['subtotal']) ." VND</span></td>";
	  					echo "<td><a href=".base_url()."home/cart/del/".$item['id']." style='color:#F00;text-decoration:none;'>Xóa</a></td>";	
	  					echo "</tr>";
	  					$i++;
	  				}
				}else{
					echo "<tr>";
					echo "<td height='70' colspan='5'><span style='color:#0F0'>Không có sản phẩm nào trong giỏ hàng</span></td>";
					echo "</tr>";
				}
				echo "<tr class='whrite'>";
				echo'<td height="60"><input type="submit" name="submit" value="Cập nhật giỏ hàng" class="submit" />'; ?> <input type="button" value="Xóa giỏ hàng" class="submit" onclick="location.href='<?php echo base_url()."home/cart/emptycart";?>'" /> <?php "</td>";    
				echo"<td colspan='4'><span class='red'>Tổng số tiền phải trả : ".number_format($this->cart->total())." VND</span></td>";
				echo "</tr>";
				echo "<tr>";
				echo"<td height='50' colspan='5'><input type='button' value='Tiếp tục mua hàng' onclick='javascript:history.back()' class='submit' />";?> <?php if($this->cart->total_items()){ echo "<input type='button' value='Thanh toán' id ='send' class='submit' style='margin-left:20px;' />";} ?> <?php echo "</td>";    
				echo"</tr>";
				echo "</table>";
				?>
            </div>
            <div class="cls"></div>
        </div>
        <div id="bor"></div>
        <script>
		$(document).ready(function() {
		    var showChar = 30;
		    var ellipsestext = "...";
		    var moretext = "more";
		    var lesstext = "less";
		    $('a.each').each(function() {
		        var content = $(this).html();
		 
		        if(content.length > showChar) {
		 
		            var c = content.substr(0, showChar);
		            var h = content.substr(showChar-1, content.length - showChar);
		 
		            var html = c +  ellipsestext;
		 
		            $(this).html(html);
		       		 }
		 
		    	});
			});
		</script>
        <div id="on_fot">
        	<?php
			$st=0;
			foreach($type as $k => $v){
				$st++;
				if($st == 1){
					echo "<div class='columns' style='margin-left:0px;border-left:none;'>";
					echo "<h4>".$v['cate_news']."</h4>";
					echo "<ul>";
					foreach($news[$k] as $key => $value){
						echo "<li><a href='".base_url()."home/news/index/$v[cate_id]/$value[news_id]' class='each' alt='$value[news_title]' title='$value[news_title]'>".$value['news_title']."</a></li>";
					}
					echo "</ul>";
					echo "</div>";
				}else{
					echo "<div class='columns'>";
					echo "<h4>".$v['cate_news']."</h4>";
					echo "<ul>";
					foreach($news[$k] as $key => $value){
						echo "<li><a href='".base_url()."home/news/index/$v[cate_id]/$value[news_id]' class='each' alt='$value[news_title]' title='$value[news_title]'>".$value['news_title']."</a></li>";
					}
					echo "</ul>";
					echo "</div>";						
				}
			}
			?>
        </div>
  		<div id="bottom"></div>
  </div>