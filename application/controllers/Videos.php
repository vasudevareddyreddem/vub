<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends  CI_Controller {

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
		$this->load->view('html/header');
		$i_id=base64_decode($this->uri->segment(3));
		$v_id=base64_decode($this->uri->segment(4));
		$data['institute_details']=$this->Institute_model->get_institues_details_for_front_end($i_id);
		$data['video_details']=$this->Institute_model->get_video_details($v_id);
		//echo '<pre>';print_r($data);exit;
		$this->load->view('html/videoplay',$data);
		$this->load->view('html/footer');
	}
	
}
