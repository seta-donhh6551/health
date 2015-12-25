				<div class="section">
                <script type="text/javascript">
					function checkpro(){
						var form = document.sac;
						if(form.customer_name.value == ""){
							alert("Vui lòng nhập tên khách hàng");
							form.customer_name.focus();
							return false;
						}
						if(isNaN(form.customer_order.value)){
							alert("Thứ tự phải là chữ số");
							form.customer_order.focus();
							return false;
						}	}
				</script>
					<!--[if !IE]>start title wrapper<![endif]-->
					<div class="title_wrapper">
						<span class="title_wrapper_top"></span>
						<div class="title_wrapper_inner">
							<span class="title_wrapper_middle"></span>
							<div class="title_wrapper_content">
								<h2 class="menu_title">Thêm mới khách hàng</h2>
							</div>
						</div>
						<span class="title_wrapper_bottom"></span>
					</div>
					<!--[if !IE]>end title wrapper<![endif]-->
					
					<!--[if !IE]>start section content<![endif]-->
					<div class="section_content">
						<span class="section_content_top"></span>
						<div class="section_content_inner">
                        	<div class="table_tabs_menu">
							<!--[if !IE]>start  tabs<![endif]-->
							<!--[if !IE]>end  tabs<![endif]-->

							</div>
				<!--[if !IE]>start table_wrapper<![endif]-->
							<div class="table_wrapper" style="background:none;">
								<div class="table_wrapper_inner">
                                	<div class="error_red"><?php if(isset($error)) { echo "<p>".$error."</p>"; } ?>
										<?php echo validation_errors();?>
									</div>
									<form action="<?php echo base_url();?>admin/customer/update/<?php echo $info['customer_id'] ?>" method="post" name="sac" onsubmit="return checkpro()" enctype="multipart/form-data">
                            		<div class="form_items">
                                    	<div class="form_items_left">Tên công ty</div>
                                        <div class="form_items_right"><input name="customer_name" type="text" size="30" value="<?php echo $info['customer_name'] ?>" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Tên khách hàng</div>
                                        <div class="form_items_right"><input name="customer_user" type="text" size="30" value="<?php echo $info['customer_user'] ?>" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Loại khách hàng</div>
                                        <div class="form_items_right">
                                        <select name="cate_id">
                                        <?php
										foreach($listcate as $list){
											echo "<option value='".$list['cate_id']."'";
											if($list['cate_id'] == $stt){ echo "selected='selected'";}
											echo ">".$list['cate_name']."</option>";
										}
										?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Điạ chỉ</div>
                                        <div class="form_items_right"><input name="customer_address" type="text" size="30" value="<?php echo $info['customer_address'] ?>" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Website url</div>
                                        <div class="form_items_right"><input name="customer_url" type="text" size="30" value="<?php echo $info['customer_url'] ?>" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Thứ tự hiển thị</div>
                                        <div class="form_items_right"><input name="customer_order" type="text" size="30" value="<?php echo $info['customer_order'] ?>" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Ý kiến khách hàng</div>
                                        <div class="form_items_right">                                        
										<?php 
										$fck = new FCKeditor('customer_info');
										$fck->BasePath = sBASEPATH;
										$fck->Value  = $info['customer_info'];
										$fck->Width  = '100%';
										$fck->Height = 400;
										$fck->Create();
									   ?>                                     
                                        </div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Logo công ty</div>
                                        <div class="form_items_right">
                                        <?php
										if($info['customer_image'] != NULL){
											echo "<img src='".base_url()."uploads/customer/thumb/$info[customer_image]' width='110' />";
										}
										?>
                                        <input type="file" name="img" size="30" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Avatar khách hàng</div>
                                        <div class="form_items_right">
                                        <?php
										if($info['customer_avatar'] != NULL){
											echo "<img src='".base_url()."uploads/customer/thumb/$info[customer_avatar]' width='110' />";
										}
										?>
                                        <input type="file" name="avatar" size="30" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Hình ảnh website</div>
                                        <div class="form_items_right">
                                        <?php
										if($info['customer_website'] != NULL){
											echo "<img src='".base_url()."uploads/customer/thumb/$info[customer_website]' width='110' />";
										}
										?>
                                        <input type="file" name="website" size="30" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">&nbsp;</div>
                                        <div class="form_items_right">
                                        <input type="submit" name="ok" value="Edit Customer" class="magin"/>
                                        </div>
                                    </div>
                                </form>
								</div>
							</div>
							<!--[if !IE]>end table_wrapper<![endif]-->
						</div>
						<span class="section_content_bottom"></span>
					</div>
					<!--[if !IE]>end section content<![endif]-->
				</div>