<div class="content-wrapper">
<section class="content-header">
      <h1>
        Edit Home Page Header Video
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Home Page Header Video</li>
      </ol>
    </section>
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Home Page Header Video</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
            <form id="addcountry" method="post" class="" action="<?php echo base_url('video/homepagevideoeditpost'); ?>" enctype="multipart/form-data">
						<input type="hidden" id="h_vi_id" name="h_vi_id" value="<?php echo isset($details['h_v_id'])?$details['h_v_id']:''; ?>">
						<div class="col-md-8">
							<div class="form-group">
								<label class=" control-label">Title</label>
								<div class="">
									<input type="text" class="form-control" name="title" value="<?php echo isset($details['title'])?$details['title']:''; ?>" id="title" placeholder="Title" />
								</div>
							</div>
                        </div>
						<div class="col-md-8">
							<div class="form-group">
								<label class=" control-label">Video</label>
								<div class="">
									<input type="file" class="form-control" name="video_file" id="video_file"/>
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
             title: {
                validators: {
					notEmpty: {
						message: 'Title is required'
					},
					regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Title wont allow <> [] = % '
					}
				}
            },
            video_file: {
					 validators: {
					
					regexp: {
					regexp: "(.*?)\.(mp4|mp3|3gp|ogg|avi|wmv)$",
					message: "Uploaded file is not a valid. Only mp4,mp3,3gp,ogg,avi,wmv video's are allowed"
					}
				}
				}
            }
        })
     
});

</script>
