<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
<style type="text/css">
#wapper{
	width:500px;
	height:auto;
	margin:0px auto
}
a{
	text-decoration:none;
	color:#00F
}
a:hover{
	color:#F30
}
</style>
</head>

<body>
<div id="wapper">
	<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>public/images/error-404.jpg" alt="Not found 404" title="Not found 404" /></a>
    <h3>Page Not Found</h3>
    <p align="right"><a href="<?php echo base_url(); ?>" style="text-decoration:underline">Go home</a></p>
</div>
</body>
</html>