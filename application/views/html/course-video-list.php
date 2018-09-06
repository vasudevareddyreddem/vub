<div class="content-wrapper">
	<div class="body-start">
		<div class="">
		    <section class="content">
			<div class="container-fluid">
			<div class="col-md-12">
			<div class="row">
				<div class="panel bg-white">
				  <div class="panel-heading text-center"><h3><?php echo isset($course_details['c_name'])?$course_details['c_name']:''; ?></h3></div>
				</div>
			</div>
			</div>
			</div>
			<div class="col-md-3 col-xs-12 col-sm-12">
			
					<img class="img-responsive sidebar-recent" src="<?php echo base_url(); ?>assets/vendor/front-end/img/add1.png" alt="add1">
				
			</div>
				 <div class="col-md-6  " data-category="view">
				 <?php if(isset($video_list) && count($video_list)>0){ ?>
				 <?php foreach($video_list as $list){ ?>
                 <div class="article">
					   <div class="row">
						  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white no-padding">
							 <div class=" ">
								<div class="row ">
								    <div class="col-md-3 col-xs-12 text-center " >
										<div class="vertical-center">
											 <a href="<?php echo base_url('courses/videoplay/'.base64_encode($list['course_id']).'/'.base64_encode($list['video_id'])); ?>" class="">
											 <video width="100%" height="100%" class="thumbnail">
											  <source src="<?php echo base_url('assets/videos/'.$list['video_file']); ?>" type="video/mp4">
											  <source src="movie.ogg" type="video/ogg">
											</video></a>
											</div>
								   </div>
								   <div class=" col-md-9  bod-left">
									  <div class="article-details">
										 <h4><a href="<?php echo base_url('courses/videoplay/'.base64_encode($list['course_id']).'/'.base64_encode($list['video_id'])); ?>"  style="color:#0062C4;"><?php echo isset($list['v_title'])?$list['v_title']:''; ?></a></h4>
										 
										 <h5><strong class="site-col-r">Institites:</strong> <?php echo isset($list['i_name'])?$list['i_name']:''; ?></h5> 
										 <h5><strong class="site-col-r">Address:</strong> <span><?php echo isset($list['i_address'])?$list['i_address']:''; ?></span>
										 <span><?php echo isset($list['address'])?$list['address']:''; ?></span>
										 </h5> 
										 <h5><strong class="site-col-r">Contact:</strong> <span><?php echo isset($list['i_p_phone'])?$list['i_p_phone']:''; ?></span>
										 <?php if($list['i_s_phone']!=''){ ?>
										 <span><?php echo isset($list['i_s_phone'])?$list['i_s_phone']:''; ?></span>
										 <?php } ?>
										 </h5>
										 <h5><strong class="site-col-r">E-Mail ID:</strong> <span><?php echo isset($list['i_email_id'])?$list['i_email_id']:''; ?></span>
										 
										 </h5>
										  <?php if($list['i_founder']!=''){ ?>
										 <h5><strong class="site-col-r">Founder Name:</strong> <span><?php echo isset($list['i_founder'])?$list['i_founder']:''; ?></span>
										 
										 </h5>
										  <?php } ?>
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
				 <?php } ?>
				 <?php } ?>
					
					
					
					
					
					
					
					
					
            </div>
			<div class="col-md-3 col-xs-12 col-sm-12">
				<div class=" ">
					<img class="img-responsive sidebar-recent" src="<?php echo base_url(); ?>assets/vendor/front-end/img/add3.jpg" alt="add1">
				</div>
				
			</div>
						</section>
				
		</div>
		
	</div>
	</div>