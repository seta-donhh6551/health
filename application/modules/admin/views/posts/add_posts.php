				<div class="section">
                <script type="text/javascript">
					$(document).ready(function(e) {
                        $("#category").change(function(){
							cateid = $(this).val();
							$.post("<?php echo base_url(); ?>admin/posts/getcago",{cateid:cateid},function(result){
								$("#cago_id").html(result);
							});
						});
                    });
					function checkuser(){
						var form = document.sac;
						if(form.post_title.value == ""){alert("Please enter news title");form.post_title.focus();return false;}
						if(form.cate_id.value == 0){alert("Please select a category");return false;}
					}
				</script>
					<!--[if !IE]>start title wrapper<![endif]-->
					<div class="title_wrapper">
						<span class="title_wrapper_top"></span>
						<div class="title_wrapper_inner">
							<span class="title_wrapper_middle"></span>
							<div class="title_wrapper_content">
								<h2 class="menu_title">Add new articles</h2>
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
									<form action="<?php echo base_url();?>admin/posts/add" method="post" name="sac" onsubmit="return checkuser()" enctype="multipart/form-data">
                            		<div class="form_items">
                                    	<div class="form_items_left">News title</div>
                                        <div class="form_items_right"><input name="post_title" type="text" id="post_title" size="35" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Author</div>
                                        <div class="form_items_right"><input name="post_author" type="text" id="post_author" value="<?php echo $this->session->userdata['ses_username']; ?>" size="35" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Source</div>
                                        <div class="form_items_right"><input name="post_source" type="text" id="post_source" size="35" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Short info</div>
                                        <div class="form_items_right"><input name="post_shotinfo" type="text" size="35" /></div>
                                    </div>
									<div class="form_items">
                                    	<div class="form_items_left">Thứ tự</div>
                                        <div class="form_items_right"><input name="post_order" type="text" size="35" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Category</div>
                                        <div class="form_items_right">
                                        	<select name="cate_id" id="category">
                                            <option value="0">- Select -</option>
											<?php
                                                foreach($listcate as $cate){
                                                    echo "<option value='".$cate['cate_id']."'>".$cate['cate_name']."</option>";
                                                }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Sub category</div>
                                        <div class="form_items_right">
                                        	<select name="cago_id" id="cago_id">
                                            	<option value="0">- Select -</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Type category</div>
                                        <div class="form_items_right">
                                        	<select name="type_id" id="type_id">
                                            	<option value="0">- Select -</option>
                                            <?php
                                                foreach($listtypes as $type){
                                                    echo "<option value='".$type['id']."'";
													echo ">".$type['name']."</option>";
                                                }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                     <div class="form_items">
                                    	<div class="form_items_left">SEO Keywords</div>
                                        <div class="form_items_right">
                                        <textarea name="post_keys" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">SEO Description</div>
                                        <div class="form_items_right">
                                        <textarea name="post_des" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Short description</div>
                                        <div class="form_items_right">
                                        <?php
										$fck = new FCKeditor('post_info');
										$fck->BasePath = sBASEPATH;
										//$fck->Value  = $get['post_value'];
										$fck->Width  = '100%';
										$fck->Height = 400;
										$fck->Create();
									   ?>
                                        </div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Full information</div>
                                        <div class="form_items_right">
                                        <?php
										$fck = new FCKeditor('post_value');
										$fck->BasePath = sBASEPATH;
										//$fck->Value  = $get['post_value'];
										$fck->Width  = '100%';
										$fck->Height = 400;
										$fck->Create();
									   ?>
                                        </div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Image</div>
                                        <div class="form_items_right">
											<input type="file" name="img" size="25" />
                                        </div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Picture</div>
                                        <div class="form_items_right">
											<input type="file" name="imgact" size="25" />
                                        </div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">&nbsp;</div>
                                        <div class="form_items_right">
                                        	<input type="submit" name="ok" value="Add Post" class="magin"/>
                                            <input type="reset" name="Reset" id="button" value="Reset" class="magin"/>
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