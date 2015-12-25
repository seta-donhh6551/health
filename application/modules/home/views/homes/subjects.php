<div id="news_top">
  <h2>KHOÁ HỌC LẬP TRÌNH PHP</h2>
</div>
<div id="news_bot">
  <?php
if(isset($subjects)){
    foreach($subjects as $items){
        echo "<div class='posts_items'>";
        echo "<a href='".base_url()."khoa-hoc/".$items['subject_rewrite']."/".$items['subject_id'].".html'><img src='".base_url()."uploads/news/thumb/".$items['subject_image']."' alt='".$items['subject_title']."' title='".$items['subject_title']."' /></a>";
        echo "<h3><a href='".base_url()."khoa-hoc/".$items['subject_rewrite']."/".$items['subject_id'].".html' title='".$items['subject_title']."'>".$items['subject_title']."</a></h3>";
        echo "<div class='cls'></div>";
        echo "</div>";
    }
}
?>
</div>
