<div class="content-wrapper">
 <section class="content-header">
      <h1>
        Edit city
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('country/lists/'); ?>"><i class="fa fa-dashboard"></i>Countries  List</a></li>
        <li><a href="<?php echo base_url('city/index/'.base64_encode($city_details['c_id'])); ?>"><i class="fa fa-dashboard"></i>city List</a></li>
        <li class="active"> Edit city</li>
      </ol>
    </section>
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit City</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
            <form id="addstate" method="post" class="" action="<?php echo base_url('city/editpost'); ?>">
						<input type="hidden"  name="country_id" id="country_id" value="<?php echo $city_details['c_id']; ?>" />
						<input type="hidden"  name="city_id" id="city_id" value="<?php echo $city_details['city_id']; ?>" />

						<div class="col-md-8">
							<div class="form-group">
								<label class=" control-label">Country Name</label>
								<div class="">
								<input type="text" readonly="true" class="form-control" name="country_name" id="country_name" value="<?php echo $city_details['country_name']; ?>" placeholder="Country Name" />
								</div>
							</div>
                        </div>
						<div class="col-md-8">
							<div class="form-group">
								<label class=" control-label">State Name</label>
								<div class="">
									<input type="text" class="form-control" name="city_name" id="city_name" value="<?php echo $city_details['city_name']; ?>" placeholder="State Name" />
								</div>
							</div>
                        </div>
						
						<div class="clearfix">&nbsp;</div>
						  <div class="form-group">
                            <div class="col-lg-4 col-lg-offset-6">
							
                                <button type="submit" class="btn btn-primary" name="signup" value="add">Update</button>
                                <a href="<?php echo base_url('city/index/'.base64_encode($city_details['c_id'])); ?>" type="button" class="btn btn-danger" name="signup" value="add">cancel</a>
								
                                
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
    $('#addstate').bootstrapValidator({
        
        fields: {
             city_name: {
                validators: {
					notEmpty: {
						message: 'State Name is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Country Name wont allow <> [] = % '
					}
				}
            }
            }
        })
     
});
</script>
