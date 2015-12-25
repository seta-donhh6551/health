	<script>
		$(document).ready(function(e) {
			$("input#login").click(function(){
				var u = $("#name").val();
				var p = $("#pass").val();
				$.ajax({
					"url" : "<?php echo base_url();?>vn/verify/login",
					"type" : "POST",
					"data" : "user="+u+"&pass="+p,
					"async" : false,
					beforeSend : function(){
						$("#load").html("Đang load dữ liệu...");
					},
					success : function(kq){
						if(kq == 1){
							$("#load").html("<font color='red'>Tài khoản không hợp lệ</font>");
						}else{
							window.location = "<?php echo base_url();?>";
						}
					}
				});
			});
		});
	</script>
	<div class="overlay"></div>
	<form class="login" action="javascript:void(0)">
		<div class="login-header">
			<span>Đăng nhập</span>
			<a href="#" class="close">x</a>
		</div>
        <div id="load"></div>
		<div class="login-content">
			<label for="name">Name:</label>
			<input type="text" value="Username" id="name" onfocus="clearText(this)" onblur="clearText(this)" class="name" />
			<label for="pass">Pass:</label>
			<input type="password" value="password" id="pass"  onfocus="clearText(this)" onblur="clearText(this)" class="pass" />
			<input type="submit" value="Log In" class="loginsubmit" id="login" />
		</div>
	</form>
	<!-- Begin header -->
    <div id="top">
	<div id="top_t">
    	<div class="login-bar">
        	<?php 
				if($this->session->userdata("ses_user")){
					echo "<span>Xin chào : ".$this->session->userdata("ses_user")."</span> | <a href='".base_url()."vn/verify/logout'>Thoát</a>";
				}else{
					echo "<a href='".base_url()."vn/user/register' class='reg-button'>Đăng ký</a> |
						<a href='#' class='login-button'>Đăng nhập</a>";
				}
			?>
		</div>
    	<div id="menu">
        	<div id="mn_l" class="ddsmoothmenu">
            	<ul>
	            	<li><a href="<?php echo base_url();?>"><span class="l"><span></span></span><span class="m"><em>Trang chủ</em><span></span></span><span class="r"><span></span></span></a></li>
	        		<li><a href="javascript:void(0)"><span class="l"><span></span></span><span class="m"><em>Giới thiệu</em><span></span></span><span class="r"><span></span></span></a>
                    <?php
						if(isset($menu)){
							if($menu != NULL){
								echo "<ul>";
								foreach($menu as $mn){
									echo "<li><a href='".base_url()."vn/gioi-thieu/$mn[g_id]-$mn[g_rewrite]'>$mn[g_name]</a></li>";
								}
								echo "</ul>";
							}else{
								echo "Không có dữ liệu";
							}
						}
					?>
                    </li>
	        		<li><a href="<?php echo base_url();?>vn/dich-vu"><span class="l"><span></span></span><span class="m"><em>Dịch vụ</em><span></span></span><span class="r"><span></span></span></a></li>
	        		<li><a href="javascript:void(0)"><span class="l"><span></span></span><span class="m"><em>Dự án</em><span></span></span><span class="r"><span></span></span></a>
	        		<?php
	        		if(isset($project) && $project != NULL){
	        			echo "<ul>";
	        			foreach($project as $proje){
	        				echo "<li><a href='".base_url()."vn/du-an/$proje[cate_id]-$proje[cate_rewrite]'>".$proje['cate_name']."</a></li>";
	        			}
	        			echo "</ul>";
	        			
	        		}else{
	        			echo "<li>Không có dữ liệu</li>";
	        		}
	        		?>
	        		</li>
	        		<li><a href="<?php echo base_url();?>vn/tin-tuc"><span class="l"><span></span></span><span class="m"><em>Tin tức</em><span></span></span><span class="r"><span></span></span></a>
                    </li>
	        		<li><a href="javascript:void(0)"><span class="l"><span></span></span><span class="m"><em>Tài liệu nội bộ</em><span></span></span><span class="r"><span></span></span></a>
                    <?php
						if(isset($doc)){
							if($doc != NULL){
								echo "<ul>";
								foreach($doc as $d){
									echo "<li><a href='".base_url()."vn/index/document/$d[type_id]'>$d[type_value]</a></li>";
								}
								echo "</ul>";
							}else{
								echo "Không có dữ liệu";
							}
						}
					?>
                    </li>
	                <li><a href="<?php echo base_url();?>vn/tuyen-dung"><span class="l"><span></span></span><span class="m"><em>Tuyển dụng</em><span></span></span><span class="r"><span></span></span></a></li>
	                <li><a href="<?php echo base_url();?>vn/lien-he"><span class="l"><span></span></span><span class="m"><em>Liên hệ</em><span></span></span><span class="r"><span></span></span></a></li>
        	   </ul>
            </div>
        	<div id="mn_r">
              	<a href="<?php echo base_url(); ?>" class="lang">Tiếng việt</a>
              	<a href="<?php echo base_url(); ?>en/index">English</a>
            </div>
        </div>
    </div>
	<div id="top_bot"></div>
</div>
    <!-- End of header -->