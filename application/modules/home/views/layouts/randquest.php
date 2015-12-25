<ul>
<?php if(isset($randompost)){ ?>
<?php foreach($randompost as $items){ ?>
<li><a href="<?php echo base_url().$items['cate_rewrite']."/".$items['post_title_rewrite']."-".$items['post_id']; ?>.html"><?php echo $items['post_title']; ?></a></li>
<?php } } ?>
<li><a href="<?php echo base_url();?>" style="float:right">More than</a></li>
</ul>