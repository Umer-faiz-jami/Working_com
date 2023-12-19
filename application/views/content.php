<!DOCTYPE html>
<html lang="en">


<?php

$this->load->view('template/header'); ?>

	<?php


?>

<main>
        <div class="wrapper">  
			<?php $this->load->view('template/sidebar'); ?>
			<div class="main">
				<!-- start page container -->
          <?php $this->load->view('template/navbar');?>
				
				
				<?php $this->load->view('pages/'. $page); ?>	
				
				<!-- <div class="loading hide" role="status"><i class="fa fa-spinner fa-spin fa-3x fa-fw" aria-hidden=" false"=""></i></div> -->
			</div>
        </div>
		<?php  $this->load->view('template/Modal') ?>
  </main>
  <?php  $this->load->view('template/script') ?>
  <?php   $this->load->view('template/footer'); ?>

</body>
</html?


