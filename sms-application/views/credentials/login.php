<!DOCTYPE html>
<!--
Template Name: Admin Lab Dashboard build with Bootstrap v2.3.1
Template Version: 1.2
Author: Mosaddek Hossain
Website: http://thevectorlab.net/
-->

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8" />
  <title><?php echo getPageTitle($this->uri->segment(3)); ?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link href="<?php echo base_url(); ?>contents/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>contents/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>contents/css/style.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>contents/css/style_responsive.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>contents/css/style_default.css" rel="stylesheet" id="style_color" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body id="login-body">
	
	<?php 
		echo getSuccessMessage(); 
		echo getErrorMessage();
	?>
	
  <!-- BEGIN LOGIN -->
  <div id="login">
    <!-- BEGIN LOGIN FORM -->
    <form id="loginform" class="form-vertical no-padding no-margin" method="post" action="<?php echo base_url(); ?>credentials/super_admin/signin/check-login" autocomplete="off" accept-charset="utf-8">
	  <input type="hidden" name="<?php echo getTokenName(); ?>" value="<?php echo getTokenKey(); ?>">
      <div class="lock">
          <i class="icon-lock"></i>
      </div>
      <div class="control-wrap">
	  <span class="text-red error_message emailid_error_msg error"><?php echo form_error('emailid'); ?></span>
	  <span class="text-red error_message password_error_msg error"><?php echo form_error('password'); ?></span>
          <h4>User Login </h4>
          <div class="control-group">
              <div class="controls">
                  <div class="input-prepend">
                      <span class="add-on"><i class="icon-envelope"></i></span>
					  <input id="input-username" type="text" name="emailid" placeholder="Enter Your Email" autocomplete="off"/>
                  </div>
              </div>
          </div>
          <div class="control-group"> 
              <div class="controls">
                  <div class="input-prepend">
                      <span class="add-on"><i class="icon-key"></i></span>
					  <input id="input-password" type="password" name="password" placeholder="Password" autocomplete="off"/>
                  </div>
                  <div class="mtop10">
                      <div class="block-hint pull-left small">
                          <input type="checkbox" name="rememberme" id=""> Remember Me
                      </div>
					  
                      <div class="block-hint pull-right">
                          <a href="javascript:;" class="" id="forget-password">Forgot Password?</a>
                      </div>
                  </div>

                  <div class="clearfix space5"></div>
              </div>

          </div>
      </div>

      <input type="submit" id="login-btn" class="btn btn-block login-btn" value="Login" />
	  
		<div class="block-hint" id="login-copyright">
			<span id="login-copyright"><a href="<?php echo base_url().'sign-up'; ?>" class="" id="forget-password">Create Account?</a></span>
		</div>
	  
    </form>
    <!-- END LOGIN FORM -->        
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form id="forgotform" class="form-vertical no-padding no-margin hide" action="index.html">
      <p class="center">Enter your e-mail address below to reset your password.</p>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend">
            <span class="add-on"><i class="icon-envelope"></i></span><input id="input-email" type="text" placeholder="Email"  />
          </div>
        </div>
        <div class="space20"></div>
      </div>
      <input type="button" id="forget-btn" class="btn btn-block login-btn" value="Submit" />
    </form>
    <!-- END FORGOT PASSWORD FORM -->
  </div>
  <!-- END LOGIN -->
  <!-- BEGIN COPYRIGHT -->
  <div id="login-copyright">
      2017 &copy; SMS.
  </div>
  <!-- END COPYRIGHT -->
  
</body>
<!-- END BODY -->
</html>