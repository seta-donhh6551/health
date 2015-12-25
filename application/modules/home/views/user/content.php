<div id="wapper">
	<div id="left">
        <div class="title">
        	<a href="<?php echo base_url();?>">Trang chủ</a>  &raquo; <a href="<?php echo base_url();?>vn/user/register">Đăng ký thành viên</a>
        </div>
        			<script type="text/javascript">
							function checkuser(){
								var form = document.sac;
								if(form.user.value == ""){
									alert("Vui lòng nhập Tên tài khoản");
									form.user.focus();
									return false;
								}
								if(form.user.value.length < 4){
									alert("Tên tài khoản quá ngắn");
									form.user.focus();
									return false;
								}
								if(form.pass.value == ""){
									alert("Vui lòng nhập Mật khẩu");
									form.pass.focus();
									return false;
								}
								if(form.pass.value.length < 5){
									alert("Mật khẩu quá ngắn");
									form.pass.focus();
									return false;
								}
								if(form.repass.value == ""){
									alert("Vui lòng nhập lại mật khẩu");
									form.repass.focus();
									return false;
								}
								if(form.pass.value != form.repass.value){
									alert("Nhập lại mẩu khẩu chưa đúng");
									form.pass.focus();
									return false;
								}
								if(form.email.value == ""){
									alert("Vui lòng nhập Email");
									form.email.focus();
									return false;
								}
								if(form.email.value.indexOf('@') == -1){
									alert("Email không đúng định dạng");
									form.email.focus();
									return false;
								}
								if(form.email.value.indexOf('@') == 0){
									alert("Trước @ phải có dữ liệu");
									form.email.focus();
									return false;
								}
								if(form.email.value.indexOf('@') == form.email.value.length -1  ){
									alert("Sau @ phải có dữ liệu");
									form.email.focus();
									return false;
								}
								if(form.email.value.indexOf('.',form.email.value.indexOf('@')) == -1){
									alert("Sau @ phải có dấu chấm");
									form.email.focus();
									return false;
								}
								if(form.email.value.indexOf('.') - form.email.value.indexOf('@') == 1){
									alert("Giữa  @ và dấu châm phải có dữ liệu");
									form.email.focus();
									return false;
								}
								if(form.captcha.value == ""){
									alert("Vui lòng nhập Mã xác nhận");
									form.captcha.focus();
									return false;
								}else{
									return true;
								}
							}
						</script>
        <div class="register">
        			<div id="loi"><?php echo validation_errors(); ?>
               		    <?php if(isset($error)){ echo "<p>$error</p>";}?>
               		</div>
        				<fieldset>
                        	<legend>Đăng ký thành viên</legend>
                            <form action="<?php echo base_url();?>vn/user/register" method="post" name="sac" onsubmit="return checkuser()">
                            	<label>Tên tài khoản<span class="red">*</span></label><input type="text" name="user" size="25" /><br />
                                <label>Mật khẩu<span class="red">*</span></label><input type="password" name="pass" size="25" /><br />
                                <label>Nhập lại mật khẩu<span class="red">*</span></label><input type="password" name="repass" size="25" /><br />
                                <label>Họ tên<span class="red">*</span></label><input type="text" name="name" size="25" /><br />
                                <label>Giới tính</label>
                                <select name="gender">
                                    <option value="1">Nam</option>
                                    <option value="0">Nữ</option>
                                </select>
                                <br />
                                <label>Địa chỉ</label><input type="text" name="adress" size="25" /><br />
                                <label>Số điện thoại</label><input type="text" name="phone" size="25" /><br />
                                <label>Email<span class="red">*</span></label><input type="text" name="email" size="25" /><br />
                              <label>Mã xác nhận</label><img src="<?php echo base_url()."vn/ran_image"; ?>"/><br />
                                <label>Nhập mã xác nhận<span class="red">*</span></label><input type="text" name="captcha" size="25" /><br />
                                <label>&nbsp;</label><input type="submit" name="ok" value="Register" class="reg"/>
                            </form>
                        </fieldset>
        </div>
	</div>
	<div id="right">
    	<div id="news">
        	<script>
			$(document).ready(function() {
				var showChar = 27;
				var ellipsestext = "...";
				var moretext = "more";
				var lesstext = "less";
				$('a.mo').each(function() {
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
        	<h3>NEWS</h3>
            <?php
			if(isset($listnews) && $listnews != NULL){
				echo "<ul>";
				foreach($listnews as $list){
					echo "<li><a href='".base_url()."vn/news/index/$list[news_id]' class='mo' alt='$list[news_title]' title='$list[news_title]'>$list[news_title]</a></li>";
				}
				echo "</ul>";
			}else{
				echo "Không có dữ liệu";
			}
			?>
            <a href="<?php echo base_url();?>vn/tin-tuc" class="more">Xem tất cả</a>
        </div>
		<div id="doitac">
        	<h3>ĐỐI TÁC</h3>
            <div><a href="http://www.samsung.com/vn" target="_blank"><img src="<?php echo base_url();?>public/images/samsung.jpg" width="89" height="62" /></a><a href="http://honda.com.vn/" target="_blank"><img src="<?php echo base_url();?>public/images/honda.jpg" width="136" height="62" class="mg_l" /></a></div>
	        <div><img src="<?php echo base_url();?>public/images/opt.jpg" width="131" height="75" /><a href="http://yamaha-motor.com.vn/" target="_blank"><img src="<?php echo base_url();?>public/images/yamaha.jpg" width="94" height="75" class="mg_l" /></a></div>
      		<div><img src="<?php echo base_url();?>public/images/ls.jpg" width="97" height="65" /><img src="<?php echo base_url();?>public/images/obay.jpg" width="53" height="65" class="mg_l" /><a href="http://www.canon.com.vn/" target="_blank"><img src="<?php echo base_url();?>public/images/canon.jpg" width="72" height="65" class="mg_l" /></a></div>
	  </div>
        <div id="video">
        	<h3>VIDEO</h3>
            <div>
            	<iframe width="230" height="200" src="http://www.youtube.com/embed/hUAnCoGnW18" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <div id="status" style="width:230px;height:50px;margin-top:30px;">
        	<!-- Histats.com  START  (standard)-->
<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27  type=%27text/javascript%27%3E%3C/script%3E"));</script><script src="http://s10.histats.com/js15.js" type="text/javascript"></script>
<a href="http://www.histats.com" target="_blank" title="best tracker"><script type="text/javascript">
try {Histats.start(1,1170183,4,242,241,20,"00001001");
Histats.track_hits();} catch(err){};
</script>
</a>
<noscript>&lt;a href="http://www.histats.com" target="_blank"&gt;&lt;img  src="http://sstatic1.histats.com/0.gif?1170183&amp;101" alt="best tracker" border="0"&gt;&lt;/a&gt;</noscript>
<!-- Histats.com  END  -->
    	</div>
    </div>
	<div class="cls"></div>
	</div>