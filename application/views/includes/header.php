<!doctype html>
<html class="no-js" lang="">

<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?php echo $pageTitle; ?></title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/img/favicon.png">
<!-- Normalize CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/normalize.css">
<!-- Main CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<!-- Fontawesome CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/all.min.css">
<!-- Flaticon CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/flaticon.css">
<!-- Full Calender CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fullcalendar.min.css">
<!-- Animate CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.min.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
<!-- Sweetalert CSS --> 

<!-- FontAwesome CSS --> 

<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


<!-- jquery-->
<script src="<?php echo base_url();?>assets/js/jquery-3.3.1.min.js"></script>
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<!-- Sweetalert js --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>	

<!-- <link rel="stylesheet" href="https://twitter.github.io/typeahead.js/css/examples.css" />  -->
 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script> -->
 <script src="https://twitter.github.io/typeahead.js/js/handlebars.js"></script>
 <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>

<style type="text/css">
	.footer-wrap-layout1 {
    padding: 35rem 0 4rem;
}


@import url(https://fonts.googleapis.com/css?family=Open+Sans);

body{
  background: #f2f2f2;
  font-family: 'Open Sans', sans-serif;
}

.search {
  width: 100%;
  position: relative;
  display: flex;
}

.searchTerm {
     width: 100%; 
    border: 3px solid #ffffff;
    /* border-right: none; */
    padding: 27px;
    height: 20px;
    border-radius: 5px 0 0 5px;
    outline: none;
    color: #9DBFAF;
}

.searchTerm:focus{
  color: #000000;
}

.searchButton {
  width: 40px;
  height: 36px;
  border: 1px solid #00B4CC;
  background: #00B4CC;
  text-align: center;
  color: #fff;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 20px;
}

.header-main-menu .navbar-nav .header-search-bar .stylish-input-group .input-group-addon {
    display: flex;
    padding-right: 11px;
    border: none;
    border-radius: 0;
    background: transparent !important;
    padding: 9px;
}

#prefetch .league-name {
  margin: 0 20px 5px 20px;
  padding: 3px 0;
  border-bottom: 1px solid #ccc;
}

.tt-menu,
.gist {
  text-align: left;
}

.typeahead,
.tt-query,
.tt-hint {
    width: 410px;
    height: 56px;
    padding: 9px 3px;
    font-size: 22px;
    line-height: 30px;
    /* border: 2px solid #ccc; */
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px;
    outline: none;
}

.typeahead {
  background-color: #fff;
}

.typeahead:focus {
  border: 2px solid #0097cf;
}

.tt-query {
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
     -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}

.tt-hint {
  color: #999
}

.tt-menu {
  width: 422px;
  margin: 12px 0;
  padding: 8px 0;
  background-color: #fff;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, 0.2);
  -webkit-border-radius: 8px;
     -moz-border-radius: 8px;
          border-radius: 8px;
  -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
     -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
          box-shadow: 0 5px 10px rgba(0,0,0,.2);
}

.tt-suggestion {
  padding: 3px 20px;
  font-size: 18px;
  line-height: 24px;
}

.tt-suggestion:hover {
  cursor: pointer;
  color: #fff;
  background-color: #0097cf;
}

.tt-suggestion.tt-cursor {
  color: #fff;
  background-color: #0097cf;

}

.tt-suggestion p {
  margin: 0;
}

.gist {
  font-size: 14px;
}

/* example specific styles */
/* ----------------------- */

#custom-templates .empty-message {
  padding: 5px 10px;
 text-align: center;
}

#multiple-datasets .league-name {
  margin: 0 20px 5px 20px;
  padding: 3px 0;
  border-bottom: 1px solid #ccc;
}

#scrollable-dropdown-menu .tt-menu {
  max-height: 150px;
  overflow-y: auto;
}

#rtl-support .tt-menu {
  text-align: right;
}
</style>
<body>
	<!-- Preloader Start Here -->
	<div id="preloader"></div>
	<!-- Preloader End Here -->
	<div id="wrapper" class="wrapper bg-ash">
		<!-- Header Menu Area Start Here -->
		<div class="navbar navbar-expand-md header-menu-one bg-light">
			<div class="nav-bar-header-one">
				<div class="header-logo">
				<!-- 	<a href="<?php echo base_url() ?>"> <img src="<?php echo base_url();?>assets/img/logo.png" alt="logo">
					</a> -->
				</div>
				<div class="toggle-button sidebar-toggle">
					<button type="button" class="item-link">
						<span class="btn-icon-wrap"><span></span> <span></span> <span></span>
						</span>
					</button>
				</div>
			</div>
			<div class="d-md-none mobile-nav-bar">
				<button class="navbar-toggler pulse-animation" type="button"
					data-toggle="collapse" data-target="#mobile-navbar"
					aria-expanded="false">
					<i class="far fa-arrow-alt-circle-down"></i>
				</button>
				<button type="button" class="navbar-toggler sidebar-toggle-mobile">
					<i class="fas fa-bars"></i>
				</button>
			</div>
			<div class="header-main-menu collapse navbar-collapse"
				id="mobile-navbar">

				<ul class="navbar-nav" style="width: 70%">
					<li class="navbar-item header-search-bar" >

						


					</li>
				</ul>



				<ul class="navbar-nav">
					<li class="navbar-item dropdown header-admin"><a
						class="navbar-nav-link dropdown-toggle" href="#" role="button"
						data-toggle="dropdown" aria-expanded="false">
							<div class="admin-title">
								<?php if(!empty($this->session->userdata('isUserLogin'))){ 
									$userdetails=$this->session->userdata('isUserLogin');
								?>
								<h5 class="item-title"><?php echo ucwords($userdetails['username']); ?></h5>
								<span><?php if($userdetails['user_role']==1){ echo "Admin"; }
								else if($userdetails['user_role']==2){ echo $userdetails['username'];}
								else { echo "Developer";}

								?></span>
							<?php } else{ ?>
								<h5 class="item-title">User</h5>
								<span>User</span>
							<?php } ?>
							</div>
							<div class="admin-img">
								<img src="<?php echo base_url();?>assets/img/figure/admin.jpg" alt="Admin">
							</div>
					</a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="item-header">
								<?php if(!empty($this->session->userdata('isUserLogin'))){ 
									$userdetails=$this->session->userdata('isUserLogin');
								?>
								<h6 class="item-title"><?php if($userdetails['user_role']==1){ echo "Admin"; }
								else if($userdetails['user_role']==2){ echo "User";}
								else { echo "Developer";}

								?></h6>
									<?php } else{ ?>
								<h6 class="item-title">User</h6>		
								<?php } ?>
							</div>
							<div class="item-content">
								<ul class="settings-list">
									<!-- <li><a href="#"><i class="flaticon-user"></i>My
											Profile</a></li>
									<li><a href="#"><i class="flaticon-list"></i>Task</a></li>
									<li><a href="#"><i
											class="flaticon-chat-comment-oval-speech-bubble-with-text-lines"></i>Message</a></li>
									<li><a href="#"><i class="flaticon-gear-loading"></i>Account
											Settings</a></li> -->
									
									<li><a href="<?php echo base_url();?>home/logout"><i class="flaticon-turn-off"></i>Log Out</a></li>
									
								</ul>
							</div>
						</div></li>
				
				</ul>
			</div>
		</div>
		<!-- Header Menu Area End Here -->
		