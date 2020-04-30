<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/login.css');?>">
	<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
</head>
<body style="background-color:#f0f0f0">
  <div class="form">
    <?php echo form_open('/supplier/checklogin');?>
    	<div class="description">Supplier Login</div>
      	<input type="text" name="username" placeholder="username"/>
     	  <input type="password" name="password" placeholder="password"/>
      	<input type="submit" name="submit" value="Login">
    </form>
    <p class="message"><a href="<?php echo base_url()?>">Back</a></p>
  </div>
</div> 
</body>
</html>