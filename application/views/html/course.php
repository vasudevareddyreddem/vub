
	<div class="content-wrapper">
	<div class="body-start">
		<div class="container">
		    <section class="content">
			<?php if(isset($classification_list) && count($classification_list)>0){ ?>
			<?php foreach($classification_list as $list){ ?>
			<div class="row"> 
				<div class="panel panel-default">
				  <div class="panel-heading"><?php echo isset($list['c_name'])?$list['c_name']:''; ?></div>
				  <div class="panel-body hover-zoom">
				  <?php if(isset($list['course_list']) && count($list['course_list'])>0){ ?>
					  <?php foreach($list['course_list'] as $li){ ?>
						<div class="col-md-3 pad-t10">
							<a href="<?php echo base_url('courses/videolist/'.base64_encode($li['course_id']).'/'.$list['c_name'].'/'.$li['c_name']); ?>"> <?php echo isset($li['c_name'])?$li['c_name']:''; ?>  <span class="label label-primary"><?php echo isset($li['video_count'])?$li['video_count']:''; ?></span></a>
						</div>
					  <?php } ?>
				  <?php } ?>
					
				
				  </div>
				</div>
			</div>

			<?php } ?>			
			<?php }else{ ?>
			<div class="row"> No data Available</div>
			<?php } ?>
				
		</div>
	</div>
	</div>
