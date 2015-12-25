	<div id="content">
    	<div id="content_left">
        	<div id="support">
            	<div id="support_top"></div>
                <div id="support_mid">
                	<ul>
                    <?php
						if(isset($support) && $support){
							foreach($support as $sup){
								echo "<li><a href='ymsgr:sendim?".$sup['sup_yahoo']."&amp;m=hello' title='".$sup['sup_name']."'><img src='".base_url()."public/images/yahoo.png' alt='Thiết kế website' title='Thiết kế website' />".$sup['sup_name']."</a></li>";
								echo "<li><span>".$sup['sup_phone']."</span></li>";
							}
						}else{
							echo "<li>No data</li>";
						}
					?>
                    </ul>
                </div>
                <div id="support_bottom"></div>
            </div>
            <div id="order01"></div>
            <div id="order02"></div>
            <div class="unknow">
            	<div class="unknow_top"><h4>Dịch vụ</h4></div>
                <div class="unknow_mid service">
                	<div class="service_items">
                    	<h5><a href="<?php echo base_url(); ?>cac-goi-thiet-ke-web.html" title="Thiết kế website" >Thiết kế website</a></h5>
                        <p>Dịch vụ thiết kế web đẹp, chuyên nghiệp. Trang web được bảo hành vĩnh viễn.</p>
                    </div>
                    <div class="service_items">
                    	<h5><a href="<?php echo base_url(); ?>thiet-ke-logo.html" title="Thiết kế logo">Thiết kế logo, slogan</a></h5>
                        <p>Dịch vụ thiết kế logo công ty, Slogan catalogue đẹp.</p>
                    </div>
                    <div class="service_items">
                    	<h5><a href="<?php echo base_url(); ?>dao-tao.html" title="Học PHP ở đâu?">Đào tạo lập trình viên</a></h5>
                        <p>Đào tạo lập trình PHP từ căn bản đến nâng cao,đảm bảo sau khóa học bạn có thể làm được hết các loại website.</p>
                    </div>
                </div>
                <div class="unknow_bottom"></div>
            </div>
        </div>
    	<div id="content_right">
        	<div id="content_right_title"><h4><a href="<?php echo  base_url(); ?>" title="Trang chủ">Trang chủ </a>&raquo; <a href="<?php echo  base_url(); ?>dich-vu.html" title="Dịch vụ"><?php echo $title; ?></a></h4></div>
            <div id="content_right_content">
            	<div class="service_info" style="padding:10px 0px;"><?php echo $service['service_info'];?></div>
                <div class="service_full" style="padding:10px 0px;"><?php echo $service['service_full'];?></div>
                <div class="service_category" style="padding:10px 0px;">
                	
				</div>
            </div>
    	</div>
        <div class="cls"></div>
</div>
<div id="slider">
	<div id="slider_left">
    	<div class="unknow">
            <div class="unknow_top"><h4>Thống kê</h4></div>
            <div class="unknow_mid unheight">
                <ul class="online">
                    <li><label>Số lần truy cập </label> <span><?php echo $access; ?></span></li>
                    <li><label>Số người online </label> <span><?php echo $online; ?></span></li>
                </ul>
            </div>
            <div class="unknow_bottom"></div>
        </div>
    </div>
    <div id="slider_right">    	
        <div id="customer">
            <div id="customer_title"><h4>Khách hàng tiêu biểu</h4></div>
            <div id="customer_content">
                <div id="customer_content_left"><a href="javascript:void(0)" id="btn1"><img src="<?php echo base_url(); ?>public/images/prev.png" alt="Prev" title="Prev" /></a></div>
                <div id="customer_content_mid">
                    <div id="slide-wrapper">
                        <div id="slide-body">
                            <?php
                            if(isset($customer) && $customer != NULL){
                                foreach($customer as $cusm){
                                    echo "<a href='javascript:void()'><img src='".base_url()."uploads/customer/thumb/$cusm[customer_image]' alt='$cusm[customer_name]' title='$cusm[customer_name]' /><span>".$cusm['customer_name']."</span></a>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div id="customer_content_right"><a href="javascript:void(0)" id="btn2"><img src="<?php echo base_url(); ?>public/images/next.png" alt="Next" title="Next" /></a></div>
          </div>
        </div>
    </div>
    <div class="cls"></div>
</div>