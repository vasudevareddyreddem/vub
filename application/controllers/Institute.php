<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Admin_panel.php');

class Institute extends Admin_panel {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->model('Institute_model');
		$this->load->model('Video_model');
		
	}
	
	public function index()
	{	
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
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
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
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
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
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
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
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
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
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
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
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
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
				if($login_details['role_id']==2 || $login_details['role_id']==1){
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
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
				if($login_details['role_id']==2 || $login_details['role_id']==1){
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
	
	/* admin side list */
	public function admin_add()
	{	
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				
				$data['countries_list']=$this->Institute_model->get_countries_list();
				//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/add-institute',$data);
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
	public function admin_lists()
	{	
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$data['institutes_list']=$this->Institute_model->get_all_institute_list();
			
				//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/institutes-list',$data);
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
	public function admin_edit()
	{	
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$i_id=base64_decode($this->uri->segment(3));
				$data['institute_details']=$this->Institute_model->get_all_institute_details($i_id);
				$data['countries_list']=$this->Institute_model->get_countries_list();
				$data['city_list']=$this->Institute_model->get_cities_list($data['institute_details']['country_name']);
				$data['location_list']=$this->Institute_model->get_locations_list($data['institute_details']['i_city']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/edit-allinstitute',$data);
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
	public function admin_addpost()
	{	
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				
				$post=$this->input->post();
				//echo '<pre>';print_r($post);exit;
				if(isset($_FILES['i_logo']['name']) && $_FILES['i_logo']['name']!=''){
					$pic=$_FILES['i_logo']['name'];
					$picname = str_replace(" ", "", $pic);
					$imagename=microtime().basename($picname);
					$imgname = str_replace(" ", "", $imagename);
					move_uploaded_file($_FILES['i_logo']['tmp_name'], 'assets/institute_logo/'.$imgname);
				}
				$add_user_data=array(
				'role_id'=>2,
				'source'=>'vueb',
				'email_id'=>isset($post['i_email_id'])?$post['i_email_id']:'',
				'mobile'=>isset($post['i_p_phone'])?$post['i_p_phone']:'',
				'status'=>1,
				'profile_pic'=>isset($imgname)?$imgname:'',
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>$login_details['cust_id'],
				);
				$add_user=$this->Institute_model->add_institute_user($add_user_data);
				if(count($add_user)>0){
					
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
						'created_by'=>$add_user,
						'completed'=>1,
						);
						$save=$this->Institute_model->save_institute($add);
						if(count($save)>0){
							$this->session->set_flashdata('success','Institute successfully Added');
							redirect('institute/admin_lists');
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('institutes/admin_add/');
						}
					
				}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('institute/admin_add/');
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
	
	public function admin_editpost()
	{	
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				
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
					redirect('institute/admin_lists');
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('institute/admin_edit/'.base64_encode($post['i_id']));
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
	public  function institute_status(){
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
			$admindetails=$this->session->userdata('vuebin_user');
			$i_id=base64_decode($this->uri->segment(3));
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
				$update=$this->Institute_model->update_institute_details($i_id,$update_data);
						if(count($update)>0){
							$institue_login_details=$this->Institute_model->get_institute_login_details($i_id);
							$login_data=array(
							'status'=>$stat,
							'updated_at'=>date('Y-m-d H:i:s'),
							);
							$this->Institute_model->update_user_login_details($institue_login_details['created_by'],$login_data);
							if($status==1){
							$this->session->set_flashdata('success',"institute successfully deactivated");
							}else{
							$this->session->set_flashdata('success',"institute successfully activated");
							}
							redirect('institute/admin_lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('institute/admin_lists');
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
	public  function institute_delete(){
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$admindetails=$this->session->userdata('vuebin_user');
				$i_id=base64_decode($this->uri->segment(3));
			
			$update_data=array(
					'status'=>2,
					'updated_at'=>date('Y-m-d H:i:s'),
					);
				$update=$this->Institute_model->update_institute_details($i_id,$update_data);
						if(count($update)>0){
							$institue_login_details=$this->Institute_model->get_institute_login_details($i_id);
							$login_data=array(
							'status'=>$stat,
							'updated_at'=>date('Y-m-d H:i:s'),
							);
							$this->Institute_model->update_user_login_details($institue_login_details['created_by'],$login_data);
							
							$this->session->set_flashdata('success',"Institute successfully deleted");

							redirect('institute/admin_lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('institute/admin_lists');
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
	/* admin side list */
	/* institue level admin video upload*/
	public  function admin_uploadvideolist(){
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				
				$i_id=base64_decode($this->uri->segment(3));
				$data['institue_id']=$this->uri->segment(3);
				$data['video_list']=$this->Institute_model->get_institue_wise_video_list($i_id);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/institute_video_list',$data);
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
	public  function addvideo(){
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				
				$i_id=base64_decode($this->uri->segment(3));
				$data['institue_id']=$i_id;
				$data['institute_details']=$this->Institute_model->get_video_purpose_institute_details($i_id);
				$data['course_list']=$this->Video_model->get_course_list();
				$data['countries_list']=$this->Video_model->get_countries_list();
				$data['city_list']=$this->Video_model->get_city_list($data['institute_details']['country_name']);
				$data['location_list']=$this->Video_model->get_location_list($data['institute_details']['i_city']);
				//echo '<pre>';print_r($data['course_list']);exit;
				$this->load->view('admin/add-video',$data);
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
	public function videoedit()
	{	
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$i_id=base64_decode($this->uri->segment(3));
				$video_id=base64_decode($this->uri->segment(4));
				$data['institute_details']=$this->Institute_model->get_video_purpose_institute_details($i_id);
				$data['video_details']=$this->Video_model->get_video_details($video_id);
				$data['course_list']=$this->Video_model->get_course_list();
				$data['countries_list']=$this->Video_model->get_countries_list();
				$data['city_list']=$this->Video_model->get_city_list($data['video_details']['country_name']);
				$data['location_list']=$this->Video_model->get_location_list($data['video_details']['i_city']);
				//$data['t_mode']="'" . explode ( "', '", $data['video_details']['training_mode'] ) . "'"
				$data['t_mode']=explode(',',$data['video_details']['training_mode']);
				
				//echo '<pre>';print_r($data);exit;
				$this->load->view('admin/edit-video',$data);
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
	public  function videostatus(){
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
			$admindetails=$this->session->userdata('vuebin_user');
			$v_id=base64_decode($this->uri->segment(3));
			$status=base64_decode($this->uri->segment(4));
			$i_id=base64_decode($this->uri->segment(5));
			//exit;
			if($status==1){
				$stat=0;
			}else{
				$stat=1;
			}
			$update_data=array(
					'status'=>$stat,
					'updated_at'=>date('Y-m-d H:i:s'),
					);
					$update=$this->Video_model->update_video_details($v_id,$update_data);
						if(count($update)>0){
							if($status==1){
							$this->session->set_flashdata('success',"Video successfully Deactivate");
							}else{
							$this->session->set_flashdata('success',"Video successfully activate");
							}
							redirect('institute/admin_uploadvideolist/'.$i_id);
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('institute/admin_uploadvideolist/'.$i_id);
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
	public  function videodelete(){
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$admindetails=$this->session->userdata('vuebin_user');
				$v_id=base64_decode($this->uri->segment(3));
				$i_id=base64_decode($this->uri->segment(4));
			$update_data=array(
					'status'=>2,
					'updated_at'=>date('Y-m-d H:i:s'),
					);
					$update=$this->Video_model->update_video_details($v_id,$update_data);
						if(count($update)>0){
							
							$this->session->set_flashdata('success',"Video successfully deleted");

							redirect('institute/admin_uploadvideolist/'.$i_id);
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('institute/admin_uploadvideolist/'.$i_id);
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
	/* institue level admin video upload*/
	
	
	
}
