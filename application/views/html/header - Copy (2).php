<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="-1" />
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
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/front-end/css/color.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/front-end/css/skins.css">
<script src="<?php echo base_url(); ?>assets/vendor/front-end/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/front-end/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/front-end/js/bootstrapValidator.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/front-end/js/select2.full.min.js"></script>
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/front-end/css/jquery-ui.css">
  <script src="<?php echo base_url(); ?>assets/vendor/front-end/js/jquery-ui.js"></script>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
  <header class="main-header">
    <nav class="navbar navbar-dark navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo base_url(); ?>" class="navbar-brand"><img  style="width:100px;height:auto;" src="<?php echo base_url(); ?>assets/vendor/front-end/img/logo.png"/></a>
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
					<input style="padding-left:35px;z-index:2000" type="text" class="form-control tags" name="search " id="" placeholder="Search videos">
					
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
                            <a href="<?php echo base_url('institutes'); ?>">INSTITUTES</a>
                        </li>
                        <li class="page-scroll">
                            <a href="<?php echo base_url('courses'); ?>">COURSES</a>
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
									<div class="form-group ">
										<input id="myInput"type="text" class="form-control search_home_institue" onkeyup="course_institue_search(this.value)"  placeholder="Search videos" onkeyup="myFunction()">
										<input type="hidden" id="homemenu_id" name="" value="" >
									</div>
								</div>
							 </li>
						<li class="page-scroll">
                             <div >
									<div class="row">
										<div class="col-md-10">
											<div class="search-form1">
												<div class="form-group ">
													<input id="myInput1"type="text" class="form-control"  placeholder="Location" onkeyup="myFunction()">
													
												</div>
								</div>
										</div>	
										<button class="btn btn-sm btn-primary col-md-2 btn-go ">Go</button>
									</div>
									</div>
						</li>
						<?php if(isset($user_details) && count($user_details)>0){ ?>
							<li class="page-scroll" style="padding-left:30px;margin-top:5px">
							<a href="<?php echo base_url('user/logout'); ?>" type="button" class="btn btn-sm btn-default " style="padding:4px 10px;">Logout</a>
							</li>
                        <?php }else{ ?>
							<!--<li data-toggle="
							" data-target="#login-modal" class="page-scroll" style="padding-left:30px;margin-top:5px">
							   <a type="button" class="btn btn-sm btn-default " style="padding:4px 10px;">Login</a>
							</li>-->
						<?php } ?>
						<?php if(isset($user_details) && count($user_details)>0){ ?>
							<li class="page-scroll" style="padding-left:30px;margin-top:5px">
								 <a href="<?php echo base_url('videos/upload'); ?>" type="button" class="btn btn-sm btn-default " style="padding:4px 10px;">Upload</a>
							</li>
						<?php }else{ ?>
						<li data-toggle="modal" data-target="#login-modal" class="page-scroll" style="padding-left:30px;margin-top:5px">
							   <a type="button" class="btn btn-sm btn-default " style="padding:4px 10px;">Upload</a>
							</li>
						<?php } ?>
						
                      	</form>
                    </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <?php if($this->session->flashdata('success')): ?>
<div class="alert_msg1 animated slideInUp bg-succ">
   <?php echo $this->session->flashdata('success');?> &nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i>
</div>
<?php endif; ?>
<?php if($this->session->flashdata('error')): ?>
<div class="alert_msg1 animated slideInUp bg-warn">
   <?php echo $this->session->flashdata('error');?> &nbsp; <i class="fa fa-exclamation-triangle text-success ico_bac" aria-hidden="true"></i>
</div>
<?php endif; ?>
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

    	  <div class="modal-dialog">
		  
				<div class="loginmodal-container">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:absolute;right:10px;top:10px;background:#aaa;padding:5px; border-radius:50%;width:40px;height:40px;">
                  <span aria-hidden="true">&times;</span></button>
					<h1>Login with</h1><br>
						<div class="">
							<a href="<?php echo isset($loginURL)?$loginURL:''; ?>" type="button" class="btn btn-primary btn-block"><i class="fa fa-facebook"></i> Sign in with Facebook</a>
						</div>
						<br>
						<div class="">
							<a href="<?php echo base_url('auth_oa2/session/google'); ?>" type="button" class="btn btn-danger btn-block"><i class="fa fa-google-plus"></i> Sign in with GooglePlus</a>
						</div>
					
				 
				</div>
			</div>
		  </div>
  <!-- Full Width Column -->
  <script>
function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>
 
<script>
function course_institue_search(course_institue){
	if(course_institue!=''){
		jQuery.ajax({
   			url: "<?php echo base_url('search/get_course_or_institues');?>",
   			data: {
				search_value: course_institue,
			},
   			type: "POST",
   			format:"json",
   					success:function(data){
						
							var parsedData=JSON.parse(data);
							var fff=parsedData.list;
							var ff=fff.split(",");
							alert(ff);
							alert(parsedData.list);
							var raw = [parsedData.list];
							var source  = [ ];
							var mapping = { };
							for(var i = 0; i < raw.length; ++i) {
								alert(raw[i]);
								
							}

					}
           });
	}
	
}

</script>
 <script>
 
  
 $( function() {
    var homesearch = [
    	{ value: 6, label: 'one'   },
								{ value: 4, label: 'one with two'   },
								{ value: 5, label: 'one with three'   },
								{ value: 1, label: 'one'   },
								{ value: 2, label: 'two'   },
								{ value: 3, label: 'three' },
								{ value: 4, label: 'four'  }
];
var source  = [ ];
var mapping = { };
for(var i = 0; i < homesearch.length; ++i) {
    source.push(homesearch[i].label);
    mapping[homesearch[i].label] = homesearch[i].value;
}

$('.homemenu_id').autocomplete({
    minLength: 1,
    source: source,
    select: function(event, ui) {
        $('#homemenu_id').val(mapping[ui.item.value]);
    }
});

  } );
  </script>