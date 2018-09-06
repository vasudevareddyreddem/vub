
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        City List
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('country/lists'); ?>"><i class="fa fa-dashboard"></i> Countries List</a></li>
        <li class="active">City List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
		<div class="box">
			<div class="box-header bg-primary">
				<div class="col-md-6">
				 <h2 class="box-title" style="color:#fff;line-height:35px;">City List</h2>
				</div>
				<div class="col-md-6">
					  <div class="pull-right">
						<a class="btn btn-default st-btn add-student-btn" href="<?php echo base_url('city/add/'.base64_encode($country_id)); ?>"><i class="fa fa-plus"></i> Add city</a>
						</div>
				</div>
			</div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="display:none;" ></th>
                  <th>City Name</th>
                  <th>Country Name</th>
                  <th>Location Count</th>
                  <th>Add Location</th>
                  <th>Created Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
				<?php if(isset($citys_list) && count($citys_list)>0){ ?>
					<tbody>
						<?php foreach($citys_list as $list){ ?>
							<tr>
							  <td style="display:none;"><?php echo $list['city_id']; ?></td>
							  <td><?php echo $list['city_name']; ?></td>
							  <td><?php echo $list['country_name']; ?></td>
							  <td><?php echo $list['location_count']; ?></td>
							  <td><a href="<?php echo base_url('location/index/'.base64_encode($list['city_id']).'/'.base64_encode($country_id)); ?>">Add Location</a></td>
							  <td> <?php echo date('M d ,Y',strtotime(htmlentities($list['created_at'])));?></td>
							  <td><?php if($list['c_status']==1){  echo "Active";}else{ echo "Deactive";} ?></td>
							  <td>
									  <a href="<?php echo base_url('city/edit/'.base64_encode($list['city_id'])); ?>"  data-toggle="tooltip" title="Edit"><i class="fa fa-pencil btn btn-success"></i></a>
									  <a href="javascript;void(0);" onclick="admindeactive('<?php echo base64_encode(htmlentities($list['city_id'])).'/'.base64_encode(htmlentities($list['c_status'])).'/'.base64_encode($list['c_id']);?>');adminstatus('<?php echo $list['c_status'];?>')" data-toggle="modal" data-target="#myModal" title="Edit"><i class="fa fa-info-circle btn btn-warning"></i></a>
									  <a href="javascript;void(0);" onclick="admindedelete('<?php echo base64_encode($list['city_id']).'/'.base64_encode($list['c_id']) ?>');admindedeletemsg();" data-toggle="modal" data-target="#myModal" title="Delete"><i class="fa fa-trash btn btn-danger"></i></a>
								
							  </td>
							  
							</tr>
						<?php } ?>
					</tbody>
				<?php } ?>
                <tfoot>
                <tr>
				 <th style="display:none;" ></th>
				<th>city Name</th>
				<th>Country Name</th>
				<th>Location Count</th>
                  <th>Add Location</th>
                  <th>Created Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>	
  <script>
  function admindeactive(id){
	$(".popid").attr("href","<?php echo base_url('city/status'); ?>"+"/"+id);
} 

function admindedelete(id){
	$(".popid").attr("href","<?php echo base_url('city/deletes'); ?>"+"/"+id);
}
function adminstatus(id){
	if(id==1){
			$('#content1').html('Are you sure you want to Deactivate?');
		
	}if(id==0){
			$('#content1').html('Are you sure you want to activate?');
	}
}
function admindedeletemsg(id){
	$('#content1').html('Are you sure you want to delete?');
	
}
  $(function () {
     $("#example1").DataTable({
		 "order": [[0, "desc" ]]
	});
    
  });
</script>
