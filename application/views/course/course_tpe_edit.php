<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Course Type</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
            <form id="addcountry" method="post" autocomplete="off" class="" action="<?php echo base_url('course/editcoursetype_post'); ?>" enctype="multipart/form-data">
						<input  type="hidden" id="c_t_l" name="c_t_l" value="<?php echo isset($cpurse_type_details['c_t_l'])?$cpurse_type_details['c_t_l']:''; ?>">
						<div class="col-md-8">
							<div class="form-group">
								<label class=" control-label">Course Type</label>
								<div class="">
									<input type="text" class="form-control" name="course_name" id="course_name" value="<?php echo isset($cpurse_type_details['course_type'])?$cpurse_type_details['course_type']:''; ?>" placeholder="Course type Name" />
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
             course_name: {
                validators: {
					notEmpty: {
						message: 'Course Type is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Course Type wont allow <> [] = % '
					}
				}
            }
            }
        })
     
});

</script>