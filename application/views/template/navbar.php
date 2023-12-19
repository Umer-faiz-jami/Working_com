
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						
						
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                              <i class="align-middle" data-feather="settings"></i>
                             </a>
								<?php   $first_name = $this->session->userdata('user_data')['first_name'];   
								$last_name = $this->session->userdata('user_data')['last_name']; 

								$id = $this->session->userdata('user_data')['user_id'];

								
								$this->db->select("*");
								$this->db->from("user");
								$this->db->where("user_id", $id);
							
								$query = $this->db->get();
							  
								if ($query->num_rows() > 0) {
									
									$res = $query->result_array();
									$image = $res[0]['image'];
								} else {
								
									$res = array();
								}
								?>
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<?php if($image !=''):?>
                               <img src="<?php echo base_url() .'upload/image/' .$image?>" class="avatar img-fluid rounded me-1" alt="Charles Hall" />
							   <?php else : ?>
						
								<img src="<?php echo base_url() .'upload/default/user' ?>" class="avatar img-fluid rounded me-1" alt="Charles Hall" />					<?php endif; ?>
							    <span class="text-dark"><?php echo $first_name . ' ' . $last_name?></span>
                            </a>
							<?php $id = $this->session->userdata('user_data')['user_id'];  ?>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="<?php echo base_url('Profile/index')?>"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<!-- <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a> -->
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="index.html"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a>
								<!-- <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a> -->
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?php echo base_url()?>Auth/logout">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
