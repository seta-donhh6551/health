<?php
	$id = $_GET['cid'];
	$db = new cate;
	$db->set_cid($id);
	$db->del_cate();
	header("location:index.php?module=cate&act=list");
	exit();
?>