<div id="footer">
  <div id="footertop">
    <div class="footcols">
      <h3>Science</h3>
      <ul>
        <?php if(isset($menuone)){ ?>
        <?php foreach($menuone as $science){ ?>
          <li><a href="<?php echo base_url()."kid-".$science['cate_rewrite']."/".$science['rewrite']; ?>.html" title="<?php echo $science['name']; ?>"><?php echo $science['name']; ?></a></li>
        <?php } } ?>
      </ul>
    </div>
    <div class="footcols">
      <h3>Quiz questions</h3>
      <ul>
        <?php if(isset($menutwo)){ ?>
        <?php foreach($menutwo as $quiz){ ?>
          <li><a href="<?php echo base_url()."kid-".$quiz['cate_rewrite']."/".$quiz['rewrite']; ?>.html" title="<?php echo $quiz['name']; ?>"><?php echo $quiz['name']; ?></a></li>
        <?php } } ?>
      </ul>
    </div>
    <div class="footcols">
      <h3>Cool math</h3>
      <ul>
        <li><a href="<?php echo base_url(); ?>kid-cool-math/maths-puzzles-for-kids.html" title="Maths puzzles for kids">Maths puzzles for kids</a></li>
        <li><a href="<?php echo base_url(); ?>kid-cool-math/math-test.html" title="Math test">Math test</a></li>
      </ul>
    </div>
    <div class="footcols">
      <h3>Kids art</h3>
      <ul>
        <?php if(isset($menuthree)){ ?>
        <?php foreach($menuthree as $art){ ?>
          <li><a href="<?php echo base_url()."kid-".$art['cate_rewrite']."/".$art['rewrite']; ?>.html" title="<?php echo $art['name']; ?>"><?php echo $art['name']; ?></a></li>
        <?php } } ?>
      </ul>
    </div>
    <div class="footcols flast">
      <h3>Cooking</h3>
      <ul>
        <?php if(isset($menufour)){ ?>
        <?php foreach($menufour as $cooking){ ?>
          <li><a href="<?php echo base_url()."kid-".$cooking['cate_rewrite']."/".$cooking['rewrite']; ?>.html" title="<?php echo $cooking['name']; ?>"><?php echo $cooking['name']; ?></a></li>
        <?php } } ?>
      </ul>
    </div>
    <div class="cls"></div>
  </div>
  <div id="footerbot">
    <p><strong>KID'S IDEA, WEBSITE FOR KIDS CREATIVELY WITH YOUR KIDS</strong></p>
    <p>Developed by a group of passionate experts in IT Development and Digital Marketing</p>
    <p>Owned by Mr.Don Miller and Mr.Hai Dang</p>
    <p>Contact: haanhdon@gmail.com</p>
    <a href="<?php echo base_url();?>"><img src="<?php echo base_url(); ?>public/images/logo.png" alt="Website for kids" title="Website for kids" width="250" style="opacity:0.3;position:absolute;right:0px;top:30px" /></a>
  </div>
</div>