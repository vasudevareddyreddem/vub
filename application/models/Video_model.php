<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	
	public  function get_course_list(){
		$this->db->select('course_list.course_id,course_list.c_name')->from('course_list');
		$this->db->where('course_list.status',1);
		$this->db->where('course_list.published_status',1);
		$this->db->where('course_list.published',1);
		return $this->db->get()->result_array();
	}
	public  function get_countries_list(){
		$this->db->select('c_id,country_name')->from('countries_list');
		$this->db->where('status',1);
		return $this->db->get()->result_array();
	}
	public  function get_institute_details($cust_id){
		$this->db->select('i_id,i_name,country_name,i_city,location_name')->from('institute_list');
		$this->db->where('created_by',$cust_id);
		return $this->db->get()->row_array();
	}
	public  function get_city_list($c_id){
		$this->db->select('city_id,city_name')->from('city_list');
		$this->db->where('c_id',$c_id);
		$this->db->where('c_status',1);
		return $this->db->get()->result_array();
	}
	public  function get_location_list($c_id){
		$this->db->select('l_id,location_name')->from('location_list');
		$this->db->where('city_id',$c_id);
		$this->db->where('l_status',1);
		return $this->db->get()->result_array();
	}
	
	public  function save_video($data){
		$this->db->insert('video_list',$data);
		return $this->db->insert_id();
	}
	public  function get_video_list($c_id){
		$this->db->select('video_list.video_id,video_list.i_id,video_list.video_file,video_list.org_video_file,course_list.c_name as coursename,video_list.training_mode,video_list.public,video_list.private,video_list.status,video_list.created_at,video_list.demo_type,video_list.full_type')->from('video_list');
		$this->db->join('course_list ', 'course_list.course_id = video_list.course_name', 'left');
		$this->db->where('video_list.created_by',$c_id);
		$this->db->where('video_list.status !=',2);
		return $this->db->get()->result_array();
	}
	public function get_video_details($v_id){
		$this->db->select('*')->from('video_list');
		$this->db->where('video_list.video_id',$v_id);
		return $this->db->get()->row_array();
	}
	public  function update_video_details($v_id,$data){
		$this->db->where('video_id',$v_id);
		return $this->db->update('video_list',$data);
	}
	
	/* home  page  banner video functionality*/
	public  function save_homepage_banner_video($add){
		$this->db->insert('homepage_header_videos',$add);
		return $this->db->insert_id();
		
	}
	public  function get_homepage_all_videolist(){
		$this->db->select('h_v_id,title,video_name,org_video_name,status,created_at')->from('homepage_header_videos');
		$this->db->where('homepage_header_videos.status !=',2);
		return $this->db->get()->result_array();
	}
	public  function update_homepagevideo_details($id,$data){
		$this->db->where('h_v_id',$id);
		return $this->db->update('homepage_header_videos',$data);
	}
	
	public  function get_active_homepage_videos(){
		$this->db->select('h_v_id')->from('homepage_header_videos');
		$this->db->where('homepage_header_videos.status',1);
		return $this->db->get()->result_array();
	}
	public  function get_homepage_video_details($v_id){
		$this->db->select('h_v_id,status')->from('homepage_header_videos');
		$this->db->where('homepage_header_videos.h_v_id',$v_id);
		return $this->db->get()->row_array();
	}
	
	public  function update_video_demo_full_type($id,$data){
			$this->db->where('video_id',$id);
		return $this->db->update('video_list',$data);
	}
	/* home  page  banner video functionality*/
	/*upload  video  in  home  purpose*/
	public  function check_institue_avaiable($cus_id){
		$this->db->select('i_id,created_by')->from('institute_list');
		$this->db->where('created_by',$cus_id);
		return $this->db->get()->row_array();
		
	}
	/*upload  video  in  home  purpose*/
	/* video  views  count  purpose*/
	public  function save_video_views_count($data){
		$this->db->insert('video_view_list',$data);
		return $this->db->insert_id();
		
	}
	/* video  views  count  purpose*/
	
	

}