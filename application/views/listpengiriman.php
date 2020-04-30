	<br><br><br><br>
	 <div class="main">
		 <div class="table-responsive">
		 	<table class="table table-striped">
		 		<thead>
		 			<tr>
						<th>No_Resi</th>
						<th>Tanggal Kirim</th>
						<th>Status</th>
						<th></th>
		 			</tr>
		 		</thead>
		 		<tbody>
		 		<?php foreach ($list as $pengirimanlist): ?>
				<tr>
					<td><?php echo $pengirimanlist['No_Resi']?></td>
					<td><?php echo $pengirimanlist['tanggal_kirim']?></td>
					<td><?php echo $pengirimanlist['Status']?></td>
					<td><a style="color: black;" href="<?php echo base_url('index.php/admin/deletepengiriman/'.$pengirimanlist['No_Resi']) ?>"> Delete </a>| <a style="color: black;" href="<?php echo base_url('index.php/admin/statuspengiriman/'.$pengirimanlist['No_Resi']) ?>">Konfirmasi</a></td>
				</tr>
				<?php endforeach; ?>
		 		</tbody>
		 	</table>
		 </div>
	</div>