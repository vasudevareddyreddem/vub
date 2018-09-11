<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Admin_panel.php');
class Content extends Admin_panel {

	public function __construct() 
	{
		parent::__construct();	
		
		$this->load->model('Content_model');
	}
	public function index()
	{	
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$this->load->view('admin/country/country-add');
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
	public function footer()
	{	
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$data['details']=$this->Content_model->get_footer_content(1);
				$this->load->view('admin/content/footer-add',$data);
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
	public function addfooterpost()
	{	
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$post=$this->input->post();
				$add=array(
				'footer'=>isset($post['footer_content'])?$post['footer_content']:'',
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>$login_details['cust_id'],
				);
				$save=$this->Content_model->update_footer_content(1,$add);
				if(count($save)>0){
				$this->session->set_flashdata('success','Footer content successfully updated');
					redirect('content/footer');
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('content/footer');
					
				}
				
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
