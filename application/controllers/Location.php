<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Admin_panel.php');
class Location extends Admin_panel {

	public function __construct() 
	{
		parent::__construct();	
		
		$this->load->model('Location_model');
	}
	public function index()
	{	
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$city_id=base64_decode($this->uri->segment(3));
				if($city_id==''){
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('city/index/'.base64_encode($city_id));
				}
				$data['city_id']=$city_id;
				$data['country_id']=$this->uri->segment(4);
				$data['location_list']=$this->Location_model->get_all_locations_list($city_id,$login_details['cust_id']);
				
				//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/country/location-list',$data);
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
				
				//echo '<pre>';print_r($post);exit;
				$check_exits=$this->Location_model->check_location_exists($post['city_id'],$post['location_name']);
				if(count($check_exits)>0){
					$this->session->set_flashdata('error',"Location already exists. Please use another Location name");
					redirect('location/add/'.base64_encode($post['city_id']));
				}
				$add=array(
				'city_id'=>isset($post['city_id'])?$post['city_id']:'',
				'location_name'=>isset($post['location_name'])?$post['location_name']:'',
				'l_status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>$login_details['cust_id']
				);
				$save_location=$this->Location_model->save_location($add);
				if(count($save_location)>0){
					$this->session->set_flashdata('success','Location successfully Added');
					redirect('location/index/'.base64_encode($post['city_id']).'/'.$post['country_id']);
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('location/index/'.base64_encode($post['city_id']).'/'.$post['country_id']);
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
	public  function editpost(){
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$post=$this->input->post();
				
				//echo '<pre>';print_r($post);exit;
				$location_details=$this->Location_model->get_location_details($post['location_id']);
				if($location_details['location_name']!=$post['location_name']){
				$check_exits=$this->Location_model->check_location_exists($post['city_id'],$post['location_name']);
					if(count($check_exits)>0){
						$this->session->set_flashdata('error',"city already exists. Please use another city name");
						redirect('location/edit/'.base64_encode($post['location_id']).'/'.$post['country_id']);
					}
				}
				$update=array(
				'location_name'=>isset($post['location_name'])?$post['location_name']:'',
				'updated_at'=>date('Y-m-d H:i:s'),
				);
				$update_location=$this->Location_model->update_location_details($post['location_id'],$update);
				if(count($update_location)>0){
					$this->session->set_flashdata('success','location successfully Updated');
					redirect('location/index/'.base64_encode($post['city_id']).'/'.$post['country_id']);
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('location/edit/'.base64_encode($post['location_id']).'/'.$post['country_id']);
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
	public  function add(){
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$c_id=base64_decode($this->uri->segment(3));
				$data['country_id']=$this->uri->segment(4);
				$data['city_details']=$this->Location_model->get_city_details($c_id);
				//echo $this->db->last_query();
				//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/country/location-add',$data);
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
	public  function edit(){
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$l_id=base64_decode($this->uri->segment(3));
				$data['country_id']=$this->uri->segment(4);
				$data['location_details']=$this->Location_model->get_location_details($l_id);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/country/location-edit',$data);
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
			$l_id=base64_decode($this->uri->segment(3));
			$status=base64_decode($this->uri->segment(4));
			$city_id=$this->uri->segment(5);
			$country_id=$this->uri->segment(6);
			if($status==1){
				$stat=0;
			}else{
				$stat=1;
			}
			$update_data=array(
					'l_status'=>$stat,
					'updated_at'=>date('Y-m-d H:i:s'),
					);
					$update=$this->Location_model->update_location_details($l_id,$update_data);
						if(count($update)>0){
							if($status==1){
							$this->session->set_flashdata('success',"Location successfully deactivated");
							}else{
							$this->session->set_flashdata('success',"Location successfully activated");
							}
							redirect('location/index/'.$city_id.'/'.$country_id);
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('location/index/'.$city_id.'/'.$country_id);
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
			$l_id=base64_decode($this->uri->segment(3));
			$city_id=$this->uri->segment(4);
			$country_id=$this->uri->segment(5);
			
			$update_data=array(
					'l_status'=>2,
					'updated_at'=>date('Y-m-d H:i:s'),
					);
					$update=$this->Location_model->update_location_details($l_id,$update_data);
						if(count($update)>0){
							if($status==1){
							$this->session->set_flashdata('success',"Location successfully deactivated");
							}else{
							$this->session->set_flashdata('success',"Location successfully activated");
							}
							redirect('location/index/'.$city_id.'/'.$country_id);
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('location/index/'.$city_id.'/'.$country_id);
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
