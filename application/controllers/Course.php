<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Admin_panel.php');

class Course extends Admin_panel {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->model('Course_model');
		
	}
	
	public function index()
	{	
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			if($login_details['role_id']==1){
				
				$data['course_type_list']=$this->Course_model->get_course_type_Name_list();
				//echo '<pre>';print_r($data);exit;
				$this->load->view('course/add',$data);
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
				$data['course_list']=$this->Course_model->get_course_list($login_details['cust_id']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('course/list',$data);
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
				$data['course_details']=$this->Course_model->get_full_course_details($c_id);
				$data['course_type_list']=$this->Course_model->get_course_type_Name_list();

				//echo '<pre>';print_r($data);exit;
				$this->load->view('course/edit',$data);
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
				$check=$this->Course_model->check_course_exits_ornot($post['c_name'],$post['c_type']);
				//echo $this->db->last_query();
				if(count($check)>0){
					$this->session->set_flashdata('error','Course already exists. Pelase try another name');
					redirect('course/index');
				}
				//echo '<pre>';print_r($post);exit;
				if(isset($_FILES['c_logo']['name']) && $_FILES['c_logo']['name']!=''){
					$pic=$_FILES['c_logo']['name'];
					$picname = str_replace(" ", "", $pic);
					$imagename=microtime().basename($picname);
					$imgname = str_replace(" ", "", $imagename);
					move_uploaded_file($_FILES['c_logo']['tmp_name'], 'assets/course/'.$imgname);
				}
				$add=array(
				'c_name'=>isset($post['c_name'])?$post['c_name']:'',
				'c_logo'=>isset($imgname)?$imgname:'',
				'c_type'=>isset($post['c_type'])?$post['c_type']:'',
				'c_profile_1'=>isset($post['c_profile_1'])?$post['c_profile_1']:'',
				'c_profile_2'=>isset($post['c_profile_2'])?$post['c_profile_2']:'',
				'c_profile_3'=>isset($post['c_profile_3'])?$post['c_profile_3']:'',
				'c_profile_4'=>isset($post['c_profile_4'])?$post['c_profile_4']:'',
				'c_profile_5'=>isset($post['c_profile_5'])?$post['c_profile_5']:'',
				'c_profile_6'=>isset($post['c_profile_6'])?$post['c_profile_6']:'',
				'c_profile_7'=>isset($post['c_profile_7'])?$post['c_profile_7']:'',
				'c_profile_8'=>isset($post['c_profile_8'])?$post['c_profile_8']:'',
				'c_profile_9'=>isset($post['c_profile_9'])?$post['c_profile_9']:'',
				'c_profile_10'=>isset($post['c_profile_10'])?$post['c_profile_10']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>$login_details['cust_id'],
				);
				$save=$this->Course_model->save_course($add);
				if(count($save)>0){
					$this->session->set_flashdata('success','Course successfully Added');
					redirect('course/lists');
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('course/index');
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
				$course_details=$this->Course_model->get_full_course_details($post['c_id']);
				if($course_details['c_name']!=$post['c_name'] || $course_details['c_type']!=$post['c_type']){
					$check=$this->Course_model->check_course_exits_ornot($post['c_name'],$post['c_type']);
					//echo $this->db->last_query();
					if(count($check)>0){
						$this->session->set_flashdata('error','Course already exists. Pelase try another name');
						redirect('course/edit/'.base64_encode($post['c_id']));
					}
				}
				//echo '<pre>';print_r($post);exit;
				if(isset($_FILES['c_logo']['name']) && $_FILES['c_logo']['name']!=''){
					unlink('assets/course/'.$course_details['c_logo']);
					$pic=$_FILES['c_logo']['name'];
					$picname = str_replace(" ", "", $pic);
					$imagename=microtime().basename($picname);
					$imgname = str_replace(" ", "", $imagename);
					move_uploaded_file($_FILES['c_logo']['tmp_name'], 'assets/course/'.$imgname);
				}else{
					$imgname=$course_details['c_logo'];
				}
				$update_data=array(
				'c_name'=>isset($post['c_name'])?$post['c_name']:'',
				'c_logo'=>isset($imgname)?$imgname:'',
				'c_type'=>isset($post['c_type'])?$post['c_type']:'',
				'c_profile_1'=>isset($post['c_profile_1'])?$post['c_profile_1']:'',
				'c_profile_2'=>isset($post['c_profile_2'])?$post['c_profile_2']:'',
				'c_profile_3'=>isset($post['c_profile_3'])?$post['c_profile_3']:'',
				'c_profile_4'=>isset($post['c_profile_4'])?$post['c_profile_4']:'',
				'c_profile_5'=>isset($post['c_profile_5'])?$post['c_profile_5']:'',
				'c_profile_6'=>isset($post['c_profile_6'])?$post['c_profile_6']:'',
				'c_profile_7'=>isset($post['c_profile_7'])?$post['c_profile_7']:'',
				'c_profile_8'=>isset($post['c_profile_8'])?$post['c_profile_8']:'',
				'c_profile_9'=>isset($post['c_profile_9'])?$post['c_profile_9']:'',
				'c_profile_10'=>isset($post['c_profile_10'])?$post['c_profile_10']:'',
				'updated_at'=>date('Y-m-d H:i:s'),
				);
				$update=$this->Course_model->update_course_details($post['c_id'],$update_data);

				if(count($update)>0){
					$this->session->set_flashdata('success','Course successfully updated');
					redirect('course/lists');
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('course/edit/'.base64_encode($post['c_id']));
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
	public function addtype()
	{	
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			if($login_details['role_id']==1){
				
				//echo '<pre>';print_r($data);exit;
				$this->load->view('course/addcourse_type');
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
	
	
	public function typelists()
	{	
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			if($login_details['role_id']==1){
				$data['course_type_list']=$this->Course_model->get_course_type_list($login_details['cust_id']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('course/course_tpe_list',$data);
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
	public function typeedit()
	{	
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			if($login_details['role_id']==1){
				$c_id=base64_decode($this->uri->segment(3));
				$data['cpurse_type_details']=$this->Course_model->get_course_details($c_id);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('course/course_tpe_edit',$data);
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
	public function addcoursetype_post()
	{	
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			if($login_details['role_id']==1){
				$post=$this->input->post();
				//echo '<pre>';print_r($post);exit;
				$check=$this->Course_model->check_exits_ornot($post['course_name']);
				if(count($check)>0){
					$this->session->set_flashdata('error','Course type Name already exists. Pelase  try  another name');
					redirect('course/addtype');
				}
				$add=array(
				'course_type'=>isset($post['course_name'])?$post['course_name']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>$login_details['cust_id'],
				);
				$save=$this->Course_model->save_course_type($add);
				if(count($save)>0){
					$this->session->set_flashdata('success','Course type successfully Added');
					redirect('course/typelists');
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('course/addtype/');
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
	public function editcoursetype_post()
	{	
		if($this->session->userdata('user_details'))
		{
			$login_details=$this->session->userdata('user_details');
			if($login_details['role_id']==1){
				$post=$this->input->post();
				//echo '<pre>';print_r($post);exit;
				$details=$this->Course_model->get_course_details($post['c_t_l']);
				if($details['course_type']!=$post['course_name']){
					$check=$this->Course_model->check_exits_ornot($post['course_name']);
					if(count($check)>0){
						$this->session->set_flashdata('error','Course Type already exists. Pelase  try  another name');
						redirect('course/typeedit/'.base64_encode($post['c_t_l']));

					}
				}
				$update_data=array(
				'course_type'=>isset($post['course_name'])?$post['course_name']:'',
				'updated_at'=>date('Y-m-d H:i:s'),
				);
				$update=$this->Course_model->update_course_type_details($post['c_t_l'],$update_data);
				if(count($update)>0){
					$this->session->set_flashdata('success','Course type successfully details Updated');
					redirect('course/typelists');
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('course/typeedit/'.base64_encode($post['c_t_l']));
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
					$update=$this->Course_model->update_course_details($c_id,$update_data);
						if(count($update)>0){
							if($status==1){
							$this->session->set_flashdata('success',"Course successfully deactivated");
							}else{
							$this->session->set_flashdata('success',"Course successfully activated");
							}
							redirect('course/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('course/lists');
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
	public  function typestatus(){
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
					$update=$this->Course_model->update_course_type_details($c_id,$update_data);
						if(count($update)>0){
							if($status==1){
							$this->session->set_flashdata('success',"Course type successfully deactivated");
							}else{
							$this->session->set_flashdata('success',"Course type successfully activated");
							}
							redirect('course/typelists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('course/typelists');
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
					$course_details=$this->Course_model->get_full_course_details($c_id);
					$update=$this->Course_model->update_course_details($c_id,$update_data);
						if(count($update)>0){
							unlink('assets/course/'.$course_details['c_logo']);
							
							$this->session->set_flashdata('success',"Course successfully deleted");

							redirect('course/lists');
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('course/lists');
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
	public  function typedelete(){
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
					$update=$this->Course_model->update_course_type_details($c_id,$update_data);
						if(count($update)>0){
							$this->session->set_flashdata('success',"Course type successfully deleted");

							redirect('course/typelists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('course/typelists');
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
