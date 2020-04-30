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
			    <h4><a href="#"><?php echo $profileitem['Nama_Penjual']?></a></h4>
          <div class="text-muted">Username : <?php echo $profileitem['Username']?></div>
        <?php endforeach; ?>
			    <div class="text-muted">Penjual</div>
			  </div>
			</div>
			<!-- Tabel Tracking Barang-->
             <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Tracking Barang</h3>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                      <thead>
                        <tr>
                          <th class="w-1">No. Resi</th>
                          <th>Nama Customer Anda</th>
                          <th>Alamat Customer</th>
                          <th>No.Pesanan</th>
                          <th>Tanggal Kirim</th>
                          <th>Status</th>
                          <th>Kurir</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($pengiriman as $pengirimanlist): ?>
                        <tr>
                          <td><span class="text-muted"><?php echo $pengirimanlist['no_resi']?></span></td>
                          <td><?php echo $pengirimanlist['nama_cust']?></td>
                          <td>
                            <?php echo $pengirimanlist['alamat_cust']?>
                          </td>
                          <td>
                            <?php echo $pengirimanlist['no_pesanan']?>
                          </td>
                          <td>
                            <?php echo $pengirimanlist['tanggal_kirim']?>
                          </td>
                          <td>
                            <?php if($pengirimanlist['status']): ?>
                            <span class="status-icon bg-success"></span> Terkirim
                            <?php else: ?>
                            <span class="status-icon"></span> Belum Terkirim
                            <?php endif; ?>
                          </td>
                          <td>
                            <?php echo $pengirimanlist['nama_kurir']?>
                          </td>
                        <?php endforeach; ?>
                        </tr>
                      </tbody>
                    </table>
                  </div>
             </div>
			<!-- Ending Tabel Tracking Barang-->
 			<!-- Tabel Histori Pesanan-->
             <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Histori Pesanan</h3>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                      <thead>
                        <tr>
                          <th class="w-1">No. Pesanan</th>
                          <th>Tanggal Pesan</th>
                          <th>Nama Customer Anda</th>
                          <th>Alamat Customer Anda</th>
                          <th>Nama Barang</th>
                          <th>Jumlah</th>
                          <th>Status</th>
                          <th>Total</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($order as $orderlist): ?>
                        <tr>
                          <td><span class="text-muted"><?php echo $orderlist['no_pesanan'] ?></span></td>
                          <td><?php echo $orderlist['tanggal_pesanan'] ?></td>
                          <td><?php echo $orderlist['nama_cust'] ?></td>
                          <td><?php echo $orderlist['alamat_cust'] ?></td>
                          <td>
                           <?php echo $orderlist['nama_barang'] ?>
                          </td>
                          <td>
                           <?php echo $orderlist['jumlah'] ?>
                          </td>
                          <?php if($orderlist['terbayar'] == 1)
                          {
                            echo "                          <td>
                            <span class=".'status-icon bg-success'."></span> Terbayar
                          </td>";
                          }
                          else
                          {
                            echo "                          <td>
                            <span class=".'status-icon bg-red'."></span> Belum Dibayar
                          </td>";                          }
                          ?>
                          <td>
                            <?php echo $orderlist['total'] ?>
                          </td>
                          <?php if($orderlist['terbayar'] == 0): ?>
                          <td class="text-right">
                            <a href="<?php echo base_url('index.php/penjual/bayar/'.$orderlist['no_pesanan']) ?>" class="btn btn-secondary btn-sm">Bayar Sekarang</a>
                          </td>                            
                          <?php endif ?>
                          <td>  <a href="<?php echo base_url('index.php/penjual/batalkanpesanan/'.$orderlist['no_pesanan'])?>" class="btn btn-secondary btn-sm">Batalkan Pesanan</a></td>
                                                <td>
                          <a class="icon" href="<?php echo base_url('index.php/penjual/view_editpesanan/'.$orderlist['no_pesanan']) ?>">
                              <i class="fe fe-edit"></i>
                            </a>
                        </td>
                        </tr>
                      <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
             </div>
			<!-- Ending Tabel Pemem Barang-->
        </div>
      </div>