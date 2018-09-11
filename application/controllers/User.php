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
		$footer['details']=$this->Content_model->get_footer_content(1);
		$this->load->view('html/footer',$footer);
	}
	
	public  function verification(){
		if($this->session->userdata('vuebin_user'))
		{
			$user_details=$this->session->userdata('vuebin_user');
			$data['user_details']=$this->User_model->get_user_basic_details($user_details['cust_id']);
			//echo '<pre>';print_r($data);exit; 
			$this->load->view('html/verification',$data);
			$footer['details']=$this->Content_model->get_footer_content(1);
			$this->load->view('html/footer',$footer);
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
			$footer['details']=$this->Content_model->get_footer_content(1);
			$this->load->view('html/footer',$footer);
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
			//echo '<pre>';print_r($user_details);exit;
			
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
		'in_id'=>isset($post['i_id'])?base64_decode($post['i_id']):'',
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
			if(isset($post['i_id']) && $post['i_id']!=''){
				$institue_lead = array('name' => 'institue_lead', 'value' => 1,'expire' => time()+86500 ,'path'   => '/');
				$this->input->set_cookie($institue_lead);
				$this->load->helper('cookie');
				$this->input->cookie('institue_lead', TRUE);
			}else{
				$admin_lead = array('name' => 'admin_lead', 'value' => 1,'expire' => time()+86500 ,'path'   => '/');
				$this->input->set_cookie($admin_lead);
				$this->load->helper('cookie');
				$this->input->cookie('admin_lead', TRUE);
			}
			
			redirect($this->agent->referrer());
		}else{
			redirect($this->agent->referrer());
		}
		//echo '<pre>';print_r($post);exit;
	}
	
	public  function save_lead_information(){
		$post=$this->input->post();
		$random   = substr( rand() * 900000 + 100000, 0, 6 );
		$leade_save=array(
			'in_id'=>isset($post['l_id'])?base64_decode($post['l_id']):'',
			'course_name'=>isset($post['course'])?$post['course']:'',
			'name'=>isset($post['p_name'])?$post['p_name']:'',
			'location_name'=>isset($post['loc'])?$post['loc']:'',
			'email_id'=>isset($post['email_id'])?$post['email_id']:'',
			'contact_num'=>isset($post['num'])?$post['num']:'',
			'otp_verification'=>isset($random)?$random:'',
			'otp_dateitm'=>date('Y-m-d H:i:s'),
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'created_by'=>isset($user_details['cust_id'])?$post['cust_id']:'',
		);
		$save=$this->User_model->save_leads_data($leade_save);
		if(count($save)>0){
				$username=$this->config->item('smsusername');
				$pass=$this->config->item('smspassword');
				$msg=$random.' is your vuebin verification code one-time use. Please DO NOT share this OTP with anyone to ensure account security.';
				$ch2 = curl_init();
				curl_setopt($ch2, CURLOPT_URL,'https://login.bulksmsgateway.in/sendmessage.php');
				curl_setopt($ch2, CURLOPT_POST, 1);
				curl_setopt($ch2, CURLOPT_POSTFIELDS,'user='.$username.'&password='.$pass.'&mobile='.$post['num'].'&message='.$msg.'&sender=vubein&type=3');
				curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
				//echo '<pre>';print_r($ch2);exit;
				$server_output = curl_exec ($ch2);
				curl_close ($ch2);
				$data['msg']=1;
				$data['lead_id']=$save;
				echo json_encode($data);exit;	
		}else{
			$data['msg']=0;
			$data['lead_id']=0;
			echo json_encode($data);exit;
		}
	}
	public  function resent_verification_code(){
		$post=$this->input->post();
		$lead_details=$this->User_model->get_leader_details($post['lead_id']);
		if(count($lead_details)>0){
			$random   = substr( rand() * 900000 + 100000, 0, 6 );
			$lead_update=array(
				'otp_verification'=>isset($random)?$random:'',
				'otp_dateitm'=>date('Y-m-d H:i:s'),
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
			);
			$update_data=$this->User_model->update_lead_resend_otp($post['lead_id'],$lead_update);
			if(count($update_data)>0){
				$username=$this->config->item('smsusername');
				$pass=$this->config->item('smspassword');
				$msg=$random.' is your vuebin verification code one-time use. Please DO NOT share this OTP with anyone to ensure account security.';
				$ch2 = curl_init();
				curl_setopt($ch2, CURLOPT_URL,'https://login.bulksmsgateway.in/sendmessage.php');
				curl_setopt($ch2, CURLOPT_POST, 1);
				curl_setopt($ch2, CURLOPT_POSTFIELDS,'user='.$username.'&password='.$pass.'&mobile='.$lead_details['contact_num'].'&message='.$msg.'&sender=vubein&type=3');
				curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
				//echo '<pre>';print_r($ch2);exit;
				$server_output = curl_exec ($ch2);
				curl_close ($ch2);
				$data['msg']=1;
				$data['lead_id']=$save;
				echo json_encode($data);exit;
			}else{
				$data['msg']=0;
				echo json_encode($data);exit;
			}
		}else{
			$data['msg']=1;
			echo json_encode($data);exit;
		}
	}
	public  function mobile_num_verification(){
		$post=$this->input->post();
		$lead_details=$this->User_model->get_leader_details($post['lead_id']);
		if($lead_details['otp_verification']==$post['otp']){
					$current_time=date('Y-m-d H:i:s');
					$start  = date_create($lead_details['otp_dateitm']);
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
							$update=$this->User_model->update_lead_resend_otp($post['lead_id'],$add);
							if(count($update)>0){
								if($lead_details['in_id']!='' && $lead_details['in_id']!=0){
									$institue_lead = array('name' => 'institue_lead', 'value' => 1,'expire' => time()+86500 ,'path'   => '/');
									$this->input->set_cookie($institue_lead);
									$this->load->helper('cookie');
									$this->input->cookie('institue_lead', TRUE);
								}else{
									$admin_lead = array('name' => 'admin_lead', 'value' => 1,'expire' => time()+86500 ,'path'   => '/');
									$this->input->set_cookie($admin_lead);
									$this->load->helper('cookie');
									$this->input->cookie('admin_lead', TRUE);
								}
								
								$data['msg']=1;
								echo json_encode($data);exit;
							}else{
								$data['msg']=0;
								echo json_encode($data);exit;
							}
					}else{
						$data['msg']=2;
						echo json_encode($data);exit;
					}
				
			
			}else{
				$data['msg']=3;
				echo json_encode($data);exit;
				
			}
		
	}
	
	
	
}
