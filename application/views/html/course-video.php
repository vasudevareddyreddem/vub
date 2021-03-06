
<div class="content-wrapper" style="margin-top:10px;">
	<div class="body-start-page  ">
<!-- Main content -->
    <section class="content">
      <div class=" " >
		 <div class=" sidebar-recent bg-white  lib-item " style="padding-top:15px" data-category="view" >
			<div class="col-md-8" style="border-right:1px solid #f5f5f5;">
			<div class="">
				<video width="100%" height="100%" controls  autoplay controlsList="nodownload">
					<source src="<?php echo base_url('assets/videos/'.$video_details['video_file']); ?>" type="video/mp4">
					<source src="movie.ogg" type="video/ogg">
				</video>
				<div class="video-content">
					<div class="row">
					<div class="col-md-6">
						<h4><a href="javascript:void(0)" style="color:#0062C4;"><?php echo isset($video_details['v_title'])?$video_details['v_title']:''; ?> </a></h4>	
					</div>
					<div class="col-md-6">
						<a href="javascript:void(0)"  data-toggle="modal" data-target="#share-modal" ><i class="fa fa-share-alt font-share" aria-hidden="true"></i></a>

					
					<?php if(isset($cust_id) && $cust_id!=''){ ?>
							<a href="javascript:void(0);" onclick="video_like(<?php echo isset($video_details['video_id'])?$video_details['video_id']:''; ?>);">
							  <i class="fa fa-thumbs-up font-share" aria-hidden="true"></i><span id="likes_count"> <?php if(isset($like_count['like_count']) && $like_count['like_count']!=0){ echo $like_count['like_count']; } ?></span>
						
							</a>
								
							<!--<span class="pull-right">
									<a href="javascript:void(0);" onclick="video_subscribe(<?php echo isset($video_details[0]['video_id'])?$video_details[0]['video_id']:''; ?>);" class="btn btn-primary btn-sm">Subscribe</a>
							</span>-->
								<span class="pull-right">
									<a  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#subscribe-modal">Subscribe</a>
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
						   <div class="" >
							  <div class="user-panel">
								<a href="<?php echo base_url('institutes/page/'.base64_encode($video_details['i_id']).'/'.$video_details['i_name']); ?>"><div class="bg-white" style="padding:10px;border-radius:5px;">
								<?php if(isset($video_details['i_logo']) && $video_details['i_logo']!=''){ ?>
								 <img  class="img-responsive thumbnail" src="<?php echo base_url('assets/institute_logo/'.$video_details['i_logo']); ?>" alt="<?php echo isset($video_details[0]['i_name'])?$video_details['i_name']:''; ?>">
								 <?php }else{ ?>
									<img  class="img-responsive thumbnail" src="<?php echo base_url('assets/institute_logo/institute_logo.png'); ?>" alt="<?php echo isset($video_details['i_name'])?$video_details['i_name']:''; ?>">
									<?php } ?>
								</div>
								</a>
								
							   
							  </div>
							
							  <!-- sidebar menu: : style can be found in sidebar.less -->
							  <div class="" style="overflow:hidden;">
								   <h4 class="font-20"><strong class="text-primary">Institute :</strong> <?php echo isset($video_details['i_name'])?$video_details['i_name']:''; ?></h4>
								   <h4 class="font-20"><strong class="text-primary">Address :</strong> <?php echo isset($video_details['i_address'])?$video_details['i_address']:''; ?>, <?php echo isset($video_details['address'])?$video_details['address']:''; ?></h4>
								   <h4 class="font-20"><strong class="text-primary"><i class="fa fa-phone-square"> </i>  &nbsp;</strong>+<?php echo isset($video_details['num_code'])?$video_details['num_code']:''; ?>- <?php echo isset($video_details['i_p_phone'])?$video_details['i_p_phone']:''; ?></h4> 
								   
								   <?php if($video_details['t_name']!=''){ ?>
								   <h4 class="font-20"> <strong class="text-primary">Trainer  Name: </strong>  <?php echo isset($video_details['t_name'])?$video_details['t_name']:''; ?></h4> 
								   <?php } ?>
								   <?php if($video_details['training_mode']!=''){ ?>
								   <h4 class="font-20"> <strong class="text-primary">Training  mode: </strong>  <?php echo isset($video_details['training_mode'])?$video_details['training_mode']:''; ?></h4> 
								   <?php } ?>
								   <?php if($video_details['i_contact_person']!=''){ ?>
								   <h4 class="font-20"> <strong class="text-primary">Contact Person: </strong>  <?php echo isset($video_details['i_contact_person'])?$video_details['i_contact_person']:''; ?></h4>
								   <?php } ?>
							
								
							  
							 
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
		<div class="">
		<div class="row">
			<div class="col-md-8">
			<?php if(isset($video_list) && count($video_list)>0){ ?>
			<div class="sidebar-recent bg-white pad-20">
				<h3>Similar videos</h3>
				<hr>		
						<?php foreach($video_list as $list){ ?>
							
						<div class="row " style="border:1px solid #ddd;margin:5px;position:relative">
						 <a href="<?php echo base_url('courses/videoplay/'.base64_encode($list['course_id']).'/'.base64_encode($list['video_id']).'/'.$list['i_name'].'/'.$list['v_title']); ?>" style="color:#222">
								    <div class="col-md-3 col-xs-12 text-center " >
										<div class="vertical-center">
								
											 <video width="100%" height="100%" class="thumbnail">
											  <source src="<?php echo base_url('assets/videos/'.$list['video_file']); ?>" type="video/mp4">
											  <source src="movie.ogg" type="video/ogg">
											</video>
											</div>
								   </div>
								   <div class=" col-md-7  bod-left">
									  <div class="article-details">
										 <h4 style="color:#0062C4;"><?php echo isset($list['v_title'])?$list['v_title']:''; ?></h4>
										 
										 <h5><strong class="site-col-r">Institites:</strong> <?php echo isset($list['i_name'])?$list['i_name']:''; ?></h5> 
										 <h5><strong class="site-col-r">Address:</strong> 
										 <span><?php echo isset($list['address'])?$list['address']:''; ?></span>,
										 </h5> 
										   <?php if($list['t_name']!=''){ ?>
										 <h5><strong class="site-col-r">Trainer Name:</strong> <span><?php echo isset($list['t_name'])?$list['t_name']:''; ?></span>,
										 <?php } ?>
										 <?php if($list['training_mode']!=''){ ?>
										 <h5><strong class="site-col-r">Training Mode:</strong> <span><?php echo isset($list['training_mode'])?$list['training_mode']:''; ?></span>,
										 </h5>
										  <?php } ?>
										 <h5><strong class="site-col-r">Contact:</strong> +<span><?php echo isset($list['num_code'])?$list['num_code']:''; ?>-<?php echo isset($list['i_p_phone'])?$list['i_p_phone']:''; ?></span>,
										 <?php if($list['i_s_phone']!=''){ ?>
										 +<span><?php echo isset($list['num_code'])?$list['num_code']:''; ?>-<?php echo isset($list['i_s_phone'])?$list['i_s_phone']:''; ?></span>,
										 <?php } ?>
										 </h5>
										
										 
										 
									  </div>
								   </div>
								   <div class="bg-aaa col-md-2 text-center institutes-curd-right" >
											<div class="count-videos">
												<h2><?php echo isset($list['video_count'])?$list['video_count']:''; ?></h2>
												<h2><i class="fa fa-video-camera" aria-hidden="true"></i></h2>
											</div>
										</div>
							</a>			
						</div>	
						<?php } ?>
					
						
						
				
			</div>
			<?php } ?>
			</div>
			<div class="col-md-4">
				<div class="bg-primary pad-10">
					<h4 class="text-center">Courses offered by <?php echo isset($list['i_name'])?$list['i_name']:''; ?></h4>
				</div>
			<div class="sidebar-recent bg-white pad-20">
				
	
						<?php if(isset($courses_list) && count($courses_list)>0){ ?>
						<?php foreach($courses_list as $list){ ?>
						<div class="row " style="border:1px solid #ddd;margin:5px">
								    <div class=" ">
										<ul class="list-courses list-sty-none">
											<li class=""><a href="<?php echo base_url('institutes/page/'.base64_encode($list['i_id']).'/'.$list['i_name'].'/'.base64_encode($list['course_name'])); ?>" style="color:#0062C4;"><?php echo isset($list['c_name'])?$list['c_name']:''; ?>&nbsp;(&nbsp;<?php echo isset($list['video_count'])?$list['video_count']:''; ?> )</a></li>
	
						
										</ul>
										
									 </div>
										
						</div>
						<?php } ?>
						<?php } ?>
						
			</div>
			</div>
		</div>
		</div>
    </section>

	
  </div>	
  <div class="clearfix">&nbsp;</div>
  <div class="clearfix">&nbsp;</div>
  </div>	

<div class="modal fade" id="subscribe-modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Subscribe</h4>
        </div>
		<form action="<?php echo base_url('videos/video_subscribe'); ?>" method="post">
		<input type="hidden" name="video_id" id="" value="<?php echo isset($video_details['video_id'])?$video_details['video_id']:''; ?>">
        <div class="modal-body">
				<?php foreach($courses_list as $list){ ?>
					<?php if($course_id== $list['course_name']){ ?>
					<div class="form-check">
						<label>
							<input type="checkbox" checked name="subscribe[]" value="<?php echo $list['course_name']; ?>"> <span class="label-text"><?php echo $list['c_name']; ?></span>
						</label>
					</div>
					<?php }else{ ?>
						<div class="form-check">
							<label>
								<input type="checkbox" name="subscribe[]" value="<?php echo $list['course_name']; ?>"> <span class="label-text"><?php echo $list['c_name']; ?></span>
							</label>
						</div>
					<?php } ?>
				<?php } ?>
				
				
			
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Subscribe</button>
          <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
        </div>
		</form>
      </div>
      
    </div>
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




