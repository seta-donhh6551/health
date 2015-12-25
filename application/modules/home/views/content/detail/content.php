<?php $this->load->view("menu");?>
<div id="content">
    	<div id="content_left">
        	<?php $this->load->view("homes/support"); ?>
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
            	<a href="<?php echo base_url(); ?>" title="Trang chủ">Trang chủ</a> &raquo; <a href="<?php echo base_url(); ?>hoc-php.html" title="Học PHP tốt nhất">Học PHP tốt nhất</a>
            </div>
        	<div id="content_mid_bottom" style="line-height:18px;">
            <?php
			if(isset($read) && $read != NULL){
			?>
            <img src="<?php echo base_url(); ?>uploads/news/thumb/<?php echo $read['con_image'];  ?>" alt="<?php echo $read['con_title']; ?>" title="<?php echo $read['con_title']; ?>" class="img_detail" />
            <h1 class='h2_post'><?php echo $read['con_title']; ?></h1>
            <div class="info_post"><?php echo $read['con_info']; ?></div>
            <div class="cls"></div>
            <div class="full_post"><?php echo $read['con_full']; ?></div>
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
					echo "<a href='".base_url()."hoc-php/".$items['con_rewrite']."-".$items['con_id'].".html'><img src='".base_url()."uploads/news/thumb/".$items['con_image']."' alt='".$items['con_title']."' title='".$items['con_title']."' /></a>";
					echo "<h3><a href='".base_url()."hoc-php/".$items['con_rewrite']."-".$items['con_id'].".html' title='".$items['con_title']."'>".$items['con_title']."</a></h3>";
					echo "<div class='cls'></div>";
					echo "</div>";
				}
			?>
            </div>
        </div>
    </div>