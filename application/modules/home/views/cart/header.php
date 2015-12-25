	<!-- Begin header -->
    <div id="header">
  	<div id="top">
    	<div id="logo"><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>public/images/logo.png" /></a></div>
    	<div id="search">
        	<div class="search">
            	<form action="javascript:void(0)">
	            	<input type="text" name="search" onfocus="clearText(this)" onblur="clearText(this)" title="Tìm kiếm" id="input" value="Search" class="txt_field"/>
	                <input type="submit" name="submit" class="btn" value=""/>
            </form>
            </div>
        </div>
    </div>
  	<div id="bottom">
    	<ul id="menu">
            <li><a href="<?php echo base_url();?>">Trang chủ</a></li>
	    	<li><a href="<?php echo base_url();?>home/product/all">Hoa vip</a></li>            
            <?php 
				if($mn != NULL){
					foreach($mn as $mtop){
						echo "<li><a href='".base_url()."home/content/view/".$mtop['m_id']."'>$mtop[m_name]</a></li>";
					}
				}else{
					echo "Không có dữ liệu";
				}
			?>
	    	<li><a href="#">Media</a></li>
	    	<li><a href="<?php echo base_url();?>home/index/contact">Liên hệ</a></li>            
		</ul>
    </div>
  </div>
    <!-- End of header -->