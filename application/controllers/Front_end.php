<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_end extends CI_Controller {

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
		
		if($this->session->userdata('vuebin_user'))
		{
			$vuebin_details=$this->session->userdata('vuebin_user');
			$header['user_details']=$this->User_model->get_userdetails($vuebin_details['cust_id']);
			//echo '<pre>';print_r($header);exit;			
		}else{
			require_once "config.php";
			$redirectURL = "https://shofus.com/fbcallback";
			$permissions = ['email'];
			$header['loginURL']=$helper->getLoginUrl($redirectURL, $permissions);
		}
		$this->load->view('html/header',$header);
	}
}
