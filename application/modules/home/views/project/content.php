<div id="wapper">
	<div id="left">
        <div class="title">
        	<a href="<?php echo base_url();?>">Trang chủ</a>  &raquo; <a href="javascript:void(0)">Dự án</a> &raquo; <a href="<?php echo base_url();?>"><?php echo $title;?></a>
        </div>
        <div class="content">
        	<script>
        	$(document).ready(function(){
				$("#pagina strong").addClass('activee');
				$("#pagina a").addClass('link');
			});
			</script>
        	<?php
				 if(isset($results) && $results != NULL){
					foreach($results as $news){
						echo "<div class='news'>";
						if($news['pro_image'] != NULL){
							echo "<img src='".base_url()."uploads/project/$news[pro_image]' width='120' class='img_news' />";
						}
						echo "<h4><a href='".base_url()."vn/project/view/$news[pro_id]'>$news[pro_title]</a></h4>";
						echo "<div>Chủ đầu tư : ".$news['pro_user']."</div>";
						echo "<div>Địa điểm : ".$news['pro_location']."</div>";
						echo "<div>Quy mô : ".$news['pro_scale']."</div>";
						echo "<a href='".base_url()."vn/project/view/$news[pro_id]' class='read_more'>Chi tiết...</a>";
						echo "</div>";
						echo "<div class='clean'></div>";
					}
				}else{
					echo "Nội dung đang cập nhật!";
				} 
			?>
            <div id="pagina"><?php echo $this->pagination->create_links();?></div>
        </div>
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