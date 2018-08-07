<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Classification</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
            <form id="addcountry" method="post" autocomplete="off" class="" action="<?php echo base_url('classification/editpost'); ?>" enctype="multipart/form-data">
						<input  type="hidden" id="c_id" name="c_id" value="<?php echo isset($class_details['c_id'])?$class_details['c_id']:''; ?>">
						<div class="col-md-8">
							<div class="form-group">
								<label class=" control-label">Classification</label>
								<div class="">
									<input type="text" class="form-control" name="c_name" id="c_name" value="<?php echo isset($class_details['c_name'])?$class_details['c_name']:''; ?>" placeholder="Classification" />
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
