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
	public function videos()
	{	
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			if($login_details['role_id']==2){
				
				//echo '<pre>';print_r($data);exit;
				$this->load->view('institute/videos');
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
	public function details()
	{	
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			if($login_details['role_id']==2){
				$data['institute_details']=$this->Institute_model->get_institute_details($login_details['cust_id']);
			
				//echo '<pre>';print_r($data);exit;
				$this->load->view('institute/details',$data);
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
			if($login_details['role_id']==2){
				$data['institute_details']=$this->Institute_model->get_institute_details($login_details['cust_id']);
				$data['countries_list']=$this->Institute_model->get_countries_list();
				$data['city_list']=$this->Institute_model->get_cities_list($data['institute_details']['country_name']);
				$data['location_list']=$this->Institute_model->get_locations_list($data['institute_details']['i_city']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('institute/edit-institute',$data);
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
			if($login_details['role_id']==2){
				
				$post=$this->input->post();
				if(isset($_FILES['i_logo']['name']) && $_FILES['i_logo']['name']!=''){
					$pic=$_FILES['i_logo']['name'];
					$picname = str_replace(" ", "", $pic);
					$imagename=microtime().basename($picname);
					$imgname = str_replace(" ", "", $imagename);
					move_uploaded_file($_FILES['i_logo']['tmp_name'], 'assets/institute_logo/'.$imgname);
				}
				$add=array(
				'i_name'=>isset($post['i_name'])?$post['i_name']:'',
				'i_logo'=>isset($imgname)?$imgname:'',
				'i_about'=>isset($post['i_about'])?$post['i_about']:'',
				'i_website'=>isset($post['i_website'])?$post['i_website']:'',
				'country_name'=>isset($post['country_name'])?$post['country_name']:'',
				'i_city'=>isset($post['i_city'])?$post['i_city']:'',
				'location_name'=>isset($post['location_name'])?$post['location_name']:'',
				'i_address'=>isset($post['i_address'])?$post['i_address']:'',
				'i_p_phone'=>isset($post['i_p_phone'])?$post['i_p_phone']:'',
				'i_s_phone'=>isset($post['i_s_phone'])?$post['i_s_phone']:'',
				'i_email_id'=>isset($post['i_email_id'])?$post['i_email_id']:'',
				'i_founder'=>isset($post['i_founder'])?$post['i_founder']:'',
				'i_f_about'=>isset($post['i_f_about'])?$post['i_f_about']:'',
				'i_contact_person'=>isset($post['i_contact_person'])?$post['i_contact_person']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>$login_details['cust_id'],
				'completed'=>1,
				);
				$save=$this->Institute_model->save_institute($add);
				if(count($save)>0){
					$this->session->set_flashdata('success','Institute successfully Added');
					redirect('institute/details');
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('institute/index/');
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
			if($login_details['role_id']==2){
				
				$post=$this->input->post();
				$institute_details=$this->Institute_model->get_institute_details($post['i_id']);

				//echo '<pre>';print_r($post);exit;
				if(isset($_FILES['i_logo']['name']) && $_FILES['i_logo']['name']!=''){
					unlink('assets/institute_logo/'.$institute_details['i_logo']);
					$pic=$_FILES['i_logo']['name'];
					$picname = str_replace(" ", "", $pic);
					$imagename=microtime().basename($picname);
					$imgname = str_replace(" ", "", $imagename);
					move_uploaded_file($_FILES['i_logo']['tmp_name'], 'assets/institute_logo/'.$imgname);
				}else{
					$imgname=$institute_details['i_logo'];
				}
				$update=array(
				'i_name'=>isset($post['i_name'])?$post['i_name']:'',
				'i_logo'=>isset($imgname)?$imgname:'',
				'i_about'=>isset($post['i_about'])?$post['i_about']:'',
				'i_website'=>isset($post['i_website'])?$post['i_website']:'',
				'country_name'=>isset($post['country_name'])?$post['country_name']:'',
				'i_city'=>isset($post['i_city'])?$post['i_city']:'',
				'location_name'=>isset($post['location_name'])?$post['location_name']:'',
				'i_address'=>isset($post['i_address'])?$post['i_address']:'',
				'i_p_phone'=>isset($post['i_p_phone'])?$post['i_p_phone']:'',
				'i_s_phone'=>isset($post['i_s_phone'])?$post['i_s_phone']:'',
				'i_email_id'=>isset($post['i_email_id'])?$post['i_email_id']:'',
				'i_founder'=>isset($post['i_founder'])?$post['i_founder']:'',
				'i_f_about'=>isset($post['i_f_about'])?$post['i_f_about']:'',
				'i_contact_person'=>isset($post['i_contact_person'])?$post['i_contact_person']:'',
				'updated_at'=>date('Y-m-d H:i:s'),
				);
				$update=$this->Institute_model->update_institute_details($post['i_id'],$update);
				if(count($update)>0){
					$this->session->set_flashdata('success','Institute details successfully updated');
					redirect('institute/details');
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('institute/edit/');
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
	public  function get_location_lists(){
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
				if($login_details['role_id']==2){
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
