

<?php $role_id = $this->session->userdata('user_data')['role'];?>
    <div class="row m-5">
	   <div class="col-12 col-md-12">




	 <?php if ($this->session->flashdata('success')): ?>

			<div class="alert alert-success alert-dismissible fade show" role="alert">
			<?php echo $this->session->flashdata('success'); ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			
   

     <?php endif; ?>

      <?php if ($this->session->flashdata('error')): ?>

		<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<?php echo $this->session->flashdata('error'); ?>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
     <?php endif; ?>

    <?php if($role_id == 2):?>

							<div class="text-end">
						<a href="<?php echo base_url('Dashboard/Add_Doctor')?>"class="btn btn-info mb-2">Add Doctor</a>
							</div>
							<div class="card">
								<div class="card-body">
									<table class="table table-striped" id="dashboard_table">
										<thead>
											<th>Profile</th>
											<th>Name</th>
											<th>Speciality</th>
											<th>User Name</th>
											<th>Status</th>
											<th>Action</th>
											</thead>
										<tbody>
											<?php $id = $this->session->userdata('user_data')['user_id']; ?>
										<?php if($all_user){?>
											<?php foreach ($all_user as $key => $value) : ?>
								
												<tr>
													<td>
														<?php if ($value['image'] != '') : ?>
															<img src="<?php echo base_url() . 'upload/image/' . $value['image'] ?>" alt="" width="100" height="100" style="border-radius: 50%;">
														<?php else : ?>
															<img src="<?php echo base_url() . 'upload/default/user' ?>" alt="No Image" width="100" height="100" style="border-radius: 50%;">
														<?php endif; ?>
													</td>
													<td><?php echo $value['first_name'] . ' ' . $value['last_name'] ?></td>
													<td>
														<?php echo $value['speciality_name']; ?>
													</td>
													<td>
													<?php echo $value['email']; ?>

													</td>
													<td>
													<?php if ($value['status'] == '1') : ?>

													<button id="status_dur-<?php echo $value['status'] ?>" class="btn btn-success stat_btn">Active</button> <button id="status-<?php echo $value['user_id'] ?>" class="btn btn-success status_icon"><i  class="fa-solid fa-pen-to-square"></i></button>						
													<?php else : ?>
												
													<button id="status_dur-<?php echo $value['status'] ?>" class="btn btn-danger stat_btn">Inactive</button> <button id="status-<?php echo $value['user_id'] ?>" class="btn btn-danger status_icon"><i  class="fa-solid fa-pen-to-square"></i></button>
													<?php endif; ?>
												
												
											</td>
													<td>
														<button type="button" id="btn_request-<?php echo $value['user_id']?>" class="btn btn-primary req-sending-btnn">Appointment</button>
														<button type="button" id="btn-cencel-req-<?php echo $value['user_id']?>" class="btn btn-light ml-5 cencel-sending-request">Cencel</button>
													</td>
									</tr>
							
									<?php endforeach; ?>

											<?php }  ?>
											
										</tbody>
										
									</table>
								</div>
								</div>
							</div>
						</div>  
<?php endif; ?>


<script>
			// das_table();
		$(document).ready(function() {
			
			$('#dashboard_table').DataTable();

				
		});

$('.req-sending-btnn').on('click', function(){
	var id = $(this).attr('id').split('-')[1]; 
    $('#btn_request-' + id).text('Requesting...');
	
	

})

$('.cencel-sending-request').on('click', function(){
	var id = $(this).attr('id').split('-')[3]; 
	console.log(id);
    $('#btn_request-' + id).text('Add Friend');
	
	

});


$('[id^="status-"]').on('click', function () {
  
    var userId = this.id.split('-')[1];
	console.log(userId);


    var statBtnElement = $('.stat_btn');


   
		
		var status_id = statBtnElement.attr('id').split('-')[1];

        console.log(status_id);
		    

	var log = $('.status_icon');
	var log_id = log.attr('id').split('-')[1]; 
	    console.log(log_id);

        var confirmationMessage = (status_id === '0') ? 'Do you want to Activate this doctor?' : 'Do you want to deactivate this doctor?';

        if (confirm(confirmationMessage)) {
            $.ajax({
                method: 'POST',
                url: 'dashboard/set_status',
				dataType: 'json',
                data: {
                    userId: userId
                   
                },
                success: function (response) {

				location.reload();
				


                },
                error: function (xhr, status, error) {
                    console.error('AJAX request failed:', status, error);
                }
            });
        }
    
});


   
	
		
	
</script>










