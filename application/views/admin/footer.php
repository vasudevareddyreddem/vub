 <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy; 2018 <a href="#">vuebin</a>.</strong> All rights
    reserved.
  </footer>


  <div class="control-sidebar-bg"></div>
  <div class="chat-div">
	<div class="row" id="pending_chats">
	
	
    </div>
	

<a href="javascript:void(0);" onclick="get_admin_msgs();"><img class="btn-chat-box" style="width:100px;height:auto;float:right;" src="<?php echo base_url(); ?>assets/vendor/front-end/img/livechat.png" alt="livechat"></a>
	
</div>
</div>
<!-- ./wrapper -->
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/vendor/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/plugins/select2/select2.full.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/vendor/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/vendor/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/vendor/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/vendor/dist/js/demo.js"></script>
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->

<script>
function pageScroll() {
    	window.scrollBy(0,50); // horizontal and vertical scroll increments
    	scrolldelay = setTimeout('pageScroll()',100); // scrolls every 100 milliseconds
}
function sent_replay_msg(cust_id){
	var msg=$('#text_msg'+cust_id).val();
	jQuery.ajax({
   			url: "<?php echo base_url('adminchat/sent_admin_replay_msg');?>",
   			data: {
				text: msg,
				cust_id: cust_id,
			},
   			type: "POST",
   			format:"html",
   					success:function(data){
						$('#text_msg'+cust_id).val('');
						$("#admin_replay_"+cust_id).empty();
						$("#admin_replay_"+cust_id).append(data);
						document.getElementById("#admin_replay_"+cust_id).scrollIntoView();
						pageScroll();
						
   					}
           });
	
}
function get_admin_msgs(){
	jQuery.ajax({
   			url: "<?php echo base_url('adminchat/get_admin_pending_institue');?>",
   			data: {
				text:'',
			},
   			type: "POST",
   			format:"html",
   					success:function(data){
						$("#pending_chats").empty();
						$("#pending_chats").append(data);
						
   					}
           }); 
}
function close_user_chat(id){
	$('#admin_user_chat_id_'+id).hide();
}
$(document).ready(function(){
    $(".btn-chat-box").click(function(){
        $(".chat-box").toggle();
    });
});
 $(".select2").select2(
	 {
		closeOnSelect: true
	}
 );
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
</body>
</html>
