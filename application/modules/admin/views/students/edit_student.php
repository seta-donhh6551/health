				<div class="section">
                <script type="text/javascript">
					function checkpro(){
						var form = document.sac;
						if(form.student_name.value == ""){
							alert("Vui lòng nhập tên học viên");
							form.student_name.focus();
							return false;
						}
					}
				</script>
					<!--[if !IE]>start title wrapper<![endif]-->
					<div class="title_wrapper">
						<span class="title_wrapper_top"></span>
						<div class="title_wrapper_inner">
							<span class="title_wrapper_middle"></span>
							<div class="title_wrapper_content">
								<h2 class="menu_title">Ý kiến học viên</h2>
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
									<form action="<?php echo base_url();?>admin/students/update/<?php echo $info['student_id'] ?>" method="post" name="sac" onsubmit="return checkpro()" enctype="multipart/form-data">
                            		<div class="form_items">
                                    	<div class="form_items_left">Họ tên</div>
                                        <div class="form_items_right"><input name="student_name" type="text" size="30" value="<?php echo $info['student_name'] ?>" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Số phone</div>
                                        <div class="form_items_right"><input name="student_phone" type="text" size="30" value="<?php echo $info['student_phone'] ?>" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Email addess</div>
                                        <div class="form_items_right">
                                        	<input type="text" name="student_email" size="30" value="<?php echo $info['student_email'] ?>" />
                                        </div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Facebook</div>
                                        <div class="form_items_right"><input name="student_face" type="text" size="30" value="<?php echo $info['student_face'] ?>" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Điạ chỉ</div>
                                        <div class="form_items_right"><input name="student_add" type="text" size="30" value="<?php echo $info['student_add'] ?>" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Status</div>
                                        <div class="form_items_right">
                                        <select name="student_status" id="">
                                        	<option value="1" <?php if($info['student_status'] == 1) { echo "selected='selected'";} ?> >Active</option>
                                        	<option value="0" <?php if($info['student_status'] == 0) { echo "selected='selected'";} ?>>Not active</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Ý kiến</div>
                                        <div class="form_items_right">                                        
										<?php 
										$fck = new FCKeditor('student_info');
										$fck->BasePath = sBASEPATH;
										$fck->Value  = $info['student_info'];
										$fck->Width  = '100%';
										$fck->Height = 400;
										$fck->Create();
									   ?>                                     
                                        </div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Avatar</div>
                                        <div class="form_items_right">
                                        <?php
										if($info['student_avatar'] != NULL){
											echo "<img src='".base_url()."uploads/students/thumb/$info[student_avatar]' width='110' />";
										}
										?>
                                        <input type="file" name="avatar" size="30" /></div>
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