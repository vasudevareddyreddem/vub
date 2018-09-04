<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Admin_panel.php');
class Adminchat extends Admin_panel {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->model('Chat_model');	
	}
	public function index()
	{	
		
	}
	
public  function get_admin_pending_institue(){
	$login_details=$this->session->userdata('vuebin_user');
	$data['msg_list']=$this->Chat_model->get_pending_pending_messages_list($login_details['cust_id']);
	//echo '<pre>';print_r($data);exit;
	$this->load->view('chat/adminreplay_chat',$data);
}

public  function sent_admin_replay_msg(){
	$login_details=$this->session->userdata('vuebin_user');
	$post=$this->input->post();
	$update_data=array(
	'read_msg'=>1,
	);
	$this->Chat_model->update_unread_admin_messages($post['cust_id'],$update_data);

		$sent_data=array(
			'cust_id'=>isset($post['cust_id'])?$post['cust_id']:'',
			'admin_id'=>isset($login_details['cust_id'])?$login_details['cust_id']:'',
			'text'=>isset($post['text'])?$post['text']:'',
			'type'=>'Replayed',
			'read_msg'=>1,
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_by'=>date('Y-m-d H:i:s'),
			'created_by'=>isset($login_details['cust_id'])?$login_details['cust_id']:'',
		);
		$admin_sent=$this->Chat_model->save_admin_sent_messages($sent_data);
		if(count($admin_sent)>0){
			$data['msg_list']=$this->Chat_model->admin_get_indivusal_messages_list($post['cust_id']);
				
		}else{
			$data['msg_list']=$this->Chat_model->admin_get_indivusal_messages_list($post['cust_id']);
		}
		//echo '<pre>';print_r($data);exit;
		$this->load->view('chat/admin_single_chat',$data);
	

}	
/* admin side  replay messages */	
	
	
}
