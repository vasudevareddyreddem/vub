<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Admin_panel.php');

class Institutes extends Admin_panel {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->model('Institute_model');
		$this->load->model('Video_model');
		
	}
	
	
	
	
	
	
	
	public  function get_city_lists(){
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
				if($login_details['role_id']==1){
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
	public  function get_location_lists(){
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
				if($login_details['role_id']==1){
					$post=$this->input->post();
					$city_list=$this->Institute_model->get_locations_list($post['city_id']);
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
