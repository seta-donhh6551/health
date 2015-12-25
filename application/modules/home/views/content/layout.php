<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="600" />
<title><?php echo $title; ?></title>
<link rel="author" href="https://plus.google.com/102870804259820301805" />
<link rel="canonical" href="<?php echo base_url(); ?>" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico" />
<meta name="keywords" content="Hoc PHP O Dau Tot Nhat, Hoc PHP O Ha Noi, Hoc PHP MYSQL, Lap Trinh PHP, PHP Can Ban, PHP Nang Cao, Khoa Hoc PHP, Hoc Thiet Ke Website O Dau, Hoc Thiet Ke Web" />
<meta name="description" content="Học thiết kế website ở đâu tốt nhất, Học thiết kế website tại Hà Nội, Học lập trình PHP ở đâu tốt nhất, Học lập trình web ở Hà Nội, Khóa học lập trình PHP tại Hà Nội" />
<meta property="og:type" content="blog" />
<meta property="og:title" content="<?php echo $config['config_title']; ?>" />
<meta property="og:description" content="<?php echo $config['config_des']; ?>" />
<meta property="og:url" content="<?php echo base_url(); ?>" />
<meta property="og:site_name" content="<?php echo $config['config_title']; ?>" />
<meta name="twitter:card" content="summary" />
<link rel="stylesheet" href="<?php echo base_url();?>public/styles/newstyle.css" type="text/css" media="screen" />
<?php $this->load->view("scripts");?>
</head>

<body>
<?php $this->load->view("header");?>
<div id="main">
    <?php $this->load->view("content/content"); ?>
    <?php $this->load->view("footer"); ?>
</div>
</body>
</html>