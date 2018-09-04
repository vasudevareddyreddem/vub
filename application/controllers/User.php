<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_end.php');

class User extends Front_end {

	public function __construct() 
	{
		parent::__construct();	
	}
	public function index()
	{	
		
		$data['home_page_video']=$this->User_model->get_home_page_video();
		//echo '<pre>';print_r($header);exit; 
		$this->load->view('html/index',$data);
		$this->load->view('html/footer');
	}
	
	public  function verification(){
		if($this->session->userdata('vuebin_user'))
		{
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
			$username=$this->config->item('smsusername');
			$pass=$this->config->item('smspassword');
			$msg=$random.' is your vuebin verification code one-time use. Please DO NOT share this OTP with anyone to ensure account security.';
			$ch2 = curl_init();
			curl_setopt($ch2, CURLOPT_URL,'https://login.bulksmsgateway.in/sendmessage.php');
			curl_setopt($ch2, CURLOPT_POST, 1);
			curl_setopt($ch2, CURLOPT_POSTFIELDS,'user='.$username.'&password='.$pass.'&mobile='.$post['mobile'].'&message='.$msg.'&sender=calfre&type=3');
			curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
			//echo '<pre>';print_r($ch2);exit;
			$server_output = curl_exec ($ch2);
			
			curl_close ($ch2);
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
			$username=$this->config->item('smsusername');
			$pass=$this->config->item('smspassword');
			$msg=$random.' is your vuebin verification code one-time use. Please DO NOT share this OTP with anyone to ensure account security.';
			$ch2 = curl_init();
			curl_setopt($ch2, CURLOPT_URL,'https://login.bulksmsgateway.in/sendmessage.php');
			curl_setopt($ch2, CURLOPT_POST, 1);
			curl_setopt($ch2, CURLOPT_POSTFIELDS,'user='.$username.'&password='.$pass.'&mobile='.$post['mobile'].'&message='.$msg.'&sender=vubein&type=3');
			curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
			//echo '<pre>';print_r($ch2);exit;
			$server_output = curl_exec ($ch2);
			curl_close ($ch2);
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
	
	public  function logout(){
		$userinfo = $this->session->userdata('vuebin_user');
        $this->session->unset_userdata($userinfo);
		$this->session->sess_destroy('vuebin_user');
		$this->session->unset_userdata('vuebin_user');
        redirect('');
	}
	public  function postleade(){
		$user_details=$this->session->userdata('vuebin_user');
		$post=$this->input->post();
		$lead_data=array(
		'i_id'=>isset($post['i_id'])?base64_decode($post['i_id']):'',
		'course_name'=>isset($post['course_name'])?$post['course_name']:'',
		'name'=>isset($post['name'])?$post['name']:'',
		'location_name'=>isset($post['location_name'])?$post['location_name']:'',
		'email_id'=>isset($post['email_id'])?$post['email_id']:'',
		'contact_num'=>isset($post['contact_num'])?$post['contact_num']:'',
		'created_at'=>date('Y-m-d H:i:s'),
		'updated_at'=>date('Y-m-d H:i:s'),
		'created_by'=>isset($user_details['cust_id'])?$post['cust_id']:'',
		);
		$save=$this->User_model->save_leads_data($lead_data);
		if(count($save)>0){
			redirect($this->agent->referrer());
		}else{
			redirect($this->agent->referrer());
		}
		//echo '<pre>';print_r($post);exit;
	}
	
	
	
}
