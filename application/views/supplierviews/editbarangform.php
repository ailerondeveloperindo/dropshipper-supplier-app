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
    <?php foreach($barang as $baranglist): ?>
       <?php echo form_open('/supplier/edit_barang/'.$baranglist['id_barang']);?>
          <div>
              <label class="form-label">Nama Barang</label>
              <input class="form-control" name="nama_barang" rows="6" placeholder="Description" value="<?php echo $baranglist['Nama_Barang'] ?>"></input>
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
              <input class="form-control" name="stok" placeholder="Stok" value="<?php echo $baranglist['stok'] ?>">
              <label class="form-label">Harga Barang</label>
              <input class="form-control" name="harga_barang" placeholder="Stok" value="<?php echo $baranglist['Harga_Barang'] ?>">
              <label class="form-label">Deskripsi Barang</label>
              <textarea class="form-control" name="deskripsi" rows="3" placeholder="Deskripsi Barang"><?php echo $baranglist['deskripsi'] ?></textarea>
            <?php endforeach; ?>
              <input type="submit" name="submit" class="btn btn-default" value="Edit">
              </form> 
          </div>
  </div>
</div> 
</body>
</html>