				<div class="section">
                	<script type="text/javascript">
					function checkuser(){
						var form = document.sac;
						if(form.subject_title.value == ""){
							alert("Vui lòng nhập tiêu đề");
							form.subject_title.focus();
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
								<h2 class="menu_title">Khoá học</h2>
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
									<form action="<?php echo base_url()."admin/subjects/update/".$getdata['subject_id'];?>" method="post" name="sac" onsubmit="return checkuser()" enctype="multipart/form-data">
                            		<div class="form_items">
                                    	<div class="form_items_left">Tên khoá</div>
                                        <div class="form_items_right"><input name="subject_title" type="text" id="subject_title" value="<?php echo $getdata['subject_title']; ?>" size="35" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Thứ tự</div>
                                        <div class="form_items_right">
                                        <input name="subject_order" type="text" id="subject_order" value="<?php echo $getdata['subject_order']; ?>" size="35" />
                                        </div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Keywords</div>
                                        <div class="form_items_right">
                                        <textarea name="subject_keys" id="" cols="30" rows="4"><?php echo $getdata['subject_keys']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Description</div>
                                        <div class="form_items_right">
                                        <textarea name="subject_des" id="" cols="30" rows="4"><?php echo $getdata['subject_des']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Mô tả</div>
                                        <div class="form_items_right">
                                        <?php 
										$fck = new FCKeditor('subject_info');
										$fck->BasePath = sBASEPATH;
								        $fck->Value  = $getdata['subject_info'];					
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
										$fck = new FCKeditor('subject_full');
										$fck->BasePath = sBASEPATH;
								        $fck->Value  = $getdata['subject_full'];					
										$fck->Width  = '100%';
										$fck->Height = 400;
										$fck->Create();
									    ?>
                                        </div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Hình ảnh</div>
                                        <div class="form_items_right">
                                        <?php if($getdata['subject_image'] != NULL){ echo "<img src='".base_url()."uploads/news/$getdata[subject_image]' width='100' />";}?>
                                        <input type="file" name="img" size="25" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">&nbsp;</div>
                                        <div class="form_items_right">
                                        	<input type="submit" name="ok" value="Edit Now" class="magin"/>
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