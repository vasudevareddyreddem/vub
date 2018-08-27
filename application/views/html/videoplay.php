
<div class="content-wrapper">
	<div class="body-start-page ">
<!-- Main content -->
    <section class="content">
      <div class="row">
		 <div class="col-md-2 no-padding bg-dark  pos-ab-left" >
		 <div id="sticky-anchor"></div>
				<div id="sticky">
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
		   <h4><?php echo isset($institute_details['i_name'])?$institute_details['i_name']:''; ?></h4>
		   <small ><i class="fa fa-map-marker"> </i> &nbsp; <?php echo isset($institute_details['i_address'])?$institute_details['i_address']:''; ?>,<?php echo isset($institute_details['location_name'])?$institute_details['location_name']:''; ?>,<?php echo isset($institute_details['city_name'])?$institute_details['city_name']:''; ?>,<?php echo isset($institute_details['country_name'])?$institute_details['country_name']:''; ?></small > 
	  <div class="help-side">
		   <small ><i class="fa fa-phone"> </i>&nbsp;  <?php echo isset($institute_details['i_p_phone'])?$institute_details['i_p_phone']:''; ?></small>
	  </div>  
	 <div class="help-side">
		   <small ><i class="fa fa-envelope"> </i>&nbsp;  <?php echo isset($institute_details['i_email_id'])?$institute_details['i_email_id']:''; ?></small>
	  </div>   
	  <div class="help-side">
		   <small ><i class="fa fa-video-camera"> </i>&nbsp;  Total: <?php echo isset($institute_details['video_list'])?$institute_details['video_list']:''; ?></small>
	  </div> 
	</div> 
	</div> 
	

       
       
    </section>
		 </div>
		 </div>
		 <div class="col-md-7 no- lib-item col-md-offset-2" data-category="view">
			<div class="sidebar-recent bg-white">
				<video width="100%" height="100%" controls  autoplay controlsList="nodownload">
					<source src="<?php echo base_url('assets/videos/'.$video_details['video_file']); ?>" type="video/mp4">
					<source src="movie.ogg" type="video/ogg">
				</video>
				<div class="video-content">
					<div class="row">
					<div class="col-md-9">
						<h4><a href="#" target="_blank" style="color:#0062C4;"><?php echo isset($video_details['v_title'])?$video_details['v_title']:''; ?></a></h4>	
					</div>
					<div class="col-md-3">
					<?php if(isset($cust_id) && $cust_id!=''){ ?>
							<span class="pull-right">
									<a href="javascript:void(0);" onclick="video_subscribe(<?php echo isset($video_details['video_id'])?$video_details['video_id']:''; ?>);" class="btn btn-primary btn-sm">Subscribe</a>
							</span>
					<?php }else{ ?>
					<span class="pull-right">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#login-modal" class="btn btn-primary btn-sm">Subscribe</a>
							</span>
					<?php } ?>
					</div>
					</div>
					 <hr>
							<h4><a href="#" target="_blank" style="color:#0062C4;"><?php echo isset($video_details['v_title'])?$video_details['v_title']:''; ?></a></h4>
											 
											 <h5><strong class="site-col-r">Course Name:</strong> <?php echo isset($video_details['c_name'])?$video_details['c_name']:''; ?></h5>
											 <?php if(isset($video_details['training_mode']) && $video_details['training_mode']!=''){ ?>
											 <h5><strong class="site-col-b">Training Mode:</strong> <?php echo isset($video_details['training_mode'])?$video_details['training_mode']:''; ?></h5>
											 <?php } ?>
												<?php if(isset($video_details['v_desc']) && $video_details['v_desc']!=''){ ?>
											 <h5><strong class="site-col-b">Video Description:</strong>  <?php echo isset($video_details['v_desc'])?$video_details['v_desc']:''; ?></h5>
												 <?php } ?>
											 <?php if(isset($video_details['t_name']) && $video_details['t_name']!=''){ ?>
											 <h5><strong class="site-col-b">Trainer Name:</strong> <?php echo isset($video_details['t_name'])?$video_details['t_name']:''; ?></h5>
											 <?php } ?>
											 <?php if(isset($video_details['course_content']) && $video_details['course_content']!=''){ ?>
													<p class="vide0-parag"><?php echo isset($video_details['course_content'])?$video_details['course_content']:''; ?></p>
											 <?php } ?>
				</div>
			</div>
            </div>
			<?php if(isset($video_list)&& count($video_list)>0){ ?>
				<div class="col-md-3 ">
					<div class="sidebar-recent bg-white">
						<div class="bg-primary pad-10">
							
							   <h3 class="text-white pad-rl-15">videos </h3>
								
						</div>	
						 <div class="pad-10 " >
						 
						 <?php foreach($video_list as $list){ ?>
							<div class="row">
							<a href="<?php echo base_url('videos/play/'.base64_encode($list['i_id']).'/'.base64_encode($list['video_id']).'/'.base64_encode($list['course_name'])); ?>" class="text-dark">
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
   			url: "<?php echo base_url('transportation/routes_sides');?>",
   			data: {
				route_number: route_number,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
						
						if(data.msg=1){
							var parsedData = JSON.parse(data);
						//alert(parsedData.list.length);
							$('#multiple_stops').empty();
							for(i=0; i < parsedData.list.length; i++) {
								//console.log(parsedData.list);
							$('#multiple_stops').append("<option value="+parsedData.list[i].stop_id+">"+parsedData.list[i].stop_name+"</option>");                      
                    
								
							 
							}
						}
						
   					}
           });
	}
	
}
</script>




