<?php if($page == 'speciality'): ?>

	<div class="modal fade" id="Speciality" tabindex="-1" aria-labelledby="SpecialityLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="SpecialityLabel">Add Speciality</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="speciality_form" method="post">

		<div class="mb-3">
				<label for="speciality" class="form-label"><b>Speciality</b></label>
			    <input type="text" class="form-control" id="speciality"  name="speciality"> 
				<div class="text-danger"><?php echo form_error('speciality'); ?></div>

			</div>
			<div class="mb-3 text-start">
				<button type="submit" class="btn btn-info">Submit</button>
			</div>
		</form>
      </div>
     
    </div>
  </div>
</div>
<?php endif ;?>



