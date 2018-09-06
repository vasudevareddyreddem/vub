<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Admin_panel.php');
class Country extends Admin_panel {

	public function __construct() 
	{
		parent::__construct();	
		
		$this->load->model('Country_model');
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
	public  function addpost(){
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$post=$this->input->post();
				$check_exits=$this->Country_model->check_country_exists($post['country_name']);
				if(count($check_exits)>0){
					$this->session->set_flashdata('error',"Country already exists. Please use another country name");
					redirect('country');
				}
				$add=array(
				'country_name'=>isset($post['country_name'])?$post['country_name']:'',
				'country_code'=>isset($post['country_code'])?$post['country_code']:'',
				'status'=>1,
				'create_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>$login_details['cust_id']
				);
				$save_country=$this->Country_model->save_country($add);
				if(count($save_country)>0){
					$this->session->set_flashdata('success','Country successfully added');
					redirect('country/lists');
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('country');
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
	public function edit()
	{	
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$c_id=base64_decode($this->uri->segment(3));
				$data['country_details']=$this->Country_model->get_country_details($c_id);
				
				$this->load->view('admin/country/country-edit',$data);
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
	public  function editpost(){
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$post=$this->input->post();
				
				//echo '<pre>';print_r($post);exit;
				$country_details=$this->Country_model->get_country_details($post['country_id']);
				if($country_details['country_name']!=$post['country_name']){
					$check_exits=$this->Country_model->check_country_exists($post['country_name']);
					if(count($check_exits)>0){
						$this->session->set_flashdata('error',"Country already exists. Please use another Country name");
						redirect('country/edit/'.base64_encode($post['country_id']));
					}
				}
				$update=array(
				'country_name'=>isset($post['country_name'])?$post['country_name']:'',
				'country_code'=>isset($post['country_code'])?$post['country_code']:'',
				'updated_at'=>date('Y-m-d H:i:s'),
				);
				$update_country=$this->Country_model->update_country_details($post['country_id'],$update);
				if(count($update_country)>0){
					$this->session->set_flashdata('success','Country successfully updated');
					redirect('country/lists');
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('country/edit/'.base64_encode($post['country_id']));
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
	public  function lists(){
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$data['countries_list']=$this->Country_model->get_all_countries_list($login_details['cust_id']);
				
				//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/country/country-list',$data);
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
	public  function status(){
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$admindetails=$this->session->userdata('vuebin_user');
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
					$update=$this->Country_model->update_country_details($c_id,$update_data);
						if(count($update)>0){
							if($status==1){
							$this->session->set_flashdata('success',"Country successfully deactivated");
							}else{
							$this->session->set_flashdata('success',"Country successfully activated");
							}
							redirect('country/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('country/lists');
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
	public  function deletes(){
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$admindetails=$this->session->userdata('vuebin_user');
			$c_id=base64_decode($this->uri->segment(3));
			
			$update_data=array(
					'status'=>2,
					'updated_at'=>date('Y-m-d H:i:s'),
					);
					$update=$this->Country_model->update_country_details($c_id,$update_data);
						if(count($update)>0){
							$this->session->set_flashdata('success',"Country successfully deleted");
							
							redirect('country/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('country/lists');
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
