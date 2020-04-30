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
       <?php echo form_open('/supplier/add_barang');?>
          <div>
              <label class="form-label">Nama Barang</label>
              <input class="form-control" name="nama_barang" rows="6" placeholder="Description"></input>
              </div>
                      <div class="form-group">
                      <label class="form-label">Jenis Barang</label>
                        <select class="form-control custom-select" name="id_kategori">
                          <?php foreach($category as $categoryitem): ?>
                          <option value="<?php echo $categoryitem['id_kategori']?>"><?php echo $categoryitem['Nama_Kategori']?></option>
                        <?php endforeach;?>
                        </select>
                      </div>
              <label class="form-label">Stok</label>
              <input class="form-control" name="stok" placeholder="Stok">
              <label class="form-label">Harga Barang</label>
              <input class="form-control" name="harga_barang" placeholder="Stok">
              <label class="form-label">Deskripsi Barang</label>
              <textarea class="form-control" name="deskripsi" rows="3" placeholder="Deskripsi Barang"></textarea>
              <input type="submit" name="submit" class="btn btn-default" value="Add">
              </form> 
          </div>
  </div>
</div> 
</body>
</html>