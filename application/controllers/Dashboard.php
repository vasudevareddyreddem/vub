<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Admin_panel.php');
class Dashboard extends Admin_panel {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Institute_model');		
		
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
				$institue_id=$this->Institute_model->get_institue_id($login_details['cust_id']);
				$data['total_video']=$this->Admin_model->get_institue_total_video_list_count($institue_id['i_id']);
				$data['total_leads']=$this->Admin_model->get_institue_total_user_list_count($institue_id['i_id']);
				$data['total_course']=$this->Admin_model->get_institue_total_course_list_count($institue_id['i_id']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/instituedashboard',$data);
				
			}
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	public  function get_date_wise_dashboard(){
		$post=$this->input->post();
		$to_originalDate = $post['todate'];
		$to_newDate = date("Y-m-d", strtotime($to_originalDate));
		$from_originalDate = $post['fromdate'];
		$from_newDate = date("Y-m-d", strtotime($from_originalDate));
		
		
		$data['total_institues']=$this->Admin_model->get_range_of_total_institue_list_count($to_newDate,$from_newDate);
		$data['total_video']=$this->Admin_model->get_range_of_total_video_list_count($to_newDate,$from_newDate);
		$data['total_user']=$this->Admin_model->get_range_of_total_user_list_count($to_newDate,$from_newDate);
		$data['total_course']=$this->Admin_model->get_range_of_total_course_list_count($to_newDate,$from_newDate);
		$data['total_vendors']=$this->Admin_model->get_range_of_total_vendor_list_count($to_newDate,$from_newDate);
		$data['total_classification']=$this->Admin_model->get_range_of_total_classification_list_count($to_newDate,$from_newDate);
		$this->load->view('admin/filter_dashboard',$data);
		
		
	}
	
	
	
	
}
