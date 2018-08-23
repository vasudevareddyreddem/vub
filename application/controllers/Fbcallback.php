<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fbcallback extends CI_Controller
{
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
		
	} 
	public function index(){
		require_once "config.php";

	try {
		$accessToken = $helper->getAccessToken(); //short lived token

	}
	catch(\Facebook\Exceptions\FacebookResponseException $e) {
		echo "Response Exception :" . $e->getMessage();
		exit();
	}
	catch(\Facebook\Exceptions\FacebookSDKException $e) {
		echo "Response Exception  SDK:" . $e->getMessage();
		exit;
		
		$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
		redirect($this->agent->referrer());
	}

	if (!$accessToken) {
		$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
		redirect($this->agent->referrer());
	}

	$oAuth2Client = $FB->getOAuth2Client();
	if (!$accessToken->isLongLived()) 
		$accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);

	$response = $FB->get("me?fields=id,first_name,last_name,age_range,email,birthday,picture.type(large)", $accessToken);

	$userData = $response->getGraphNode()->asArray();
	if(isset($userData['id']) && $userData['id']!=''){
		//session_destroy();
		$newadd=array(
					'username'=>isset($userData['id'])?$userData['id']:'',
					'role_id'=>2,
					'source'=>'facebook',
					'name'=>isset($userData['first_name'])?$userData['first_name']:'',
					'email_id'=>isset($userData['email'])?$userData['email']:'',
					'created_at'=>date('Y-m-d H:i:s'),
					);
					
					//echo '<pre>';print_r($newadd);exit;
					$check=$this->User_model->check_user_exists($userData['id'],'facebook');
					//echo $this->db->last_query();
					if(count($check)>0){
							$user_details=$this->User_model->get_user_details($check['cust_id']);
								if($user_details['mobile_verified']==1){
									$this->session->set_userdata('vuebin_user',$user_details);
									redirect($this->agent->referrer());
								}else{
									$this->session->set_userdata('vuebin_user',$user_details);
									redirect('user/verification');
								}	
					}else{
						$save=$this->User_model->save_new_user($newadd);
						//echo $this->db->last_query();exit;
						if(count($save)>0){
							$user_details=$this->User_model->get_user_details($save);
								if($user_details['mobile_verified']==1){
									$this->session->set_userdata('vuebin_user',$user_details);
									redirect($this->agent->referrer());
								}else{
									$this->session->set_userdata('vuebin_user',$user_details);
									redirect('user/verification');
								}	
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('');
						}	
					}
		
		
	}else{
		$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
		redirect('');
	}
	
	//echo '<pre>';print_r($userData);exit;
	}
	
	
	

}

/* End of file auth_oa2.php */
/* Location: ./application/controllers/auth_oa2.php */