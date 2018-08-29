
<div class="content-wrapper">
	<div class="body-start-page ">
<!-- Main content -->
    <section class="content">
      <div class="row">
		 <div class="col-md-8  lib-item " data-category="view">
			<div class="sidebar-recent bg-white">
				<video width="100%" height="100%" controls  autoplay controlsList="nodownload">
					<source src="<?php echo base_url('assets/videos/'.$video_details[0]['video_file']); ?>" type="video/mp4">
					<source src="movie.ogg" type="video/ogg">
				</video>
				<div class="video-content">
					<div class="row">
					<div class="col-md-6">
						<h4><a href="javascript:void(0)" style="color:#0062C4;"><?php echo isset($video_details[0]['v_title'])?$video_details[0]['v_title']:''; ?></a></h4>	
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
					 <hr>
						 <h5><strong class="site-col-r">Course Name:</strong> <?php echo isset($video_details[0]['coursename'])?$video_details[0]['coursename']:''; ?></h5>
						 <h5><strong class="site-col-b">Training Mode:</strong> <?php echo isset($video_details[0]['training_mode'])?$video_details[0]['training_mode']:''; ?></h5>
						 <h5><strong class="site-col-b">Trainer Name:</strong> <?php echo isset($video_details[0]['t_name'])?$video_details[0]['t_name']:''; ?></h5>
						 <p class="vide0-parag"><?php echo isset($video_details[0]['course_content'])?$video_details[0]['course_content']:''; ?></p>
				</div>
			</div>
            </div>
				<div class="col-md-4 ">
					<div id="sticky-anchor"></div>
				<div id="sticky">
					<div class="sidebar-recent bg-white">
						<div class="bg-primary pad-10">
							
							   <h3 class="text-white pad-rl-15">Institute  Details</h3>
								
						</div>	
						   <div class="pad-15" >
							  <div class="user-panel">
								<div class="bg-white" style="padding:10px;border-radius:5px;">
								<?php if(isset($video_details[0]['i_logo']) && $video_details[0]['i_logo']!=''){ ?>
								 <img  class="img-responsive" src="<?php echo base_url('assets/institute_logo/'.$video_details[0]['i_logo']); ?>" alt="<?php echo isset($video_details[0]['i_name'])?$video_details[0]['i_name']:''; ?>">
								 <?php }else{ ?>
									<img  class="img-responsive" src="<?php echo base_url('assets/institute_logo/institute_logo.png'); ?>" alt="<?php echo isset($institute_details['i_name'])?$institute_details['i_name']:''; ?>">
									<?php } ?>
								</div>
								
							   
							  </div>
							
							  <!-- sidebar menu: : style can be found in sidebar.less -->
							  <div class="" style="overflow:hidden;">
								   <h4><?php echo isset($video_details[0]['i_name'])?$video_details[0]['i_name']:''; ?></h4>
								   <small ><i class="fa fa-map-marker"> </i> &nbsp; <?php echo isset($video_details[0]['i_address'])?$video_details[0]['i_address']:''; ?>&nbsp; <?php echo isset($video_details[0]['address'])?$video_details[0]['address']:''; ?></small > 
							  <div class="help-side">
								   <small ><i class="fa fa-phone"> </i>&nbsp;  <?php echo isset($video_details[0]['i_p_phone'])?$video_details[0]['i_p_phone']:''; ?></small>
							  </div>  
							 <div class="help-side">
								   <small ><i class="fa fa-envelope"> </i>&nbsp;  <?php echo isset($video_details[0]['i_email_id'])?$video_details[0]['i_email_id']:''; ?></small>
							  </div>   
							 
							</div> 
							</div> 
					</div>
					<div class="clearfix">&nbsp;</div>
				</div>
				</div>
      </div>
	  
      <!-- /.row -->
    </section>
	<?php if(isset($video_details) && count($video_details)>0){ ?>
    <section class="content" id="recommended">
		<div class="">
			<div class="sidebar-recent bg-white pad-20">
				<h4>Similar videos</h4>
				<hr>
				<div class="row">
				<?php $cnt=0;foreach($video_details as $list){ ?>
					<?php if($cnt>0){ ?>
					<div class="col-md-2">
						<div class="" style="padding:0px">
							<video width="100%" height="100%" class="thumbnail">
									  <source src="<?php echo base_url('assets/videos/'.$list['video_file']); ?>" type="video/mp4">
									  <source src="movie.ogg" type="video/ogg">
									</video>
						</div>
						<div class="font-15"><?php echo isset($list['v_title'])?$list['v_title']:''; ?></div>
					</div>
					<?php } ?>
				<?php $cnt++;} ?>
					
				</div>
			</div>
		</div>
    </section>
	<?php } ?>
    <!-- /.content -->
  </div>	
  <div class="clearfix">&nbsp;</div>
  <div class="clearfix">&nbsp;</div>
  </div>	
 
<script>
	function sticky_relocate() {
		var window_top = $(window).scrollTop();
		var footer_top = $("#recommended").offset().top;
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




