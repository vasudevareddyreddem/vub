<?php

class Institutes extends  CI_Controller {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->library('user_agent');
		$this->load->helper('directory');
		$this->load->helper('cookie');
		$this->load->helper('security');
		$this->load->model('Institute_model');
	}
	public function index()
	{	
		$this->load->view('html/header');
		$data['institute_list']=$this->Institute_model->get_institues_list_for_front_end();
		$data['lastest_institute_list']=$this->Institute_model->get_lastest_institute_list();
		
		//echo '<pre>';print_r($data);exit;
		$this->load->view('html/institutes',$data);
		$this->load->view('html/footer');
	}
	public function page()
	{	
		$this->load->view('html/header');
		$i_id=base64_decode($this->uri->segment(3));
		$data['institute_details']=$this->Institute_model->get_institues_details_for_front_end($i_id);
		$data['video_list']=$this->Institute_model->get_institues_video_list($i_id);
		//echo '<pre>';print_r($data);exit;
		$this->load->view('html/institute-page',$data);
		$this->load->view('html/footer');
	}
	
}
