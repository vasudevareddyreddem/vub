
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Videos List
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Videos List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
		<div class="box">
            <div class="box-header">
              <h3 class="box-title">Videos List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="display:none;" ></th>
					<th>Video</th>
					<th>Title</th>
					<th>Created Date</th>
					<th>Home Status</th>
					<th>Action</th>
                </tr>
                </thead>
				<?php if(isset($video_list) && count($video_list)>0){ ?>
					<tbody>
						<?php foreach($video_list as $list){ ?>
							<tr>
							  <td style="display:none;"><?php echo $list['video_id']; ?></td>
							  <td>
								<video width="30%" height="20%" class="thumbnail">
								<source src="<?php echo base_url('assets/homepage_videos/'.$list['video_name']); ?>" type="video/mp4">
								<source src="movie.ogg" type="video/ogg">
								</video>
							  </td>
							  <td><?php echo $list['title']; ?></td>
							 
							  <td> <?php echo date('M d ,Y',strtotime(htmlentities($list['created_at'])));?></td>
							  <td><?php if($list['status']==1){  echo "Active";}else{ echo "Deactive";} ?></td>
							  <td>
									  <a href="<?php echo base_url('video/homepagevideoedit/'.base64_encode($list['h_v_id'])); ?>"  data-toggle="tooltip" title="Edit"><i class="fa fa-pencil btn btn-success"></i></a>
									  <a href="javascript;void(0);" onclick="admindeactive('<?php echo base64_encode(htmlentities($list['h_v_id'])).'/'.base64_encode(htmlentities($list['status']));?>');adminstatus('<?php echo $list['status'];?>')" data-toggle="modal" data-target="#myModal" title="Edit"><i class="fa fa-info-circle btn btn-warning"></i></a>
									  <a href="javascript;void(0);" onclick="admindedelete('<?php echo base64_encode($list['h_v_id']) ?>');admindedeletemsg();" data-toggle="modal" data-target="#myModal" title="Delete"><i class="fa fa-trash btn btn-danger"></i></a>
								
							  </td>
							  
							</tr>
						<?php } ?>
					</tbody>
				<?php } ?>
                <tfoot>
                <tr>
				 <th style="display:none;" ></th>
					<th>Video</th>
					<th>Title</th>
					<th>Created Date</th>
					<th>Home Status</th>
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
	$(".popid").attr("href","<?php echo base_url('video/homepagevideostatus'); ?>"+"/"+id);
} 

function admindedelete(id){
	$(".popid").attr("href","<?php echo base_url('video/homepagevideodelete'); ?>"+"/"+id);
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
