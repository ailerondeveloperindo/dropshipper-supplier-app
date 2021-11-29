        <div class="my-3 my-md-5">
          <div class="container">
            <div class="page-header">
              <h1 class="page-title">
                Dashboard
              </h1>
            </div>
			<div class="card card-aside">
        <?php foreach($profile as $profileitem): ?>
			  <a href="#" class="card-aside-column" style="background-image: url(<?php echo base_url('/uploads/'.$profileitem['imagelink'])?>)"></a>
			  <div class="card-body d-flex flex-column">
			    <h4><?php echo $profileitem['Nama_Perusahaan'];?></a></h4>
          <div class="text-muted">Username: <?php echo $profileitem['Username'];?></div>
			    <div class="text-muted">Supplier</div>
			  </div>
      <?php endforeach; ?>
			</div>

			<!-- Tabel Dropship Barang-->
             <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Barang Anda</h3>&nbsp;
                    <a href="<?php echo base_url('index.php/supplier/viewadd_barang') ?>" class="btn btn-secondary btn-sm">Tambah +</a>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                      <thead>
                        <tr>
                          <th class="w-1">ID. Barang</th>
                          <th>Nama Barang</th>
                          <th>Gambar</th>
                          <th>Jenis Barang</th>
                          <th>Stok</th>
                          <th>Harga Barang</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($barang as $barangitem): ?>
                        <tr>
                          <td><span class="text-muted"><?php echo $barangitem['id_barang'] ?></span></td>
                          <td><?php echo $barangitem['Nama_Barang'] ?></td>
                          <td><?php if($barangitem['imagelink'] == NULL):?>
                            <?php echo form_open_multipart('upload/upload_gambar/'.$barangitem['id_barang']);?>
                            <div class="row">
                            <input type="file" name="gambar" size="100"  class="btn btn-secondary btn-sm"/>
                            <input type="submit" name="submit" value="Upload" class="btn btn-secondary btn-sm"/> 
                            </form>
                            </div>
                            <?php else: ?>
                              <img src="<?php echo base_url('uploads/'.$barangitem['imagelink']) ?>" style="height: 300px; width:300px; ">
                            <?php echo form_open_multipart('upload/upload_gambar/'.$barangitem['id_barang']);?>
                            <div class="row">
                            <input type="file" name="gambar" size="20"  class="btn btn-secondary btn-sm"/>
                            <input type="submit" name="submit" value="Edit Gambar" class="btn btn-secondary btn-sm"/> 
                            </form>
                            <?php endif; ?>
                          </td>
                          <td><?php echo $barangitem['Nama_Kategori'] ?></td>
                          <td>
                            <?php echo $barangitem['stok'] ?>
                          </td>
                          <td><?php echo 'Rp. '.number_format($barangitem['Harga_Barang'])?></td>
                          <td class="text-right">
                            <a href="<?php echo base_url('index.php/supplier/delete_barang/'.$barangitem['id_barang']) ?>" class="btn btn-secondary btn-sm">Hapus</a>
                          </td>
                          <td>
                            <a class="icon" href="<?php echo base_url('index.php/supplier/viewedit_barang/'.$barangitem['id_barang']) ?>">
                              <i class="fe fe-edit"></i>
                            </a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
             </div>
			<!-- Ending Tabel Dropship Barang-->
      <!-- Tabel Order Barang-->
             <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Order yang anda dapatkan</h3>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                      <thead>
                        <tr>
                          <th class="w-1">No. Pesanan</th>
                          <th>Nama Barang</th>
                          <th>Nama Penjual</th>
                          <th>Nama Customer</th>
                          <th>Alamat Customer</th>
                          <th>Jumlah</th>
                          <th>Total</th>
                          <th>Status</th>
                          <th>Terbayar</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($order as $orderitem): ?>
                        <tr>
                          <td><span class="text-muted"><?php echo $orderitem['no_pesanan'] ?></span></td>
                          <td><?php echo $orderitem['nama_barang']?></td>
                          <td><?php echo $orderitem['nama_penjual'] ?></td>
                          <td><?php echo $orderitem['nama_cust'] ?></a></td>
                          <td>
                            <?php echo $orderitem['alamat_cust'] ?>
                          </td>
                          <td>
                            <?php echo $orderitem['jumlah'] ?>
                          </td>
                          <td>
                             <?php echo $orderitem['total'] ?>                          
                          </td>

                          <td><?php 
                            if($orderitem['status'] == 0){
                              echo 'Belum Ditanggapi';
                            }
                            else
                            {
                              echo 'Diterima';
                            }

                           ?></td>
                          <td><?php 
                            if($orderitem['terbayar'] == 0){
                              echo 'Belum Dibayar';
                            }
                            else
                            {
                              echo 'Sudah Bayar';
                            }

                           ?></td>
                           <?php  if($orderitem['status'] == 0){ echo '
                          <td class="text-right">
                            <a href="'.base_url('index.php/supplier/terimapesanan/'.$orderitem['no_pesanan']).'" class="btn btn-secondary btn-sm">Terima Pesanan</a>
                          </td>
                          <td class="text-right">
                            <a href="'.base_url('index.php/supplier/tolakpesanan/'.$orderitem['no_pesanan']).'" class="btn btn-secondary btn-sm">Tolak Pesanan</a>
                          </td>
                          '; } else 
                          { 
                            if($orderitem['terbayar'] == 1)
                            {
                              echo '<td class="text-right"><a href="'.base_url('index.php/supplier/viewadd_resi/'.$orderitem['no_pesanan'].'/'.$orderitem['id_penjual']).'" class="btn btn-secondary btn-sm">Masukkan Resi</a></td>';
                            }
                            else
                            {
                              echo '<td class="text-right">Menunggu Pembayaran</td>';
                            }
                            }?>
                        </tr>
                      <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
             </div>
      <!-- Ending Tabel Dropship Barang-->
      <!-- Modal -->
