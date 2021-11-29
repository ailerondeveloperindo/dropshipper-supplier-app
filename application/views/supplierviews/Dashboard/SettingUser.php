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
                     <?php echo form_open_multipart('upload/upload_gambarsupplier/'.$profileitem['id_supplier']);?>
                            <div class="row">
                            <input type="file" name="gambar" size="100"  class="btn btn-secondary btn-sm"/>
                            <input type="submit" name="submit" value="Ubah" class="btn btn-secondary btn-sm"/> 
                    </form>
                  </div>
              <?php echo form_open('supplier/edit_user') ?>
                        <div class="form-group">
                          <label class="form-label">Your ID</label>
                          <input type="text" class="form-control" name="id_supplier" placeholder="ID" readonly value="<?php echo $profileitem['id_supplier'];?>">
                        </div>
                        <div class="form-group">
                          <label class="form-label">Nama Perusahaan</label>
                          <input type="text" class="form-control" name="nama_perusahaan" placeholder="Input" value="<?php echo $profileitem['Nama_Perusahaan'];?>">
                        </div>
                        <div class="form-group">
                          <label class="form-label">Username</label>
                          <input type="text" class="form-control" name="username" placeholder="Input" value="<?php echo $profileitem['Username'];?>">
                        </div>
                        <div class="form-group">
                          <label class="form-label">Password</label>
                          <input type="text" class="form-control" name="password" placeholder="Input" value="">
                        </div>
                        <div class="form-group">
                          <label class="form-label">Alamat</label>
                          <input type="text" class="form-control" name="alamat" placeholder="Input" value="<?php echo $profileitem['Alamat'];?>">
                        </div>
                        <div>
                          <label class="form-label">Deskripsi Supplier</label>
                          <textarea class="form-control" name="deskripsi" rows="6" placeholder="Description"><?php echo $profileitem['deskripsi'];?></textarea>
                        </div>
                      </div>
               <div class="col-md-6 col-lg-4">
                <h3 class="card-title">Informasi Pembayaran</h3>
                        <div class="form-group">
                          <label class="form-label">Nomor Rekening</label>
                          <input type="text" class="form-control" name="nomor_rekening" placeholder="Input" value="<?php echo $profileitem['No_Rekening'];?>">
                        </div>
                        <div class="form-group">
                          <label class="form-label">Nama Bank</label>
                          <input type="text" class="form-control" name="nama_bank" placeholder="Input" value="<?php echo $profileitem['Nama_Bank'];?>">
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary ml-auto" value="Simpan Informasi">
                        <a href="<?php echo base_url('index.php/supplier/delete_account')?>" class="btn btn-danger">Tutup Akun</a>
               </div>
              </form>
             <?php endforeach; ?>
             </div>
                  </div>
            </div>
          </div>
        </div>
      </div>