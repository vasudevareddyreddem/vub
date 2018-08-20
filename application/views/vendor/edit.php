<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Vendor</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
            <form id="addcountry" method="post" autocomplete="off" class="" action="<?php echo base_url('vendor/editpost'); ?>" enctype="multipart/form-data">
						<input  type="hidden" id="v_id" name="v_id" value="<?php echo isset($vendor_details['v_id'])?$vendor_details['v_id']:''; ?>">
						<div class="col-md-8">
							<div class="form-group">
								<label class=" control-label">venodr</label>
								<div class="">
									<input type="text" class="form-control" name="v_name" id="v_name" value="<?php echo isset($vendor_details['v_name'])?$vendor_details['v_name']:''; ?>" placeholder="Vendor" />
								</div>
							</div>
                        </div>
						<div class="col-md-8">
							<div class="form-group">
								<label class=" control-label">Image</label>
								<div class="">
									<input type="file" class="form-control" name="image" id="image"/>
								</div>
							</div>
                        </div>
						
						
						
						<div class="clearfix">&nbsp;</div>
						  <div class="form-group">
                            <div class="col-lg-4 col-lg-offset-6">
							
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Update</button>
								
                                
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
             v_name: {
                validators: {
					notEmpty: {
						message: 'Vendor Name is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Vendor Name wont allow <> [] = % '
					}
				}
            },
            image: {
					 validators: {
					
					 regexp: {
					regexp: /\.(jpe?g|png|gif)$/i,
					message: 'Uploaded file is not a valid image. Only JPG, PNG and GIF files are allowed'
					}
				}
				}
            }
        })
     
});

</script>