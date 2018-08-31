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
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			//echo '<pre>';print_r($login_details);exit;
			if($login_details['role_id']==1){
				
				$data['total_institues']=$this->Admin_model->get_total_institue_list_count();
				$data['total_video']=$this->Admin_model->get_total_video_list_count();
				$data['total_user']=$this->Admin_model->get_total_user_list_count();
				$data['total_course']=$this->Admin_model->get_total_course_list_count();
				$data['total_vendors']=$this->Admin_model->get_total_vendor_list_count();
				$data['total_classification']=$this->Admin_model->get_total_classification_list_count();
				
				//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/dashboard',$data);
				
			}if($login_details['role_id']==2){
				$this->load->view('admin/instituedashboard');
				
			}
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	
	
	
	
}
