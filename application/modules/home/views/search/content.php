<div id="content">
  <div id="navmenu">
    <h2>Search results</h2>
    <ul>
    <?php if(isset($listcago)){ ?>
    <?php $i=1;foreach($listcago as $menu){ ?>
    <li><a href="<?php echo base_url().$menu['cate_rewrite']."/".$menu['rewrite']; ?>.html"><?php echo $menu['name']; ?></a></li>
    <?php if($i == 5){ break;} $i++; } } ?>
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
      <div style="margin:10px 0px;border-bottom:1px solid #CCC"></div>
      <h2>Hot news</h2>
      <?php if(isset($newest)){ ?>
      <?php foreach($newest as $news){ ?>
      <div class="newslf"><a href="<?php echo base_url().$news['cate_rewrite']."/".$news['post_title_rewrite']."-".$news['post_id']; ?>.html"><img src="<?php echo base_url()."uploads/hanews/thumb/".$news['post_image']; ?>" alt="<?php echo $news['post_title']; ?>" title="<?php echo $news['post_title']; ?>" /></a>
        <h3><a href="<?php echo base_url().$news['cate_rewrite']."/".$news['post_title_rewrite']."-".$news['post_id']; ?>.html"><?php echo $news['post_title']; ?></a></h3>
      </div>
      <?php } } ?>
    </div>
    <div id="hamidd">
      <div id="homelink"><a href="<?php echo base_url(); ?>">Home</a> &raquo; <a href="#">Search results</a> </div>
      <div id="listnews">
        <?php if(isset($results) && $results != NULL){ ?>
        <?php foreach($results as $news){ ?>
        <div class="listnews">
          <h3><a href="<?php echo base_url().$news['cate_rewrite']."/".$news['post_title_rewrite']."-".$news['post_id']; ?>.html"><?php echo $news['post_title']; ?></a></h3>
          <a href="<?php echo base_url().$news['cate_rewrite']."/".$news['post_title_rewrite']."-".$news['post_id']; ?>.html"><img src="<?php echo base_url()."uploads/hanews/thumb/".$news['post_image']; ?>" alt="<?php echo $news['post_title']; ?>" title="<?php echo $news['post_title']; ?>" /></a>
          <div class="newsinfo"> <span class="author"><?php echo $news['post_author']; ?> </span>
            <time>30/05/2014 - 09:42:28</time>
            <span title="comment" class="iconcmmt">comment</span>1
            <div class="postinfo"><?php echo $news['post_shotinfo']; ?></div>
          </div>
          <div class="cls"></div>
        </div>
        <?php } }else{ ?>
        	<p>Sorry :( No result for "<?php echo $keywords; ?>"</p>
        <?php } ?>
      </div>
    </div>
    <div id="haright">
      <div id="hotright">
        <div id="hottitle">
          <ul>
            <li class="active"><a href="javascript:void(0)">Search</a></li>
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
            <p>Bắt đầu câu hỏi</p>
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