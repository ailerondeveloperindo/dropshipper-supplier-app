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
    <?php echo form_open('/supplier/editbarang/'.$id);?>
    	<div class="description">Edit Barang</div>
      	<input type="text" name="nama_barang" placeholder="Nama Barang"/>
        <input type="text" name="harga_barang" placeholder="Harga Barang"/>
        <input type="text" name="id_kategori" placeholder="id_kategori"/>
         <input type="text" name="id_supplier" placeholder="id_supplier"/>
      	<input type="submit" name="submit" value="Edit!">
    </form>
    <p class="message"><a href="<?php echo base_url('index.php/supplier/viewbarang')?>">Back</a></p>
  </div>
</div> 
</body>
</html>