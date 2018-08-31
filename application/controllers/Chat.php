<?php

class Chat extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		//$this->load->library('session');
		$this->load->library('email');
		$this->load->library('user_agent');
		$this->load->helper('directory');
		$this->load->helper('cookie');
		$this->load->helper('security');
		$this->load->model('User_model');		
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
		
		//echo '<pre>';print_r($msg_list);exit;
		$post=$this->input->post();
		$msg_data=array(
		'cust_id'=>isset($login_details['cust_id'])?$login_details['cust_id']:'',
		'institue_id'=>isset($post['institue_id'])?$post['institue_id']:'',
		'text'=>isset($post['text'])?$post['text']:'',
		'type'=>'Replay',
		'created_at'=>date('Y-m-d H:i:s'),
		'updated_by'=>date('Y-m-d H:i:s'),
		'created_by'=>isset($login_details['cust_id'])?$login_details['cust_id']:'',
		);
		$save=$this->Chat_model->save_message($msg_data);
		if(count($save)>0){
			$msg_list=$this->Chat_model->get_customer_wise_sent_messages_list($login_details['cust_id']);
			//echo '<pre>';print_r($msg_list);
			$data['msg']=1;
			$data['list']=$msg_list;
			echo json_encode($data);exit;	
		}else{
			$msg_list=$this->Chat_model->get_customer_wise_sent_messages_list($login_details['cust_id']);
			$data['msg']=0;
			$data['list']=$msg_list;
			echo json_encode($data);exit;
		}
		//echo '<pre>';print_r($post);exit;
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	
	
	
	
}
