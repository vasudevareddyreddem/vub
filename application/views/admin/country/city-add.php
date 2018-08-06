<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add City</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
            <form id="addcity" method="post" class="" action="<?php echo base_url('city/addpost'); ?>">
						<input type="hidden"  name="country_id" id="country_id" value="<?php echo $country_details['c_id']; ?>" />

						<div class="col-md-8">
							<div class="form-group">
								<label class=" control-label">Country Name</label>
								<div class="">
								<input type="text" readonly="true" class="form-control" name="country_name" id="country_name" value="<?php echo $country_details['country_name']; ?>" placeholder="Country Name" />
								</div>
							</div>
                        </div>
						<div class="col-md-8">
							<div class="form-group">
								<label class=" control-label">City Name</label>
								<div class="">
									<input type="text" class="form-control" name="city_name" id="city_name" placeholder="City Name" />
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
    $('#addcity').bootstrapValidator({
        
        fields: {
             city_name: {
                validators: {
					notEmpty: {
						message: 'State Name is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Country Name wont allow <> [] = % '
					}
				}
            }
            }
        })
     
});
</script>
