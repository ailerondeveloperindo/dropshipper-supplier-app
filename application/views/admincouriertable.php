	<br><br><br><br>
	 <div class="main">
		 <div class="table-responsive">
		 	<table class="table table-striped">
		 		<thead>
		 			<tr>
						<th>ID_Kurir</th>
						<th>Nama Kurir</th>
						<th></th>
		 			</tr>
		 		</thead>
		 		<tbody>
		 		<?php foreach ($courierlist as $userlist1): ?>
				<tr>
					<td><?php echo $userlist1['Id_Kurir']?></td>
					<td><?php echo $userlist1['Nama_Kurir']?></td>				
					<td><a href="<?php echo base_url('index.php/courier/viewformedit/'.$userlist1['Id_Kurir'])?>" style="color: black;"> Edit </a>|<a style="color: black;" href="<?php echo base_url('index.php/admin/deletekurir/'.$userlist1['Id_Kurir'])?>"> Delete</a></td>
				</tr>
				<?php endforeach; ?>
				<a class="btn btn-primary" href="<?php echo base_url('index.php/courier/viewform')?>" role="button">Add Courier</a>  Total Data: <?php echo $couriercount?>
		 		</tbody>
		 	</table>
		 </div>
	</div>