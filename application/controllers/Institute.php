<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Admin_panel.php');

class Institute extends Admin_panel {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->model('Institute_model');
		
	}
	
	public function index()
	{	
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			if($login_details['role_id']==2){
				
				$data['countries_list']=$this->Institute_model->get_countries_list();
				//echo '<pre>';print_r($data);exit;
				$this->load->view('institute/add-institute',$data);
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
	
	public  function get_city_lists(){
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
				if($login_details['role_id']==2){
					$post=$this->input->post();
					$city_list=$this->Institute_model->get_cities_list($post['country_id']);
					//echo'<pre>';print_r($student_list);exit;
					if(count($city_list)>0){
						$data['msg']=1;
						$data['list']=$city_list;
						echo json_encode($data);exit;	
					}else{
						$data['msg']=0;
						echo json_encode($data);exit;
					}
					
			}else{
				$this->session->set_flashdata('error',"you don't have permission to access");
				redirect('home');
			}
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('home');
		}
	}
	
	
	
}
