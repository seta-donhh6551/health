<div id="content">
  <div id="navmenu">
    <h2>Contact us</h2>
  </div>
  <div id="category">
    <div id="haleft">
      <h2>Top Stories</h2>
      <?php if(isset($newest)){ ?>
      <?php foreach($newest as $news){ ?>
      <div class="newslf"><a href="<?php echo base_url().$news['cate_rewrite']."/".$news['post_title_rewrite']."-".$news['post_id']; ?>.html"><img src="<?php echo base_url()."uploads/hanews/thumb/".$news['post_image']; ?>" alt="<?php echo $news['post_title']; ?>" title="<?php echo $news['post_title']; ?>" /></a>
        <h3><a href="<?php echo base_url().$news['cate_rewrite']."/".$news['post_title_rewrite']."-".$news['post_id']; ?>.html"><?php echo $news['post_title']; ?></a></h3>
      </div>
      <?php } } ?>
    </div>
    <div id="hamidd">
      <div id="homelink">
      	<a href="<?php echo base_url(); ?>">Home</a> &raquo;
        <a href="<?php echo base_url();?>contact.html" title="Contact us">Contact us</a>
      </div>
	  <div id="contact">
		<p>If you have any questions need help, or suggestions for us please contact us by</p>
		<p style="color:#005F95">Email : info@liferespect.net</p>
		<p>Or use the form below, we will reply you as soon as possible</p>
		<p>Thank you</p>
		</p>
		<div style="padding:10px;"></div>
		<h3 style="margin:10px 0px 15px 0">Contact form</h3>
		<fieldset>
			<div id="view" style="display:none;font-size:11px;background:#F8F8F8;padding:3px 10px;color:#F00;width:400px; margin:10px auto 0px auto;"></div>
			<form action="javascript:void(0)">
			<div class="form_items">
				<div class="form_items_left"><label>Full name<span class="red">*</span></label></div>
				<div class="form_items_right"><input type="text" id="name" size="35" /></div>
			</div>
			<div class="cls"></div>
			<div class="form_items">
				<div class="form_items_left"><label>Your email<span class="red">*</span></label></div>
				 <div class="form_items_right"><input type="text" id="email" size="35" /></div>
			</div>
			<div class="cls"></div>
			<div class="form_items">
				<div class="form_items_left"><label>Phone number</label></div>
				 <div class="form_items_right"><input type="text" id="phone" size="35" /></div>
			</div>
			<div class="cls"></div>
			<div class="form_items">
				<div class="form_items_left"><label>Your question<span class="red">*</span></label></div>
				<div class="form_items_right"><textarea cols="43"  id="info" rows="5" name="info"></textarea></div>
			</div>
			<div class="cls"></div>
			<div class="form_items">
				<div class="form_items_left"><label>&nbsp;</label> </div>
				<div class="form_items_right"><input type="submit" id="submit-form" value="Submit" class="subbs" style="margin:0px;" /><input type="reset" value="Reset" class="subbs"/></div>
			</div>
		</form>
		</fieldset>
	</div>
    </div>
    <div id="haright">
      <div id="hotright">
        <div id="hottitle">
          <ul>
			  <li class="active"><a href="javascript:void(0)" class="search">Search</a></li>
          </ul>
        </div>
        <div class="cls"></div>
        <div id="hotcontent">
          <div class="ancontent">
            <div class="formans">
              <?php $this->load->view("layouts/search");?>
            </div>
            <div class="ranquest">
              <?php $this->load->view("layouts/randquest");?>
            </div>
          </div>
          <div class="qucontent"></div>
        </div>
      </div>
     <div id="adsone">
      <img src="<?php echo base_url(); ?>public/images/adsense-300x250.gif" width="250" alt="" />
     </div>
     <div id="adstwo">
      <img src="<?php echo base_url(); ?>public/images/adstwo.gif" width="250" alt="" />
     </div>
    </div>
    <div class="cls"></div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#submit-form").click(function(){
		n = $("#name").val();
		e = $("#email").val();
		p = $("#phone").val();
		info = $("#info").val();
		if(n == 1 || e == '' || info == ''){
			$("#view").show();
			$("#view").html("Please enter full infomartion");
			return false;
		}
		$.ajax({
			"url" : "<?php echo base_url(); ?>home/contact/ajax",
			"type" : "post",
			"data" : "name="+n+"&email="+e+"&phone="+p+"&info="+info,
			beforeSend: function() {
				$("#view").show();
				$("#view").html("<img src='<?php echo base_url(); ?>public/images/loading-gif.gif' />");
			},
			success : function(result){
				if(result == 1){
					$("#contact form input[type=text]").val("");
					$("#contact form textarea").val("");
					$("#view").html("<span style='color:#060;font-weight:bold;'>Thank you for your contact, we will reply you as soon as possible</span>");
				}else{
					$("#view").html(result);
				}
			},
		});
		return false;
	});
});
</script>