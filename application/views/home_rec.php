    <br><br><br><br><br>
    <h3 class="text-center">Produk Terbaru!</h3>

<!-- Koding Gallery 1 -->
<?php foreach (array_reverse(array_slice($barang,0,4)) as $baranglist): ?>
    <div class="row row-centered">
<!-- Koding Gambar 1 -->
      <div class="col-md-3 col-centered">
          <a href="<?php echo base_url('index.php/home/viewbarang/'. $baranglist['id_barang'])?>">
            <img class="img-responsive" src="<?php echo base_url('uploads/'.$baranglist['imagelink']) ?>" alt="Barang_Jualan" width="300" height="200">
          </a>
          <div>Nama Barang</div>
          <div class="description"><?php echo $baranglist['Nama_Barang']?> <br>ID Barang :<?php echo $baranglist['id_barang']?> <br>Deskripsi :<?php echo $baranglist['deskripsi']?></div>
      </div>
<?php endforeach; ?>
    </div>

