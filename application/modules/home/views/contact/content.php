<?php $this->load->view("menu");?>
<div id="content">
    	<div id="content_left">
        	<?php $this->load->view("homes/study"); ?>
            <div id="content_left_menu">
            	<h2>CHUYÊN MỤC PHP</h2>
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
            	<a href="<?php echo base_url(); ?>">Trang chủ</a> &raquo; <a href="<?php echo base_url(); ?>lien-he.html">Liên hệ</a>
            </div>
        	<div id="content_mid_bottom" style="line-height:18px;">
            <div class="contact_title"><?php echo $contact['contact_value']; ?></div>
            <div class="contact">
            <script type="text/javascript" src="<?php echo base_url();?>public/scripts/jquery-1.7.1.min.js"></script>
            <script type="text/javascript">
				$(document).ready(function(){
					$("#ok").click(function(){
						n = $("#name").val();
						e = $("#email").val();
						p = $("#phone").val();
						noi = $("#info").val();
						$.ajax({
							"url" : "<?php echo base_url(); ?>home/contact/ajax",
							"type" : "post",
							"data" : "name="+n+"&email="+e+"&phone="+p+"&noi="+noi,
							beforeSend: function() {
								$("#view").show();
						        $("#view").html("Đang load dữ liệu ...");
						    },
							success : function(kq){
								if(kq == 1){
									$("#view").show();
									$("#view").html("Vui lòng nhập đầy đủ thông tin");
								}else{
									$("#view").show();
									$("#view").html(kq);
									$("#name").val("");
									$("#email").val("");
									$("#phone").val("");
									$("#info").val("");
								}
							},
						});
					return false;
				});
			});
			</script>
                        <div style="padding:10px;"></div>
            			<fieldset>
                            <legend>Nội dung liên hệ</legend>
                            <div id="view" style="display:none;font-size:11px;background:#F8F8F8;padding:3px 10px;color:#F00;width:400px; margin:10px auto 0px auto;"></div>
                            <form>
                            <div class="form_items">
                            	<div class="form_items_left"><label>Họ tên <span class="red">*</span></label></div>
                                <div class="form_items_right"><input type="text" id="name" size="25" /></div>
                            </div>
                            <div class="cls"></div>
                            <div class="form_items">
                              	<div class="form_items_left"><label>Email<span class="red">*</span></label></div>
                                 <div class="form_items_right"><input type="text" id="email" size="25" /></div>
                            </div>
                            <div class="cls"></div>
                            <div class="form_items">
                            	<div class="form_items_left"><label>Điện thoại<span class="red">*</span></label></div>
                            	 <div class="form_items_right"><input type="text" id="phone" size="25" /></div>
                            </div>
                            <div class="cls"></div>
                            <div class="form_items">
                            	<div class="form_items_left"><label>Nội dung<span class="red">*</span></label></div>
                                <div class="form_items_right"><textarea cols="23"  id="info" rows="5" name="info"></textarea></div>
                            </div>
                            <div class="cls"></div>
                            <div class="form_items">
                            	<div class="form_items_left"><label>&nbsp;</label> </div>
                            	<div class="form_items_right"><input type="submit" name="ok" id="ok" value="Gửi liên hệ" class="subbs" style="margin:0px;" /><input type="reset" value="Xóa" class="subbs"/></div>
                            </div>
                        </form>
                        </fieldset>
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