
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
			  <div class="pull-right">
			<span class="bg-primary" style="padding:8px">
              <i class="fa fa-filter"></i>
			  </span>
			  <h3 class="box-title">  
			  <select class="form-control" onchange="get_filter_data(this.value)">
				<option value="">Select</option>
				<option value="">01-09-2018</option>
				<option value="">02-09-2018</option>
				<option value="">03-09-2018</option>
				<option value="">04-09-2018</option>
				<option value="">05-09-2018</option>
				<option value="">06-09-2018</option>
			  </select></h3>
			  <button class="btn btn-primary" style="border-radius:0px;margin-top:-2px;margin-left:-4px;">Filter</button>
			  </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             
        <span id="change_filter_data"> 
				  <div class="row">
					<div class="col-lg-3 col-xs-6">
					  <!-- small box -->
					  <div class="small-box bg-aqua">
						<div class="inner">
						  <h3><?php echo isset($total_institues['count'])?$total_institues['count']:''; ?></h3>

						  <p>Total Institutes</p>
						</div>
						<div class="icon">
						  <i class="ion ion-bag"></i>
						</div>
						<a href="<?php echo base_url('institute/admin_lists'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-xs-6">
					  <!-- small box -->
					  <div class="small-box bg-green">
						<div class="inner">
						  <h3><?php echo isset($total_video['count'])?$total_video['count']:''; ?></h3>

						  <p>Total Videos</p>
						</div>
						<div class="icon">
						  <i class="ion ion-stats-bars"></i>
						</div>
						<a href="<?php echo base_url('institute/admin_lists'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-xs-6">
					  <!-- small box -->
					  <div class="small-box bg-primary">
						<div class="inner">
						  <h3><?php echo isset($total_user['count'])?$total_user['count']:''; ?></h3>

						  <p>Total Users</p>
						</div>
						<div class="icon">
						  <i class="ion ion-person-add"></i>
						</div>
						<a href="<?php echo base_url('institute/userlists'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
					<!-- ./col -->
					<div class="col-lg-3 col-xs-6">
					  <!-- small box -->
					  <div class="small-box bg-red">
						<div class="inner">
						  <h3><?php echo isset($total_course['count'])?$total_course['count']:''; ?></h3>

						  <p>Total Courses</p>
						</div>
						<div class="icon">
						  <i class="ion ion-pie-graph"></i>
						</div>
						<a href="<?php echo base_url('course/lists'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
					<div class="col-lg-3 col-xs-6">
					  <!-- small box -->
					  <div class="small-box bg-green">
						<div class="inner">
						  <h3><?php echo isset($total_vendors['count'])?$total_vendors['count']:''; ?></h3>

						  <p>Total Vendors</p>
						</div>
						<div class="icon">
						  <i class="ion ion-pie-graph"></i>
						</div>
						<a href="<?php echo base_url('vendor/lists'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
					  </div>
					</div>
					<div class="col-lg-3 col-xs-6">
					  <!-- small box -->
					  <div class="small-box bg-orange">
						<div class="inner">
						  <h3><?php echo isset($total_classification['count'])?$total_classification['count']:''; ?></h3>

						  <p>Total Classifications</p>
						</div>
						<div class="icon">
						  <i class="ion ion-pie-graph"></i>
						</div>
						<a href="<?php echo base_url('classification/lists'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
<script>
function get_filter_data(id){
	if(id !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('dashboard/get_date_wise_dashboard');?>",
   			data: {
				date: id,
			},
   			type: "POST",
   			format:"html",
   					success:function(data){
						if(data.msg=1){
						}
					}
           });
	   }
}
</script>