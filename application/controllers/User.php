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
		
		require_once "config.php";
		$redirectURL = "https://shofus.com/fbcallback";
		$permissions = ['email'];
		$header['loginURL']=$helper->getLoginUrl($redirectURL, $permissions);
		$this->load->view('html/header',$header);
		$data['home_page_video']=$this->User_model->get_home_page_video();
		//echo '<pre>';print_r($header);exit; 
		$this->load->view('html/index',$data);
		$this->load->view('html/footer');
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
			$user_details=$this->session->userdata('vuebin_user');
			$post=$this->input->post();
			$random   = substr( rand() * 900000 + 100000, 0, 6 );
			//echo '<pre>';print_r($post);exit; 
			$update_data=array(
			'name'=>isset($post['name'])?$post['name']:'',
			'email_id'=>isset($post['email_id'])?$post['email_id']:'',
			'mobile'=>isset($post['mobile'])?$post['mobile']:'',
			'otp_verification'=>isset($random)?$random:'',
			'otp_dateitm'=>date('Y-m-d H:i:s'),
			);
			$update=$this->User_model->update_user_details($user_details['cust_id'],$update_data);
			if(count($update)>0){
				$this->session->set_flashdata('success',"Mobile Number Successfully Updated.");
				redirect('user/verify');
			}else{
				$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
				redirect('user/verification');
			}
			
			
		}else{
			redirect();
		}
	}
	public  function resendotp(){
		if($this->session->userdata('vuebin_user'))
		{
			$user_details=$this->session->userdata('vuebin_user');
			$post=$this->input->post();
			$random   = substr( rand() * 900000 + 100000, 0, 6 );
			//echo '<pre>';print_r($post);exit; 
			$update_data=array(
			'otp_verification'=>isset($random)?$random:'',
			'otp_dateitm'=>date('Y-m-d H:i:s'),
			);
			$update=$this->User_model->update_user_details($user_details['cust_id'],$update_data);
			if(count($update)>0){
				$this->session->set_flashdata('success',"Otp successfully sent. Check  your  register Mobile  number");
				redirect('user/verify');
			}else{
				$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
				redirect('user/verify');
			}
			
			
		}else{
			redirect();
		}
	}
	public  function verify(){
		if($this->session->userdata('vuebin_user'))
		{
			$this->load->view('html/header');
			$user_details=$this->session->userdata('vuebin_user');
			$data['user_details']=$this->User_model->get_user_basic_details($user_details['cust_id']);
			//echo '<pre>';print_r($data);exit; 
			$this->load->view('html/verify',$data);
			$this->load->view('html/footer');
		}else{
			redirect();
		}
	}
	public  function otpverifciationpost(){
		if($this->session->userdata('vuebin_user'))
		{
			$post=$this->input->post();
			$user_details=$this->session->userdata('vuebin_user');
			$user_details=$this->User_model->get_user_basic_details($user_details['cust_id']);
			if($user_details['otp_verification']==$post['otp']){
					$current_time=date('Y-m-d H:i:s');
					
					$start  = date_create($user_details['otp_dateitm']);
					$end 	= date_create($current_time); // Current time and date
					$diff  	= date_diff( $start, $end );
					
					//echo '<pre>';print_r($diff);
					//exit;
					if(($diff->i)<=5){
								$add=array(
							'otp_verification'=>isset($post['otp'])?$post['otp']:'',
							'mobile_verified'=>1,	
							'updated_at'=>date('Y-m-d H:i:s'),
							
							);
							$update=$this->User_model->update_user_details($user_details['cust_id'],$add);
							if(count($update)>0){
								//$this->session->set_flashdata('success',"Mobile Number Successfully Updated.");
								redirect('');
							}else{
								$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('user/verify');
							}
					}else{
						$this->session->set_flashdata('error',"One Time Password is expired. Please try again");
						redirect('user/verify');
					}
				
			
			}else{
					$this->session->set_flashdata('error',"Otp wrong. Please try again");
					redirect('user/verify');
				
			}
			echo '<pre>';print_r($user_details);exit;
			
		}else{
			redirect();
		}
	}
	
	
	
}
