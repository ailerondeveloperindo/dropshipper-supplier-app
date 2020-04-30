	<br><br><br><br>
	 <div class="main">
		 <div class="table-responsive">
		 	<table class="table table-striped">
		 		<thead>
		 			<tr>
						<th>ID_Penjual</th>
						<th>Nama Penjual</th>
						<th>Username</th>
						<th></th>
		 			</tr>
		 		</thead>
		 		<tbody>
		 		<?php foreach ($userlist as $userlist1): ?>
				<tr>
					<td><?php echo $userlist1['Id_Penjual']?></td>
					<td><?php echo $userlist1['Nama_Penjual']?></td>
					<td><?php echo $userlist1['Username']?></td>
					<td><a style="color: black;" href="<?php echo base_url('index.php/admin/deleteuser/'.$userlist1['Id_Penjual'])?>"> Delete </a>| <a style="color: black;" href="#">Show</a></td>
				</tr>
				<?php endforeach; ?>
				Total Data: <?php echo $usercount?>
		 		</tbody>
		 	</table>
		 </div>
	</div>