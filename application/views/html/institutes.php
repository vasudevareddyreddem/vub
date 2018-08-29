<style>
#sticky.stick {
    position: fixed;
   width: 29.4% !important;
  
}
</style> 
 <div class="content-wrapper">
	<div class="body-start">
		<div class="container-fluid">
		    <section class="content">
			<?php if(isset($institute_list) && count($institute_list)>0){ ?>
				 <div class="col-md-8  " data-category="view">
						 <?php foreach($institute_list as $list){ ?>
						 <div class="article">
							   <div class="row">
								  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white no-padding">
									 <div class=" ">
										<div class="row ">
											  <div class="col-md-3 col-xs-12 text-center " >
											  <?php if($list['i_logo']!=''){ ?>
													<img class="img-vertical-center img-responsive" src="<?php echo base_url('assets/institute_logo/'.$list['i_logo']); ?>" alt="<?php echo isset($list['i_logo'])?$list['i_logo']:''; ?>">
												<?php }else{ ?>
													<img class="img-vertical-center img-responsive" src="<?php echo base_url('assets/institute_logo/institute_logo.png'); ?>" alt="<?php echo isset($list['i_name'])?$list['i_name']:''; ?>">
												<?php } ?>
										   </div>
										   <div class=" col-md-7  bod-left">
											  <div class="article-details">
												 <h4><a href="<?php echo base_url('institutes/page/'.base64_encode($list['i_id']).'/'.$list['i_name']); ?>"  style="color:#0062C4;"> <?php echo isset($list['i_name'])?$list['i_name']:''; ?></a></h4>
												 
												<!-- <h5><strong class="site-col-r">Courses:</strong> <?php echo isset($list['course_list'])?$list['course_list']:''; ?></h5> -->
												 <h5><strong class="site-col-r">Address:</strong> <span><?php echo isset($list['i_address'])?$list['i_address']:''; ?></span>,
												 <span><?php echo isset($list['location_name'])?$list['location_name']:''; ?></span>,
												 <span><?php echo isset($list['city_name'])?$list['city_name']:''; ?></span>,
												 <span><?php echo isset($list['country_name'])?$list['country_name']:''; ?></span>
												 <span><img class=" img-responsive" src="<?php echo base_url('assets/flags/'.$list['country_code'].'.png'); ?>"></span>
												 </h5> 
												 <h5><strong class="site-col-r">Contact:</strong> <span><?php echo isset($list['i_p_phone'])?$list['i_p_phone']:''; ?></span>,
												 <span><?php echo isset($list['i_s_phone'])?$list['i_s_phone']:''; ?></span>
												 </h5>
												 <h5><strong class="site-col-r">E-Mail ID:</strong> <span><?php echo isset($list['i_email_id'])?$list['i_email_id']:''; ?></span>
												 
												 </h5>
												 <h5><strong class="site-col-r">Founder Name:</strong> <span><?php echo isset($list['i_founder'])?$list['i_founder']:''; ?></span>
												 
												 </h5>
												 
												 
											  </div>
										   </div>
												<div class="bg-aaa col-md-2 text-center institutes-curd-right" >
													<div class="count-videos">
														<h2><?php echo isset($list['video_list'])?$list['video_list']:''; ?></h2>
														<h2><i class="fa fa-video-camera" aria-hidden="true"></i></h2>
													</div>
												</div>
										</div>
										
									 </div>
								  </div>
								   
							   </div>
							</div>
						 <?php } ?>
				 </div>
			
			<?php } ?>
			<?php if(isset($lastest_institute_list) && count($lastest_institute_list)>0){ ?>
				<div class="col-md-4 col-xs-12 col-sm-12">
				<div id="sticky-anchor"></div>
				<div id="sticky" >
				
							<div class="sidebar-recent bg-white">
							<div class="bg-primary pad-10">
								<span class="">
								   <h3 class="text-white text-center">Latest Institites </h3>
								</span>	
							</div>	
							 <div class="pad-20 list-style-none" >
								<marquee class="pubmed-articles" align="top" behavior="scroll" onmouseout="this.start();" onmouseover="this.stop();" direction="up" scrollamount="2" style="padding: 10px;height: 350px;overflow:hidden;">
								   
								  <div class="row ">
								  <div class="table-responsive ">
								  <table class="table table-striped">
								
								<tbody>
								  <tr>
									<td valign="center">
										<img class="img-responsive" src="	http://localhost/vub/assets/institute_logo/0.528892001534827423sathya_technolologies_Logo.png" alt="Sathya techonologies">
									</td>
									<td colspan="2">
										<div class="article-details">
											 <h4><a href="" target="_blank" style="color:#0062C4;">Sathya techonologies</a></h4>
										
											 <h5><strong class="site-col-r">Address:</strong> <span>India</span>,
											 <span>Hyderabad</span>,
											 <span>Ameerpet</span>
											 </h5>
									    </div>
									</td>
								  </tr>
								    <tr>
									<td style="vertical-algin:middle">
										<img class="img-responsive" src="	http://localhost/vub/assets/institute_logo/0.528892001534827423sathya_technolologies_Logo.png" alt="Sathya techonologies">
									</td>
									<td colspan="2"><div class="article-details">
										 <h4><a href="" target="_blank" style="color:#0062C4;">Sathya techonologies</a></h4>
									
										 <h5><strong class="site-col-r">Address:</strong> <span>India</span>,
										 <span>Hyderabad</span>,
										 <span>Ameerpet</span>
										 </h5> 
										
									  </div></td>
								  </tr>
							    <tr>
									<td style="vertical-algin:middle">
										<img class="img-responsive" src="	http://localhost/vub/assets/institute_logo/0.528892001534827423sathya_technolologies_Logo.png" alt="Sathya techonologies">
									</td>
									<td colspan="2"><div class="article-details">
										 <h4><a href="" target="_blank" style="color:#0062C4;">Sathya techonologies</a></h4>
									
										 <h5><strong class="site-col-r">Address:</strong> <span>India</span>,
										 <span>Hyderabad</span>,
										 <span>Ameerpet</span>
										 </h5> 
										
									  </div></td>
								  </tr>
							
								  </tr>
								</tbody>
							  </table>
							  </div>
								  
								
								
								   
								</marquee>
								
							 </div>
						  </div>
						  <div class="clearfix">&nbsp;</div>	
					
						</div>
						</div>
						<?php } ?>
						</section>
				
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
