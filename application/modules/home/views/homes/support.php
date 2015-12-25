<div id="content_left_sup">
  <div id="support_title">
    <h2>Học PHP</h2>
  </div>
  <script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>
  <div id="support_content">
    <ul>
      <?php
		  foreach($support as $sups){
			  echo "<li><a href='skype:".$sups['sup_sky']."?call'><img src='".base_url()."public/images/skype-icon-small.png' alt='' title='' /></a></li>";
			  echo "<li><a href='ymsgr:SendIM?".$sups['sup_yahoo']."'><img src='http://opi.yahoo.com/online?u=".$sups['sup_yahoo']."&amp;m=g&amp;t=0' alt='' title='' /></a><span>".$sups['sup_name']."</span></li>";
		  }
        ?>
    </ul>
  </div>
  <div id="support_bot"></div>
</div>
