<div class="section">
  <script type="text/javascript">
	function check(){
		if(document.sac.name.value == ""){
			document.sac.name.focus();
			return false;
		}
		if(isNaN(document.sac.order.value)){
			alert("Order by is number!");
			document.sac.order.focus();
			return false;
		}else{
			return true;
		}
	}
  </script>
  <!--[if !IE]>start title wrapper<![endif]-->
  <div class="title_wrapper"> <span class="title_wrapper_top"></span>
    <div class="title_wrapper_inner"> <span class="title_wrapper_middle"></span>
      <div class="title_wrapper_content">
        <h2 class="menu_title">Edit submenu</h2>
      </div>
    </div>
    <span class="title_wrapper_bottom"></span> </div>
  <!--[if !IE]>end title wrapper<![endif]-->
  <!--[if !IE]>start section content<![endif]-->
  <div class="section_content"> <span class="section_content_top"></span>
    <div class="section_content_inner minheight">
      <div class="table_tabs_menu"> </div>
      <!--[if !IE]>start table_wrapper<![endif]-->
      <div class="table_wrapper" style="background:none;">
        <div class="table_wrapper_inner">
          <div class="error_red">
            <?php if(isset($error)) { echo "<p>".$error."</p>"; } ?>
          </div>
          <form action="<?php echo base_url()?>admin/categorie/update/<?php echo $result['id']; ?>" method="post" name="sac" onsubmit="return check()" enctype="multipart/form-data">
            <div class="form_items">
              <div class="form_items_left">Title</div>
              <div class="form_items_right">
                <input type="text" name="name" value="<?php echo $result['name']; ?>" size="35" />
              </div>
            </div>
            <div class="form_items">
              <div class="form_items_left">Title of Seo</div>
              <div class="form_items_right">
                <input type="text" name="title" value="<?php echo $result['title']; ?>" size="35" />
              </div>
            </div>
            <div class="form_items">
              <div class="form_items_left">Order by</div>
              <div class="form_items_right">
                <input name="order" type="text" value="<?php echo $result['order']; ?>" size="35">
              </div>
            </div>
            <div class="form_items">
              <div class="form_items_left">Type of menu?</div>
              <div class="form_items_right">
                <input type="radio" name="type" value="1" <?php if($result['type'] == 1){ echo "checked='checked'";} ?>/>Primary
                <input type="radio" name="type" value="0" <?php if($result['type'] == 0){ echo "checked='checked'";} ?>/>Secondary
              </div>
            </div>
            <div class="form_items">
              <div class="form_items_left">Select category</div>
              <div class="form_items_right">
                <select name="cate_id">
                <?php if(isset($listcate) && $listcate != NULL){ ?>
                <?php foreach($listcate as $items){ ?>
                	<option value="<?php echo $items['cate_id']; ?>" <?php if($stt == $items['cate_id']){ echo "selected='selected'";} ?>><?php echo $items['cate_name']; ?></option>
                <?php } } ?>
                </select>
              </div>
            </div>
            <div class="form_items">
              <div class="form_items_left">SEO keywords</div>
              <div class="form_items_right">
                <textarea cols="27" rows="5" name="keywords"><?php echo $result['keywords']; ?></textarea>
              </div>
            </div>
            <div class="form_items">
              <div class="form_items_left">SEO description</div>
              <div class="form_items_right">
                <textarea cols="27" rows="5" name="description"><?php echo $result['description']; ?></textarea>
              </div>
            </div>
            <div class="form_items">
              <div class="form_items_left">Short infomartion</div>
              <div class="form_items_right">
                <?php 
					$fck = new FCKeditor('shortinfo');
					$fck->BasePath = sBASEPATH;
					$fck->Value  = $result['shortinfo'];
					$fck->Width  = '100%';
					$fck->Height = 400;
					$fck->Create();
				   ?>
              </div>
            </div>
            <div class="form_items">
                <div class="form_items_left">Image</div>
                <div class="form_items_right">
                <?php if($result['image'] != NULL){echo "<img src='".base_url()."uploads/cate/thumb/".$result['image']."' width='140' />"; } ?>
                <input name="image" type="file" id="img" size="35" />
                </div>
             </div>
            <div class="form_items">
              <div class="form_items_left">&nbsp;</div>
              <div class="form_items_right">
                <input type="submit" name="ok" value="Edit now" class="magin"/>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!--[if !IE]>end table_wrapper<![endif]-->
    </div>
    <span class="section_content_bottom"></span> </div>
  <!--[if !IE]>end section content<![endif]-->
</div>