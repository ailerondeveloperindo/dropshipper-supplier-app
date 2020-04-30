	<br><br><br><br>
	 <div class="main">
		 <div class="table-responsive">
		 	<table class="table table-striped">
		 		<thead>
		 			<tr>
						<th>ID Kategory</th>
						<th>Nama Kateogri</th>
						<th></th>
		 			</tr>
		 		</thead>
		 		<tbody>
		 		<?php foreach ($baranglist as $userlist1): ?>
				<tr>
					<td><?php echo $userlist1['id_barang']?></td>
					<td><?php echo $userlist1['Nama_Barang']?></td>
					<td><?php echo $userlist1['id_kategori']?></td>
					<td><?php echo $userlist1['id_supplier']?></td>
					<td><a style="color: black;" href="<?php echo base_url('index.php/admin/deletekategori/'.$userlist1['id_barang'])?>"> Delete </a></td>
				</tr>
				<?php endforeach; ?>
				Total Data: <?php echo $barangcount?>
		 		</tbody>
		 	</table>
		 </div>
	</div>