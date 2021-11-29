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
    <?php foreach($pesanan as $pesananlist): ?>
       <?php echo form_open('/penjual/edit_pesanan/'.$pesananlist['no_pesanan']);?>
              <label class="form-label">Nama Customer</label>
              <input class="form-control" name="nama_customer" placeholder="Stok" value="<?php echo $pesananlist['nama_cust'] ?>">
              <label class="form-label">Alamat Customer</label>
              <input class="form-control" name="alamat_customer" placeholder="Stok" value="<?php echo $pesananlist['alamat_cust'] ?>">
            <?php endforeach; ?>
              <input type="submit" name="submit" class="btn btn-default" value="Edit">
              </form> 
          </div>
  </div>
</div> 
</body>
</html>