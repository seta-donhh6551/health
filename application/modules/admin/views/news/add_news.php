				<div class="section">
                	<script type="text/javascript">
					function checkuser(){
						var form = document.sac;
						if(form.news_title.value == ""){
							alert("Vui lòng nhập tiêu đề tin");
							form.news_title.focus();
							return false;
						}
						if(form.news_author.value == ""){
							alert("Vui lòng nhập tác giả");
							form.news_author.focus();
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
								<h2 class="menu_title">Thêm mới tin tức</h2>
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
									<form action="<?php echo base_url();?>admin/news/add" method="post" name="sac" onsubmit="return checkuser()" enctype="multipart/form-data">
                            		<div class="form_items">
                                    	<div class="form_items_left">Tiêu đề tin</div>
                                        <div class="form_items_right"><input name="news_title" type="text" id="news_title" size="35" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Tags key</div>
                                        <div class="form_items_right"><input name="news_tags" type="text" id="news_tags" size="35" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Tác giả</div>
                                        <div class="form_items_right"><input name="news_author" type="text" id="news_author" size="35" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Keywords</div>
                                        <div class="form_items_right"><input name="news_keys" type="text" id="news_author" size="35" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Description</div>
                                        <div class="form_items_right"><input name="news_des" type="text" id="news_author" size="35" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Thuộc chuyên mục</div>
                                        <div class="form_items_right">
                                        <select name="cago_id">
                                        <?php
										foreach($listcago as $items){
											echo "<option value='".$items['cago_id']."'>".$items['cago_name']."</option>";
										}
										?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Mô tả tin</div>
                                        <div class="form_items_right"><textarea name="news_info" cols="35" rows="3" id="news_info"></textarea></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Nội dung chi tiết</div>
                                        <div class="form_items_right">
                                        <?php 
										$fck = new FCKeditor('news_full');
										$fck->BasePath = sBASEPATH;
										//$fck->Value  = $this->config->item('config_contact');
										$fck->Width  = '100%';
										$fck->Height = 400;
										$fck->Create();
									   ?>
                                        </div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Hình ảnh</div>
                                        <div class="form_items_right"><input type="file" name="img" size="25" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">&nbsp;</div>
                                        <div class="form_items_right">
                                        	<input type="submit" name="ok" value="Add News" class="magin"/>
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