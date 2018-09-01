

</div>
</body>
<footer class="footer-2 bg-dark" id="footer" style="border-top:5px solid #fff;z-index:1024">
<div class="container">
			
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="script">Thank's for visiting Vubin</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                       
                    </div>
                    <div class="col-md-3 col-md-offset-1">
                        <h3 class="script">Find me!</h3>
                       
                  
                        <address>
                            <strong>7-1-413/17</strong>
                            <br>Srinivasa Nagar 
                            <br>Ameerpet ,Hyderabad.
                            <br>
                            
                        </address>
                    </div>
                </div>
            </div>
        </footer>
<!-- jQuery 2.2.3 -->
<script>
function send_msg(){
	var msg=$('#text_msg').val();
	if(msg!=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('chat/send_sms_institue');?>",
   			data: {
				text: msg,
				int_id: '<?php echo base64_decode($this->uri->segment(3)); ?>',
				msg_type: '<?php echo $this->uri->segment(2); ?>',
			},
   			type: "POST",
   			format:"html",
   					success:function(data){
						$('#text_msg').val('');
						$("#chatmessages").empty();
						$("#chatmessages").append(data);
						
   					}
           });
	   }else{
		  jQuery.ajax({
   			url: "<?php echo base_url('chat/get_sms_institue');?>",
   			data: {
				text: msg,
				int_id: '<?php echo base64_decode($this->uri->segment(3)); ?>',
				msg_type: '<?php echo $this->uri->segment(2); ?>',
			},
   			type: "POST",
   			format:"html",
   					success:function(data){
						$("#chatmessages").empty();
						$("#chatmessages").append(data);
						
   					}
           }); 
	   }
	
}
$(document).ready(function(){
    $(".btn-chat-box").click(function(){
        $(".chat-box").toggle();
    });
});
</script>

<script src="<?php echo base_url(); ?>assets/vendor/front-end/js/app.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/front-end/js/jquery-ui.js"></script>


</body>
</html>
 