<div class="chat-div">
<div>
	<div  style="" class="chat-box">
	 <div class="box-header with-border bg-white">
          <h3 class="box-title">Direct Chat</h3>
		 <a> <i class="fa fa-times-circle pull-right btn-chat-box" aria-hidden="true"></i></a>
    
          
        </div>
     <div class="chat-container">
	 
	   <div class="box-body">
	    <?php //echo '<pre>';print_r($msg_list);exit; ?>
 <?php if(isset($msg_list) && count($msg_list)>0){ ?>
  <?php foreach($msg_list as $list){ ?>
   <?php if($list['type']=='Replay'){ ?>
    <div class="message">
       <div class="direct-chat-msg">
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
    </div> 
   <?php }else{ ?>
	<div class="message">
       <div class="direct-chat-msg right">
              <div class="direct-chat-info clearfix">
                <span class="direct-chat-name pull-right"><?php echo isset($list['sent_name'])?$list['sent_name']:''; ?></span>
                <span class="direct-chat-timestamp pull-left"><?php echo date('M j h:i A',strtotime(htmlentities($list['created_at'])));?></span>
              </div>
              <!-- /.direct-chat-info -->
					<?php if($list['a_logo']==''){ ?>
									<img class="direct-chat-img" src="<?php echo base_url('assets/customer_pic/user_2.jpg'); ?>" alt="Admin"><!-- /.direct-chat-img -->
							  <?php }else{ ?>
									<img class="direct-chat-img" src="<?php echo base_url('assets/customer_pic/user_2.jpg'); ?>" alt="Admin"><!-- /.direct-chat-img -->
							  <?php } ?>              <div class="direct-chat-text">
               <?php echo isset($list['text'])?$list['text']:''; ?>
              </div>
              <!-- /.direct-chat-text -->
            </div>
    </div>
   <?php } ?>
	
 <?php } ?>
 <?php } ?>
  </div>
  </div>
  <div class="box-footer">
          <form action="#" method="post">
            <div class="input-group">
              <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary btn-flat">Send</button>
                  </span>
            </div>
          </form>
        </div>

    </div>
</div>
</div>
<script>
$(document).ready(function(){
    $(".btn-chat-box").click(function(){
        $(".chat-box").toggle();
    });
});
</script>
<?php  exit; ?>