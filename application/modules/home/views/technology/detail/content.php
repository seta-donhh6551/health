<?php $this->load->view("menu");?>
<div id="content">
    	<div id="content_left">
        	<?php $this->load->view("homes/study"); ?>
            <div id="content_left_menu">
            	<h2>CHUYÊN MỤC</h2>
            	<ul>
                <?php
				if(isset($listcate)){
					foreach($listcate as $cate){
						echo "<li><a href='".base_url().$cate['cate_rewrite']."-".$cate['cate_id'].".html' title='$cate[cate_name]'>".$cate['cate_name']."</a></li>";
					}
				}else{
					echo "<li>Không có dữ liệu</li>";
				}
				?>
                </ul>
            </div>
            <!-- student here -->
            <?php $this->load->view("homes/students"); ?>
            <!-- student here -->
            <div id="content_left_end">
            <?php $this->load->view("homes/review"); ?>
            </div>
        </div>
        <div id="content_mid">
        	<div id="content_mid_top">
            	<a href="<?php echo base_url(); ?>">Trang chủ</a> &raquo; <a href="<?php echo base_url(); ?>cong-nghe.html">Công nghệ</a>
            </div>
        	<div id="content_mid_bottom" style="line-height:18px;">
            <?php
			if(isset($read) && $read != NULL){
			?>
            <img src="<?php echo base_url(); ?>uploads/news/thumb/<?php echo $read['news_images'];  ?>" alt="" title="" class="img_detail" />
            <h2 class='h2_post'><?php echo $read['news_title']; ?></h2>
            <div class="info_post"><?php echo $read['news_info']; ?></div>
            <div class="cls"></div>
            <div class="full_post"><?php echo $read['news_full']; ?></div>
            <?php
			}
			?>
            </div>
            <div style="margin:10px 0px 30px 0px;border-bottom:1px solid #DDD;"></div>
            <div id="commentfa">
            	<div class="fb-comments" data-href="<?php echo $link; ?>" data-width="540" data-num-posts="100"></div>
            </div>
        </div>
    	<div id="content_right">
          	<div id="news">
            	<div id="news_top">
                	<h2>BÀI VIẾT CÙNG CHUYÊN MỤC</h2>
                </div>
            	<div id="news_bot">
                	<?php $this->load->view("homes/news");?>
                </div>
            </div>
          	<div id="posts">
            <?php
				foreach($relate as $items){
					echo "<div class='posts_items'>";
					echo "<a href='".base_url()."tin-cong-nghe/".$items['news_rewrite']."/".$items['news_id'].".html'><img src='".base_url()."uploads/news/thumb/".$items['news_images']."' alt='".$items['news_title']."' title='".$items['news_title']."' /></a>";
					echo "<h3><a href='".base_url()."tin-cong-nghe/".$items['news_rewrite']."/".$items['news_id'].".html'>".$items['news_title']."</a></h3>";
					echo "<div class='cls'></div>";
					echo "</div>";
				}
			?>
            </div>
        </div>
    </div>