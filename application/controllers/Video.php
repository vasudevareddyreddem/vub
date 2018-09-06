<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Admin_panel.php');

class Video extends Admin_panel {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->model('Video_model');
		
	}
	
	public function index()
	{	
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==2){
				
				$data['institute_details']=$this->Video_model->get_institute_details($login_details['cust_id']);
				$data['course_list']=$this->Video_model->get_course_list();
				$data['countries_list']=$this->Video_model->get_countries_list();
				$data['city_list']=$this->Video_model->get_city_list($data['institute_details']['country_name']);
				$data['location_list']=$this->Video_model->get_location_list($data['institute_details']['i_city']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('video/add',$data);
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
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==2){
				$data['video_list']=$this->Video_model->get_video_list($login_details['cust_id']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('video/list',$data);
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
				$video_id=base64_decode($this->uri->segment(3));
				$data['institute_details']=$this->Video_model->get_institute_details($login_details['cust_id']);
				$data['video_details']=$this->Video_model->get_video_details($video_id);
				$data['course_list']=$this->Video_model->get_course_list();
				$data['countries_list']=$this->Video_model->get_countries_list();
				$data['city_list']=$this->Video_model->get_city_list($data['video_details']['country_name']);
				$data['location_list']=$this->Video_model->get_location_list($data['video_details']['i_city']);
				//$data['t_mode']="'" . explode ( "', '", $data['video_details']['training_mode'] ) . "'"
				$data['t_mode']=explode(',',$data['video_details']['training_mode']);
				
				//echo '<pre>';print_r($data);exit;
				$this->load->view('video/edit',$data);
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
			if($login_details['role_id']==2 || $login_details['role_id']==1){
				$post=$this->input->post();
				if(isset($post['training_mode']) && count($post['training_mode'])>0){
					$result = implode ( ",", $post['training_mode']);
				}
				if(isset($_FILES['video_file']['name']) && $_FILES['video_file']['name']!=''){
					$pic=$_FILES['video_file']['name'];
					$picname = str_replace(" ", "", $pic);
					$imagename=microtime().basename($picname);
					$imgname = str_replace(" ", "", $imagename);
					move_uploaded_file($_FILES['video_file']['tmp_name'], 'assets/videos/'.$imgname);
				}
				$add=array(
				'i_id'=>isset($post['i_id'])?$post['i_id']:'',
				'video_file'=>isset($imgname)?$imgname:'',
				'org_video_file'=>isset($_FILES['video_file']['name'])?$_FILES['video_file']['name']:'',
				'course_name'=>isset($post['course_name'])?$post['course_name']:'',
				'training_mode'=>isset($result)?$result:'',
				'v_title'=>isset($post['v_title'])?$post['v_title']:'',
				'v_desc'=>isset($post['v_desc'])?$post['v_desc']:'',
				't_name'=>isset($post['t_name'])?$post['t_name']:'',
				'a_author'=>isset($post['a_author'])?$post['a_author']:'',
				'country_name'=>isset($post['country_name'])?$post['country_name']:'',
				'i_city'=>isset($post['i_city'])?$post['i_city']:'',
				'location_name'=>isset($post['location_name'])?$post['location_name']:'',
				'u_b_schedule'=>isset($post['u_b_schedule'])?$post['u_b_schedule']:'',
				'course_duration'=>isset($post['course_duration'])?$post['course_duration']:'',
				'c_fee'=>isset($post['c_fee'])?$post['c_fee']:'',
				'v_tags'=>isset($post['v_tags'])?$post['v_tags']:'',
				'course_content'=>isset($post['course_content'])?$post['course_content']:'',
				'public'=>isset($post['public'])?$post['public']:'',
				'private'=>isset($post['private'])?$post['private']:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>$login_details['cust_id'],
				);
				//echo '<pre>';print_r($add);exit;
				$save=$this->Video_model->save_video($add);
				if(count($save)>0){
					$this->session->set_flashdata('success','course Video successfully uploaded');
					
					if( $login_details['role_id']==1){
						redirect('institute/admin_uploadvideolist/'.base64_encode($post['i_id']));
					}else{
						redirect('video/lists');	
					}
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					if( $login_details['role_id']==1){
						redirect('institute/admin_addvideo/'.base64_encode($post['i_id']));
					}else{
						redirect('video/index');	
					}
					
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
			if($login_details['role_id']==2 || $login_details['role_id']==1){
				
				$post=$this->input->post();
				$details=$this->Video_model->get_video_details($post['video_id']);
				//echo '<pre>';print_r($post);exit;
				if(isset($post['training_mode']) && count($post['training_mode'])>0){
					$result = implode ( ",", $post['training_mode']);
				}
				if(isset($_FILES['video_file']['name']) && $_FILES['video_file']['name']!=''){
					$pic=$_FILES['video_file']['name'];
					$picname = str_replace(" ", "", $pic);
					$imagename=microtime().basename($picname);
					$imgname = str_replace(" ", "", $imagename);
					move_uploaded_file($_FILES['video_file']['tmp_name'], 'assets/videos/'.$imgname);
				}else{
					$imgname=$details['video_file'];
					$pic=$details['org_video_file'];
				}
				$update_data=array(
				'video_file'=>isset($imgname)?$imgname:'',
				'org_video_file'=>isset($pic)?$pic:'',
				'course_name'=>isset($post['course_name'])?$post['course_name']:'',
				'training_mode'=>isset($result)?$result:'',
				'v_title'=>isset($post['v_title'])?$post['v_title']:'',
				'v_desc'=>isset($post['v_desc'])?$post['v_desc']:'',
				't_name'=>isset($post['t_name'])?$post['t_name']:'',
				'a_author'=>isset($post['a_author'])?$post['a_author']:'',
				'country_name'=>isset($post['country_name'])?$post['country_name']:'',
				'i_city'=>isset($post['i_city'])?$post['i_city']:'',
				'location_name'=>isset($post['location_name'])?$post['location_name']:'',
				'u_b_schedule'=>isset($post['u_b_schedule'])?$post['u_b_schedule']:'',
				'course_duration'=>isset($post['course_duration'])?$post['course_duration']:'',
				'c_fee'=>isset($post['c_fee'])?$post['c_fee']:'',
				'v_tags'=>isset($post['v_tags'])?$post['v_tags']:'',
				'course_content'=>isset($post['course_content'])?$post['course_content']:'',
				'public'=>isset($post['public'])?$post['public']:'',
				'private'=>isset($post['private'])?$post['private']:'',
				'updated_at'=>date('Y-m-d H:i:s'),
				);
				//echo '<pre>';print_r($add);exit;
					$update=$this->Video_model->update_video_details($post['video_id'],$update_data);

				if(count($update)>0){
					$this->session->set_flashdata('success','Video details successfully updated');
					
					if( $login_details['role_id']==1){
						redirect('institute/admin_uploadvideolist/'.base64_encode($post['i_id']));
					}else{
						redirect('video/lists');	
					}
					
					
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					if( $login_details['role_id']==1){
						redirect('institute/admin_videoedit/'.base64_encode($post['i_id']).'/'.base64_encode($post['video_id']));
					}else{
						redirect('video/edit/'.base64_encode($post['video_id']));	
					}
					
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
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==2){
			$admindetails=$this->session->userdata('vuebin_user');
			$v_id=base64_decode($this->uri->segment(3));
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
					$update=$this->Video_model->update_video_details($v_id,$update_data);
						if(count($update)>0){
							if($status==1){
							$this->session->set_flashdata('success',"Video successfully Deactivate");
							}else{
							$this->session->set_flashdata('success',"Video successfully activate");
							}
							redirect('video/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('video/lists');
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
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==2){
				$admindetails=$this->session->userdata('vuebin_user');
				$v_id=base64_decode($this->uri->segment(3));
			
			$update_data=array(
					'status'=>2,
					'updated_at'=>date('Y-m-d H:i:s'),
					);
					$update=$this->Video_model->update_video_details($v_id,$update_data);
						if(count($update)>0){
							
							$this->session->set_flashdata('success',"Video successfully deleted");

							redirect('video/lists');
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('video/lists');
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
	
	/* home page  video  purpose*/
	public function homevideo()
	{	
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				
				$this->load->view('video/homevideoadd');
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
	public  function addhomepagevideopost(){
		if($this->session->userdata('vuebin_user'))
			{
				$login_details=$this->session->userdata('vuebin_user');
				if($login_details['role_id']==1){
					$post=$this->input->post();
					//echo '<pre>';print_r($post);exit;
					
					if(isset($_FILES['video_file']['name']) && $_FILES['video_file']['name']!=''){
						$pic=$_FILES['video_file']['name'];
						$picname = str_replace(" ", "", $pic);
						$imagename=microtime().basename($picname);
						$imgname = str_replace(" ", "", $imagename);
						move_uploaded_file($_FILES['video_file']['tmp_name'], 'assets/homepage_videos/'.$imgname);
					}
					$add=array(
					'title'=>isset($post['title'])?$post['title']:'',
					'org_video_name'=>isset($pic)?$pic:'',
					'video_name'=>isset($imgname)?$imgname:'',
					'status'=>0,
					'created_at'=>date('Y-m-d H:i:s'),
					'updated_at'=>date('Y-m-d H:i:s'),
					'created_by'=>$login_details['cust_id'],
					);
					$save=$this->Video_model->save_homepage_banner_video($add);
					if(count($save)>0){
						$this->session->set_flashdata('success','vendor successfully Added');
						redirect('video/homevideolists');
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('video/homevideo');
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
	public  function homevideolists(){
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$data['video_list']=$this->Video_model->get_homepage_all_videolist();
				//echo '<pre>';print_r($data);exit; 
				$this->load->view('video/homevideolist',$data);
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
		public  function homepagevideostatus(){
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
			$admindetails=$this->session->userdata('vuebin_user');
			$v_id=base64_decode($this->uri->segment(3));
			$status=base64_decode($this->uri->segment(4));
			if($status==1){
				$stat=0;
			}else{
				$check=$this->Video_model->get_active_homepage_videos();
				if(count($check)>0){
					$this->session->set_flashdata('error',"Already one  homepage Video is  active. at atime only one video is active");
					redirect('video/homevideolists');
				}
				$stat=1;
			}
			$update_data=array(
					'status'=>$stat,
					'updated_at'=>date('Y-m-d H:i:s'),
					);
					$update=$this->Video_model->update_homepagevideo_details($v_id,$update_data);
						if(count($update)>0){
							if($status==1){
							$this->session->set_flashdata('success',"video successfully deactivated");
							}else{
							$this->session->set_flashdata('success',"video successfully activated");
							}
							redirect('video/homevideolists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('video/homevideolists');
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
	public  function homepagevideodelete(){
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$admindetails=$this->session->userdata('vuebin_user');
				$v_id=base64_decode($this->uri->segment(3));
				$v_details=$this->Video_model->get_homepage_video_details($v_id);
				if($v_details['status']==1){
					$this->session->set_flashdata('error',"Video Already display in homepage. first of all do deactive then delete");
					redirect('video/homevideolists');
				}
				$update_data=array(
					'status'=>2,
					'updated_at'=>date('Y-m-d H:i:s'),
					);
					$update=$this->Video_model->update_homepagevideo_details($v_id,$update_data);
						if(count($update)>0){
							$this->session->set_flashdata('success',"Video successfully deleted");
							redirect('video/homevideolists');
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('video/homevideolists');
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
	/* home page  video  purpose*/
	
	public  function addvideo_types(){
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==2){
				$post=$this->input->post();
				if(isset($post['video_type']) && $post['video_type']!=''){
				if(isset($post['id']) && count($post['id'])>0){
					
					foreach($post['id'] as $list){
						if($post['video_type']=='demo'){
						$up_data=array(
						'demo_type'=>isset($post['video_type'])?$post['video_type']:'',
						'updated_at'=>date('Y-m-d H:i:s'),
						);
						$update=$this->Video_model->update_video_demo_full_type($list,$up_data);
						}
						if($post['video_type']=='full'){
						$up_data=array(
						'full_type'=>isset($post['video_type'])?$post['video_type']:'',
						'updated_at'=>date('Y-m-d H:i:s'),
						);
						$update=$this->Video_model->update_video_demo_full_type($list,$up_data);
						}
					}
					
				}
				if(count($update)>0){
					$data['msg']=1;
					echo json_encode($data);exit;
				}else{
					$data['msg']=0;
					echo json_encode($data);exit;
				}
				
				}else{
					$data['msg']=2;
					echo json_encode($data);exit;
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
}
