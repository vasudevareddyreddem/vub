<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Admin_panel.php');
class City extends Admin_panel {

	public function __construct() 
	{
		parent::__construct();	
		
		$this->load->model('city_model');
	}
	public function index()
	{	
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			if($login_details['role_id']==1){
				$c_id=base64_decode($this->uri->segment(3));
				if($c_id==''){
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('country/lists');
				}
				$data['country_id']=$c_id;
				$data['citys_list']=$this->city_model->get_all_citys_list($c_id,$login_details['cust_id']);
				
				//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/country/city-list',$data);
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
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			if($login_details['role_id']==1){
				$post=$this->input->post();
				
				//echo '<pre>';print_r($post);exit;
				$check_exits=$this->city_model->check_city_exists($post['country_id'],$post['city_name']);
				if(count($check_exits)>0){
					$this->session->set_flashdata('error',"city already exists. Please use another city name");
					redirect('city/add');
				}
				$add=array(
				'c_id'=>isset($post['country_id'])?$post['country_id']:'',
				'city_name'=>isset($post['city_name'])?$post['city_name']:'',
				'c_status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>$login_details['cust_id']
				);
				$save_city=$this->city_model->save_city($add);
				if(count($save_city)>0){
					$this->session->set_flashdata('success','city successfully Added');
					redirect('city/index/'.base64_encode($post['country_id']));
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('city/add');
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
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			if($login_details['role_id']==1){
				$post=$this->input->post();
				
				//echo '<pre>';print_r($post);exit;
				$city_details=$this->city_model->get_city_details($post['city_id']);
				if($city_details['city_name']!=$post['city_name']){
					$check_exits=$this->city_model->check_city_exists($post['country_id'],$post['city_name']);
					if(count($check_exits)>0){
						$this->session->set_flashdata('error',"city already exists. Please use another city name");
						redirect('city/edit/'.base64_encode($post['city_id']));
					}
				}
				$update=array(
				'city_name'=>isset($post['city_name'])?$post['city_name']:'',
				'updated_at'=>date('Y-m-d H:i:s'),
				);
				$update_city=$this->city_model->update_city_details($post['city_id'],$update);
				if(count($update_city)>0){
					$this->session->set_flashdata('success','city successfully Added');
					redirect('city/index/'.base64_encode($post['country_id']));
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('city/edit/'.base64_encode($post['city_id']));
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
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			if($login_details['role_id']==1){
				$c_id=base64_decode($this->uri->segment(3));
				$data['country_details']=$this->city_model->get_country_details($c_id);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/country/city-add',$data);
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
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			if($login_details['role_id']==1){
				$s_id=base64_decode($this->uri->segment(3));
				$data['city_details']=$this->city_model->get_city_details($s_id);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/country/city-edit',$data);
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
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			if($login_details['role_id']==1){
				$admindetails=$this->session->userdata('user_details');
			$s_id=base64_decode($this->uri->segment(3));
			$status=base64_decode($this->uri->segment(4));
			$c_id=$this->uri->segment(5);
			if($status==1){
				$stat=0;
			}else{
				$stat=1;
			}
			$update_data=array(
					'c_status'=>$stat,
					'updated_at'=>date('Y-m-d H:i:s'),
					);
					$update=$this->city_model->update_city_details($s_id,$update_data);
						if(count($update)>0){
							if($status==1){
							$this->session->set_flashdata('success',"city successfully deactivated");
							}else{
							$this->session->set_flashdata('success',"city successfully activated");
							}
							redirect('city/index/'.$c_id);
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('city/index/'.$c_id);
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
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			if($login_details['role_id']==1){
				$admindetails=$this->session->userdata('user_details');
			$s_id=base64_decode($this->uri->segment(3));
			$c_id=$this->uri->segment(4);
			
			$update_data=array(
					'c_status'=>2,
					'updated_at'=>date('Y-m-d H:i:s'),
					);
					$update=$this->city_model->update_city_details($s_id,$update_data);
						if(count($update)>0){
							if($status==1){
							$this->session->set_flashdata('success',"city successfully deactivated");
							}else{
							$this->session->set_flashdata('success',"city successfully activated");
							}
							redirect('city/index/'.$c_id);
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
								redirect('city/index/'.$c_id);
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
