

<div class="row m-5">
	<div class="col-9">

	
	<div class="text-end mb-2">
		<a href="<?php echo base_url('Dashboard')?>" class="btn btn-info">Go Back</a>
	</div>
	  <div class="card">
		<div class="card-body">
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
			<form action="<?php echo base_url('Dashboard/Admin_Add_Doctor')?>" method="post">

			
			
			 <div class="mb-3">
				<label for="first_name" class="form-label"><b>First Name</b></label>
			    <input type="text" class="form-control" id="first_name"  name="first_name"> 
				<div class="text-danger"><?php echo form_error('first_name'); ?></div>

			</div>

			 <div class="mb-3">
				<label for="last_name" class="form-label"><b>Last Name</b></label>
			    <input type="text" class="form-control" id="last_name"  name="last_name"> 
				<div class="text-danger"><?php echo form_error('last_name'); ?></div>

			</div>
			 <div class="mb-3">
				<label for="user_name" class="form-label"><b>User_Name</b></label>
			    <input type="text" class="form-control" id="user_name"  name="user_name"> 
				<div class="text-danger"><?php echo form_error('user_name'); ?></div>

			</div>

			 <div class="mb-3">
				<label for="password" class="form-label"><b>Password</b></label>
			    <input type="password" class="form-control" id="password"  name="password"> 
				<div class="text-danger"><?php echo form_error('password'); ?></div>

			</div>
			 <div class="mb-3">
				<label for="password" class="form-label"><b>Confirm Password</b></label>
			    <input type="password" class="form-control" id="confirm_password"  name="confirm_password"> 
				<div class="text-danger"><?php echo form_error('confirm_password'); ?></div>

			</div>

			
        <div class="mb-3 m-1">
            <label for=""><b>Gender</b></label>
             <div class="row">
			        <div class="col-2">
			            <div class="form-check">
							<input class="form-check-input" type="radio" name="gender" id="male" value="1" >
							<label class="form-check-label" for="male">
								Male
							</label>
						</div>
			        </div>
				<div class="col-2">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="gender" id="female" value="0">
						<label class="form-check-label" for="female">
							Female
						</label>
					</div>

                 </div>
				

		    </div>
			<div class="text-danger"><?php echo form_error('gender'); ?></div>
		</div>
		<div class="mb-3">
			<label for="" class="p-2"><b>Select Speciality</b></label>
				<select class="form-select p-1" name="speciality" id="speciality_doc">
					<option value="">Select Speciality</option>
					<?php foreach ($speciality as $key => $value) {
							echo '<option value="' . $value['speciality_id'] . '">' . $value['speciality_name'] . '</option>';
					} ?>

				</select>
				<div class="text-danger"><?php echo form_error('speciality'); ?></div>
		</div>

			<div class="mb-2">
				<button type="submit" class="btn btn-info">Submit</button>
			</div>
		</form>
		</div>
	   </div>
	</div>
</div>



<script>
	$('#speciality_doc').select2();
</script>
