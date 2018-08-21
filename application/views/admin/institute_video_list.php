
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Institute video List
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('institutes/lists'); ?>"><i class="fa fa-dashboard"></i> Institute List</a></li>
        <li class="active"> Institute video List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
		
		<div class="box">
		<div class="box-header bg-primary">
				<div class="col-md-6">
				 <h2 class="box-title" style="color:#fff;line-height:35px;">Video's List</h2>
				</div>
				<div class="col-md-6">
					  <div class="pull-right">
						<a class="btn btn-default st-btn add-student-btn" href="<?php echo base_url('institute/addvideo/'.$institue_id); ?>"><i class="fa fa-plus"></i> Add Video</a>
						</div>
				</div>
			</div>
           
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="display:none;" ></th>
					<th>Institue Name</th>
					<th>Video</th>
					<th>Course Name</th>
					<th>Training Mode</th>
					<th>Video Mode</th>
					<th>Created Date</th>
					<th>Created By</th>
					<th>Status</th>
					<th>Action</th>
                </tr>
                </thead>
				<?php if(isset($video_list) && count($video_list)>0){ ?>
					<tbody>
						<?php foreach($video_list as $list){ ?>
							<tr>
							  <td style="display:none;"><?php echo $list['video_id']; ?></td>
							  <td><?php echo $list['i_name']; ?></td>
							  <td>
								<video width="30%" height="20%" class="thumbnail">
								<source src="<?php echo base_url('assets/videos/'.$list['video_file']); ?>" type="video/mp4">
								<source src="movie.ogg" type="video/ogg">
								</video>
							  </td>
							  
							  <td><?php echo $list['coursename']; ?></td>
							  <td><?php echo $list['training_mode']; ?></td>
							  <td><?php if($list['public']==1){ echo "Public";} ?>&nbsp;<?php if($list['private']==1){ echo ",";} ?>&nbsp;<?php if($list['private']==1){ echo "Private";} ?></td>
							 
							  <td> <?php echo date('M d ,Y',strtotime(htmlentities($list['created_at'])));?></td>
							  <td> <?php echo htmlentities($list['created_by']);?></td>
							  <td><?php if($list['status']==1){  echo "Active";}else{ echo "Deactive";} ?></td>
							  <td>
									  <a href="<?php echo base_url('institute/videoedit/'.$institue_id.'/'.base64_encode($list['video_id'])); ?>"  data-toggle="tooltip" title="Edit"><i class="fa fa-pencil btn btn-success"></i></a>
									  <a href="javascript;void(0);" onclick="admindeactive('<?php echo base64_encode(htmlentities($list['video_id'])).'/'.base64_encode(htmlentities($list['status'])).'/'.base64_encode($institue_id);?>');adminstatus('<?php echo $list['status'];?>')" data-toggle="modal" data-target="#myModal" title="Edit"><i class="fa fa-info-circle btn btn-warning"></i></a>
									  <a href="javascript;void(0);" onclick="admindedelete('<?php echo base64_encode($list['video_id']).'/'.base64_encode($institue_id) ?>');admindedeletemsg();" data-toggle="modal" data-target="#myModal" title="Delete"><i class="fa fa-trash btn btn-danger"></i></a>
								
							  </td>
							  
							</tr>
						<?php } ?>
					</tbody>
				<?php } ?>
                <tfoot>
                <tr>
				 <th style="display:none;" ></th>
					<th>Institue Name</th>
					<th>Video</th>
					<th>Course Name</th>
					<th>Training Mode</th>
					<th>Video Mode</th>
					<th>Created Date</th>
					<th>Created By</th>
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
	$(".popid").attr("href","<?php echo base_url('institute/videostatus'); ?>"+"/"+id);
} 

function admindedelete(id){
	$(".popid").attr("href","<?php echo base_url('institute/videodelete'); ?>"+"/"+id);
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
