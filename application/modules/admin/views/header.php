<script type="text/javascript">
	$(document).ready(function(){
		var $items = $("ul#menu li a");
		$items.eq(<?php if(isset($act)){echo $act;}else{ echo 0;} ?>).addClass("selected_lk");
	});
</script>
<div id="header_main_menu"> <span id="header_main_menu_bg"></span> 
  <!--[if !IE]>start header<![endif]-->
  <div id="header">
    <div class="inner">
      <h1 id="logo"><a href="<?php echo base_url()."admin/index"; ?>"><img src="<?php echo base_url(); ?>admin/styles/layout/white/logo.png" /></a></h1>
      
      <!--[if !IE]>start user details<![endif]-->
      <div id="user_details">
        <ul id="user_details_menu">
          <li class="welcome">Welcome <strong><?php echo $this->session->userdata('ses_user'); ?>(<a class="new_messages" href="#">1 new message</a>)</strong></li>
          <li>
            <ul id="user_access">
              <li class="first"><a href="<?php echo base_url()?>" target="_blank">View home</a></li>
              <li class="last"><a href="<?php echo base_url()."admin/verify/logout";?>">Log out</a></li>
            </ul>
          </li>
        </ul>
        <div id="server_details">
          <dl>
            <dt>Server time :</dt>
            <dd>9:22 AM | 03/04/2009</dd>
          </dl>
          <dl>
            <dt>Last login ip :</dt>
            <dd>192.168.0.25</dd>
          </dl>
        </div>
      </div>
      
      <!--[if !IE]>end user details<![endif]--> 
    </div>
  </div>
  <!--[if !IE]>end header<![endif]--> 
  
  <!--[if !IE]>start main menu<![endif]-->
  <div id="main_menu">
    <div class="inner">
      <ul id="menu">
        <li> <a href="<?php echo base_url()."admin/index"; ?>"><span class="l"><span></span></span><span class="m"><em>Home</em><span></span></span><span class="r"><span></span></span></a></li>
        <!-- <li><a href="<?php echo base_url()."admin/articles"; ?>"><span class="l"><span></span></span><span class="m"><em>Menu home</em><span></span></span><span class="r"><span></span></span></a></li> -->
        <li> <a href="<?php echo base_url()."admin/user"; ?>"><span class="l"><span></span></span><span class="m"><em>Users</em><span></span></span><span class="r"><span></span></span></a> 
        </li>
        <li><a href="<?php echo base_url()."admin/cate"; ?>"><span class="l"><span></span></span><span class="m"><em>Category</em><span></span></span><span class="r"><span></span></span></a></li>
        <li><a href="<?php echo base_url()."admin/categorie"; ?>"><span class="l"><span></span></span><span class="m"><em>Categories</em><span></span></span><span class="r"><span></span></span></a></li>
        <li><a href="javascript:void(0)"><span class="l"><span></span></span><span class="m"><em>News</em><span></span></span><span class="r"><span></span></span></a></li>
        <!-- <li><a href="<?php echo base_url()."admin/products"; ?>"><span class="l"><span></span></span><span class="m"><em>Products</em><span></span></span><span class="r"><span></span></span></a></li> -->
        <li><a href="<?php echo base_url()."admin/posts"; ?>"><span class="l"><span></span></span><span class="m"><em>Articles</em><span></span></span><span class="r"><span></span></span></a></li>
        <li><a href="<?php echo base_url()."admin/intro/index"; ?>"><span class="l"><span></span></span><span class="m"><em>Introductions</em><span></span></span><span class="r"><span></span></span></a></li>
        <li><a href="<?php echo base_url()."admin/contact/index"; ?>"><span class="l"><span></span></span><span class="m"><em>Contact</em><span></span></span><span class="r"><span></span></span></a></li>
        <li><a href="<?php echo base_url()."admin/config"; ?>"><span class="l"><span></span></span><span class="m"><em>Config</em><span></span></span><span class="r"><span></span></span></a></li>
      </ul>
    </div>
    <span class="sub_bg"></span> </div>
  <!--[if !IE]>end main menu<![endif]--> 
  
</div>