<!----HEADER--->
<div id="header">
   <div id="inner_header">
        <div id="logo">
            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>public/images/logo.png" /></a>
        </div>
   
       <div id="company">
            <h2>CÔNG TY CỔ PHẦN PHÒNG CHÁY CHỮA CHÁY VÀ AN NINH ĐIỆN TỬ</h2>
            <h3>Địa chỉ: P603 - Khu đô thị Yên Hòa - Q. Cầu Giấy - Hà Nội</h3>
            <div class="search">
                <form action="<?php echo base_url() ?>vn/search/index" method="post" class="timkiem">
                    <input type="text" name="keywords" id="keywords" value="Từ khóa" class="input_search" onfocus="clearText(this)" onblur="clearText(this)"/>
                    <input type="submit" name="btnsearch" value="Search" class="btn_search"/>
                </form>
            </div>
        </div>
        
        
        
        <div id="navigation">
            <ul id="nav">
                <li class="text"><a href="<?php echo base_url(); ?>">TRANG CHỦ</a></li>
                <li class="text"><a href="javascript:void(0)">GIỚI THIỆU
				<ul>
				<?php
					if(isset($menuintro) && $menuintro != NULL){
						foreach($menuintro as $intro){
							echo "<li><a href='".base_url()."gioi-thieu/$intro[in_id]-$intro[in_name_rewrite]'>".$intro['in_name']."</a></li>";
						}
					}
				?>
				</ul>
				</li>
                <li class="text"><a href="javascript:void(0)">SẢN PHẨM-THIẾT BỊ</a>
                <ul>
                <?php
					if(isset($menu) && $menu != NULL){
						foreach($menu as $mn){
							echo "<li><a href='".base_url()."san-pham/$mn[cate_id]-$mn[cate_rewrite]'>".$mn['cate_name']."</a></li>";
						}
					}
				?>
                </ul>
                </li>
                <li class="text"><a href="javascript:void(0)">THẾ MẠNH</a>
				<ul>
				<?php
					if(isset($menustreng) && $menustreng != NULL){
						foreach($menustreng as $streng){
							echo "<li><a href='".base_url()."the-manh/$streng[cago_id]-$streng[cago_rewrite]'>".$streng['cago_name']."</a></li>";
						}
					}
				?>
				</ul>
				</li>
                <li class="text"><a href="javascript:void(0)">KIẾN THỨC</a>
				<ul>
				<?php
					if(isset($menukt) && $menukt != NULL){
						foreach($menukt as $kt){
							echo "<li><a href='".base_url()."kien-thuc/$kt[cago_id]-$kt[cago_rewrite]'>".$kt['cago_name']."</a></li>";
						}
					}
				?>
				</ul>
				</li>
                <li class="text"><a href="<?php echo base_url(); ?>tin-tuc">TIN TỨC</a></li>
                <li class="text"><a href="<?php echo base_url(); ?>lien-he">LIÊN HỆ</a></li>
            </ul>
        </div>
       
       <div class="clear"></div>
   
    </div> 
</div>
<!----END HEADER--->