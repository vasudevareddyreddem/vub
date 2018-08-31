 <!-- Conversations are loaded here -->
 <?php //echo '<pre>';print_r($msg_list);exit; ?>
 <?php if(isset($msg_list) && count($msg_list)>0){ ?>

          <div  id="chatmessages" class="direct-chat-messages">
		   <?php foreach($msg_list as $list){ ?>
				 <?php if($list['type']=='Replay'){ ?>
							<!-- Message. Default to the left -->
							<div id="replyed_chat" class="direct-chat-msg">
							  <div class="direct-chat-info clearfix">
								<span class="direct-chat-name pull-left"><?php echo isset($list['sender_name'])?$list['sender_name']:''; ?></span>
								<span class="direct-chat-timestamp pull-right"><?php echo date('M j h:i A',strtotime(htmlentities($list['created_at'])));?></span>
							  </div>
							  <!-- /.direct-chat-info -->
							  <?php if($list['profile_pic']==''){ ?>
									<img class="direct-chat-img" src="<?php echo base_url('assets/customer_pic/user_1.jpg'); ?>" alt="User"><!-- /.direct-chat-img -->
							  <?php }else{ ?>
									<img class="direct-chat-img" src="<?php echo base_url('assets/customer_pic/'.$list['profile_pic']); ?>" alt="User"><!-- /.direct-chat-img -->
							  <?php } ?>
							  <div class="direct-chat-text">
								<?php echo isset($list['text'])?$list['text']:''; ?>
							  </div>
							  <!-- /.direct-chat-text -->
							</div>
							<?php }else{ ?>
						  
						  
						  <!--/.direct-chat-messages-->
					
						 <div id="reply_chat"  class="direct-chat-msg right">
							  <div class="direct-chat-info clearfix">
								<span class="direct-chat-name pull-right"><?php echo isset($list['sent_name'])?$list['sent_name']:''; ?></span>
								<span class="direct-chat-timestamp pull-left"><?php echo date('M j h:i A',strtotime(htmlentities($list['created_at'])));?></span>
							  </div>
							  <!-- /.direct-chat-info -->
							  <?php if($list['i_logo']==''){ ?>
									<img class="direct-chat-img" src="<?php echo base_url('assets/institute_logo/institute_logo.png'); ?>" alt="Institue"><!-- /.direct-chat-img -->
							  <?php }else{ ?>
									<img class="direct-chat-img" src="<?php echo base_url('assets/institute_logo/'.$list['i_logo']); ?>" alt="Institue"><!-- /.direct-chat-img -->
							  <?php } ?>
							  <div  class="direct-chat-text">
								<?php echo isset($list['text'])?$list['text']:''; ?>
							  </div>
							  <!-- /.direct-chat-text -->
							</div>
				 <?php } ?>
          <!-- /.direct-chat-pane -->
 <?php } ?>
          </div>
		  
 
 <?php } ?>
		  <?php exit; ?>