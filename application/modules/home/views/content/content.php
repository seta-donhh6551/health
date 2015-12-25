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
        	<div id="content_mid_top"><a href="<?php echo base_url(); ?>" title="Trang chủ">Trang chủ</a> &raquo; <a href="<?php echo $link; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></div>
        	<div id="content_mid_bottom">
            <div class="h1_title">
            	<h1>HỌC THIẾT KẾ WEB TẠI HÀ NỘI</h1>
            </div>
           	<?php
			if(isset($listall) && $listall != NULL){
				foreach($listall as $list){
					echo "<div class='post_items'>";
						echo "<a href='".base_url()."hoc-php/".$list['con_rewrite']."-".$list['con_id'].".html'><img class='post_img' src='".base_url()."uploads/news/thumb/$list[con_image]' alt='".$list['con_title']."' title='".$list['con_title']."' /></a>";
						echo "<h3 class='post_h3'><a title='".$list['con_title']."' href='".base_url()."hoc-php/".$list['con_rewrite']."-".$list['con_id'].".html'>".$list['con_title']."</a></h3>";
						echo "<div>".cut_str(strip_tags($list['con_info']),0,250)."</div>";
					echo "</div>";
					echo "<div class='post_line'></div>";
				}
			}else{
				echo "Nội dung đang cập nhật";
			}
			?>
            </div>
            <div id="pagination"><?php echo $this->pagination->create_links(); ?></div>
            <div itemscope itemtype="http://schema.org/Recipe">
                <span itemprop="name">Học php ở đâu tốt nhất</span>
                <img itemprop="image" src="http://phpandmysql.net/uploads/cate/thumb/php-can-ban.jpg" alt="Học php ở đâu tốt nhất">
                <div itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
                    <span itemprop="ratingValue">9</span>/<span itemprop="bestRating">10</span>
                    <span itemprop="reviewCount">29</span> bài đánh giá
                </div>
            </div>
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
            <?php $this->load->view("homes/new_post");?>
            </div>
        </div>
    </div>