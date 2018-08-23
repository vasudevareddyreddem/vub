<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fbcallback extends CI_Controller
{
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
	public function index(){
		
		require_once "Facebook/autoload.php";
		$FB = new \Facebook\Facebook([
			'app_id' => '2226857630661954',
			'app_secret' => '641a60c333df5ee6ae8a19410277171e',
			'default_graph_version' => 'v2.10',
			]);
		$helper = $FB->getRedirectLoginHelper();
		try {
		$accessToken = $helper->getAccessToken(); //short lived token

	}
	catch(\Facebook\Exceptions\FacebookResponseException $e) {
		echo "Response Exception :" . $e->getMessage();
		exit();
	}
	catch(\Facebook\Exceptions\FacebookSDKException $e) {
		echo "SDK Exception :" . $e->getMessage();
		exit();
	}

	if (!$accessToken) {
		header('Location: login.php');
		exit();
	}

	$oAuth2Client = $FB->getOAuth2Client();
	if (!$accessToken->isLongLived()) 
		$accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);

	$response = $FB->get("me?fields=id,first_name,last_name,email,picture.type(large)", $accessToken);

	$userData = $response->getGraphNode()->asArray();
	
	echo '<pre>';print_r($userData);exit;
	}
	

}

/* End of file auth_oa2.php */
/* Location: ./application/controllers/auth_oa2.php */