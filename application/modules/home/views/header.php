<div id="topsite">
  <div id="header">
    <div id="logo"><a href="<?php echo base_url();?>"><img src="<?php echo base_url(); ?>public/images/logo.png" alt="Kid's idea, Projects for kids" title="Kid's idea, Projects for kids" width="250" /></a></div>
    <!-- <img src="<?php echo base_url();?>public/images/468x60-2.gif" alt="" style="float:right"/> -->
    <div id="midhead">
     <img src="<?php echo base_url();?>public/images/activities-for-kids.jpg" alt="activities for kids" width="60" />
     <!-- <img src="<?php echo base_url();?>public/images/adformat-display_300x250.png" alt="" /> --> </div>
    <div id="headris">
     <img src="<?php echo base_url();?>public/images/kid-activities.jpg" alt="kids activities"/>
    </div>
  </div>
  <div id="menu">
    <div id="menumid">
      <ul class="inactive" style="width:100%">
        <li><a href="<?php echo base_url(); ?>" title="Home"><!--span class="icon"></span-->Home</a></li>
        <?php if(isset($listcate)){ foreach($listcate as $menu){ ?>
        <li><a href="<?php echo base_url().$menu['cate_rewrite']; ?>.html" title="<?php echo $menu['cate_name']; ?>"><!--span class="icon"></span--><?php echo $menu['cate_name']; ?></a></li>
        <?php } } ?>
        <!-- <li><a href="#" title="More tech"><span class="icon"></span>More</a></li> -->
      </ul>
    </div>
  </div>
</div>