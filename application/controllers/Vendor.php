<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Admin_panel.php');

class Vendor extends Admin_panel {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->model('Vendor_model');
		
	}
	
	public function index()
	{	
		if($this->session->userdata('vuebin_user'))
		{
			$login_details=$this->session->userdata('vuebin_user');
			if($login_details['role_id']==1){
				
				//echo '<pre>';print_r($data);exit;
				$this->load->view('vendor/add');
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
			if($login_details['role_id']==1){
				$data['vendor_list']=$this->Vendor_model->get_vendor_list($login_details['cust_id']);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('vendor/list',$data);
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
			if($login_details['role_id']==1){
				$c_id=base64_decode($this->uri->segment(3));
				$data['vendor_details']=$this->Vendor_model->get_vendor_details($c_id);
				//echo '<pre>';print_r($data);exit;
				$this->load->view('vendor/edit',$data);
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
			if($login_details['role_id']==1){
				$post=$this->input->post();
				//echo '<pre>';print_r($post);exit;
				$check=$this->Vendor_model->check_exits_ornot($post['v_name']);
				if(count($check)>0){
					$this->session->set_flashdata('error','Vendor already exists. Pelase try another Vendor');
					redirect('vendor');
				}
				if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
					$pic=$_FILES['image']['name'];
					$picname = str_replace(" ", "", $pic);
					$imagename=microtime().basename($picname);
					$imgname = str_replace(" ", "", $imagename);
					move_uploaded_file($_FILES['image']['tmp_name'], 'assets/vendor_img/'.$imgname);
				}
				$add=array(
				'v_name'=>isset($post['v_name'])?$post['v_name']:'',
				'img'=>isset($imgname)?$imgname:'',
				'status'=>1,
				'created_at'=>date('Y-m-d H:i:s'),
				'updated_at'=>date('Y-m-d H:i:s'),
				'created_by'=>$login_details['cust_id'],
				);
				$save=$this->Vendor_model->save_vendor($add);
				if(count($save)>0){
					$this->session->set_flashdata('success','Vendor successfully added');
					redirect('vendor/lists');
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('vendor');
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
			if($login_details['role_id']==1){
				$post=$this->input->post();
				//echo '<pre>';print_r($post);exit;
				$details=$this->Vendor_model->get_vendor_details($post['v_id']);
				if($details['c_name']!=$post['c_name']){
					$check=$this->Vendor_model->check_exits_ornot($post['vendor']);
					if(count($check)>0){
						$this->session->set_flashdata('error','vendor already exists. Pelase try another vendor');
						redirect('vendor/edit/'.base64_encode($post['v_id']));

					}
				}
				if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
					unlink('assets/vendor_img/'.$details['img']);
					$pic=$_FILES['image']['name'];
					$picname = str_replace(" ", "", $pic);
					$imagename=microtime().basename($picname);
					$imgname = str_replace(" ", "", $imagename);
					move_uploaded_file($_FILES['image']['tmp_name'], 'assets/vendor_img/'.$imgname);
				}else{
					$imgname=$details['img'];
				}
				$update_data=array(
				'v_name'=>isset($post['v_name'])?$post['v_name']:'',
				'img'=>isset($imgname)?$imgname:'',
				'updated_at'=>date('Y-m-d H:i:s'),
				);
				$update=$this->Vendor_model->update_vendor_details($post['v_id'],$update_data);
				if(count($update)>0){
					$this->session->set_flashdata('success','Vendor details successfully updated');
					redirect('vendor/lists');
				}else{
					$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
					redirect('vendor/edit/'.base64_encode($post['c_id']));
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
			if($login_details['role_id']==1){
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
				$update=$this->Vendor_model->update_vendor_details($v_id,$update_data);
						if(count($update)>0){
							if($status==1){
							$this->session->set_flashdata('success',"Vendor successfully deactivated");
							}else{
							$this->session->set_flashdata('success',"Vendor successfully activated");
							}
							redirect('vendor/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('vendor/lists');
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
			if($login_details['role_id']==1){
				$admindetails=$this->session->userdata('vuebin_user');
				$v_id=base64_decode($this->uri->segment(3));
			
				$update_data=array(
					'status'=>2,
					'updated_at'=>date('Y-m-d H:i:s'),
					);
				$update=$this->Vendor_model->update_vendor_details($v_id,$update_data);
						if(count($update)>0){
							$details=$this->Vendor_model->get_vendor_details($v_id);
							unlink('assets/vendor_img/'.$details['img']);
							$this->session->set_flashdata('success',"Vendor successfully deleted");
							redirect('vendor/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('vendor/lists');
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
