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
                              <form action="<?php echo base_url('search/post'); ?>" method="post">
								<div class="search-form">
									<div class="form-group ">
										<input id="myInput"type="text" class="form-control search-loc homemenu_id" name="institue_course_name"  placeholder=" Course Video/Institute " >
										<input type="hidden" id="homemenu_id" name="institue_course" value="" >
									</div>
								</div>
							 </li>
						<li class="page-scroll">
                             <div >
									<div class="row">
										<div class="col-md-10">
											<div class="search-form1">
												<div class="form-group ">
												
													<input id="myInput1"type="text" class="form-control location_search" name="location_name"    placeholder=" Location" >
													<input type="hidden" name="local_id" id="local_id" value="">
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
								 <a href="<?php echo base_url('videos/upload'); ?>" type="button" class="btn btn-sm btn-default " style="padding:4px 10px;"> <i style="font-size:20px;" class="fa fa-cloud-upload" aria-hidden="true"></i> Upload</a>
							</li>
						<?php }else{ ?>
						<li data-toggle="modal" data-target="#login-modal" class="page-scroll" style="padding-left:30px;margin-top:5px">
							   <a type="button" class="btn btn-sm btn-default " style="padding:4px 10px;"> <span style="font-size:18px"><i class="fa fa-cloud-upload" aria-hidden="true"></i></span> Upload</a>
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
							<a href="<?php echo isset($loginURL)?$loginURL:''; ?>" type="button" class="btn btn-primary btn-block text-white"><i class="fa fa-facebook"></i> Sign in with Facebook</a>
						</div>
						<br>
						<div class="">
							<a href="<?php echo base_url('auth_oa2/session/google'); ?>" type="button" class="btn btn-danger btn-block text-white"><i class="fa fa-google-plus"></i> Sign in with GooglePlus</a>
						</div>
					
				 
				</div>
			</div>
		  </div>
  <!-- Full Width Column -->
 <!-- share -->
 <div class="modal fade" id="share-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

    	  <div class="modal-dialog">
		  
				<div class="loginmodal-container">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:absolute;right:10px;top:10px;background:#aaa;padding:5px; border-radius:50%;width:40px;height:40px;">
                  <span aria-hidden="true">&times;</span></button>
					<h1>Share with</h1><br>
						<div class="">
							<a href="upload.php" type="button" class="btn btn-primary btn-block text-white-social"><i class="fa fa-facebook"></i> Share with Facebook</a>
						</div>
						<br>
						<div class="">
							<button type="button" class="btn btn-danger btn-block"> <i class="fa fa-google-plus"></i> Share with GooglePlus</button>
						</div>
						<br>
						<div class="">
							<button type="button" class="btn btn-primary btn-block"> <i class="fa fa-linkedin"></i> Share with linkedin</button>
						</div><br>
						<div class="">
							<button type="button" class="btn btn-primary btn-block bg-twitter"> <i class="fa fa-twitter"></i> Share with twitter</button>
						</div>
					
				 
				</div>
			</div>
		  </div>
		   <div class="chat-div">
		<?php if(isset($user_details) && count($user_details)>0){ ?>
		
			<?php if($user_details['completed']==''){ ?>
				<li class="page-scroll" style="padding-left:30px;margin-top:5px">
					<a href="javascript:void(0);" onclick="send_msg()"> <img class="btn-chat-box" style="width:100px;height:auto;float:right;" src="<?php echo base_url(); ?>assets/vendor/front-end/img/livechat.png" alt="livechat"></a>
				</li>
				<div class="chat-div">
					<div >
						<div  style="display:none" class="chat-box">
						  <!-- DIRECT CHAT PRIMARY -->
						  <div class="box box-primary direct-chat direct-chat-primary">
							<div class="box-header with-border">
							  <h3 class="box-title">Direct Chat</h3>
							 <a> <i class="fa fa-times-circle pull-right btn-chat-box" aria-hidden="true"></i></a>
							</div>
							<!-- /.box-header -->
							<div class="box-body chatmessages" id="chatmessages">
							</div>
							<!-- /.box-body -->
							<div class="box-footer">
							  <form action="#" method="post">
								<div class="input-group">
								  <input type="text" id="text_msg" name="text_msg" placeholder="Type Message ..." class="form-control">
									  <span class="input-group-btn">
										<button type="button" onclick="send_msg()" class="btn btn-primary btn-flat">Send</button>
									  </span>
								</div>
							  </form>
							</div>
							<!-- /.box-footer-->
						  </div>
						  <!--/.direct-chat -->
						</div>
					</div>
					</div>
			<?php }else{ ?>
			<div class="chat-div">
				<div class="row" id="institue_pending_chats">
				</div>
			</div>
				<li class="page-scroll" style="padding-left:30px;margin-top:5px">
					<a href="javascript:void(0);" onclick="get_institue_msgs()" > <img class="btn-chat-box" style="width:100px;height:auto;float:right;" src="<?php echo base_url(); ?>assets/vendor/front-end/img/livechat.png" alt="livechat"></a>
				</li>
			<?php } ?>
		<?php }else{ ?>
			<li data-toggle="modal" data-target="#login-modal" class="page-scroll" style="padding-left:30px;margin-top:5px">
			   <img class="" style="width:100px;height:auto;float:right;" src="<?php echo base_url(); ?>assets/vendor/front-end/img/livechat.png" alt="livechat">
			</li>
		<?php } ?>
	</div>
 <!-- share -->

<script  type="text/javascript">
$( function() {
    var raw = [
    <?php foreach($location_values as $a_lis){?>{value:'<?php echo $a_lis['l_id']; ?>',label:'<?php echo $a_lis['address']; ?>'+'@<?php echo base_url('assets/flags/'.strtolower($a_lis['country_code']).'.png'); ?>',},<?php } ?>
		];
		var source  = [ ];
		var mapping = { };
		for(var i = 0; i < raw.length; ++i) {
			source.push(raw[i].label);
			mapping[raw[i].label] = raw[i].value;
		}
		$('.location_search').autocomplete({
			minLength: 1,
			source: source,
			select: function(event, ui) {
				$('#local_id').val(mapping[ui.item.label]);
			}
		});
	} );
 
 $( function() {
	var homesearch = [
		<?php foreach($search_values as $lis){ ?>{value:'<?php echo $lis['value']; ?>', label:'<?php echo $lis['label']; ?>',},	<?php } ?>
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
	});
 function get_institue_msgs(){
	jQuery.ajax({
		url: "<?php echo base_url('chat/get_institue_pending_chat_list');?>",
		data: {
			text:'',
		},
		type: "POST",
		format:"html",
				success:function(data){
					$("#institue_pending_chats").empty();
					$("#institue_pending_chats").append(data);
					
				}
	   });
}
	</script>