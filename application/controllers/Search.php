<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_end.php');

class Search extends Front_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Institute_model');		
		$this->load->model('Course_model');		
	}
	public function index()
	{	
		
		
		$post=$this->input->post();
		//echo '<pre>';print_r($post);exit;
		if(isset($post['institue_course']) && $post['institue_course']=='' && $post['local_id']!=''){
			$this->session->set_flashdata('error',"Please select any one");
			redirect($this->agent->referrer());
		}
		if(isset($post['local_id']) && $post['local_id']!='' && $post['institue_course_name']=='' || $post['institue_course']==''){
			$this->session->set_flashdata('error',"Must select institute name or course name");
			redirect('');
		}
		
			$value=explode('_',$post['institue_course']);
			if(isset($value[1]) && $value[1]=='institue'){
				if(isset($post['local_id']) && $post['local_id']!=''){
					
					$loc_value=explode('_',$post['local_id']);
					
					if(isset($loc_value[1]) && $loc_value[1]=='location'){
					  $data['institute_list']=$this->User_model->get_location_wise_with_intitue($value[0],$loc_value[0]);
					}else if(isset($loc_value[1]) && $loc_value[1]=='country'){
					  $data['institute_list']=$this->User_model->get_country_wise_with_intitue($value[0],$loc_value[0]);
					}else if(isset($loc_value[1]) && $loc_value[1]=='city'){
					  $data['institute_list']=$this->User_model->get_city_wise_with_intitue($value[0],$loc_value[0]);
					}
						
					
				}else{
					$check=$this->User_model->get_location_with_intitue($value[0],'');
					//echo '<pre>';print_r($check);exit;
					if(count($check)>0){
						redirect('institutes/page/'.base64_encode($check['i_id']).'/'.$check['i_name']);
					}else{
						$this->session->set_flashdata('error',"No result found.");
						redirect($this->agent->referrer());
					}
				}
				//echo '<pre>';print_r($data['institute_list']);exit;
				if(count($data)<=0){
					$this->session->set_flashdata('error',"No result found.");
					redirect($this->agent->referrer());
				}
				
				$data['lastest_institute_list']=$this->Institute_model->get_lastest_institute_list();
				//echo '<pre>';print_r($data['institute_list']);exit;
				$this->load->view('html/institutes',$data);
				$footer['details']=$this->Content_model->get_footer_content(1);
				$this->load->view('html/footer',$footer);
				
			}else  if(isset($value[1]) && $value[1]=='course'){
			
			if(isset($post['local_id']) && $post['local_id']!=''){
			
				$loc_value=explode('_',$post['local_id']);
				//echo '<pre>';print_r($loc_value);
				
				if(isset($loc_value[1]) && $loc_value[1]=='location'){
				  $data['video_list']=$this->User_model->get_location_with_course_list($value[0],$loc_value[0]);
				echo $this->db->last_query();exit;
				}else if(isset($loc_value[1]) && $loc_value[1]=='country'){
				  $data['video_list']=$this->User_model->get_country_with_course_list($value[0],$loc_value[0]);
				}else if(isset($loc_value[1]) && $loc_value[1]=='city'){
				  $data['video_list']=$this->User_model->get_city_with_course_list($value[0],$loc_value[0]);
				}else if(isset($loc_value[0]) && $loc_value[0]!=''){
						$check=$this->User_model->get_location_with_course($value[0],$loc_value[0]);
						
						if(count($check)>0){
							redirect('courses/videolist/'.base64_encode($check['course_id']));
						}else{
							$this->session->set_flashdata('error',"No result found.");
							redirect($this->agent->referrer());
						}
					
				}
				
				$data['course_details']=$this->Course_model->get_course_name_details($value[0]);
				if($this->session->userdata('vuebin_user'))
				{
					$user_details=$this->session->userdata('vuebin_user');
					$data['cust_id']=$user_details['cust_id'];	
				}else{
					$data['cust_id']='';
				}
				//echo '<pre>';print_r($data);exit;
				$this->load->view('html/course-video-list',$data);
				$footer['details']=$this->Content_model->get_footer_content(1);
				$this->load->view('html/footer',$footer);
				
			}else{
				
				$data['video_list']=$this->User_model->get_course_list_without_location($value[0],'');
				$data['course_details']=$this->Course_model->get_course_name_details($value[0]);
				if($this->session->userdata('vuebin_user'))
				{
					$user_details=$this->session->userdata('vuebin_user');
					$data['cust_id']=$user_details['cust_id'];	
				}else{
					$data['cust_id']='';
				}
				$this->load->view('html/course-video-list',$data);
				$footer['details']=$this->Content_model->get_footer_content(1);
				$this->load->view('html/footer',$footer);
			}
				
			
		}
		
	}
	public  function post(){
		
		$post=$this->input->post();
		if($post['institue_course']=='' && $post['local_id']!=''){
			$this->session->set_flashdata('error',"Please select any one");
			redirect($this->agent->referrer());
		}
		$value=explode('_',$post['institue_course']);
		//echo '<pre>';print_r($post);
		if(isset($value[1]) && $value[1]=='institue'){
			if(isset($post['local_id']) && $post['local_id']!=''){
				
				$loc_value=explode('_',$post['local_id']);
				
				if(isset($loc_value[1]) && $loc_value[1]=='location'){
				  $data['institute_list']=$this->User_model->get_location_wise_with_intitue($value[0],$loc_value[0]);
				}else if(isset($loc_value[1]) && $loc_value[1]=='country'){
				  $data['institute_list']=$this->User_model->get_country_wise_with_intitue($value[0],$loc_value[0]);
				}else if(isset($loc_value[1]) && $loc_value[1]=='city'){
				  $data['institute_list']=$this->User_model->get_city_wise_with_intitue($value[0],$loc_value[0]);
				}
					
				
			}else{
				$data['institute_list']=$this->User_model->get_location_with_intitue($value[0],'');
			}
			
			if(count($data)<=0){
				$this->session->set_flashdata('error',"Your searched location having no institues. Please try again.");
				redirect($this->agent->referrer());
			}
			$this->load->view('html/institutes',$data);
			$footer['details']=$this->Content_model->get_footer_content(1);
			$this->load->view('html/footer',$footer);
			exit;
			
		}
		//echo '<pre>';print_r($value);exit;
		
		
	}
	
	
	
}
