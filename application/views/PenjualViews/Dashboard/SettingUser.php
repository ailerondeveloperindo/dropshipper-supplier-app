        <div class="my-3 my-md-5">
          <div class="container">
          <div class="card">
          <div class="card-header">
            <h3 class="card-title">Settings</h3>
           </div>
            <div class="card-body">
              <div class="row">
             <div class="col-md-6 col-lg-4">
                  <?php foreach($profile as $profileitem): ?>
                    <span class="avatar avatar-xxl" style="background-image: url(<?php echo base_url('/uploads/'.$profileitem['imagelink'])?>)"></span>
                     <?php echo form_open_multipart('upload/upload_gambarpenjual/'.$profileitem['id_penjual']);?>
                            <div class="row">
                            <input type="file" name="gambar" size="100"  class="btn btn-secondary btn-sm"/>
                            <input type="submit" name="submit" value="Ubah" class="btn btn-secondary btn-sm"/> 
                    </form>
                  <?php echo form_open('penjual/edit_user') ?>
                          </div>
                        <div class="form-group">
                          <label class="form-label">Your ID</label>
                          <input type="text" class="form-control" name="id_penjual" placeholder="ID" readonly value="<?php echo $profileitem['id_penjual']?>">
                        </div>
                        <div class="form-group">
                          <label class="form-label">Nama Perusahaan/Penjual</label>
                          <input type="text" class="form-control" name="nama_penjual" placeholder="Input" value="<?php echo $profileitem['Nama_Penjual']?>">
                        </div>
                        <div class="form-group">
                          <label class="form-label">Username</label>
                          <input type="text" class="form-control" name="username" placeholder="Input" value="<?php echo $profileitem['Username']?>">
                        </div>
                        <div class="form-group">
                          <label class="form-label">Password</label>
                          <input type="password" class="form-control" name="password" placeholder="Input">
                        </div>
                        <div class="form-group">
                          <label class="form-label">Alamat</label>
                          <input type="text" class="form-control" name="alamat" placeholder="Input" value="<?php echo $profileitem['Alamat']?>">
                        </div>
                      </div>
               <div class="col-md-6 col-lg-4">
                <h3 class="card-title">Informasi Pembayaran</h3>
                        <div class="form-group">
                          <label class="form-label">No Kartu Kredit/Debit</label>
                          <input type="text" class="form-control" name="nomor_kartu" placeholder="Input" value="<?php echo $profileitem['Nomor_Kartu']?>">
                        </div>
                        <div class="form-group">
                          <label class="form-label">Tanggal Habis Kartu</label>
                          <input type="text" class="form-control" name="tgl_kartu" placeholder="Input" value="<?php echo $profileitem['Tanggal_Habis']?>">
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary ml-auto" value="Simpan Informasi">
                        <a href="<?php echo base_url('index.php/penjual/delete_account')?>" class="btn btn-danger">Tutup Akun</a>
               </div>
             <?php endforeach; ?>
           </form>
             </div>
                  </div>
            </div>
          </div>
        </div>
      </div>