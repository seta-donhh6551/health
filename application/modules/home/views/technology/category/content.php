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
            	<a href="<?php echo base_url(); ?>">Trang chủ</a> &raquo; <a href="javascript:void(0)"><?php echo $title; ?></a>
            </div>
        	<div id="content_mid_bottom" style="line-height:18px;">
            <?php
			if(isset($listnews) && $listnews != NULL){
				foreach($listnews as $list){
					echo "<div class='news_items'>";
					if($list['news_images'] != NULL){
						echo "<a href='".base_url()."tin-cong-nghe/$list[news_rewrite]/$list[news_id].html'><img src='".base_url()."uploads/news/thumb/$list[news_images]' class='news_img' alt='".$list['news_title']."' title='".$list['news_title']."' /></a>";
					}
					echo "<h3 class='news_h3'><a href='".base_url()."tin-cong-nghe/$list[news_rewrite]/$list[news_id].html' title='".$list['news_title']."'>".$list['news_title']."</a></h3>";
					echo "<p class='news_author'><i>".$list['news_author']." - ".$list['news_date']."</i> ";
					if($list['news_tags'] != NULL){
						$tags = json_decode($list['news_tags'],true);
						echo "&nbsp; | &nbsp;";
						foreach($tags['tags'] as $k => $v){
							//echo $v."=>".$tags['tags_rewrite'][$k].",";
							echo "<a href='".base_url()."tags/".$tags['tags_rewrite'][$k]."' title='".$v."' class='tags'>".$v."</a>,";
						}
					}
					echo "</p>";
					echo "<p class='news_info'>".cut_str($list['news_info'],0,200)."</p>";
					echo "</div>";
					echo "<div style='clear:left;padding:5px;border-bottom:1px solid #CCC;'></div>";
				}
			}else{
				echo "Nội dung đang cập nhật...";
			}
			?>
            </div>
            <div id="pagination"><?php echo $this->pagination->create_links(); ?></div>
        </div>
    	<div id="content_right">
          	<div id="news">
            	<div id="news_top">
                	<h2>TIN TỨC</h2>
                </div>
            	<div id="news_bot">
                	<?php $this->load->view("homes/news");?>
                </div>
            </div>
          	<div id="posts">
            <?php
			foreach($newest as $items){
				echo "<div class='posts_items'>";
				echo "<a href='".base_url()."bai-viet-moi/".$items['post_title_rewrite']."-".$items['post_id'].".html'><img src='".base_url()."uploads/news/thumb/".$items['post_image']."' alt='".$items['post_title']."' title='".$items['post_title']."' /></a>";
				echo "<h3><a href='".base_url()."bai-viet-moi/".$items['post_title_rewrite']."-".$items['post_id'].".html'>".$items['post_title']."</a></h3>";
				echo "<div class='cls'></div>";
				echo "</div>";
			}
			?>
            </div>
        </div>
    </div>