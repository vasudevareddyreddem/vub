<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Institute extends CI_Controller {

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
		$this->load->model('Admin_model');
		
	}
	
	public function index()
	{	
		$this->load->view('institute/add-institute');
		$this->load->view('admin/footer');
	}
	
	
	
}
