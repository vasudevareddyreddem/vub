<div class="content-wrapper">
 <section class="content-header">
      <h1>
       Add Location 
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('location/index/'.base64_encode($city_details['city_id'])); ?>"><i class="fa fa-dashboard"></i> city List</a></li>
        <li class="active">Add Location</li>
      </ol>
    </section>

   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Location</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
            <form id="addlocation" method="post" class="" action="<?php echo base_url('location/addpost'); ?>">
						<input type="hidden"  name="city_id" id="city_id" value="<?php echo $city_details['city_id']; ?>" />
						<input type="hidden"  name="country_id" id="country_id" value="<?php echo isset($country_id)?$country_id:''; ?>" />

						<div class="col-md-8">
							<div class="form-group">
								<label class=" control-label">City Name</label>
								<div class="">
								<input type="text" readonly="true" class="form-control" name="city_name" id="city_name" value="<?php echo $city_details['city_name']; ?>" placeholder="city Name" />
								</div>
							</div>
                        </div>
						<div class="col-md-8">
							<div class="form-group">
								<label class=" control-label">Location Name</label>
								<div class="">
									<input type="text" class="form-control" name="location_name" id="location_name" placeholder="Location Name" />
								</div>
							</div>
                        </div>
						
						<div class="clearfix">&nbsp;</div>
						  <div class="form-group">
                            <div class="col-lg-4 col-lg-offset-6">
							
                                <button type="submit" class="btn btn-primary" name="signup" value="add">Add</button>
								
                                
                            </div>
                        </div>
						
                    </form>
					<div class="clearfix">&nbsp;</div>
          </div>
          </div>
          <!-- /.box -->

         

        </div>
		
      
        </div>
		
      
      <!-- /.row -->
    </section> 
	
</div>

  <script type="text/javascript">$(document).ready(function() {
    $('#addlocation').bootstrapValidator({
        
        fields: {
             location_name: {
                validators: {
					notEmpty: {
						message: 'Location Name is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Location Name wont allow <> [] = % '
					}
				}
            }
            }
        })
     
});
</script>
