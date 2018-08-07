<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Course</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
            <form id="addcourse" method="post" class="" action="<?php echo base_url('course/addpost'); ?>" enctype="multipart/form-data">
						<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Course Name</label>
								<div class="">
									<input type="text" class="form-control" name="c_name" id="c_name" placeholder="Course Name" />
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Course Image</label>
								<div class="">
									<input type="file" class="form-control" name="c_logo" id="c_logo" placeholder="Course Logo" />
								</div>
							</div>
                        </div>
						</div><div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Course Type</label>
								<div class="">
								<select  class="form-control select2" name="c_type" id="c_type">
								<option value="">Select</option>
								<?php if(isset($course_type_list) && count($course_type_list)>0){ ?>
								<?php foreach($course_type_list as $list){ ?>
								<option value="<?php echo $list['c_t_l']; ?>"><?php echo $list['course_type']; ?></option>
								<?php } ?>
								<?php } ?>
								</select>
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Course Profile 1</label>
								<div class="">
									<input type="text" class="form-control" name="c_profile_1" id="c_profile_1" placeholder="Course Profile 1" />
								</div>
							</div>
                        </div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Course Profile 2</label>
									<div class="">
										<input type="text" class="form-control" name="c_profile_2" id="c_profile_2" placeholder="Course Profile 2" />
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Course Profile 3</label>
									<div class="">
										<input type="text" class="form-control" name="c_profile_3" id="c_profile_3" placeholder="Course Profile 3" />
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Course Profile 4</label>
									<div class="">
										<input type="text" class="form-control" name="c_profile_4" id="c_profile_4" placeholder="Course Profile 4" />
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Course Profile 5</label>
									<div class="">
										<input type="text" class="form-control" name="c_profile_5" id="c_profile_5" placeholder="Course Profile 5" />
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Course Profile 6</label>
									<div class="">
										<input type="text" class="form-control" name="c_profile_6" id="c_profile_6" placeholder="Course Profile 6" />
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Course Profile 7</label>
									<div class="">
										<input type="text" class="form-control" name="c_profile_7" id="c_profile_7" placeholder="Course Profile 7" />
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Course Profile 8</label>
									<div class="">
										<input type="text" class="form-control" name="c_profile_8" id="c_profile_8" placeholder="Course Profile 8" />
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Course Profile 9</label>
									<div class="">
										<input type="text" class="form-control" name="c_profile_9" id="c_profile_9" placeholder="Course Profile 9" />
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Course Profile 10</label>
									<div class="">
										<input type="text" class="form-control" name="c_profile_10" id="c_profile_10" placeholder="Course Profile 10" />
									</div>
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
				}
            }
        })
     
});

</script>
