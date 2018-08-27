
<div class="content-wrapper">
	<div class="body-start-page ">
<!-- Main content -->
    <section class="content">
      <div class="row">
		 <div class="col-md-2 no-padding bg-dark pos-ab-left" >
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
	

       
       
    </section>
		 </div>
		 </div>
		 <?php if(isset($video_list) && count($video_list)>0){ ?>
		 <div class="col-md-7 no- lib-item col-md-offset-2" data-category="view">
		 <?php foreach($video_list as $list){ ?>
		 <?php if(isset($list['u_b_schedule']) && $list['u_b_schedule']!=''){ ?>
			  <marquee scrolldelay="150"  onmouseover="this.stop()" onmouseout="this.start()"><?php echo isset($list['u_b_schedule'])?$list['u_b_schedule']:''; ?></marquee>
		 <?php } ?>			
			<div class="article">
						   <div class="row">
							  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								 <div class="article-footer clearfix">
									<span class="pull-left">
									   <h4 class="text-white"><?php echo isset($list['v_title'])?$list['v_title']:''; ?></h4>
									</span>	
									<span class="pull-right">
										<button class="btn btn-primary btn-sm">Subscribe</button>
									</span>	
								 </div>
							  </div>
							  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								 <div class="article-body clearfix">
									<div class="row">
									   <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 p0">
										  <div class="article-view">
											 <div class="">
											 <a href="<?php echo base_url('videos/play/'.base64_encode($list['i_id']).'/'.base64_encode($list['video_id']).'/'.base64_encode($list['course_name'])); ?>">
											 <video width="100%" height="100%" class="thumbnail">
											  <source src="<?php echo base_url('assets/videos/'.$list['video_file']); ?>" type="video/mp4">
											  <source src="movie.ogg" type="video/ogg">
											</video></a>
													
											 </div>
										  </div>
									   </div>
									   <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
										  <div class="article-details">
											 <h4><a href="#" target="_blank" style="color:#0062C4;"><?php echo isset($list['v_title'])?$list['v_title']:''; ?></a></h4>
											 
											 <h5><strong class="site-col-r">Course Name:</strong> <?php echo isset($list['c_name'])?$list['c_name']:''; ?></h5>
											 <?php if(isset($list['training_mode']) && $list['training_mode']!=''){ ?>
											 <h5><strong class="site-col-b">Training Mode:</strong> <?php echo isset($list['training_mode'])?$list['training_mode']:''; ?></h5>
											 <?php } ?>
												<?php if(isset($list['v_desc']) && $list['v_desc']!=''){ ?>
											 <h5><strong class="site-col-b">Video Description:</strong>  <?php echo isset($list['v_desc'])?$list['v_desc']:''; ?></h5>
												 <?php } ?>
											 <?php if(isset($list['t_name']) && $list['t_name']!=''){ ?>
											 <h5><strong class="site-col-b">Trainer Name:</strong> <?php echo isset($list['t_name'])?$list['t_name']:''; ?></h5>
											 <?php } ?>
											 
										  </div>
									   </div>
									</div>
									
								 </div>
							  </div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								 <div class="article-head clearfix">
									<span class="">
									  <i class="fa fa-thumbs-up" aria-hidden="true"></i> <?php echo isset($list['likes_count'])?$list['likes_count']:''; ?>
									</span>
									<span class="mar-l10">
									  <i class="fa fa-eye" aria-hidden="true"></i> <?php echo isset($list['view_count'])?$list['view_count']:''; ?>
									</span>
									<span class="pull-right">
									   <h4 class="text-white" style="line-height:24px"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date('M j Y h:i A',strtotime(htmlentities($list['created_at'])));?></h4>
									</span>
								 </div>
							  </div>
						   </div>
						</div>
						 
					<?php } ?>	 
				</div>
				
			<?php } ?>
			<?php if(isset($courses_offered) && count($courses_offered)>0){ ?>
					<div class="col-md-3 ">
						<div id="">
							<div class="sidebar-recent bg-white">
									<div class="bg-primary pad-10">
										<span class="">
										   <h3 class="text-white text-center">Courses offered </h3>
										</span>	
									</div>	
									 <div class="pad-10 " >
										<ul class="list-courses">
										<?php foreach($courses_offered as $list){ ?>
											<li class=""><a href="<?php echo base_url($list['i_id']); ?>" target="_blank" style="color:#0062C4;"><?php echo isset($list['c_name'])?$list['c_name']:''; ?>&nbsp; Count: &nbsp;<?php echo isset($list['video_list'])?$list['video_list']:''; ?></a></li>
											
										<?php } ?>
										</ul>
										
									 </div>
								  </div>
								  <div class="clearfix">&nbsp;</div>	
								</div>
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

