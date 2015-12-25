<?php $this->load->view("menu");?>
<div id="content">
    	<div id="content_left">
        	<?php $this->load->view("homes/study"); ?>
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
        	<div id="content_mid_top">
            	<a href="<?php echo base_url(); ?>" title="Trang chủ">Trang chủ</a> &raquo; <a href="<?php echo base_url(); ?>lich-hoc.html" title="Lịch học">Lịch học</a>
            </div>
        	<div id="content_mid_bottom" style="line-height:18px;">
              	<div class="h1_title"><h1>LỊCH CÁC KHÓA HỌC TẠI PHPANDMYSQL.NET</h1></div>
                <div class="" style="padding:5px 0px">Dưới đây là lịch học của các lớp đang có tại PHPANDMYSQL.NET. Các khoá học được tổ chức trong một thời gian tương đối dài, một khóa học thời gian ngắn nhất vào khoảng 2 tháng. Với mong muốn đưa chất lượng đào tào lên hàng đầu chúng tôi</div>
                <div>
                <?php if(isset($times)){ foreach($times as $sub){ ?>
                    <div class="subs">
                        <img src="<?php //echo base_url()."uploads/news/thumb/".$sub['education_image	']; ?>" width="80" align="left" alt="" />
                        <h3><a href="<?php echo base_url()."lich-hoc/".$sub['education_rewrite']; ?>.html" title="<?php echo $sub['education_title']; ?>"><?php echo $sub['education_title']; ?></a></h3>
                    </div>
                <?php } } ?>
                <div class="cls"></div>
                </div>
            </div>
        </div>
    	<div id="content_right">
          	<div id="news">
           	<?php $this->load->view("homes/subjects"); ?>
            </div>
          	<div id="posts">
            	<div class="related_title">
                	<h2>HỌC PHP TẠI HÀ NỘI</h2>
                </div>
                <div class="related_content">
                	<?php $this->load->view("new_post"); ?>
                </div>
            </div>
        </div>
    </div>