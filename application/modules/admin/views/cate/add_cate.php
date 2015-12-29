				<div class="section">
                 <script type="text/javascript">
					function check(){
						if(document.sac.cate_name.value == ""){
							alert("Vui lòng nhập tên chuyên mục!");
							document.sac.cate_name.focus();
							return false;
						}
						if(isNaN(document.sac.cate_order.value)){
							alert("Thứ tự chỉ được phép chữ số!");
							document.sac.cate_order.focus();
							return false;
						}else{
							return true;
						}
					}
				</script>
					<!--[if !IE]>start title wrapper<![endif]-->
					<div class="title_wrapper">
						<span class="title_wrapper_top"></span>
						<div class="title_wrapper_inner">
							<span class="title_wrapper_middle"></span>
							<div class="title_wrapper_content">
								<h2 class="menu_title">Thêm mới chuyên mục</h2>
							</div>
						</div>
						<span class="title_wrapper_bottom"></span>
					</div>
					<!--[if !IE]>end title wrapper<![endif]-->

					<!--[if !IE]>start section content<![endif]-->
					<div class="section_content">
						<span class="section_content_top"></span>

						<div class="section_content_inner minheight">
                        	<div class="table_tabs_menu">
							<!--[if !IE]>start  tabs<![endif]-->
							<!--[if !IE]>end  tabs<![endif]-->

							</div>
				<!--[if !IE]>start table_wrapper<![endif]-->
							<div class="table_wrapper" style="background:none;">
								<div class="table_wrapper_inner">
                                	<div class="error_red"><?php if(isset($error)) { echo "<p>".$error."</p>"; } ?></div>
                                    <form action="<?php echo base_url()?>admin/cate/add" method="post" name="sac" onsubmit="return check()" enctype="multipart/form-data">
                                    	 <div class="form_items">
                                    		<div class="form_items_left">Tên chuyên mục</div>
                                        	<div class="form_items_right"><input type="text" name="cate_name" size="35" /></div>
                                   		 </div>
										 <div class="form_items">
                                    		<div class="form_items_left">Title for seo</div>
                                        	<div class="form_items_right"><input name="cate_title" type="text" size="35"></div>
                                   		 </div>
                                         <div class="form_items">
                                    		<div class="form_items_left">Thứ tự</div>
                                        	<div class="form_items_right"><input name="cate_order" type="text" size="35"></div>
                                   		 </div>
										<div class="form_items">
                                    		<div class="form_items_left">Mô tả ngắn</div>
                                        	<div class="form_items_right">
												<textarea name="cate_info" cols="28" rows="5"></textarea>
											</div>
                                   		 </div>
                                         <div class="form_items">
                                    		<div class="form_items_left">SEO keywords</div>
                                        	<div class="form_items_right"><textarea name="cate_keys" cols="28" rows="5"></textarea></div>
                                   		 </div>
                                         <div class="form_items">
                                    		<div class="form_items_left">SEO Description</div>
                                        	<div class="form_items_right"><textarea name="cate_description" cols="28" rows="5"></textarea></div>
                                   		 </div>
                                         <div class="form_items">
                                    		<div class="form_items_left">Mô tả</div>
                                        	<div class="form_items_right">
                                            <?php
											$fck = new FCKeditor('cate_ext');
											$fck->BasePath = sBASEPATH;
											//$fck->Value  = $list['cate_ext'];
											$fck->Width  = '100%';
											$fck->Height = 400;
											$fck->Create();
										   ?>
                                            </div>
                                   		 </div>
                                         <div class="form_items">
                                    		<div class="form_items_left">Hình ảnh</div>
                                        	<div class="form_items_right"><input name="images" type="file" id="img" size="35" /></div>
                                   		 </div>
                                         <div class="form_items">
                                    		<div class="form_items_left">&nbsp;</div>
                                        	<div class="form_items_right"><input type="submit" name="ok" value="Add Cate" class="magin"/></div>
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