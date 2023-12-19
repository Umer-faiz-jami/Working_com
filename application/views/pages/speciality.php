

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
								<button type="button" class="btn btn-info mb-2" data-bs-toggle="modal" data-bs-target="#Speciality">
									Add Speciality
								</button>
						</div>
							<div class="card">
								<div class="card-body">
									<table class="table table-striped" id="dashboard_table">
										<thead>
											<th>Sr#</th>
											<th>Speciality</th>
											<th>
												Action
											</th>
											
											</thead>
										<tbody>
											<?php $id = $this->session->userdata('user_data')['user_id'];   
											$loop = '1';
											?>
										<?php if($all_user){
											    ?>
											<?php foreach ($all_user as $key => $value) : ?>
								
									<tr>
										
									<td><?php echo $loop++;?></td>
										<td>
											<?php echo $value['speciality_name']; ?>
										</td>
										<td>
							<!-- <?php
							if ($value['status'] == 1) {
								echo '<button id="status_duro-'. $value['status'].'" class="btn btn-success stat_btn">Active</button> <button id="statusspec-'.$value['speciality_id'].'" class="btn btn-success status_icon"><i  class="fa-solid fa-pen-to-square"></i></button>';							} else {
								echo '<button id="status_duro-'. $value['status'].'" class="btn btn-danger stat_btn">Inactive</button> <button id="statusspec-'.$value['speciality_id'] . '" class="btn btn-danger status_icon"><i  class="fa-solid fa-pen-to-square"></i></button>';
							}
							?> -->
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
						</div>  

						
<?php endif; ?>



   

<script>

	$(document).ready(function(){

	$('#speciality_form').submit(function (event) {
            event.preventDefault();

            var formData = $(this).serialize();
			$.ajax({
                type: "POST",
                url: "<?php echo base_url();?>Speciality/Add_speciality",
                data: formData,
                success: function(response) {
                   alert('Added Successfully!');
				   $('#Speciality').modal('hide');
				location.reload();

                },
                error: function(error) {
                   alert('Something Went Wrong!');
				   $('#Speciality').modal('show');

                    console.log(error);
                }
            });


	});

});










// $('[id^="status-"]').on('click', function () {
  
//   var userId = this.id.split('-')[1];


//   var statBtnElement = $('.stat_btn');


 
	  
// 	  var status_id = statBtnElement.attr('id').split('-')[1];

//   var log = $('.status_icon');
//   var log_id = log.attr('id').split('-')[1]; 
// 	  console.log(log_id);

// 	  var confirmationMessage = (status_id === '0') ? 'Do you want to activate this Speciality?' : 'Do you want to deactivate this doctor?';

// 	  if (confirm(confirmationMessage)) {
// 		  $.ajax({
// 			  type: 'POST',
// 			  url: '/set_status',
// 			  data: {
// 				  userId: userId
				 
// 			  },
// 			  success: function (response) {
// 			  location.reload();


// 			  },
// 			  error: function (xhr, status, error) {
// 				  console.error('AJAX request failed:', status, error);
// 			  }
// 		  });
// 	  }
  
// });

		
	
</script>




