<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_end.php');

class Courses extends Front_end {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->model('Course_model');
		
	}
	
	public function index()
	{	
		$this->load->view('html/course');
		$this->load->view('admin/footer');
	}
	
}
