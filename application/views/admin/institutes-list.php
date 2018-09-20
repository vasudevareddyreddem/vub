
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Institute List
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Institute List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
		<div class="box">
            <div class="box-header">
              <h3 class="box-title">Institute List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="display:none;" ></th>
                  <th>Institute Name</th>
                  <th>Institute Logo</th>
                  <th>Email Id</th>
                  <th>Mobile Number</th>
                  <th>Contact Person</th>
                  <th>Location</th>
                  <th>Address</th>
                  <th>Created On</th>
                  <th>Videos Count</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
				<?php if(isset($institutes_list) && count($institutes_list)>0){ ?>
					<tbody>
						<?php foreach($institutes_list as $list){ ?>
							<tr>
							  <td style="display:none;"><?php echo $list['i_id']; ?></td>
							  <td><?php echo $list['i_name']; ?></td>
							  <td>
							  <?php if($list['i_logo']!=''){ ?>
							  <img class="img-responsive" style="width:150px;height:auto;" src="<?php echo base_url('assets/institute_logo/'.$list['i_logo']); ?>">
							  <?php } ?>
							  </td>
							  <td><?php echo $list['i_email_id']; ?></td>
							  <td><?php echo $list['i_p_phone']; ?></td>
							  <td><?php echo $list['i_contact_person']; ?></td>
							  <td><?php echo $list['l_name']; ?></td>
							  <td><?php echo $list['i_address']; ?></td>
							  <td> <?php echo date('M d ,Y',strtotime(htmlentities($list['created_at'])));?></td>
							   <td><?php echo $list['video_count']; ?></td>
							  <td><?php if($list['status']==1){  echo "Active";}else{ echo "Deactive";} ?></td>
							  <td>
									  <a href="<?php echo base_url('institute/admin_edit/'.base64_encode($list['i_id'])); ?>"  data-toggle="tooltip" title="Edit"><i class="fa fa-pencil btn btn-success"></i></a>
									  <a href="<?php echo base_url('institute/admin_uploadvideolist/'.base64_encode($list['i_id'])); ?>"  data-toggle="tooltip" title="Upload"><i class="fa fa-upload btn btn-success"></i></a>
									  <a href="javascript;void(0);" onclick="admindeactive('<?php echo base64_encode(htmlentities($list['i_id'])).'/'.base64_encode(htmlentities($list['status']));?>');adminstatus('<?php echo $list['status'];?>')" data-toggle="modal" data-target="#myModal" title="Edit"><i class="fa fa-info-circle btn btn-warning"></i></a>
									  <a href="javascript;void(0);" onclick="admindedelete('<?php echo base64_encode($list['i_id']) ?>');admindedeletemsg();" data-toggle="modal" data-target="#myModal" title="Delete"><i class="fa fa-trash btn btn-danger"></i></a>
								
							  </td>
							  
							</tr>
						<?php } ?>
					</tbody>
				<?php } ?>
                <tfoot>
                <tr>
				 <th style="display:none;" ></th>
                  <th>Institute Name</th>
                  <th>Institute Logo</th>
                  <th>Email Id</th>
                  <th>Mobile Number</th>
                  <th>Contact Person</th>
                  <th>Location</th>
                  <th>Address</th>
                  <th>Created On</th>
				   <th>Videos Count</th>
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
	$(".popid").attr("href","<?php echo base_url('institute/institute_status'); ?>"+"/"+id);
} 

function admindedelete(id){
	$(".popid").attr("href","<?php echo base_url('institute/institute_delete'); ?>"+"/"+id);
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
