<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>vuebin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/dist/css/bootstrapValidator.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/plugins/datatables/dataTables.bootstrap.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/dist/css/style.css">
  <!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>assets/vendor/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/dist/js/bootstrapValidator.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>


</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
	 <?php if($details['role_id']==1){ ?>
    <a href="<?php echo base_url('admin'); ?>" class="logo">
	 <?php }else{ ?>
	  <a href="<?php echo base_url(''); ?>" class="logo">
	 <?php } ?>
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>V</b>uebin</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Vuebin</b> Admin</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
         
          <!-- Tasks: style can be found in dropdown.less -->
          <!--<li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>-->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<?php if(isset($details['profile_pic']) && $details['profile_pic']!=''){ ?>
              <img src="<?php echo base_url('assets/institute_logo/'.$details['profile_pic']); ?>" class="user-image" alt=" <?php echo isset($details['profile_pic'])?$details['profile_pic']:''; ?>">
			<?php }else{ ?>
				<img src="<?php echo base_url(); ?>assets/vendor/dist/img/img.png" class="user-image" alt="User Image">
			<?php } ?>
              <span class="hidden-xs"><?php echo isset($details['name'])?$details['name']:''; ?> </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
               <?php if(isset($details['profile_pic']) && $details['profile_pic']!=''){ ?>
              <img src="<?php echo base_url('assets/institute_logo/'.$details['profile_pic']); ?>" class="img-circle" alt=" <?php echo isset($details['profile_pic'])?$details['profile_pic']:''; ?>">
			<?php }else{ ?>
				<img src="<?php echo base_url(); ?>assets/vendor/dist/img/img.png" class="img-circle" alt="User Image">
			<?php } ?>

                <p>
                  <?php echo isset($details['name'])?$details['name']:''; ?> 
                  <small><?php echo isset($details['role'])?$details['role']:''; ?> </small>
                </p>
              </li>
              <!-- Menu Body -->
              <!--<li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
              </li>-->
              <!-- Menu Footer-->
              <li class="user-footer">
			  <?php if(isset($details['role_id']) && $details['role_id']==1){ ?>
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
			  <?php }else{ ?>
			  <?php if(isset($details['completed'])&& $details['completed']==1){ ?>
			   <div class="pull-left">
                  <a href="<?php echo base_url('institute/details'); ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
			  <?php } ?>
			  <?php } ?>
                <div class="pull-right">
                  <a href="<?php echo base_url('user/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          	<?php if(isset($details['profile_pic']) && $details['profile_pic']!=''){ ?>
              <img src="<?php echo base_url('assets/institute_logo/'.$details['profile_pic']); ?>" class="user-image" alt=" <?php echo isset($details['profile_pic'])?$details['profile_pic']:''; ?>">
			<?php }else{ ?>
				<img src="<?php echo base_url(); ?>assets/vendor/dist/img/img.png" class="user-image" alt="User Image">
			<?php } ?>
        </div>
        <div class="pull-left info">
          <p> <?php echo isset($details['name'])?$details['name']:''; ?> </p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?php echo isset($details['role'])?$details['role']:''; ?> </a>
        </div>
      </div>
    <?php //echo '<pre>';print_r($details);exit; ?>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
      <?php if($details['role_id']==1){ ?>
		  <li class="treeview">
			  <a href="#">
				<i class="fa fa-file-video-o"></i>
				<span>Home Page Video</span>
			  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
			  </a>
				<ul class="treeview-menu">
					<li><a href="<?php echo base_url('video/homevideo'); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
					<li><a href="<?php echo base_url('video/homevideolists'); ?>"><i class="fa fa-circle-o"></i> List</a></li>
				</ul>
		</li>
		<li class="treeview">
			  <a href="#">
				<i class="fa fa-globe"></i>
				<span>Country</span>
		 <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
			  </a>
				<ul class="treeview-menu">
					<li><a href="<?php echo base_url('country'); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
					<li><a href="<?php echo base_url('country/lists'); ?>"><i class="fa fa-circle-o"></i> List</a></li>
				</ul>
		</li>
		<li class="treeview">
			  <a href="#">
				<i class="fa fa-files-o"></i>
				<span>Course Type</span>
				 <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
			  </a>
				<ul class="treeview-menu">
					<li><a href="<?php echo base_url('course/addtype'); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
					<li><a href="<?php echo base_url('course/typelists'); ?>"><i class="fa fa-circle-o"></i> List</a></li>
				</ul>
		</li>
		<li class="treeview">
				  <a href="#">
					<i class=" fa fa-file-text-o"></i>
					<span>Course </span>
					 <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
				  </a>
				<ul class="treeview-menu">
					<li><a href="<?php echo base_url('course'); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
					<li><a href="<?php echo base_url('course/lists'); ?>"><i class="fa fa-circle-o"></i> List</a></li>
				</ul>
			</li>
		<li class="treeview">
			  <a href="#">
				<i class="fa fa-sitemap"></i>
				<span>Classification</span>
				 <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
			  </a>
				<ul class="treeview-menu">
					<li><a href="<?php echo base_url('classification'); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
					<li><a href="<?php echo base_url('classification/lists'); ?>"><i class="fa fa-circle-o"></i> List</a></li>
				</ul>
		</li>
		<li class="treeview">
			  <a href="#">
				<i class="fa fa-user"></i>
				<span>Vendor</span>
					 <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
			  </a>
				<ul class="treeview-menu">
					<li><a href="<?php echo base_url('vendor'); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
					<li><a href="<?php echo base_url('vendor/lists'); ?>"><i class="fa fa-circle-o"></i> List</a></li>
				</ul>
		</li>
		<li class="treeview">
				  <a href="#">
					<i class="fa fa-spinner"></i>
					<span>Publish Course</span>
						 <span class="pull-right-container">
						  <i class="fa fa-angle-left pull-right"></i>
						</span>
				  </a>
				<ul class="treeview-menu">
					<li><a href="<?php echo base_url('publish'); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
					<li><a href="<?php echo base_url('publish/lists'); ?>"><i class="fa fa-circle-o"></i> List</a></li>
				</ul>
			</li>
			<li class="treeview">
				  <a href="#">
					<i class="fa fa-plus-square"></i>
					<span>Add Institute</span>
						 <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
				  </a>
				<ul class="treeview-menu">
					<li><a href="<?php echo base_url('institute/admin_add'); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
					<li><a href="<?php echo base_url('institute/admin_lists'); ?>"><i class="fa fa-circle-o"></i> List</a></li>
				</ul>
			</li>
			<li class="treeview">
				  <a href="<?php echo base_url('content/footer'); ?>">
					<i class="fa fa-text-width"></i>
					<span>Footer Content</span>
					 <span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				  </a>
			</li>
			<li class="treeview">
				  <a href="<?php echo base_url('content/aboutus'); ?>">
					<i class="fa fa-text-height"></i>
					<span>About Us Content</span>
						 <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
				  </a>
			</li>
			<li class="treeview">
				  <a href="<?php echo base_url('content/testimonial'); ?>">
					<i class="fa fa-frown-o"></i>
					<span>Testimonial</span>
					<span class="pull-right-container">
					  <span class="label label-primary pull-right"></span>
					</span>
				  </a>
			</li>
			<li class="treeview">
				  <a href="<?php echo base_url('institute/subscribeers'); ?>">
					<i class="fa fa-hand-o-up"></i>
					<span>Subscribed List</span>
					<span class="pull-right-container">
					  <span class="label label-primary pull-right"></span>
					</span>
				  </a>
				
			</li>
			<li class="treeview">
				  <a href="<?php echo base_url('institute/userlists'); ?>">
					<i class="fa fa-users"></i>
					<span>Users List</span>
					<span class="pull-right-container">
					  <span class="label label-primary pull-right"></span>
					</span>
				  </a>
				
			</li>
			<li class="treeview">
				  <a href="<?php echo base_url('institute/leads'); ?>">
					<i class="fa fa-user-secret"></i>
					<span>Leads List</span>
					<span class="pull-right-container">
					  <span class="label label-primary pull-right"></span>
					</span>
				  </a>
			</li>
		
	  <?php }else if($details['role_id']==2){ ?>
			<?php if(isset($details['completed'])&& $details['completed']==1){ ?>
			
			<li class="treeview">
				  <a href="#">
					<i class="fa fa-institution (alias)"></i>
					<span>Institute</span>
						 <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
				  </a>
				<ul class="treeview-menu">
					<li><a href="<?php echo base_url('institute/details'); ?>"><i class="fa fa-circle-o"></i> Details</a></li>
				</ul>
			</li>
			
			<li class="treeview">
				  <a href="#">
					<i class="fa fa-upload"></i>
					<span>Upload  Video</span>
						 <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
				  </a>
				<ul class="treeview-menu">
					<li><a href="<?php echo base_url('video'); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
					<li><a href="<?php echo base_url('video/lists'); ?>"><i class="fa fa-circle-o"></i> List</a></li>
				</ul>
			</li>
			<li class="treeview">
				  <a href="<?php echo base_url('institute/subscribeers'); ?>">
					<i class="fa fa-hand-o-up"></i>
					<span>Subscribed List</span>
					<span class="pull-right-container">
					  <span class="label label-primary pull-right"></span>
					</span>
				  </a>
				
			</li>
			<li class="treeview">
				  <a href="<?php echo base_url('institute/leads'); ?>">
					<i class="fa fa-user-secret"></i>
					<span>Leads List</span>
					<span class="pull-right-container">
					  <span class="label label-primary pull-right"></span>
					</span>
				  </a>
			</li>
			<?php }else{ ?>
				<li class="treeview">
					  <a href="#">
						<i class="fa fa-institution (alias)"></i>
						<span>Institute</span>
							 <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
					  </a>
					<ul class="treeview-menu">
						<li><a href="<?php echo base_url('institute'); ?>"><i class="fa fa-circle-o"></i> Add</a></li>
					</ul>
				</li>

			<?php } ?>
	  <?php } ?>
		
		
       
       
       
    </section>
    <!-- /.sidebar -->
  </aside>
    <!--view modals-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
			
			<div style="padding:10px">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 style="pull-left" class="modal-title">Confirmation</h4>
			</div>
			<div class="modal-body">
			<div class="alert alert-danger alert-dismissible" id="errormsg" style="display:none;"></div>
			  <div class="row">
				<div id="content1" class="col-xs-12 col-xl-12 form-group">
				Are you sure ? 
				</div>
				<div class="col-xs-6 col-md-6">
				  <button type="button" aria-label="Close" data-dismiss="modal" class="btn  blueBtn">Cancel</button>
				</div>
				<div class="col-xs-6 col-md-6">
                <a href="?id=value" class="btn  blueBtn popid" style="text-decoration:none;float:right;"> <span aria-hidden="true">Ok</span></a>
				</div>
			 </div>
		  </div>
      </div>
      
    </div>
  </div>
  <!--notification -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Notifications at <span class="" id="notification_time"></span ></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="notification_msg"> </p>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
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
  <!-- =============================================== -->