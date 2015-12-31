<div id="hottitle">
  <ul>
    <li class="active"><a href="#">Search</a></li>
    <li><a href="#">Video</a></li>
  </ul>
</div>
<div class="cls"></div>
<div id="hotcontent">
  <div class="ancontent">
    <div class="formans">
      <?php $this->load->view("layouts/search"); ?>
    </div>
    <div class="ranquest">
    <?php $this->load->view("layouts/randquest"); ?>
    </div>
  </div>
  <div class="qucontent">
    <p>Start new question</p>
  </div>
</div>