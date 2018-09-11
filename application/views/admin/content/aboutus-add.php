<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Us Content</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
            <form id="addcountry" method="post" class="" action="<?php echo base_url('content/addaboutuspost'); ?>"  enctype="multipart/form-data">
						
						<div class="col-md-12">
							<div class="form-group">
								<label class=" control-label">About Us Video</label>
									<div class="">
									<input type="file" class="form-control" name="video_file" id="video_file"  />
								</div>
							</div>
                        </div>
						<div class="col-md-12">
							<div class="form-group">
								<label class=" control-label">About Us Content</label>
								<div class="">
									<textarea id="editor1" name="aboutus_content" rows="10" cols="80" required>
									<?php echo isset($details['aboutus'])?$details['aboutus']:''; ?>
									</textarea>	
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
             aboutus_content: {
                validators: {
					notEmpty: {
						message: 'Country Name is required'
					}
				}
            },
			aboutus_content: {
                validators: {
					regexp: {
					regexp: "(.*?)\.(mp4|mp3|3gp|ogg|avi|wmv)$",
					message: "Uploaded file is not a valid. Only mp4,mp3,3gp,ogg,avi,wmv video's are allowed"
					}
				}
            }
            }
        })
     
});
</script>
