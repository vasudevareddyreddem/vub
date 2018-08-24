<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_end.php');
class Videos extends  Front_end {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->model('Institute_model');
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
		$data['institute_details']=$this->Institute_model->get_institues_details_for_front_end($i_id);
		$data['video_details']=$this->Institute_model->get_video_details($v_id);
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
