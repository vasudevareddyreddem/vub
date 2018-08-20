<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Institute_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public  function get_countries_list(){
		$this->db->select('c_id,country_name')->from('countries_list');
		$this->db->where('status ',1);
		return $this->db->get()->result_array();
	}
	public  function get_cities_list($c_id){
		$this->db->select('city_id,city_name')->from('city_list');
		$this->db->where('c_status ',1);
		$this->db->where('c_id ',$c_id);
		return $this->db->get()->result_array();
	}
	public  function get_locations_list($c_id){
		$this->db->select('l_id,location_name')->from('location_list');
		$this->db->where('l_status ',1);
		$this->db->where('city_id ',$c_id);
		return $this->db->get()->result_array();
	}
	public  function save_institute($data){
		$this->db->insert('institute_list',$data);
		return $this->db->insert_id();
	}
	
	public  function get_institute_details($cut_id){
		$this->db->select('institute_list.*,countries_list.country_name as c_name,city_list.city_name,location_list.location_name as l_name')->from('institute_list');
		$this->db->join('countries_list', 'countries_list.c_id = institute_list.country_name', 'left');
		$this->db->join('city_list', 'city_list.city_id = institute_list.i_city', 'left');
		$this->db->join('location_list', 'location_list.l_id = institute_list.location_name', 'left');
		$this->db->where('institute_list.created_by ',$cut_id);
		return $this->db->get()->row_array();
	}
	
	public  function get_institute_basic_details($i_id){
		$this->db->select('i_id,i_logo')->from('institute_list');
		$this->db->where('institute_list.i_id ',$i_id);
		return $this->db->get()->row_array();
	}
	public  function update_institute_details($i_id,$data){
		$this->db->where('i_id',$i_id);
		return  $this->db->update('institute_list',$data);
	}
	
	
	/* add institue user*/
	
	public  function add_institute_user($data){
		$this->db->insert('customers_list',$data);
		return $this->db->insert_id();
		
	}
	public  function get_all_institute_list(){
		$this->db->select('institute_list.*,countries_list.country_name as c_name,city_list.city_name,location_list.location_name as l_name')->from('institute_list');
		$this->db->join('countries_list', 'countries_list.c_id = institute_list.country_name', 'left');
		$this->db->join('city_list', 'city_list.city_id = institute_list.i_city', 'left');
		$this->db->join('location_list', 'location_list.l_id = institute_list.location_name', 'left');
		$this->db->where('institute_list.status!=',2);
		return $this->db->get()->result_array();
	}
	public  function get_institute_login_details($i_id){
		$this->db->select('i_id,created_by')->from('institute_list');
		$this->db->where('i_id ',$i_id);
		return $this->db->get()->row_array();
	}
	
	public  function update_user_login_details($c_id,$data){
		$this->db->where('cust_id',$c_id);
		return $this->db->update('customers_list',$data);
		
	}
	public  function get_all_institute_details($i_id){
		$this->db->select('institute_list.*,countries_list.country_name as c_name,city_list.city_name,location_list.location_name as l_name')->from('institute_list');
		$this->db->join('countries_list', 'countries_list.c_id = institute_list.country_name', 'left');
		$this->db->join('city_list', 'city_list.city_id = institute_list.i_city', 'left');
		$this->db->join('location_list', 'location_list.l_id = institute_list.location_name', 'left');
		$this->db->where('institute_list.i_id ',$i_id);
		return $this->db->get()->row_array();
	}
	
	/* add institue user*/
	/* add  add institute wise  upload  video  functionality*/
	public  function get_institue_wise_video_list($i_id){
		$this->db->select('institute_list.i_name,admin.name as created_by,video_list.video_id,video_list.i_id,video_list.video_file,video_list.org_video_file,course_list.c_name as coursename,video_list.training_mode,video_list.public,video_list.private,video_list.status,video_list.created_at')->from('video_list');
		$this->db->join('course_list ', 'course_list.course_id = video_list.course_name', 'left');
		$this->db->join('institute_list ', 'institute_list.i_id = video_list.i_id', 'left');
		$this->db->join('admin ', 'admin.cust_id = video_list.created_by', 'left');
		$this->db->where('video_list.i_id',$i_id);
		$this->db->where('video_list.status !=',2);
		return $this->db->get()->result_array();
	
	}
	public  function get_video_purpose_institute_details($i_id){
		$this->db->select('i_id,i_name,country_name,i_city,location_name')->from('institute_list');
		$this->db->where('i_id',$i_id);
		return $this->db->get()->row_array();
	}
	/* add  add institute wise  upload  video  functionality*/
	
	

}