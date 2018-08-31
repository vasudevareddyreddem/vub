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
	public  function links(){
		require('media.php');
		$image = new OpenGraphProtocolImage();
		$image->setURL( 'https://shofus.com/assets/vendor/front-end/img/logo.png' );
		$image->setSecureURL( 'https://shofus.com/assets/vendor/front-end/img/logo.png' );
		$image->setType( 'image/jpeg' );
		$image->setWidth( 400 );
		$image->setHeight( 300 );

		$video = new OpenGraphProtocolVideo();
		$video->setURL( 'http://shofus.com/assets/vendor/front-end/video/back1.mp4' );
		$video->setSecureURL( 'https://shofus.com/assets/vendor/front-end/video/back1.mp4' );
		$video->setType( OpenGraphProtocolVideo::extension_to_media_type( pathinfo( parse_url( $video->getURL(), PHP_URL_PATH ), PATHINFO_EXTENSION ) ) );
		$video->setWidth( 500 );
		$video->setHeight( 400 );

		$audio = new OpenGraphProtocolAudio();
		$audio->setURL( 'http://example.com/audio.mp3' );
		$audio->setSecureURL( 'https://example.com/audio.mp3' );
		$audio->setType('audio/mpeg');
		$ogp = new OpenGraphProtocol();
		$ogp->setLocale( 'en_US' );
		$ogp->setSiteName( 'Happy place' );
		$ogp->setTitle( 'Hello world' );
		$ogp->setDescription( 'We make the world happy.' );
		$ogp->setType( 'website' );
		$ogp->setURL( 'https://shofus.com' );
		$ogp->setDeterminer( 'the' );
		$ogp->addImage($image);
		//$ogp->addAudio($audio);
		$ogp->addVideo($video);
		$data['ogp']=$ogp;
		$article = new OpenGraphProtocolArticle();
		$article->setPublishedTime( '2011-11-03T01:23:45Z' );
		$article->setModifiedTime( new DateTime( 'now', new DateTimeZone( 'America/Los_Angeles' ) ) );
		$article->setExpirationTime( '2011-12-31T23:59:59+00:00' );
		$article->setSection( 'Front page' );
		$article->addTag( 'weather' );
		$article->addTag( 'football' );
		$article->addAuthor( 'http://example.com/author.html' );
		$data['article']=$article;
		//echo '<pre>';print_r($data);exit;
		$this->load->view('share',$data);
		//echo '<pre>';print_r($ogp);exit;
	}
	
	
	
}
