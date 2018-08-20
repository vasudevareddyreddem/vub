<div class="content-wrapper">
 <section class="content-header">
      <h1>
        Edit Location
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('location/index/'.base64_encode($location_details['city_id'])); ?>"><i class="fa fa-dashboard"></i>city List</a></li>
        <li class="active"> Edit city</li>
      </ol>
    </section>
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Location</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
            <form id="addstate" method="post" class="" action="<?php echo base_url('location/editpost'); ?>">
						<input type="hidden"  name="location_id" id="location_id" value="<?php echo $location_details['l_id']; ?>" />
						<input type="hidden"  name="city_id" id="city_id" value="<?php echo $location_details['city_id']; ?>" />
						<input type="hidden"  name="country_id" id="country_id" value="<?php echo isset($country_id)?$country_id:''; ?>" />


						<div class="col-md-8">
							<div class="form-group">
								<label class=" control-label">City Name</label>
								<div class="">
								<input type="text" readonly="true" class="form-control" name="country_name" id="country_name" value="<?php echo $location_details['city_name']; ?>" placeholder="City Name" />
								</div>
							</div>
                        </div>
						<div class="col-md-8">
							<div class="form-group">
								<label class=" control-label">Location Name</label>
								<div class="">
									<input type="text" class="form-control" name="location_name" id="location_name" value="<?php echo $location_details['location_name']; ?>" placeholder="Location Name" />
								</div>
							</div>
                        </div>
						
						<div class="clearfix">&nbsp;</div>
						  <div class="form-group">
                            <div class="col-lg-4 col-lg-offset-6">
							
                                <button type="submit" class="btn btn-primary" name="signup" value="add">Update</button>
                                <a href="<?php echo base_url('location/index/'.base64_encode($location_details['city_id'])); ?>" type="button" class="btn btn-danger" name="signup" value="add">cancel</a>
								
                                
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
    $('#addstate').bootstrapValidator({
        
        fields: {
             city_name: {
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
