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
		$footer['details']=$this->Content_model->get_footer_content(1);
		$this->load->view('html/footer',$footer);
	}
	public function page()
	{	
		$i_id=base64_decode($this->uri->segment(3));
		$course_id=base64_decode($this->uri->segment(5));
		$data['institute_details']=$this->Institute_model->get_institues_details_for_front_end($i_id);
		if(isset($course_id) && $course_id!=''){
				$data['video_list']=$this->Institute_model->get_institues_video_list($i_id,$course_id);
			
		}else{
			$data['video_list']=$this->Institute_model->get_institues_video_list($i_id,'');
			$institue_realted_video_list=$this->Institute_model->get_institue_related_video_list($i_id);
			if(count($institue_realted_video_list)>0){
				foreach($institue_realted_video_list as $lis){
					foreach($lis as $li){
						$lists[]=$li;
					}
					
				}
				if(isset($lists)&& count($lists)>0){
					$data['institue_realted_video_list']=$lists;
				}
			}
		}
		
		$data['courses_offered']=$this->Institute_model->get_institues_wise_courses_offered($i_id);
		//echo '<pre>';print_r($lists);exit;
		$this->load->view('html/institute-page',$data);
		$footer['details']=$this->Content_model->get_footer_content(1);
		$this->load->view('html/footer',$footer);
	}
	public function share(){
		
		
		$i_id=base64_decode($this->uri->segment(3));
		$data['details']=$this->Institute_model->get_institue_details($i_id);
		//echo '<pre>';print_r($data);exit;
		$this->load->view('share',$data);
		//exit;
	}
	public function lshares(){
		
		
		$i_id=base64_decode($this->uri->segment(3));
		$data['details']=$this->Institute_model->get_institue_details($i_id);
		//echo '<pre>';print_r($data);exit;
		$this->load->view('link',$data);
		//exit;
	}
	
}
