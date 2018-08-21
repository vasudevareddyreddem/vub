<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->library('user_agent');
		$this->load->helper('directory');
		$this->load->helper('cookie');
		$this->load->helper('security');
		$this->load->model('User_model');
	}
	public function index()
	{	
		$this->load->view('html/header');
		$data['home_page_video']=$this->User_model->get_home_page_video();
		//echo '<pre>';print_r($data);exit; 
		$this->load->view('html/index',$data);
		$this->load->view('html/footer');
	}
	public function login()
	{	
		if(!$this->session->userdata('user_details'))
		{
			$this->load->view('index');
		}else{
			redirect('dashboard');
		}
	}
	
	/* login post method*/
	public function loginpost()
	{
		if(!$this->session->userdata('user_details'))
		{
			$post=$this->input->post();
			$login_details=$this->User_model->check_login_details($post['username'],md5($post['password']));
			if(isset($post['remember_me']) && $post['remember_me']==1){
					$usernamecookie = array('name' => 'username', 'value' => $post["username"],'expire' => time()+86500 ,'path'   => '/');
					$passwordcookie = array('name' => 'password', 'value' => $post["password"],'expire' => time()+86500,'path'   => '/');
					$remembercookie = array('name' => 'remember', 'value' => $post["remember_me"],'expire' => time()+86500,'path'   => '/');
					$this->input->set_cookie($usernamecookie);
					$this->input->set_cookie($passwordcookie);
					$this->input->set_cookie($remembercookie);
					$this->load->helper('cookie');
					$this->input->cookie('username', TRUE);
					//echo print_r($usernamecookie);exit;

					}else{
						delete_cookie('username');
						delete_cookie('password');
						delete_cookie('remember');
					}
			if(count($login_details)>0){
				$cust_details=$this->User_model->get_login_customer_details($login_details['cust_id']);
				$this->session->set_userdata('user_details',$cust_details);
				redirect('dashboard');
			}else{
				$this->session->set_flashdata('error',"Invalid Username/Email Id or Password!");
				redirect('admin');
			}
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	public  function verification(){
		if($this->session->userdata('vuebin_user'))
		{
			$this->load->view('html/header');
			$user_details=$this->session->userdata('vuebin_user');
			$data['user_details']=$this->User_model->get_user_basic_details($user_details['cust_id']);
			//echo '<pre>';print_r($data);exit; 
			$this->load->view('html/verification',$data);
			$this->load->view('html/footer');
		}else{
			redirect();
		}
	}
	public  function verificationpost(){
		if($this->session->userdata('vuebin_user'))
		{
			$post=$this->input->post();
			$update_data=array(
			'soure'=>isset($post['source'])?$post['source']:'',
			'name'=>isset($post['name'])?$post['name']:'',
			'email_id'=>isset($post['email_id'])?$post['email_id']:'',
			'mobile'=>isset($post['mobile'])?$post['mobile']:'',
			'otp_verification'=>isset($post['otp_verification'])?$post['otp_verification']:'',
			'otp_dateitm'=>date('Y-m-d H:i:s'),
			);
			echo '<pre>';print_r($post);exit; 
			
		}else{
			redirect();
		}
	}
	
	
	
}
