<div class="content-wrapper">
 <section class="content-header">
      <h1>
       Edit Institute 
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('institutes/lists'); ?>"><i class="fa fa-dashboard"></i> Institutes List</a></li>
        <li class="active">Edit Institute</li>
      </ol>
    </section>
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Institute</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
            <form id="addcountry" method="post" class="" action="<?php echo base_url('institutes/editpost'); ?>" enctype="multipart/form-data">
						<input  type="hidden" name="i_id" id="i_id" value="<?php echo isset($institute_details['i_id'])?$institute_details['i_id']:''; ?>">
						<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Institute Name</label>
								<div class="">
									<input type="text" class="form-control" name="i_name" id="i_name" value="<?php echo isset($institute_details['i_name'])?$institute_details['i_name']:''; ?>" placeholder="Institute Name" />
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Institute Logo</label>
								<div class="">
									<input type="file" class="form-control" name="i_logo" id="i_logo" placeholder="Institute Logo" />
								</div>
							</div>
                        </div>
                        </div>
						<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">About Institute</label>
								<div class="">
									<input type="text" class="form-control" name="i_about" id="i_about" value="<?php echo isset($institute_details['i_about'])?$institute_details['i_about']:''; ?>" placeholder="About Institute" />
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Website</label>
								<div class="">
									<input type="text" class="form-control" name="i_website" id="i_website" value="<?php echo isset($institute_details['i_website'])?$institute_details['i_website']:''; ?>" placeholder="ex: http://Institute.com" />
								</div>
							</div>
                        </div>
                        </div>
						<div class="row">
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
                        </div>
						<div class="row">
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
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Detailed Address</label>
								<div class="">
									<input type="text" class="form-control" name="i_address" id="i_address" value="<?php echo isset($institute_details['i_address'])?$institute_details['i_address']:''; ?>" placeholder="Detailed Address" />
								</div>
							</div>
                        </div>
                        </div>
						<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Primary Contact</label>
								<div class="">
									<input type="text" class="form-control" name="i_p_phone" id="i_p_phone" value="<?php echo isset($institute_details['i_p_phone'])?$institute_details['i_p_phone']:''; ?>" placeholder="Primary Contact" />
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Secondary Contact</label>
								<div class="">
									<input type="text" class="form-control" name="i_s_phone" id="i_s_phone" value="<?php echo isset($institute_details['i_s_phone'])?$institute_details['i_s_phone']:''; ?>" placeholder="Secondary Contact" />
								</div>
							</div>
                        </div>
                        </div>
						<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">E-Mail ID</label>
								<div class="">
									<input type="text" class="form-control" name="i_email_id" id="i_email_id" value="<?php echo isset($institute_details['i_email_id'])?$institute_details['i_email_id']:''; ?>" placeholder="Email Id" />
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Founder Name</label>
								<div class="">
									<input type="text" class="form-control" name="i_founder" id="i_founder" value="<?php echo isset($institute_details['i_founder'])?$institute_details['i_founder']:''; ?>" placeholder="Founder Name" />
								</div>
							</div>
                        </div>
                        </div>
						<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">About Founder</label>
								<div class="">
									<input type="text" class="form-control" name="i_f_about" id="i_f_about" value="<?php echo isset($institute_details['i_f_about'])?$institute_details['i_f_about']:''; ?>" placeholder="About Founder" />
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Contact Person</label>
								<div class="">
									<input type="text" class="form-control" name="i_contact_person" id="i_contact_person" value="<?php echo isset($institute_details['i_contact_person'])?$institute_details['i_contact_person']:''; ?>" placeholder="Contact Person" />
								</div>
							</div>
                        </div>
                        </div>
						<div class="clearfix">&nbsp;</div>
						  <div class="form-group">
                            <div class="col-lg-4 col-lg-offset-6">
							
                                <button type="submit" class="btn btn-primary" name="signup" value="Update">Update</button>
								
                                
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
						message: 'Country is required'
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
			i_address: {
                validators: {
					notEmpty: {
						message: 'Detailed Address is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Detailed Address wont allow <> [] = % '
					}
				}
            },
			i_p_phone: {
                validators: {
					notEmpty: {
						message: 'Primary Contact is required'
					},
					 regexp: {
					regexp:  /^[0-9]{10}$/,
					message:'Primary Contact must be 10 to 14 digits'
					}
				}
            },
			i_s_phone: {
                validators: {
					notEmpty: {
						message: 'Secondary Contact is required'
					},
					 regexp: {
					regexp:  /^[0-9]{10,14}$/,
					message:'Secondary Contact must be 10 to 14 digits'
					}
				}
            },
			i_email_id: {
                validators: {
					notEmpty: {
						message: 'E-Mail ID is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
					message: 'Please enter a valid email address. For example johndoe@domain.com.'
					}
				}
            },
            i_name: {
					 validators: {
					notEmpty: {
						message: 'Institute Name is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Institute Name wont allow <> [] = % '
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
