<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
<meta name="keywords" content="Thiet Bi Phong Chay, Thiet Bi Chua Chay, Phong Chay Chua Chay, Cuu Hoa , An Toan Chay No, An Ninh Dien Tu" />
<meta name="description" content="Thiet Bi Phong Chay, Thiet Bi Chua Chay, Phong Chay Chua Chay, Cuu Hoa , An Toan Chay No, An Ninh Dien Tu" />
<link href="<?php echo base_url();?>public/styles/reset.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>public/styles/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>public/styles/coin-slider-styles.css" type="text/css" media="all" />
<?php $this->load->view("news/all/scripts");?>
</head>

<body>
    <?php $this->load->view("news/all/header");?>
    <?php $this->load->view("news/all/content"); ?>
    <?php $this->load->view("news/all/footer"); ?>
</body>
</html>