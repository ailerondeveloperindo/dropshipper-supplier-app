    <br><br><br><br><br>
<div class="container">
<!-- pakai perulangan disini biar bisa nampilin banyak data yang disearch -->
<table class="table table-striped">
  <thead>
    <tr>
     <th></th>  
     </tr>
  </thead>
  <?php foreach ($profilbarang as $profilobject): ?>
   <tbody>
    <img src="<?php echo base_url('uploads/'.$profilobject['imagelink']) ?>" style="height: 300px; width:300px;">
    <tr>
      <td>
          ID_Barang:       <?php echo $profilobject['id_barang']?>
      </td>
      <tr>
              <td>
          Supplier:       <?php echo $profilobject['id_supplier']?>
      </td>
      </tr>
    </tr>
     <tr>
       <td>Nama barang:       <?php echo $profilobject['Nama_Barang']?></td>
     </tr>
     <tr>
      <td>Harga barang:       <?php echo $profilobject['Harga_Barang']?></td>
     </tr>
     <tr>
      <td>Stok barang:       <?php echo $profilobject['stok']?></td>
     </tr>
     <tr>
      <td>Deskripsi:       <?php echo $profilobject['deskripsi']?></td>
     </tr>
     <tr>
       <td><a href="<?php echo base_url('index.php/penjual/ViewPesanan/'.$profilobject['id_barang']) ?>" class="btn btn-secondary btn-sm">Pesan</a>&nbsp;<a href="<?php echo base_url('index.php/home/viewprofil/'. $profilobject['id_supplier'])?>" class="btn btn-secondary btn-sm">Lihat Supplier</a>
       </td>
     </tr>
  <?php endforeach?>
  </tbody>
</table>
</div>
</div>