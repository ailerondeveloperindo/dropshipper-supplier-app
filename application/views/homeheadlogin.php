<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <!-- Core Css -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
  <!-- Content Css -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/home.css');?>">
  <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
</head>
<body>

<div class="container-fluid main">
<!-- Koding Navbar -->
  <nav class="navbar navbar-default">
    <div class="container-fluid">
<!-- Koding Minimize -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span> 
        </button>
<!-- Menu Brand -->
        <a class="navbar-brand" href="<?php echo base_url()?>">Dropshippin'</a>
      </div>
<!-- Menu Navbar -->
      <?php echo form_open('home/viewsearch') ?>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="<?php echo base_url('index.php/penjual/')?>"><?php echo $username?></a></li>
          <li><a href="<?php echo base_url('index.php/penjual/logout');?>">Logout</a></li>
                  <li><input type="text" class="form-control" placeholder="Search" name="search" style="width: 300px; margin-top: 10px"></li>
          <li><input type="submit" name="submit" class="btn btn-default" style="margin-top: 10px;"></li>
        </ul>
    </form>
      </div>
    </div>
  </nav>