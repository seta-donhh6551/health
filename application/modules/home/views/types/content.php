<div id="content">
  <div id="navmenu">
    <h2><?php echo $categorie['name']; ?></h2>
    <ul>
    <?php if(isset($listcago)){ ?>
    <?php foreach($listcago as $menu){ ?>
    <li><a href="<?php echo base_url()."kid-".$menu['cate_rewrite']."/".$menu['rewrite']; ?>.html"><?php echo $menu['name']; ?></a></li>
    <?php } } ?>
    </ul>
  </div>  
  <div id="heghlights">
    <div class="listtoptype">
      <!-- List types -->
      <?php if(isset($relatedtypes)){ ?>
      <?php foreach($relatedtypes as $types){ ?>
      	<div class="listtypes">
        	<?php $length = strlen($types['name']); ?>
        	<?php $name = str_replace("kids-","",$types['cate_rewrite']); ?>
        	<a href="<?php echo base_url().$name."-for-kids/".$types['rewrite']; ?>.html"><img src="<?php echo base_url()."uploads/cate/thumb/".$types['image']; ?>" alt="<?php echo $types['name']; ?>" title="<?php echo $types['name']; ?>" /></a>
            <h3 <?php if($length < 10){ echo "style='padding-left:10px'";}?>><a href="<?php echo base_url().$name."-for-kids/".$types['rewrite']; ?>.html"><?php echo $types['name']; ?></a></h3>
        </div>
      <?php } } ?>
    </div>    
    <div class="cls"></div>
  </div>
  <div id="category">
    <div id="haleft">
      <h2>Hot news</h2>
      <?php if(isset($newest)){ ?>
      <?php foreach($newest as $news){ ?>
      <div class="newslf"><a href="<?php echo base_url().$news['cate_rewrite']."/".$news['post_title_rewrite']."-".$news['post_id']; ?>.html"><img src="<?php echo base_url()."uploads/hanews/thumb/".$news['post_image']; ?>" alt="<?php echo $news['post_title']; ?>" title="<?php echo $news['post_title']; ?>" /></a>
        <h3><a href="<?php echo base_url().$news['cate_rewrite']."/".$news['post_title_rewrite']."-".$news['post_id']; ?>.html"><?php echo $news['post_title']; ?></a></h3>
      </div>
      <?php } } ?>
    </div>
    <div id="hamidd">
      <div id="homelink">
      	<a href="<?php echo base_url(); ?>">Home</a> &raquo; 
        <?php $catename = ucfirst(strtolower($categorie['cate_name'])); ?>
        <a href="<?php echo base_url().$categorie['cate_rewrite']; ?>.html" title="<?php echo $catename; ?>"><?php echo $catename; ?></a> &raquo; 
        <a href="<?php echo base_url().$categorie['cate_rewrite']."/".$categorie['rewrite']; ?>.html" title="<?php echo $categorie['name']; ?>"><?php echo $categorie['name']; ?></a> 
      </div>
      <div id="listnews">
        <?php if(isset($results)){ ?>
        <?php foreach($results as $news){ ?>
        <div class="listnews">
          <a href="<?php echo base_url().$news['cate_rewrite']."/".$news['post_title_rewrite']."-".$news['post_id']; ?>.html"><img src="<?php echo base_url()."uploads/hanews/thumb/".$news['post_image']; ?>" alt="<?php echo $news['post_title']; ?>" title="<?php echo $news['post_title']; ?>" /></a>
          <h3><a href="<?php echo base_url().$news['cate_rewrite']."/".$news['post_title_rewrite']."-".$news['post_id']; ?>.html"><?php echo $news['post_title']; ?></a></h3>
          <div class="newsinfo"> <span class="author"><?php echo $news['post_author']; ?> </span>
            <time><?php echo $news['post_date']; ?></time>
            <span title="comment" class="iconcmmt">comment</span>
            <div class="postinfo"><?php echo $news['post_shotinfo']; ?></div>
          </div>
          <div class="cls"></div>
        </div>
        <?php } } ?>
      </div>
      <div id="pagination" style="text-align:right"><?php echo $this->pagination->create_links(); ?></div>
    </div>
    <div id="haright">
      <div id="hotright">
        <div id="hottitle">
          <ul>
            <li class="active"><a href="#">Search</a></li>
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
            <p>Website for kids</p>
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