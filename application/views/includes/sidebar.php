<!-- Page Area Start Here -->
		<div class="dashboard-page-one">
			<!-- Sidebar Area Start Here -->
			<div
				class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
				<div class="mobile-sidebar-header d-md-none">
					<div class="header-logo">
						<a href="#"><img src="<?php echo base_url();?>assets/img/logo1.png" alt="logo"></a>
					</div>
				</div>
				<div class="sidebar-menu-content">
				
					<ul class="nav nav-sidebar-menu sidebar-toggle-view">

						<?php if(!empty($this->session->userdata('isUserLogin'))){ 
									$userdetails=$this->session->userdata('isUserLogin');
								?>
						<?php if($userdetails['user_role']=='1'){ ?>
						<li class="nav-item "><a href="<?php echo base_url();?>"
									class="nav-link"><i class="fas fa-angle-right"></i>
										Dashboard</a></li>
						<li class="nav-item sidebar-nav-item <?php if($mainheader=='users'){ echo "active";} ?>"><a href="#"
							class="nav-link"><i
								class="flaticon-multiple-users-silhouette"></i><span>Users List</span></a>
							<ul class="nav sub-group-menu menu-open" <?php if($mainheader=='users'){ echo 'style="display: block;"';} ?>>
								
								<li class="nav-item "><a href="<?php echo base_url();?>dashboard/user_details"
									class="nav-link"><i class="fas fa-angle-right"></i>Users
										Details</a></li>

							</ul>
						</li>
					<?php } else{  ?>
						<li class="nav-item sidebar-nav-item <?php if($mainheader=='users'){ echo "active";} ?>"><a href="#"
							class="nav-link"><i
								class="flaticon-multiple-users-silhouette"></i><span>Users	</span></a>
							<ul class="nav sub-group-menu menu-open" <?php if($mainheader=='users'){ echo 'style="display: block;"';} ?>>
								
								<li class="nav-item "><a href="<?php echo base_url();?>dashboard/user_dashboard"
									class="nav-link"><i class="fas fa-angle-right"></i>Users
										profile</a></li>

							</ul>
						</li>
					<?php } }?>

					</ul>
				</div>
			</div>
			<!-- Sidebar Area End Here -->