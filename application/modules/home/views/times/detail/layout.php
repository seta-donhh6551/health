<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="600" />
<title><?php echo $title; ?></title>
<link rel="author" href="https://plus.google.com/102870804259820301805" />
<link rel="canonical" href="<?php echo base_url(); ?>" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico" />
<meta name="keywords" content="Khoa hoc PHP &amp; MYSQL, Khoa hoc PHP, Khoa hoc PHP o Ha Noi, Hoc lap trinh PHP, Hoc PHP o Ha Noi, Hoc PHP o dau tot" />
<meta name="description" content="Khoá học lập trình PHP tại Hà Nội, Học lập trình PHP tốt nhất. Học PHP từ cơ bản đến nâng cao tại phpandmysql.net" />
<meta property="og:type" content="blog" />
<meta property="og:title" content="Khoá học lập trình PHP từ căn bản đến nâng cao tại Hà Nội" />
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
    <?php $this->load->view("times/detail/content"); ?>
    <?php $this->load->view("footer"); ?>
</div>
</body>
</html>