    <br><br><br><br><br><br><br><br><br>
<div class="container">
<!-- pakai perulangan disini biar bisa nampilin banyak data yang disearch -->
<table class="table table-striped">
  <thead>
    <tr>
     <th>Hasil Pencarian</th>  
     </tr>
  </thead>
  <?php foreach ($hasil as $hasilitem): ?>
   <tbody>
     <tr>
       <td>Nama barang:&nbsp;<?php echo $hasilitem['nama_barang']?> &nbsp;| Supplier: <?php echo $hasilitem['nama_perusahaan']?> &nbsp;| Harga Barang: <?php echo $hasilitem['harga_barang']?> &nbsp;| Stok <?php echo $hasilitem['stok']?> &nbsp;&nbsp;<a href="<?php echo base_url('index.php/home/viewbarang/'. $hasilitem['id_barang'])?>" class="btn btn-secondary btn-sm">Lihat Barang</a> &nbsp; &nbsp;<a href="<?php echo base_url('index.php/home/viewprofil/'. $hasilitem['id_supplier'])?>" class="btn btn-secondary btn-sm">Lihat Supplier</a></td>
     </tr>
  <?php endforeach?>
  </tbody>
</table>
</div>
</div>