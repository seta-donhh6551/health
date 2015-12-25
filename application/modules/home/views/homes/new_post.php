<?php
	if(isset($newest) && $newest != NULL){
		foreach($newest as $items){
			echo "<div class='posts_items'>";
			echo "<a href='".base_url()."bai-viet-moi/".$items['post_title_rewrite']."-".$items['post_id'].".html'><img src='".base_url()."uploads/news/thumb/".$items['post_image']."' alt='".$items['post_title']."' title='".$items['post_title']."' /></a>";
			echo "<h3><a href='".base_url()."bai-viet-moi/".$items['post_title_rewrite']."-".$items['post_id'].".html'>".$items['post_title']."</a></h3>";
			echo "<div class='cls'></div>";
			echo "</div>";
		}
	}
?>