<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Admin_panel.php');

class Publish extends Admin_panel {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->model('Publish_model');
		
	}
	
	public function index()
	{	
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			if($login_details['role_id']==1){
				
				$data['course_list']=$this->Publish_model->get_course_list($login_details['cust_id']);
				$data['class_list']=$this->Publish_model->get_classification_list($login_details['cust_id']);
				$data['vendor_list']=$this->Publish_model->get_vendor_list($login_details['cust_id']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('publish/add',$data);
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
				$data['course_list']=$this->Publish_model->get_published_course_list($login_details['cust_id']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('publish/list',$data);
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
				$data['course_details']=$this->Publish_model->get_full_course_details($c_id);
				$data['course_list']=$this->Publish_model->get_course_list($login_details['cust_id']);
				$data['class_list']=$this->Publish_model->get_classification_list($login_details['cust_id']);
				$data['vendor_list']=$this->Publish_model->get_vendor_list($login_details['cust_id']);

				//echo '<pre>';print_r($data);exit;
				$this->load->view('publish/edit',$data);
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
				$update_data=array(
				'v_id'=>isset($post['vendor'])?$post['vendor']:'',
				'classification_id'=>isset($post['c_type'])?$post['c_type']:'',
				'published'=>1,
				'published_status'=>1,
				'updated_at'=>date('Y-m-d H:i:s'),
				);
				$update=$this->Publish_model->update_course_details($post['c_name'],$update_data);
				if(count($update)>0){
					$this->session->set_flashdata('success','Course successfully Published');
					redirect('publish/lists');
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('publish/index');
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
				
				$update_data=array(
				'v_id'=>isset($post['vendor'])?$post['vendor']:'',
				'classification_id'=>isset($post['c_type'])?$post['c_type']:'',
				'published'=>1,
				'published_status'=>1,
				'updated_at'=>date('Y-m-d H:i:s'),
				);
				$update=$this->Publish_model->update_course_details($post['c_name'],$update_data);

				if(count($update)>0){
					$this->session->set_flashdata('success','Course published details successfully updated');
					redirect('publish/lists');
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('publish/edit/'.base64_encode($post['c_id']));
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
					'published_status'=>$stat,
					'updated_at'=>date('Y-m-d H:i:s'),
					);
					$update=$this->Publish_model->update_course_details($c_id,$update_data);
						if(count($update)>0){
							if($status==1){
							$this->session->set_flashdata('success',"Course successfully unpublished");
							}else{
							$this->session->set_flashdata('success',"Course successfully published");
							}
							redirect('publish/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('publish/lists');
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
					'published'=>0,
					'published_status'=>0,
					'updated_at'=>date('Y-m-d H:i:s'),
					);
					$update=$this->Publish_model->update_course_details($c_id,$update_data);
						if(count($update)>0){
							
							$this->session->set_flashdata('success',"Course published successfully deleted");

							redirect('publish/lists');
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('publish/lists');
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
