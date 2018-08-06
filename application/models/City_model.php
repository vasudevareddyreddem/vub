<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class City_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public  function save_city($data){
		$this->db->insert('city_list',$data);
		return $this->db->insert_id();
	}
	public  function check_city_exists($c_id,$city){
		$this->db->select('city_id')->from('city_list');
		$this->db->where('c_id',$c_id);
		$this->db->where('c_status !=',2);
		$this->db->where('city_name',$city);
		return $this->db->get()->row_array();
	}
	public function get_all_citys_list($c_id,$cust_id){
		$this->db->select('city_list.city_id,city_list.c_id,city_list.city_name,city_list.c_status,city_list.created_at,countries_list.country_name')->from('city_list');
		$this->db->join('countries_list ', 'countries_list.c_id = city_list.c_id', 'left');
		$this->db->where('city_list.c_id',$c_id);
		$this->db->where('city_list.created_by',$cust_id);
		$this->db->where('city_list.c_status !=',2);
		$this->db->order_by('city_list.city_id','desc');
		$return=$this->db->get()->result_array();
		foreach($return as $list){
			$city_count=$this->get_loction_list_count($list['city_id']);
			$data[$list['city_id']]=$list;
			$data[$list['city_id']]['location_count']=$city_count['c_count'];
		}
		if(!empty($data)){
			return $data;
			
		}
	}
	public  function get_loction_list_count($city_id){
		$this->db->select('COUNT(location_list.l_id) as c_count')->from('location_list');
		$this->db->where('location_list.city_id',$city_id);
		$this->db->where('location_list.l_status !=',2);
		return $this->db->get()->row_array();
	}
	public  function update_city_details($c_id,$data){
		$this->db->where('city_id',$c_id);
		return $this->db->update('city_list',$data);
		
	}
	public function get_country_details($c_id){
		$this->db->select('c_id,country_name,country_code')->from('countries_list');
		$this->db->where('c_id',$c_id);
		return $this->db->get()->row_array();
	}
	public function get_city_details($city_id){
		$this->db->select('city_list.city_id,city_list.c_id,city_list.city_name,city_list.c_status,city_list.created_at,countries_list.country_name')->from('city_list');
		$this->db->join('countries_list ', 'countries_list.c_id = city_list.c_id', 'left');
		$this->db->where('city_list.city_id',$city_id);
		return $this->db->get()->row_array();
	}
	
	
	
	

}