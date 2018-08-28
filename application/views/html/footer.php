<div class="chat-div">
<div >
	<div  style="display:none" class="chat-box">
      <!-- DIRECT CHAT PRIMARY -->
      <div class="box box-primary direct-chat direct-chat-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Direct Chat</h3>
		 <a> <i class="fa fa-times-circle pull-right btn-chat-box" aria-hidden="true"></i></a>
    
          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <!-- Conversations are loaded here -->
          <div class="direct-chat-messages">
            <!-- Message. Default to the left -->
            <div class="direct-chat-msg">
              <div class="direct-chat-info clearfix">
                <span class="direct-chat-name pull-left">Alexander Pierce</span>
                <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
              </div>
              <!-- /.direct-chat-info -->
              <img class="direct-chat-img" src="https://bootdey.com/img/Content/user_1.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
              <div class="direct-chat-text">
                Is this template really for free? That's unbelievable!
              </div>
              <!-- /.direct-chat-text -->
            </div>
            <!-- /.direct-chat-msg -->
    
            <!-- Message to the right -->
            <div class="direct-chat-msg right">
              <div class="direct-chat-info clearfix">
                <span class="direct-chat-name pull-right">Sarah Bullock</span>
                <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
              </div>
              <!-- /.direct-chat-info -->
              <img class="direct-chat-img" src="https://bootdey.com/img/Content/user_2.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
              <div class="direct-chat-text">
                You better believddde it!
              </div>
              <!-- /.direct-chat-text -->
            </div>
            <!-- /.direct-chat-msg -->
          </div>
          <!--/.direct-chat-messages-->
    
          <!-- Contacts are loaded here -->
          <div class="direct-chat-contacts">
            <ul class="contacts-list">
              <li>
                <a href="#">
                  <img class="contacts-list-img" src="https://bootdey.com/img/Content/user_1.jpg">
    
                  <div class="contacts-list-info">
                        <span class="contacts-list-name">
                          Count Dracula
                          <small class="contacts-list-date pull-right">2/28/2015</small>
                        </span>
                    <span class="contacts-list-msg">How have you been? I was...</span>
                  </div>
                  <!-- /.contacts-list-info -->
                </a>
              </li>
              <!-- End Contact Item -->
            </ul>
            <!-- /.contatcts-list -->
          </div>
          <!-- /.direct-chat-pane -->
        </div>
        <!-- /.box-body -->
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
        <!-- /.box-footer-->
      </div>
      <!--/.direct-chat -->
    </div>
</div>
<img class="btn-chat-box" style="width:100px;height:auto;float:right;" src="<?php echo base_url(); ?>assets/vendor/front-end/img/livechat.png" alt="livechat">
	
</div>

<footer class="footer-2 bg-dark" id="footer" style="border-top:5px solid #fff;">
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
$(document).ready(function(){
    $(".btn-chat-box").click(function(){
        $(".chat-box").toggle();
    });
});
</script>

<script src="<?php echo base_url(); ?>assets/vendor/front-end/js/app.min.js"></script>


</body>
</html>
 