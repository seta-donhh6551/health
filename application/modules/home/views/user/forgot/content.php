 <!-- Begin menu -->
    <div id="menu">
    	<div id="menu_left">
        	<ul>
        		<li><a href="<?php echo base_url();?>">Trang chủ</a></li>
                <li><a href="<?php echo base_url();?>default/index/gt">Giới thiệu</a></li>
   				<?php
				if($menu != NULL){
					foreach($menu as $item){
						echo "<ul>";
						echo "<li><a href='".base_url()."default/index/news/$item[cate_id]'>".$item['cate_news']."</a></li>";
						echo "</ul>";
					}
				}else{
					echo "<ul>";
					echo "<li>Không có dữ liệu</li>";
					echo "</ul>";
				}
				?>
                <li><a href="javascript:void(0)">Cấu hình</a></li>
        		<li><a href="javascript:void(0)">Liên hệ</a></li>
        	</ul>
        </div>
    	<div id="menu_right">
        	<span id="clock"></span>
        </div>
    </div>
    <!-- End of menu -->
    <!-- Bedin slideshow -->
    <div id="slideshow">
    	<div id="slider">
        	<a href="#"><img src="<?php echo base_url();?>public/images/slideshow/1.jpg" alt="01" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit." /></a>
            <a href="#"><img src="<?php echo base_url();?>public/images/slideshow/2.jpg" alt="02" title="Nullam ante leo, consectetur eget adipiscing." /></a>
            <a href="#"><img src="<?php echo base_url();?>public/images/slideshow/3.jpg" alt="03" title="Suspendisse sit amet enim elit. Curabitur tempor consequat." /></a>
            <a href="#"><img src="<?php echo base_url();?>public/images/slideshow/4.jpg" alt="04" title="Nulla faucibus luctus quam eget placerat." /></a>
        </div>
    </div>  
    <div id="slideshow_bottom"></div>
<!-- End of slideshow -->
    <!-- Begin content -->
    <div id="content">
    	<div id="content_left">
        	<div class="member">
            	<div class="member_top">
                	<h4 class="title">Thành viên</h4>
                </div>
            	<div class="member_mid">
                	<script>
						$(document).ready(function(){
							$("#ok").click(function(){
								u = $("#user").val();
								p = $("#pass").val();
								$.ajax({
									"url" : "<?php echo base_url();?>default/verify/login",
									"type" : "POST",
									"data" : "user="+u+"&pass="+p,
									"async" : false,
									beforeSend : function(){
										$("#login").html("Đang load dữ liệu...");
									},
									success : function(kq){
										if(kq == 1){
											$("#login").html("<font color='red'>Tài khoản không hợp lệ</font>");
										}else{
											$("#login").html(kq);
											$("#form").hide();
										}
									}
								});
								return false;
							});
						});
					</script>
                    <div id="login" style="padding-left:30px; "></div>
                 <?php
						if($this->session->userdata("ses_user")){
							echo "<ul id='jquery'>";
							echo "<li><a href='javascript:void(0)'>Xin chào :</a><font color='#FF0000'>"." ".$this->session->userdata['ses_user']."</font></li>";
							echo "<li><a href='javascript:void(0)'>Giỏ hàng : VND</a></li>";
							echo "<li><a href='javascript:void(0)'>Thông tin của bạn</a></li>";
							echo "<li><a href='javascript:void(0)'>Đổi mật khẩu</a></li>";
							echo "<li><a href='".base_url()."default/verify/logout'>Thoát</a></li>";
							echo "</ul>";
						}else{
		                  	echo"<div id='form'>";
				            echo"<form method='post'>";
				            echo"<label>Tài khoản</label><input id='user' type='text' size='15' /><br />";
				            echo"<label>Mật khẩu</label><input id='pass' type='password' size='15' /><br />";
				            echo"<label>&nbsp;</label><input name='ok' type='submit' value='Đăng nhập' class='hic' id='ok' />";
				            echo"</form>";
				            echo"<ul id='member'>";
				            echo"<li><a href='".base_url()."default/user/register'>::  Đăng ký</a></li>";
				            echo"<li><a href='".base_url()."default/user/forgot'>::  Quên mật khẩu</a></li>";
				            echo"</ul>";
		                   	echo"</div>";
						}
					?>  
                </div>
            	<div class="member_bottom"></div>
            </div>
        	<div class="left">
            	<div class="left_top">
                	<h4 class="title">Hỗ trợ trực tuyến</h4>
                </div>
            	<div class="left_mid">
               	<?php
				if($support != NULL){
					foreach($support as $sup){
						echo "<ul>";
						echo "<li><label class='sup'>".$sup['sup_name']."</label><a href='ymsgr:sendim?".$sup['sup_yahoo']."'><img border='0' src='http://opi.yahoo.com/online?u=".$sup['sup_yahoo']."&m=g&t=2&l=us'></a></li>";
						echo "</ul>";
					}
				}else{
					echo "<ul>";
					echo "<li>Không có dữ liệu</li>";
					echo "</ul>";
				}
				?>
                </div>
            	<div class="left_bottom"></div>
            </div>
            <div class="left">
            	<div class="left_top">
                	<h4 class="title">Tìm kiếm sản phẩm</h4>
                </div>
            	<div class="left_mid">
                <!-- <script>
				$(document).ready(function(){
					$("#loai").change(function(){
						id = $(this).attr("value");
						$.ajax({
							"url" : "<?php echo base_url();?>default/search/ajax",
							"type" : "get",
							"data" : "id="+id,
							"async" : false,
							success : function(kq){
								$("#ajax").html(kq);
							}
						});
					});
				});
				</script>
                <! -->
                <script type="text/javascript">
				 	function check(){
						if(document.sear.name.value ==""){
							alert("Bạn chưa nhập từ khóa!");
							document.sear.name.focus();
							return false;
						}else{
							return true;
						}
					}
				 </script>
               	  <form action="<?php echo base_url();?>default/search" method="post" name="sear" onsubmit="return check()">
               	    <label>Từ khóa</label><input name="name" type="text" /> <br />
                    <label>Theo loại</label>
						<select name="loai">
                        	<option value="0">-- Chọn loại --</option>
                            <?php
							foreach($catenews as $cat){
								echo "<option value='$cat[cate_id]'>".$cat['cate_name']."</option>";
							}
							?>
                        </select><br />
                    <label>Giá từ</label>
						<select name="gia1">
                        	<option value="0">-- Chọn giá --</option>
                            <?php 
							 for($i=1;$i<=15;$i++){
								 echo "<option value='".$i."000000'>".$i." triệu</option>";
							 }
							?>
                        </select><br />
                    <label>Đến giá</label>
						<select name="gia2">
                        	<option value="0">-- Chọn giá --</option>
                            <?php 
							 for($i=5;$i<=30;$i++){
								 echo "<option value='".$i."000000'>".$i." triệu</option>";
							 }
							?>
                        </select><br />
                    <label>&nbsp;</label><input name="ok" type="submit" value="Tìm kiếm" class="hic"/>
                    </form>
               	</div>
                <div class="left_bottom"></div>
            <div class="left">
            	<div class="left_top">
                	<h4 class="title">Thống kê</h4>
                </div>
            	<div class="left_mid">
            		<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
					  <tr>
					    <td width="22" align="left">&nbsp;</td>
					    <td width="132" height="18">Số lần truy cập</td>
					    <td width="46"><?php echo $access;?></td>
					  </tr>
					  <tr>
					    <td align="left">&nbsp;</td>
					    <td height="18">Số người online</td>
					    <td><?php echo $online;?></td>
					  </tr>
					  <tr>
					    <td align="left">&nbsp;</td>
					    <td height="18">Số thành viên</td>
					    <td>50</td>
					  </tr>
					  <tr>
					    <td align="left">&nbsp;</td>
					    <td height="18">Số sản phẩm</td>
					    <td>100</td>
				      </tr>
					</table>
</div>
            	<div class="left_bottom"></div>
            </div>
        </div>
    </div>
    <div id="content_right">
        	<div class="menu">
            	<div class="menu_top"></div>
                <div class="menu_mid_gt">
                 	<h4><a href="<?php echo base_url();?>">Trang chủ</a> &raquo; <a href="<?php echo base_url();?>default/user/forgot">Quên mật khẩu</a></h4>
               <div id="loi" style="padding:10px 0px 5px 0px; text-align:center"><?php echo validation_errors(); ?>
               <?php if(isset($error)){ echo "<p>$error</p>";}?>
               </div>
               <div class="register">
                    	<fieldset>
                        	<legend>Quên mật khẩu</legend>
                            <form action="<?php echo base_url();?>default/user/forgot" method="post" name="sac" onsubmit="return checkuser()">
                                <label>Nhập email của bạn </label><input type="text" name="email" size="25" /><br />
                              <label>Mã xác nhận</label><img src="<?php echo base_url()."default/ran_image"; ?>"/><br />
                                <label>Nhập mã xác nhận</label><input type="text" name="captcha" size="7" /><br />
                                <label>&nbsp;</label><input type="submit" name="ok" value="Gửi" class="reg"/>
                            </form>
                        </fieldset>
						 	
                    </div>
                </div>
            	<div class="menu_bottom"></div>
            </div>
    </div>
    </div>
    <!-- End of content -->
    <!-- Begin products -->
    <div id="products">
        <div class="products">
        	<div class="products_to">
            	<a href="<?php echo base_url();?>">Trang chủ</a>|
                <a href="<?php echo base_url();?>default/index/gt">Giới thiệu</a>|
                <a href="<?php echo base_url();?>default/index/news/1">Tin tức</a>|
                <a href="<?php echo base_url();?>default/index/news/2">Khuyến mại</a> |
                <a href="<?php echo base_url();?>default/index/news/3">Tuyển dụng</a> |
                <a href="<?php echo base_url();?>default/index/contact">Liện hệ</a> 
            </div>
        	<div class="products_middd">
              	<div class="footer">
                	<h3>Công ty TNHH Thương mại và Công nghệ Thành Phát</h3>
                    <h5>Địa chỉ : 157 Hai Bà Trưng - Hùng Vương - Phúc Yên - Vĩnh Phúc</h5>
                    <h5>Website : Maytinhthanhphat.com </h5>
                    <h5>Điện thoại : 0211.6268.373 </h5>
                    <h5>Di động : 0904533466 - 0977331662 </h5>
                    <h5>Email   : maytinhthanhphat@gmail.com</h5>                                                            
                </div>
            </div>
        	<div class="products_bot"></div>
        </div>
    </div>
    <!-- End of products -->