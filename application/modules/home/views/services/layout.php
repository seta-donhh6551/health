<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="600" />
<title><?php echo $title; ?></title>
<link rel="author" href="https://plus.google.com/102870804259820301805" />
<link rel="canonical" href="http://www.northstar.vn/" />
<link rel="shortcut icon" href="http://www.northstar.vn/favicon.ico" />
<meta name="keywords" content="<?php echo $config['config_key']; ?>" />
<meta name="description" content="<?php echo $config['config_des']; ?>" />
<meta property="og:type" content="blog" />
<meta property="og:title" content="<?php echo $title; ?>" />
<meta property="og:description" content="<?php echo $config['config_des']; ?>" />
<meta property="og:url" content="http://www.northstar.vn/" />
<meta property="og:site_name" content="<?php echo $title; ?>" />
<meta name="twitter:card" content="summary" />
<link rel="stylesheet" href="<?php echo base_url();?>public/styles/style.css" type="text/css" media="screen" />
<?php $this->load->view("scripts");?>
</head>

<body>
<div id="container">
    <?php $this->load->view("header");?>
    <?php $this->load->view("services/content"); ?>
    <?php $this->load->view("footer"); ?>
</div>
</body>
</html>