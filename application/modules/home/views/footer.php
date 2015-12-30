<div id="footer">
  <div id="footertop">
    <div class="footcols">
      <h3>Life Respect</h3>
      <ul>
          <li><a href="<?php echo base_url(); ?>about-us.html" title="About us">About us</a></li>
      </ul>
    </div>
    <div class="footcols">
      <h3>Dermatology</h3>
      <ul>
        <?php if(isset($menutwo)){ ?>
        <?php foreach($menutwo as $quiz){ ?>
          <li><a href="<?php echo base_url()."kid-".$quiz['cate_rewrite']."/".$quiz['rewrite']; ?>.html" title="<?php echo $quiz['name']; ?>"><?php echo $quiz['name']; ?></a></li>
        <?php } } ?>
      </ul>
    </div>
    <div class="footcols">
      <h3>Allergy</h3>
      <ul>
        <li><a href="<?php echo base_url(); ?>kid-cool-math/maths-puzzles-for-kids.html" title="Maths puzzles for kids">Maths puzzles for kids</a></li>
        <li><a href="<?php echo base_url(); ?>kid-cool-math/math-test.html" title="Math test">Math test</a></li>
      </ul>
    </div>
    <div class="footcols">
      <h3>Internal medecine</h3>
      <ul>
        <?php if(isset($menuthree)){ ?>
        <?php foreach($menuthree as $art){ ?>
          <li><a href="<?php echo base_url().$art['cate_rewrite']."/".$art['rewrite']; ?>.html" title="<?php echo $art['name']; ?>"><?php echo $art['name']; ?></a></li>
        <?php } } ?>
      </ul>
    </div>
    <div class="footcols flast">
      <h3>Pediatrics</h3>
      <ul>
        <?php if(isset($menufour)){ ?>
        <?php foreach($menufour as $cooking){ ?>
          <li><a href="<?php echo base_url().$cooking['cate_rewrite']."/".$cooking['rewrite']; ?>.html" title="<?php echo $cooking['name']; ?>"><?php echo $cooking['name']; ?></a></li>
        <?php } } ?>
      </ul>
    </div>
    <div class="cls"></div>
  </div>
  <div id="footerbot">
	  <p><strong style="text-transform:uppercase">Life respect is a website that give free advice on your health advice</strong></p>
    <p>Developed by a group with great passion for human medical</p>
    <p>Owned by Don Miller and Hang Tovo, Copyright @ 2013 Liferespect.net - All right reservied</p>
    <p>Contact: info@liferespect.net</p>
    <a href="<?php echo base_url();?>"><img src="<?php echo base_url(); ?>public/images/logo.jpg" alt="Life respect is a website that give free advice on your health advice" width="250" style="opacity:0.3;position:absolute;right:0px;top:30px" /></a>
  </div>
</div>