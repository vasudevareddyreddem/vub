
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Video's List
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Video's List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
		<div class="box">
            <div class="box-header">
              <h3 class="box-title">Video's List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
			 <form id="frm-example" action="" method="POST">
			  <hr>
              <p><button>Submit</button>
			  <input type="radio" name="video_type" value="demo">Demo
			  <input type="radio" name="video_type" value="full">Full
			  </p>
		
              <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
				<th><input name="select_all" value="1" type="checkbox">Select all</th>
                  <th style="display:none;" ></th>
					<th>Video</th>
					<th>Course Name</th>
					<th>Training Mode</th>
					<th>Video Mode</th>
					<th>Created Date</th>
					<th>Video Type</th>
					<th>Status</th>
					<th>Action</th>
                </tr>
                </thead>
				<?php if(isset($video_list) && count($video_list)>0){ ?>
					<tbody>
						<?php foreach($video_list as $list){ ?>
							<tr>
							 <td><?php echo $list['video_id']; ?></td>
							  <td style="display:none;"><?php echo $list['video_id']; ?></td>
							  <td>
								<video width="30%"  class="thumbnail">
								<source src="<?php echo base_url('assets/videos/'.$list['video_file']); ?>" type="video/mp4">
								<source src="movie.ogg" type="video/ogg">
								</video>
							  </td>
							  <td><?php echo $list['coursename']; ?></td>
							  <td><?php echo $list['training_mode']; ?></td>
							  <td><?php if($list['public']==1){ echo "Public";} ?>&nbsp;<?php if($list['private']==1){ echo ",";} ?>&nbsp;<?php if($list['private']==1){ echo "Private";} ?></td>
							 
							  <td> <?php echo date('M d ,Y',strtotime(htmlentities($list['created_at'])));?></td>
							  <td> <?php echo $list['demo_type']; ?>&nbsp;&nbsp;,<?php echo $list['full_type']; ?></td>
							  <td><?php if($list['status']==1){  echo "Active";}else{ echo "Deactive";} ?></td>
							  <td>
									  <a href="<?php echo base_url('video/edit/'.base64_encode($list['video_id'])); ?>"  data-toggle="tooltip" title="Edit"><i class="fa fa-pencil btn btn-success"></i></a>
									  <a href="javascript;void(0);" onclick="admindeactive('<?php echo base64_encode(htmlentities($list['video_id'])).'/'.base64_encode(htmlentities($list['status']));?>');adminstatus('<?php echo $list['status'];?>')" data-toggle="modal" data-target="#myModal" title="Edit"><i class="fa fa-info-circle btn btn-warning"></i></a>
									  <a href="javascript;void(0);" onclick="admindedelete('<?php echo base64_encode($list['video_id']) ?>');admindedeletemsg();" data-toggle="modal" data-target="#myModal" title="Delete"><i class="fa fa-trash btn btn-danger"></i></a>
								
							  </td>
							  
							</tr>
						<?php } ?>
					</tbody>
				<?php } ?>
                <tfoot>
                <tr>
				<th></th>
				 <th style="display:none;" ></th>
					<th>Video</th>
					<th>Course Name</th>
					<th>Training Mode</th>
					<th>Video Mode</th>
					<th>Created Date</th>
					<th>Video Type</th>
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
	 <div id="sucessmsg" style="display:none;"></div>
  
  <script>
  function updateDataTableSelectAllCtrl(table){
      var $table             = table.table().node();
      var $chkbox_all        = $('tbody input[type="checkbox"]', $table);
      var $chkbox_checked    = $('tbody input[type="checkbox"]:checked', $table);
      var chkbox_select_all  = $('thead input[name="select_all"]', $table).get(0);
   
      // If none of the checkboxes are checked
      if($chkbox_checked.length === 0){
         chkbox_select_all.checked = false;
         if('indeterminate' in chkbox_select_all){
            chkbox_select_all.indeterminate = false;
         }
   
      // If all of the checkboxes are checked
      } else if ($chkbox_checked.length === $chkbox_all.length){
         chkbox_select_all.checked = true;
         if('indeterminate' in chkbox_select_all){
            chkbox_select_all.indeterminate = false;
         }
   
      // If some of the checkboxes are checked
      } else {
         chkbox_select_all.checked = true;
         if('indeterminate' in chkbox_select_all){
            chkbox_select_all.indeterminate = true;
         }
      }
   }
   
   $(document).ready(function (){
      // Array holding selected row IDs
      var rows_selected = [];
      var table = $('#example').DataTable({
        'columnDefs': [{
      'targets': 0,
      'searchable': false,
      'orderable': false,
      'width': '1%',
      'className': 'dt-body-center',
      'render': function (data, type, full, meta){
          return '<input type="checkbox">';
      }
   }],
         'order': [1, 'desc'],
         'rowCallback': function(row, data, dataIndex){
            // Get row ID
            var rowId = data[0];
            // If row ID is in the list of selected row IDs
            if($.inArray(rowId, rows_selected) !== -1){
               $(row).find('input[type="checkbox"]').prop('checked', true);
               $(row).addClass('selected');
            }
         }
      });
   
      // Handle click on checkbox
      $('#example tbody').on('click', 'input[type="checkbox"]', function(e){
         var $row = $(this).closest('tr');
   
         // Get row data
         var data = table.row($row).data();
   
         // Get row ID
         var rowId = data[0];
   
         // Determine whether row ID is in the list of selected row IDs 
         var index = $.inArray(rowId, rows_selected);
   
         // If checkbox is checked and row ID is not in list of selected row IDs
         if(this.checked && index === -1){
            rows_selected.push(rowId);
   
         // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
         } else if (!this.checked && index !== -1){
            rows_selected.splice(index, 1);
         }
   
         if(this.checked){
            $row.addClass('selected');
         } else {
            $row.removeClass('selected');
         }
   
         // Update state of "Select all" control
         updateDataTableSelectAllCtrl(table);
   
         // Prevent click event from propagating to parent
         e.stopPropagation();
      });
   
      // Handle click on table cells with checkboxes
      $('#example').on('click', 'tbody td, thead th:first-child', function(e){
         $(this).parent().find('input[type="checkbox"]').trigger('click');
      });
   
      // Handle click on "Select all" control
      $('thead input[name="select_all"]', table.table().container()).on('click', function(e){
         if(this.checked){
            $('tbody input[type="checkbox"]:not(:checked)', table.table().container()).trigger('click');
         } else {
            $('tbody input[type="checkbox"]:checked', table.table().container()).trigger('click');
         }
   
         // Prevent click event from propagating to parent
         e.stopPropagation();
      });
   
      // Handle table draw event
      table.on('draw', function(){
         // Update state of "Select all" control
         updateDataTableSelectAllCtrl(table);
      });
       
      // Handle form submission event 
      $('#frm-example').on('submit', function(e){
         var form = this;
   
         // Iterate over all selected checkboxes
         $.each(rows_selected, function(index, rowId){
            // Create a hidden element 
            $(form).append(
                $('<input>')
                   .attr('type', 'hidden')
                   .attr('name', 'id[]')
                   .val(rowId)
            );
         });
   
         // FOR DEMONSTRATION ONLY     
         
         // Output form data to a console     
         //$('#example-console').text($(form).serialize());
        // console.log("Form submission", $(form).serialize());
   	 // var $data['videotype']=$('#video_type').val();
   	  var $data=$(form).serialize();
	 
	  //$('#hospitals_ids').val($data);
   	   jQuery.ajax({
   			url: "<?php echo base_url('video/addvideo_types');?>",
   			data:$data,
   			type: "POST",
   			format:"Json",
   					success:function(data){
   					var parsedData = JSON.parse(data);
					if(parsedData.msg==1){
						$('#sucessmsg').show('');
						$('#sucessmsg').html('<div class="alt_cus"><div class="alert_msg1 animated slideInUp btn_suc"> Product Successfully added to wishlist <i class="fa fa-check  text-success ico_bac" aria-hidden="true"></i></div></div>');  

						location.reload();
					}else if(parsedData.msg==2){
						alert('Please select  at least one type');return false;
					}
   					
   					}
           });
         // Remove added elements
         $('input[name="id\[\]"]', form).remove();
          
         // Prevent actual form submission
         e.preventDefault();
      });
   });
function admindeactive(id){
	$(".popid").attr("href","<?php echo base_url('video/status'); ?>"+"/"+id);
} 

function admindedelete(id){
	$(".popid").attr("href","<?php echo base_url('video/delete'); ?>"+"/"+id);
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

</script>
