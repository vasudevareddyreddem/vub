<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Admin_panel.php');
class Dashboard extends Admin_panel {

	public function __construct() 
	{
		parent::__construct();	
		
	}
	public function index()
	{	
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			//echo '<pre>';print_r($login_details);exit;
			if($login_details['role_id']==1){
				$this->load->view('admin/dashboard');
				
			}if($login_details['role_id']==2){
				$this->load->view('admin/dashboard');
				
			}
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	public  function logout(){
		$admindetails=$this->session->userdata('user_details');
		$userinfo = $this->session->userdata('user_details');
        $this->session->unset_userdata($userinfo);
		$this->session->sess_destroy('user_details');
		$this->session->unset_userdata('user_details');
        redirect('admin');
	}
	
	
	
}
