
<div class="content-wrapper" style="margin-top:10px;">
	<div class="body-start-page  ">
<!-- Main content -->
    <section class="content">
      <div class=" " >
		 <div class=" sidebar-recent bg-white  lib-item " style="padding-top:15px" data-category="view" >
			<div class="col-md-8" style="border-right:1px solid #f5f5f5;">
			<div class="">
				<video width="100%" height="100%" controls  autoplay controlsList="nodownload">
					<source src="<?php echo base_url('assets/videos/'.$video_details[0]['video_file']); ?>" type="video/mp4">
					<source src="movie.ogg" type="video/ogg">
				</video>
				<div class="video-content">
					<div class="row">
					<div class="col-md-6">
						<h4><a href="javascript:void(0)" style="color:#0062C4;">AngularJS tutorial - What is AngularJS</a></h4>	
					</div>
					<div class="col-md-6">
						<a href=""  data-toggle="modal" data-target="#share-modal" ><i class="fa fa-share-alt font-share" aria-hidden="true"></i></a>

					
					<?php if(isset($cust_id) && $cust_id!=''){ ?>
							<a href="javascript:void(0);" onclick="video_like(<?php echo isset($video_details[0]['video_id'])?$video_details[0]['video_id']:''; ?>);">
							  <i class="fa fa-thumbs-up font-share" aria-hidden="true"></i><span id="likes_count"> <?php if(isset($like_count['like_count']) && $like_count['like_count']!=0){ echo $like_count['like_count']; } ?></span>
						
							</a>
								
							<span class="pull-right">
									<a href="javascript:void(0);" onclick="video_subscribe(<?php echo isset($video_details[0]['video_id'])?$video_details[0]['video_id']:''; ?>);" class="btn btn-primary btn-sm">Subscribe</a>
							</span>
					<?php }else{ ?>
					 <a href="javascript:void(0);" data-toggle="modal" data-target="#login-modal"><i class="fa fa-thumbs-up font-share" aria-hidden="true"></i></a>
							<span class="pull-right">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#login-modal" class="btn btn-primary btn-sm">Subscribe</a>
							</span>
					<?php } ?>
					</div>
					
					
					
					</div>
					
				</div>
			</div>
            </div>
				<div class="col-md-4 ">
				
				<div>
					<div class="pad-15">
						<h3 class=""> What is AngularJS?  </h3>	
						   <div class="" >
							  <div class="user-panel">
								<div class="bg-white" style="padding:10px;border-radius:5px;">
								<?php if(isset($video_details[0]['i_logo']) && $video_details[0]['i_logo']!=''){ ?>
								 <img  class="img-responsive thumbnail" src="<?php echo base_url('assets/institute_logo/'.$video_details[0]['i_logo']); ?>" alt="<?php echo isset($video_details[0]['i_name'])?$video_details[0]['i_name']:''; ?>">
								 <?php }else{ ?>
									<img  class="img-responsive thumbnail" src="<?php echo base_url('assets/institute_logo/institute_logo.png'); ?>" alt="<?php echo isset($institute_details['i_name'])?$institute_details['i_name']:''; ?>">
									<?php } ?>
								</div>
								
							   
							  </div>
							
							  <!-- sidebar menu: : style can be found in sidebar.less -->
							  <div class="" style="overflow:hidden;">
								   <h4 class="font-20"><strong class="text-primary">Institute :</strong> NareshIT Software Training Institute</h4>
								   <h4 class="font-20"><strong class="text-primary">Address :</strong> Plot No. 177, Sri Vani Nilayam, 1st floor, Beside Sri Chaitanya High School, Sardar Patel Nagar,  kukatpalli hyd india</h4>
								   <h4 class="font-20"><strong class="text-primary"><i class="fa fa-phone-square"> </i>  &nbsp;</strong> 8500050944</h4> 
								   
								   <h4 class="font-20"> <strong class="text-primary"> <i class="fa fa-envelope"> </i> &nbsp; </strong> reddy.55610@gmail.com</h4>
								   <h4 class="font-20"> <strong class="text-primary">Trainer  Name: </strong>  Sathya</h4> 
								   <h4 class="font-20"> <strong class="text-primary">Founder Name: </strong>  Sathya</h4>
								   <h4 class="font-20"> <strong class="text-primary">Description: </strong>  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</h4>
								   
							
								
							  
							 
							</div> 
							</div> 
					</div>
					
				</div>
				</div>	
				</div>
      </div>
	  
      <!-- /.row -->
    </section>
	<div class="clearfix">&nbsp;</div>

    <section class="content" id="recommended">
		<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
			<div class="sidebar-recent bg-white pad-20">
				<h4>Similar videos</h4>
				<hr>
						<div class="row " style="border:1px solid #ddd;margin:5px;position:relative">
								    <div class="col-md-3 col-xs-12 text-center " >
										<div class="vertical-center">
											 <a href="<?php echo base_url('courses/video/'.base64_encode(6)); ?>" class="">
											 <video width="100%" height="100%" class="thumbnail">
											  <source src="<?php echo base_url('assets/videos/testvideo.mp4'); ?>" type="video/mp4">
											  <source src="movie.ogg" type="video/ogg">
											</video></a>
											</div>
								   </div>
								   <div class=" col-md-7  bod-left">
									  <div class="article-details">
										 <h4><a href="" target="_blank" style="color:#0062C4;">Software Training - Online Training</a></h4>
										 
										 <h5><strong class="site-col-r">Institites:</strong> Naresh Technologies</h5> 
										 <h5><strong class="site-col-r">Address:</strong> <span>India</span>,
										 <span>Hyderabad</span>,
										 <span>Ameerpet</span>
										 </h5> 
										 <h5><strong class="site-col-r">Contact:</strong> <span>040-2374 6666</span>,
										 <span>90009 94007</span>,
										 </h5>
										 <h5><strong class="site-col-r">E-Mail ID:</strong> <span>nareshit@gmail.com</span>,
										 
										 </h5>
										 <h5><strong class="site-col-r">Founder Name:</strong> <span>naresh</span>,
										 
										 </h5>
										 
										 
									  </div>
								   </div>
								   <div class="bg-aaa col-md-2 text-center institutes-curd-right" >
											<div class="count-videos">
												<h2>105</h2>
												<h2><i class="fa fa-video-camera" aria-hidden="true"></i></h2>
											</div>
										</div>
										
						</div>
						<div class="row " style="border:1px solid #ddd;margin:5px;position:relative">
								    <div class="col-md-3 col-xs-12 text-center " >
										<div class="vertical-center">
											 <a href="<?php echo base_url('courses/video/'.base64_encode(6)); ?>" class="">
											 <video width="100%" height="100%" class="thumbnail">
											  <source src="<?php echo base_url('assets/videos/testvideo.mp4'); ?>" type="video/mp4">
											  <source src="movie.ogg" type="video/ogg">
											</video></a>
											</div>
								   </div>
								   <div class=" col-md-7  bod-left">
									  <div class="article-details">
										 <h4><a href="" target="_blank" style="color:#0062C4;">Software Training - Online Training</a></h4>
										 
										 <h5><strong class="site-col-r">Institites:</strong> Naresh Technologies</h5> 
										 <h5><strong class="site-col-r">Address:</strong> <span>India</span>,
										 <span>Hyderabad</span>,
										 <span>Ameerpet</span>
										 </h5> 
										 <h5><strong class="site-col-r">Contact:</strong> <span>040-2374 6666</span>,
										 <span>90009 94007</span>,
										 </h5>
										 <h5><strong class="site-col-r">E-Mail ID:</strong> <span>nareshit@gmail.com</span>,
										 
										 </h5>
										 <h5><strong class="site-col-r">Founder Name:</strong> <span>naresh</span>,
										 
										 </h5>
										 
										 
									  </div>
								   </div>
								   <div class="bg-aaa col-md-2 text-center institutes-curd-right" >
											<div class="count-videos">
												<h2>105</h2>
												<h2><i class="fa fa-video-camera" aria-hidden="true"></i></h2>
											</div>
										</div>
										
						</div>
						
				
			</div>
			</div>
			<div class="col-md-4">
			<div class="sidebar-recent bg-white pad-20">
				<h4>Courses offered by Naresh</h4>
				<hr>
						<div class="row " style="border:1px solid #ddd;margin:5px">
								    <div class="pad-10 ">
										<ul class="list-courses">
											<li class=""><a href="http://localhost/vub/institutes/page/Mw==/web development/NA==" style="color:#0062C4;">web development&nbsp; Count: &nbsp;3</a></li>
	
											<li class=""><a href="http://localhost/vub/institutes/page/Mw==/html/Ng==" style="color:#0062C4;">html&nbsp; Count: &nbsp;2</a></li>
	
											<li class=""><a href="http://localhost/vub/institutes/page/Mw==/java/NQ==" style="color:#0062C4;">java&nbsp; Count: &nbsp;1</a></li>
	
										</ul>
										
									 </div>
										
						</div>
						
			</div>
			</div>
		</div>
		</div>
    </section>
	
  </div>	
  <div class="clearfix">&nbsp;</div>
  <div class="clearfix">&nbsp;</div>
  </div>	
 

<script>
function video_subscribe(v_id){
	if(v_id!=''){
		 jQuery.ajax({
   			url: "<?php echo base_url('videos/video_subscribe');?>",
   			data: {
				video_id: v_id,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
						jQuery('#sucessmsg').show();
						var parsedData=data;
						if(parsedData==1){
							$('#sucessmsg').html('<div class="alert_msg1 animated slideInUp bg-succ"> Video successfully subscribed. <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div>');

						}else if(parsedData==2){
							$('#sucessmsg').html('<div class="alert_msg1 animated slideInUp bg-warn"> Video already subscribed <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div>');

						}else if(parsedData==0){
							$('#sucessmsg').html('<div class="alert_msg1 animated slideInUp bg-warn"> Technical problem will occurred. Please try again <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div>');
						}
						
   					}
           });
	}
	
}
function video_like(v_id){
	if(v_id!=''){
		 jQuery.ajax({
   			url: "<?php echo base_url('videos/video_likes');?>",
   			data: {
				video_id: v_id,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
						jQuery('#sucessmsg').show();
						var parsedData=JSON.parse(data);
						if(parsedData.msg=1){
							$('#likes_count').empty();
							$('#likes_count').append(parsedData.count);
							$('#sucessmsg').html('<div class="alert_msg1 animated slideInUp bg-succ"> Video successfully subscribed. <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div>');

						}else if(parsedData.msg=2){
							$('#sucessmsg').html('<div class="alert_msg1 animated slideInUp bg-warn"> Video already subscribed <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div>');

						}else if(parsedData.msg=0){
							$('#sucessmsg').html('<div class="alert_msg1 animated slideInUp bg-warn"> Technical problem will occurred. Please try again <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div>');
						}
						
   					}
           });
	}
	
}
</script>




