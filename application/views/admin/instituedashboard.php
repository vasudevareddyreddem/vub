
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
       </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	    <div class="box box-default">
            <div class="box-header with-border">
			<div class="pull-left">
		
			  <h3 class="box-title"> Dashboard</h3>
			
			  </div>
			  
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             
        <span id="change_filter_data"> 
				  <div class="row">
					
					<div class="col-lg-4 col-xs-6">
					  <!-- small box -->
					  <div class="small-box bg-green">
						<div class="inner">
						  <h3><?php echo isset($total_video['count'])?$total_video['count']:''; ?></h3>

						  <p>Total Videos</p>
						</div>
						<div class="icon">
						  <i class="ion ion-stats-bars"></i>
						</div>
						<a href="<?php echo base_url('video/lists'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
					<!-- ./col -->
					<div class="col-lg-4 col-xs-6">
					  <!-- small box -->
					  <div class="small-box bg-primary">
						<div class="inner">
						  <h3><?php echo isset($total_leads['count'])?$total_leads['count']:''; ?></h3>

						  <p>Total Leads</p>
						</div>
						<div class="icon">
						  <i class="ion ion-person-add"></i>
						</div>
						<a href="<?php echo base_url('institute/leads'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
					<!-- ./col -->
					<div class="col-lg-4 col-xs-6">
					  <!-- small box -->
					  <div class="small-box bg-red">
						<div class="inner">
						  <h3><?php echo isset($total_course['count'])?$total_course['count']:''; ?></h3>

						  <p>Total Courses</p>
						</div>
						<div class="icon">
						  <i class="ion ion-pie-graph"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
					
					
					<!-- ./col -->
				  </div>
	  </span>
	     </div>
            <!-- /.box-body -->
          </div>
    

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
