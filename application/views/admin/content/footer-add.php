<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Footer Content</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
            <form id="addcountry" method="post" class="" action="<?php echo base_url('content/addfooterpost'); ?>">
						
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Mobile Number 1</label>
								<div class="">
									<input  type="text" class="form-control" name="mobile1" id="mobile1" value="<?php echo isset($details['mobile1'])?$details['mobile1']:''; ?>">
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Mobile Number 2</label>
								<div class="">
									<input  type="text" class="form-control" name="mobile2" id="mobile2" value="<?php echo isset($details['mobile2'])?$details['mobile2']:''; ?>">
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Email Id</label>
								<div class="">
									<input  type="email" class="form-control" name="email_id" id="email_id" value="<?php echo isset($details['email_id'])?$details['email_id']:''; ?>">
								</div>
							</div>
                        </div>
						<div class="col-md-12">
							<div class="form-group">
								<label class=" control-label">Address</label>
								<div class="">
									<textarea id="editor1" name="footer_content" rows="10" cols="80" required>
									<?php echo isset($details['footer'])?$details['footer']:''; ?>
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
             mobile1: {
                validators: {
					notEmpty: {
						message: 'Mobile Number1 is required'
					},
					regexp: {
					regexp:  /^[0-9]{10,14}$/,
					message:'Mobile Number1  must be 10 to 14 digits'
					}
				
				}
            }, 
			email_id: {
                validators: {
					notEmpty: {
						message: 'Email is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
					message: 'Please enter a valid email address. For example johndoe@domain.com.'
					}
				}
            },
			mobile2: {
                validators: {
					
					regexp: {
					regexp:  /^[0-9]{10,14}$/,
					message:'Mobile Number2  must be 10 to 14 digits'
					}
				
				}
            },
			footer_content: {
                validators: {
					notEmpty: {
						message: 'Country Name is required'
					}
				}
            }
            }
        })
     
});
</script>
