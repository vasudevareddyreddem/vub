<?php

class Institute extends  CI_Controller {

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
		$this->load->view('html/header');
		$this->load->view('html/institutes');
		$this->load->view('html/footer');
	}
	public function page()
	{	
		$this->load->view('html/header');
		$this->load->view('html/institute-page');
		$this->load->view('html/footer');
	}
	
}
