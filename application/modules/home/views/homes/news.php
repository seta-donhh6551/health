<ul>
  <?php
  foreach($category as $catego){
  	echo "<li><a href='".base_url()."cong-nghe/".$catego['cago_rewrite']."-".$catego['cago_id'].".html' title='".$catego['cago_name']."'>".$catego['cago_name']."</a></li>";
  }
  ?>
</ul>
