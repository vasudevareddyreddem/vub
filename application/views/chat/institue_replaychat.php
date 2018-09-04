
<?php if(isset($msg_list) && count($msg_list)>0){ ?>
<?php foreach($msg_list as $lis){ ?>
<div  style="" class="chat-box col-md-3 col-md-offset-3">
      <!-- DIRECT CHAT PRIMARY -->
      <div id="institue_user_chat_id_<?php echo $lis['cust_id']; ?>" class="box box-primary direct-chat direct-chat-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo isset($lis['name'])?$lis['name']:'' ;?>&nbsp;Direct Chat</h3>
		 <a href="javascript:void(0);" onclick="close_institue_chat('<?php echo $lis['cust_id']; ?>');"> <i class="fa fa-times-circle pull-right btn-chat-box" aria-hidden="true"></i></a>
    
          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <!-- Conversations are loaded here -->
          <div class="direct-chat-messages" id="div1<?php echo $lis['cust_id']; ?>">
            <!-- Message. Default to the left -->
			
			<?php foreach($lis['messages'] as $list){ ?>
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
							  <?php if($list['a_logo']==''){ ?>
									<img class="direct-chat-img" src="<?php echo base_url('assets/customer_pic/user_2.jpg'); ?>" alt="Admin"><!-- /.direct-chat-img -->
							  <?php }else{ ?>
									<img class="direct-chat-img" src="<?php echo base_url('assets/customer_pic/user_2.jpg'); ?>" alt="Admin"><!-- /.direct-chat-img -->
							  <?php } ?>
							  <div  class="direct-chat-text">
								<?php echo isset($list['text'])?$list['text']:''; ?>
							  </div>
							  <!-- /.direct-chat-text -->
							</div>
				 <?php } ?>
			
			<?php } ?>
          </div>
          <!--/.direct-chat-messages-->
    
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <form>
            <div class="input-group">
				<input type="text" id="text_msg<?php echo $lis['cust_id']; ?>" name="text_msg" placeholder="Type Message ..." class="form-control">
				<span class="input-group-btn">
				<button type="button" onclick="sent_institue_replay_msg(<?php echo $lis['cust_id']; ?>);" class="btn btn-primary btn-flat">Send</button>
				</span>
            </div>
          </form>
        </div>
        <!-- /.box-footer-->
      </div>
      <!--/.direct-chat -->
    </div>
	<script>
	function scrollToBottom<?php echo $lis['cust_id']; ?>(id) {
	var div = document.getElementById(id);
	div.scrollTop = div.scrollHeight - div.clientHeight;
	}
	scrollToBottom('div1<?php echo $lis['cust_id']; ?>');
	</script>
	
<?php } ?>
	
<?php } ?>

<script>
function institue_single_replay_msg(cust_id){
	alert('hiiii');
	
}
function close_institue_chat(id){
	$('#institue_user_chat_id_'+id).hide();
}
function sent_institue_replay_msg(cust_id){
	var msg=$('#text_msg'+cust_id).val();
	jQuery.ajax({
   			url: "<?php echo base_url('chat/sent_institue_replay_msg');?>",
   			data: {
				text: msg,
				cust_id: cust_id,
			},
   			type: "POST",
   			format:"html",
   					success:function(data){
						$('#text_msg'+cust_id).val('');
						$("#institue_user_chat_id_"+cust_id).empty();
						$("#institue_user_chat_id_"+cust_id).append(data);
					}
           });
}
</script>
<?php exit; ?>
