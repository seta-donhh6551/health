<script type="text/javascript" src="<?php echo base_url();?>public/scripts/first.js"></script>
<div id="content">
  <div id="navmenu">
    <h2><?php echo $result['cate_name']; ?></h2>
    <ul>
        <?php if(isset($listcago)){ ?>
	    <?php $i=1;foreach($listcago as $menu){ ?>
	    <li><a href="<?php echo base_url()."kid-".$menu['cate_rewrite']."/".$menu['rewrite']; ?>.html"><?php echo $menu['name']; ?></a></li>
	    <?php if($i == 5){ break; } $i++;} } ?>
    </ul>
  </div>
  <div id="category">
    <div id="haleft">
      <h2>All category</h2>
      <ul>
	    <?php if(isset($listcago)){ ?>
	    <?php foreach($listcago as $menu){ ?>
	    <li><a href="<?php echo base_url()."kid-".$menu['cate_rewrite']."/".$menu['rewrite']; ?>.html"><?php echo $menu['name']; ?></a></li>
	    <?php } } ?>
	  </ul>
      <div style="margin:10px 0px;border-bottom:1px solid #CCC"></div>
      <?php if(isset($related)){ ?>
      <?php foreach($related as $news){ ?>
      <div class="newslf"> <a href="<?php echo $news['post_title_rewrite']."-".$news['post_id']; ?>.html"><img src="<?php echo base_url()."uploads/hanews/thumb/".$news['post_image']; ?>" alt="<?php echo $news['post_title']; ?>" title="<?php echo $news['post_title']; ?>" /></a>
        <h3><a href="<?php echo $news['post_title_rewrite']."-".$news['post_id']; ?>.html"><?php echo $news['post_title']; ?></a></h3>
        <p class="hdauthor"><span><?php echo $news['post_author']; ?></span>/<?php echo $news['post_date']; ?></p>
      </div>
      <?php } } ?>
    </div>
    <div id="hamidd">
      <div id="homelink">
        <a href="<?php echo base_url(); ?>" title="Home">Home</a> &raquo;
        <?php $catename = ucfirst(strtolower($result['cate_name'])); ?>
        <a href="<?php echo base_url().$result['cate_rewrite']; ?>.html" title="<?php echo $catename; ?>"><?php echo $catename; ?></a> &raquo;
        <a href="<?php echo base_url().$result['cate_rewrite']."/".$result['post_title_rewrite']."-".$result['post_id']; ?>.html" title="<?php echo $result['post_title']; ?>"><?php echo $result['post_title']; ?></a>
      </div>
      <div id="detailnews" class="detailnews">
        <?php if(isset($result)){ ?>
        <h1><?php echo $result['post_title']; ?></h1>
        <div class="deshinfo"><?php echo $result['post_shotinfo']; ?></div>
        <p class="deshinfo">by <span><?php echo $result['post_author']; ?></span> at <?php if($result['post_date'] != NULL){ echo $result['post_date'];}else{ echo "...";}; ?> | source <?php echo $result['post_source']; ?></p>
        <?php if($result['post_image'] != NULL){ ?>
        <img src="<?php echo base_url()."uploads/hanews/$result[post_image]"; ?>" class="deimg" alt="<?php echo $result['post_title']; ?>" title="<?php echo $result['post_title']; ?>" />
        <?php } ?>
        <div class="deinfo"><?php echo $result['post_info']; ?></div>
        <div class="defull"><?php echo $result['post_value']; ?></div>
        <div class="deauthor" style="border-top:1px solid #CCC;margin-top:20px;padding-top:17px"></div>
        <div class="fb-comments" data-href="<?php echo $falink; ?>" data-width="500" data-numposts="5" data-colorscheme="light"></div>
        <?php } ?>
      </div>
    </div>
    <div id="haright">
      <div id="hotright">
        <div id="hottitle">
          <ul>
			  <li class="active"><a href="#" class="search">Search</a></li>
          </ul>
        </div>
        <div class="cls"></div>
        <div id="hotcontent">
          <div class="ancontent">
            <div class="formans">
              <?php $this->load->view("layouts/search");?>
            </div>
            <div class="ranquest">
              <?php $this->load->view("layouts/randquest");?>
            </div>
          </div>
          <div class="qucontent">
            <p>Video</p>
          </div>
        </div>
      </div>
      <div id="adsone">
      	<img src="<?php echo base_url(); ?>public/images/adsense-300x250.gif" width="250" alt="" />
      </div>
      <div id="adstwo">
      	<img src="<?php echo base_url(); ?>public/images/adstwo.gif" width="250" alt="" />
      </div>
    </div>
    <div class="cls"></div>
  </div>
</div>
