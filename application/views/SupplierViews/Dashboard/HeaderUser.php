<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="./favicon.ico" type="<?php echo base_url('image/x-icon')?>"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <!-- Generated: 2018-04-06 16:27:42 +0200 -->
    <title>Dropshippin | Dropship Platform</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/js/require.min.js')?>"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
      });
    </script>
    <link href="<?php echo base_url('assets/css/dashboard.css')?>" rel="stylesheet" />
    <script src="<?php echo base_url('assets/js/dashboard.js')?>"></script>
  </head>
  <body class="">
    <div class="page">
      <div class="page-main">
        <div class="header py-4">
          <div class="container">
            <div class="d-flex">
              <a class="header-brand" href="./index.html">
                <h3>Dropshippin'</h3>
              </a>
              <div class="d-flex order-lg-2 ml-auto">
                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url(<?php echo base_url('/demo/faces/female/25.jpg')?>)"></span>
                    <span class="ml-2 d-none d-lg-block">
                    <?php foreach($profile as $profileitem): ?>
                      <span class="text-default"><?php echo $profileitem['Username'];?></span>
                    <?php endforeach; ?>
                      <small class="text-muted d-block mt-1">Supplier</small>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="#">
                      <i class="dropdown-icon fe fe-log-out"></i> Sign out
                    </a>
                  </div>
                </div>
              </div>
              <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
              </a>
            </div>
          </div>
        </div>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-3 ml-auto">
              </div>
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <li class="nav-item">
                    <a href="<?php echo base_url('index.php/supplier')?>" class="nav-link <?php if($this->router->method == 'index'){echo 'active';}?>"><i class="fe fe-home"></i> Home</a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url('index.php/supplier/usersetting')?>" class="nav-link <?php if($this->router->method == 'usersetting'){echo 'active';}?>"><i class="fe fe-box"></i> Settings</a>
                  </li>
                   <li class="nav-item">
                    <a href="<?php echo base_url('index.php/supplier/logout')?>" class="nav-link"><i class="fe fe-box"></i> Logout</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>