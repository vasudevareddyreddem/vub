<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_end.php');

class Courses extends Front_end {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->model('Course_model');
		
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
		$this->load->view('html/course-video',$data);
		$this->load->view('html/footer');
		
	}
	
}
