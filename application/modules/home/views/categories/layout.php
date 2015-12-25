<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="600" />
<title><?php echo $title; ?></title>
<link rel="author" href="https://plus.google.com/102870804259820301805" />
<link rel="canonical" href="<?php echo base_url(); ?>" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico" />
<meta name="keywords" content="<?php echo $categorie['keywords']; ?>" />
<meta name="description" content="<?php echo $categorie['description']; ?>" />
<link rel="stylesheet" href="<?php echo base_url();?>public/styles/style.css" type="text/css" media="screen" />
<?php $this->load->view("scripts");?>
</head>

<body>
<?php $this->load->view("header");?>
<div id="bottom">
    <?php $this->load->view("categories/content"); ?>
    <?php $this->load->view("footer"); ?>
</div>
</body>
</html>