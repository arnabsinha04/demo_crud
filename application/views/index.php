<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Demo| Login</title>
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
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fonts/flaticon.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    <!-- Modernize js -->
    <script src="<?php echo base_url();?>assets/js/modernizr-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        .error{
            color: red;
            font-size: smaller;
            margin-top: -20px;
            margin-bottom: 5px;
    }
    </style>
    
</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <!-- Login Page Start Here -->
    <div class="login-page-wrap">
        <div class="login-page-content">
            <div class="login-box">
                
                <h2 style="margin:0; padding:0; text-align:center; text-transform:uppercase;">Login Here</h2>
                
                <form id="loginform" action="<?php base_url();?>login" class="login-form" method="POST" >
                    
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" placeholder="Enter username"  class="form-control" name="username" id="username" value="<?php echo set_value('username'); ?>">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <p class="error"></p>
                    <?php echo form_error('username'); ?>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" placeholder="Enter password" name="password" class="form-control" value="<?php echo set_value('password'); ?>">
                        <i class="fas fa-lock"></i>
                    </div>
                    <?php echo form_error('password'); ?>

                    
                    <?php if(validation_errors()||$this->session->flashdata('message')){
                        //echo validation_errors(); 
                        echo "<p><div class='text-danger'>".$this->session->flashdata('message')."</div></p>";
                    } ?>
                    <div class="form-group d-flex align-items-center justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember-me">
                            <label for="remember-me" class="form-check-label">Remember Me</label>
                        </div>
                        <a href="#" class="forgot-btn">Forgot Password?</a>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="login-btn" name="submit" value="submit">Login</button>
                    </div>
                </form>
                
            </div>
            <!--<div class="sign-up">Don't have an account ? <a href="#">Signup now!</a></div>-->
        </div>
    </div>
    <!-- Login Page End Here -->
    <!-- jquery-->
    <script src="<?php echo base_url();?>assets/js/jquery-3.3.1.min.js"></script>
    <!-- Plugins js -->
    <script src="<?php echo base_url();?>assets/js/plugins.js"></script>
    <!-- Popper js -->
    <script src="<?php echo base_url();?>assets/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <!-- Scroll Up Js -->
    <script src="<?php echo base_url();?>assets/js/jquery.scrollUp.min.js"></script>
    <!-- Custom Js -->
    <script src="<?php echo base_url();?>assets/js/main.js"></script>

   

</body>

</html>