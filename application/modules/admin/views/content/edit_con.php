				<div class="section">
                	<script type="text/javascript">
					function checkuser(){
						var form = document.sac;
						if(form.con_title.value == ""){
							alert("Vui lòng nhập tiêu đề tin");
							form.con_title.focus();
							return false;
						}
						if(form.con_author.value == ""){
							alert("Vui lòng nhập tác giả");
							form.con_author.focus();
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
								<h2 class="menu_title">Sửa tin tức</h2>
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
									<form action="<?php echo base_url()."admin/content/update/".$get['con_id'];?>" method="post" name="sac" onsubmit="return checkuser()" enctype="multipart/form-data">
                            		<div class="form_items">
                                    	<div class="form_items_left">Tiêu đề tin</div>
                                        <div class="form_items_right"><input name="con_title" type="text" id="con_title" value="<?php echo $get['con_title']; ?>" size="35" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Tác giả</div>
                                        <div class="form_items_right"><input name="con_author" type="text" id="con_author" value="<?php echo $get['con_author']; ?>" size="35" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Keywords</div>
                                        <div class="form_items_right">
                                        <textarea name="con_keys" id="" cols="30" rows="5"><?php echo $get['con_keys']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Description</div>
                                        <div class="form_items_right">
                                        <textarea name="con_des" id="" cols="30" rows="5"><?php echo $get['con_des']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Mô tả tin</div>
                                        <div class="form_items_right">
                                        <?php 
										$fck = new FCKeditor('con_info');
										$fck->BasePath = sBASEPATH;
								        $fck->Value  = $get['con_info'];					
										$fck->Width  = '100%';
										$fck->Height = 400;
										$fck->Create();
									   ?>
                                        </div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Nội dung chi tiết</div>
                                        <div class="form_items_right">
                                        <?php 
										$fck = new FCKeditor('con_full');
										$fck->BasePath = sBASEPATH;
								        $fck->Value  = $get['con_full'];					
										$fck->Width  = '100%';
										$fck->Height = 400;
										$fck->Create();
									   ?>
                                        </div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Hình ảnh</div>
                                        <div class="form_items_right">
                                        <?php if($get['con_image'] != NULL){ echo "<img src='".base_url()."uploads/news/$get[con_image]' width='100' />";}?>
                                        <input type="file" name="img" size="25" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">&nbsp;</div>
                                        <div class="form_items_right">
                                        	<input type="submit" name="ok" value="Edit News" class="magin"/>
                                            <input type="reset" name="Reset" id="button" value="Nhập Lại" class="magin"/>
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