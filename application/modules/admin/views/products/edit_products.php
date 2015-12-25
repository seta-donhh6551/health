				<div class="section">
                <script type="text/javascript">
					function checkpro(){
						var form = document.sac;
						if(form.pro_name.value == ""){
							alert("Vui lòng nhập tên sản phẩm");
							form.pro_name.focus();
							return false;
						}
						if(form.pro_price.value == ""){
							alert("Vui lòng nhập giá tiền");
							form.pro_price.focus();
							return false;
						}	}
				</script>
					<!--[if !IE]>start title wrapper<![endif]-->
					<div class="title_wrapper">
						<span class="title_wrapper_top"></span>
						<div class="title_wrapper_inner">
							<span class="title_wrapper_middle"></span>
							<div class="title_wrapper_content">
								<h2 class="menu_title">Sủa thông tin sản phẩm</h2>
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
									<form action="<?php echo base_url();?>admin/products/update/<?php echo $get['pro_id'];?>" method="post" name="sac" onsubmit="return checkpro()" enctype="multipart/form-data">
                            		<div class="form_items">
                                    	<div class="form_items_left">Tên sản phẩm</div>
                                        <div class="form_items_right"><input name="pro_name" type="text" id="pro_name3" value="<?php echo $get['pro_name']; ?>" size="30" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Giá tiền</div>
                                        <div class="form_items_right"><input name="pro_price" type="text" id="pro_price" value="<?php echo $get['pro_price']; ?>" size="30" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Bảo hành</div>
                                        <div class="form_items_right"><input name="pro_war" type="text" id="pro_war" size="30" value="<?php echo $get['pro_war']; ?>" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Xuất xứ</div>
                                        <div class="form_items_right"><input name="pro_location" type="text" id="pro_location" size="30" value="<?php echo $get['pro_location']; ?>" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Phí vận chuyển</div>
                                        <div class="form_items_right"><input name="pro_ship" type="text" id="pro_ship" size="30" value="<?php echo $get['pro_ship']; ?>" /></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Thuộc chuyên mục</div>
                                        <div class="form_items_right">
                                        	<select name="pro_cate" onchange="show_cago(this.value)">
										  <?php
                                                foreach($info as $item){
                                                    echo "<option value='".$item['cate_id']."'>".$item['cate_name']."</option>";
                                                }
                                            ?>
                                          </select>
                                          <div id="list"></div>
                                        </div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Mô tả sản phẩm</div>
                                        <div class="form_items_right"><textarea cols="35" rows="5" name="pro_info" id="pro_info"><?php echo $get['pro_info']; ?></textarea></div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Chi tiết sản phẩm</div>
                                        <div class="form_items_right">
                                        <?php 
										$fck = new FCKeditor('pro_full');
										$fck->BasePath = sBASEPATH;
										$fck->Value  = $get['pro_full'];
										$fck->Width  = '100%';
										$fck->Height = 400;
										$fck->Create();
									   ?>
                                        </div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">Hình ảnh</div>
                                        <div class="form_items_right"><?php 
										  if($get['pro_images'] != NULL){
											  echo "<img src='".base_url()."uploads/products/thumb/".$get['pro_images']."' width='100'/>";
										  }
										?>
                                        <input type="file" name="img" size="30" />
                                        </div>
                                    </div>
                                    <div class="form_items">
                                    	<div class="form_items_left">&nbsp;</div>
                                        <div class="form_items_right">
                                        <input type="submit" name="ok" value="Edit Product" class="magin"/>
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