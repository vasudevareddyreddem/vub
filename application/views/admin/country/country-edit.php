<div class="content-wrapper">
<section class="content-header">
      <h1>
        Edit Country
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('country/lists/'); ?>"><i class="fa fa-dashboard"></i>Countries  List</a></li>
        <li class="active"> Edit Country</li>
      </ol>
    </section>
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Country</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
            <form id="addcountry" method="post" class="" action="<?php echo base_url('country/editpost'); ?>">
						<input type="hidden" id="country_id" name="country_id" value="<?php echo $country_details['c_id']; ?>">
						<div class="col-md-8">
							<div class="form-group">
								<label class=" control-label">Country Name</label>
								<div class="">
									<input type="text" class="form-control" name="country_name" id="country_name" value="<?php echo $country_details['country_name']; ?>" placeholder="Country Name" />
								</div>
							</div>
                        </div>
						<div class="col-md-8">
							<div class="form-group">
								<label class=" control-label">Country Code</label>
								<div class="">
									<input type="text" class="form-control" name="country_code" id="country_code" value="<?php echo $country_details['country_code']; ?>" placeholder="Country Code" />
								</div>
							</div>
                        </div>
						<div class="clearfix">&nbsp;</div>
						  <div class="form-group">
                            <div class="col-lg-4 col-lg-offset-6">
							
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Update</button>
                                <a href="<?php echo base_url('country/lists'); ?>" type="button" class="btn btn-danger" name="signup" value="edit">cancel</a>
								
                                
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
    $('#addcountry').bootstrapValidator({
        
        fields: {
             country_name: {
                validators: {
					notEmpty: {
						message: 'Country Name is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Country Name wont allow <> [] = % '
					}
				}
            },
            country_code: {
					 validators: {
					notEmpty: {
						message: 'Country Code is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Country Code wont allow <> [] = % '
					}
				}
				}
            }
        })
     
});
</script>
