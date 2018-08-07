<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Publish Course</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
            <form id="addcourse" method="post" class="" action="<?php echo base_url('publish/editpost'); ?>" enctype="multipart/form-data">
						<input  type="hidden" name="c_id" id="c_id" value="<?php echo isset($course_details['course_id'])?$course_details['course_id']:''; ?>">
						<div class="col-md-8">
							<div class="form-group">
								<label class=" control-label">Course Name</label>
								<div class="">
								<select  class="form-control select2" name="c_name" id="c_name">
								<option value="">Select</option>
								<?php if(isset($course_list) && count($course_list)>0){ ?>
									<?php foreach($course_list as $list){ ?>
										<?php if($course_details['course_id']==$list['course_id']){ ?>
											<option  selected value="<?php echo $list['course_id']; ?>"><?php echo $list['c_name']; ?></option>
										<?php }else{ ?>
											<option value="<?php echo $list['course_id']; ?>"><?php echo $list['c_name']; ?></option>

										<?php } ?>
									<?php } ?>
								<?php } ?>
								</select>
								</div>
							</div>
                        </div>
						<div class="col-md-8">
							<div class="form-group">
								<label class=" control-label">Classification</label>
								<div class="">
								<select  class="form-control select2" name="c_type" id="c_type">
								<option value="">Select</option>
								<?php if(isset($class_list) && count($class_list)>0){ ?>
										<?php foreach($class_list as $list){ ?>
											<?php if($course_details['classification_id']==$list['c_id']){ ?>
											<option  selected value="<?php echo $list['c_id']; ?>"><?php echo $list['c_name']; ?></option>
											<?php }else{ ?>
												<option value="<?php echo $list['c_id']; ?>"><?php echo $list['c_name']; ?></option>
											<?php } ?>
										<?php } ?>
								<?php } ?>
								</select>
								</div>
							</div>
                        </div>
						<div class="col-md-8">
							<div class="form-group">
								<label class=" control-label">Vendor</label>
								<div class="">
								<select  class="form-control select2" name="vendor" id="vendor">
								<option value="">Select</option>
								<?php if(isset($vendor_list) && count($vendor_list)>0){ ?>
								<?php foreach($vendor_list as $list){ ?>
								<?php if($course_details['v_id']==$list['v_id']){ ?>
											<option  selected value="<?php echo $list['v_id']; ?>"><?php echo $list['v_name']; ?></option>
											<?php }else{ ?>
												<option value="<?php echo $list['v_id']; ?>"><?php echo $list['v_name']; ?></option>
											<?php } ?>
								<?php } ?>
								<?php } ?>
								</select>
								</div>
							</div>
                        </div>
						
						
						<div class="clearfix">&nbsp;</div>
						  <div class="form-group">
                            <div class="col-lg-4 col-lg-offset-6">
							
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up">update</button>
								
                                
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
    $('#addcourse').bootstrapValidator({
        
        fields: {
             c_name: {
                validators: {
					notEmpty: {
						message: 'Course Name is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Course Name wont allow <> [] = % '
					}
				}
            },
            c_type: {
					 validators: {
					notEmpty: {
						message: 'Course Type is required'
					}
				}
				},vendor: {
					 validators: {
					notEmpty: {
						message: 'Vendor is required'
					}
				}
				}
            }
        })
     
});

</script>
