
<div class="content-wrapper">
	<div class="body-start-page " style="margin-top:10px;">
<!-- Main content -->
    <section class="content">
      <div class="row">
		 <div class="col-md-2 no-padding bg-dark pos-ab-left" style="">
		 <div id="sticky-anchor"></div>
				<div id="sticky" >
			<section class=" ">
      <!-- Sidebar user panel -->
      <div class="pad-15" >
      <div class="user-panel">
        <div class="bg-white" style="padding:10px;border-radius:5px;">
		<?php if(isset($institute_details['i_logo']) && $institute_details['i_logo']!=''){ ?>
         <img  class="img-responsive" src="<?php echo base_url('assets/institute_logo/'.$institute_details['i_logo']); ?>" alt="<?php echo isset($institute_details['i_name'])?$institute_details['i_name']:''; ?>">
		<?php }else{ ?>
		 <img  class="img-responsive" src="<?php echo base_url('assets/institute_logo/institute_logo.png'); ?>" alt="<?php echo isset($institute_details['i_name'])?$institute_details['i_name']:''; ?>">
		<?php } ?>
        </div>
      
      </div>
    
      <!-- sidebar menu: : style can be found in sidebar.less -->
	  <div class="" style="overflow:hidden;">
		   <h4 class="text-center"><?php echo isset($institute_details['i_name'])?$institute_details['i_name']:''; ?></h4>
		   <hr class="hr-cus">
		   <small ><i class="fa fa-map-marker"> </i> &nbsp; <?php echo isset($institute_details['i_address'])?$institute_details['i_address']:''; ?>,<?php echo isset($institute_details['location_name'])?$institute_details['location_name']:''; ?>,<?php echo isset($institute_details['city_name'])?$institute_details['city_name']:''; ?>,<?php echo isset($institute_details['country_name'])?$institute_details['country_name']:''; ?></small > 
		   <hr class="hr-cus">
	  <div class="help-side">
		   <small ><i class="fa fa-phone"> </i>&nbsp;  +<?php echo isset($institute_details['num_code'])?$institute_details['num_code']:''; ?>-  <?php echo isset($institute_details['i_p_phone'])?$institute_details['i_p_phone']:''; ?></small>
	  </div>  
	  <hr class="hr-cus">
	 	  
	  <div class="help-side">
		   <small ><i class="fa fa-video-camera"> </i>&nbsp;  Total: <?php echo isset($institute_details['video_list'])?$institute_details['video_list']:''; ?></small>
	  </div> 
	</div> 
	
<hr class="hr-cus">
    <div class="col-md-12"style="background:rgba(255,255,255, 0.1);border-radius:10px;">
	<h4 class="text-center">Contact Us Via<h4>
	<?php 

		$image=base_url('assets/institute_logo/'.$institute_details['i_logo']);
		$title='hello';
		$summary='devareddy';
		$url='www.vasu.com';
	?>
	<hr class="hr-cus">
        <a href="http://www.facebook.com/sharer.php?s=100&p[url]=<?php echo base_url('institutes/share/'.base64_encode($institute_details['i_id'])); ?>" target="_blank" class="btn-social btn-facebook"><i class="fa fa-facebook"></i></a>
      <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo base_url('institutes/linkedin/'.base64_encode($institute_details['i_id'])); ?>" target="_blank" class="btn-social btn-instagram"><i class="fa fa-linkedin "></i></a>
      <a href="http://twitter.com/share?text=<?php echo base_url('institutes/share/'.base64_encode($institute_details['i_id'])); ?>" target="_blank" class="btn-social btn-twitter"><i class="fa fa-twitter"></i></a>
       <a href="https://plus.google.com/share?url=<?php echo base_url('institutes/share/'.base64_encode($institute_details['i_id'])); ?>" target="_blank" class="btn-social btn-email"><i class="fa fa-google-plus"></i></a>
    </div>
	
       
    </section>
		 </div>
		 </div>
		 </div>
		 <div class="col-md-7 no- lib-item col-md-offset-2" data-category="view">
		 
			<div class="sidebar-recent bg-white" >
				<video width="100%" height="100%" controls  autoplay controlsList="nodownload">
					<source src="<?php echo base_url('assets/videos/'.$video_details['video_file']); ?>" type="video/mp4">
					<source src="movie.ogg" type="video/ogg">
				</video>
				<div class="video-content">
					<div class="row">
					<div class="col-md-7">
						<h4><a href="#" target="_blank" style="color:#0062C4;"><?php echo isset($video_details['v_title'])?$video_details['v_title']:''; ?></a></h4>	
					</div>
					<div class="col-md-5">
						<a href=""  data-toggle="modal" data-target="#share-modal" ><i class="fa fa-share-alt font-share" aria-hidden="true"></i></a>

					
					<?php if(isset($cust_id) && $cust_id!=''){ ?>
							<a href="javascript:void(0);" onclick="video_like(<?php echo isset($video_details['video_id'])?$video_details['video_id']:''; ?>);">
							  <i class="fa fa-thumbs-up font-share" aria-hidden="true"></i><span id="likes_count"> <?php if(isset($like_count['like_count']) && $like_count['like_count']!=0){ echo $like_count['like_count']; } ?></span>
						
							</a>
								
							<!--<span class="pull-right">
									<a href="javascript:void(0);" onclick="video_subscribe(<?php echo isset($video_details['video_id'])?$video_details['video_id']:''; ?>);" class="btn btn-primary btn-sm">Subscribe</a>
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
					 <hr>
						
											 
											 <h5><strong class="site-col-r">Course Name:</strong> <?php echo isset($video_details['c_name'])?$video_details['c_name']:''; ?></h5>
											<?php if(isset($video_details['t_name']) && $video_details['t_name']!=''){ ?>
											 <h5><strong class="site-col-b">Trainer Name:</strong> <?php echo isset($video_details['t_name'])?$video_details['t_name']:''; ?></h5>
											 <?php } ?>											
											<?php if(isset($video_details['training_mode']) && $video_details['training_mode']!=''){ ?>
											 
											 <h5><strong class="site-col-b">Training Mode:</strong> <?php echo isset($video_details['training_mode'])?$video_details['training_mode']:''; ?></h5>
											 <?php } ?>
											
											 <?php if(isset($video_details['course_content']) && $video_details['course_content']!=''){ ?>
													<p class="vide0-parag"><?php echo isset($video_details['course_content'])?$video_details['course_content']:''; ?></p>
											 <?php } ?>
				</div>
			</div>
			<div class="clearfix">&nbsp;</div>
            </div>
			<?php if(isset($video_list)&& count($video_list)>0){ ?>
				<div class="col-md-3 ">
					<div class="sidebar-recent bg-white" >
						<div  style="border-bottom:1px solid #f5f5f5">
										<span class="">
										   <h3 class="text-primary text-center" >videos </h3>
										</span>	
									</div>	
					
						 <div class="pad-10 " >
						 
						 <?php foreach($video_list as $list){ ?>
							<div class="row">
							<a href="<?php echo base_url('videos/play/'.base64_encode($list['i_id']).'/'.base64_encode($list['video_id']).'/'.base64_encode($list['course_name']).'/'.$list['c_name'].'/'.$list['v_title']); ?>" class="text-dark">
								<div class="pad-rl-15">
									<div class="col-md-5" style="padding:0px">
										<video width="100%" height="100%" class="thumbnail">
												  <source src="<?php echo base_url('assets/videos/'.$list['video_file']); ?>" type="video/mp4">
												  <source src="movie.ogg" type="video/ogg">
												</video>
									</div>
									<div class="col-md-7">
											<div class="font-15"><?php echo isset($list['c_name'])?$list['c_name']:''; ?>&nbsp;-&nbsp;<?php echo isset($list['v_title'])?$list['v_title']:''; ?></div>
									</div>
								</div>
								</a>
							</div>
							
							<hr class="hr-videos" >
						 <?php } ?>
							
							
							
							
						 </div>
						
					</div>
					<div class="clearfix">&nbsp;</div>
				</div>
				 <?php } ?>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>	
  </div>	
 <div id="sucessmsg" style="display:none;"></div>
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
	function sticky_relocate() {
		var window_top = $(window).scrollTop();
		var footer_top = $("#footer").offset().top;
		var div_top = $('#sticky-anchor').offset().top - 80
		var div_height = $("#sticky").height();
		
		var padding = 20; 
		
		if (window_top + div_height > footer_top - padding)
			$('#sticky').css({top: (window_top + div_height - footer_top + padding) * -1})
		else if (window_top > div_top) {
			$('#sticky').addClass('stick');
			$('#sticky').css({top: 80})
		} else {
			$('#sticky').removeClass('stick');
		}
	}

	$(function () {
		$(window).scroll(sticky_relocate);
		sticky_relocate();
	});
</script>
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
						$('#likes_count').empty();
							$('#likes_count').append(parsedData.count);
						if(parsedData.msg==1){
							
							$('#sucessmsg').html('<div class="alert_msg1 animated slideInUp bg-succ"> You Liked It Thank You. <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div>');

						}else if(parsedData.msg==2){
							$('#sucessmsg').html('<div class="alert_msg1 animated slideInUp bg-warn"> You Disliked It Thank You <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div>');

						}else if(parsedData.msg==0){
							$('#sucessmsg').html('<div class="alert_msg1 animated slideInUp bg-warn"> Technical problem will occurred. Please try again <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i></div>');
						}
						
   					}
           });
	}
	
}
</script>




