<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="-1" />
    <title>vuebin</title> <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/front-end/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/front-end/css/bootstrapValidator.min.css"> <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"> <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> <!-- Theme style -->
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
</head> <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
        <header class="main-header">
            <nav class="navbar navbar-dark navbar-fixed-top">
                <div class="container-fluid" style="padding-top:10px;">
                    <div class="navbar-header"> <a href="<?php echo base_url(); ?>" class="navbar-brand"><img style="width:100px;height:auto;" src="<?php echo base_url(); ?>assets/vendor/front-end/img/logo.png" /></a>
                        <div id="mobile-search-id" class=" md-hide" style="position:absolute;right:65px;color:#333;top:12px;font-size:20px;"> <i class="fa fa-search" aria-hidden="true"></i> </div> <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse"> <i class="fa fa-bars"></i> </button>
                    </div>
                   
					<!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav mar-l-40 sm-hide">
                            <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
							<!--for website-->
                            <li class="hidden"> <a href="#page-top"></a> </li>
                            <li class="page-scroll <?php if($active_url=='institutes'  || $active_url_1=='instutue'){ echo "active"; } ?>"> <a href="<?php echo base_url('institutes'); ?>"> Institutes</a> </li>
                            <li class="page-scroll <?php if($active_url=='courses'){ echo "active"; } ?>"> <a href="<?php echo base_url('courses'); ?>">Courses </a> </li>
                        </ul>
						<!--for mobile-->
						<ul class="nav navbar-nav mar-l-40 md-hide">
                            <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                            <li class="hidden"> <a href="#page-top"></a> </li>
                            <li class="page-scroll <?php if($active_url=='institutes'  || $active_url_1=='instutue'){ echo "active"; } ?>"> <a href="<?php echo base_url('institutes'); ?>"> Institutes</a> </li>
                            <li class="page-scroll <?php if($active_url=='courses'){ echo "active"; } ?>"> <a href="<?php echo base_url('courses'); ?>">Courses </a> </li>
							
							 <?php if(isset($user_details) && count($user_details)>0){ ?>
							 
									<li class="page-scroll md-hide">
										<a href="<?php echo base_url('videos/upload'); ?>">
										  <span class="h4"><i class="fa fa-cloud-upload "></i> My Account</span></a>
									</li>
									<li  class=" page-scroll md-hide">
										<a href="<?php echo base_url('user/subscribes'); ?>">
										  <span class="h4"><i class="fa fa-rocket "></i> My Subscriptions</span></a>
									</li>
									<li class="page-scroll md-hide">
										<a href="<?php echo base_url('user/logout'); ?>">
										  <span class="h4"><i class="fa fa-power-off "></i> Logout</span></a>
									</li>
								  
								
						
						
						<?php }else{ ?>
							<li class="dropdown notifications-menu  user md-hide page-scroll " style="padding-left:20px;">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#login-modal" class="dropdown-toggle user-header" data-toggle="dropdown" >
									  <i class="fa fa-user"></i></a>
							</li>
						<?php } ?>
							
							
							
							
                        </ul>
						
						
                    </div> <!-- /.navbar-collapse -->
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu ">
                        <ul class="nav navbar-nav sm-hide">
                            <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                            <li class="hidden"> <a href="#page-top"></a> </li>
                            <li class="page-scroll">
                                <form action="<?php echo base_url('search/index/'); ?>" method="post">
                                    <div class="search-form">
                                        <div class="form-group "> <input id="myInput" type="text" class="form-control search-loc homemenu_id" name="institue_course_name" value="<?php echo $this->session->userdata('search_ins'); ?>" placeholder=" Course Video/Institute "> <input type="hidden" id="homemenu_id" name="institue_course" value="<?php echo $this->session->userdata('search_ins_val'); ?>"> </div>
                                    </div>
                            </li>
                            <li class="page-scroll">
                                <div>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="search-form1">
                                                <div class="form-group "> <input id="myInput1" type="text" class="form-control search_loc_val location_search" name="location_name" value="<?php echo $this->session->userdata('search_loc'); ?>" placeholder=" Location"> <input type="hidden" name="local_id" id="local_id" value="<?php echo $this->session->userdata('search_loc_val'); ?>"> </div>
                                            </div>
                                        </div> <button class="btn btn-sm btn-primary col-md-2 btn-go ">Go</button>
                                    </div>
                                </div>
                            </li>
							
                           <?php if(isset($user_details) && count($user_details)>0){ ?>
                           
							<li class="dropdown notifications-menu  user " style="padding-left:20px;">
								<a href="#" class="dropdown-toggle user-header" data-toggle="dropdown" >
								  <i class="fa fa-user"></i>
								 
								</a>
								<ul class="dropdown-menu">
								 
								  <li>
									<!-- inner menu: contains the actual data -->
									<ul class="menu">
										<li>
											<a href="<?php echo base_url('videos/upload'); ?>">
											  <span class="h4"><i class="fa fa-cloud-upload "></i> My Account</span></a>
										</li>
										<li>
											<a href="<?php echo base_url('user/subscribes'); ?>">
											  <span class="h4"><i class="fa fa-rocket "></i> My Subscriptions</span></a>
										</li>
										<li>
											<a href="<?php echo base_url('user/logout'); ?>">
											  <span class="h4"><i class="fa fa-power-off "></i> Logout</span></a>
										</li>
									  
									</ul>
								  </li>
								
								</ul>
							  </li>
							
                            <?php }else{ ?>
								<li class="dropdown notifications-menu  user " style="padding-left:20px;">
										<a href="javascript:void(0);" data-toggle="modal" data-target="#login-modal" class="dropdown-toggle user-header" data-toggle="dropdown" >
										  <i class="fa fa-user"></i></a>
								</li>
                            <?php } ?>
                            </form>
                        </ul>
                    </div> <!-- /.navbar-custom-menu -->
					<!-- mobile view search purpose*/
					 <!--mobile search-->
                    <div class="mobile-search md-hide" style="display:none">
					<form action="<?php echo base_url('search/post'); ?>" method="post">
                        <div id="close-search"> <i style="margin-left:20px;font-size:22px;margin-top:20px;	" class="fa fa-arrow-left" aria-hidden="true"> </i> </div>
                        <hr>
                        <div class="container" style="position:relative;z-index:2000"> <span class="fa fa-search" style=";position:absolute;top:10px;left:30px;color:#aaa"></span> <input style="padding-left:35px;z-index:2000" type="text" class="form-control tags homemenu_id" name="search " id="" placeholder="Search videos">
                            <div class="row mar-t10">
                                <div class="col-md-12"> <input type="text" class="form-control search_loc_mob location_search" name="search" placeholder="Location"> </div> 
								<input type="hidden" name="local_id" id="local_id1" value="">
								<input type="hidden" name="institue_course" id="homemenu_id1" value="">
                            </div>
                        </div> <br>
								<button type="submit" style="position:absolute;right:10px;top:10px;" class="btn btn-sm btn-primary col-md-2  go-btn">Go</button>
                    </form>
					</div>
					<!-- mobile view search purpose*/
                </div> <!-- /.container-fluid -->
            </nav>
        </header>
        <?php if($this->session->flashdata('success')): ?>
        <div class="alert_msg1 animated slideInUp bg-succ">
            <?php echo $this->session->flashdata('success');?> &nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i> </div>
        <?php endif; ?>
        <?php if($this->session->flashdata('error')): ?>
        <div class="alert_msg1 animated slideInUp bg-warn">
            <?php echo $this->session->flashdata('error');?> &nbsp; <i class="fa fa-exclamation-triangle text-success ico_bac" aria-hidden="true"></i> </div>
        <?php endif; ?>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="loginmodal-container"> <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:absolute;right:10px;top:10px;background:#aaa;padding:5px; border-radius:50%;width:40px;height:40px;"> <span aria-hidden="true">&times;</span></button>
                    <h1>Login with</h1><br>
                    <div class=""> <a href="<?php echo isset($loginURL)?$loginURL:''; ?>" type="button" class="btn btn-primary btn-block text-white fc_hover"><i class="fa fa-facebook"></i> Sign in with Facebook</a> </div> <br>
                    <div class=""> <a href="<?php echo base_url('auth_oa2/session/google'); ?>" type="button" class="btn btn-danger btn-block text-white"><i class="fa fa-google-plus"></i> Sign in with GooglePlus</a> </div>
                </div>
            </div>
        </div> <!-- Full Width Column -->
        <!-- share -->
        <div class="modal fade" id="pop-modal" role="dialog">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content ">
                    
                    <div class="modal-body" style="border-left:5px solid #3059f1;border-bottom:5px solid #3059f1;">
                        <div class="row" id="lead_data">
						<div class="col-md-6">
						  <div class=" text-center">
						 <h3 class="" style="line-height:30px;"><i>Please submit this form to get calls from Training Institutes </i></h3>
						 </div>
							<img src="<?php echo base_url(); ?>assets/vendor/front-end/img/callcenter.png">
						</div>
						<div class="col-md-6">
                            <form onsubmit="return sent_lead();" action="<?php echo base_url('user/postleade');?>" method="post"> <input type="hidden" name="lead_type" id="lead_type" value="<?php echo $this->uri->segment(2); ?>"> <input type="hidden" name="i_id" id="i_id" value="<?php echo $this->uri->segment(3); ?>">
                                <div class="form-group col-md-12">
                                    <div class="form-group"> <label class=" control-label">Course Name*</label>
                                        <div class=""> <input type="text" class="form-control" name="course_name" id="course_name" placeholder="Enter Course Name" required> </div>
                                    </div>
                                    <div class="form-group"> <label class=" control-label">Name*</label>
                                        <div class=""> <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" required> </div>
                                    </div>
                                    <div class="form-group"> <label class=" control-label">Location, City*</label>
                                        <div class=""> <input type="text" class="form-control" name="location_name" name="location_name" placeholder="Enter Location, City" required> </div>
                                    </div>
                                    <div class="form-group"> <label class=" control-label">Email Id*</label>
                                        <div class=""> <input type="email" class="form-control" name="email_id" id="email_id" placeholder="Enter Email Id" required> </div>
                                    </div>
                                    <div class="form-group"> <label class=" control-label">Contact Number *</label>
                                        <div class=""> <input type="text" class="form-control" name="contact_num" id="contact_num" placeholder="Enter Contact Number" required> </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12"> <input type="submit" 
								class="btn-hover-main btn  btn-lg btn-block" value="Submit"> </div>
                            </form>
							</div>
                        </div>
                        <div class="row" id="lead_num_otp" style="display:none;">
                            <div id="EmptyforError"></div>
                            <div class="form-group col-md-12"> <input type="hidden" name="lead_id" id="lead_id" value="">
                                <div class="form-group"> <label class=" control-label">Verification Code</label> <input type="text" class="form-control" name="verification_code" id="verification_code" placeholder="Mobile  Verification Code" required>
                                    <div class=""> </div>
                                </div>
                                <div class="form-group col-md-6"> <input type="button" onclick="submit_otp_verification();" class="btn btn-primary btn-lg btn-block" value="Verify"> </div>
                                <div class="form-group col-md-6"> <input type="button" onclick="otp_resent();" class="btn btn-primary btn-lg btn-block" value="Resend"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="share-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="loginmodal-container"> <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:absolute;right:10px;top:10px;background:#aaa;padding:5px; border-radius:50%;width:40px;height:40px;"> <span aria-hidden="true">&times;</span></button>
                    <h1>Share with</h1><br>
                    <div class=""> <a href="upload.php" type="button" class="btn btn-primary btn-block text-white-social"><i class="fa fa-facebook"></i> Share with Facebook</a> </div> <br>
                    <div class=""> <button type="button" class="btn btn-danger btn-block"> <i class="fa fa-google-plus"></i> Share with GooglePlus</button> </div> <br>
                    <div class=""> <button type="button" class="btn btn-primary btn-block"> <i class="fa fa-linkedin"></i> Share with linkedin</button> </div><br>
                    <div class=""> <button type="button" class="btn btn-primary btn-block bg-twitter"> <i class="fa fa-twitter"></i> Share with twitter</button> </div>
                </div>
            </div>
        </div>
        <div class="chat-div">
            <?php if(isset($user_details) && count($user_details)>0){ ?>
            <?php if($user_details['completed']==''){ ?>
            <li class="page-scroll" style="padding-left:30px;margin-top:5px"> <a href="javascript:void(0);" onclick="send_msg()"> <img class="btn-chat-box" style="width:100px;height:auto;float:right;" src="<?php echo base_url(); ?>assets/vendor/front-end/img/livechat.png" alt="livechat"></a> </li>
            <div class="chat-div">
                <div>
                    <div style="display:none" class="chat-box">
                        <!-- DIRECT CHAT PRIMARY -->
                        <div class="box box-primary direct-chat direct-chat-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Direct Chat</h3> <a> <i class="fa fa-times-circle pull-right btn-chat-box" aria-hidden="true"></i></a>
                            </div> <!-- /.box-header -->
                            <div class="box-body chatmessages" id="chatmessages"> </div> <!-- /.box-body -->
                            <div class="box-footer">
                                <form action="#" method="post">
                                    <div class="input-group"> <input type="text" id="text_msg" name="text_msg" placeholder="Type Message ..." class="form-control"> <span class="input-group-btn"> <button type="button" onclick="send_msg()" class="btn btn-primary btn-flat">Send</button> </span> </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }else{ ?>
            <div class="chat-div">
                <div class="row" id=""> <span id="institue_pending_chats"></span> </div>
            </div>
            <li class="page-scroll" style="padding-left:30px;margin-top:5px"> <a href="javascript:void(0);" onclick="get_institue_msgs()"> <img style="width:100px;position:fixed;right:20px;bottom:0px;cursor: pointer;" data-toggle="tooltip" title="Chat with <?php echo isset($institues_name)?$institues_name:'Vuebin'; ?>" src="<?php echo base_url(); ?>assets/vendor/front-end/img/livechat.png" /></a> </li>
            <?php } ?>
            <?php }else{ ?>
            <li data-toggle="modal" data-target="#login-modal" class="page-scroll" style="padding-left:30px;margin-top:5px"><img style="width:100px;position:fixed;right:20px;bottom:0px;cursor: pointer;" data-toggle="tooltip"  title="Chat with <?php echo isset($institues_name)?$institues_name:'Vuebin'; ?>" src="<?php echo base_url(); ?>assets/vendor/front-end/img/livechat.png" /> 
			</li>
            <?php } ?>
        </div>
		 	 <div id="sucessmsg" style=""></div>
			 
			 <?php $lead_data=$this->session->userdata('lead_data'); ?>
        <?php if($lead_data['ip_address']!=$this->input->ip_address() && $lead_data['vuebin_data']==''){ ?>
        <script>
            $(document).ready(function() {
                $("#pop-modal").modal();
            });
        </script>
        <?php } ?>
		
		
        <script type="text/javascript">
            function sent_lead() {
					$('#lead_data').hide();
					$('#lead_num_otp').show();
                jQuery.ajax({
                    url: "<?php echo base_url('user/save_lead_information');?>",
                    data: {
                        l_id: '<?php echo $this->uri->segment(3); ?>',
                        course: $('#course_name').val(),
                        p_name: $('#name').val(),
                        email_id: $('#email_id').val(),
                        loc: $('#location_name').val(),
                        num: $('#contact_num').val(),
                    },
                    type: "POST",
                    format: "json",
                    success: function(data) {
						
                        var parsedData = JSON.parse(data);
                        if (parsedData.msg == 1) {
							$('#sucessmsg').html('  <div class="alert_msg1 animated slideInUp bg-succ"> Otp successfully sent. Check your Mobile  number <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i> </div>');
							$('#lead_id').val(parsedData.lead_id);
                            $('#lead_data').hide();
                            $('#lead_num_otp').show();
                        } else {
                            $('#lead_id').val(parsedData.lead_id);
                            $('#lead_data').show();
                            $('#lead_num_otp').hide();
                        }
                        return false;
                    }
                });
                return false;
            }

            function submit_otp_verification() {
                var otp = $('#verification_code').val();
                var lead_id = $('#lead_id').val();
                jQuery.ajax({
                    url: "<?php echo base_url('user/mobile_num_verification');?>",
                    data: {
                        otp: otp,
                        lead_id: lead_id,
                    },
                    type: "POST",
                    format: "json",
                    success: function(data) {
                        var parsedData = JSON.parse(data);
                        if (parsedData.msg == 1) {
                            $('#sucessmsg').html('  <div class="alert_msg1 animated slideInUp bg-succ"> Mobile number successfully verified <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i> </div>');
                            location.reload();
                        } else if (parsedData.msg == 0) {
							 $('#sucessmsg').html('<div class="alert_msg1 animated slideInUp bg-warn"> Technical problem will occurred. Please try again <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i> </div>');
							return false;
                        } else if (parsedData.msg == 2) {
						 $('#sucessmsg').html('<div class="alert_msg1 animated slideInUp bg-warn"> One Time Password is expired. Please try again <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i> </div>');
							return false;
                        } else if (parsedData.msg == 3) {
							$('#sucessmsg').html('<div class="alert_msg1 animated slideInUp bg-warn">Otp wrong. Please try again<i class="fa fa-check text-success ico_bac" aria-hidden="true"></i> </div>');
							return false;
                        }
                    }
                });
            }

            function otp_resent() {
                var lead_id = $('#lead_id').val();
                if (lead_id != '') {
                    jQuery.ajax({
                        url: "<?php echo base_url('user/resent_verification_code');?>",
                        data: {
                            lead_id: lead_id,
                        },
                        type: "POST",
                        format: "json",
                        success: function(data) {
                            var parsedData = JSON.parse(data);
                            if (parsedData.msg == 1) {
                                $("#EmptyforError").html("Otp successfully sent. Check  your  register Mobile  number").css("color", "red").fadeIn().fadeOut(5000);
                                $("#EmptyforError").focus();
                            } else if (parsedData.msg == 0) {
                                $("#EmptyforError").html("Technical problem will occurred. Please try again").css("color", "red").fadeIn().fadeOut(5000);
                                $("#EmptyforError").focus();
                            } else if (parsedData.msg == 2) {
                                $("#EmptyforError").html("Technical problem will occurred. Please try again").css("color", "red").fadeIn().fadeOut(5000);
                            }
                            return false;
                        }
                    });
                }
            }
            $(function() {
				$(".location_search").autocomplete({
                    source: [<?php foreach($location_values as $li){?> {
                        id: '<?php echo $li['l_id']; ?>',
                        value: '<?php echo $li['address']; ?>',
                        label: '<?php echo $li['address']; ?>',
                        img: '<?php echo base_url('assets/flags/'.strtolower($li['country_code']).'.png '); ?>',
                    }, <?php } ?>],
                    minLength: 1,
					focus: function( event, ui ) {
						var str= ui.item.value;
						var res = str.split(",");
						$(this).val(res[0]);

					return false;
					},
                    select: function(event, ui) {
						var str= ui.item.value;
						var res = str.split(",");
						$('#local_id').val(ui.item.id);
						$('#local_id1').val(ui.item.id);
						$("#myInput1").val(res[0]);
						$(".location_search").html(res[0]);
						$(".search_loc_mob").html(res[0]);
						return false;
                    },
                    html: true,
                    open: function(event, ui) {
                        $(".ui-autocomplete").css("z-index", 1000);
                    }
                }).autocomplete("instance")._renderItem = function(ul, item) {
                    return $("<li><div><span>&nbsp;" + item.value + "</span> &nbsp;<img style='width:25px;height:auto;margin-top:-5px;' src='" + item.img + "'></div></li>").appendTo(ul);
                };
            });
            $(function() {
                var homesearch = [<?php foreach($search_values as $lis){ ?> {
                    value: '<?php echo $lis['value']; ?>',
                    label: '<?php echo $lis['label']; ?>',
                }, <?php } ?>];
                var source = [];
                var mapping = {};
                for (var i = 0; i < homesearch.length; ++i) {
                    source.push(homesearch[i].label);
                    mapping[homesearch[i].label] = homesearch[i].value;
                }
                $('.homemenu_id').autocomplete({
                    minLength: 1,
                    source: source,
                    select: function(event, ui) {
                        $('#homemenu_id').val(mapping[ui.item.value]);
                        $('#homemenu_id1').val(mapping[ui.item.value]);
                    }
                });
            });

            function get_institue_msgs() {
                jQuery.ajax({
                    url: "<?php echo base_url('chat/get_institue_pending_chat_list');?>",
                    data: {
                        text: '',
                    },
                    type: "POST",
                    format: "html",
                    success: function(data) {
                        $("#institue_pending_chats").empty();
                        $("#institue_pending_chats").append(data);
                        scrollToBottom('div1');
                    }
                });
            }
        </script>
		<script>
$(document).ready(function(){
    $("#mobile-search-id").click(function(){
        $(".mobile-search").toggle();
    });
});
</script>