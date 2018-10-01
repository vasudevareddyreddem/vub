<div class="content-wrapper">
	<div class="body-start">
		<div class="">
		    <section class="content">
			<div class="container-fluid">
			<div class="col-md-12">
			<div class="row">
				<div class="panel bg-white">
				  <div class="panel-heading text-left"><h3>Subscribe List</h3></div>
				</div>
			</div>
			</div>
			</div>
			<div class="container-fluid">
				<div class="row">
				<div class="col-md-12">
				 <div class="col-md-8  " data-category="view">
			 <?php if(isset($video_list) && count($video_list)>0){ ?>
				 <?php foreach($video_list as $list){ ?>
				 <a href="<?php echo base_url('courses/videoplay/'.base64_encode($list['course_id']).'/'.base64_encode($list['video_id'])); ?>" style="color:#222">
                 <div class="article">
					   <div class="row">
						  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white no-padding">
							 <div class=" ">
								<div class="row ">
								    <div class="col-md-3 col-xs-12 text-center " >
										<div style="padding-top:22px;padding-left:15px;">
											
											 <video width="100%" height="100%" class="thumbnail">
											  <source src="<?php echo base_url('assets/videos/'.$list['video_file']); ?>" type="video/mp4">
											  <source src="movie.ogg" type="video/ogg">
											</video>
											</div>
								   </div>
								   <div class=" col-md-9  bod-left">
									  <div class="article-details">
										 <h4><a><?php echo isset($list['v_title'])?$list['v_title']:''; ?></a></h4>
										 
										 <h5><strong class="site-col-r">Institites:</strong> <?php echo isset($list['i_name'])?$list['i_name']:''; ?></h5> 
										 <h5><strong class="site-col-r">Address:</strong>
										 <span><?php echo isset($list['address'])?$list['address']:''; ?></span>
										 </h5> 
										 <h5><strong class="site-col-r">Contact:</strong> +<span><?php echo isset($list['num_code'])?$list['num_code']:''; ?>-<?php echo isset($list['i_p_phone'])?$list['i_p_phone']:''; ?></span>
										 <?php if($list['i_s_phone']!=''){ ?>
										 ,+<span><?php echo isset($list['num_code'])?$list['num_code']:''; ?>-<?php echo isset($list['i_s_phone'])?$list['i_s_phone']:''; ?></span>
										 <?php } ?>
										 </h5>
										  <?php if($list['t_name']!=''){ ?>
										 <h5><strong class="site-col-r">Trainer Name:</strong> <span><?php echo isset($list['t_name'])?$list['t_name']:''; ?></span>
										 <?php } ?>
										 <?php if($list['training_mode']!=''){ ?>
										 <h5><strong class="site-col-r">Training Mode:</strong> <span><?php echo isset($list['training_mode'])?$list['training_mode']:''; ?></span>
										 </h5>
										  <?php } ?>
										 
										 
									  </div>
								   </div>
										
								</div>
								
							 </div>
						  </div>
						   
					   </div>
					</div>
					</a>
					
				 <?php } ?>
			 <?php } ?>
					 
					 
            </div>
			<div class="col-md-4">
				<div class="sidebar-recent bg-white">
							<div class="bg-primary pad-10">
								<span class="">
								   <h3 class="text-white text-center">Latest Subscribers </h3>
								</span>	
							</div>	
							 <div class="pad-20 list-style-none" >
								<marquee class="pubmed-articles" align="top" behavior="scroll" onmouseout="this.start();" onmouseover="this.stop();" direction="up" scrollamount="2" style="padding: 10px;height: 350px;overflow:hidden;">
								   
								  <div class="row ">
								  <div class="table-responsive ">
								  <table class="table table-striped">
								
								<tbody>
								<?php foreach($latest_video_list as $list){ ?>
										<tr>
											<td valign="center" style="width:130px">
											 <video width="100%" height="auto" class="thumbnail">
											  <source src="<?php echo base_url('assets/videos/'.$list['video_file']); ?>" type="video/mp4">
											  <source src="movie.ogg" type="video/ogg">
											</video>
										
												
											</td>
											<td colspan="2" >
												<div class="article-details">
													 <h4><a href="<?php echo base_url('institutes/page/'.base64_encode($list['i_id']).'/'.$list['i_name']); ?>" style="color:#0062C4;"><?php echo isset($list['i_name'])?$list['i_name']:''; ?></a></h4>
												
													 <h5><strong class="site-col-r">Address:</strong>
													 <span><?php echo isset($list['address'])?$list['address']:''; ?></span>
													 </h5>
												</div>
											</td>
										  </tr>
								<?php } ?>
								  
								</tbody>
							  </table>
							  </div>
								  
								
								
								   
								</marquee>
								
							 </div>
						  </div>
						  <div class="clearfix">&nbsp;</div>	
					
						</div>
			</div>
            </div>
            </div>
            </div>
			
						</section>
				
		</div>
		
	</div>
	</div>