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


//khoa nhi

<div class="haboxs haborfour">
    <div class="heath haboxtitle">
	  <h2><?php echo $catefive['cate_name']; ?></h2>
      <ul>
      <?php if(isset($menufive)){ ?>
      <?php foreach($menufive as $menu){ ?>
        <li><a href="<?php echo base_url().$menu['cate_rewrite']."/".$menu['rewrite']; ?>.html"><?php echo $menu['name']; ?></a></li>
      <?php } } ?>
      </ul>
    </div>
    <div class="haboxcontent">
      <div class="hacolums">
      <?php if(isset($listfive)){ ?>
      <?php $i=1; foreach($listfive as $pediatric){ ?>
        <div class="hotquest">
          <h3><a href="<?php echo base_url().$pediatric['cate_rewrite']."/".$pediatric['post_title_rewrite']."-".$pediatric['post_id']; ?>.html"><?php echo $pediatric['post_title']; ?></a></h3>
          <div class="hadleft"> <img src="<?php echo base_url()."uploads/hanews/thumb/".$pediatric['post_image']; ?>" alt="" height="66" width="86"> </div>
          <div class="hadright">
            <p class="title">
				<span class="author"><?php echo $pediatric['post_author']; ?></span>
				<?php echo $this->utility->cut_str($pediatric['post_shotinfo'], 100); ?>
			</p>
          </div>
          <div class="cls"></div>
        </div>
		<?php if($i == 2){ break;} ?>
      <?php $i++; } } ?>
      </div>
      <div class="hacolums relative">
      <?php if(isset($catefive)){ ?>
      	<a href="<?php echo base_url().$catefive['cate_rewrite']; ?>.html"><img src="<?php echo base_url(); ?>uploads/cate/thumb/<?php echo $catefive['cate_images']; ?>" alt="<?php echo $catefive['cate_name']; ?>" title="<?php echo $catefive['cate_name']; ?>" width="300" height="200" /></a>
        <div class="hadabs">
          <h3><a href="<?php echo base_url().$catefive['cate_rewrite']; ?>.html"><?php echo $catefive['cate_name']; ?></a></h3>
          <p><?php echo $catefive['cate_info']; ?></p>
        </div>
      <?php } ?>
      </div>
      <div class="hacolums last" style="padding-top:15px">
      <?php if(isset($listfive)){ ?>
      <?php $i=1; foreach($listfive as $pediatric){ ?>
      	<?php if($i > 2){ ?>
        <div class="listright"> <a href="<?php echo base_url().$pediatric['cate_rewrite']."/".$pediatric['post_title_rewrite']."-".$pediatric['post_id']; ?>.html"><img src="<?php echo base_url()."uploads/hanews/thumb/".$pediatric['post_image']; ?>" alt="" height="40" width="60"></a> <!-- <span class="author"><?php echo $pediatric['post_author']; ?></span> -->
          <h3><a href="<?php echo base_url().$pediatric['cate_rewrite']."/".$pediatric['post_title_rewrite']."-".$pediatric['post_id']; ?>.html"><?php echo $pediatric['post_title']; ?></a></h3>
          <p class="title"><!-- <span class="author"><?php echo $pediatric['post_author']; ?></span> -->
			  <?php echo $this->utility->cut_str($pediatric['post_shotinfo'], 100); ?>
		  </p>
          <div class="clr"></div>
        </div>
      <?php } $i++; } } ?>
      </div>
      <div class="cls"></div>
    </div>
  </div>