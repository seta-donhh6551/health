<script type="text/javascript" src="<?php echo base_url();?>public/scripts/first.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/scripts/articles.js"></script>
<div id="content">
  <div id="navmenu">
    <h2><?php echo $result['cate_name']; ?></h2>
    <ul>
        <?php if(isset($listcago)){ ?>
	    <?php $i=1;foreach($listcago as $menu){ ?>
	    <li><a href="<?php echo base_url().$menu['cate_rewrite']."/".$menu['rewrite']; ?>.html"><?php echo $menu['name']; ?></a></li>
	    <?php if($i == 5){ break; } $i++;} } ?>
    </ul>
  </div>
  <div id="category">
    <div id="haleft">
      <h2>All category</h2>
      <ul>
	    <?php if(isset($listcago)){ ?>
	    <?php foreach($listcago as $menu){ ?>
	    <li><a href="<?php echo base_url().$menu['cate_rewrite']."/".$menu['rewrite']; ?>.html"><?php echo $menu['name']; ?></a></li>
	    <?php } } ?>
	  </ul>
	  <div class="line"></div>
	  <div id="quick-view">
		  <h3>IN THIS ARTICLE</h3>
		  <ul>

		  </ul>
	  </div>
      <div class="line"></div>
      <?php if(isset($related)){ ?>
      <?php foreach($related as $news){ ?>
      <div class="newslf"> <a href="<?php echo $news['post_title_rewrite']."-".$news['post_id']; ?>.html"><img src="<?php echo base_url()."uploads/hanews/thumb/".$news['post_image']; ?>" alt="<?php echo $news['post_title']; ?>" title="<?php echo $news['post_title']; ?>" /></a>
        <h3><a href="<?php echo $news['post_title_rewrite']."-".$news['post_id']; ?>.html"><?php echo $news['post_title']; ?></a></h3>
        <p class="hdauthor"><span><?php echo $news['post_author']; ?></span>  <?php echo $news['post_date']; ?></p>
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
      <?php $this->load->view('layouts/search-ads'); ?>
    </div>
    <div class="cls"></div>
  </div>
</div>
