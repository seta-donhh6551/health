<div id="menu">
  <ul>
    <li><a href="<?php echo base_url(); ?>" title="Trang chủ">Trang chủ</a></li>
    <li><a href="<?php echo base_url(); ?>gioi-thieu.html" title="Giới thiệu về chúng tôi">Giới thiệu</a></li>
    <li><a href="<?php echo base_url(); ?>khoa-hoc.html" title="Khóa học thiết kế web - lập trình PHP tại Hà Nội">Khóa học</a>
      <div class="dropdown">
        <ul>
          <?php
			if(isset($subjects)){
				foreach($subjects as $subje){
					echo "<li><a href='".base_url()."khoa-hoc/".$subje['subject_rewrite']."/".$subje['subject_id'].".html' title='".$subje['subject_title']."'>".$subje['subject_title']."</a></li>";
				}
			}
		  ?>
        </ul>
      </div>
    </li>
    <li><a href="<?php echo base_url(); ?>lich-hoc.html" title="Lịch học thiết kế web - lập trình PHP tại North Star">Lịch học</a>
      <div class="dropdown">
      <ul>	
      <?php if(isset($times)){ foreach($times as $edu){ ?>
        <li><a href="<?php echo base_url()."lich-hoc/".$edu['education_rewrite']; ?>.html" title="<?php echo $edu['education_title']; ?>"><?php echo $edu['education_title']; ?></a></li>
      <?php } } ?>
      </ul>
      </div>
    </li>
    <li><a href="<?php echo base_url(); ?>danh-gia-cua-hoc-vien.html" title="Ý kiến của học viên">Ý kiến học viên</a></li>
    <li><a href="javascript:void(0)" title="Tin công nghệ">Tin công nghệ</a>
      <div class="dropdown">
      	<ul>
        <?php if(isset($category)){
		  foreach($category as $catego){
		  	echo "<li><a href='".base_url()."cong-nghe/".$catego['cago_rewrite']."-".$catego['cago_id'].".html' title='".$catego['cago_name']."'>".$catego['cago_name']."</a></li>";
		  } }
		?>
        </ul>
      </div>
    </li>
    <li><a href="<?php echo base_url(); ?>lien-he.html" title="Liên hệ học thiết kế web">Liên hệ</a></li>
  </ul>
</div>