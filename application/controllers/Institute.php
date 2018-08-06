<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Admin_panel.php');

class Institute extends Admin_panel {

	public function __construct() 
	{
		parent::__construct();	
		
		
	}
	
	public function index()
	{	
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			if($login_details['role_id']==2){
				$this->load->view('institute/add-institute');
				$this->load->view('admin/footer');
			}else{
					$this->session->set_flashdata('error',"you don't have permission to access");
					redirect('dashboard');
			}
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	
	
	
}
