<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_end.php');

class Courses extends Front_end {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->model('Course_model');
		$this->load->model('Video_model');
		
	}
	
	public function index()
	{	
		$data['classification_list']=$this->Course_model->get_classification_wise_course();
		//echo '<pre>';print_r($data);exit;
		$this->load->view('html/course',$data);
		$this->load->view('html/footer');
	}
	public function video()
	{	
		$course_id=base64_decode($this->uri->segment(3));
		$data['video_details']=$this->Course_model->course_wise_video_list($course_id);
		//echo '<pre>';print_r($data);exit;
		if($this->session->userdata('vuebin_user'))
		{
			$user_details=$this->session->userdata('vuebin_user');
			$data['cust_id']=$user_details['cust_id'];	
		}else{
			$data['cust_id']='';
		}
			$view_data=array(
			'v_id'=>isset($data['video_details'][0]['video_id'])?$data['video_details'][0]['video_id']:'',
			'ip_address'=>$this->input->ip_address(),
			'cust_id'=>isset($user_details['cust_id'])?$user_details['cust_id']:'',
			'status'=>1,
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'create_by'=>isset($user_details['cust_id'])?$user_details['cust_id']:'',
			);
		$this->Video_model->save_video_views_count($view_data);
		$this->load->view('html/course-video',$data);
		$this->load->view('html/footer');
		
	}
	
	//course video list
	
	public function course_video_list()
	{	
		$course_id=base64_decode($this->uri->segment(3));
		$data['video_details']=$this->Course_model->course_wise_video_list($course_id);
		//echo '<pre>';print_r($data);exit;
		if($this->session->userdata('vuebin_user'))
		{
			$user_details=$this->session->userdata('vuebin_user');
			$data['cust_id']=$user_details['cust_id'];	
		}else{
			$data['cust_id']='';
		}
			$view_data=array(
			'v_id'=>isset($data['video_details'][0]['video_id'])?$data['video_details'][0]['video_id']:'',
			'ip_address'=>$this->input->ip_address(),
			'cust_id'=>isset($user_details['cust_id'])?$user_details['cust_id']:'',
			'status'=>1,
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'create_by'=>isset($user_details['cust_id'])?$user_details['cust_id']:'',
			);
		$this->Video_model->save_video_views_count($view_data);
		$this->load->view('html/course-video-list',$data);
		$this->load->view('html/footer');
		
	}
	
}
