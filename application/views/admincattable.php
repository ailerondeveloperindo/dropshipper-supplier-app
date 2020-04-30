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
		 		<?php foreach ($categorylist as $userlist1): ?>
				<tr>
					<td><?php echo $userlist1['id_kategori']?></td>
					<td><?php echo $userlist1['Nama_Kategori']?></td>
					<td><a href="<?php echo base_url('index.php/categories/viewformedit/'.$userlist1['id_kategori'])?>" style="color: black;"> Edit </a>|<a style="color: black;" href="<?php echo base_url('index.php/admin/deletekategori/'.$userlist1['id_kategori'])?>"> Delete </a></td>
				</tr>
				<?php endforeach; ?>
				<a class="btn btn-primary" href="<?php echo base_url('index.php/categories/viewform')?>" role="button">Add Category</a> Total Data: <?php echo $categorycount?>
		 		</tbody>
		 	</table>
		 </div>
	</div>