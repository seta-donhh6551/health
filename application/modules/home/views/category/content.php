<div id="content">
  <div id="navmenu">
    <h2><?php echo $category['cate_name']; ?></h2>
    <ul>
    <?php if(isset($listcago)){ ?>
    <?php $i=1; foreach($listcago as $menu){ ?>
    <li><a href="<?php echo base_url()."kid-".$menu['cate_rewrite']."/".$menu['rewrite']; ?>.html"><?php echo $menu['name']; ?></a></li>
    <?php if($i == 4){ break;} $i++; } } ?>
    </ul>
  </div>
  <div id="heghlights">
    <div class="catehot">
      <!-- List types -->
      <?php if(isset($listtypes)){ ?>
      <?php foreach($listtypes as $types){ ?>
      	<div class="listtypes">
        	<?php $length = strlen($types['name']); ?>
        	<?php $name = str_replace("kids-","",$types['cate_rewrite']); ?>
        	<a href="<?php echo base_url().$name."-for-kids/".$types['rewrite']; ?>.html"><img src="<?php echo base_url()."uploads/cate/thumb/".$types['image']; ?>" alt="<?php echo $types['name']; ?>" title="<?php echo $types['name']; ?>" /></a>
            <h3 <?php if($length < 10){ echo "style='padding-left:10px'";}?>><a href="<?php echo base_url().$name."-for-kids/".$types['rewrite']; ?>.html"><?php echo $types['name']; ?></a></h3>
        </div>
      <?php } } ?>
    </div>
    <div class="catehot">
      <a href="<?php echo base_url().$category['cate_rewrite']; ?>.html"><img src="<?php echo base_url()."uploads/cate/thumb/$category[cate_images]"; ?>" width="300" height="180" alt="" /></a>
      <div class="absha">
        <h2><a href="<?php echo base_url().$category['cate_rewrite']; ?>.html"><?php echo $category['cate_name']; ?></a></h2>
        <p><?php echo $category['cate_info']; ?></p>
      </div>
    </div>    
    <div class="catehot" style="margin-right:0px">
      <!--h3> 
      	<img src="<?php echo base_url();?>public/images/star-icon.png" alt="" />
        <img src="<?php echo base_url();?>public/images/star-icon.png" alt="" />
        <img src="<?php echo base_url();?>public/images/star-icon.png" alt="" />
        <img src="<?php echo base_url();?>public/images/star-icon.png" alt="" />
        <img src="<?php echo base_url();?>public/images/star-icon.png" alt="" />
        Top rated
      </h3-->
      <ul>
      	<?php if(isset($related)){ ?>
		<?php foreach($related as $items){ ?>
		<li><a href="<?php echo base_url()."kid-".$items['cate_rewrite']."/".$items['post_title_rewrite']."-".$items['post_id']; ?>.html"><?php echo $items['post_title']; ?></a></li>
		<?php } } ?>
      </ul>
    </div>
    <div class="cls"></div>
  </div>
  <div id="category">
    <div id="haleft" class="topcate">
      <h2>All category</h2>
      <ul>
	    <?php if(isset($listcago)){ ?>
	    <?php foreach($listcago as $menu){ ?>
	    <li><a href="<?php echo base_url()."kid-".$menu['cate_rewrite']."/".$menu['rewrite']; ?>.html"><?php echo $menu['name']; ?></a></li>
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
    <div id="hamidd" class="topcate">
      <div id="homelink">
      	<a href="<?php echo base_url(); ?>">Home</a> &raquo; 
        <?php $catename = ucfirst(strtolower($category['cate_name'])); ?>
        <a href="<?php echo base_url().$category['cate_rewrite']; ?>.html" title="<?php echo $catename; ?>"><?php echo $catename; ?></a> 
      </div>
      <div id="listnews">
        <?php if(isset($results)){ ?>
        <?php foreach($results as $news){ ?>
        <div class="listnews">
          <a href="<?php echo base_url().$news['cate_rewrite']."/".$news['post_title_rewrite']."-".$news['post_id']; ?>.html"><img src="<?php echo base_url()."uploads/hanews/thumb/".$news['post_image']; ?>" alt="<?php echo $news['post_title']; ?>" title="<?php echo $news['post_title']; ?>" /></a>
          <h3><a href="<?php echo base_url().$news['cate_rewrite']."/".$news['post_title_rewrite']."-".$news['post_id']; ?>.html"><?php echo $news['post_title']; ?></a></h3>
          <div class="newsinfo"> <span class="author"><?php echo $news['post_author']; ?> </span>
            <time><?php echo $news['post_date']; ?></time>
            <span title="trả lời" class="iconcmmt">trả lời</span>
            <div class="postinfo"><?php echo mb_substr($news['post_shotinfo'], 0, 200, 'UTF-8'); ?>...</div>
          </div>
          <div class="cls"></div>
        </div>
        <?php } } ?>
      </div>
      <div id="pagination" style="text-align:right"><?php echo $this->pagination->create_links(); ?></div>
    </div>
    <div id="haright" class="topcate">
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
      <!--img src="<?php echo base_url(); ?>public/images/adsense-300x250.gif" width="250" alt="" /-->
     </div>
     <div id="adstwo">
      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- adsense 250x250 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:250px;height:250px"
     data-ad-client="ca-pub-3757150389090146"
     data-ad-slot="7088794911"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
      <!--img src="<?php echo base_url(); ?>public/images/adstwo.gif" width="250" alt="" /-->
     </div>
    </div>
    <div class="cls"></div>
  </div>
</div>