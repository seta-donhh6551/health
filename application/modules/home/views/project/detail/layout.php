<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
<meta name="keywords" content="Gemico, Be Tong, Co Dien, Lap Dat, He Thong Dien, Lap Dat Dien, Thi Cong He Thong, Lap Dat Dien" />
<meta name="description" content="Gemico, Be Tong, Co Dien, Lap Dat, He Thong Dien, Lap Dat Dien, Thi Cong He Thong, Lap Dat Dien" />
<link href="<?php echo base_url();?>public/styles/newstyle.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>public/styles/menu.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>public/styles/ddsmoothmenu.css" type="text/css" media="all" />
<link href="<?php echo base_url();?>public/styles/nivo-slider.css" rel="stylesheet" type="text/css" media="screen" />
<?php $this->load->view("project/detail/scripts");?>
</head>

<body>
    <?php $this->load->view("project/detail/header");?>
    <?php $this->load->view("project/detail/content"); ?>
    <?php $this->load->view("project/detail/footer"); ?>
</body>
</html>