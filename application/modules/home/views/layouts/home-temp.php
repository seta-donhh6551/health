<div class="haboxs haborone">
    <div class="heath haboxtitle">
      <h2><?php echo $catefour['cate_name']; ?></h2>
      <ul>
      <?php if(isset($menufour)){ ?>
      <?php foreach($menufour as $menu){ ?>
        <li><a href="<?php echo base_url().$menu['cate_rewrite']."/".$menu['rewrite']; ?>.html"><?php echo $menu['name']; ?></a></li>
      <?php } } ?>
      </ul>
    </div>
    <div class="haboxcontent">
    <?php if(isset($listfour)){ ?>
    <?php $i=1; foreach($listfour as $tablets){?>
      <div class="hacolums <?php if($i == 3){ echo "last";} ?>">
        <h3 class="hah3"><a href="<?php echo base_url().$tablets['cate_rewrite']."/".$tablets['post_title_rewrite']."-".$tablets['post_id']; ?>.html"><?php echo $tablets['post_title']; ?></a></h3>
        <div class="techhot">
          <a href="<?php echo base_url().$tablets['cate_rewrite']."/".$tablets['post_title_rewrite']."-".$tablets['post_id']; ?>.html"><img src="<?php echo base_url()."uploads/hanews/thumb/$tablets[post_image]"; ?>" width="150" alt="<?php echo $tablets['post_title']; ?>" /></a>
          <p><?php echo mb_substr($tablets['post_shotinfo'], 0, 250, 'UTF-8'); ?>...</p>
        </div>
      </div>
      <?php $i++; } } ?>
      <div class="cls"></div>
    </div>
  </div>