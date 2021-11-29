        <div class="my-3 my-md-5">
          <div class="container">
          <div class="card">
          <div class="card-header">
            <h3 class="card-title">Isi Informasi Order</h3>
           </div>
            <div class="card-body">
              <div class="row">
              <div class="col-md-6 col-lg-4">
             		<a href="<?php echo base_url() ?>" class="btn btn-secondary btn-sm">Kembali</a>
         		</div>
           </div>
           <br>
           	<div class="row">
           	<div class="col-md-6 col-lg-4">
                <?php foreach($barang as $baranglist): ?>
              <?php echo form_open('penjual/prosespesanan/'.$baranglist['id_barang']) ?>
             	   <div class="form-group">
                          <label class="form-label">ID Barang</label>
                          <input type="text" class="form-control" name="id_barang" placeholder="Input" readonly value="<?php echo $baranglist['id_barang'] ?>">
                  </div>
             	   <div class="form-group">
                          <label class="form-label">Nama Barang</label>
                          <input type="text" class="form-control" name="nama_barang" placeholder="Input" readonly value=" <?php echo  $baranglist['Nama_Barang']?>">
                  </div>
                <?php endforeach; ?>
              	   <div class="form-group">
                          <label class="form-label">Nama Customer</label>
                          <input type="text" class="form-control" name="nama_customer" placeholder="Input">
                  </div>
             	   <div class="form-group">
                          <label class="form-label">Alamat Customer</label>
                          <input type="text" class="form-control" name="alamat_customer" placeholder="Input">
                  </div>
              	   <div class="form-group">
                          <label class="form-label">Jumlah</label>
                          <input type="text" class="form-control" name="jumlah" placeholder="Input">
                  </div>
             </div>
             <div class="col-md-6 col-lg-4">
                   <div class="form-group">
                        <div class="form-label">Metode Pembayaran</div>
                        <div class="custom-controls-stacked">
                          <label class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="example-radios" value="option1" checked>
                            <div class="custom-control-label">Rekening Bank</div>
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                      <label class="form-label">Pilih Kurir</label>
                        <select class="form-control custom-select" name="id_kurir">
                        <?php foreach($kurir as $kuriritem): ?>
                          <option value="<?php echo $kuriritem['Id_Kurir'] ?>"><?php echo $kuriritem['Nama_Kurir'] ?></option>
                        <?php endforeach; ?>
                        </select>
                      </div>
                    <br> <br> <br> <br> <br> <br> <br> 
            		<h3 class="card-title">Total Pembayaran :
                </h3>
            		<input type="submit" name="submit" class="btn btn-primary ml-auto" value="Checkout >">
           </form>
           	</div>
          </div>
      </div>
     </div>
    </div>
</div>