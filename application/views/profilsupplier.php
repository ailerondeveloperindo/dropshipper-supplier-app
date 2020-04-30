    <br><br><br><br><br>
<div class="container">
<!-- pakai perulangan disini biar bisa nampilin banyak data yang disearch -->
<table class="table table-striped">
  <thead>
    <tr>
     <th></th>  
     </tr>
  </thead>
  <?php foreach ($profile as $profilobject): ?>
   <tbody>
    <img src="<?php echo base_url('uploads/'.$profilobject['imagelink']) ?>" style="height: 300px; width:300px;">
    <tr>
      <td>
          Nama Supplier:       <?php echo $profilobject['Nama_Perusahaan']?>
      </td>
      <tr>
              <td>
          ID Supplier:       <?php echo $profilobject['id_supplier']?>
      </td>
      </tr>
    </tr>
      <td>Deskripsi:       <?php echo $profilobject['deskripsi']?></td>
     </tr>
  <?php endforeach?>

  </tbody>
</table>
</div>
</div>