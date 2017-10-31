<!DOCTYPE html>
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
   <script type= "text/javascript" >
		var steveApp = {};
		steveApp.data  = {baseUrl	: "<?php echo base_url(); ?>", 
						  tokenName : "<?php echo getTokenName(); ?>", 
						  tokenKey	: "<?php echo getTokenKey(); ?>"};
		steveApp.logPerson = function(){
			return steveApp.data;
		}
	</script>
   <link href="<?php echo base_url(); ?>contents/css/bootstrap.min.css" rel="stylesheet" />
   <link href="<?php echo base_url(); ?>contents/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="<?php echo base_url(); ?>contents/css/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="<?php echo base_url(); ?>contents/css/style.css" rel="stylesheet" />
   <link href="<?php echo base_url(); ?>contents/css/style_responsive.css" rel="stylesheet" />
   <link href="<?php echo base_url(); ?>contents/css/style_default.css" rel="stylesheet" id="style_color" />
   
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>contents/css/chosen.css" />
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>contents/gritter/css/jquery.gritter.css" />

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">
   <!-- BEGIN CONTAINER -->
   <div id="container" class="row-fluid">