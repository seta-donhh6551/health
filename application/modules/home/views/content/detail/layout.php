<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="600" />
<title><?php echo $title; ?></title>
<link rel="author" href="https://plus.google.com/102870804259820301805" />
<link rel="canonical" href="<?php echo base_url(); ?>" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico" />
<meta name="keywords" content="<?php echo $read['con_keys']; ?>" />
<meta name="description" content="<?php echo $read['con_des']; ?>" />
<meta property="og:type" content="blog" />
<meta property="og:title" content="<?php echo $title; ?>" />
<meta property="og:description" content="<?php echo $read['con_des']; ?>" />
<meta property="og:url" content="<?php echo base_url(); ?>" />
<meta property="og:site_name" content="<?php echo $config['config_title']; ?>" />
<meta property="fb:admins" content="100003239486888"/>
<meta name="twitter:card" content="summary" />
<link rel="stylesheet" href="<?php echo base_url();?>public/styles/newstyle.css" type="text/css" media="screen" />
<?php $this->load->view("scripts");?>
<script type="text/javascript">
document.write('<div id="fb-root"></div>');
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&appId=199828456846777";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</head>

<body>
<?php $this->load->view("header");?>
<div id="main">
    <?php $this->load->view("content/detail/content"); ?>
    <?php $this->load->view("footer"); ?>
</div>
</body>
</html>