
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          <span class="align-middle">Management</span>
        </a>

				<ul class="sidebar-nav">
					

					<li class="sidebar-item <?php echo ($page == 'dashboard') ? 'active' : ''; ?>">
						<a class="sidebar-link" href="<?php echo base_url()?>Dashboard">
                           <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                       </a>
					</li>
					<li class="sidebar-item  mt-2 <?php echo ($page == 'speciality') ? 'active' : ''; ?>">
						<a class="sidebar-link" href="<?php echo base_url()?>Speciality">
                           <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Specialiity</span>
                       </a>
					</li>
					<li class="sidebar-item  mt-2 <?php echo ($page == 'test') ? 'active' : ''; ?>">
						<a class="sidebar-link" href="<?php echo base_url()?>Test">
                           <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Test Data</span>
                       </a>
					</li>

				
				</ul>

				</div>
			
		</nav>
