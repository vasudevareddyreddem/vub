<?php

class Share extends CI_Controller {

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
		$this->load->model('Institute_model');		
	}
	public function index()
	{	
		
		$data['home_page_video']=$this->User_model->get_home_page_video();
		//echo '<pre>';print_r($header);exit; 
		$this->load->view('html/index',$data);
		$this->load->view('html/footer');
	}
	public function lshares(){
		
		
		$i_id=base64_decode($this->uri->segment(3));
		$data['details']=$this->Institute_model->get_institue_details($i_id);
		//echo '<pre>';print_r($data);exit;
		$this->load->view('link',$data);
		//exit;
	}
	
	
	
	
}
