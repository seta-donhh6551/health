<div id="content">
  <div id="navmenu">
    <h2>Living healthy</h2>
    <ul>
    <?php if(isset($rancates)){ ?>
    <?php foreach($rancates as $menu){ ?>
    <li><a href="<?php echo base_url().$menu['cate_rewrite']."/".$menu['rewrite']; ?>.html"><?php echo $menu['name']; ?></a></li>
    <?php } } ?>
    </ul>
  </div>
	<div id="heghlights" class="mg-bot">
    <div class="threcls">
    <?php if(isset($listone)){ ?>
      <?php foreach($listone as $new){ ?>
      <div class="hotnews">
        <div class="hotnewsl"><a href="<?php echo base_url().$new['cate_rewrite']."/".$new['post_title_rewrite']."-".$new['post_id']; ?>.html"><img src="<?php echo base_url()."uploads/hanews/thumb/".$new['post_image']; ?>" alt="<?php echo $new['post_title']; ?>" title="<?php echo $new['post_title']; ?>" /></a> </div>
        <div class="hotnewsr">
          <h3><a href="<?php echo base_url().$new['cate_rewrite']."/".$new['post_title_rewrite']."-".$new['post_id']; ?>.html"><?php echo $new['post_title']; ?></a></h3>
		  <?php //echo $new['post_shotinfo']; ?>
          <p class="hdauthor">by <span><?php echo $new['post_author']; ?></span> at <?php echo date('Y-m-d', strtotime($new['post_date'])); ?></p>
        </div>
        <div class="cls"></div>
      </div>
      <?php } } ?>
    </div>
    <div class="threcls relative">
	<?php if(isset($cateone)){ ?>
		<a href="<?php echo base_url().$cateone['cate_rewrite']; ?>.html"><img src="<?php echo base_url(); ?>uploads/cate/thumb/<?php echo $cateone['cate_images']; ?>" alt="<?php echo $cateone['cate_name']; ?>" title="<?php echo $cateone['cate_name']; ?>" /></a>
		<div class="hadabs">
		  <h3><a href="<?php echo base_url().$cateone['cate_rewrite']; ?>.html"><?php echo $cateone['cate_name']; ?></a></h3>
		  <p><?php echo $cateone['cate_info']; ?></p>
		</div>
	<?php } ?>
    </div>
    <div class="threcls" style="width:298px" id="hotright">
      <div id="hottitle">
          <ul>
            <li class="active"><a href="javascript:void(0)" class="search">Search</a></li>
            <li><a href="javascript:void(0)">Video</a></li>
          </ul>
        </div>
        <div class="cls"></div>
        <div id="hotcontent">
          <div class="ancontent">
            <div class="formans">
              <form action="<?php echo base_url()."search.html"; ?>" method="get">
                <fieldset>
                  <input name="key" placeholder="Type your keywords" type="text" style="width:182px"/>
                  <input value="Search" type="submit"/>
                </fieldset>
              </form>
            </div>
            <div class="ranquest">
            <?php $this->load->view("layouts/randquest"); ?>
            </div>
          </div>
          <div class="qucontent">
            <p>Top video review</p>
          </div>
        </div>
    </div>
  </div>
  <div class="cls"></div>
  <div class="haboxs mg-bot br-reset">
	  <div class="surgery">
		  <div class="haboxtitle">
			  <h2>Pregnancy</h2>
			  <div class="dropdown-panel">
				<button class="dropdown-panel-toggle generic-selector">
					<span class="icon ddown">More</span>
				</button>
			  </div>
		  </div>
		  <div class="sur-content">
			  <?php if(isset($pregnancy) && $pregnancy){ ?>
			  <div class="hotquest mg-bot">
				  <h3><a href="<?php echo base_url().$pregnancy[0]['cate_rewrite'].'/'.$pregnancy[0]['post_title_rewrite'].'-'.$pregnancy[0]['post_id']; ?>.html" title="<?php echo $pregnancy[0]['post_title']; ?>"><?php echo $pregnancy[0]['post_title']; ?></a></h3>
				<div class="hadleft">
					<a href="<?php echo base_url().$pregnancy[0]['cate_rewrite'].'/'.$pregnancy[0]['post_title_rewrite'].'-'.$pregnancy[0]['post_id']; ?>.html">
						<img src="<?php echo base_url()."uploads/hanews/thumb/".$pregnancy[0]['post_image']; ?>" alt="<?php echo $pregnancy[0]['post_title']; ?>" height="66" width="86">
					</a>
				</div>
				<div class="hadright">
				  <p class="title"><?php echo $pregnancy[0]['post_shotinfo']; ?></p>
				</div>
				<div class="cls"></div>
			  </div>
			  <ul>
				  <?php unset($pregnancy[0]); ?>
				  <?php foreach($pregnancy as $posts){ ?>
				  <li><a href="<?php echo base_url().$posts['cate_rewrite'].'/'.$posts['post_title_rewrite'].'-'.$posts['post_id']; ?>.html" title="<?php echo $posts['post_title']; ?>"><?php echo $posts['post_title']; ?></a></li>
				  <?php } ?>
			  </ul>
			  <?php } ?>
		  </div>
	  </div>
	  <div class="surgery">
		  <div class="haboxtitle">
			  <h2>Newborn & Baby</h2>
			  <div class="dropdown-panel">
				<button class="dropdown-panel-toggle generic-selector">
					<span class="icon ddown">More</span>
				</button>
			  </div>
		  </div>
		  <div class="sur-content">
			  <div class="hotquest mg-bot">
				<h3><a href="#">How to make a paper boat</a></h3>
				<div class="hadleft"> <img src="http://localhost/health/uploads/hanews/thumb/symptoms-of-vitiligo.jpg" alt="" height="66" width="86"> </div>
				<div class="hadright">
				  <p class="title">
					  The paper boat is a folded boat able to swim - for a while. Obviously it is well known all over the ...			</p>
				</div>
				<div class="cls"></div>
			  </div>
			  <ul>
				  <li><a href="#">Sydney's losing something special</a></li>
				  <li><a href="#">Girl, 13, missing on family holiday</a></li>
				  <li><a href="#">Family's fury over father's death</a></li>
				  <li><a href="#">New Year's resolution as organisers back down</a></li>
			  </ul>
		  </div>
	  </div>
	  <div class="surgery mg-reset">
		  <div class="haboxtitle">
			  <h2>Children’s Health</h2>
			  <div class="dropdown-panel">
				<button class="dropdown-panel-toggle generic-selector">
					<span class="icon ddown">More</span>
				</button>
			  </div>
		  </div>
		  <div class="sur-content">
			  <div class="hotquest mg-bot">
				<h3><a href="#">How to make a paper boat</a></h3>
				<div class="hadleft"> <img src="http://localhost/health/uploads/hanews/thumb/symptoms-of-vitiligo.jpg" alt="" height="66" width="86"> </div>
				<div class="hadright">
				  <p class="title">
					  The paper boat is a folded boat able to swim - for a while. Obviously it is well known all over the ...			</p>
				</div>
				<div class="cls"></div>
			  </div>
			  <ul>
				  <li><a href="#">Sydney's losing something special</a></li>
				  <li><a href="#">Girl, 13, missing on family holiday</a></li>
				  <li><a href="#">Family's fury over father's death</a></li>
				  <li><a href="#">New Year's resolution as organisers back down</a></li>
			  </ul>
		  </div>
	  </div>
	  <div class="cls"></div>
  </div>
  <div class="haboxs haborone">
    <div class="heath haboxtitle">
      <h2><?php echo $catetwo['cate_name']; ?></h2>
      <ul>
      <?php if(isset($menutwo)){ ?>
      <?php foreach($menutwo as $menu){ ?>
        <li><a href="<?php echo base_url().$menu['cate_rewrite']."/".$menu['rewrite']; ?>.html"><?php echo $menu['name']; ?></a></li>
      <?php } } ?>
      </ul>
    </div>
    <div class="haboxcontent">
      <div class="hacolums">
      <?php if(isset($listtwo)){ ?>
      <?php $i=1; foreach($listtwo as $reviews){ ?>
      <?php if($i <= 2){ ?>
        <div class="hotquest">
          <h3><a href="<?php echo base_url().$reviews['cate_rewrite']."/".$reviews['post_title_rewrite']."-".$reviews['post_id']; ?>.html"><?php echo $reviews['post_title']; ?></a></h3>
          <div class="hadleft">
          	<img src="<?php echo base_url()."uploads/hanews/thumb/".$reviews['post_image']; ?>" alt="<?php echo $reviews['post_title']; ?>" title="<?php echo $reviews['post_title']; ?>" />
          </div>
          <div class="hadright">
            <p class="title">
				<span class="author"><?php echo $reviews['post_author']; ?></span>
				<?php echo $this->utility->cut_str($reviews['post_shotinfo'], 120); ?>
			</p>
          </div>
          <div class="cls"></div>
        </div>
        <?php } ?>
      <?php $i++; } } ?>
      </div>
      <div class="hacolums relative">
      <?php if(isset($catetwo)){ ?>
      	<a href="<?php echo base_url().$catetwo['cate_rewrite']; ?>.html"><img src="<?php echo base_url(); ?>uploads/cate/thumb/<?php echo $catetwo['cate_images']; ?>" alt="<?php echo $catetwo['cate_name']; ?>" title="<?php echo $catetwo['cate_name']; ?>" /></a>
        <div class="hadabs">
          <h3><a href="<?php echo base_url().$catetwo['cate_rewrite']; ?>.html"><?php echo $catetwo['cate_name']; ?></a></h3>
          <p><?php echo $catetwo['cate_info']; ?></p>
        </div>
      <?php } ?>
      </div>
      <div class="hacolums padingtop10 last">
      <?php if(isset($listtwo)){ ?>
      <?php $i=1; foreach($listtwo as $reviews){ ?>
      <?php if($i > 3 && $i <= 5){ ?>
        <div class="listright">
        	<a href="<?php echo base_url().$reviews['cate_rewrite']."/".$reviews['post_title_rewrite']."-".$reviews['post_id']; ?>.html"><img src="<?php echo base_url()."uploads/hanews/thumb/".$reviews['post_image']; ?>" alt="<?php echo $reviews['post_title']; ?>" title="<?php echo $reviews['post_title']; ?>" width="70" height="47" /></a>
          <h3><a href="<?php echo base_url().$reviews['cate_rewrite']."/".$reviews['post_title_rewrite']."-".$reviews['post_id']; ?>.html"><?php echo $reviews['post_title']; ?></a></h3>
          <p><?php echo $this->utility->cut_str($reviews['post_shotinfo'], 120); ?></p>
          <div class="clr"></div>
        </div>
      <?php } ?>
      <?php $i++; } } ?>
      </div>
      <div class="cls"></div>
    </div>
  </div>
  <div class="haboxs habortwo">
    <div class="haboxtitle">
      <h2><?php echo $catethree['cate_name']; ?></h2>
      <ul>
      <?php if(isset($menuthree)){ ?>
      <?php $k=1;foreach($menuthree as $menu){ ?>
		<?php if($k < 7){ ?>
        <li><a href="<?php echo base_url().$menu['cate_rewrite']."/".$menu['rewrite']; ?>.html"><?php echo $menu['name']; ?></a></li>
		<?php } ++$k;} } ?>
      </ul>
    </div>
    <div class="haboxcontent">
      <div class="hacolums">
      <!-- List types -->
      <?php if(isset($menuthree)){ ?>
      <?php $i=1;foreach($menuthree as $types){ ?>
        <?php if($i <= 6){ ?>
      	<div class="listtypes" style="margin:10px 0px 15px 0px">
        	<?php $length = strlen($types['name']); ?>
        	<?php $name = str_replace("kids-","",$types['cate_rewrite']); ?>
        	<a href="<?php echo base_url().$name."/".$types['rewrite']; ?>.html"><img src="<?php echo base_url()."uploads/cate/thumb/".$types['image']; ?>" alt="<?php echo $types['name']; ?>" title="<?php echo $types['name']; ?>" /></a>
            <h3 <?php if($length < 10){ echo "style='padding-left:10px'";}?>><a href="<?php echo base_url().$name."/".$types['rewrite']; ?>.html"><?php echo $types['name']; ?></a></h3>
        </div>
        <?php } ?>
      <?php $i++;} } ?>
      </div>
      <div class="hacolums relative">
        <?php if(isset($catethree)){ ?>
      	<a href="<?php echo base_url().$catethree['cate_rewrite']; ?>.html"><img src="<?php echo base_url(); ?>uploads/cate/thumb/<?php echo $catethree['cate_images']; ?>" alt="<?php echo $catethree['cate_name']; ?>" title="<?php echo $catethree['cate_name']; ?>" /></a>
        <div class="hadabs">
          <h3><a href="<?php echo base_url().$catethree['cate_rewrite']; ?>.html"><?php echo $catethree['cate_name']; ?></a></h3>
          <p><?php echo $catethree['cate_info']; ?></p>
        </div>
        <?php } ?>
      </div>
      <div class="hacolums last">
        <ul class="haquest">
          <?php if(isset($listthree)){ ?>
      	  <?php foreach($listthree as $diseases){ ?>
          <li><span class="author"><?php echo $diseases['post_author']; ?></span><a href="<?php echo base_url().$diseases['cate_rewrite']."/".$diseases['post_title_rewrite']."-".$diseases['post_id']; ?>.html" title="<?php echo $diseases['post_title']; ?>"><?php echo $diseases['post_title']; ?></a></li>
		  <?php } } ?>
        </ul>
      </div>
      <div class="cls"></div>
    </div>
  </div>
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
</div>
