<!-- Bootstrap Table with Header - Light -->
  <div class="card">
	<h5 class="card-header">Donner list</h5>
	<div class="table-responsive text-nowrap">
	  <table class="table">
		<thead class="table-light">
		  <tr>
			<th>User</th>
			<th>Name</th>
			<th>Type</th>
			<th>Created</th>
			<th>Status</th>
			<th>Actions</th>
		  </tr>
		</thead>
		<tbody class="table-border-bottom-0">
		<?php 
		if(!empty($donnerList)){
			foreach($donnerList as $user){
		?>
		  <tr>
			<td><i class="fab fa-angular fa-lg text-danger me-3"></i><strong><?= img(array("src"=>$user['image'], "class"=>"w-px-40 h-auto rounded-circle"))?></strong></td>
			<td><?php echo $user['fname']?> <?php echo $user['lname']?></td>                        
			<td><span class="badge bg-label-primary me-1"><?php echo $user['type_name']?></span></td>
			<td><span class="badge bg-label-primary me-1"><?php echo dateView($user['created_date'])?></span></td>
			<th><span class="badge bg-label-<?php echo statusClass($user['status'])?> me-1"><?php echo $user['status']?></span></th>
			<td>
			<div class="d-inline-block text-nowrap">
				<a href="<?php echo base_url("user/edit/{$user['id']}")?>" class="btn btn-sm btn-icon"><i class="bx bx-edit"></i></a>
				<a href="<?php echo base_url("user/delete/{$user['id']}")?>" class="delete-record btn btn-sm btn-icon delete-record"><i class="bx bx-trash"></i></a>
				<button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
				<div class="dropdown-menu dropdown-menu-end m-0">
					<a href="<?php echo base_url("user/view/{$user['id']}")?>" class="dropdown-item"><i class="bx bx-user"></i> View</a>
					<a href="<?php echo base_url("user/suspend/{$user['id']}")?>" class="dropdown-item"><i class="bx bx-user-x"></i> Suspend</a>
					<a href="<?php echo base_url("user/edit/{$user['id']}")?>" class="dropdown-item"><i class="bx bx-edit"></i> Edit</a>
					<a href="<?php echo base_url("user/delete/{$user['id']}")?>" class="delete-record dropdown-item"><i class="bx bx-trash"></i> Delete</a>
				</div>
			</div>			  
			</td>
		  </tr>
			<?php }
		}?>
		  
		</tbody>
	  </table>
	</div>
  </div>
  <!-- Bootstrap Table with Header - Light -->