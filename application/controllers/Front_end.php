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
		$this->load->model('Content_model');
		$header['search_values']=$this->User_model->get_course_or_institues_list('');
		$header['core_values']=$this->User_model->get_course_names_list('');
		$header['location_values']=$this->User_model->get_location_search_list('');
		$header['loc_values']=$this->User_model->get_only_location_search_list('');
		//$location_indivual=$this->User_model->get_location_search_indivisual_list('');
		//$header['location_values']=$location_all;
		//echo '<pre>';print_r($header);exit;
		if($this->session->userdata('vuebin_user'))
		{
			$vuebin_details=$this->session->userdata('vuebin_user');
			$header['user_details']=$this->User_model->get_userdetails($vuebin_details['cust_id']);
			

				
		}else{
			require_once "config.php";
			$redirectURL = "https://shofus.com/fbcallback";
			$permissions = ['email'];
			$header['loginURL']=$helper->getLoginUrl($redirectURL, $permissions);
		}
		$header['active_url']=$this->uri->segment(1);
		$header['active_url_1']=$this->uri->segment(6);
		$page=$this->uri->segment(2);
		$institute=base64_decode($this->uri->segment(3));
		if($page=='page' && $institute!=''){
		$get_institue=$this->User_model->get_institues_name($institute);
		$header['institues_name']=$get_institue['i_name'];
		}
		$this->load->view('html/header',$header);
	}
}
