</div>
</body>
<footer class="footer-2 bg-dark" id="footer" style="border-top:5px solid #fff;z-index:1024">
    <div class="container">
        <div class="row">
            <div class="col-md-3">

                <h3 class="script">Qucik Links</h3>
				<ul class="qucik-li">
				<li>Home</li>
					<li class="page-scroll"> <a href="<?php echo base_url('institutes'); ?>">Institutes </a> </li>
					<li class="page-scroll"> <a href="<?php echo base_url('courses'); ?>">Courses </a> </li>
				</ul>
            </div>
            <div class="col-md-3 ">
                <h3 class="script">Find me!</h3> <p><i class="fa fa-location-arrow"></i> 9878/25 sec 9 rohini 35 </p>
					<p><i class="fa fa-phone"></i>  +91-9999878398  </p>
					<p><i class="fa fa fa-envelope"></i> info@example.com  </p>	
            </div>
			<div class="col-md-3 ">
                <h3 class="script">Find me!</h3> <address> <strong>7-1-413/17</strong> <br>Srinivasa Nagar <br>Ameerpet ,Hyderabad. <br> </address>
            </div>
			<div class="col-md-3 ">
                <h3 class="script">Find me!</h3> <address> <strong>7-1-413/17</strong> <br>Srinivasa Nagar <br>Ameerpet ,Hyderabad. <br> </address>
            </div>
        </div>
    </div>
</footer> <!-- jQuery 2.2.3 -->
<script>
    function send_msg() {
        var msg = $('#text_msg').val();
        if (msg != '') {
            jQuery.ajax({
                url: "<?php echo base_url('chat/send_sms_institue');?>",
                data: {
                    text: msg,
                    int_id: '<?php echo base64_decode($this->uri->segment(3)); ?>',
                    msg_type: '<?php echo $this->uri->segment(2); ?>',
                },
                type: "POST",
                format: "html",
                success: function(data) {
                    $('#text_msg').val('');
                    $("#chatmessages").empty();
                    $("#chatmessages").append(data);
                    scrollToBottom('div1');
                }
            });
        } else {
            jQuery.ajax({
                url: "<?php echo base_url('chat/get_sms_institue');?>",
                data: {
                    text: msg,
                    int_id: '<?php echo base64_decode($this->uri->segment(3)); ?>',
                    msg_type: '<?php echo $this->uri->segment(2); ?>',
                },
                type: "POST",
                format: "html",
                success: function(data) {
                    $("#chatmessages").empty();
                    $("#chatmessages").append(data);
                    scrollToBottom('div1');
                }
            });
        }
    }

    function scrollToBottom(id) {
        var div = document.getElementById(id);
        div.scrollTop = div.scrollHeight - div.clientHeight;
    }
    $(document).ready(function() {
        $(".btn-chat-box").click(function() {
            $(".chat-box").toggle();
        });
    });
</script>
<script src="<?php echo base_url(); ?>assets/vendor/front-end/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/front-end/js/jquery-ui.js"></script>
</body>

</html>