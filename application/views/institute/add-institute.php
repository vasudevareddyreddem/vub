<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Institute</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
            <form id="addcountry" method="post" class="" action="<?php echo base_url('country/addpost'); ?>">
						
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Institute Name</label>
								<div class="">
									<input type="text" class="form-control" name="i_name" id="i_name" placeholder="Institute Name" />
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Institute Logo</label>
								<div class="">
									<input type="text" class="form-control" name="i_logo" id="i_logo" placeholder="Institute Logo" />
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">About Institute</label>
								<div class="">
									<input type="text" class="form-control" name="i_about" id="i_about" placeholder="About Institute" />
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Website</label>
								<div class="">
									<input type="text" class="form-control" name="i_website" id="i_website" placeholder="ex: http://Institute.com" />
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
								<option value="<?php echo $list['c_id']; ?>"><?php echo $list['country_name']; ?></option>
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
							
								</select>
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Detailed Address</label>
								<div class="">
									<input type="text" class="form-control" name="i_address" id="i_address" placeholder="Country Name" />
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Primary Contact</label>
								<div class="">
									<input type="text" class="form-control" name="i_p_phone" id="i_p_phone" placeholder="Primary Contact" />
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Secondary Contact</label>
								<div class="">
									<input type="text" class="form-control" name="i_s_phone" id="i_s_phone" placeholder="Secondary Contact" />
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">E-Mail ID</label>
								<div class="">
									<input type="text" class="form-control" name="i_email_id" id="i_email_id" placeholder="Email Id" />
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Founder Name</label>
								<div class="">
									<input type="text" class="form-control" name="i_founder" id="i_founder" placeholder="Founder Name" />
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">About Founder</label>
								<div class="">
									<input type="text" class="form-control" name="i_f_about" id="i_f_about" placeholder="About Founder" />
								</div>
							</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
								<label class=" control-label">Contact Person</label>
								<div class="">
									<input type="text" class="form-control" name="i_contact_person" id="i_contact_person" placeholder="Contact Person" />
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
function get_location_list(country_id){
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
