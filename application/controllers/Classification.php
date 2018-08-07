<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Admin_panel.php');

class Classification extends Admin_panel {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->model('Classification_model');
		
	}
	
	public function index()
	{	
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			if($login_details['role_id']==1){
				
				//echo '<pre>';print_r($data);exit;
				$this->load->view('classification/add');
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
	
	
	
	public function lists()
	{	
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			if($login_details['role_id']==1){
				$data['classification_list']=$this->Classification_model->get_classification_list($login_details['cust_id']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('classification/list',$data);
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
	public function edit()
	{	
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			if($login_details['role_id']==1){
				$c_id=base64_decode($this->uri->segment(3));
				$data['class_details']=$this->Classification_model->get_classification_details($c_id);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('classification/edit',$data);
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

	public function addpost()
	{	
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			if($login_details['role_id']==1){
				$post=$this->input->post();
				//echo '<pre>';print_r($post);exit;
				$check=$this->Classification_model->check_exits_ornot($post['c_name']);
				if(count($check)>0){
					$this->session->set_flashdata('error','Classification already exists. Pelase  try  another Classification');
					redirect('classification');
				}
				$add=array(
				'c_name'=>isset($post['c_name'])?$post['c_name']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>$login_details['cust_id'],
				);
				$save=$this->Classification_model->save_classification($add);
				if(count($save)>0){
					$this->session->set_flashdata('success','Classification successfully Added');
					redirect('classification/lists');
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('classification');
				}
				//echo '<pre>';print_r($post);exit;
				
			}else{
					$this->session->set_flashdata('error',"you don't have permission to access");
					redirect('dashboard');
			}
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	public function editpost()
	{	
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			if($login_details['role_id']==1){
				$post=$this->input->post();
				//echo '<pre>';print_r($post);exit;
				$details=$this->Classification_model->get_classification_details($post['c_id']);
				if($details['c_name']!=$post['c_name']){
					$check=$this->Classification_model->check_exits_ornot($post['c_name']);
					if(count($check)>0){
						$this->session->set_flashdata('error','Classification already exists. Pelase  try  another Classification');
						redirect('classification/edit/'.base64_encode($post['c_id']));

					}
				}
				$update_data=array(
				'c_name'=>isset($post['c_name'])?$post['c_name']:'',
				'updated_at'=>date('Y-m-d H:i:s'),
				);
				$update=$this->Classification_model->update_classification_details($post['c_id'],$update_data);
				if(count($update)>0){
					$this->session->set_flashdata('success','Classification successfully details Updated');
					redirect('classification/lists');
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('classification/edit/'.base64_encode($post['c_id']));
				}
				//echo '<pre>';print_r($post);exit;
				
			}else{
					$this->session->set_flashdata('error',"you don't have permission to access");
					redirect('dashboard');
			}
		}else{
			$this->session->set_flashdata('error',"you don't have permission to access");
			redirect('admin');
		}
	}
	
	public  function status(){
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			if($login_details['role_id']==1){
			$admindetails=$this->session->userdata('user_details');
			$c_id=base64_decode($this->uri->segment(3));
			$status=base64_decode($this->uri->segment(4));
			if($status==1){
				$stat=0;
			}else{
				$stat=1;
			}
			$update_data=array(
					'status'=>$stat,
					'updated_at'=>date('Y-m-d H:i:s'),
					);
				$update=$this->Classification_model->update_classification_details($c_id,$update_data);
						if(count($update)>0){
							if($status==1){
							$this->session->set_flashdata('success',"Classification successfully deactivated");
							}else{
							$this->session->set_flashdata('success',"Classification successfully activated");
							}
							redirect('classification/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('classification/lists');
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
	public  function delete(){
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			if($login_details['role_id']==1){
				$admindetails=$this->session->userdata('user_details');
				$c_id=base64_decode($this->uri->segment(3));
			
			$update_data=array(
					'status'=>2,
					'updated_at'=>date('Y-m-d H:i:s'),
					);
				$update=$this->Classification_model->update_classification_details($c_id,$update_data);
						if(count($update)>0){
							$this->session->set_flashdata('success',"Classification successfully deleted");

							redirect('classification/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('classification/lists');
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
