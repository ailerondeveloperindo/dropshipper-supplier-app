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
    <?php echo form_open('/courier/editcourier/'.$id);?>
    	<div class="description">Edit Kurir</div>
      <?php foreach($kurir as $kurirname): ?>
      	<input type="text" name="nama_kurir" placeholder="Nama Kurir" value="<?php echo $kurirname['Nama_Kurir'] ?>"/>
      <?php endforeach; ?>
      	<input type="submit" name="submit" value="Edit!">
    </form>
    <p class="message"><a href="<?php echo base_url('index.php/admin/getcourierlist')?>">Back</a></p>
  </div>
</div> 
</body>
</html>