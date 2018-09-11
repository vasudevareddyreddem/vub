<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Admin_panel.php');
class Content extends Admin_panel {

	public function __construct() 
	{
		parent::__construct();	
		
		$this->load->model('Content_model');
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
	public function footer()
	{	
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$data['details']=$this->Content_model->get_footer_content(1);
				$this->load->view('admin/content/footer-add',$data);
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
	public function addfooterpost()
	{	
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$post=$this->input->post();
				$add=array(
				'footer'=>isset($post['footer_content'])?$post['footer_content']:'',
				'mobile1'=>isset($post['mobile1'])?$post['mobile1']:'',
				'mobile2'=>isset($post['mobile2'])?$post['mobile2']:'',
				'email_id'=>isset($post['email_id'])?$post['email_id']:'',
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>$login_details['cust_id'],
				);
				$save=$this->Content_model->update_footer_content(1,$add);
				if(count($save)>0){
				$this->session->set_flashdata('success','Footer content successfully updated');
					redirect('content/footer');
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('content/footer');
					
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
	public function aboutus()
	{	
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$data['details']=$this->Content_model->get_aboutus_content(1);
				$this->load->view('admin/content/aboutus-add',$data);
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
	public function addaboutuspost()
	{	
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$post=$this->input->post();
				//echo '<pre>';print_r($_FILES);
				//exit;
				$details=$this->Content_model->get_aboutus_content(1);
				if(isset($_FILES['video_file']['name']) && $_FILES['video_file']['name']!=''){
						unlink('assets/aboutus_video/'.$details['video_name']);
						$pic=$_FILES['video_file']['name'];
						$picname = str_replace(" ", "", $pic);
						$imagename=microtime().basename($picname);
						$imgname = str_replace(" ", "", $imagename);
						move_uploaded_file($_FILES['video_file']['tmp_name'], 'assets/aboutus_video/'.$imgname);
					}else{
						$imgname=$details['video_name'];
						$pic=$details['org_name'];					
					}
				$add=array(
				'aboutus'=>isset($post['aboutus_content'])?$post['aboutus_content']:'',
				'video_name'=>isset($imgname)?$imgname:'',
				'org_name'=>isset($pic)?$pic:'',
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>$login_details['cust_id'],
				);
				$save=$this->Content_model->update_aboutus_content(1,$add);
				if(count($save)>0){
				$this->session->set_flashdata('success','About us content successfully updated');
					redirect('content/aboutus');
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('content/aboutus');
					
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
	public function testimonial()
	{	
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$data['details']=$this->Content_model->get_aboutus_content(1);
				$this->load->view('admin/content/testimonial-add',$data);
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
	public function addtestimonialpost()
	{	
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$post=$this->input->post();
				if(isset($_FILES['image_file']['name']) && $_FILES['image_file']['name']!=''){
						$pic=$_FILES['image_file']['name'];
						$picname = str_replace(" ", "", $pic);
						$imagename=microtime().basename($picname);
						$imgname = str_replace(" ", "", $imagename);
						move_uploaded_file($_FILES['image_file']['tmp_name'], 'assets/testimonial/'.$imgname);
					}else{
						$imgname='';
						$pic='';					
					}
				$add=array(
				'author_name'=>isset($post['author_name'])?$post['author_name']:'',
				'testimonial'=>isset($post['testimonial'])?$post['testimonial']:'',
				'image_name'=>isset($imgname)?$imgname:'',
				'org_name'=>isset($pic)?$pic:'',
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>$login_details['cust_id'],
				);
				$save=$this->Content_model->insert_testimonial($add);
				if(count($save)>0){
				$this->session->set_flashdata('success','Testimonial content successfully added');
					redirect('content/testimonial_list');
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('content/testimonial');
					
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
	public function testimonial_list()
	{	
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$data['testimonial_list']=$this->Content_model->get_testimonial_list();
				$this->load->view('admin/content/testimonial-list',$data);
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
	public function testimonial_edit()
	{	
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$t_id=base64_decode($this->uri->segment(3));
				$data['testimonial_list']=$this->Content_model->get_testimonial_details($t_id);
				$this->load->view('admin/content/testimonial-edit',$data);
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
	public  function testimonial_status(){
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
			$admindetails=$this->session->userdata('vuebin_user');
			$t_id=base64_decode($this->uri->segment(3));
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
					$update=$this->Content_model->update_testimonial_details($t_id,$update_data);
						if(count($update)>0){
							if($status==1){
							$this->session->set_flashdata('success',"Testimonial content successfully deactivated");
							}else{
							$this->session->set_flashdata('success',"Testimonial content successfully activated");
							}
							redirect('content/testimonial_list');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('content/testimonial_list');
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
	public  function testimonial_delete(){
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
			$admindetails=$this->session->userdata('vuebin_user');
			$t_id=base64_decode($this->uri->segment(3));
			
			$update_data=array(
					'status'=>2,
					'updated_at'=>date('Y-m-d H:i:s'),
					);
					$update=$this->Content_model->update_testimonial_details($t_id,$update_data);
						if(count($update)>0){
							$this->session->set_flashdata('success',"Testimonial content successfully deleted");
							redirect('content/testimonial_list');
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('content/testimonial_list');
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
	public function edittestimonialpost()
	{	
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				$post=$this->input->post();
					$testimonial_list=$this->Content_model->get_testimonial_details($post['t_id']);
				if(isset($_FILES['image_file']['name']) && $_FILES['image_file']['name']!=''){
						unlink('assets/testimonial/'.$testimonial_list['image_file']);
						$pic=$_FILES['image_file']['name'];
						$picname = str_replace(" ", "", $pic);
						$imagename=microtime().basename($picname);
						$imgname = str_replace(" ", "", $imagename);
						move_uploaded_file($_FILES['image_file']['tmp_name'], 'assets/testimonial/'.$imgname);
					}else{
						$imgname=$testimonial_list['image_name'];
						$pic=$testimonial_list['org_name'];					
					}
				$update_data=array(
				'author_name'=>isset($post['author_name'])?$post['author_name']:'',
				'testimonial'=>isset($post['testimonial'])?$post['testimonial']:'',
				'image_name'=>isset($imgname)?$imgname:'',
				'org_name'=>isset($pic)?$pic:'',
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>$login_details['cust_id'],
				);
				$update_details=$this->Content_model->update_testimonial_details($post['t_id'],$update_data);
				if(count($update_details)>0){
				$this->session->set_flashdata('success','Testimonial content successfully updated');
					redirect('content/testimonial_list');
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('content/testimonial_edit/'.base64_decode($post['t_id']));
					
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
