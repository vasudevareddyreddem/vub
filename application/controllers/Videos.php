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
		$footer['details']=$this->Content_model->get_footer_content(1);
		$this->load->view('html/footer',$footer);
	}
	public function play()
	{	
		$i_id=base64_decode($this->uri->segment(3));
		$v_id=base64_decode($this->uri->segment(4));
		$course_id=base64_decode($this->uri->segment(5));
		$data['institute_details']=$this->Institute_model->get_institues_details_for_front_end($i_id);
		$data['video_details']=$this->Institute_model->get_video_details($v_id);
		$data['video_list']=$this->Institute_model->get_course_wise_video_list($i_id,$course_id,$v_id);
		$data['like_count']=$this->Video_model->get_video_counts($v_id);
		
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
		$footer['details']=$this->Content_model->get_footer_content(1);
		$this->load->view('html/footer',$footer);
	}
	public function upload()
	{	
		
		if($this->session->userdata('vuebin_user'))
		{
			$this->load->model('Video_model');
			$user_details=$this->session->userdata('vuebin_user');
			$data['institue_details']=$this->Video_model->check_institue_avaiable($user_details['cust_id']);
			
			//echo '<pre>';print_r($data['institue_details']);exit;
			if(isset($data['institue_details']) && count($data['institue_details'])>0){
				redirect('video/');
			}else{
				
				$vuebin_details=$this->session->userdata('vuebin_user');
				//echo '<pre>';print_r($vuebin_details);exit;
				redirect('institute/index');
			}
			
					
		}else{
			$this->load->view('html/upload');
		}
		$footer['details']=$this->Content_model->get_footer_content(1);
		$this->load->view('html/footer',$footer);
		
	}
	public  function video_subscribe(){
		
		if($this->session->userdata('vuebin_user'))
		{
			$user_details=$this->session->userdata('vuebin_user');
			$post=$this->input->post();
			$subscribe_data=array(
			'video_id'=>isset($post['video_id'])?$post['video_id']:'',
			'ip_address'=>$this->input->ip_address(),
			'cust_id'=>isset($user_details['cust_id'])?$user_details['cust_id']:'',
			'status'=>1,
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'create_by'=>isset($user_details['cust_id'])?$user_details['cust_id']:'',
			);
			$check=$this->Video_model->check_video_subscribe_exist($post['video_id'],$user_details['cust_id']);
			if(count($check)>0){
					$data=2;
					echo json_encode($data);exit;		
			}else{
				$save=$this->Video_model->save_video_subscribe($subscribe_data);
				if(count($save)>0){
						$data=1;
						echo json_encode($data);exit;	
				}else{
					$data=0;
					echo json_encode($data);exit;
				}
			}

		}else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('');
		}
	}
	public  function video_likes(){
		
		if($this->session->userdata('vuebin_user'))
		{
			$user_details=$this->session->userdata('vuebin_user');
			$post=$this->input->post();
			$like_data=array(
			'video_id'=>isset($post['video_id'])?$post['video_id']:'',
			'ip_address'=>$this->input->ip_address(),
			'cust_id'=>isset($user_details['cust_id'])?$user_details['cust_id']:'',
			'status'=>1,
			'created_at'=>date('Y-m-d H:i:s'),
			'updated_at'=>date('Y-m-d H:i:s'),
			'create_by'=>isset($user_details['cust_id'])?$user_details['cust_id']:'',
			);
			$check=$this->Video_model->check_video_likes_exist($post['video_id'],$user_details['cust_id']);
			if(count($check)>0){
				$delete=$this->Video_model->dislike_already_liked_video($post['video_id'],$user_details['cust_id']);
				$like_count=$this->Video_model->get_video_counts($post['video_id']);
				//echo '<pe>';print_r($like_count);exit;
						$data['msg']=1;
						$data['count']=$like_count['like_count'];
						echo json_encode($data);exit;	
			}else{
				$save=$this->Video_model->save_video_likee($like_data);
				if(count($save)>0){
					$like_counts=$this->Video_model->get_video_counts($post['video_id']);
						$data['msg']=1;
						$data['count']=$like_counts['like_count'];
						echo json_encode($data);exit;	
				}else{
					$data=0;
					echo json_encode($data);exit;
				}
			}

		}else{
			$this->session->set_flashdata('error',"Please login and continue");
			redirect('');
		}
	}
	
}
