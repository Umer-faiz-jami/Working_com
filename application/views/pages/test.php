

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
									<form action="<?php echo base_url()?>Test/add_test" method="post">
									<div class="mb-3">
										<label for="id" class="form-label"><b>ID</b></label>
										<input type="text" class="form-control" id="id"  name="id"> 
										<div class="text-danger"><?php echo form_error('id'); ?></div>

									</div>
									<div class="mb-3">
										<button type="submit" class="btn btn-success">Submit</button>
									</div>

								</form>
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




