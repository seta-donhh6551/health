<?php
$api = file_get_contents('http://api.wunderground.com/api/383adebf8701e1ad/conditions/q/ca/San_Francisco.json');
$json_decode = json_decode($api);
$current_observation = $json_decode->current_observation;
//$this->utility->debug($current_observation);
?>
<div id="topsite">
  <div id="header">
	  <div id="weather" class="weather">
		<div class="weather-icon w17"></div>
		<div class="weather-temp">
			<p class="location"><?php echo $current_observation->display_location->city; ?></p>
			<p class="temps temp-now">Now <em><?php echo $current_observation->temp_c; ?>°</em></p>
		</div>
		<div class="weather-wind">
			<p class="forecast">Possible thunderstorm</p>
			<p class="warning"><a href="javascript:void(0)"class="warning">Weather warning</a></p>
			<p class="traffic">Traffic Conditions</p>
		</div>
		<!--a href="<?php echo base_url();?>"><img src="<?php echo base_url(); ?>public/images/weather.jpg" alt="Kid's idea, Projects for kids" title="Kid's idea, Projects for kids" width="250" /></a-->
	</div>
    <!-- <img src="<?php echo base_url();?>public/images/468x60-2.gif" alt="" style="float:right"/> -->
    <div id="midhead">
		<h1>
			<a href="<?php echo base_url(); ?>" title="The Sydney Morning Herald" class="logo">The Sydney Morning Herald</a>
			<a href="<?php echo base_url(); ?>" title="Independent. Always." class="sublogo" target="_blank"></a>
		</h1>
	</div>
    <div id="headris">
		<img src="<?php echo base_url();?>public/images/kid-activities.jpg" width="60" alt="kids activities"/>
    </div>
  </div>
  <div id="menu">
    <div id="menumid">
      <ul class="inactive" style="width:100%">
        <li><a href="<?php echo base_url(); ?>" title="Home"><!--span class="icon"></span-->Home</a></li>
        <?php if(isset($listcate)){ foreach($listcate as $menu){ ?>
        <li><a href="<?php echo base_url().$menu['cate_rewrite']; ?>.html" title="<?php echo $menu['cate_name']; ?>"><!--span class="icon"></span--><?php echo $menu['cate_name']; ?></a></li>
        <?php } } ?>
        <li><a href="<?php echo base_url(); ?>contact.html" title="Contact"><span class="icon"></span>Contact</a></li>
      </ul>
    </div>
  </div>
</div>