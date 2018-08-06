<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Location_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public  function save_location($data){
		$this->db->insert('location_list',$data);
		return $this->db->insert_id();
	}
	public  function check_location_exists($city_id,$location){
		$this->db->select('l_id')->from('location_list');
		$this->db->where('city_id',$city_id);
		$this->db->where('location_name',$location);
		$this->db->where('l_status !=',2);
		return $this->db->get()->row_array();
	}
	public function get_all_locations_list($city_id,$cust_id){
		$this->db->select('location_list.l_id,location_list.city_id,location_list.location_name,location_list.l_status,location_list.created_at,city_list.city_name')->from('location_list');
		$this->db->join('city_list ', 'city_list.city_id = location_list.city_id', 'left');
		$this->db->where('location_list.city_id',$city_id);
		$this->db->where('location_list.created_by',$cust_id);
		$this->db->where('location_list.l_status !=',2);
		$this->db->order_by('location_list.l_id','desc');
		return $this->db->get()->result_array();
	}
	public  function update_location_details($l_id,$data){
		$this->db->where('l_id',$l_id);
		return $this->db->update('location_list',$data);
		
	}
	public function get_location_details($l_id){
		$this->db->select('location_list.l_id,location_list.location_name,location_list.city_id,city_list.city_name')->from('location_list');
		$this->db->join('city_list ', 'city_list.city_id = location_list.city_id', 'left');

		$this->db->where('l_id',$l_id);
		return $this->db->get()->row_array();
	}
	public  function get_city_details($city_id){
		$this->db->select('city_id,city_name')->from('city_list');

		$this->db->where('city_id',$city_id);
		return $this->db->get()->row_array();
	}
	
	
	
	
	

}