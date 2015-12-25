<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
<meta name="keywords" content="May Tinh Xach Tay, Laptop, Laptop Gia Re, May Van Phong, May In, May Fax, Camera Quan Sat, Thiet Bi Mang, Phan Mem" />
<meta name="description" content="May Tinh Xach Tay, Laptop, Laptop Gia Re, May Van Phong, May In, May Fax, Camera Quan Sat, Thiet Bi Mang, Phan Mem" />
<link href="<?php echo base_url();?>public/styles/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>public/styles/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>public/styles/tooltip.css" type="text/css" media="screen" />
<?php $this->load->view("user/forgot/scripts");?>
</head>

<body onload="goforit()">
	<div id="container">
    	<?php $this->load->view("user/forgot/header");?>
        <?php $this->load->view("user/forgot/content"); ?>
        <?php $this->load->view("user/forgot/footer"); ?>
    </div>
</body>
</html>