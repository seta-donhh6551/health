<div id="footer">
  <div id="footertop">
    <div class="footcols">
      <h3>Life Respect</h3>
      <ul>
          <li><a href="<?php echo base_url(); ?>about-us.html" title="About us">About us</a></li>
		  <li><a href="<?php echo base_url(); ?>privacy-policy.html" title="About us">Privacy Policy</a></li>
      </ul>
    </div>
    <div class="footcols">
      <h3>Dermatology</h3>
      <ul>
		  <li><a href="#">What is vitiligo?</a></li>
		  <li><a href="#">What is acne?</a></li>
        <?php if(isset($menuone)){ ?>
        <?php foreach($menuone as $quiz){ ?>
          <li><a href="<?php echo base_url().$quiz['cate_rewrite']."/".$quiz['rewrite']; ?>.html" title="<?php echo $quiz['name']; ?>"><?php echo $quiz['name']; ?></a></li>
        <?php } } ?>
      </ul>
    </div>
    <div class="footcols">
      <h3>Allergy</h3>
      <ul>
		<?php if(isset($menutwo)){ ?>
        <?php foreach($menutwo as $quiz){ ?>
          <li><a href="<?php echo base_url().$quiz['cate_rewrite']."/".$quiz['rewrite']; ?>.html" title="<?php echo $quiz['name']; ?>"><?php echo $quiz['name']; ?></a></li>
        <?php } } ?>
        <li><a href="<?php echo base_url(); ?>allergy/allergic-rhinitis.html" title="Allergic rhinitis">Allergic rhinitis</a></li>
      </ul>
    </div>
    <div class="footcols">
      <h3>Internal medecine</h3>
      <ul>
        <?php if(isset($menuthree)){ ?>
        <?php $i= 1; foreach($menuthree as $art){ ?>
		  <?php if($i <= 6){ ?>
          <li><a href="<?php echo base_url().$art['cate_rewrite']."/".$art['rewrite']; ?>.html" title="<?php echo $art['name']; ?>"><?php echo $art['name']; ?></a></li>
		  <?php } ?>
        <?php ++$i; } } ?>
      </ul>
    </div>
    <div class="footcols flast">
      <h3>Surgery</h3>
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
<script type="text/javascript" src="<?php echo base_url(); ?>public/scripts/scroll.js"></script>