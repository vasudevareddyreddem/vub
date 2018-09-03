
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users List
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
		<div class="box">
            <div class="box-header">
              <h3 class="box-title">Users List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
					<th style="display:none;" ></th>
					<th>Source</th>
					<th>Name</th>
					<th>Email Id</th>
					<th>Mobile Number</th>
					<th>Created at</th>
                </tr>
                </thead>
				<?php if(isset($user_list) && count($user_list)>0){ ?>
					<tbody>
						<?php foreach($user_list as $list){ ?>
							<tr>
							  <td style="display:none;"><?php echo $list['cust_id']; ?></td>
							  <td><?php echo $list['source']; ?></td>
							 
							  <td><?php echo $list['name']; ?></td>
							  <td><?php echo $list['email_id']; ?></td>
							  <td><?php echo $list['mobile']; ?></td>
							  <td> <?php echo date('M d ,Y',strtotime(htmlentities($list['created_at'])));?></td>
							  
							  
							</tr>
						<?php } ?>
					</tbody>
				<?php } ?>
                <tfoot>
                <tr>
				  <th style="display:none;" ></th>
					<th>Source</th>
					<th>Name</th>
					<th>Email Id</th>
					<th>Mobile Number</th>
					<th>Created at</th>
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
