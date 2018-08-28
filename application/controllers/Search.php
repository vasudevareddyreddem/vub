<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_end.php');

class Search extends Front_end {

	public function __construct() 
	{
		parent::__construct();	
	}
	public function index()
	{	
		
		$data['home_page_video']=$this->User_model->get_home_page_video();
		//echo '<pre>';print_r($header);exit; 
		$this->load->view('html/index',$data);
		$this->load->view('html/footer');
	}
	public  function post(){
		
		$post=$this->input->post();
		$value=explode('_',$post['institue_course']);
		//echo '<pre>';print_r($post);exit;
		if(isset($value[1]) && $value[1]=='institue'){
			if(isset($post['local_id']) && $post['local_id']!=''){
				$check=$this->User_model->get_location_with_intitue($value[0],$post['local_id']);
			}else{
				$check=$this->User_model->get_location_with_intitue($value[0],'');
			}
			if(count($check)>0){
				redirect('institutes/page/'.base64_encode($check['i_id']).'/'.$check['i_name']);
			}else{
				$this->session->set_flashdata('error',"Your searched location having no institues. Please try again.");
				redirect($this->agent->referrer());
			}
			
			
		}
		echo '<pre>';print_r($value);
		
		
	}
	
	
	
}
