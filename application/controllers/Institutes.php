<?php
@include_once( APPPATH . 'controllers/Front_end.php');

class Institutes extends  Front_end {

	public function __construct() 
	{
		parent::__construct();	
		
		$this->load->model('Institute_model');
	}
	public function index()
	{	
		$data['institute_list']=$this->Institute_model->get_institues_list_for_front_end();
		$data['lastest_institute_list']=$this->Institute_model->get_lastest_institute_list();
		//echo '<pre>';print_r($data);exit;
		$this->load->view('html/institutes',$data);
		$this->load->view('html/footer');
	}
	public function page()
	{	
		$i_id=base64_decode($this->uri->segment(3));
		$data['institute_details']=$this->Institute_model->get_institues_details_for_front_end($i_id);
		$data['video_list']=$this->Institute_model->get_institues_video_list($i_id);
		//echo '<pre>';print_r($data);exit;
		$this->load->view('html/institute-page',$data);
		$this->load->view('html/footer');
	}
	
}
