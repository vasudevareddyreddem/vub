<?php

class Institutes extends  CI_Controller {

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
		$this->load->model('Institute_model');
	}
	public function index()
	{	
		$this->load->view('html/header');
		$data['institute_list']=$this->Institute_model->get_institues_list_for_front_end();
		$data['lastest_institute_list']=$this->Institute_model->get_lastest_institute_list();
		
		//echo '<pre>';print_r($data);exit;
		$this->load->view('html/institutes',$data);
		$this->load->view('html/footer');
	}
	public function page()
	{	
		$this->load->view('html/header');
		$this->load->view('html/institute-page');
		$this->load->view('html/footer');
	}
	
}
