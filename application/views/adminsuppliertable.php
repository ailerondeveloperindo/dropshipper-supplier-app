	<br><br><br><br>
	 <div class="main">
		 <div class="table-responsive">
		 	<table class="table table-striped">
		 		<thead>
		 			<tr>
						<th>ID_Supplier</th>
						<th>Nama Supplier</th>
						<th>Username</th>
						<th>Alamat</th>
						<th></th>
		 			</tr>
		 		</thead>
		 		<tbody>
		 		<?php foreach ($userlist as $userlist1): ?>
				<tr>
					<td><?php echo $userlist1['Id_Supplier']?></td>
					<td><?php echo $userlist1['Nama_Perusahaan']?></td>
					<td><?php echo $userlist1['Username']?></td>
					<td><?php echo $userlist1['Alamat']?></td>					
					<td><a style="color: black;" href="<?php echo base_url('index.php/admin/deletesupplier/'.$userlist1['Id_Supplier'])?>"> Delete </a>| <a style="color: black;" href="#">Show</a></td>
				</tr>
				<?php endforeach; ?>
				Total Data: <?php echo $usercount?>
		 		</tbody>
		 	</table>
		 </div>
	</div>