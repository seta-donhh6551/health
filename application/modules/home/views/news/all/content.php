<!------CONTAINER------>
<div id="container">
    <div id="inner_container">
		<div id="slideshow">
			<a href="#"><img src="<?php echo base_url(); ?>public/images/slive_01.png" alt="Mini Ninjas" /></a>
			<a href="#"><img src="<?php echo base_url(); ?>public/images/slive_01.png" alt="Mini Ninjas" /></a>
			<a href="#"><img src="<?php echo base_url(); ?>public/images/slive_01.png" alt="Mini Ninjas" /></a>
			<a href="#"><img src="<?php echo base_url(); ?>public/images/slive_01.png" alt="Mini Ninjas" /></a>
			<a href="#"><img src="<?php echo base_url(); ?>public/images/slive_01.png" alt="Mini Ninjas" /></a>
			<a href="#"><img src="<?php echo base_url(); ?>public/images/slive_01.png" alt="Mini Ninjas" /></a>			
		</div>
        
        <div id="product">
            <div id="content">
                <div class="tittle_content">
                    <div class="inner_title">
                        <img src="<?php echo base_url(); ?>public/images/home.png" alt="icon home"/>
                        
                        <div class="home"><a href="<?php echo base_url(); ?>">Home</a></div>
                        
                        
                        <div class="title1"><a href="javascript:void(0)">Tin tức</a></div>
                        
                        
                        <span class="social2">
                            <img src="<?php echo base_url(); ?>public/images/icons/7.png" alt="icon"/>
                        </span>
                        
                    </div>
                    
                </div>
                <div id="fnews2">
				<?php
				foreach($listnews as $list){
					echo "<div class='list_news'>";
					if($list['news_images'] != NULL){
						echo "<img src='".base_url()."uploads/news/$list[news_images]' class='news_img' />";
					}
					echo "<h3 class='news_h3'><a href='".base_url()."vn/news/index/$list[news_id]'>".$list['news_title']."</a></h3>";
					echo "<div class='news_date'><i>".$list['news_author']." - ".$list['news_date']."</i></div>";
					echo "<div class='news_info'>".$list['news_info']."</i></div>";
					echo "</div>";
					echo "<div class='cls_border'></div>";
				}
				?>
                </div>
				<script type="text/javascript">
				$(document).ready(function(){
			  			$("#pagination strong").addClass('activee');
			  			$("#pagination a").addClass('link');
			  		});
				</script>
				<div id="pagination"><?php echo $this->pagination->create_links(); ?></div>
            </div>
            <div class="sidebar" >
                <div class="video">
                    <object width="255" height="215">
                            <param name="movie" value="http://www.youtube.com/v/rZFUXUq0iL0?version=3&amp;hl=vi_VN"></param>
                            <param name="allowFullScreen" value="true"></param>
                            <param name="allowscriptaccess" value="always"></param>
                            <embed src="http://www.youtube.com/v/rZFUXUq0iL0?version=3&amp;hl=vi_VN" type="application/x-shockwave-flash" width="255" height="215" allowscriptaccess="always" allowfullscreen="true"></embed>
                    </object>
                </div>
                
                <div class="news_featrurs">
                    <div class="title2">
                        <h3>Hỗ trợ trực tuyến</h3>
                    </div>
                    
                    <div class="online">
                    <?php
						foreach($support as $sup){
							echo "<div class='support'>";
							echo "<a href='ymsgr:sendim?$sup[sup_yahoo]&m=hello'><img src='http://mail.opi.yahoo.com/online?u=$sup[sup_yahoo]&amp;m=g&amp;t=2' border='0' width='100' height='22' style='margin:5px 0px 7px 30px;'/></a>";
							echo "<p class='sup_p'>".$sup['sup_name']."</p>";
							echo "</div>";
						}	
					?>
                    </div>
                </div>
                
                <div class="facebook">
                    <div class="title3">
                        <h3>Find us on Facebook</h3>
                    </div>
                    
                     <div class="fanpage">
                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                    <div class="fb-like-box" data-href="http://www.facebook.com/ngcvietnam" data-width="255" data-height="293" data-show-faces="true" data-stream="false" data-header="false"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-------END CONTAINER------->