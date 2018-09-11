<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Testimonial Content</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
            <form id="addcountry" method="post" class="" action="<?php echo base_url('content/addtestimonialpost'); ?>"  enctype="multipart/form-data">
						
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Testimonial Image</label>
									<div class="">
									<input type="file" class="form-control" name="image_file" id="image_file"  />
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Author Name</label>
									<div class="">
									<input type="text" class="form-control" name="author_name" id="author_name"  />
								</div>
							</div>
                        </div>
						<div class="col-md-12">
							<div class="form-group">
								<label class=" control-label">Testimonial Content</label>
								<div class="">
									<textarea id="editor1" name="testimonial" rows="10" cols="80" required>
									
									</textarea>	
								</div>
							</div>
                        </div>
						
						<div class="clearfix">&nbsp;</div>
						  <div class="form-group">
                            <div class="col-lg-4 col-lg-offset-6">
							
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">Add</button>
								
                                
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
             author_name: {
                validators: {
					
					notEmpty: {
						message: 'Author Name is required'
					}
					}
				},
				testimonial: {
                validators: {
					
					notEmpty: {
						message: 'Testimonial is required'
					}
					}
				},
			image_file: {
				validators: {
					notEmpty: {
						message: 'Upload File is required'
					},
					regexp: {
					regexp: "(.*?)\.(jpg|jpeg|png|gif|svg)$",
					message: "Uploaded file is not a valid. Only jpg,jpeg,png,gif,svg are allowed"
					}
				}
				}
            }
        })
     
});
</script>
