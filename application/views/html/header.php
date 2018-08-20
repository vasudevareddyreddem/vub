<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>vuebin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/front-end/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/front-end/css/bootstrapValidator.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
 
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/front-end/css/design.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/front-end/css/vuebin.css">
 <link  rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/front-end/css/suggestion-box.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/front-end/css/color.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/front-end/css/skins.css">
  
<script src="<?php echo base_url(); ?>assets/vendor/front-end/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/front-end/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/front-end/js/bootstrapValidator.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/front-end/js/select2.full.min.js"></script>

<script src="<?php echo base_url(); ?>assets/vendor/front-end/js/suggestion-box.min.js"></script>




</head>

 
</head>
<style>

</style>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-dark navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="index.php" class="navbar-brand"><img  style="width:100px;height:auto;" src="<?php echo base_url(); ?>assets/vendor/front-end/img/logo.png"/></a>
			<div id="mobile-search-id" class=" md-hide" style="position:absolute;right:65px;color:#333;top:12px;font-size:20px;">
				<i class="fa fa-search" aria-hidden="true"></i>
			</div>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
		  
        </div> 
		<!--mobile search-->
		<div class="mobile-search md-hide" style="display:none">
		<div id="close-search">
			<i  style="margin-left:20px;font-size:22px;margin-top:20px;	" class="fa fa-arrow-left" aria-hidden="true"> </i>
		</div>
	
		<hr>
		
				<div class="container" style="position:relative;z-index:2000">
					<span class="fa fa-search" style=";position:absolute;top:10px;left:30px;color:#aaa"></span>
					<input style="padding-left:35px;z-index:2000" type="text" class="form-control" name="search" id="" placeholder="Search videos">
					
					<div class="row mar-t10" >
						<div class="col-md-12">
							<input type="text" class="form-control " name="search"  placeholder="Location">
						</div>	
						<button class="btn btn-sm btn-primary col-md-2  go-btn">Go</button>
					</div>
				</div>
				
			<br>
		</div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
           <ul class="nav navbar-nav ">
                        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                     
						<li class="page-scroll">
                            <a href="<?php echo base_url('institute'); ?>">INSTITUTES</a>
                        </li>
                        <li class="page-scroll">
                            <a href="course.php">COURSES</a>
                        </li>
                      
                    </ul>
         
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu ">
          <ul class="nav navbar-nav sm-hide">
                        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>

                        <li class="page-scroll">
                              <form action="" >
                              <div class="search-form">
								<div class="form-group has-feedback">
									<label for="search" class="sr-only">Search</label>
									<input type="text" class="form-control search-loc " name="search" id="search" placeholder="Search videos">
									<span class="fa fa-search form-control-feedback"></span>
								</div>
								</div>
									
									
							
						
							
                        </li>
						<li class="page-scroll">
                             
                             
								
									<div class="location-hide" style="">
									<div class="row">
									<div class="col-md-10">
									
										<input type="text" class="form-control " name="search"  placeholder="Location">
										</div>	
										<button class="btn btn-sm btn-primary col-md-2">Go</button>
									</div>
									</div>
									
						
							
                        </li>
						
						<li data-toggle="modal" data-target="#login-modal" class="page-scroll" style="padding-left:30px;margin-top:5px">
                           <a type="button" class="btn btn-sm btn-default " style="padding:4px 10px;">Upload</a>
                        </li>
                      	</form>
                    </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

    	  <div class="modal-dialog">
		  
				<div class="loginmodal-container">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:absolute;right:10px;top:10px;background:#aaa;padding:5px; border-radius:50%;width:40px;height:40px;">
                  <span aria-hidden="true">&times;</span></button>
					<h1>Login with</h1><br>
						<div class="">
							<button type="button" class="btn btn-primary btn-block"><i class="fa fa-facebook"></i> Sign in with Facebook</button>
						</div>
						<br>
						<div class="">
							<button type="button" class="btn btn-danger btn-block"><i class="fa fa-google-plus"></i> Sign in with GooglePlus</button>
						</div>
					
				 
				</div>
			</div>
		  </div>
  <!-- Full Width Column -->
  <script>
    $(document).ready(function () {
        $('#search').suggestionBox({
            filter: true,
            widthAdjustment: -8,
            leftOffset: 0,
            topOffset: 0,
        }).loadSuggestions('suggestions.json');
    });
</script>
<script>
$(document).ready(function(){
    $(".search-loc").click(function(){
        $('.location-hide').show();
    });
});

$(document).ready(function(){
    $("#mobile-search-id").click(function(){
        $('.mobile-search').show();
    });
});
$(document).ready(function(){
    $("#close-search").click(function(){
        $('.mobile-search').hide();
    });
});
</script>