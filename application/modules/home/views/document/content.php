<div id="wapper">
	<div id="left">
        <div class="title">
        	<a href="<?php echo base_url();?>">Trang chủ</a>  &raquo; <a href="<?php echo base_url();?>vn/index/document">Tài liệu nội bộ</a>
        </div>
        <div class="content">
        	<?php
				$status = $this->session->userdata("ses_status");
				if($status == 1 ){
					 if(isset($info) && $info != NULL){
						foreach($info as $fo){
							echo "<div class='doc'>";
							echo "<div class='doc_left'> + $fo[doc_title]</div>";
							echo "<div class='doc_right'>";
							if($this->session->userdata("ses_user")){
								echo $fo['doc_value'];
							}else{
								echo "Bạn phải đăng nhập để tải tài liệu";
							}
							echo "</div>";
							echo "<div class='cls'></div>";
							echo "</div>";
						}
					}else{
						echo "Không có dữ liệu";
					} 
				}else{
					echo "Tài khoản của bạn chưa được kích hoạt - <a href='".base_url()."vn/lien-he'>liên hệ</a> với administrstor";
				}
			?>
        </div>
        <script>
        	$(document).ready(function(){
				$("#pagina strong").addClass('activee');
				$("#pagina a").addClass('link');
			});
			</script>
        <div id="pagina"><?php echo $this->pagination->create_links();?></div>
	</div>
	<div id="right">
    	<div id="news">
        	<script>
			$(document).ready(function() {
				var showChar = 27;
				var ellipsestext = "...";
				var moretext = "more";
				var lesstext = "less";
				$('a.mo').each(function() {
					var content = $(this).html();
			 
					if(content.length > showChar) {
			 
						var c = content.substr(0, showChar);
						var h = content.substr(showChar-1, content.length - showChar);
			 
						var html = c +  ellipsestext;
			 
						$(this).html(html);
						 }
			 
					});
				});
			</script>
        	<h3>NEWS</h3>
            <?php
			if(isset($listnews) && $listnews != NULL){
				echo "<ul>";
				foreach($listnews as $list){
					echo "<li><a href='".base_url()."vn/news/index/$list[news_id]' class='mo' alt='$list[news_title]' title='$list[news_title]'>$list[news_title]</a></li>";
				}
				echo "</ul>";
			}else{
				echo "Không có dữ liệu";
			}
			?>
            <a href="<?php echo base_url();?>vn/tin-tuc" class="more">Xem tất cả</a>
        </div>
		<div id="doitac">
        	<h3>ĐỐI TÁC</h3>
            <div><a href="http://www.samsung.com/vn" target="_blank"><img src="<?php echo base_url();?>public/images/samsung.jpg" width="89" height="62" /></a><a href="http://honda.com.vn/" target="_blank"><img src="<?php echo base_url();?>public/images/honda.jpg" width="136" height="62" class="mg_l" /></a></div>
	        <div><img src="<?php echo base_url();?>public/images/opt.jpg" width="131" height="75" /><a href="http://yamaha-motor.com.vn/" target="_blank"><img src="<?php echo base_url();?>public/images/yamaha.jpg" width="94" height="75" class="mg_l" /></a></div>
      		<div><img src="<?php echo base_url();?>public/images/ls.jpg" width="97" height="65" /><img src="<?php echo base_url();?>public/images/obay.jpg" width="53" height="65" class="mg_l" /><a href="http://www.canon.com.vn/" target="_blank"><img src="<?php echo base_url();?>public/images/canon.jpg" width="72" height="65" class="mg_l" /></a></div>
	  </div>
        <div id="video">
        	<h3>VIDEO</h3>
            <div>
            	<iframe width="230" height="200" src="http://www.youtube.com/embed/hUAnCoGnW18" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <div id="status" style="width:230px;height:50px;margin-top:30px;">
        	<!-- Histats.com  START  (standard)-->
<script type="text/javascript">document.write(unescape("%3Cscript src=%27http://s10.histats.com/js15.js%27  type=%27text/javascript%27%3E%3C/script%3E"));</script><script src="http://s10.histats.com/js15.js" type="text/javascript"></script>
<a href="http://www.histats.com" target="_blank" title="best tracker"><script type="text/javascript">
try {Histats.start(1,1170183,4,242,241,20,"00001001");
Histats.track_hits();} catch(err){};
</script>
</a>
<noscript>&lt;a href="http://www.histats.com" target="_blank"&gt;&lt;img  src="http://sstatic1.histats.com/0.gif?1170183&amp;101" alt="best tracker" border="0"&gt;&lt;/a&gt;</noscript>
<!-- Histats.com  END  -->
    	</div>
    </div>
	<div class="cls"></div>
	</div>