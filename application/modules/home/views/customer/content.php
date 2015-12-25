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
        	<div id="content_mid_top"><a href="<?php echo base_url(); ?>">Trang chủ</a> &raquo; <a href="<?php echo base_url(); ?>danh-gia-cua-hoc-vien.html">Đánh giá của học viên</a></div>
        	<div id="content_mid_bottom">
            	<div class="customer_title">
                	<div><h3 style="color:#F60">Ý kiến của học viên về PHPANDMYSQL.NET</h3></div>
                    <div style="margin:7px 0px;">Dưới đây là một số đánh giá của các bạn học viên đã từng tham gia <a href="http://phpandmysql.net/khoa-hoc.html">khóa học lập trình PHP</a> tại phpandmysql.net, về chất lượng đào tạo cũng như con người của chúng
                    tôi như thế nào. Các bạn có thể contact trực tiếp với các bạn để biết thêm nhé.</div>
                </div>
                <div class="customer_content">
	            <?php
					if(isset($listall) && $listall != NULL){	
						foreach($listall as $items){
					?>
	                	<div class="customer_items">
	                    	<div class="customer_items_left">
                            	<?php
								if($items['student_avatar'] != NULL){
								?>
	                        	<img src="<?php echo base_url()."uploads/students/thumb/$items[student_avatar]"; ?>" alt="<?php echo $items['student_name']; ?>" title="<?php echo $items['student_name']; ?>" width="100" />
                                <?php
								}else{
								?>
                                <img src="<?php echo base_url()."uploads/students/thumb/noavatar.png"; ?>" alt="<?php echo $items['student_name']; ?>" title="<?php echo $items['student_name']; ?>" width="100" height="130" />
                                <?php
								}
								?>
	                        </div>
	                        <div class="customer_items_right">
                            	<div style="margin-bottom:20px">
                                	<h3><a href=""><?php echo $items['student_name']; ?></a></h3>
                                </div>
                                <div style="padding-left:30px"><?php echo $items['student_info']; ?></div>
	                            <div class="customer_items_right_items">
	                            	<h3>Phone : <?php echo $items['student_phone']." - ".$items['student_email']; ?></h3>
                                    <h3 style="font-size:12px">Facebook    :   <a href="<?php echo $items['student_face']; ?>" target="_blank" title="Chat với <?php echo $items['student_name']; ?>" style="font-size:11px;color:#900">Xem</a></h3>
	                            </div>
	                        </div>
	                        <div class="cls"></div>
	                    </div>
	            <?php } } ?>
	            </div>
	            <div style="margin:10px 0px 30px 0px;border-bottom:1px solid #DDD;"></div>
                <div id="pagination"><?php echo $this->pagination->create_links(); ?></div>
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