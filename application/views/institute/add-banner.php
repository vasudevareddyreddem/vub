<div class="content-wrapper">
 <section class="content-header">
      <h1>
       Add Institute Banner
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Institute Banner</li>
      </ol>
    </section>
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update Institute Banner</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
            <form onsubmit="return check_validations();" id="addbanner" method="post" class="" action="<?php echo base_url('institute/updatebannerpost'); ?>" enctype="multipart/form-data">
						<div class="row">
						
						<div class="col-md-6">
						<input  type="hidden" id="validation_value" name="validation_value" value="0">
							<div class="form-group">
								<label class=" control-label">Institute Banner</label>
								<div class="">
									<input type="file" class="form-control" name="banner_img" id="banner_img" placeholder="Institute Logo" />
								</div>
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

  <script type="text/javascript">
  function check_validations(){
	  var check_value=$('#validation_value').val();
	  if(check_value==2){
		 return true; 
	  }else{
		 alert('Use only 1000*150 dimensions images');
		return false;		 
	  }
  }
	  
	  var _URL = window.URL || window.webkitURL;

$("#banner_img").change(function(e) {
    
    var image, file;

    if ((file = this.files[0])) {
       
        image = new Image();
        
        image.onload = function() {
			
			if(this.width==1000 && this.height==150){
				$('#validation_value').val(2);
			}
            
        };
    
        image.src = _URL.createObjectURL(file);


    }

});
	  
 
  
  
  
  $(document).ready(function() {
   $('#addbanner').bootstrapValidator({
        
        fields: {
             banner_img: {
                validators: {
					file: {
                        extension: 'jpeg,png,jpg',
                        type: 'image/jpeg,image/png,image/jpg',
                        maxSize: 2048 * 1024,
                        message: 'The selected file is not valid'
                    }
				}
            }
            }
        })
     
});
</script>
