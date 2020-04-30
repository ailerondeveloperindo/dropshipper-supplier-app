<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $mytitle?></title>
	<!-- Core Css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
  <!-- Content Css -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/admin.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/table.css');?>">
	<script src="assets/js/jquery.min.js""></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<!--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->
  <style> 
  	a:link {
    	color: white;
	} 
	a:visited {
    	color: white;
	}
	a:hover {
   	 	color: yellow;
	}
	</style>
</head>
<body>
	 <div class="sidenav">
	 	<h2><a href="home.html" style="text-align: center;"><?php echo $appname?></a></h2>
	 	<span class="dot"></span>
	 	<p><?php echo $adminname?></p>
	 	<a href="<?php echo base_url('index.php/admin');?>">Dashboard</a>
	 	<a href="<?php echo base_url('index.php/admin/getcategorylist');?>">Category List</a>
	 	<a href="<?php echo base_url('index.php/admin/getcourierlist');?>">Courier List</a>
	 	<a href="<?php echo base_url('index.php/admin/getpengirimanlist');?>">Pengiriman</a>
	 	<a href="<?php echo base_url('index.php/home');?>">Logout</a>
	 </div>