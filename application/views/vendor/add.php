<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Vendor</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
            <form id="addcountry" method="post" class="" action="<?php echo base_url('vendor/addpost'); ?>" enctype="multipart/form-data">
						
						<div class="col-md-8">
							<div class="form-group">
								<label class=" control-label">Vendor</label>
								<div class="">
									<input type="text" class="form-control" name="v_name" id="v_name" placeholder="Vendor Name" />
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
