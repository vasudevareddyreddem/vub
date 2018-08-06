
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Location List
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('city/index/'.$country_id); ?>"><i class="fa fa-dashboard"></i> city List</a></li>
        <li class="active">Location list </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
		<div class="box">
			<div class="box-header bg-primary">
				<div class="col-md-6">
				 <h2 class="box-title" style="color:#fff;line-height:35px;">Location List</h2>
				</div>
				<div class="col-md-6">
					  <div class="pull-right">
						<a class="btn btn-default st-btn add-student-btn" href="<?php echo base_url('location/add/'.base64_encode($city_id).'/'.$country_id); ?>"><i class="fa fa-plus"></i> Add Location</a>
						</div>
				</div>
			</div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="display:none;" ></th>
                  <th>Location Name</th>
                  <th>City Name</th>
                  <th>Created Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
				<?php if(isset($location_list) && count($location_list)>0){ ?>
					<tbody>
						<?php foreach($location_list as $list){ ?>
							<tr>
							  <td style="display:none;"><?php echo $list['l_id']; ?></td>
							  <td><?php echo $list['location_name']; ?></td>
							  <td><?php echo $list['city_name']; ?></td>
							  <td> <?php echo date('M d ,Y',strtotime(htmlentities($list['created_at'])));?></td>
							  <td><?php if($list['l_status']==1){  echo "Active";}else{ echo "Deactive";} ?></td>
							  <td>
									  <a href="<?php echo base_url('location/edit/'.base64_encode($list['l_id']).'/'.$country_id); ?>"  data-toggle="tooltip" title="Edit"><i class="fa fa-pencil btn btn-success"></i></a>
									  <a href="javascript;void(0);" onclick="admindeactive('<?php echo base64_encode(htmlentities($list['l_id'])).'/'.base64_encode(htmlentities($list['l_status'])).'/'.base64_encode($list['city_id']).'/'.$country_id;?>');adminstatus('<?php echo $list['l_status'];?>')" data-toggle="modal" data-target="#myModal" title="Edit"><i class="fa fa-info-circle btn btn-warning"></i></a>
									  <a href="javascript;void(0);" onclick="admindedelete('<?php echo base64_encode($list['l_id']).'/'.base64_encode($list['city_id']).'/'.$country_id ?>');admindedeletemsg();" data-toggle="modal" data-target="#myModal" title="Delete"><i class="fa fa-trash btn btn-danger"></i></a>
								
							  </td>
							  
							</tr>
						<?php } ?>
					</tbody>
				<?php } ?>
                <tfoot>
                <tr>
				 <th style="display:none;" ></th>
					<th>Location Name</th>
                  <th>City Name</th>
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
	$(".popid").attr("href","<?php echo base_url('location/status'); ?>"+"/"+id);
} 

function admindedelete(id){
	$(".popid").attr("href","<?php echo base_url('location/deletes'); ?>"+"/"+id);
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
