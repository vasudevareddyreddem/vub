<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Upload  Video</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
            <form id="addvideo" method="post" class="" action="<?php echo base_url('video/addpost'); ?>" enctype="multipart/form-data">
						<input type="hidden" id="i_id" name="i_id" value="<?php echo $institute_details['i_id']; ?>">
						<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Upload  Video</label>
								<div class="">
									<input type="file" class="form-control" name="video_file" id="video_file"  />
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Course Name</label>
								<div class="">
								<select  class="form-control select2" name="course_name" id="course_name">
								<option value="">Select</option>
								<?php if(isset($course_list) && count($course_list)>0){ ?>
								<?php foreach($course_list as $list){ ?>
								<option value="<?php echo $list['course_id']; ?>"><?php echo $list['c_name']; ?></option>
								<?php } ?>
								<?php } ?>
								</select>
								</div>
							</div>
                        </div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Training Mode</label>
									<div class="row">
									<div class="col-lg-3">
										<div class="checkbox">
											<label>
												<input type="checkbox" name="training_mode[]" value="Offline" /> Offline
											</label>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="checkbox">
											<label>
												<input type="checkbox" name="training_mode[]" value="Online" /> Online
											</label>
										</div>
									</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Video Title</label>
									<div class="">
										<input type="text" class="form-control" name="v_title" id="v_title" value="" placeholder="Video Title" />
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Video Description</label>
									<div class="">
										<input type="text" class="form-control" name="v_desc" id="v_desc" value="" placeholder="Video Description" />
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Trainer Name</label>
									<div class="">
										<input type="text" class="form-control" name="t_name" id="t_name" value="" placeholder="Trainer Name" />
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">About Trainer</label>
									<div class="">
										<input type="text" class="form-control" name="a_author" id="a_author" value="" placeholder="About Trainer" />
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Country</label>
									<div class="">
										<select  class="form-control select2" onchange="get_city_list(this.value)" name="country_name" id="country_name">
										<option value="">Select</option>
										<?php if(isset($countries_list) && count($countries_list)>0){ ?>
											<?php foreach($countries_list as $list){ ?>
												<?php if($list['c_id']==$institute_details['country_name']){ ?>
													<option selected value="<?php echo $list['c_id']; ?>"><?php echo $list['country_name']; ?></option>
												<?php }else{?>
													<option value="<?php echo $list['c_id']; ?>"><?php echo $list['country_name']; ?></option>
												<?php } ?>
											<?php } ?>
										<?php } ?>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">City</label>
									<div class="">
										<select  class="form-control select2" onchange="get_location_list(this.value)" name="i_city" id="i_city">
										<option value="">Select</option>
										<?php if(isset($city_list) && count($city_list)>0){ ?>
											<?php foreach($city_list as $list){ ?>
												<?php if($list['city_id']==$institute_details['i_city']){ ?>
													<option selected value="<?php echo $list['city_id']; ?>"><?php echo $list['city_name']; ?></option>
												<?php }else{?>
													<option value="<?php echo $list['city_id']; ?>"><?php echo $list['city_name']; ?></option>
												<?php } ?>
											<?php } ?>
										<?php } ?>
									
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Location</label>
									<div class="">
										<select  class="form-control select2" name="location_name" id="location_name">
											<option value="">Select</option>
											<?php if(isset($location_list) && count($location_list)>0){ ?>
												<?php foreach($location_list as $list){ ?>
													<?php if($list['l_id']==$institute_details['location_name']){ ?>
														<option selected value="<?php echo $list['l_id']; ?>"><?php echo $list['location_name']; ?></option>
													<?php }else{?>
														<option value="<?php echo $list['l_id']; ?>"><?php echo $list['location_name']; ?></option>
													<?php } ?>
												<?php } ?>
											<?php } ?>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Upcoming Batch Schedules</label>
									<div class="">
										<input type="text" class="form-control" name="u_b_schedule" id="u_b_schedule" value="" placeholder="Upcoming Batch Schedules" />
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Course Duration</label>
									<div class="">
										<input type="text" class="form-control" name="course_duration" id="course_duration" value="" placeholder="Course Duration" />
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Fee</label>
									<div class="">
										<input type="text" class="form-control" name="c_fee" id="c_fee" value="" placeholder="Fee" />
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Video Tags</label>
									<div class="">
										<input type="text" class="form-control" name="v_tags" id="v_tags" value="" placeholder="Video Tags" />
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Course Content</label>
									<div class="">
										<input type="text" class="form-control" name="course_content" id="course_content" value="" placeholder="Course Content" />
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Display Mode</label>
									<div class="row">
									<div class="col-lg-3">
										<div class="checkbox">
											<label>
												<input type="checkbox" name="public" value="1" /> Public
											</label>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="checkbox">
											<label>
												<input type="checkbox" name="private" value="1" /> Private
											</label>
										</div>
									</div>
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
    $('#addvideo').bootstrapValidator({
        
        fields: {
             video_file: {
                validators: {
					notEmpty: {
						message: 'Upload Video is required'
					},
					regexp: {
					regexp: "(.*?)\.(mp4|mp3|3gp|ogg|avi|wmv)$",
					message: "Uploaded file is not a valid. Only mp4,mp3,3gp,ogg,avi,wmv video's are allowed"
					}
				}
            }, 
			course_name: {
                validators: {
					notEmpty: {
						message: 'Course Name is required'
					}
				}
            },
			'training_mode[]': {
                validators: {
					notEmpty: {
						message: 'Training_mode is required'
					}
				}
            },
			v_title: {
                validators: {
					notEmpty: {
						message: 'Video Title is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Video Title wont allow <> [] = % '
					}
				}
            },
			v_desc: {
                validators: {
					
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Video Description wont allow <> [] = % '
					}
				}
            },
			t_name: {
                validators: {
					
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Trainer Name wont allow <> [] = % '
					}
				}
            },
            country_name: {
					 validators: {
						notEmpty: {
						message: 'Country  is required'
					}
				}
			},
			i_city: {
					 validators: {
					notEmpty: {
						message: 'City is required'
					}
				}
				},
				location_name: {
					 validators: {
					notEmpty: {
						message: 'Location is required'
					}
				}
				},
				vendor: {
					 validators: {
					notEmpty: {
						message: 'Vendor is required'
					}
				}
				}
            }
        })
     
});
function get_location_list(city_id){
	if(city_id !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('institute/get_location_lists');?>",
   			data: {
				city_id: city_id,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
						
						if(data.msg=1){
							var parsedData = JSON.parse(data);
						//alert(parsedData.list.length);
							$('#location_name').empty();
							$('#location_name').append("<option>select</option>");
							for(i=0; i < parsedData.list.length; i++) {
								//console.log(parsedData.list);
							$('#location_name').append("<option value="+parsedData.list[i].l_id+">"+parsedData.list[i].location_name+"</option>");                      
                    
								
							 
							}
						}
						
   					}
           });
	   }
}
function get_city_list(country_id){
	if(country_id !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('institute/get_city_lists');?>",
   			data: {
				country_id: country_id,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
						
						if(data.msg=1){
							var parsedData = JSON.parse(data);
						//alert(parsedData.list.length);
							$('#i_city').empty();
							$('#i_city').append("<option>select</option>");
							for(i=0; i < parsedData.list.length; i++) {
								//console.log(parsedData.list);
							$('#i_city').append("<option value="+parsedData.list[i].city_id+">"+parsedData.list[i].city_name+"</option>");                      
                    
								
							 
							}
						}
						
   					}
           });
	   }
}
</script>
