<?php $this->load->view("menu");?>
<div id="content">
    	<div id="content_left">
        	<?php $this->load->view("homes/support"); ?>
            <div id="content_left_menu">
            	<h2>CHUYÊN MỤC</h2>
            	<ul>
                <?php
				if(isset($listcate)){
					foreach($listcate as $cate){
						echo "<li><a href='".base_url().$cate['cate_rewrite']."-".$cate['cate_id'].".html' title='$cate[cate_name]'>".$cate['cate_name']."</a></li>";
					}
				}else{
					echo "<li>Không có dữ liệu</li>";
				}
				?>
                </ul>
            </div>
            <!-- student here -->
            <?php $this->load->view("homes/students"); ?>
            <!-- student here -->
            <div id="content_left_end">
            <?php $this->load->view("homes/review"); ?>
            </div>
        </div>
        <div id="content_mid">
        	<div id="content_mid_top"><a href="<?php echo base_url(); ?>">Trang chủ</a> &raquo; <a href="<?php echo base_url(); ?>viet-danh-gia.html">Viết đánh giá</a></div>
        	<div id="content_mid_bottom">
            	<div class="customer_title" style="line-height:18px;padding-bottom:25px;border-bottom:1px solid #DDD;">
                  Nếu bạn là học viên của <a href="<?php echo base_url(); ?>">PHPANDMYSQL.NET</a> đã từng tham gia <a href="http://phpandmysql.net/khoa-hoc.html">khóa học PHP</a> tại đây hoặc mới chỉ biết đến website, 
                  xin hãy cho chúng tôi những đánh giá tổng quan nhất về chất lượng đào tạo, thẩm mỹ giao diện website như thế nào hay góp ý bất cứ điều gì về website. 
                  Rất cảm ơn về bài đánh giá, góp ý của bạn.
                </div>
                <div class="customer_content" style="margin-top:20px">
	            	<fieldset style="padding:20px 40px;border:1px solid #DDD">
                        <legend style="color:#F60;font-weight:bold">Đánh giá của bạn</legend>
                        <?php
						if(isset($errors)){ echo "<div id='errors' style='color:#F06;margin-bottom::20px;border:1px dashed #F60;padding:5px 0px 5px 10px'>".$errors."</div>";}
						if(validation_errors() != NULL){
							echo "<div id='errors' style='color:#F06;margin-bottom::20px;border:1px dashed #F60;padding:5px 0px 5px 10px'>".validation_errors()."</div>";
						}
						?>
                        <form action="<?php echo base_url(); ?>viet-danh-gia.html" method="post" enctype="multipart/form-data" style="padding-top:20px">
                        <div class="form_items">
                            <div class="form_items_left"><label>Họ tên <span class="red">*</span></label></div>
                            <div class="form_items_right"><input type="text" id="name" name="name" value="<?php echo set_value('name'); ?>" size="25" /></div>
                        </div>
                        <div class="cls"></div>
                        <div class="form_items">
                            <div class="form_items_left"><label>Điện thoại<span class="red">*</span></label></div>
                             <div class="form_items_right"><input type="text" id="phone" name="phone" value="<?php echo set_value('phone'); ?>" size="25" /></div>
                        </div>
                        <div class="cls"></div>
                        <div class="form_items">
                            <div class="form_items_left"><label>Địa chỉ email<span class="red">*</span></label></div>
                             <div class="form_items_right"><input type="text" id="email" name="email" value="<?php echo set_value('email'); ?>" size="25" /></div>
                        </div>
                        <div class="cls"></div>
                        <div class="form_items">
                            <div class="form_items_left"><label>Avatar của bạn<!--span class="red">*</span--></label></div>
                             <div class="form_items_right"><input type="file" id="avatar" name="avatar" size="25" /></div>
                        </div>
                        <div class="cls"></div>
                        <div class="form_items">
                            <div class="form_items_left"><label>Đánh giá của bạn<span class="red">*</span></label></div>
                            <div class="form_items_right"><textarea cols="23"  id="info" rows="5" name="info"><?php echo set_value('info'); ?></textarea></div>
                        </div>
                        <div class="cls"></div>
                        <div class="form_items">
                            <div class="form_items_left"><label>Mã captcha</label></div>
                            <div class="form_items_right"><img src="<?php echo base_url(); ?>home/ran_image" alt="Captcha" title="Captcha" /></div>
                        </div>
                        <div class="cls"></div>
                        <div class="form_items">
                            <div class="form_items_left"><label>Nhập captcha<span class="red">*</span></label></div>
                            <div class="form_items_right"><input type="text" id="captcha" name="captcha" size="25" /></div>
                        </div>
                        <div class="cls"></div>
                        <div class="form_items">
                            <div class="form_items_left"><label>&nbsp;</label> </div>
                            <div class="form_items_right"><input type="submit" name="ok" id="ok" value="Đánh giá" class="subbs" style="margin:0px;" /><input type="reset" value="Xóa" class="subbs"/></div>
                        </div>
                    </form>
                </fieldset>
	            </div>
            </div>
        </div>
    	<div id="content_right">
          	<div id="news">
            	<div id="news_top">
                	<h2>BÀI VIẾT MỚI</h2>
                </div>
            	<div id="news_bot">
                <?php $this->load->view("homes/news");?>
                </div>
            </div>
          	<div id="posts">
            <?php $this->load->view("homes/new_post");?>
            </div>
        </div>
    </div>