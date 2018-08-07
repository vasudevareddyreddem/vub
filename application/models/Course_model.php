<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course_model extends CI_Model 

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
	
	
	
	

}