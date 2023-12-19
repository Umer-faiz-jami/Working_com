

<div class="row m-5">
	<div class="col-9">

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
	  <div class="card">
		<div class="card-body">
			<form action="<?php echo base_url('Profile/update')?>" method="post" enctype="multipart/form-data">

			<div class="avatar-upload">
				<div class="avatar-edit">
					<input type='file' id="imageUpload"  name="file" value="<?php echo base_url() .'upload/image/' . $user[0]['image']?>" accept=".png, .jpg, .jpeg" />
					<label for="imageUpload"></label>
				</div>
				<div class="avatar-preview">
					<div id="imagePreview" style="background-image: url('<?php echo base_url() .'upload/image/' . $user[0]['image']?>');"></div>
					<div class="mb-1">
						
					</div>
				</div>
             </div>
			 <div class="mb-3">
				<label for="first_name" class="form-label">First Name</label>
			    <input type="text" class="form-control" id="first_name" value="<?php echo $user[0]['first_name']; ?>" name="first_name"> 	
			</div>
			 <div class="mb-3">
				<label for="last_name" class="form-label">Last Name</label>
			    <input type="text" class="form-control" id="last_name" value="<?php echo $user[0]['last_name']; ?>" name="last_name"> 	
			</div>

			<div class="mb-3">
				<label for="about" class="form-label">About</label>
				<textarea class="form-control" id="about"  name="about" rows="3"><?php echo $user[0]['about']; ?></textarea>
            </div>
        <div class="mb-3 m-1">
         <label for="">Gender</label>
        <div class="row">
			<div class="col-2">
			<div class="form-check">
				<input class="form-check-input" type="radio" name="gender" id="male" value="1" <?php echo ($user[0]['Gender'] == 1) ? 'checked' : ''; ?>>
				<label class="form-check-label" for="male">
					Male
				</label>
			</div>
			</div>
            <div class="col-2">
			<div class="form-check">
				<input class="form-check-input" type="radio" name="gender" id="female" value="0" <?php echo ($user[0]['Gender'] == 0) ? 'checked' : ''; ?>>
				<label class="form-check-label" for="female">
					Female
				</label>
			</div>
          </div>
		  </div>
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
	function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
</script>
