<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_end.php');

class Chat extends Front_end {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->model('Chat_model');	
	}
	public function index()
	{	
		
	}
	public function send_sms_institue(){
		if($this->session->userdata('vuebin_user'))
		{
			
		$login_details=$this->session->userdata('vuebin_user');
		//$msg_list=$this->Chat_model->get_customer_wise_sent_messages_list($login_details['cust_id']);
		$post=$this->input->post();
			if($post['msg_type']=='page'|| $post['msg_type']=='play'){
		
					$msg_data=array(
					'cust_id'=>isset($login_details['cust_id'])?$login_details['cust_id']:'',
					'institue_id'=>isset($post['int_id'])?$post['int_id']:'',
					'text'=>isset($post['text'])?$post['text']:'',
					'type'=>'Replay',
					'created_at'=>date('Y-m-d H:i:s'),
					'updated_by'=>date('Y-m-d H:i:s'),
					'created_by'=>isset($login_details['cust_id'])?$login_details['cust_id']:'',
					);
					$save=$this->Chat_model->save_message($msg_data);
					if(count($save)>0){
						$data['msg_list']=$this->Chat_model->get_customer_wise_sent_messages_list($login_details['cust_id'],$post['int_id']);
						$this->load->view('chat/chat',$data);	
					}else{
						$data['msg_list']=$this->Chat_model->get_customer_wise_sent_messages_list($login_details['cust_id'],$post['int_id']);
						$this->load->view('chat/chat',$data);	
					}
		
			}else{
				$post=$this->input->post();
				//echo '<pre>';print_r($post);
				$adminmsg_data=array(
					'cust_id'=>isset($login_details['cust_id'])?$login_details['cust_id']:'',
					'admin_id'=>0,
					'text'=>isset($post['text'])?$post['text']:'',
					'type'=>'Replay',
					'created_at'=>date('Y-m-d H:i:s'),
					'updated_by'=>date('Y-m-d H:i:s'),
					'created_by'=>isset($login_details['cust_id'])?$login_details['cust_id']:'',
					);
					$admin_save=$this->Chat_model->save_admin_message($adminmsg_data);
					if(count($admin_save)>0){
						$data['msg_list']=$this->Chat_model->get_customer_wise_sent_admin_messages_list($login_details['cust_id']);
					}else{
						$data['msg_list']=$this->Chat_model->get_customer_wise_sent_admin_messages_list($login_details['cust_id']);
					}
					$this->load->view('chat/adminchat',$data);
					echo '<pre>';print_r($adminmsg_data);exit;
					
					
			}
		//echo '<pre>';print_r($post);exit;
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	public function get_sms_institue(){
		if($this->session->userdata('vuebin_user'))
		{
		$login_details=$this->session->userdata('vuebin_user');
		$post=$this->input->post();
		if($post['msg_type']=='page'|| $post['msg_type']=='play'){
			$msg_list=$this->Chat_model->get_customer_wise_sent_messages_list($login_details['cust_id'],$post['int_id']);
			if(count($msg_list)>0){
				$data['msg_list']=$msg_list;
				$this->load->view('chat/chat',$data);
				//echo json_encode($data);exit;	
			}else{
				$data['msg_list']=$this->Chat_model->get_customer_wise_sent_messages_list($login_details['cust_id'],$post['int_id']);
				$this->load->view('chat/chat',$data);
			}
		}else{
				$data['msg_list']=$this->Chat_model->get_customer_wise_sent_admin_messages_list($login_details['cust_id']);
				$this->load->view('chat/adminchat',$data);
		}
		//echo '<pre>';print_r($post);exit;
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	
/* admin side  replay messages */
public  function get_admin_pending_institue(){
	$login_details=$this->session->userdata('vuebin_user');
	$data['msg_list']=$this->Chat_model->get_pending_pending_messages_list($login_details['cust_id']);
	//echo '<pre>';print_r($data);exit;
	$this->load->view('chat/adminreplay_chat',$data);
}	
/* admin side  replay messages */	
	
	
}
