<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_end.php');
class Videos extends  Front_end {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->model('Institute_model');
		$this->load->model('Video_model');
	}
	public function index()
	{	
		$i_id=base64_decode($this->uri->segment(3));
		$v_id=base64_decode($this->uri->segment(4));
		$data['institute_details']=$this->Institute_model->get_institues_details_for_front_end($i_id);
		$data['video_list']=$this->Institute_model->get_institues_video_list($v_id);
		//echo '<pre>';print_r($data);exit;
		$this->load->view('html/videoplay',$data);
		$this->load->view('html/footer');
	}
	public function play()
	{	
		$i_id=base64_decode($this->uri->segment(3));
		$v_id=base64_decode($this->uri->segment(4));
		$course_id=base64_decode($this->uri->segment(5));
		$data['institute_details']=$this->Institute_model->get_institues_details_for_front_end($i_id);
		$data['video_details']=$this->Institute_model->get_video_details($v_id);
		$data['video_list']=$this->Institute_model->get_course_wise_video_list($i_id,$course_id,$v_id);
		
		if($this->session->userdata('vuebin_user'))
		{
			$user_details=$this->session->userdata('vuebin_user');
			$data['cust_id']=$user_details['cust_id'];	
		}else{
			$data['cust_id']='';
		}
		/* view count*/
		$user_details=$this->session->userdata('vuebin_user');
		$view_data=array(
			'v_id'=>isset($v_id)?$v_id:'',
			'ip_address'=>$this->input->ip_address(),
			'cust_id'=>isset($user_details['cust_id'])?$user_details['cust_id']:'',
			'status'=>1,
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'create_by'=>isset($user_details['cust_id'])?$user_details['cust_id']:'',
			);
			$this->Video_model->save_video_views_count($view_data);

		/* view count*/
		//echo '<pre>';print_r($data);exit;
		$this->load->view('html/videoplay',$data);
		$this->load->view('html/footer');
	}
	public function upload()
	{	
		
		if($this->session->userdata('vuebin_user'))
		{
			$this->load->model('Video_model');
			$user_details=$this->session->userdata('vuebin_user');
			$data['institue_details']=$this->Video_model->check_institue_avaiable($user_details['cust_id']);
			if(count($data['institue_details'])>0){
				redirect('video/');
			}else{
				
				$vuebin_details=$this->session->userdata('vuebin_user');
				//echo '<pre>';print_r($vuebin_details);exit;
				redirect('institute/index');
			}
			
					
		}else{
			$this->load->view('html/upload');
		}
		$this->load->view('html/footer');
		
	}
	
}
